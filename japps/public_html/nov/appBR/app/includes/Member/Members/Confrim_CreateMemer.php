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
} else {
    $balance = getEarningWalletBalance($_SESSION['User']['MemberID']);     
    if (isset($_POST['submitBtn'])) {
        $error =0;     
        if ($_POST['terms']!="on"){
           $error++;
           $errorMsg = "Please enter valid Pancard Number.";
           $errorterms ="Please agree terms and conditions.";  
        }
        $cmember     = $mysql->select("select * from _tbl_Members where MemberCode='".$_SESSION['User']['MemberCode']."'"); 
        if ($_POST['txnPassword']!=$cmember[0]['MemberTxnPassword']) {
            $_SESSION['param']['txnPassword']=$_POST['txnPassword'];
            $error++;
            $errortxnPassword = "Invalid Transaction Password";  
            echo $errortxnPassword;
        }
        $_POST=$_SESSION['param'];
        
        if ($error==0) {
            
            $MemberCode = getMemberCode($_POST['MemberName']);
            $package    = $mysql->select("SELECT * FROM _tbl_Settings_Packages where IsActive='1' and PackageId='".$_POST['PackageID']."'");
            $password   = "AFP".rand(1000,200000);
            $upline     = $mysql->select("select * from _tbl_Members where MemberCode='".$_POST['Code']."'");
            //$member     = $mysql->select("select * from _tbl_Members where MemberCode='".$_SESSION['User']['MemberCode']."'");
            $member     = $mysql->select("select * from _tbl_Members where MemberCode='".$_POST['SponsorCode']."'");
              
            $MemberID = $mysql->insert("_tbl_Members",array("MemberCode"         => $MemberCode,
                                                            "MemberName"         => $_POST['MemberName'],
                                                            "DateofBirth"        => $_POST['year']."-".$_POST['month']."-".$_POST['date'],
                                                            "Sex"                => $_POST['Sex'],
                                                            "MobileNumber"       => trim($_POST['MobileNumber']),
                                                            "MemberEmail"        => trim($_POST['MemberEmail']),
                                                            "MemberPassword"     => $password,
                                                            "AddressLine1"       => isset($_POST['AddressLine1']) ? $_POST['AddressLine1']:"",
                                                            "AddressLine2"       => isset($_POST['AddressLine2']) ? $_POST['AddressLine2']:"" ,
                                                            "CityName"           => isset($_POST['CityName']) ? trim($_POST['CityName']) : "",
                                                            "PinCode"            => isset($_POST['PinCode']) ? trim($_POST['PinCode']) : "",
                                                            "PanCard"            => isset($_POST['PanCardNumber']) ? trim($_POST['PanCardNumber']) : "",
                                                            "IsActive"           => "1",
                                                            "CurrentPackageID"   => $package[0]['PackageID'],
                                                            "ActivePackageID"    => $package[0]['PackageID'],
                                                            "CurrentPackageName" => $package[0]['PackageName'],
                                                            "CreatedOn"          => date("Y-m-d H:i:s"),
                                                            "SponsorCode"        => $member[0]['MemberCode'],
                                                            "SponsorID"          => $member[0]['MemberID'],
                                                            "SponsorName"        => $member[0]['MemberName'],
                                                            "UplineID"           => $upline[0]['MemberID'],
                                                            "UplineCode"         => $upline[0]['MemberCode'],
                                                            "UplineName"         => $upline[0]['MemberName']));
                                                            
            $mysql->insert("_tbl_bank_info",array("AccountHolderName" => $_POST['AccountHolderName'],
                                                  "AccountNumber"     => $_POST['AccountNumber'],
                                                  "IFSCode"           => $_POST['IFSCode'],
                                                  "MemberCode"        => $MemberCode));
            
            $roi = $mysql->select("select * from _tbl_roi_dates where date(TDate)>=date('".date("Y-m-d")."')  limit ".$package[0]['ROI_Booster_Apply_Before'].",1");                                             
            $Member_Package_RefID = $mysql->insert("_tbl_Members_Packages",array("MemberID"           => $MemberID,
                                                                                 "PackageID"          => $package[0]['PackageID'],
                                                                                 "PackageActivatedOn" => date("Y-m-d H:i:s"),
                                                                                 "BooserExpireOn"     => $roi[0]['TDate'],
                                                                                 "PackageName"        => $package[0]['PackageName'],
                                                                                 "PackageCost"        => $package[0]['PackageAmount']));
                                                                                 
            $mysql->execute("update _tbl_Members set ActivePackageRefID='".$Member_Package_RefID."' where MemberID='".$MemberID."'");
            
            /*Start Placement Process*/                                                                                     
            $mysql->insert("_tblPlacements",array("ParentID"      => $upline[0]['MemberID'],
                                                  "ParentCode"    => $upline[0]['MemberCode'],
                                                  "ParentName"    => $upline[0]['MemberName'],
                                                  "ChildID"       => $MemberID,
                                                  "ChildCode"     => $MemberCode,
                                                  "ChildName"     => $_POST['MemberName'],
                                                  "PlacedByID"    => $member[0]['MemberID'],
                                                  "PlacedByCode"  => $member[0]['MemberCode'],
                                                  "PlacedByName"  => $member[0]['MemberName'],               
                                                  "PlacedOn"      => date("Y-m-d H:i:s"),
                                                  "PlacedFrom"    => "portal-tree",
                                                  "PV"            => $package[0]['PV'],
                                                  "PackageID"     => $package[0]['PackageID'],
                                                  "UsedEPin"      => "",
                                                  "Position"      => $_POST['p']==1 ? "L" : "R"));
            if ($_POST['p']==1) {
               $mysql->execute("update _tbl_Members set DirectLeft='".($member[0]['DirectLeft']+1)."' where MemberID='".$member[0]['MemberID']."'"); 
            } else {
                $mysql->execute("update _tbl_Members set DirectRight='".($member[0]['DirectRight']+1)."'  where MemberID='".$member[0]['MemberID']."'"); 
            }
            
            $memberPackage = $mysql->select("select * from _tbl_Settings_Packages where PackageID='".$member[0]['ActivePackageID']."'");
            if ($package[0]['PackageAmount']>$memberPackage[0]['PackageAmount'])  {
                 if ($_POST['p']==1) {
                    $mysql->execute("update _tbl_Members set HDirectLeft='".($member[0]['HDirectLeft']+1)."'  where MemberID='".$member[0]['MemberID']."'"); 
                 } else {
                    $mysql->execute("update _tbl_Members set HDirectRight='".($member[0]['HDirectRight']+1)."'  where MemberID='".$member[0]['MemberID']."'"); 
                 }
            }
            /*End Placement Process*/
            
            /*Start Debit Package Cost from Member*/
            $mysql->insert("_tbl_wallet_earnings",array("MemberID"         => $member[0]['MemberID'],
                                                        "MemberCode"       => $member[0]['MemberCode'],
                                                        "Particulars"      => "Registration [".$package[0]['PackageName']."] [".$MemberCode."]",
                                                        "TxnDate"          => date("Y-m-d H:i:s"),
                                                        "Credits"          => "0",
                                                        "Debits"           => $package[0]['PackageAmount'],
                                                        "AvailableBalance" => $balance-$package[0]['PackageAmount'],
                                                        "details"          => "Direct Registration",
                                                        "Ledger"           => "100001"));
            /*End Debit Package Cost from Member*/
                                                        
            /*Start Process for Member's Package ROI Schedules*/
            $roi = $mysql->select("select * from _tbl_roi_dates where date(TDate)>=date('".date("Y-m-d")."') limit ".$package[0]['ROI_StartDay'].",".$package[0]['ROI_Days']);
            $package_roi_payout_id = $mysql->insert("_roi_payouts",array("MemberID"      => $MemberID,
                                                                         "MemberCode"    => $MemberCode,
                                                                         "ROIStarted"    => $roi[0]['TDate'],
                                                                         "ROIEnted"      => $roi[sizeof($roi)-1]['TDate'],
                                                                         "PackageID"     => $package[0]['PackageID'],
                                                                         "PackageName"   => $package[0]['PackageName'],
                                                                         "TypeString"    => "Package ROI",
                                                                         "ROI_TYPE"      => "1",
                                                                         "RMemberID"     => "0",
                                                                         "RMemberCode"   => "0",
                                                                         "DaysCompleted" => "0"));
                                                                          
            $mysql->execute("update _tbl_Members_Packages set ROI_PayoutID='".$package_roi_payout_id."' where  MemberPackageID='".$member[0]['ActivePackageRefID']."'");
            
            foreach($roi as $r) {
                $mysql->insert("_roi_payments",array("MemberID"     => $MemberID,
                                                     "MemberCode"   => $MemberCode,
                                                     "ROI_DATE"     => $r['TDate'],
                                                     "ROI_AMT"      => str_replace(",","",number_format($package[0]['PackageAmount']*($package[0]['ROI']/100),2)),
                                                     "IsSettled"    => "0",
                                                     "RecordOn"     => date("Y-m-d H:i:s"),
                                                     "PackageID"    => $package[0]['PackageID'],
                                                     "ROI_PayoutID" => $package_roi_payout_id,
                                                     "ROI_TYPE"     => "1"));
            }
            /*End Process for Member's Package ROI Schedules*/
            
           
            /*Start Process Direct Referal ROI Schedules for Logged Member */
            $roi = $mysql->select("select * from _tbl_roi_dates where date(TDate)>=date('".date("Y-m-d")."') limit 1,".$package[0]['DirectReferal_Days']);
            $referral_roi_payout_id = $mysql->insert("_roi_payouts",array("MemberID"      => $member[0]['MemberID'],
                                                                          "MemberCode"    => $MemberCode,
                                                                          "ROIStarted"    => $roi[0]['TDate'],
                                                                          "ROIEnted"      => $roi[sizeof($roi)-1]['TDate'],
                                                                          "PackageID"     => $package[0]['PackageID'],
                                                                          "PackageName"   => $package[0]['PackageName'],
                                                                          "TypeString"    => "Referral ROI",
                                                                          "ROI_TYPE"      => "2",
                                                                          "RMemberID"     => $MemberID,
                                                                          "RMemberCode"   => $MemberCode,
                                                                          "DaysCompleted" => "0"));
                                                                           
            foreach($roi as $r) {
                $mysql->insert("_roi_payments",array("MemberID"     => $member[0]['MemberID'],
                                                     "MemberCode"   => $member[0]['MemberCode'],
                                                     "ROI_DATE"     => $r['TDate'],
                                                     "ROI_AMT"      => str_replace(",","",number_format($package[0]['PackageAmount']*($package[0]['DirectReferalCommission']/100),2)),
                                                     "IsSettled"    => "0",
                                                     "RecordOn"     => date("Y-m-d H:i:s"),
                                                     "PackageID"    => $package[0]['PackageID'],
                                                     "ROI_PayoutID" => $referral_roi_payout_id,
                                                     "ROI_TYPE"     => "2"));
            }
            /*End Process Direct Referal ROI Schedules for Logged Member */
            
            /*Start Process to enable Booster */
            $MemberActivePackage = $mysql->select("SELECT * FROM _tbl_Members_Packages where Date('".date("Y-m-d")."')<=Date(BooserExpireOn) and MemberPackageID='".$member[0]['ActivePackageRefID']."'");
            $booster_pack_started=false;

            if (sizeof($MemberActivePackage)>0 && $MemberActivePackage[0]['BoosterEnabled']==0) {
                $Check_Eligibility = $mysql->select("select * from _tbl_Members where MemberID='".$member[0]['MemberID']."' and HDirectLeft>=1 and HDirectRight>=1");
                if (sizeof($Check_Eligibility)==1){
                    $booster_pack_started = true;
                    $mysql->execute("update _tbl_Members_Packages set BoosterEnabled='1', BoosterEnabledOn='".date("Y-m-d H:i:s")."' where  MemberPackageID='".$MemberActivePackage[0]['PackageID']."'");
                }
            }
            /*End Process to enable Booster */
            
            /*Start Process Direct Referal ROI Schedules for Logged Member */
            if ($booster_pack_started) {
                
                $MemberActivePackageInfo = $mysql->select("SELECT * FROM _tbl_Settings_Packages where PackageID='".$MemberActivePackage[0]['PackageID']."'");
                //$mysql->execute("delete _roi_payments where ROI_PayoutID='".$MemberActivePackageInfo[0]['ROI_PayoutID']."'");
               
                $mysql->execute("delete _roi_payments where ROI_PayoutID='".$MemberActivePackage[0]['ROI_PayoutID']."'");
                
                $roi = $mysql->select("select * from _tbl_roi_dates where date(TDate)>=date('".date("Y-m-d",strtotime($MemberActivePackage[0]['PackageActivatedOn']))."') limit ".$MemberActivePackage[0]['ROI_StartDay'].",".$MemberActivePackageInfo[0]['ROI_Booster_Days']);
                $referral_roi_payout_id = $mysql->insert("_roi_payouts",array("MemberID"      => $member[0]['MemberID'],
                                                                              "MemberCode"    => $MemberCode,
                                                                              "ROIStarted"    => $roi[0]['TDate'],
                                                                              "ROIEnted"      => $roi[sizeof($roi)-1]['TDate'],
                                                                              "PackageID"     => $package[0]['PackageID'],
                                                                              "PackageName"   => $package[0]['PackageName'],
                                                                              "TypeString"    => "Package Booster ROI",
                                                                              "ROI_TYPE"      => "3",
                                                                              "RMemberID"     => $MemberID,
                                                                              "RMemberCode"   => $MemberCode,
                                                                              "DaysCompleted" => "0")); 
                
                $mysql->execute("update _tbl_Members_Packages set ROI_PayoutID='".$referral_roi_payout_id."' where  MemberPackageID='".$member[0]['ActivePackageRefID']."'");
                
                foreach($roi as $r) {
                    $mysql->insert("_roi_payments",array("MemberID"     => $member[0]['MemberID'],
                                                         "MemberCode"   => $member[0]['MemberCode'],
                                                         "ROI_DATE"     => $r['TDate'],
                                                         "ROI_AMT"      => str_replace(",","",number_format($package[0]['PackageAmount']*($package[0]['ROI_Booster_Commission']/100),2)),
                                                         "IsSettled"    => "0",
                                                         "RecordOn"     => date("Y-m-d H:i:s"),
                                                         "PackageID"    => $package[0]['PackageID'],
                                                         "ROI_PayoutID" => $referral_roi_payout_id,
                                                         "ROI_TYPE"     => "2"));
                }
            }
            /*End Process Direct Referal ROI Schedules for Logged Member */

            //MobileSMS::sendSMS($_POST['MobileNumber'],"Dear ".$_POST['MemberName'].", Your account has been created. Your Member ID: ".$MemberCode." and Password: ".$_POST['MemberPassword']." on ".date("M d, Y").". Login Url: ".loginUrl,$MemberID);
            if ($member[0]['MemberID']==$upline[0]['MemberID']) {
              //  MobileSMS::sendSMS($_SESSION['User']['MobileNumber'],"Dear ".$_SESSION['User']['MemberName'].", Your have created a member ".$_POST['MemberName']."(".$MemberCode.") on ".date("M d, Y")."  ",$_SESSION['User']['MemberID']);
            } else {
               // MobileSMS::sendSMS($_SESSION['User']['MobileNumber'],"Dear ".$_SESSION['User']['MemberName'].", Your have created a member ".$_POST['MemberName']."(".$MemberCode.") on ".date("M d, Y")."  ",$_SESSION['User']['MemberID']);
                $up = $mysql->select("select * from _tbl_Members where MemberID='".$upline[0]['MemberID']."'");
               // MobileSMS::sendSMS($up[0]['MobileNumber'],"Dear ".$up[0]['MemberName'].", ".$_SESSION['User']['MemberCode']." has created new member and placed under you. Member Information  ".$_POST['MemberName']." (".$MemberCode.") on ".date("M d, Y")."  ",$up[0]['MemberID']);
            }
            echo "<script>location.href='dashboard.php?action=Members/MemberCreated&Mem=".md5("j2j".$MemberCode)."';</script>";                                                                
            exit;
        } 
    } else {
        $_POST=$_SESSION['param'];
    }   
?>
<div class="container-fluid" style="padding:25px">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-light-green">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Confirmation</h4>
                </div>
                <div class="form-body" style="background:#e5e5e5;"> 
                    <form action="" class="validation-wizard clearfix" role="application" id="steps-uid-7" novalidate="novalidate" method="post">
                        <div class="card-body"> 
                        <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label style="margin-bottom:0px">Sponsor ID</label>
                                        <input value="<?php echo $_POST['Code'];?>" class="form-control" disabled="disabled" type="text" style="padding-left:0px;padding-top: 0px;padding-bottom: 0px;">
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label style="margin-bottom:0px">Position</label>
                                        <input value="<?php echo $_POST['p']==1 ? "Left" : "Right";?>" class="form-control" disabled="disabled" type="text" style="text-align: <?php echo $_POST['p']==1 ? "Left" : "Right";?>;font-weight:bold;color:red;padding-left:0px;padding-top: 0px;padding-bottom: 0px;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <?php $package=$mysql->select("SELECT * FROM _tbl_Settings_Packages where IsActive='1' and PackageID='".$_POST['PackageID']."'"); ?> 
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label style="margin-bottom:0px">Package</label>
                                        <input value="<?php echo $package[0]['PackageName'];?> - $<?php echo $package[0]['PackageAmount'];?>" class="form-control" disabled="disabled" type="text"  style="padding-left:0px;padding-top: 0px;padding-bottom: 0px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label style="margin-bottom:0px">Member Name</label>
                                        <input  value="<?php echo isset($_POST['MemberName']) ? $_POST['MemberName'] : "";?>" class="form-control"  disabled="disabled" type="text"  style="padding-left:0px;padding-top: 0px;padding-bottom: 0px;">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="margin-bottom:0px">Gender</label>
                                        <input  value="<?php echo isset($_POST['Sex']) ? $_POST['Sex'] : "";?>" class="form-control"  disabled="disabled" type="text"  style="padding-left:0px;padding-top: 0px;padding-bottom: 0px;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="margin-bottom:0px">Date of Birth</label>
                                        <input value="<?php echo date("M d, Y",strtotime($_POST['year']."-".$_POST['month']."-".$_POST['date']));?>" class="form-control" disabled="disabled" type="text"  style="padding-left:0px;padding-top: 0px;padding-bottom: 0px;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" id="email-exists">
                                        <label style="margin-bottom:0px">Email</label>
                                        <input value="<?php echo ( isset($_POST['MemberEmail']) && strlen(trim($_POST['MemberEmail'])) ) ? $_POST['MemberEmail'] : "N/A";?>" class="form-control" disabled="disabled" type="text"  style="padding-left:0px;padding-top: 0px;padding-bottom: 0px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="margin-bottom:0px">Mobile Number</label>
                                        <input value="+91 <?php echo ( isset($_POST['MobileNumber']) && strlen(trim($_POST['MobileNumber'])) ) ? $_POST['MobileNumber'] : "N/A";?>" class="form-control" disabled="disabled"  type="text"  style="padding-left:0px;padding-top: 0px;padding-bottom: 0px;">
                                    </div>
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="margin-bottom:0px">Address Line 1</label>
                                        <input value="<?php echo ( isset($_POST['AddressLine1']) && strlen(trim($_POST['AddressLine1'])) ) ? $_POST['AddressLine1'] : "N/A";?>" class="form-control" disabled="disabled" type="text"  style="padding-left:0px;padding-top: 0px;padding-bottom: 0px;">
                                        <div class="help-block" style="color:red"><?php echo $errorAddressLine1;?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="margin-bottom:0px">Address Line 2</label>
                                        <input value="<?php echo ( isset($_POST['AddressLine2']) && strlen(trim($_POST['AddressLine2'])) ) ? $_POST['AddressLine2'] : "N/A";?>" class="form-control"  disabled="disabled" type="text"  style="padding-left:0px;padding-top: 0px;padding-bottom: 0px;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="margin-bottom:0px">City Name</label>
                                        <input value="<?php echo ( isset($_POST['CityName']) && strlen(trim($_POST['CityName'])) ) ? $_POST['CityName'] : "N/A";?>" class="form-control"  disabled="disabled" type="text"  style="padding-left:0px;padding-top: 0px;padding-bottom: 0px;">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="margin-bottom:0px">Pincode</label>
                                        <input disabled="disabled" value="<?php echo ( isset($_POST['PinCode']) && strlen(trim($_POST['PinCode'])) ) ? $_POST['PinCode'] : "N/A";?>" class="form-control" disabled="disabled" type="text"  style="padding-left:0px;padding-top: 0px;padding-bottom: 0px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 p-b-20"><hr></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="margin-bottom:0px">PanCard Number</label>
                                        <input value="<?php echo ( isset($_POST['PanCardNumber']) && strlen(trim($_POST['PanCardNumber'])) ) ? $_POST['PanCardNumber'] : "N/A";?>" class="form-control"  disabled="disabled" type="text"  style="padding-left:0px;padding-top: 0px;padding-bottom: 0px;">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 p-b-20"><hr></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="margin-bottom:0px">Account Holder Name</label>
                                        <input value="<?php echo ( isset($_POST['AccountHolderName']) && strlen(trim($_POST['AccountHolderName'])) ) ? $_POST['AccountHolderName'] : "N/A";?>" class="form-control"  disabled="disabled" type="text"  style="padding-left:0px;padding-top: 0px;padding-bottom: 0px;">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="margin-bottom:0px">Account Number</label>
                                        <input value="<?php echo ( isset($_POST['AccountNumber']) && strlen(trim($_POST['AccountNumber'])) ) ? $_POST['AccountNumber'] : "N/A";?>" class="form-control"  disabled="disabled" type="text"  style="padding-left:0px;padding-top: 0px;padding-bottom: 0px;">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="margin-bottom:0px">IFSCode</label>
                                        <input value="<?php echo ( isset($_POST['IFSCode']) && strlen(trim($_POST['IFSCode'])) ) ? $_POST['IFSCode'] : "N/A";?>" class="form-control"  disabled="disabled" type="text"  style="padding-left:0px;padding-top: 0px;padding-bottom: 0px;">
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 p-b-20"><hr></div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input name="terms" class="custom-control-input" <?php echo (isset($_POST['terms']) && $_POST['terms']=="on") ? " checked='checked' ": "";?> required="" data-validation-required-message="Please accept our Terms and Conditions" id="customCheck4" type="checkbox">
                                        <label class="custom-control-label" for="customCheck4">I Confirm to create Member. I have read and understood the  <a target="_blank" href="Terms.php">Terms and Conditions</a></label>
                                        <div class="help-block" style="color:red"><?php echo $errorterms;?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6" style="padding-left:0px;">
                                    <label for="password">Transaction Password<span style="color:red">*</span></label>
                                    <input class="form-control" id="txnPassword" name="txnPassword" placeholder="Transaction Password" required="" type="password" value="<?php echo (isset($_POST['txnPassword']) ? $_POST['txnPassword'] : "");?>">
                                    <div class="help-block" style="color:red"><?php echo $errortxnPassword;?></div>
                                </div>
                            </div>
                            <div class="form-group m-b-0 text-left">
                                <div style="font-size:12px;font-weight:normal">Note: $<?php echo $package[0]['PackageAmount'];?> will debit from your wallet and create new member when click "Create Member"</div><br>
                                <a href="dashboard.php" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                <button type="submit" name="submitBtn" class="btn btn-primary waves-effect waves-light">Create Member</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>