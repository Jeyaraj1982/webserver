<br>
<?php
    $LeftCount = 0;
    $RightCount = 0;
    
    $leftCode = $memberTree->GetLeftLastCode($_SESSION['User']['MemberCode']);
    $rightCode = $memberTree->GetLastRight($_SESSION['User']['MemberCode']);

    $balance = getEarningWalletBalance($_SESSION['User']['MemberID']);
    
    if ($balance<35) {
        echo "<script>location.href='dashboard.php?action=Members/NoBalance';</script>";      
        exit;
    }
        
    if (isset($_POST['submitBtn'])) {
    
        $error =0;
        
         if (!(strlen(trim($_POST['MemberName']))>3)) {
            $error++;
            $errorMember ="Please enter member name.";
        }
        
        if ($_POST['terms']!="on"){
            $error++;
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
                    $errorMobile ="Mobile Number already used.";
                }
            }
        }
        
        $SponserMember     = $mysql->select("select * from _tbl_Members where MemberCode='".$_POST['SponsorCode']."'"); 
        if (sizeof($SponserMember)==0) {
             $error++;
             $errorSponsorCode ="Sponsor Doesn't exists.";
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
                    $errorEmail ="Email ID already used.";
                }
            }
        }
        
        if ($_POST['pos']=="L") {
            $uplineID = $leftCode;
            $pos = "L";
            $p = "1";
        }
        
        if ($_POST['pos']=="R") {
            $uplineID = $rightCode;
            $pos = "R";
            $p = "2";
        }
        
        if ($uplineID=="") {
            echo "<script>location.href='dashboard.php?action=Members/TreeConfilit';</script>";    
            exit;
        }
        
        $place = $mysql->select("select * from _tblPlacements where ParentCode='".$uplineID."'");
        if (!(sizeof($place)<2)) {
            echo "<script>location.href='dashboard.php?action=Members/TreeConfilit';</script>"; 
            exit;
        }
              
        if ($error==0) {
            $_POST['SponsorCode']= $_POST['SponsorCode'];
            $_POST['Code']= $uplineID;
            $_POST['p']= $p;
            $_SESSION['param'] = $_POST;
            echo "<script>location.href='dashboard.php?action=Members/Confrim_CreateMemer';</script>"; 
        }
    }
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-light-green">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Registration</h4>
                    <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Wallet Balance</label><br>
                                        $<?php echo number_format($balance,2);?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                </div>
                <div class="form-body" style="background:#d5d5d5;">
                    <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post">
                        <div class="card-body"> 
                            
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Sponsor ID<span style="color:red">*</span></label>
                                        <input name="SponsorCode" id="SponsorCode" placeholder="Sponsor ID" value="<?php echo isset($_POST['SponsorCode']) ? $_POST['SponsorCode'] : $_SESSION['User']['MemberCode'];?>" class="form-control" required aria-invalid="true" data-validation-required-message="Please enter sponsor id" type="text">
                                        <div class="help-block" style="color:red"><?php echo $errorSponsorCode;?></div>
                                        <div class="help-block"><p class="error" id="username-exists"></p></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Placement<span style="color:red">*</span></label>
                                        <div>
                                            <div class="custom-control custom-radio m-r-20">
                                                <input name="pos" value="L"  checked="checked" onclick="$('#RightDiv').hide();$('#LeftDiv').show();" required="" class="custom-control-input" id="customRadio11" type="radio">
                                                <label class="custom-control-label" for="customRadio11">Left</label>
                                                <div class="help-block"></div>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input name="pos" value="R" onclick="$('#RightDiv').show();$('#LeftDiv').hide();" required="" class="custom-control-input" id="customRadio22" type="radio">
                                                <label class="custom-control-label" for="customRadio22">Right</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Package<span style="color:red">*</span></label>
                                        <select class="form-control" name="PackageID">
                                            <?php $userepins=$mysql->select("SELECT * FROM _tbl_Settings_Packages where IsActive='1'"); ?> 
                                            <?php foreach($userepins as $uepin) {?>
                                                <option value="<?php echo $uepin['PackageID'];?>" <?php echo (isset($_POST['PackageID']) && $_POST{'PackageID'}==$uepin['PackageID']) ? " selected='selected' " : "";?> ><?php echo $uepin['PackageName'];?> - $<?php echo $uepin['PackageAmount'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div> 
                            

                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Member Name<span style="color:red">*</span></label>
                                        <input name="MemberName" id="MemberName" placeholder="Member Name" value="<?php echo isset($_POST['MemberName']) ? $_POST['MemberName'] : "";?>" class="form-control" required aria-invalid="true" data-validation-required-message="Please enter member name" type="text">
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
                                        <div class="row">
                                            <div class="col-md-3">
                                                <select name="date" id="date" class="form-control">
                                                <?php for($i=1;$i<=31;$i++) {?>
                                                <option value="<?php echo $i;?>" <?php echo (isset($_POST['date']) && $_POST['date']==$i) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
                                                <?php } ?>
                                                </select>
                                            </div>      
                                            <div class="col-md-4">
                                                <select name="month" id="month" aria-invalid="true"  class="form-control">
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
                                            </div>
                                            <div class="col-md-5">
                                                <select name="year" id="year" aria-invalid="true"  class="form-control">
                                                    <?php for($i=date("Y")-68;$i<=date("Y")-18;$i++) {?>
                                                    <option value="<?php echo $i;?>" <?php echo (isset($_POST['year']) && $_POST['year']==$i) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                  
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
                                        <div class="input-group mb-3">
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
                                        <label>City Name</label>
                                        <input name="CityName" id="CityName" placeholder="City Name" value="<?php echo isset($_POST['CityName']) ? $_POST['CityName'] : "";?>" class="form-control"  aria-invalid="true" data-validation-required-message="Please enter City Name" required="" type="text">
                                        <div class="help-block" style="color: red"><?php echo $errorCityName;?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pincode</label>
                                        <input name="PinCode" id="PinCode" placeholder="PinCode" value="<?php echo isset($_POST['PinCode']) ? $_POST['PinCode'] : "";?>" class="form-control"  aria-invalid="true" data-validation-required-message="Please enter PinCode" required="" type="text">
                                        <div class="help-block" style="color: red"><?php echo $errorPinCode;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 p-b-20">
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>PanCard Number</label>
                                        <input name="PanCardNumber" id="PanCardNumber" placeholder="PanCard Number" value="<?php echo isset($_POST['PanCardNumber']) ? $_POST['PanCardNumber'] : "";?>" class="form-control" required=""  aria-invalid="true" data-validation-required-message="Please enter Pancard Number" type="text">
                                        <div class="help-block" style="color: red"><?php echo $errorPanCardNumber;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 p-b-20">
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Holder Name</label>
                                        <input name="AccountHolderName" id="AccountHolderName" placeholder="Account Holder Name" value="<?php echo isset($_POST['AccountHolderName']) ? $_POST['AccountHolderName'] : "";?>" class="form-control" required=""  aria-invalid="true" data-validation-required-message="Please enter Account Holder Name" type="text">
                                        <div class="help-block" style="color: red"><?php echo $errorAccountHolderName;?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dispatch Currency</label>
                                        <input class="form-control" disabled="disabled" value="INR" type="text">
                                        <div class="help-block" style="color: red"><?php echo $errorAccountHolderName;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Number</label>                                                                                                                                                                             
                                        <input name="AccountNumber" id="AccountNumber" placeholder="Account Number" value="<?php echo isset($_POST['AccountNumber']) ? $_POST['AccountNumber'] : "";?>" class="form-control"  aria-invalid="true" required="" data-validation-required-message="Please enter Account Number" type="text">
                                        <div class="help-block" style="color: red"><?php echo $errorAccountNumber;?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>IFSCode</label>
                                        <input name="IFSCode" id="IFSCode" placeholder="IFSCode" value="<?php echo isset($_POST['IFSCode']) ? $_POST['IFSCode'] : "";?>" class="form-control"  aria-invalid="true" required="" data-validation-required-message="Please enter IFSCode" type="text">
                                        <div class="help-block" style="color: red"><?php echo $errorIFSCode;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 p-b-20">
                                <hr>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input name="terms" class="custom-control-input" <?php echo (isset($_POST['terms']) && $_POST['terms']=="on") ? " checked='checked' ": "";?> required="" data-validation-required-message="Please accept our Terms and Conditions" id="customCheck4" type="checkbox">
                                        <label class="custom-control-label" for="customCheck4">I have read and understood the  <a target="_blank" href="<?php echo BaseUrl;?>/Terms.php">Terms and Conditions</a></label>
                                        <div class="help-block" style="color:red"><?php echo $errorterms;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group m-b-0 text-right">
                                    <a href="dashboard.php" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                    <button type="submit" name="submitBtn" class="btn btn-primary waves-effect waves-light">Continue</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>