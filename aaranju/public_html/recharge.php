<?php

include_once("config.php");
function get_balance($userid) {
    global $mysql;
    $t = $mysql->select("select (sum(credits)-sum(debits)) as bal from _accounts where userid='".$userid."'");
    return isset($t[0]['bal']) ? $t[0]['bal'] : 0;
}

if (!(isset($_GET['amount']))) {
    echo json_encode(array("response"=>array("status"=>"failure","error"=>"amount missing")));        
    exit;
}

if (!(isset($_GET['number']))) {
    echo json_encode(array("response"=>array("status"=>"failure","error"=>"number missing")));        
    exit;
}

if (isset($_GET['amount']) && $_GET['amount']<10) {
    echo json_encode(array("response"=>array("status"=>"failure","error"=>"amount must greater than Rs. 10")));        
    exit;
}

$user = $mysql->select("select * from _users where username='".$_GET['username']."' and password='".$_GET['password']."'");
if (sizeof($user)>0){
    
   if (get_balance($user[0]['userid'])>$_GET['amount']) {
       
       //transaction tbl
       $txnid = $mysql->insert("_transactions",array("userid"          => $user[0]['userid'],
                                                     "txndate"         => date("Y-m-d H:i:s"),
                                                     "rcnumber"        => $_GET['number'],
                                                     "rcamount"        => $_GET['amount'],
                                                     "optrcode"        => $_GET['optr'],
                                                     "rctype"          => "MobileRecharge",
                                                     "rcstatus"        => "SUCCESS",
                                                     "transid"         => "0",
                                                     "requestedurl"    => "0",
                                                     "apiresponse"     => "0",
                                                     "txn_from"        => "API",
                                                     "api_uid"         => $_GET['uid'],
                                                     "return_url"      => "",
                                                     "return_response" => ""));
       
       $url = "https://vasanthamrecharge.com/ebird/api/rechargeapi.php?uname=JJSOFTAPI&password=72965&provider=".$_GET['optr']."&mobno=".$_GET['number']."&amount=".$_GET['amount']."&uid=".$txnid."&format=json";
       $mysql->execute("update `_transactions` set  `requestedurl`='".$url."' where `rctxtid`='".$txnid."' ");
       
       //account table
       $aid = $mysql->insert("_accounts",array("userid"          => $user[0]['userid'],
                                                   "txndate"     => date("Y-m-d H:i:s"),
                                                   "particulars" => "Mobile Recharge",
                                                   "rcnumber"    => $_GET['number'],
                                                   "rcamount"    => $_GET['amount'],
                                                   "credits"     => "0",
                                                   "debits"      => $_GET['amount'],
                                                   "balance"     => get_balance($user[0]['userid'])-$_GET['amount'],
                                                   "rctxnid"     => $txnid));  
       // call api
       $ch = curl_init($url);
       curl_setopt($ch, CURLOPT_HEADER, false);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       $repsonse = curl_exec($ch);
       curl_close($ch);
       
       //{"response":{"status":"Accepted","mobno":"9789555666","amount":"20","transid":"12345","error":"0","statuscode":"099"}} 
       $res = json_decode($repsonse,true); 
       
       $mysql->execute("update `_transactions` set `apiresponse`='".$repsonse."', transid='".$res['response']['transid']."'  where `rctxtid`='".$txnid."' ");
       
       if ($res['response']['status']=="Accepted") {
           echo json_encode(array("response"=>array("status"=>"SUCCESS","error"=>"","transid"=>$res['response']['transid'])));    
       } else {
         // update txn table
        
         
       // update account table  
       }
       
       
       
         
       
   } else {
        echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"service unavailable")));    
   }    
} else {
    echo json_encode(array("response"=>array("status"=>"FAILURE","error"=>"Invalid login")));
}
exit;
?>
{"response":{"status":"FAILURE","error":"Your IP not activated","statuscode":"099"}}
