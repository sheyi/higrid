<?php
/**
 *      Copyright (C) 2014 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on  2014-7-13  v2.2.1
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
require_once(HIPATH.'config.php');//数据库连接设置,修改本目录下config.php相关参数





$connhigrid = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
// Tell the db that we use utf-8
hiGridDB::query($connhigrid,"SET NAMES utf8");

// Create the jqGrid instance
$grid = new hgGridRender($connhigrid);
// Write the SQL Query
$grid->higridSC = 'SELECT EmployeeID, LastName, FirstName, Title FROM higrid_employees';
// Set output format to json
$grid->dataType = 'json';
// Let the grid create the model
$grid->setColModel();
// Set the url from where we obtain the data
$grid->setUrl('./example/custom.php');
// Set some grid options
$grid->higridsGO(array(
    "rowNum"=>10,
    "height"=>250,
    "rowList"=>array(10,20,30),
    "sortname"=>"EmployeeID"
));
// Set the url from where we get the data
$grid->setSubGridGrid('./example/custom_details.php');
// Enjoy
$grid->higridOP('#grid','#pager',true, null, null, true,true);
$connhigrid = null;