<?php
session_start();
date_default_timezone_set('Asia/Calcutta');  
define("doc_root","/home/kingfish");
define("sql_log",doc_root."/logs/");
include_once("controller/DatabaseController.php");
$mysql   = new MySqldatabase("localhost","kingfish_user","mysql@Pwd","kingfish_database");
?>
 