<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/11/27
 * Time: 14:29
 */
namespace app\home\controller;
//use app\home\model\Repair;

class Repair extends Home{
    public function Repair(){
        if(request()->isPost()){
//            $Repair=model('repair');
            $Repair=new \app\admin\model\Repair();
            $post_data=\think\request::instance()->post();

            //验证
//            $validate = new Validate([
//                'name'  => 'require|max:25',
//                'email' => 'email'
//            ]);
//
//            if (!$validate->check($post_data)) {
//                dump($validate->getError());
//            }
            $data = $Repair->create($post_data);
            if($data){
                $this->success('报修成功请等待工人上门解决', url('index'));
                //记录行为
            } else {
                $this->error($Repair->getError());
            }
        }

        return $this->fetch('repair');
    }
}