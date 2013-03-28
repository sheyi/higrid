<?php
/**
 *      Copyright (C) 2013 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on 2013-03-27 13:16 V2.2
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
require_once(HIPATH.'config.php');//数据库连接设置,修改本目录下config.php相关参数

$loadevent = <<< LOAD
function() {  
	// set up the updating of the chart each second
	var series = this.series[0];
	setInterval(function() {
		var x = (new Date()).getTime(), // current time
		y = Math.random();
		series.addPoint([x, y], true, true);
	}, 1000);
}
LOAD;

$randdata = <<< RNDATA
(function() {
// generate an array of random data
	var data = [],
	time = (new Date()).getTime(),
	i;
	for (i = -19; i <= 0; i++) {
		data.push({
			x: time + i * 1000,
			y: Math.random()
		});
	}
	return data;
})()
RNDATA;

$chart = new higridCharts();
$chart->HCsCO(array(
	"defaultSeriesType"=>"spline",
	"marginRight"=>10
))
->HCsCE('load', $loadevent)
->HCsT(array('text'=>'Live random data'))
->HCsX(array(
	"type"=>'datetime',
	"tickPixelInterval"=> 150
))
->HCsY(array(
	"title"=>array("text"=>"Value"),
	"plotLines"=>array(array(
		"value"=>0,
		"width"=>1,
		"color"=>'#808080'
	))
))
->HCsTT(array(
	"formatter"=>"function(){return '<b>'+ this.series.name +'</b><br/>'+Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) +'<br/>'+Highcharts.numberFormat(this.y, 2);}"
))
->HCsL(array( 
	"enabled"=>false
))
->HCsE('enabled', false)
->HCaS('Random data', 'js:'.$randdata );
echo $chart->HCoP('', true, 700, 350);

?>
