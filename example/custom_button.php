<?php
/**
 *      Copyright (C) 2014 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on  2014-7-13  v2.2.1
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
require_once(HIPATH.'config.php');//数据库连接设置,修改本目录下config.php相关参数





// Connection to the server
$connhigrid = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
// Tell the db that we use utf-8
$connhigrid->query("SET NAMES utf8");

// Create the jqGrid instance
$grid = new hgGridRender($connhigrid);
// Write the SQL Query
$grid->higridSC = 'SELECT OrderID, Freight, OrderDate, ShipCity  FROM higrid_orders';
// Set output format to json
$grid->dataType = 'json';
// Let the grid create the model
$grid->setColModel();
// Set the url from where we obtain the data
$grid->setUrl('./example/custom_button.php');
// Set some grid options
$grid->higridsGO(array(
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
// Enable excel export
$grid->higridsNO('navigator', array("excel"=>false,"add"=>false,"edit"=>false,"del"=>false,"view"=>false));
// add a custom button via the build in callGridMethod
// note the js: before the function
$buttonoptions = array("#pager",
    array("caption"=>"higrid自定义", "onClickButton"=>"js: function(){alert('higrid自定义按钮被点击')}")
);
$grid->callGridMethod("#grid", "navButtonAdd", $buttonoptions);
// Enjoy
$grid->higridOP('#grid','#pager',true, null, null, true,true);
$connhigrid = null;