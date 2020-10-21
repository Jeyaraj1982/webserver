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
                <div class="margin" style="max-width: 500px;margin:0px auto;">
                <h2 class="text-size-30" style="text-align: center;">Member Registration</h2>
                <p class="lead text-center"></p>
                <div class="bg-light shadow-md rounded p-4 mx-2">
                    <?php
                        if (isset($_POST['CreateBtn'])) {
                            $error = 0;
                            $epin =$mysql->select("SELECT * FROM `_tblEpins` where md5(concat(EPIN,PINPassword,EPINID))='".$_POST['data']."'");
                            
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
                            
                              $mem = $mysql->select("select * from _tbl_Members where md5(concat(MemberCode,MemberName))='".$_POST['mdata']."' ");
                            
                            /*
                            if (!(strlen(trim($_POST['MobileNumber']))==10)) {
                                $error++;
                                $errorMsg = "Please enter valid mobile number.";
                                $errorMobile ="Please enter valid mobile number.";
                            }
                            
                            $dupMobile = $mysql->select("select * from _tbl_Members where MobileNumber='".trim($_POST['MobileNumber'])."'");
                            if (sizeof($dupMobile)>0) {
                                $error++;
                                $errorMsg = "Please enter valid mobile number.";
                                $errorMobile ="Mobile Number already used.";
                            }
                            
                            if (strlen(trim($_POST['PanCard']))>0) {
                                $dupPancard = $mysql->select("select * from _tbl_Members where PanCard='".trim($_POST['PanCard'])."'");
                                if (sizeof($dupPancard)>0) {
                                    $error++;
                                    $errorMsg = "Please enter valid pancard.";
                                    $errorPanCard ="Pancard Number already used.";
                                }
                            }
                            
                            if (strlen(trim($_POST['MemberEmail']))>0) {          
                                $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';  
                                if (!(preg_match($regex, strtolower($_POST['MemberEmail'])))) {
                                    $error++;
                                    $errorEmail="Email is an invalid email. Please try again.";
                                    $errorMsg = "Email is an invalid email. Please try again.";
                                }
                                $dupEmail = $mysql->select("select * from _tbl_Members where MemberEmail='".trim($_POST['MemberEmail'])."'");
                                if (sizeof($dupEmail)>0) {
                                    $error++;
                                    $errorMsg = "Please enter valid email.";
                                    $errorEmail ="Email ID already exists.";
                                }
                            }  
                             $mobilenumber_mandatory  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('IsMobileIsMandatory')");    
        if ($mobilenumber_mandatory[0]['ParamValue']==1)  {
            if (!($_POST['MobileNumber']>6000000000 && $_POST['MobileNumber']<9999999999)) {
                $error++;
                $errorMobile="Invalid mobile number. Please try again.";
            }
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
        
        
        $email_allowduplicate  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('AllowDuplicateEmail')");    
        if ($email_allowduplicate[0]['ParamValue']==0)  {
            $dupEmail = $mysql->select("select * from _tbl_Members where MemberEmail='".trim($_POST['MemberEmail'])."'");
            if (sizeof($dupEmail)>0) {
                $error++;
                $errorMsg = "Please enter valid mobile number.";
                $errorEmail ="Email ID already used.";
            }
        }
        
        $email_mandatory  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('IsEmailMandatory')");    
        if ($email_mandatory[0]['ParamValue']==1)  {
            $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
            if (!(preg_match($regex, strtolower($_POST['MemberEmail'])))) {
                $error++;
                $errorEmail="Email is an invalid email. Please try again.";
            }
        }
        
        
        $pancard_allowduplicate  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('AllowDuplicatePanCard')");    
        if ($pancard_allowduplicate[0]['ParamValue']==0)  {
             $dupPancard = $mysql->select("select * from _tbl_Members where PanCard='".trim($_POST['PanCard'])."'");
            if (sizeof($dupPancard)>0) {
                $error++;
                $errorMsg = "Please enter valid Pancard Number.";
                $errorPanCard ="Pancard already used.";
            } 
        }
        
        $pancard_mandatory  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('IsPanCardIsMandatory')");    
        if ($pancard_mandatory[0]['ParamValue']==1)  {
             if (!(strlen(trim($_POST['PanCard']))>5)) {
                $error++;
                $errorMsg = "Please enter valid Pancard Number.";
                $errorPanCard ="Please enter valid Pancard Number.";
            } 
        }
 
 */
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

        $password_length  = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MemberPasswordLength')");    
        /*if (strlen(trim($_POST['MemberPassword']))<$password_length[0]['ParamValue']) {
            $error++;
            $errorMsg = "Please enter valid Pancard Number.";
            $errorMemberPassword ="Password must have ".$password_length[0]['ParamValue']." characters.";
        }
        
        if (strlen(trim($_POST['CMemberPassword']))<$password_length[0]['ParamValue']) {
            $error++;
            $errorMsg = "Please enter valid Pancard Number.";
            $errorCMemberPassword ="Password must have ".$password_length[0]['ParamValue']." characters.";
        } */
                            if (strlen(trim($_POST['MemberPassword']))<$password_length[0]['ParamValue']) {
                                $error++;
                                $errorPassword="Password must be ".$password_length[0]['ParamValue']." and more characters";
                                $errorMsg ="Password must be ".$password_length[0]['ParamValue']." and more characters";
                            }     
                            
                            
          
                            //if (sizeof($epin)==0) {
                              //  $error++;
                                //$errorMsg = "Epin information not found";
                            //}
           
                            if (sizeof($epin)>1) {
                                $error++;
                                $errorMsg = "Couldn't be process. Please contact administrator..";
                            }
           
                            if (isset($epin[0]['IsUsed']) && $epin[0]['IsUsed']==1) {
                                $error++;
                                $errorMsg = "Epin already used.";
                            }
                            /*
                            $data = $memberTree->GetLeft($epin[0]['OwnToCode']);
                            if ($memberTree->error==0) {
                                $temp = explode(",",$data);
                                $uplineID = $temp[0];
                                $MemberCode = getMemberCode($_POST['MemberName']);
                            } else {
                                echo "<div style='text-align:center'><span style='font-size:20px;'>Oops! Something went wrong</span><br>Please contact administrator</div>";
                            }*/ 
                            
                            //$uplineID = $memberTree->GetLeftLastCode($epin[0]['OwnToCode']);
                            $uplineID = $memberTree->GetLeftLastCode($mem[0]['MemberCode']);
                            $MemberCode = getMemberCode($_POST['MemberName']);
                            
                            if ($error==0) {
                                
                                $upline = $mysql->select("select * from `_tbl_Members` where `MemberCode`='".$uplineID."'");
                                //$e_pin = $mysql->select("select * from  `_tblEpins` where EPINID='".$epin[0]['EPINID']."'");                                                 
                                //$PV = $e_pin[0]['PackagePV'];        
                                //$package_id = $e_pin[0]['PackageID'];  
                                $MemberID =  $mysql->insert("_tbl_Members",array("MemberCode"      => $MemberCode,
                                                                                 "MemberName"      => $_POST['MemberName'],
                                                                                 "Sex"             => "Male",
                                                                                 "DateofBirth"     => $_POST['year']."-".$_POST['month']."-".$_POST['date'],
                                                                                 "MobileNumber"    => trim($_POST['MobileNumber']),
                                                                                 "MemberEmail"     => trim($_POST['MemberEmail']),
                                                                                 "MemberPassword"  => $_POST['MemberPassword'],
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
                                                                                 "UplineName"      => $mem[0]['MemberName']));
                                //echo $mysql->error;
                                                                  
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
                                //echo "<bR><br>". $mysql->error;
                              //  $mysql->execute("update `_tblEpins` set `IsUsed`='1', `UsedOn`='".date("Y-m-d H:i:s")."',`UsedForID`='".$MemberID."',`UserForCode`='".$MemberCode."',`UsedForName`='".$_POST['MemberName']."' where EPINID='".$epin[0]['EPINID']."'");
                                MobileSMS::sendSMS($_POST['MobileNumber'],"Dear ".$_POST['MemberName'].", Your account has been created. Your Member ID: ".$MemberCode." and Password: ".$_POST['MemberPassword']." on ".date("M d, Y").". Login Url: ".loginUrl,$MemberID);
              
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
                                   <div style="font-size:12px;"> Your account still not active.<br>If you have voucher details, please <a href='activate.php?m='>click here</a> to activate<Br>otherwise please contact adminstrator.
                                   </div>
                                </div>
            <?php
            
        } else {
            echo "Couldn't be processed. please contact administrator.<br>".$errorMsg;
        }
        }
       
       
       if (isset($_POST['submitBtn'])) {
           
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
            
           if ($error==0) {
           ?>
           <form action="" class="customform ajax-form" id="signupForm" method="post">
                <input type="hidden" value="<?php echo $_POST['data'];?>" name="data">
                <input type="hidden" value="<?php echo $_POST['mdata'];?>" name="mdata">
                <div class="s-12">
                    <label for="Epin">Sponser Information</label>
                    <input type="text" class="form-control" disabled="disabled" value="<?php echo $mem[0]['MemberName'];?> (<?php echo $mem[0]['MemberName'];?>)">
                </div>
                <div class="s-12">
                  <label for="fullName">Your Name<span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="MemberName" id="MemberName" required placeholder="Enter Your Name">
                  <span style="color:red"><?php echo $errorMember;?></span>
                </div>
                <div class="s-12">
                  <label for="fullName">Father's Name<span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="FatherName" id="FatherName" required placeholder="Enter Your Father's Name">
                  <span style="color:red"><?php echo $errorMember;?></span>
                </div>
                <div class="s-12">
                  <label for="fullName">Sex<span style="color:red">*</span></label>
                  <select name="Sex" class="form-control">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
                <div class="s-12">
                    <label>Date of Birth<span style="color:red">*</span></label><br>
                    <div class="row">
                    <div class="col-3">
                        <select class="form-control" required="" name="date" id="date">
                        <?php for($i=1;$i<=31;$i++) {?>
                            <option value="<?php echo $i;?>" <?php echo (isset($_POST['date']) && $_POST['date']==$i) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
                        <?php } ?>
                        </select>
                    </div>                
                    <div class="col-5">
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
                    <div class="col-3">
                        <select class="form-control" required="" name="year" id="year" aria-invalid="true" data-validation-required-message="Please select birth year">
                            <?php for($i=date("Y")-68;$i<=date("Y")-18;$i++) {?>
                            <option value="<?php echo $i;?>" <?php echo (isset($_POST['year']) && $_POST['year']==$i) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="s-12" style="clear: both;">
                  <label for="fullName">Mobile Number<span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="MobileNumber" id="MobileNumber" required placeholder="Enter Mobile Number">
                  <span style="color:red"><?php echo $errorMobile;?></span>
                </div>
                <div class="s-12">
                  <label for="emailAddress">Email Address<span style="color:red">*</span></label>
                  <input type="email" class="form-control" name="MemberEmail" id="MemberEmail"  placeholder="Enter Your Email">
                  <span style="color:red"><?php echo $errorEmail;?></span>
                </div>
                
                <div class="s-12">
                  <label for="emailAddress">Address Line 1<span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="AddressLine1" id="AddressLine1"  placeholder="Enter Address Line 1">
                  <span style="color:red"><?php echo $errorEmail;?></span>
                </div>
                  <div class="s-12">
                  <label for="emailAddress">Address Line 2<span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="AddressLine2" id="AddressLine2"  placeholder="Enter Address Line 2">
                  <span style="color:red"><?php echo $errorEmail;?></span>
                </div>
                <div class="s-12">
                  <label for="emailAddress">PinCode<span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="PinCode" id="PinCode"  placeholder="Enter PinCode">
                  <span style="color:red"><?php echo $errorEmail;?></span>
                </div>
                
                <div class="s-12">
                  <label for="emailAddress">PanCard<span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="PanCard" id="PanCard"  placeholder="Enter PanCard">
                  <span style="color:red"><?php echo $errorEmail;?></span>
                </div>
                
                <div class="s-12">
                  <label for="loginPassword">Login Password<span style="color:red">*</span></label>
                  <input type="password" class="form-control" name="MemberPassword" id="MemberPassword" required placeholder="Enter Password">
                  <span style="color:red"><?php echo $errorEmail;?></span>
                </div>
                <button class="btn btn-primary" name="CreateBtn" type="submit">Create Member</button>
              </form>
                 <?php
               
           } else {
               echo "Couldn't processed. please contact administrator";
           }
       }
      ?>
 </div>
        </div>   
        
    </main>
<?php include_once("includes/footer.php"); ?>    
 