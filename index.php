<!DOCTYPE HTML>
<html dir="ltr" lang="zh-CN">
<head>
<meta charset="utf-8" />
<!-- Design and code copyright (C) 2014 Higrid.net. All rights reserved. -->
<meta name="robots" content="index, follow, archive"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="http://higrid.net/favicon.ico" type="image/x-icon" />
<!---link rel="stylesheet" href="http://cdn.staticfile.org/twitter-bootstrap/3.2.0/css/bootstrap.min.css" type="text/css" media="all" charset="utf-8" /--->
<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="home" href="http://higrid.net/" title="higrid.net's main page" />
<meta name="keywords" content="嗨网演示,HiGrid演示,在线演示,体验中心" />
<meta name="description" content="嗨网HiGrid在线演示将嗨网HiGrid的基本功能在线展示并提供源代码供您参阅" />
<title>嗨网HiGrid专业版在线演示_嗨网在线HiGrid.net</title>
<style>
#index-banner
{
	text-indent: 100%;
	height:1px;
	white-space: nowrap;
	overflow: hidden;
}

#index-logo {
  text-indent: 245px;
  background: url(http://higrid.net/include/assets/logo/50.png) no-repeat;
}
</style>
</head>
<body>

<div class="container">
<h1 id="index-banner">在线表格、在线图形注册版</h1>
<div class="well well-lg" id="index-logo">基于PHP语言：建站更容易、更快速、更方便、更强悍,请点击标签查看演示
</div>

<div class="row">
<ul class="nav nav-tabs">
<li class="active"><a href="#tab1" data-toggle="tab">安装使用说明</a></li>
<li><a href="#tab2" data-toggle="tab">网格演示</a></li>
<li><a href="#tab3" data-toggle="tab">图形演示</a></li>
<li><a href="#tab4" data-toggle="tab">共同参与</a></li>
</ul>


<div class="tab-content"><!-- tab content-->
<div class="tab-pane active" id="tab1"><!-- tab1-->
<?php
defined('HIGRID_PATH') || define('HIGRID_PATH', str_replace('\\', '/', __DIR__) . '/');
require(HIGRID_PATH . 'config/functions.php');
require(HIGRID_PATH . 'config/markdownextra.php');
echo Markdown(file_get_contents(HIGRID_PATH.'readme.md'));


?>
</div><!-- /tab1-->

<div class="tab-pane" id="tab2"><!-- tab2-->
<table class="table table-striped table-condensed table-hover">
<tr>
	<th>主要功能</th>
	<th>在线演示</th>
	<th>开放源代码</th>
	<th>编辑</th>
	<th>备注</th>
</tr>
<?php 
$jqgrid_csvdata=higrid_csv_to_array(HIGRID_PATH.'/config/higrid_demo.csv');
//$dqlist=array_shift($jqgrid_csvdata);
//echo json_encode($jqgrid_csvdata);
//print_r($jqgrid_csvdata);
foreach($jqgrid_csvdata as $k=>$x)
{
	echo "<tr>";
	echo "<td>".$x['demo']."</td>";
	echo "<td>".higrid_demo_link($x['page'])."</td>";
	echo '<td><a href="https://github.com/sheyi/higrid/blob/master/example/'.$x['page'].'.php">源代码</a></td>';
	echo '<td><a href="https://github.com/sheyi/higrid/edit/master/example/'.$x['page'].'.php">编辑</a/td>';
	echo "<td>".$x['comment']."</td>";
	echo "</tr>";
}



?>
</table>

</div><!-- /tab2-->

<!-- tab3-->
<div class="tab-pane" id="tab3">
<table class="table table-striped table-condensed table-hover">
hello
</table>

</div><!-- /tab3-->



<div class="tab-pane" id="tab4"><!-- tab4-->
<?php
//echo Markdown(file_get_contents(HIGRID_PATH.'CONTRIBUTING.md'));
?>
</div><!-- /tab4-->


</div><!-- /tab content-->




</div></div>

 <!-- FOOTER -->
<hr>
    </footer>

<!--javascript-->
<script src="http://libs.baidu.com/jquery/2.0.3/jquery.min.js"></script>
<!---
//CDN公共库
http://developer.baidu.com/wiki/index.php?title=docs/cplat/libs	
script type="text/javascript" src="//upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.3.min.js"></script -->

<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<!--以下是统计代码-->
<div style="display:none">
	<!--HIGRID GOOGLE STATS -->
<!--script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fe800be547df3ec1416d26a49a98b6f44' type='text/javascript'%3E%3C/script%3E"));
</script>
	<script src="http://s20.cnzz.com/stat.php?id=3552716&web_id=3552716" language="javascript"></script>
</div--->

</body>
</html>
