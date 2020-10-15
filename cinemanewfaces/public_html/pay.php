<?php
session_start();    
date_default_timezone_set('Asia/Calcutta');
include_once("classes/class.DatabaseController.php");
$mysql = new MySqldatabase("localhost","cinemane_user","mysqlPwd@123","cinemane_database");
$userinformation = $mysql->select("select * from _Members where md5(concat('x',MemberID))='".$_POST['record']."'");
 
$amount=300;                      
$paymentid = $mysql->insert("_tblPayments",array("TxnDate"=>date("Y-m-d H:i:s"),
                                                 "TxnAmount"=>$amount,
                                                 "ClientID"=>$userinformation[0]['MemberID'],
                                                 "PaymentFor"=>"Membership"));
                                                 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:468c59be22114b0758c7a2de315b62e9",
                  "X-Auth-Token:61d14dcaffb13d678b3cf98377052f16"));
$payload = Array(
    'purpose' => 'Membership Fee',
    'amount' => $amount,
    'phone' => $userinformation[0]['MemberMobile'],
    'buyer_name' => $userinformation[0]['MemberName'],
    'redirect_url' => 'https://www.cinemanewfaces.com/Payment.php',
    'send_email' => false,
    'webhook' => 'https://www.cinemanewfaces.com/',
    'send_sms' => false,
    'email' => $userinformation[0]['MemberEmail'],
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
    echo "<script>location.href='https://www.cinemanewfaces.com/Error.php?msg=".$response['message']."';</script>";
}
?>