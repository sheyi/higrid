<?php
/**
 *      Copyright (C) 2013 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on 2013-02-22 13:16 V2.1
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
require_once(HIPATH.'config.php');//数据库连接设置,修改本目录下config.php相关参数

$connhigridhigrid = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
$connhigridhigrid->query("SET NAMES utf8");

$grid = new hgGridRender($connhigridhigrid);
//嗨网higrid：执行SQL查询
$grid->higridSC = 'SELECT * FROM higrid_testplan WHERE SE="敏捷"';//test ok

$grid->setUserDate('Y-m-d');
$grid->datearray = array('SubmitData','GiveData','StartTestData','EndTestData');
$grid->table = 'higrid_testplan';
$grid->setPrimaryKeyId('idTestplan');
$grid->dataType = 'json';
$grid->setColModel(); 

$grid->higridsCP('idTestplan',array("width"=>"40",'align'=>'center', 'label'=>'编号'));
$grid->higridsCP('TestType',array("width"=>"60",'align'=>'center', 'label'=>'任务类型',));
$grid->setSelect("TestType", array("SQA测试"=>"SQA测试","DVT测试"=>"DVT测试", "FUV测试"=>"FUV测试",), false, true, true, array(""=>"SQA测试"));
$grid->higridsCP('Projectmanager',array("width"=>"70",'align'=>'center', 'label'=>'项目负责人',));
$grid->higridsCP('SE',array("width"=>"60",'align'=>'center', 'label'=>'SE负责人',));
$grid->higridsCP('PM',array("width"=>"60",'align'=>'center', 'label'=>'PM负责人',));
$grid->higridsCP('CustomerName',array("width"=>"60",'align'=>'center', 'label'=>'顾客名称',));
$grid->higridsCP('ProductName',array("width"=>"60",'align'=>'center', 'label'=>'产品名称',));
$grid->higridsCP('Firmwareversion',array("width"=>"60",'align'=>'center', 'label'=>'版本号',));
$grid->higridsCP('Taskcontent',array("width"=>"100",'align'=>'center', 'label'=>'任务描述',"edittype"=>"textarea",
"editrules"=>array("rows"=>10, "cols"=> 100,'width'=>400)));

$grid->setSelect("Projectmanager", array("张璐"=>"张璐","胡春松"=>"胡春松", "姚岗"=>"姚岗","周洪凯"=>"周洪凯","测试部"=>"测试部"), false, true, true, array(""=>"周洪凯"));
$grid->setSelect("SE", array("顾承敏"=>"顾承敏","朱忠华"=>"朱忠华", "丁鹏"=>"丁鹏","包华进"=>"包华进","吴茂静"=>"吴茂静","陈坤"=>"陈坤","陈亚飞"=>"陈亚飞",), false, true, true, array(""=>"顾承敏"));
$grid->setSelect("PM", array("杜倩茹"=>"杜倩茹","吴秀华"=>"吴秀华", "郭晶"=>"郭晶","王巧月"=>"王巧月",), false, true, true, array(""=>"杜倩茹"));
$grid->setSelect("CustomerName", array("产品管理部"=>"产品管理部","客户服务部"=>"客户服务部", "研发部"=>"研发部","物联网产品部"=>"物联网产品部",), false, true, true, array(""=>"产品管理部"));

$grid->higridsCP('SubmitData', 
        array("label"=>"提交日期","width"=>"70",'align'=>'center',"formatter"=>"date",
            "formatoptions"=>array("srcformat"=>"Y-m-d", "newformat"=>"Y-m-d"),
            "editoptions"=>array(
			"defaultValue"=>date("Y-m-d"),
			"dataInit"=>
                "js:function(elm){setTimeout(function(){
                    jQuery(elm).datepicker({dateFormat:'yy-mm-dd'});
                    jQuery('.ui-datepicker').css({'font-size':'75%'});
                },200);}")
            ));

$grid->higridsCP('GiveData', 
        array("label"=>"分配日期","width"=>"70",'align'=>'center',"formatter"=>"date",
            "formatoptions"=>array("srcformat"=>"Y-m-d", "newformat"=>"Y-m-d"),
            "editoptions"=>array(
			"defaultValue"=>date("Y-m-d"),
			"dataInit"=>
                "js:function(elm){setTimeout(function(){
                    jQuery(elm).datepicker({dateFormat:'yy-mm-dd'});
                    jQuery('.ui-datepicker').css({'font-size':'75%'});
                },200);}")
            ));

$grid->higridsCP('StartTestData', 
        array("label"=>"开始测试日期","width"=>"80",'align'=>'center',"formatter"=>"date",
            "formatoptions"=>array("srcformat"=>"Y-m-d", "newformat"=>"Y-m-d"),
            "editoptions"=>array(
			"defaultValue"=>date("Y-m-d"),
			"dataInit"=>
                "js:function(elm){setTimeout(function(){
                    jQuery(elm).datepicker({dateFormat:'yy-mm-dd'});
                    jQuery('.ui-datepicker').css({'font-size':'75%'});
                },200);}")
            ));

$grid->higridsCP('EndTestData', 
        array("label"=>"结束测试日期","width"=>"80",'align'=>'center',"formatter"=>"date",
            "formatoptions"=>array("srcformat"=>"Y-m-d", "newformat"=>"Y-m-d"),
            "editoptions"=>array(
			"defaultValue"=>date("Y-m-d"),
			"dataInit"=>
                "js:function(elm){setTimeout(function(){
                    jQuery(elm).datepicker({dateFormat:'yy-mm-dd'});
                    jQuery('.ui-datepicker').css({'font-size':'75%'});
                },200);}")
            ));

$grid->higridsCP('TaskState',array("width"=>"60",'align'=>'center', 'label'=>'任务状态',));
$grid->setSelect("TaskState", array("已提交"=>"已提交","已分配"=>"已分配", "开始测试"=>"开始测试","结束测试"=>"结束测试","版本打回"=>"版本打回",), false, true, true, array(""=>"已提交"));

//设置本脚本文件路径
$grid->setUrl('./example/testplan.php');
//表格列属性修改
$grid->higridsGO(array(
    "rownumbers"=>true,
    "caption"=>"测试任务",//标题
	"hoverrows"=>true,
	"altRows"=>true,
    "rowNum"=>20,//默认行数
	"height"=>350,
	"width"=>1100,
    "rowList"=>array(20,50,100,200),
    //"sortname"=>"Index",
	//"sortable"=>true,
	/*'sortorder'=>'desc'*/));//指定排序方式 
$grid->navigator = true;


$grid->higridsNO('navigator', array("excel"=>true,"add"=>false,"edit"=>true,"del"=>false,"view"=>true, "refresh"=>true,"search"=>true,"pdf"=>false));


$grid->higridsNO('add',array("width"=>500,"height"=>450,"dataheight"=>"auto",
"closeAfterAdd"=>true,"reloadAfterSubmit"=>true));//添加数据完后关闭对话框
$grid->higridsNO('edit', array("width"=>"auto","height"=>"auto","dataheight"=>"auto","top"=>200,"left"=>200)); 

$grid->higridsNO('edit',array("width"=>500,"height"=>450,"dataheight"=>"auto",
"closeAfterEdit"=>true,"reloadAfterSubmit"=>true,"editCaption"=>"编辑数据","bSubmit"=>"更新"));

$grid->higridOP('#cd_lettergrid','#cd_letterpager',true, null, null, true,true);
$connhigridhigrid = null;
?>