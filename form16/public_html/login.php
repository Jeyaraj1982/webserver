<?php

    include_once("website_header.php");
    
    if (isset($_POST['btnsubmit'])) {
          $sql= "select * from `_tbl_Members` where  `MobileNumber`='".$_POST['MobileNumber']."'";                                         
          $data = $mysql->select($sql);
           if (sizeof($data)>0) {
                   if ($data[0]['Password']==$_POST['Password']) {
                   $_SESSION['User']=$data[0];
                   $_SESSION['User']['UserRole']="Member";
                       //   $clientinfo = $j2japplication->GetIPDetails($_POST['qry']);
            $loginid    = $mysql->insert("_tbl_logs_logins",array("LoginOn"       => date("Y-m-d H:i:s"),
                                                                  "LoginFrom"     => "Web",
                                                                  "Device"        => $clientinfo['Device'],
                                                                  "MemberID"      => $data[0]['MemberID'],
                                                                  "MemberCode"    => $data[0]['MemberCode'],
                                                                  "MobileNumber"  => $data[0]['MobileNumber'],
                                                                  "BrowserIP"     => $clientinfo['query'],
                                                                  "LoginStatus"     => "1",
                                                                  "CountryName"   => $clientinfo['country'],
                                                                  "BrowserName"   => $clientinfo['UserAgent'],
                                                                  "APIResponse"   => json_encode($clientinfo),
                                                                  "LoginPassword" => $_POST['Password']));
            if ($_SESSION['User']['RequiredSecondAuthentication']=="1") {
                
            
                 ?>
                <script>location.href='memberotpverification.php';</script>
                 <?php
            } else {
                ?>
                 <script>location.href='dashboard.php';</script>
                <?php
            }
                } else {                      
                    $ErrorMessage = "Mobile Number Password Incorrect";
                } 
           }   else {
               $ErrorMessage = "login failed";
           }   
       }  else {
           unset($_SESSION['User']['otp']);
       }
      ?>
<script>
$(document).ready(function () {
   $("#MobileNumber").blur(function () {
        IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number");
   });
$("#Password").blur(function () {
        IsNonEmpty("Password","ErrPassword","Please Enter Password");
   });
});
 function SubmitLogin() { 
                         ErrorCount=0;       
                         $('#ErrMobileNumber').html("");            
                         $('#ErrPassword').html("");
                       IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number");
                       IsNonEmpty("Password","ErrPassword","Please Enter Password");
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
                                                <h2 class="heading">Login</h2>
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













            <form method="POST" action="" onsubmit="return SubmitLogin();">
                <div class="login-form">
                <div class="form-group form-floating-label">
                    <label for="MobileNumber" class="placeholder">Mobile Number</label>
                    <input placeholder="Mobile Number" required id="MobileNumber" name="MobileNumber" type="text" class="wpcf7-form-control valid" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :"");?>">
                    <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                </div>
                <div class="form-group form-floating-label">
                    <label for="Password" class="placeholder">Password</label>
                    <input placeholder="Password" required id="Password" name="Password" type="password" class="wpcf7-form-control valid" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>">
                    <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                </div>
                <div class="form-group form-floating-label"  style="text-align: center">
                    <span class="errorstring"><?php echo $ErrorMessage;?></span>
                </div>
                <div class="form-action mb-3">
                    <button type="submit"  class="submit wpcf7-form-control wpcf7-submit"  name="btnsubmit">Sign In</button>
                     <a href="forgot-password.php" class="link float-right" style="margin-top:1px;">Forgot Password ?</a>
                </div>
                <div class="login-account">
                    <span class="msg">Don't have an account yet ?</span>
                    <a href="register.php" id="show-signup" class="link">Sign Up</a>
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