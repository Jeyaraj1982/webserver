<?php
session_start();
date_default_timezone_set('Asia/Calcutta');  
include_once("controller/DatabaseController.php");
$mysql   = new MySqldatabase("localhost","japps_user","mysql@Pwd","japps_ecommerce");
include_once("controller/sequenceMaster.php");

if(isset($_SESSION['User']) && $_SESSION['User']['Role']=="Staff") {
    define("UserRole","staff");
} 
if (isset($_SESSION['User']) && $_SESSION['User']['Role']=="Admin") {
    define("UserRole","admin");
}

function getWalletBalance($AgentID) {
        global $mysql;
        $d = $mysql->select("select (sum(Credits)-sum(Debits)) as bal from _queen_wallet where AgentID='".$AgentID."'");
        return isset($d[0]['bal']) ? $d[0]['bal'] : 0;      
    }
function getTotalBalanceWallet($AgentID) {
        global $mysql;
        $d = $mysql->select("select (sum(Credits)-sum(Debits)) as bal from _queen_payment where CustomerID='".$AgentID."'");
        return isset($d[0]['bal']) ? $d[0]['bal'] : 0;      
    }
?>
 