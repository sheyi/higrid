<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!---------------------------
// higrid嗨网 中文PHP表格, Copyright (C) 2003 - 2014 http://higrid.net  
---------------------------->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>嗨网HiGrid演示</title>
<link rel="stylesheet" type="text/css" media="screen" href="//lib.sinaapp.com/js/jquery-ui/1.10.2/themes/redmond/jquery-ui.min.css" />
<link rel="stylesheet" type="text/css" media="screen" href="//cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/css/ui.jqgrid.css" />
<link rel="stylesheet" type="text/css" media="screen" href="//cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/plugins/ui.multiselect.css" />


<script src="//libs.baidu.com/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/js/i18n/grid.locale-cn.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqgrid/4.6.0/js/jquery.jqGrid.min.js" type="text/javascript"></script>
<script src="//lib.sinaapp.com/js/jquery-ui/1.10.2/jquery-ui.min.js "></script>
<script type="text/javascript">
$.jgrid.no_legacy_api = true;
$.jgrid.useJSON = true;
</script>

</head>
  <body>

      <div>


<?php
//error_reporting(0); 

defined('HIGRID_PATH') || define('HIGRID_PATH', str_replace('\\', '/', __DIR__) . '/');
require(HIGRID_PATH . 'config/functions.php');

$ex=rtrim(strtolower($_GET['id'])).'.php';
$higridchart=file_exists(HIGRID_PATH.'/chart/'. $ex ) ? HIGRID_PATH.'/chart/'. $ex  :  HIGRID_PATH.'/example/chart.php';
include_once $higridchart;

?>
            <table id="grid"></table>
            <div id="pager"></div> 

<script src="//lib.sinaapp.com/js/highstock/2.0.1/highstock.js"></script>
</body>
</html>