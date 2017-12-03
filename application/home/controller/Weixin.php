<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/12/1
 * Time: 11:43
 */
namespace app\home\controller;
use think\Controller;
use think\Session;
use think\Url;

class Weixin extends Controller{
//    public function info(){
//        //保存当前地址到session
//        Session::set('return_url',url('home/weixin/info'));
//        if(!Session::has('openid')){
//            $appId='wx3485683f6d24841d';
//            $callback=url('home/weixin/callback','',true,true);
//            $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appId}&redirect_uri={$callback}&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect ";
//            $this->redirect($url);
//        }else{
//          $openid=Session::get('openid');
//        }
//        var_dump($openid);
//
//    }
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
}