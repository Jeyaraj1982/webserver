<?php if (!(isset($_SESSION['param']) && sizeof($_SESSION['param'])>0)) { ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Request To Transfer EPins</h4>
            </div>
            <div class="card-body">
                Couldn't create member. <?php echo $paramErrorMsg;?> 
                <br>Please contact administrator
            </div>
        </div>
    </div>
</div>
<?php                                            
    }  else {
        
    if (isset($_POST['submitBtn'])) {
    
        $error =0;
        
        if ($_POST['terms']!="on"){
           $error++;
           $errorMsg = "Please enter valid Pancard Number.";
           $errorterms ="Please agree terms and conditions.";  
        }
        
       
        $_POST=$_SESSION['param']; 
        $e_pin = $mysql->select("select * from  `_tblEpins` where `IsUsed`='0' and  md5(concat(EPINID,EPIN))='".$_POST['sel_epin']."'");   
        if (sizeof($e_pin)==0)  {
            $error++;
            $errorMsg = "Somthing went to wrong. Please contact administrator";
        }
        
        if ($error==0) {
           
         $sponsormember =  $_SESSION['User'];
         if (isset($_POST['mdata'])) {
            $sponsormember = $mysql->select("SELECT * FROM _tbl_Members  where md5(Concat(MemberCode,MemberName))='".$_POST['mdata']."'");  
            $sponsormember=$sponsormember[0];
         }
         $MemberCode = getMemberCode($_POST['MemberName']);
            
            $PV = $e_pin[0]['PackagePV'];                                                              
            $package_id = $e_pin[0]['PackageID'];  
           // $upline = $mysql->select("select * from _tbl_Members where MemberCode='".$_POST['Code']."'");
            $MemberID =  $mysql->insert("_tbl_Members",array("MemberCode"      => $MemberCode,
                                                             "MemberName"      => $_POST['MemberName'],
                                                             "DateofBirth"     => $_POST['year']."-".$_POST['month']."-".$_POST['date'],
                                                             "Sex"             => $_POST['Sex'],
                                                             "MobileNumber"    => trim($_POST['MobileNumber']),
                                                             "MemberEmail"     => trim($_POST['MemberEmail']),
                                                             "MemberPassword"  => $_POST['MemberPassword'],
                                                             "FatherName"      => "",
                                                             "PanCard"         => isset($_POST['PanCard']) ? trim($_POST['PanCard']):"",
                                                             "AdhaarCard"      => isset($_POST['AdhaarCard']) ? trim($_POST['AdhaarCard']):"",
                                                             "AddressLine1"    => isset($_POST['AddressLine1']) ? $_POST['AddressLine1']:"",
                                                             "AddressLine2"    => isset($_POST['AddressLine2']) ? $_POST['AddressLine2']:"" ,
                                                             "PinCode"         => isset($_POST['PinCode']) ? trim($_POST['PinCode']) : "",
                                                             "IsActive"        => "1",
                                                             "CurrentPackageID"   => $package_id,
                                                             "CurrentPackageName" => $e_pin[0]['PackageName'],
                                                             "CreatedOn"       => date("Y-m-d H:i:s"),
                                                             "SponsorCode"     => $sponsormember['MemberCode'],
                                                             "SponsorID"       => $sponsormember['MemberID'],
                                                             "SponsorName"     => $sponsormember['MemberName'],
                                                             "UplineID"        => $sponsormember['MemberID'],
                                                             "UplineCode"      => $sponsormember['MemberCode'],
                                                             "UplineName"      => $sponsormember['MemberName']));
                                                                                                 
            $mysql->insert("_tblPlacements",array("ParentID"      => $sponsormember['MemberID'],
                                                  "ParentCode"    => $sponsormember['MemberCode'],
                                                  "ParentName"    => $sponsormember['MemberName'],
                                                  "ChildID"       => $MemberID,
                                                  "ChildCode"     => $MemberCode,
                                                  "ChildName"     => $_POST['MemberName'],
                                                  "PlacedByID"    => $sponsormember['MemberID'],
                                                  "PlacedByCode"  => $sponsormember['MemberCode'],
                                                  "PlacedByName"  => $sponsormember['MemberName'],               
                                                  "PlacedOn"      => date("Y-m-d H:i:s"),
                                                  "PlacedFrom"    => "portal-tree",
                                                  "PV"            => $PV,
                                                  "PackageID"     => $package_id,
                                                  "UsedEPin"      => $e_pin[0]['EPINID'],
                                                  "Position"      => $_POST['p']==1 ? "L" : "R"));
             
            $mysql->execute("update `_tblEpins` set `IsUsed`='1', `UsedOn`='".date("Y-m-d H:i:s")."',`UsedForID`='".$MemberID."',`UserForCode`='".$MemberCode."',`UsedForName`='".$_POST['MemberName']."' where md5(concat(EPINID,EPIN))='".$_POST['sel_epin']."'");
            
            MobileSMS::sendSMS($_POST['MobileNumber'],"Dear ".$_POST['MemberName'].", Your account has been created. Your Member ID: ".$MemberCode." and Password: ".$_POST['MemberPassword']." on ".date("M d, Y").". Login Url: ".loginUrl,$MemberID);
            if ($_SESSION['User']['MemberID']==$upline[0]['MemberID']) {
              //  MobileSMS::sendSMS($_SESSION['User']['MobileNumber'],"Dear ".$_SESSION['User']['MemberName'].", Your have created a member ".$_POST['MemberName']."(".$MemberCode.") on ".date("M d, Y")."  ",$_SESSION['User']['MemberID']);
            } else {
               // MobileSMS::sendSMS($_SESSION['User']['MobileNumber'],"Dear ".$_SESSION['User']['MemberName'].", Your have created a member ".$_POST['MemberName']."(".$MemberCode.") on ".date("M d, Y")."  ",$_SESSION['User']['MemberID']);
                $up = $mysql->select("select * from _tbl_Members where MemberID='".$upline[0]['MemberID']."'");
               // MobileSMS::sendSMS($up[0]['MobileNumber'],"Dear ".$up[0]['MemberName'].", ".$_SESSION['User']['MemberCode']." has created new member and placed under you. Member Information  ".$_POST['MemberName']." (".$MemberCode.") on ".date("M d, Y")."  ",$up[0]['MemberID']);
            }
            echo "<script>location.href='dashboard.php?action=Members/MemberCreated&MemID=".$MemberCode."&SpnID=".$sponsormember['MemberCode']."&UpnCode=".$sponsormember['MemberCode']."';</script>";                                                                
        } else {
            echo $errorMsg;
             // echo "<script>location.href='dashboard.php?action=Members/EpinNotFound';</script>";  
        }
        
    }  else {
        $_POST=$_SESSION['param'];
         $epins=$mysql->select("SELECT * FROM _tblEpins where `IsUsed`='0' and OwnToID='".$_SESSION['User']['MemberID']."' "); 
         if (sizeof($epins)==0) {
              echo "<script>location.href='dashboard.php?action=Members/EpinNotFound';</script>";      
         }
    }
    
     $epin = $mysql->select("SELECT * FROM _tblEpins where `IsUsed`='0' and  md5(Concat(EPIN,PINPassword,EPINID))='".$_POST['data']."'"); 
                                    $mem = $mysql->select("SELECT * FROM _tbl_Members  where md5(Concat(MemberCode,MemberName))='".$_POST['mdata']."'"); 
?>
<div class="container-fluid" style="padding:25px">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-light-green">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Confirmation</h4>
                </div>
                <div class="form-body">
                    <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post">
                    <input type="hidden" value="mdata" value="<?php echo $_POST['mdata'];?>">
                        <div class="card-body"> 
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Epin<span style="color:red">*</span></label>
                                        <select class="form-control" name="sel_epin" disabled="disabled">
                                            <option value="<?php echo $_POST['sel_epin'];?>" ><?php echo $epin[0]['EPIN'];?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                      <div class="form-group user-test" id="user-exists">
                                        <label>Sponsor Information</label>
                                         
                                    </div>           
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Member Name<span style="color:red">*</span></label>
                                        <input  value="<?php echo isset($_POST['MemberName']) ? $_POST['MemberName'] : "";?>" class="form-control"  disabled="disabled" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender<span style="color:red">*</span></label>
                                        <select class="form-control" disabled="disabled">
                                            <option><?php echo $_POST['Sex'];?></option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Date of Birth<span style="color:red">*</span></label><br>
                                        <div class="form-group">
                                            <select disabled="disabled">
                                                <option><?php echo $_POST['date'];?></option>
                                            </select>
                                            <select disabled="disabled">
                                                <option><?php echo $_month[$_POST['month']];?></option>
                                            </select>
                                            <select disabled="disabled">
                                                <option><?php echo $_POST['year'];?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" id="email-exists">
                                        <label>Email</label>
                                        <input value="<?php echo isset($_POST['MemberEmail']) ? $_POST['MemberEmail'] : "";?>" class="form-control" disabled="disabled" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile Number<span style="color:red">*</span></label>
                                        <input value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>" class="form-control" disabled="disabled"  type="text">
                                    </div>
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pancard</label>
                                        <input value="<?php echo isset($_POST['PanCard']) ? $_POST['PanCard'] : "";?>" class="form-control" disabled="disabled" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Aadhaar Card</label>
                                        <input value="<?php echo isset($_POST['AdhaarCard']) ? $_POST['AdhaarCard'] : "";?>" class="form-control" disabled="disabled" type="text">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address Line 1</label>
                                        <input value="<?php echo isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] : "";?>" class="form-control" disabled="disabled" type="text">
                                        <div class="help-block" style="color:red"><?php echo $errorAddressLine1;?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address Line 2</label>
                                        <input value="<?php echo isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] : "";?>" class="form-control"  disabled="disabled" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select disabled="disabled" class="form-control custom-select">
                                            <option value="India">India</option>
                                        </select>
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pincode</label>
                                        <input disabled="disabled" value="<?php echo isset($_POST['PinCode']) ? $_POST['PinCode'] : "";?>" class="form-control" disabled="disabled" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">                                             
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password<span style="color:red">*</span></label>
                                        <input value="<?php echo isset($_POST['MemberPassword']) ? $_POST['MemberPassword'] : "";?>" class="form-control" disabled="disabled" type="password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm Password<span style="color:red">*</span></label>
                                        <input value="<?php echo isset($_POST['CMemberPassword']) ? $_POST['CMemberPassword'] : "";?>" class="form-control" disabled="disabled" type="password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 p-b-20"><hr></div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input name="terms" class="custom-control-input" <?php echo (isset($_POST['terms']) && $_POST['terms']=="on") ? " checked='checked' ": "";?> required="" data-validation-required-message="Please accept our Terms and Conditions" id="customCheck4" type="checkbox">
                                        <label class="custom-control-label" for="customCheck4">I Confirm to create Member. I have read and understood the  <a target="_blank" href="../Policy">Terms and Conditions</a></label>
                                        <div class="help-block" style="color:red"><?php echo $errorterms;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group m-b-0 text-right">
                                    <a href="dashboard.php" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                    <button type="submit" name="submitBtn" class="btn btn-primary waves-effect waves-light">Create Member</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>