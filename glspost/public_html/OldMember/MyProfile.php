<?php include_once("header.php"); ?> 
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
                                <div>My Profile
                                </div>
                            </div>
                        </div>
                    </div>        
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                       <?php
                                       $myprofile = $mysql->select("Select * from _tbl_member where MemberID='".$_SESSION['User']['MemberID']."'");
                                       ?>
                                        <div class="card-body"> 
                                            <div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Member Name</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['MemberName'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Member ID</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['MemberCode'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Sur Name</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['MemberSurname'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Date of Birth</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['DateOfBirth'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Sex</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['Sex'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Education Details</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['EduDetails'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Mobile Number</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['MemberMobileNumber'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Email ID</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['EmailID'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Address Line 1</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['AddressLine1'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Address Line 2</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['AddressLine2'];?>">
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                   <div class="col-sm-3">City Name</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['City'];?>">
                                                    </div>
                                                </div>
                                                  <div class="form-group row">
                                                   <div class="col-sm-3">State Name</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['State'];?>">
                                                    </div>
                                                </div>
                                                  <div class="form-group row">
                                                   <div class="col-sm-3">Pin Code</div>
                                                    <div class="col-sm-9">
                                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['PinCode'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-12"><a class="mb-2 mr-2 btn btn-gradient-primary" href="EditMyProfile.php">Edit Profile</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 <?php include_once("footer.php");?>             