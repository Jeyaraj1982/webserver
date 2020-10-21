<?php
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
        
        $epins=$mysql->select("SELECT * FROM _tblEpins where `IsUsed`='0' and OwnToID='".$_SESSION['User']['MemberID']."'    "); 
        
        if (sizeof($epins)==0) {
            echo "<script>location.href='dashboard.php?action=Members/EpinNotFound';</script>";      
        }
       
        if ($error==0) {
            $_POST['p']= $p;
            $_SESSION['param'] = $_POST;
            echo "<script>location.href='dashboard.php?action=Members/Confrim_CreateMem';</script>"; 
        }
    }                                        
    
    $epin = $mysql->select("SELECT * FROM _tblEpins where `IsUsed`='0' and  md5(Concat(EPIN,PINPassword,EPINID))='".$_POST['data']."'"); 
    $mem = $mysql->select("SELECT * FROM _tbl_Members  where md5(Concat(MemberCode,MemberName))='".$_POST['mdata']."'"); 
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-light-green">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Enter Follower Details</h4>
                </div>
                <div class="form-body">
                    <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post">
                    <input type="hidden" name="mdata" value="<?php echo $_POST['mdata'];?>">
                    <input type="hidden" name="data" value="<?php echo $_POST['data'];?>">
                    <input type="hidden" name="sel_epin" value="<?php echo $_POST['sel_epin'];?>">
                        <div class="card-body"> 
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Sponsor<span style="color:red">*</span></label>
                                        <select class="form-control" name="mdata" disabled="disabled">
                                             <option value="<?php echo $_POST['mdata'];?>"><?php echo $mem[0]['MemberCode']."(".$mem[0]['MemberName'].")";?></option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label><?php echo EPIN;?><span style="color:red">*</span></label>
                                        <select class="form-control" name="epin"  disabled="disabled">
                                                <option value="<?php echo md5($epin[0]['EPINID'].$epin[0]['EPIN']);?>"><?php echo $epin[0]['EPIN'];?></option>
                                        </select>
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Date of Birth<span style="color:red">*</span></label><br>
                                        <div class="form-group">
                                        <select class="" required="" name="date" id="date">
                                            <?php for($i=1;$i<=31;$i++) {?>
                                            <option value="<?php echo $i;?>" <?php echo (isset($_POST['date']) && $_POST['date']==$i) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                        <select class="" required="" name="month" id="month" aria-invalid="true" data-validation-required-message="Please select birth month">
                                            <option value="1"  <?php echo (isset($_POST['month']) && $_POST['month']==1)  ? " selected='selected' ": "";?>>January</option>
                                            <option value="2"  <?php echo (isset($_POST['month']) && $_POST['month']==2)  ? " selected='selected' ": "";?>>February</option>
                                            <option value="3"  <?php echo (isset($_POST['month']) && $_POST['month']==3)  ? " selected='selected' ": "";?>>March</option>
                                            <option value="4"  <?php echo (isset($_POST['month']) && $_POST['month']==4)  ? " selected='selected' ": "";?>>April</option>
                                            <option value="5"  <?php echo (isset($_POST['month']) && $_POST['month']==5)  ? " selected='selected' ": "";?>>May</option>
                                            <option value="6"  <?php echo (isset($_POST['month']) && $_POST['month']==6)  ? " selected='selected' ": "";?>>June</option>
                                            <option value="7"  <?php echo (isset($_POST['month']) && $_POST['month']==7)  ? " selected='selected' ": "";?>>July</option>
                                            <option value="8"  <?php echo (isset($_POST['month']) && $_POST['month']==8)  ? " selected='selected' ": "";?>>August</option>
                                            <option value="9"  <?php echo (isset($_POST['month']) && $_POST['month']==9)  ? " selected='selected' ": "";?>>September</option>
                                            <option value="10" <?php echo (isset($_POST['month']) && $_POST['month']==10) ? " selected='selected' ": "";?>>October</option>
                                            <option value="11" <?php echo (isset($_POST['month']) && $_POST['month']==11) ? " selected='selected' ": "";?>>November</option>
                                            <option value="12" <?php echo (isset($_POST['month']) && $_POST['month']==12) ? " selected='selected' ": "";?>>December</option>
                                        </select> 
                                        <select class="" required="" name="year" id="year" aria-invalid="true" data-validation-required-message="Please select birth year">
                                            <?php for($i=date("Y")-68;$i<=date("Y")-18;$i++) {?>
                                            <option value="<?php echo $i;?>" <?php echo (isset($_POST['year']) && $_POST['year']==$i) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
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
                                    <input name="MobileNumber" placeholder="Mobile Number" id="MobileNumber" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter mobile number" maxlength="10" type="text">
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
                                    <input name="MemberPassword" id="MemberPassword" placeholder="Password" value="<?php echo isset($_POST['MemberPassword']) ? $_POST['MemberPassword'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Password" type="password">
                                    <div class="help-block" style="color: red"><?php echo $errorMemberPassword;?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm Password<span style="color:red">*</span></label>
                                    <input name="CMemberPassword" id="CMemberPassword" placeholder="Confirm Password" value="<?php echo isset($_POST['CMemberPassword']) ? $_POST['CMemberPassword'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Confirm Password" type="password">
                                    <div class="help-block" style="color: red"><?php echo $errorCMemberPassword;?></div>
                                </div>
                            </div>
                        </div>
                         
                        <div class="col-12 p-b-20"><hr></div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input name="terms" class="custom-control-input" <?php echo (isset($_POST['terms']) && $_POST['terms']=="on") ? " checked='checked' ": "";?> required="" data-validation-required-message="Please accept our Terms and Conditions" id="customCheck4" type="checkbox">
                                        <label class="custom-control-label" for="customCheck4">I have read and understood the  <a target="_blank" href="happylife2020.in/Policy">Terms and Conditions</a></label>
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