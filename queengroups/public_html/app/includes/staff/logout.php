<?php 
include_once("../config.php");
session_destroy();
    $_SESSION=array();
     echo "<script>location.href='../index.php';</script>";
?> 