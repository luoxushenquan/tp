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
//        return $this->fetch('index');
        return $this->redirect('Article/detail',$params = ['id'=>158]);

}
}