<?php
include_once("header.php");
include_once("LeftMenu.php"); 
$data= $mysql->Select("select * from _tbl_sales_products where md5(ProductID)='".$_GET['id']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            $dupemail = $mysql->select("select * from _tbl_sales_products where ProductName='".$_POST['ProductName']."' and ProductID<>'".$data[0]['ProductID']."'");
            if(sizeof($dupemail)>0){
                $ErrProductName ="Product Name Already Exist";
                $ErrorCount++;
            }
            if($_POST['BarCode']!=""){
            $dupemail = $mysql->select("select * from _tbl_sales_products where BarCode='".$_POST['BarCode']."' and ProductID<>'".$data[0]['ProductID']."'");
            if(sizeof($dupemail)>0){
                $ErrBarCode ="Barcode Already Exist";
                $ErrorCount++;
            }
            }
            
            if($ErrorCount==0){
                $unitm = $mysql->select("select * from _tbl_units where id='".$_POST['ProductQty']."'");
                $mysql->execute("update _tbl_sales_products set `BarCode`             ='".$_POST['BarCode']."',
                                                                `ProductName`         ='".$_POST['ProductName']."',
                                                                `ProductNameTamil`    ='".$_POST['ProductNameTamil']."',
                                                                `ProductUnitID`       ='".$unitm[0]['id']."',
                                                                `ProductUnitName`     ='".$unitm[0]['unitname']."',
                                                                `ProductUnitFullName` ='".$unitm[0]['unitfullname']."',
                                                                `ProductPrice`        ='".$_POST['ProductPrice']."',
                                                                `IsPublish`           ='".$_POST['IsPublish']."',
                                                                `Description`         ='".str_replace("'","\\'",$_POST['Description'])."' where ProductID='".$data[0]['ProductID']."'");
                $successmessage ="Updated Successfully";
        }else {
             $ErrCurrentPassword ="Error updating ";
        }
    }
    $data= $mysql->Select("select * from _tbl_sales_products where md5(ProductID)='".$_GET['id']."'");
?>
<script>
$(document).ready(function () {                                    
    $("#ProductName").blur(function () {
        if(IsNonEmpty("ProductName","ErrProductName","Please Enter Product Name In English")){
           IsAlphaNumeric("ProductName","ErrProductName","Please Enter Alpha Numerics Character"); 
        }
    });
    /*$("#ProductNameTamil").blur(function () {
        IsNonEmpty("ProductNameTamil","ErrProductNameTamil","Please Enter Product Name In Tamil");
    }); */
    $("#ProductQty").blur(function () {
       var ProductQty = $('#ProductQty').val().trim();
        if (ProductQty=="0") {
            $('#ErrProductQty').html("Please Select Unit of Measurement");   
        }else{
            $('#ErrProductQty').html("");
        }
    });
    $("#ProductPrice").blur(function () {
        if(IsNonEmpty("ProductPrice","ErrProductPrice","Please Enter Product Price")){
           IsNumeric("ProductPrice","ErrProductPrice","Please Enter Numerics Character"); 
        }
    });
    
});
function SubmitProduct() {
        ErrorCount=0;    
        $('#ErrProductName').html("");
      //  $('#ErrProductNameTamil').html("");
        $('#ErrProductQty').html("");
        $('#ErrProductPrice').html("");
        $('#ErrDescription').html("");
        
        if(IsNonEmpty("ProductName","ErrProductName","Please Enter Product Name In English")){
           IsAlphaNumeric("ProductName","ErrProductName","Please Enter Alpha Numerics Character"); 
        }
      //  IsNonEmpty("ProductNameTamil","ErrProductNameTamil","Please Enter Product Name In Tamil");
        
        var ProductQty = $('#ProductQty').val().trim();
        if (ProductQty=="0") {
            $('#ErrProductQty').html("Please Select Unit of Measurement");  
            ErrorCount++; 
        }else{
            $('#ErrProductQty').html("");
        }
        
        if(IsNonEmpty("ProductPrice","ErrProductPrice","Please Enter Price Per Unit")){
           IsNumeric("ProductPrice","ErrProductPrice","Please Enter Numerics Character"); 
        }
                                                                                                                 
                return (ErrorCount==0) ? true : false;
         }
</script>

     <script type="text/javascript" src="assets/js/google_jsapi.js"></script>
<script type="text/javascript">
   google.load("elements", "1", {
            packages: "transliteration"          });
      function onLoad() {
        var options = {
          sourceLanguage: 'en',
          destinationLanguage: ['ta'], 
          shortcutKey: 'ctrl+g',
          transliterationEnabled: true        };
             var control =
            new google.elements.transliteration.TransliterationControl(options);
        var ids = ["ProductNameTamil"];
        control.makeTransliteratable(ids);
        //control.showControl('translControl'); 
         control.c.qc.t13n.c[3].c.d.keyup[0].ia.F.p = 'https://www.google.com';
        }
      google.setOnLoadCallback(onLoad);
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
                                <form method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $_GET['id'];?>" id="ProductID" Name="ProductID">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Code</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" disabled="disabled" class="form-control"value="<?php echo $data[0]['ProductCode'];?>">
                                                <span class="errorstring" id="ErrProductName"><?php echo isset($ErrProductName)? $ErrProductName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">BarCode</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="BarCode" name="BarCode" placeholder="Enter BarCode" value="<?php echo (isset($_POST['BarCode']) ? $_POST['BarCode'] : $data[0]['BarCode']);?>">
                                                <span class="errorstring" id="ErrBarCode"><?php echo isset($ErrBarCode)? $ErrBarCode : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Name (In English)<span style="color:red">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="ProductName" name="ProductName" placeholder="Enter Product Name In English" value="<?php echo (isset($_POST['ProductName']) ? $_POST['ProductName'] : $data[0]['ProductName']);?>">
                                                <span class="errorstring" id="ErrProductName"><?php echo isset($ErrProductName)? $ErrProductName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Name (In Tamil)</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="ProductNameTamil" name="ProductNameTamil" placeholder="Enter Product Name In Tamil" value="<?php echo (isset($_POST['ProductNameTamil']) ? $_POST['ProductNameTamil'] :  $data[0]['ProductNameTamil']);?>">
                                                <span class="errorstring" id="ErrProductNameTamil"><?php echo isset($ErrProductNameTamil)? $ErrProductNameTamil : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Unit of Measurement<span style="color:red">*</span></label>                   
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select name="ProductQty" id="ProductQty" class="form-control">
                                                    <option value="0" <?php echo ($_POST['ProductQty']=="0") ? " selected='selected' " : "";?>>Select Unit of Measurement</option>
                                                    <?php $units = $mysql->select("select * from _tbl_units"); foreach($units as $unit){ ?>
                                                    <option value="<?php echo $unit['id'];?>" <?php echo (isset($_POST[ 'ProductQty'])) ? (($_POST[ 'ProductQty']==$unit['id']) ? " selected='selected' " : "") : (($data[0]['ProductUnitID']==$unit['id']) ? " selected='selected' " : "");?>><?php echo $unit['unitname'];?></option>
                                                    <?php } ?>
                                                </select>  
                                                <span class="errorstring" id="ErrProductQty"><?php echo isset($ErrProductQty)? $ErrProductQty : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Price Per Unit<span style="color:red">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="ProductPrice" name="ProductPrice" placeholder="Enter Product Price" value="<?php echo (isset($_POST['ProductPrice']) ? $_POST['ProductPrice'] :$data[0]['ProductPrice']);?>">
                                                <span class="errorstring" id="ErrProductPrice"><?php echo isset($ErrProductPrice)? $ErrProductPrice : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Description</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <textarea class="form-control" id="Description" name="Description" placeholder="Enter Product Description"><?php echo (isset($_POST['Description']) ? $_POST['Description'] :$data[0]['Description']);?></textarea>
                                                <span class="errorstring" id="ErrDescription"><?php echo isset($ErrDescription)? $ErrDescription : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Is publish</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" name="IsPublish" id="IsPublish">
                                                    <option value="1" <?php echo (isset($_POST[ 'IsPublish'])) ? (($_POST[ 'IsPublish']=="1") ? " selected='selected' " : "") : (($data[0]['IsPublish']=="1") ? " selected='selected' " : "");?>>Yes</option>
                                                    <option value="0" <?php echo (isset($_POST[ 'IsPublish'])) ? (($_POST[ 'IsPublish']=="0") ? " selected='selected' " : "") : (($data[0]['IsPublish']=="0") ? " selected='selected' " : "");?>>No</option>
                                                </select>                                                                                                       
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                    </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Update Product">&nbsp;
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
        <?php include_once("footer.php");?>