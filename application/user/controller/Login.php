<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://www.twothink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 艺品网络 <http://www.twothink.cn>
// +----------------------------------------------------------------------

namespace app\user\controller;
use app\common\controller\UcApi;
use app\common\model\UcenterMember;
use think\Controller;
use think\Cookie;
use think\Db;
use think\Session;

/**
 * 用户登入
 * 包括用户登录及注册
 */
class Login extends Controller {
    public function __construct(){
        /* 读取站点配置 */
        $config = api('Config/lists');
        config($config); //添加配置
        parent::__construct();
    }
    ////////
    public function callback(){
        $appId='wx3485683f6d24841d';
        $secret='2cce11808ea62a329b0a38b1ccca275c';
        $code = request()->get('code');
        $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid={$appId}&secret={$secret}&code={$code}&grant_type=authorization_code";
        $str = file_get_contents($url);
        $json = json_decode($str);
//        var_dump($json);
        //保存openidsession
        Session::set('openid',$json->openid);
        if(Session::has('return_url')){
            $this->redirect(Session::get('return_url'));
        }

    }



    /* 登录页面 */
    public function index($username = '', $password = '', $verify = '',$type = 1){

        //TODO!检查该微信用户是否已绑定账号，如果已绑定，则自动登录
        //1.1 获取openid
        //保存当前地址到session
        Session::set('return_url',url('home/weixin/info'));
        if(!Session::has('openid')){
            $appId='wx3485683f6d24841d';
            $callback=url('home/weixin/callback','',true,true);
            $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appId}&redirect_uri={$callback}&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect ";
            $this->redirect($url);
        }else{
            $openid=Session::get('openid');
        }
//        var_dump($openid);exit;
        //1.2 根据openid查询用户
        $uid =Db::table('ucenter_member')->where('openid',$openid)->find();
//        var_dump($uid);exit;
        //自动登录的方法
       $ucm = new UcenterMember();
         $ucm->autoLogin($uid);
         $Member = model('Member');
         if($Member->login($uid)){
             //登陆成功跳转到登录前页面
             $this->redirect('/home/index');
         };
        if($this->request->isPost()){ //登录验证
            /* 检测验证码 */
            if(!captcha_check($verify)){
                $this->error('验证码输入错误！');
            }

            /* 调用UC登录接口登录 */
            $user = new UcApi;
            $uid = $user->login($username, $password, $type);

            if(0 < $uid){ //UC登录成功
                /* 登录用户 */
                $Member = model('Member');
                if($Member->login($uid)){ //登录用户
                    //TODO:跳转到登录前页面
                    if(!$cookie_url = Cookie::get('__forward__')){
                        $cookie_url = url('Home/Index/index');
                    }
//                    setcookie($username,$uid);//保存登录信息
                    //TODO! 绑定账号
                    //$openid  $Member->openid = $openid;$Member->save();
                    $this->success('登录成功！',$cookie_url);
                } else {
                    $this->error($Member->getError());
                }

            } else { //登录失败
                switch($uid) {
                    case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
                    case -2: $error = '密码错误！'; break;
                    default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
                }
                $this->error($error);
            }

        } else { //显示登录表单
            return $this->fetch();
        }
    }

	/* 注册页面 */
	public function register($username = '', $password = '', $repassword = '', $email = '', $verify = ''){
        if(!config('user_allow_register')){
            $this->error('注册已关闭');
        }
		if($this->request->isPost()){ //注册用户
			/* 检测验证码 */
		   if(!captcha_check($verify)){
                $this->error('验证码输入错误！');
            }

			/* 检测密码 */
			if($password != $repassword){
				$this->error('密码和重复密码不一致！');
			}			

			/* 调用注册接口注册用户 */
            $User = new UcApi;
			$uid = $User->register($username, $password, $email); 
			if(0 < $uid){ //注册成功
				//TODO: 发送验证邮件
				$this->success('注册成功！',url('login/index'));
			} else { //注册失败，显示错误信息
				$this->error($uid);
			}

		} else { //显示注册表单
			return $this->fetch();
		}
	}
	/* 退出登录 */
	public function logout(){
		if(is_login()){
			model('Member')->logout();
			$this->success('退出成功！', url('User/login'));
		} else {
			$this->redirect('User/login');
		}
	}

}
