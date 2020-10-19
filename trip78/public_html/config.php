<?php
session_start();
date_default_timezone_set('Asia/Calcutta');  
include_once("controller/DatabaseController.php");
$mysql   = new MySqldatabase("localhost","japps_user","mysql@Pwd","japps_database");
?>
 