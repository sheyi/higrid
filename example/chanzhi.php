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
//嗨网higrid：执行SQL查询
$grid->higridSC = 'SELECT * FROM higrid_chanzhi';

$grid->table = 'cd_chanzhi';
$grid->setPrimaryKeyId('period');
$grid->dataType = 'json';
$grid->setColModel(); 

$sarr = <<< FFF
{ "groupOp":"AND",
    "rules":[
      {"field":"period","op":"bw","data":"2012"}
     ]
}
FFF;



$grid->higridsCP('period', 
        array("label"=>"月份","width"=>"30",'align'=>'center',"formatter"=>"date",
            "formatoptions"=>array("srcformat"=>"Y-m-d", "newformat"=>"Y-m"),		
            "editoptions"=>array(
			"defaultValue"=>date("Y-m-d"),
			"dataInit"=>
                "js:function(elm){setTimeout(function(){
                    jQuery(elm).datepicker({dateFormat:'yy-mm-dd'});
                    jQuery('.ui-datepicker').css({'font-size':'75%'});
                },200);}")
            ));

$grid->higridsCP('ycommission', array("width"=>"60",'align'=>'right', "formatter"=>"number",'label'=>'合同一',));
$grid->higridsCP('ycc2', array("width"=>"80",'align'=>'right', "formatter"=>"currency",'label'=>'合同二',));
$grid->higridsCP('mcommission', array("width"=>"60",'align'=>'right', "formatter"=>"currency",'label'=>'合同一',));
$grid->higridsCP('mcc2', array("width"=>"60",'align'=>'right', "formatter"=>"currency",'label'=>'合同二',));



//嗨网higrid：设置本脚本文件路径
$grid->setUrl('./example/chanzhi.php');
//嗨网higrid：表格列属性修改
$grid->higridsGO(array(
    "rownumbers"=>true,//设置显示行号
    "caption"=>"数据台账",//标题
	"hoverrows"=>true,
	"altRows"=>true,
    "rowNum"=>200,//默认行数
	"height"=>300,
    "rowList"=>array(20,50,100,200),
	"sortable"=>true, //设置列与列之间可以拖拽表头排序 
    "search"=>true, 
    "postData"=>array( "filters"=> $sarr ),
	'sortorder'=>'desc'));//指定排序方式 asc desc

$grid->navigator = true;
$grid->higridsNO('navigator', array("excel"=>true,"add"=>false,"edit"=>false,"del"=>false,"view"=>true, "refresh"=>true,"search"=>true,"pdf"=>true));


$grid->higridsNO('add',array("width"=>500,"height"=>380,"dataheight"=>"auto",
"closeAfterAdd"=>true,"reloadAfterSubmit"=>true));//添加数据完后关闭对话框

 //设置编辑对话框的信息
$grid->higridsNO('edit',array("width"=>500,"height"=>380,"dataheight"=>"auto",
"closeAfterEdit"=>true,"reloadAfterSubmit"=>true,"editCaption"=>"编辑数据","bSubmit"=>"更新"));

$grid->higridsGO(array("footerrow"=>true,"userDataOnFooter"=>true));//启用脚注行
$grid->callGridMethod('#cd_chanzhigrid', 'footerData', array("set",array('period'=>'小计:')));


$grid->callGridMethod("#cd_chanzhigrid", "setGroupHeaders", array(array(
    "useColSpanStyle"=>true,
    "groupHeaders"=>array(
        array(
            "startColumnName"=>'ycommission', 
            "numberOfColumns"=>2, 
            "titleText"=>'年初计划'
        ),
        array(
            "startColumnName"=>'mcommission', 
            "numberOfColumns"=>2, 
            "titleText"=>'每月上报'
        )
    )
)));



$summaryrows = array("ycommission"=>array("ycommission"=>"SUM"),
"ycc2"=>array("ycc2"=>"SUM"),
"mcommission"=>array("mcommission"=>"SUM"),
"mcc2"=>array("mcc2"=>"SUM"),);

$grid->higridOP('#cd_chanzhigrid','#cd_chanzhipager',true, $summaryrows, null, true,true);

$connhigrid = null;
?>
