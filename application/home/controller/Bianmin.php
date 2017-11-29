<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/11/29
 * Time: 11:51
 */
namespace app\home\controller;
class Bianmin extends Home{
    public function index(){
        return $this->fetch('index');
    }
}