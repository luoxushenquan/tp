<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/11/30
 * Time: 18:28
 */
namespace app\home\controller;
class My extends Home{
    public function index(){

        return $this->fetch('index');
    }
}