<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/11/26
 * Time: 14:32
 */
namespace app\admin\validate;
use think\Validate;
class Repair extends Validate
{
    protected $rule = [
        ['name', 'require', '你是谁'],
        ['tel', 'require', '电话必须填写'],
        ['address', 'require', '地址必须填写填写'],
        ['content', 'require', '报修内容不能为空'],
        'tel'     => ['/^1[34578]\d{9}$/'],

    ];
    protected $message = [
        'tel'     => '请填写正确的手机号',
    ];
}