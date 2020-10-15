<?php include_once("header.php");?>
<br><br><br>
<main id="main">
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-sm-8 col-xs-12" style="margin:0px auto;">
            <div class="well-middle">
                 <div class="row">
                    <div class="col-sm-6" style="margin:0px auto;text-align:center;color:#666">
                   
                     <?php
                     $data = $mysql->select("select * from  _tblPayments  where PaymentReqID='".$_GET['payment_request_id']."' and IsProcessed='0'");
                     
                     if (sizeof($data)==1) {
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/'.$_GET['payment_request_id'].'/');
                        curl_setopt($ch, CURLOPT_HEADER, FALSE);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                        curl_setopt($ch, CURLOPT_HTTPHEADER,
                                    array("X-Api-Key:468c59be22114b0758c7a2de315b62e9",
                                          "X-Auth-Token:61d14dcaffb13d678b3cf98377052f16"));
                        $response = curl_exec($ch);
                        $mysql->execute("update _tblPayments set PaymentResponse='".$response."' where PaymentReqID='".$_GET['payment_request_id']."'");
                        
                        curl_close($ch); 
                        $response = json_decode($response,true);
                        
 
                        $txn  = $mysql->select("select * from _tblPayments where PaymentReqID='".$_GET['payment_request_id']."'");
                        $userinformation = $mysql->select("select * from _Members where MemberID='".$txn[0]['ClientID']."'");
                        
                        if ($response['payment_request']['payments'][0]['status']=='Credit') {
                        //success
                                                                     
                         $mysql->execute("update _tblPayments set TxnStatus='Success' where PaymentReqID='".$_GET['payment_request_id']."'");
                       
                        $mysql->execute("update _Members set IsPaidMember='1',PaidOn='".date("Y-m-d H:i:s")."',PaidAmount='".$txn[0]['TxnAmount']."', PaymentID='".$txn[0]['PaymentID']."' where MemberID=".$txn[0]['ClientID']);
        
                        
                        $mysql->execute("update _tblPayments set IsProcessed='1' where PaymentReqID='".$_GET['payment_request_id']."'");
        
                         
       
         $headers = "MIME-Version: 1.0\r\n";
        $headers .= "From: info@kasupanamthuttu.com\r\n";
        $headers .= "Content-type: text/html\r\n";
        $headers .= "X-Mailer: PHP/".phpversion();
        
        $t = "Your account has been activated.<br>";
        $t .= "Your Password : ".$data[0]['password']."<br>";
        $t .= "Your Link : https://www.kasupanamthuttu.com/".$link."<br>";
        $t .= "Thanks<br>kasupanamthuttu Team.";
        
        
        // mail("jeyaraj_123@yahoo.com","Your account has been activated",$t,$headers);  
        // mail(trim($userinformation[0]['emailid']),"Your account has been activated",$t,$headers); 
        // mail("info@kasupanamthuttu.com",trim($userinformation[0]['emailid'])."-:-Your account has been activated",$t,$headers); 
                                                    
                        ?>
                            <div style="text-align:center;font-size:15px;color:#555">
                                    <img src="assets/success.png" style="width:256px;margin:0px auto">
                            
                                    <span style="font-size:30px;">Payment Success</span><br>
                                    
                                    Your account has activated.    <br><br>
                                    
                                    
                            
                            </div>
                        <?php } else { 
                            $mysql->execute("update _tblPayments set TxnStatus='Failure' where PaymentReqID='".$_GET['payment_request_id']."'");
                            
                            ?>
                             <div style="text-align:center;font-size:15px;color:#555">
                                    <img src="assets/failure.png" style="width:256px;margin:0px auto">
                                    <span style="font-size:30px;">Payment Failure</span><br>
                            </div>
                        <?php
                        }

                     } else {
                         echo "Access denied";
                     }

  /*
  
  https://www.kasupananthuttu.com/payment.php?payment_id=MOJO0425M05N31463359&payment_status=Credit&payment_request_id=3c2cb2da599641d395c591c7acccf499
   { "success": true, "payment_request": { "id": "3c2cb2da599641d395c591c7acccf499", "phone": "+918944872965", "email": "jeyaraj_1234567890@yahoo.com", "buyer_name": "Jeyaraj", "amount": "10.00", "purpose": "Membership Fee", "expires_at": null, "status": "Completed", "send_sms": false, "send_email": false, "sms_status": null, "email_status": null, "shorturl": "https://imjo.in/EpYpdu", "longurl": "https://www.instamojo.com/@kasupanamthuttu/3c2cb2da599641d395c591c7acccf499", "redirect_url": "https://www.kasupananthuttu.com/payment.php?", "webhook": "https://www.kasupananthuttu.com/", "payments": [ { "payment_id": "MOJO0425M05N31463359", "status": "Credit", "currency": "INR", "amount": "10.00", "buyer_name": "Jeyaraj", "buyer_phone": "+918944872965", "buyer_email": "jeyaraj_1234567890@yahoo.com", "shipping_address": null, "shipping_city": null, "shipping_state": null, "shipping_zip": null, "shipping_country": null, "quantity": 1, "unit_price": "10.00", "fees": "3.20", "variants": [], "custom_fields": {}, "affiliate_commission": "0", "payment_request": "https://www.instamojo.com/api/1.1/payment-requests/3c2cb2da599641d395c591c7acccf499/", "instrument_type": "NETBANKING", "billing_instrument": "Domestic Netbanking Regular", "tax_invoice_id": "", "failure": null, "payout": null, "created_at": "2020-04-25T04:57:06.182868Z" } ], "allow_repeated_payments": false, "customer_id": null, "created_at": "2020-04-25T04:56:54.398744Z", "modified_at": "2020-04-25T04:58:05.486971Z" } } 
   
   
   
  http://www.example.com?payment_id=MOJO5a06005J21512197&payment_status=Credit&payment_request_id=d66cb29dd059482e8072999f995c4eef
  {
  "payment_request": {
    "id": "d66cb29dd059482e8072999f995c4eef",
    "phone": null,
    "email": "foo@example.com",
    "buyer_name": "John Doe",
    "amount": "2500.00",
    "purpose": "FIFA 16",
    "status": "Completed",
    "send_sms": true,
    "send_email": true,
    "sms_status": "Pending",
    "email_status": "Pending",
    "shorturl": "https://imjo.in/NNxHg",
    "longurl": "https://www.instamojo.com/@ashwch/d66cb29dd059482e8072999f995c4eef",
    "redirect_url": "http://www.example.com/redirect/",
    "webhook": "http://www.example.com/webhook/",
    "payment": {
      "payment_id": "MOJO5a06005J21512197",
      "payment_request": "https://instamojo.com/api/1.1/payment-requests/be65d8abecc549918e8d8e61c801ae6f/",
      "quantity": 1,
      "status": "Credit",
      "link_slug": null,
      "link_title": null,
      "buyer_name": "John Doe",
      "buyer_phone": "+919999999999",
      "buyer_email": "foo@example.com",
      "currency": "INR",
      "unit_price": "2500.00",
      "amount": "2500.00",
      "fees": "125.00",
      "shipping_address": null,
      "shipping_city": null,
      "shipping_state": null,
      "shipping_zip": null,
      "shipping_country": null,
      "discount_code": null,
      "discount_amount_off": null,
      "variants": [],
      "custom_fields": {},
      "affiliate_id": null,
      "affiliate_commission": "0",
      "created_at": "2015-12-27T21:01:51.879Z"
    },
    "created_at": "2015-10-07T21:36:34.665Z",
    "modified_at": "2015-10-07T21:36:34.665Z",
    "allow_repeated_payments": false
  },
  "success": true
}
*/
?>
                </div>
            </div>
                                                      
            </div>
          </div>
        </div>
      </div>
    </div> 
<?php include_once("footer.php"); ?>