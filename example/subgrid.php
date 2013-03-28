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
$connhigrid->query("SET NAMES utf8");

// Create the jqGrid instance
$grid = new hgGridRender($connhigrid);
// Write the SQL Query
$grid->higridSC = 'SELECT CustomerID, CompanyName, ContactName, Phone, City FROM higrid_customers';
// Set the table to where you update the data
$grid->table = 'customers';
// Set output format to json
$grid->dataType = 'json';
// Let the grid create the model
$grid->setPrimaryKeyId('CustomerID');
$grid->setColModel();
// Set the url from where we obtain the data
$grid->setUrl('./example/subgrid.php');
// Set some grid options
$grid->higridsGO(array(
    "rowNum"=>10,
    "height"=>250,
    "gridview"=>false,
    "rowList"=>array(10,20,30),
    "sortname"=>"CustomerID"
));
$grid->higridsCP('CustomerID', array("label"=>"ID", "width"=>50));
// Set the parameters for the subgrid
$grid->setSubGrid("./example/subgrid2.php",
        array('OrderID', 'RequiredDate', 'ShipName', 'ShipCity', 'Freight'),
        array(60,120,150,100,70),
        array('left','left','left','left','right'));
// Enable navigator
$grid->navigator = true;
// Enable only editing
$grid->higridsNO('navigator', array("excel"=>false,"add"=>false,"edit"=>false,"del"=>false,"view"=>false));
// Enjoy
$grid->higridOP('#grid','#pager',true, null, null, true,true);
$connhigrid = null;