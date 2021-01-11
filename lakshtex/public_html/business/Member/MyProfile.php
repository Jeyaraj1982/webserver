<?php
    $myprofile = $mysql->select("Select * from _tbl_member where MemberID='".$_SESSION['User']['MemberID']."'");
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        My Profile
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                    <div class="col-sm-4">
                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['DateOfBirth'];?>">
                                    </div>
                                    <div class="col-sm-1">Sex</div>
                                    <div class="col-sm-4">
                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['Sex'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Mobile Number</div>
                                    <div class="col-sm-9">
                                        <div class="input-icon">
                                            <span class="input-icon-addon">
                                                +91
                                            </span>
                                            <input type="text" disabled='disabled' style="padding-left: 45px;background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['MemberMobileNumber'];?>">
                                        </div>
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
                                    <div class="col-sm-3">Pin Code</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['PinCode'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                   <div class="col-sm-12"><a class="btn btn-primary" href="Dashboard.php?action=EditMyProfile">Edit Profile</a></div>
                                </div>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
 