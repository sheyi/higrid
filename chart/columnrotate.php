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
	"defaultSeriesType"=>"column",
	"margin"=>array( 50, 50, 100, 80)
))
->HCsT(array('text'=>"World's largest cities per 2008"))
->HCsX(array(
	"categories"=>array(
            'Tokyo',
            'Jakarta',
            'New York',
            'Seoul',
            'Manila',
            'Mumbai',
            'Sao Paulo',
            'Mexico City',
            'Dehli',
            'Osaka',
            'Cairo',
            'Kolkata',
            'Los Angeles',
            'Shanghai',
            'Moscow',
            'Beijing',
            'Buenos Aires',
            'Guangzhou',
            'Shenzhen',
            'Istanbul'
	),
	"labels"=>array(
		"rotation"=> -45,
		"align"=>"right",
		"style"=>array("font"=>"normal 13px Verdana, sans-serif")
	)
))
->HCsY(array(
	"min"=>0,
	"title"=>array("text"=>"Population (millions)")
))
->HCsL(array(
	"enabled"=> false,
))
->HCsTT(array(
	"formatter"=>"function(){return '<b>'+ this.x +'</b><br/>'+'Population in 2008: '+ Highcharts.numberFormat(this.y, 1)+' millions';}"
))
->HCaS('Population', array(
34.4, 21.8, 20.1, 20, 19.6, 19.5, 19.1, 18.4, 18, 
17.3, 16.8, 15, 14.7, 14.5, 13.3, 12.8, 12.4, 11.8, 
11.7, 11.2
))
->setSeriesOption('Population',array(
	"dataLabels"=>array(
		"enabled"=> true,
		"rotation"=> -90,
		"color"=>'#FFFFFF',
		"align"=>'right',
		"x"=> -3,
		"y"=> 10,
		"formatter"=>"js:function() {return this.y;}",
		"style"=> array(
			"font"=> 'normal 13px Verdana, sans-serif'
		)
	)
));

echo $chart->HCoP('', true, 700, 350);

?>
