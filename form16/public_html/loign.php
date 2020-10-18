<?php 
    $Page="login";
    include_once("header.php");
    
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
                   
                 ?>
                <script>location.href='memberotpverification.php';</script>
                 <?php
                } else {
                    $ErrorMessage = "Mobile Number Password Incorrect";
                } 
           }   else {
               $ErrorMessage = "login failed";
           }   
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
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">
            <img src="assets/logo.jpeg" style="height:128px"><br>
            Sign In</h3>
            <form method="POST" action="" onsubmit="return SubmitLogin();">
			    <div class="login-form">
				<div class="form-group form-floating-label">
					<input id="MobileNumber" name="MobileNumber" type="text" class="form-control input-border-bottom" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :"");?>">
					<label for="MobileNumber" class="placeholder">Mobile Number</label>
                    <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
				</div>
				<div class="form-group form-floating-label">
					<input id="Password" name="Password" type="password" class="form-control input-border-bottom" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>">
					<label for="Password" class="placeholder">Password</label>
					<div class="show-password">
						<span onclick="showHidePwd('Password',$(this))"><i class="icon-eye"></i> </span>
					</div>
                    <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
				</div>
                <div class="form-group form-floating-label"  style="text-align: center">
                    <span class="errorstring"><?php echo $ErrorMessage;?></span>
				</div>
                <div class="row form-sub m-0">
					<a class="link float-left">&nbsp;</a>
					<a href="forgot-password.php" class="link float-right">Forgot Password ?</a>
				</div>
				<div class="form-action mb-3">
                    <button type="submit" class="btn btn-primary btn-rounded btn-login" name="btnsubmit">Sign In</button>
				</div>
				<div class="login-account">
					<span class="msg">Don't have an account yet ?</span>
					<a href="register.php" id="show-signup" class="link">Sign Up</a>
				</div>
			</div>
            </form>
		</div>
	</div>
	<?php include_once("footer.php");?>