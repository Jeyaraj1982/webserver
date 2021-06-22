<?php
    include_once("/home/onlinej2j/public_html//config.php");
    
    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        
        $d = $mysql->select("select * from _tbl_member where md5(concat('J2J',MobileNumber))='".$_COOKIE['username']."' and md5(concat('J2J',MemberPassword))='".$_COOKIE['password']."' and IsActive='1'");
        if (sizeof($d)>0) {
             $_SESSION['User']=$d[0]; 
             echo "<script>location.href='dashboard.php';</script>";
             exit;
        }  
    }
           
    if (isset($_POST['submitBtn'])) {
        $d = $mysql->select("select * from _tbl_member where MobileNumber='".$_POST['MobileNumber']."' and MemberPassword='".$_POST['MemberPassword']."' and IsActive='1'");
        if (sizeof($d)>0) {
            if (isset($_POST['RememberMe']) && $_POST['RememberMe']=="on") {
                setcookie("username",md5("J2J".$_POST['MobileNumber']),time() + (86400 * 30));
                setcookie("password",md5("J2J".$_POST['MemberPassword']),time() + (86400 * 30));
            }
            $_SESSION['User']=$d[0];
            echo "<script>location.href='dashboard.php';</script>";
            exit;
        } else {
            $error = "login falied";
        }
    }                                                           
?> 
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?php echo SITE_TITLE ;?></title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>input[type=number] {-moz-appearance:textfield;}</style>                                                                
  </head>
  <body class="vertical-layout vertical-menu-modern 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" style="background-image:none;background:#fff !important;">
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">         
        <div class="content-header row"></div>
            <div class="content-body" style="padding-top: 15px;padding-bottom: 15px;"> 
            <section id="auth-login" class="row flexbox-container" style="margin-left: 0px;margin-right: 0px;">
            <div class="col-xl-12 col-12">
        <div class="card bg-authentication mb-0" style="box-shadow:none">
            <div class="row m-0">
                <div class="col-md-12 col-12 px-0">
                    <div class="card disable-rounded-right mb-0 h-100 d-flex justify-content-center" style="padding-top:100px">
                        <div class="card-header pb-1">
                            <div class="card-title text-center">                                                                           
                                <div class="text-center" style="margin-bottom:10px;"><img src="<?php echo SITE_URL;?>/assets/logo.png"  ></div>
                                <label class="text-bold-600 text-center" style="font-size:16px">Login</label>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body" style="padding-bottom:10px">
                                <form action="" method="post">
                                    <div class="form-group mb-50">
                                        
                                        <input type="number" onKeyDown="return doValidate(event)" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>" maxlength="10" name="MobileNumber" id="MobileNumber" class="form-control" id="exampleInputEmail1" placeholder="Mobile Number" required=""></div>
                                    <div class="form-group">
                                       
										<div class="input-group">
											<input type="password" value="<?php echo isset($_POST['MemberPassword']) ? $_POST['MemberPassword'] : "";?>" name="MemberPassword" id="MemberPassword" class="form-control" id="exampleInputPassword1" placeholder="Password" required="">
											<span class="input-group-append bg-white">
												<button class="btn border border-left-0" type="button" style="padding-top:6px"  onclick="showHidePwd('MemberPassword',$(this))"><i class="fa fa-eye-slash" ></i></button>
											</span>
										</div>
									</div>
                                    <?php if (isset($error)) { ?>
                                    <div class="form-group">
                                        <p align="center" style="color:red">&nbsp;<?php echo $error;?></p>
                                    </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox success" >
                                            <input type="checkbox" class="custom-control-input" id="customCheck" name="RememberMe">
                                            <label class="custom-control-label" for="customCheck" style="font-weight:normal;color:#777">Remember me</label>
                                        </div>
                                    </div>
                                    <button type="submit" name="submitBtn" class="btn btn-primary  glow w-100 position-relative" style="background:#206eea">Login<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button>
                                </form>
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
   

function showHidePwd(pwd,btn) {
  var x = document.getElementById(pwd);
  if (x.type === "password") {
    x.type = "text";
    btn.html('<i class="fa fa-eye"></i>');
  } else {
    x.type = "password";
    btn.html('<i class="fa fa-eye-slash"></i>');
  }
}
</script>   

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WS30KRKFM4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-WS30KRKFM4');
</script>
  </body>
</html>