<?php 
    include_once("config.php");
    
    if (isset($_POST['submitBtn'])) {
        $data = $mysql->select("select * from `_tbl_business_supporting_center` where `AdminEmail`='".$_POST['emailAddress']."'");
        if (sizeof($data)>0) {
            
            if ($data[0]['AdminPassword'] == $_POST['loginPassword']) {
                
                $data[0]['Role']="BSCenter";
                $_SESSION['User']=$data[0];
                $id=$mysql->insert("_tbl_supporting_center_login_logs",array("AdminID"      => $data[0]['SupportingCenterAdminID'],
                                                                             "LoginOn"      => date("Y-m-d H:i:s"),
                                                                             "username"     => $_POST['emailAddress'],
                                                                             "userpassword" => $_POST['loginPassword'],
                                                                             "IsSuccess"    => "1")); 
                echo "<script>location.href='app/dashboard.php';</script>";
                exit;
                
            } else {
                
                $error = "<span style='color:red'>Username password incorrect</span>";
                $id=$mysql->insert("_tbl_supporting_center_login_logs",array("AdminID"      => $data[0]['SupportingCenterAdminID'],
                                                                             "LoginOn"      => date("Y-m-d H:i:s"),
                                                                             "username"     => $_POST['emailAddress'],
                                                                             "userpassword" => $_POST['loginPassword'],
                                                                             "IsSuccess"    => "0")); 
            } 
            
        } else {
            $error = "<span style='color:red'>login failed</span>";
            $mysql->insert("_tbl_supporting_center_login_logs",array("AdminID"      => "0",
                                                                     "LoginOn"      => date("Y-m-d H:i:s"),
                                                                     "username"     => $_POST['emailAddress'],
                                                                     "userpassword" => $_POST['loginPassword'],
                                                                     "IsSuccess"    => "0")); 
        }   
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../app/assets/img/icon.ico" type="image/x-icon"/>
	<script src="app/assets/js/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['app/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<link rel="stylesheet" href="app/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="app/assets/css/atlantis.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
        <div style="text-align: center;">
            <img src="https://wintogether2.com/assets/images/wintogether.png" style="margin: 0px auto;">
        </div>
           <br>
			<h3 class="text-center">Business Supporting Center</h3>
            <form action="" method="post">
			<div class="login-form">
				<div class="form-group form-floating-label">
					<input id="username" name="emailAddress" value="<?php echo isset($_POST['emailAddress']) ? $_POST['emailAddress'] : "";?>" type="text" class="form-control input-border-bottom" required>
					<label for="username" class="placeholder">Username</label>
				</div>
				<div class="form-group form-floating-label">  
					<input id="password" name="loginPassword" value="<?php echo isset($_POST['loginPassword']) ? $_POST['loginPassword'] : "";?>" type="password" class="form-control input-border-bottom" required>
					<label for="password" class="placeholder">Password</label>
					<div class="show-password">
						<i class="icon-eye"></i>
					</div>
				</div>
                
                <?php echo $error;?>
				<div class="form-action mb-3">
					<button type="submit" class="btn btn-primary btn-rounded btn-login" name="submitBtn" value="Sign In">Sign In</button>
				</div>
                </form>
			</div>
		</div>
 
	<script src="app/assets/js/jquery.3.2.1.min.js"></script>
	<script src="app/assets/js/jquery-ui.min.js"></script>
	<script src="app/assets/js/popper.min.js"></script>
	<script src="app/assets/js/bootstrap.min.js"></script>
	<script src="app/assets/js/atlantis.min.js"></script>
</body>
</html>