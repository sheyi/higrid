<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!---------------------------
// higrid嗨网 中文PHP表格, Copyright (C) 2003 - 2011 http://higrid.net  
---------------------------->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>嗨网HiGrid演示</title>
<script src="js/jquery.js"></script>
<link rel="stylesheet" href="http://higrid.net/include/css/higridstock.css?20130313" type="text/css" media="screen" charset="utf-8" />
<script type="text/javascript" src="http://higrid.net/include/js/higridstock.js?20130313" charset="utf-8"></script>

</head>
  <body>

      <div>
<?php
defined('HIGRIDPROPATH') || define('HIGRIDPROPATH', dirname(__FILE__).'/');
//error_reporting(0); 


$ex=rtrim(strtolower($_GET['ex']));

$higridchart=file_exists(HIGRIDPROPATH.'/chart/'. $ex ) ? HIGRIDPROPATH.'/chart/'. $ex  :  HIGRIDPROPATH.'/chart/default.php';

include_once $higridchart;
?>
     
            <table id="grid"></table>
            <div id="pager"></div> 
	  
	  
	  
	  </div>

<br />
<div style="border:1px dotted #F90; border-left:6px solid #F60; padding:15px; background:#FFC">
<a href="http://higrid.net/">PHP程序由嗨网HiGrid.net提供</a>
</div>


<div style="display:none">
<!--HIGRID GOOGLE STATS -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fe800be547df3ec1416d26a49a98b6f44' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript" src="http://higrid.net/include/js/statgoogle.js"  charset="utf-8"></script>
<script src="http://s20.cnzz.com/stat.php?id=3552716&web_id=3552716" language="javascript"></script>
</div>

</body>
</html>