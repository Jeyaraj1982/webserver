<?php
include_once("header.php");
include_once("LeftMenu.php"); 
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            $duppackage = $mysql->select("select * from _tbl_tours_package where PackageName='".$_POST['PackageName']."' and TourTypeID='".$_POST['TourType']."' and SubTourTypeID='".$_POST['SubTourType']."'");
            if(sizeof($duppackage)>0){
                $ErrPackageName ="Package Name Already Exists";
                $ErrorCount++;
            }
            
            if($ErrorCount==0){
                
                $target_dir = "../uploads/package/";
                    $file1 =  $_FILES["uploadimage1"]["name"];
                    $target_file1 = $target_dir .$file1;
                    
                    $file2 =  $_FILES["uploadimage2"]["name"];
                    $target_file2 = $target_dir .$file2;
                    
                    $file3 =  $_FILES["uploadimage3"]["name"];
                    $target_file3 = $target_dir .$file3;
                    
                    $file4 =  $_FILES["uploadimage4"]["name"];
                    $target_file4 = $target_dir .$file4;

                  if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file1)) {
                      $file1 =  $_FILES["uploadimage1"]["name"]; 
                  }else {
                        $successmessage ="<span style='color:red'>Error Uploading File 1</span>";
                  }
                  if (move_uploaded_file($_FILES["uploadimage2"]["tmp_name"], $target_file2)) {
                      $file1 =  $_FILES["uploadimage2"]["name"]; 
                  }else {
                        $successmessage ="<span style='color:red'>Error Uploading File 2</span>";
                  }
                  if (move_uploaded_file($_FILES["uploadimage3"]["tmp_name"], $target_file3)) {
                      $file1 =  $_FILES["uploadimage3"]["name"]; 
                  }else {
                        $successmessage ="<span style='color:red'>Error Uploading File 3</span>";
                  }
                  if (move_uploaded_file($_FILES["uploadimage4"]["tmp_name"], $target_file4)) {
                      $file1 =  $_FILES["uploadimage4"]["name"]; 
                  }else {
                        $successmessage ="<span style='color:red'>Error Uploading File 4</span>";
                  }
                   $SavePrice = $_POST['PackagePrice']-$_POST['OfferPrice']; 

                    $id = $mysql->insert("_tbl_tours_package",array("TourThemeID"      => $_POST['TourTheme'],
                                                                    "TourTypeID"      => $_POST['TourType'],
                                                                    "SubTourTypeID"   => $_POST['SubTourType'],
                                                                    "PackageName"     => $_POST['PackageName'],
                                                                    "PackagePrice"    => $_POST['PackagePrice'],
                                                                    "OfferPrice"      => $_POST['OfferPrice'],
                                                                    "SavePrice"       => $SavePrice,
                                                                    "Image1"          => $file1,
                                                                    "Image2"          => $file2,
                                                                    "Image3"          => $file3,
                                                                    "Image4"          => $file4,
                                                                    "JoiningPlace"    => $_POST['JoiningPlace'],
                                                                    "LeavingPlace"    => $_POST['LeavingPlace'],
                                                                    "NightsCount"     => $_POST['NightsCount'],
                                                                    "CountryCount"    => $_POST['CountryCount'],
                                                                    "CityCount"       => $_POST['CityCount'],
                                                                    "Currency"        => $_POST['Currency'],
                                                                    "SpokenLanguage"  => $_POST['SpokenLanguage'],
                                                                    "VisaRequirements"=> $_POST['VisaRequirements'],
                                                                    "MealsType"        => $_POST['MealType'],
                                                                    "SpecialMeal"     => $_POST['SpecialMeal'],
                                                                    "Toppings"        => $_POST['Toppings'],
                                                                    "BusAvailable"    => $_POST['BusAvailable'],
                                                                    "AirlineAvailable"=> $_POST['AirlineAvailable'],
                                                                    "Description"     => $_POST['Description'],
                                                                    "AddedOn"         => date("Y-m-d H:i:s")));
                     if(sizeof($id)>0){
                        unset($_POST);
                        $successmessage ="<span style='color:green'>Package Added Successfully</span>";
                     } else {
                        $successmessage ="<span style='color:red'>Error Add Package</span>"; 
                     }                                                                                    
            }                                                                                    
    }
    
?>
<script>
function getSubTourTypes(TourTypeID) {
        $.ajax({url:'webservice.php?action=getSubTourTypes&TourTypeID='+TourTypeID,success:function(data){
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
           IsNumeric("PackagePrice","ErrPackagePrice","Please Enter Numerics Character"); 
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
           IsNumeric("PackagePrice","ErrPackagePrice","Please Enter Numerics Character"); 
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
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" id="TourTheme" name="TourTheme">   
                                                    <option value="0" <?php echo ($_POST['TourTheme']=="0") ? " selected='selected' " : "";?>>Select Tour Theme</option>                                                                                     
                                                <?php $TourThemes = $mysql->select("select * from _tbl_tour_theme");?>
                                                <?php foreach($TourThemes as $TourTheme){ ?>
                                                    <option value="<?php echo $TourTheme['TourThemeID'];?>" <?php echo ($_POST['TourTheme']==$TourTheme['TourTheme']) ? " selected='selected' " : "";?>> <?php echo $TourTheme['TourTheme'];?></option>
                                                <?php }?>
                                                </select>
                                                <span class="errorstring" id="ErrTourTheme"><?php echo isset($ErrTourTheme)? $ErrTourTheme : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Tour Type<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" id="TourType" name="TourType" onchange="getSubTourTypes($(this).val())">   
                                                    <option value="0" <?php echo ($_POST['TourType']=="0") ? " selected='selected' " : "";?>>Select Tour Type</option>                                                                                     
                                                <?php $TourTypes = $mysql->select("select * from _tbl_tour");?>
                                                <?php foreach($TourTypes as $TourType){ ?>
                                                    <option value="<?php echo $TourType['TourTypeID'];?>" <?php echo ($_POST['TourType']==$TourType['TourTypeID']) ? " selected='selected' " : "";?>> <?php echo $TourType['TourTypeName'];?></option>
                                                <?php }?>
                                                </select>
                                                <span class="errorstring" id="ErrTourType"><?php echo isset($ErrTourType)? $ErrTourType : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Sub Tour Type<span class="required-label">*</span></label>
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
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="PackageName" name="PackageName" placeholder="Enter Package Name" value="<?php echo (isset($_POST['PackageName']) ? $_POST['PackageName'] :"");?>">
                                                <span class="errorstring" id="ErrPackageName"><?php echo isset($ErrPackageName)? $ErrPackageName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Package Price<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="PackagePrice" name="PackagePrice" placeholder="Enter Package Price" value="<?php echo (isset($_POST['PackagePrice']) ? $_POST['PackagePrice'] :"");?>">
                                                <span class="errorstring" id="ErrPackagePrice"><?php echo isset($ErrPackagePrice)? $ErrPackagePrice : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Offer Price<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="OfferPrice" name="OfferPrice" placeholder="Enter Offer Price" value="<?php echo (isset($_POST['OfferPrice']) ? $_POST['OfferPrice'] :"");?>">
                                                <span class="errorstring" id="ErrOfferPrice"><?php echo isset($ErrOfferPrice)? $ErrOfferPrice : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Image<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Image<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="file" name="uploadimage2" class="form-control" id="uploadimage2" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Image<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="file" name="uploadimage3" class="form-control" id="uploadimage3" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Image<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="file" name="uploadimage4" class="form-control" id="uploadimage4" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Joining Place<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="JoiningPlace" name="JoiningPlace" placeholder="Enter Joining Place" value="<?php echo (isset($_POST['JoiningPlace']) ? $_POST['JoiningPlace'] :"");?>">
                                                <span class="errorstring" id="ErrJoiningPlace"><?php echo isset($ErrJoiningPlace)? $ErrJoiningPlace : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Leaving Place<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="LeavingPlace" name="LeavingPlace" placeholder="Enter Leaving Place" value="<?php echo (isset($_POST['LeavingPlace']) ? $_POST['LeavingPlace'] :"");?>">
                                                <span class="errorstring" id="ErrLeavingPlace"><?php echo isset($ErrLeavingPlace)? $ErrLeavingPlace : "";?></span>
                                            </div>                                                                                    
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Nights<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" id="NightsCount" name="NightsCount">
                                                    <?php for($i=1;$i<=20;$i++){ ?>
                                                    <option value="<?php echo $i;?>" <?php echo ($_POST['NightsCount']==$i) ? " selected='selected' " : "";?>> <?php echo $i;?></option>    
                                                    <?php } ?>
                                                </select>                                                                                              
                                            </div>                                                                                    
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Country<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" id="CountryCount" name="CountryCount">
                                                    <?php for($i=1;$i<=10;$i++){ ?>
                                                    <option value="<?php echo $i;?>" <?php echo ($_POST['CountryCount']==$i) ? " selected='selected' " : "";?>> <?php echo $i;?></option>    
                                                    <?php } ?>
                                                </select>
                                            </div>                                                                                    
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">City<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" id="CityCount" name="CityCount">
                                                    <?php for($i=1;$i<=10;$i++){ ?>
                                                    <option value="<?php echo $i;?>" <?php echo ($_POST['CityCount']==$i) ? " selected='selected' " : "";?>> <?php echo $i;?></option>    
                                                    <?php } ?>
                                                </select>
                                            </div>                                                                                    
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Currency<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" id="Currency" name="Currency">
                                                    <option value="<?php echo "Rupees";?>" <?php echo ($_POST['Currency']=="Rupees") ? " selected='selected' " : "";?>> <?php echo "Rupees";?></option>    
                                                    <option value="<?php echo "Dollar";?>" <?php echo ($_POST['Currency']=="Dollar") ? " selected='selected' " : "";?>> <?php echo "Dollar";?></option>    
                                                </select>
                                            </div>                                                                                    
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Languages Spoken<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="SpokenLanguage" name="SpokenLanguage" placeholder="Enter Languages Spoken" value="<?php echo (isset($_POST['SpokenLanguage']) ? $_POST['SpokenLanguage'] :"");?>">
                                                <span class="errorstring" id="ErrSpokenLanguage"><?php echo isset($ErrSpokenLanguage)? $ErrSpokenLanguage : "";?></span>
                                            </div>                                                                                    
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Visa Required<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" id="VisaRequirements" name="VisaRequirements">
                                                    <option value="<?php echo "Yes";?>" <?php echo ($_POST['VisaRequirements']=="Yes") ? " selected='selected' " : "";?>> <?php echo "Yes";?></option>    
                                                    <option value="<?php echo "No";?>" <?php echo ($_POST['VisaRequirements']=="No") ? " selected='selected' " : "";?>> <?php echo "No";?></option>    
                                                </select>
                                            </div>                                                                                    
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Meal Type<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="MealType" name="MealType" placeholder="Enter Meal Type" value="<?php echo (isset($_POST['MealType']) ? $_POST['MealType'] :"");?>">
                                                <span class="errorstring" id="ErrMealType"><?php echo isset($ErrMealType)? $ErrMealType : "";?></span>
                                            </div>                                                                                    
                                        </div>                                                                  
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Special Meal<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="SpecialMeal" name="SpecialMeal" placeholder="Enter Special Meal" value="<?php echo (isset($_POST['SpecialMeal']) ? $_POST['SpecialMeal'] :"");?>">
                                                <span class="errorstring" id="ErrSpecialMeal"><?php echo isset($ErrSpecialMeal)? $ErrSpecialMeal : "";?></span>
                                            </div>                                                                                    
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Toppings<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="Toppings" name="Toppings" placeholder="Enter Toppings" value="<?php echo (isset($_POST['Toppings']) ? $_POST['Toppings'] :"");?>">
                                                <span class="errorstring" id="ErrToppings"><?php echo isset($ErrToppings)? $ErrToppings : "";?></span>
                                            </div>                                                                                    
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Bus Available<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" id="BusAvailable" name="BusAvailable">
                                                    <option value="<?php echo "Yes";?>" <?php echo ($_POST['BusAvailable']=="Yes") ? " selected='selected' " : "";?>> <?php echo "Yes";?></option>    
                                                    <option value="<?php echo "No";?>" <?php echo ($_POST['BusAvailable']=="No") ? " selected='selected' " : "";?>> <?php echo "No";?></option>    
                                                </select>
                                            </div>                                                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Airline Available<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" id="AirlineAvailable" name="AirlineAvailable">
                                                    <option value="<?php echo "Yes";?>" <?php echo ($_POST['AirlineAvailable']=="Yes") ? " selected='selected' " : "";?>> <?php echo "Yes";?></option>    
                                                    <option value="<?php echo "No";?>" <?php echo ($_POST['AirlineAvailable']=="No") ? " selected='selected' " : "";?>> <?php echo "No";?></option>    
                                                </select>
                                            </div>                                                                                    
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Description<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <textarea name="Description" id="Description" class="form-control"><?php echo (isset($_POST['Description']) ? $_POST['Description'] :"");?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;"><?php echo $successmessage;?> </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">                                       
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Add Package">&nbsp;
                                                <a href="dashboard.php?action=ToursPackage/list" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php include_once("footer.php");?>