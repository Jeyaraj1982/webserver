<?php include_once("header.php");?>
<?php
if (isset($_POST['ChangePassword'])) {

$getpassword = $mysql->select("select * from _tbl_admin where AdminID='".$_SESSION['User']['AdminID']."'");
             if ($getpassword[0]['AdminPassword']!=$_POST['CurrentPassword']) {
                 $ErrCurrentPassword="Incorrect Current password"; 
             } 
             if ($getpassword[0]['AdminPassword']==$_POST['CurrentPassword']) {
                 $mysql->execute("update _tbl_admin set AdminPassword='".$_POST['ConfirmNewPassword']."' where AdminID= '".$_SESSION['User']['AdminID']."'");
                $successMessage = "Password changed  successfully";
                unset($_POST);
        } else {
            $errorMessage =  "Some error occured, couldn't be change password";
        }
        
}

?> 
<script>
     function submitPassword() {
         
                $('#ErrCurrentPassword').html("");
                $('#ErrNewPassword').html("");
                $('#ErrConfirmNewPassword').html("");
                
                ErrorCount = 0;
                
                IsNonEmpty("CurrentPassword", "ErrCurrentPassword", "Please Enter Current Password");
                IsNonEmpty("NewPassword", "ErrNewPassword", "Please Enter New Password");
                IsNonEmpty("ConfirmNewPassword", "ErrConfirmNewPassword", "Please Enter Confirm New Password");
                
                 var password = document.getElementById("NewPassword").value;
                 var confirmPassword = document.getElementById("ConfirmNewPassword").value;
                  if (password != confirmPassword) {
                  ErrorCount++;
                  $('#ErrConfirmNewPassword').html("Passwords do not match.");
                  }

                  return (ErrorCount==0) ? true : false;
    }

</script>
       <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                    </i>
                                </div>
                                <div>Change Password
                                </div>
                            </div>
                        </div>
                    </div>        
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Change Password</h5>
                                        <form method="post" action="" onsubmit="return submitPassword();">
                                            <div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Current Password</div>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="CurrentPassword" id="CurrentPassword" placeholder="Current Password" class="form-control" value="<?php echo (isset($_POST['CurrentPassword']) ? $_POST['CurrentPassword'] : "");?>">
                                                        <span class="errorstring" id="ErrCurrentPassword"><?php echo isset($ErrCurrentPassword)? $ErrCurrentPassword : "";?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">New Password</div>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="NewPassword" id="NewPassword" placeholder="New Password" class="form-control" value="<?php echo (isset($_POST['NewPassword']) ? $_POST['NewPassword'] : "");?>">
                                                        <span class="errorstring" id="ErrNewPassword"><?php echo isset($ErrNewPassword)? $ErrNewPassword : "";?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Confirm New Password</div>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="ConfirmNewPassword" id="ConfirmNewPassword" placeholder="Confirm New Password" class="form-control" value="<?php echo (isset($_POST['ConfirmNewPassword']) ? $_POST['ConfirmNewPassword'] : "");?>">
                                                        <span class="errorstring" id="ErrConfirmNewPassword"><?php echo isset($ErrConfirmNewPassword)? $ErrConfirmNewPassword : "";?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-12" style="text-align:center;color:green"><?php echo $successMessage ;?></div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-12"><button class="mb-2 mr-2 btn btn-gradient-primary" name="ChangePassword">Change Password</button></div>
                                                </div>
                                            </div>
                                         </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 <?php include_once("footer.php");?>             