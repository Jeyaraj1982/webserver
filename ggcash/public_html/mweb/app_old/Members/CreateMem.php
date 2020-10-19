<?php
/*    function getMemberCode($memberName) {
        global $mysqldb;
        $memberName = preg_replace('/\s+/', '', $memberName);
        $count = $mysqldb->select("select * from _tbl_Members");
        $d = "GGC".strtoupper(substr($memberName,0,3));
        if (strlen(sizeof($count)+1)==1) {
            $d .= "0000". (sizeof($count)+1);
        }
        if (strlen(sizeof($count)+1)==2) {
            $d .= "000". (sizeof($count)+1);
        }
        if (strlen(sizeof($count)+1)==3) {
            $d .= "00". (sizeof($count)+1);
        }
        if (strlen(sizeof($count)+1)==4) {
            $d .= "0". (sizeof($count)+1);
        }
        if (strlen(sizeof($count)+1)==5) {
            $d .= (sizeof($count)+1);
        }
        return $d;
    }   
    
    $LeftCount = 0;
    $RightCount = 0;

    function getNodes($parantID,$pos) {
        
        global $mysqldb,$LeftCount,$RightCount;
        $d = $mysqldb->select("select * from `_tblPlacements` where `ParentCode`='".$parantID."'"); 
        
        if (sizeof($d)==0) {
            return $parantID.",LR,".$LeftCount.",".$RightCount;    
        } else if (sizeof($d)==1) {
            
            if ($d[0]['Position']=="L") {
                if ($pos=="L") {
                    $LeftCount++;
                }
                if ($pos=="R") {
                    $RightCount++;
                }
                return $parantID.",R,".$LeftCount.",".$RightCount;    
            }  
            
            if ($d[0]['Position']=="R") {
                if ($pos=="L") {
                    $LeftCount++;
                }
                if ($pos=="R") {
                    $RightCount++;
                }
                return $parantID.",L,".$LeftCount.",".$RightCount;    
            }
        } else {
            getNodes($d[0]['ChildCode'],$pos); 
            getNodes($d[1]['ChildCode'],$pos);  
        }                          
    }

    function GetLeft($MemberCode) {
        global $mysqldb,$LeftCount;
        $fL = $mysqldb->select("select * from `_tblPlacements` where `Position`='L' and `ParentCode`='".$MemberCode."'");
        if (sizeof($fL)==0) {
            return $MemberCode.",LR,0,0";
        } else {
            $LeftCount++;
            return getNodes($fL[0]['ChildCode']);
        }
    }

    function GetRight($MemberCode) {
        global $mysqldb,$RightCount;
        $fR = $mysqldb->select("select * from `_tblPlacements` where `Position`='R' and `ParentCode`='".$MemberCode."'");
        if (sizeof($fR)==0) {
            return $MemberCode.",LR,0,0";
        } else {
            $RightCount++;
            return getNodes($fR[0]['ChildCode']);
        }
    }
   */ 
    if (isset($_POST['submitBtn'])) {
    
        $error =0;
        
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        if (!(preg_match($regex, $_POST['MemberEmail']))) {
            $error++;
            $errorEmail="Email is an invalid email. Please try again.";
        } 
        
        if (!($_POST['MobileNumber']>6000000000 && $_POST['MobileNumber']<9999999999)) {
            $error++;
            $errorMobile="Invalid mobile number. Please try again.";
        } 
        
      
        
        $epins=$mysqldb->select("SELECT * FROM _tblEpins where `IsUsed`='0' and CreatedByID='".$_SESSION['User']['MemberID']."'  "); 
        if (sizeof($epins)==0) {
            echo "<script>location.href='dashboard.php?action=Members/EpinNotFound';</script>";      
        }
        
        if ($error==0) {
            
           
            $MemberCode = getMemberCode($_POST['MemberName']);
            
            $upline = $mysqldb->select("select * from _tbl_Members where MemberCode='".$_GET['Code']."'");
            $MemberID =  $mysqldb->insert("_tbl_Members",array("MemberCode"      => $MemberCode,
                                                               "MemberName"      => $_POST['MemberName'],
                                                               "DateofBirth"     => $_POST['year']."-".$_POST['month']."-".$_POST['date'],
                                                               "Sex"             => $MemberCode,
                                                               "MobileNumber"    => $_POST['MobileNumber'],
                                                               "MemberEmail"     => $_POST['MemberEmail'],
                                                               "MemberPassword"  => $_POST['MemberPassword'],
                                                               "FatherName"      => "",
                                                               "PanCard"         => $_POST['PanCard'],
                                                               "AdhaarCard"      => $_POST['AdhaarCard'],
                                                               "AddressLine1"    => $_POST['AddressLine1'],
                                                               "AddressLine2"    => $_POST['AddressLine2'],
                                                               "AddressLine3"    => "",
                                                               "PinCode"         => $_POST['PinCode'],
                                                               "IsActive"        => "1",
                                                               "CreatedOn"       => date("Y-m-d H:i:s"),
                                                               "SponsorCode"     => $_SESSION['User']['MemberCode'],
                                                               "SponsorID"       => $_SESSION['User']['MemberID'],
                                                               "SponsorName"     => $_SESSION['User']['MemberName'],
                                                               "UplineID"        => $upline[0]['MemberID'],
                                                               "UplineCode"      => $upline[0]['MemberCode'],
                                                               "UplineName"      => $upline[0]['MemberName']));
                                                                          
            $mysqldb->insert("_tblPlacements",array("ParentID"      => $upline[0]['MemberID'],
                                                    "ParentCode"    => $upline[0]['MemberCode'],
                                                    "ParentName"    => $upline[0]['MemberName'],
                                                    "ChildID"       => $MemberID,
                                                    "ChildCode"     => $MemberCode,
                                                    "ChildName"     => $_POST['MemberName'],
                                                    "PlacedByID"    => $_SESSION['User']['MemberID'],
                                                    "PlacedByCode"  => $_SESSION['User']['MemberID'],
                                                    "PlacedByName"  => $_SESSION['User']['MemberName'],
                                                    "PlacedOn"      => date("Y-m-d H:i:s"),
                                                    "UsedEPin"      => "",
                                                    "Position"      => $_GET['p']==1 ? "L" : "R"));
            $mysqldb->execute("update `_tblEpins` set `IsUsed`='1', `UsedOn`='".date("Y-m-d H:i:s")."',`UsedForID`='".$MemberID."',`UserForCode`='".$MemberCode."',`UsedForName`='".$_POST['MemberName']."' where md5(concat(EPINID,EPIN))='".$_POST['sel_epin']."'");
            echo "<script>location.href='dashboard.php?action=Members/MemberCreated&MemID=".$MemberCode."&SpnID=".$_SESSION['User']['MemberCode']."&UpnCode=".$upline[0]['MemberCode']."';</script>";                                                                
            echo "Success fully created";
            echo "<style>#steps-uid-7{display:none}</style>";
        } 
        
    }  else {
         $epins=$mysqldb->select("SELECT * FROM _tblEpins where `IsUsed`='0' and CreatedByID='".$_SESSION['User']['MemberID']."' "); 
         if (sizeof($epins)==0) {
              echo "<script>location.href='dashboard.php?action=Members/EpinNotFound';</script>";      
         }
        
    }
                            ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="card border-left border-primary bg-primary text-bg bg-image bg-overlay-primary p-0">
                        <div class="card-body text-bg">
                            <div class="d-flex flex-row">
                                <div class="align-self-center display-6"><i class="ti-user"></i></div>
                                <div class="p-10 align-self-center">
                                    <h4 class="m-b-0">Sponsor Name</h4>
                                </div>
                                <div class="ml-auto align-self-center">
                                    <h5 class="font-medium m-b-0"><?php echo $_SESSION['User']['SponsorName'];?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card border-left border-success bg-success text-bg bg-image bg-overlay-success p-0">
                        <div class="card-body text-bg">
                            <div class="d-flex flex-row">
                                <div class="display-6 align-self-center"><i class="ti-user"></i></div>
                                <div class="p-10 align-self-center">
                                    <h4 class="m-b-0">Sponsor Code</h4>
                                </div>
                                <div class="ml-auto align-self-center">
                                    <h5 class="font-medium m-b-0"><?php echo $_SESSION['User']['SponsorCode'];?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card border-left border-warning bg-warning text-bg bg-image bg-overlay-warning p-0">
                        <div class="card-body text-bg p-15" style="padding: 7px;">
                            <div class="d-flex flex-row">
                                <div class="display-6 align-self-center"><i class="mdi mdi-account-multiple-plus"></i></div>
                                <div class="p-10 m-r-40 align-self-center">
                                    <h4  id="left_count"><?php echo $LeftCount ;?></h4>
                                    <h6 class="m-b-0 font-normal">Active Left</h6>
                                </div>
                                <div class="display-6 m-l-40 ml-auto align-self-center"><i class="mdi mdi-account-multiple-plus"></i></div>
                                <div class="p-10 align-self-center">
                                    <h4 id="right_count"><?php echo $RightCount ;?></h4>
                                    <h6 class="m-b-5 font-normal">Active Right</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-light-green">
                            <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Enter Follower Details</h4>
                        </div>
                        <div class="form-body">
                            
                            <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post">
                                 
                                <div class="card-body">
                                <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="form-group user-test" id="user-exists">
                                           <div class="row">
                                                 <label>Epin<span style="color:red">*</span></label>
                                                <select class="form-control custom-select" name="sel_epin">
                                                    <?php $userepins=$mysqldb->select("SELECT * FROM _tblEpins where `IsUsed`='0' and  CreatedByID='".$_SESSION['User']['MemberID']."'   "); ?> 
                                                    <?php foreach($userepins as $uepin) {?>
                                                        <option value="<?php echo md5($uepin['EPINID'].$uepin['EPIN']);?>" <?php echo (isset($_POST['sel_epin']) && $_POST{'sel_epin'}==md5($uepin['EPINID'].$uepin['EPIN'])) ? " selected='selected' " : "";?> ><?php echo $uepin['EPIN'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
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
                                                <label>Member Name<span style="color:red">*</span></label>
                                                <input name="MemberName" id="MemberName" placeholder="Member Name" value="<?php echo isset($_POST['MemberName']) ? $_POST['MemberName'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter member name" type="text">
                                                <div class="help-block"></div>
                                                <div class="help-block"><p class="error" id="username-exists"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile Number<span style="color:red">*</span></label>
                                            <input name="MobileNumber" placeholder="Mobile Number" id="MobileNumber" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter mobile number" type="text">
                                            <div class="help-block"  style="color:red"><?php echo $errorMobile;?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" id="email-exists">
                                            <label>Email<span style="color:red">*</span></label>
                                            <input name="MemberEmail" id="MemberEmail" placeholder="Member Email" value="<?php echo isset($_POST['MemberEmail']) ? $_POST['MemberEmail'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter email id" type="text">
                                            <div class="help-block" style="color:red"><?php echo $errorEmail;?></div>
                                            <div class="help-block"><p class="error" id="emailid-exists" style="color:red"></p></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-sm-4 col-xs-12">
                                                <label>Date of Birth<span style="color:red">*</span></label>
                                                <select class="form-control custom-select" required="" name="date" id="date" aria-invalid="true" data-validation-required-message="Please select birth date">
                                                <?php for($i=1;$i<=31;$i++) {?>
                                                    <option value="<?php echo $i;?>" <?php echo (isset($_POST['date']) && $_POST['date']==$i) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 col-xs-12 p-t-30">
                                                <select class="form-control custom-select" required="" name="month" id="month" aria-invalid="true" data-validation-required-message="Please select birth month">
                                                    <option value="1" <?php echo (isset($_POST['month']) && $_POST['month']==1) ? " selected='selected' ": "";?>>January</option>
                                                    <option value="2" <?php echo (isset($_POST['month']) && $_POST['month']==2) ? " selected='selected' ": "";?>>February</option>
                                                    <option value="3" <?php echo (isset($_POST['month']) && $_POST['month']==3) ? " selected='selected' ": "";?>>March</option>
                                                    <option value="4" <?php echo (isset($_POST['month']) && $_POST['month']==4) ? " selected='selected' ": "";?>>April</option>
                                                    <option value="5" <?php echo (isset($_POST['month']) && $_POST['month']==5) ? " selected='selected' ": "";?>>May</option>
                                                    <option value="6" <?php echo (isset($_POST['month']) && $_POST['month']==6) ? " selected='selected' ": "";?>>June</option>
                                                    <option value="7" <?php echo (isset($_POST['month']) && $_POST['month']==7) ? " selected='selected' ": "";?>>July</option>
                                                    <option value="8" <?php echo (isset($_POST['month']) && $_POST['month']==8) ? " selected='selected' ": "";?>>August</option>
                                                    <option value="9" <?php echo (isset($_POST['month']) && $_POST['month']==9) ? " selected='selected' ": "";?>>September</option>
                                                    <option value="10" <?php echo (isset($_POST['month']) && $_POST['month']==10) ? " selected='selected' ": "";?>>October</option>
                                                    <option value="11" <?php echo (isset($_POST['month']) && $_POST['month']==11) ? " selected='selected' ": "";?>>November</option>
                                                    <option value="12" <?php echo (isset($_POST['month']) && $_POST['month']==12) ? " selected='selected' ": "";?>>December</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4 col-xs-12 p-t-30">
                                                <select class="form-control custom-select" required="" name="year" id="year" aria-invalid="true" data-validation-required-message="Please select birth year">
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
                                        <div class="form-group">
                                            <label>Pancard</label>
                                            <input name="PanCard" id="PanCard" placeholder="PAN Card Number" value="<?php echo isset($_POST['PanCard']) ? $_POST['PanCard'] : "";?>" class="form-control"     data-validation-required-message="Please enter Pancard number" type="text">
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
                                            <input name="AddressLine2" id="AddressLine2" placeholder="Address Line 2" value="<?php echo isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] : "";?>" class="form-control"     data-validation-required-message="Please enter Address Line 2" type="text">
                                            <div class="help-block"></div>
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
                                            <label>Pincode<span style="color:red">*</span></label>
                                            <input name="PinCode" id="PinCode" placeholder="PinCode" value="<?php echo isset($_POST['PinCode']) ? $_POST['PinCode'] : "";?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter PinCode" type="text">
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
                                    <div class="col-md-6 p-t-20">
                                      
                                        
                                        <div class="form-group row" id="LeftDiv" style="display:none;">
                                        <label class="control-label col-sm-3">Position for Your's </label>
                                            <?php 
                                                $data = GetLeft($_SESSION['User']['MemberCode'],"L");
                                                echo $data;
                                                $data = explode(",",$data);
                                            ?>
                                            <script>
                                                $('#left_count').html('<?php echo $data[2];?>');
                                             </script>
                                            <input type="text" readonly="readonly" style="max-width: 150px" name="upline" id="uplevel" value="<?php echo $data[0];?>">    
                                            <?php if ($_SESSION['User']['MemberCode']!=$data[0]) { ?>
                                            <select name="LSubPos">
                                            <?php  if ($data[1]=="LR") { ?>
                                                <option value="L">Left</option>                                                    
                                                <option value="R">Right</option>                                                    
                                            <?php } ?>
                                            <?php  if ($data[1]=="L") { ?>
                                                <option value="L">Left</option>                                                    
                                            <?php } ?>
                                            <?php  if ($data[1]=="R") { ?>
                                                <option value="R">Right</option>                                                    
                                            <?php } ?>
                                            </select>
                                            <?php } ?>
                                        </div>
                                         <div class="form-group row" id="RightDiv" style="display:none;">
                                         <label class="control-label col-sm-3">Position for Your's </label>
                                             
                                              <?php 
                                               $data = GetRight($_SESSION['User']['MemberCode'],"R");
                                                //echo $data;
                                                $data = explode(",",$data);
                                            ?>
                                            <script>
                                                $('#right_count').html('<?php echo $data[3];?>');
                                             </script>
                                            <input type="text" readonly="readonly" style="max-width: 150px" name="upline" id="uplevel" value="<?php echo $data[0];?>">    
                                            <?php if ($_SESSION['User']['MemberCode']!=$data[0]) { ?>
                                            <select name="RSubPos">
                                            <?php  if ($data[1]=="LR") { ?>
                                                <option value="L">Left</option>                                                    
                                                <option value="R">Right</option>                                                    
                                            <?php } ?>
                                            <?php  if ($data[1]=="L") { ?>
                                                <option value="L">Left</option>                                                    
                                            <?php } ?>
                                            <?php  if ($data[1]=="R") { ?>
                                                <option value="R">Right</option>                                                    
                                            <?php } ?>
                                            </select>
                                            <?php } ?>
                                        </div>
                                        
                                        
                                    </div>
                            </div>
                           
                            <div class="col-12 p-b-20"><hr></div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input name="terms" class="custom-control-input" <?php echo (isset($_POST['terms']) && $_POST['terms']=="on") ? " checked='checked' ": "";?> required="" data-validation-required-message="Please accept our Terms and Conditions" id="customCheck4" type="checkbox">
                                        <label class="custom-control-label" for="customCheck4">I have read and understood the  <a target="_blank" href="ggcash.in/Policy">Terms and Conditions</a></label>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body"><div class="form-group m-b-0 text-right">
                                <button type="submit" name="submitBtn" class="btn btn-primary waves-effect waves-light">Register</button>
                                <button type="submit" class="btn btn-danger waves-effect waves-light">Cancel</button>
                            </div>
                        </div>
                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>