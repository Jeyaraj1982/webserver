<?php
include_once("../config.php");    
  
$Page="login";
        if (isset($_POST['btnsubmit'])) {
         
         $userdata = $mysql->select("select * from _tbl_admin where UserName='".$_POST['UserName']."' and Password='".$_POST['Password']."' ");
     
                if (sizeof($userdata)>0) {
                    $_SESSION['User']=$userdata[0];
                   echo "<script>location.href='dashboard.php';</script>";
                }  else {
                    echo "<script>alert('login failed');</script>" ;
                }
       }
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kingfish</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="images/favicon.png" type="image/x-icon"/>

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
    <link rel="stylesheet" href="assets/css/demo.css">
    <script src="assets/js/app.js" type='text/javascript'></script>
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
</head>
<style>
    .errorstring {font-size:10px;color:red}
</style>          
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
<body class="login">
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center"> <img src="" style="height:128px"><br><br>Admin Sign In</h3>
            <form method="POST" action="" onsubmit="return SubmitLogin();">
                <div class="login-form">
                <div class="form-group form-floating-label">
                    <input id="UserName" name="UserName" type="text" class="form-control input-border-bottom" value="<?php echo (isset($_POST['UserName']) ? $_POST['UserName'] :"");?>">
                    <label for="UserName" class="placeholder">User Name</label>
                    <span class="errorstring" id="ErrUserName"><?php echo isset($ErrUserName)? $ErrUserName : "";?></span>
                </div>
                <div class="form-group form-floating-label">
                    <input id="Password" name="Password" type="password" class="form-control input-border-bottom" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>">
                    <label for="Password" class="placeholder">Password</label>
                    <div class="show-password" >
                        <span onclick="showHidePwd('Password',$(this))"><i class="icon-eye"></i> </span>
                    </div>
                    <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                </div>
                <div class="form-group form-floating-label"  style="text-align: center">
                    <span class="errorstring"><?php echo $ErrorMessage;?></span>
                </div>
                <div class="form-action mb-3">
                    <button type="submit" class="btn btn-primary btn-rounded btn-login" name="btnsubmit">Sign In</button>
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
    btn.html('<i class="icon-eye"></i>');
  } else {
    x.type = "password";
    btn.html('<i class="icon-eye"></i>');
  }
}
</script>