<?php
include_once("../config.php");  
$user = $mysql->select("select * from _users where apiusername='".$_GET['username']."' and apipassword='".$_GET['password']."'");
if (sizeof($user)>0){
    $result = array("response"=>array("status"=>"SUCCESS","balance"=>Recharge::get_balance($user[0]['userid'])));
    echo return_result($result);
} else {
    $result = array("response"=>array("status"=>"FAILURE","error"=>"Invalid login"));
     echo return_result($result);
}
?> 