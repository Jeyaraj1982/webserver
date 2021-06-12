<div class="line">
    <div class="box margin-bottom">
        <article class="s-12 m-7 l-12">
            <form action="" method="post">  
                <div id="formwindow" class="formwindow">
                   
                     <?php
                     $data = $mysql->select("select * from  _tblPayments  where PaymentReqID='".$_GET['payment_request_id']."' and IsProcessed='0'");
                     
                     if (sizeof($data)==1) {
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/'.$_GET['payment_request_id'].'/');
                        curl_setopt($ch, CURLOPT_HEADER, FALSE);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                        curl_setopt($ch, CURLOPT_HTTPHEADER,
                                    array("X-Api-Key:017748a7df09931105e6c4c3968d7f04",
                                          "X-Auth-Token:fea4651dd4e18a39ee0e68b561a50e59"));
                        $response = curl_exec($ch);
                        $mysql->execute("update _tblPayments set PaymentResponse='".$response."' where PaymentReqID='".$_GET['payment_request_id']."'");
                        
                        curl_close($ch); 
                        $response = json_decode($response,true);
                        
 
                        $txn  = $mysql->select("select * from _tblPayments where PaymentReqID='".$_GET['payment_request_id']."'");
                        $userinformation = $mysql->select("select * from _clients where id='".$txn[0]['ClientID']."'");
                        
                        if ($response['payment_request']['payments'][0]['status']=='Credit') {
                        //success
                                                                     
                         $mysql->execute("update _tblPayments set TxnStatus='Success' where PaymentReqID='".$_GET['payment_request_id']."'");
                        $link=$userinformation[0]['']."-".getrealname($userinformation[0]['firstname']);
                        // $link=getLink(10,getrealname($data[0]['firstname']));
        
                        $mysql->execute("update _clients set userlink='".$link."' where id=".$txn[0]['ClientID']);
        
                        //echo "Account Id : ".$data[0]['id']."<br>";
                        //echo "Updated user link.<br>";
                        //echo "https://www.kasupanamthuttu.com/".$link."<br>";
        
                        $mysql->execute("update _clients set isblock='0', isactive='1', activatedon='".date("Y-m-d H:i:s")."' where id=".$txn[0]['ClientID']);        
       
                        $mysql->execute("update _tblPayments set IsProcessed='1' where PaymentReqID='".$_GET['payment_request_id']."'");
        
                        $ref = $mysql->select("select * from _clients where id=".$userinformation[0]['referringby']);
                        //$ref_x = $mysql->select("select * from _clients where id=".$ref[0]['referringby']);
                        
                        $cramount = 0;
                        
                        function getAmount($country,$plan) {
                            
                            switch($plan) {
                                case '1' :
                                return '400';
                                break;
                                case '2' :
                                return "1000";
                                break;
                                default : 
                                return "0";
                                break;
                            }
                        }
       
       
                        switch($ref[0]['plan']) {
                            case '1' : 
                                $cramount = getAmount($ref[0]['country'],1);
                                break;
                            case '2' :
                            if ($data[0]['plan']==1) {
                                $cramount = getAmount($ref[0]['country'],1);
                            } else if ($data[0]['plan']==2) {
                                $cramount = getAmount($ref[0]['country'],2);    
                            }
                            break;
                        }
                        $cramount_ref =  $cramount;
                  
                     $array = array(
       "clientid"=>$data[0]['referringby'],
       "date"=>date("Y-m-d H:i:s"),
       "particulars" => "New User Activation",
       "cramount" => $cramount,
       "dramount" => '0',
       "description"=>"New User Activation"
       );
          $recordId = $mysql->insert("_clients_account",$array);  
       /*   

       if ((sizeof($ref)>0) && ($ref[0]['referringby']>0)) {    

       $array = array("id"=>'Null',
      "clientid"=>$ref[0]['referringby'],
       "date"=>date("Y-m-d H:i:s"),
       "particulars" => "New User Activation",
       "cramount" => $cramount_ref,
       "dramount" => '0',
       "description"=>"New User Activation"
       );

        $recordId = $mysql->insert("_clients_account",$array);  
        
        }
        
            */
       
         $headers = "MIME-Version: 1.0\r\n";
        $headers .= "From: info@jobtomoney.com\r\n";
        $headers .= "Content-type: text/html\r\n";
        $headers .= "X-Mailer: PHP/".phpversion();
        
        $t = "Your account has been activated.<br>";
        $t .= "Your Password : ".$data[0]['password']."<br>";
        $t .= "Your Link : https://www.jobtomoney.com/".$link."<br>";
        $t .= "Thanks<br>jobtomoney Team.";
        
        
         mail("jeyaraj_123@yahoo.com","Your account has been activated",$t,$headers);  
         mail(trim($userinformation[0]['emailid']),"Your account has been activated",$t,$headers); 
         mail("info@jobtomoney.com",trim($userinformation[0]['emailid'])."-:-Your account has been activated",$t,$headers); 
                                                    
                        ?>
                            <div style="text-align:center;font-size:15px;color:#555">
                                    <img src="assets/success.png" style="width:256px;margin:0px auto">
                            
                                    <span style="font-size:30px;">Payment Success</span><br>
                                    
                                    Your account has activated.    <br><br>
                                    
                                    Click to <a href="login">login your account</a><br><Br><br>
                            
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
            </form>
        </article>
    </div>
</div> 