<?php
if (isset($_POST['btnsubmit'])) {
    $ErrorCount =0;
    $duplicate = $mysql->select("select * from _tbl_tour_agents where LoginName='".trim($_POST['LoginName'])."'");
    if (sizeof($duplicate)>0) {
        $ErrLoginName="Login Name already exists";
        $ErrorCount++;
     }
   $duplicate = $mysql->select("select * from _tbl_tour_agents where MobileNumber='".trim($_POST['MobileNumber'])."'");
    if (sizeof($duplicate)>0) {
        $ErrorCount++;
        $ErrMobileNumber="Mobile Number already exists";
     }
   $duplicate = $mysql->select("select * from _tbl_tour_agents where EmailID='".trim($_POST['EmailID'])."'");
    if (sizeof($duplicate)>0) {
        $ErrorCount++;
        $ErrEmailID="Email ID already exists";
      }
    
    if($ErrorCount==0){
        $country = $mysql->select("select * from _tbl_master_countrynames where CountryID='".$_POST['CountryName']."'");
        $state = $mysql->select("select * from _tbl_master_statenames where StateID='".$_POST['StateName']."'");
        $district = $mysql->select("select * from _tbl_master_districtnames where DistrictNameID='".$_POST['DistrictName']."'");
        $id = $mysql->insert("_tbl_tour_agents",array("AgentName"     => trim($_POST['AgentName']),
                                                      "MobileNumber"  => trim($_POST['MobileNumber']),
                                                      "EmailID"       => trim($_POST['EmailID']),
                                                      "AddressLine1"  => trim($_POST['AddressLine1']),
                                                      "AddressLine2"  => trim($_POST['AddressLine2']),
                                                      "CityName"      => trim($_POST['CityName']),
                                                      "CountryNameID" => trim($_POST['CountryName']),
                                                      "CountryName"   => trim($country[0]['CountryName']),
                                                      "StateNameID"   => trim($_POST['StateName']),
                                                      "StateName"     => trim($state[0]['StateName']),
                                                      "DistrictNameID"=> trim($_POST['DistrictName']),
                                                      "DistrictName"  => trim($district[0]['DistrictName']),
                                                      "LoginName"     => trim($_POST['LoginName']),
                                                      "LoginPassword" => trim($_POST['LoginPassword']),
                                                      "AddedOn"       => date("Y-m-d H:i:s")));
        if($id>0){
            unset($_POST); $message[] ="Created Agent Successfully";   ?>         
            <script>
              $(document).ready(function() {
                    swal("Agent Created Successfully!", {
                        icon : "success" 
                    });
                 });
            </script>                                                   
             
        <?php }
    } else {   ?>
         <script>
              $(document).ready(function() {
                    swal("Sorry, Coultn't create Agent!", {
                        icon : "error" 
                    });
                 });
            </script>  
   <?php }
}
?>
<script>
$(document).ready(function () {
    $("#AgentName").blur(function () {
        IsNonEmpty("AgentName","ErrAgentName","Please Enter Agnet Name");
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
    $("#LoginName").blur(function () {
        IsNonEmpty("LoginName","ErrLoginName","Please Enter Agnet Name");
    });
    $("#LoginPassword").blur(function () {
        IsNonEmpty("LoginPassword","ErrLoginPassword","Please Enter Agnet Name");
    });
});

function SubmitAgentForm() {
    ErrorCount=0;    
    $('#ErrAgentName').html("");
    $('#ErrMobileNumber').html("");
    $('#ErrEmailID').html("");
    $('#ErrAddressLine1').html("");
    $('#ErrCityName').html("");
    $('#ErrLoginName').html("");
    $('#ErrLoginPassword').html("");
    
    IsNonEmpty("AgentName","ErrAgentName","Please Enter Agnet Name");
    if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number")){
       IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number"); 
    }
    if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email ID")){
       IsEmail("EmailID","ErrEmailID","Please Enter Valid Email ID"); 
    }
    IsNonEmpty("AddressLine1","ErrAddressLine1","Please Enter Address Line1");
    IsNonEmpty("CityName","ErrCityName","Please Enter City Name");
    IsNonEmpty("LoginName","ErrLoginName","Please Enter Agnet Name");
    IsNonEmpty("LoginPassword","ErrLoginPassword","Please Enter Agnet Name");
    
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
                            <div class="card-title">Create Agent</div>
                        </div>
                        <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitAgentForm();">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Agent Name<span class="required-label">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="AgentName" name="AgentName" placeholder="Enter Agent Name" value="<?php echo (isset($_POST['AgentName']) ? $_POST['AgentName'] :"");?>">
                                        <span class="errorstring" id="ErrAgentName"><?php echo isset($ErrAgentName)? $ErrAgentName : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Mobile Number<span class="required-label">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">+91</span>
                                            </div>
                                            <input class="form-control" type="text" id="MobileNumber" name="MobileNumber" maxlength="10" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>">
                                        </div>         
                                        <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Email ID<span class="required-label">*</span></label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="EmailID" id="EmailID" value="<?php echo isset($_POST['EmailID']) ? $_POST['EmailID'] : "";?>">
                                        <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Address Line1<span class="required-label">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="AddressLine1" name="AddressLine1" placeholder="Enter Address Line1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] :"");?>">
                                        <span class="errorstring" id="ErrAddressLine1"><?php echo isset($ErrAddressLine1)? $ErrAddressLine1 : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Address Line2</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="AddressLine2" name="AddressLine2" placeholder="Enter Address Line2" value="<?php echo (isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] :"");?>">
                                        <span class="errorstring" id="ErrAddressLine2"><?php echo isset($ErrAddressLine2)? $ErrAddressLine2 : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">City Name<span class="required-label">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="CityName" name="CityName" placeholder="Enter City Name" value="<?php echo (isset($_POST['CityName']) ? $_POST['CityName'] :"");?>">
                                        <span class="errorstring" id="ErrCityName"><?php echo isset($ErrCityName)? $ErrCityName : "";?></span>
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
                                    <label for="name" class="col-md-3 text-left">Login Name<span class="required-label">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="LoginName" name="LoginName" placeholder="Enter Login Name" value="<?php echo (isset($_POST['LoginName']) ? $_POST['LoginName'] :"");?>">
                                        <span class="errorstring" id="ErrLoginName"><?php echo isset($ErrLoginName)? $ErrLoginName : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Login Password<span class="required-label">*</span></label>
                                    <div class="col-md-9">
                                        <div class="input-icon">
                                            <input type="password" class="form-control" id="LoginPassword" name="LoginPassword" value="<?php echo isset($_POST['LoginPassword']) ? $_POST['LoginPassword'] : "";?>"  placeholder="Enter Login Password">
                                            <span class="input-icon-addon"  onclick="showHidePwd('LoginPassword',$(this))">
                                                <i class="fas fa-eye-slash"></i>
                                            </span>
                                        </div>
                                        <span class="errorstring" id="ErrLoginPassword"><?php echo isset($ErrLoginPassword)? $ErrLoginPassword : "";?></span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="btn btn-warning" type="submit" name="btnsubmit" value="Create Agent">&nbsp;
                                        <a href="dashboard.php?action=Agents/list&status=All" class="btn btn-warning btn-border">Back</a>
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
<?php include_once("footer.php");?>