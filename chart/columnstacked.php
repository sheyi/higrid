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
	"defaultSeriesType"=>"column"
))
->HCsT(array('text'=>'Stacked column chart'))
->HCsX(array(
	"categories"=>array('Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas')
))
->HCsY(array(
	"min"=>0,
	"title"=>array("text"=>"Total fruit consumption")
))
->HCsL(array(
	"align"=> 'right',
	"verticalAlign"=> 'top',
	"x"=> -100,
	"y"=> 20,
	"floating"=> true,
	"shadow"=>false,
	"borderWidth"=> 1,
	"backgroundColor"=> '#CCC',
	"backgroundColor" =>'#FFFFFF'

))
->HCsTT(array(
	"formatter"=>"function(){return '<b>'+ this.x +'</b><br/>'+this.series.name +': '+ this.y +'<br/>'+'Total: '+ this.point.stackTotal;}"
))
->HCsPO(array(
	"column"=>array("stacking"=>"normal")
))
->HCaS('Jhon', array(5, 3, 4, 7, 2))
->HCaS('Jane', array(2, 2, 3, 2, 1))
->HCaS('Joe', array( 3, 4, 4, 2, 5));

echo $chart->HCoP('', true, 700, 350);

?>
