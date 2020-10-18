<?php include_once("website_header.php");?>
<?php
         if (isset($_POST['loginbtn'])) {
             
          if ($_POST['verificationcode']==$_SESSION['User']['otp'])    {
              
                  $mysql->execute("update _tbl_Members set IsMobileNumberVerified='1',MobileVerifiedOn='".date("Y-m-d H:i:s")."' where MemberID='".$_SESSION['User']['MemberID']."'");
                  $record = $mysql->select("select * from _tbl_Members where  MemberID='".$_SESSION['User']['MemberID']."'");
                  $_SESSION['User'] = $record[0];
                  $_SESSION['User']['UserRole']="Member";
                  $_SESSION['User']['IsAllowed']="1";
                  sleep(10);
                  echo " <script>location.href='dashboard.php?vm=1';</script>";
              } else {
                  $errormessage ="Invalid verification code";
                 //echo $obj->printError("Invalid verification code");
              }
          } else { 
              if ($_SESSION['User']['IsAllowed']==1) {
                 echo " <script>location.href='dashboard.php';</script>";   
              }
            if (!(isset($_SESSION['User']['otp']))) {
                $code = rand(11111,99999);
                $_SESSION['User']['otp']=$code;
                MobileSMS::sendSMS($_SESSION['User']['MobileNumber'],"Dear applicant, ".$code." is your form16.online login OTP. OTP is confidential. For security reasons, DO NOT share this OTP with anyone. ",$_SESSION['User']['MemberID']);     
            }
          }
 ?>   
<div id="featured-title" class="featured-title clearfix">
    <div id="featured-title-inner" class="container clearfix">
        <div class="featured-title-inner-wrap">                    
            <div id="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="breadcrumb-trail">
                        <a href="index.html" class="trail-begin">Home</a>
                        <span class="sep">|</span>
                        <span class="trail-end">Login</span>
                    </div>
                </div>
            </div>
            <div class="featured-title-heading-wrap">
                <h1 class="feautured-title-heading">Login</h1>
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
                                                <h2 class="heading">Mobile Verification</h2>
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
            <p align="center">We sent a verification code your mobile<br>number +91 <?php echo $_SESSION['User']['MobileNumber'];?></p>
            <form action="" method="POST" >
            <div class="login-form">
                <div class="form-group form-floating-label">
              <!--  <label for="username" class="placeholder">Verification Code</label> <br>-->
                    <input id="username" placeholder="Verification code here" name="verificationcode" value="<?php echo $_POST['verificationcode'];?>" type="text" class="wpcf7-form-control valid" required>
                    <span style="color: red"><?php echo $errormessage;?></span>
                </div>
                <div class="form-action mb-3">
                    <button type="submit"  name="loginbtn" class="submit wpcf7-form-control wpcf7-submit">Verify Code</button>
                      &nbsp;&nbsp;<a href="index.php?action=logout" style="color:#555">Logout</a>
                </div>
                <div class="form-action mb-3" style="font-size:11px;">
                <br>
                <img src="assets/idea.png">&nbsp;You can disbale <b>second authentication</b> in your setting.
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