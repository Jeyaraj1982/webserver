<?php
include_once("admin/config.php");
 function xwriteTxt($text) {
    $file = "track".date("Y_m_d").".txt";
    $myfile = fopen($file, "a") or die("Unable to open file!");
    fwrite($myfile,"\n".date('Y-m-d H:i:s')."\t".$text);
    fclose($myfile);
}

xwriteTxt(json_encode($_GET));
xwriteTxt(json_encode($_POST));
xwriteTxt(json_encode($_SERVER));
xwriteTxt(json_encode($_REQUEST));
xwriteTxt(json_encode($_ENV));
xwriteTxt(json_encode($_COOKIE));              
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    
    $d = $mysql->select("select * from _tbl_member where md5(concat('J2J',MobileNumber))='".$_COOKIE['username']."' and md5(concat('J2J',MemberPassword))='".$_COOKIE['password']."' and IsActive='1'");
    if (sizeof($d)>0) {
         $_SESSION['User']=$d[0]; 
         echo "<script>location.href='dashboard.php';</script>";
         exit;
    }  
}       
if (isset($_POST['submitBtn'])) {
    if ($_POST['MobileNumber'] == 7860 && $_POST['MemberPassword'] == "admin") {
         echo "<script>location.href='https://tksdonlineservice.in/admin/index.php';</script>";
         exit;
    }
    $d = $mysql->select("select * from _tbl_member where    MapedTo<>'3' and MobileNumber='".$_POST['MobileNumber']."' and MemberPassword='".$_POST['MemberPassword']."' and IsActive='1'");
    $d = $mysql->select("select * from _tbl_member where      MobileNumber='".$_POST['MobileNumber']."' and MemberPassword='".$_POST['MemberPassword']."' and IsActive='1'");
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
    <title>TKSD Online Service</title>
    <!--<link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">
    <!--<script data-ad-client="ca-pub-2457488849555493" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> 
    <link rel="stylesheet" type="text/css" href="assets/css/vendors.min.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/colors.min.css">
    <!--<link rel="stylesheet" type="text/css" href="assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/semi-dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/core/menu/menu-types/vertical-menu.min.css">-->
    <!--<link rel="stylesheet" type="text/css" href="assets/css/pages/authentication.css">-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>                         
    input[type=number] {
  -moz-appearance:textfield;
}
    </style>
  </head>
  <body class="vertical-layout vertical-menu-modern 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" style="background-image:none;background:#006134 !important;">
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">         
        <div class="content-header row">
        </div>
        <div class="content-body"> 
<section id="auth-login" class="row flexbox-container">
    <div class="col-xl-8 col-11">
        <div class="card bg-authentication mb-0">
            <div class="row m-0">
                <div class="col-md-12 col-12 px-0">
                    <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                        <div class="card-header pb-1">
                            <div class="card-title text-center">
                                <div class="text-center" style="margin-bottom:10px;"><img src="assets/img/logo.png" style="width: 150px;"></div>
                                <label class="text-bold-600 text-center" style="font-size:16px">Login</label>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="form-group mb-50">
                                        <label class="text-bold-600" for="exampleInputEmail1">Mobile Number</label>
                                        <input type="number" onKeyDown="return doValidate(event)" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>" maxlength="10" name="MobileNumber" id="MobileNumber" class="form-control" id="exampleInputEmail1" placeholder="Mobile Number" required=""></div>
                                    <div class="form-group">
                                        <label class="text-bold-600" for="exampleInputPassword1">Password</label>
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
                                            <label class="custom-control-label" for="customCheck">Remember me</label>
                                        </div>
                                    </div>
                                    <button type="submit" name="submitBtn" class="btn btn-success  glow w-100 position-relative">Login<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button>
                                </form>
                                <br>
								<button type="button" onclick="location.href='joinnow.php'" class="btn btn-info  glow w-100 position-relative">Join Now<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button><br><br>
                            <!--  <form action="" method="post">
                                    <input type="hidden" value="9876543210" name="MobileNumber" id="MobileNumber">
                                    <input type="hidden" value="9876543210" name="MemberPassword" id="MemberPassword">
                                    <button type="submit" name="submitBtn" class="btn btn-info  glow w-100 position-relative">Demo Login<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button>
                                </form>  -->
                                
                                <div class="form-group"> 
                                <br><B>Maajid Multi Mart</b><br>
                                147, Pallivasal complex, CMC Road, <br>
                                Senjai, Karaikudi - 630 001.<br><Br>
                                Email: tksdhelpdesk@gmail.com<br>
                                Whatsapp Chat +91 90036 38869
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right section image -->
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
    <script src="../../../app-assets/js/scripts/footer.min.js"></script>                      -->
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
  </body>
</html>