<!DOCTYPE html>
<html lang="en">
<?php
   include_once("../../config.php");
    if (isset($_POST['BtnUpdatePassword'])) {
         $mysql->execute("update _tbl_members set MemberPassword='".$_POST['RePassword']."' where MemberID='".$_SESSION['rDetails']['MemberID']."'" );
        header("Location:".AppUrl."views/Member/FpwdCompleted.php");
        } 
?>
 <head>                                                        
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Franchisee Login</title>
  <link rel="stylesheet" href="<?php echo AppUrl;?>assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo AppUrl;?>assets/vendors/iconfonts/puse-icons-feather/feather.css">
  <link rel="stylesheet" href="<?php echo AppUrl;?>assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo AppUrl;?>assets/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="<?php echo AppUrl;?>assets/css/style.css">
  <link rel="shortcut icon" href="<?php echo AppUrl;?>assets/images/favicon.png" />
  <script src="<?php echo AppUrl;?>assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo AppUrl;?>assets/vendors/js/vendor.bundle.addons.js"></script>
  <script src="<?php echo AppUrl;?>assets/js/off-canvas.js"></script>
  <script src="<?php echo AppUrl;?>assets/js/hoverable-collapse.html"></script>
  <script src="<?php echo AppUrl;?>assets/js/misc.js"></script>
  <script src="<?php echo AppUrl;?>assets/js/settings.html"></script>
  <script src="<?php echo AppUrl;?>assets/js/todolist.html"></script>
  <script src="<?php echo AppUrl;?>assets/js/app.js?rnd=<?php echo rand(10,1000);?>" type='text/javascript'></script>
</head>
<script>
$(document).ready(function () {
   $("#Password").blur(function () {
        if (IsNonEmpty("Password","ErrPassword","Please Enter New Password")) {
        IsFPassword("Password","ErrPassword","Please Enter Alpha Numeric Characters and More than 8 characters");
        }
                        
   });
$("#RePassword").blur(function () {
                                                                                                            
        if (IsNonEmpty("RePassword","ErrRePassword","Please ReEnter New Password")) {
        IsFPassword("RePassword","ErrRePassword","Please Enter Alpha Numeric Characters and More than 8 characters");
        }                
   });
});

function SubmitPassword() {
                        $('#ErrPassword').html("");
                        $('#ErrRePassword').html("");
                         ErrorCount=0;
                        if (IsNonEmpty("Password","ErrPassword","Please Enter New Password")) {
                        IsFPassword("Password","ErrPassword","Please Enter Alpha Numeric Characters and More than 6 characters");
                        }
                        if (IsNonEmpty("RePassword","ErrRePassword","Please ReEnter New Password")) {
                        IsFPassword("RePassword","ErrRePassword","Please Enter Alpha Numeric Characters and More than 6 characters");
                        }
                        
                       var password = document.getElementById("Password").value;
                       var confirmPassword = document.getElementById("RePassword").value;
                             if (password != confirmPassword) {
                                 ErrorCount++;
                               $('#ErrRePassword').html("Passwords do not match.");
                              
                                }
                             
                        
                        if (ErrorCount==0) {
                            return true;
                        } else{
                            return false;
                        }
                 }
</script>
<style>
.errorstring {font-size:10px;color:red}
</style>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
                <form method="POST" action="" onsubmit="return SubmitPassword();">
                <div class="form-group">
                <div align="center"><h5>Forget Password</h5></div>
                  <div class="input-group">
                    <input type="Password" class="form-control" placeholder="Enter New Password" id="Password" name="Password">
                  </div>
                    <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="Password" class="form-control" placeholder="Re-enter New Password " id="RePassword" name="RePassword">
                    </div>
                    <span class="errorstring" id="ErrRePassword"><?php echo isset($ErrRePassword)? $ErrRePassword : "";?></span>
                </div>
                <div class="form-group" align="center">
                  <button type="submit" class="btn btn-primary submit-btn btn-block" name="BtnUpdatePassword">Save Password</button>
                </div>
              </form>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
      </body>
     </html>
         

   