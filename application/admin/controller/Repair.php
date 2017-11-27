<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/11/26
 * Time: 10:30
 * 报修
 */
namespace app\admin\controller;

use think\Request;

class Repair extends Admin{

    public function add(){
        if(request()->isPost()){
            $Repair=model('repair');
            $post_data=\think\request::instance()->post();
//            var_dump($post_data);exit;
            //验证
            $validate = validate('repair');

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

        return $this->fetch('edit');
    }


    public function index(){

        $list = \think\Db::name('Repair')->paginate(6,true,[
            'type'     => 'bootstrap',
            'var_page' => 'page',
        ]);
        // 获取分页显示
        $page = $list->render();
        $this->assign('list', $list);
//        $this->assign('_page', $list);
        $this->assign('_page', $page);
        $this->assign('meta_title' , '报修管理');
        return $this->fetch('index');
    }
    public function del(){
        $id = array_unique((array)input('id/a',0));
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }
        $map = array('id' => array('in', $id) );
        if(\think\Db::name('repair')->where($map)->delete()){
            action_log('update_repair', 'repair', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
    public function edit($id = 0){

        if($this->request->isPost()){
            $postdata = \think\Request::instance()->post();
            $Repair = \think\Db::name("repair");
            $data = $Repair->update($postdata);
            if($data !== false){
                $this->success('编辑成功', url('index'));
            } else {
                $this->error('编辑失败');
            }
        } else {
            $info = array();
            /* 获取数据 */
            $list = \think\Db::name('Repair')->find($id);
            if(false === $list){
                $this->error('获取配置信息错误');
            }
            $this->assign('info', $list);
            $this->meta_title = '编辑报修信息';
            return $this->fetch();
        }
    }
}