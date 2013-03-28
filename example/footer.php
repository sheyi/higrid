<?php
/**
 *      Copyright (C) 2013 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on 2013-03-27 13:16 V2.2
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
require_once(HIPATH.'config.php');//数据库连接设置,修改本目录下config.php相关参数

$connhigrid = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
// Tell the db that we use utf-8
hiGridDB::query($connhigrid,"SET NAMES utf8");


// Create the jqGrid instance
$grid = new hgGridRender($connhigrid);
// Write the SQL Query
$grid->higridSC = 'SELECT OrderID, RequiredDate, ShipName, ShipCity, Freight FROM higrid_orders';
// set the ouput format to json
$grid->dataType = 'json';
// Let the grid create the model
$grid->setColModel();
// Set the url from where we obtain the data
$grid->setUrl('./example/footer.php');
// Set some grid options
$grid->higridsGO(array("rowNum"=>10,"rowList"=>array(10,20,130),"sortname"=>"OrderID"));
// Enable footerdata an tell the grid to obtain it from the request
$grid->higridsGO(array("footerrow"=>true,"userDataOnFooter"=>true));
// Change some property of the field(s)
$grid->higridsCP("RequiredDate", array("formatter"=>"date","formatoptions"=>array("srcformat"=>"Y-m-d H:i:s","newformat"=>"m/d/Y")));
// At end call footerData to put total  label
$grid->callGridMethod('#grid', 'footerData', array("set",array("ShipCity"=>"Total:")));
// Set which parameter to be sumarized
$summaryrows = array("Freight"=>array("Freight"=>"SUM"));
$grid->higridOP('#grid','#pager',true,$summaryrows , null, true,true);
$connhigrid = null;
