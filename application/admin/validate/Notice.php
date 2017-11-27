<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2017/11/26
 * Time: 14:32
 */
namespace app\admin\validate;
use think\Validate;
class Notice extends Validate
{
    protected $rule = [
        ['name', 'require', '请填写通知标题'],
        ['content', 'require', '通知内容不能为空'],
    ];
}