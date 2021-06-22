<?php
session_start();
date_default_timezone_set('Asia/Calcutta');
  if (isset($_GET['action']) && $_GET['action']=='logout') {
      session_destroy();
      unset($_SESSION);
      echo "<script>location.href='https://www.makkalsevaimaiyam.com';</script>";
      exit;
  }
define("PATH_SQLLOG","/home/makkalsevai/public_html/admin/logs/");
 
include_once("admin/controller/DatabaseController.php");
$mysql   = new MySqldatabase("localhost","makkalse_user","mysqlPwd","makkalse_database");
     
?> 