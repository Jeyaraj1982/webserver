<?php
include_once("../config.php");

$user = $mysql->select("select * from _users where apiusername='".$_GET['apiusername']."' and apipassword='".$_GET['apipassword']."'");

if (sizeof($user)==0){
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"Invalid login")));
    exit; 
}

if ($user[0]['transactionsms']==0) {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"sms service not enabled")));        
    exit;
}

echo json_encode(array("response"=>array("status"=>"SUCCESS","balance"=>SMS::getTransactionSMSCredits($user[0]['userid'])))); 
?> 