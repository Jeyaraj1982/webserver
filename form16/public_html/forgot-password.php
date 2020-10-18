<?php 
$Page="login";
include_once("website_header.php");

if (isset($_POST['btnsubmit'])) {
               $data = $mysql->select("Select * from `_tbl_Members` where `EmailID`='".$_POST['EmailID']."'");
               if (sizeof($data)==0)  {  ?>
               <script>
                $( document ).ready(function() {
                swal("Account Not Found!", {
                        icon : "failure",
                        buttons: {                    
                            confirm: {
                                className : 'btn btn-success'                                                                  
                            }
                        },
                    });
                });
            </script>
                <?php
                    }  else{   
                        $otp=rand(1000,9999);
                        $securitycode = $mysql->insert("_tbl_verification_code",array("MemberID"      => $data[0]['MemberID'],
                                                                                      "RequestSentOn" => date("Y-m-d H:i:s"),
                                                                                      "SecurityCode"  => $otp,
                                                                                      "messagedon"    => date("Y-m-d h:i:s"), 
                                                                                      "EmailTo"       => $data[0]['EmailID'],
                                                                                      "Type"          => "Forgot Password")) ; 
                        $message = "Your forgot password verification code is ".$otp;
                        $mparam['MailTo']=$data[0]['EmailID'];
                        $mparam['MemberID']=$data[0]['MemberID'];
                        $mparam['Subject']="Forgot Password";
                        $mparam['Message']=$message;
                        MailController::Send($mparam,$mailError);                                                       
                ?>
                        <form action="forgot-password-otp.php" id="reqFrm" method="post">
                            <input type="hidden" value="<?php echo $securitycode;?>" name="reqID">
                            <input type="hidden" value="<?php echo $data[0]['EmailID'];?>" name="reqEmail">
                        </form>
                    <script>document.getElementById("reqFrm").submit();</script>
                <?php    } 
            }   
?>
<script>
$(document).ready(function () {
   $("#EmailID").blur(function () {
        if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email ID")){
           IsEmail("EmailID","ErrEmailID","Please Enter Valid Email ID");
        }
   });
   });
 function SubmitLogin() { 
                         ErrorCount=0;       
                         $('#ErrEmailID').html("");            
                        if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email ID")){
                           IsEmail("EmailID","ErrEmailID","Please Enter Valid Email ID");
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
 
 
	 
            <div style="text-align: center;">Please provide your Registered Email, we'll send a verification code to email for reset password</div> <br>
            <form method="POST" action="" onsubmit="return SubmitLogin();">
			    <div class="login-form">
				<div class="form-group form-floating-label">
					<input id="EmailID" placeholder="Registered Email ID" required name="EmailID" type="text" class="wpcf7-form-control valid" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] :"");?>" Placeholder="Email ID">
                    <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
				</div>
                <div class="form-group form-floating-label"  style="text-align: center">
                    <span class="errorstring"><?php echo $ErrorMessage;?></span>
				</div>
                <div class="row form-sub m-0">
                    <a class="link float-left">&nbsp;</a>
                  
                </div>
				<div class="form-action mb-3">
                    <button type="submit" class="submit wpcf7-form-control wpcf7-submit" name="btnsubmit">Continue</button>
                    &nbsp;&nbsp;  <a href="forgot-password_mobile.php" class="link">Using Mobile Number</a>
				</div>
				<div class="login-account" style="text-align: center;padding-top:10px;">
					<span class="msg"><a href="index.php" id="show-signup" class="link">I remembered my password</a></span>
				</div>
			</div>
            </form>
	 
    
    
    
      
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
	
    
    
    