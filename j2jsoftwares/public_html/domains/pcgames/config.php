<?php
session_start();
date_default_timezone_set('Asia/Calcutta');      
include_once("controller/DatabaseController.php");

$mysql   = new MySqlDb("localhost","j2jsoftw_user","mysql@Pwd","j2jsoftw_pcgames");
?>