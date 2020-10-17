<?php
include_once("config.php");
 
if ($_POST['Plan']==1) {
    $amount=299;
  //  $amount=10;
    $days=7;
}
if ($_POST['Plan']==2) {
    $amount=100;
 //   $amount=10;
    $days=30;
}                     
            
$paymentid = $mysql->insert("_tblPayments",array("TxnDate"=>date("Y-m-d H:i:s"),
                                                 "TxnAmount"=>$amount,
                                                 "ClientID"=>$_SESSION['USER']['userid'],
                                                 "AdID"=>$_POST['adID'],
                                                 "PlanID"=>$_POST['Plan'],
                                                 "Days"=>$days,
                                                 "PaymentFor"=>"Feature Ad"));
                                                 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:468c59be22114b0758c7a2de315b62e9",
                  "X-Auth-Token:61d14dcaffb13d678b3cf98377052f16"));
$payload = Array(
    'purpose' => 'Feature Ad',
    'amount' => $amount,
    'phone' => $_SESSION['USER']['mobile'],
    'buyer_name' => $_SESSION['USER']['personname'],
    'redirect_url' => country_url.'/moreresponse/payu'.$_POST['adID'],
    'send_email' => false,
    'webhook' => 'https://www.www.klx.co.in/',
    'send_sms' => false,
    'email' => $_SESSION['USER']['email'],
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
    echo "<script>location.href='".country_url."/moreresponse/error".$_POST['adID']."?msg=".$response['message']."';</script>";
}
?>