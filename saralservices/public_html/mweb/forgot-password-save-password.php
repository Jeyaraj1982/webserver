<?php
include_once("../app/config.php");
 if (isset($_POST['btnsubmit'])) {
    $data = $mysql->select("Select * from `_tbl_verification_code` where `ReqID`='".$_POST['reqID']."' ");
    $mem = $mysql->select("Select * from `_tbl_Members` where `MemberID`='".$data[0]['MemberID']."' ");
         
         if (!(strlen(trim($_POST['NewPassword']))>=6)) {
            $ErrNewPassword = "Please enter valid new password must have 6 characters";
            $err++;
         } 
         if (!(strlen(trim($_POST['ConfirmNewPassword']))>=6)) {
            $ErrConfirmNewPassword = "Please enter valid confirm new password  must have 6 characters"; 
            $err++;
         } 
         if ($_POST['ConfirmNewPassword']!=$_POST['NewPassword']) {
            $ErrConfirmNewPassword = "Password do not match"; 
            $err++;
         }
         if($err==0){
             $mysql->execute("update _tbl_Members set `MemberPassword`='".$_POST['ConfirmNewPassword']."' where `MemberID`='".$data[0]['MemberID']."'");
             
             $mysql->execute("update _tbl_verification_code set `OldPassword`='".$mem[0]['MemberPassword']."', `NewPassword`='".$_POST['ConfirmNewPassword']."', `Status`='Done' where `ReqID`='".$data[0]['ReqID']."'");
           
         ?>
         <script>
                location.href="http://mweb.saralservices.in"
                
        </script>
         <?php }
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
     <script>
 function SubmitNewPassword() {
      ErrorCount=0; 
    var password = document.getElementById("NewPassword").value;
        var confirmPassword = document.getElementById("ConfirmNewPassword").value;
        if (password != confirmPassword) {
            ErrorCount++;
            $('#ErrConfirmNewPassword').html("Passwords do not match.");
        }
        return (ErrorCount==0) ? true : false;
 }
 </script>
       
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
                                        <h3>New Password</h3>
                                            <form action="" method="post" onsubmit="return SubmitNewPassword();">
                                            <input type="hidden"  value="<?php echo $_POST['reqMobileNumber'];?>" name="reqMobileNumber">
                                            <input type="hidden"  value="<?php echo $_POST['reqID'];?>" name="reqID">
                                                <div class="form-group mb-50">
                                                    <label class="text-bold-600" for="exampleInputEmail1">New Password</label>
                                                    <input type="passsword" onKeyDown="return doValidate(event)" value="<?php echo isset($_POST['NewPassword']) ? $_POST['NewPassword'] : "";?>" name="NewPassword" id="NewPassword" class="form-control" id="exampleInputEmail1" placeholder="New Password" required="">                                                    
                                                    <p class="errorstring" id="ErrNewPassword" style="color: red"><?php echo isset($ErrNewPassword)? $ErrNewPassword : "";?></p>
                                                </div>
                                                <div class="form-group mb-50">
                                                    <label class="text-bold-600" for="exampleInputEmail1">Confirm New Password</label>
                                                    <input type="passsword" onKeyDown="return doValidate(event)" value="<?php echo isset($_POST['ConfirmNewPassword']) ? $_POST['ConfirmNewPassword'] : "";?>" name="ConfirmNewPassword" id="ConfirmNewPassword" class="form-control" id="exampleInputEmail1" placeholder="Confirm New Password" required="">
                                                    <p class="errorstring" id="ErrConfirmNewPassword" style="color: red"><?php echo isset($ErrConfirmNewPassword)? $ErrConfirmNewPassword : "";?></p>
                                                </div>
                                                
                                                <?php if (isset($error)) {?>
                                                <div class="form-group">
                                                    <p align="center" style="color:red">&nbsp;<?php echo $error;?></p>
                                                </div>
                                                <?php } ?>
                                                <button type="submit" name="btnsubmit" class="btn btn-danger  glow w-100 position-relative">Save My Password<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button>
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