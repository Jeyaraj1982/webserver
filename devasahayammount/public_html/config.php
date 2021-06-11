<?php 
session_start();
date_default_timezone_set('Asia/Calcutta');
error_reporting(0);
      
    include_once("classes/JFrame.php");
    include_once("classes/MySql.php");

    include_once("classes/class.jslider.php");
    include_once("classes/class.jphotogallery.php");
    include_once("classes/class.jdownload.php");
    include_once("classes/class.jmusics.php"); 
    include_once("classes/class.jpage.php");
    include_once("classes/class.jsuccessstory.php");
    include_once("classes/class.jfaq.php");
    include_once("classes/class.jvideos.php");
    define("SQL_LOG_PATH","/home/devasahayammount/public_html");


 
    $mysql = new MySql("localhost","devasaha_user","mysqlPwd@123","devasaha_database");

 

?>