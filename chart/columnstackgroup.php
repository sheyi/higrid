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
	"defaultSeriesType"=>"column"
))
->HCsT(array('text'=>'Total fruit consumtion, grouped by gender'))
->HCsX(array(
	"categories"=>array('Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas')
))
->HCsY(array(
	"min"=>0,
	"allowDecimals"=> false,
	"title"=>array("text"=>"Number of fruits")
))
->HCsTT(array(
	"formatter"=>"function(){return '<b>'+ this.x +'</b><br/>'+this.series.name +': '+ this.y +'<br/>'+'Total: '+ this.point.stackTotal;}"
))
->HCsPO(array(
	"column"=>array("stacking"=>"normal")
))
->HCaS('Jhon', array(5, 3, 4, 7, 2))
->setSeriesOption('Jhon', 'stack', 'male')
->HCaS('Joe', array( 3, 4, 4, 2, 5))
->setSeriesOption('Joe', 'stack', 'male')
->HCaS('Jane', array(2, 2, 3, 2, 1))
->setSeriesOption('Jane', 'stack', 'female')
->HCaS('Janet', array(3, 0, 4, 4, 3))
->setSeriesOption('Janet', 'stack', 'female');

echo $chart->HCoP('', true, 700, 350);

?>
