<?php       
include_once("../config.php");

function writeTxt($text) {
    $file = "api.txt";
    $myfile = fopen($file, "a") or die("Unable to open file!");
    fwrite($myfile,"\n".date('Y-m-d H:i:s')."\t".$text);
    fclose($myfile);
}

writeTxt(json_encode($_GET));
if (isset($_GET['txnInfo'])) {
    $data = $mysql->select("select TxnAmount,InCommingAccountName,InCommingAccountNumber from _tbl_money_transfer where md5(concat('Jeyaraj',MoneyTransferID))='".$_GET['txnInfo']."'");
    if (sizeof($data)>0) {
        echo return_result(array("status"=>"SUCCESS","data"=>$data[0]));
    } else {
        echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"Data not found")));        
    }
    exit;
}

if (isset($_GET['AddIncommingBankAccount'])) {

    $user = $mysql->select("select * from _users where apiusername='".$_GET['apiusername']."' and apipassword='".$_GET['apipassword']."'");

    if (sizeof($user)==0){
        echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"Invalid login")));    
        exit;
    }
    
    $duplicate = $mysql->select("select * from _moneytransfer_incoming_bankaccount where accountnumber='".trim($_GET['accountnumber'])."'");
    if (sizeof($duplicate)>0) {
        echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"This account number already exists.")));    
        exit; 
    }
    
    $txnid = $mysql->insert("_moneytransfer_incoming_bankaccount",array("userid"        => $user[0]['userid'],
                                                                        "accountnumber" => trim($_GET['accountnumber']),
                                                                        "accountname"   => trim($_GET['accountname']),
                                                                        "ifscode"       => $_GET['ifscode'],
                                                                        "addedon"       => date("Y-m-d H:i:s")));      
    
    echo return_result(array("status"=>"SUCCESS","txnid"=>$txnid));                                                            
    exit;
}
 
if (!(isset($_GET['account_name']))) {
    echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"param:account_name missing")));        
    exit;
}
if (!(isset($_GET['account_number']))) {
    echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"param:account_number missing")));        
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
                                      
if (!(isset($_GET['ifsc_code']))) {
    echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"param:ifsc_code missing")));        
    exit;
}   
             
if (!(isset($_GET['remarks']))) {
    echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"param:remarks missing")));        
    exit;
}

if (!(strlen(trim($_GET['account_name']))>5)) {
    echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"param:account_name must have length greater than 5")));        
    exit;
}

if (!(strlen(trim($_GET['remarks']))>5)) {
    echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"param:remarks must have length greater than 5")));        
    exit;
}

$user = $mysql->select("select * from _users where apiusername='".$_GET['username']."' and apipassword='".$_GET['password']."'");

if (sizeof($user)==0){
    echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"Invalid login")));    
    exit;
}

if (!($user[0]['moneytransfer']==1)) {
    echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"Money Transfer service not enabled")));    
    exit;
}

if (!($_GET['amount']>=1)) {
    //echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"Minimum Amount Rs.1")));      
}

if (!($_GET['amount']<=$user[0]['maintain_balance'])) {
    echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"Allow to Transfer in your account Maxiumum Rs.".$user[0]['maintain_balance'])));      
}

$param['amount']   = $_GET['amount'] ;
$param['userid']   = $user[0]['userid'];
$param['number']   = $_GET['number']; 
$param['optr']     = $_GET['optr'] ;
$param['optrtype'] = "MoneyTransfer" ;
$param['txn_from'] = "API";                          
$param['uid']      = $_GET['uid'] ;

if (!($_GET['amount']>=10 && $_GET['amount']<=10000)) {
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
        echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"Amount must have 10 To 10000","txnid"=>$txnid)));        
        exit;
}

$xbalance =  MoneyTransfer::get_balance($user[0]['userid'])-$user[0]['maintain_balance'];

if ($xbalance<$_GET['amount']) { 
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
    echo return_result(array("response"=>array("status"=>"FAILURE","error"=>"unknown error","txnid"=>$txnid)));   
    exit;
} 

                           
   $param['userid']=$user[0]['userid'];
   $param['PaymentType']= "imps" ;
   $param['BeneficiaryName']= $_GET['account_name'] ;
   $param['BankAccountNumber'] =$_GET['account_number']; 
   $param['IFSCode'] =$_GET['ifsc_code'] ;
   $param['Amount']=  $_GET['amount'] ;
   $param['Remarks']=  $_GET['remarks'] ;
   $param['txn_from']= "API";                   
   $param['uid'] =$_GET['uid'] ;
   $response = MoneyTransfer::doTransfer($param); 
   
   echo return_result($response);
?>