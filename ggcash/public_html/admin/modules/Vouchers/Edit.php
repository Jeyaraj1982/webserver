<?php
    if (isset($_POST['FormUpdate'])) {
               $error = 0;
            // mobilenumber validation
                if (!($_POST['MobileNumber']>=6000000000 && $_POST['MobileNumber']<=9999999999)) {
                    $error++;
                  $errorMobile = "Please enter valid mobile number"  ;
                }
                if (!($_POST['Amount']>=100 && $_POST['Amount']<=100000)) {
                    $error++;
                  $errorAmount = "Amount must be Rs. 100 To Rs. 100000"  ;
                }
            // email number validation
                 if (!(strlen($_POST['DistrictName'])>0)) {
                      $error++;
                  $errorPincode = "Please enter valid pincode"  ; 
                 }
            //districtname
                                                                            
          
          if ($error==0)    {
               
            $DateOfBirth = $_POST['year']."-".$_POST['month']."-".$_POST['date'];
            $id =  $mysqldb->execute("update _VoucherRegistration set ApplicantName   ='". $_POST['ApplicantName']."',
                                                                      Gender          ='". $_POST['Gender']."',
                                                                      DateOfBirth     ='". $DateOfBirth."',
                                                                      MaritalStatus   ='". $_POST['MaritalStatus']."',
                                                                      AddressLine1    ='". $_POST['AddressLine1']."',
                                                                      AddressLine2    ='". $_POST['AddressLine2']."',
                                                                      Town            ='". $_POST['Town']."',
                                                                      PinCode         ='". $_POST['PinCode']."',
                                                                      DistrictName    ='". $_POST['DistrictName']."',
                                                                      StateName       ='". $_POST['StateName']."',
                                                                      MobileNumber    ='". $_POST['MobileNumber']."',
                                                                      EmailAddress    ='". $_POST['EmailAddress']."',
                                                                      AadhaarNumber   ='". $_POST['AadhaarNumber']."',
                                                                      Amount          ='". $_POST['Amount']."',
                                                                      Remarks         ='". $_POST['Remarks']."',
                                                                      ReferredByCode  ='". $_POST['ReferredByCode']."',
                                                                      ReferredByName  ='". $_POST['ReferredByName']."',
                                                                      
                                                                      md5(concat('JJ',CouponRegID))='".$_GET['code']."'");
                                                                      
              $id=1;
             
          
          }
    }
$data = $mysqldb->select("select * from _VoucherRegistration where md5(concat('JJ',CouponRegID))='".$_GET['code']."'");
?>
  <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-6 align-self-center">
                        <h4 class="page-title">List of Requested Vouchers</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Vouchers</li>
                                </ol>
                            </nav>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 col-xlg-7 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form action="" class="customform ajax-form" id="signupForm" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-12">     
                    <label for="fullName">NAME OF THE APPLICANT (Mr/Mrs/Others)<span style="color:red">*</span></label>
                    <input type="text" class="form-control" name="ApplicantName" id="ApplicantName" value="<?php echo (isset($_POST['ApplicantName']) ? $_POST['ApplicantName'] : $data[0]['ApplicantName']);?>" required placeholder="Applicant's Name">
                    <span style="color:red"><?php echo $errorMember;?></span>         
                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-sm-3">
                    <label for="fullName">Gender<span style="color:red">*</span></label>
                    <select name="Gender" id="Gender" class="form-control">
                        <option value="Male" <?php echo $data[0]['Gender']=="Male" ? " selected='selected' " : "";?>>Male</option>
                        <option value="Female" <?php echo $data[0]['Gender']=="Female" ? " selected='selected' " : "";?> >Female</option>                                                  
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
                    <select name="MaritalStatus" id="MaritalStatus" class="form-control">
                        <option value="Single" <?php echo $data[0]['MaritalStatus']=="Single" ? " selected='selected' " : "";?>>Single</option>
                        <option value="Married" <?php echo $data[0]['MaritalStatus']=="Married" ? " selected='selected' " : "";?>>Married</option>
                    </select>
                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-sm-12">
                  <label for="emailAddress">Address Line 1<span style="color:red">*</span></label>
                  <input type="text" class="form-control" required name="AddressLine1" id="AddressLine1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] : $data[0]['AddressLine1']);?>" required  placeholder="Address Line 1">
                  <span style="color:red"><?php echo $errorEmail;?></span>
                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-sm-12">
                  <label for="emailAddress">Address Line 2</label>
                  <input type="text" class="form-control" name="AddressLine2" id="AddressLine2" value="<?php echo (isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] : $data[0]['AddressLine2']);?>"    placeholder="Address Line 2">
                  <span style="color:red"></span>
                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-sm-6">
                    <label for="Town">Town</label>
                    <input type="text" class="form-control" name="Town" id="Town" value="<?php echo (isset($_POST['Town']) ? $_POST['Town'] : $data[0]['Town']);?>"   placeholder="Town">
                    <span style="color:red"><?php echo $errorTown;?></span>
                </div>
                <div class="col-sm-6">
                    <label for="PinCode">PinCode<span style="color:red">*</span></label>
                    <input type="text" onblur="getData()" class="form-control" name="PinCode" id="PinCode" value="<?php echo (isset($_POST['PinCode']) ? $_POST['PinCode'] : $data[0]['PinCode']);?>" required  placeholder="PinCode">
                    <span style="color:red" id="errorPincode"><?php echo $errorPincode;?></span>
                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-sm-6">
                    <label for="District">District</label>
                    <input type="text" readonly="readonly" class="form-control" name="DistrictName" id="District" value="<?php echo (isset($_POST['DistrictName']) ? $_POST['DistrictName'] : $data[0]['DistrictName']);?>" placeholder="District">
                    <span style="color:red"><?php echo $errorDistrict;?></span>
                </div>           
                <div class="col-sm-6">
                    <label for="State">State</label>
                    <input type="text" readonly="readonly" class="form-control" name="StateName" id="State"  placeholder="State" value="<?php echo (isset($_POST['StateName']) ? $_POST['StateName'] : $data[0]['StateName']);?>">
                    <span style="color:red"><?php echo $errorState;?></span>
                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-sm-6" style="clear: both;">
                    <label for="fullName">Mobile Number<span style="color:red">*</span></label>
                    <input type="text" class="form-control" name="MobileNumber" required id="MobileNumber" required placeholder="Mobile Number" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $data[0]['MobileNumber']);?>">
                    <span style="color:red"><?php echo $errorMobile;?></span>
                </div>
                <div class="col-sm-6">
                    <label for="emailAddress">Email Address</label>
                    <input type="email" class="form-control" name="EmailAddress" id="EmailAddress" value="<?php echo (isset($_POST['EmailAddress']) ? $_POST['EmailAddress'] : $data[0]['EmailAddress']);?>" placeholder="Email Address">
                    <span style="color:red"><?php echo $errorEmail;?></span>
                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-sm-12">
                    <label for="AadhaarNumber">Aadhaar no<span style="color:red">*</span></label>
                    <input type="text" class="form-control" required name="AadhaarNumber" id="AadhaarNumber" value="<?php echo (isset($_POST['AadhaarNumber']) ? $_POST['AadhaarNumber'] : $data[0]['AadhaarNumber']);?>"  placeholder="Aadhaar Number">
                    <span style="color:red"><?php echo $errorAadhaarNumber;?></span>
                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-sm-12">
                    <label for="NameOfTheNominee">Amount<span style="color:red">*</span></label>
                    <input type="text" class="form-control" name="Amount" id="Amount" value="<?php echo (isset($_POST['Amount']) ? $_POST['Amount'] : $data[0]['Amount']);?>" required placeholder="Amount ">
                    <span style="color:red"><?php echo $errorAmount;?></span>
                </div>                                           
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-sm-12">
                    <label for="RelationshipWithTheApplicant">Remarks</label>
                    <input type="text" class="form-control" name="Remarks" id="Remarks" value="<?php echo (isset($_POST['Remarks']) ? $_POST['Remarks'] : $data[0]['Remarks']);?>"   placeholder="Remarks">
                    <span style="color:red"><?php echo $errorRemarks;?></span>
                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-sm-12">
                    <label for="ReferralsCode">Referral's Code</label>
                    <input type="text" class="form-control" name="ReferredByCode" value="<?php echo (isset($_POST['ReferredByCode']) ? $_POST['ReferredByCode'] : $data[0]['ReferredByCode']);?>"  id="ReferralsCode"  placeholder="Referral's Code">
                    <span style="color:red"><?php echo $errorReferralsCode;?></span>
                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-sm-12">
                    <label for="ReferralsName">Referral's Name</label>                     
                    <input type="text" class="form-control" name="ReferredByName" id="ReferredByName" value="<?php echo (isset($_POST['ReferredByName']) ? $_POST['ReferredByName'] : $data[0]['ReferredByName']);?>" placeholder="Referral's Name">
                    <span style="color:red"><?php echo $errorReferralsName;?></span>
                </div>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-sm-12">
                    <button class="btn btn-primary" name="FormUpdate" type="submit">Update</button>
                </div>
            </div>
        </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-5 col-xlg-5 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                                <label for="fullName">Requested On</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['RequestedOn'];?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                                <label for="fullName">Status</label>
                                <?php
                                    if ($data[0]['IsActivated']=='0') {
                                        $status= "Requested";
                                    }
                                    
                                    if ($data[0]['IsActivated']=='1') {
                                        $status= "Activated";
                                    }
                                    
                                    if ($data[0]['IsActivated']=='2') {
                                        $status= "Rejected";
                                    }
                                ?>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $status;?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                                <label for="fullName">Status On</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['ActivatedOn'];?>">
                            </div>
                        </div> 
                     <!--   <?php if ($data[0]['IsActivated']=="1") { ?>
                        <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                                <label for="fullName">Voucher ID</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['VoucherKey'];?>">
                            </div>
                        </div>
                        <?php } ?>
                        <?php if ($data[0]['IsActivated']=="0") { ?>
                        <div class="row">
                            <div class="col-sm-12" style="margin-top:10px;">
                                <label for="fullName">&nbsp;</label>
                                <a href="dashboard.php?action=Vouchers/Edit&code=<?php echo md5("JJ".$data[0]['CouponRegID']);?>">Edit</a> 
                                <form action="" method="post">
                                    <input type="submit" value="Approve" name="approveBtn" class="btn btn-primary">
                                    <input type="submit" value="Reject" name="RejectBtn" class="btn btn-danger">
                                </form>
                                 
                            </div>
                        </div>
                         <?php } ?>
                         -->
                    </div>
                </div>
            </div>
                </div>
            </div>    
            <script>
 function getData() {
     var pin = $('#PinCode').val();
      $('#errorPincode').html("");
     $.ajax({url:'../pincode.php?pincode='+pin,success:function(data){
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
 
 
 
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="border:none">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="border:none;text-align:center;padding:20px;">
      <img src="assets/tick.png"><br><br>
        Updated successfully.
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"  style="border:none">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
 
<!-- The Modal -->
<div class="modal" id="myModalError">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="border:none">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="border:none;text-align:center;padding:20px;">
      <img src="assets/info.png"><br><br>
        Update failed, some required fields are missing.
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"  style="border:none">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
 
<?php
    if (isset($id) && $id>0) {
        ?>
        <script>
               
                    setTimeout(function(){
                        $('#myModal').modal("show");    
                    },2000)
               
                </script>
        <?php
    }
?>
<?php
    if (isset($error) && $error>0) {
        ?>
        <script>
               
                    setTimeout(function(){
                        $('#myModalError').modal("show");    
                    },2000)
               
                </script>
        <?php
    }
?>