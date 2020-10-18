<?php 
include_once("config.php");
if (isset($_GET['action']) && $_GET['action']=="logout") {
    session_destroy();
    $_SESSION=array();
     echo "<script>location.href='index.php';</script>";
}
if ($_SESSION['User']['MemberID']==0 || (!isset($_SESSION['User']['MemberID']) || $_SESSION['User']['AdminID']==0 || (!isset($_SESSION['User']['AdminID'])) )) {    
  //  echo "<script>location.href='index.php';</script>";
}

if ($_SESSION['User']['MemberID']>0) {
    if ($_SESSION['User']['IsMobileNumberVerified']==0) {
        echo "<script>location.href='mobileverification.php';</script>";
    }
}
include_once("header.php");
include_once("includes/".$_SESSION['User']['UserRole']."/LeftMenu.php");
if (isset($_GET['action'])) {
    include_once("includes/".$_SESSION['User']['UserRole']."/".$_GET['action'].".php");
} else {
    include_once("includes/".$_SESSION['User']['UserRole']."/dashboard.php");
}
include_once("footer.php");
?> 