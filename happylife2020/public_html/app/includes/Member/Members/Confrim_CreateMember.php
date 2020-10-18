<?php
    $LeftCount = 0;
    $RightCount = 0;
    
    $leftCode = $memberTree->GetLeftLastCode($_SESSION['User']['MemberCode']);
    $rightCode = $memberTree->GetLastRight($_SESSION['User']['MemberCode']);

    if (isset($_POST['submitBtn'])) {
    
        $error =0;
        
            if ($_POST['terms']!="on"){
           $error++;
            $errorMsg = "Please enter valid Pancard Number.";
            $errorterms ="Please agree terms and conditions.";  
        }
        
                 $_POST=$_SESSION['param']; 
              
        if ($error==0) {
            
            $MemberCode = getMemberCode($_POST['MemberName']);
         
            $upline = $mysql->select("select * from _tbl_Members where MemberCode='".$_POST['Code']."'");
            
            $e_pin = $mysql->select("select * from  `_tblEpins` where md5(concat(EPINID,EPIN))='".$_POST['sel_epin']."'");                                                  
            $PV = $e_pin[0]['PackagePV'];  
            $package_id = $e_pin[0]['PackageID'];  
            $MemberID =  $mysql->insert("_tbl_Members",array("MemberCode"      => $MemberCode,
                                                             "MemberName"      => $_POST['MemberName'],
                                                             "DateofBirth"     => $_POST['year']."-".$_POST['month']."-".$_POST['date'],
                                                             "Sex"             => $_POST['Sex'],
                                                             "MobileNumber"    => trim($_POST['MobileNumber']),
                                                             "MemberEmail"     => trim($_POST['MemberEmail']),
                                                             "MemberPassword"  => $_POST['MemberPassword'],
                                                             "PanCard"         => isset($_POST['PanCard']) ? trim($_POST['PanCard']) : "",
                                                             "AdhaarCard"      => isset($_POST['AdhaarCard']) ? trim($_POST['AdhaarCard']) : "",
                                                             "AddressLine1"    => isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] : "",
                                                             "AddressLine2"    => isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] : "",
                                                             "PinCode"         => isset($_POST['PinCode']) ? $_POST['PinCode'] : "",
                                                             "IsActive"        => "1",
                                                             "CreatedOn"       => date("Y-m-d H:i:s"),
                                                             "CurrentPackageID"   => $e_pin[0]['PackageID'],
                                                             "CurrentPackageName" => $e_pin[0]['PackageName'],
                                                             "SponsorCode"        => $_SESSION['User']['MemberCode'],
                                                             "SponsorID"          => $_SESSION['User']['MemberID'],
                                                             "SponsorName"        => $_SESSION['User']['MemberName'],
                                                             "UplineID"           => $upline[0]['MemberID'],
                                                             "UplineCode"         => $upline[0]['MemberCode'],
                                                             "UplineName"         => $upline[0]['MemberName']));
                                                                       
            $mysql->insert("_tblPlacements",array("ParentID"     => $upline[0]['MemberID'],
                                                  "ParentCode"   => $upline[0]['MemberCode'],
                                                  "ParentName"   => $upline[0]['MemberName'],
                                                  "ChildID"      => $MemberID,
                                                  "ChildCode"    => $MemberCode,
                                                  "ChildName"    => $_POST['MemberName'],
                                                  "PlacedByID"   => $_SESSION['User']['MemberID'],
                                                  "PlacedByCode" => $_SESSION['User']['MemberCode'],
                                                  "PlacedByName" => $_SESSION['User']['MemberName'],
                                                  "PV"           => $PV,
                                                  "PlacedFrom"    => "portal-create",
                                                  "PackageID"    => $package_id,
                                                  "PlacedOn"     => date("Y-m-d H:i:s"),
                                                  "UsedEPin"     => $e_pin[0]['EPINID'],
                                                  "Position"     => $_POST['p']==1 ? "L" : "R"));
            $mysql->execute("update `_tblEpins` set `IsUsed`='1', `UsedOn`='".date("Y-m-d H:i:s")."',`UsedForID`='".$MemberID."',`UserForCode`='".$MemberCode."',`UsedForName`='".$_POST['MemberName']."' where md5(concat(EPINID,EPIN))='".$_POST['sel_epin']."'");
            
            MobileSMS::sendSMS($_POST['MobileNumber'],"Dear ".$_POST['MemberName'].", Your account has been created. Your Member ID: ".$MemberCode." and Password: ".$_POST['MemberPassword']." on ".date("M d, Y").". Login Url: ".loginUrl,$MemberID);
            if ($_SESSION['User']['MemberID']==$upline[0]['MemberID']) {
               // MobileSMS::sendSMS($_SESSION['User']['MobileNumber'],"Dear ".$_SESSION['User']['MemberName'].", Your have created a member ".$_POST['MemberName']."(".$MemberCode.") on ".date("M d, Y")."  ",$_SESSION['User']['MemberID']);
            } else {
               // MobileSMS::sendSMS($_SESSION['User']['MobileNumber'],"Dear ".$_SESSION['User']['MemberName'].", Your have created a member ".$_POST['MemberName']."(".$MemberCode.") on ".date("M d, Y")."  ",$_SESSION['User']['MemberID']);
                $up = $mysql->select("select * from _tbl_Members where MemberID='".$upline[0]['MemberID']."'");
               // MobileSMS::sendSMS($up[0]['MobileNumber'],"Dear ".$up[0]['MemberName'].", ".$_SESSION['User']['MemberCode']." has created new member and placed under you. Member Information  ".$_POST['MemberName']." (".$MemberCode.") on ".date("M d, Y")."  ",$up[0]['MemberID']);
            }
                                                                            
            echo "<script>location.href='dashboard.php?action=Members/MemberCreated&MemID=".$MemberCode."&SpnID=".$_SESSION['User']['MemberCode']."&UpnCode=".$upline[0]['MemberCode']."';</script>";                                                                
        } 
        
    } else {
         $epins=$mysql->select("SELECT * FROM _tblEpins where `IsUsed`='0' and  OwnToID='".$_SESSION['User']['MemberID']."'   "); 
         if (sizeof($epins)==0) {
             
              echo "<script>location.href='dashboard.php?action=Members/EpinNotFound';</script>";      
         }
    }
?>
<div class="container-fluid" style="padding:25px;">
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
                                        <label>Epin<span style="color:red">*</span></label>
                                        <select class="form-control" disabled="disabled">
                                            <?php $userepins=$mysql->select("SELECT * FROM _tblEpins where `IsUsed`='0' and  OwnToID='".$_SESSION['User']['MemberID']."'   "); ?> 
                                            <?php foreach($userepins as $uepin) {?>
                                                <option value="<?php echo md5($uepin['EPINID'].$uepin['EPIN']);?>" <?php echo (isset($_POST['sel_epin']) && $_POST{'sel_epin'}==md5($uepin['EPINID'].$uepin['EPIN'])) ? " selected='selected' " : "";?> ><?php echo $uepin['EPIN'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Position : <?php echo $_POST['Code'];?></label>
                                        
                                        <input value="<?php echo $_POST['p']==1 ? "Left" : "Right";?>" class="form-control" disabled="disabled" type="text" style="text-align: center;font-weight:bold;color:red;font-size:20px;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Member Name<span style="color:red">*</span></label>
                                        <input value="<?php echo isset($_POST['MemberName']) ? $_POST['MemberName'] : "";?>" class="form-control" disabled="disabled" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender<span style="color:red">*</span></label>
                                        <select class="form-control" disabled="disabled">
                                            <option value="Male"><?php echo $_POST['Sex'];?></option> 
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
                                            <option><?php echo $_POST['month'];?></option>
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
                                    <input value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>" class="form-control" disabled="disabled" type="text">
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
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address Line 1</label>
                                    <input value="<?php echo isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] : "";?>" class="form-control" disabled="disabled" type="text">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Address Line 2</label>
                                    <input value="<?php echo isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] : "";?>" class="form-control" disabled="disabled" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control custom-select" disabled="disabled">
                                        <option value="India">India</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Pincode</label>
                                    <input value="<?php echo isset($_POST['PinCode']) ? $_POST['PinCode'] : "";?>" class="form-control" disabled="disabled" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">                                             
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password<span style="color:red">*</span></label>
                                    <input value="<?php echo isset($_POST['MemberPassword']) ? $_POST['MemberPassword'] : "";?>" class="form-control" disabled="disabled"  type="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm Password<span style="color:red">*</span></label>
                                    <input value="<?php echo isset($_POST['CMemberPassword']) ? $_POST['CMemberPassword'] : "";?>" class="form-control"  disabled="disabled" type="password">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 p-b-20"><hr></div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input name="terms" class="custom-control-input" <?php echo (isset($_POST['terms']) && $_POST['terms']=="on") ? " checked='checked' ": "";?> required="" data-validation-required-message="Please accept our Terms and Conditions" id="customCheck4" type="checkbox">
                                        <label class="custom-control-label" for="customCheck4">I Confirm to create Member. I have read and understood the  <a target="_blank" href="happylife2020.in/Policy">Terms and Conditions</a></label>
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