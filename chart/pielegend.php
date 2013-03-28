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
$chart->HCsT(array('text'=>'Browser market shares at a specific website, 2010'))
->HCsTT(array("formatter"=>"function(){return '<b>'+ this.point.name +'</b>: '+ this.y +' %';}"))
->HCsPO(array(
	"pie"=> array(
		"allowPointSelect"=> true,
		"cursor"=> 'pointer',
		"dataLabels"=>array(
			"enabled"=>false
		),
		"showInLegend"=> true
	)
))
->HCaS('Browser share', array(
	array('Firefox',   45.0),
	array('IE',       26.8),
	array(
               "name"=> 'Chrome',    
               "y"=> 12.8,
               "sliced"=> true,
               "selected"=> true
            ),
	array('Safari',    8.5),
	array('Opera',     6.2),
	array('Others',   0.7)
))
->setSeriesOption('Browser share', 'type','pie');
echo $chart->HCoP('', true, 700, 350);

?>
