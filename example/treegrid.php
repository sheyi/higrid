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

$tree->higridSC = "SELECT * FROM higrid_nested_category";

// set the table and primary key
$tree->table = 'nested_category';
$tree->setPrimaryKeyId('category_id');
// set tree model and table configuration
$tree->setTreeModel('nested');
// set the icon db field for the leaf nodes.
$tree->setTableConfig(array('id'=>'category_id', 'left'=>'lft', 'right'=>'rgt', 'icon'=>'uiicon'));

// autoloading nodes
$tree->autoLoadNodes = true;
// show any error (if any ) from server
$tree->showError = true;

$tree->setColModel();

$tree->setUrl('./example/treegrid.php');
$tree->dataType = 'json';
// Some nice setting
$tree->higridsCP('name',array("label"=>"Name", "width"=>90));
$tree->higridsCP('price',array("label"=>"Price", "width"=>90, "align"=>"right", "hidden"=>true));
$tree->higridsCP('qty_onhand',array("label"=>"Qty", "width"=>90, "align"=>"right","hidden"=>true));
$tree->higridsCP('color',array("label"=>"Color", "width"=>100, "hidden"=>true));

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
    "hoverrows"=>true,
    "sortname"=>"account_id"
    ));
// remove the border
$tree->setGridEvent("gridComplete", "function(){ $('tr.jqgrow td').css({'border':'0px none'});}");
// remove the header
$tree->setJSCode("$('.ui-jqgrid-htable','.ui-jqgrid-hbox').hide();");
// set navigation
$tree->callGridMethod('#tree', 'bindKeys');

//Enjoy
$tree->higridtreedisplay('#tree', '', true,null, null, true, false);
