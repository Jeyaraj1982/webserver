<?php 
$Page="login";
include_once("website_header.php");
if (isset($_POST['btnsubmit'])) {
    $data = $mysql->select("Select * from `_tbl_verification_code` where `RequestID`='".$_POST['reqID']."' ");
         
         if (!(strlen(trim($_POST['Password']))>=6)) {
            $ErrPassword = "Please enter valid new password must have 6 characters";
            $err++;
         } 
         if (!(strlen(trim($_POST['confirmpassword']))>=6)) {
            $Errconfirmpassword = "Please enter valid confirm new password  must have 6 characters"; 
            $err++;
         } 
         if ($_POST['confirmpassword']!=$_POST['Password']) {
            $Errconfirmpassword = "Password do not match"; 
            $err++;
         }
         if($err==0){
             $mysql->execute("update _tbl_Members set `Password`='".$_POST['confirmpassword']."' where `MemberID`='".$data[0]['MemberID']."'");
             
                           $message = "Your password chnaged";
                           
                            $mparam['MailTo']=$data[0]['EmailTo'];
                            $mparam['MemberID']=$id;
                            $mparam['Subject']="Password Changed";
                            $mparam['Message']=$message;
                            MailController::Send($mparam,$mailError);                                                           
         ?>
         <script>location.href="Password-Changed.php";</script>
         <?php }
}

?>
<script>
$(document).ready(function () {
    $("#Password").blur(function () {
        IsNonEmpty("Password","ErrPassword","Please Enter Password");
    });
    $("#confirmpassword").blur(function () {
        IsNonEmpty("confirmpassword","Errconfirmpassword","Please Enter Confirm Password");
    });                                                                                                                              
    $("#agree").blur(function () {
        if (!($('#agree').prop('checked'))) {
            $("#Erragree").html("Please agree terms and conditions");
            ErrorCount++;
        }else {
             $("#Erragree").html(""); 
        }
       });
    });
 function SubmitRegister() { 
                         ErrorCount=0;       
                         $('#Errconfirmpassword').html("");
                         $('#ErrPassword').html("");
                       
                       IsNonEmpty("Password","ErrPassword","Please Enter Password");
                       IsNonEmpty("confirmpassword","Errconfirmpassword","Please Enter Confirm Password");
                        var password = document.getElementById("Password").value;
                        var confirmPassword = document.getElementById("confirmpassword").value;
                        if (password != confirmPassword) {
                            ErrorCount++;
                            $('#Errconfirmpassword').html("Passwords do not match.");
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
                                                <h2 class="heading">Change Password</h2>
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
		 
            <form method="POST" action="" onsubmit="return SubmitRegister();">
            <input type="hidden"  value="<?php echo $_POST['reqEmail'];?>" name="reqEmail">
            <input type="hidden"  value="<?php echo $_POST['reqID'];?>" name="reqID">
			    <div class="login-form">
				<div class="form-group form-floating-label">
                <label for="Password" class="placeholder">Password</label>
					<input placeholder="New Password" required  id="Password" name="Password" type="password" class="wpcf7-form-control valid" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>">
                    <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
				</div>
				<div class="form-group form-floating-label">
                    <label for="confirmpassword" class="placeholder">Confirm Password</label>
					<input  id="confirmpassword" required placeholder="Confirm new password" name="confirmpassword" type="password" class="wpcf7-form-control valid"  value="<?php echo (isset($_POST['confirmpassword']) ? $_POST['confirmpassword'] :"");?>">
					
                    <span class="errorstring" id="Errconfirmpassword"><?php echo isset($Errconfirmpassword)? $Errconfirmpassword : "";?></span>
				</div>
				<div class="form-action">
                    <button type="submit" class="submit wpcf7-form-control wpcf7-submit" name="btnsubmit">Save my password</button>
				</div>
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