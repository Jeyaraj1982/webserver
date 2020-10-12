<?php include_once("config.php");
 include_once("header.php"); ?>


<?php 
   
   if (isset($_POST['submitBtn'])) {
        
        $data = $mysql->select("select * from `_tbl_admin` where  `AdminEmail`='".$_POST['emailAddress']."'");
        
        if (sizeof($data)>0) {
            if ($data[0]['AdminPassword']==$_POST['loginPassword']) {
                
                $data[0]['Role']="Admin";
                
                $id=$mysql->insert("_tbl_admin_login_logs",array("AdminID"   => $data[0]['AdminID'],
                                                                 "LoginOn"   => date("Y-m-d H:i:s"),
                                                                 "IsSuccess" => "1")); 
                
                $email_param[0]['ParamValue']=0;
                $email_param = $mysql->select("select * from _tbl_Settings_Params where ParamCode='AdminLoginEmailOTPRequired'");
                if ($email_param[0]['ParamValue']==1) {
                    
                    $data[0]['otp']=rand(9999,99999);
                    $data[0]['IsMail']="1";
                    $data[0]['eMail']=$data[0]['AdminEmail'];
                    $_SESSION['XUser']=$data[0];      
                               
                    $message = "Your admin login code is ". $data[0]['otp'];
                   
                    $mparam['MailTo']=$data[0]['AdminEmail'];
                    $mparam['Category']="ADMIN_LOGIN_OTP";
                    $mparam['MemberID']="0";
                    $mparam['Subject']="Admin Login OTP";
                    $mparam['Message']=$message;
                    MailController::Send($mparam,$mailError);
                    echo "<script>location.href='verify.php';</script>";   
                }
                
                $sms_param[0]['ParamValue']=0;
                $sms_param = $mysql->select("select * from _tbl_Settings_Params where ParamCode='AdminLoginMobileOTPRequired'");
                if ($sms_param[0]['ParamValue']==1) {
                    $data[0]['otp']=rand(9999,99999);
                    $data[0]['IsMobile']="1";
                    $data[0]['Mobile']=$data[0]['MobileNumber'];
                    $_SESSION['XUser']=$data[0];      
                    
                    $message = "Your admin login code is ". $data[0]['otp'];
                   
                    $mparam['MailTo']=$data[0]['AdminEmail'];
                    
                    MobileSMS::sendSMS($data[0]['MobileNumber'],$message,0,$data[0]['AdminID']);
                    echo "<script>location.href='verify.php';</script>";   
                } 
                
                if ($sms_param[0]['ParamValue']==0 && $email_param[0]['ParamValue']==0) {
                    $_SESSION['User']=$data[0];
                    echo "<script>location.href='app/dashboard.php';</script>";   
                }
            } else {
                 $error= "<span style='color:red'>Username password incorrect</span>";
                $id = $mysql->insert("_tbl_admin_login_logs",array("AdminID"   => $_SESSION['User']['AdminID'],
                                                                   "LoginOn"   => date("Y-m-d H:i:s"),
                                                                   "IsSuccess" => "0")); 
                } 
           }   else {
            $error=    "<span style='color:red'>login failed</span>";
                         
           } 
    }  
?>
                         
         
        


<main>
    <div class="customer-page mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                    <div class="login">
                        <div id="CustomerLoginForm">
                            <form method="post" action="" id="customer_login" accept-charset="UTF-8">
                                <div class="login-form-container">
                                    <div class="login-text">
                                        <h2>Login</h2> 
                                    </div>
                                    <div class="login-form">
                                        <input type="text" name="emailAddress" id="emailAddress" class="input-full" placeholder="Member ID" autocorrect="off" autocapitalize="off" autofocus="">
                                        <input type="password" value="" name="loginPassword" id="loginPassword" class="input-full" placeholder="Password">
                                        <div class="login-toggle-btn">
                                            <div class="form-action-button">
                                                <button type="submit" class="theme-default-button" name="submitBtn">Sign In</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (isset($error)) { ?>
                <div class="s-12">
                    <label for="password" class="placeholder"><?php echo $error;?></label>
                </div>
                <?php } ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include_once("footer.php"); ?>