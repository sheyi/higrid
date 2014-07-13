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
$rowid = hgGridcommon::Strip($_REQUEST["rowid"]);
if(!$rowid) die("Missed parameters");
// Get details
$SQL = "SELECT * FROM higrid_employees WHERE EmployeeID=".(int)$rowid;
$qres = hiGridDB::query($connhigrid, $SQL);
$result = hiGridDB::fetch_assoc($qres,$connhigrid);
$s = "<table><tbody>";
$s .= "<tr><td><b>First Name</b></td><td>".$result["FirstName"]."</td>";
$s .= "<td rowspan='9' valign='top'><img src='http://higrid.qiniudn.com/higrid_demo_images/".trim($result["EmployeeID"]).".jpg'/></td></tr>";
$s .= "<tr><td><b>Last Name</b></td><td>".$result["LastName"]."</td></tr>";
$s .= "<tr><td><b>Title</b></td><td>".$result["Title"]."</td></tr>";
$s .= "<tr><td><b>Title of Courtesy</b></td><td>".$result["TitleOfCourtesy"]."</td></tr>";
$s .= "<tr><td><b>Birth Date</b></td><td>".$result["BirthDate"]."</td></tr>";
$s .= "<tr><td><b>Hire Date</b></td><td>".$result["HireDate"]."</td></tr>";
$s .= "<tr><td><b>Address</b></td><td>".$result["Address"]."</td></tr>";
$s .= "<tr><td><b>City</b></td><td>".$result["City"]."</td></tr>";
$s .= "<tr><td><b>Postal Code</b></td><td>".$result["PostalCode"]."</td></tr>";
$s .= "</tbody></table>";
echo $s;
hiGridDB::closeCursor($qres);