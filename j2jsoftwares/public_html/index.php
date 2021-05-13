<?php 
    include_once("header.php");
    if (isset($_GET['wpage'])) {
        include_once("pages/".$_GET['wpage'].".php");
    } else {
        include_once("pages/index.php");
    }
    include_once("footer.php");
?>
