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
// Get the needed parameters passed from the main grid
$rowid = hgGridcommon::GetParam("id");
if(!$rowid) die("Missed parameters");
// Create the base jqGrid instance
$grid = new jqGrid($connhigrid);
// Write the SQL Query
$grid->SubgridCommand = "SELECT OrderID, RequiredDate, ShipName, ShipCity, Freight FROM higrid_orders WHERE CustomerID=? ORDER BY OrderID desc";
// set the ouput format to json
$grid->dataType = 'json';
// Use the build in function for the simple subgrid
$grid->querySubGrid(array(&$rowid));
$connhigrid = null;