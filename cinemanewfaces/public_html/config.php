<?php
session_start();
date_default_timezone_set('Asia/Calcutta'); 
include_once("classes/class.DatabaseController.php");
$mysql = new MySqldatabase("localhost","cinemane_user","mysqlPwd@123","cinemane_database");
?>