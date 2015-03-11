<?php
return array(
	//'配置项'=>'配置值'
    'AUTOLOAD_NAMESPACE' => array('Addons' => './Addons/'), //扩展模块列表
    'URL_PARAMS_BIND'=>true, // URL变量绑定到操作方法作为参数
    'URL_CASE_INSENSITIVE' =>true,//不区分URL大小写的解决方案
    'MODULE_ALLOW_LIST'=>array('Home','Canmou'),
    'DEFAULT_MODULE' => 'Home',
    'DEFAULT_ACTION' => 'Index',
    //数据库配置1
    /* 数据库配置 */
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'cmeal', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '19931011',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => '', // 数据库表前缀
    'SHOW_PAGE_TRACE'  => false, // 显示页面Trace信息
);