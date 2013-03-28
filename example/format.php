<?php
/**
 *      Copyright (C) 2013 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on 2013-03-27 13:16 V2.2
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
require_once(HIPATH.'config.php');//数据库连接设置,修改本目录下config.php相关参数





// Create the jqGrid instance
$grid = new hgGridRender();
// Lets create the model manually
$Model = array(
    array("name"=>"Integer","width"=>80,
        "formatter"=>"integer",
        "formatoptions"=>array("thousandsSeparator"=>","), "sorttype"=>"integer"),
    array("name"=>"Number","width"=>80,
        "formatter"=>"number", "formatoptions"=>array("decimalPlaces"=>1), "sorttype"=>"number"),
    array("name"=>"Currency","width"=>80,
        "formatter"=>"currency",
        "formatoptions"=>array("decimalPlaces"=>1,"thousandsSeparator"=>",","prefix"=>"$","suffix"=>" USD"), "sorttype"=>"currency"),
    array("name"=>"Email","width"=>120,"formatter"=>"email"),
    array("name"=>"Link","width"=>120,"formatter"=>"link"),
    array("name"=>"Checkbox","width"=>50,"formatter"=>"checkbox")
);
// Let the grid create the model
$grid->setColModel($Model);
// Set grid option datatype to be local
$grid->higridsGO(array("datatype"=>"local"));
//We can add data manually using arrays
$data = array(
    array("Integer"=>200000,"Number"=>60000000.73,"Currency"=>34.2,"Email"=>"john.smith@yahoo.com","Link"=>"http://www.yahoo.com","Checkbox"=>"Yes"),
    array("Integer"=>1600000,"Number"=>75200000.23,"Currency"=>245.2,"Email"=>"joe.woe@google.com","Link"=>"http://www.google.com","Checkbox"=>"Yes"),
    array("Integer"=>652693,"Number"=>34534000.33,"Currency"=>18545.2,"Email"=>"julia.bergman@bing.com","Link"=>"http://www.bing.com","Checkbox"=>"No"),
    array("Integer"=>1237,"Number"=>3450.30,"Currency"=>55597545.2,"Email"=>"roy.corner@msn.com","Link"=>"http://www.msn.com","Checkbox"=>"No")
);
// Let put it using the callGridMethod
$grid->callGridMethod("#grid", 'addRowData', array("Integer",$data));
$grid->higridOP('#grid','#pager',true, null, null, true,true);