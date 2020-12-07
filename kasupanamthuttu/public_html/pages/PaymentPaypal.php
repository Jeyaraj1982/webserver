<div class="line">
    <div class="box margin-bottom">
        <article class="s-12 m-7 l-12">
            <form action="" method="post">  
                <div id="formwindow" class="formwindow">
                   
                     <?php
                     
            
 
 
   $txnid=isset($_POST["txn_id"]) ? $_POST['txn_id'] : 0;
$response = json_encode($_POST);
// Salt should be same Post Request 

$data = $mysql->select("select * from  _tblPayments  where PaymentID='".$txnid."' and IsProcessed='0'");
    if (sizeof($data)==1) {
        $txn  = $mysql->select("select * from _tblPayments where PaymentID='".$txnid."'");
        $userinformation = $mysql->select("select * from _clients where id='".$txn[0]['ClientID']."'");
        
        $mysql->execute("update _tblPayments set PaymentResponse='".$response."' where PaymentID='".$txnid."'");
        
        if ($_POST['payment_status'] != "Completed") {
            $mysql->execute("update _tblPayments set TxnStatus='Failure' where PaymentID='".$txnid."'");
            ?>
            <div style="text-align:center;font-size:15px;color:#555">
                <img src="assets/failure.png" style="width:256px;margin:0px auto">
                <span style="font-size:30px;">Payment Failure</span><br>
            </div>
            <?php
        } else {
            $mysql->execute("update _tblPayments set TxnStatus='Success' where PaymentID='".$txnid."'");
            $link=$userinformation[0]['']."-".getrealname($userinformation[0]['firstname']);
            $mysql->execute("update _clients set userlink='".$link."' where id=".$txn[0]['ClientID']);
            $mysql->execute("update _clients set isblock='0', isactive='1', activatedon='".date("Y-m-d H:i:s")."' where id=".$txn[0]['ClientID']);        
            $mysql->execute("update _tblPayments set IsProcessed='1' where PaymentID='".$txnid."'");
            $ref = $mysql->select("select * from _clients where id=".$userinformation[0]['referringby']);
            //$ref_x = $mysql->select("select * from _clients where id=".$ref[0]['referringby']);
            $cramount = 0;
            function getAmount($country,$plan) {
                            
                            switch($plan) {
                                case '1' :
                                return '100';
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
       
       
         $headers = "MIME-Version: 1.0\r\n";
        $headers .= "From: info@kasupanamthuttu.com\r\n";
        $headers .= "Content-type: text/html\r\n";
        $headers .= "X-Mailer: PHP/".phpversion();
        
        $t = "Your account has been activated.<br>";
        $t .= "Your Password : ".$data[0]['password']."<br>";
        $t .= "Your Link : https://www.kasupanamthuttu.com/".$link."<br>";
        $t .= "Thanks<br>kasupanamthuttu Team.";
        
        
         mail("jeyaraj_123@yahoo.com","Your account has been activated",$t,$headers);  
         mail(trim($userinformation[0]['emailid']),"Your account has been activated",$t,$headers); 
         mail("info@kasupanamthuttu.com",trim($userinformation[0]['emailid'])."-:-Your account has been activated",$t,$headers); 
                                                    
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