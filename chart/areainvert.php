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
	"inverted"=>true
))
->HCsT(array('text'=>'Average fruit consumption during one week'))
->HCsST(array(
	"style"=>array(
		"position"=> 'absolute',
		"right"=> '0px',
		"bottom"=> '10px'
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
	"backgroundColor"=> '#FFFFFF'

))
->HCsX(array(
	"categories"=> array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')
))
->HCsY(array(
	"title"=>array("text"=> 'Number of units'),
	"labels"=>array("formatter"=>"js:function(){return this.value;}")
))
->HCsTT(array(
	"formatter"=>"function(){return this.x +': '+ this.y;}"
))
->HCsPO(array(
	"area"=>array(
		"fillOpacity"=> 0.5
	)
))
->HCaS('Jhon', array(3, 4, 3, 5, 4, 10, 12))
->HCaS('Jane', array(1, 3, 4, 3, 3, 5, 4));

echo $chart->HCoP('', true, 680, 350);

?>
