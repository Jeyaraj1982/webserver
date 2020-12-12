 <?php
    if (isset($_POST['submitBtn'])) {
        $error =0;
        
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        if (!(preg_match($regex, strtolower($_POST['AdminEmail'])))) {
            $error++;
            $errorEmail="Email is an invalid email. Please try again.";
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
        $dupEmail = $mysql->select("select * from _tbl_business_supporting_center where Email='".$_POST['SupportingCenterEmail']."' and SupportingCenterAdminID<>'".$_GET['code']."'");
        if(sizeof($dupEmail)>0){
           $error++;
           $errorSupportingCenterEmail="Email Already Exists."; 
        }
        $dupEmail = $mysql->select("select * from _tbl_business_supporting_center where AdminEmail='".$_POST['AdminEmail']."' and SupportingCenterAdminID<>'".$_GET['code']."'");
        if(sizeof($dupEmail)>0){
           $error++;
           $errorAdminEmail="Email Already Exists."; 
        }
      /*  if (!($_POST['SupportingCenterMobile']>6000000000 && $_POST['SupportingCenterMobile']<9999999999)) {
            $error++;
            $errorSupportingCenterMobile="Invalid mobile number. Please try again.";
        } */
        if(!($_POST['InputCommission'] >= $_POST['OutputCommission'])){
             $error++;
            $errorOutputCommission="Enter less than Input Commission.";  
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
                        $mysql->execute("update _tbl_business_supporting_center set ShopLogo='".$filename."' Where SupportingCenterAdminID='".$_GET['code']."'");
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
          $MemberID =  $mysql->execute("update _tbl_business_supporting_center  set SupportingCenterName    = '".$_POST['SupportingCenterName']."',
                                                                       SupportingCenterAddressLine1         = '".$_POST['SupportingCenterAddressLine1']."',
                                                                       SupportingCenterAddressLine2         = '".$_POST['SupportingCenterAddressLine2']."',
                                                                       SupportingCenterCityName             = '".$_POST['SupportingCenterCityName']."',
                                                                       Landmark                             = '".$_POST['SupportingCenterLandmark']."',
                                                                       Country                              = '".$_POST['SupportingCenterCountry']."',
                                                                       StateID                              = '".$_POST['SupportingCenterState']."',
                                                                       State                                = '".$statenames[0]['StateName']."',
                                                                       DistrictID                           = '".$_POST['DistrictName']."',
                                                                       District                             = '".$districtnames[0]['DistrictName']."',
                                                                       PinCode                              = '".$_POST['SupportingCenterPinCode']."',
                                                                       Email                                = '".$_POST['SupportingCenterEmail']."',
                                                                       Mobile                               = '".$_POST['SupportingCenterMobile']."',
                                                                       WebsiteName                          = '".$_POST['WebsiteName']."',
                                                                       MapUrl                               = '".$_POST['MapUrl']."',
                                                                       PanCardNumber                        = '".$_POST['PanCardNumber']."',
                                                                       GSTIN                                = '".$_POST['GSTIN']."',
                                                                       StoreTypeID                          = '".$_POST['StoreType']."',
                                                                       StoreTypeName                        = '".$Store[0]['StoreTypeName']."',
                                                                       InputCommission                      = '".$_POST['InputCommission']."',
                                                                       OutputCommission                     = '".$_POST['OutputCommission']."',
                                                                       PurchaseAbove                        = '".$_POST['PurchaseAbove']."',
                                                                       ShortDescription                     = '".$_POST['ShortDescription']."',
                                                                       SupportingCenterAdminName            = '".$_POST['SupportingCenterAdminName']."',
                                                                       MobileNumber                         = '".$_POST['MobileNumber']."',
                                                                       AdminEmail                           = '".$_POST['AdminEmail']."',
                                                                       Gender                               = '".$_POST['Gender']."',
                                                                       PanCard                              = '".$_POST['PanCard']."',
                                                                       AdhaarCard                           = '".$_POST['AdhaarCard']."',
                                                                       Address1                             = '".$_POST['AddressLine1']."',
                                                                       Address2                             = '".$_POST['AddressLine2']."',
                                                                       PostalCode                           = '".$_POST['PostalCode']."',
                                                                       AdminPassword                        = '".$_POST['AdminPassword']."', 
                                                                       OpeningTime                          = '".$_POST['OpeningHour'].":".$_POST['OpeningMin'].":".$_POST['OT']."', 
                                                                       ClosingTime                          = '".$_POST['ClosingHour'].":".$_POST['ClosingMin'].":".$_POST['CT']."', 
                                                                       Holidays                             = '".$Holidays."', 
                                                                       IsActive                             = '".$_POST['IsActive']."' 
                                                                       where SupportingCenterAdminID='".$_GET['code']."'");
             ?>
           <script>
            $(document).ready(function() {
                swal("Store Information updated successfully", {
                    icon : "success" 
                });
            });  
            </script>
             <?php
          }
             
    } 
     $data = $mysql->select("select * from _tbl_business_supporting_center where SupportingCenterAdminID='".$_GET['code']."'");
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
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/NewSupportingCenter">Edit Supporting Center</a></li>
        </ul>
    </div> 
    <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post" enctype="multipart/form-data">    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Edit Store Information</h4>
                </div>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Store Name<span style="color:red">*</span></label>
                                <input name="SupportingCenterName" id="SupportingCenterName" placeholder="Store Name" value="<?php echo isset($_POST['SupportingCenterName']) ? $_POST['SupportingCenterName'] : $data[0]['SupportingCenterName'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter supporting center" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Address Line 1<span style="color:red">*</span></label>
                                <input name="SupportingCenterAddressLine1" id="SupportingCenterAddressLine1" placeholder="Address Line 1" value="<?php echo isset($_POST['SupportingCenterAddressLine1']) ? $_POST['SupportingCenterAddressLine1'] : $data[0]['SupportingCenterAddressLine1'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter address line 1" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Address Line 2<span style="color:red">*</span></label>
                                <input name="SupportingCenterAddressLine2" id="SupportingCenterAddressLine2" placeholder="Address Line 2" value="<?php echo isset($_POST['SupportingCenterAddressLine2']) ? $_POST['SupportingCenterAddressLine2'] : $data[0]['SupportingCenterAddressLine2'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter address line 2" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>City Name<span style="color:red">*</span></label>
                                <input name="SupportingCenterCityName" id="SupportingCenterCityName" placeholder="City Name" value="<?php echo isset($_POST['SupportingCenterCityName']) ? $_POST['SupportingCenterCityName'] : $data[0]['SupportingCenterCityName'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter City Name" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Landmark<span style="color:red">*</span></label>
                                <input name="SupportingCenterLandmark" id="SupportingCenterLandmark" placeholder="Landmark" value="<?php echo isset($_POST['SupportingCenterLandmark']) ? $_POST['SupportingCenterLandmark'] : $data[0]['Landmark'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Landmark" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Country</label>
                                <select name="SupportingCenterCountry" id="SupportingCenterCountry" class="form-control">
                                    <option value="India">India</option>
                                </select>
                               <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>State Name</label>
                                <?php $statenames = $mysql->select("select * from _tbl_master_statenames order by StateName");?>
                                <select name="SupportingCenterState" id="SupportingCenterState" class="form-control" onchange="GetDistrictname($(this).val(),'0');">
                                    <option value="0">Select State Name</option>
                                    <?php foreach($statenames as $s) { ?>
                                    <option value="<?php echo $s['StateID'];?>" <?php echo ($data[0]['StateID']==$s['StateID']) ? " selected='selected' " : "";?>> <?php echo $s['StateName'];?></option>
                                    <?php } ?>
                                </select>
                                <div class="help-block" style="color:red"><?php echo $errorStateName;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>District</label>
                                <div id="div_district">
                                    <select name="DistrictName" id="DistrictName" class="form-control">   
                                        <option value="0">Select District Name</option>               
                                    </select>
                                </div>
                                <div class="help-block" style="color:red"><?php echo $errorDistrictName;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Pincode<span style="color:red">*</span></label>
                                <input type="text" name="SupportingCenterPinCode" class="form-control" value="<?php echo $data[0]['PinCode'];?>">
                                <div class="help-block" style="color:red"><?php echo $errorPinCode;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">                                                         
                            <div class="form-group user-test" id="user-exists">
                                <label>Email ID<span style="color:red">*</span></label>
                                <input name="SupportingCenterEmail" id="SupportingCenterEmail" placeholder="Email ID" value="<?php echo isset($_POST['SupportingCenterEmail']) ? $_POST['SupportingCenterEmail'] : $data[0]['Email'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter email" type="text">
                                <div class="help-block" style="color:red"><?php echo $errorSupportingCenterEmail;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Contact Number</label>
                                <input name="SupportingCenterMobile" id="SupportingCenterMobile" placeholder="Mobile / landline Number" value="<?php echo isset($_POST['SupportingCenterMobile']) ? $_POST['SupportingCenterMobile'] : $data[0]['Mobile'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter mobile number" type="text">
                                <div class="help-block" style="color:red"><?php echo $errorSupportingCenterMobile;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Website</label>
                                <input name="WebsiteName" id="WebsiteName" placeholder="Website" value="<?php echo isset($_POST['WebsiteName']) ? $_POST['WebsiteName'] : $data[0]['WebsiteName'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter website" type="text">
                                <div class="help-block" style="color:red"><?php echo $errorWebsiteName;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Google Map Url</label>
                                <input name="MapUrl" id="MapUrl" placeholder="Google Map Url" value="<?php echo isset($_POST['MapUrl']) ? $_POST['MapUrl'] : $data[0]['MapUrl'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter map url" type="text">
                                <div class="help-block" style="color:red"><?php echo $errorMapUrl;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>Pancard No</label>
                                <input name="PanCardNumber" id="PanCardNumber" placeholder="Pancard No" value="<?php echo isset($_POST['PanCardNumber']) ? $_POST['PanCardNumber'] : $data[0]['PanCardNumber'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter pan card number" type="text">
                                <div class="help-block" style="color:red"><?php echo $errorPanCardNumber;?></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="form-group user-test" id="user-exists">
                                <label>GSTIN</label>
                                <input name="GSTIN" id="GSTIN" placeholder="GSTIN" value="<?php echo isset($_POST['GSTIN']) ? $_POST['GSTIN'] : $data[0]['GSTIN'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter gstin" type="text">
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
                                    <option value="<?php echo $s['StoreTypeID'];?>" <?php echo ($data[0]['StoreTypeID']==$s['StoreTypeID']) ? " selected='selected' " : "";?>> <?php echo $s['StoreTypeName'];?></option>
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
                                        <option value="<?php echo $i;?>" <?php echo ($data[0]['InputCommission']==$i) ? " selected='selected' " : "";?>><?php echo $i ." %";?></option>
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
                                        <option value="<?php echo $i;?>" <?php echo ($data[0]['OutputCommission']==$i) ? " selected='selected' " : "";?>><?php echo $i ." %";?></option>
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
                                    <input name="PurchaseAbove" id="PurchaseAbove" placeholder="Purchase Above" value="<?php echo isset($_POST['PurchaseAbove']) ? $_POST['PurchaseAbove'] : $data[0]['PurchaseAbove'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter purchase above" type="text"> 
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
                                <textarea name="ShortDescription" id="ShortDescription" placeholder="Short Description" class="form-control"><?php echo isset($_POST['ShortDescription']) ? $_POST['ShortDescription'] :  $data[0]['ShortDescription'];?></textarea> 
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
                                <?php $Opening = explode(":",$data[0]["OpeningTime"]);?>
                                    <div class="col-md-3" style="margin-right: -30px;">
                                        <select name="OpeningHour" id="OpeningHour" class="form-control">
                                            <?php for($i=1;$i<=12;$i++){ ?>
                                                <option value="<?php echo $i;?>" <?php echo ($Opening[0]==$i) ? " selected='selected' " : "";?>><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3" style="margin-right: -30px;">
                                        <select name="OpeningMin" id="OpeningMin" class="form-control">
                                             <?php for($i=0;$i<sizeof($Minute);$i++){ ?>
                                                <option value="<?php echo $i;?>" <?php echo (($Opening[1]==$Minute[$i]) ? " selected='selected' " : "");?>><?php echo $Minute[$i];?></option>
                                            <?php } ?>
                                        </select>                                     
                                    </div>
                                    <div class="col-md-3">
                                        <select name="OT" id="OT" class="form-control">
                                            <option value="<?php echo "AM";?>" <?php echo ($Opening[2]=="AM") ? " selected='selected' " : "";?>><?php echo "AM" ;?></option>
                                            <option value="<?php echo "PM";?>" <?php echo ($Opening[2]=="PM") ? " selected='selected' " : "";?>><?php echo "PM" ;?></option>
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
                                <?php $Closing = explode(":",$data[0]["ClosingTime"]); ?>
                                    <div class="col-md-3" style="margin-right: -30px;">
                                        <select name="ClosingHour" id="ClosingHour" class="form-control">
                                            <?php for($i=1;$i<=12;$i++){ ?>
                                                <option value="<?php echo $i;?>" <?php echo ($Closing[0]==$i) ? " selected='selected' " : "";?>><?php echo $i;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3" style="margin-right: -30px;">
                                        <select name="ClosingMin" id="ClosingMin" class="form-control">
                                             <?php for($i=0;$i<sizeof($Minute);$i++){ ?>
                                                <option value="<?php echo $i;?>" <?php echo (($Closing[1]==$Minute[$i]) ? " selected='selected' " : "");?>><?php echo $Minute[$i];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="CT" id="CT" class="form-control">
                                            <option value="<?php echo "AM";?>" <?php echo ($Closing[2]=="AM") ? " selected='selected' " : "";?>><?php echo "AM" ;?></option>
                                            <option value="<?php echo "PM";?>" <?php echo ($Closing[2]=="PM") ? " selected='selected' " : "";?>><?php echo "PM" ;?></option>
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
                            <?php $Holiday = explode(",",$data[0]["Holidays"]);?>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="defaultInline1" name="Holidays[]" value="Monday" <?php echo ($Holiday=="Monday") ? " checked='checked' " : "";?>>
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
                              <input type="checkbox" class="custom-control-input" id="defaultInline6" name="Holidays[]" value="Saturday" <?php echo ($Holiday=="Saturday") ? " checked='checked' " : "";?>>
                              <label class="custom-control-label" for="defaultInline6">Saturday</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input type="checkbox" class="custom-control-input" id="defaultInline7" name="Holidays[]" value="Sunday" <?php echo ($Holiday=="Sunday") ? " checked='checked' " : "";?>>
                              <label class="custom-control-label" for="defaultInline7">Sunday</label>
                            </div>                                                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group user-test" id="user-exists">
                                <label>Store Logo</label>
                                <?php if($data[0]['ShopLogo']!=""){ ?>
                                <div>
                                    <img src="assets/stores/<?php echo $data[0]['ShopLogo'];?>" style="height: 150px;"><br>
                                    <span onclick='CallConfirmationRemoveLogo(<?php echo $data[0]['SupportingCenterAdminID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Remove</span>   
                                    <input type="file" name="ShopLogo" id="ShopLogo">
                                </div>
                                <?php } else { ?>
                                    <div><input type="file" name="ShopLogo" id="ShopLogo"><div>
                                <?php } ?>
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
                                <input name="SupportingCenterAdminName" id="SupportingCenterAdminName" placeholder="Admin Name" value="<?php echo isset($_POST['SupportingCenterAdminName']) ? $_POST['SupportingCenterAdminName'] :  $data[0]['SupportingCenterAdminName'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter admin name" type="text">
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
                                    <input name="MobileNumber" placeholder="Mobile Number" id="MobileNumber" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $data[0]['MobileNumber'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter mobile number" type="text">
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
                                <input name="AdminEmail" id="AdminEmail" placeholder="Admin Email" value="<?php echo isset($_POST['AdminEmail']) ? $_POST['AdminEmail'] : $data[0]['AdminEmail'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter admin email id" type="text">
                                <div class="help-block" style="color:red"><?php echo $errorAdminEmail;?></div>
                                <div class="help-block"><p class="error" id="emailid-exists" style="color:red"></p></div>
                            </div>
                        </div>                                
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender<span style="color:red">*</span></label>
                                <select class="form-control" name="Gender" id="Gender">
                                    <option value="Male" <?php echo ($data[0]['Gender']=="Male") ? " selected='selected' " : "";?>>Male</option>
                                    <option value="Female" <?php echo ($data[0]['Gender']=="Female") ? " selected='selected' " : "";?>>Female</option>
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
                                <input name="PanCard" id="PanCard" placeholder="PAN Card Number" value="<?php echo isset($_POST['PanCard']) ? $_POST['PanCard'] : $data[0]['PanCard'];?>" class="form-control"    data-validation-required-message="Please enter Pancard number" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Aadhaar Card</label>
                                <input name="AdhaarCard" id="AdhaarCard" placeholder="Adhaar Card Number" value="<?php echo isset($_POST['AdhaarCard']) ? $_POST['AdhaarCard'] : $data[0]['AdhaarCard'];?>" class="form-control"    data-validation-required-message="Please enter Adhaar Card Number" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address Line 1<span style="color:red">*</span></label>
                                <input name="AddressLine1" id="AddressLine1" placeholder="Address Line 1" value="<?php echo isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] : $data[0]['Address1'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Address Line1" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address Line 2</label>
                                <input name="AddressLine2" id="AddressLine2" placeholder="Address Line 2" value="<?php echo isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] : $data[0]['Address2'];?>" class="form-control"   data-validation-required-message="Please enter Address Line 2" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pincode<span style="color:red">*</span></label>
                                <input name="PostalCode" id="PinCode" placeholder="PostalCode" value="<?php echo isset($_POST['PostalCode']) ? $_POST['PostalCode'] : $data[0]['PostalCode'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter PinCode" type="text">
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password<span style="color:red">*</span></label>
                                <div class="input-group">
                                    <input name="AdminPassword" id="AdminPassword" placeholder="Password" value="<?php echo isset($_POST['AdminPassword']) ? $_POST['AdminPassword'] : $data[0]['AdminPassword'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Password" type="password">
                                    <div class="input-group-append">
                                        <span onclick="showHidePwd('AdminPassword',$(this))" class="input-group-text" id="basic-addon1"><i class="icon-eye"></i> </span>
                                    </div>                                    
                                </div>
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>IsActive<span style="color:red">*</span></label>
                                <select class="form-control" name="IsActive" id="IsActive">
                                    <option value="1" <?php echo ($data[0]['IsActive']=="1") ? " selected='selected' " : "";?>>Yes</option>
                                    <option value="0" <?php echo ($data[0]['IsActive']=="0") ? " selected='selected' " : "";?>>No</option>
                                </select>
                                <div class="help-block"></div>
                                <div class="help-block"><p class="error" id="username-exists"></p></div>
                            </div>
                        </div>    
                    </div>
                </div>
                <div class="card-footer">
                     <div class="row"> 
                        <div class="col-md-12" style="text-align: right;"> 
                             <button type="submit" name="submitBtn" class="btn btn-primary waves-effect waves-light">Update</button>
                             <button type="button" onclick="location.href='dashboard.php?action=SupportingCenter/ManageBusinessSupporting'"  class="btn btn-outline-primary waves-effect waves-light">Cancel</button>
                        </div>
                    </div>
                </div>
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
  $(document).ready(function(){
            GetDistrictname('<?php echo $data[0]['StateID'] ;?>','<?php echo $data[0]['DistrictID'];?>');
         });
  </script>
  <div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
<script>
 function CallConfirmationRemoveLogo(SupportingCenterAdminID){
    var text = '<form action="" method="POST" id="DeleteStoreLogoFrm'+SupportingCenterAdminID+'">'
                    +'<input type="hidden" value="'+SupportingCenterAdminID+'" id="SupportingCenterAdminID" Name="SupportingCenterAdminID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete store logo?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteStoreLogo(\''+SupportingCenterAdminID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteStoreLogo(SupportingCenterAdminID) {
     var param = $( "#DeleteStoreLogoFrm"+SupportingCenterAdminID).serialize();
    //$("#confrimation_text").html(loading);
    $.post( "webservice.php?action=DeleteStoreLogo",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/imge/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/img/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=SupportingCenter/EditSupportingCenter&&code="+obj.SupportingCenterAdminID+"' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
        
    });
}
</script>