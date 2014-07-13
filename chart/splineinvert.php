<?php
/**
 *      Copyright (C) 2014 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on  2014-7-13  v2.2.1
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
require_once(HIPATH.'config.php');//数据库连接设置,修改本目录下config.php相关参数
//$connhigrid = new PDO(DB_DSN,DB_USER,DB_PASSWORD);

// Tell the db that we use utf-8
//hiGridDB::query($connhigrid,"SET NAMES utf8");

$chart = new higridCharts();
$chart->HCsCO(array(
	"defaultSeriesType"=>"spline",
	"inverted"=> true,
	"width"=> 500,
	"style"=>array(
            "margin"=>"0 auto"
    )
))
->HCsT(array('text'=>'Atmosphere Temperature by Altitude'))
->HCsST(array("text"=>"According to the Standard Atmosphere Model"))
->HCsX(array(
         "reversed"=> false,
         "title"=>array(
            "enabled"=> true,
            "text"=> 'Altitude'
         ),
         "labels" =>array(
            "formatter"=> "js:function() {
               return this.value +'km';
            }"
         ),
         "maxPadding"=> 0.05,
         "showLastLabel"=> true

))
->HCsY(array(
	"title"=>array("text"=>"Temperature C"),
	"labels"=>array(
          "formatter"=> "js:function() {
               return this.value + 'C';
            }"
     ),
     "lineWidth"=> 2
))
->HCsTT(array("formatter"=>"function(){return ''+  this.x +' km: '+ this.y +'C';}"))
->HCsPO(array(
	"spline"=>array("marker"=>array("enabled"=>true))
))
->HCaS('Temperature', array(
array(0, 15), array(10, -50), array(20, -56.5), array(30, -46.5), array(40, -22.1), array(50, -2.5), array(60, -27.7), array(70, -55.7), array(80, -76.5)
));
echo $chart->HCoP('', true, 700, 350);

?>
