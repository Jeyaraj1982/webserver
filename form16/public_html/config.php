<?php
session_start();
date_default_timezone_set('Asia/Calcutta'); 
include_once("classes/DatabaseController.php");
include_once("classes/MobileSMSController.php");
include_once("classes/MailController.php");
include_once("classes/SequenceController.php");


define("APPMode","Live");
if (APPMode=="Test") {
    define("APPURL","https://testing.form16.online");    
    define("OrderValue","10");    
    $mysql = new MySqlDb("localhost","form16_user","mysqlPwd@123","form16_test");
} else {
    define("APPURL","https://www.form16.online");
    $mysql = new MySqlDb("localhost","form16_user","mysqlPwd@123","form16_database");
    //define("OrderValue","99");    
    define("OrderValue","10");
}  

$keyId = 'rzp_live_4kECNEAVEHV2ah';
$keySecret = 'UPkeEUYrZzHX8prQ8OxUGzVj';
$displayCurrency = 'INR';
require('lib/razorpay/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$api = new Api($keyId, $keySecret);
if ($_GET['action']=="Paynow") {
    $odr = $mysql->select("select * from _tbl_orders where md5(concat(FormID,OrderNumber))='".$_GET['req']."'");
    $data = $mysql->select("select * from _tbl_form_16 where id='".$odr[0]['FormID']."'");
    $member = $mysql->select("select * from _tbl_Members where MemberID ='".$odr[0]['MemberID']."'");

    if ($data[0]['IsPaid']==0) {
        $paymentReqCode = SeqMaster::GetNextPaymentCode(); 
        
        $orderData = ['receipt'         => $paymentReqCode."-".$odr[0]['OrderNumber'],
                      'amount'          => $odr[0]['OrderValue'] * 100, // 2000 rupees in paise
                      'currency'        => 'INR',
                      'payment_capture' => 1 // auto capture
                    ];
     
    
    $razorpayOrder = $api->order->create($orderData);
    $razorpayOrderId = $razorpayOrder['id'];
    $_SESSION['razorpay_order_id'] = $razorpayOrderId;
    
    $paymentreqest = $mysql->insert("_tbl_payments",array("PaymentDate"=>date("Y-m-d H:i:s"),
                                                            "PaymentCode"           => $paymentReqCode,
                                                            "Amount"           => "99",
                                                          "OrderID"=>$odr[0]['OrderID'],
                                                          "OrderNumber"=>$odr[0]['OrderNumber'],
                                                          "MemberID"=>$member[0]['MemberID'],
                                                          "MemberCode"=>$member[0]['MemberCode'],
                                                          "FormID"=>$odr[0]['FormID'],
                                                          "razorpay_orderid"=>$razorpayOrderId,
                                                          "IsSuccess"=>"0",
                                                          "IsFailure"=>"0",
                                                          "razorpay_response"=>""));
    $member[0]['MemberName']="Raja";
    $member[0]['MobileNumber']="9442461549";
    $member[0]['EmailID']="nexifysoftware@gmail.com";
    $member[0]['AddressLine1']="Tirunelveli";
    $member[0]['AddressLine2']="";
    ?>
  <form method="POST" action="https://api.razorpay.com/v1/checkout/embedded" id="paymentform" name="paymentform">
  <input type="hidden" name="key_id" value="rzp_live_4kECNEAVEHV2ah">
  <input type="hidden" name="order_id" value="<?php echo $razorpayOrderId;?>">
  <input type="hidden" name="name" value="Form16">
  <input type="hidden" name="description" value="Form16.online">
  <input type="hidden" name="image" value="https://www.form16.online/assets/logo.jpeg">
  <input type="hidden" name="prefill[name]" value="<?php echo $member[0]['MemberName'];?>">
  <input type="hidden" name="prefill[contact]" value="<?php echo $member[0]['MobileNumber'];?>">
  <input type="hidden" name="prefill[email]" value="<?php echo $member[0]['EmailID'];?>">              
  <input type="hidden" name="notes[shipping address]" value="<?php echo $member[0]['AddressLine1'].", ". $member[0]['AddressLine1'];?>">
  <input type="hidden" name="callback_url" value="<?php echo APPURL;?>/dashboard.php?action=PaymentProcessed&PayReq=<?php echo md5($paymentreqest.$odr[0]['OrderNumber']);?>">
  <input type="hidden" name="cancel_url" value="<?php echo APPURL;?>/dashboard.php?action=PaymentProcessed&PayReq=<?php echo md5($paymentreqest.$odr[0]['OrderNumber']);?>">
  </form>
  <script>document.getElementById("paymentform").submit();</script>
    <?php
    exit;  }
    else {
        echo "Already Paid";
        exit;
    }
}  



if ($_GET['action']=="UpdateWallet") {
   
    $paymentReqCode = SeqMaster::GetNextPaymentCode(); 
    $PaymentID = $mysql->insert("_tbl_payments",array("PaymentDate"       => date("Y-m-d H:i:s"), 
                                                      "PaymentCode"           => $paymentReqCode,
                                                      "AgentID"           => $_SESSION['User']['AgentID'],
                                                      "AgentCode"         => $_SESSION['User']['AgentCode'],
                                                      "Amount"  => $_POST['noofforms']*99,
                                                      "razorpay_orderid"  => "",
                                                      "IsSuccess"         => "0",
                                                      "IsFailure"         => "0",
                                                      "razorpay_response" => ""));
                                                          
    $member = $mysql->select("select * from _tbl_Agents where AgentID ='".$_SESSION['User']['AgentID']."'");

    
        
        
        $orderData = ['receipt'         => $paymentReqCode."-".$odr[0]['OrderNumber'],
                      'amount'          => $_POST['noofforms']*99 * 100, // 2000 rupees in paise
                      'currency'        => 'INR',
                      'payment_capture' => 1 // auto capture
                    ];
     
    
    $razorpayOrder = $api->order->create($orderData);
    $razorpayOrderId = $razorpayOrder['id'];
    $_SESSION['razorpay_order_id'] = $razorpayOrderId;
    $mysql->execute("update _tbl_payments set razorpay_orderid='".$razorpayOrderId."' where PaymentID='".$PaymentID."'");
     
    $member[0]['AgentName']="Raja";
    $member[0]['MobileNumber']="9442461549";
    $member[0]['EmailID']="nexifysoftware@gmail.com";
    $member[0]['AddressLine1']="Tirunelveli";
    $member[0]['AddressLine2']="";
    ?>
  <form method="POST" action="https://api.razorpay.com/v1/checkout/embedded" id="paymentform" name="paymentform">
  <input type="hidden" name="key_id" value="rzp_live_4kECNEAVEHV2ah">
  <input type="hidden" name="order_id" value="<?php echo $razorpayOrderId;?>">
  <input type="hidden" name="name" value="Form16">
  <input type="hidden" name="description" value="Form16.online">
  <input type="hidden" name="image" value="https://www.form16.online/assets/logo.jpeg">
  <input type="hidden" name="prefill[name]" value="<?php echo $member[0]['AgentName'];?>">
  <input type="hidden" name="prefill[contact]" value="<?php echo $member[0]['MobileNumber'];?>">
  <input type="hidden" name="prefill[email]" value="<?php echo $member[0]['EmailID'];?>">              
  <input type="hidden" name="notes[shipping address]" value="<?php echo $member[0]['AddressLine1'].", ". $member[0]['AddressLine1'];?>">
  <input type="hidden" name="callback_url" value="<?php echo APPURL;?>/dashboard.php?action=PaymentProcessed&PayReq=<?php echo md5($paymentReqCode.$razorpayOrderId);?>">
  <input type="hidden" name="cancel_url" value="<?php echo APPURL;?>/dashboard.php?action=PaymentProcessed&PayReq=<?php echo md5($paymentReqCode.$razorpayOrderId);?>">
  </form>
  <script>document.getElementById("paymentform").submit();</script>
    <?php
    exit;  
} 
                                                           


                                   
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__.'/lib/mail/src/Exception.php';
require __DIR__.'/lib/mail/src/PHPMailer.php';
require __DIR__.'/lib/mail/src/SMTP.php';
$mail    = new PHPMailer;
function reInitMail() {
    global $mail;
    $mail    = new PHPMailer;
}   
$acceptableform16 = array('image/jpeg','image/jpg','image/png','application/pdf');
$maxfilesizeinbyes =  10000000;
$maxfilesizeinmb =  10;     
function printDateTime($datetime) {
    return date("M d, Y H:i",strtotime($datetime));
} 

function createZip($zip,$dir){
  if (is_dir($dir)){
    if ($dh = opendir($dir)){
       while (($file = readdir($dh)) !== false){
         if (is_file($dir.$file)) {
            if($file != '' && $file != '.' && $file != '..'){
               $zip->addFile($dir.$file);
            }
         }else{
            if(is_dir($dir.$file) ){
              if($file != '' && $file != '.' && $file != '..'){
                $zip->addEmptyDir($dir.$file);
                $folder = $dir.$file.'/';
                createZip($zip,$folder);
              }
            }
         }
       }
       closedir($dh);
     }
  }
}

class SMSTemplate {
    function submitTemplete($role,$formid,$membername) {
        if ($role=="Member") {
            return "Dear applicant, Form16 has 16 been submitted. JRN is ".$formid." dt ".date("Y-m-d H:i").". Thanks Form16.online";    
        }
        if ($role=="Agent") {
            return "Dear Agent, Your member (".$membername.") Form16 has 16 been submitted. JRN is ".$formid." dt ".date("Y-m-d H:i").". Thanks Form16.online";    
        }
        if ($role=="Admin") {
            return "Dear Admin, Your member (".$membername.") Form16 has 16 been submitted. JRN is ".$formid." dt ".date("Y-m-d H:i").". Thanks Form16.online";    
        }
    }
}
function MemberWalletBalance($memberID) {
    global $mysql;
    $data = $mysql->select("select (sum(CreditAmount)-sum(DebitAmount)) as bal from `_wallet_member` where `MemberID`='".$memberID."'");
    return isset($data[0]['bal']) ? $data[0]['bal'] : 0;
}

function AgentWalletBalance($AgentID) {
    global $mysql;
    $data = $mysql->select("select (sum(CreditAmount)-sum(DebitAmount)) as bal from `_wallet_agent` where `AgentID`='".$AgentID."'");
    return isset($data[0]['bal']) ? $data[0]['bal'] : 0;
}

              
?>