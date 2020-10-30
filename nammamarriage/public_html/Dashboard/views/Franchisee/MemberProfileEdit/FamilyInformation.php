<?php
    $page="FamilyInformation";
   
    
    $response = $webservice->getData("Franchisee","GetDraftProfileInformation",array("ProfileCode"=>$_GET['Code']));
    $ProfileInfo          = $response['data']['ProfileInfo'];
?>
<?php include_once("settings_header.php");?>
<script>
 $(document).ready(function () {
        $("#FathersContact").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                $("#ErrFathersContact").html("Digits Only").fadeIn("fast");
                return false;
            }
        });$("#MotherContact").keypress(function (e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                $("#ErrMotherContact").html("Digits Only").fadeIn("fast");
                return false;
            }
        });
        $("#FatherName").change(function() {
            if (IsNonEmpty("FatherName","ErrFatherName","Please enter your father's name")) {
                IsAlphabet("FatherName","ErrFatherName","Please enter alpha numeric characters only");
            }
        });
        $("#MotherName").change(function() {
            if (IsNonEmpty("MotherName","ErrMotherName","Please enter your mother's name")) {
            IsAlphabet("MotherName","ErrMotherName","Please enter alpha numeric characters only");
            }
        });
        if ($('#FathersContact').val().trim().length>0) {
            $("#FathersContact").change(function() {
                IsMobileNumber("FathersContact","ErrFathersContact","Please Enter Valid Mobile Number");
            });
        }
        if ($('#MotherContact').val().trim().length>0) {
            $("#MotherContact").change(function() {
                IsMobileNumber("MotherContact","ErrMotherContact","Please Enter Valid Mobile Number");
        });
        }
        $("#FatherOtherOccupation").change(function() {
            if(IsNonEmpty("FatherOtherOccupation","ErrFatherOtherOccupation","Please enter your father other occupation")){
               IsAlphabet("FatherOtherOccupation","ErrFatherOtherOccupation","Please enter alphabet characters only");
            }
        });
        $("#MotherOtherOccupation").change(function() {
            if(IsNonEmpty("MotherOtherOccupation","ErrMotherOtherOccupation","Please enter your mother other occupation")){
                   IsAlphabet("MotherOtherOccupation","ErrMotherOtherOccupation","Please enter alphabet characters only");
                }
        });
        $("#FamilyLocation1").change(function() {
            IsNonEmpty("FamilyLocation1","ErrFamilyLocation1","Please enter your family location"); 
        });  
        $("#Ancestral").change(function() {                                                                                                       
            IsNonEmpty("Ancestral","ErrAncestral","Please enter your ancestral");  
        });
        $("#FamilyType").change(function() {
            if ($("#FamilyType").val()=="0") {
                $("#ErrFamilyType").html("Please select your family type");  
            }else{
                $("#ErrFamilyType").html("");  
            }
        });
        $("#FamilyValue").change(function() {
            if ($("#FamilyValue").val()=="0") {
                $("#ErrFamilyValue").html("Please select your family value");  
            }else{
                $("#ErrFamilyValue").html("");  
            }
        });
        $("#FamilyAffluence").change(function() {
            if ($("#FamilyAffluence").val()=="0") {
                $("#ErrFamilyAffluence").html("Please select your family affluence");  
            }else{
                $("#ErrFamilyAffluence").html("");  
            }
        });
        $("#NumberofBrother").change(function() {
            if ($("#NumberofBrother").val()=="Choose") {
                $("#ErrNumberofBrother").html("Please select your number of brother");  
            }else{
                $("#ErrNumberofBrother").html("");  
            }
        });
        $("#NumberofSisters").change(function() {
            if ($("#NumberofSisters").val()=="Choose") {
                $("#ErrNumberofSisters").html("Please select your number of sister");  
            }else{
                $("#ErrNumberofSisters").html("");  
            }
        });
 });
function submitprofile() {
       $('#ErrFatherName').html("");
       $('#ErrMotherName').html("");
       $('#ErrFathersContact').html("");
       $('#ErrMotherContact').html("");
       $('#ErrFamilyLocation1').html("");
       $('#ErrAncestral').html("");
       $('#ErrFamilyType').html("");
       $('#ErrFamilyAffluence').html("");
       $('#ErrFamilyValue').html("");
       
        ErrorCount=0;
        
        if (IsNonEmpty("FatherName","ErrFatherName","Please enter your father's name")) {
            IsAlphabet("FatherName","ErrFatherName","Please enter alpha numeric characters only");
            }
        if (IsNonEmpty("MotherName","ErrMotherName","Please enter your mother's name")) {
            IsAlphabet("MotherName","ErrMotherName","Please enter alpha numeric characters only");
            }
         if ($('#FathersContact').val().trim().length>0) {
            IsMobileNumber("FathersContact","ErrFathersContact","Please Enter Valid Mobile Number");
        }
        if ($('#MotherContact').val().trim().length>0) {
            IsMobileNumber("MotherContact","ErrMotherContact","Please Enter Valid Mobile Number");
        }
       if ($('#FathersOccupation').val()=="OT112") {
                if(IsNonEmpty("FatherOtherOccupation","ErrFatherOtherOccupation","Please enter your father other occupation")){
                   IsAlphabet("FatherOtherOccupation","ErrFatherOtherOccupation","Please enter alphabet characters only");
                }
            }
            if ($('#MothersOccupation').val()=="OT112") {
                if(IsNonEmpty("MotherOtherOccupation","ErrMotherOtherOccupation","Please enter your mother other occupation")){
                   IsAlphabet("MotherOtherOccupation","ErrMotherOtherOccupation","Please enter alphabet characters only");
                }
            }
            IsNonEmpty("FamilyLocation1","ErrFamilyLocation1","Please enter your family location");                                                                                                          
            IsNonEmpty("Ancestral","ErrAncestral","Please enter your ancestral");                                                                                                          
            if($("#FamilyType").val()=="0"){
                ErrorCount++;
                document.getElementById("ErrFamilyType").innerHTML="Please select family type"; 
            }
            if($("#FamilyAffluence").val()=="0"){
                ErrorCount++;
                document.getElementById("ErrFamilyAffluence").innerHTML="Please select family affluence"; 
            }
            if($("#FamilyValue").val()=="0"){
                ErrorCount++;
                document.getElementById("ErrFamilyValue").innerHTML="Please select family value"; 
            }
            if($("#NumberofBrother").val()=="Choose"){
                ErrorCount++;
                document.getElementById("ErrNumberofBrother").innerHTML="Please select number of brother"; 
            }
            if($("#NumberofSisters").val()=="Choose"){
                ErrorCount++;
                document.getElementById("ErrNumberofSisters").innerHTML="Please select number of sister"; 
            }  
            
        if (ErrorCount==0) {
                            return true;
                        } else{
                            return false;
                        }
                        
    
    
}
$(document).ready(function() {
    var text_max = 250;
    var text_length = $('#AboutMyFamily').val().length;
    $('#textarea_feedback').html(text_length + ' characters typed');

    $('#AboutMyFamily').keyup(function() {
        var text_length = $('#AboutMyFamily').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_length + ' characters typed');
    });
});
</script>
<div class="col-sm-10 rightwidget">
<form method="post" action="" id="frmFI">
            <input type="hidden" value="" name="txnPassword" id="txnPassword">
            <input type="hidden" value="<?php echo $_GET['Code'];?>" name="ProfileCode" id="ProfileCode">
    <h4 class="card-title">Family Information</h4>
    <div class="form-group row">
            <label for="FatherName" class="col-sm-3 col-form-label">Father's name<span id="star">*</span></label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="FatherName" name="FatherName" maxlength="50" value="<?php echo (isset($_POST['FatherName']) ? $_POST['FatherName'] : $ProfileInfo['FathersName']);?>" placeholder="Father's Name">
                <span class="errorstring" id="ErrFatherName"><?php echo isset($ErrFatherName)? $ErrFatherName : "";?></span>
            </div>
            <div class="col-sm-2"> 
                <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" onclick="verifiyFatherPassedaway()" class="custom-control-input" name="FathersAlive" id="FathersAlive" <?php echo (isset($_POST[ 'FathersAlive'])) ? (($_POST[ 'FathersAlive']=="on") ? " Checked='Checked' " : "") : (($ProfileInfo['FathersAlive']=="1") ? " Checked='Checked' " : "");?>>
                    <label class="custom-control-label" for="FathersAlive">&nbsp;Passed away</label>
                </div>
            </div>
        </div>
        <div class="form-group row" id="FatherAlive_row_1" >
            <label for="FatherContact" class="col-sm-3 col-form-label">Father's contact number</label>
            <div class="col-sm-3">
                <select class="selectpicker form-control" data-live-search="true" name="FathersContactCountryCode" id="FathersContactCountryCode">
                    <?php foreach($response['data']['CountryName'] as $CountryCode) { ?>
                    <option value="<?php echo $CountryCode['ParamA'];?>" <?php echo (isset($_POST[ 'FathersContactCountryCode'])) ? (($_POST[ 'FathersContactCountryCode']==$CountryCode[ 'ParamA']) ? " selected='selected' " : "") : (($ProfileInfo[ 'FathersContactCountryCode']==$CountryCode[ 'SoftCode']) ? " selected='selected' " : "");?>><?php echo $CountryCode['str'];?><?php } ?></option>
                </select>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="FathersContact" maxlength="10" name="FathersContact" value="<?php echo (isset($_POST['FathersContact']) ? $_POST['FathersContact'] : $ProfileInfo['FathersContact']);?>" placeholder="Contact Number">
                <span class="errorstring" id="ErrFathersContact"><?php echo isset($ErrFathersContact)? $ErrFathersContact : "";?></span>
            </div>
        </div>
        <div class="form-group row" id="FatherAlive_row_2" >
            <label for="FathersOccupation" class="col-sm-3 col-form-label">Father's occupation</label>
            <div class="col-sm-4">
                <select onchange="displayFatherIncome()" class="selectpicker form-control" data-live-search="true" id="FathersOccupation" name="FathersOccupation">
                    <option value="0">Choose Father Occupation</option>
                    <?php foreach($response['data']['Occupation'] as $FathersOccupation) { ?>
                    <option value="<?php echo $FathersOccupation['SoftCode'];?>" <?php echo (isset($_POST[ 'FathersOccupation'])) ? (($_POST[ 'FathersOccupation']==$FathersOccupation[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'FathersOccupation']==$FathersOccupation[ 'CodeValue']) ? " selected='selected' " : "");?>><?php echo $FathersOccupation['CodeValue'];?> </option>
                    <?php } ?> 
                </select>
            </div>
            <label for="FathersIncome" class="col-sm-2 col-form-label" id="father_income_1" style="padding-right:0px;padding-left:0px">Father's Annual Income</label>
            <div class="col-sm-3" id="father_income_2">
                <select class="selectpicker form-control" data-live-search="true" id="FathersIncome" name="FathersIncome">
                    <option value="0">Choose Income Range</option>
                    <?php foreach($response['data']['IncomeRange'] as $IncomeRange) { ?>
                    <option value="<?php echo $IncomeRange['SoftCode'];?>" <?php echo (isset($_POST[ 'FathersIncome'])) ? (($_POST[ 'FathersIncome']==$IncomeRange[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'FathersIncome']==$IncomeRange[ 'CodeValue']) ? " selected='selected' " : "");?>><?php echo $IncomeRange['CodeValue'];?></option>
                    <?php } ?> 
                </select>
            </div>
        </div>
        <div id="FatherOccupation_additionalinfo">
        <div class="form-group row" id="FatherAlive_row_3" >   
             <label class="col-sm-3 col-form-label"></label>
             <div class="col-sm-4"  id="FatherOccupation_additionalinfo"><input type="text" class="form-control" maxlength="50" placeholder="Fathers Occupation" id="FatherOtherOccupation" name="FatherOtherOccupation" value="<?php echo (isset($_POST['FatherOtherOccupation']) ? $_POST['FatherOtherOccupation'] : $ProfileInfo['FatherOtherOccupation']);?>">
              <span class="errorstring" id="ErrFatherOtherOccupation"><?php echo isset($ErrFatherOtherOccupation)? $ErrFatherOtherOccupation : "";?></span></div>
         </div>  
         </div>                                                                                                        
        <div class="form-group row">
            <label for="MotherName" class="col-sm-3 col-form-label">Mother's name<span id="star">*</span></label>
            <div class="col-sm-7">
                <input type="text" class="form-control" id="MotherName" maxlength="50" name="MotherName" Placeholder="Mother's Name" value="<?php echo (isset($_POST['MotherName']) ? $_POST['MotherName'] : $ProfileInfo['MothersName']);?>">
                <span class="errorstring" id="ErrMotherName"><?php echo isset($ErrMotherName)? $ErrMotherName : "";?></span>
            </div>
            <div class="col-sm-2">
                <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" onclick="verifiyMotherPassedaway()" class="custom-control-input" name="MothersAlive" id="MothersAlive" <?php echo (isset($_POST[ 'MothersAlive'])) ? (($_POST[ 'MothersAlive']=="on") ? " Checked='Checked' " : "") : (($ProfileInfo['MothersAlive']=="1") ? " Checked='Checked' " : "");?>>
                    <label class="custom-control-label" for="MothersAlive">&nbsp;Passed away</label>
                </div>
            </div>
        </div>
        <div class="form-group row" id="MotherAlive_row_1" >
            <label for="MotherContact" class="col-sm-3 col-form-label">Mother's contact number</label>
            <div class="col-sm-3">
                <select class="selectpicker form-control" data-live-search="true"  name="MotherContactCountryCode" id="MotherContactCountryCode" style="width: 61px;">
                    <?php foreach($response['data']['CountryName'] as $CountryCode) { ?>
                    <option value="<?php echo $CountryCode['ParamA'];?>" <?php echo (isset($_POST[ 'MotherContactCountryCode'])) ? (($_POST[ 'MotherContactCountryCode']==$CountryCode[ 'ParamA']) ? " selected='selected' " : "") : (($ProfileInfo[ 'MotherContactCountryCode']==$CountryCode[ 'SoftCode']) ? " selected='selected' " : "");?>><?php echo $CountryCode['str'];?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-6" >
                <input type="text" class="form-control" id="MotherContact" maxlength="10" name="MotherContact" value="<?php echo (isset($_POST['MotherContact']) ? $_POST['MotherContact'] : $ProfileInfo['MothersContact']);?>" placeholder="Contact Number">
                <span class="errorstring" id="ErrMotherContact"><?php echo isset($ErrMotherContact)? $ErrMotherContact : "";?></span>
            </div>
        </div>
        <div class="form-group row" id="MotherAlive_row_2" >   
            <label for="MothersOccupation" class="col-sm-3 col-form-label">Mother's occupation</label>
            <div class="col-sm-4">
                <select onchange="displayMotherIncome()" class="selectpicker form-control" data-live-search="true" id="MothersOccupation" name="MothersOccupation">
                    <option value="0">Choose Mother Occupation</option>
                    <?php foreach($response['data']['Occupation'] as $MothersOccupation) { ?>
                    <option value="<?php echo $MothersOccupation['SoftCode'];?>" <?php echo (isset($_POST[ 'MothersOccupation'])) ? (($_POST[ 'MothersOccupation']==$MothersOccupation[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'MothersOccupation']==$MothersOccupation[ 'CodeValue']) ? " selected='selected' " : "");?>><?php echo $MothersOccupation['CodeValue'];?></option>
                    <?php } ?>
                </select>
            </div>  
            <label for="MothersIncome" id="mother_income_1" class="col-sm-2 col-form-label" style="padding-left:0px;padding-right:0px;">Mother's Annual Income</label>
            <div class="col-sm-3" id="mother_income_2">
                <select class="selectpicker form-control" data-live-search="true" id="MothersIncome" name="MothersIncome">
                <option value="0">Choose Income Range</option>
                <?php foreach($response['data']['IncomeRange'] as $IncomeRange) { ?>
                <option value="<?php echo $IncomeRange['SoftCode'];?>" <?php echo (isset($_POST[ 'MothersIncome'])) ? (($_POST[ 'MothersIncome']==$IncomeRange[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'MothersIncome']==$IncomeRange[ 'CodeValue']) ? " selected='selected' " : "");?>><?php echo $IncomeRange['CodeValue'];?></option>
                <?php } ?> 
                </select>
            </div>                                                                      
        </div>
        <div id="MotherOccupation_additionalinfo">
         <div class="form-group row" id="MotherAlive_row_3" >   
             <label class="col-sm-3 col-form-label"></label>
             <div class="col-sm-4"  id="MotherOccupation_additionalinfo"><input type="text" class="form-control" maxlength="50" id="MotherOtherOccupation" placeholder="Mothers Occupation" name="MotherOtherOccupation" value="<?php echo (isset($_POST['MotherOtherOccupation']) ? $_POST['MotherOtherOccupation'] : $ProfileInfo['MotherOtherOccupation']);?>">
              <span class="errorstring" id="ErrMotherOtherOccupation"><?php echo isset($ErrMotherOtherOccupation)? $ErrMotherOtherOccupation : "";?></span></div>
         </div>
         </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Family location<span id="star">*</span></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="FamilyLocation1" id="FamilyLocation1" maxlength="50" value="<?php echo (isset($_POST['FamilyLocation1']) ? $_POST['FamilyLocation1'] : $ProfileInfo['FamilyLocation1']);?>" placeholder="Addressline 1">
                    <span class="errorstring" id="ErrFamilyLocation1"><?php echo isset($ErrFamilyLocation1)? $ErrFamilyLocation1 : "";?></span>
            </div>
        </div>
        <div class="form-group row">
           <label class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9"><input type="text" class="form-control" name="FamilyLocation2" maxlength="50" id="FamilyLocation2" value="<?php echo (isset($_POST['FamilyLocation2']) ? $_POST['FamilyLocation2'] : $ProfileInfo['FamilyLocation2']);?>" placeholder="Addressline 2"></div>
        </div>
        <div class="form-group row">
           <label class="col-sm-3 col-form-label">Ancestral / Family origin<span id="star">*</span></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="Ancestral" maxlength="50" id="Ancestral" value="<?php echo (isset($_POST['Ancestral']) ? $_POST['Ancestral'] : $ProfileInfo['Ancestral']);?>" placeholder="Ancestral / Family Origin">
               <span class="errorstring" id="ErrAncestral"><?php echo isset($ErrAncestral)? $ErrAncestral : "";?>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Family type<span id="star">*</span></label>
            <div class="col-sm-4">
                <select class="selectpicker form-control" data-live-search="true" id="FamilyType" name="FamilyType">
                    <option value="0">Choose Family Type</option>
                    <?php foreach($response['data']['FamilyType'] as $FamilyType) { ?>
                    <option value="<?php echo $FamilyType['SoftCode'];?>" <?php echo (isset($_POST[ 'FamilyType'])) ? (($_POST[ 'FamilyType']==$FamilyType[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'FamilyType']==$FamilyType[ 'CodeValue']) ? " selected='selected' " : "");?>><?php echo $FamilyType['CodeValue'];?> </option>
                    <?php } ?> 
                </select>
                <span class="errorstring" id="ErrFamilyType"><?php echo isset($ErrFamilyType)? $ErrFamilyType : "";?>
            </div>
            <label for="Family Value" class="col-sm-2 col-form-label">Family affluence<span id="star">*</span></label>
            <div class="col-sm-3">
                <select class="selectpicker form-control" data-live-search="true" id="FamilyAffluence" name="FamilyAffluence">
                    <option value="0">Choose Family Affluence</option>
                    <?php foreach($response['data']['FamilyAffluence'] as $FamilyAffluence) { ?>
                    <option value="<?php echo $FamilyAffluence['SoftCode'];?>" <?php echo (isset($_POST[ 'FamilyAffluence'])) ? (($_POST[ 'FamilyAffluence']==$FamilyAffluence[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'FamilyAffluence']==$FamilyAffluence[ 'CodeValue']) ? " selected='selected' " : "");?>><?php echo $FamilyAffluence['CodeValue'];?> </option>
                    <?php } ?> 
                </select>
                <span class="errorstring" id="ErrFamilyAffluence"><?php echo isset($ErrFamilyAffluence)? $ErrFamilyAffluence : "";?>
            </div>
        </div>
        <div class="form-group row">
            <label for="Family Value" class="col-sm-3 col-form-label">Family value<span id="star">*</span></label>
            <div class="col-sm-4">
                <select class="selectpicker form-control" data-live-search="true" id="FamilyValue" name="FamilyValue">
                    <option value="0">Choose Family Value</option>
                    <?php foreach($response['data']['FamilyValue'] as $FamilyValue) { ?>
                    <option value="<?php echo $FamilyValue['SoftCode'];?>" <?php echo (isset($_POST[ 'FamilyValue'])) ? (($_POST[ 'FamilyValue']==$FamilyValue[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'FamilyValue']==$FamilyValue[ 'CodeValue']) ? " selected='selected' " : "");?>><?php echo $FamilyValue['CodeValue'];?> </option>
                    <?php } ?> 
                </select>
                <span class="errorstring" id="ErrFamilyValue"><?php echo isset($ErrFamilyValue)? $ErrFamilyValue : "";?>
            </div>
        </div>
        <div class="form-group row">
            <label for="Brothers" class="col-sm-3 col-form-label">No of brothers<span id="star">*</span></label>
            <div class="col-sm-9">
                 <div class="form-group row">
                    <div class="col-sm-3">
                       <label class="col-form-label">Total</label><br>
                        <select class=" form-control" id="NumberofBrother" onchange="print_brother_counts()" name="NumberofBrother">
                            <option value="Choose">Choose</option>
                            <?php foreach($response['data']['NumberofBrother'] as $NumberofBrother) { ?>
                            <option value="<?php echo $NumberofBrother['SoftCode'];?>" <?php echo (isset($_POST[ 'NumberofBrother'])) ? (($_POST[ 'NumberofBrother']==$NumberofBrother[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'NumberofBrothers']==$NumberofBrother[ 'CodeValue']) ? " selected='selected' " : "");?>><?php echo $NumberofBrother['CodeValue'];?></option>
                            <?php } ?>
                        </select>
                    </div>                                   
                    <div class="col-sm-3" id="div_elder">
                        <label class="col-form-label">Elder</label>
                        <select class="form-control" id="belder" name="elder">
                            <?php foreach($response['data']['NumberofElderBrother'] as $elder) { ?>
                            <option value="<?php echo $elder['SoftCode'];?>" <?php echo (isset($_POST[ 'elder'])) ? (($_POST[ 'elder']==$elder[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'Elder']==$elder[ 'CodeValue']) ? " selected='selected' " : "");?>><?php echo $elder['CodeValue'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-3" id="div_younger">
                       <label class="col-form-label">Younger</label> 
                        <select class="form-control" id="byounger" name="younger">
                            <?php foreach($response['data']['NumberofYoungerBrother'] as $younger) { ?>
                            <option value="<?php echo $younger['SoftCode'];?>" <?php echo (isset($_POST['younger'])) ? (($_POST[ 'younger']==$younger[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'Younger']==$younger[ 'CodeValue']) ? " selected='selected' " : "");?>><?php echo $younger['CodeValue'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-3" id="div_married"> 
                         <label class="col-form-label">Married</label>
                        <select class=" form-control"   id="married" name="married">
                            <?php foreach($response['data']['NumberofMarriedBrother'] as $married) { ?>
                            <option value="<?php echo $married['SoftCode'];?>" <?php echo (isset($_POST[ 'married'])) ? (($_POST[ 'married']==$married[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'Married']==$married[ 'CodeValue']) ? " selected='selected' " : "");?>><?php echo $married['CodeValue'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <span class="errorstring" id="ErrNumberofBrother"><?php echo isset($ErrNumberofBrother)? $ErrNumberofBrother : "";?>
            </div>  
        </div>
        <div class="form-group row" style="margin-bottom: 0px;">
            <label for="No of Sisters" class="col-sm-3 col-form-label">No of sisters<span id="star">*</span></label>
            <div class="col-sm-9">
                <div class="form-group row">
                    <div class="col-sm-3" align="left">
                       <label class="col-form-label">Total</label><br>
                        <select class="form-control" id="NumberofSisters" onchange="print_sister_counts()" name="NumberofSisters">
                            <option value="Choose">Choose</option>
                            <?php foreach($response['data']['NumberofSisters'] as $NumberofSister) { ?>
                            <option value="<?php echo $NumberofSister['SoftCode'];?>" <?php echo (isset($_POST[ 'NumberofSisters'])) ? (($_POST[ 'NumberofSisters']==$NumberofSister[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'NumberofSisters']==$NumberofSister[ 'CodeValue']) ? " selected='selected' " : "");?>><?php echo $NumberofSister['CodeValue'];?>  </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-3" align="left" id="div_elderSister">
                        <label class="col-form-label">Elder</label><br>
                        <select class="form-control" id="elderSister" name="elderSister">
                            <?php foreach($response['data']['NumberofElderSisters'] as $elderSister) { ?>
                            <option value="<?php echo $elderSister['SoftCode'];?>" <?php echo (isset($_POST[ 'elderSister'])) ? (($_POST[ 'elderSister']==$elderSister[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'ElderSister']==$elderSister[ 'CodeValue']) ? " selected='selected' " : "");?>><?php echo $elderSister['CodeValue'];?>  </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-3" align="left" id="div_youngerSister">
                        <label class="col-form-label">Younger</label>
                        <select class="form-control" id="youngerSister" name="youngerSister">
                            <?php foreach($response['data']['NumberofYoungerSisters'] as $youngerSister) { ?>
                            <option value="<?php echo $youngerSister['SoftCode'];?>" <?php echo (isset($_POST[ 'youngerSister'])) ? (($_POST[ 'youngerSister']==$youngerSister[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'YoungerSister']==$youngerSister[ 'CodeValue']) ? " selected='selected' " : "");?>><?php echo $youngerSister['CodeValue'];?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-3" align="left" id="div_marriedSister">
                        <label class="col-form-label">Married</label> 
                        <select class="form-control" id="marriedSister" name="marriedSister">
                            <?php foreach($response['data']['NumberofMarriedSisters'] as $marriedSister) { ?>
                            <option value="<?php echo $marriedSister['SoftCode'];?>" <?php echo (isset($_POST[ 'marriedSister'])) ? (($_POST[ 'marriedSister']==$marriedSister[ 'SoftCode']) ? " selected='selected' " : "") : (($ProfileInfo[ 'MarriedSister']==$marriedSister[ 'CodeValue']) ? " selected='selected' " : "");?>><?php echo $marriedSister['SoftCode'];?> </option>
                            <?php } ?>                                                                                                              
                        </select>
                    </div>
                </div>
                <span class="errorstring" id="ErrNumberofSisters"><?php echo isset($ErrNumberofSisters)? $ErrNumberofSisters : "";?>
            </div>
        </div>
        <div class="form-group row" style="margin-bottom:0px">
            <label for="AboutMe" class="col-sm-4 col-form-label">About my family</label>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">                                                        
                <textarea class="form-control" maxlength="250" name="AboutMyFamily" id="AboutMyFamily"  style="margin-bottom:5px;height:75px"><?php echo (isset($_POST['AboutMyFamily']) ? $_POST['AboutMyFamily'] : $ProfileInfo['AboutMyFamily']);?></textarea>
                 <label class="col-form-label" style="padding-top:0px;">Max 250 characters&nbsp;&nbsp;|&nbsp;&nbsp;<span id="textarea_feedback"></span></label>
            </div>
        </div>
        <div class="form-group row" style="margin-bottom:0px;">
            <div class="col-sm-6">
                <a href="javascript:void(0)" onclick="ConfirmUpdateFInfo()" name="BtnSaveProfile" class="btn btn-primary mr-2" style="font-family:roboto">Save</a>
                <br>
                <small style="font-size:11px;"> Last saved:</small><small style="color:#888;font-size:11px;"> <?php echo PutDateTime($ProfileInfo['LastUpdatedOn']);?></small>
            </div>
            <div class="col-sm-6" style="text-align: right;">
            <ul class="pager" style="float:right;">
                  <li><a href="../OccupationDetails/<?php echo $_GET['Code'].".htm";?>">&#8249; Previous</a></li>
                  <li>&nbsp;</li>
                  <li><a href="../PhysicalInformation/<?php echo $_GET['Code'].".htm";?>">Next &#8250;</a></li>
            </ul>
        </div>
        </div>
    </form>
</div>
 <div class="modal" id="PubplishNow" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content" id="Publish_body" style="max-width:500px;min-height:300px;overflow:hidden"></div>
    </div>
</div>
<script>
function ConfirmUpdateFInfo() {
    if(submitprofile()) {
      $('#PubplishNow').modal('show'); 
      var content = ''
                    +''
                    +'<div class="modal-header">'
                        + '<h4 class="modal-title">Confirmation for edit family information</h4>'
                        + '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding-top:5px;"><span aria-hidden="true"></span></button>'
                    + '</div>'
                    + '<div class="modal-body">'
                        + '<div class="form-group row" style="margin:0px;padding-top:10px;">'
                            + '<div class="col-sm-4">'
                                + '<img src="<?php echo ImageUrl;?>icons/confirmation_profile.png" width="128px">' 
                            + '</div>'
                            + '<div class="col-sm-8"><br>'
                                + '<div class="form-group row">'
                                    +'<div class="col-sm-12">Are you sure want edit family information</div>'
                                + '</div>'
                            + '</div>'
                        +  '</div>'                    
                    + '</div>' 
                    + '<div class="modal-footer">'
                        + '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;'
                        + '<button type="button" class="btn btn-primary" name="Update" class="btn btn-primary" onclick="GetTxnPswd()" style="font-family:roboto">Update</button>'
                    + '</div>';
            $('#Publish_body').html(content);
     } else {
            return false;
     }
}
function GetTxnPswd() {
            var content =  '<div class="modal-header">'
                            + '<h4 class="modal-title">Confirmation for edit family information</h4>'
                            + '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding-top:5px;"><span aria-hidden="true"></span></button>'
                      + '</div>'
                      + '<div class="modal-body">'
                        + '<div class="form-group" style="text-align:center">'
                            + '<img src="'+ImgUrl+'icons/transaction_password.png" width="128px">' 
                            + '<h4 style="text-align:center;color:#ada9a9;margin-bottom: -13px;">Please Enter Your Transaction Password</h4>'
                        + '</div>'
                        + '<div class="form-group">'
                            + '<div class="input-group">'
                                + '<div class="col-sm-2"></div>'
                                + '<div class="col-sm-8">'
                                    + '<input type="password"  class="form-control" id="TransactionPassword" name="TransactionPassword" style="font-weight: normal;font-size: 13px;text-align: center;letter-spacing: 5px;font-family:Roboto;">'
                                    + '<div id="frmTxnPass_error" style="color:red;text-align:center"><br></div>'
                                + '</div>'
                                + '<div class="col-sm-2"></div>'
                            + '</div>'
                        + '</div>'
                      + '</div>'
                        + '<div class="modal-footer">'
                            + '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;'
                            + '<button type="button" onclick="EditDraftFamilyInformation()" class="btn btn-primary" >Continue</button>'
                        + '</div>';
        $('#Publish_body').html(content);       
}
function EditDraftFamilyInformation() {
     if ($("#TransactionPassword").val().trim()=="") {
             $("#frmTxnPass_error").html("Please enter transaction password");
             return false;
         }
    $("#txnPassword").val($("#TransactionPassword").val());
    var param = $("#frmFI").serialize();
    $('#Publish_body').html(preloading_withText("Updating family information ...","95"));
        $.post(API_URL + "m=Franchisee&a=EditDraftFamilyInformation",param,function(result) {
            
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
                                    + '<h4 style="text-align:center;">Family Information</h4>'             
                                    + '<p style="text-align:center;"><a href="../PhysicalInformation/'+data.Code+'.htm" style="cursor:pointer;color:#489bae">Continue</a></p>'
                                +'</div>' 
                            +'</div>';
                $('#Publish_body').html(content);
            } else {
                var data = obj.data; 
                var content = '<div  style="height: 300px;">'                                                                              
                                +'<div class="modal-header">'
                                    +'<h4 class="modal-title">Edit Family Information</h4>'
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



function verifiyFatherPassedaway() {
         if ($('#FathersAlive').is(":checked")){
            
            $('#FatherAlive_row_1').hide();
            $('#FatherAlive_row_2').hide();
            $('#FatherAlive_row_3').hide();
        } else {
            $('#FatherAlive_row_1').show();
            $('#FatherAlive_row_2').show();
            $('#FatherAlive_row_3').show();
        }
    }
    function displayFatherIncome() {     
       
         if ($("#FathersOccupation").val()=="OT107" || $("#FathersOccupation").val()==0) {
            $('#father_income_1').hide();
            $('#father_income_2').hide();
             $('#FatherOccupation_additionalinfo').hide(); 
        } else {
            
            if ($("#FathersOccupation").val()=="OT112")  {
                 $('#FatherOccupation_additionalinfo').show(); 
                 $('#father_income_1').show();
                 $('#father_income_2').show();
            } else {
            
             $('#father_income_1').show();
            $('#father_income_2').show();
            $('#FatherOccupation_additionalinfo').hide(); 
            }
        }
    }
    function verifiyMotherPassedaway() {
         if ($('#MothersAlive').is(":checked")){
           
            $('#MotherAlive_row_1').hide();
            $('#MotherAlive_row_2').hide();
            $('#MotherAlive_row_3').hide();
        } else {
            $('#MotherAlive_row_1').show();
            $('#MotherAlive_row_2').show();
            $('#MotherAlive_row_3').show();
        }
    }
    function displayMotherIncome() {
        if ($("#MothersOccupation").val()=="OT107" || $("#MothersOccupation").val()==0) {
            $('#mother_income_1').hide();
            $('#mother_income_2').hide();
             $('#MotherOccupation_additionalinfo').hide(); 
        } else {
            
            if ($("#MothersOccupation").val()=="OT112")  {
                 $('#MotherOccupation_additionalinfo').show(); 
                 $('#mother_income_1').show();
                 $('#mother_income_2').show();
            } else {
            
             $('#mother_income_1').show();
            $('#mother_income_2').show();
            $('#MotherOccupation_additionalinfo').hide(); 
            }
        }
    }
    function print_brother_counts() {
        var n_brothers = $('#NumberofBrother').val();
        
        if (n_brothers=='NOB001' || n_brothers=='Choose') {
            $('#div_elder').hide();
            $('#div_younger').hide();
            $('#div_married').hide();
        } else {
            $('#div_elder').show();
            $('#div_younger').show();
            $('#div_married').show();
            
            var nc = ['NOB001','NOB002','NOB003','NOB004','NOB005','NOB006','NOB007','NOB008','NOB009','NOB010'] ;
            
            var eld = $('#belder').val();
            var ynr = $('#byounger').val();
            var mrd = $('#married').val();
            
            $('#belder').find('option').remove();
            $('#byounger').find('option').remove();
            $('#married').find('option').remove();
            
            var c = ['EB001','EB002','EB003','EB004','EB005','EB006','EB007','EB008','EB009','EB010'] ;     
            for (var i = 0; i<=nc.indexOf(n_brothers); i++){
                var opt = document.createElement('option');
                opt.value = c[i];
                if (eld==c[i]) {
                    var att = document.createAttribute("selected");
                    att.value = "selected";
                    opt.setAttributeNode(att); 
                }
                opt.innerHTML = i;
                document.getElementById('belder').appendChild(opt);
            }
            
            var c = ['YB001','YB002','YB003','YB004','YB005','YB006','YB007','YB008','YB009','YB010'] ;
            for (var i = 0; i<=nc.indexOf(n_brothers); i++){
                var opt = document.createElement('option');
                opt.value = c[i];
                if (ynr==c[i]) {
                    var att = document.createAttribute("selected");
                    att.value = "selected";
                    opt.setAttributeNode(att); 
                }
                opt.innerHTML = i;
                document.getElementById('byounger').appendChild(opt);
            }

            var c = ['MB001','MB002','MB003','MB004','MB005','MB006','MB007','MB008','MB009','MB010'] ;
            for (var i = 0; i<=nc.indexOf(n_brothers); i++){
                var opt = document.createElement('option');
                opt.value = c[i];
                if (mrd==c[i]) {
                    var att = document.createAttribute("selected");
                    att.value = "selected";
                    opt.setAttributeNode(att); 
                }
                opt.innerHTML = i;
                document.getElementById('married').appendChild(opt);
            }
        }
    }
    function print_sister_counts() {
        
        var n_brothers = $('#NumberofSisters').val();
        
        if (n_brothers=='NS001'  || n_brothers=='Choose') {
            $('#div_elderSister').hide();
            $('#div_youngerSister').hide();
            $('#div_marriedSister').hide();
        } else {
            $('#div_elderSister').show();
            $('#div_youngerSister').show();
            $('#div_marriedSister').show();
            
            var eld = $('#elderSister').val();
            var ynr = $('#youngerSister').val();
            var mrd = $('#marriedSister').val();
            
            var nc = ['NS001','NS002','NS003','NS004','NS005','NS006','NS007','NS008','NS009','NS010'] ;
            
            $('#elderSister').find('option').remove();
            $('#youngerSister').find('option').remove();
            $('#marriedSister').find('option').remove();
            
            var c = ['ES001','ES002','ES003','ES004','ES005','ES006','ES007','ES008','ES009','ES010'] ;     
            for (var i = 0; i<=nc.indexOf(n_brothers); i++){
                var opt = document.createElement('option');
                opt.value = c[i];
                if (eld==c[i]) {
                    var att = document.createAttribute("selected");
                    att.value = "selected";
                    opt.setAttributeNode(att); 
                }
                opt.innerHTML = i;
                document.getElementById('elderSister').appendChild(opt);
            }
            
            var c = ['YS001','YS002','YS003','YS004','YS005','YS006','YS007','YS008','YS009','YS010'] ;
            for (var i = 0; i<=nc.indexOf(n_brothers); i++){
                var opt = document.createElement('option');
                opt.value = c[i];
                if (ynr==c[i]) {
                    var att = document.createAttribute("selected");
                    att.value = "selected";
                    opt.setAttributeNode(att); 
                }
                opt.innerHTML = i;
                document.getElementById('youngerSister').appendChild(opt);
            }
            
            var c = ['MRS001','MRS002','MRS003','MRS004','MRS005','MRS006','MRS007','MRS008','MRS009','MRS010'] ;
            for (var i = 0; i<=nc.indexOf(n_brothers); i++){
                var opt = document.createElement('option');
                opt.value = c[i];
                if (mrd==c[i]) {
                    var att = document.createAttribute("selected");
                    att.value = "selected";
                    opt.setAttributeNode(att); 
                }
                opt.innerHTML = i;
                document.getElementById('marriedSister').appendChild(opt);
            }
        }
    }
    verifiyFatherPassedaway();
    displayFatherIncome();
    verifiyMotherPassedaway();
    displayMotherIncome();
    print_brother_counts();
    print_sister_counts();
</script>

<?php include_once("settings_footer.php");?>                    