<?php
$Page="login";
include_once("header.php");
        if (isset($_POST['btnsubmit'])) {
          $sql= "select * from `_tbl_Admin` where  `MobileNumber`='".$_POST['MobileNumber']."' or `EmailID`='".$_POST['MobileNumber']."'";
          $data = $mysql->select($sql);
           if (sizeof($data)>0) {
               if($data[0]['IsActive']==1){
                   if ($data[0]['Password']==$_POST['Password']) {
                       
                   $_SESSION['User']=$data[0];
                   $_SESSION['User']['UserName']=$data[0]['AdminName'];
                   if ($data[0]['IsAdmin']==1) {            
                    $_SESSION['User']['UserRole']="Admin";    
                   } else {         
                       $_SESSION['User']['UserRole']="Staff";
                   } 
                   
                   
                //   $clientinfo = $j2japplication->GetIPDetails($_POST['qry']);
                if($data[0]['IsAdmin']==1){
            $loginid    = $mysql->insert("_tbl_logs_logins",array("LoginOn"       => date("Y-m-d H:i:s"),
                                                                  "LoginFrom"     => "Web",
                                                                  "Device"        => $clientinfo['Device'],
                                                                  "AdminID"       => $data[0]['AdminID'],
                                                                  "MobileNumber"  => $data[0]['MobileNumber'],
                                                                  "LoginStatus"  => "1",
                                                                  "BrowserIP"     => $clientinfo['query'],
                                                                  "CountryName"   => $clientinfo['country'],
                                                                  "BrowserName"   => $clientinfo['UserAgent'],
                                                                  "APIResponse"   => json_encode($clientinfo),
                                                                  "LoginPassword" => $_POST['Password']));
                }else {
                       $loginid    = $mysql->insert("_tbl_logs_logins",array("LoginOn"       => date("Y-m-d H:i:s"),
                                                                  "LoginFrom"     => "Web",
                                                                  "Device"        => $clientinfo['Device'],
                                                                  "AdminStaffID"       => $data[0]['AdminID'],
                                                                  "MobileNumber"  => $data[0]['MobileNumber'],
                                                                  "BrowserIP"     => $clientinfo['query'],
                                                                   "LoginStatus"  => "1",
                                                                  "CountryName"   => $clientinfo['country'],
                                                                  "BrowserName"   => $clientinfo['UserAgent'],
                                                                  "APIResponse"   => json_encode($clientinfo),
                                                                  "LoginPassword" => $_POST['Password']));
                }
                   
                 ?>
                <script>location.href='dashboard.php';</script>
                 <?php
                } else {                                                                                       
                    $ErrorMessage = "Mobile Number Password Incorrect";
                } 
               }else {
                  $ErrorMessage = "Account deactivated"; 
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
			<h3 class="text-center"> <img src="assets/logo.jpeg" style="height:128px"><br>Admin Sign In</h3>
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
	