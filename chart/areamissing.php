<?php
/**
 *      Copyright (C) 2014 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on  2014-7-13  v2.2.1
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
require_once(HIPATH.'config.php');//数据库连接设置,修改本目录下config.php相关参数

$chart = new higridCharts();
$chart->HCsCO(array(
	"defaultSeriesType"=>"area",
	 "spacingBottom"=>30
))
->HCsT(array('text'=>'Fruit consumption *'))
->HCsST(array(
	"text"=>'* Jane\'s banana consumption is unknown',
	"floating"=> true,
	"align"=>"right",
	"verticalAlign"=> 'bottom',
	"y"=>15
))
->HCsL(array(
	"layout"=> 'vertical',
	"align"=> 'left',
	"verticalAlign"=> 'top',
	"x"=> 150,
	"y"=> 100,
	"floating"=> true,
	"borderWidth"=> 1,
	"backgroundColor"=> '#FFFFFF'

))
->HCsX(array(
	"categories"=> array('Apples', 'Pears', 'Oranges', 'Bananas', 'Grapes', 'Plums', 'Strawberries', 'Raspberries')
))
->HCsY(array(
	"title"=>array("text"=> 'Y-Axis'),
	"labels"=>array("formatter"=>"js:function(){return this.value;}")
))
->HCsTT(array(
	"formatter"=>"function(){return '<b>'+ this.series.name +'</b><br/>'+this.x +': '+ this.y;}"
))
->HCsPO(array(
	"area"=>array(
		"fillOpacity"=> 0.5
	)
))
->HCaS('Jhon', array(0, 1, 4, 4, 5, 2, 3, 7))
->HCaS('Jane', array(1, 0, 3, null, 3, 1, 2, 1));

echo $chart->HCoP('', true, 700, 350);

?>
