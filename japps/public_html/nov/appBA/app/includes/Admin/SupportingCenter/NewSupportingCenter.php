 <?php
    if (isset($_POST['submitBtn'])) {
    
        $error =0;
        
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        if (!(preg_match($regex, strtolower($_POST['AdminEmail'])))) {
            $error++;
            $errorAdminEmail="Email is an invalid email. Please try again.";
        } 
        
        if (!($_POST['MobileNumber']>6000000000 && $_POST['MobileNumber']<9999999999)) {
            $error++;
            $errorMobile="Invalid mobile number. Please try again.";
        }
        
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        if (!(preg_match($regex, strtolower($_POST['SupportingCenterEmail'])))) {
            $error++;
            $errorSupportingCenterEmail="Email is an invalid email. Please try again.";
        } 
        $dupEmail = $mysql->select("select * from _tbl_business_supporting_center where Email='".$_POST['SupportingCenterEmail']."'");
        if(sizeof($dupEmail)>0){
           $error++;
           $errorSupportingCenterEmail="Email Already Exists."; 
        }
        $dupEmail = $mysql->select("select * from _tbl_business_supporting_center where AdminEmail='".$_POST['AdminEmail']."'");
        if(sizeof($dupEmail)>0){
           $error++;
           $errorAdminEmail="Email Already Exists."; 
        }
        
        /*if (!($_POST['SupportingCenterMobile']>6000000000 && $_POST['SupportingCenterMobile']<9999999999)) {
            $error++;
            $errorSupportingCenterMobile="Invalid mobile number. Please try again.";
        }*/
        
        if(!($_POST['InputCommission'] >= $_POST['OutputCommission'])){
             $error++;
            $errorOutputCommission="Enter less than Input Commission.";  
        }
        if(!($_POST['AdminPassword']== $_POST['CMemberPassword'])){
             $error++;
            $errorCMemberPassword="Passwords do not match.";  
        }
        if ($_POST['StoreType']=="0") {                                                         
            $error++;
            $errorStoreType="Please Select Store Type.";
        }
        if ($_POST['PurchaseAbove']=="") {                                                         
            $error++;
            $errorPurchaseAbove="Please Enter Purchase Above.";
        }
        if ($error==0) {
            
            $filename = strtolower(time().$_FILES['ShopLogo']['name']);
              if (isset($_FILES['ShopLogo']['name'])) {
                if (move_uploaded_file($_FILES['ShopLogo']['tmp_name'],"assets/stores/".$filename))     {
                    $filename = $filename;
                } else {
                    $filename = "";
                }
              } else {
                  $filename = "";
              }
            
            $statenames = $mysql->select("select * from _tbl_master_statenames where StateID='".$_POST['SupportingCenterState']."'");
            $districtnames = $mysql->select("select * from _tbl_master_districtnames where DistrictNameID='".$_POST['DistrictName']."'");
            $Store = $mysql->select("select * from _tbl_store_types where StoreTypeID='".$_POST['StoreType']."'");
            $Holidays = implode(",",$_POST["Holidays"]);
            $MemberID =  $mysql->insert("_tbl_business_supporting_center",array("SupportingCenterName"          => $_POST['SupportingCenterName'],
                                                                                "SupportingCenterAddressLine1"  => $_POST['SupportingCenterAddressLine1'],
                                                                                "SupportingCenterAddressLine2"  => $_POST['SupportingCenterAddressLine2'],
                                                                                "SupportingCenterCityName"      => $_POST['SupportingCenterCityName'],
                                                                                "Landmark"                      => $_POST['SupportingCenterLandmark'],
                                                                                "Country"                       => $_POST['SupportingCenterCountry'],
                                                                                "StateID"                       => $_POST['SupportingCenterState'],
                                                                                "State"                         => $statenames[0]['StateName'],
                                                                                "District"                      => $districtnames[0]['DistrictName'],
                                                                                "DistrictID"                    => $_POST['DistrictName'],
                                                                                "PinCode"                       => $_POST['SupportingCenterPinCode'],
                                                                                "Email"                         => $_POST['SupportingCenterEmail'],
                                                                                "Mobile"                        => $_POST['SupportingCenterMobile'],
                                                                                "WebsiteName"                   => $_POST['WebsiteName'],
                                                                                "MapUrl"                        => $_POST['MapUrl'],
                                                                                "PanCardNumber"                 => $_POST['PanCardNumber'],
                                                                                "GSTIN"                         => $_POST['GSTIN'],
                                                                                "StoreTypeID"                   => $_POST['StoreType'],
                                                                                "StoreTypeName"                 => $Store[0]['StoreTypeName'],
                                                                                "ShopLogo"                      => $filename,
                                                                                "InputCommission"               => $_POST['InputCommission'],
                                                                                "OutputCommission"              => $_POST['OutputCommission'],
                                                                                "PurchaseAbove"                 => $_POST['PurchaseAbove'],
                                                                                "ShortDescription"              => $_POST['ShortDescription'],
                                                                                "SupportingCenterAdminName"     => $_POST['SupportingCenterAdminName'],
                                                                                "MobileNumber"                  => $_POST['MobileNumber'],
                                                                                "AdminEmail"                    => $_POST['AdminEmail'],
                                                                                "Gender"                        => $_POST['Gender'],
                                                                                "PanCard"                       => $_POST['PanCard'],
                                                                                "AdhaarCard"                    => $_POST['AdhaarCard'],
                                                                                "Address1"                      => $_POST['AddressLine1'],
                                                                                "Address2"                      => $_POST['AddressLine2'],
                                                                                "PostalCode"                    => $_POST['PostalCode'],
                                                                                "AdminPassword"                 => $_POST['AdminPassword'],
                                                                                "OpeningTime"                   => $_POST['OpeningHour'].":".$_POST['OpeningMin'].":".$_POST['OT'],
                                                                                "ClosingTime"                   => $_POST['ClosingHour'].":".$_POST['ClosingMin'].":".$_POST['CT'],
                                                                                "Holidays"                      => $Holidays,
                                                                                "CreatedOn"                     => date("Y-m-d H:i:s")));
            
           //  echo "select * from _tbl_master_districtnames where DistrictID='".$_POST['SupportingCenterDistrict']."'";                                                                
            echo "<script>location.href='dashboard.php?action=SupportingCenter/Created';</script>";                                                                
        }                                                                                                    
    } 
 ?>
 <script>
 function GetDistrictname(StateID,DistrictID) {
        $.ajax({url:'webservice.php?action=GetDistrictname&StateID='+StateID+'&DistrictID='+DistrictID,success:function(data){
            $('#div_district').html(data);
        }});
    }
 </script>
 <style>
 .form-group{
     padding:0px !important;
 }
 </style>
  <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/NewSupportingCenter">Supporting Center</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/NewSupportingCenter">New Supporting Center</a></li>
        </ul>
    </div> 
    <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post" enctype="multipart/form-data">    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Stores Information</h4>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Store Name<span style="color:red">*</span></label>
                                <input name="SupportingCenterName" id="SupportingCenterName" placeholder="Store Name" value="<?php echo isset($_POST['SupportingCenterName']) ? $_POST['SupportingCenterName'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter supporting center name" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Address Line 1<span style="color:red">*</span></label>
                                <input name="SupportingCenterAddressLine1" id="SupportingCenterAddressLine1" placeholder="Address Line 1" value="<?php echo isset($_POST['SupportingCenterAddressLine1']) ? $_POST['SupportingCenterAddressLine1'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter address line 1" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Address Line 2<span style="color:red">*</span></label>
                                <input name="SupportingCenterAddressLine2" id="SupportingCenterAddressLine2" placeholder="Address Line 2" value="<?php echo isset($_POST['SupportingCenterAddressLine1']) ? $_POST['SupportingCenterAddressLine1'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter address line 2" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>City Name<span style="color:red">*</span></label>
                                <input name="SupportingCenterCityName" id="SupportingCenterCityName" placeholder="City Name" value="<?php echo isset($_POST['SupportingCenterCityName']) ? $_POST['SupportingCenterCityName'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter City Name" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Landmark<span style="color:red">*</span></label>
                                <input name="SupportingCenterLandmark" id="SupportingCenterLandmark" placeholder="Landmark" value="<?php echo isset($_POST['SupportingCenterLandmark']) ? $_POST['SupportingCenterLandmark'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Landmark" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Country Name<span style="color:red">*</span></label>
                                <select name="SupportingCenterCountry" id="SupportingCenterCountry" class="form-control">
                                    <option value="India">India</option>
                                </select>
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>State Name<span style="color:red">*</span></label>
                                <?php $statenames = $mysql->select("select * from _tbl_master_statenames order by StateName");?>
                                <select name="SupportingCenterState" id="SupportingCenterState" class="form-control" onchange="GetDistrictname($(this).val(),'0');">
                                    <option value="0">Select State Name</option>
                                    <?php foreach($statenames as $s) { ?>
                                    <option value="<?php echo $s['StateID'];?>" <?php echo ($_POST['SupportingCenterState']==$s['StateID']) ? " selected='selected' " : "";?>> <?php echo $s['StateName'];?></option>
                                    <?php } ?>
                                </select>
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>                                                                          
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>District Name<span style="color:red">*</span></label>
                                <div id="div_district">
                                    <select name="DistrictName" id="DistrictName" class="form-control">   
                                        <option value="0">Select District Name</option>               
                                    </select>
                                </div>
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Pin Code<span style="color:red">*</span></label>
                                <input name="SupportingCenterPinCode" id="SupportingCenterPinCode" placeholder="Pin Code" value="<?php echo isset($_POST['SupportingCenterPinCode']) ? $_POST['SupportingCenterPinCode'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter pincode" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Email ID<span style="color:red">*</span></label>
                                <input name="SupportingCenterEmail" id="SupportingCenterEmail" placeholder="Email ID" value="<?php echo isset($_POST['SupportingCenterEmail']) ? $_POST['SupportingCenterEmail'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter email" type="text">
                                <div class="help-block" style="color:red"><?php echo $errorSupportingCenterEmail;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Contact Number</label>
                                <input name="SupportingCenterMobile" id="SupportingCenterMobile" placeholder="Mobile / Landline Number" value="<?php echo isset($_POST['SupportingCenterMobile']) ? $_POST['SupportingCenterMobile'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter mobile number" type="text">
                                <div class="help-block" style="color:red"><?php echo $errorSupportingCenterMobile;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Website</label>
                                <input name="WebsiteName" id="WebsiteName" placeholder="Website" value="<?php echo isset($_POST['WebsiteName']) ? $_POST['WebsiteName'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter website" type="text">
                                <div class="help-block" style="color:red"><?php echo $errorWebsiteName;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Google Map Url</label>
                                <input name="MapUrl" id="MapUrl" placeholder="Google Map Url" value="<?php echo isset($_POST['MapUrl']) ? $_POST['MapUrl'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter map url" type="text">
                                <div class="help-block" style="color:red"><?php echo $errorMapUrl;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Pancard No</label>
                                <input name="PanCardNumber" id="PanCardNumber" placeholder="Pancard No" value="<?php echo isset($_POST['PanCardNumber']) ? $_POST['PanCardNumber'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter pan card number" type="text">
                                <div class="help-block" style="color:red"><?php echo $errorPanCardNumber;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>GSTIN</label>
                                <input name="GSTIN" id="GSTIN" placeholder="GSTIN" value="<?php echo isset($_POST['GSTIN']) ? $_POST['GSTIN'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter gstin" type="text">
                                <div class="help-block" style="color:red"><?php echo $errorGSTIN;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Store Type<span style="color:red">*</span></label>
                                <?php $storetypes = $mysql->select("select * from _tbl_store_types order by StoreTypeName");?>
                                <select name="StoreType" id="StoreType" class="form-control">
                                    <option value="0">Select Store Type</option>
                                    <?php foreach($storetypes as $s) { ?>
                                    <option value="<?php echo $s['StoreTypeID'];?>" <?php echo ($_POST['StoreType']==$s['StoreTypeID']) ? " selected='selected' " : "";?>> <?php echo $s['StoreTypeName'];?></option>
                                    <?php } ?>
                                </select>
                                <div class="help-block" style="color:red"><?php echo $errorStoreType;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Input Commission</label>
                                 <select name="InputCommission" id="InputCommission" class="form-control">
                                    <?php for($i=1;$i<=50;$i++){ ?>
                                        <option value="<?php echo $i;?>" <?php echo ($_POST['InputCommission']==$i) ? " selected='selected' " : "";?>><?php echo $i ." %";?></option>
                                    <?php } ?>
                                </select>
                                <div class="help-block" style="color:red"><?php echo $errorInputCommission;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Output Commission</label>
                                 <select name="OutputCommission" id="OutputCommission" class="form-control">
                                    <?php for($i=1;$i<=50;$i++){ ?>
                                        <option value="<?php echo $i;?>" <?php echo ($_POST['OutputCommission']==$i) ? " selected='selected' " : "";?>><?php echo $i ." %";?></option>
                                    <?php } ?>
                                </select>
                                <div class="help-block" style="color:red"><?php echo $errorOutputCommission;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group user-test" id="user-exists">
                                <label>Purchase Above<span style="color:red">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">INR</span>
                                    </div>
                                    <input name="PurchaseAbove" id="PurchaseAbove" placeholder="Purchase Above" value="<?php echo isset($_POST['PurchaseAbove']) ? $_POST['PurchaseAbove'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter purchase above" type="text"> 
                                </div>
                                <div class="help-block" style="color:red"><?php echo $errorPurchaseAbove;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>                                                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group user-test" id="user-exists">
                                <label>Short Description</label>
                                <textarea name="ShortDescription" id="ShortDescription" placeholder="Short Description" class="form-control"><?php echo isset($_POST['ShortDescription']) ? $_POST['ShortDescription'] : "";?></textarea> 
                                <div class="help-block" style="color:red"><?php echo $errorShortDescription;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>                                                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group user-test" id="user-exists">
                                <label>Opening Time</label>
                                <div class="form-group row">
                                    <div class="col-md-3" style="margin-right: -30px;">
                                        <select name="OpeningHour" id="OpeningHour" class="form-control">
                                            <?php for($i=1;$i<=12;$i++){ ?>
                                                <option value="<?php echo $i;?>" <?php echo ($_POST['OpeningHour']==$i) ? " selected='selected' " : "";?>><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3" style="margin-right: -30px;">
                                        <select name="OpeningMin" id="OpeningMin" class="form-control">
                                             <?php for($i=0;$i<sizeof($Minute);$i++){ ?>
                                                <option value="<?php echo $i;?>" <?php echo (($_POST[ 'OpeningMin']==$Minute[$i]) ? " selected='selected' " : "");?>><?php echo $Minute[$i];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="OT" id="OT" class="form-control">
                                            <option value="<?php echo "AM";?>" <?php echo ($_POST['OT']=="AM") ? " selected='selected' " : "";?>><?php echo "AM" ;?></option>
                                            <option value="<?php echo "PM";?>" <?php echo ($_POST['OT']=="PM") ? " selected='selected' " : "";?>><?php echo "PM" ;?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="help-block" style="color:red"><?php echo $errorOpeningTime;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>                                                           
                        </div>
                        <div class="col-md-6">
                            <div class="form-group user-test" id="user-exists">
                                <label>Closing Time</label>
                                <div class="form-group row">
                                    <div class="col-md-3" style="margin-right: -30px;">
                                        <select name="ClosingHour" id="ClosingHour" class="form-control">
                                            <?php for($i=1;$i<=12;$i++){ ?>
                                                <option value="<?php echo $i;?>" <?php echo ($_POST['ClosingHour']==$i) ? " selected='selected' " : "";?>><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3" style="margin-right: -30px;">
                                        <select name="ClosingMin" id="ClosingMin" class="form-control">
                                             <?php for($i=0;$i<sizeof($Minute);$i++){ ?>
                                                <option value="<?php echo $i;?>" <?php (($_POST[ 'ClosingMin']==$Minute[$i]) ? " selected='selected' " : "");?>><?php echo $Minute[$i];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="CT" id="CT" class="form-control">
                                            <option value="<?php echo "AM";?>" <?php echo ($_POST['CT']=="AM") ? " selected='selected' " : "";?>><?php echo "AM" ;?></option>
                                            <option value="<?php echo "PM";?>" <?php echo ($_POST['CT']=="PM") ? " selected='selected' " : "";?>><?php echo "PM" ;?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="help-block" style="color:red"><?php echo $errorClosingTime;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>                                                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group user-test" id="user-exists">
                                <label>Holidays</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="defaultInline1" name="Holidays[]" value="Monday" >
                              <label class="custom-control-label" for="defaultInline1">Monday</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="defaultInline2" name="Holidays[]" value="Tuesday">
                              <label class="custom-control-label" for="defaultInline2">Tuesday</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="defaultInline3" name="Holidays[]" value="Wednesday">
                              <label class="custom-control-label" for="defaultInline3">Wednesday</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="defaultInline4" name="Holidays[]" value="Thursday">
                              <label class="custom-control-label" for="defaultInline4">Thursday</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="defaultInline5" name="Holidays[]" value="Friday">
                              <label class="custom-control-label" for="defaultInline5">Friday</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="defaultInline6" name="Holidays[]" value="Saturday">
                              <label class="custom-control-label" for="defaultInline6">Saturday</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="defaultInline7" name="Holidays[]" value="Sunday">
                              <label class="custom-control-label" for="defaultInline7">Sunday</label>
                            </div>                                                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group user-test" id="user-exists">
                                <label>Store Logo</label>
                                <input type="file" name="ShopLogo" id="ShopLogo" class="form-control"> 
                                <div class="help-block" style="color:red"><?php echo $errorShopLogo;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>                                                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Store Admin Information</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Admin Name<span style="color:red">*</span></label>
                                <input name="SupportingCenterAdminName" id="SupportingCenterAdminName" placeholder="Admin Name" value="<?php echo isset($_POST['SupportingCenterAdminName']) ? $_POST['SupportingCenterAdminName'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter admin name" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
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
                                <div class="help-block"  style="color:red"><?php echo $errorMobile;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" id="email-exists">
                                <label>Email<span style="color:red">*</span></label>
                                <input name="AdminEmail" id="AdminEmail" placeholder="Admin Email" value="<?php echo isset($_POST['AdminEmail']) ? $_POST['AdminEmail'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter admin email id" type="text">
                                <div class="help-block" style="color:red"><?php echo $errorAdminEmail;?></div>
                                <div class="help-block"><p class="error" id="emailid-exists" style="color:red"></p></div>
                            </div>
                        </div>                                
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender<span style="color:red">*</span></label>
                                <select class="form-control" name="Gender" id="Gender">
                                    <option value="Male" <?php echo ($_POST['Gender']=="Male") ? " selected='selected' " : "";?>> Male</option>
                                    <option value="Female" <?php echo ($_POST['Gender']=="Female") ? " selected='selected' " : "";?>> Female</option>
                                </select>
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pancard</label>
                                <input name="PanCard" id="PanCard" placeholder="PAN Card Number" value="<?php echo isset($_POST['PanCard']) ? $_POST['PanCard'] : "";?>" class="form-control"    data-validation-required-message="Please enter Pancard number" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Aadhaar Card</label>
                                <input name="AdhaarCard" id="AdhaarCard" placeholder="Adhaar Card Number" value="<?php echo isset($_POST['AdhaarCard']) ? $_POST['AdhaarCard'] : "";?>" class="form-control"    data-validation-required-message="Please enter Adhaar Card Number" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address Line 1<span style="color:red">*</span></label>
                                <input name="AddressLine1" id="AddressLine1" placeholder="Address Line 1" value="<?php echo isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Address Line1" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address Line 2</label>
                                <input name="AddressLine2" id="AddressLine2" placeholder="Address Line 2" value="<?php echo isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] : "";?>" class="form-control"   data-validation-required-message="Please enter Address Line 2" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pincode<span style="color:red">*</span></label>
                                <input name="PostalCode" id="PinCode" placeholder="PostalCode" value="<?php echo isset($_POST['PostalCode']) ? $_POST['PostalCode'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter PinCode" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>                                                                                                                                                                                                                                                 
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Login Password<span style="color:red">*</span></label>
                                <div class="input-group">
                                    <input name="AdminPassword" id="AdminPassword" placeholder="Password" value="<?php echo isset($_POST['AdminPassword']) ? $_POST['AdminPassword'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Password" type="password">
                                    <div class="input-group-append">
                                        <span onclick="showHidePwd('AdminPassword',$(this))" class="input-group-text" id="basic-addon1"><i class="icon-eye"></i> </span>
                                    </div>                                    
                                </div>
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm Password<span style="color:red">*</span></label>
                                <div class="input-group">
                                    <input name="CMemberPassword" id="CMemberPassword" placeholder="Confirm Password" value="<?php echo isset($_POST['CMemberPassword']) ? $_POST['CMemberPassword'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Confirm Password" type="password">
                                    <div class="input-group-append">
                                        <span onclick="showHidePwd('CMemberPassword',$(this))" class="input-group-text" id="basic-addon1"><i class="icon-eye"></i> </span>
                                    </div>                                    
                                </div>
                                <div class="help-block"><div class="help-block" style="color:red"><?php echo $errorCMemberPassword;?></div></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>                                                                       
                        </div>
                         
                    </div>
                </div> 
                <div class="card-footer">
                     <div class="row"> 
                        <div class="col-md-12" style="text-align: right;"> 
                             <button type="button" onclick="CallConfirmationCreateStore()" class="btn btn-primary waves-effect waves-light">Create Supporting Center</button>
                             <button type="submit" style="display: none;" name="submitBtn" id="submitBtn" class="btn btn-primary waves-effect waves-light">Create Supporting Center</button>
                             <button type="button" onclick="location.href='dashboard.php?action=SupportingCenter/ManageBusinessSupporting'"  class="btn btn-outline-primary waves-effect waves-light">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>  
  <div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
      </div>
    </div>
  </div>
</div>
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
    function CallConfirmationCreateStore(){
            var txt = '<div class="form-group row">'                                                                     
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION<br>'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'                                                          
                    +'<div class="col-sm-12" style="text-align:center">'
                    +'Are you sure want to create store?'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-primary" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-primary" onclick="CreateStore()" >Yes, Confirm</button>'
                 +'</div>';  
        
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
   
}
function CreateStore() {
    $("#submitBtn" ).trigger( "click" );
}
<?php if(isset($_POST['DistrictName'])){ ?>
$(document).ready(function(){
            GetDistrictname('<?php echo $_POST['SupportingCenterState'] ;?>','<?php echo $_POST['DistrictName'];?>');
         });
<?php } ?>
</script>