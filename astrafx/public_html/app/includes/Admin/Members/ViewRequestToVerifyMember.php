<?php
  $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_GET['MCode']."'");
  $bank = $mysql->select("select * from `_tbl_bank_info` where  `MemberCode`='".$_GET['MCode']."'");
     
    if (isset($_POST['ApprovePIBtn'])) {
        $mysql->execute("update _tbl_Members set ProfileInfoSubmit = '2', PIApprovedOn='".date("Y-m-d H:i:s")."' where MemberCode='".$_GET['MCode']."'");    ?>
        <script>
                $(document).ready(function() {        
                    swal({
                        title: "Profile Information Approved Successfully",
                         icon: "success",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }).then((value) => {
                        location.href="dashboard.php?action=Members/ViewRequestToVerifyMember&MCode=<?php echo $_GET['MCode'];?>"
                    });
                });
        </script>
    <?php } 
    if (isset($_POST['RejectPIBtn'])) {
        $mysql->execute("update _tbl_Members set ProfileInfoSubmit = '3', PIRejectedOn='".date("Y-m-d H:i:s")."' where MemberCode='".$_GET['MCode']."'");    ?>
        <script>
                $(document).ready(function() {        
                    swal({
                        title: "Profile Information Rejected Successfully",
                         icon: "success",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }).then((value) => {
                        location.href="dashboard.php?action=Members/ViewRequestToVerifyMember&MCode=<?php echo $_GET['MCode'];?>"
                    });
                });
        </script>
    <?php } 
    if (isset($_POST['ApproveKycBtn'])) {
        $mysql->execute("update _tbl_Members set KycSubmit = '2', KycApprovedOn='".date("Y-m-d H:i:s")."' where MemberCode='".$_GET['MCode']."'");    ?>
        <script>
                $(document).ready(function() {        
                    swal({
                        title: "Kyc Information Approved Successfully",
                         icon: "success",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }).then((value) => {
                        location.href="dashboard.php?action=Members/ViewRequestToVerifyMember&MCode=<?php echo $_GET['MCode'];?>"
                    });
                });
        </script>
    <?php } 
        if (isset($_POST['RejectKycBtn'])) {
        $mysql->execute("update _tbl_Members set KycSubmit = '3', KycRejectedOn='".date("Y-m-d H:i:s")."' where MemberCode='".$_GET['MCode']."'");    ?>
        <script>
                $(document).ready(function() {        
                    swal({
                        title: "Kyc Information Rejected Successfully",
                         icon: "success",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }).then((value) => {
                        location.href="dashboard.php?action=Members/ViewRequestToVerifyMember&MCode=<?php echo $_GET['MCode'];?>"
                    });
                });
        </script>
    <?php } 
    if (isset($_POST['ApproveBankInfoBtn'])) {
        $mysql->execute("update _tbl_Members set BankInfoSubmit = '2', BankInfoApprovedOn='".date("Y-m-d H:i:s")."' where MemberCode='".$_GET['MCode']."'");    
        $mysql->execute("update _tbl_bank_info set IsSubmit = '2', ApprovedOn='".date("Y-m-d H:i:s")."' where MemberCode='".$_GET['MCode']."'");    ?>
        <script>
                $(document).ready(function() {        
                    swal({
                        title: "Bank Information Approved Successfully",
                         icon: "success",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }).then((value) => {
                        location.href="dashboard.php?action=Members/ViewRequestToVerifyMember&MCode=<?php echo $_GET['MCode'];?>"
                    });
                });
        </script>
    <?php } 
        if (isset($_POST['RejectBankInfoBtn'])) {
        $mysql->execute("update _tbl_Members set BankInfoSubmit = '3', BankInfoRejectedOn='".date("Y-m-d H:i:s")."' where MemberCode='".$_GET['MCode']."'");   
        $mysql->execute("update _tbl_bank_info set IsSubmit = '3', RejectedOn='".date("Y-m-d H:i:s")."' where MemberCode='".$_GET['MCode']."'"); ?>
        <script>
                $(document).ready(function() {        
                    swal({
                        title: "Bank Information Rejected Successfully",
                         icon: "success",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }).then((value) => {
                        location.href="dashboard.php?action=Members/ViewRequestToVerifyMember&MCode=<?php echo $_GET['MCode'];?>"
                    });
                });
        </script>
    <?php } ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/MyProfile">Settings</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/MyProfile">My Profile</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">My Profile Information</div>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">ID</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberCode'];?></small>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-md-6">
                                <div class="form-group form-show-validation row" style="text-align: right;">
                                   <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Package</label> 
                                  <img src="assets/img/<?php //echo $_SESSION['User']['PackageIcon'];?>" style="height:48px;">
                                    <?php echo $_SESSION['User']['CurrentPackageName'];?></small>
                                </div>
                            </div>-->
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Placement ID</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['PlacementID'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Placement</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['Placement'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Referral ID</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['ReferralID'];?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Member Name</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberName'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Joined</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['CreatedOn'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Gender</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['Sex'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Date of Birth</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['DateofBirth'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Mobile No</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MobileNumber'];?></small>
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Email ID</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberEmail'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Address Line1</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['AddressLine1'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Address Line2</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['AddressLine2'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                       <!-- <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Country</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['CountryName'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">State Name</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['StateName'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">District</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['DistrictName'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Pincode</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['PinCode'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>  -->
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">City</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['DistrictName'];?></small>
                                    </div>
                                </div>
                            </div>                                                                       
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Pincode</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['PinCode'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <!--<div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Aadhaar Card</label>
                                    <div class="col-lg-4 col-md-8 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['AdhaarCard'];?></small>
                                    </div>
                                </div>  
                            </div> -->
                        </div>
                        <?php if($data[0]['ProfileInfoSubmit']==1) {?>
                        <div class="row"> 
                            <div class="col-md-12 text-left">
                                <span style="background-color: orange;padding: 5px 10px;color: white;border-radius: 5px;">Submitted On&nbsp;&nbsp;<?php echo $data[0]['PISubmittedOn'];?> </span>
                            </div>
                        </div>  <br>
                        <div class="row"> 
                            <div class="col-md-12 text-left">
                                    <input type="submit" value="Approve" name="ApprovePIBtn" class="btn btn-success waves-effect waves-light">
                                    <input type="submit" value="Reject" name="RejectPIBtn" class="btn btn-danger waves-effect waves-light">
                            </div>
                        </div>
                         <?php } ?>
                         <?php if($data[0]['ProfileInfoSubmit']==2) {?>
                          <div class="row"> 
                            <div class="col-md-12 text-left">
                                <span style="background-color: green;padding: 5px 10px;color: white;border-radius: 5px;">Approved&nbsp;&nbsp;<?php echo $data[0]['PIApprovedOn'];?> </span>
                            </div>
                        </div> 
                        <?php } ?>
                        <?php if($data[0]['ProfileInfoSubmit']==3) {?>
                          <div class="row"> 
                            <div class="col-md-12 text-left">
                                <span style="background-color: red;padding: 5px 10px;color: white;border-radius: 5px;">Rejected&nbsp;&nbsp;<?php echo $data[0]['PIRejectedOn'];?> </span>
                            </div>
                        </div> 
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>                                                                              
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">KYC Information</div>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">PanCard Number</label>
                                <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                    <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['PanCard'];?></small>
                                </div>
                            </div>
                            </div>
                        </div> 
                        <div class="row">
                             <div class="col-md-6">
                                <div class="row">                                      
                                    <div class="col-md-12">     
                                        <img src="assets/uploads/<?php echo $data[0]['PanCardFile'];?>" style="height:200px;"><br>
                                    </div>
                                </div>
                            </div>
                           <!--<div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                    <label for="email" class="text-left">Profile Photo</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">     
                                        <?php  if (strlen($data[0]['Thumb'])>5) { ?>            
                                            <img src="assets/uploads/<?php echo $data[0]['Thumb'];?>" style="height:200px;"><br>
                                        <?php } else { ?>
                                            <input type="file" name="profile">
                                            <input type="submit" value="Update" name="PhotoBtn">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>-->
                        </div> 
                        <br>
                        <?php if($data[0]['KycSubmit']==1) {?>
                        <div class="row"> 
                            <div class="col-md-12 text-left">
                                <span style="background-color: orange;padding: 5px 10px;color: white;border-radius: 5px;">Submitted On&nbsp;&nbsp;<?php echo $data[0]['KycSubmittedOn'];?> </span>
                            </div>
                        </div>  <br>
                        <div class="row"> 
                            <div class="col-md-12 text-left">
                                    <input type="submit" value="Approve" name="ApproveKycBtn" class="btn btn-success waves-effect waves-light">
                                    <input type="submit" value="Reject" name="RejectKycBtn" class="btn btn-danger waves-effect waves-light">
                            </div>
                        </div>
                         <?php } ?>
                         <?php if($data[0]['KycSubmit']==2) {?>
                          <div class="row"> 
                            <div class="col-md-12 text-left">
                                <span style="background-color: green;padding: 5px 10px;color: white;border-radius: 5px;">Approved&nbsp;&nbsp;<?php echo $data[0]['KycApprovedOn'];?> </span>
                            </div>
                        </div> 
                        <?php } ?>
                        <?php if($data[0]['KycSubmit']==3) {?>
                          <div class="row"> 
                            <div class="col-md-12 text-left">
                                <span style="background-color: red;padding: 5px 10px;color: white;border-radius: 5px;">Rejected&nbsp;&nbsp;<?php echo $data[0]['KycRejectedOn'];?> </span>
                            </div>
                        </div> 
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
     </div>
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Bank Information</div>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Account Holder Name</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                       <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $bank[0]['AccountHolderName'];?></small>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Account Number</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $bank[0]['AccountNumber'];?></small>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">IFSCode</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $bank[0]['IFSCode'];?></small>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                    <label for="email" class="text-left">Scan Copy of Passbook / Cheque Slip</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">     
                                        <img src="assets/uploads/<?php echo $bank[0]['BankFile'];?>" style="height:200px;"><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($data[0]['BankInfoSubmit']==1) {?>
                        <div class="row"> 
                            <div class="col-md-12 text-left">
                                <span style="background-color: orange;padding: 5px 10px;color: white;border-radius: 5px;">Submitted On&nbsp;&nbsp;<?php echo $data[0]['BankInfoSubmittedOn'];?> </span>
                            </div>
                        </div>  <br>
                        <div class="row"> 
                            <div class="col-md-12 text-left">
                                    <input type="submit" value="Approve" name="ApproveBankInfoBtn" class="btn btn-success waves-effect waves-light">
                                    <input type="submit" value="Reject" name="RejectBankInfoBtn" class="btn btn-danger waves-effect waves-light">
                            </div>
                        </div>
                         <?php } ?>
                         <?php if($data[0]['BankInfoSubmit']==2) {?>
                          <div class="row"> 
                            <div class="col-md-12 text-left">
                                <span style="background-color: green;padding: 5px 10px;color: white;border-radius: 5px;">Approved&nbsp;&nbsp;<?php echo $data[0]['BankInfoApprovedOn'];?> </span>
                            </div>
                        </div> 
                        <?php } ?>
                        <?php if($data[0]['BankInfoSubmit']==3) {?>
                          <div class="row"> 
                            <div class="col-md-12 text-left">
                                <span style="background-color: red;padding: 5px 10px;color: white;border-radius: 5px;">Rejected&nbsp;&nbsp;<?php echo $data[0]['BankInfoRejectedOn'];?> </span>
                            </div>
                        </div> 
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
     </div>
</div> 
