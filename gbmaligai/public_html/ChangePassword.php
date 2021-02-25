<?php include_once("header.php");?>
<?php
        if (isset($_POST['btnsubmit'])) {
			$data = $mysql->select("select * from `_tbl_customer` where `CustomerID`='".$_SESSION['User']['CustomerID']."'");
			if($data[0]['Password']==$_POST['CurrentPassword']){
				$mysql->execute("update `_tbl_customer` set `Password`='".$_POST['confirmnewpassword']."' where `CustomerID`='".$_SESSION['User']['CustomerID']."'"); 
				unset($_POST);
				$successmessage ="<span style='color:green'>Password Changed Successfully<br></span>";?>
				<script>
					$(document).ready(function () {
						$('.breadcrumb').after('<div id="success"><div class="alert alert-success alert-dismissible">Password Changed Successfully<button type="button" class="close" data-dismiss="alert">&times;</button></div></div>');
					});
				</script>
			<?php }else { 
				$ErrCurrentPassword ="Incorrect Current Password ";
			}
		}
      ?> 
<div id="account-login" class="container">
	<ul class="breadcrumb">
		<li><a>Home</a></li>
		<li><a href="ChangePassword.php">Change Password</a></li>
	</ul>
    <div class="row">
        <div id="content" class="col-md-9 col-sm-8 col-xs-12">
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="well">
						<h2 class="heading">Change Password</h2>
						<form action="" method="post" enctype="multipart/form-data" onsubmit="return SubmitPassword();">
							<div class="form-group" style="margin-bottom:0px">
								<label class="control-label" for="input-password">Current Password<span class="required" style="color:red">*</span></label>
								<input type="password" id="CurrentPassword" name="CurrentPassword" value="<?php echo (isset($_POST['CurrentPassword']) ? $_POST['CurrentPassword'] :"");?>" class="form-control" />
								<span class="errorstring" id="ErrCurrentPassword"><?php echo isset($ErrCurrentPassword)? $ErrCurrentPassword : "";?></span><br>
							</div>
							<div class="form-group" style="margin-bottom:0px">
								<label class="control-label" for="input-password">Password<span class="required" style="color:red">*</span></label>
								<input type="password" id="Password" name="Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>" class="form-control" />
								<span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span><br>
							</div>
							<div class="form-group" style="margin-bottom:0px">
								<label class="control-label" for="input-password">Confirm NewPassword<span class="required" style="color:red">*</span></label>
								<input type="password" id="confirmnewpassword" name="confirmnewpassword" value="<?php echo (isset($_POST['confirmnewpassword']) ? $_POST['confirmnewpassword'] :"");?>" class="form-control" />
								<span class="errorstring" id="Errconfirmnewpassword"><?php echo isset($Errconfirmnewpassword)? $Errconfirmnewpassword : "";?></span><br>
							</div>	
							<div class="form-group">
								<span class="errorstring" style="text-align: center"><?php echo isset($successmessage)? $successmessage : "";?></span>
							</div>
							<input type="submit" value="Change Password" class="btn btn-primary"  name="btnsubmit" />
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
    $("#Password").blur(function () {
        IsNonEmpty("Password","ErrPassword","Please Enter New Password");
    });
    $("#CurrentPassword").blur(function () {
        IsNonEmpty("CurrentPassword","ErrCurrentPassword","Please Enter Current Password");
    });
    $("#confirmnewpassword").blur(function () {
        IsNonEmpty("confirmnewpassword","Errconfirmnewpassword","Please Enter Confirm New Password");
    });
});
function SubmitPassword() {
        ErrorCount=0;    
        $('#ErrPassword').html("");
        $('#Errconfirmnewpassword').html("");
        $('#ErrCurrentPassword').html("");
        
        IsNonEmpty("CurrentPassword","ErrCurrentPassword","Please Enter Current Password");
        IsNonEmpty("Password","ErrPassword","Please Enter New Password");
        IsNonEmpty("confirmnewpassword","Errconfirmnewpassword","Please Enter Confirm New Password"); 
        var password = document.getElementById("Password").value;
                var confirmPassword = document.getElementById("confirmnewpassword").value;
                if (password != confirmPassword) {
                    ErrorCount++;
                    $('#Errconfirmnewpassword').html("Passwords do not match.");
                }
                return (ErrorCount==0) ? true : false;
         }
</script>