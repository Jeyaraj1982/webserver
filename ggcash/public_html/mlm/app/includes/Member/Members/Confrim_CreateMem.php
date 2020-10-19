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
    if (!(isset($_SESSION['param']) && sizeof($_SESSION['param'])>0)) {
?>
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
        
        if (!(getUtilityhWalletBalance($_SESSION['User']['MemberID'])>=1000)) {
             $error++;
            $errorMsg = "Insufficiant Balance.";
            $errorterms ="Insufficiant Balance..";  
        }
        
        $_POST=$_SESSION['param']; 
       

       
       function ShareIncomes($last_node_code) {
           
           global $mysql;
           $level = $mysql->select("select * from _tblPlacements where ChildCode='".$last_node_code."'");
            
           if (sizeof($level)>0) {
               $share_level_1_income=20;
               $mysql->insert("_tbl_wallet_utility",array("MemberID"         => $level[0]['ParentID'],
                                                          "TxnDate"          => date("Y-m-d H:i:s"),
                                                          "Particulars"      => "Create Member/Level-1/Income".$last_node_code,
                                                          "Credits"          => $share_level_1_income,
                                                          "Debits"           => "0",
                                                          "LevelID"          => "1",
                                                          "AvailableBalance" => (getUtilityhWalletBalance($level[0]['ParentID']+$share_level_1_income))));
                
               $level_1 = $mysql->select("select * from _tblPlacements where ChildCode='".$level[0]['ParentCode']."'");
               if (sizeof($level_1)>0) {
                   $share_level_2_income=10;
                   $mysql->insert("_tbl_wallet_utility",array("MemberID"         => $level_1[0]['ParentID'],
                                                              "TxnDate"          => date("Y-m-d H:i:s"),
                                                              "Particulars"      => "Create Member/Level-2/Income".$last_node_code,
                                                              "Credits"          => $share_level_2_income,
                                                              "Debits"           => "0",
                                                              "LevelID"          => "2",
                                                              "AvailableBalance" => (getUtilityhWalletBalance($level_1[0]['ParentID']+$share_level_2_income))));
                   $level_2 = $mysql->select("select * from _tblPlacements where ChildCode='".$level_1[0]['ParentCode']."'");
                   if (sizeof($level_2)>0) {
                       $share_level_3_income=10;
                       $mysql->insert("_tbl_wallet_utility",array("MemberID"         => $level_2[0]['ParentID'],
                                                                  "TxnDate"          => date("Y-m-d H:i:s"),
                                                                  "Particulars"      => "Create Member/Level-3/Income".$last_node_code,
                                                                  "Credits"          => $share_level_3_income,
                                                                  "Debits"           => "0",
                                                                  "LevelID"          => "3",
                                                                  "AvailableBalance" => (getUtilityhWalletBalance($level_2[0]['ParentID']+$share_level_3_income))));
                        
                       $level_3 = $mysql->select("select * from _tblPlacements where ChildCode='".$level_2[0]['ParentCode']."'");                                           
                       if (sizeof($level_3)>0) {
                           $share_level_4_income=10;
                           $mysql->insert("_tbl_wallet_utility",array("MemberID"         => $level_3[0]['ParentID'],
                                                                      "TxnDate"          => date("Y-m-d H:i:s"),
                                                                      "Particulars"      => "Create Member/Level-4/Income".$last_node_code,
                                                                      "Credits"          => $share_level_4_income,
                                                                      "Debits"           => "0",
                                                                      "LevelID"          => "4",
                                                                      "AvailableBalance" => (getUtilityhWalletBalance($level_3[0]['ParentID']+$share_level_4_income))));
                           $level_4 = $mysql->select("select * from _tblPlacements where ChildCode='".$level_3[0]['ParentCode']."'");                                           
                           if (sizeof($level_4)>0) {
                               $share_level_5_income=10;
                               $mysql->insert("_tbl_wallet_utility",array("MemberID"         => $level_4[0]['ParentID'],
                                                                          "TxnDate"          => date("Y-m-d H:i:s"),
                                                                          "Particulars"      => "Create Member/Level-5/Income".$last_node_code,
                                                                          "Credits"          => $share_level_5_income,
                                                                          "Debits"           => "0",
                                                                          "LevelID"          => "5",
                                                                          "AvailableBalance" => (getUtilityhWalletBalance($level_4[0]['ParentID']+$share_level_5_income))));
                               $level_5 = $mysql->select("select * from _tblPlacements where ChildCode='".$level_4[0]['ParentCode']."'");                                           
                               if (sizeof($level_5)>0) {
                                   $share_level_6_income=10;
                                   $mysql->insert("_tbl_wallet_utility",array("MemberID"         => $level_5[0]['ParentID'],
                                                                              "TxnDate"          => date("Y-m-d H:i:s"),
                                                                              "Particulars"      => "Create Member/Level-6/Income".$last_node_code,
                                                                              "Credits"          => $share_level_6_income,
                                                                              "Debits"           => "0",
                                                                              "LevelID"          => "6",
                                                                              "AvailableBalance" => (getUtilityhWalletBalance($level_5[0]['ParentID']+$share_level_6_income))));
                                                                           
                                   $level_6 = $mysql->select("select * from _tblPlacements where ChildCode='".$level_5[0]['ParentCode']."'");                                           
                                   if (sizeof($level_6)>0) {
                                       $share_level_7_income=10;
                                       $mysql->insert("_tbl_wallet_utility",array("MemberID"         => $level_6[0]['ParentID'],
                                                                                  "TxnDate"          => date("Y-m-d H:i:s"),
                                                                                  "Particulars"      => "Create Member/Level-7/Income".$last_node_code,
                                                                                  "Credits"          => $share_level_7_income,
                                                                                  "Debits"           => "0",
                                                                                  "LevelID"          => "7",
                                                                                  "AvailableBalance" => (getUtilityhWalletBalance($level_6[0]['ParentID']+$share_level_7_income))));
                                     
                                       $level_7 = $mysql->select("select * from _tblPlacements where ChildCode='".$level_6[0]['ParentCode']."'");                                           
                                       if (sizeof($level_7)>0) {
                                           $share_level_8_income=10;
                                           $mysql->insert("_tbl_wallet_utility",array("MemberID"         => $level_7[0]['ParentID'],
                                                                                      "TxnDate"          => date("Y-m-d H:i:s"),
                                                                                      "Particulars"      => "Create Member/Level-8/Income".$last_node_code,
                                                                                      "Credits"          => $share_level_8_income,
                                                                                      "Debits"           => "0",
                                                                                      "LevelID"          => "8",
                                                                                      "AvailableBalance" => (getUtilityhWalletBalance($level_7[0]['ParentID']+$share_level_8_income))));
                                            
                                           $level_8 = $mysql->select("select * from _tblPlacements where ChildCode='".$level_7[0]['ParentCode']."'");                                           
                                            if (sizeof($level_8)>0) {
                                                $share_level_9_income=10;
                                                $mysql->insert("_tbl_wallet_utility",array("MemberID"         => $level_8[0]['ParentID'],
                                                                                           "TxnDate"          => date("Y-m-d H:i:s"),
                                                                                           "Particulars"      => "Create Member/Level-9/Income".$last_node_code,
                                                                                           "Credits"          => $share_level_9_income,
                                                                                           "Debits"           => "0",
                                                                                           "LevelID"          => "9",
                                                                                           "AvailableBalance" => (getUtilityhWalletBalance($level_8[0]['ParentID']+$share_level_9_income))));
                                                                                           
                                                $level_9 = $mysql->select("select * from _tblPlacements where ChildCode='".$level_8[0]['ParentCode']."'");                                           
                                                if (sizeof($level_9)>0) {
                                                    $share_level_10_income=10;
                                                    $mysql->insert("_tbl_wallet_utility",array("MemberID"         => $level_9[0]['ParentID'],
                                                                                               "TxnDate"          => date("Y-m-d H:i:s"),
                                                                                               "Particulars"      => "Create Member/Level-10/Income".$last_node_code,
                                                                                               "Credits"          => $share_level_10_income,
                                                                                               "Debits"           => "0",
                                                                                               "LevelID"          => "10",
                                                                                               "AvailableBalance" => (getUtilityhWalletBalance($level_9[0]['ParentID']+$share_level_10_income))));
                                                    $level_10 = $mysql->select("select * from _tblPlacements where ChildCode='".$level_9[0]['ParentCode']."'");                                           
                                                    if (sizeof($level_10)>0) {
                                                        $share_level_11_income=10;
                                                        $mysql->insert("_tbl_wallet_utility",array("MemberID"         => $level_10[0]['ParentID'],
                                                                                                   "TxnDate"          => date("Y-m-d H:i:s"),
                                                                                                   "Particulars"      => "Create Member/Level-11/Income".$last_node_code,
                                                                                                   "Credits"          => $share_level_11_income,
                                                                                                   "Debits"           => "0",
                                                                                                   "LevelID"          => "10",
                                                                                                   "AvailableBalance" => (getUtilityhWalletBalance($level_10[0]['ParentID']+$share_level_11_income))));
                                                    }
                                                }
                                            }
                                        }
                                     }
                                }
                            }
                        }
                    }
                }
            }
        }   
         
        if ($error==0) {
           
           // $e_pin = $mysql->select("select * from  `_tblEpins` where `IsUsed`='0' and  md5(concat(EPINID,EPIN))='".$_POST['sel_epin']."'");                                                  
            //$e_pin = $mysql->select("select * from `_tblEpins` where  md5(concat(EPINID,EPIN))='".$_POST['sel_epin']."'");                                                  
            $MemberCode = getMemberCode($_POST['MemberName']);
            
            $PV = $e_pin[0]['PackagePV'];                                                              
            $package_id = $e_pin[0]['PackageID'];  
            $upline = $mysql->select("select * from _tbl_Members where MemberCode='".$_POST['Code']."'");
            $upline = $mysql->select("select * from _tbl_Members where MemberCode='". $_SESSION['User']['MemberCode']."'");
            $MemberID =  $mysql->insert("_tbl_Members",array("MemberCode"      => $MemberCode,
                                                             "MemberName"      => $_POST['MemberName'],
                                                             "DateofBirth"     => $_POST['DateofBirth'],
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
                                                             "CurrentPackageID"   => "1",
                                                             "CurrentPackageName" => "Default Pacakge",
                                                             "CreatedOn"       => date("Y-m-d H:i:s"),
                                                             "SponsorCode"     => $_SESSION['User']['MemberCode'],
                                                             "SponsorID"       => $_SESSION['User']['MemberID'],
                                                             "SponsorName"     => $_SESSION['User']['MemberName'],
                                                             "UplineID"        => $upline[0]['MemberID'],
                                                             "UplineCode"      => $upline[0]['MemberCode'],
                                                             "UplineName"      => $upline[0]['MemberName']));
                                                                                                 
            $mysql->insert("_tblPlacements",array("ParentID"      => $upline[0]['MemberID'],
                                                  "ParentCode"    => $upline[0]['MemberCode'],
                                                  "ParentName"    => $upline[0]['MemberName'],
                                                  "ChildID"       => $MemberID,
                                                  "ChildCode"     => $MemberCode,
                                                  "ChildName"     => $_POST['MemberName'],
                                                  "PlacedByID"    => $_SESSION['User']['MemberID'],
                                                  "PlacedByCode"  => $_SESSION['User']['MemberCode'],
                                                  "PlacedByName"  => $_SESSION['User']['MemberName'],               
                                                  "PlacedOn"      => date("Y-m-d H:i:s"),
                                                  "PlacedFrom"    => "portal-form",
                                                  "PV"            => "0",
                                                  "PackageID"     => "1",
                                                  "UsedEPin"      => "",
                                                  "Position"      => $_POST['p']==1 ? "L" : "R"));
            $mysql->insert("_tbl_wallet_utility",array("MemberID"=>$_SESSION['User']['MemberID'],
                                                       "TxnDate"=>date("Y-m-d H:i:s"),
                                                       "Particulars"=>"Create Member/".$MemberCode,
                                                       "Credits"=>"0",
                                                       "Debits"=>"1000",
                                                       "AvailableBalance"=>(getUtilityhWalletBalance($_SESSION['User']['MemberID']-1000))));
            ShareIncomes($MemberCode);
             
            //$mysql->execute("update `_tblEpins` set `IsUsed`='1', `UsedOn`='".date("Y-m-d H:i:s")."',`UsedForID`='".$MemberID."',`UserForCode`='".$MemberCode."',`UsedForName`='".$_POST['MemberName']."' where md5(concat(EPINID,EPIN))='".$_POST['sel_epin']."'");
            
            //MobileSMS::sendSMS($_POST['MobileNumber'],"Dear ".$_POST['MemberName'].", Your account has been created. Your Member ID: ".$MemberCode." and Password: ".$_POST['MemberPassword']." on ".date("M d, Y").". Login Url: ".loginUrl,$MemberID);
            if ($_SESSION['User']['MemberID']==$upline[0]['MemberID']) {
              //  MobileSMS::sendSMS($_SESSION['User']['MobileNumber'],"Dear ".$_SESSION['User']['MemberName'].", Your have created a member ".$_POST['MemberName']."(".$MemberCode.") on ".date("M d, Y")."  ",$_SESSION['User']['MemberID']);
            } else {
               // MobileSMS::sendSMS($_SESSION['User']['MobileNumber'],"Dear ".$_SESSION['User']['MemberName'].", Your have created a member ".$_POST['MemberName']."(".$MemberCode.") on ".date("M d, Y")."  ",$_SESSION['User']['MemberID']);
                $up = $mysql->select("select * from _tbl_Members where MemberID='".$upline[0]['MemberID']."'");
               // MobileSMS::sendSMS($up[0]['MobileNumber'],"Dear ".$up[0]['MemberName'].", ".$_SESSION['User']['MemberCode']." has created new member and placed under you. Member Information  ".$_POST['MemberName']." (".$MemberCode.") on ".date("M d, Y")."  ",$up[0]['MemberID']);
            }
            echo "<script>location.href='dashboard.php?action=Members/MemberCreated&MemID=".$MemberCode."&SpnID=".$_SESSION['User']['MemberCode']."&UpnCode=".$upline[0]['MemberCode']."';</script>";                                                                
        } 
        
    }  else {
        $_POST=$_SESSION['param'];
       //  $epins=$mysql->select("SELECT * FROM _tblEpins where `IsUsed`='0' and OwnToID='".$_SESSION['User']['MemberID']."' "); 
        // if (sizeof($epins)==0) {
          //    echo "<script>location.href='dashboard.php?action=Members/EpinNotFound';</script>";      
        // }
    }
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
                        <div class="card-body"> 
                             
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Member Name</label>
                                        <input  value="<?php echo isset($_POST['MemberName']) ? $_POST['MemberName'] : "";?>" class="form-control"  disabled="disabled" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control" disabled="disabled">
                                            <option><?php echo $_POST['Sex'];?></option> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input  value="<?php echo isset($_POST['DateofBirth']) ? $_POST['DateofBirth'] : "";?>" class="form-control"  disabled="disabled" type="text"><br>
                                        
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
                                        <label>Mobile Number</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">+91</span>
                                            </div>
                                            <input value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>" class="form-control" disabled="disabled"  type="text">
                                        </div>
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
                                    <label>Password</label>
                                        <input value="<?php echo isset($_POST['MemberPassword']) ? $_POST['MemberPassword'] : "";?>" id="MemberPassword" class="form-control" disabled="disabled"  type="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input value="<?php echo isset($_POST['CMemberPassword']) ? $_POST['CMemberPassword'] : "";?>" id="CMemberPassword" class="form-control"  disabled="disabled" type="password">
                                </div>
                            </div>
                        </div>
                            <div class="col-12 p-b-20"><hr></div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input name="terms" class="custom-control-input" <?php echo (isset($_POST['terms']) && $_POST['terms']=="on") ? " checked='checked' ": "";?> required="" data-validation-required-message="Please accept our Terms and Conditions" id="customCheck4" type="checkbox">
                                        <label class="custom-control-label" for="customCheck4">I Confirm to create Member. I have read and understood the  <a target="_blank" href="https://www.ggcash.in/Policy">Terms and Conditions</a></label>
                                        <div class="help-block" style="color:red"><?php echo $errorterms;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group m-b-0 text-right">
                                    <a href="dashboard.php?action=Members/CreateMember" class="btn btn-danger waves-effect waves-light">Cancel</a>
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