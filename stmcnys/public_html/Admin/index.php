
<?php
$Page="login";     
include_once("header.php");
        if (isset($_POST['btnsubmit'])) {
         $userdata = $mysql->select("select * from admintable where UserName='".$_POST['UserName']."' and Password='".$_POST['Password']."' ");
                
                if (sizeof($userdata)>0) {
                    
                    $_SESSION['user']=$userdata[0];
                    $_SESSION['User']['UserRole']="Admin";    
                    echo "<script>location.href='dashboard.php';</script>";
                }  else {
                    echo "<script>alert('login failed');</script>" ;
                }
       }
      ?>
<script>
$(document).ready(function () {
   $("#UserName").blur(function () {
        IsNonEmpty("UserName","ErrUserName","Please Enter Mobile Number");
   });
$("#Password").blur(function () {
        IsNonEmpty("Password","ErrPassword","Please Enter Password");
   });                                                                                                    
});
 function SubmitLogin() { 
                         ErrorCount=0;       
                         $('#ErrUserName').html("");            
                         $('#ErrPassword').html("");
                       IsNonEmpty("UserName","ErrUserName","Please Enter User Name");
                       IsNonEmpty("Password","ErrPassword","Please Enter Password");
                        return (ErrorCount==0) ? true : false;
                 }
</script>                                                                
<body class="login">
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center"> <img src="" style="height:128px"><br>Admin Sign In</h3>
            <form method="POST" action="" onsubmit="return SubmitLogin();">
                <div class="login-form">
                <div class="form-group form-floating-label">
                    <input id="UserName" name="UserName" type="text" class="form-control input-border-bottom" value="<?php echo (isset($_POST['UserName']) ? $_POST['UserName'] :"");?>">
                    <label for="UserName" class="placeholder">User Name</label>
                    <span class="errorstring" id="ErrUserName"><?php echo isset($ErrUserName)? $ErrUserName : "";?></span>
                </div>
                <div class="form-group form-floating-label">
                    <input id="Password" name="Password" type="password" class="form-control input-border-bottom" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>">
                    <label for="Password" class="placeholder">Password</label>
                    <div class="show-password" >
                        <span onclick="showHidePwd('Password',$(this))"><i class="icon-eye"></i> </span>
                    </div>
                    <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                </div>
                <div class="form-group form-floating-label"  style="text-align: center">
                    <span class="errorstring"><?php echo $ErrorMessage;?></span>
                </div>
                <div class="form-action mb-3">
                    <button type="submit" class="btn btn-primary btn-rounded btn-login" name="btnsubmit">Sign In</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    