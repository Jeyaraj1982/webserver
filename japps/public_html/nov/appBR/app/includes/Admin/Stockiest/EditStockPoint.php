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
        if (!(preg_match($regex, strtolower($_POST['StockPointEmail'])))) {
            $error++;
            $errorStockPointEmail="Email is an invalid email. Please try again.";
        } 
        
        if (!($_POST['StockPointMobile']>6000000000 && $_POST['StockPointMobile']<9999999999)) {
            $error++;
            $errorStockPointMobile="Invalid mobile number. Please try again.";
        }
        
        
        
                                                                                
        if ($error==0) {
          $MemberID =  $mysql->execute("update _tbl_stock_admin  set StockPointName         = '".$_POST['StockPointName']."',
                                                                       StockPointAddressLine1 = '".$_POST['StockPointAddressLine1']."',
                                                                       StockPointAddressLine2 = '".$_POST['StockPointAddressLine2']."',
                                                                       StockPointCityName     = '".$_POST['StockPointCityName']."',
                                                                       Landmark               = '".$_POST['StockPointLandmark']."',
                                                                       StockPointCountry      = '".$_POST['StockPointCountry']."',
                                                                       StockPointState        = '".$_POST['StockPointState']."',
                                                                       StockPointDistrict     = '".$_POST['StockPointDistrict']."',
                                                                       StockPointPinCode      = '".$_POST['StockPointPinCode']."',
                                                                       StockPointEmail        = '".$_POST['StockPointEmail']."',
                                                                       StockPointMobile       = '".$_POST['StockPointMobile']."',
                                                                       StockAdminName         = '".$_POST['StockAdminName']."',
                                                                       MobileNumber           = '".$_POST['MobileNumber']."',
                                                                       AdminEmail             = '".$_POST['AdminEmail']."',
                                                                       Gender                 = '".$_POST['Gender']."',
                                                                       PanCard                = '".$_POST['PanCard']."',
                                                                       AdhaarCard             = '".$_POST['AdhaarCard']."',
                                                                       Address1               = '".$_POST['AddressLine1']."',
                                                                       Address2               = '".$_POST['AddressLine2']."',
                                                                       PostalCode             = '".$_POST['PostalCode']."',
                                                                       AdminPassword          = '".$_POST['AdminPassword']."' 
                                                                       where StockAdminID='".$_GET['code']."'");
             ?>
             <script>
             alert("updated successfully");
             </script>
             <?php
          }
             
    } 
     $data = $mysql->select("select * from _tbl_stock_admin where StockAdminID='".$_GET['code']."'");
 ?>
  <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=/NewStockPoint">Stockiest</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=/NewStockPoint">Edit Stockiest</a></li>
        </ul>
    </div> 
    <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post">    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Edit Stockiest Information</h4>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <div class="card-body"> 
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Stock Point Name<span style="color:red">*</span></label>
                                        <input name="StockPointName" id="StockPointName" placeholder="Stock Point Name" value="<?php echo isset($_POST['StockPointName']) ? $_POST['StockPointName'] : $data[0]['StockPointName'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter stock point name" type="text">
                                        <div class="help-block"></div>
                                        <div class="help-block"><p class="error" id="username-exists"></p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Address Line 1<span style="color:red">*</span></label>
                                        <input name="StockPointAddressLine1" id="StockPointAddressLine1" placeholder="Address Line 1" value="<?php echo isset($_POST['StockPointAddressLine1']) ? $_POST['StockPointAddressLine1'] : $data[0]['StockPointAddressLine1'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter address line 1" type="text">
                                        <div class="help-block"></div>
                                        <div class="help-block"><p class="error" id="username-exists"></p></div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Address Line 2<span style="color:red">*</span></label>
                                        <input name="StockPointAddressLine2" id="StockPointAddressLine2" placeholder="Address Line 2" value="<?php echo isset($_POST['StockPointAddressLine2']) ? $_POST['StockPointAddressLine2'] : $data[0]['StockPointAddressLine2'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter address line 2" type="text">
                                        <div class="help-block"></div>
                                        <div class="help-block"><p class="error" id="username-exists"></p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>City Name<span style="color:red">*</span></label>
                                        <input name="StockPointCityName" id="StockPointCityName" placeholder="City Name" value="<?php echo isset($_POST['StockPointCityName']) ? $_POST['StockPointCityName'] : $data[0]['StockPointCityName'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter City Name" type="text">
                                        <div class="help-block"></div>
                                        <div class="help-block"><p class="error" id="username-exists"></p></div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Landmark<span style="color:red">*</span></label>
                                        <input name="StockPointLandmark" id="StockPointLandmark" placeholder="Landmark" value="<?php echo isset($_POST['StockPointLandmark']) ? $_POST['StockPointLandmark'] : $data[0]['Landmark'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Landmark" type="text">
                                        <div class="help-block"></div>
                                        <div class="help-block"><p class="error" id="username-exists"></p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Country Name<span style="color:red">*</span></label>
                                        <select name="StockPointCountry" id="StockPointCountry" class="form-control">
                                            <option value="India">India</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>State Name<span style="color:red">*</span></label>
                                        <select name="StockPointState" class="form-control">
                                            <option value="Tamilnadu">Tamil Nadu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>District Name<span style="color:red">*</span></label>
                                        <?php $districts = $mysql->select("select * from _tbl_master_districtnames order by DistrictName");?>
                                        <select name="StockPointDistrict" id="StockPointDistrict" class="form-control">
                                            <?php foreach($districts as $d) { ?>
                                            <option value="<?php echo $d['DistrictName'];?>"><?php echo $d['DistrictName'];?></option>
                                            <?php } ?>
                                        </select>
                                        <div class="help-block"></div>
                                        <div class="help-block"><p class="error" id="username-exists"></p></div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Pin Code<span style="color:red">*</span></label>
                                        <input name="StockPointPinCode" id="StockPointPinCode" placeholder="Pin Code" value="<?php echo isset($_POST['StockPointPinCode']) ? $_POST['StockPointPinCode'] : $data[0]['StockPointPinCode'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter pincode" type="text">
                                        <div class="help-block"></div>
                                        <div class="help-block"><p class="error" id="username-exists"></p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Email ID<span style="color:red">*</span></label>
                                        <input name="StockPointEmail" id="StockPointEmail" placeholder="Email ID" value="<?php echo isset($_POST['StockPointEmail']) ? $_POST['StockPointEmail'] : $data[0]['StockPointEmail'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter email" type="text">
                                        <div class="help-block" style="color:red"><?php echo $errorStockPointEmail;?></div>
                                        <div class="help-block"><p class="error" id="username-exists"></p></div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Mobile Number<span style="color:red">*</span></label>
                                        <input name="StockPointMobile" id="StockPointMobile" placeholder="Mobile Number" value="<?php echo isset($_POST['StockPointMobile']) ? $_POST['StockPointMobile'] : $data[0]['StockPointMobile'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter mobile number" type="text">
                                        <div class="help-block" style="color:red"><?php echo $errorStockPointMobile;?></div>
                                        <div class="help-block"><p class="error" id="username-exists"></p></div>
                                    </div>
                                </div>
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
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Stock Point Admin Details</h4>
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group user-test" id="user-exists">
                                    <label>Admin Name<span style="color:red">*</span></label>
                                    <input name="StockAdminName" id="StockAdminName" placeholder="Admin Name" value="<?php echo isset($_POST['StockAdminName']) ? $_POST['StockAdminName'] :  $data[0]['StockAdminName'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter admin name" type="text">
                                    <div class="help-block"></div>
                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile Number<span style="color:red">*</span></label>
                                    <input name="MobileNumber" placeholder="Mobile Number" id="MobileNumber" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $data[0]['MobileNumber'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter mobile number" type="text">
                                    <div class="help-block"  style="color:red"><?php echo $errorMobile;?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="email-exists">
                                    <label>Email<span style="color:red">*</span></label>
                                    <input name="AdminEmail" id="AdminEmail" placeholder="Admin Email" value="<?php echo isset($_POST['AdminEmail']) ? $_POST['AdminEmail'] : $data[0]['AdminEmail'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter admin email id" type="text">
                                    <div class="help-block" style="color:red"><?php echo $errorEmail;?></div>
                                    <div class="help-block"><p class="error" id="emailid-exists" style="color:red"></p></div>
                                </div>
                            </div>                                
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender<span style="color:red">*</span></label>
                                    <select class="form-control" name="Gender" id="Gender">
                                        <option value="Male">Male</option> 
                                        <option value="Female">Female</option> 
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pancard</label>
                                    <input name="PanCard" id="PanCard" placeholder="PAN Card Number" value="<?php echo isset($_POST['PanCard']) ? $_POST['PanCard'] : $data[0]['PanCard'];?>" class="form-control"    data-validation-required-message="Please enter Pancard number" type="text">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Aadhaar Card</label>
                                    <input name="AdhaarCard" id="AdhaarCard" placeholder="Adhaar Card Number" value="<?php echo isset($_POST['AdhaarCard']) ? $_POST['AdhaarCard'] : $data[0]['AdhaarCard'];?>" class="form-control"    data-validation-required-message="Please enter Adhaar Card Number" type="text">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address Line 1<span style="color:red">*</span></label>
                                    <input name="AddressLine1" id="AddressLine1" placeholder="Address Line 1" value="<?php echo isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] : $data[0]['Address1'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Address Line1" type="text">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address Line 2</label>
                                    <input name="AddressLine2" id="AddressLine2" placeholder="Address Line 2" value="<?php echo isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] : $data[0]['Address2'];?>" class="form-control"   data-validation-required-message="Please enter Address Line 2" type="text">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pincode<span style="color:red">*</span></label>
                                    <input name="PostalCode" id="PinCode" placeholder="PostalCode" value="<?php echo isset($_POST['PostalCode']) ? $_POST['PostalCode'] : $data[0]['PostalCode'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter PinCode" type="text">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password<span style="color:red">*</span></label>
                                    <input name="AdminPassword" id="AdminPassword" placeholder="Password" value="<?php echo isset($_POST['AdminPassword']) ? $_POST['AdminPassword'] : $data[0]['CMemberPassword'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Password" type="password">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm Password<span style="color:red">*</span></label>
                                    <input name="CMemberPassword" id="CMemberPassword" placeholder="Confirm Password" value="<?php echo isset($_POST['CMemberPassword']) ? $_POST['CMemberPassword'] : $data[0]['CMemberPassword'];?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Confirm Password" type="password">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                    <div class="col-12 p-b-20"><hr></div>
                     
                    <div class="card-body"><div class="form-group m-b-0 text-right">
                        <button type="submit" name="submitBtn" class="btn btn-primary waves-effect waves-light">Update</button>
                        <button type="submit" class="btn btn-danger waves-effect waves-light">Cancel</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>    