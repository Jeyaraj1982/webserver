<?php
    include_once("admin/config.php");
    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        
        $d = $mysql->select("select * from _tbl_member where md5(concat('J2J',MobileNumber))='".$_COOKIE['username']."' and md5(concat('J2J',MemberPassword))='".$_COOKIE['password']."' and IsActive='1'");
        if (sizeof($d)>0) {
            $_SESSION['User']=$d[0]; 
            echo "<script>location.href='dashboard.php';</script>";
            exit;
        }  
    }       
    
    if (isset($_POST['submitBtn'])) {
        
        $ErrorCount =0;
		
        $dupMobile = $mysql->select("select * from _tbl_member where MobileNumber='".$_POST['MobileNumber']."'");
		if(sizeof($dupMobile)>0){
			$ErrMobileNumber ="Mobile Number Already Exist<br>";
			$ErrorCount++;
		}
		
        $dupEmail = $mysql->select("select * from _tbl_member where EmailID='".$_POST['EmailID']."'");
		if(sizeof($dupEmail)>0){
			$ErrEmailID ="Email ID Already Exist<br>";
			$ErrorCount++;
		}
	
		if($ErrorCount==0){
            $id = $mysql->insert("_tbl_member",array("MemberName" 		=> $_POST['Name'],
                                                     "EmailID"      	=> $_POST['EmailID'],
                                                     "MobileNumber" 	=> $_POST['MobileNumber'],
                                                     "MemberPassword"   => $_POST['MemberPassword'],
                                                     "Address1"         => $_POST['Address1'],
                                                     "Address2"         => $_POST['Address2'],
                                                     "PostalCode"       => $_POST['PostalCode'],
                                                     "MoneyTransfer"    => "1",
                                                     "IsActive"         => "1",
                                                     "IsMember"     	=> "1",
                                                     "MapedTo"     		=> "4",
                                                     "MapedToName"     	=> "Maajid Multi Mart",
                                                     "create_from"     	=> "Web",
                                                     "CreatedOn"    	=> date("Y-m-d H:i:s")));
                                                     
            $message = "Dear Admin, new retailer ".$_POST['Name'].", (".$_POST['MobileNumber'].") has registered from website.";
            TelegramMessageController::sendSMS("316574188",$message,0,0);
                                                
            if($id>0){
                $d = $mysql->select("select * from _tbl_member where MemberID='".$id."'");
				$_SESSION['User']=$d[0];
                echo "<script>location.href='dashboard.php';</script>";
				exit;
			} else {
				$error = "login falied";
			}                               
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>                         
    input[type=number] {
  -moz-appearance:textfield;
}
.errorstring{
	font-size:11px;
	color:red;
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
                                <label class="text-bold-600 text-center" style="font-size:16px">Join</label>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="" method="post" onsubmit="return SubmitLogin();">
                                    <div class="form-group mb-50">
                                        <label class="text-bold-600" for="exampleInputEmail1">Name</label>
                                        <input type="text" value="<?php echo isset($_POST['Name']) ? $_POST['Name'] : "";?>" name="Name" id="Name" class="form-control" placeholder="Name">
										<span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
									</div>
									<div class="form-group mb-50">
                                        <label class="text-bold-600" for="exampleInputEmail1">Mobile Number</label>
                                        <input type="number" onKeyDown="return doValidate(event)" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>" maxlength="10" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="Mobile Number">
										<span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
									</div>
									<div class="form-group mb-50">
                                        <label class="text-bold-600" for="exampleInputEmail1">Email ID</label>
                                        <input type="text" value="<?php echo isset($_POST['EmailID']) ? $_POST['EmailID'] : "";?>" name="EmailID" id="EmailID" class="form-control" placeholder="EmailID">
                                        <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
									</div>
                                    <div class="form-group mb-50">
                                        <label class="text-bold-600" for="exampleInputEmail1">Address Line1</label>
                                        <input type="text" value="<?php echo isset($_POST['Address1']) ? $_POST['Address1'] : "";?>" name="Address1" id="Address1" class="form-control" placeholder="Address Line1">
                                        <span class="errorstring" id="ErrAddress1"><?php echo isset($ErrAddress1)? $ErrAddress1 : "";?></span>
                                    </div>
                                    <div class="form-group mb-50">
                                        <label class="text-bold-600" for="exampleInputEmail1">Address Line2</label>
                                        <input type="text" value="<?php echo isset($_POST['Address2']) ? $_POST['Address2'] : "";?>" name="Address2" id="Address2" class="form-control" placeholder="Address Line2">
                                        <span class="errorstring" id="ErrAddress2"><?php echo isset($ErrAddress2)? $ErrAddress2 : "";?></span>
                                    </div>
                                    <div class="form-group mb-50">
                                        <label class="text-bold-600" for="exampleInputEmail1">PostalCode</label>
                                        <input type="text" value="<?php echo isset($_POST['PostalCode']) ? $_POST['PostalCode'] : "";?>" name="PostalCode" id="PostalCode" class="form-control" placeholder="Postal Code">
                                        <span class="errorstring" id="ErrPostalCode"><?php echo isset($ErrPostalCode)? $ErrPostalCode : "";?></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-bold-600" for="exampleInputPassword1">Password</label>
                                        <div class="input-group">
                                            <input type="password" value="<?php echo isset($_POST['MemberPassword']) ? $_POST['MemberPassword'] : "";?>" name="MemberPassword" id="MemberPassword" class="form-control" id="exampleInputPassword1" placeholder="Password" required="">
                                            <span class="input-group-append bg-white">
                                                <button class="btn border border-left-0" type="button" style="padding-top:0px"  onclick="showHidePwd('MemberPassword',$(this))"><i class="fa fa-eye-slash" ></i></button>
                                            </span>
                                        </div>
                                        <span class="errorstring" id="ErrMemberPassword"><?php echo isset($ErrMemberPassword)? $ErrMemberPassword : "";?></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-bold-600" for="exampleInputPassword1">Comfirm Password</label>
                                        <div class="input-group">
                                            <input type="password" value="<?php echo isset($_POST['ConfirmMemberPassword']) ? $_POST['ConfirmMemberPassword'] : "";?>" name="ConfirmMemberPassword" id="ConfirmMemberPassword" class="form-control" id="exampleInputPassword1" placeholder="Password" required="">
                                            <span class="input-group-append bg-white">
                                                <button class="btn border border-left-0" type="button" style="padding-top:0px"  onclick="showHidePwd('ConfirmMemberPassword',$(this))"><i class="fa fa-eye-slash" ></i></button>
                                            </span>
                                        </div>
                                        <span class="errorstring" id="ErrConfirmMemberPassword"><?php echo isset($ErrConfirmMemberPassword)? $ErrConfirmMemberPassword : "";?></span>
                                    </div>
                                    <?php if (isset($error)) { ?>
                                    <div class="form-group">
                                        <p align="center" style="color:red">&nbsp;<?php echo $error;?></p>
                                    </div>
                                    <?php } ?>
                                    <button type="submit" name="submitBtn" class="btn btn-success  glow w-100 position-relative">Join Now<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button>
                                    <button type="button" onclick="location.href='https://tksdonlineservice.in/index.php'" class="btn btn-outline-success glow w-100 position-relative" style="clear:both;margin-top:20px;"><i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i>Back</button>
                                </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/app.js"></script>
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
<script>
$(document).ready(function () {
   $("#Name").blur(function () {                                                                
        if(IsNonEmpty("Name","ErrName","Please Enter Name<br>")){
           IsAlphaNumeric("Name","ErrName","Please Enter Alpha Numerics Characters Only<br>");
        }
   });
   $("#EmailID").blur(function () {                                                                
        if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email address<br>")){
            IsEmail("EmailID","ErrEmailID","Please Enter Valid Email address<br>");
        }
   });
   $("#MobileNumber").blur(function () {                                                                
        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number<br>")){
            IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number<br>");
        }
   });
   $("#MemberPassword").blur(function () {
        IsNonEmpty("MemberPassword","ErrMemberPassword","Please Enter Password<br>");
   });
   $("#ConfirmMemberPassword").blur(function () {
        IsNonEmpty("ConfirmMemberPassword","ErrConfirmMemberPassword","Please Enter Confirm Password<br>");
   });
    $("#ConfirmMemberPassword").blur(function () {
        if($("#MemberPassword").val()!=$("#ConfirmMemberPassword").val()){
            $('#ErrConfirmMemberPassword').html("Passwords do not match");    
       }
   });                                                                                                    
});
 function SubmitLogin() { 
         ErrorCount=0;       
         $('#ErrName').html("");            
         $('#ErrEmailID').html("");            
         $('#ErrMobileNumber').html("");            
         $('#ErrMemberPassword').html("");
         $('#ErrAddress1').html("");
         $('#ErrAddress2').html("");
         $('#ErrPostalCode').html("");
         
        if(IsNonEmpty("Name","ErrName","Please Enter Name<br>")){
           IsAlphaNumeric("Name","ErrName","Please Enter Alpha Numerics Characters Only<br>");
        }
        if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email address<br>")){
            IsEmail("EmailID","ErrEmailID","Please Enter Valid Email address<br>");
        }
        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number<br>")){
            IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number<br>");
        }
       IsNonEmpty("Address1","ErrAddress1","Please Enter Address Line1<br>");
       IsNonEmpty("Address2","ErrAddress2","Please Enter Address Line2<br>");
       IsNonEmpty("PostalCode","ErrPostalCode","Please Enter Postal Code<br>");
       IsNonEmpty("MemberPassword","ErrMemberPassword","Please Enter Password<br>");
       IsNonEmpty("ConfirmMemberPassword","ErrConfirmMemberPassword","Please Enter Confirm Password<br>");
       
       if($("#MemberPassword").val()!=$("#ConfirmMemberPassword").val()){
            $('#ErrConfirmMemberPassword').html("Passwords do not match");    
            ErrorCount++;
       }
        return (ErrorCount==0) ? true : false;
 }
</script>
  </body>
</html>
<script>
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