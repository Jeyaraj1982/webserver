<?php
session_start();
date_default_timezone_set('Asia/Calcutta');  
include_once("controller/DatabaseController.php");
$mysql   = new MySqldatabase("localhost","tksdonli_user","mysqluser@123","tksdonli_masflower");
 $Logo = "http://japps.online/demo/admin/assets/Logoo.jpg";
 define("ShopName","Admin Shop");
 define("FromName","Admin");
 define("MobileNumber","9000000000");
 define("Email","admin@admin.com");
 define("Address1","Address Line1");
 define("Address2","Address Line2");
 define("Address3","Address Line3");
 define("Pincode","629000");
function getTotalInvoice($UserID) {
        global $mysql;
        $res = $mysql->select("select (sum(order_total_after_tax)) as bal from invoice_order where user_id='".$UserID."'");
        return isset($res[0]['bal']) ? $res[0]['bal'] : "0";
    }
function getTotalPaid($UserID) {
        global $mysql;
        $res = $mysql->select("select (sum(order_amount_paid)) as bal from invoice_order where user_id='".$UserID."'");
        return isset($res[0]['bal']) ? $res[0]['bal'] : "0";
    }
function getTotalBalance($UserID) {
        global $mysql;
        $res = $mysql->select("select (sum(order_total_amount_due)) as bal from invoice_order where user_id='".$UserID."'");
        return isset($res[0]['bal']) ? $res[0]['bal'] : "0";
    }
	function getTotalBalanceUserWallet($CustomerID) {
        global $mysql;
        $res = $mysql->select("select (sum(Credits)-sum(Debits)) as bal from _tbl_wallet where CustomerID='".$CustomerID."'");
        return isset($res[0]['bal']) ? $res[0]['bal'] : "0";
    }
	function getTotalUserCredits($CustomerID) {
        global $mysql;
        $res = $mysql->select("select sum(Credits) as bal from _tbl_wallet where CustomerID='".$CustomerID."'");
        return isset($res[0]['bal']) ? $res[0]['bal'] : "0";
    }
	function getTotalUserDebits($CustomerID) {
        global $mysql;
        $res = $mysql->select("select sum(Debits) as bal from _tbl_wallet where CustomerID='".$CustomerID."'");
        return isset($res[0]['bal']) ? $res[0]['bal'] : "0";
    }
?>
 