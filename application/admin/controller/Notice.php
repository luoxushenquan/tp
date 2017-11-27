<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/11/27
 * Time: 15:14
 * 小区通知信息
 */
namespace app\admin\controller;
class Notice extends Admin{
    public function index(){
        $list = \think\Db::name('Notice')->paginate(6,true,[
            'type'     => 'bootstrap',
            'var_page' => 'page',
        ]);
        // 获取分页显示
        $page = $list->render();
        $this->assign('list', $list);
//        $this->assign('_page', $list);
        $this->assign('_page', $page);
        $this->assign('meta_title' , '通知管理');
        return $this->fetch('index');
    }
    public function add(){
        if(request()->isPost()){
            $Repair=model('notice');
            $post_data=\think\request::instance()->post();
//            var_dump($post_data);exit;
            //验证
            $validate = validate('notice');

            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }
            $data = $Repair->create($post_data);
            if($data){
                $this->success('新增成功', url('index'));
                //记录行为
            } else {
                $this->error($Repair->getError());
            }
        }

        return $this->fetch('add');
    }
    public function update(){
        /* 获取数据对象 */
        $model_id = input('param.model_id',0);
        $data = input();
        if(!$model_id)
            $this->error('模型id不能为空');
        //获取模型信息
        $model = \think\Db::name('Model')->getById($model_id);
        if($model['extend']){
            //更新基础模型
            $logic = logic($model['extend']);
            $res_id = $logic->updates();
            $res_id || $this->error($logic->getError());
        }
        $update_id = '';
        if(empty($data['id']) && $model['extend'] != 0){
            $update_id = $res_id;
        }
        //更新当前模型
        $logic = logic($model['id']);
        $res = $logic->updates($update_id);
        $res || $this->error($logic->getError());
        $this->success(!empty($data['id'])?'更新成功':'新增成功', Cookie('__forward__'));
    }



}