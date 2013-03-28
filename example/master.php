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
$grid->higridSC = 'SELECT EmployeeID, FirstName, LastName, HomePhone, City FROM higrid_employees';
// Set the table to where you update the data
$grid->table = 'employees';
// Set output format to json
$grid->dataType = 'json';
// Let the grid create the model
$grid->setColModel();
// Set the url from where we obtain the data
$grid->setUrl('./example/master.php');
// Set some grid options
$grid->higridsGO(array(
    "rowNum"=>10,
    "rowList"=>array(10,20,30),
    "sortname"=>"EmployeeID"
));
$grid->higridsCP('EmployeeID', array("label"=>"ID", "width"=>50));

$selectorder = <<<ORDER
function(rowid, selected)
{
    if(rowid != null) {
        jQuery("#detail").jqGrid('setGridParam',{postData:{EmployeeID:rowid}});
        jQuery("#detail").trigger("reloadGrid");
        // Enable CRUD buttons in navigator when a row is selected
        jQuery("#add_detail").removeClass("ui-state-disabled");
        jQuery("#edit_detail").removeClass("ui-state-disabled");
        jQuery("#del_detail").removeClass("ui-state-disabled");
    }
}
ORDER;
// We should clear the grid data on second grid on sorting, paging, etc.
$cleargrid = <<<CLEAR
function(rowid, selected)
{
   // clear the grid data and footer data
    jQuery("#detail").jqGrid('clearGridData',true);
    // Disable CRUD buttons in navigator when a row is not selected
    jQuery("#add_detail").addClass("ui-state-disabled");
    jQuery("#edit_detail").addClass("ui-state-disabled");
    jQuery("#del_detail").addClass("ui-state-disabled");
}
CLEAR;

$grid->setGridEvent('onSelectRow', $selectorder);
$grid->setGridEvent('onSortCol', $cleargrid);
$grid->setGridEvent('onPaging', $cleargrid);
// Enable navigator
$grid->navigator = true;
// Enable only editing
$grid->higridsNO('navigator', array("excel"=>false,"add"=>false,"edit"=>false,"del"=>false,"view"=>false));
// Enjoy
$grid->higridOP('#grid','#pager',true, null, null, true,true);
$connhigrid = null;