<?php include_once("config.php");?>
<?php
if (isset($_SESSION['XUser']) && ($_SESSION['XUser']['MemberID']>0 || $_SESSION['XUser']['AdminID']>0)) {
    if (isset($_POST['verifyBtn'])) {
        if ($_POST['mobile_otp']==$_SESSION['XUser']['otp']) {
            $_SESSION['User']=$_SESSION['XUser'];
            unset($_SESSION['XUser']);
            echo "<script>location.href='app/dashboard.php';</script>";
        } else {
            $error = "Incorrect verification code";
        }
    }
    
    function getHide($number) {
        $n_number = substr($number,0,2);
        $n_number .= "xxxxx";
        $n_number .= substr($number,7,3);
        return $n_number;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Verify</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>
	<script src="app/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="app/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="app/assets/css/atlantis.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
            <h3 class="text-center">Happylife2020.in</h3>
			<h6 class="text-center">Verification required before open dashboard.<br><br>We have sent verification code for your <br>register 
            <?php
                if ($_SESSION['XUser']['IsMail']==1) {
                    echo "email ".$_SESSION['XUser']['eMail'];
                } else {
                    echo "mobbile number +91 ". getHide($_SESSION['XUser']['MobileNumber']);
                }
            ?><br><br></h6>
            <form action="" method="post">
			    <div class="login-form">
				    <div class="form-group form-floating-label">
					    <input id="mobile_otp" name="mobile_otp" value="<?php echo (isset($_POST['mobile_otp'])) ? $_POST['mobile_otp'] : '';?>"  type="text" class="form-control input-border-bottom" required>
					    <label for="username" class="placeholder">OTP</label>
				    </div>
				    <?php if (isset($error))  {?>
                    <div class="form-action mb-3" style="color: red;padding-top:0px">  
                        <?php echo $error;?>         
                    </div>
                    <?php } ?>
                    <div class="form-action mb-3">
                        <input type="submit" name="verifyBtn" value="Continue" class="btn btn-primary btn-rounded btn-login">
                    </div> 
			    </div>
            </form>                 
		</div>
	</div>
	<script src="app/assets/js/jquery.3.2.1.min.js"></script>
	<script src="app/assets/js/jquery-ui.min.js"></script>
	<script src="app/assets/js/popper.min.js"></script>
	<script src="app/assets/js/bootstrap.min.js"></script>
	<script src="app/assets/js/atlantis.min.js"></script>
</body>
</html>
<?php } else { ?>
<script>location.href='login.php';</script>
<?php } ?>