<?php
/**
 *      Copyright (C) 2013 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on 2013-03-27 13:16 V2.2
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
require_once(HIPATH.'config_tree.php');//数据库连接设置,修改本目录下config.php相关参数



// Connection to the server
$connhigrid = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
// Tell the db that we use utf-8
$connhigrid->query("SET NAMES utf8");
// Create the hgTreeGrid instance
$tree = new hgTreeGrid($connhigrid);

$tree->higridSC = "SELECT * FROM higrid_accounts";

// set the table and primary key
$tree->table = 'higrid_accounts';
$tree->setPrimaryKeyId('account_id');
// set tree model and table configuration
$tree->setTreeModel('adjacency');
$tree->setTableConfig(array('id'=>'account_id', 'parent'=>'parent_id'));


// autoloading is disabled
$tree->autoLoadNodes = false;
// collapse all nodes (default)
$tree->expandAll = true;
// show any error (if any ) from server
$tree->showError = true;

$tree->setColModel();

$tree->setUrl('./example/treeaddnodes.php');
$tree->dataType = 'json';
// Some nice setting
$tree->higridsCP('name',array("label"=>"Name", "width"=>170));
$tree->higridsCP('acc_num',array("label"=>"Number", "width"=>170));
$tree->higridsCP('debit',array("label"=>"Debit", "width"=>90, "align"=>"right"));
$tree->higridsCP('credit',array("label"=>"Credit", "width"=>90, "align"=>"right"));
$tree->higridsCP('balance',array("label"=>"Balance", "width"=>90, "align"=>"right"));

// hide the not needed fields
$tree->higridsCP('account_id',array("hidden"=>true));
$tree->higridsCP('parent_id',array("hidden"=>true));

// and finaly set the expand column and height to auto
$tree->higridsGO(array(
    "ExpandColumn"=>"name",
    "height"=>'auto',
    "sortname"=>"account_id",
    // allow automatic scrolling of the rows
    "scrollrows"=>true
    ));
// enable key navigation
$tree->callGridMethod('#tree', 'bindKeys');
$tree->navigator = true;
$tree->higridsNO('navigator', array("add"=>true,"edit"=>false, "del"=>false, "search"=>false, "excel"=>false));
$tree->higridtreedisplay('#tree', '#pager', true,null, null, true, true);