<?php
/**
 *      Copyright (C) 2014 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on  2014-7-13  v2.2.1
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
require_once(HIPATH.'config.php');//数据库连接设置,修改本目录下config.php相关参数
$connhigrid = new PDO(DB_DSN,DB_USER,DB_PASSWORD);

// Tell the db that we use utf-8
hiGridDB::query($connhigrid,"SET NAMES utf8");

$chart = new higridCharts( $connhigrid );
$chart->HCsCO(array("defaultSeriesType"=>"line"))
->HCsT(array('text'=>'Freight by Month 1997',"x"=>-20))
->HCsY(array("title"=>array("text"=>"Freight")))
->HCsTT(array("formatter"=>"function(){return '<b>'+ this.series.name +'</b><br/>'+this.x +': '+ this.y;}"))
->HCaS('Blauer See Delikatessen', "SELECT MONTH(OrderDate), SUM(Freight) FROM higrid_orders WHERE CustomerID =?  AND OrderDate BETWEEN '1997-01-01' AND '1997-12-31' GROUP BY MONTH(OrderDate)",array('BERGS'))
->HCaS('White Clover Markets', "SELECT MONTH(OrderDate), SUM(Freight) FROM higrid_orders WHERE CustomerID =?  AND OrderDate BETWEEN '1997-01-01' AND '1997-12-31' GROUP BY MONTH(OrderDate)",array('WHITC'));
echo $chart->HCoP('',true,700, 350);

?>
