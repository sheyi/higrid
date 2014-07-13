<?php
/**
 *      Copyright (C) 2014 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on  2014-7-13  v2.2.1
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
//require_once(HIPATH.'config.php');//数据库连接设置,修改本目录下config.php相关参数




defined('IN_HIGRID') || define('IN_HIGRID', true); // 本例不需要数据库,仅用在本例 常量定义
require_once(HIPATH.'../higrid/HiGrid.php');// 本例不需要数据库,仅用在本例  higrid php主文件

$grid = new hgGridRender();
//嗨网higrid：执行SQL查询

$Model = array(
    array("name"=>"Integer", "editable"=>true,"sorttype"=>"integer",'label'=>'整数',
        "editrules"=>array("required"=>true, "integer"=>true, "minValue"=>100,"maxValue"=>1000) ),
    array("name"=>"Number","editable"=>true,"sorttype"=>"number",'label'=>'小数',
        "editrules"=>array("required"=>true, "number"=>true, "minValue"=>0,"maxValue"=>10000) ),
    array("name"=>"Currency","editable"=>true, "sorttype"=>"number",'label'=>'货币',
        "editrules"=>array("required"=>true, "number"=>true, "minValue"=>0)),
    array("name"=>"Email","editable"=>true,
        "formatter"=>"email",
        "editrules"=>array("email"=>true)
        ),
    array("name"=>"Link","editable"=>true,'label'=>'超连接',
        "width"=>120,
        "formatter"=>"link",
        "editrules"=>array("url"=>true)
        ),
);

$grid->setColModel($Model);
$grid->higridsGO(array("datatype"=>"local", "editurl"=>"higriddefaulttest.txt"));
$data = array(
    array("Integer"=>200000,"Number"=>60000000.73,"Currency"=>34.2,"Email"=>"john.smith@yahoo.com","Link"=>"http://www.yahoo.com"),
    array("Integer"=>1600000,"Number"=>75200000.23,"Currency"=>245.2,"Email"=>"joe.woe@google.com","Link"=>"http://www.google.com"),
    array("Integer"=>652693,"Number"=>34534000.33,"Currency"=>18545.2,"Email"=>"julia.bergman@bing.com","Link"=>"http://www.bing.com"),
    array("Integer"=>1237,"Number"=>3450.30,"Currency"=>55597545.2,"Email"=>"roy.corner@msn.com","Link"=>"http://www.msn.com")
);

$grid->callGridMethod("#grid", 'addRowData', array("Integer",$data));
$grid->navigator = true;

$grid->higridsNO('navigator', array("excel"=>false,"add"=>false,"edit"=>true,"del"=>false,"view"=>false, "search"=>false));
$grid->higridsNO('edit',array("closeAfterEdit"=>true,"reloadAfterSubmit"=>false));
$grid->higridOP('#grid','#pager',true, null, null, true,true);
?>