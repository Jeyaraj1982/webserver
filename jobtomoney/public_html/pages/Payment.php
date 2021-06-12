<div class="line">
    <div class="box margin-bottom">
        <article class="s-12 m-7 l-12">
            <form action="" method="post">  
                <div id="formwindow" class="formwindow">
                     <?php
                        $status=$_POST["status"];
                        $firstname=$_POST["firstname"];
                        $amount=$_POST["amount"];
                        $txnid=$_POST["txnid"];
                        $posted_hash=$_POST["hash"];
                        $key=$_POST["key"];
                        $productinfo=$_POST["productinfo"];
                        $email=$_POST["email"];
                        $salt="YqbXwgaFWV";
                        $response = json_encode($_POST);
                        // Salt should be same Post Request 

                        $data = $mysql->select("select * from  _tblPayments  where PaymentID='".$txnid."' and IsProcessed='0'");
                        if (sizeof($data)==1) {
                            $txn  = $mysql->select("select * from _tblPayments where PaymentID='".$txnid."'");
                            $userinformation = $mysql->select("select * from _clients where id='".$txn[0]['ClientID']."'");
        
                            $mysql->execute("update _tblPayments set PaymentResponse='".$response."' where PaymentID='".$txnid."'");
                            If (isset($_POST["additionalCharges"])) {
                                $additionalCharges=$_POST["additionalCharges"];
                                $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
                            } else {
                                $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
                            }
                            
                            $hash = hash("sha512", $retHashSeq);
                            if ($hash != $posted_hash || $status=="failure") {
                                $mysql->execute("update _tblPayments set TxnStatus='Failure' where PaymentID='".$txnid."'");
                            ?>
                                <div style="text-align:center;font-size:15px;color:#555">
                                    <img src="assets/failure.png" style="width:256px;margin:0px auto">
                                    <span style="font-size:30px;">Payment Failure</span><br>
                                </div>
                            <?php
                            }  else {
                                $mysql->execute("update _tblPayments set TxnStatus='Success' where PaymentID='".$txnid."'");
                                $mysql->execute("update _clients set isblock='0', isactive='1', activatedon='".date("Y-m-d H:i:s")."' where id=".$txn[0]['ClientID']);        
                                $mysql->execute("update _tblPayments set IsProcessed='1' where PaymentID='".$txnid."'");

                                $cramount = 0;
                                $cramount = getReferalIncome($data[0]['JobTypeID']);
                                
                                if ($userinformation[0]['referringby']>0) {
                                    $referalinfo = $mysql->select("select * from _clients where id='".$userinformation[0]['referringby']."'");
                                    $mysql->insert("_clients_account",array("clientid"    => $userinformation[0]['referringby'],
                                                                            "date"        => date("Y-m-d H:i:s"),
                                                                            "particulars" => "New User Activation/".$userinformation[0]['id']."/".$data[0]['PaymentFor'],
                                                                            "cramount"    => $cramount,
                                                                            "dramount"    => '0',
                                                                            "description" => "New User Activation/".$userinformation[0]['id']."/".$data[0]['PaymentFor']));  
                                }
                                
                                /* ad posting job */
                                if ($data[0]['JobTypeID']==1) {
                                    
                                    $link=$userinformation[0]['id']."-".getrealname($userinformation[0]['firstname']);
                                    $mysql->execute("update _clients set userlink='".$link."',adposting_enabled='1',adposting_enabledon='".date("Y-m-d H:i:s")."' where id=".$txn[0]['ClientID']);
                                    
                                    $message = "Dear ".$userinformation[0]['firstname'].", Your account (ID: ".$userinformation[0]['id'].") has been activated and enabled ad posting job. Thanks jobtomoney.com";
                                    MobileSMS::sendSMS($userinformation[0]['mobileno'],$message,$userinformation[0]['id']);
                                    
                                    $t = "Your account has been activated.<br>";
                                    $t .= "Your Password : ".$userinformation[0]['password']."<br>";
                                    $t .= "Your Link : https://www.jobtomoney.com/".$link."<br>";
                                    $t .= "Thanks<br>jobtomoney Team.";
        
                                    MailController::Send(array("MailTo"     => $userinformation[0]['emailid'],
                                                               "Category"   => "Activation",
                                                               "MemberID"   => $userinformation[0]['id'],
                                                               "Subject"    => "Your account activated  with adposting job",
                                                               "Message"    => $t),$mailError);
                                                              
                                                              
                                    if (isset($referalinfo) && sizeof($referalinfo)>0) {
                                        $rmessage = "Dear ".$referalinfo[0]['firstname'].", You refered member (ID: ".$referalinfo[0]['id'].") has been activated and enabled ad posting job. You have earned (Rs. ".number_format($cramount,2)."). Thanks jobtomoney.com";
                                        MobileSMS::sendSMS($referalinfo[0]['mobileno'],$rmessage,$referalinfo[0]['id']); 
                                        MailController::Send(array("MailTo"     => $referalinfo[0]['emailid'],
                                                                   "Category"   => "Activation",
                                                                   "MemberID"   => $referalinfo[0]['id'],
                                                                   "Subject"    => "You refered member (ID: ".$referalinfo[0]['id'].") activated and enabled ad posting job",
                                                                   "Message"    => $rmessage),$mailError);
                                    }
                                }
                                
                                if ($data[0]['JobTypeID']==2) {
                                    
                                    $mysql->execute("update _clients set emailjob_enabled='1',emailjob_enabledon='".date("Y-m-d H:i:s")."' where id=".$txn[0]['ClientID']); 
                                    $message = "Dear ".$userinformation[0]['firstname'].", Your account (ID: ".$userinformation[0]['id'].") has been activated and enabled email sending job. Thanks jobtomoney.com";
                                    MobileSMS::sendSMS($userinformation[0]['mobileno'],$message,$userinformation[0]['id']);
                                    
                                   
                                    $t = "Your account has been activated  with email sending job.<br>";
                                    $t .= "Your Password : ".$data[0]['password']."<br>";
                                    $t .= "Thanks<br>jobtomoney Team.";
                                    
                                    MailController::Send(array("MailTo"     => $userinformation[0]['emailid'],
                                                               "Category"   => "Activation",
                                                               "MemberID"   => $userinformation[0]['id'],
                                                               "Subject"    => "Your account activated with sms sending job",
                                                               "Message"    => $t),$mailError);
                                                              
                                    if (isset($referalinfo) && sizeof($referalinfo)>0) {
                                        $rmessage = "Dear ".$referalinfo[0]['firstname'].", You refered member (ID: ".$referalinfo[0]['id'].") has been activated and enabled email sending job. You have earned (Rs. ".number_format($cramount,2)."). Thanks jobtomoney.com";
                                        MobileSMS::sendSMS($referalinfo[0]['mobileno'],$rmessage,$referalinfo[0]['id']); 
                                        MailController::Send(array("MailTo"     => $referalinfo[0]['emailid'],
                                                                   "Category"   => "Activation",
                                                                   "MemberID"   => $referalinfo[0]['id'],
                                                                   "Subject"    => "You refered member (ID: ".$referalinfo[0]['id'].") activated and enabled email sending job",
                                                                   "Message"    => $rmessage),$mailError);
                                    }
                                }
                                
                                if ($data[0]['JobTypeID']==3) {
                                     
                                     $mysql->execute("update _clients set smsjob_enabled='1',smsjob_enabledon='".date("Y-m-d H:i:s")."' where id=".$txn[0]['ClientID']); 
                                     $message = "Dear ".$userinformation[0]['firstname'].", Your account (ID: ".$userinformation[0]['id'].") has been activated and enabled sms sending job. Thanks jobtomoney.com";
                                     MobileSMS::sendSMS($userinformation[0]['mobileno'],$message,$userinformation[0]['id']);
                                     
                                     $t = "Your account has been activated with sms sending job.<br>";
                                     $t .= "Your Password : ".$data[0]['password']."<br>";
                                     $t .= "Thanks<br>jobtomoney Team.";
                                     
                                     MailController::Send(array("MailTo"    =>$userinformation[0]['emailid'],
                                                                "Category"  =>"Activation",
                                                                "MemberID"  =>$userinformation[0]['id'],
                                                                "Subject"   =>"Your account activated with sms sending job",
                                                                "Message"   =>$t ),$mailError);

                                     if (isset($referalinfo) && sizeof($referalinfo)>0) {
                                         $rmessage = "Dear ".$referalinfo[0]['firstname'].", You refered member (ID: ".$referalinfo[0]['id'].") has been activated and enabled sms sending job. You have earned (Rs. ".number_format($cramount,2)."). Thanks jobtomoney.com";
                                         MobileSMS::sendSMS($referalinfo[0]['mobileno'],$rmessage,$referalinfo[0]['id']); 
                                         
                                         MailController::Send(array("MailTo"    => $referalinfo[0]['emailid'],
                                                                    "Category"  => "Activation",
                                                                    "MemberID"  => $referalinfo[0]['id'],
                                                                    "Subject"   => "You refered member (ID: ".$referalinfo[0]['id'].") activated and enabled sms sending job",
                                                                    "Message"   => $rmessage),$mailError);
                                     }
                                }
                                
                                /* end of adposting job */                    
                        ?>
                            <div style="text-align:center;font-size:15px;color:#555">
                                    <img src="assets/success.png" style="width:256px;margin:0px auto">
                            
                                    <span style="font-size:30px;">Payment Success</span><br>
                                    
                                    Your account has activated.    <br><br>
                                     <?php if (!(isset($_SESSION['xuser']))) {?>
                                    Click to <a href="login">login your account</a><br><Br><br>
                                    <?php } else {
                                     $_SESSION['user']=$_SESSION['xuser'];
                                     unset($_SESSION['xuser']);
                                     ?>
                                    Click to <a href="login">continue to myhome</a><br><Br><br>
                                    <?php } ?>
                            
                            </div>
                        <?php 
                        
       
           }
    

                      } else {
                         echo "Access denied";
                     } 
                   
                       

                   

   
?>
                </div>
            </form>
        </article>
    </div>
</div> 