<?php
/**
 *      Copyright (C) 2014 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on  2014-7-13  v2.2.1
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
require_once(HIPATH.'config.php');//数据库连接设置,修改本目录下config.php相关参数

$clickevent = <<< LOAD
function(e) {
	// find the clicked values and the series
	var x = e.xAxis[0].value,
	y = e.yAxis[0].value,
	series = this.series[0];

	// Add it
	series.addPoint([x, y]);
}
LOAD;

$chart = new higridCharts();
$chart->HCsCO(array(
	"defaultSeriesType"=>"scatter",
	"margin"=>array(70, 50, 60, 80)
))
->HCsCE('click', $clickevent)
->HCsT(array('text'=>'User supplied data'))
->HCsST(array('text'=>'Click the plot area to add a point. Click a point to remove it.'))
->HCsX(array(
	"minPadding"=>0.2,
	"maxPadding"=>0.2,
	"maxZoom"=>60
))
->HCsY(array(
	"title"=>array("text"=>"Value"),
	"minPadding"=>0.2,
	"maxPadding"=>0.2,
	"maxZoom"=>60,
	"plotLines"=>array(array(
		"value"=>0,
		"width"=>1,
		"color"=>'#808080'
	))
))
->HCsPO(array(
	"series"=>array(
		"lineWidth"=>1,
		"point"=>array(
			"events"=>array(
				"click"=>"js:function(){if (this.series.data.length > 1) this.remove();}"
			)
		)
	)
))
->HCsL(array( 
	"enabled"=>false
))
->HCsE('enabled', false)
->HCaS('data', array(
arraY(20, 20), array(80, 80)
));
echo $chart->HCoP('', true, 700, 350);

?>
