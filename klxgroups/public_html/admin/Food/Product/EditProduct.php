<?php
    include_once("header.php");
    include_once("LeftMenu.php"); 
    
    $data = $mysql->select("select * from _tbl_foods_items  where md5(FoodID)='".$_GET['id']."'");
    
    if (isset($_POST['btnsubmit'])) {
        
        $ErrorCount =0;
        if ($ErrorCount==0) {
            
             if(strlen($_FILES["uploadimage1"]["name"])>0) {
                $target_dir = "../assets/food/";
                $file =  $_FILES["uploadimage1"]["name"];
                $target_file = $target_dir .$file;
                if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
                        
                } 
                
            } else {
                $file = $data[0]['FoodThumb'];
            } 
            
            $id = $mysql->execute("update _tbl_foods_items set 
                                                                   ProductName ='".$_POST['ProductName']."',
                                                                   IsActive    ='".$_POST['IsActive']."',
                                                                   Price       ='".$_POST['Price']."',
                                                                   FoodThumb   ='".$file."',
                                                                   OfferPrice  ='".$_POST['OfferPrice']."',
                                                                   Description ='".$_POST['Description']."' where  md5(FoodID)='".$_GET['id']."'");
            if(sizeof($id)>0){
                unset($_POST);
                $successmessage ="<span style='color:green'>Product updated Successfully</span>";
            } else {
                $successmessage ="<span style='color:red'>Error Add Product</span>"; 
            }                                                                                    
        }                                                                                    
    }
    $data = $mysql->select("select * from _tbl_foods_items  where md5(FoodID)='".$_GET['id']."'");
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
                                    <div class="card-title">Edit Product</div>
                                </div>
                                <form id="exampleValidation" method="POST" action=""   id="addProduct" enctype="multipart/form-data">
                                    <div class="card-body">
                                 
                                        
                                        
                                        
 
    
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Name<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="ProductName" name="ProductName" placeholder="Enter Product Name" value="<?php echo (isset($_POST['ProductName']) ? $_POST['ProductName'] : $data[0]['ProductName']);?>">
                                                <span class="errorstring" id="ErrPackageName"><?php echo isset($ErrPackageName)? $ErrPackageName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Price<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="Price" name="Price" placeholder="Enter Package Price" value="<?php echo (isset($_POST['PackagePrice']) ? $_POST['PackagePrice'] : $data[0]['Price']);?>">
                                                <span class="errorstring" id="ErrPackagePrice"><?php echo isset($ErrPackagePrice)? $ErrPackagePrice : "";?></span>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Offer Price<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="OfferPrice" name="OfferPrice" placeholder="Enter Offer Price" value="<?php echo (isset($_POST['OfferPrice']) ? $_POST['OfferPrice'] : $data[0]['OfferPrice']);?>">
                                                <span class="errorstring" id="ErrOfferPrice"><?php echo isset($ErrOfferPrice)? $ErrOfferPrice : "";?></span>
                                            </div>
                                        </div>
                                       
                                       
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Image<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="hidden" name="uploadimage1" id="uploadimage1">
                                                <input type="file" onchange="image1_onchage()" name="image1" id="image1" style="display: none;"> 
                                                <div id="div_1">
                                                    <?php if(strlen($data[0]['FoodThumb'])>1) { ?>
                                                        <img src="../assets/food/<?php echo $data[0]['FoodThumb'];?>" style='width: 64px;height:64px;margin-top: 5px;'>
                                                    <?php } ?>
                                                        <input type="file" name="uploadimage1" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                                </div>
                                                <div class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></div>
                                                <img src='../assets/loading.gif' style='width:0px'>
                                            </div>
                                        </div>     
                                                            
                                         
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Description<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <textarea name="Description" id="Description" class="form-control"><?php echo (isset($_POST['Description']) ? $_POST['Description'] : $data[0]['Description']);?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Is Delete<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" name="IsActive" id="IsActive">
                                                    <option value="1" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="1") ? " selected='selected' " : "") : (($data[0]['IsActive']=="1") ? " selected='selected' " : "");?>>No</option>
                                                    <option value="0" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="0") ? " selected='selected' " : "") : (($data[0]['IsActive']=="0") ? " selected='selected' " : "");?>>Yes</option>
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
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Update Product">&nbsp;
                                                <a href="dashboard.php?action=Food/Hotels/ViewProducts&Hotel=<?php echo md5($data[0]['FoodHotelID']);?>" class="btn btn-warning btn-border">Back</a>
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