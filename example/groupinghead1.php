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
$grid->higridSC = 'SELECT OrderID, OrderDate, CustomerID, Freight, ShipName, ShipCity, ShipCountry FROM higrid_orders';
// set the ouput format to json
$grid->dataType = 'json';
// Let the grid create the model from SQL query
$grid->setColModel();
// Set the url from where we obtain the data
$grid->setUrl('./example/groupinghead1.php');
// Set alternate background using altRows property
$grid->higridsGO(array(
    "rowNum"=>10,
    "sortname"=>"OrderID",
    "rowList"=>array(10,20,50),
    "height"=>'auto'
));
// Change some property of the field(s)
$grid->higridsCP("OrderID", array("label"=>"ID", "width"=>60));
$grid->higridsCP("OrderDate", array(
    "formatter"=>"date",
    "formatoptions"=>array("srcformat"=>"Y-m-d H:i:s","newformat"=>"m/d/Y")
    )
);
// Enjoy
// Set grouping header using callGridMethod
$grid->callGridMethod("#grid", "setGroupHeaders", array(array(
    "useColSpanStyle"=>true,
    "groupHeaders"=>array(
        array(
            "startColumnName"=>'OrderID', 
            "numberOfColumns"=>2, 
            "titleText"=>'Order Info'
        ),
        array(
            "startColumnName"=>'ShipName', 
            "numberOfColumns"=>3, 
            "titleText"=>'Shipping Details'
        )
    )
)));
$grid->higridOP('#grid','#pager',true, null, null, true,true);
$connhigrid = null;