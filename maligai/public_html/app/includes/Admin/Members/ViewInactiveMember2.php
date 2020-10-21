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
                  <input type="text" class="form-control" name="AddressLine1" id="AddressLine1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] : "");?>" required  placeholder="Address Line 1">
                  <span style="color:red"><?php echo $errorEmail;?></span>
                </div>
                <div class="col-sm-12">
                  <label for="emailAddress">Address Line 2<span style="color:red">*</span></label>
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
                    <div class="col-sm-6">
                        <label for="Aadhaarcard">Aadhaarcard<span style="color:red">*</span></label>
                        <input type="file" class="form-control" required name="Aadhaarcard" id="Aadhaarcard">
                        <span style="color:red"><?php echo $errorAadhaarcard;?></span>
                    </div>
                </div>
                <div class="row" style="margin-left: 0px;">
                    <div class="col-sm-6">
                      <label for="PhotoIdentityProofForAddress">Photo Identity Proof For Address ( Enclose Photocopy )<span style="color:red">*</span></label>
                      <select name="PhotoIdentityProofForAddress" class="form-control">
                        <option value="Election Card">Election Card</option>
                        <option value="Driving License">Driving License</option>
                        <option value="Passport">Passport</option>
                        <option value="Ration Card">Ration Card</option>
                      </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="IdentityProofForAddress">Attachment<span style="color:red">*</span></label>
                          <input type="file" class="form-control" required name="IdentityProofForAddress" id="IdentityProofForAddress">
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

        </div>   
        
    </main>
<?php include_once("includes/footer.php"); ?>    
 