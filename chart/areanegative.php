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
->HCsT(array('text'=>'Area chart with negative values'))
->HCsX(array(
	"categories"=>array('Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas')
))
->HCsTT(array(
	"formatter"=>"function(){return this.series.name +': '+ this.y +'';}"
))
->HCaS('Jhon', array(5, 3, 4, 7, 2))
->HCaS('Jane', array(2, -2, -3, 2, 1))
->HCaS('Joe', array( 3, 4, 4, -2, 5));

echo $chart->HCoP('', true, 700, 350);

?>
