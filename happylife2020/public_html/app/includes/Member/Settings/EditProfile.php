<?php
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
        

    /*    $pancard_mandatory  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('IsPanCardIsMandatory')");    
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
                    $errorMsg = "Please enter valid Pancard Number.".$_POST['DateofBirth'];
                    $errorPanCard ="Pancard already used.";
                }
            } 
        }   */
        if ($error==0) {
            $mysql->execute("update _tbl_Members set MemberEmail    = '".$_POST['MemberEmail']."',
                                                     MobileNumber   = '".$_POST['MobileNumber']."',
                                                     MemberName     = '".$_POST['MemberName']."',
                                                     Sex            = '".$_POST['Sex']."',
                                                     AddressLine1   = '".$_POST['AddressLine1']."',
                                                     AddressLine2   = '".$_POST['AddressLine2']."',
                                                     DateofBirth   =  '".$_POST['DateofBirth']."',
                                                     CityName   =  '".$_POST['City']."',
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
                                    <label for="email" class="col-md-5 text-right">Member ID</label>
                                    <div class="col-md-7 ">
                                        <small id="emailHelp" class="form-text text-muted">&nbsp;<?php echo $data[0]['MemberCode'];?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-md-5 text-right">Package</label>
                                    <div class="col-md-7 ">
                                        <small id="emailHelp" class="form-text text-muted">&nbsp;<!-- <img src="assets/img/<?php echo $_SESSION['User']['PackageIcon'];?>" style="height:48px;"> -->
                                    <?php echo $_SESSION['User']['CurrentPackageName'];?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-md-5 text-right">Member Name</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control input-full" name="MemberName" value="<?php echo $data[0]['MemberName'];?>">
                                        <div class="help-block" style="color:red"><?php echo $errorMember;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-md-5 text-right">Joined</label>
                                    <div class="col-md-7 ">                                       
                                        <small id="emailHelp" class="form-text text-muted">&nbsp;<?php echo date("M d, Y",strtotime($data[0]['CreatedOn']));?></small>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-md-5 text-right">Gender</label>
                                    <div class="col-md-7">
                                        <select name="Sex" class="form-control input-full">
                                            <option vlaue="Male" <?php echo ($data[0]['Sex']=="Male") ? " selected='selected' " : "";?> >Male</option>
                                            <option vlaue="Female" <?php echo ($data[0]['Sex']=="Female") ? " selected='selected' " : "";?> >Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-md-5 text-right">Date of Birth</label>
                                    <div class="col-md-7">
                                        <div class="input-group">
                                            <input type="text" class="form-control success" id="DateofBirth" name="DateofBirth" value="<?php echo isset($_POST['DateofBirth']) ? $_POST['DateofBirth'] : $data[0]['DateofBirth'];?>" required="" aria-invalid="false">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-calendar-check"></i>
                                                </span>
                                            </div>
                                        </div>  
                                    <!--<div class="row">
                                        <div class="col-md-3" style="margin-right: -20px;">
                                            <select class="form-control" required="" name="date" id="date">
                                                <?php for($i=1;$i<=31;$i++) {?>
                                                <option value="<?php echo $i;?>" <?php echo ($i==date("d",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" required="" name="month" id="month" aria-invalid="true" data-validation-required-message="Please select birth month">
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
                                       </div>
                                       <div class="col-md-5"> 
                                            <select class="form-control" required="" name="year" id="year" aria-invalid="true" data-validation-required-message="Please select birth year">
                                                <?php for($i=date("Y")-68;$i<=date("Y")-18;$i++) {?>
                                                <option value="<?php echo $i;?>" <?php echo ($i==date("Y",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
                                                <?php } ?>
                                            </select>
                                       </div> 
                                       </div> -->
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-md-5 text-right">Mobile No</label>
                                    <div class="col-md-7">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">+91</span>
                                            </div>
                                            <input type="text" class="form-control success" id="MobileNumber" name="MobileNumber" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $data[0]['MobileNumber'];?>" required="" aria-invalid="false">    
                                        </div>
                                        <div class="help-block" style="color:red"><?php echo $errorMobile;?></div>
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-md-5 text-right">Email ID</label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control input-full" name="MemberEmail" value="<?php echo $data[0]['MemberEmail'];?>">
                                        <div class="help-block" style="color:red"><?php echo $errorEmail;?></div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-md-5 text-right">Address Line1</label>
                                    <div class="col-md-7">
                                    <input type="text" class="form-control input-full" name="AddressLine1" value="<?php echo $data[0]['AddressLine1'];?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-md-5 text-right">Address Line2</label>
                                    <div class="col-md-7 ">
                                        <input type="text" class="form-control input-full" name="AddressLine2" value="<?php echo $data[0]['AddressLine2'];?>">
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-md-5 text-right">City Name</label>
                                    <div class="col-md-7 ">
                                        <input type="text" class="form-control input-full" name="City" value="<?php echo $data[0]['CityName'];?>">
                                        <div class="help-block" style="color:red"><?php echo $errorCity;?></div>
                                        
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-md-5 text-right">Pin/Zip code</label>
                                    <div class="col-md-7 ">
                                        <input type="text" class="form-control input-full" name="PinCode" value="<?php echo $data[0]['PinCode'];?>">
                                        <div class="help-block" style="color:red"><?php echo $errorPinCode;?></div>
                                        
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
</div> 
<script>
    $('#DateofBirth').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    </script>