<?php
include_once("header.php");
include_once("LeftMenu.php"); 
$data= $mysql->Select("select * from _tbl_tours_package where md5(PackageID)='".$_GET['id']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            $duppackage = $mysql->select("select * from _tbl_tours_package where PackageName='".$_POST['PackageName']."' and TourTypeID='".$_POST['TourType']."' and SubTourTypeID='".$_POST['SubTourType']."' and PackageID<>'".$data[0]['PackageID']."'");
            if(sizeof($duppackage)>0){
               // $ErrPackageName ="Package Name Already Exists";
               // $ErrorCount++;
            }
            
            if($ErrorCount==0){
                
                
                  
               $ShortDescription = str_replace("'","\'",$_POST['ShortDescription']);
               $ShortDescription = str_replace('"','\"',$ShortDescription);
              
              
               $Description = str_replace("'","\'",$_POST['Description']);
               $Description = str_replace('"','\"',$Description);
               
               $SearchTags = str_replace("'","\'",$_POST['SearchTags']);
               $SearchTags = str_replace('"','\"',$SearchTags);
                                                    
                $mysql->execute("update _tbl_tours_package set `TourThemeID`      ='".$_POST['TourTheme']."',
                                                               `TourTypeID`       ='".$_POST['TourType']."',
                                                               `SubTourTypeID`    ='".$_POST['SubTourType']."',
                                                               `PackageName`      ='".$_POST['PackageName']."',
                                                               `PackagePrice`     ='".$_POST['PackagePrice']."',
                                                               `Description`      ='".$Description."',
                                                               `SearchTags`       ='".$SearchTags."',
                                                               `JoiningPlace`     ='".$_POST['JoiningPlace']."',
                                                               `LeavingPlace`     ='".$_POST['LeavingPlace']."',
                                                               `DaysCount`        ='".$_POST['DaysCount']."',
                                                               `NightsCount`      ='".$_POST['NightsCount']."',
                                                               `CountryCount`     ='".$_POST['CountryCount']."',
                                                               `CityCount`        ='".$_POST['CityCount']."',
                                                               `Currency`         ='".$_POST['Currency']."',
                                                               `SpokenLanguage`   ='".$_POST['SpokenLanguage']."',
                                                               `VisaRequirements` ='".$_POST['VisaRequirements']."',
                                                               `MealsType`        ='".$_POST['MealType']."',
                                                               `SpecialMeal`      ='".$_POST['SpecialMeal']."',
                                                               `PackageOrder`     ='".$_POST['PackageOrder']."',
                                                               `PackageRating`    ='".$_POST['PackageRating']."',
                                                               `ShortDescription` ='".$ShortDescription."',
                                                               `Toppings`         ='".$_POST['Toppings']."',
                                                               `IsPublish`        ='".$_POST['IsPublish']."' where PackageID='".$data[0]['PackageID']."'");

                        $successmessage ="<span style='color:green'>Package Updated Successfully</span>";
                     } else {
                        $successmessage ="<span style='color:red'>Error Add Package</span>"; 
                     }
            }
        $data= $mysql->Select("select * from _tbl_tours_package where md5(PackageID)='".$_GET['id']."'");
?>
<script>
function getSubTourTypes(TourTypeID,SubTourTypeID) {
        $.ajax({url:'webservice.php?action=getSubTourTypes&TourTypeID='+TourTypeID+'&SubTourTypeID='+SubTourTypeID,success:function(data){
            $('#div_subtourtype').html(data);
            $('#ErrSubTourType').html('');
        }});
    }
$(document).ready(function () {
    $("#TourTheme").blur(function () {
       var TourTheme = $('#TourTheme').val().trim();
        if (TourTheme=="0") {
            $('#ErrTourTheme').html("Please Select Tour Theme");   
        }else{
            $('#ErrTourTheme').html("");
        }
    });
    $("#TourType").blur(function () {
       var TourType = $('#TourType').val().trim();
        if (TourType=="0") {
            $('#ErrTourType').html("Please Select TourType");   
        }else{
            $('#ErrTourType').html("");
        }
    });
    $("#SubTourType").blur(function () {
       var SubTourType = $('#SubTourType').val().trim();
        if (SubTourType=="0") {
            $('#ErrSubTourType').html("Please Select Sub Tour Type");   
        }else{
            $('#ErrSubTourType').html("");
        }
    });
    $("#PackageName").blur(function () {
        if(IsNonEmpty("PackageName","ErrPackageName","Please Enter Package Name")){
           IsAlphaNumeric("SubPackageName","ErrPackageName","Please Enter Alpha Numerics Character"); 
        }
    });
    $("#PackagePrice").blur(function () {
        if(IsNonEmpty("PackagePrice","ErrPackagePrice","Please Enter Package Price")){
          // IsNumeric("PackagePrice","ErrPackagePrice","Please Enter Numerics Character"); 
        }
    });
    
});
function SubmitProduct() {
        ErrorCount=0;    
        $('#ErrTourTheme').html("");
        $('#ErrTourType').html("");
        $('#ErrSubTourType').html("");
        $('#ErrPackageName').html("");
        $('#ErrPackagePrice').html("");
        
         var TourTheme = $('#TourTheme').val().trim();
        if (TourTheme=="0") {
            $('#ErrTourTheme').html("Please Select Tour Theme");   
            ErrorCount++;      
        }else{
            $('#ErrTourTheme').html("");
        }
        var TourType = $('#TourType').val().trim();
        if (TourType=="0") {
            $('#ErrTourType').html("Please Select TourType");   
            ErrorCount++;      
        }else{
            $('#ErrTourType').html("");
        }
        var SubTourType = $('#SubTourType').val().trim();
        if (SubTourType=="0") {
            $('#ErrSubTourType').html("Please Select Sub Tour Type");
            ErrorCount++;    
        }else{
            $('#ErrSubTourType').html("");
        }
        
        if(IsNonEmpty("PackageName","ErrPackageName","Please Enter Package Name")){
           IsAlphaNumeric("SubPackageName","ErrPackageName","Please Enter Alpha Numerics Character"); 
        }
        if(IsNonEmpty("PackagePrice","ErrPackagePrice","Please Enter Package Price")){
         //  IsNumeric("PackagePrice","ErrPackagePrice","Please Enter Numerics Character"); 
        }
        
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
                                    <div class="card-title">Add Tours Package</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Tour Theme<span class="required-label">*</span></label>
                                            <div class="col-lg-3 col-md-9 col-sm-8">
                                                <select class="form-control" id="TourTheme" name="TourTheme">   
                                                    <option value="0" <?php echo ($_POST['TourTheme']=="0") ? " selected='selected' " : "";?>>Select Tour Theme</option>                                                                                     
                                                <?php $TourThemes = $mysql->select("select * from _tbl_tour_theme");?>
                                                <?php foreach($TourThemes as $TourTheme){ ?>
                                                    <option value="<?php echo $TourTheme['TourThemeID'];?>" <?php echo (isset($_POST[ 'TourTheme'])) ? (($_POST[ 'TourTheme']==$TourTheme['TourThemeID']) ? " selected='selected' " : "") : (($data[0]['TourThemeID']==$TourTheme['TourThemeID']) ? " selected='selected' " : "");?>><?php echo $TourTheme['TourTheme'];?></option>
                                                <?php }?>
                                                </select>
                                                <span class="errorstring" id="ErrTourTheme"><?php echo isset($ErrTourTheme)? $ErrTourTheme : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Tour Type<span class="required-label">*</span></label>
                                            <div class="col-lg-3 col-md-9 col-sm-8">
                                                <select class="form-control" id="TourType" name="TourType" onchange="getSubTourTypes($(this).val())">   
                                                <?php $TourTypes = $mysql->select("select * from _tbl_tour");?>
                                                <?php foreach($TourTypes as $TourType){ ?>
                                                    <option value="<?php echo $TourType['TourTypeID'];?>" <?php echo (isset($_POST[ 'TourType'])) ? (($_POST[ 'TourType']==$TourType['TourTypeID']) ? " selected='selected' " : "") : (($data[0]['TourTypeID']==$TourType['TourTypeID']) ? " selected='selected' " : "");?>><?php echo $TourType['TourTypeName'];?></option>
                                                <?php }?>
                                                </select>
                                                <span class="errorstring" id="ErrTourType"><?php echo isset($ErrTourType)? $ErrTourType : "";?></span>
                                            </div>
                                             <label for="name" class="col-lg-2 col-md-3 col-sm-4 mt-sm-2 text-left">Sub Tour Type<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                               <div id="div_subtourtype">
                                                    <select class="form-control" name="SubTourType" id="SubTourType">
                                                        <option value="0" selected="selected">Select Sub Tour Type</option> 
                                                    </select> 
                                               </div>
                                                <span class="errorstring" id="ErrSubTourType"><?php echo isset($ErrSubTourType)? $ErrSubTourType : "";?></span>
                                            </div>
                                        </div>
                                         
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Package Name<span class="required-label">*</span></label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="PackageName" name="PackageName" placeholder="Enter Package Name" value="<?php echo (isset($_POST['PackageName']) ? $_POST['PackageName'] : $data[0]['PackageName']);?>">
                                                <span class="errorstring" id="ErrPackageName"><?php echo isset($ErrPackageName)? $ErrPackageName : "";?></span>
                                            </div>
                                        </div> 
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Short Description<span class="required-label">*</span></label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="ShortDescription" name="ShortDescription" placeholder="Enter ShortDescription" value="<?php echo (isset($_POST['ShortDescription']) ? $_POST['ShortDescription'] : $data[0]['ShortDescription']);?>">
                                                <span class="errorstring" id="ErrShortDescription"><?php echo isset($ErrShortDescription)? $ErrShortDescription : "";?></span>
                                            </div>
                                        </div>    
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Package Price<span class="required-label">*</span></label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="PackagePrice" name="PackagePrice" placeholder="Enter Package Price" value="<?php echo (isset($_POST['PackagePrice']) ? $_POST['PackagePrice'] : $data[0]['PackagePrice']);?>">
                                                <span class="errorstring" id="ErrPackagePrice"><?php echo isset($ErrPackagePrice)? $ErrPackagePrice : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Joining Place<span class="required-label">*</span></label>
                                            <div class="col-lg-3 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="JoiningPlace" name="JoiningPlace" placeholder="Enter Joining Place" value="<?php echo (isset($_POST['JoiningPlace']) ? $_POST['JoiningPlace'] :$data[0]['JoiningPlace']);?>">
                                                <span class="errorstring" id="ErrJoiningPlace"><?php echo isset($ErrJoiningPlace)? $ErrJoiningPlace : "";?></span>
                                            </div>
                                             <label for="name" class="col-lg-2 col-md-3 col-sm-4 mt-sm-2 text-left">Leaving Place<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="LeavingPlace" name="LeavingPlace" placeholder="Enter Leaving Place" value="<?php echo (isset($_POST['LeavingPlace']) ? $_POST['LeavingPlace'] :$data[0]['LeavingPlace']);?>">
                                                <span class="errorstring" id="ErrLeavingPlace"><?php echo isset($ErrLeavingPlace)? $ErrLeavingPlace : "";?></span>
                                            </div> 
                                        </div>
                                         
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Days<span class="required-label">*</span></label>
                                            <div class="col-lg-3 col-md-9 col-sm-8">
                                                <select class="form-control" id="DaysCount" name="DaysCount">
                                                    <?php for($i=1;$i<=20;$i++){ ?>
                                                    <option value="<?php echo $i;?>" <?php echo (isset($_POST[ 'DaysCount'])) ? (($_POST[ 'DaysCount']==$i) ? " selected='selected' " : "") : (($data[0]['DaysCount']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>   
                                                    <?php } ?>
                                                </select>                                                                                              
                                            </div>  
                                            <label for="name" class="col-lg-2 col-md-3 col-sm-4 mt-sm-2 text-left">Nights<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" id="NightsCount" name="NightsCount">
                                                    <?php for($i=1;$i<=20;$i++){ ?>
                                                    <option value="<?php echo $i;?>" <?php echo (isset($_POST[ 'NightsCount'])) ? (($_POST[ 'NightsCount']==$i) ? " selected='selected' " : "") : (($data[0]['NightsCount']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>   
                                                    <?php } ?>
                                                </select>                                                                                              
                                            </div>                                                                                  
                                        </div>
                          
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Country<span class="required-label">*</span></label>
                                            <div class="col-lg-3 col-md-9 col-sm-8">
                                                <select class="form-control" id="CountryCount" name="CountryCount">
                                                    <?php for($i=1;$i<=20;$i++){ ?>
                                                    <option value="<?php echo $i;?>" <?php echo (isset($_POST[ 'CountryCount'])) ? (($_POST[ 'CountryCount']==$i) ? " selected='selected' " : "") : (($data[0]['CountryCount']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>   
                                                    <?php } ?>
                                                </select>
                                            </div> 
                                            <label for="name" class="col-lg-2 col-md-3 col-sm-4 mt-sm-2 text-left">City<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" id="CityCount" name="CityCount">
                                                    <?php for($i=1;$i<=20;$i++){ ?>
                                                        <option value="<?php echo $i;?>" <?php echo (isset($_POST[ 'CityCount'])) ? (($_POST[ 'CityCount']==$i) ? " selected='selected' " : "") : (($data[0]['CityCount']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>   
                                                    <?php } ?>
                                                </select>
                                            </div>                                                                                     
                                        </div>
                                        
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Currency<span class="required-label">*</span></label>
                                            <div class="col-lg-3 col-md-9 col-sm-8">
                                                <select class="form-control" id="Currency" name="Currency">
                                                    <option value="<?php echo "Rupees";?>" <?php echo (isset($_POST[ 'Currency'])) ? (($_POST['Currency']=="Rupees") ? " selected='selected' " : "") : (($data[0]['Currency']=="Rupees") ? " selected='selected' " : "");?>><?php echo "Rupees";?></option>   
                                                    <option value="<?php echo "Dollar";?>" <?php echo (isset($_POST[ 'Dollar'])) ? (($_POST['Currency']=="Dollar") ? " selected='selected' " : "") : (($data[0]['Currency']=="Rupees") ? " selected='selected' " : "");?>><?php echo "Dollar";?></option>   
                                                </select>
                                            </div> 
                                             <label for="name" class="col-lg-2 col-md-3 col-sm-4 mt-sm-2 text-left">Languages Spoken<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="SpokenLanguage" name="SpokenLanguage" placeholder="Enter Languages Spoken" value="<?php echo (isset($_POST['SpokenLanguage']) ? $_POST['SpokenLanguage'] : $data[0]['SpokenLanguage']);?>">
                                                <span class="errorstring" id="ErrSpokenLanguage"><?php echo isset($ErrSpokenLanguage)? $ErrSpokenLanguage : "";?></span>
                                            </div>                                                                                    
                                        </div>
                                         
                                        <div class="form-group form-show-validation row">                                                                                                                                                                                                           
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Visa Required<span class="required-label">*</span></label>
                                            <div class="col-lg-3 col-md-9 col-sm-8">
                                                <select class="form-control" id="VisaRequirements" name="VisaRequirements">
                                                    <option value="<?php echo "Yes";?>" <?php echo (isset($_POST[ 'VisaRequirements'])) ? (($_POST['VisaRequirements']=="Yes") ? " selected='selected' " : "") : (($data[0]['VisaRequirements']=="Yes") ? " selected='selected' " : "");?>><?php echo "Yes";?></option>   
                                                    <option value="<?php echo "No";?>" <?php echo (isset($_POST[ 'VisaRequirements'])) ? (($_POST['VisaRequirements']=="No") ? " selected='selected' " : "") : (($data[0]['VisaRequirements']=="No") ? " selected='selected' " : "");?>><?php echo "No";?></option>   
                                                </select>
                                            </div>  
                                             <label for="name" class="col-lg-2 col-md-3 col-sm-4 mt-sm-2 text-left">Meal Type<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="MealType" name="MealType" placeholder="Enter Meal Type" value="<?php echo (isset($_POST['MealType']) ? $_POST['MealType'] :$data[0]['MealsType']);?>">
                                                <span class="errorstring" id="ErrMealType"><?php echo isset($ErrMealType)? $ErrMealType : "";?></span>
                                            </div>                                                                                    
                                        </div>
                                                                                                          
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Special Meal<span class="required-label">*</span></label>
                                            <div class="col-lg-3 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="SpecialMeal" name="SpecialMeal" placeholder="Enter Special Meal" value="<?php echo (isset($_POST['SpecialMeal']) ? $_POST['SpecialMeal'] :$data[0]['SpecialMeal']);?>">
                                                <span class="errorstring" id="ErrSpecialMeal"><?php echo isset($ErrSpecialMeal)? $ErrSpecialMeal : "";?></span>
                                            </div> 
                                              <label for="name" class="col-lg-2 col-md-3 col-sm-4 mt-sm-2 text-left">Toppings<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="Toppings" name="Toppings" placeholder="Enter Toppings" value="<?php echo (isset($_POST['Toppings']) ? $_POST['Toppings'] :$data[0]['Toppings']);?>">
                                                <span class="errorstring" id="ErrToppings"><?php echo isset($ErrToppings)? $ErrToppings : "";?></span>
                                            </div>                                                                                      
                                        </div>
                                        
                                        <div class="form-group form-show-validation row">                                                                                                                                                                                                           
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Bus Available<span class="required-label">*</span></label>
                                            <div class="col-lg-3 col-md-9 col-sm-8">
                                                <select class="form-control" id="BusAvailable" name="BusAvailable">
                                                    <option value="<?php echo "Yes";?>" <?php echo (isset($_POST[ 'BusAvailable'])) ? (($_POST['BusAvailable']=="Yes") ? " selected='selected' " : "") : (($data[0]['BusAvailable']=="Yes") ? " selected='selected' " : "");?>><?php echo "Yes";?></option>   
                                                    <option value="<?php echo "No";?>" <?php echo (isset($_POST[ 'BusAvailable'])) ? (($_POST['BusAvailable']=="No") ? " selected='selected' " : "") : (($data[0]['BusAvailable']=="No") ? " selected='selected' " : "");?>><?php echo "No";?></option>   
                                                </select>
                                            </div>    
                                            <label for="name" class="col-lg-2 col-md-3 col-sm-4 mt-sm-2 text-left">Airline Available<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" id="AirlineAvailable" name="AirlineAvailable">
                                                    <option value="<?php echo "Yes";?>" <?php echo (isset($_POST[ 'AirlineAvailable'])) ? (($_POST['AirlineAvailable']=="Yes") ? " selected='selected' " : "") : (($data[0]['AirlineAvailable']=="Yes") ? " selected='selected' " : "");?>><?php echo "Yes";?></option>   
                                                    <option value="<?php echo "No";?>" <?php echo (isset($_POST[ 'AirlineAvailable'])) ? (($_POST['AirlineAvailable']=="No") ? " selected='selected' " : "") : (($data[0]['AirlineAvailable']=="No") ? " selected='selected' " : "");?>><?php echo "No";?></option>   
                                                </select>
                                            </div>                                                                                
                                        </div>
                                        
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Description<span class="required-label">*</span></label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <textarea name="Description" style="height: 200px !important" id="Description" class="form-control"><?php echo (isset($_POST['Description']) ? $_POST['Description'] :$data[0]['Description']);?></textarea>
                                            </div>
                                        </div>
                                        
                                         <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Search Tags/Keywords<span class="required-label">*</span></label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <textarea name="SearchTags" style="height: 200px !important" id="SearchTags" class="form-control"><?php echo (isset($_POST['SearchTags']) ? $_POST['SearchTags'] :$data[0]['SearchTags']);?></textarea>
                                            </div>
                                        </div>         
                                        
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Is publish<span class="required-label">*</span></label>
                                            <div class="col-lg-3 col-md-9 col-sm-8">
                                                <select class="form-control" name="IsPublish" id="IsPublish">
                                                    <option value="1" <?php echo (isset($_POST[ 'IsPublish'])) ? (($_POST[ 'IsPublish']=="1") ? " selected='selected' " : "") : (($data[0]['IsPublish']=="1") ? " selected='selected' " : "");?>>Yes</option>
                                                    <option value="0" <?php echo (isset($_POST[ 'IsPublish'])) ? (($_POST[ 'IsPublish']=="0") ? " selected='selected' " : "") : (($data[0]['IsPublish']=="0") ? " selected='selected' " : "");?>>No</option>
                                                </select>                                                                                                       
                                            </div>
                                             <label for="name" class="col-lg-2 col-md-3 col-sm-4 mt-sm-2 text-left">PackageOrder<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="PackageOrder" name="PackageOrder" placeholder="Enter PackageOrder" value="<?php echo (isset($_POST['PackageOrder']) ? $_POST['PackageOrder'] :$data[0]['PackageOrder']);?>">
                                                <span class="errorstring" id="ErrPackageOrder"><?php echo isset($ErrPackageOrder)? $ErrPackageOrder : "";?></span>                                                                                                   
                                            </div>
                                        </div>
                                       
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Package Rating<span class="required-label">*</span></label>
                                            <div class="col-lg-3 col-md-9 col-sm-8">
                                                <select class="form-control" name="PackageRating" id="PackageRating">
                                                    <option value="1" <?php echo (isset($_POST[ 'PackageRating'])) ? (($_POST[ 'PackageRating']=="1") ? " selected='selected' " : "") : (($data[0]['PackageRating']=="1") ? " selected='selected' " : "");?>>1</option>
                                                    <option value="2" <?php echo (isset($_POST[ 'PackageRating'])) ? (($_POST[ 'PackageRating']=="2") ? " selected='selected' " : "") : (($data[0]['PackageRating']=="2") ? " selected='selected' " : "");?>>2</option>
                                                    <option value="3" <?php echo (isset($_POST[ 'PackageRating'])) ? (($_POST[ 'PackageRating']=="3") ? " selected='selected' " : "") : (($data[0]['PackageRating']=="3") ? " selected='selected' " : "");?>>3</option>
                                                    <option value="4" <?php echo (isset($_POST[ 'PackageRating'])) ? (($_POST[ 'PackageRating']=="4") ? " selected='selected' " : "") : (($data[0]['PackageRating']=="4") ? " selected='selected' " : "");?>>4</option>
                                                    <option value="5" <?php echo (isset($_POST[ 'PackageRating'])) ? (($_POST[ 'PackageRating']=="5") ? " selected='selected' " : "") : (($data[0]['PackageRating']=="5") ? " selected='selected' " : "");?>>5</option>
                                                </select>                                                                                                       
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;"><?php echo $successmessage;?> </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">                                       
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Update Package">&nbsp;
                                                <a href="dashboard.php?action=SubTours/viewpackages&id=<?php echo md5($data[0]['SubTourTypeID']);?>" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
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
            getSubTourTypes('<?php echo $data[0]['TourTypeID'] ;?>','<?php echo $data[0]['SubTourTypeID'];?>');
         });
 </script>
        <?php include_once("footer.php");?>