<?php
/**
 *      Copyright (C) 2013 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on 2013-03-27 13:16 V2.2
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
require_once(HIPATH.'config.php');//数据库连接设置,修改本目录下config.php相关参数

// Tell the db that we use utf-8
//hiGridDB::query($connhigrid,"SET NAMES utf8");

$chart = new higridCharts();
$chart->HCsCO(array("defaultSeriesType"=>"line","marginRight"=>130,"marginBottom"=>25))
->HCsT(array('text'=>'Monthly Average Temperature',"x"=>-20))
->HCsST(array("text"=>"Source: WorldClimate.com","x"=>-20))
->HCsX(array("categories"=>array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec')))
->HCsY(array("title"=>array("text"=>"Temperature (°C)")))
->HCsTT(array("formatter"=>"function(){return '<b>'+ this.series.name +'</b><br/>'+this.x +': '+ this.y +' (°C)';}"))
->HCsL(array( "layout"=>"vertical","align"=>"right","verticalAlign"=>'top',"x"=>-10,"y"=>100,"borderWidth"=>0))
->HCaS('Tokyo', array(7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6))
->HCaS('New York', array(-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5))
->HCaS('Berlin', array(-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0))
->HCaS('London', array(3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8));
echo $chart->HCoP('',true,700, 350);

?>
