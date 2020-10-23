<?php
include_once("config.php");    
  
$Page="login";
        if (isset($_POST['btnsubmit'])) {
         
         $userdata = $mysql->select("select * from _tbl_sales_users where LoginName='".$_POST['UserName']."' and Password='".$_POST['Password']."' ");
     
                if (sizeof($userdata)>0) {
                    $_SESSION['User']=$userdata[0];
                   echo "<script>location.href='user/dashboard.php';</script>";
                   exit;
                }  else {
                   $ErrPassword = "User Name or Password Invalid";
                }
       }
      ?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Demo</title>
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
    .errorstring {font-size:12px;color:red}
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
            <div class="container">
                <div class="myform form ">
                     <div class="logo mb-3">
                         <div class="col-md-12 text-center">
                            <h1>Login</h1>
                         </div>                                                                              
                    </div>
                   <form action="" method="post" name="login" onsubmit="return SubmitLogin();">
                           <div class="form-group">
                              <label for="exampleInputEmail1">User Name</label>
                              <input type="text" name="UserName"  class="form-control" id="UserName" aria-describedby="emailHelp" placeholder="Enter User Name">
                              <span class="errorstring" id="ErrUserName"><?php echo isset($ErrUserName)? $ErrUserName : "";?></span>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" name="Password" id="Password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                              <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                           </div>
                           <div class="form-group">
                              <p class="text-center"></p>
                           </div>
                           <div class="col-md-12 text-center ">
                              <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" name="btnsubmit">Login</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="login-or">
                                 
                              </div>
                           </div>
                           <div class="col-md-12 mb-3">
                              <p class="text-center">
                                
                              </p>
                           </div>
                           <div class="form-group">
                           </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</body>
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