<?php 
include_once("../config.php");
if (isset($_GET['action']) && $_GET['action']=="logout") {
    session_destroy();
    $_SESSION=array();
     echo "<script>location.href='../index.php';</script>";
}

 
include_once("header.php");
include_once("LeftMenu.php");
if (isset($_GET['action'])) { 
} else {
    include_once("dashboard.php".$_GET['action']);
}                                                                                               
include_once("footer.php");
?> 