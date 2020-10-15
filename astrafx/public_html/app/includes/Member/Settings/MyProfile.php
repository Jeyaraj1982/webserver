<?php
$data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_SESSION['User']['MemberCode']."'");
    $bank = $mysql->select("select * from `_tbl_bank_info` where  `MemberCode`='".$_SESSION['User']['MemberCode']."'");
    /*if (isset($_POST['PhotoBtn'])) {
    $target_path = "assets/uploads/";
    $filename = strtolower(time()."_".$_FILES['profile']['name']);
    if(move_uploaded_file($_FILES['profile']['tmp_name'], $target_path.$filename)) {  
        $mysql->execute("update `_tbl_Members` set `Thumb`='".$filename."' where `MemberCode`='".$_SESSION['User']['MemberCode']."'");
        ?>
         <script>
              $(document).ready(function() {
            
                    swal("Profile Image updated successfully", {
                        icon : "success" 
                    });
                 });
            </script>
        <?php
    } else{  
      //  echo "Sorry, file not uploaded, please try again!";  
      ?>
       <script>
              $(document).ready(function() {
            
                    swal("Profile Image upload failed", {
                        icon : "error" 
                    });
                 });
            </script>
      <?php
    }  
}   */
    if (isset($_POST['PancardBtn'])) {
        $target_path = "assets/uploads/";
        $filename = strtolower(time()."_".$_FILES['Pancard']['name']);
        
        if(move_uploaded_file($_FILES['Pancard']['tmp_name'], $target_path.$filename)) {  
            $mysql->execute("update `_tbl_Members` set `PanCardFile`='".$filename."' where `MemberCode`='".$_SESSION['User']['MemberCode']."'");  ?>
            <script>
              $(document).ready(function() {        
                 swal({
                      title: "Pancard Image Updated Successfully",
                      icon: "success",
                      closeOnConfirm: false,
                      showLoaderOnConfirm: true
                    }).then((value) => {
                    location.href="dashboard.php?action=Settings/MyProfile"
                    });
              });
            </script>
            <?php  }  else{ ?>
             <script>
                  $(document).ready(function() {
                        swal("Pancard Image upload failed", {
                            icon : "error" 
                        });
                     });
                </script>
           <?php  }                                                                                                           
    }
    
    if (isset($_POST['BankFileBtn'])) {
        $target_path = "assets/uploads/";
        $filename = strtolower(time()."_".$_FILES['BankFile']['name']);
        
        if(move_uploaded_file($_FILES['BankFile']['tmp_name'], $target_path.$filename)) {  
            $data = $mysql->select("select * from `_tbl_bank_info` where  `MemberCode`='".$_SESSION['User']['MemberCode']."'");
            if(sizeof($data)!=0){
                   $mysql->execute("update `_tbl_bank_info` set BankFile ='".$filename."' where MemberCode='".$_SESSION['User']['MemberCode']."'"); 
            }else {
                $mysql->insert("_tbl_bank_info",array("BankFile"      => $filename,
                                                      "MemberCode"    =>  $_SESSION['User']['MemberCode']));
            }
            ?>
              <script>
                  $(document).ready(function() {        
                         swal({
                              title: "Bank File Updated Successfully",
                              icon: "success",
                              closeOnConfirm: false,
                              showLoaderOnConfirm: true
                            }).then((value) => {
                            location.href="dashboard.php?action=Settings/MyProfile"
                            });
                });
                </script>
            <?php  } else{   ?>
             <script>
                  $(document).ready(function() {
                        swal("Bank File Image upload failed", {
                            icon : "error" 
                        });
                     });
                </script>
           <?php }  
    }

    if(isset($_POST['SubmitKycDetailsBtn'])) {
        $error=0;
       if ($_POST['PanCardNumber']=="") {
            $error++;
            $errormsg = "Please Enter Pancard Number";  
        }
        if ($error==0) {
           $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_SESSION['User']['MemberCode']."'");   
           if(sizeof($data)!=0){
                $mysql->execute("update `_tbl_Members` set `PanCard`='".$_POST['PanCardNumber']."' where `MemberCode`='".$_SESSION['User']['MemberCode']."'"); 
           }else{
                $mysql->insert("_tbl_bank_info",array("PanCard" => $_POST['PanCardNumber'],
                                                      "MemberCode"        =>  $_SESSION['User']['MemberCode']));     
           }  ?>
           <script>
                   $(document).ready(function() {        
                         swal({
                              title: "Kyc Information Updated Successfully",
                              icon: "success",
                              closeOnConfirm: false,
                              showLoaderOnConfirm: true
                            }).then((value) => {
                            location.href="dashboard.php?action=Settings/MyProfile"
                            });
                   });
           </script>
           <?php   }  else {   ?>
           <script>
                  $(document).ready(function() {
                        swal("<?php echo $errormsg;?>", {
                            icon : "error" 
                        });
                     });
           </script>
           <?php   }   
    }
    if(isset($_POST['SubmitBankDetailsBtn'])) {
        $error=0;
       if ($_POST['AccountHolderName']=="") {
            $error++;
            $errormsg = "Please Enter Account Holder Name";  
        }
        if ($_POST['AccountNumber']=="") {
            $error++;
            $errormsg = "Please Enter Account Number";  
        } 
        if ($_POST['IFSCode']=="") {
            $error++;
            $errormsg = "Please Enter IFSCode";  
        }
        if ($error==0) {
           $data = $mysql->select("select * from `_tbl_bank_info` where  `MemberCode`='".$_SESSION['User']['MemberCode']."'");   
           if(sizeof($data)!=0){
                $mysql->execute("update `_tbl_bank_info` set `AccountHolderName`='".$_POST['AccountHolderName']."',
                                                             `AccountNumber`='".$_POST['AccountNumber']."',
                                                             `IFSCode`='".$_POST['IFSCode']."'
                                                             where `MemberCode`='".$_SESSION['User']['MemberCode']."'"); 
           }else{
                $mysql->insert("_tbl_bank_info",array("AccountHolderName" => $_POST['AccountHolderName'],
                                                      "AccountNumber"     => $_POST['AccountNumber'],
                                                      "IFSCode"           => $_POST['IFSCode'],
                                                      "MemberCode"        =>  $_SESSION['User']['MemberCode']));     
           }  ?>
           <script>
                   $(document).ready(function() {        
                         swal({
                              title: "Bank Information Updated Successfully",
                              icon: "success",
                              closeOnConfirm: false,
                              showLoaderOnConfirm: true
                            }).then((value) => {
                            location.href="dashboard.php?action=Settings/MyProfile"
                            });
                   });
           </script>
           <?php   }  else {   ?>
           <script>
                  $(document).ready(function() {
                        swal("<?php echo $errormsg;?>", {
                            icon : "error" 
                        });
                     });
           </script>
           <?php   }   
    }

    if (isset($_POST['updateBtn'])) {
        $mysql->execute("update _tbl_Members set ProfileInfoSubmit = '1', PISubmittedOn='".date("Y-m-d H:i:s")."' where MemberID='".$_SESSION['User']['MemberID']."'");    ?>
        <script>
                $(document).ready(function() {        
                    swal({
                        title: "Profile Information Submitted successfully",
                         icon: "success",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }).then((value) => {
                        location.href="dashboard.php?action=Settings/MyProfile"
                    });
                });
        </script>
    <?php }
    if (isset($_POST['SubmitBankBtn'])) {
        if($bank[0]['AccountHolderName'] =="" || $bank[0]['AccountNumber']=="" || $bank[0]['IFSCode']=="" || $bank[0]['BankFile']=="") {   ?>
            <script>
                    $(document).ready(function() {        
                        swal({
                            title: "Please Update Bank Details",
                            icon : "warning",
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true
                        }).then((value) => {
                            location.href="dashboard.php?action=Settings/MyProfile"
                        });
                    });
            </script>
        <?php } else{
                $mysql->execute("update _tbl_bank_info set IsSubmit = '1', SubmittedOn='".date("Y-m-d H:i:s")."' where MemberCode='".$_SESSION['User']['MemberCode']."'");  
                $mysql->execute("update _tbl_Members set BankInfoSubmit = '1', BankInfoSubmittedOn='".date("Y-m-d H:i:s")."' where MemberCode='".$_SESSION['User']['MemberCode']."'");    ?>
                <script>
                    $(document).ready(function() {        
                             swal({
                                  title: "Bank Information Submitted successfully",
                                  icon: "success",
                                  closeOnConfirm: false,
                                  showLoaderOnConfirm: true
                                }).then((value) => {
                                location.href="dashboard.php?action=Settings/MyProfile"
                                });
                    });
                </script>
        <?php }   }
        if (isset($_POST['updateKycBtn'])) {
            $mysql->execute("update _tbl_Members set KycSubmit = '1', KycSubmittedOn='".date("Y-m-d H:i:s")."' where MemberID='".$_SESSION['User']['MemberID']."'");    ?>
            <script>
                $(document).ready(function() {        
                    swal({
                        title: "Kyc Information Submitted successfully",
                        type: "success",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }).then((value) => {
                        location.href="dashboard.php?action=Settings/MyProfile"
                    });
                });
            </script>
        <?php }   ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/MyProfile">My Account</a></li>
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
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Member ID</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberCode'];?></small>
                                    </div>
                                </div>
                            </div>
                           <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                   <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Package</label> 
                                   <!--<img src="assets/img/<?php //echo $_SESSION['User']['PackageIcon'];?>" style="height:48px;">-->
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $_SESSION['User']['CurrentPackageName'];?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Sponsor ID</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['SponsorCode'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Upline ID</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['UplineCode'];?></small>
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
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo date("M d, Y",strtotime($data[0]['CreatedOn']));?></small>
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
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo date("M d, Y",strtotime($data[0]['DateofBirth']));?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Mobile No</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;+91-<?php echo $data[0]['MobileNumber'];?></small>
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
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">City Name</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['CityName'];?></small>
                                    </div>
                                </div>
                            </div>                                                                       
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Pin/Zip Code</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['PinCode'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Password</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberPassword'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Txn Password</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberTxnPassword'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-12 text-left">
                                <?php if($data[0]['ProfileInfoSubmit']==1) {?>
                                    <span style="background-color: orange;padding: 5px 10px;color: white;border-radius: 5px;"> Submitted &nbsp;&nbsp;<?php echo $data[0]['PISubmittedOn'];?></span><br>
                                <?php }  if($data[0]['ProfileInfoSubmit']==3) {?>
                                    <span style="background-color: red;padding: 5px 10px;color: white;border-radius: 5px;"> Rejected &nbsp;&nbsp;<?php echo $data[0]['PIRejectedOn'];?></span><br>
                                <?php } ?>
                                <?php if($data[0]['ProfileInfoSubmit']==0 || $data[0]['ProfileInfoSubmit']==3){ ?>
                                    <br><input type="submit" value="Submit Review" name="updateBtn" class="btn btn-primary waves-effect waves-light">&nbsp;&nbsp;
                                    <a href="dashboard.php?action=Settings/EditProfile">Edit Profile</a>   
                                <?php  } ?> 
                            </div>
                        </div>
                        <?php if($data[0]['ProfileInfoSubmit']==2) {?>
                        <div class="row"> 
                            <div class="col-md-12 text-left">
                                <span style="background-color: green;padding: 5px 10px;color: white;border-radius: 5px;">Approved&nbsp;&nbsp;<?php echo $data[0]['PIApprovedOn'];?> </span>
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
                                <label for="email" class="col-md-5 text-right">PanCard Number</label>
                                <div class="col-md-7">
                                    <?php if($data[0]['KycSubmit'] ==0 || $data[0]['KycSubmit'] ==3 ) {   ?>
                                        <input type="text" class="form-control input-full" name="PanCardNumber" value="<?php echo $data[0]['PanCard'];?>" Placceholder="PanCard">
                                        <div class="help-block" style="color:red"><?php echo $errorPanCardNumber;?></div>
                                    <?php } else { ?>
                                    <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['PanCard'];?></small>
                                    <?php } ?> 
                                </div>
                            </div>
                            </div>
                        </div> 
                        <?php if($data[0]['KycSubmit']==0 || $data[0]['KycSubmit']==1 || $data[0]['KycSubmit']==3) {?>
                        <div class="row">
                             <div class="col-md-6">
                               <div class="row">
                                    <div class="col-md-12">     
                                        <?php if (strlen(trim($data[0]['PanCardFile'])>5)) { ?>
                                        <img src="assets/uploads/<?php echo $data[0]['PanCardFile'];?>" style="height:200px;"><br>
                                        <?php }  ?>
                                        <?php if($data[0]['KycSubmit']==0  || $data[0]['KycSubmit'] ==3){ ?>
                                            <input type="file" name="Pancard">
                                            <input type="submit" value="Update" name="PancardBtn">
                                        <?php } ?>
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
                        <?php } ?> <br>
                        <div class="row"> 
                            <div class="col-md-12 text-left">
                                <?php if($data[0]['KycSubmit']==1) {?>
                                    <span style="background-color: orange;padding: 5px 10px;color: white;border-radius: 5px;"> Submitted &nbsp;&nbsp;<?php echo $data[0]['KycSubmittedOn'];?></span><br>
                                <?php }  if($data[0]['KycSubmit']==2) {?>
                                    <span style="background-color: green;padding: 5px 10px;color: white;border-radius: 5px;"> Approved &nbsp;&nbsp;<?php echo $data[0]['KycApprovedOn'];?></span>
                                <?php } ?>
                                <?php   if($data[0]['KycSubmit']==3) {?>
                                    <span style="background-color: red;padding: 5px 10px;color: white;border-radius: 5px;"> Rejected &nbsp;&nbsp;<?php echo $data[0]['KycRejectedOn'];?></span>
                                <?php } ?>
                                
                                <?php if($data[0]['PanCardFile'] =="" || $data[0]['PanCard']=="") {   ?>
                                    <br><input type="submit" value="Save" name="SubmitKycDetailsBtn" class="btn btn-primary waves-effect waves-light">
                                <?php } else { ?>
                                    <?php if($data[0]['KycSubmit']==0 || $data[0]['KycSubmit']==3){ ?>
                                        <br><br><input type="submit" value="Save" name="SubmitKycDetailsBtn" class="btn btn-primary waves-effect waves-light">
                                        <input type="submit" value="Submit Review" name="updateKycBtn" class="btn btn-primary waves-effect waves-light">
                                        <?php } ?>
                                    <?php }?>
                            </div>
                        </div>
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
                                    <label for="email" class="col-md-5 text-right">Account Name</label>
                                    <div class="col-md-7">
                                        <?php if($bank[0]['IsSubmit'] ==0  || $bank[0]['IsSubmit'] ==3 ) {   ?>
                                            <input type="text" class="form-control input-full" name="AccountHolderName" value="<?php echo $bank[0]['AccountHolderName'];?>" Placceholder="Account Holder Name">
                                            <div class="help-block" style="color:red"><?php echo $errorAccountHolderName;?></div>
                                        <?php } else { ?>
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $bank[0]['AccountHolderName'];?></small>
                                        <?php } ?> 
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-md-5 text-right">Account Number</label>
                                    <div class="col-md-7 ">
                                        <?php if($bank[0]['IsSubmit'] ==0 || $bank[0]['IsSubmit'] ==3 ) {   ?>
                                            <input type="text" class="form-control input-full" name="AccountNumber" value="<?php echo $bank[0]['AccountNumber'];?>" Placceholder="Account Number">
                                            <div class="help-block" style="color:red"><?php echo $errorAccountHolderName;?></div>
                                        <?php } else { ?>
                                            <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $bank[0]['AccountNumber'];?></small>
                                        <?php } ?> 
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-md-5 text-right">IFSCode</label>
                                    <div class="col-md-7">
                                        <?php if($bank[0]['IsSubmit'] ==0 || $bank[0]['IsSubmit'] ==3 ) {   ?>
                                            <input type="text" class="form-control input-full" name="IFSCode" value="<?php echo $bank[0]['IFSCode'];?>" Placceholder="IFS Code">
                                            <div class="help-block" style="color:red"><?php echo $errorAccountHolderName;?></div>
                                        <?php } else { ?>
                                            <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $bank[0]['IFSCode'];?></small>
                                        <?php } ?> 
                                    </div>
                                </div>
                            </div>     
                            <?php if($data[0]['BankInfoSubmit']==0 || $data[0]['BankInfoSubmit']==1 || $data[0]['BankInfoSubmit']==3) {?>                                      
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                    <label for="email" class="text-left">Scan Copy of Passbook / Cheque Slip</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">     
                                        <?php if (strlen(trim($bank[0]['BankFile'])>5)) { ?>
                                        <img src="assets/uploads/<?php echo $bank[0]['BankFile'];?>" style="height:200px;"><br>
                                        <?php } ?>
                                        <?php if($bank[0]['IsSubmit']==0  || $bank[0]['IsSubmit'] ==3 ){ ?>
                                            <input type="file" name="BankFile">
                                            <input type="submit" value="Update" name="BankFileBtn">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>  
                            <?php } ?>                                                       
                        </div>
                       
                        <div class="row"> 
                            <div class="col-md-12 text-left">
                                <?php if($bank[0]['IsSubmit']==1) {?>
                                    <span style="background-color: orange;padding: 5px 10px;color: white;border-radius: 5px;"> Submitted &nbsp;&nbsp;<?php echo $bank[0]['SubmittedOn'];?></span><br>
                                <?php }  if($bank[0]['IsSubmit']==2) {?>
                                    <span style="background-color: green;padding: 5px 10px;color: white;border-radius: 5px;"> Approved &nbsp;&nbsp;<?php echo $bank[0]['ApprovedOn'];?></span>
                                <?php } if($bank[0]['IsSubmit']==3) {?>
                                    <span style="background-color: red;padding: 5px 10px;color: white;border-radius: 5px;"> Rejected &nbsp;&nbsp;<?php echo $bank[0]['RejectedOn'];?></span>
                                <?php } ?>
                                
                                <?php if($bank[0]['AccountHolderName'] =="" || $bank[0]['AccountNumber']=="" || $bank[0]['IFSCode']=="" || $bank[0]['BankFile']=="") {   ?>
                                    <br><input type="submit" value="Save" name="SubmitBankDetailsBtn" class="btn btn-primary waves-effect waves-light">
                                <?php } else { ?>
                                    <?php if($bank[0]['IsSubmit']==0 || $bank[0]['IsSubmit']==3){ ?>
                                        <br><br><input type="submit" value="Save" name="SubmitBankDetailsBtn" class="btn btn-primary waves-effect waves-light">
                                        <input type="submit" value="Submit Review" name="SubmitBankBtn" class="btn btn-primary waves-effect waves-light">
                                        <?php } ?>
                                    <?php }?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     </div>
</div> 
