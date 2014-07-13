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
$chart->HCsCO(array("zoomType"=>"xy"))
->HCsT(array('text'=>'Average Monthly Weather Data for Tokyo'))
->HCsST(array('text'=>'Source: WorldClimate.com'))
->HCsX(array(
	"categories"=>array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec')
))
->HCsY(array(
	array( 
		"labels"=>array(
			"formatter"=>"js:function(){return this.value +'C';}",
			"style"=>array("color"=>'#89A54E')
		),
		"title"=>array(
			'text'=> 'Temperature',
			"style"=>array("color"=>'#89A54E')
		),
		"opposite"=> true
	),
	array( 
		"title"=>array(
			'text'=> 'Rainfall',
			"style"=>array("color"=>'#4572A7')
		),
		"labels"=>array(
			"formatter"=>"js:function(){return this.value +'mm';}",
			"style"=>array("color"=>'#4572A7')
		),
	),
	array(
		"labels"=>array(
			"formatter"=>"js:function(){return this.value +'mb';}",
			"style"=>array("color"=>'#AA4643')
		),
		"title"=>array(
			'text'=> 'Sea-Level Pressure',
			"style"=>array("color"=>'#AA4643')
		),
		"opposite"=> true
	),
))
->HCsTT(array("formatter"=>"function(){
	var unit = {
		'Rainfall': 'mm',
		'Temperature': 'C',
		'Sea-Level Pressure': 'mb'
	}[this.series.name];
	return ''+	this.x +': '+ this.y +' '+ unit;
	}"
))
->HCsL(array(
	"layout"=> 'vertical',
	"align"=> 'left',
	"x"=> 120,
	"y"=> 80,
	"verticalAlign"=> 'top',
	"floating"=> true,
	"backgroundColor"=> '#FFFFFF'
))
->HCaS('Rainfall', array(49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4))
->setSeriesOption('Rainfall',array('type'=>'column', "color"=>'#4572A7',"yAxis"=>1))
->HCaS('Sea-Level Pressure', array(1016, 1016, 1015.9, 1015.5, 1012.3, 1009.5, 1009.6, 1010.2, 1013.1, 1016.9, 1018.2, 1016.7))
->setSeriesOption('Sea-Level Pressure',array(
	'type'=>'spline',
	"color"=>'#AA4643',
	"yAxis"=>2,
	"dashStyle"=> 'shortdot',
	"marker"=>array("enabled" =>false)
))
->HCaS('Temperature', array(7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6))
->setSeriesOption('Temperature',array('type'=>'spline', "color"=>'#89A54E'));
echo $chart->HCoP('', true, 700, 350);

?>
