<div class="line">
    <div class="box margin-bottom">
        <article class="s-12 m-7 l-12">
            <form action="" method="post">  
                <div id="formwindow" class="formwindow">
                   
                     <?php
                     
            
            //  print_r($_POST);
 
   $txnid=isset($_POST["txnid"]) ? $_POST['txnid'] : 0;
$response = json_encode($_POST);
// Salt should be same Post Request 

$data = $mysql->select("select * from  _tblPayments  where PaymentID='".$txnid."' and IsProcessed='0'");
    if (sizeof($data)==1) {
        $txn  = $mysql->select("select * from _tblPayments where PaymentID='".$txnid."'");
        $userinformation = $mysql->select("select * from _full_time_job_resume where ResumeID='".$txn[0]['ClientID']."'");
        
        $mysql->execute("update _tblPayments set PaymentResponse='".$response."' where PaymentID='".$txnid."'");
        
        if ($_POST['status'] != "success") {
            $mysql->execute("update _tblPayments set TxnStatus='Failure' where PaymentID='".$txnid."'");
            ?>
            <div style="text-align:center;font-size:15px;color:#555">
                <img src="assets/failure.png" style="width:256px;margin:0px auto">
                <span style="font-size:30px;">Payment Failure</span><br>
            </div>
            <?php
        } else {
            $mysql->execute("update _tblPayments set TxnStatus='Success' where PaymentID='".$txnid."'");
             $mysql->execute("update _tblPayments set IsProcessed='1' where PaymentID='".$txnid."'");
          
        $mysql->execute( "update _full_time_job_resume set Paid='1' where ResumeID='".$txn[0]['ClientID']."'");
       
         $headers = "MIME-Version: 1.0\r\n";
        $headers .= "From: info@jobtomoney.com\r\n";
        $headers .= "Content-type: text/html\r\n";
        $headers .= "X-Mailer: PHP/".phpversion();
        
        $t = "Your resume has submitted.<br>";
        //$t .= "Your Password : ".$data[0]['password']."<br>";
        //$t .= "Your Link : https://www.jobtomoney.com/".$link."<br>";
        $t .= "Thanks<br>jobtomoney Team.";
        
        
         mail("jeyaraj_123@yahoo.com","Your account has been activated",$t,$headers);  
         mail(trim($userinformation[0]['EmailID']),"Your resume has been submitted",$t,$headers); 
         //mail("info@jobtomoney.com",trim($userinformation[0]['emailid'])."-:-Your account has been activated",$t,$headers); 
                                                    
                        ?>
                            <div style="text-align:center;font-size:15px;color:#555">
                                    <img src="assets/success.png" style="width:256px;margin:0px auto">
                            
                                    <span style="font-size:30px;">Payment Success</span><br>
                                    
                                    Your resume has submitted.    <br><br>
                                     <?php if (!(isset($_SESSION['xuser']))) {?>
                                    Click to <a href="index">Continue</a><br><Br><br>
                                    <?php } else {
                                     $_SESSION['user']=$_SESSION['xuser'];
                                     unset($_SESSION['xuser']);
                                     ?>
                                    Click to <a href="index">Continue</a><br><Br><br>
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