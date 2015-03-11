<?php
/**
 * Created by PhpStorm.
 * User: giants
 * Date: 2015/1/22
 * Time: 16:14
 */
namespace Canmou\Model;
use Think\Model;
class UserModel extends Model {

    protected $tableName = 'admin_user';
    /* 自动验证规则 */
    protected $_validate = array(
        array('username', 'require', '填写用户名'),
        array('username', '', '用户名已经存在', self::MUST_VALIDATE, 'unique'),
        array('username', '4,10', '用户名格式不正确', self::MUST_VALIDATE, 'length'),
        array('password','6,16','密码格式不正确',1,'length'), // 自定义函数验证密码格式
        array('repassword','password','确认密码不正确',1,'confirm'), // 验证确认密码是否和密码一致
    );
//    protected $_map = array(
//        'username' =>'name', // 把表单中name映射到数据表的username字段
//    );
    protected $_auto = array (
        array('created','time',1,'function'),
        array('updated','time',3,'function'), // 对update_time字段在更新的时候写入当前时间戳
    );


}