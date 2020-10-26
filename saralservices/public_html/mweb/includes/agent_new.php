<style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px}
</style>
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
   $("#EmailID").blur(function() {
            $('#ErrEmailID').html("");   
            var EmailID = $('#EmailID').val().trim();
            if (EmailID.length>0) {
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
                        var EmailID = $('#EmailID').val().trim();
                        if (EmailID.length>0) {
                          IsEmail("EmailID","ErrEmailID","Please enter valid Email ID");
                        }
                        IsNonEmpty("password","Errpassword","Please Enter password");
                        return (ErrorCount==0) ? true : false;
                 }
</script>
<div class="main-panel">
    <div class="container" style="margin-top:0px !important">
        <div class="page-inner"> 
        <?php if ($_SESSION['User']['IsDealer']==1) { ?>
    <?php if (isset($_POST['BtnSubmit'])) { ?>
        <?php
         $sql= $mysql->select("select * from `_tbl_Members` where MemberID='".$_SESSION['User']['MemberID']."'");
           $Error=0;
          if (!(strlen(trim($_POST['Name']))>0)) {
                $ErrName ="Please Enter Your Name";
                $Error++;
             }
             
             if (!(strlen(trim($_POST['MobileNumber']))>0)) {
                $ErrMobileNumber = "Please Enter Mobile Number";                                      
                $Error++;
             }
                                                                                                                  
              $dataA = $mysql->select("select * from `_tbl_Members` where `MobileNumber`='".$_POST['MobileNumber']."'");
             if (sizeof($dataA)>0) {
                 $ErrMobileNumber = "Mobile Number Already Exists";
                 $Error++;
             }  
             if(strlen(trim($_POST['EmailID']))>0){
            $dataA = $mysql->select("select * from `_tbl_Members` where `EmailID`='".$_POST['EmailID']."'");
             if (sizeof($dataA)>0) {
                 $ErrEmailID = "EmailID Already Exists";
                 $Error++;
             }
             }
             if($Error==0){
                 
                 $id = $mysql->insert("_tbl_Members",array("MemberName"     => $_POST['Name'],
                                                           "MobileNumber"   => $_POST['MobileNumber'],
                                                           "EmailID"        => $_POST['EmailID'],
                                                           "MemberPassword" => $_POST['password'],
                                                           "IsMember"       => "1",
                                                           "IsActive"       => "1",
                                                           "Address1"       => $_POST['Address1'],
                                                           "Address2"       => $_POST['Address2'],
                                                           "PostalCode"     => $_POST['PostalCode'],
                                                           "GSTIN"          => $_POST['GSTIN'],
                                                           "MapedTo"        => $sql[0]['MemberID'],
                                                           "MapedToName"    => $sql[0]['MemberName'],
                                                           "CreatedOn"      => date("Y-m-d H:i:s")));   
                                                           
                                                    
                      if (sizeof($id)>0) { 
                      $message = "Dear Retailer, Your account created. Your username: ".$_POST['MobileNumber']." and Password: ".$_POST['password'].", Login Url: https://www.saralservices.in  Thanks Saral Services";
                          MobileSMS::sendSMS($_POST['MobileNumber'],$message,$id);  
                          $mparam['MailTo']=$_POST['EmailID'];
                          $mparam['MemberID']=$id;
                          $mparam['Subject']="Retailer Registration Completed";
                          $mparam['Message']=$message;
                          MailController::Send($mparam,$mailError); 
                             
                          ?>
                     <script>location.href='dashboard.php?action=agent_created';</script>
               <?php  }
                    }                                                                                                                     
        ?>
          
    <?php } else { ?>  
            <div class="row">
                <div class="col-md-12" style="padding: 5px;">
                    <div class="card" style="background: none;">
                        <div class="card-header">
                            <div class="card-title" style="text-align: center;">Create Retailer</div>
                        </div>
                        <div class="card-body" style="padding:0px;background:none;">
                             <form method="POST" action="" id="frms" enctype="multipart/form-data" onsubmit="return SubmitMember();">
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">                   
                                        <label style="text-transform: none;">Retailer Name</label>
                                        <input type="text" class="form-control" id="Name" name="Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] :"");?>" Placeholder="Retailer Name">
                                        <div class="errorstring" id="ErrName"></div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">                   
                                        <label style="text-transform: none;">Mobile Number</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">+91</span>
                                            </div>
                                            <input type="number" class="form-control" id="MobileNumber" maxlength="10" name="MobileNumber" placeholder="Enter Mobile Number" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "");?>">
                                        </div>
                                        <div class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">                   
                                        <label style="text-transform: none;">Email ID</label>
                                        <input type="text" class="form-control" id="EmailID" name="EmailID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] :"");?>" Placeholder="Email ID">
                                        <div class="errorstring" id="ErrEmailID"></div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">                   
                                        <label style="text-transform: none;">Address Line 1</label>
                                        <input type="text" class="form-control" id="Address1" name="Address1" value="<?php echo (isset($_POST['Address1']) ? $_POST['Address1'] :"");?>" Placeholder="Address Line 1">
                                        <div class="errorstring" id="ErrAddress1"></div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">                   
                                        <label style="text-transform: none;">Address Line 2</label>
                                        <input type="text" class="form-control" id="Address2" name="Address2" value="<?php echo (isset($_POST['Address2']) ? $_POST['Address2'] :"");?>" Placeholder="Address Line 2">
                                        <div class="errorstring" id="ErrAddress2"></div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">                   
                                        <label style="text-transform: none;">Pin Code</label>
                                        <input type="number" class="form-control" id="PostalCode" name="PostalCode" value="<?php echo (isset($_POST['PostalCode']) ? $_POST['PostalCode'] :"");?>" Placeholder="Postal Code">
                                        <div class="errorstring" id="ErrPostalCode"></div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">                   
                                        <label style="text-transform: none;">GSTIN</label>
                                        <input type="text" class="form-control" id="GSTIN" name="GSTIN" value="<?php echo (isset($_POST['GSTIN']) ? $_POST['GSTIN'] :"");?>" Placeholder="GSTIN">
                                        <div class="errorstring" id="ErrGSTIN"></div>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">                   
                                        <label style="text-transform: none;">Login Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password" name="password" value="<?php echo (isset($_POST['password']) ? $_POST['password'] :"");?>" Placeholder="Password">
                                            <span class="input-group-btn">
                                                <button  onclick="showHidePwd('password',$(this))" class="btn btn-default reveal" type="button"><i class="icon-eye"></i></button>
                                            </span>                
                                        </div>
                                        <div class="errorstring" id="Errpassword"></div>
                                    </div>
                                </div>
                              
                                <div class="row" style="margin-top:25px;margin-bottom:10px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button type="button" class="btn btn-black" onclick="location.href='dashboard.php?action=agents_manage';" style="background:#6c757d !important;width: 46%;">Back</button>
                                        <button type="submit" class="btn btn-danger" style="width: 46%;float:right" name="BtnSubmit" id="BtnSubmit">Create Retailer</button>
                                    </div>                                        
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
<?php } else { ?>
<div class="row">
    <div style="padding:20px;color:red;text-align:center;width:100%;">Permission denied. please contact administrator</div>
    <div style="width: 100%"><a href="dashboard.php?action=agents_manage" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a></div>
    <div style="width:100%;padding-top:15px"><a href="dashboard.php?action=agents_manage" class="btn btn-outline-success glow w-100 position-relative"><i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;">Back</i></a></div>
</div>
<?php } ?>
        </div>
    </div>
</div>
 <div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
      </div>
    </div>
  </div>
</div>
 