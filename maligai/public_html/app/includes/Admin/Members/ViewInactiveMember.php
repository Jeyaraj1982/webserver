<?php
    $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_GET['MCode']."'");
    $package=$mysql->select("SELECT * FROM `_tbl_Settings_Packages` where PackageID='".$data[0]['CurrentPackageID']."'"); 
    if (isset($_POST['RemoveBtn'])) {
       $mysql->insert("DemMember",array("DelSQL"=>json_encode($data),"DeletedOn"=>date("Y-m-d H:i:s")));
         
         $mysql->execute("delete from _tbl_Members  where `MemberCode`='".$_GET['MCode']."'");
        ?>
         <script>
            alert('Member deleted');
            location.href='dashboard.php?action=Members/InActiveMembers';
         </script>
        <?php
        
    }
    if (isset($_POST['ActiveBtn']))     {
         $mysql->execute("update _tbl_Members set MemberPassword='".$_POST['MemberPassword']."', IsActive='1',ActivatedOn='".date("Y-m-d H:i:s")."' where `MemberCode`='".$_GET['MCode']."'");
         $mysql->execute("update _tblPlacements set UsedEPin='1' where `ChildCode`='".$_GET['MCode']."'");
         ?>
         <script>
            alert('Member Activated');
            location.href='dashboard.php?action=Members/InActiveMembers';
         </script>
         <?php
    }
    
    if (sizeof($data)>0) {
?>
 <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers">Member</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers">Member Information</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers"><?php echo $_GET['MCode'];?></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Member Information</div>
                </div>
                <div class="card-body">
                    <form action="" class="customform ajax-form" id="signupForm" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $_POST['data'];?>" name="data">
                <input type="hidden" value="<?php echo $_POST['mdata'];?>" name="mdata">
                <div class="row" style="margin-left:0px">
                    <div class="col-sm-9" style="padding: 0px;">     
                        <div class="col-sm-12">                                                          
                            <label for="fullName">NAME OF THE APPLICANT (Mr/Mrs/Others)</label>
                            <input type="text" class="form-control" disabled="disabled" name="MemberName" id="MemberName" value="<?php echo (isset($_POST['MemberName']) ? $_POST['MemberName'] : $data[0]['MemberName']);?>" required placeholder="Applicant's Name">
                            <span style="color:red"><?php echo $errorMember;?></span>         
                        </div>
                        <div class="col-sm-12">
                          <label for="fullName">Father's Name</label>
                          <input type="text" class="form-control" disabled="disabled" name="FatherName" id="FatherName" value="<?php echo (isset($_POST['FatherName']) ? $_POST['FatherName'] : $data[0]['FatherName']);?>" required placeholder="Applicant's Father's Name">
                          <span style="color:red"><?php echo $errorMember;?></span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div style="border: 1px solid #e8e8e8;text-align: center;">
                            <img src="../../uploads/<?php echo $data[0]['ProfilePhoto'];?>" alt="" style="width: 127px;"> <br>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left:0px">
                    <div class="col-sm-3">
                        <label for="fullName">Gender</label>
                        <select name="Sex" disabled="disabled" class="form-control">
                            <option value="Male"><?php echo $data[0]['Sex'];?></option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label>Date of Birth</label><br>                       
                        <div class="row">
                            <div class="col-sm-3">
                                <select class="form-control" disabled="disabled" required="" name="date" id="date">
                                <?php for($i=1;$i<=31;$i++) {?>
                                    <option value="<?php echo $i;?>" <?php echo (isset($_POST['date']) && $_POST['date']==$i) ? " selected='selected' ": $data[0]['Sex'];?> ><?php echo $i;?></option>
                                <?php } ?>
                                </select>
                            </div>                
                            <div class="col-sm-5">
                        <select class="form-control" required="" disabled="disabled" name="month" id="month" aria-invalid="true" data-validation-required-message="Please select birth month">
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
                        <select class="form-control" required="" disabled="disabled" name="year" id="year" aria-invalid="true" data-validation-required-message="Please select birth year">
                            <?php for($i=date("Y")-68;$i<=date("Y")-18;$i++) {?>
                            <option value="<?php echo $i;?>" <?php echo (isset($_POST['year']) && $_POST['year']==$i) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
                            <?php } ?>
                        </select>
                    </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label for="MaritalStatus">Marital Status</label>
                        <select name="MaritalStatus" disabled="disabled" class="form-control">
                            <option><?php echo $data[0]['MaritalStatus'];?></option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="col-sm-12">
                  <label for="emailAddress">Address Line 1</label>
                  <input type="text" class="form-control" disabled="disabled" name="AddressLine1" id="AddressLine1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] : $data[0]['AddressLine1']);?>" required  placeholder="Address Line 1">
                  <span style="color:red"><?php echo $errorEmail;?></span>
                </div>
                <div class="col-sm-12">
                  <label for="emailAddress">Address Line 2</label>
                  <input type="text" class="form-control" disabled="disabled" name="AddressLine2" id="AddressLine2" value="<?php echo (isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] : $data[0]['AddressLine2']);?>" required  placeholder="Address Line 2">
                  <span style="color:red"><?php echo $errorEmail;?></span>
                </div>
                <div class="row" style="margin-left:0px">
                    <div class="col-sm-6">
                        <label for="Town">Town</label>
                        <input type="text" class="form-control" disabled="disabled" name="Town" id="Town" value="<?php echo (isset($_POST['Town']) ? $_POST['Town'] : $data[0]['Town']);?>"   placeholder="Town">
                        <span style="color:red"><?php echo $errorTown;?></span>
                    </div>
                     <div class="col-sm-6">
                      <label for="PinCode">PinCode</label>
                      <input type="text" onblur="getData()" disabled="disabled" class="form-control" name="PinCode" id="PinCode" value="<?php echo (isset($_POST['PinCode']) ? $_POST['PinCode'] : $data[0]['PinCode']);?>" required  placeholder="PinCode">
                      <span style="color:red" id="errorPincode"><?php echo $errorPincode;?></span>
                    </div>
                </div>
                <div class="row" style="margin-left:0px">                                                                
                <div class="col-sm-6">
                      <label for="District">District</label>
                      <input type="text" disabled="disabled" class="form-control" name="District" id="District" value="<?php echo (isset($_POST['District']) ? $_POST['District'] : $data[0]['DistrictName']);?>" placeholder="District">
                      <span style="color:red"><?php echo $errorDistrict;?></span>
                    </div>           
                    <div class="col-sm-6">
                      <label for="State">State</label>
                      <input type="text" disabled="disabled" class="form-control" name="State" id="State"  placeholder="State" value="<?php echo (isset($_POST['State']) ? $_POST['State'] : $data[0]['StateName']);?>">
                      <span style="color:red"><?php echo $errorState;?></span>
                    </div>
                     
                </div>
                <div class="row" style="margin-left:0px">
                    <div class="col-sm-3" style="clear: both;">
                      <label for="fullName">Mobile Number</label>
                      <input type="text" class="form-control" disabled="disabled" name="MobileNumber" id="MobileNumber" required placeholder="Mobile Number" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $data[0]['MobileNumber']);?>">
                      <span style="color:red"><?php echo $errorMobile;?></span>
                    </div>
                    <div class="col-sm-3" style="clear: both;">
                      <label for="LandlineNumber">Landline Number</label>
                      <input type="text" class="form-control" disabled="disabled" name="LandlineNumber" id="LandlineNumber" value="<?php echo (isset($_POST['LandlineNumber']) ? $_POST['LandlineNumber'] : $data[0]['LandlineNumber']);?>" placeholder="Landline Number">
                      <span style="color:red"><?php echo $errorLandlineNumber;?></span>
                    </div>
                    <div class="col-sm-6">
                      <label for="emailAddress">Email Address</label>
                      <input type="email" class="form-control" disabled="disabled" name="MemberEmail" id="MemberEmail" value="<?php echo (isset($_POST['MemberEmail']) ? $_POST['MemberEmail'] : $data[0]['MemberEmail']);?>" placeholder="Email Address">
                      <span style="color:red"><?php echo $errorEmail;?></span>
                    </div>
                </div>
                <hr>
             
                <div class="row" style="margin-left:0px;">
                    <div class="col-sm-6">
                      <label for="AadhaarNumber">Aadhaar no</label>
                      <input type="text" class="form-control" disabled="disabled" required name="AadhaarNumber" id="AadhaarNumber" value="<?php echo (isset($_POST['AadhaarNumber']) ? $_POST['AadhaarNumber'] : $data[0]['AadhaarNumber']);?>"  placeholder="Aadhaar Number">
                      <span style="color:red"><?php echo $errorAadhaarNumber;?></span>
                    </div>
                    <div class="col-sm-6">
                         <img src="../../uploads/<?php echo $data[0]['AdhaarCard'];?>" alt="" style="width: 127px;">
                         <img src="../../uploads/<?php echo $data[0]['AdhaarCardBack'];?>" alt="" style="width: 127px;">
                    </div>
                </div>
                <div class="row" style="margin-left: 0px;">
                    <div class="col-sm-6">
                      <label for="PhotoIdentityProofForAddress">Photo Identity Proof For Address ( Enclose Photocopy )</label>
                      <select name="PhotoIdentityProofForAddress" disabled="disabled" class="form-control">
                        <option><?php echo $data[0]['IDProof'];?></option>
                      </select>
                    </div>
                    <div class="col-sm-6">
                        <img src="../../uploads/<?php echo $data[0]['IDProofForAddress'];?>" alt="" style="width: 127px;">
                    </div>
                </div>
                <hr>
                <div class="col-sm-12">
                  <label for="NameOfTheNominee">NAME OF THE NOMINEE (Mr/Mrs)</label>
                  <input type="text" class="form-control" disabled="disabled" name="NameOfTheNominee" id="NameOfTheNominee" value="<?php echo (isset($_POST['NameOfTheNominee']) ? $_POST['NameOfTheNominee'] : $data[0]['NomineeName']);?>" required placeholder="Name Of The NOMINEE ">
                  <span style="color:red"><?php echo $errorNameOfTheNominee;?></span>
                </div>
                <div class="col-sm-12">
                  <label for="RelationshipWithTheApplicant">RELATIONSHIP WITH THE APPLICANT</label>
                  <input type="text" class="form-control" disabled="disabled" name="RelationshipWithTheApplicant" id="RelationshipWithTheApplicant" value="<?php echo (isset($_POST['RelationshipWithTheApplicant']) ? $_POST['RelationshipWithTheApplicant'] : $data[0]['RelationshipWithTheApplicant']);?>" required placeholder="Relationship With The Applicant">
                  <span style="color:red"><?php echo $errorRelationshipWithTheApplicant;?></span>
                </div>
                <hr>
                <div class="col-sm-12">
                  <label for="ReferralsCode">Referral's Code</label>
                  <input type="text" class="form-control" disabled="disabled" name="ReferralsCode" value="<?php echo (isset($_POST['ReferralsCode']) ? $_POST['ReferralsCode'] : $data[0]['ReferralsCode']);?>" required id="ReferralsCode"  placeholder="Referral's Code">
                  <span style="color:red"><?php echo $errorReferralsCode;?></span>
                </div>
                <div class="col-sm-12">
                  <label for="ReferralsName">Referral's Name</label>                     
                  <input type="text" class="form-control" disabled="disabled" name="ReferralsName" id="ReferralsName" value="<?php echo (isset($_POST['ReferralsName']) ? $_POST['ReferralsName'] : $data[0]['ReferralsName']);?>" placeholder="Referral's Name">
                  <span style="color:red"><?php echo $errorReferralsName;?></span>
                </div> 
                <div class="col-sm-12">
                  <label for="ReferralsName">Member Password</label>                     
                  <input type="text" class="form-control"  name="MemberPassword" id="MemberPassword" value="<?php echo (isset($_POST['MemberPassword']) ? $_POST['MemberPassword'] : "");?>" placeholder="Member Password" required>
                  <span style="color:red"><?php echo $errorReferralsName;?></span>
                </div>
                <button class="btn btn-primary" name="ActiveBtn" type="submit">Activate now</button>
              </form>
              <form action="" method="post"><br><br>
              <button class="btn btn-danger" name="RemoveBtn" type="submit">Remove</button>
              </form>
                </div>
        </div>
    </div>
   </div> 
 </div>
 <?php } else  { ?>
  <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers">Member</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers">Member Information</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/AllMembers"><?php echo $_GET['MCode'];?></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Member Information</div>
                </div>
                <div class="card-body">
                     Member not found.
       
                </div>
        </div>
    </div>
   </div> 
 </div>
 <?php } ?>             
        
<?php include_once("includes/footer.php"); ?>    
 