<?php
/**
 *      Copyright (C) 2014 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on  2014-7-13  v2.2.1
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
require_once(HIPATH.'config_tree.php');//数据库连接设置,修改本目录下config.php相关参数

// Connection to the server
$connhigrid = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
// Tell the db that we use utf-8
$connhigrid->query("SET NAMES utf8");
// Create the hgTreeGrid instance
$tree = new hgTreeGrid($connhigrid);

$tree->higridSC = "SELECT * FROM higrid_nested_category";

// set the table and primary key
$tree->table = 'nested_category';
$tree->setPrimaryKeyId('category_id');
// set tree model and table configuration
$tree->setTreeModel('nested');
$tree->setTableConfig(array('id'=>'category_id', 'left'=>'lft', 'right'=>'rgt'));


// autoloading is disabled
$tree->autoLoadNodes = false;
// collapse all nodes (default)
$tree->expandAll = true;
// show any error (if any ) from server
$tree->showError = true;

$tree->setColModel();

$tree->setUrl('./example/treeloadallexpanded.php');
$tree->dataType = 'json';
// Some nice setting
$tree->higridsCP('name',array("label"=>"Name", "width"=>170));
$tree->higridsCP('price',array("label"=>"Price", "width"=>90, "align"=>"right"));
$tree->higridsCP('qty_onhand',array("label"=>"Qty", "width"=>90, "align"=>"right"));
$tree->higridsCP('color',array("label"=>"Color", "width"=>100));

// hide the not needed fields
$tree->higridsCP('category_id',array("hidden"=>true,"index"=>"accounts.account_id", "width"=>50));
$tree->higridsCP('lft',array("hidden"=>true));
$tree->higridsCP('rgt',array("hidden"=>true));
$tree->higridsCP('level',array("hidden"=>true));
$tree->higridsCP('uiicon',array("hidden"=>true));

// and finaly set the expand column and height to auto
$tree->higridsGO(array(
    "ExpandColumn"=>"name",
    "height"=>"auto",
    "sortname"=>"account_id"
    ));

$tree->higridtreedisplay('#tree', '#pager', true,null, null, true, true);