<?php
/**
 *      Copyright (C) 2013 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on 2013-03-27 13:16 V2.2
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
require_once(HIPATH.'config.php');//数据库连接设置,修改本目录下config.php相关参数

$tooltip = <<<TOOL
function()
{
	var s;
	if (this.point.name) { // the pie chart
		s = ''+ this.point.name +': '+ this.y +' fruits';
	} else {
		s = ''+ this.x  +': '+ this.y;
	}
	return s;
}
TOOL;

$chart = new higridCharts();
$chart->HCsT(array('text'=>'Combination chart'))
->HCsX(array(
	"categories"=>array('Apples', 'Oranges', 'Pears', 'Bananas', 'Plums')
))
->HCsTT(array("formatter"=>$tooltip))
->setLabels(array(
	"items"=>array(array(
		"html"=> 'Total fruit consumption',
		"style"=>array("left"=>"40px","top"=>"8px","color"=>"black")
	))
))
->HCaS('Jane', array(3, 2, 1, 3, 4))
->setSeriesOption('Jane','type','column')
->HCaS('John', array(2, 3, 5, 7, 6))
->setSeriesOption('John','type','column')
->HCaS('Joe', array(4, 3, 3, 9, 0))
->setSeriesOption('Joe','type','column')
->HCaS('Total consumption', array(
	array("name"=>"Jane", "y"=>13,'color'=>'#4572A7'),
	array("name"=>"John", "y"=>23,'color'=>'#AA4643'),
	array("name"=>"Joe", "y"=>19,'color'=>'#89A54E')
))
->setSeriesOption('Total consumption',array(
	"type"=>"pie",
	"center"=>array(100, 80),
	"size"=>100,
	"showInLegend" =>false,
	"dataLabels"=>array("enabled"=>false)
))
->HCaS('Average', array(3, 2.67, 3, 6.33, 3.33))
->setSeriesOption('Average', 'type', 'spline');
echo $chart->HCoP('', true, 700, 350);

?>
