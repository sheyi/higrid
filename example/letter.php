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
$connhigrid->query("SET NAMES utf8");

$grid = new hgGridRender($connhigrid);
//嗨网higrid：执行SQL查询
$grid->higridSC = 'SELECT * FROM higrid_letter';
$grid->setUserDate('Y-m-d');
$grid->datearray = array('receiveddate','donedate');
//$grid->datearray = array('datum1', 'datum2');


$grid->table = 'higrid_letter';
$grid->setPrimaryKeyId('letterid');
$grid->dataType = 'json';
$grid->setColModel(); 


//嗨网higrid：隐藏部分列
$grid->higridsCP("letterid", array("hidden"=>true));
$grid->higridsCP("doneby", array("hidden"=>true));
$grid->higridsCP("donedate", array("hidden"=>true));

$grid->higridsCP('letterdate', 
        array("label"=>"收发文日期","width"=>"70",'align'=>'center',"formatter"=>"date",
            "formatoptions"=>array("srcformat"=>"Y-m-d", "newformat"=>"Y-m-d"),
            "editoptions"=>array(
			"defaultValue"=>date("Y-m-d"),
			"dataInit"=>
                "js:function(elm){setTimeout(function(){
                    jQuery(elm).datepicker({dateFormat:'yy-mm-dd'});
                    jQuery('.ui-datepicker').css({'font-size':'75%'});
                },200);}")
            ));


$grid->higridsCP("lettercontent", array("label"=>"函件内容",'width'=>250,"edittype"=>"textarea",
"editrules"=>array("rows"=>10, "cols"=> 100,'width'=>400,"required"=>true)));
$grid->higridsCP('fromunit', array("width"=>"60",'align'=>'center', 'label'=>'发文单位',    "formoptions"=>array("label"=>"发文单位", "elmsuffix"=>"按下拉菜单选择")));
$grid->higridsCP('tounit', array("width"=>"60",'align'=>'center', 'label'=>'收文单位',));
$grid->higridsCP('originid', array("width"=>"80",'label'=>'编号',));
$grid->higridsCP('donedate', array("editoptions"=>array("defaultValue"=>date("Y-m-d"))));

$grid->setSelect("fromunit", array("部门一"=>"部门一","部门二"=>"部门二", "IBM"=>"IBM","google国内"=>"google国内","其他"=>"其他"), false, true, true, array(""=>"默认公司"));
$grid->setSelect("tounit", array("部门一"=>"部门一","部门二"=>"部门二", "IBM"=>"IBM","google国内"=>"google国内","其他"=>"其他"), false, true, true, array(""=>"默认公司"));

//嗨网higrid：设置本脚本文件路径
$grid->setUrl('./example/letter.php');
//嗨网higrid：表格列属性修改
$grid->higridsGO(array(
    "rownumbers"=>true,
    "caption"=>"工作台账",//标题
	"hoverrows"=>true,
	"altRows"=>true,
    "rowNum"=>20,//默认行数
	"height"=>300,
    "rowList"=>array(20,50,100,200),
    "sortname"=>"letterdate",
	"sortable"=>true,
	'sortorder'=>'desc'));//指定排序方式 
$grid->navigator = true;


$grid->higridsNO('navigator', array("excel"=>true,"add"=>true,"edit"=>false,"del"=>false,"view"=>true, "refresh"=>true,"search"=>true,"pdf"=>true));


$grid->higridsNO('add',array("width"=>500,"height"=>300,"dataheight"=>"auto",
"closeAfterAdd"=>true,"reloadAfterSubmit"=>true));//添加数据完后关闭对话框
$grid->higridsNO('edit', array("width"=>"auto","height"=>"auto","dataheight"=>"auto","top"=>200,"left"=>200)); 



$grid->higridsNO('edit',array("width"=>500,"height"=>300,"dataheight"=>"auto",
"closeAfterEdit"=>true,"reloadAfterSubmit"=>true,"editCaption"=>"编辑数据","bSubmit"=>"更新"));

$oper = hgGridcommon::GetParam("oper"); 
// prevent some executions when not excel export 
if($oper == "pdf") { 
    $grid->setPdfOptions(array( 
        // set the page orientation to landscape 
        "page_orientation"=>"R", //L
        // enable header information 
        "header"=>true, 
        // set bigger top margin 
		"font_name_main"=>"stsongstdlight",
		"font_monospaced"=>"stsongstdlight",
		"font_name_data"=>"stsongstdlight",
        "margin_top"=>27, 
        // set logo image 
        "header_logo"=>"higrid.png", 
        // set logo image width 
        "header_logo_width"=>30, 
        //header title 
        "header_title"=>"嗨网pdf导出测试, 打印时间：".date("Y-m-d H:i:s"), 
        // and a header string to print 
        "header_string"=>"higridpdf导出"
        )); 
} 

$grid->exportfile =date("Ymd_H:i:s").'sheyiexport.xml';
$grid->pdffile =date("Ymd_H:i:s").'sheyiexport.pdf';

$grid->higridOP('#cd_lettergrid','#cd_letterpager',true, null, null, true,true);
$connhigrid = null;
?>
