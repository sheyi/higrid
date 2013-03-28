<?php
/**
 *      Copyright (C) 2013 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on 2013-03-27 13:16 V2.2
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
require_once(HIPATH.'config.php');//数据库连接设置,修改本目录下config.php相关参数
//$connhigrid = new PDO(DB_DSN,DB_USER,DB_PASSWORD);


$chart = new higridCharts();
$chart->HCsCO(array(
	"defaultSeriesType"=>"column"
))
->HCsT(array('text'=>'Monthly Average Rainfall'))
->HCsST(array("text"=>"Source: WorldClimate.com"))
->HCsX(array("categories"=>array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec')))
->HCsY(array(
	"min"=>0,
	"title"=>array("text"=>"Rainfall (mm)")
))
->HCsL(array( 
	"layout"=>"vertical",
	"backgroundColor"=>'#FFFFFF',
	"align"=>"left",
	"verticalAlign"=>'top',
	"x"=>100,
	"y"=>70,
	"floating"=>true,
	"shadow"=>true
))
->HCsTT(array("formatter"=>"function(){return this.x +': '+ this.y +' mm';}"))
->HCsPO(array(
	"column"=> array(
		"pointPadding"=> 0.2,
		"borderWidth"=> 0
	)
))
->HCaS('Tokyo', array(49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4))
->HCaS('New York', array(83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3))
->HCaS('London', array(83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3))
->HCaS('Berlin', array(42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1));
echo $chart->HCoP('', true, 700, 350);

?>
