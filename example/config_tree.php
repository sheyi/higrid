<?php
/**
 *      Copyright (C) 2014 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on  2014-7-13  v2.2.1
 */




require(HIPATH.'../config/data.php');//!!!!!!!!!!!!!!!!!!!!!!!!!!!这是higrid的演示数据库设置,请注释本条
//require(HIPATH.'../config/mysql_setting.php');//!!!!!!!!!!!!!!!!!!!!!!!!!!!你的配置文件在这里，配置完毕后取消注释：去掉开头的//

defined('IN_HIGRID') || define('IN_HIGRID', true); // 常量定义
require_once(HIPATH.'../higrid/HiGrid_tree.php');// higrid tree php主文件