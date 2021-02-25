<?php include_once("header.php");?>
<?php
        if (isset($_POST['btnsubmit'])) {
         $userdata = $mysql->select("select * from _tbl_customer where MobileNumber='".$_POST['MobileNumber']."' and Password='".$_POST['Password']."' ");
            if (sizeof($userdata)>0) {
                $_SESSION['User']=$userdata[0];
                $_SESSION['User']['Role']="User";
               echo "<script>location.href='MyPage.php';</script>";
            }  else {
                $ErrMessage ='Invalid Login Details';
            }
       }
      ?> 
<div id="account-login" class="container">
	<ul class="breadcrumb">
		<li><a>Home</a></li>
		<li><a href="login.php">Login</a></li>
	</ul>
    <div class="row">
        <div id="content" class="col-md-9 col-sm-8 col-xs-12">
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="well">
						<h2 class="heading">Login</h2>
						<form action="" method="post" enctype="multipart/form-data" onsubmit="return SubmitLogin();">
							<div class="form-group">
								<label class="control-label" for="input-email">Mobile Number<span class="required" style="color:red">*</span></label>
								<input type="text" id="MobileNumber" name="MobileNumber" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :"");?>" class="form-control" />
								<span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
							</div>
							<div class="form-group">
								<label class="control-label" for="input-password">Password<span class="required" style="color:red">*</span></label>
								<input type="password" id="Password" name="Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>" class="form-control" />
								<span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span><br>
								<!--<a href="http://templatetasarim.com/opencart/Basket/index.php?route=account/forgotten">Forgotten Password</a></div>-->
								<input type="submit" value="Login" class="btn btn-primary"  name="btnsubmit" />
                                <span class="errorstring" style="text-align: center"><?php echo isset($ErrMessage)? $ErrMessage : "";?></span>
                        </form>
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>
<?php include_once("footer.php");?>
<script>
$(document).ready(function () {
   $("#EmailID").blur(function () {                                                                
        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number<br>")){
           // IsEmail("EmailID","ErrEmailID","Please Enter Valid Email address<br>");
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
       if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Email Mobile Number<br>")){
            //IsEmail("EmailID","ErrEmailID","Please Enter Valid Email address<br>");
        }
       IsNonEmpty("Password","ErrPassword","Please Enter Password<br>");
        return (ErrorCount==0) ? true : false;
 }
</script>