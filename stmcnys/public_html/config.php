<?php
session_start();
    date_default_timezone_set("Asia/kolkata");
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Credentials: true');
    error_reporting(0); 
include_once("Controller/MobileSMSController.php");
?>