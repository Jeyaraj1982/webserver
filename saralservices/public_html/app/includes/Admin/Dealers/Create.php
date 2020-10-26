<?php 
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
             
              $dataA = $mysql->select("select * from `_tbl_Members` where `MobileNumber`='".$_POST['MobileNumber']."'");
             if (sizeof($dataA)>0) {
                 $ErrMobileNumber = "Mobile Number Already Exists";
                 $Error++;
             }  
            $dataA = $mysql->select("select * from `_tbl_Members` where `EmailID`='".$_POST['EmailID']."'");
             if (sizeof($dataA)>0) {
                 $ErrEmailID = "EmailID Already Exists";
                 $Error++;
             }
             if($Error==0){
                 
                 $id = $mysql->insert("_tbl_Members",array("MemberName"     => $_POST['Name'],
                                                           "MobileNumber"   => $_POST['MobileNumber'],
                                                           "EmailID"        => $_POST['EmailID'],
                                                           "MemberPassword" => $_POST['password'],
                                                           "IsDealer"       => "1",
                                                           "IsActive"       => "1",
                                                           "Address1"       => $_POST['Address1'],
                                                           "Address2"       => $_POST['Address2'],
                                                           "PostalCode"     => $_POST['PostalCode'],
                                                           "GSTIN"          => $_POST['GSTIN'],
                                                           "MapedTo"        => $_SESSION['User']['MemberID'],
                                                           "MapedToName"    => $_SESSION['User']['MemberName'],
                                                           "CreatedOn"      => date("Y-m-d H:i:s")));   
                                                           
                                                    
                      if (sizeof($id)>0) {  
                          $message = "Dear Dealer, Your account created. Your username: ".$_POST['MobileNumber']." and Password: ".$_POST['password'].", Login Url: https://www.saralservices.in  Thanks Saral Services";
                          MobileSMS::sendSMS($_POST['MobileNumber'],$message,$id);  
                   
                          $mparam['MailTo']=$_POST['EmailID'];
                          $mparam['MemberID']=$id;
                          $mparam['Subject']="Dealer Registration Completed";
                          $mparam['Message']=$message;
                          MailController::Send($mparam,$mailError);     
                          ?>
                     <script>location.href='dashboard.php?action=Dealers/Created';</script>
               <?php  }
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
    $("#password").blur(function () {
        IsNonEmpty("password","Errpassword","Please Enter password");
    });
    
    });
 function SubmitMember() { 
                         ErrorCount=0;       
                         $('#ErrName').html("");            
                         $('#ErrMobileNumber').html("");            
                         $('#ErrEmailID').html("");            
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
                        IsNonEmpty("password","Errpassword","Please Enter password");
                        return (ErrorCount==0) ? true : false;
                 }
</script>

        <!-- Sidebar -->
<style>
label{
    font-weight: normal;
}
</style>              
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title"></h4>
                    </div>
                    <form method="POST" action="" id="frms" enctype="multipart/form-data" onsubmit="return SubmitMember();">
                      <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">New Dealer</div>
                                </div>
                                <div class="card-body">        
                                        <div class="form-group form-show-validation row">
                                            <label for="MemberName" class="col-sm-3 text-left" style="font-weight:normal">Dealer Name  <span class="required-label">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="Name" name="Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] :"");?>" Placeholder="Dealer Name">
                                                <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MobileNumber" class="col-sm-3 text-left" style="font-weight:normal">Mobile Number <span class="required-label">*</span></label>
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
                                            <label for="EmailID" class="col-sm-3 text-left" style="font-weight:normal">Email ID <span class="required-label">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="EmailID" name="EmailID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] :"");?>" Placeholder="Email ID">
                                                <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                                            </div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="EmailID" class="col-sm-3 text-left" style="font-weight:normal">Address Line 1</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="Address1" name="Address1" value="<?php echo (isset($_POST['Address1']) ? $_POST['Address1'] :"");?>" Placeholder="Address Line 1">
                                            </div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="EmailID" class="col-sm-3 text-left" style="font-weight:normal">Address Line 2</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="Address2" name="Address2" value="<?php echo (isset($_POST['Address2']) ? $_POST['Address2'] :"");?>" Placeholder="Address Line 2">
                                                <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                                            </div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="EmailID" class="col-sm-3 text-left" style="font-weight:normal">Pin Code</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="PostalCode" name="PostalCode" value="<?php echo (isset($_POST['PostalCode']) ? $_POST['PostalCode'] :"");?>" Placeholder="Postal Code">
                                            </div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="EmailID" class="col-sm-3 text-left" style="font-weight:normal">GSTIN</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="GSTIN" name="GSTIN" value="<?php echo (isset($_POST['GSTIN']) ? $_POST['GSTIN'] :"");?>" Placeholder="GSTIN">
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MemebrPassword" class="col-sm-3 text-left" style="font-weight:normal">Login Password <span class="required-label">*</span></label>
                                            <div class="col-sm-4">
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="password" name="password" value="<?php echo (isset($_POST['password']) ? $_POST['password'] :"");?>" Placeholder="Password">
                                                    <span class="input-group-btn">
                                                        <button  onclick="showHidePwd('password',$(this))" class="btn btn-default reveal" type="button"><i class="icon-eye"></i></button>
                                                    </span>                
                                                </div>
                                                <span class="errorstring" id="Errpassword"><?php echo isset($Errpassword)? $Errpassword : "";?></span>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12"> 
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12" style="text-align: right;">
                                            <a href="dashboard.php?action=Dealers/Manage&Status=All" class="btn btn-outline-danger">Cancel</a>
                                            <button type="submit" class="btn btn-warning" name="BtnSubmit" id="BtnSubmit">Create Dealer</button>
                                            </div>                                        
                                        </div>                                                                             
                                    </div>
                               
                            </div>                                                                                             
                        </div>
                        
                         </form>
                    </div>
                </div>
            </div>
