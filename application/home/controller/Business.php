<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/11/29
 * Time: 15:31
 * 商家活动
 */
namespace app\home\controller;
class Business extends Home{
    public function index(){
//        exit;activity
        return $this->fetch('index');
    }
}