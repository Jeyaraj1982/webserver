<?php include_once("header.php");?>
<?php
        if (isset($_POST['btnsubmit'])) {
         $userdata = $mysql->select("select * from _tbl_customer where EmailID='".$_POST['EmailID']."' and Password='".$_POST['Password']."' ");
            if (sizeof($userdata)>0) {
                $_SESSION['User']=$userdata[0];
                $_SESSION['User']['Role']="User";
               echo "<script>location.href='index.php';</script>";
            }  else {
                $ErrMessage ='Invalid Login Details';
            }
       }
      ?> 
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="index.php">Home</a><span>&raquo;</span></li>
            <li><strong>My Account</strong><span>&raquo;</span></li>
            <li><strong>Login</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="page-content">
        <div class="account-login">
          <div class=" " style="width:400px;margin:0px auto;padding:20px;">
          <form method="post" action="" onsubmit="return SubmitLogin();">
            <h4 style="text-align: center;">Login</h4>
            <p class="before-login-text" style="text-align: center;">Welcome back! Sign in to your account</p>
            <br>
            <label for="EmailID">Email address<span class="required" style="color:red">*</span></label>
            <input style="width:100%" id="EmailID" name="EmailID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] :"");?>" type="text" class="form-control">
            <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
            <br>
            <label for="Password">Password<span class="required" style="color:red">*</span></label>
            <input style="width:100%" id="Password" name="Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>" type="password"  class="form-control">
            <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
            
            <span class="errorstring" style="text-align: center"><?php echo isset($ErrMessage)? $ErrMessage : "";?></span>
            <br><label class="inline" for="rememberme" style="margin-left:0px;"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> Remember me </label>
            <br>
            <br>
            
            <button type="submit" class="button" name="btnsubmit"><i class="icon-lock icons"></i>&nbsp; <span>Login</span></button>
            <p class="forgot-pass"><a href="forgotpassword.php">Lost your password?</a></p>
          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
   
<?php include_once("footer.php");?>
<script>
$(document).ready(function () {
   $("#EmailID").blur(function () {                                                                
        if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email address<br>")){
            IsEmail("EmailID","ErrEmailID","Please Enter Valid Email address<br>");
        }
   });
$("#Password").blur(function () {
        IsNonEmpty("Password","ErrPassword","Please Enter Password<br>");
   });                                                                                                    
});
 function SubmitLogin() { 
         ErrorCount=0;       
         $('#ErrEmailID').html("");            
         $('#ErrPassword').html("");
       if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email address<br>")){
            IsEmail("EmailID","ErrEmailID","Please Enter Valid Email address<br>");
        }
       IsNonEmpty("Password","ErrPassword","Please Enter Password<br>");
        return (ErrorCount==0) ? true : false;
 }
</script>