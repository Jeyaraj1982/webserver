 <?php 
  $sql= $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_GET['MCode']."'");
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
             $data = $mysql->select("select * from `_tbl_Members` where  `MobileNumber`='".$_POST['MobileNumber']."' and `MemberCode`<>'".$sql[0]['MemberCode']."'");
             if (sizeof($data)>0) {
                 $ErrMobileNumber = "Mobile Number Already Exists";
                 $Error++;
             }
             $dataE = $mysql->select("select * from `_tbl_Members` where  `EmailID`='".$_POST['EmailID']."' and `MemberCode`<>'".$sql[0]['MemberCode']."'");
             if (sizeof($dataE)>0) {
                 $ErrEmailID = "EmailID Already Exists";
                 $Error++;
             }
             if($Error==0){
                 $mysql->execute("update `_tbl_Members` set `MemberName`='".$_POST['Name']."',
                                                            `MobileNumber`='".$_POST['MobileNumber']."',
                                                            `Sex`='".$_POST['Sex']."',
                                                            `EmailID`='".$_POST['EmailID']."',
                                                            `AddressLine1`='". $_POST['AddressLine1']."',
                                                            `AddressLine2`='". $_POST['AddressLine2']."',
                                                            `Password`='". $_POST['Password']."',
                                                            `IsActive`='". $_POST['IsActive']."',
                                                            `Pincode`='".$_POST['PinCode']."' where `MemberCode`='".$sql[0]['MemberCode']."'");
                                                            ?>
                                                            <script>
                           jQuery(document).ready(function() {
           swal("Updated!", "Member Information updated", {
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
       if(IsNonEmpty("PinCode","ErrPinCode","Please Enter PinCode"));
    });
    $("#Password").blur(function () {
       if(IsNonEmpty("Password","ErrPassword","Please Enter Password"));
    });
});
function SubmitProfile() { 
     ErrorCount=0;                                                                                                               
     $('#ErrName').html("");            
     $('#ErrMobileNumber').html("");
     $('#ErrEmailID').html("");
     $('#ErrAddressLine1').html("");
     $('#ErrPinCode').html("");
     $('#ErrPinCode').html("");
     $('#ErrPassword').html("");
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
     IsNonEmpty("Password","ErrPassword","Please Enter Password");
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
                                    <div class="card-title">Edit Member Information</div>
                                </div>
                                <form method="POST" action="" onsubmit="return SubmitProfile();">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Name <span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] : $sql[0]['MemberName']);?>">
                                                <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Gender <span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" id="Sex" name="Sex">
                                                    <option value="Male" <?php echo (isset($_POST[ 'Sex'])) ? (($_POST[ 'Sex']=="Male") ? " selected='selected' " : "") : (($sql[0][ 'Sex']=="Male") ? " selected='selected' " : "");?>>Male</option>
                                                    <option value="Female" <?php echo (isset($_POST[ 'Sex'])) ? (($_POST[ 'Sex']=="Female") ? " selected='selected' " : "") : (($sql[0][ 'Sex']=="Female") ? " selected='selected' " : "");?>>Female</option>
                                                </select>
                                                <span class="errorstring" id="ErrSex"><?php echo isset($ErrSex)? $ErrSex : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Mobile Number <span class="required-label">*</span></label>
                                            <div class="col-sm-4">
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
                                            <label for="PanCard" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Email ID <span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="EmailID" name="EmailID" placeholder="Enter Email ID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] : $sql[0]['EmailID']);?>">
                                                <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="AddressLine1" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Address <span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="AddressLine1" name="AddressLine1" placeholder="Enter AddressLine1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] : $sql[0]['AddressLine1']);?>">
                                                <span class="errorstring" id="ErrAddressLine1"><?php echo isset($ErrAddressLine1)? $ErrAddressLine1 : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="AddressLine2" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="AddressLine2" name="AddressLine2" placeholder="Enter AddressLine1" value="<?php echo (isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] : $sql[0]['AddressLine2']);?>">
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="PinCode" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Pincode</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="PinCode" name="PinCode" maxlength="6" placeholder="Enter PinCode" value="<?php echo (isset($_POST['PinCode']) ? $_POST['PinCode'] : $sql[0]['Pincode']);?>">
                                                <span class="errorstring" id="ErrPinCode"><?php echo isset($ErrPinCode)? $ErrPinCode : "";?></span>
                                            </div>                                                                                                                                                                         
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MemebrPassword" class="col-sm-3 text-left" style="font-weight:normal">Memebr Password <span class="required-label">*</span></label>
                                            <div class="col-sm-4">
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="Password" name="Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :$sql[0]['Password']);?>" Placeholder="Password">
                                                    <span class="input-group-btn">
                                                        <button  onclick="showHidePwd('Password',$(this))" class="btn btn-default reveal" type="button"><i class="icon-eye"></i></button>
                                                    </span>                
                                                </div>
                                                <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                                            </div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="PinCode" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left" style="font-weight:normal">Is Active<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" id="IsActive" name="IsActive">
                                                    <option value="1" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="1") ? " selected='selected' " : "") : (($sql[0][ 'IsActive']=="1") ? " selected='selected' " : "");?>>Active</option>
                                                    <option value="0" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="0") ? " selected='selected' " : "") : (($sql[0][ 'IsActive']=="0") ? " selected='selected' " : "");?>>Deactive</option>
                                                </select>
                                                <span class="errorstring" id="ErrPinCode"><?php echo isset($ErrPinCode)? $ErrPinCode : "";?></span>
                                            </div>                                                                                                                                                                         
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12" style="text-align: right;">
                                            
                                                <a href="dashboard.php?action=ViewMember&MCode=<?php echo $_GET['MCode'];?>" class="btn btn-outline-danger">Cancel</a>
                                                <button type="submit" class="btn btn-warning" name="BtnSubmit">Update Member Information</button>
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
         
         
         
  