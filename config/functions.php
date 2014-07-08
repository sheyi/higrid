<?php
defined('IN_SHEYI') || define('IN_SHEYI', true);
date_default_timezone_set("Asia/Shanghai");


function higrid_csv_to_array($filename = '', $delimiter = ',')
{
	if(!file_exists($filename) || !is_readable($filename))
		return FALSE;
	$header = NULL;
	$data = array();
	if (($handle = fopen($filename, 'r')) !== FALSE)
	{
		while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
		{
			if(!$header)
				$header = $row;
			else
				$data[] = array_combine($header, $row);
		}
		fclose($handle);
	}
	return $data;
}


function higrid_demo_link($a){
	return '<a href="/example.php?id='.$a.'"  target="_blank">'.$a.'在线演示</a>';
}

function hichart_demo_link($a){
	return '<a href="/chart.php?id='.$a.'"  target="_blank">'.$a.'在线演示</a>';
}
