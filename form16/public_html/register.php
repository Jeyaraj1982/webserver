<?php 
$Page="Register";
include_once("website_header.php");?>
 <?php
        if (isset($_POST['btnsubmit'])) {
            $Error=0;
          if (!(strlen(trim($_POST['Name']))>0)) {
                $ErrName ="Please Enter Your Name";
                $Error++;
             }
             
             if (!(strlen(trim($_POST['MobileNumber']))>0)) {
                $ErrMobileNumber = "Please Enter Mobile Number";
                $Error++;
             }

             if (!(strlen(trim($_POST['EmailID']))>0)) {
                $ErrEmailID = "Please Enter Your Email";
                $Error++;
             } 
             $data = $mysql->select("select * from `_tbl_Members` where  `MobileNumber`='".$_POST['MobileNumber']."'");
             if (sizeof($data)>0) {
                 $ErrMobileNumber = "Mobile Number Already Exists";
                 $Error++;
             }
             $dataE = $mysql->select("select * from `_tbl_Members` where  `EmailID`='".$_POST['EmailID']."'");
             if (sizeof($dataE)>0) {
                 $ErrEmailID = "EmailID Already Exists";
                 $Error++;
             }
             if($Error==0){
                 $MemberCode   = SeqMaster::GetNextMemberCode();
                 $id = $mysql->insert("_tbl_Members",array("MemberName"     => $_POST['Name'],
                                                           "MemberCode"     => $MemberCode,
                                                           "MobileNumber"   => $_POST['MobileNumber'],
                                                           "EmailID"        => $_POST['EmailID'],
                                                           "Password"       => $_POST['Password'],
                                                           "CreatedOn"      => date("Y-m-d H:i:s")));   
                                                           
                    MobileSMS::sendSMS($_POST['MobileNumber'],"Your account has been created. Thanks Form16.online",$id);
                   $message = "Your registration completed";
                   
                    $mparam['MailTo']=$_POST['EmailID'];
                    $mparam['MemberID']=$id;
                    $mparam['Subject']="Registration Completed";
                    $mparam['Message']=$message;
                    MailController::Send($mparam,$mailError);
                    
                 if (sizeof($id)>0) { 
                     $sql= "select * from `_tbl_Members` where  `MemberID`='".$id."'";                                         
          $data = $mysql->select($sql);
                 $_SESSION['User']=$data[0];
                  ?>
                     <script>location.href='RegisterSuccess.php';</script>
               <?php  }
             } 
       }
      ?>
<script>
$(document).ready(function () {
    $("#MobileNumber").keypress(function(e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    $("#ErrMobileNumber").html("Digits Only").fadeIn().fadeIn("fast");
                    return false;
                }
            });
   $("#Name").blur(function () {
        if(IsNonEmpty("Name","ErrName","Please Enter Name")){
          IsAlphabet("Name","ErrName","Please Enter Alphabet Characters Only");
        }
   });
   $("#MobileNumber").blur(function () {
       if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){
          IsMobileNumber("MobileNumber","ErrMobileNumber","Please enter valid mobile number");
       }
   });
   $("#EmailID").blur(function () {
        if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email ID")){
          IsEmail("EmailID","ErrEmailID","Please enter valid Email ID");
       }
   });
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
                         $('#ErrName').html("");            
                         $('#ErrMobileNumber').html("");            
                         $('#ErrEmailID').html("");            
                         $('#ErrPassword').html("");
                         $('#Errconfirmpassword').html("");
                         $('#Erragree').html("");
                       if(IsNonEmpty("Name","ErrName","Please Enter Name")){
                          IsAlphabet("Name","ErrName","Please enter Alphabet Characters Only");
                       }
                       if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){
                          IsMobileNumber("MobileNumber","ErrMobileNumber","Please enter valid Mobile Number");
                       }
                       if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email ID")){
                          IsEmail("EmailID","ErrEmailID","Please enter valid Email ID");
                       }
                       IsNonEmpty("Password","ErrPassword","Please Enter Password");
                       IsNonEmpty("confirmpassword","Errconfirmpassword","Please Enter Confirm Password");
                       if (!($('#agree').prop('checked'))) {
                            $("#Erragree").html("Please agree terms and conditions");
                            ErrorCount++;
                        }else {
                             $("#Erragree").html(""); 
                        }
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
                        <span class="trail-end">Register</span>
                    </div>
                </div>
            </div>
            <div class="featured-title-heading-wrap">
                <h1 class="feautured-title-heading">Register</h1>
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
                                                <h2 class="heading">Register</h2>
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

                                            
                                            
                                            
                                            
                                            
            <form method="POST" action="" onsubmit="return SubmitRegister();">
			    <div class="login-form">
				<div class="form-group form-floating-label">
                    <label for="Name" class="placeholder">Full Name</label>
					<input placeholder="Your Name"  id="Name" name="Name" type="text" class="wpcf7-form-control valid" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] :"");?>">
                    <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
				</div>
				<div class="form-group form-floating-label">
                    <label for="MobileNumber" class="placeholder">Mobile Number</label>
                    <input placeholder="Mobile Number"  id="MobileNumber" maxlength="10" name="MobileNumber" type="text" class="wpcf7-form-control valid" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :"");?>">
                    <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                </div>
                <div class="form-group form-floating-label">
                    <label for="EmailID" class="placeholder">Email ID</label>
					<input placeholder="Email ID"  id="EmailID" name="EmailID" type="text" class="wpcf7-form-control valid" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] :"");?>">
                    <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
				</div>
				<div class="form-group form-floating-label">
                    <label for="Password" class="placeholder">Password</label>
					<input placeholder="Password" id="Password" name="Password" type="password" class="wpcf7-form-control valid" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>">
                    <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
				</div>
				<div class="form-group form-floating-label">
                    <label for="confirmpassword" class="placeholder">Confirm Password</label>
					<input placeholder="Confirm Password"  id="confirmpassword" name="confirmpassword" type="password" class="wpcf7-form-control valid"  value="<?php echo (isset($_POST['confirmpassword']) ? $_POST['confirmpassword'] :"");?>">
                    <span class="errorstring" id="Errconfirmpassword"><?php echo isset($Errconfirmpassword)? $Errconfirmpassword : "";?></span>
				</div>
				<div class="row form-sub m-0">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="wpcf7-form-control valid" name="agree" id="agree">
						<label class="custom-control-label" for="agree">I Agree the terms and conditions.</label>
					</div>
                    <span class="errorstring" id="Erragree"><?php echo isset($Erragree)? $Erragree : "";?></span>
				</div>
				<div class="form-action">
                    <button type="submit" class="submit wpcf7-form-control wpcf7-submit" name="btnsubmit">Sign Up</button>
				</div>
                <div class="login-account">
                    <span class="msg">Already have an account ?</span>
                    <a href="login.php" id="show-signup" class="link">Sign In</a>
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