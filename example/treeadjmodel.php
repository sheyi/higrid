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

$tree->higridSC = "SELECT * FROM higrid_adj_table";

// set the table and primary key
$tree->table = 'adj_table';
$tree->setPrimaryKeyId('emp_id');
// set tree model and table configuration
$tree->setTreeModel('adjacency');
$tree->setTableConfig(array('id'=>'emp_id', 'parent'=>'boss_id'));

// autoloading is disabled
$tree->autoLoadNodes = false;
// collapse all nodes (default)
$tree->expandAll = true;
// show any error (if any ) from server
$tree->showError = true;

$tree->setColModel();

$tree->setUrl('./example/treeadjmodel.php');
$tree->dataType = 'json';
// Some nice setting
$tree->higridsCP('name',array("label"=>"Employee", "width"=>170));
$tree->higridsCP('salary',array("label"=>"Salary", "align"=>"right","width"=>90));

// hide the not needed fields
$tree->higridsCP('emp_id',array("hidden"=>true));
$tree->higridsCP('boss_id',array("hidden"=>true));

// and finaly set the expand column and height to auto
$tree->higridsGO(array(
    "ExpandColumn"=>"name",
    "height"=>'auto',
    "sortname"=>"emp_id",
    // allow automatic scrolling of the rows
    "scrollrows"=>true
    ));
// enable key navigation
$tree->callGridMethod('#tree', 'bindKeys');

$tree->navigator = true;
$tree->higridsNO('navigator', array("add"=>true,"edit"=>true, "del"=>true, "search"=>false, "excel"=>false));
$tree->higridtreedisplay('#tree', '#pager', true,null, null, true, true);