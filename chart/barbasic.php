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

$chart = new higridCharts();
$chart->HCsCO(array(
	"defaultSeriesType"=>"bar"
))
->HCsT(array('text'=>'Historic World Population by Region'))
->HCsST(array("text"=>'Source: Wikipedia.org'))
->HCsX(array(
	"categories" => array('Africa', 'America', 'Asia', 'Europe', 'Oceania'),
	"title"=>array("text"=>null),
))
->HCsY(array(
	"min"=>0,
	"title"=>array("text"=>'Population (millions)'),
	"align"=> 'high'
))
->HCsTT(array(
	"formatter"=>"function(){return this.series.name +': '+ this.y +' millions';}"
))
->HCsPO(array(
	"bar"=>array(
		"dataLabels"=>array(
			"states"=>array("enabled"=>true)
		)
	)
))
->HCsL(array(
	"layout"=> 'vertical',
	"align"=> 'right',
	"verticalAlign"=> 'top',
	"x"=> -100,
	"y"=> 100,
	"floating"=> true,
	"borderWidth"=> 1,
	"backgroundColor"=> '#FFFFFF',
	"shadow"=>true
))
->HCaS('Year 1800', array(107, 31, 635, 203, 2))
->HCaS('Year 1900', array(133, 156, 947, 408, 6))
->HCaS('Year 2008', array(973, 914, 4054, 732, 34));

echo $chart->HCoP('', true, 700, 350);

?>
