<?php

$config["__STATIC__"] = __ROOT__.'/Public/static';
$config["__HTML__"] = __ROOT__ . '/Public/html';
$config["__ADMIN__"] = __ROOT__ . '/Public/admin';
$config["__ICONS__"] = __ROOT__ . '/Public/static/icons';
$config["__domainName__"] = $_SERVER["SERVER_NAME"];
$config["__COMMON__"] = __ROOT__ . '/Public/common';
$config["__UPLOADS__"] = __ROOT__ . '/Uploads';
$__ICONS__ = $config["__ICONS__"];
return array(
    //数据库配置信息
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'blog', // 数据库名
    'DB_USER'   => 'biabia123456', // 用户名
    'DB_PWD'    => '519296987', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => 'tp_', // 数据库表前缀
    'DB_CHARSET'=> 'utf8mb4', // 字符集
    'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
    'UPLOAD_SITEIMG_QINIU' => array (
        'config' => array(
            'maxSize'    =>   5*1024*1024,
            'rootPath'   =>    './Uploads/',
            'savePath'   =>    '',
            'saveName'   =>    array('uniqid',''),
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub'    =>    true,
            'subName'    =>    array('date','Ymd'),
        ),
        'driver' => 'Qiniu',
        "driverConfig" => array(
            'accessKey' => 'A3lOKkCWVLWlCqw5m3uAh5CV4LbyPh539OgHiIXe', //这里填七牛AK
            'secretKey' => 'JNPtAMXh5mo3EMakgm8tOOumjZhk7k7HRHMS_RLI', //这里填七牛SK
            'domain' => 'http://cdn.mrabit.com',//这里是查看七牛图片时的图片链接地址的域名
            'bucket' => 'mrabit',//这里是七牛中的“空间”,
        )
    ),
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/static',
        '__HTML__' => __ROOT__ . '/Public/html',
        '__ADMIN__' => __ROOT__ . '/Public/admin',
        '__ICONS__' => __ROOT__ . '/Public/static/icons',
//        '__Font__' => __ROOT__ . 'Public/static',
        '__domainName__' => $_SERVER["SERVER_NAME"],
        '__COMMON__' => __ROOT__ . '/Public/common',
    ),
    C($config),
    C('default_img', $__ICONS__ . '/57d9133f0258c.jpg')
);
