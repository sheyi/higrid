<?php
/**
 *      Copyright (C) 2013 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on 2013-03-27 13:16 V2.2
 */




/*==================================数据库设置,设置完毕后取消本行和第6行注释
define('DB_DSN','mysql:host=localhost;dbname=higridsql');//将higridsql替换成您的mysql数据库名
define('DB_USER', 'higriduser');     // 将higriduser替换成您的mysql用户名
define('DB_PASSWORD', 'higridpass'); // 将higridpass替换成您的mysql密码
*/



require(HIPATH.'../../config/higrid.php');//演示数据库设置,经过上述设置后注释本条
require(HIPATH.'../../config/demo_higrid_pro.php');//演示数据库设置,经过上述设置后注释本条

defined('IN_HIGRID') || define('IN_HIGRID', true); // 常量定义
require_once(HIPATH.'../higrid/HiGrid_chart.php');// higrid php主文件