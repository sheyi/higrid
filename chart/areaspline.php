<?php
/**
 *      Copyright (C) 2013 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on 2013-03-27 13:16 V2.2
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
require_once(HIPATH.'config.php');//数据库连接设置,修改本目录下config.php相关参数


$chart = new higridCharts();
$chart->HCsCO(array(
	"defaultSeriesType"=>"areaspline"
))
->HCsT(array('text'=>'Average fruit consumption during one week'))
->HCsL(array(
	"layout"=> 'vertical',
	"align"=> 'right',
	"verticalAlign"=> 'top',
	"x"=> 150,
	"y"=> 100,
	"floating"=> true,
	"borderWidth"=> 1,
	"backgroundColor"=> '#FFFFFF'
))
->HCsX(array(
	"categories"=> array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'),
	"plotBands"=>array(
		array( // mark weekend
			"from"=>4.5,
			"to"=>6.5,
			"color"=>'rgba(68, 170, 213, .2)'
		)
	)
))
->HCsY(array(
	"title"=>array("text"=> 'Fruit units')
))
->HCsTT(array(
	"formatter"=>"function(){return this.x +': '+ this.y+' units';}"
))
->HCsPO(array(
	"areaspline"=>array(
		"fillOpacity"=> 0.5
	)
))
->HCaS('Jhon', array(3, 4, 3, 5, 4, 10, 12))
->HCaS('Jane', array(1, 3, 4, 3, 3, 5, 4));

echo $chart->HCoP('', true, 700, 350);

?>
