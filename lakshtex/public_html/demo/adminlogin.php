<?php include_once("header.php");?>
<?php
        if (isset($_POST['btnsubmit'])) {
            $userdata = $mysql->select("select * from _tbl_admin where UserName='".$_POST['UserName']."' and Password='".$_POST['Password']."'");
     
                if (sizeof($userdata)>0) {
                    $_SESSION['User']=$userdata[0];
                    $_SESSION['User']['Role']="Admin";
                   echo "<script>location.href='app/dashboard.php';</script>";
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
            <li><strong>Admin Login</strong><span>&raquo;</span></li>
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
            <label for="EmailID">User Name<span class="required">*</span></label>
            <input style="width:100%" id="UserName" name="UserName" value="<?php echo (isset($_POST['UserName']) ? $_POST['UserName'] :"");?>" type="text" class="form-control">
            <span class="errorstring" id="ErrUserName"><?php echo isset($ErrUserName)? $ErrUserName : "";?></span>
            <br>
            <label for="Password">Password<span class="required">*</span></label>
            <input style="width:100%" id="Password" name="Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>" type="password"  class="form-control">
            <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
            
            <span class="errorstring" style="text-align: center"><?php echo isset($ErrMessage)? $ErrMessage : "";?></span>
            <br><label class="inline" for="rememberme" style="margin-left:0px;"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> Remember me </label>
            <br>
            <br>
            
            <button type="submit" class="button" name="btnsubmit"><i class="icon-lock icons"></i>&nbsp; <span>Login</span></button>
            <p class="forgot-pass"><a href="#">Lost your password?</a></p>
          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
   
<?php include_once("footer.php");?>
<script>
$(document).ready(function () {
   $("#UserName").blur(function () {                                                                
        IsNonEmpty("UserName","ErrUserName","Please Enter User Name<br>");
   });
$("#Password").blur(function () {
        IsNonEmpty("Password","ErrPassword","Please Enter Password<br>");
   });                                                                                                    
});
 function SubmitLogin() { 
         ErrorCount=0;       
         $('#ErrUserName').html("");            
         $('#ErrPassword').html("");
       
       IsNonEmpty("UserName","ErrUserName","Please Enter User Name<br>");
       IsNonEmpty("Password","ErrPassword","Please Enter Password<br>");
        return (ErrorCount==0) ? true : false;
 }
</script>