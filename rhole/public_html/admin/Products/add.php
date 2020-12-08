<?php
include_once("header.php");
include_once("LeftMenu.php"); 
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            $dupemail = $mysql->select("select * from _tbl_products where ProductName='".$_POST['ProductName']."'");
            if(sizeof($dupemail)>0){
                $ErrProductName ="Product Name Already Exist";
                $ErrorCount++;
            }
            if($ErrorCount==0){
                $target_dir = "../assets/products/";
                $file =  $_FILES["uploadimage1"]["name"];
                $target_file = $target_dir .$file;

                if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
                
                   $random = sizeof($mysql->select("select * from _tbl_products")) + 1;
                   $ProductCode ="PCT0000".$random;
                   
                   $id = $mysql->insert("_tbl_products",array("ProductCode"          => $ProductCode,
                                                              "ProductName"          => str_replace("'","\\'",$_POST['ProductName']),
                                                              "ProductPrice"         => $_POST['ProductPrice'],
                                                              "ProductImage"         => $file,
                                                              "SellingPrice"         => $_POST['SellingPrice'],
                                                              "ReferalIncome"        => $_POST['ReferalIncome'],
                                                              "Description"          => str_replace("'","\\'",$_POST['Description']),
                                                              "CreatedOn"            => date("Y-m-d H:i:s")));
                   if($id>0){
                        unset($_POST);
                   ?>
                        <script>
                            $(document).ready(function() {
                                swal("Product Added Successfully", {
                                    icon:"success",
                                    confirm: {value: 'Continue'}
                                }).then((value) => {
                                    location.href='dashboard.php?action=Products/list&status=All'
                                });                                     
                            });
                        </script> 
                   <?php }
                } else {   ?>      
                        <script>
                            $(document).ready(function() {
                                swal("Sorry, there was an error uploading your file.", {
                                    icon : "error" 
                                });
                             });
                        </script>
                <?php  }
            }                             
    }
?>
<script>

$(document).ready(function () {
   
    $("#ProductName").blur(function () {
        IsNonEmpty("ProductName","ErrProductName","Please Enter Product Name");
    });
    $("#ProductPrice").blur(function () {
        if(IsNonEmpty("ProductPrice","ErrProductPrice","Please Enter MRP")){
           IsNumeric("ProductPrice","ErrProductPrice","Please Enter Numerics Character"); 
        }
    });
    $("#SellingPrice").blur(function () {
        if(IsNonEmpty("SellingPrice","ErrSellingPrice","Please Enter Selling Price")){
           IsNumeric("SellingPrice","ErrSellingPrice","Please Enter Numerics Character"); 
        }
    });
    $("#uploadimage1").blur(function () {
        IsNonEmpty("uploadimage1","Erruploadimage1","Please Upload Product Image");
    });
    $("#SellingPrice").blur(function () {
        if(parseFloat($('#ProductPrice').val()) < parseFloat($('#SellingPrice').val())){
           $('#ErrSellingPrice').html("Selling price Must Less than or Equal to MRP"); 
        }
    });
});

</script>
  <style>
 .has-success label {
    color: #495057 !important;
}
.has-success .form-control {
    border-color: #ebedf2 !important;
    color: #797979 !important;
}
 </style>      
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">                                                       
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Add Product</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Product Name<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="ProductName" name="ProductName" placeholder="Enter Product Name" value="<?php echo (isset($_POST['ProductName']) ? $_POST['ProductName'] :"");?>">
                                            <span class="errorstring" id="ErrProductName"><?php echo isset($ErrProductName)? $ErrProductName : "";?></span>
                                        </div> 
                                        <div class="form-group form-show-validation row">
                                            <div class="col-sm-6" style="padding-left: 0px;">
                                                <label for="name">Product Price (Rs)<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="ProductPrice" name="ProductPrice" placeholder="Enter Product Price" value="<?php echo (isset($_POST['ProductPrice']) ? $_POST['ProductPrice'] :"");?>">
                                                <span class="errorstring" id="ErrProductPrice"><?php echo isset($ErrProductPrice)? $ErrProductPrice : "";?></span>    
                                            </div>
                                            <div class="col-sm-6" style="padding-left: 0px;padding-right: 0px;">
                                                <label for="name">Selling Price (Rs)<span style="color:red">*</span></label>
                                                <input type="text" class="form-control" id="SellingPrice" name="SellingPrice" placeholder="Enter Selling Price" value="<?php echo (isset($_POST['SellingPrice']) ? $_POST['SellingPrice'] :"");?>">
                                                <span class="errorstring" id="ErrSellingPrice"><?php echo isset($ErrSellingPrice)? $ErrSellingPrice : "";?></span>
                                            </div>
                                       </div>
                                       <div class="form-group form-show-validation row">
                                            <div class="col-sm-6" style="padding-left: 0px;">
                                                <label for="name">Product Image<span class="required-label">*</span></label>
                                                <input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                                <span class="errorstring" id="Erruploadimage1"><?php echo isset($Erruploadimage1)? $Erruploadimage1 : "";?></span>
                                            </div>
                                            <div class="col-sm-6" style="padding-left: 0px;">
                                                <label for="name">Referal Income<span class="required-label">*</span></label>
                                                <input type="text" class="form-control" id="ReferalIncome" name="ReferalIncome" placeholder="Enter Referal Income" value="<?php echo (isset($_POST['ReferalIncome']) ? $_POST['ReferalIncome'] :"");?>">
                                                <span class="errorstring" id="ErrReferalIncome"><?php echo isset($ErrReferalIncome)? $ErrReferalIncome : "";?></span>
                                            </div>
                                       </div>
                                       <div class="form-group form-show-validation row">
                                            <label for="name">Product Description</label>
                                            <textarea class="form-control" name="Description" id="Description"><?php echo (isset($_POST['Description']) ? $_POST['Description'] : "");?></textarea>
                                            <span class="errorstring" id="ErrDescription"><?php echo isset($ErrDescription)? $ErrDescription : "";?></span>
                                        </div> 
                                    </div>   
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Add Product</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Add Product</button>
                                                <a href="dashboard.php?action=Products/list&status=All" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

 <div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
<script>
 
function CallConfirmation(){
    ErrorCount=0;    
        $('#ErrProductName').html("");
        $('#ErrProductPrice').html("");
        $('#ErrSellingPrice').html("");
        $('#Erruploadimage1').html("");
        
        
        IsNonEmpty("ProductName","ErrProductName","Please Enter Product Name");
        if(IsNonEmpty("ProductPrice","ErrProductPrice","Please Enter MRP")){
           IsNumeric("ProductPrice","ErrProductPrice","Please Enter Numerics Character"); 
        }
        if(IsNonEmpty("SellingPrice","ErrSellingPrice","Please Enter Selling Price")){
           IsNumeric("SellingPrice","ErrSellingPrice","Please Enter Numerics Character"); 
        }
        IsNonEmpty("uploadimage1","Erruploadimage1","Please Upload Product Image");
        if(parseFloat($('#ProductPrice').val()) < parseFloat($('#SellingPrice').val())){
           ErrorCount++;
           $('#ErrSellingPrice').html("Selling price Must Less than or Equal to MRP"); 
        }
        if(ErrorCount==0) {
            var txt= '<div class="modal-header" style="padding-bottom:5px">'
                         +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                         +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                         +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to add produt?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="AddProduct()" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");                                                      
        }else{
            return false;
        }
        }
function AddProduct() {
    $( "#btnsubmit" ).trigger( "click" );
}

</script>

  
         