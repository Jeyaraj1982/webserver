 <?php
    if (isset($_POST['submitBtn'])) {
    
        $error =0;
        
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        if (!(preg_match($regex, strtolower($_POST['EmailID'])))) {
            $error++;
            $errorEmail="Email is an invalid email. Please try again.";
        } 
        
        if (!($_POST['MobileNumber']>6000000000 && $_POST['MobileNumber']<9999999999)) {
            $error++;
            $errorMobile="Invalid mobile number. Please try again.";
        }
        
        $duplicateMobile = $mysql->select("select * from _tbl_member where MobileNumber='".$_POST['MobileNumber']."'");
        if (sizeof($duplicateMobile)>0) {
           $error++;
           $errorMobile="Mobile Number already in use."; 
        }
        
        if ($error==0) {
            $mapto = $mysql->select("select * from _tbl_member where MemberID='".$_POST['MapedTo']."'");
            
            $MemberID =  $mysql->insert("_tbl_member",array("MemberName"         => $_POST['MemberName'],
                                                            "MobileNumber"       => $_POST['MobileNumber'],
                                                            "PersonName"         => $_POST['PersonName'],
                                                            "EmailID"            => $_POST['EmailID'],
                                                            "MemberPassword"     => $_POST['MemberPassword'],
                                                            "IsDistributor"      => "0",
                                                            "IsMember"           => "1",
                                                            "IsActive"           => "1",
                                                            "IsAPI"              => "0",
                                                            "BillCharge"         => $_POST['BillCharge'],
                                                            "MAB_Enabled"        => $_POST['MAB_Enabled'],
                                                            "MapedTo"            => $_POST['MapedTo'],
                                                            "MapedToName"        => $mapto[0]['MemberName'],
                                                            "Gender"             => $_POST['Gender'],
                                                            "PanCard"            => $_POST['PanCard'],
                                                            "AdhaarCard"         => $_POST['AdhaarCard'],
                                                            "Address1"           => $_POST['AddressLine1'],
                                                            "Address2"           => $_POST['AddressLine2'],
                                                            "MoneyTransferLimit" => $_POST['MoneyTransferLimit'],
                                                            "MoneyTransfer"      => $_POST['MoneyTransfer'],
                                                            "CreatedOn"          => date("Y-m-d H:i:s")));
            
            //$d = MobileSMS::sendSMS($_POST['MobileNumber'],"Dear Agent,  your account created. Your login Name: ".$_POST['MobileNumber']." and Password: ".$_POST['MemberPassword'],$MemberID);
             $message = "Dear ".$_POST['MemberName'].", your retailer account created. Your login Name: ".$_POST['MobileNumber']." and Password: ".$_POST['MemberPassword'].". Please download https://play.google.com/store/apps/details?id=com.tksd.Service";
             Whatsapp::sendsms("91".$_POST['MobileNumber'],$message,0,"");
             echo "<script>location.href='dashboard.php?action=Users/Created';</script>";                                                                 
        } 
    } 
 ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Users/New">Users</a></li>
        </ul>
    </div> 
    <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post">    
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>User Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Distributor<span style="color:red">*</span></label>
                                        <?php $Requests  = $mysql->select("SELECT * FROM _tbl_member  where IsDistributor='1'" ); ?>
                                        <select name="MapedTo" class="form-control">
                                            <?php foreach($Requests as $r) {?>
                                            <option value="<?php echo $r['MemberID'];?>" <?php echo $_POST['MapedTo']==$r['MemberID'] ? " selected='selected' ": "";?> ><?php echo $r['MemberName'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>                           
                                <div class="col-md-6"></div>
                            </div> 
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Shop Name<span style="color:red">*</span></label>
                                        <input name="MemberName" id="MemberName" placeholder="User Name" value="<?php echo isset($_POST['MemberName']) ? $_POST['MemberName'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter shop name" type="text">
                                        <div class="help-block"></div>
                                        <div class="help-block"><p class="error" id="username-exists"></p></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
 
                                </div>
                            </div>
                        </div>                                 

                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group user-test" id="user-exists">
                                    <label>Agent Name<span style="color:red">*</span></label>
                                    <input name="PersonName" id="PersonName" placeholder="Person Name" value="<?php echo isset($_POST['PersonName']) ? $_POST['PersonName'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter agent name" type="text">
                                    <div class="help-block"></div>
                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mobile Number<span style="color:red">*</span></label>
                                    <input name="MobileNumber" placeholder="Mobile Number" id="MobileNumber" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter mobile number" type="text">
                                    <div class="help-block" style="color:red"><?php echo $errorMobile;?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" id="email-exists">
                                    <label>Email<span style="color:red">*</span></label>
                                    <input name="EmailID" id="EmailID" placeholder="Email" value="<?php echo isset($_POST['EmailID']) ? $_POST['EmailID'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter email id" type="text">
                                    <div class="help-block"><p class="error" id="emailid-exists" style="color:red"><?php echo $errorEmail;?></p></div>
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
                                    <input name="PanCard" id="PanCard" placeholder="PAN Card Number" value="<?php echo isset($_POST['PanCard']) ? $_POST['PanCard'] : "";?>" class="form-control"    data-validation-required-message="Please enter Pancard number" type="text">
                                    <div class="help-block"></div>
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
                                    <label>Address Line 1<span style="color:red">*</span></label>
                                    <input name="AddressLine1" id="AddressLine1" placeholder="Address Line 1" value="<?php echo isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Address Line1" type="text">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address Line 2</label>
                                    <input name="AddressLine2" id="AddressLine2" placeholder="Address Line 2" value="<?php echo isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] : "";?>" class="form-control"   data-validation-required-message="Please enter Address Line 2" type="text">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password<span style="color:red">*</span></label>
                                    <input name="MemberPassword" id="MemberPassword" placeholder="Password" value="<?php echo isset($_POST['MemberPassword']) ? $_POST['MemberPassword'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Password" type="password">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm Password<span style="color:red">*</span></label>
                                    <input name="CMemberPassword" id="CMemberPassword" placeholder="Confirm Password" value="<?php echo isset($_POST['CMemberPassword']) ? $_POST['CMemberPassword'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Confirm Password" type="password">
                                    <div class="help-block"></div>
                                </div>
                            </div>
                             
                        </div>
                         <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bill Charge<span style="color:red">*</span></label>
                                    <select class="form-control" name="BillCharge" id="BillCharge">
                                        <option value="1"   >Enabled</option> 
                                        <option value="0"  >Disabled</option> 
                                    </select>
                                </div>
                            </div> <div class="col-md-6">
                                <div class="form-group">
                                    <label>MAB Interst<span style="color:red">*</span></label>
                                    <select class="form-control" name="MAB_Enabled" id="MAB_Enabled">
                                        <option value="1"   >Enabled</option> 
                                        <option value="0"  >Disabled</option> 
                                    </select>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                        <div class="col-md-6">                       
                                <div class="form-group">
                                    <label>Money Transfer<span style="color:red">*</span></label>
                                    <select class="form-control" name="MoneyTransfer" id="MoneyTransfer">
                                        <option value="1" <?php echo $data[0]['MoneyTransfer']=="1" ? " selected='selected' " : ""; ?> >Enabled</option> 
                                        <option value="0" <?php echo $data[0]['MoneyTransfer']=="0" ? " selected='selected' " : ""; ?> >Disabled</option> 
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Money Transfer Limit</label>
                                    <input name="MoneyTransferLimit" id="MoneyTransferLimit" placeholder="Money Transfer Limit" value="<?php echo isset($_POST['MoneyTransferLimit']) ? $_POST['MoneyTransferLimit'] : $data[0]['MoneyTransferLimit'];?>" class="form-control" data-validation-required-message="Money Transfer Limit" type="text"> 
                                </div>
                            </div>
                        </div>
                    <div class="col-12 p-b-20"><hr></div>
                    <div class="card-body"><div class="form-group m-b-0 text-right">
                        <button type="submit" class="btn btn-outline-primary waves-effect waves-light">Cancel</button>
                        <button type="submit" name="submitBtn" class="btn btn-primary waves-effect waves-light">Create User</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>  