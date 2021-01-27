<?php
session_start();
date_default_timezone_set('Asia/Calcutta');
  
define("PATH_SQLLOG","/home/digitalmaking/public_html/backups/logs/");
define("PATH_SQL","/home/digitalmaking/public_html/backups/sql");

include_once("controller/DatabaseController.php");
$mysql   = new MySqldatabase("localhost","digitalm_user","mysqlPwd","digitalm_database");

define("ExperienceYearStart",date("Y")-30);
define("ExperienceYearEnd",date("Y"));
$month = array("","JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC");

function ParseName($Name){
    $return = str_replace(" ","-",$Name);
    return $return;
}

function progressBar($val) {
    $t = '<div style="border:1px solid #ccc;background:#f1f1f1;height:10px;border-radius:5px;width:100px;">
            <div style="background:orange;height:8px;border-radius:5px;width:'.$val.'%;"></div>
          </div>';
    return $t;
}

function progressBarResume($val) {
    $t = '<div style="border:1px solid #2b2929;background:#2b2929;height:10px;border-radius:5px;width:100px;">
            <div style="background:#fff;height:8px;border-radius:5px;width:'.$val.'%;"></div>
          </div>';
    return $t;
}

function getTotalBalanceCredits($UserID) {
    global $mysql;
    $res = $mysql->select("select (sum(Credits)-sum(Debits)) as bal from _tbl_franchisee_credits where FranchiseeID='".$UserID."'");
    return isset($res[0]['bal']) ? $res[0]['bal'] : "0";
}

function getTotalCredits($UserID) {
    global $mysql;
    $res = $mysql->select("select (sum(Credits)) as bal from _tbl_franchisee_credits where FranchiseeID='".$UserID."'");
    return isset($res[0]['bal']) ? $res[0]['bal'] : "0";
}

function getTotalDebits($UserID) {
    global $mysql;
    $res = $mysql->select("select (sum(Debits)) as bal from _tbl_franchisee_credits where FranchiseeID='".$UserID."'");
    return isset($res[0]['bal']) ? $res[0]['bal'] : "0";
}
?>