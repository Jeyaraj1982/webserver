<?php 
    include_once("config.php");
    
    if (isset($_POST['submitBtn'])) {
        
        $data = $mysql->select("select * from `_tbl_admin` where  `AdminEmail`='".$_POST['emailAddress']."'");
        
        if (sizeof($data)>0) {
            if ($data[0]['AdminPassword']==$_POST['loginPassword']) {
                
                $data[0]['Role']="Admin";
                
                $id=$mysql->insert("_tbl_admin_login_logs",array("AdminID"   => $data[0]['AdminID'],
                                                                 "LoginOn"   => date("Y-m-d H:i:s"),
                                                                 "IsSuccess" => "1")); 
                
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
                echo "<span style='color:red'>Username password incorrect</span>";
                $id = $mysql->insert("_tbl_admin_login_logs",array("AdminID"   => $_SESSION['User']['AdminID'],
                                                                   "LoginOn"   => date("Y-m-d H:i:s"),
                                                                   "IsSuccess" => "0")); 
                } 
           }   else {
            $error=    "<span style='color:red'>login failed</span>";
                         
           } 
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../app/assets/img/icon.ico" type="image/x-icon"/>
	<script src="app/assets/js/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['app/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<link rel="stylesheet" href="app/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="app/assets/css/atlantis.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Admin Login</h3>
            <form action="" method="post">
			<div class="login-form">
				<div class="form-group form-floating-label">
					<input id="username" name="emailAddress" type="text" class="form-control input-border-bottom" required>
					<label for="username" class="placeholder">Username</label>
				</div>
				<div class="form-group form-floating-label">
					<input id="password" name="loginPassword" type="password" class="form-control input-border-bottom" required>
					<label for="password" class="placeholder">Password</label>
					<div class="show-password">
						<i class="icon-eye"></i>
					</div>
				</div>
                <?php if (isset($error)) { ?>
                <div class="form-group form-floating-label">
                    <label for="password" class="placeholder"><?php echo $error;?></label>
                </div>
                <?php } ?>
				<div class="form-action mb-3">
					<button type="submit" class="btn btn-primary btn-rounded btn-login" name="submitBtn" value="Sign In">Sign In</button>
				</div>
                </form>
                <div class="form-action mb-3">
                    <a href="../index.php">Go Website</a>
                </div>
			</div>
		</div>
 
	<script src="app/assets/js/jquery.3.2.1.min.js"></script>
	<script src="app/assets/js/jquery-ui.min.js"></script>
	<script src="app/assets/js/popper.min.js"></script>
	<script src="app/assets/js/bootstrap.min.js"></script>
	<script src="app/assets/js/atlantis.min.js"></script>
</body>
</html>