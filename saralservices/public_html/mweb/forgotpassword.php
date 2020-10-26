<?php
include_once("../app/config.php");
if (isset($_POST['BtnSubmit'])) {
    $data = $mysql->select("Select * from `_tbl_Members` where `MobileNumber`='".$_POST['MobileNumber']."'");
    if (sizeof($data)==0)  { 
        $ErrMobileNumber = "Account Not Found!";
    } else{   
        $otp=rand(1000,9999);
        $securitycode = $mysql->insert("_tbl_verification_code",array("MemberID"      => $data[0]['MemberID'],
                                                                      "MemberName"    => $data[0]['MemberName'],
                                                                      "RequestSentOn" => date("Y-m-d H:i:s"),
                                                                      "SecurityCode"  => $otp,
                                                                      "SMSTo"         => $data[0]['MobileNumber'])) ; 
        $message = "Dear Member, Your forgetpassword otp is ".$otp."   Thanks Saral Services";
        MobileSMS::sendSMS($_POST['MobileNumber'],$message,$data[0]['MemberID']);  
    ?>
        <form action="forgot-password-otp.php" id="reqFrm" method="post">
            <input type="hidden" value="<?php echo $securitycode;?>" name="reqID">
            <input type="hidden" value="<?php echo $data[0]['MobileNumber'];?>" name="reqMobileNumber">
        </form>
        <script>document.getElementById("reqFrm").submit();</script>
    <?php    
    } 
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
                    <div class="card" style="box-shadow:none;background:none;border:none;">
                        <div class="row m-0" style="background:none">
                            <div class="col-md-12 col-12 px-0" style="background:none">
                                <div class="card  justify-content-center" style="background:none;border:none">
                                    <div class="card-header pb-1">
                                        <div class="card-title text-center" style="padding-top:20px;">
                                            <div class="text-center" style="margin-bottom:30px;">
                                                <img src="https://www.saralservices.in/assets/images/logo.png" style="width: 150px;"> <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-header">
                                            <div class="card-title" style="text-align: center;">Forgot Password</div>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="post">
                                                <div class="form-group mb-50">
                                                    <label class="text-bold-600" for="MobileNumber" style="text-transform:none;margin-bottom:0px;">Mobile Number</label>
                                                    <input type="number" onKeyDown="return doValidate(event)" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>" maxlength="10" name="MobileNumber" id="MobileNumber" class="form-control"  placeholder="Mobile Number" required="">
                                                    <p class="errorstring" id="ErrMobileNumber" style="color: red"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></p>
                                                </div>
                                                
                                                <?php if (isset($error)) {?>
                                                <div class="form-group">
                                                    <p align="center" style="color:red">&nbsp;<?php echo $error;?></p>
                                                </div>
                                                <?php } ?>
                                                <div class="row" style="margin-top:25px;margin-bottom:10px;">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <button type="button" class="btn btn-black glow" onclick="location.href='index.php';" style="background:#6c757d !important;width: 46%;">Back</button>
                                                        <button type="submit" class="btn btn-danger glow" style="width: 46%;float:right" name="BtnSubmit">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button>
                                                    </div>                                        
                                                </div>
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