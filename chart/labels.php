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
$chart->HCsCO(array("defaultSeriesType"=>"line"))
->HCsT(array('text'=>'Monthly Average Temperature'))
->HCsST(array("text"=>"Source: WorldClimate.com"))
->HCsX(array("categories"=>array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec')))
->HCsY(array("title"=>array("text"=>"Temperature (°C)")))
->HCsPO(array("line"=>array("dataLabels"=>array("enabled"=>true),"enableMouseTracking"=> false)))
->HCaS('Tokyo', array(7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6))
->HCaS('London', array(3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8));
echo $chart->HCoP('', true, 700, 350'',true,'1000');

?>
