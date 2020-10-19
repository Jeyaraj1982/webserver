<?php include_once("header.php");?>
<?php
                                         if (isset($_POST['updateBtn'])) {
                                             $mysqldb->execute("update _tbl_Members set `MemberName`='".$_POST['MemberName']."',  
                                                                                        `DateofBirth`='".$_POST['DateofBirth']."',
                                                                                        `Sex`='".$_POST['Gender']."',                        
                                                                                        `MobileNumber`='".$_POST['MobileNumber']."',  
                                                                                        `MemberEmail`='".$_POST['MemberEmail']."',  
                                                                                        `MemberPassword`='".$_POST['MemberPassword']."', 
                                                                                        `FatherName`='".$_POST['FatherName']."', 
                                                                                        `PanCard`='".$_POST['PanCard']."', 
                                                                                        `AdhaarCard`='".$_POST['AdhaarCard']."', 
                                                                                        `AddressLine1`='".$_POST['AddressLine1']."', 
                                                                                        `AddressLine2`='".$_POST['AddressLine2']."', 
                                                                                        `AddressLine3`='".$_POST['AddressLine3']."', 
                                                                                        `PinCode`='".$_POST['PinCode']."', 
                                                                                        `IsActive`='".$_POST['IsActive']."' 
                                                                                        where `MemberID`='".$_GET['code']."'");
                                            $successmessage="Updated Successfully";
                                         }
  $Member =$mysqldb->select("select * from _tbl_Members where MemberCode='".$_GET['code']."'");
  
  ?>
  <script>
    function SubmitEditMember() {
                         $('#ErrMemberName').html("");
                         $('#ErrMobileNumber').html("");
                         $('#ErrMemberEmail').html("");
                         $('#ErrMemberPassword').html("");
                         $('#ErrPinCode').html("");
                         
                         ErrorCount=0;
                        
                         IsAlphaNumeric("MemberName","ErrMemberName","Please Enter alphanumerics characters only");
                         IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number");
                         IsEmail("MemberEmail","ErrMemberEmail","Please Enter Valid Email ID");
                         IsPassword("MemberPassword","ErrMemberPassword","Please Enter more than 6 characters");
                         IsPincode("PinCode","ErrPinCode","Please Enter must have 6 characters");
                         if (ErrorCount==0) {
                           
                            return true;
                        } else{
                            return false;
                        }
                 
}
</script>
  <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">Edit member</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Member</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
  
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">

        <div class="card-body">
        <form method="post" onsubmit="return SubmitEditMember();">
            <h4 class="card-title text-orange"><i class="ti-user"></i>&nbsp;&nbsp;Member Information</h4>
                <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Member ID</strong>
                                                <br>
                                                <p class="text-muted">
                                                    <?php echo $Member[0]['MemberCode'];?> 
                                                    
                                                </p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Sponsor ID</strong>
                                                <br>
                                                <p class="text-muted">
                                                <?php echo $Member[0]['SponsorCode'];?>
                                                </p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Upline ID</strong>
                                                <br>
                                                <p>
                                                  <?php echo $Member[0]['UplineCode'];?>
                                                  </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Created On</strong>
                                                <br>
                                                <p class="text-muted">
                                                    <?php echo $Member[0]['CreatedOn'];?> 
                                                    
                                                </p>
                                            </div>
                                             
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Member Name</strong>
                                                <br>
                                                <p class="text-muted">
                                                    <input type="text" name="MemberName" id="MemberName" class="form-control" value="<?php echo $Member[0]['MemberName'];?>">
                                                    <span class="errorstring" id="ErrMemberName"><?php echo isset($ErrMemberName)? $ErrMemberName : "";?></span>
                                                </p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>DOB</strong>
                                                <br>
                                                <p class="text-muted"><input type="date" name="DateofBirth" id="DateofBirth" class="form-control" value="<?php echo $Member[0]['DateofBirth'];?>"></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Gender</strong>
                                                <br>
                                                <p class="text-muted">
                                                    <select name="Gender" id="Gender" class="form-control">
                                                        <option value="Female" <?php echo (isset($_POST[ 'Gender'])) ? (($_POST[ 'Gender']=="Female") ? " selected='selected' " : "") : (($Member[0][ 'Sex']=="Female") ? " selected='selected' " : "");?>>Female</option>
                                                        <option value="Male" <?php echo (isset($_POST[ 'Gender'])) ? (($_POST[ 'Gender']=="Male") ? " selected='selected' " : "") : (($Member[0][ 'Sex']=="Male") ? " selected='selected' " : "");?>>Male</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted"><input type="text" maxlength="10" name="MobileNumber" id="MobileNumber" class="form-control" value="<?php echo $Member[0]['MobileNumber'];?>">
                                                <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                                                </p>
                                            </div>
                                            <div class="col-md-4 col-xs-6"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">
                                                    <input type="text" name="MemberEmail" id="MemberEmail" class="form-control" value="<?php echo $Member[0]['MemberEmail'];?>"> 
                                                    <span class="errorstring" id="ErrMemberEmail"><?php echo isset($ErrMemberEmail)? $ErrMemberEmail : "";?></span>
                                                </p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Password</strong>
                                                <br>
                                                <p class="text-muted">
                                                    <input type="text" name="MemberPassword" id="MemberPassword" class="form-control" value="<?php echo $Member[0]['MemberPassword'];?>">
                                                    <span class="errorstring" id="ErrMemberPassword"><?php echo isset($ErrMemberPassword)? $ErrMemberPassword : "";?></span>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                             <div class="col-md-4 col-xs-6 b-r"> <strong>Father's Name</strong>
                                                <br>
                                                <p class="text-muted"><input type="text" name="FatherName" id="FatherName" class="form-control" value="<?php echo $Member[0]['FatherName'];?>"></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Adhaar Number</strong>
                                                <br>
                                                <p class="text-muted"><input type="text" name="AdhaarCard" id="AdhaarCard" class="form-control" value="<?php echo $Member[0]['AdhaarCard'];?>"></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Pancard Number</strong>
                                                <br>
                                                <p class="text-muted"><input type="text" name="PanCard" id="PanCard" class="form-control" value="<?php echo $Member[0]['PanCard'];?>"></p>
                                            </div>
                                           </div>
                                           <hr>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Address 1</strong>
                                                <br>
                                                <p class="text-muted"><input type="text" name="AddressLine1" id="AddressLine1" class="form-control" value="<?php echo $Member[0]['AddressLine1'];?>"></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Address 2</strong>
                                                <br>
                                                <p class="text-muted"><input type="text" name="AddressLine2" id="AddressLine2" class="form-control" value="<?php echo $Member[0]['AddressLine2'];?>"></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Address 3</strong>
                                                <br>
                                                <p class="text-muted"><input type="text" name="AddressLine3" id="AddressLine3" class="form-control" value="<?php echo $Member[0]['AddressLine3'];?>"></p>
                                            </div>
                                        </div>
                                        <hr> 
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Pincode</strong>
                                                <br>
                                                <p class="text-muted"><input type="text" name="PinCode" id="PinCode" class="form-control" value="<?php echo $Member[0]['PinCode'];?>">
                                                <span class="errorstring" id="ErrPinCode"><?php echo isset($ErrPinCode)? $ErrPinCode : "";?></span></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>IsActive</strong>
                                                <br>
                                                <p class="text-muted"> 
                                                    <select name="IsActive" class="form-control" style="width: 140px;" >
                                                         <option value="1" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="1") ? " selected='selected' " : "") : (($Member[0][ 'IsActive']=="1") ? " selected='selected' " : "");?>>Active</option>
                                                         <option value="0" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="0") ? " selected='selected' " : "") : (($Member[0][ 'IsActive']=="0") ? " selected='selected' " : "");?>>Deactive</option>
                                                    </select>
                                                </p>
                                            </div>
                                        </div>
                                        <hr>             
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12 b-r" style="text-align: center;">
                                               <span style="color:green;"><?php echo $successmessage;?></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 col-xs-6 b-r">
                                               <button type="submit" name="updateBtn" id="updateBtn" class="btn btn-primary" >Update</button>
                                            </div>
                                        </div>
                                        </form>
                                        <hr>
                                        <div style="text-align:right">
                                            <a href="ViewMember.php?code=<?php echo $Member[0]['MemberID'];?>">View</a>
                                        </div>
                        </div>
                    </div>

                    </div>
                </div>            </div>
            


         <?php include_once("footer.php"); ?>



 
