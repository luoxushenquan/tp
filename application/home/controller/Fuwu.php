<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/11/30
 * Time: 18:10
 */
namespace app\home\controller;
class Fuwu extends Home{
    public function index(){

        return $this->fetch('index');
    }
    public function renzhen(){
        if (is_login()) {

            if (request()->isPost()) {
                //开始认证

            }else{
                //get提交显示认证页面
                return $this->fetch('renzhen');
            }
        }else{
            //没有扥录引导登录
            return $this->redirect('/User/login');
        }

    }
}