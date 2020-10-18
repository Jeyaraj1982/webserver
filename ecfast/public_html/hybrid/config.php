<?php
session_start();
date_default_timezone_set("Asia/Calcutta");
 
include_once("classes/mysql.php");
$mysql   = new MySql("localhost","ecfast_user","mysqlPwd@123","ecfast_hybrid");
 
$operators = array('AIRTEL','VODAFONE','BSNL','IDEA',"AIRTELDIGITALTV","DISHTV","SUNDIRECT","VIDEOCOND2H","RELIANCEBIGTV","TATASKY","MTS","JIO","BUS_TICKET_BOOKING"); 

$operators = array('RA','RV','RB','RI',"DA","DD","DS","DV","DB","DT","RJ","BUS_TICKET_BOOKING"); 
$operator_array = array("RA"         => "AIRTEL",
                       "RV"       => "VODAFONE",
                       "RI"           => "IDEA",
                       "DA"=> "AIRTELDIGITALTV",
                       "DD"         => "DISHTV",
                       "DS"      => "SUNDIRECT",
                       "DV"    => "VIDEOCOND2H",
                       "BUS_TICKET_BOOKING"    => "BUS_TICKET_BOOKING",
                       "DB"  => "RELIANCEBIGTV",
                       "DT"        => "TATASKY", 
                       "RB"           => "BSNL", 
                       "RJ"            => "JIO");
function getVirtualBalance($userid) {
    
    global $mysql;
    
    $bala = $mysql->select("select sum(creditamt-debitamt) as bal from _virtualtbltransaction where userid=".$userid);
    if (sizeof($bala)>0) {
        return $bala[0]['bal'] != null ? $bala[0]['bal'] : 0.00;
    }
    return "0.00";
} 
 
                       
    /*API */
function txnStatus($usertxnid,$apiusr="") {
    
 $url = "http://www.onlinej2j.com/do.php?authToken=".$apiusr['j2japiusername']."&authPassword=".$apiusr['j2japipassword']."&response=json&request=status&usertxnid=".$usertxnid;
 $apiresult = file_get_contents($url);
 return json_decode($apiresult);
    
}
   
function getVirtualBalanceOperatorWise($userid,$operator) {
    
    global $mysql;
    $userdetails = $mysql->select("select * from _users where userid=".$userid);
    if ($userdetails[0]['balance']==1) {

    $bala = $mysql->select("select sum(creditamt-debitamt) as bal from _virtualtbltransaction where operator='".$operator."' and userid=".$userid);
        
    } else {
         $bala = $mysql->select("select sum(creditamt-debitamt) as bal from _tbltransaction where operator='".$operator."' and userid=".$userid);
    }
        if (sizeof($bala)>0) {
        return $bala[0]['bal'] != null ? $bala[0]['bal'] : '0.00';
    }

    return "0.00";
}

function printerror($message) {
    $result['status'] = "FAILURE";
    $result['error'] = $message;
    echo  json_encode(array("response"=>$result));
    
    //echo "false,".$message;
}


?>