<?php
include_once("../app/config.php");
if (isset($_POST['btnsubmit'])) {
    $data = $mysql->select("Select * from `_tbl_verification_code` where `ReqID`='".$_POST['reqID']."' ");
             if (sizeof($data)>0) {
                 if ($data[0]['SecurityCode']==$_POST['VerificationCode']) { ?>
                     <form action="forgot-password-save-password.php" id="reqFrm" method="post">
                        <input type="hidden" value="<?php echo $data[0]['ReqID'];?>" name="reqID">
                        <input type="hidden" value="<?php echo $data[0]['SMSTo'];?>" name="reqMobileNumber">
                     </form>
                    <script>document.getElementById("reqFrm").submit();</script>
                <?php } else{
                        $ErrVerificationCode ="Invalid Verfication Code";
                    }
             } else {
                    $error ="Invalid Access";
             }                 
} 
$resend = "";
    if (isset($_POST['reqMobileNumber'])) {
        $resend = $_POST['reqMobileNumber'];
    } elseif (isset($data[0]['SMSTo'])) {
        $resend = $data[0]['SMSTo'];
    }
?>                                                           
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Saral Services</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">
    <script data-ad-client="ca-pub-2457488849555493" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> 
    <link rel="stylesheet" type="text/css" href="assets/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/semi-dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/pages/authentication.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
     <script src="https://bootstrapmade.com/demo/themes/Flexor/assets/vendor/jquery/jquery.min.js"></script>
    <style>                         
    input[type=number] {
  -moz-appearance:textfield;
}
    </style>
     <style>                         
            input[type=number] {-moz-appearance:textfield;}
            input[type=number] {-moz-appearance:textfield;}
            .errorstring{color:#BA3107}
            .card {border:none !important}
            .card-header {background:none !important;border:none !important}
        </style>
       
  </head>
  <body class="vertical-layout vertical-menu-modern 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" style="background:url('assets/img/background.png') !important;">
    <div class="app-content content">                        
      <div class="content-overlay"></div>
      <div class="content-wrapper">         
        <div class="content-header row"></div>
        <div class="content-body"> 
            <section id="auth-login" class="row flexbox-container">
                <div class="col-xl-8 col-11">
                    <div class="card" style="box-shadow:none;background:none">
                        <div class="row m-0" style="background:none">
                            <div class="col-md-12 col-12 px-0" style="background:none">
                                <div class="card  justify-content-center" style="background:none">
                                    <div class="card-header pb-1">
                                        <div class="card-title text-center" style="padding-top:20px;">
                                            <div class="text-center" style="margin-bottom:30px;">
                                                <img src="https://www.saralservices.in/assets/images/logo.png" style="width: 150px;"> <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                        <h3>Forgot Password</h3>
                                            <form action="" method="post">
                                            <input type="hidden"  value="<?php echo $_POST['reqMobileNumber'];?>" name="reqMobileNumber">
                                            <input type="hidden"  value="<?php echo $_POST['reqID'];?>" name="reqID">
                                                <div class="form-group mb-50">
                                                    <input type="number" onKeyDown="return doValidate(event)" value="<?php echo isset($_POST['VerificationCode']) ? $_POST['VerificationCode'] : "";?>" maxlength="10" name="VerificationCode" id="VerificationCode" class="form-control" id="exampleInputEmail1" placeholder="Verification Code" required="">
                                                </div>
                                                
                                                <?php if (isset($ErrVerificationCode)) {?>
                                                <div class="form-group">
                                                    <p align="center" style="color:red">&nbsp;<?php echo $ErrVerificationCode;?></p>
                                                </div>
                                                <?php } ?>
                                                <?php if (isset($error)) {?>
                                                <div class="form-group">
                                                    <p align="center" style="color:red">&nbsp;<?php echo $error;?></p>
                                                </div>
                                                <?php } ?>
                                                <button type="submit" name="btnsubmit" class="btn btn-danger  glow w-100 position-relative">Verify Code<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button>
                                            </form>
                                            
                                            <p align="right" style="color:#666"><a href="javascript:void(0)" onclick="ResendForgetPasswordOtp()" class="link float-right" style="cursor: pointer;">Resend</a></p>
                                             <form action="forgotpassword.php" id="reqFrm" method="post">
                                            <input type="hidden" value="<?php echo $resend;?>" name="MobileNumber">
                                            <button type="submit" hidden="hidden" name="btnsubmit" id="btnsubmit" class="btn btn-primary glow position-relative w-100">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                                        </form>
                                                                <br><br>
                                            <p align="center" style="color:#666">saralservices.in</p>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>                  
                        </div>                                                 
                    </div>
                </div>
            </section>
        </div>
      </div>                
    </div>
    <!--<script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js"></script>
    <script src="../../../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <script src="../../../app-assets/js/scripts/configs/vertical-menu-light.min.js"></script>
    <script src="../../../app-assets/js/core/app-menu.min.js"></script>
    <script src="../../../app-assets/js/core/app.min.js"></script>
    <script src="../../../app-assets/js/scripts/components.min.js"></script>
    <script src="../../../app-assets/js/scripts/footer.min.js"></script>     -->
     <script>
        function ResendForgetPasswordOtp() {
            $( "#btnsubmit" ).trigger( "click" );
        }
    </script>
    <script type="text/javascript">
    
    function doValidate(e) {
        if(document.getElementById('MobileNumber').value.length>=10 && e.keyCode!=8) {
          return false;   
        } else {
              var key = e.which || e.keyCode;

             if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
             // numbers   
                 key >= 48 && key <= 57 ||
             // Numeric keypad
                 key >= 96 && key <= 105 ||
             // comma, period and minus, . on keypad
                key == 190 || key == 188 || key == 109 || key == 110 ||
             // Backspace and Tab and Enter
                key == 8 || key == 9 || key == 13 ||
             // Home and End
                key == 35 || key == 36 ||
             // left and right arrows
                key == 37 || key == 39 ||
             // Del and Ins
                key == 46 || key == 45)
                 return true;

             return false;
             
        }
    }
   
</script>
  </body>
</html>