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
                            $userinformation = $mysql->select("select * from _tbl_documents_user where UserID='".$txn[0]['ClientID']."'");    
        
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
                                $mysql->execute("update _tblPayments set TxnStatus='Success', IsProcessed='1' where PaymentID='".$txnid."'");
                                 //$item =  $mysql->select("select * from _tbl_documents where md5(DocID)='".$_GET['item']."'");
                                 $mysql->insert("_tbl_documents_sold",array("RequestedOn"=>date("Y-m-d H:i:s"),
                                                                       "UserID"=>$userinformation[0]['UserID'],
                                                                       "PaymentID"=>$txnid,
                                                                       "DocID"=>$txn[0]['DocumentID']));
                               /*    
                                $t = "Your account has been activated with sms sending job.<br>";
                                $t .= "Your Password : ".$data[0]['password']."<br>";
                                $t .= "Thanks<br>kasupanamthuttu Team.";
                                
                                MailController::Send(array("MailTo"    =>$userinformation[0]['emailid'],
                                                           "Category"  =>"Activation",
                                                           "MemberID"  =>$userinformation[0]['id'],
                                                           "Subject"   =>"Your account activated with sms sending job",
                                                           "Message"   =>$t ),$mailError);
                                */
                        ?>
                            <div style="text-align:center;font-size:15px;color:#555">
                                    <img src="assets/success.png" style="width:256px;margin:0px auto">
                            
                                    <span style="font-size:30px;">Payment Success</span><br>
                                    
                                    <br>
                                    Click to <a href="MyDocuments">Continue to view download Links</a><br><Br><br>
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