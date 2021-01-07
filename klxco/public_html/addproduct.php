<?php include_once("header.php");   ?>


<div class="main-panel"  style="width: 100%;height:auto !important">
    <div class="container">           
        <div class="page-inner">
        <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a><br><br>
        <div class="page-header">
                <ul class="breadcrumbs" style="border:none;margin-left:0px;padding-left:0px;">
                    <li class="nav-home">
                        <a href="<?php echo country_url;?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo country_url;?>" >Home</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo country_url;?>mypage" >Dashboard</a>
                    </li>
                     <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo country_url;?>addproduct" >Add Product</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Product</h4>
                        </div>
                        <?php if($app::getTotalBalanceUserCredits($_SESSION['USER']['userid'])>0){ ?>
                        <div class="card-body">
                        <?php
    
    $obj = new CommonController(); 
    
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            $dupemail = $mysql->select("select * from _tbl_products where ProductName='".$_POST['ProductName']."'");
            if(sizeof($dupemail)>0){
                $ErrProductName ="Product Name Already Exist";
                $ErrorCount++;
            }
            if($ErrorCount==0){
                $target_dir = "assets/products/";
                $file =  $_FILES["uploadimage1"]["name"];
                $target_file = $target_dir .$file;

                if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
                   
                   $id = $mysql->insert("_tbl_products",array("ProductName"          => str_replace("'","\\'",$_POST['ProductName']),
                                                              "ProductPrice"         => $_POST['ProductPrice'],
                                                              "ProductImage"         => $file,
                                                              "SellingPrice"         => $_POST['SellingPrice'],
                                                              "ReferalIncome"        => $_POST['ReferalIncome'],
                                                              "Description"          => str_replace("'","\\'",$_POST['Description']),
                                                              "IsAdmin"              => "0",
                                                              "UserID"               => $_SESSION['USER']['userid'],
                                                              "CreatedOn"            => date("Y-m-d H:i:s")));
                   $ProductCode = "PCT". str_pad($id,5,"0",STR_PAD_LEFT);
                        $mysql->execute("update _tbl_products set ProductCode='".$ProductCode."' where ProductID='".$id."'");
                        
                        $mysql->insert("_tbl_product_credits",array("UserID"        => $_SESSION['USER']['userid'],
                                                                   "Particulars"   => "Add Product /".$id,
                                                                   "Credits"       => "0",
                                                                   "Debits"        => "1",
                                                                   "Balance"       => $app::getTotalBalanceUserCredits($_SESSION['USER']['userid'])-1,
                                                                   "RequestOn"     => date("Y-m-d H:i:s")));
                   if($id>0){
                        unset($_POST);
                   ?>
                        <script>
                            $(document).ready(function() {
                                swal("Product Added Successfully", {
                                    icon:"success",
                                    confirm: {value: 'Continue'}
                                }).then((value) => {
                                    location.href='<?php echo country_url;?>products'
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
    <form action="" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label >ProductName<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="ProductName" name="ProductName" placeholder="Enter Product Name" value="<?php echo (isset($_POST['ProductName']) ? $_POST['ProductName'] :"");?>">
                                    <span class="errorstring" id="ErrProductName"><?php echo isset($ErrProductName)? $ErrProductName : "";?></span>
                                </div>
                            </div>   
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label for="name">Product Price (Rs)<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="ProductPrice" name="ProductPrice" placeholder="Enter Product Price" value="<?php echo (isset($_POST['ProductPrice']) ? $_POST['ProductPrice'] :"");?>">
                                    <span class="errorstring" id="ErrProductPrice"><?php echo isset($ErrProductPrice)? $ErrProductPrice : "";?></span>    
                                </div>
                            </div>    
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label for="name">Selling Price (Rs)<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="SellingPrice" name="SellingPrice" placeholder="Enter Selling Price" value="<?php echo (isset($_POST['SellingPrice']) ? $_POST['SellingPrice'] :"");?>">
                                    <span class="errorstring" id="ErrSellingPrice"><?php echo isset($ErrSellingPrice)? $ErrSellingPrice : "";?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label for="name">Product Image<span class="required-label">*</span></label>
                                    <input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                    <span class="errorstring" id="Erruploadimage1"><?php echo isset($Erruploadimage1)? $Erruploadimage1 : "";?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label for="name">Referal Income (Rs)</label>
                                    <input type="text" class="form-control" id="ReferalIncome" name="ReferalIncome" placeholder="Enter Referal Income" value="<?php echo (isset($_POST['ReferalIncome']) ? $_POST['ReferalIncome'] :"");?>">
                                    <span class="errorstring" id="ErrReferalIncome"><?php echo isset($ErrReferalIncome)? $ErrReferalIncome : "";?></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label for="name">Product Description</label>
                                    <textarea class="form-control" name="Description" id="Description"><?php echo (isset($_POST['Description']) ? $_POST['Description'] : "");?></textarea>
                                    <span class="errorstring" id="ErrDescription"><?php echo isset($ErrDescription)? $ErrDescription : "";?></span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary" type="button" onclick="CallConfirmation()" bgcolor="grey">Add Product</button>&nbsp;
                                    <button class="btn btn-primary" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Add Product</button>
                                </div>
                            </div> 
                            </form> 
                        </div>
                        <?php } else { ?>
                            <div style="text-align: center;">
                                <img src='../assets/accessdenied.png' style='width:128px'><br>
                                Couldn't Add Product.Credits Not Found<br><br>
                                <button type="button" class="btn btn-outline-success" onclick="location.href='<?php echo country_url;?>addproduct'">Continue</button><br><br>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
    $("#ReferalIncome").blur(function () {
        if($("#ReferalIncome").val()!=""){
           IsNumeric("ReferalIncome","ErrReferalIncome","Please Enter Numerics Character"); 
        }
    });
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
    ErrorCount=0;    
        $('#ErrProductName').html("");
        $('#ErrProductPrice').html("");
        $('#ErrSellingPrice').html("");
        $('#Erruploadimage1').html("");
        $('#ErrReferalIncome').html("");
        
        
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
        if($("#ReferalIncome").val()!=""){
           IsNumeric("ReferalIncome","ErrReferalIncome","Please Enter Numerics Character"); 
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
                                +'Are you sure want to add product?<br>'
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

<?php include_once("footer.php"); ?>