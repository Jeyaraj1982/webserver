<?php
session_start();
date_default_timezone_set('Asia/Calcutta');  
include_once("controller/DatabaseController.php");
$mysql   = new MySqldatabase("localhost","klxcocrz_user","mysqlPwd","klxcocrz_database");
?>
 