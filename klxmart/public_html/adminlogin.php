<?php include_once("header.php");?>
<?php
        if (isset($_POST['btnsubmit'])) {
            $userdata = $mysql->select("select * from _tbl_admin where AdminEmail='".$_POST['UserName']."' and Password='".$_POST['Password']."'");
     
                if (sizeof($userdata)>0) {
                    $_SESSION['User']=$userdata[0];
                    $_SESSION['User']['Role']="Admin";
                   echo "<script>location.href='app/dashboard.php';</script>";
                }  else {
                    $ErrMessage ='Invalid Login Details';
                }
            
       }
      ?>
<div id="account-login" class="container">
  <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="adminlogin.php">Admin Login</a></li>
      </ul>
      <div class="row">
                <div id="content" class="col-md-9 col-sm-8 col-xs-12">
      <div class="row">
        
        <div class="col-md-6 col-xs-12">
          <div class="well">
            <h2 class="heading">Admin Login</h2>
            <form action="" method="post" enctype="multipart/form-data" onsubmit="return SubmitLogin();">
              <div class="form-group">
                <label class="control-label" for="input-email">User Name</label>
                <input type="text" name="UserName" id="UserName" value="<?php echo (isset($_POST['UserName']) ? $_POST['UserName'] :"");?>" placeholder="User Name" class="form-control" />
				<span class="errorstring" id="ErrUserName"><?php echo isset($ErrUserName)? $ErrUserName : "";?></span>
              </div>
              <div class="form-group">
                <label class="control-label" for="input-password">Password</label>
                <input type="password" name="Password" id="Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>" placeholder="Password" class="form-control" />
                <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
				<span class="errorstring" style="text-align: center"><?php echo isset($ErrMessage)? $ErrMessage : "";?></span>
				<br><input type="submit" value="Login" name="btnsubmit" class="btn btn-primary" />
                          </form>
          </div>
        </div>
      </div>
      </div>
    
</div>
</div>
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
<?php include_once("footer.php");?>
