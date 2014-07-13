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
$connhigrid->query("SET NAMES utf8");
// Get the needed parameters passed from the main grid
$rowid = hgGridcommon::GetParam('EmployeeID', 0);
// Create the jqGrid instance
$grid = new hgGridRender($connhigrid);
// Write the SQL Query
$grid->higridSC = "SELECT OrderID, RequiredDate, ShipName, ShipCity, Freight, EmployeeID FROM higrid_orders WHERE EmployeeID= ?";
// set the ouput format to json
$grid->dataType = 'json';
// Let the grid create the model
$grid->setPrimaryKeyId('OrderID');
$grid->setColModel(null, array((int)$rowid));
// Set the url from where we obtain the data
$grid->setUrl('./example/master_detail.php');
// Set some grid options
$grid->higridsGO(array(
    "rowNum"=>10,
    "footerrow"=>true,
    "userDataOnFooter"=>true,
    "sortname"=>"OrderID",
    "height"=>110
    ));
// Change some property of the field(s)
$grid->higridsCP("RequiredDate", array(
    "formatter"=>"date",
    "formatoptions"=>array("srcformat"=>"Y-m-d H:i:s","newformat"=>"m/d/Y"),
    "search"=>false
    )
);
// on beforeshow form when add we get the customer id and set it for posting
$beforeshow = <<<BEFORE
function(formid)
{
var srow = jQuery("#grid").jqGrid('getGridParam','selrow');
if(srow) {
    var gridrow = jQuery("#grid").jqGrid('getRowData',srow);
    $("#CustomerID",formid).val(gridrow.CustomerID);
}
}
BEFORE;

// disable the CRUD buttons when we initialy load the grid
$initgrid = <<< INIT
jQuery("#add_detail").addClass("ui-state-disabled");
jQuery("#edit_detail").addClass("ui-state-disabled");
jQuery("#del_detail").addClass("ui-state-disabled");
INIT;


$grid->setJSCode($initgrid);
$grid->higridsCP("EmployeeID",array("hidden"=>false,"width"=>20));
$grid->navigator = true;
$grid->higridsNO('navigator', array("excel"=>true,"add"=>true,"edit"=>true,"del"=>true,"view"=>false));
$grid->setNavEvent('add', 'beforeShowForm', $beforeshow);
// Enjoy
$summaryrow = array("Freight"=>array("Freight"=>"SUM"));
$grid->higridOP("#detail","#pgdetail", true, $summaryrow, array((int)$rowid), true,true);
$connhigrid = null;
