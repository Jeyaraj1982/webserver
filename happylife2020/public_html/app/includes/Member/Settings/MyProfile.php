<?php
if (isset($_POST['PancardBtn'])) {
    $target_path = "assets/uploads/";
    $filename = strtolower(time()."_".$_FILES['Pancard']['name']);
    
    if(move_uploaded_file($_FILES['Pancard']['tmp_name'], $target_path.$filename)) {  
        $mysql->execute("update `_tbl_Members` set `PanCardFile`='".$filename."' where `MemberCode`='".$_SESSION['User']['MemberCode']."'");
        ?>
          <script>
              $(document).ready(function() {
            
                    swal("Pancard Image updated successfully", {
                        icon : "success" 
                    });
                 });
            </script>
        <?php
    } else{  
       // echo "Sorry, file not uploaded, please try again!";  
       ?>
         <script>
              $(document).ready(function() {
            
                    swal("Pancard Image upload failed", {
                        icon : "error" 
                    });
                 });
            </script>
       <?php
    }  
}

if (isset($_POST['PhotoBtn'])) {
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
}
    $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_SESSION['User']['MemberCode']."'");
?>
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
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Member Code</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberCode'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row" style="text-align: right;">
                                   <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Package</label> 
                                    <img src="assets/img/<?php echo $_SESSION['User']['PackageIcon'];?>" style="height:48px;">
                                    <?php echo $_SESSION['User']['CurrentPackageName'];?>
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
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo  date("M d, Y",strtotime($data[0]['DateofBirth']));?></small>
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
                        <div class="row"> 
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
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">PanCard</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['PanCard'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Aadhaar Card</label>
                                    <div class="col-lg-4 col-md-8 col-sm-8  mt-sm-2 ">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['AdhaarCard'];?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div style="text-align: right;">
                            <a href="dashboard.php?action=Settings/EditProfile">Edit Profile</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Additional Information</div>
                </div>
                <div class="card-body">
                    
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Pan Card</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if (strlen(trim($data[0]['PanCardFile'])>5)) { ?>
                                            <img src="assets/uploads/<?php echo $data[0]['PanCardFile'];?>" style="height:200px;"><br>
                                            Verified : <?php echo $data[0]['KYCVerified']==1 ? " verified on ".$data[0]['KYCVerifiedOn'] : " verification pending"; ?>
                                        <?php } else { ?>
                                            <input type="file" name="Pancard">
                                            <input type="submit" value="Update" name="PancardBtn">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Profile Photo</label>
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
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     </div>
</div> 