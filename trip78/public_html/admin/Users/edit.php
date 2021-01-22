<?php
$data = $mysql->select("select * from _tbl_users where md5(UserID)='".$_GET['id']."'");
if (isset($_POST['btnsubmit'])) {
    $ErrorCount =0;
    
   $duplicate = $mysql->select("select * from _tbl_users where MobileNumber='".trim($_POST['MobileNumber'])."' and AgentID<>'".$data[0]['AgentID']."'");
    if (sizeof($duplicate)>0) {
        $ErrorCount++;
        $ErrMobileNumber="Mobile Number already exists";
     }
   $duplicate = $mysql->select("select * from _tbl_users where EmailID='".trim($_POST['EmailID'])."' and AgentID<>'".$data[0]['AgentID']."'");
    if (sizeof($duplicate)>0) {
        $ErrorCount++;
        $ErrEmailID="Email ID already exists";
      }
    
    if($ErrorCount==0){
        $country = $mysql->select("select * from _tbl_master_countrynames where CountryID='".$_POST['CountryName']."'");
        $state = $mysql->select("select * from _tbl_master_statenames where StateID='".$_POST['StateName']."'");
        $district = $mysql->select("select * from _tbl_master_districtnames where DistrictNameID='".$_POST['DistrictName']."'");
        $id = $mysql->execute("update _tbl_users set UserName      = '".$_POST['UserName']."',
                                                     MobileNumber   = '".$_POST['MobileNumber']."',
                                                     EmailID        = '".$_POST['EmailID']."',
                                                     AddressLine1   = '".$_POST['AddressLine1']."',
                                                     AddressLine2   = '".$_POST['AddressLine2']."',
                                                     CityName       = '".$_POST['CityName']."',
                                                     CountryNameID  = '".$_POST['CountryName']."',
                                                     CountryName    = '".$country[0]['CountryName']."',
                                                     StateNameID    = '".$_POST['StateName']."',
                                                     StateName      = '".$state[0]['StateName']."',
                                                     DistrictNameID = '".$_POST['DistrictName']."',
                                                     DistrictName   = '".$district[0]['DistrictName']."',
                                                     PinCode        = '".$_POST['PinCode']."',
                                                     Password       = '".$_POST['Password']."',
                                                     IsActive       = '".$_POST['IsActive']."' where UserID  ='".$data[0]['UserID']."'");
                                                     
                                                            
        ?>         
            <script>
              $(document).ready(function() {
                    swal("Agent Upadted Successfully!", {
                        icon : "success" 
                    });
                 });
            </script>                                                   
             
        <?php 
    } else {   ?>
         <script>
              $(document).ready(function() {
                    swal("Sorry, Coultn't update Agent!", {
                        icon : "error" 
                    });
                 });
            </script>  
   <?php }
}
?>
<script>
$(document).ready(function () {
    $("#UserName").blur(function () {
        IsNonEmpty("UserName","ErrUserName","Please Enter User Name");
    });
    $("#MobileNumber").blur(function () {
        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){
           IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number"); 
        }
    });
    $("#EmailID").blur(function () {
        if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email ID")){
           IsEmail("EmailID","ErrEmailID","Please Enter Valid Email ID"); 
        }
    });
    $("#AddressLine1").blur(function () {
        IsNonEmpty("AddressLine1","ErrAddressLine1","Please Enter Address Line1");
    });
    $("#CityName").blur(function () {
        IsNonEmpty("CityName","ErrCityName","Please Enter City Name");
    });
    $("#Passwordd").blur(function () {
        IsNonEmpty("LoginPassword","ErrLoginPassword","Please Enter Agnet Name");
    });
});

function SubmitAgentForm() {
    ErrorCount=0;    
    $('#ErrUserName').html("");
    $('#ErrMobileNumber').html("");
    $('#ErrEmailID').html("");
    $('#ErrAddressLine1').html("");
    $('#ErrCityName').html("");
    $('#ErrPassword').html("");
    
    IsNonEmpty("UserName","ErrUserName","Please Enter User Name");
    if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){
       IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number"); 
    }
    if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email ID")){
       IsEmail("EmailID","ErrEmailID","Please Enter Valid Email ID"); 
    }
    IsNonEmpty("AddressLine1","ErrAddressLine1","Please Enter Address Line1");
    IsNonEmpty("CityName","ErrCityName","Please Enter City Name");
    IsNonEmpty("Password","ErrPassword","Please Login Password");
    
    return (ErrorCount==0) ? true : false;
}
</script>
<script>
function getStateNames(CountryID,StateID) {
        if(CountryID=="0"){
           $('#div_statenames').html('<select name="StateName" id="StateName" class="form-control"><option value="0" selected="selected">Select State Name</option></select>');
           $('#div_districtnames').html('<select name="DistrictName" id="DistrictName" class="form-control"><option value="0" selected="selected">Select District Name</option></select>');
           return;
        }
        $.ajax({url:'webservice.php?action=getStateNames&CountryID='+CountryID+'&StateID='+StateID,success:function(data){
            $('#div_statenames').html(data);
        }});
    }
function GetDistrictname(StateID,DistrictID) {
        if(StateID=="0"){
           $('#div_districtnames').html('<select name="DistrictName" id="DistrictName" class="form-control"><option value="0" selected="selected">Select District Name</option></select>');
           return; 
        }
        $.ajax({url:'webservice.php?action=GetDistrictname&StateID='+StateID+'&DistrictID='+DistrictID,success:function(data){
            $('#div_districtnames').html(data);
        }});
    }
</script>
<style>
.has-success .form-control {
    border-color: #ebedf2 !important;
    color: #495057 !important;
}
.has-success .input-group-text {
    border-color: #ced4da !important;
    background: #e9ecef !important;
    color: #495057 !important;   
    border: none;
}
.has-success label {
    color: #495057 !important;
}
</style>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit User</div>
                        </div>
                        <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitAgentForm();">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">User Name<span class="required-label">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="UserName" name="UserName" placeholder="Enter User Name" value="<?php echo (isset($_POST['UserName']) ? $_POST['UserName'] :$data[0]['UserName']);?>">
                                        <span class="errorstring" id="ErrUserName"><?php echo isset($ErrUserName)? $ErrUserName : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Mobile Number<span class="required-label">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">+91</span>
                                            </div>
                                            <input class="form-control" type="text" id="MobileNumber" name="MobileNumber" maxlength="10" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $data[0]['MobileNumber'];?>">
                                        </div>          
                                        <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Email ID<span class="required-label">*</span></label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="EmailID" id="EmailID" value="<?php echo isset($_POST['EmailID']) ? $_POST['EmailID'] : $data[0]['EmailID'];?>">
                                        <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Address Line1<span class="required-label">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="AddressLine1" name="AddressLine1" placeholder="Enter Address Line1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] :$data[0]['AddressLine1']);?>">
                                        <span class="errorstring" id="ErrAddressLine1"><?php echo isset($ErrAddressLine1)? $ErrAddressLine1 : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Address Line2</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="AddressLine2" name="AddressLine2" placeholder="Enter Address Line2" value="<?php echo (isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] :$data[0]['AddressLine2']);?>">
                                        <span class="errorstring" id="ErrAddressLine2"><?php echo isset($ErrAddressLine2)? $ErrAddressLine2 : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">City Name<span class="required-label">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="CityName" name="CityName" placeholder="Enter City Name" value="<?php echo (isset($_POST['CityName']) ? $_POST['CityName'] :$data[0]['CityName']);?>">
                                        <span class="errorstring" id="ErrCityName"><?php echo isset($ErrCityName)? $ErrCityName : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Pincode<span class="required-label">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="PinCode" name="PinCode" placeholder="Enter Pin Code" value="<?php echo (isset($_POST['PinCode']) ? $_POST['PinCode'] :$data[0]['PinCode']);?>">
                                        <span class="errorstring" id="ErrPinCode"><?php echo isset($ErrPinCode)? $ErrPinCode : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Country Name<span class="required-label">*</span></label>
                                    <div class="col-md-9">
                                        <select name="CountryName" id="CountryName" class="form-control" onchange="getStateNames($(this).val())">
                                            <option value="0" selected="selected">Select Country </option> 
                                            <?php $countrynames = $mysql->select("select * from _tbl_master_countrynames");?>
                                            <?php foreach($countrynames as $countryname) {?>
                                                <option value="<?php echo $countryname['CountryID'];?>" <?php echo $countryname['CountryID']==$data[0]['CountryNameID'] ? " selected='selected' " : "";?>><?php echo $countryname['CountryName'];?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="errorstring" id="ErrCountryName"><?php echo isset($ErrCountryName)? $ErrCountryName : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">State Name<span class="required-label">*</span></label>
                                    <div class="col-md-9">
                                        <div id="div_statenames">
                                            <select name="StateName" id="StateName" class="form-control" onchange="GetDistrictname($(this).val())">
                                                <option value="0" selected="selected">Select State Name</option> 
                                            </select> 
                                        </div>
                                        <span class="errorstring" id="ErrStateName"><?php echo isset($ErrStateName)? $ErrStateName : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">District Name<span class="required-label">*</span></label>
                                    <div class="col-md-9">
                                        <div id="div_districtnames">
                                            <select name="DistrictName" id="DistrictName" class="form-control">
                                                <option value="0" selected="selected">Select District Name</option> 
                                            </select> 
                                        </div>
                                        <span class="errorstring" id="ErrDistrictName"><?php echo isset($ErrDistrictName)? $ErrDistrictName : "";?></span>
                                    </div>
                                </div>
                             
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Login Password<span class="required-label">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-icon">
                                            <input type="password" class="form-control" id="Password" name="Password" value="<?php echo isset($_POST['Password']) ? $_POST['Password'] : $data[0]['Password'];?>"  placeholder="Enter Login Password">
                                            <span class="input-icon-addon"  onclick="showHidePwd('Password',$(this))">
                                                <i class="fas fa-eye-slash"></i>
                                            </span>
                                        </div>
                                        <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">IsActive<span class="required-label">*</span></label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="IsActive" id="IsActive">
                                            <option value="1" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="1") ? " selected='selected' " : "") : (($data[0]['IsActive']=="1") ? " selected='selected' " : "");?>>Yes</option>
                                            <option value="0" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="0") ? " selected='selected' " : "") : (($data[0]['IsActive']=="0") ? " selected='selected' " : "");?>>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="btn btn-warning" type="submit" name="btnsubmit" value="Update Agent">&nbsp;
                                        <a href="dashboard.php?action=Users/list&status=All" class="btn btn-warning btn-border">Back</a>
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
<script>
$(document).ready(function(){
            getStateNames('<?php echo $data[0]['CountryNameID'] ;?>','<?php echo $data[0]['StateNameID'];?>');
            GetDistrictname('<?php echo $data[0]['StateNameID'] ;?>','<?php echo $data[0]['DistrictNameID'];?>');
         });
</script>