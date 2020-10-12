<?php
        $data = $mysql->select("select * from _tbl_business_supporting_center where SupportingCenterAdminID='".$_SESSION['User']['SupportingCenterAdminID']."'");
    ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Settings/MyProfile">Settings</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Settings/MyProfile">My Profile Information</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>My Profile Information</h4>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group user-test" id="user-exists">
                                    <label>Admin Name</label>
                                    <div style="color:#999"><?php echo $data[0]['SupportingCenterAdminName'];?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <div style="color:#999">+91-<?php echo $data[0]['MobileNumber'];?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="email-exists">
                                    <label>Email</label>
                                    <div style="color:#999"><?php echo $data[0]['AdminEmail'];?></div>
                                </div>
                            </div>                                
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div style="color:#999"><?php echo $data[0]['Gender'];?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pancard</label>
                                    <div style="color:#999"><?php echo $data[0]['PanCard'];?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Aadhaar Card</label>
                                    <div style="color:#999"><?php echo $data[0]['AdhaarCard'];?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address Line 1</label>
                                    <div style="color:#999"><?php echo $data[0]['Address1'];?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address Line 2</label>
                                    <div style="color:#999"><?php echo $data[0]['Address2'];?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pincode</label>
                                    <div style="color:#999"><?php echo $data[0]['PostalCode'];?></div>
                                </div>
                            </div>
                        </div>
                </div>
                  
            </div>
        </div>
    </div>
  </div>
</div>