<?php
// +----------------------------------------------------------------------
// | TwoThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.twothink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: ����� <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace app\home\controller;
use app\home\model\Document;
use OT\DataDictionary;
use think\Config;
/**
 * ǰ̨��ҳ������
 * ��Ҫ��ȡ��ҳ�ۺ�����
 */
class Tongzhi extends Home{
    public function index1(){

//        $category = model('Category')->getTree();
//        $document = new Document();
//        $lists    = $document->lists(null);
//        $this->assign('category',$category);//��Ŀ
//        $this->assign('lists',$lists);//�б�
//        $this->assign('page',model('Document')->page);//��ҳ
        return $this->fetch('index1');
    }

}
