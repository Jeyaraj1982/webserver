<?php
session_start();
date_default_timezone_set('Asia/Calcutta');
  
define("PATH_SQLLOG","/home/bestoverseasjobs/public_html/admin/logs/");
 
include_once("controller/DatabaseController.php");
$mysql   = new MySqldatabase("localhost","bestover_user","mysqlPwd","bestover_database");
     
?>