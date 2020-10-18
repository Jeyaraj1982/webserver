<?php 
$Page="login";
include_once("website_header.php");

if (isset($_POST['btnsubmit'])) {
    $data = $mysql->select("Select * from `_tbl_verification_code` where `RequestID`='".$_POST['reqID']."' ");
             if (sizeof($data)>0) {
                 if ($data[0]['SecurityCode']==$_POST['VerificationCode']) { ?>
                     <form action="forgot-password-save-password.php" id="reqFrm" method="post">
                        <input type="hidden" value="<?php echo $data[0]['RequestID'];?>" name="reqID">
                        <input type="hidden" value="<?php echo $data[0]['EmailTo'];?>" name="reqEmail">
                     </form>
                    <script>document.getElementById("reqFrm").submit();</script>
                <?php } else{
                        $ErrVerificationCode ="Invalid Verfication Code";
                    }
             } else {
                    $ErrorMessage ="Invalid Access";
             }                 
}
$resend = "";
    if (isset($_POST['reqEmail'])) {
        $resend = $_POST['reqEmail'];
    } elseif (isset($data[0]['EmailTo'])) {
        $resend = $data[0]['EmailTo'];
    }
?>                                                                                                                      
<script>
$(document).ready(function () {
   $("#VerificationCode").blur(function () {
        IsNonEmpty("VerificationCode","ErrVerificationCode","Please Enter Verification Code");
   });
   });
 function SubmitLogin() { 
                         ErrorCount=0;       
                         $('#ErrVerificationCode').html("");            
                       IsNonEmpty("VerificationCode","ErrVerificationCode","Please Enter Verification Code");
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
                                                <h2 class="heading">Forgot Password</h2>
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
			 
            <div style="text-align: center;">We have sent a verification code to your registered email. Please check your email and enter the verification code</div> <br>
			    <div class="login-form">
                <form method="POST" action="" onsubmit="return SubmitLogin();">
                    <input type="hidden"  value="<?php echo $_POST['reqEmail'];?>" name="reqEmail">
                    <input type="hidden"  value="<?php echo $_POST['reqID'];?>" name="reqID">
				    <div class="form-group form-floating-label">
					    <input placeholder="Verification code here ..." required id="VerificationCode" name="VerificationCode" type="text" class="wpcf7-form-control valid" value="<?php echo (isset($_POST['VerificationCode']) ? $_POST['VerificationCode'] :"");?>" Placeholder="Verification Code Here..">
                        <span class="errorstring" id="ErrVerificationCode"><?php echo isset($ErrVerificationCode)? $ErrVerificationCode : "";?></span>
				    </div>
                    <div class="form-group form-floating-label"  style="text-align: center">
                        <span class="errorstring"><?php echo $ErrorMessage;?></span>
				    </div>
				    <div class="form-action mb-3">
                        <button type="submit" class="submit wpcf7-form-control wpcf7-submit" name="btnsubmit">Verify Code</button>
				    </div>
                </form>
				<div class="row form-sub m-0">
                    <a href="javascript:void(0)" onclick="ResendForgetPasswordOtp()" class="link float-right" style="cursor: pointer;">Resend</a>
                    <form action="forgot-password.php" id="reqFrm" method="post">
                        <input type="hidden" value="<?php echo $resend;?>" name="EmailID">
                        <button type="submit" hidden="hidden" name="btnsubmit" id="btnsubmit" class="btn btn-primary glow position-relative w-100">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                    </form>
                </div>
                <!-- <a href="index.php" class="link float-left">I will do later</a> -->
			</div>
		</div>
	</div>
    <script>
        function ResendForgetPasswordOtp() {
            $( "#btnsubmit" ).trigger( "click" );
        }
    </script>
	
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
      
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