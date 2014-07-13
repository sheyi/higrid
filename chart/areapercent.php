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
	"defaultSeriesType"=>"area"
))
->HCsT(array('text'=>'Historic and Estimated Worldwide Population Growth by Region'))
->HCsST(array("text"=>'Source: Wikipedia.org'))
->HCsX(array(
	"categories"=> array('1750', '1800', '1850', '1900', '1950', '1999', '2050'),
	"tickmarkPlacement"=> 'on',
	"title"=>array("enabled"=>false)
))
->HCsY(array(
	"title"=>array("text"=> 'Percent')
))
->HCsTT(array(
	"formatter"=>"function(){return this.x +': '+ Highcharts.numberFormat(this.percentage, 1) +'% ('+Highcharts.numberFormat(this.y, 0, ',') +' millions)';}"
))
->HCsPO(array(
	"area"=>array(
		"stacking"=> 'percent',
		"lineColor"=> '#ffffff',
		"lineWidth"=> 1,
		"marker"=>array(
			"lineWidth"=> 1,
			"lineColor"=>"#ffffff"
		)
	)
))
->HCaS('Asia', array(502, 635, 809, 947, 1402, 3634, 5268))
->HCaS('Africa', array(106, 107, 111, 133, 221, 767, 1766))
->HCaS('Europe', array(163, 203, 276, 408, 547, 729, 628))
->HCaS('America', array(18, 31, 54, 156, 339, 818, 1201))
->HCaS('Oceania', array(2, 2, 2, 6, 13, 30, 46));

echo $chart->HCoP('', true, 700, 350);

?>
