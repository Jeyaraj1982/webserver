<?php
include_once("header.php");
include_once("LeftMenu.php"); 
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
             
            
            if($ErrorCount==0){
                
               
                   $SavePrice = $_POST['PackagePrice']-$_POST['OfferPrice']; 
                       $hotels = $mysql->select("select * from _tbl_hotels where  md5(HotelID)='".$_GET['Hotel']."'");
                    $id = $mysql->insert("_tbl_hotels_packages",array(
                                                                    "HotelCityNameID"      => $hotels[0]['HotelCityNameID'],
                                                                    "HotelID"      => $hotels[0]['HotelID'],
                                                                    "PackageName"   => $_POST['PackageName'],
                                                                    "Price"     => $_POST['Price'],
                                                                    "OfferPrice"    => $_POST['OfferPrice'],
                                                                    "Description"    => $_POST['Description']));
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
        //  IsNumeric("PackagePrice","ErrPackagePrice","Please Enter Numerics Character"); 
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
           //IsNumeric("PackagePrice","ErrPackagePrice","Please Enter Numerics Character"); 
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
                                    <div class="card-title">Add Package</div>
                                </div>
                                <form id="exampleValidation" method="POST" action=""   id="addProduct" enctype="multipart/form-data">
                                    <div class="card-body">
                                 
                                        
                                       <!-- 
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
                                          -->
                                        
 
    
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
                                                <input type="text" class="form-control" id="Price" name="Price" placeholder="Enter Package Price" value="<?php echo (isset($_POST['PackagePrice']) ? $_POST['PackagePrice'] :"");?>">
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
                                                <a href="dashboard.php?action=Hotel/Hotels/viewpackages&Hotel=<?php echo $_GET['Hotel'];?>" class="btn btn-warning btn-border">Back</a>
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