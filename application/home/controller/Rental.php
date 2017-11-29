<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/11/29
 * Time: 15:29
 * Ð¡Çø×âÊÛ
 */
namespace app\home\controller;
class Rental extends Home{
    public function index(){
//        exit;activity
        return $this->fetch('index');
    }
}