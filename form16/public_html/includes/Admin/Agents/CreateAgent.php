<?php 
$_Month = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
    $_SES = array("AM","PM");
    $_DOB_Year_Start = (date("Y")-18)-55;
    $_DOB_Year_End = date("Y")-18;
  
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
             
              $dataA = $mysql->select("select * from `_tbl_Agents` where `MobileNumber`='".$_POST['MobileNumber']."'");
             if (sizeof($dataA)>0) {
                 $ErrMobileNumber = "Mobile Number Already Exists";
                 $Error++;
             }  
            $dataA = $mysql->select("select * from `_tbl_Agents` where `EmailID`='".$_POST['EmailID']."'");
             if (sizeof($dataA)>0) {
                 $ErrEmailID = "EmailID Already Exists";
                 $Error++;
             }
             if($Error==0){
                 $AgentCode   = SeqMaster::GetNextAgentCode();
                  
                                                                   
                  $id = $mysql->insert("_tbl_Agents",array(                         
                                                          "AgentCode"        => $AgentCode,                          
                                                          "AgentName"        => $_POST['Name'],                          
                                                          "EmailID"          => $_POST['EmailID'], 
                                                          "MobileNumber"     => $_POST['MobileNumber'], 
                                                          "Password"         => $_POST['Password'], 
                                                          "GSTNumber"         => $_POST['GSTNumber'], 
                                                          "AddressLine1"     => $_POST['AddressLine1'], 
                                                          "AddressLine2"     => $_POST['AddressLine2'],
                                                          "CityName"         => $_POST['CityName'], 
                                                          "PinCode"          => $_POST['Pincode'], 
                                                          "CreatedByID"    => $_SESSION['User']['AdminID'], 
                                                          "CreatedByName"    => $_SESSION['User']['AdminName'], 
                                                          "CreatedOn"        => date("Y-m-d H:i:s")));
                                                          
                      
                      MobileSMS::sendSMS($_POST['MobileNumber'],"Your account has been created. Thanks Form16.online",$id);
                    $message = "Your account has been created";
                   
                    $mparam['MailTo']=$_POST['EmailID'];
                    $mparam['MemberID']=$id;
                    $mparam['Subject']="Account Created";
                    $mparam['Message']=$message;
                    MailController::Send($mparam,$mailError);     
                      
                       
                      if(sizeof($id)>0){
                            unset($_POST);            
                        echo "<script>location.href='dashboard.php?action=Agents/AgentCreated';</script>";
                      }
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
   $("#AddressLine1").blur(function () {
       IsNonEmpty("AddressLine1","ErrAddressLine1","Please Enter AddressLine1");
   });
   $("#Pincode").blur(function () {
       IsNonEmpty("Pincode","ErrPincode","Please Enter Pincode");
       if ($("#Pincode").val().length!=6) {
           $("#ErrPincode").html("Invalid pincode");      
       }
       
       if (!(parseInt($("#Pincode").val())>100000 && parseInt($("#Pincode").val())<999999)) {
             $("#ErrPincode").html("Invalid pincode");  
       }
   }); 
   $("#CityName").blur(function () {
       IsNonEmpty("CityName","ErrCityName","Please Enter CityName");
   });
 /*  $("#UserName").blur(function () {
       IsNonEmpty("UserName","ErrUserName","Please Enter User Name");
   });  */
   $("#Password").blur(function () {
       IsNonEmpty("Password","ErrPassword","Please Enter Password");
   }); 
 
});
function SubmitProfile() { 
     ErrorCount=0;                                                                                                               
     $('#ErrName').html("");            
     $('#ErrMobileNumber').html("");
     $('#ErrEmailID').html("");
     $('#ErrAddressLine1').html("");
     $('#ErrPincode').html("");
     $('#ErrCityName').html("");
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
      
     IsNonEmpty("AddressLine1","ErrAddressLine1","Please Enter AddressLine1");
     IsNonEmpty("Pincode","ErrPincode","Please Enter Pincode");
     IsNonEmpty("CityName","ErrCityName","Please Enter City Name");
  
     IsNonEmpty("Password","ErrPassword","Please Enter Password");   
  
            
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
                    <form method="POST" action="" id="frms" enctype="multipart/form-data" onsubmit="return SubmitProfile();">
                      <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Create New Agent</div>
                                </div>
                                <div class="card-body"> 
                                        <div class="form-group form-show-validation row">
                                            <label for="AgentCode" class="col-sm-3" style="font-weight:normal">Agent Code <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="AgentCode" name="AgentCode" value="<?php echo $AdminCode;?>"Placeholder="Agent Code">
                                                <span class="errorstring" id="ErrAgentCode"><?php echo isset($ErrAgentCode)? $ErrAgentCode : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-sm-3" style="font-weight:normal">Name <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="Name" name="Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] :"");?>"Placeholder="Name">
                                                <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                                            </div>
                                        </div>
                                         
                                     
                                        <div class="form-group form-show-validation row">                                                                  
                                            <label for="MobileNumber" class="col-sm-3 text-left" style="font-weight:normal">Mobile Number <span class="required-label">*</span></label>                                   
                                            <div class="col-sm-5">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="MobileNumber" maxlength="10" name="MobileNumber" placeholder="Enter Mobile Number" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "");?>">
                                                </div>
                                                <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Email" class="col-sm-3 text-left" style="font-weight:normal">Email <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="EmailID" name="EmailID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] :"");?>" Placeholder="Email ID">
                                                <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="AddressLine1" class="col-sm-3 text-left" style="font-weight:normal">Address <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="AddressLine1" name="AddressLine1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] :"");?>" Placeholder="AddressLine1">
                                                <span class="errorstring" id="ErrAddressLine1"><?php echo isset($ErrAddressLine1)? $ErrAddressLine1 : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="AddressLine2" class="col-sm-3 text-left"></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="AddressLine2" name="AddressLine2" value="<?php echo (isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] :"");?>" Placeholder="AddressLine2">
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="CityName" class="col-sm-3 text-left" style="font-weight:normal">City Name <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="CityName" name="CityName" value="<?php echo (isset($_POST['CityName']) ? $_POST['CityName'] :"");?>" Placeholder="City Name">
                                                <span class="errorstring" id="ErrCityName"><?php echo isset($ErrCityName)? $ErrCityName : "";?></span>
                                            </div>
                                        </div> 
                                               
                                        <div class="form-group form-show-validation row">
                                            <label for="CityName" class="col-sm-3 text-left" style="font-weight:normal">Pincode <span class="required-label">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="Pincode" name="Pincode" value="<?php echo (isset($_POST['Pincode']) ? $_POST['Pincode'] :"");?>" Placeholder="Pincode">
                                                <span class="errorstring" id="ErrPincode"><?php echo isset($ErrPincode)? $ErrPincode : "";?></span>
                                            </div>
                                        </div>                                                               
                                        <div class="form-group form-show-validation row">
                                            <label for="CityName" class="col-sm-3 text-left" style="font-weight:normal">GSTNumber</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="GSTNumber" name="GSTNumber" value="<?php echo (isset($_POST['GSTNumber']) ? $_POST['GSTNumber'] :"");?>" Placeholder="GSTNumber">
                                                <span class="errorstring" id="ErrCityName"><?php echo isset($ErrGSTNumber)? $ErrGSTNumber : "";?></span>
                                            </div>
                                        </div>
                                   
                                        <div class="form-group form-show-validation row">
                                            <label for="Pincode" class="col-sm-3 text-left" style="font-weight:normal">Password <span class="required-label">*</span></label>  
                                            <div class="col-sm-5">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="Password" name="Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>" Placeholder="Password">
                                                    <span class="input-group-btn">
                                                        <button  onclick="showHidePwd('Password',$(this))" class="btn btn-default reveal" type="button"><i class="icon-eye"></i></button>
                                                    </span>          
                                                </div>
                                                <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                                            </div>
                                        </div>
                                         
                                        <div class="form-group">
                                            <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $Successmessage;?> </div>
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
                                            <a href="dashboard.php?action=Agents/ManageAgents&Status=All" class="btn btn-outline-danger">Cancel</a>
                                            <button type="submit" class="btn btn-warning" name="BtnSubmit" id="BtnSubmit">Submit</button>
                                            </div>                                        
                                        </div>                                                                             
                                    </div>
                               
                            </div>                                                                                             
                        </div>
                        
                         </form>
                    </div>
                </div>
            </div>
