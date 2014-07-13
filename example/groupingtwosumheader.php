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
$grid->higridSC = 'SELECT OrderID, OrderDate, CustomerID, EmployeeID, Freight, ShipName FROM higrid_orders';
// set the ouput format to json
$grid->dataType = 'json';
// Let the grid create the model from SQL query
$grid->setColModel();
// Set the url from where we obtain the data
$grid->setUrl('./example/groupingtwosumheader.php');
// Set alternate background using altRows property
$grid->higridsGO(array(
    "rowNum"=>10,
    "sortname"=>"OrderID",
    "rowList"=>array(10,20,50),
    "height"=>'auto',
    "footerrow"=>true,
    "userDataOnFooter"=>true,
    "grouping"=>true,
    "groupingView"=>array(
        "groupField" => array('CustomerID', 'EmployeeID'),
        "groupColumnShow" => array(true, true),
        "groupText" =>array('<b> Client:{0}</b> Sum Freight: {Freight}', '<b>Employee: {0}</b> Sum Freight: {Freight}'),
        "groupSummary" => array(false, false)
    ) 
    ));
// Change some property of the field(s)
$grid->higridsCP("OrderID", array("label"=>"ID", "width"=>60));
$grid->higridsCP("OrderDate", array(
    "formatter"=>"date",
    "formatoptions"=>array("srcformat"=>"Y-m-d H:i:s","newformat"=>"m/d/Y")
    )
);
// Add a summary property to the Freight Column
$grid->higridsCP("Freight", array("summaryType"=>"sum", "summaryTpl"=>"{0}", "formatter"=>"number"));
$summaryrows = array("Freight"=>array("Freight"=>"SUM"));
// Enjoy
$grid->higridOP('#grid','#pager',true, $summaryrows, null, true,true);
$connhigrid = null;