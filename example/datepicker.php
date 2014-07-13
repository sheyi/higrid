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
// set the ouput format to json
$grid->dataType = 'json';
$grid->table ="orders";
$grid->setPrimaryKeyId("OrderID");
// Let the grid create the model
$grid->setColModel();
// Set the url from where we obtain the data
$grid->setUrl('./example/datepicker.php');
// Set grid caption using the option caption
$grid->higridsGO(array(
    "caption"=>"Datepicker method",
    "rowNum"=>10,
    "sortname"=>"OrderID",
    "hoverrows"=>true,
    "rowList"=>array(10,20,50),
    ));
// Change some property of the field(s)
$grid->higridsCP("OrderID", array("label"=>"ID", "width"=>60));
$grid->higridsCP("OrderDate", array(
    "formatter"=>"date",
    "formatoptions"=>array("srcformat"=>"Y-m-d H:i:s","newformat"=>"m/d/Y")
    )
);
// Set the datepicker on OrderDate field. Note that the script automatically
// converts the user date set in the jqGrid 
$grid->setDatepicker('OrderDate', array("buttonIcon"=>true), true, false);
$grid->datearray = array('OrderDate');
// Enjoy
$grid->navigator = true;
$grid->higridsNO('navigator', array("search"=>false, "excel"=>false));
$grid->higridOP('#grid','#pager',true, null, null, true,true);
$connhigrid = null;
