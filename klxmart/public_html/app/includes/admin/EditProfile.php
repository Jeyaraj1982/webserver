<?php
    if (isset($_POST['updateBtn'])) {
    $error =0;                                      
        
        if($_POST['AdminName']==""){
            $error++;
            $errorMember=Messages::PROFILE_NAME_ERROR_EMPTY;    
        }else{
            if(strlen($_POST['AdminName'])<= JApp::PROFILE_NAME_MINIMUM_LENGTH){
                $error++;                                                                 
                $errorMember=Messages::PROFILE_NAME_ERROR_LESS_THAN_MINIMUM_LENGTH;    
            }
            if(strlen($_POST['AdminName'])>=JApp::PROFILE_NAME_MAXIMUM_LENGTH){
                $error++;                                                                 
                $errorMember=Messages::PROFILE_NAME_ERROR_GREATER_THAN_MAXIMUM_LENGTH;    
            }    
        }
        if($_POST['MobileNumber']==""){
            $error++;
            $errorMobile=Messages::MOBILE_NUMBER_ERROR_EMPTY;    
        }else{
            if(!($_POST['MobileNumber']>=JApp::MOBILE_NUMBER_START_FROM)){                          
                $error++;                                                                 
                $errorMobile=Messages::MOBILE_NUMBER_ERROR_LASS_THAN_START_FROM;    
            }
            if (!($_POST['MobileNumber']<=JApp::MOBILE_NUMBER_END_TO)) {
                $error++;
                $errorMobile=Messages::MOBILE_NUMBER_ERROR_GREATER_THAN_END_TO;
            }
            if (!($_POST['MobileNumber']>=JApp::MOBILE_NUMBER_START_FROM && $_POST['MobileNumber']<=JApp::MOBILE_NUMBER_END_TO)) {
                $error++;
                $errorMobile=Messages::MOBILE_NUMBER_ERROR_INBETWEEN_START_END;
            }
            $dupMobile = $mysql->select("select * from _tbl_Members where MemberID<>'".$_SESSION['User']['MemberID']."' and MobileNumber='".trim($_POST['MobileNumber'])."'");
            if (sizeof($dupMobile)>0) {                                        
                $error++;
                $errorMobile=Messages::MOBILE_NUMBER_ERROR_DUPLICATE;
            }    
        }
        if($_POST['AdminEmail']==""){
            $error++;
            $errorEmail=Messages::EMAIL_NUMBER_ERROR_EMPTY;    
        }else{
            if (!(preg_match(JApp::EMAIL_ID_FORMAT, strtolower($_POST['AdminEmail'])))) {
                $error++;                                                              
                $errorEmail=Messages::EMAIL_ID_ERROR_INVALID;
            }
            $dupEmail = $mysql->select("select * from _tbl_Members where MemberID<>'".$_SESSION['User']['MemberID']."' and AdminEmail='".trim($_POST['AdminEmail'])."'");
            if (sizeof($dupEmail)>0) {
                $error++;
                $errorEmail=Messages::EMAIL_ID_ERROR_DUPLICATE;
            }    
        }
        if($_POST['Address1']==""){
            $error++;
            $errorAddress1=Messages::ADDRESS_LINE1_ERROR_EMPTY;    
        }else{
            if(strlen($_POST['Address1'])<= JApp::ADDRESS_LINE1_MINIMUM_LENGTH){
                $error++;                                                                 
                $errorAddress1=Messages::ADDRESS_LINE1_ERROR_LESS_THAN_MINIMUM_LENGTH;    
            }
            if(strlen($_POST['Address1'])>=JApp::ADDRESS_LINE1_MAXIMUM_LENGTH){
                $error++;                                                                 
                $errorAddress1=Messages::ADDRESS_LINE1_ERROR_GREATER_THAN_MAXIMUM_LENGTH;    
            }    
        }
        if(strlen($_POST['Address2'])>0){
            if(strlen($_POST['Address2'])<= JApp::ADDRESS_LINE1_MINIMUM_LENGTH){
                $error++;                                                                 
                $errorAddress2=Messages::ADDRESS_LINE1_ERROR_LESS_THAN_MINIMUM_LENGTH;    
            }
            if(strlen($_POST['Address2'])>=JApp::ADDRESS_LINE1_MAXIMUM_LENGTH){
                $error++;                                                                 
                $errorAddress2=Messages::ADDRESS_LINE1_ERROR_GREATER_THAN_MAXIMUM_LENGTH;    
            }    
        }
        if($_POST['CountryName']=="0"){
            $error++;
            $errorCountryName=Messages::COUNTRY_NAME_ERROR_EMPTY;    
        }
        if($_POST['StateName']=="0"){
            $error++;
            $ErrStateName=Messages::STATE_NAME_ERROR_EMPTY;    
        }
        if($_POST['DistrictName']=="0"){
            $error++;
            $ErrDistrictName=Messages::DISTRICT_NAME_ERROR_EMPTY;    
        }
        
        if($_POST['PostalCode']==""){
            $error++;
            $errorPinCode=Messages::PINCODE_ERROR_EMPTY;    
        }else{
            if(strlen($_POST['PostalCode']) < JApp::PINCODE_MINIMUM_LENGTH){
                $error++;                                                                 
                $errorPinCode=Messages::PINCODE_ERROR_LESS_THAN_MINIMUM_LENGTH;    
            }
            if(strlen($_POST['PostalCode'])>JApp::PINCODE_MAXIMUM_LENGTH){
                $error++;                                                                 
                $errorPinCode=Messages::PINCODE_ERROR_GREATER_THAN_MAXIMUM_LENGTH;    
            }    
        }
      
        
        if ($error==0) {
            $country = $mysql->select("select * from _tbl_master_countrynames where CountryID='".$_POST['CountryName']."'");
            $state = $mysql->select("select * from _tbl_master_statenames where StateID='".$_POST['StateName']."'");
            $district = $mysql->select("select * from _tbl_master_districtnames where DistrictNameID='".$_POST['DistrictName']."'");
            
            $mysql->execute("update _tbl_admin set 
                                                     AdminEmail     = '".$_POST['AdminEmail']."',
                                                     MobileNumber   = '".$_POST['MobileNumber']."',
                                                     AdminName      = '".$_POST['AdminName']."',
                                                     Gender         = '".$_POST['Gender']."',
                                                     DateofBirth    = '".trim($_POST['year']."-".$_POST['month']."-".$_POST['date'])."',
                                                     Address1       = '".$_POST['Address1']."',
                                                     Address2       = '".$_POST['Address2']."',
                                                     
                                                     CountryNameID  = '".$_POST['CountryName']."',
                                                     CountryName    = '".$country[0]['CountryName']."',
                                                     
                                                     StateNameID    = '".$_POST['StateName']."',
                                                     StateName      = '".$state[0]['StateName']."',
                                                     
                                                     DistrictNameID = '".$_POST['DistrictName']."',
                                                     DistrictName   = '".$district[0]['DistrictName']."',
                                                     
                                                     PostalCode     = '".$_POST['PostalCode']."' 
                                                     where AdminID  ='".$_SESSION['User']['AdminID']."'");
             
            ?>
            <script>
            $(document).ready(function() {
                swal("Profile Information updated successfully", {
                    icon : "success" 
                });
            });
            </script>
            <?php
                                                    
        }
}
    $data = $mysql->select("select * from `_tbl_admin` where  `AdminCode`='".$_SESSION['User']['AdminCode']."'");
?>
 <style>
.form-group{
    padding:0px !important;
}
.form-text {
    display: block;
    margin-top: 0px;
}
.form-group label{
    margin-bottom:0px !important;
}
</style>
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
        <div class="main-panel">
            <div class="container">
                <div class="page-inner"> 
                    <div class="row">
                        <div class="col-md-12">
							<form action="" method="post" enctype="multipart/form-data">                                                             
								<div class="card">
									<div class="card-header">
										<div class="card-title">My Profile Information</div>
										<span style="font-size:12px">Created <?php echo date("M d, Y",strtotime($data[0]['CreatedOn']));?></span>
									</div>
									<div class="card-body">
										<div class="row"> 
											<div class="col-md-6">
												<div class="form-group form-show-validation row">
													<label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right">Admin Code</label>
													<label class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
														<small id="emailHelp" class="form-text text-muted">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data[0]['AdminCode'];?></small>
													</label>
												</div>
											</div>
											<div class="col-md-6">
											</div>
										</div>
										<div class="row"> 
											<div class="col-md-12">
												<div class="form-group form-show-validation row">
													<label for="email" class="col-md-2 mt-sm-2 text-right" style="margin-top: 15px !important;">Name<span id="star">*</span></label>
													<div class="col-md-10  mt-sm-2 ">
														<input class="form-control" type="text" name="AdminName" value="<?php echo isset($_POST['AdminName']) ? $_POST['AdminName'] : $data[0]['AdminName'];?>">
														<div class="help-block" style="color:red"><?php echo $errorMember;?></div>
													</div>
												</div>
											</div>
										</div>
										<div class="row"> 
											<div class="col-md-6">
												<div class="form-group form-show-validation row">
													<label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right" style="margin-top: 15px !important;margin-bottom: 0px !important;">Gender<span id="star">*</span></label>
													<label class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
														<select name="Gender"  class="form-control" >
															<?php foreach(JApp::GENDER as $Gender){ ?>
															<option value="<?php echo $Gender;?>" <?php echo (isset($_POST[ 'Gender'])) ? (($_POST[ 'Gender']==$Gender) ? " selected='selected' " : "") : (($data[0]['Gender']==$Gender) ? " selected='selected' " : "");?>><?php echo $Gender;?></option>
															<?php } ?>
														</select>
													</label>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-show-validation row">
													<label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right" style="margin-top: 15px !important;margin-bottom: 0px !important;">Date of Birth<span id="star">*</span></label>
													<div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
														<div class="form-group row" style="padding: 0px;">
															<div class="col-sm-2">
																<select required="" name="date" id="date" class="form-control" style="width: 83px;">
																	<?php for($i=1;$i<=31;$i++) {?>
																	<option value="<?php echo $i;?>" <?php echo ($i==date("d",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
																	<?php } ?>
																</select>
															</div>
															<div class="col-sm-5" >
																<select required="" style="width: 140px;" class="form-control" name="month" id="month" aria-invalid="true" data-validation-required-message="Please select birth month">
																	<option value="1"  <?php echo ( 1==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>January</option>
																	<option value="2"  <?php echo ( 2==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>February</option>
																	<option value="3"  <?php echo ( 3==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>March</option>
																	<option value="4"  <?php echo ( 4==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>April</option>
																	<option value="5"  <?php echo ( 5==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>May</option>
																	<option value="6"  <?php echo ( 6==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>June</option>
																	<option value="7"  <?php echo ( 7==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>July</option>
																	<option value="8"  <?php echo ( 8==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>August</option>
																	<option value="9"  <?php echo ( 9==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>September</option>
																	<option value="10" <?php echo (10==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>October</option>
																	<option value="11" <?php echo (11==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>November</option>
																	<option value="12" <?php echo (12==date("m",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?>>December</option>
																</select> 
															</div>                                                                          
															<div class="col-sm-5">                                                               
																<select required="" class="form-control" name="year" id="year" aria-invalid="true" data-validation-required-message="Please select birth year">
																	<?php for($i=JApp::DATE_OF_BIRTH_START_YEAR; $i<=JApp::DATE_OF_BIRTH_END_YEAR;$i++) {?>
																	<option value="<?php echo $i;?>" <?php echo ($i==date("Y",strtotime($data[0]['DateofBirth']))) ? " selected='selected' ": "";?> ><?php echo $i;?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</div>
												</div>
											</div>  
										</div>
										<div class="row"> 
											<div class="col-md-6">
												<div class="form-group form-show-validation row">
													<label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right" style="margin-top: 15px !important;">Mobile No<span id="star">*</span></label>
													<div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
														<div class="input-icon">
															<span class="input-icon-addon">
																+91
															</span>                                                                                        
															<input class="form-control" type="text" name="MobileNumber" maxlength="10" style="padding-left: 45px;" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $data[0]['MobileNumber'];?>">
														</div>
														<div class="help-block" style="color:red"><?php echo $errorMobile;?></div>
													</div>
												</div>
											</div>  
											<div class="col-md-6">
												<div class="form-group form-show-validation row">
													<label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right" style="margin-top: 15px !important;">Email ID<span id="star">*</span></label>
													<div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">                   
														<input class="form-control" type="text" name="AdminEmail" value="<?php echo isset($_POST['AdminEmail']) ? $_POST['AdminEmail'] : $data[0]['AdminEmail'];?>">
														<div class="help-block" style="color:red"><?php echo $errorEmail;?></div>
													</div>
												</div>  
											</div>
										</div>
										<div class="row"> 
											<div class="col-md-12">
												<div class="form-group form-show-validation row">
													<label for="email" class="col-md-2 mt-sm-2 text-right" style="margin-top: 15px !important;">Address Line1<span id="star">*</span></label>
													<div class="col-md-10  mt-sm-2 ">
														<input class="form-control" type="text" name="Address1" value="<?php echo isset($_POST['Address1']) ? $_POST['Address1'] : $data[0]['Address1'];?>">
														<div class="help-block" style="color:red"><?php echo $errorAddress1;?></div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">                                      
											<div class="col-md-12">
												<div class="form-group form-show-validation row">
													<label for="email" class="col-md-2 mt-sm-2 text-right" style="margin-top: 15px !important;">Address Line2</label>
													<div class="col-md-10  mt-sm-2 ">
														<input  class="form-control"  type="text" name="Address2" value="<?php echo isset($_POST['Address2']) ? $_POST['Address2'] : $data[0]['Address2'];?>">
														<div class="help-block" style="color:red"><?php echo $errorAddress2;?></div>
													</div>
												</div>
											</div>
										</div>
										<div class="row"> 
											<div class="col-md-6">
												<div class="form-group form-show-validation row">
													<label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right" style="margin-top: 15px !important;">Country Name<span id="star">*</span></label>
													<div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
														<select name="CountryName" id="CountryName" class="form-control" onchange="getStateNames($(this).val())">
															<option value="0" selected="selected">Select Country </option> 
															<?php $countrynames = $mysql->select("select * from _tbl_master_countrynames");?>
															<?php foreach($countrynames as $countryname) {?>
																<option value="<?php echo $countryname['CountryID'];?>" <?php echo $countryname['CountryID']==$data[0]['CountryNameID'] ? " selected='selected' " : "";?>><?php echo $countryname['CountryName'];?></option>
															<?php } ?>
														</select>
														<div class="help-block" style="color:red"><?php echo $errorCountryName;?></div> 
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group form-show-validation row">
													<label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right" style="margin-top: 15px !important;">State Name<span id="star">*</span></label>
													<div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
														<div id="div_statenames">
															<select name="StateName" id="StateName" class="form-control" onchange="GetDistrictname($(this).val())">
																<option value="0" selected="selected">Select State Name</option> 
															</select> 
														</div>
														<div class="help-block" style="color:red" id="ErrStateName"><?php echo isset($ErrStateName)? $ErrStateName : "";?></div>
													</div>
												</div>  
											</div>
										</div>
										<div class="row"> 
											<div class="col-md-6">
												<div class="form-group form-show-validation row">
													<label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right" style="margin-top: 15px !important;">District Name<span id="star">*</span></label>
													<div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
														<div id="div_districtnames">
															<select name="DistrictName" id="DistrictName" class="form-control">
																<option value="0" selected="selected">Select District Name</option> 
															</select> 
														</div>
														<div class="help-block" style="color:red" id="ErrDistrictName"><?php echo isset($ErrDistrictName)? $ErrDistrictName : "";?></div>
													</div>
												</div>
											</div> 
											<div class="col-md-6">
												<div class="form-group form-show-validation row">
													<label for="email" class="col-lg-4 col-md-3 col-sm-4 mt-sm-2 text-right" style="margin-top: 15px !important;">Pin / Zip Code<span id="star">*</span></label>
													<div class="col-lg-8 col-md-9 col-sm-8  mt-sm-2 ">
														<input  class="form-control"  type="text" name="PostalCode" value="<?php echo $data[0]['PostalCode'];?>">
														<div class="help-block" style="color:red"><?php echo $errorPinCode;?></div>
														<br>
													</div>
												</div>  
											</div> 
										</div>
									</div>
								</div>
								<div class="row"> 
									<div class="col-md-12 text-right">
										<a href="dashboard.php?action=MyProfile"  class="btn btn-outline-primary waves-effect waves-light">Cancel</a>&nbsp;&nbsp;
										<button type="submit" id="updateBtn" name="updateBtn" class="btn btn-primary" style="display: none;">Update Information</button>
										<button type="button" onclick="CallConfirmation()" class="btn btn-primary">Update Information</button>
									</div>
								</div>
							</form>
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
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
        <div class="modal-content" >
            <div id="xconfrimation_text"></div>
        </div>
    </div>
</div>
<script>
function CallConfirmation(){
    var txt= '<div class="modal-header" style="padding-bottom:5px">'
                 +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                 +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                    +'<span aria-hidden="true" style="color:black">&times;</span>'
                 +'</button>'
             +'</div>'
             +'<div class="modal-body">'
                +'<div class="form-group row">'                                                            
                    +'<div class="col-sm-12">'
                        +'Are you sure want to update?<br>'
                    +'</div>'
                +'</div>'
             +'</div>'
             +'<div class="modal-footer">'
                +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                +'<button type="button" class="btn btn-success" onclick="update()" >Yes, Confirm</button>'
             +'</div>';
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");                                                      
}
function update() {
    $("#updateBtn").trigger( "click" );
}
</script>