<?php 
include_once("../config.php");
session_destroy();
    $_SESSION=array();
     echo "<script>location.href='../adminlogin.php';</script>";
?> 