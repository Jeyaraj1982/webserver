<?php
    include_once("config.php");
    include_once("includes/header.php");
?>
    <main role="main">
        <header class="section background-primary background-transparent text-center" data-image-src="assets/img/parallax-02.jpg" style="padding:50px !important">
            <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Join Now</h1>
            <div class="background-parallax" style="background-image:url(assets/img/parallax-06.jpg)"></div>
        </header>
        <div class="section background-white">
            <div class="line">
                <div class="margin" style="max-width: 1000px;margin:0px auto;">
                <h2 class="text-size-30" style="text-align: center;">Member Registration</h2>
                <p class="lead text-center"></p>
                <div class="bg-light shadow-md rounded p-4 mx-2">
                    <?php
                        if (isset($_POST['CreateBtn'])) {
                            $error = 0;
                           
                            if (!(strlen(trim($_POST['MemberName']))>3)) {
                                $error++;
                                $errorMsg = "Please enter member name.";
                                $errorMember ="Please enter member name.";                  
                            }
                            
                            if (!(strlen(trim($_POST['MemberName']))>3)) {
                                $error++;
                                $errorMsg = "Please enter member name.";          
                                $errorMember ="Please enter member name.";
                            }
                            
                            $mem = $mysql->select("select * from _tbl_Members where MobileNumber='".$_POST['ReferralsCode']."' ");
                            if (sizeof($mem)==0) {
                                $error++;
                                $errorMsg = "Invalid Referral Code";          
                                $errorReferralsCode ="Invalid Referral Code.";
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
                                        $errorMsg = "Please enter valid mobile number.";
                                        $errorMobile ="Mobile Number already used.";
                                    }
                                }
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
                                        $errorMsg = "Please enter valid mobile number.";
                                        $errorEmail ="Email ID already used.";
                                    }
                                }
                            }
        
                            $pancard_mandatory  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('IsPanCardIsMandatory')");    
                            if ($pancard_mandatory[0]['ParamValue']==1 || strlen(trim($_POST['PanCard']))>0)  {
                                if (!(strlen(trim($_POST['PanCard']))>5)) {
                                    $error++;
                                    $errorMsg = "Please enter valid Pancard Number.";
                                    $errorPanCard ="Please enter valid Pancard Number.";
                                }
                                
                                $pancard_allowduplicate  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('AllowDuplicatePanCard')");    
                                if ($pancard_allowduplicate[0]['ParamValue']==0) {
                                    $dupPancard = $mysql->select("select * from _tbl_Members where PanCard='".trim($_POST['PanCard'])."'");
                                    if (sizeof($dupPancard)>0) {
                                        $error++;
                                        $errorMsg = "Please enter valid Pancard Number.";
                                        $errorPanCard ="Pancard already used.";
                                    }
                                } 
                            } 

                            
                            $uplineID = $memberTree->GetLeftLastCode($mem[0]['MemberCode']);
                            $MemberCode = getMemberCode($_POST['MemberName']);
                            
                            $target_dir = "uploads/";
                            if (!is_dir('uploads/')) {
                                mkdir('uploads/', 0777, true);
                            }
                            
                            $_POST['ProfilePhoto']= "";
                            $acceptable = array('image/jpeg','image/jpg','image/png');
                            
                            if((!in_array($_FILES['ProfilePhoto']['type'], $acceptable)) && (!empty($_FILES["ProfilePhoto"]["type"]))) {
                                $error++;
                                echo  $errormessage .= "<br>Invalid file type. Only JPG,PNG,JPEG types are accepted.";
                            }
                            
                            if (isset($_FILES["ProfilePhoto"]["name"]) && strlen(trim($_FILES["ProfilePhoto"]["name"]))>0 ) {
                                $profilephoto = time().$_FILES["ProfilePhoto"]["name"];
                                if (!(move_uploaded_file($_FILES["ProfilePhoto"]["tmp_name"], 'uploads/' . $profilephoto))) {
                                   $error++;
                                  echo $errormessage .= "<br>Sorry, there was an error uploading your file. 2";
                                }
                            }
                            
                            if((!in_array($_FILES['Aadhaarcard']['type'], $acceptable)) && (!empty($_FILES["Aadhaarcard"]["type"]))) {
                                $error++;
                                echo  $errormessage .= "<br>Invalid file type. Only JPG,PNG,JPEG types are accepted.";
                            }    
                            
                            if (isset($_FILES["Aadhaarcard"]["name"]) && strlen(trim($_FILES["Aadhaarcard"]["name"]))>0 ) {
                                $Aadhaarcard = time().$_FILES["Aadhaarcard"]["name"];
                                if (!(move_uploaded_file($_FILES["Aadhaarcard"]["tmp_name"], 'uploads/' . $Aadhaarcard))) {
                                   $error++;
                                  echo $errormessage .= "<br>Sorry, there was an error uploading your file. 3";
                                }
                            } 
                            if (isset($_FILES["AadhaarcardB"]["name"]) && strlen(trim($_FILES["AadhaarcardB"]["name"]))>0 ) {
                                $AadhaarcardB = time().$_FILES["AadhaarcardB"]["name"];
                                if (!(move_uploaded_file($_FILES["AadhaarcardB"]["tmp_name"], 'uploads/' . $AadhaarcardB))) {
                                   $error++;
                                  echo $errormessage .= "<br>Sorry, there was an error uploading your file. 3";
                                }
                            }
                            
         
                               

                            if (isset($_FILES["IdentityProofForAddress"]["name"]) && strlen(trim($_FILES["IdentityProofForAddress"]["name"]))>0 ) {
                                
                               if((!in_array($_FILES['IdentityProofForAddress']['type'], $acceptable)) && (!empty($_FILES["IdentityProofForAddress"]["type"]))) {
                                $error++;
                                 echo  $errormessage .= "<br>Invalid file type. Only JPG,PNG,JPEG types are accepted.";
                            }  
                                $IdentityProofForAddress = time().$_FILES["IdentityProofForAddress"]["name"];
                                if (!(move_uploaded_file($_FILES["IdentityProofForAddress"]["tmp_name"], 'uploads/' . $IdentityProofForAddress))) {
                                   $error++;
                                  echo $errormessage .= "<br>Sorry, there was an error uploading your file. 4";
                                }
                            }
                                    
                            if ($error==0) {                                                           
                                
                                $upline = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$uplineID."'");
                               
                                $MemberID =  $mysql->insert("_tbl_Members",array("MemberCode"      => $MemberCode,
                                                                                 "MemberName"      => $_POST['MemberName'],
                                                                                 "Sex"             => "Male",
                                                                                 "DateofBirth"     => $_POST['year']."-".$_POST['month']."-".$_POST['date'],
                                                                                 "MobileNumber"    => trim($_POST['MobileNumber']),
                                                                                 "MemberEmail"     => trim($_POST['MemberEmail']),
                                                                                 "MemberPassword"  => md5(rand(999,99999)),
                                                                                 "PanCard"         => trim($_POST['PanCard']),
                                                                                 "IsActive"        => "0",
                                                                                 "CurrentPackageID"   => "1",
                                                                                 "CurrentPackageName" => "Basic",
                                                                                 "CreatedOn"       => date("Y-m-d H:i:s"),
                                                                                 "SponsorCode"     => $mem[0]['MemberCode'],
                                                                                 "SponsorID"       => $mem[0]['MemberID'],
                                                                                 "SponsorName"     => $mem[0]['MemberName'],
                                                                                 "CurrentPackageID"   => "1",
                                                                                 "CurrentPackageName" => "Basic",
                                                                                 "UplineID"        => $mem[0]['MemberID'],
                                                                                 "UplineCode"      => $mem[0]['MemberCode'],
                                                                                 "UplineName"      => $mem[0]['MemberName'],
                                                                                 "FatherName"      => $_POST['FatherName'],
                                                                                 "MaritalStatus"   => $_POST['MaritalStatus'],
                                                                                 "AddressLine1"   => $_POST['AddressLine1'],
                                                                                 "AddressLine2"   => $_POST['AddressLine2'],
                                                                                 "Town"   => $_POST['Town'],
                                                                                 "PinCode"   => $_POST['PinCode'],
                                                                                 "DistrictName"   => $_POST['District'],
                                                                                 "StateName"   => $_POST['State'],
                                                                                 "LandlineNumber"   => $_POST['LandlineNumber'],
                                                                                 "NomineeName"   => $_POST['NameOfTheNominee'],
                                                                                 "RelationshipWithTheApplicant"   => $_POST['RelationshipWithTheApplicant'],
                                                                                 "ReferralsCode"   => $_POST['ReferralsCode'],
                                                                                 "ReferralsName"   => $_POST['ReferralsName'],
                                                                                 "AadhaarNumber"   => $_POST['AadhaarNumber'],
                                                                                 "IDProof"   => $_POST['PhotoIdentityProofForAddress'],
                                                                                 "ProfilePhoto"   => $profilephoto,
                                                                                 "AdhaarCard"   => $Aadhaarcard,      
                                                                                 "AdhaarCardBack"   => $AadhaarcardB,      
                                                                                 "IDProofForAddress"   => $IdentityProofForAddress      
                                                                                  ));
                                $mysql->insert("_tblPlacements",array("ParentID"      => $mem[0]['MemberID'],
                                                                      "ParentCode"    => $mem[0]['MemberCode'],
                                                                      "ParentName"    => $mem[0]['MemberName'],
                                                                      "ChildID"       => $MemberID,
                                                                      "ChildCode"     => $MemberCode,
                                                                      "ChildName"     => $_POST['MemberName'],
                                                                      "PlacedByID"    => $mem[0]['MemberID'],
                                                                      "PlacedByCode"  => $mem[0]['MemberCode'],
                                                                      "PlacedByName"  => $mem[0]['MemberName'],
                                                                      "PlacedOn"      => date("Y-m-d H:i:s"),
                                                                      "UsedEPin"      => "0",
                                                                      "PV"            => "0",
                                                                      "PackageID"     => "1",
                                                                      "PlacedFrom"    => "website",
                                                                      "Position"      => "L"));
                                //MobileSMS::sendSMS($_POST['MobileNumber'],"Dear ".$_POST['MemberName'].", Your account has been created. Your Member ID: ".$MemberCode." and Password: ".$_POST['MemberPassword']." on ".date("M d, Y").". Login Url: ".loginUrl,$MemberID);
                                MobileSMS::sendSMS($_POST['MobileNumber'],"Dear ".$_POST['MemberName'].", Your account has been created. Your Member ID: ".$MemberCode.", To activate account please contact . Login Url: ".loginUrl,$MemberID);
                                //   if ($_SESSION['User']['MemberID']==$upline[0]['MemberID']) {
                                $sp = $mysql->select("select * from _tbl_Members where MemberID='".$epin[0]['OwnToID']."'");
                                //    MobileSMS::sendSMS($sp[0]['MobileNumber'],"Dear ".$sp[0]['MemberName'].", Your have created a member ".$_POST['MemberName']."(".$MemberCode.") on ".date("M d, Y")."  ",$sp[0]['MemberID']);
                                // } else {
                                //     $sp = $mysql->select("select * from _tbl_Members where MemberID='".$epin[0]['OwnToID']."'");
                                //  MobileSMS::sendSMS($sp[0]['MobileNumber'],"Dear ".$sp[0]['MemberName'].", Your have created a member ".$_POST['MemberName']."(".$MemberCode.") on ".date("M d, Y")."  ",$sp[0]['MemberID']);
                                //    $up = $mysql->select("select * from _tbl_Members where MemberID='".$upline[0]['MemberID']."'");
                                // MobileSMS::sendSMS($up[0]['MobileNumber'],"Dear ".$up[0]['MemberName'].", ".$sp[0]['MemberCode']." has created new member and placed under you. Member Information  ".$_POST['MemberName']." (".$MemberCode.") on ".date("M d, Y")."  ",$up[0]['MemberID']);
                                // }
                            ?>
            <style>
            #headH3{display:none}
            </style>
              <div style="text-align:center;padding:50px;">
                                    <img src="app/assets/images/shield.png"><br><br>
                                    <span style='color:green'>Member Created Successfully.</span> 
                                    <br><br>
                                    <table align="center" style="color:#555">
                                        <tr>
                                            <td style="text-align: right;">Your Member ID</td>
                                            <td  style="text-align: left">:&nbsp;<?php echo $MemberCode;?></td>
                                        </tr>
                                      <!--  <tr>
                                            <td style="text-align: right;">Your Sponsor ID</td>
                                            <td style="text-align: left">:&nbsp;<?php echo $epin[0]['OwnToCode'];?></td>
                                        </tr>
                                          <tr>
                                            <td style="text-align: right;">Your Upline ID</td>
                                            <td  style="text-align: left">:&nbsp;<?php echo $upline[0]['MemberCode']."/".$MemberID;?></td>
                                        </tr> -->
                                    </table>
                                   <div style="font-size:12px;"> Your account still not active.<!--<br>If you have voucher details, please <a href='activate.php?m='>click here</a> to activate<Br>otherwise -->please contact adminstrator.
                                   </div>
                                </div>
            <?php
            
        } else {
            echo "<div style='padding:5px;text-align:center;border:1px solid #ccc;background:#fff;color:red;'>Couldn't be processed. please contact administrator.<br>".$errorMsg."</div>";
        }
        }
       
           $error = 0;
           if (!(isset($_POST['data']))) {
               $error++;
           }
           
           $epin =$mysql->select("SELECT * FROM `_tblEpins` where md5(concat(EPIN,PINPassword,EPINID))='".$_POST['data']."'");
           
           if (sizeof($epin)==0) {
               // $error++;
           }
           
           if (sizeof($epin)>1) {
             //   $error++;
           }
           
           if (isset($epin[0]['IsUsed']) && $epin[0]['IsUsed']==1) {
             //  $error++;
           }                                                         
            $mem = $mysql->select("select * from _tbl_Members where md5(concat(MemberCode,MemberName))='".$_POST['mdata']."' ");
            
          // if ($error==0) {
           ?>
           <div id="headH3">
           <form action="" class="customform ajax-form" id="signupForm" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $_POST['data'];?>" name="data">
                <input type="hidden" value="<?php echo $_POST['mdata'];?>" name="mdata">
                <div class="row" style="margin-left:0px">
                    <div class="col-sm-9" style="padding: 0px;">     
                        <div class="col-sm-12">                                                          
                            <label for="fullName">NAME OF THE APPLICANT (Mr/Mrs/Others)<span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="MemberName" id="MemberName" value="<?php echo (isset($_POST['MemberName']) ? $_POST['MemberName'] : "");?>" required placeholder="Applicant's Name">
                            <span style="color:red"><?php echo $errorMember;?></span>         
                        </div>
                        <div class="col-sm-12">
                          <label for="fullName">Father's Name<span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="FatherName" id="FatherName" value="<?php echo (isset($_POST['FatherName']) ? $_POST['FatherName'] : "");?>" required placeholder="Applicant's Father's Name">
                          <span style="color:red"><?php echo $errorMember;?></span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div style="border: 1px solid #e8e8e8;text-align: center;">
                            <img src="assets/img/usericon.png" alt="" style="width: 127px;height: 100px;"> <br>
                            <input type="file" name="ProfilePhoto" required id="ProfilePhoto" style="width: 80px;">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left:0px">
                    <div class="col-sm-3">
                        <label for="fullName">Gender<span style="color:red">*</span></label>
                        <select name="Sex" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>                                                  
                            <option value="Others">Others</option>                                                  
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label>Date of Birth<span style="color:red">*</span></label><br>                       
                        <div class="row">
                            <div class="col-sm-3">
                                <select class="form-control" required="" name="date" id="date">
                                <?php for($i=1;$i<=31;$i++) {?>
                                    <option value="<?php echo $i;?>" <?php echo (isset($_POST['date']) && $_POST['date']==$i) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
                                <?php } ?>
                                </select>
                            </div>                
                            <div class="col-sm-5">
                        <select class="form-control" required="" name="month" id="month" aria-invalid="true" data-validation-required-message="Please select birth month">
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
                            <div class="col-sm-3">
                        <select class="form-control" required="" name="year" id="year" aria-invalid="true" data-validation-required-message="Please select birth year">
                            <?php for($i=date("Y")-68;$i<=date("Y")-18;$i++) {?>
                            <option value="<?php echo $i;?>" <?php echo (isset($_POST['year']) && $_POST['year']==$i) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
                            <?php } ?>
                        </select>
                    </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label for="MaritalStatus">Marital Status<span style="color:red">*</span></label>
                        <select name="MaritalStatus" class="form-control">
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="col-sm-12">
                  <label for="emailAddress">Address Line 1<span style="color:red">*</span></label>
                  <input type="text" class="form-control" required name="AddressLine1" id="AddressLine1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] : "");?>" required  placeholder="Address Line 1">
                  <span style="color:red"><?php echo $errorEmail;?></span>
                </div>
                <div class="col-sm-12">
                  <label for="emailAddress">Address Line 2</label>
                  <input type="text" class="form-control" name="AddressLine2" id="AddressLine2" value="<?php echo (isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] : "");?>" required  placeholder="Address Line 2">
                  <span style="color:red"><?php echo $errorEmail;?></span>
                </div>
                <div class="row" style="margin-left:0px">
                    <div class="col-sm-6">
                        <label for="Town">Town</label>
                        <input type="text" class="form-control" name="Town" id="Town" value="<?php echo (isset($_POST['Town']) ? $_POST['Town'] : "");?>"   placeholder="Town">
                        <span style="color:red"><?php echo $errorTown;?></span>
                    </div>
                     <div class="col-sm-6">
                      <label for="PinCode">PinCode<span style="color:red">*</span></label>
                      <input type="text" onblur="getData()" class="form-control" name="PinCode" id="PinCode" value="<?php echo (isset($_POST['PinCode']) ? $_POST['PinCode'] : "");?>" required  placeholder="PinCode">
                      <span style="color:red" id="errorPincode"><?php echo $errorPincode;?></span>
                    </div>
                </div>
                <div class="row" style="margin-left:0px">                                                                
                <div class="col-sm-6">
                      <label for="District">District<span style="color:red">*</span></label>
                      <input type="text" readonly="readonly" class="form-control" name="District" id="District" value="<?php echo (isset($_POST['District']) ? $_POST['District'] : "");?>" placeholder="District">
                      <span style="color:red"><?php echo $errorDistrict;?></span>
                    </div>           
                    <div class="col-sm-6">
                      <label for="State">State<span style="color:red">*</span></label>
                      <input type="text" readonly="readonly" class="form-control" name="State" id="State"  placeholder="State" value="<?php echo (isset($_POST['State']) ? $_POST['State'] : "");?>">
                      <span style="color:red"><?php echo $errorState;?></span>
                    </div>
                     
                </div>
                <div class="row" style="margin-left:0px">
                    <div class="col-sm-3" style="clear: both;">
                      <label for="fullName">Mobile Number<span style="color:red">*</span></label>
                      <input type="text" class="form-control" name="MobileNumber" id="MobileNumber" required placeholder="Mobile Number" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "");?>">
                      <span style="color:red"><?php echo $errorMobile;?></span>
                    </div>
                    <div class="col-sm-3" style="clear: both;">
                      <label for="LandlineNumber">Landline Number</label>
                      <input type="text" class="form-control" name="LandlineNumber" id="LandlineNumber" value="<?php echo (isset($_POST['LandlineNumber']) ? $_POST['LandlineNumber'] : "");?>" placeholder="Landline Number">
                      <span style="color:red"><?php echo $errorLandlineNumber;?></span>
                    </div>
                    <div class="col-sm-6">
                      <label for="emailAddress">Email Address</label>
                      <input type="email" class="form-control" name="MemberEmail" id="MemberEmail" value="<?php echo (isset($_POST['MemberEmail']) ? $_POST['MemberEmail'] : "");?>" placeholder="Email Address">
                      <span style="color:red"><?php echo $errorEmail;?></span>
                    </div>
                </div>
                <hr>
             
                <div class="row" style="margin-left:0px;">
                    <div class="col-sm-6">
                      <label for="AadhaarNumber">Aadhaar no<span style="color:red">*</span></label>
                      <input type="text" class="form-control" required name="AadhaarNumber" id="AadhaarNumber" value="<?php echo (isset($_POST['AadhaarNumber']) ? $_POST['AadhaarNumber'] : "");?>"  placeholder="Aadhaar Number">
                      <span style="color:red"><?php echo $errorAadhaarNumber;?></span>
                    </div>
                    <div class="col-sm-3">
                        <label for="Aadhaarcard">Aadhaarcard Front<span style="color:red">*</span></label>
                        <input type="file" class="form-control" required name="Aadhaarcard" id="Aadhaarcard">
                        <span style="color:red"><?php echo $errorAadhaarcard;?></span>
                    </div>
                    <div class="col-sm-3">
                        <label for="Aadhaarcard">Aadhaarcard Back<span style="color:red">*</span></label>
                        <input type="file" class="form-control"   name="AadhaarcardB" id="AadhaarcardB">
                        <span style="color:red"><?php echo $errorAadhaarcardB;?></span>
                    </div>
                </div>
                <div class="row" style="margin-left: 0px;">
                    <div class="col-sm-6">
                      <label for="PhotoIdentityProofForAddress">Photo Identity Proof For Address ( Enclose Photocopy )</label>
                      <select name="PhotoIdentityProofForAddress" class="form-control">
                        <option value="0">Select ID Type</option>
                        <option value="Election Card">Election Card</option>
                        <option value="Driving License">Driving License</option>
                        <option value="Passport">Passport</option>
                        <option value="Ration Card">Ration Card</option>
                      </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="IdentityProofForAddress">Attachment</label>
                          <input type="file" class="form-control"   name="IdentityProofForAddress" id="IdentityProofForAddress">
                          <span style="color:red"><?php echo $errorIdentityProofForAddress;?></span>
                    </div>
                </div>
                <hr>
                <div class="col-sm-12">
                  <label for="NameOfTheNominee">NAME OF THE NOMINEE (Mr/Mrs)<span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="NameOfTheNominee" id="NameOfTheNominee" value="<?php echo (isset($_POST['NameOfTheNominee']) ? $_POST['NameOfTheNominee'] : "");?>" required placeholder="Name Of The NOMINEE ">
                  <span style="color:red"><?php echo $errorNameOfTheNominee;?></span>
                </div>
                <div class="col-sm-12">
                  <label for="RelationshipWithTheApplicant">RELATIONSHIP WITH THE APPLICANT<span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="RelationshipWithTheApplicant" id="RelationshipWithTheApplicant" value="<?php echo (isset($_POST['RelationshipWithTheApplicant']) ? $_POST['RelationshipWithTheApplicant'] : "");?>" required placeholder="Relationship With The Applicant">
                  <span style="color:red"><?php echo $errorRelationshipWithTheApplicant;?></span>
                </div>
                <hr>
                <div class="col-sm-12">
                  <label for="ReferralsCode">Referral's Code<span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="ReferralsCode" value="<?php echo (isset($_POST['ReferralsCode']) ? $_POST['ReferralsCode'] : "");?>" required id="ReferralsCode"  placeholder="Referral's Code">
                  <span style="color:red"><?php echo $errorReferralsCode;?></span>
                </div>
                <div class="col-sm-12">
                  <label for="ReferralsName">Referral's Name</label>                     
                  <input type="text" class="form-control" name="ReferralsName" id="ReferralsName" value="<?php echo (isset($_POST['ReferralsName']) ? $_POST['ReferralsName'] : "");?>" placeholder="Referral's Name">
                  <span style="color:red"><?php echo $errorReferralsName;?></span>
                </div>
                <button class="btn btn-primary" name="CreateBtn" type="submit">Join now</button>
              </form>
            </div>                                                                                    
 
 </div>
 <script>
 function getData() {
     var pin = $('#PinCode').val();
      $('#errorPincode').html("");
     $.ajax({url:'pincode.php?pincode='+pin,success:function(data){
         if (data=="") {
             $('#errorPincode').html("invalid pincode");
               $('#State').val("");
               $('#District').val("");
         } else {
          
          var array = data.split(","); 
               $('#State').val(array[1]);
               $('#District').val(array[0]);
         }
     }});
 }
 </script>
        </div>   
        
    </main>
<?php include_once("includes/footer.php"); ?>    
 