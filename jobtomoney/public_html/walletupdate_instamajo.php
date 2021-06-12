<?php
session_start();    
date_default_timezone_set('Asia/Calcutta');
include_once("controller/class.DatabaseController.php");
$mysql = new MySqldatabase("localhost","jobtomon_user","mysqlPwd@123","jobtomon_database");
$userinformation = $mysql->select("select * from _usertable where userid='".$_SESSION['USER']['userid']."'");
$amount=$_POST['Amount'];
$paymentid = $mysql->insert("_tblPayments",array("TxnDate"=>date("Y-m-d H:i:s"),
                                                 "TxnAmount"=>$amount,
                                                 "ClientID"=>$userinformation[0]['userid'],
                                                 "PaymentFor"=>"WalletUpdate"));
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:017748a7df09931105e6c4c3968d7f04",
                  "X-Auth-Token:fea4651dd4e18a39ee0e68b561a50e59"));
$payload = Array(
    'purpose' => 'Wallet Update',
    'amount' => $amount,
    'phone' => $userinformation[0]['mobileno'],
    'buyer_name' => $userinformation[0]['personname'],
    'redirect_url' => 'https://www.jobtomoney.com/WalletPayment',
    'send_email' => false,
    'webhook' => 'https://www.jobtomoney.com/',
    'send_sms' => false,
    'email' => $userinformation[0]['emailid'],
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 
$mysql->execute("update _tblPayments set APIResposne='".$response."' where PaymentID='".$paymentid."'");
$response = json_decode($response,true);
if ($response['success']=="true") {
    $mysql->execute("update _tblPayments set PaymentReqID='".$response['payment_request']['id']."' where PaymentID='".$paymentid."'");
    echo "<script>location.href='".$response['payment_request']['longurl']."';</script>";
} else {
    $mysql->execute("update _tblPayments set PaymentReqID='".$response['payment_request']['id']."',TxnStatus='Failure',IsProcessed='1' where PaymentID='".$paymentid."'");
    echo "<script>location.href='https://www.jobtomoney.com/Error?msg=';</script>";
}
?>