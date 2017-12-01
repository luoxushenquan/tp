<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/12/1
 * Time: 11:43
 */
namespace app\home\controller;
use think\Controller;
use think\Url;

class Weixin extends Controller{
    public function info(){
        $appId='wx3485683f6d24841d';
        $callback=url('home/weixin/callback','',true,true);
        $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid={$appId}&redirect_uri={$callback}&response_type=code&scope=snsapi_base &state=STATE#wechat_redirect ";
        $this->redirect($url);
    }
    public function callback(){
        echo 'clll';
    }
}