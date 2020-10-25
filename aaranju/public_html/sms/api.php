<?php
include_once("../config.php");

if (!(isset($_GET['number']))) {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"number missing")));        
    exit;
}
if (!(isset($_GET['message']))) {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"message missing")));        
    exit;
}
if (!(isset($_GET['sender']))) {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"senderid missing")));        
    exit;
}

if (!(isset($_GET['uid']))) {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"uid missing")));        
    exit;
}

if (!(strlen(trim($_GET['number']))==10)) {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"invalid mobile number")));        
    exit;
}

if (! (trim($_GET['number'])>6000000000 && trim($_GET['number'])<9999999999) ){
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"invalid mobile number")));        
    exit;
}

if (!(strlen(trim($_GET['message']))>2)) {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"message count must greater than 2 characters")));        
    exit;
}

if (!(strlen(trim($_GET['uid']))>0)) {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"uid count must greater than 2 characters")));        
    exit;
}

if (!(strlen(trim($_GET['sender']))==6)) {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"Invalid sender id")));        
    exit;
}

$user = $mysql->select("select * from _users where apiusername='".$_GET['apiusername']."' and apipassword='".$_GET['apipassword']."'");
if (sizeof($user)==0){
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"Invalid login")));
    exit; 
}

if ($user[0]['transactionsms']==0) {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"sms service not enabled")));        
    exit;
}
    
if (!(SMS::getTransactionSMSCredits($user[0]['userid'])>0)) {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"insufficiant transactional sms credits")));        
    exit;
}

$sendernames = $mysql->select("select * from _senderid where userid='".$user[0]['userid']."' and sendername='".$_GET['sender']."'");
if (sizeof($sendernames)==0) {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"sender id not found")));        
    exit;
}

$res  = SMS::sendsms($_GET['number'],$_GET['message'],$_GET['sender'],$_GET['uid'],$user[0]['userid'],"API");
echo json_encode(array("response"=>array("status"=>"SUCCESS","transid"=>$res)));    
exit;
?>
http://www.aaranju.in/sms/api.php?username=kumarm149@gmail.com&password=password&number=9944872965&sender=GOLDLS&message=test message api&uid=
{"response":{"status":"FAILURE","error":"Your IP not activated","statuscode":"099"}}
