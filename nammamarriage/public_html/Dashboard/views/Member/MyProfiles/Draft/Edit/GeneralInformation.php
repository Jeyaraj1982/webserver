<?php
    $page="GeneralInformation";
    $response    = $webservice->getData("Member","GetDraftProfileInformation",array("ProfileCode"=>$_GET['Code']));
    $ProfileInfo = $response['data']['ProfileInfo'];
    include_once("settings_header.php");
?>
<script>
        $(document).ready(function() {
            $("#MaritalStatus").change(function() {
                if ($("#MaritalStatus").val()=="0") {
                    $("#ErrMaritalStatus").html("Please select your marital status");  
                }else{
                    $("#ErrMaritalStatus").html("");  
                }
            });
            $("#Language").change(function() {
                if ($("#Language").val()=="0") {
                    $("#ErrLanguage").html("Please select your mother tongue");  
                }else{
                    $("#ErrLanguage").html("");  
                }
            });
            $("#Religion").change(function() {
                if ($("#Religion").val()=="0") {
                    $("#ErrReligion").html("Please select your religion");  
                }else{
                    $("#ErrReligion").html("");  
                }
            });
            $("#ReligionOthers").change(function() {
                if (IsNonEmpty("ReligionOthers", "ErrReligionOthers", "Please enter your religion name")) {
                    IsAlphabet("ReligionOthers", "ErrReligionOthers", "Please enter alphabet characters only");
                }
            });
            $("#Caste").change(function() {
                if ($("#Caste").val()=="0") {
                    $("#ErrCaste").html("Please select your caste");  
                }else{
                    $("#ErrCaste").html("");  
                }
            });
            $("#OtherCaste").change(function() {
                if (IsNonEmpty("OtherCaste", "ErrOtherCaste", "Please enter your caste name")) {
                        IsAlphabet("OtherCaste", "ErrOtherCaste", "Please enter alphabet characters only");
                    }
            });
            $("#Community").change(function() {
                if ($("#Community").val()=="0") {
                    $("#ErrCommunity").html("Please select your community");  
                }else{
                    $("#ErrCommunity").html("");  
                }
            });
            $("#Nationality").change(function() {
                if ($("#Nationality").val()=="0") {
                    $("#ErrNationality").html("Please select your nationality");  
                }else{
                    $("#ErrNationality").html("");  
                }
            });
            $("#MainEducation").change(function() {
                if ($("#MainEducation").val()=="") {
                    $("#ErrMainEducation").html("Please select your education");  
                }else{
                    $("#ErrMainEducation").html("");  
                }
            });
        });
        </script>
<div class="col-sm-10 rightwidget">
    <form method="post" action="" id="frmGI" onsubmit="return DraftProfile.SubmitGeneralInformation();">
    <input type="hidden" value="<?php echo $_GET['Code'];?>" name="Code" id="Code">
        <h4 class="card-title">General Information</h4>
        <div class="form-group row">
            <label for="ProfileFor" class="col-sm-2 col-form-label" style="padding-right:0px;">Profile create for</label>
            <div class="col-sm-4">
				<input type="text" class="form-control" disabled="disabled" id="ProfileFor" value="<?php echo $ProfileInfo['ProfileFor'];?>" >
            </div>
        </div>
        <div class="form-group row">
            <label for="ProfileName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
				<input type="text" class="form-control" disabled="disabled" id="ProfileName" value="<?php echo $ProfileInfo['ProfileName'];?>" >
            </div>
        </div>
        <div class="form-group row">
            <label for="Name" class="col-sm-2 col-form-label">Date of birth</label>
            <div class="col-sm-4" >                                                                         
				<input type="text" class="form-control" disabled="disabled" id="DateofBirth" value="<?php echo date("M d,Y", strtotime($ProfileInfo['DateofBirth']));?>" >
                <!--<div class="col-sm-4" style="max-width:60px !important;padding:0px !important;">
                    <?php $dob=strtotime($ProfileInfo['DateofBirth'])  ; ?>
                    <select class="selectpicker form-control" data-live-search="true" id="date" name="date" style="width:56px">
                        <option value="0">Day</option>
                        <?php for($i=1;$i<=31;$i++) {?>
                        <option value="<?php echo $i; ?>" <?php echo (isset($_POST[ 'date'])) ? (($_POST[ 'date']==$i) ? " selected='selected' " : "") : ((date("d",$dob)==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-4" style="max-width:90px !important;padding:0px !important;margin-right:6px;margin-left:6px;">        
                    <select class="selectpicker form-control" data-live-search="true" id="month" name="month" style="width:56px">
                        <option value="0">Month</option>
                        <?php foreach($_Month as $key=>$value) {?>
                        <option value="<?php echo $key+1; ?>" <?php echo (isset($_POST[ 'month'])) ? (($_POST[ 'month']==$key+1) ? " selected='selected' " : "") : ((date("m",$dob)==$key+1) ? " selected='selected' " : "");?>><?php echo $value;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-4" style="max-width:110px !important;padding:0px !important;">
                    <select class="selectpicker form-control" data-live-search="true" id="year" name="year" style="width:56px">
                        <option value="0">Year</option>
                        <?php for($i=$_DOB_Year_Start;$i>=$_DOB_Year_End;$i--) {?>
                        <option value="<?php echo $i; ?>" <?php echo (isset($_POST['year'])) ? (($_POST['year']==$i) ? " selected='selected' " : "") : ((date("Y",$dob)==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>
                        <?php } ?>
                    </select>      
                </div>-->
			</div>
            <label for="Sex" class="col-sm-2 col-form-label" style="text-align: right;padding-left:0px;padding-right:0px;">Gender</label>
            <div class="col-sm-4" >
				<input type="text" class="form-control" disabled="disabled" id="Sex" value="<?php echo $ProfileInfo['Sex'];?>" >
            </div>
        </div>
        <div class="form-group row">
            <label for="MaritalStatus" class="col-sm-2 col-form-label">Marital status<span id="star">*</span></label>
            <div class="col-sm-4">
                <select class="selectpicker form-control" data-live-search="true" id="MaritalStatus" name="MaritalStatus" onchange="getHowmanyChildrenInfo()">
                    <option value="0">Choose Marital Status</option>
                    <?php foreach($response['data']['MaritalStatus'] as $MaritalStatus) { ?>
                    <option value="<?php echo $MaritalStatus['SoftCode'];?>" <?php echo (isset($_POST[ 'MaritalStatus'])) ? (($_POST[ 'MaritalStatus']==$MaritalStatus[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'MaritalStatus']==$MaritalStatus[ 'CodeValue']) ? " selected='selected' " : "");?>><?php echo $MaritalStatus['CodeValue'];?></option>
                    <?php } ?>
                </select>
                <span class="errorstring" id="ErrMaritalStatus"><?php echo isset($ErrMaritalStatus)? $ErrMaritalStatus : "";?></span>
            </div>
            <label for="Caste" class="col-sm-2 col-form-label" style="text-align: right;padding-left:0px;padding-right:0px;">Mother tongue<span id="star">*</span></label>
            <div class="col-sm-4">
                <select class="selectpicker form-control" data-live-search="true" id="Language" name="Language" >
                    <option value="0">Choose Mother Tongue</option>
                    <?php foreach($response['data']['Language'] as $Language) { ?>
                    <option value="<?php echo $Language['SoftCode'];?>" <?php echo (isset($_POST[ 'Language'])) ? (($_POST[ 'Language']==$Language[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'MotherTongueCode']==$Language[ 'SoftCode']) ? " selected='selected' " : "");?>><?php echo $Language['CodeValue'];?> </option>
                    <?php } ?>
                </select>
                <span class="errorstring" id="ErrLanguage"><?php echo isset($ErrLanguage)? $ErrLanguage : "";?></span>
            </div>
        </div>
        <div class="form-group row" id="mstatus_additionalinfo">
            <label for="HowManyChildren" class="col-sm-2 col-form-label" id="howmanychildren">Children<span id="star">*</span></label>
            <div class="col-sm-4" id="childrencount_input">
                <select class="selectpicker form-control" data-live-search="true" id="HowManyChildren" name="HowManyChildren" onchange="getChildrenwithWhom()">
                    <option value="-1">Choose How Many Children</option>
                    <?php foreach($response['data']['NumberofBrother'] as $HowManyChildren) { ?>
                    <option value="<?php echo $HowManyChildren['SoftCode'];?>" <?php echo (isset($_POST[ 'HowManyChildren'])) ? (($_POST[ 'HowManyChildren']==$HowManyChildren[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'Children']==$HowManyChildren[ 'CodeValue']) ? " selected='selected' " : "");?>><?php echo $HowManyChildren['CodeValue'];?></option>
                    <?php } ?>
                </select>
            </div>
            <label for="Description" class="col-sm-2 col-form-label" id="IsChildrenWithYou" style="text-align: right;padding-left:0px;padding-right:0px;">
                <?php if(trim($ProfileInfo['IsChildrenWithYou'])=="1") {?>
                Is child 
                <?php } else{ ?>
                    Is Children 
                 <?php } ?> with you?<span id="star">*</span>
            </label>
            <div class="col-sm-4" id="Childrenwithyou_input">
                <select class="selectpicker form-control" data-live-search="true" id="ChildrenWithYou" name="ChildrenWithYou">
                    <option value="-1">Choose Children With You</option>
                    <option value="1" <?php echo (isset($_POST[ 'ChildrenWithYou'])) ? (($_POST[ 'ChildrenWithYou']==1) ? " selected='selected' " : "") : (($ProfileInfo['IsChildrenWithYou']==1)? " selected='selected' " : "");?>>Yes</option>
                    <option value="0" <?php echo (isset($_POST[ 'ChildrenWithYou'])) ? (($_POST[ 'ChildrenWithYou']==0) ? " selected='selected' " : "") : (($ProfileInfo['IsChildrenWithYou']==0)? " selected='selected' " : "");?>>No</option>
                </select>
            </div>
        </div>                                                     
        <div class="form-group row">
            <label for="Religion" class="col-sm-2 col-form-label">Religion<span id="star">*</span></label>
            <div class="col-sm-4">
                <select class="selectpicker form-control" data-live-search="true" id="Religion" name="Religion" onchange="DraftProfile.addOtherReligionName()">
                    <option value="0">Choose Religion</option>
                    <?php foreach($response['data']['Religion'] as $Religion) { ?>
                    <option value="<?php echo $Religion['SoftCode'];?>" <?php echo (isset($_POST[ 'Religion'])) ? (($_POST[ 'Religion']==$Religion[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'Religion']==$Religion[ 'CodeValue']) ? " selected='selected' " : "");?>><?php echo $Religion['CodeValue'];?></option>
                    <?php } ?>
                </select>
                <span class="errorstring" id="ErrReligion"><?php echo isset($ErrReligion)? $ErrReligion : "";?></span>
            </div>
            <div class="col-sm-6" id="Religion_additionalinfo"><input type="text" maxlength="50" placeholder="Religion Name" class="form-control" id="ReligionOthers" name="ReligionOthers" value="<?php echo (isset($_POST['ReligionOthers']) ? $_POST['ReligionOthers'] : $ProfileInfo['OtherReligion']);?>">
            <span class="errorstring" id="ErrReligionOthers"><?php echo isset($ErrReligionOthers)? $ErrReligionOthers : "";?></span></div>
        </div>
        <div class="form-group row">
            <label for="Caste" class="col-sm-2 col-form-label">Caste<span id="star">*</span></label>
            <div class="col-sm-4">
                <select class="selectpicker form-control" data-live-search="true" id="Caste" name="Caste"  onchange="DraftProfile.addOtherCasteName()">
                    <option value="0">Choose Caste</option>
                    <?php foreach($response['data']['Caste'] as $Caste) { ?>
                    <option value="<?php echo $Caste['SoftCode'];?>" <?php echo (isset($_POST[ 'Caste'])) ? (($_POST[ 'Caste']==$Caste[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'CasteCode']==$Caste[ 'SoftCode']) ? " selected='selected' " : "");?>><?php echo trim($Caste['CodeValue']);?></option>
                    <?php } ?>
                </select>
                <span class="errorstring" id="ErrCaste"><?php echo isset($ErrCaste)? $ErrCaste : "";?></span>
            </div>
            <div class="col-sm-6"  id="CasteName_additionalinfo"><input type="text" maxlength="50" placeholder="Caste Name" class="form-control" id="OtherCaste" name="OtherCaste" value="<?php echo (isset($_POST['OtherCaste']) ? $_POST['OtherCaste'] : $ProfileInfo['OtherCaste']);?>">
            <span class="errorstring" id="ErrOtherCaste"><?php echo isset($ErrOtherCaste)? $ErrOtherCaste : "";?></span></div>
        </div>
        <div class="form-group row">
             <label for="SubCaste" class="col-sm-2 col-form-label" >Sub caste</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" maxlength="50" name="SubCaste" id="SubCaste" value="<?php echo (isset($_POST['SubCaste']) ? $_POST['SubCaste'] : $ProfileInfo['SubCaste']);?>" placeholder="Sub Caste">
            </div>
            <label for="Community" class="col-sm-2 col-form-label" style="text-align: right;padding-left:0px;padding-right:0px;">Community<span id="star">*</span></label>
            <div class="col-sm-4">
                <select class="selectpicker form-control" data-live-search="true" id="Community" name="Community">
                    <option value="0">Choose Community</option>
                    <?php foreach($response['data']['Community'] as $Community) { ?>
                    <option value="<?php echo $Community['SoftCode'];?>" <?php echo (isset($_POST[ 'Community'])) ? (($_POST[ 'Community']==$Community[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'CommunityCode']==$Community[ 'SoftCode']) ? " selected='selected' " : "");?>><?php echo $Community['CodeValue'];?></option>
                    <?php } ?>
                </select>
                <span class="errorstring" id="ErrCommunity"><?php echo isset($ErrCommunity)? $ErrCommunity : "";?></span>
            </div>
        </div>
        <div class="form-group row">
            <label for="Nationality" class="col-sm-2 col-form-label">Nationality<span id="star">*</span></label>
            <div class="col-sm-4">
                <select class="selectpicker form-control" data-live-search="true" id="Nationality" name="Nationality">
                    <option value="0">Choose Nationality</option>
                    <?php foreach($response['data']['Nationality'] as $Nationality) { ?>
                    <option value="<?php echo $Nationality['SoftCode'];?>" <?php echo (isset($_POST[ 'Nationality'])) ? (($_POST[ 'Nationality']==$Nationality[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'NationalityCode']==$Nationality[ 'SoftCode']) ? " selected='selected' " : "");?>><?php echo trim($Nationality['CodeValue']);?></option>
                    <?php } ?>
                </select> 
                <span class="errorstring" id="ErrNationality"><?php echo isset($ErrNationality)? $ErrNationality : "";?></span>                                                                                            
            </div>
			<label for="Education" class="col-sm-2 col-form-label" style="text-align: right;padding-left:0px;padding-right:0px;">Education<span id="star">*</span></label>
            <div class="col-sm-4">
				<input type="text" class="form-control" name="MainEducation" id="MainEducation" value="<?php echo (isset($_POST['MainEducation']) ? $_POST['MainEducation'] : $ProfileInfo['mainEducation']);?>" placeholder="Eg. B.Sc.,B.A.">
				<span class="errorstring" id="ErrMainEducation"><?php echo isset($ErrMainEducation)? $ErrMainEducation : "";?></span>
			</div>
        </div>
		
        <div class="form-group row" style="margin-bottom:0px;">
            <label for="AboutMe" class="col-sm-12 col-form-label" id="Aboutlabel"></label>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">                                                        
                <textarea style="margin-bottom:5px;height:75px" class="form-control" maxlength="250" name="AboutMe" id="AboutMe"><?php echo (isset($_POST['AboutMe']) ? $_POST['AboutMe'] : $ProfileInfo['AboutMe']);?></textarea>
                <label class="col-form-label" style="padding-top:0px;">Max 250 characters&nbsp;&nbsp;|&nbsp;&nbsp;<span id="textarea_feedback"></span></label>
            </div>
        </div>
        <div class="form-group row" style="margin-bottom:0px;">
            <div class="col-sm-6">
				<!--<a href="javascript:void(0)" onclick="AddGeneralInfo()" class="btn btn-success" name="BtnSaveProfile" style="font-family:roboto">Save</a><br>-->
                <a href="javascript:void(0)" onclick="ConfirmUpdateGInfo()" name="BtnSaveProfile" class="btn btn-primary mr-2" style="font-family:roboto">Save</a>
                <small style="font-size:11px;">Last saved:</small><small style="color:#888;font-size:11px;"> <?php echo PutDateTime($ProfileInfo['LastUpdatedOn']);?></small>
            </div>
            <div class="col-sm-6" style="text-align: right;">
                <ul class="pager" style="margin:0px;float:right">
                    <li><a href="../EducationDetails/<?php echo $_GET['Code'].".htm";?>">Next &#8250;</a></li>
                </ul>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        var text_max = 250;
        var text_length = $('#AboutMe').val().length;
        $('#textarea_feedback').html(text_length + ' characters typed');
        $('#AboutMe').keyup(function() {
            var text_length = $('#AboutMe').val().length;
            var text_remaining = text_max - text_length;
            $('#textarea_feedback').html(text_length + ' characters typed');
        });
         
        getHowmanyChildrenInfo();
        DraftProfile.addOtherReligionName();
        DraftProfile.addOtherCasteName();
        DraftProfile.changeAboutLable();
    });
	
    function ConfirmUpdateGInfo() {
    if(DraftProfile.SubmitGeneralInformation()) {
      $('#PubplishNow').modal('show'); 
      var content = ''
                    +''
                    +'<div class="modal-header">'
                        + '<h4 class="modal-title">Confirmation for edit general information</h4>'
                        + '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding-top:5px;"><span aria-hidden="true"></span></button>'
                    + '</div>'
                    + '<div class="modal-body">'
                        + '<div class="form-group row" style="margin:0px;padding-top:10px;">'
                            + '<div class="col-sm-4">'
                                + '<img src="<?php echo ImageUrl;?>icons/confirmation_profile.png" width="128px">' 
                            + '</div>'
                            + '<div class="col-sm-8"><br>'
                                + '<div class="form-group row">'
                                    +'<div class="col-sm-12">Are you sure want edit general information</div>'
                                + '</div>'
                            + '</div>'
                        +  '</div>'                    
                    + '</div>' 
                    + '<div class="modal-footer">'
                        + '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;'
                        + '<button type="button" class="btn btn-primary" name="Update" class="btn btn-primary" onclick="EditDraftGeneralInformation()" style="font-family:roboto">Update</button>'
                    + '</div>';
            $('#Publish_body').html(content);
     } else {
            return false;
     }
}   
function EditDraftGeneralInformation() {
   var param = $("#frmGI").serialize();
    $('#Publish_body').html(preloading_withText("Updating general information ...","95"));
        $.post(API_URL + "m=Member&a=EditDraftGeneralInformation",param,function(result) {
            
            if (!(isJson(result.trim()))) {
                $('#Publish_body').html(result);
                return ;
            }  
            var obj = JSON.parse(result.trim());
            
            if (obj.status == "success") {
               
                var data = obj.data; 
                var content = '<div  style="height: 300px;">'                                                                              
                                +'<div class="modal-body" style="min-height:175px;max-height:175px;">'
                                    + '<p style="text-align:center;margin-top: 40px;"><img src="'+AppUrl+'assets/images/verifiedtickicon.jpg" width="100px"></p>'
                                    + '<h3 style="text-align:center;">Updated</h3>'             
                                    + '<h4 style="text-align:center;">General Information</h4>'             
                                    + '<p style="text-align:center;"><a href="../EducationDetails/'+data.Code+'.htm" style="cursor:pointer;color:#489bae">Continue</a></p>'
                                +'</div>' 
                            +'</div>';
                $('#Publish_body').html(content);
            } else {
                var data = obj.data; 
                var content = '<div  style="height: 300px;">'                                                                              
                                +'<div class="modal-header">'
                                    +'<h4 class="modal-title">Edit General Information</h4>'
                                    +'<button type="button" class="close" data-dismiss="modal" style="padding-top:5px;">&times;</button>'
                                +'</div>'
                                +'<div class="modal-body" style="min-height:175px;max-height:175px;">'
                                    + '<p style="text-align:center;margin-top: 40px;"><img src="'+AppUrl+'assets/images/exclamationmark.jpg" width="10%"><p>'
                                        + '<h5 style="text-align:center;color:#ada9a9">'+ obj.message+'</h5><br><br>'
                                        +'<div style="text-align:center"><a class="btn btn-primary" data-dismiss="modal" style="padding-top:5pxtext-align:center;color:white">Continue</a></div>'
                                +'</div>' 
                            +'</div>';
            $('#Publish_body').html(content);
            }
        });
}
</script>    
<?php include_once("settings_footer.php");?>                