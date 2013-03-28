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

// Tell the db that we use utf-8
//hiGridDB::query($connhigrid,"SET NAMES utf8");

$plotbands = array(
	array("from"=>0.3,"to"=>1.5,"color"=>'rgba(68, 170, 213, 0.1)', "label"=>array("text"=>'Light air',"style"=>array("color"=>'#606060'))),
	array("from"=>1.5,"to"=>3.3,"color"=>'rgba(0, 0, 0, 0)', "label"=>array("text"=>'Light breeze',"style"=>array("color"=>'#606060'))),
	array("from"=>3.3,"to"=>5.5,"color"=>'rgba(68, 170, 213, 0.1)', "label"=>array("text"=>'Gentle breeze',"style"=>array("color"=>'#606060'))),
	array("from"=>5.5,"to"=>8,"color"=>'rgba(0, 0, 0, 0)', "label"=>array("text"=>'Moderate breeze',"style"=>array("color"=>'#606060'))),
	array("from"=>8,"to"=>11,"color"=>'rgba(68, 170, 213, 0.1)', "label"=>array("text"=>'Fresh breeze',"style"=>array("color"=>'#606060'))),
	array("from"=>11,"to"=>14,"color"=>'rgba(0, 0, 0, 0)', "label"=>array("text"=>'Strong breeze',"style"=>array("color"=>'#606060'))),
	array("from"=>14,"to"=>15,"color"=>'rgba(68, 170, 213, 0.1)', "label"=>array("text"=>'High wind',"style"=>array("color"=>'#606060')))
);

$chart = new higridCharts();
$chart->HCsCO(array("defaultSeriesType"=>"spline"))
->HCsT(array('text'=>'Wind speed during two days'))
->HCsST(array("text"=>"October 6th and 7th 2009 at two locations in Vik i Sogn, Norway"))
->HCsX(array(
	"type"=>"datetime"
))
->HCsY(array(
	"title"=>array("text"=>'Wind speed (m/s)'),
	"min"=>0,
	"minorGridLineWidth"=>0,
	"gridLineWidth"=>0,
	"alternateGridColor"=>null,
	"plotBands"=>$plotbands
))
->HCsTT(array(
	"formatter"=>"function(){return ''+Highcharts.dateFormat('%e. %b %Y, %H:00', this.x) +': '+ this.y +' m/s';}"
))
->HCsPO(array(
	"spline"=>array(
		"lineWidth"=> 4,
		"states"=>array("hover"=>  array ("lineWidth"=>5)),
		"marker"=>array(
			"enabled"=> true,
			"states"=>array("hover"=>  array ("lineWidth"=>1,"radius"=>5,"enabled"=>true, "symbol"=>"circle"))
		),
		"pointInterval"=> 3600000, //one hour
		"pointStart"=> 'js:Date.UTC(2009, 9, 6, 0, 0, 0)'

	)
))
->HCaS('Hestavollane', array(
4.3, 5.1, 4.3, 5.2, 5.4, 4.7, 3.5, 4.1, 5.6, 7.4, 6.9, 7.1,
7.9, 7.9, 7.5, 6.7, 7.7, 7.7, 7.4, 7.0, 7.1, 5.8, 5.9, 7.4,
8.2, 8.5, 9.4, 8.1, 10.9, 10.4, 10.9, 12.4, 12.1, 9.5, 7.5,
7.1, 7.5, 8.1, 6.8, 3.4, 2.1, 1.9, 2.8, 2.9, 1.3, 4.4, 4.2,3.0, 3.0
))
->HCaS('Voll', array(
0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.1, 0.0, 0.3, 0.0,
0.0, 0.4, 0.0, 0.1, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0,
0.0, 0.6, 1.2, 1.7, 0.7, 2.9, 4.1, 2.6, 3.7, 3.9, 1.7, 2.3,
3.0, 3.3, 4.8, 5.0, 4.8, 5.0, 3.2, 2.0, 0.9, 0.4, 0.3, 0.5, 0.4
));
echo $chart->HCoP('', true, 700, 350);

?>
