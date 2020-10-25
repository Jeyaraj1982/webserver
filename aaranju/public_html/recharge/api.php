<?php       
include_once("../config.php");

function writeTxt($text) {
    $file = "api_".date("Y_m_d").".txt";
    $myfile = fopen($file, "a") or die("Unable to open file!");
    fwrite($myfile,"\n".date('Y-m-d H:i:s')."\t".$text);
    fclose($myfile);
}

writeTxt(json_encode($_GET));
 
if (!(isset($_GET['number']))) {
    echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"param:number missing")));        
    exit;
}

if (!(isset($_GET['amount']))) {
    echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"param:amount missing")));        
    exit;
}

if (!(isset($_GET['uid']))) {
    echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"param:uid missing")));        
    exit;
}
                                      
if (!(isset($_GET['optr']))) {
    echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"param:optr missing")));        
    exit;
}

$isOptr = $mysql->select("select * from `_tbl_operators` where OperatorCode='".$_GET['optr']."'");
if (sizeof($isOptr)==0) {
    echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"invalid operator code")));        
    exit;    
}

$user = $mysql->select("select * from _users where apiusername='".$_GET['username']."' and apipassword='".$_GET['password']."'");
if (sizeof($user)==0){
    echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"Invalid login")));    
    exit;
}

$param['amount']   = $_GET['amount'] ;
$param['userid']   = $user[0]['userid'];
$param['number']   = $_GET['number']; 
$param['optr']     = $_GET['optr'] ;
$param['optrtype'] = "MobileRecharge" ;
$param['txn_from'] = "API";
$param['uid']      = $_GET['uid'] ;

if ($_GET['amount']<10) {
        $txnid = $mysql->insert("_transactions",array("userid"          => $param['userid'],
                                                      "txndate"         => date("Y-m-d H:i:s"),
                                                      "rcnumber"        => $param['number'],
                                                      "rcamount"        => $param['amount'],
                                                      "optrcode"        => $param['optr'],
                                                      "rctype"          => $param['optrtype'],
                                                      "rcstatus"        => "FAILURE",
                                                      "transid"         => "0",
                                                      "requestedurl"    => "0",
                                                      "apiresponse"     => "0",
                                                      "txn_from"        => $param['txn_from'],
                                                      "api_uid"         => $param['uid'],
                                                      "return_url"      => "",
                                                      "refundon"        => date("Y-m-d H:i:s"),
                                                      "return_response" => "FAILURE,amount must greater than Rs. 10,".$txnid));
        echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"amount must greater than Rs. 10","txnid"=>$txnid)));        
        exit;
}

if (Recharge::get_balance($user[0]['userid'])<$_GET['amount']) { 
    $txnid = $mysql->insert("_transactions",array("userid"          => $param['userid'],
                                                  "txndate"         => date("Y-m-d H:i:s"),
                                                  "rcnumber"        => $param['number'],
                                                  "rcamount"        => $param['amount'],
                                                  "optrcode"        => $param['optr'],
                                                  "rctype"          => $param['optrtype'],
                                                  "rcstatus"        => "FAILURE",
                                                  "transid"         => "0",
                                                  "requestedurl"    => "0",
                                                  "apiresponse"     => "0",
                                                  "txn_from"        => $param['txn_from'],
                                                  "api_uid"         => $param['uid'],
                                                  "return_url"      => "",
                                                  "refundon"        => date("Y-m-d H:i:s"),
                                                  "return_response" => "FAILURE,low balance,".$txnid));
    echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"low balance","txnid"=>$txnid))); 
} 

if ($_GET['optr']=="RJ") {

    $ch = curl_init("https://jio.rechargecube.in/jio_checkMobile?mobile=".$_GET['number']);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $repsonse = curl_exec($ch);
    curl_close($ch);
    $res = json_decode($repsonse,true);              
    if ($res['type']=="error") {
         echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"Invalid Jio Number")));        
         exit;
    }
                                                       
    $amount_array=array(129,329,1299,98,349,599,444,249,149,2020,555,399,199,10,20,50,100,500,1000,185,155,125,75,594,297,153,99,98,699,2099,4199,11,21,51,101,251,501,1101,594,297);
    if (!(in_array(trim($_GET['amount']), $amount_array))) {
        echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"Invalid Jio RC Amount")));        
        exit;
    }
}

$response = Recharge::doRecharge($param); 
echo return_result($response);
?>