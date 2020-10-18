<?php 
$Page="login";
include_once("website_header.php");

if (isset($_POST['btnsubmit'])) {
               $data = $mysql->select("Select * from `_tbl_Members` where `MobileNumber`='".$_POST['MobileNumber']."'");
               if (sizeof($data)==0)  {   ?>
               <script>
                $( document ).ready(function() {
                    /*
                swal("Account Not Found!", {
                        icon : "error",
                        buttons: {                    
                            confirm: {
                                text : " Continue ",
                                className : 'btn btn-success'                                                                  
                            }
                        },
                    });  */
                    $('.errorstring').html("Account Not Found!");
                });
            </script> 
            <?php
                    }  else{   
                        $otp=rand(1000,9999);
                        $securitycode = $mysql->insert("_tbl_verification_code",array("MemberID"      => $data[0]['MemberID'],
                                                                                      "RequestSentOn" => date("Y-m-d H:i:s"),
                                                                                      "SecurityCode"  => $otp,
                                                                                      "messagedon"    => date("Y-m-d h:i:s"), 
                                                                                      "SmsTo"         => $data[0]['MobileNumber'],
                                                                                      "Type"          => "Forgot Password")) ; 
                       MobileSMS::sendSMS($data[0]['MobileNumber'],"Your forgot password verification code is".$otp.". Thanks Form16.online");                                     
                ?>
                        <form action="forgot-password-mobile-otp.php" id="reqFrm" method="post">
                            <input type="hidden" value="<?php echo $securitycode;?>" name="reqID">
                            <input type="hidden" value="<?php echo $data[0]['MobileNumber'];?>" name="reqMobile">
                        </form>
                    <script>document.getElementById("reqFrm").submit();</script>
                <?php    } 
            }   
?>
<script>
$(document).ready(function () {
   $("#MobileNumber").blur(function () {
        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){
           IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number");
        }
   });
   });
 function SubmitLogin() { 
                         ErrorCount=0;       
                         $('#ErrMobileNumber').html("");            
                        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){
                           IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number");
                        }
                        return (ErrorCount==0) ? true : false;
                 }
</script> 
<div id="featured-title" class="featured-title clearfix">
    <div id="featured-title-inner" class="container clearfix">
        <div class="featured-title-inner-wrap">                    
            <div id="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="breadcrumb-trail">
                        <a href="index.html" class="trail-begin">Home</a>
                        <span class="sep">|</span>
                        <span class="trail-end">Forgot Password</span>
                    </div>
                </div>
            </div>
            <div class="featured-title-heading-wrap">
                <h1 class="feautured-title-heading">Forgot Password</h1>
            </div>
        </div> 
    </div>             
</div> 

 <div id="main-content" class="site-main clearfix">
            <div id="content-wrap">
                <div id="site-content" class="site-content clearfix">
                    <div id="inner-content" class="inner-content-wrap">
                       <div class="page-content">
                            <div class="row-iconbox">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="themesflat-spacer clearfix" data-desktop="61" data-mobile="60" data-smobile="60" style="height:61px"></div>
                                            <div class="themesflat-headings style-1 text-center clearfix">
                                                <h2 class="heading">Forgot Password?</h2>
                                                <div class="sep has-icon width-125 clearfix">
                                                    <div class="sep-icon">
                                                        <span class="sep-icon-before sep-center sep-solid"></span>
                                                        <span class="icon-wrap"><i class="autora-icon-build"></i></span>
                                                        <span class="sep-icon-after sep-center sep-solid"></span>
                                                    </div>
                                                </div>
                                                 
                                            </div>
                                             
                                        </div> 
                                    </div> 
                                </div> 
                            </div>
                            <div class="row-contact">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4" style="margin:0px auto">                                            
                                            <div class="themesflat-contact-form style-2 w100 clearfix">
	<div class="wrapper wrapper-login">                                                                                                                 
		<div class="container container-login animated fadeIn">
			 
            <div style="text-align: center;">Please provide your Registered Mobile Number, we'll send a verification code to mobile for reset password</div> <br>
            <form method="POST" action="" onsubmit="return SubmitLogin();">
			    <div class="login-form">
				<div class="form-group form-floating-label">
					<input id="MobileNumber" placeholder="Enter Mobile Number" required name="MobileNumber" maxlength="10" type="text" class="wpcf7-form-control valid" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :"");?>" Placeholder="Mobile Number">
                    <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
				</div>
             
				<div class="form-action mb-3">
                    <button type="submit" class="submit wpcf7-form-control wpcf7-submit" name="btnsubmit">Continue</button>
                    &nbsp;&nbsp;<a href="forgot-password.php" class="link">Using Email ID</a>
				</div>
				<!--<div class="login-account">
					<span class="msg"><a href="index.php" id="show-signup" class="link">I remembered my password</a></span>
				</div>-->
			</div>
            </form>                                                                                                                   
		</div>
	</div>
	 
     
     
     
     
     
     
       
       </div> 
                                        </div> 
                                        
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="themesflat-spacer clearfix" data-desktop="81" data-mobile="60" data-smobile="60" style="height:81px"></div>
                                        </div><!-- /.col-md-12 -->
                                    </div><!-- /.row -->
                                </div><!-- /.container -->
                            </div>
                             
                       </div> 
                    </div> 
                </div> 
            </div> 
        </div>
<?php include_once("website_footer.php");?>