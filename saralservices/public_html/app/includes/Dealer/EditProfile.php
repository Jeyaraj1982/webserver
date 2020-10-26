<?php 
$sql= $mysql->select("select * from `_tbl_Members` where  `MemberID`='".$_SESSION['User']['MemberID']."'");  
if (isset($_POST['BtnSubmit'])) {
            $Error=0;
          if (!(strlen(trim($_POST['Name']))>0)) {
                $ErrName ="Please Enter Your Name";
                $Error++;
             }
             
             if (!(strlen(trim($_POST['MobileNumber']))>0)) {
                $ErrMobileNumber = "Please Enter Mobile Number";                                      
                $Error++;
             }

             if (!(strlen(trim($_POST['EmailID']))>0)) {
                $ErrEmailID = "Please Enter Your Email";
                $Error++;
             } 
             $data = $mysql->select("select * from `_tbl_Members` where  `MobileNumber`='".$_POST['MobileNumber']."' and `MemberID`<>'".$sql[0]['MemberID']."'");
             if (sizeof($data)>0) {
                 $ErrMobileNumber = "Mobile Number Already Exists";
                 $Error++;
             }
             $dataE = $mysql->select("select * from `_tbl_Members` where  `EmailID`='".$_POST['EmailID']."' and `MemberID`<>'".$sql[0]['MemberID']."'");
             if (sizeof($dataE)>0) {
                 $ErrEmailID = "EmailID Already Exists";
                 $Error++;
             }
             if($Error==0){
                 $mysql->execute("update `_tbl_Members` set `MemberName`='".$_POST['Name']."',
                                                            `MobileNumber`='".$_POST['MobileNumber']."',
                                                            `Gender`='".$_POST['Sex']."',
                                                            `EmailID`='".$_POST['EmailID']."',
                                                            `Address1`='". $_POST['AddressLine1']."',
                                                            `Address2`='". $_POST['AddressLine2']."',
                                                            `GSTIN`='". $_POST['GSTIN']."',
                                                            `PostalCode`='".$_POST['PinCode']."' where `MemberID`='".$sql[0]['MemberID']."'");
                  ?>
                   <script>
                           jQuery(document).ready(function() {
           swal("Updated!", "Profile Information updated", {
                        icon : "success",
                        buttons: {                    
                            confirm: {
                                className : 'btn btn-warning'
                            }
                        },
                    });
        });                                
                   
                 
                                                            </script>
                  <?php 
                
             } 
       }
$sql= $mysql->select("select * from `_tbl_Members` where  `MemberID`='".$_SESSION['User']['MemberID']."'");
      ?>
<script>
$(document).ready(function () {
    $("#MobileNumber").keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $("#ErrMobileNumber").html("Digits Only").fadeIn().fadeIn("fast");
            return false;
        }
    });
    $("#PinCode").keypress(function(e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            $("#ErrPinCode").html("Digits Only").fadeIn().fadeIn("fast");
            return false;
        }
    });
   $("#Name").blur(function () {
        if(IsNonEmpty("Name","ErrName","Please Enter Name")){
          IsAlphabet("Name","ErrName","Please Enter Alphabet Characters Only");
        }
   });
   $("#MobileNumber").blur(function () {
       if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){
          IsMobileNumber("MobileNumber","ErrMobileNumber","Please enter valid mobile number");
       }
   });
   $("#EmailID").blur(function () {
        if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email ID")){
          IsEmail("EmailID","ErrEmailID","Please enter valid Email ID");
       }
   });
    $("#AddressLine1").blur(function () {
        IsNonEmpty("AddressLine1","ErrAddressLine1","Please Enter Address Line1");
    });
    $("#PinCode").blur(function () {
        IsNonEmpty("PinCode","ErrPinCode","Please Enter PinCode");
    });
    $("#CityName").blur(function () {
        IsNonEmpty("CityName","ErrCityName","Please Enter City Name");
    });
});
function SubmitProfile() { 
     ErrorCount=0;                                                                                                               
     $('#ErrName').html("");            
     $('#ErrMobileNumber').html("");
     $('#ErrEmailID').html("");
     $('#ErrAddressLine1').html("");
     $('#ErrPinCode').html("");
     $('#ErrCityName').html("");
     if(IsNonEmpty("Name","ErrName","Please Enter Name")){
      IsAlphabet("Name","ErrName","Please enter Alphabet Characters Only");
     }
     if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){                                    
        IsMobileNumber("MobileNumber","ErrMobileNumber","Please enter valid Mobile Number");
     }
     if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email ID")){
        IsEmail("EmailID","ErrEmailID","Please enter valid Email ID");
     }
     IsNonEmpty("AddressLine1","ErrAddressLine1","Please Enter Address Line1");
     IsNonEmpty("PinCode","ErrPinCode","Please Enter PinCode");       
     IsNonEmpty("CityName","ErrCityName","Please Enter City Name");       
   return (ErrorCount==0) ? true : false;
}                   
</script>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
             
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit My Profile Information</div>
                        </div>
                        <form method="POST" action="" onsubmit="return SubmitProfile();">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Name <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] : $sql[0]['MemberName']);?>">
                                        <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Gender <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <select class="form-control" id="Sex" name="Sex">
                                            <option value="Male" <?php echo (isset($_POST[ 'Sex'])) ? (($_POST[ 'Sex']=="Male") ? " selected='selected' " : "") : (($sql[0][ 'Gender']=="Male") ? " selected='selected' " : "");?>>Male</option>
                                            <option value="Female" <?php echo (isset($_POST[ 'Sex'])) ? (($_POST[ 'Sex']=="Female") ? " selected='selected' " : "") : (($sql[0][ 'Gender']=="Female") ? " selected='selected' " : "");?>>Female</option>
                                        </select>
                                        <span class="errorstring" id="ErrSex"><?php echo isset($ErrSex)? $ErrSex : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">+91</span>
                                            </div>
                                            <input type="text" class="form-control" id="MobileNumber" maxlength="10" name="MobileNumber" placeholder="Enter Mobile Number" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $sql[0]['MobileNumber']);?>">
                                        </div>
                                        <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="PanCard" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Email ID <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="EmailID" name="EmailID" placeholder="Enter Email ID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] : $sql[0]['EmailID']);?>">
                                        <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="AddressLine1" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Address <span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="AddressLine1" name="AddressLine1" placeholder="Enter AddressLine1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] : $sql[0]['Address1']);?>">
                                        <span class="errorstring" id="ErrAddressLine1"><?php echo isset($ErrAddressLine1)? $ErrAddressLine1 : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="AddressLine2" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="AddressLine2" name="AddressLine2" placeholder="Enter AddressLine1" value="<?php echo (isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] : $sql[0]['Address2']);?>">
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="PinCode" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">GSTIN<span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="GSTIN" name="GSTIN" placeholder="Enter City Name" value="<?php echo (isset($_POST['GSTIN']) ? $_POST['GSTIN'] : $sql[0]['GSTIN']);?>">
                                        <span class="errorstring" id="ErrCityName"><?php echo isset($ErrCityName)? $ErrCityName : "";?></span>
                                    </div>                                                                                                                                                                         
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="PinCode" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Pincode<span class="required-label">*</span></label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                        <input type="text" class="form-control" id="PinCode" name="PinCode" maxlength="6" placeholder="Enter PinCode" value="<?php echo (isset($_POST['PinCode']) ? $_POST['PinCode'] : $sql[0]['PostalCode']);?>">
                                        <span class="errorstring" id="ErrPinCode"><?php echo isset($ErrPinCode)? $ErrPinCode : "";?></span>
                                    </div>                                                                                                                                                                         
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                    <button type="submit" class="btn btn-warning" name="BtnSubmit">Update</button>
                                        <a href="dashboard.php?action=MyProfile" class="btn btn-danger">Cancel</a>
                                    </div>                                        
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
          