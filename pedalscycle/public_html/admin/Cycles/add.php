
<script>
    $(document).ready(function () {
        $("#ProductName").blur(function () {
            //IsNonEmpty("ProductName","ErrProductName","Please Enter Product Name");
        });
        $("#ProductPrice").blur(function () {
            if(IsNonEmpty("ProductPrice","ErrProductPrice","Please Enter Product Price")){
                
            }
        });
    });
    
    function SubmitProduct() {
        ErrorCount=0;    
        $('#ErrProductName').html("");
        $('#ErrProductPrice').html("");
        
        if(IsNonEmpty("ProductName","ErrProductName","Please Enter Product Name")){
           //IsAlphaNumeric("ProductName","ErrProductName","Please Enter Alpha Numerics Character"); 
        }
        
        if(IsNonEmpty("ProductPrice","ErrProductPrice","Please Enter Product Price")){
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
                                <div class="card-title">Add Product</div>
                            </div>
                            <?php
                                if (isset($_POST['btnsubmit'])) {
                                    $ErrorCount =0;
                                    
                                    $duppackage = $mysql->select("select * from _tbl_products where ProductName='".$_POST['ProductName']."' ");
                                    if(sizeof($duppackage)>0){
                                         echo errorMessage("Product Name already exists");
                                         $ErrorCount++;
                                    }
                                        
                                    if($ErrorCount==0) {
                                        
                                        $id = $mysql->insert("_tbl_products",array("ProductName"     => $_POST['ProductName'],
                                                                                   "ProductPrice"    => $_POST['ProductPrice'],
                                                                                   "OfferPrice"      => $_POST['OfferPrice'],
                                                                                   "AddedOn"         => date("Y-m-d H:i:s")));
                                        if(sizeof($id)>0){
                                            unset($_POST);
                                            echo successMessage('Product Added Successfully');
                                        } else {
                                            echo errorMessage("Error Adding Product"); 
                                        }                                                                                    
                                    }                                                                                    
                                }
                            ?>
                            <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Name<span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="text" class="form-control" id="ProductName" name="ProductName" placeholder="Enter Product Name" value="<?php echo (isset($_POST['ProductName']) ? $_POST['ProductName'] :"");?>">
                                            <span class="errorstring" id="ErrProductName"><?php echo isset($ErrPackageName)? $ErrPackageName : "";?></span>
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Price<span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="text" class="form-control" id="ProductPrice" name="ProductPrice" placeholder="Enter Product Price" value="<?php echo (isset($_POST['ProductPrice']) ? $_POST['ProductPrice'] :"0.00");?>">
                                            <span class="errorstring" id="ErrProductPrice"><?php echo isset($ErrPackagePrice)? $ErrPackagePrice : "";?></span>
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Offer Price<span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="text" class="form-control" id="OfferPrice" name="OfferPrice" placeholder="Enter Offer Price" value="<?php echo (isset($_POST['OfferPrice']) ? $_POST['OfferPrice'] :"0.00");?>">
                                            <span class="errorstring" id="ErrOfferPrice"><?php echo isset($ErrOfferPrice)? $ErrOfferPrice : "";?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">       
                                    <div class="row">                                       
                                        <div class="col-md-12">
                                            <input class="btn btn-warning" type="submit" name="btnsubmit" value="Add Product">&nbsp;
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
    </div>
    <?php include_once("footer.php");?>