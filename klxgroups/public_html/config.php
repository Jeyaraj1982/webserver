<?php
session_start();
date_default_timezone_set('Asia/Calcutta');  
include_once("controller/DatabaseController.php");
define("sql_log","/home/klxgroups/public_html/logs/");
$mysql   = new MySqldatabase("localhost","klxgroup_user","mysql@Pwd","klxgroup_database");
?>
 