<?php
include_once("../config.php");

if (!(isset($_GET['clientid']))) {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"clientid missing")));        
    exit;
}
if (!(isset($_GET['message']))) {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"message missing")));        
    exit;
}
if (!(isset($_GET['msgtype']))) {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"msgtype missing")));        
    exit;
}
if (!(isset($_GET['uid']))) {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"uid missing")));        
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
$user = $mysql->select("select * from _users where apiusername='".$_GET['apiusername']."' and apipassword='".$_GET['apipassword']."'");
if (sizeof($user)==0){
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"Invalid login")));
    exit; 
}
if ($user[0]['service_telegram']==0) {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"telegram service not enabled")));        
    exit;
}
if (!(Telegram::getBalance($user[0]['userid'])>0)) {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"insufficiant transactional sms credits")));        
    exit;
}
$data = $mysql->select("select * from telegram_ids where userid='".$user[0]['userid']."'");
if ($_GET['msgtype']=="text") {
    $res  = Telegram::sendsms(trim($data[0]['telegram_authkey']),$_GET['clientid'],$_GET['message'],"text",$_GET['uid'],$user[0]['userid'],"API");
    echo json_encode(array("response"=>array("status"=>"SUCCESS","transid"=>$res)));    
}
exit;
?>
need check valid clientid
http://www.aaranju.in/sms/api.php?username=kumarm149@gmail.com&password=password&number=9944872965&sender=GOLDLS&message=test message api&uid=
{"response":{"status":"FAILURE","error":"Your IP not activated","statuscode":"099"}}
