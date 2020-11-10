<?php
include_once("config.php");    
  
$Page="login";
        if (isset($_POST['btnsubmit'])) {
         
         $userdata = $mysql->select("select * from _queen_admin where UserName='".$_POST['UserName']."' and Password='".$_POST['Password']."' ");
     
                if (sizeof($userdata)>0) {
                    $_SESSION['User']=$userdata[0];
                     $_SESSION['User']['Role']="Admin";
                   echo "<script>location.href='app/dashboard.php';</script>";
                }  else {
                    echo "<script>alert('login failed');</script>" ;
                }
       }
      ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.css">  
    <script src="assets/js/app.js" type='text/javascript'></script>
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>  
</head>
<style>
.btn-primary {
    background: #38b4ec !important;
    border-color: #38b4ec !important;
}
.btn-primary:hover {
    background: #38b4ec !important;
    border-color: #38b4ec !important;
}
.form-control {
  border-color: #38b4ec !important;  
}
.errorstring {font-size:12px;color:red}
.login {
    background: #d8ecf6 !important;
}
</style>  
<body class="login">
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn" style="padding: 40px 20px;width: 320px;">
            <h3 class="text-center" style="color: #38b4ec;">Signin to your account</h3>
            <form method="POST" action="" onsubmit="return SubmitLogin();">
                <div class="login-form">
                    <div class="form-group" style="padding-top: 0px;padding-bottom: 5px;">
                        <label for="username" class="placeholder" style="color: #0a7bae !important;margin-bottom: 0px;font-weight: normal;">Username</label>
                        <input id="UserName" name="UserName" placeholder="User Name" type="text" class="form-control" value="<?php echo (isset($_POST['UserName']) ? $_POST['UserName'] :"");?>" style="padding: 0.3rem 1rem;padding-top: 3px;">
                        <span class="errorstring" id="ErrUserName"><?php echo isset($ErrUserName)? $ErrUserName : "";?></span>
                    </div>
                    <div class="form-group" style="padding-top: 0px;padding-bottom: 5px;">
                        <label for="password" class="placeholder" style="color: #0a7bae !important;margin-bottom: 0px;font-weight: normal;">Password</label>
                        <div class="position-relative">
                            <input id="Password" name="Password" placeholder="Password" type="password" class="form-control" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>" style="padding: 0.3rem 1rem;padding-top: 3px;">
                            <div class="show-password">
                                <span onclick="showHidePwd('Password',$(this))"><i class="fas fa-eye-slash" style="font-size: 15px;"></i></span>
                            </div>
                        </div>  
                        <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                    </div>
                    <div class="form-group form-action-d-flex">
                        <div>
                            <span class="errorstring" id="ErrMessage"><?php echo isset($ErrMessage)? $ErrMessage : "";?></span>    
                        </div>
                        <button type="submit"  name="btnsubmit" class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold" style="padding: 3px 20px 5px 20px;">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
     <script>
function showHidePwd(pwd,btn) {
  var x = document.getElementById(pwd);
  if (x.type === "password") {
    x.type = "text";
    btn.html('<i class="icon-eye" style="font-size: 15px;"></i>');
  } else {
    x.type = "password";
    btn.html('<i class="fas fa-eye-slash" style="font-size: 15px;"></i>');
  }
}
</script> 
    
<script>
$(document).ready(function () {
   $("#UserName").blur(function () {                                                                
        IsNonEmpty("UserName","ErrUserName","Please Enter User Name");
   });
$("#Password").blur(function () {
        IsNonEmpty("Password","ErrPassword","Please Enter Password");
   });                                                                                                    
});
 function SubmitLogin() { 
                         ErrorCount=0;       
                         $('#ErrUserName').html("");            
                         $('#ErrPassword').html("");            
                       IsNonEmpty("UserName","ErrUserName","Please Enter User Name");
                       IsNonEmpty("Password","ErrPassword","Please Enter Password");
                        return (ErrorCount==0) ? true : false;
                 }
</script> 