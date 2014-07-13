<?php
/**
 *      Copyright (C) 2014 HiGrid Inc.
 *		higrid嗨网 中文PHP表格, http://higrid.net
 *
 *      Released on  2014-7-13  v2.2.1
 */


defined('HIPATH') || define('HIPATH', dirname(__FILE__).'/');//绝对路径
require_once(HIPATH.'config.php');//数据库连接设置,修改本目录下config.php相关参数

// get your data manually and build the array
$myconn = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
$myconn->query("SET NAMES utf8");
$sth = $myconn->prepare("SELECT CustomerID, SUM(Freight) AS Freight FROM higrid_orders WHERE  (CustomerID ='BERGS' OR  CustomerID ='WHITC' ) AND OrderDate BETWEEN '1997-01-01' AND '1997-12-31' GROUP BY CustomerID");
$sth->execute();
$customers = $sth->fetchAll(PDO::FETCH_ASSOC);

$chart = new higridCharts( );
$chart->HCsCO(array("defaultSeriesType"=>"bar"))
->HCsT(array('text'=>'Freight  1997'))
->HCsY(array("title"=>array("text"=>"Freight")))
->setJSCode("mychart = chart;")
->HCsTT(array("formatter"=>"function(){return '<b>'+ this.series.name +'</b><br/>'+this.x +': '+ this.y;}"))
// set the series from the array
->HCaS($customers[0]['CustomerID'], array($customers[0]['Freight'] ))
->HCaS($customers[1]['CustomerID'], array($customers[1]['Freight'] ));
echo $chart->HCoP('',true,700, 350);

// building the grid
$grid = new hgGridRender(null);
$grid->setColModel(array(array("name"=>"CustomerID", "key"=>true), array("name"=>"Freight")));
$grid->setUrl('./chart/sqlgridchart.php');
$grid->higridsGO(array(
	// this is needed to tell the grid that the data is local
	"datatype"=>"local",
	// and here is the local data
    "data"=>$customers
));
$grid->navigator = false;
$grid->higridOP('#grid','#pager',true, null, null, false,false);

// Enjoy
?>
