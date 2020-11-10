<?php include_once("header.php");?>
<?php
     if (isset($_POST['btnsubmit'])) {
            $ErrorCount =0;
            $data = $mysql->select("select * from _tbl_customer where EmailID='".$_POST['EmailID']."'");
            if (sizeof($data)==0){
                $ErrEmailID ="Email ID Not Available";
                $ErrorCount++;
            }
            if($ErrorCount==0){
                 $otp=rand(1000,9999);
                 $securitycode = $mysql->insert("_tbl_verification_code",array("CustomerID"    => $data[0]['CustomerID'],
                                                                               "RequestSentOn" => date("Y-m-d H:i:s"),
                                                                               "SecurityCode"  => $otp,
                                                                               "messagedon"    => date("Y-m-d h:i:s"), 
                                                                               "EmailTo"       => $data[0]['EmailID'],
                                                                               "Type"          => "Forgot Password"));
                                                                               
                 $message = '
                    <div style="padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;">
                        <div style="text-align:center;padding-bottom:20px;">
                            <img src="" style="height:30px;">&nbsp;&nbsp;
                            <img src="" style="height:24px;border:1px solid #eee;border-radius:3px;">
                        </div>
                        <div style="border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;">
                            Hello,
                            <br><br>
                            Forget Password Verification Code is '.$otp.'.
                            <br><br>
                            <br> 
                            Thanks <br>
                            
                        </div>
                    </div>';

                    $mparam['MailTo']=$data[0]['EmailID'];
                    $mparam['CustomerID']=$data[0]['CustomerID'];
                    $mparam['Subject']="Forgot password";
                    $mparam['Message']=$message;
                    MailController::Send($mparam,$mailError);   
                    ?>                                                                                  
                    <form action="FpwdOTP.php" id="reqFrm" method="post">
                        <input type="hidden" value="<?php echo $securitycode;?>" name="reqID">
                        <input type="hidden" value="<?php echo $data[0]['EmailID'];?>" name="reqEmail">
                    </form>
                    <script>document.getElementById("reqFrm").submit();</script>
                <?php
            }
        }
        
 ?> 
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="index.php">Home</a><span>&raquo;</span></li>
            <li><strong>Forgotten Password</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="page-content">
        <div class="account-login">
          <div class=" " style="width:400px;margin:0px auto;padding:20px;">
          <form method="post" action="" onsubmit="return SubmitLogin();">
            <h4 style="text-align: center;">Forgot Your Password?</h4><br>
            <p class="before-login-text" style="text-align: center;">
Please provide your Registered Email Address, we'll send an security code to your email address for reset your password.

</p>
            <br>
            <label for="EmailID">Email address<span class="required">*</span></label>
            <input style="width:100%" id="EmailID" name="EmailID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] :"");?>" type="text" class="form-control">
            <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
            
            <span class="errorstring" style="text-align: center"><?php echo isset($ErrMessage)? $ErrMessage : "";?></span>
            <br>
            <div style="text-align:center">
				<button type="submit" class="button" name="btnsubmit"><i class="icon-lock icons"></i>&nbsp; <span>Continue</span></button>
				<p class="forgot-pass"><a href="login.php"><br>Back to Signin</a></p>
			</div>
		  </form>
          </div>
        </div>
      </div>
    </div>
  </section>
   
<?php include_once("footer.php");?>
<script>
$(document).ready(function () {
   $("#EmailID").blur(function () {                                                                
        if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email address<br>")){
            IsEmail("EmailID","ErrEmailID","Please Enter Valid Email address<br>");
        }
   });
                                                                                                   
});
 function SubmitLogin() { 
         ErrorCount=0;       
         $('#ErrEmailID').html("");            
         $('#ErrPassword').html("");
       if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email address<br>")){
            IsEmail("EmailID","ErrEmailID","Please Enter Valid Email address<br>");
        }
      return (ErrorCount==0) ? true : false;
 }
</script>