<?php
 include_once("config.php");
 if ($_GET['status']=="SUCCESS") {
    $mysqldb->execute("update _tbl_recharge_transactions set OperatorID='".$_GET['transid']."' where RcTxnID='".$_GET['uid']."'");
    echo "updated";
 }
                   
?>