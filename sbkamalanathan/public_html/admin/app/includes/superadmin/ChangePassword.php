<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>Change Password</h3>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div>


<div class="container-fluid">
<?php
    
    if (isset($_POST['CreateBtn'])) {
        
        $error=0;
        if (strlen(trim($_POST['CurrentPassword']))==0) {
            $CurrentPassword = "Please enter current password";
            $error++;
        } else {
             $data = $mysql->select("select * from _tbl_admin where AdminID='".$_SESSION['User']['AdminID']."'");
             if ($data[0]['LoginPassword']!=$_POST['CurrentPassword']) {
                  $CurrentPassword = "current password in correct";
                  $error++;
             }
        }
        
        if (strlen(trim($_POST['NewPassword']))==0) {
            $NewPassword = "Please enter new password";
            $error++;
        }
        
        if (strlen(trim($_POST['ConfirmNewPassword']))==0) {
            $ConfirmNewPassword = "Please enter confirm new password";
            $error++;
        }
        
        if (strlen(trim($_POST['ConfirmNewPassword']))!=0 && strlen(trim($_POST['NewPassword']))!=0) {
            if ($_POST['ConfirmNewPassword'] != $_POST['NewPassword']) {
                 $ConfirmNewPassword = "Password not matched new & confirm new password";
                 $error++;
            }
        }
        
        if ($error==0) {
            
            $mysql->execute("update _tbl_admin set LoginPassword='".$_POST['NewPassword']."' where  AdminID='".$_SESSION['User']['AdminID']."'");
            unset($_POST);
            ?>
                <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b>new password updated.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
              </div>
              </div>
            <?php
        }  else {
            ?>
               <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-danger outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                      <p style="white-space:normal !important;max-width:100%;"><b> Error found! </b>Couldn't able to update new password.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
              </div>
              </div>
            <?php
        }
    }
?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" id="create_changepassword" name="create_changepassword" onsubmit="return formvalidation('create_changepassword');">
                        <div class="row g-3  mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom01">Current Password</label>
                                <input class="form-control" id="CurrentPassword" name="CurrentPassword" type="password" placeholder="Current Password" value="<?php echo isset($_POST['CurrentPassword']) ? $_POST['CurrentPassword'] : "";?>">
                                <div id="ErrCurrentPassword" style="color:red"><?php echo isset($CurrentPassword) ? $CurrentPassword : "";?></div>
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom03">New Password</label>
                                <input class="form-control" name="NewPassword" id="NewPassword" type="password" placeholder="New Password"  value="<?php echo isset($_POST['NewPassword']) ? $_POST['NewPassword'] : "";?>">
                                 <div id="ErrNewPassword" style="color:red"><?php echo isset($NewPassword) ? $NewPassword : "";?></div>
                            </div>
                        </div>
                          <div class="row g-3  mb-5">
                            <div class="col-md-6">
                                <label class="form-label" for="validationCustom03">Confirm New Password</label>
                                <input class="form-control" name="ConfirmNewPassword" id="ConfirmNewPassword" type="password" placeholder="Confirm New Password"  value="<?php echo isset($_POST['ConfirmNewPassword']) ? $_POST['ConfirmNewPassword'] : "";?>">
                                 <div id="ErrConfirmNewPassword" style="color:red"><?php echo isset($ConfirmNewPassword) ? $ConfirmNewPassword : "";?></div>
                            </div>
                        </div>
                        <div class="row g-3  mb-3">
                            <div class="col-md-12">
                                <a href="dashboard.php" class="btn btn-outline-primary">Back</a>
                                <button class="btn btn-primary" type="submit" name="CreateBtn" id="CreateBtn">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
<!--<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Vertically centered</button>-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you want to update password.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button" onclick="formSubmit('CreateBtn');">Yes, Continue</button>
            </div>
        </div>
    </div>
</div>
<!-- Tooltips and popovers modal--> 