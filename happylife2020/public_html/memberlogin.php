<?php 
    include_once("config.php");
    if (isset($_POST['submitBtn'])) {
        $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_POST['emailAddress']."'");
        
        if (sizeof($data)>0) {
            
            if ($data[0]['MemberPassword']==$_POST['loginPassword']) {
                
                $package = $mysql->select("select * from _tbl_Settings_Packages where PackageID='".$data[0]['CurrentPackageID']."'");
                $data[0]['Role']="Member";
                $data[0]['PackageIcon']=$package[0]['FileName'];
                $id=$mysql->insert("_tbl_members_login_logs",array("MemberID"  => $data[0]['MemberID'],
                                                                   "LoginOn"   => date("Y-m-d H:i:s"),
                                                                   "IsSuccess" => "1"));
                if ($data[0]['RequireMobileOtpLogin']==1) {
                    $otp = rand(9999,99999);
                    $data[0]['otp']=$otp;
                    $_SESSION['XUser']=$data[0];                   
                    $message = "Your happylife2020.in login code is ". $otp;
                    MobileSMS::sendSMS($data[0]['MobileNumber'],$message,$data[0]['MemberID']);
                    echo "<script>location.href='verify.php';</script>";
                } else {
                    $_SESSION['User']=$data[0];                   
                    echo "<script>location.href='app/dashboard.php';</script>";
                }
            } else {
                $error = "<span style='color:red'>Member ID or Password incorrect</span>";
                $id=$mysql->insert("_tbl_members_login_logs",array("MemberID"  => $_SESSION['User']['MemberID'],
                                                                   "LoginOn"   => date("Y-m-d H:i:s"),
                                                                   "IsSuccess" => "0")); 
            } 
        } else {
            $error = "<span style='color:red'>login failed</span>";
        }   
    }
?>
                         
		 
            <form action="" class="customform" method="post">
			<div class="line">
				<div class="s-12">
                    <label for="username" class="placeholder">Member ID<span style="color:red">*</span></label><br>
					<input id="username" name="emailAddress" type="text" placeholder="Enter your MemberID" class=" subject" required style="background:#fff">
					
				</div>
				<div class="s-12">
                    <label for="password" class="placeholder">Password<span style="color:red">*</span></label><br>
					<input id="password" name="loginPassword" placeholder="Enter your password" type="password" class="  subject" required style="background:#fff">
				</div>
                <?php if (isset($error)) { ?>
                <div class="s-12">
                    <label for="password" class="placeholder"><?php echo $error;?></label>
                </div>
                <?php } ?>
				<div class="s-12">
					<button type="submit" class="submit-form button border-radius text-white background-primary" name="submitBtn" value="Sign In">Sign In</button>
				</div>
                </form>
		 
<br><br><br><br><br><br>