<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/11/30
 * Time: 18:32
 */
namespace app\home\controller;
class Faxian extends Home{
    public function index(){

        return $this->fetch('index');
    }

}