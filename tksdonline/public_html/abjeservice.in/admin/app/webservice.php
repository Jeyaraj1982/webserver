<?php
include_once("../config.php");
echo $_GET['action']();

function getTNPolic() {
    global $mysql;
    $data = $mysql->select("SELECT txn.*,police.* FROM _tbl_transactions AS txn LEFT JOIN _tbl_utility_tnpolice AS police ON police.TxnID=txn.txnid  WHERE txn.txnid='".$_GET['txn']."'");
    $mem  = $mysql->select("select * from _tbl_member where MemberID='".$data[0]['memberid']."'");
    $result=array("Transaction ID"         =>$data[0]['TxnID'],
                  "Transaction Date"       =>$data[0]['CreatedOn'],
                  "Agent Name"             =>$mem[0]['MemberName'],
                  "Mobile Number"          =>$mem[0]['MobileNumber'],
                  "Document type"          =>$data[0]['DocumentType'],
                  "Document Number"        =>$data[0]['DocumentNumber'],
                  "ChasissNumber"          =>$data[0]['ChasissNumber'],
                  "Vehicle Owner Name"     =>$data[0]['VehicleOwnerName'],
                  "Amount"                 =>$data[0]['Amount'],
                  "Status"                 =>$data[0]['TxnStatus'],
                  "Customer Mobile Number" =>$data[0]['CustomerMobileNumber'],
                  "Bill Number"            =>$data[0]['OperatorNumber'],
                  "Charge"                 =>$data[0]['charge'],
                  "Called Url"             =>$data[0]['calledurl'],
                  "Url Response"           =>$data[0]['urlresponse']);
    return json_encode($result);
}
function getIMPSTxn() {
    global $mysql;
    $data = $mysql->select("SELECT txn.*,mem.MobileNumber,mem.MemberName FROM _tbl_transactions AS txn LEFT JOIN _tbl_member AS mem ON mem.MemberID=txn.memberid  WHERE txnid='".$_GET['txn']."'");
    $chargedetails = $mysql->select("select * from _tbl_accounts where AccountID='".$data[0]['ACtxnid']."'");
    $result=array("Transaction ID"         =>$data[0]['txnid'],
                  "Transaction Date"       =>$data[0]['txndate'],
                  "Agent Name"             =>$data[0]['MemberName'],
                  "Mobile Number"          =>$data[0]['MobileNumber'],
                  "Account Holder Name"    =>$data[0]['AccountName'],
                  "Account Number"         =>$data[0]['rcnumber'],
                  "IFSCode"                =>$data[0]['IFSCode'],
                  "Amount"                 =>$data[0]['rcamount'],
                  "Remarks"                =>$data[0]['Remarks'],
                  "Status"                 =>$data[0]['TxnStatus'],
                  "Customer Mobile Number" =>$data[0]['CustomerMobileNumber'],
                  "Bank Reference Number"  =>$data[0]['OperatorNumber'],
                  "Charge"                 =>$data[0]['charge'],
                  "Called Url"             =>$data[0]['calledurl'],
                  "Url Response"           =>$data[0]['urlresponse']);
    return json_encode($result);
}
function getTNEBTxn() {
    global $mysql;
    $data = $mysql->select("select txn.*,mem.MobileNumber,mem.MemberName from _tbl_transactions as txn left join _tbl_member as mem on mem.MemberID=txn.memberid  where txnid='".$_GET['txn']."'");
     $account =$mysql->select("select _tbl_accounts where AccountID='".$data[0]['Actxnid']."'");
     
     $result=array("Transaction ID"         =>$data[0]['txnid'],
                   "Transaction Date"       =>$data[0]['txndate'],
                   "Agent Name"             =>$data[0]['MemberName'],
                   "Operator"               =>$data[0]['operatorcode'],
                   "Mobile Number"          =>$data[0]['MobileNumber'],
                   "TNEB Number"            =>$data[0]['rcnumber'],
                   "Amount"                 =>$data[0]['rcamount'],
                   "Status"                 =>$data[0]['TxnStatus'],
                   "Bill Number"            =>$data[0]['OperatorNumber'],
                   "Customer Mobile Number" =>$data[0]['CustomerMobileNumber'],
                   "Charge"                 =>$data[0]['charge'],
                   "Called Url"             =>$data[0]['calledurl'],
                   "Url Response"           =>$data[0]['urlresponse']);
    
    return json_encode($result);
}
function getInsuranceTxn() {
    global $mysql;
    $data = $mysql->select("select txn.*,mem.MobileNumber,mem.MemberName from _tbl_transactions as txn left join _tbl_member as mem on mem.MemberID=txn.memberid  where txnid='".$_GET['txn']."'");
     
     $result=array("Transaction ID"         =>$data[0]['txnid'],
                   "Transaction Date"       =>$data[0]['txndate'],
                   "Agent Name"             =>$data[0]['MemberName'],
                   "Operator"               =>$data[0]['operatorcode'],
                   "Mobile Number"          =>$data[0]['MobileNumber'],
                   "Number"                 =>$data[0]['rcnumber'],
                   "DOB"                    =>$data[0]['dob'],
                   "Premium Amount"         =>number_format($data[0]['PremiumAmount'],2),
                   "Fine Amount"            =>number_format($data[0]['FineAmount'],2),
                   "Amount"                 =>number_format($data[0]['rcamount'],2),
                   "Status"                 =>$data[0]['TxnStatus'],
                   "Bill Number"            =>$data[0]['OperatorNumber'],
                   "Customer Mobile Number" =>$data[0]['CustomerMobileNumber'],
                   "Charge"                 =>$data[0]['charge'],
                   "Called Url"             =>$data[0]['calledurl'],
                   "Url Response"           =>$data[0]['urlresponse']);
    
    return json_encode($result);
}
function getLandlineTxn() {
    global $mysql;
    $data = $mysql->select("select txn.*,mem.MobileNumber,mem.MemberName from _tbl_transactions as txn left join _tbl_member as mem on mem.MemberID=txn.memberid  where txnid='".$_GET['txn']."'");
     
     $result=array("Transaction ID"         =>$data[0]['txnid'],
                   "Transaction Date"       =>$data[0]['txndate'],
                   "Agent Name"             =>$data[0]['MemberName'],
                   "Mobile Number"          =>$data[0]['MobileNumber'],
                   "Number"                 =>$data[0]['rcnumber'],
                   "Amount"                 =>$data[0]['rcamount'],
                   "Status"                 =>$data[0]['TxnStatus'],
                   "Bill Number"            =>$data[0]['OperatorNumber'],
                   "Customer Mobile Number" =>$data[0]['CustomerMobileNumber'],
                   "Charge"                 =>$data[0]['charge'],
                   "Called Url"             =>$data[0]['calledurl'],
                   "Url Response"           =>$data[0]['urlresponse']);
    
    return json_encode($result);
}
function getPostPaidTxn() {
    global $mysql;
    $data = $mysql->select("select txn.*,mem.MobileNumber,mem.MemberName from _tbl_transactions as txn left join _tbl_member as mem on mem.MemberID=txn.memberid  where txnid='".$_GET['txn']."'");
     
     $result=array("Transaction ID"         =>$data[0]['txnid'],
                   "Transaction Date"       =>$data[0]['txndate'],
                   "Agent Name"             =>$data[0]['MemberName'],
                   "Mobile Number"          =>$data[0]['MobileNumber'],
                   "Number"                 =>$data[0]['rcnumber'],
                   "Amount"                 =>$data[0]['rcamount'],
                   "Status"                 =>$data[0]['TxnStatus'],
                   "Bill Number"            =>$data[0]['OperatorNumber'],
                   "Customer Mobile Number" =>$data[0]['CustomerMobileNumber'],
                   "Charge"                 =>$data[0]['charge'],
                   "Called Url"             =>$data[0]['calledurl'],
                   "Url Response"           =>$data[0]['urlresponse']);
    
    return json_encode($result);
}
function MoveOtherDealer(){
   global $mysql;
   
   
   $mem = $mysql->select("select * from _tbl_member where MemberID='".$_POST['OtherDealer']."'");
   
   $id = $mysql->execute("update `_tbl_member` set `MapedTo`    ='".$_POST['OtherDealer']."',
                                                   `MapedToName`='".$mem[0]['MemberName']."' where `MemberID`='".$_POST['MemberID']."'");
   
    $result = array();
    $result['status']="Success";
    $result['message']="Agent Moved.";  
    return json_encode($result);
}
?>