<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/11/29
 * Time: 15:10
 * 小区活动
 */
namespace app\home\controller;
use think\Request;

class Activity extends Home
{
    public function index()
    {
//        exit;activity
        return $this->fetch('index');
    }

    public function baomin($id)
    {
//        var_dump($id);exit;
        if (is_login()) {
            //保存报名信息
            if (request()->isGet()) {
                $Baomin = model('baomin');
                //要得到保存报名者信息保存
                $user_id = '1';
                $Baomin['user_id'] = $user_id;
                $Baomin['activity_id'] = $id;

                $data = db('baomin')->insert($Baomin);

                if ($data) {
                    $this->success('报名成功', url('index'));
                    return $this->redirect('index/index');
                    //记录行为
                } else {
                    $this->error($Baomin->getError());
                }
            }

        } else {
            //没有登录就跳转
            return $this->redirect('/User/login');
        }

    }
}