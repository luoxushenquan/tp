<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/11/29
 * Time: 15:10
 * С���
 */
namespace app\home\controller;
class Activity extends Home{
    public function index(){
//        exit;activity
        return $this->fetch('index');
    }
}