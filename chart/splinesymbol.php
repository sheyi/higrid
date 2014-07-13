<?php
/**
 *      Copyright (C) 2014 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on  2014-7-13  v2.2.1
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
require_once(HIPATH.'config.php');//数据库连接设置,修改本目录下config.php相关参数
//$connhigrid = new PDO(DB_DSN,DB_USER,DB_PASSWORD);

// Tell the db that we use utf-8
//hiGridDB::query($connhigrid,"SET NAMES utf8");

$chart = new higridCharts();
$chart->HCsCO(array("defaultSeriesType"=>"spline"))
->HCsT(array('text'=>'Monthly Average Temperature'))
->HCsST(array("text"=>"Source: WorldClimate.com"))
->HCsX(array(
	"categories"=>array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec')
))
->HCsY(array(
	"title"=>array("text"=>"Temperature"),
	"labels"=>array(
          "formatter"=> "js:function() {
               return this.value + 'C';
            }"
     )
))
->HCsTT(array(
	"crosshairs"=>true,
	"shared"=> true

))
->HCsPO(array(
	"spline"=>array("marker"=>array(
		"lineColor"=> "#666666",
		"radius"=> 4,
		"lineWidth"=> 1
	))
))
->HCaS('Tokyo', array(
7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2,array("y"=>26.5, "marker"=>array("symbol"=>'url(chart/sun.png)')),23.3, 18.3, 13.9, 9.6
))
->setSeriesOption('Tokyo',array(
	"marker"=>array("symbol"=>'square')
))
->HCaS('London', array(
array("y"=>3.9, "marker"=>array("symbol"=>'url(chart/snow.png)')),4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8
))
->setSeriesOption('London',array(
	"marker"=>array("symbol"=>'diamond')
));
echo $chart->HCoP('', true, 700, 350);

?>
