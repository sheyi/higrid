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
$chart->HCsT(array('text'=>'Scatter plot with regression line'))
->HCsX(array(
	"min"=>-0.5,
	"max"=>5.5
))
->HCsY(array(
	"min"=>0
))
->HCaS('Regression Line', array(array(0,1.11),array(5, 4.51)))
->setSeriesOption('Regression Line',array(
	'type'=>'line',
	'marker'=>array("enabled"=>false),
	'states'=>array("hover"=>array("lineWidth"=>1)),
	'enableMouseTracking'=>false
))
->HCaS('Observations', array(1, 1.5, 2.8, 3.5, 3.9, 4.2))
->setSeriesOption('Observations',array(
	'type'=>'scatter',
	'marker'=>array("radius"=>4)
));

echo $chart->HCoP('', true, 700, 350);

?>
