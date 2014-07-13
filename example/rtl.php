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
$grid->higridSC = 'SELECT OrderID, OrderDate, CustomerID, Freight, ShipName FROM higrid_orders';
// Set output format to json
$grid->dataType = 'json';
// Let the grid create the model
$grid->setColModel();
// Set the url from where we obtain the data
$grid->setUrl('./example/rtl.php');
// Set the grid to construct the RTL direction
$grid->higridsGO(array(
    "direction"=>"rtl",
    "recordpos"=>"left",
    "rowNum"=>10,
    "rowList"=>array(10,20,30),
    "sortname"=>"OrderID"
));
// Change some property of the field(s)
$grid->higridsCP("OrderDate", array(
    "formatter"=>"date",
    "formatoptions"=>array("srcformat"=>"Y-m-d H:i:s","newformat"=>"m/d/Y"),
    "search"=>false
    )
);
// Enable navigator
$grid->navigator = true;
$grid->higridsNO('navigator', array("position"=>"right","add"=>false,"edit"=>false,"del"=>false,"view"=>false,"excel"=>false));
// Enjoy
$grid->higridOP('#grid','#pager',true, null, null, true,true);
$connhigrid = null;