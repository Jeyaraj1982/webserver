<script>
function showHidePwd(pwd,btn) {
  var x = document.getElementById(pwd);
  if (x.type === "password") {
    x.type = "text";
    btn.html('<i class="icon-eye"></i>');
  } else {
    x.type = "password";
    btn.html('<i class="icon-eye"></i>');
  }
}
</script>
<?php
    $LeftCount = 0;
    $RightCount = 0;
   
    if (isset($_POST['submitBtn'])) {
    
        $error =0;
        
         if (!(strlen(trim($_POST['MemberName']))>3)) {
            $error++;
            $errorMsg = "Please enter member name.";
            $errorMember ="Please enter member name.";
        }
        
        if ($_POST['terms']!="on"){
           $error++;
            $errorMsg = "Please enter valid Pancard Number.";
            $errorterms ="Please agree terms and conditions.";  
        }
        
        if (!(getUtilityhWalletBalance($_SESSION['User']['MemberID'])>=1000)) {
             $error++;
            $errorMsg = "Insufficiant Balance.";
            $errorterms ="Insufficiant Balance..";  
        }
           
        $mobilenumber_mandatory  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('IsMobileIsMandatory')");    
        if ($mobilenumber_mandatory[0]['ParamValue']==1 || strlen(trim($_POST['MobileNumber']))>0)  {
            if (!($_POST['MobileNumber']>6000000000 && $_POST['MobileNumber']<9999999999)) {
                $error++;
                $errorMobile="Invalid mobile number. Please try again.";
            }
            
            $mobilenumber_allowduplicate  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('AllowDuplicateMobile')");    
            if ($mobilenumber_allowduplicate[0]['ParamValue']==0)  {
                $dupMobile = $mysql->select("select * from _tbl_Members where MobileNumber='".trim($_POST['MobileNumber'])."'");
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
                $dupEmail = $mysql->select("select * from _tbl_Members where MemberEmail='".trim($_POST['MemberEmail'])."'");
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
                $dupPancard = $mysql->select("select * from _tbl_Members where PanCard='".trim($_POST['PanCard'])."'");
                if (sizeof($dupPancard)>0) {
                    $error++;
                    $errorMsg = "Please enter valid Pancard Number.";
                    $errorPanCard ="Pancard already used.";
                }
            } 
        } 

        $password_length  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MemberPasswordLength')");    
        if (strlen(trim($_POST['MemberPassword']))<$password_length[0]['ParamValue']) {
            $error++;
            $errorMsg = "Please enter valid Pancard Number.";
            $errorMemberPassword ="Password must have ".$password_length[0]['ParamValue']." characters.";
        }
        
        if (strlen(trim($_POST['CMemberPassword']))<$password_length[0]['ParamValue']) {
            $error++;
            $errorMsg = "Please enter valid Pancard Number.";
            $errorCMemberPassword ="Password must have ".$password_length[0]['ParamValue']." characters.";
        }
        
        if ($_POST['CMemberPassword']!=$_POST['MemberPassword']) {
            $error++;
            $errorMsg = "Please enter valid Pancard Number.";
            $errorCMemberPassword ="Password & Confrim Password should be same.";
        }
        
        
        
        $place = $mysql->select("select * from _tblPlacements where ParentCode='".$uplineID."'");
        if (!(sizeof($place)<4)) {
            echo "<script>location.href='dashboard.php?action=Members/TreeConfilit';</script>"; 
        }
              
        if ($error==0) {
           
            $_POST['Code']= $uplineID;
            $_POST['p']= $p;
            $_SESSION['param'] = $_POST;
            echo "<script>location.href='dashboard.php?action=Members/Confrim_CreateMem';</script>"; 
        }
    }                                              
?>
<div class="container-fluid">
     
    
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-light-green">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Create Member</h4>
                </div>
                <div class="form-body">
                    <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post">
                        <div class="card-body"> 
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Wallet Balance</label>
                                        <input type="text" class="form-control" value="Rs. <?php echo getUtilityhWalletBalance($_SESSION['User']['MemberID']);?>" disabled="disabled">    
                                    </div>
                                </div>
                            </div>
                            
                               <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Package</label>
                                        <input type="hidden" class="form-control" value="1" name="PackageID">    
                                        <input type="text" class="form-control" value="Default Package Rs. 1000" disabled="disabled">    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Member Name<span style="color:red">*</span></label>
                                        <input name="MemberName" id="MemberName" placeholder="Member Name" value="<?php echo isset($_POST['MemberName']) ? $_POST['MemberName'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter member name" type="text">
                                        <div class="help-block" style="color:red"><?php echo $errorMember;?></div>
                                        <div class="help-block"><p class="error" id="username-exists"></p></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender<span style="color:red">*</span></label>
                                        <select class="form-control" name="Sex">
                                            <option value="Male">Male</option> 
                                            <option value="Female">Female</option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of Birth<span style="color:red">*</span></label><br>
                                        <div class="input-group">
                                            <input type="text" class="form-control success" id="DateofBirth" name="DateofBirth" value="<?php echo isset($_POST['DateofBirth']) ? $_POST['DateofBirth'] : $data[0]['DateofBirth'];?>" required="" aria-invalid="false">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-calendar-check"></i>
                                                </span>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="email-exists">
                                    <label>Email</label>
                                    <input name="MemberEmail" id="MemberEmail" placeholder="Member Email" value="<?php echo isset($_POST['MemberEmail']) ? $_POST['MemberEmail'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter email id" type="text">
                                    <div class="help-block" style="color:red"><?php echo $errorEmail;?></div>
                                    <div class="help-block"><p class="error" id="emailid-exists" style="color:red"></p></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile Number<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">+91</span>
                                        </div>
                                        <input name="MobileNumber" placeholder="Mobile Number" id="MobileNumber" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter mobile number" type="text">
                                    </div>
                                    <div class="help-block" style="color:red"><?php echo $errorMobile;?></div>
                                </div>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pancard</label>
                                    <input name="PanCard" id="PanCard" placeholder="PAN Card Number" value="<?php echo isset($_POST['PanCard']) ? $_POST['PanCard'] : "";?>" class="form-control" type="text">
                                    <div class="help-block" style="color:red"><?php echo $errorPanCard;?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Aadhaar Card</label>
                                    <input name="AdhaarCard" id="AdhaarCard" placeholder="Adhaar Card Number" value="<?php echo isset($_POST['AdhaarCard']) ? $_POST['AdhaarCard'] : "";?>" class="form-control"    data-validation-required-message="Please enter Adhaar Card Number" type="text">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address Line 1</label>
                                    <input name="AddressLine1" id="AddressLine1" placeholder="Address Line 1" value="<?php echo isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Address Line1" type="text">
                                    <div class="help-block" style="color:red"><?php echo $errorAddressLine1;?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address Line 2</label>
                                    <input name="AddressLine2" id="AddressLine2" placeholder="Address Line 2" value="<?php echo isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] : "";?>" class="form-control"   data-validation-required-message="Please enter Address Line 2" type="text">
                                    <div class="help-block" style="color:red"><?php echo $errorAddressLine2;?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control custom-select" required="" name="country" id="country" aria-invalid="true" data-validation-required-message="Please Select Your Country">
                                        <option value="India">India</option>
                                    </select>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pincode</label>
                                    <input name="PinCode" id="PinCode" placeholder="PinCode" value="<?php echo isset($_POST['PinCode']) ? $_POST['PinCode'] : "";?>" class="form-control"  aria-invalid="true" data-validation-required-message="Please enter PinCode" type="text">
                                    <div class="help-block" style="color: red"><?php echo $errorPinCode;?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">                                             
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <input name="MemberPassword" id="MemberPassword" placeholder="Password" value="<?php echo isset($_POST['MemberPassword']) ? $_POST['MemberPassword'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Password" type="password">
                                        <span class="input-group-btn">
                                            <button  onclick="showHidePwd('MemberPassword',$(this))" class="btn btn-default reveal" type="button" style="background: #e9ecef;border-radius: 0px;"><i class="icon-eye"></i></button>
                                        </span>
                                    </div>
                                    <div class="help-block" style="color: red"><?php echo $errorMemberPassword;?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm Password<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <input name="CMemberPassword" id="CMemberPassword" placeholder="Confirm Password" value="<?php echo isset($_POST['CMemberPassword']) ? $_POST['CMemberPassword'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Confirm Password" type="password">
                                        <span class="input-group-btn">
                                            <button  onclick="showHidePwd('CMemberPassword',$(this))" class="btn btn-default reveal" type="button" style="background: #e9ecef;border-radius: 0px;"><i class="icon-eye"></i></button>
                                        </span>                                                                                                                    
                                    </div>
                                    <div class="help-block" style="color: red"><?php echo $errorCMemberPassword;?></div>
                                </div>
                            </div>
                        </div>
                         
                        <div class="col-12 p-b-20"><hr></div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input name="terms" class="custom-control-input" <?php echo (isset($_POST['terms']) && $_POST['terms']=="on") ? " checked='checked' ": "";?> required="" data-validation-required-message="Please accept our Terms and Conditions" id="customCheck4" type="checkbox">
                                        <label class="custom-control-label" for="customCheck4">I have read and understood the  <a target="_blank" href="https://www.ggcash.in/Policy">Terms and Conditions</a></label>
                                        <div class="help-block" style="color:red"><?php echo $errorterms;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group m-b-0 text-right">
                                    <a href="dashboard.php" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                    <button type="submit" name="submitBtn" class="btn btn-primary waves-effect waves-light">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#DateofBirth').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    </script>