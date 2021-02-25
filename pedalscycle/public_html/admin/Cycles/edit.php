<?php
include_once("header.php");
include_once("LeftMenu.php"); 
$data= $mysql->Select("select * from _tbl_products where md5(ProductID)='".$_GET['id']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            $dupProduct = $mysql->select("select * from _tbl_products where ProductName='".$_POST['ProductName']."' and ProductID<>'".$data[0]['ProductID']."'");
            if(sizeof($dupProduct)>0){
               
            }
            
            if($ErrorCount==0){
                
                
                  
               $ShortDescription = str_replace("'","\'",$_POST['ShortDescription']);
               $ShortDescription = str_replace('"','\"',$ShortDescription);
              
              
               $Description = str_replace("'","\'",$_POST['Description']);
               $Description = str_replace('"','\"',$Description);
               
               $SearchTags = str_replace("'","\'",$_POST['SearchTags']);
               $SearchTags = str_replace('"','\"',$SearchTags);
                                                    
               $mysql->execute("update _tbl_products set `ProductName`     ='".$_POST['ProductName']."',
                                                        `ProductPrice`     ='".$_POST['ProductPrice']."',
                                                        `OfferPrice`       ='".$_POST['OfferPrice']."',
                                                        `Description`      ='".$Description."',
                                                        `SearchTags`       ='".$SearchTags."',
                                                        `ProductRating`    ='".$_POST['ProductRating']."',
                                                        `ShortDescription` ='".$ShortDescription."',
                                                        `IsPublish`        ='".$_POST['IsPublish']."' where ProductID='".$data[0]['ProductID']."'");

                        $successmessage ="<span style='color:green'>Package Updated Successfully</span>";
                     } else {
                        $successmessage ="<span style='color:red'>Error Add Package</span>"; 
                     }
            }
        $data= $mysql->Select("select * from _tbl_products where md5(ProductID)='".$_GET['id']."'");
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
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Package Name<span class="required-label">*</span></label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="ProductName" name="ProductName" placeholder="Enter Product Name" value="<?php echo (isset($_POST['ProductName']) ? $_POST['ProductName'] : $data[0]['ProductName']);?>">
                                                <span class="errorstring" id="ErrProductName"><?php echo isset($ErrProductName)? $ErrProdcutName : "";?></span>
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
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Price<span class="required-label">*</span></label>
                                            <div class="col-lg-3 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="ProductPrice" name="ProductPrice" placeholder="Enter Product Price" value="<?php echo (isset($_POST['ProductPrice']) ? $_POST['ProductPrice'] : $data[0]['ProductPrice']);?>">
                                                <span class="errorstring" id="ErrProductPrice"><?php echo isset($ErrProductPrice)? $ErrProductPrice : "";?></span>
                                            </div>
                                             <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Offer Price<span class="required-label">*</span></label>
                                            <div class="col-lg-3 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="OfferPrice" name="OfferPrice" placeholder="Enter Offer Price" value="<?php echo (isset($_POST['OfferPrice']) ? $_POST['OfferPrice'] : $data[0]['OfferPrice']);?>">
                                                <span class="errorstring" id="ErrProductPrice"><?php echo isset($ErrProductPrice)? $ErrProductPrice : "";?></span>
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
                                             <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Rating<span class="required-label">*</span></label>
                                            <div class="col-lg-3 col-md-9 col-sm-8">
                                                <select class="form-control" name="ProductRating" id="ProductRating">
                                                    <option value="1" <?php echo (isset($_POST[ 'ProductRating'])) ? (($_POST[ 'ProductRating']=="1") ? " selected='selected' " : "") : (($data[0]['ProductRating']=="1") ? " selected='selected' " : "");?>>1</option>
                                                    <option value="2" <?php echo (isset($_POST[ 'ProductRating'])) ? (($_POST[ 'ProductRating']=="2") ? " selected='selected' " : "") : (($data[0]['ProductRating']=="2") ? " selected='selected' " : "");?>>2</option>
                                                    <option value="3" <?php echo (isset($_POST[ 'ProductRating'])) ? (($_POST[ 'ProductRating']=="3") ? " selected='selected' " : "") : (($data[0]['ProductRating']=="3") ? " selected='selected' " : "");?>>3</option>
                                                    <option value="4" <?php echo (isset($_POST[ 'ProductRating'])) ? (($_POST[ 'ProductRating']=="4") ? " selected='selected' " : "") : (($data[0]['ProductRating']=="4") ? " selected='selected' " : "");?>>4</option>
                                                    <option value="5" <?php echo (isset($_POST[ 'ProductRating'])) ? (($_POST[ 'ProductRating']=="5") ? " selected='selected' " : "") : (($data[0]['ProductRating']=="5") ? " selected='selected' " : "");?>>5</option>
                                                </select>                                                                                                       
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">                                       
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Update Product">&nbsp;
                                                <a href="dashboard.php?action=Cycles/list" class="btn btn-warning btn-border">Back</a>
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