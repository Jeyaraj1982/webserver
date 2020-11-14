<?php
session_start();    
date_default_timezone_set('Asia/Calcutta');
include_once("webadmin/mysql.php");
  $mysql =   new MySql();
 
$userinformation = $mysql->select("select * from ".$_POST['recordx']." where md5(concat('x',AdmissionID))='".$_POST['record']."'");
 

 
$amount = 150;
$paymentfor = "First Year Application";
           
$paymentid = $mysql->insert("_tblPayments",array("TxnDate"    => date("Y-m-d H:i:s"),
                                                 "TxnAmount"  => $amount,
                                                 "FormID"   => $userinformation[0]['AdmissionID'],
                                                 "TblName"   => $_POST['recordx'],
                                                 "PaymentFor" => $paymentfor));
   //80m1TuMEvWA8BtsjqQo9JaKWAfZ8S+W5VE9Xz4KH0mk=                                              
if (true) {
    $mysql->execute("update _tblPayments set PaymentFrom='PayU' where PaymentID='".$paymentid."'");
    $MERCHANT_KEY = "sJCCRFkP";
    $SALT = "XI7ezq8zgy";
    $PAYU_BASE_URL = "https://secure.payu.in";            // For Production Mode
    $action = '';
    $posted = array();
    $posted['key']=$MERCHANT_KEY;
    $posted['txnid']=$paymentid;
    $posted['amount']=$amount;
    $posted['firstname']=$userinformation[0]['CandidiateName'];
    $posted['email']=$userinformation[0]['EmailID'];
    $posted['phone']=$userinformation[0]['FathersMobile'];
    $posted['productinfo']="";
    $posted['surl']='https://www.nmskamarajpolytechnic.com/Payment.php';
    $posted['furl']='https://www.nmskamarajpolytechnic.com/Payment.php';
    $posted['service_provider']="payu_paisa";

    $txnid = $paymentid;
    $hash = '';
    $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
    $posted['productinfo'] = json_encode(json_decode('[{"name":"Frist Year Application Fee","description":"","value":"'.$amount.'","isRequired":"false"}]'));
    $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';    
    foreach($hashVarsSeq as $hash_var) {
        $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
        $hash_string .= '|';
    }
    $hash_string .= $SALT;
    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
?>
<form action="<?php echo $action; ?>" method="post" name="payuForm" id="payuForm">
    <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
    <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
    <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
    <input type="hidden" name="amount" value="<?php echo $amount; ?>" />
    <input type="hidden" name="firstname" id="firstname" value="<?php echo $posted['firstname']; ?>" /> 
    <input type="hidden" name="email" id="email" value="<?php echo $posted['email']; ?>" />
    <input type="hidden" name="phone" value="<?php echo $posted['phone']; ?>" />
    <textarea style="height:0px;width:0px;" name="productinfo"><?php echo $posted['productinfo']; ?></textarea>
    <input type="hidden" name="surl" value="<?php echo $posted['surl']; ?>"  />
    <input type="hidden" name="furl" value="<?php echo $posted['furl']; ?>"  />
    <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
</form>
<script>document.getElementById("payuForm").submit();</script>
<?php exit; } ?>

     