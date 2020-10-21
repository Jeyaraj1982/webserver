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

if (isset($_POST['updateBtn'])) {
    
    $error =0;                                      
         
          if (!(strlen(trim($_POST['MemberName']))>3)) {
            $error++;
            $errorMsg = "Please enter member name.";
            $errorMember ="Please enter member name.";
        }
          
        $mobilenumber_mandatory  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('IsMobileIsMandatory')");    
        if ($mobilenumber_mandatory[0]['ParamValue']==1 || strlen(trim($_POST['MobileNumber']))>0)  {
            if (!($_POST['MobileNumber']>6000000000 && $_POST['MobileNumber']<9999999999)) {
                $error++;
                $errorMobile="Invalid mobile number. Please try again.";
            }
            
            $mobilenumber_allowduplicate  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('AllowDuplicateMobile')");    
            if ($mobilenumber_allowduplicate[0]['ParamValue']==0)  {
                $dupMobile = $mysql->select("select * from _tbl_Members where MemberID<>'".$_SESSION['User']['MemberID']."' and MobileNumber='".trim($_POST['MobileNumber'])."'");
                if (sizeof($dupMobile)>0) {
                    $error++;
                    $errorMsg = "Please enter valid mobile number.";
                    $errorMobile ="Mobile Number already used.";
                }
            }
        }
        
        $email_mandatory  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('IsEmailMandatory')");    
        if ($email_mandatory[0]['ParamValue']==1 || strlen(trim($_POST['MemberEmail']))>0)  {
            $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
            if (!(preg_match($regex, strtolower($_POST['MemberEmail'])))) {
                $error++;
                $errorEmail="Email is an invalid email. Please try again.";
            }
            
            $email_allowduplicate  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('AllowDuplicateEmail')");    
            if ($email_allowduplicate[0]['ParamValue']==0)  {
                $dupEmail = $mysql->select("select * from _tbl_Members where MemberID<>'".$_SESSION['User']['MemberID']."' and MemberEmail='".trim($_POST['MemberEmail'])."'");
                if (sizeof($dupEmail)>0) {
                    $error++;
                    $errorMsg = "Please enter valid mobile number.";
                    $errorEmail ="Email ID already used.";
                }
            }
        }
        

        $pancard_mandatory  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('IsPanCardIsMandatory')");    
        if ($pancard_mandatory[0]['ParamValue']==1 || strlen(trim($_POST['PanCard']))>0)  {
            if (!(strlen(trim($_POST['PanCard']))>5)) {
                $error++;
                $errorMsg = "Please enter valid Pancard Number.";
                $errorPanCard ="Please enter valid Pancard Number.";
            }
            
            $pancard_allowduplicate  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('AllowDuplicatePanCard')");    
            if ($pancard_allowduplicate[0]['ParamValue']==0) {
                $dupPancard = $mysql->select("select * from _tbl_Members where MemberID<>'".$_SESSION['User']['MemberID']."' and PanCard='".trim($_POST['PanCard'])."'");
                if (sizeof($dupPancard)>0) {
                    $error++;
                    $errorMsg = "Please enter valid Pancard Number.";
                    $errorPanCard ="Pancard already used.";
                }
            } 
        } 
        if ($error==0) {
            $mysql->execute("update _tbl_Members set PanCard        = '".$_POST['PanCard']."',
                                                     MemberEmail    = '".$_POST['MemberEmail']."',
                                                     MobileNumber   = '".$_POST['MobileNumber']."',
                                                     MemberName     = '".$_POST['MemberName']."',
                                                     Sex            = '".$_POST['Sex']."',
                                                     AdhaarCard     = '".$_POST['AdhaarCard']."',
                                                     AddressLine1   = '".$_POST['AddressLine1']."',
                                                     AddressLine2   = '".$_POST['AddressLine2']."',
                                                     DistrictName   = '".$_POST['DistrictName']."',
                                                     PinCode        = '".$_POST['PinCode']."' where MemberID='".$_SESSION['User']['MemberID']."'");
            ?>
            <script>
            $(document).ready(function() {
                swal("Profile Information updated successfully", {
                    icon : "success" 
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
                                        <input type="text" name="MemberName" value="<?php echo $data[0]['MemberName'];?>">
                                        <div class="help-block" style="color:red"><?php echo $errorMember;?></div>
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
                                        <select name="Sex">
                                            <option vlaue="Male" <?php echo ($data[0]['Sex']=="Male") ? " selected='selected' " : "";?> >Male</option>
                                            <option vlaue="Female" <?php echo ($data[0]['Sex']=="Female") ? " selected='selected' " : "";?> >Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Date of Birth</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <select class="" required="" name="date" id="date">
                                                <?php for($i=1;$i<=31;$i++) {?>
                                                <option value="<?php echo $i;?>" <?php echo ($i==date("d",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
                                                <?php } ?>
                                            </select>
                                            <select class="" required="" name="month" id="month" aria-invalid="true" data-validation-required-message="Please select birth month">
                                                <option value="1"  <?php echo ( 1==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>January</option>
                                                <option value="2"  <?php echo ( 2==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>February</option>
                                                <option value="3"  <?php echo ( 3==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>March</option>
                                                <option value="4"  <?php echo ( 4==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>April</option>
                                                <option value="5"  <?php echo ( 5==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>May</option>
                                                <option value="6"  <?php echo ( 6==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>June</option>
                                                <option value="7"  <?php echo ( 7==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>July</option>
                                                <option value="8"  <?php echo ( 8==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>August</option>
                                                <option value="9"  <?php echo ( 9==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>September</option>
                                                <option value="10" <?php echo (10==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>October</option>
                                                <option value="11" <?php echo (11==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>November</option>
                                                <option value="12" <?php echo (12==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>December</option>
                                            </select> 
                                            <select class="" required="" name="year" id="year" aria-invalid="true" data-validation-required-message="Please select birth year">
                                                <?php for($i=date("Y")-68;$i<=date("Y")-18;$i++) {?>
                                                <option value="<?php echo $i;?>" <?php echo ($i==date("Y",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
                                                <?php } ?>
                                            </select>
                                        
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Mobile No</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <input type="text" name="MobileNumber" value="<?php echo $data[0]['MobileNumber'];?>">
                                        <div class="help-block" style="color:red"><?php echo $errorMobile;?></div>
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Email ID</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <input type="text" name="MemberEmail" value="<?php echo $data[0]['MemberEmail'];?>">
                                        <div class="help-block" style="color:red"><?php echo $errorEmail;?></div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Address Line1</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                    <input type="text" name="AddressLine1" value="<?php echo $data[0]['AddressLine1'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Address Line2</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <input type="text" name="AddressLine2" value="<?php echo $data[0]['AddressLine2'];?>">
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
                                        <?php $districts = $mysql->select("select * from _tbl_master_districtnames order by DistrictName");?>
                                        <select name="DistrictName" >
                                            <?php foreach($districts as $d) { ?>
                                            <option value="<?php echo $d['DistrictName'];?>" <?php echo $d['DistrictName']==$data[0]['DistrictName'] ? " selected='selected' " : "";?>><?php echo $d['DistrictName'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Pincode</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <input type="text" name="PinCode" value="<?php echo $data[0]['PinCode'];?>">
                                        <div class="help-block" style="color:red"><?php echo $errorPinCode;?></div>
                                        
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">PanCard</label>
                                    <div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
                                        <input type="text" name="PanCard" value="<?php echo $data[0]['PanCard'];?>">
                                        <div class="help-block" style="color:red"><?php echo $errorPanCard;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Aadhaar Card</label>
                                    <div class="col-lg-4 col-md-8 col-sm-8  mt-sm-2 ">
                                        <input type="text" name="AdhaarCard" value="<?php echo $data[0]['AdhaarCard'];?>">
                                        <div class="help-block" style="color:red"><?php echo $errorAdhaarCard;?></div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        
                        
                </div>
            </div>
            <div class="row"> 
                            <div class="col-md-12 text-right">
                                 <input type="submit" value="Update Information" name="updateBtn" class="btn btn-primary waves-effect waves-light">
                                 <a href="dashboard.php?action=Settings/MyProfile"  class="btn btn-danger waves-effect waves-light">Cancel</a>
                            </div>
                             
                        </div>
                        <br><br>
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