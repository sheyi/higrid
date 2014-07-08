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
$connhigrid->query("SET NAMES utf8");

$grid = new hgGridRender($connhigrid);
$grid->higridSC = 'SELECT * FROM higrid_xujienb';

$grid->table = 'higrid_xujienb';
$grid->dataType = 'json';
$grid->setColModel(); //default

$grid->higridsCP("mid", array("hidden"=>true));
$grid->higridsCP('pic_url', array("width"=>"200",'label'=>'热销',"formatter"=>"js:formatImage", "unformat"=>"js:unformatImage"));
$grid->higridsCP('product', array("width"=>"200",'label'=>'商品',));
$grid->higridsCP('spec', array("width"=>"400",'label'=>'规格',));
$grid->higridsCP('price', array("width"=>"100",'align'=>'right', "formatter"=>"number",'label'=>'价格',));
$grid->higridsCP("mdate", array("width"=>"100",'label'=>'更新日期',));
$grid->higridsCP('vsyes', array("width"=>"100",'align'=>'right', "formatter"=>"number",'label'=>'比昨天',));
$grid->higridsCP('vslastweek', array("width"=>"100",'align'=>'right', "formatter"=>"js:formatRating","unformat"=>"js:unformatRating",'label'=>'比上周',));
$grid->higridsCP('vslastmonth', array("width"=>"100",'align'=>'right', "formatter"=>"js:formatRating","unformat"=>"js:unformatRating",'label'=>'比上月',));
$grid->higridsCP('vslastmonth', array("width"=>"100",'align'=>'right', "formatter"=>"js:formatRating","unformat"=>"js:unformatRating",'label'=>'比上月',));







$grid->setUrl('./example/products.php');
// Set some grid options
$grid->higridsGO(array(
    "rownumbers"=>true,//设置显示行号
   //"rownumWidth"=>35,//设置显示行号的宽度 
    //"caption"=>"通讯录",//标题
	"hoverrows"=>true,//变色，滑过行高亮显示
	"altRows"=>true,//多选
    "rowNum"=>20,//默认行数
	"height"=>400,
	//"shrinkToFit" => false,//去掉水平滚动条
    "rowList"=>array(20,50,100,200),
    //"sortname"=>"id",//默认按CustomerID的asc排序
	//"sortable"=>true, //设置列与列之间可以拖拽表头排序 
    ));





// We can put JS from php
$custom = <<<CUSTOM
function formatImage(cellValue, options, rowObject) {
    var imageHtml = "<img src='http://higrid.qiniudn.com/higrid_demo_images/" + cellValue + "' originalValue='" + cellValue + "' />";
return imageHtml;
}
function unformatImage(cellValue, options, cellObject) {
    return $(cellObject.html()).attr("originalValue");
}
function formatRating(cellValue, options, rowObject) {
    var color = (parseInt(cellValue) > 0) ? "green" : "red";
    var cellHtml = "<span style='color:" + color + "' originalValue='" +
                   cellValue + "'>" + cellValue + "</span>";
    return cellHtml;
}
function unformatRating(cellValue, options, cellObject) {
    return $(cellObject.html()).attr("originalValue");
}
CUSTOM;
// Let set the code which is executed at end
$grid->setJSCode($custom);












$grid->navigator = true;
$grid->higridsNO('navigator', array("excel"=>true,"add"=>true,"edit"=>false,"del"=>false,"view"=>true, "refresh"=>false,"search"=>true,"pdf"=>false));

$grid->higridOP('#cd_appendixh_spricegrid','cd_appendixh_spricepager',true, null, null, true,true);

$connhigrid = null;
