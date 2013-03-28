<?php
/**
 *      Copyright (C) 2013 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on 2013-03-27 13:16 V2.2
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
$grid->higridSC = 'SELECT OrderID, OrderDate, CustomerID, Freight, ShipName FROM higrid_orders';
// set the ouput format to json
$grid->dataType = 'json';
$grid->table ="orders";
$grid->setPrimaryKeyId("OrderID");
// Let the grid create the model
$grid->setColModel();
// Set the url from where we obtain the data
$grid->setUrl('./example/autocomplete_toolbar.php');
// Set grid caption using the option caption
$grid->higridsGO(array(
    "caption"=>"Autocomplete in tollbar search",
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
// set autocomplete. Serch for name and ID, but select a ID
// set it only for editing and not on serch
$grid->setAutocomplete("ShipName",false,"SELECT DISTINCT ShipName FROM higrid_orders WHERE ShipName LIKE ? ORDER BY ShipName",null,false,true);
$grid->datearray = array('OrderDate');
// Enjoy
$grid->navigator = true;
$grid->toolbarfilter = true;
$grid->higridsNO('navigator', array("search"=>false, "excel"=>false,"add"=>false, "edit"=>false, "del"=>false));
$grid->higridOP('#grid','#pager',true, null, null, true,true);
$connhigrid = null;
