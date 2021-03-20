<?php
include_once("header.php");
include_once("LeftMenu.php"); 
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            $dupemail = $mysql->select("select * from _tbl_products where ProductName='".$_POST['ProductName']."' and CategoryID='".$_POST['Category']."' and SubCategoryID='".$_POST['SubCategory']."'");
            if(sizeof($dupemail)>0){
                $ErrProductName ="Product Name Already Exist";
                $ErrorCount++;
            }
            if($ErrorCount==0){
                   $random = sizeof($mysql->select("select * from _tbl_products")) + 1;
                   $ProductCode ="PCT0000".$random;
                   
              $Brand = $mysql->select("select * from _tbl_brands where BrandID='".$_POST['BrandName']."'"); 
              $Category = $mysql->select("select * from _tbl_category where CategoryID='".$_POST['Category']."'");
              $SubCategory = $mysql->select("select * from _tbl_sub_category where SubCategoryID='".$_POST['SubCategory']."'");
			  $id = $mysql->insert("_tbl_products",array("CategoryID"           => $Category[0]['CategoryID'],
                                                         "CategoryName"         => $Category[0]['CategoryName'],
                                                         "SubCategoryID"        => $SubCategory[0]['SubCategoryID'],
                                                         "SubCategoryName"      => $SubCategory[0]['SubCategoryName'],
                                                         "BrandID"              => $Brand[0]['BrandID'],
                                                         "BrandName"            => $Brand[0]['BrandName'],
                                                         "ProductCode"          => $ProductCode,
                                                         "ProductName"          => $_POST['ProductName'],
                                                         "StockAvailable"       => $_POST['StockAvailable'],
                                                         "ShortDescription"     => str_replace("'","\\'",$_POST['ShortDescription']),
                                                         "DetailDescription"    => str_replace("'","\\'",$_POST['DetailDescription']),
                                                         "AddedOn"              => date("Y-m-d H:i:s")));
            if(sizeof($id)>0){
                unset($_POST);
                if($_GET['fr']=="c"){
                ?>
                 <script>
                    $(document).ready(function() {
                        swal("Product Added Successfully", {
                            icon:"success",
                            confirm: {value: 'Continue'}
                        }).then((value) => {
                            location.href='dashboard.php?action=SubCategory/viewproducts&fr=c&id=<?php echo $_GET['sid']; ?>&status=All'
                        });                                     
                    });
                    </script> 
       <?php     }
       else if($_GET['fr']=="sc"){
                ?>
                 <script>
                    $(document).ready(function() {
                        swal("Product Added Successfully", {
                            icon:"success",
                            confirm: {value: 'Continue'}
                        }).then((value) => {
                            location.href='dashboard.php?action=SubCategory/viewproducts&fr=sc&id=<?php echo $_GET['sid']; ?>&status=All'
                        });                                     
                    });
                    </script> 
       <?php     }else {    ?>
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
         <?php   
                    }
            }
       
              } else {     ?>
                <script>
             $(document).ready(function() {
                swal("", "Error Add Product", "warning")
             });
            </script>
           <?php   }
                                         
                
    }
 $SubCategorys = $mysql->select("select * from _tbl_sub_category where md5(CategoryID)='".$_GET['id']."' and md5(SubCategoryID)='".$_GET['sid']."'");   
?>
<script>
<?php if($_GET['fr']=="sc" || $_GET['fr']=="c" ){ ?>
function getSubCategory(CategoryID,SubCategoryID) {
        $.ajax({url:'../webservice.php?action=getSubCategory&CategoryID='+CategoryID+'&SubCategoryID='+SubCategoryID+'&fr=category',success:function(data){
            $('#div_subcategory').html(data);
            $('#ErrSubCategory').html('');
        }});
    }
<?php } else {?>
function getSubCategory(CategoryID) {
        $.ajax({url:'../webservice.php?action=getSubCategory&CategoryID='+CategoryID,success:function(data){
            $('#div_subcategory').html(data);
            $('#ErrSubCategory').html('');
        }});
    }
<?php } ?>
$(document).ready(function () {
    getSubCategory(<?php echo $_POST['Category'];?>);
    $("#Category").blur(function () {
        $('#ErrCategory').html("");
        if($('#Category').val()=="0"){
           $('#ErrCategory').html("Please Select Category Name"); 
        }
    });
    $("#SubCategory").blur(function () {
        $('#ErrSubCategory').html("");
        if($('#SubCategory').val()=="0"){
           $('#ErrSubCategory').html("Please Select Sub Category Name"); 
        }
    });
    $("#BrandName").blur(function () {
        $('#ErrBrandName').html("");
        if($('#BrandName').val()=="0"){
           $('#ErrBrandName').html("Please Select Brand Name"); 
        }
    });
    $("#ProductName").blur(function () {
        if(IsNonEmpty("ProductName","ErrProductName","Please Enter Product Name")){
         //  Alphanumericwithdash("ProductName","ErrProductName","Please Enter Alpha Numerics Character"); 
        }
    });
 //   $("#ProductPrice").blur(function () {
     //   if(IsNonEmpty("ProductPrice","ErrProductPrice","Please Enter MRP")){
     //      IsNumeric("ProductPrice","ErrProductPrice","Please Enter Numerics Character"); 
     //   }
   // });
   // $("#SellingPrice").blur(function () {
      //  if(IsNonEmpty("SellingPrice","ErrSellingPrice","Please Enter Selling Price")){
      //     IsNumeric("SellingPrice","ErrSellingPrice","Please Enter Numerics Character"); 
      //  }
  //  });
  //  $("#ProductImage").blur(function () {
      //  IsNonEmpty("ProductImage","ErrProductImage","Please Upload Product Image");
  //  });
  //  $("#SellingPrice").blur(function () {
       // if(parseFloat($('#ProductPrice').val()) < parseFloat($('#SellingPrice').val())){
          // $('#ErrSellingPrice').html("Selling price Must Less than or Equal to MRP"); 
       // }
   // });
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
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                   <input type="hidden" name="ProductImage" id="ProductImage">
                                   <input type="file" onchange="image1_onchage()" name="image1" id="image1" style="display: none;">    
                                    <div class="card-body">
                                       <div class="form-group row">
                                            <div class="col-sm-4" style="text-align: center;display:none">
                                                <div id="div_PI">
                                                    <img id="src_image1" onclick="uploadimage('1')" src="assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                                                </div> 
                                                <button type="button" onclick="uploadimage('1')" class="btn btn-primary btn-sm" style="padding: 0px 10px 0px 10px;">Browse</button>
                                                <div class="errorstring" id="ErrProductImage"><?php echo isset($ErrProductImage)? $ErrProductImage : "";?></div>  
                                            </div>
                                            <div class="col-sm-8">
                                               <div class="form-group form-show-validation row">
                                                    <label for="name">Category Name<span style="color:red">*</span></label>
                                                    <?php if($_GET['fr']=="sc" || $_GET['fr']=="c"){ ?>
                                                        <select readonly="readonly" class="form-control" name="Category" id="Category">
                                                            <option value="0" <?php echo ($_POST['CategoryName']=="0") ? " selected='selected' " : "";?>>Select Category Name</option>
                                                            <?php $CategoryNames = $mysql->select("select * from _tbl_category");?>
                                                            <?php foreach($CategoryNames as $CategoryName) { ?>
                                                                  <option value="<?php echo $CategoryName['CategoryID'];?>" <?php echo (isset($_POST[ 'Category'])) ? (($_POST[ 'Category']==$CategoryName['CategoryID']) ? " selected='selected' " : "") : (($_GET['id']==md5($CategoryName['CategoryID'])) ? " selected='selected' " : "");?>><?php echo $CategoryName['CategoryName'];?></option>
                                                            <?php } ?>
                                                        </select>
                                                    <?php }else{ ?>
                                                        <select class="form-control" name="Category" id="Category" onchange="getSubCategory($(this).val())">
                                                            <option value="0" <?php echo ($_POST['Category']=="0") ? " selected='selected' " : "";?>>Select Category Name</option>
                                                            <?php $Categorys = $mysql->select("select * from _tbl_category where IsActive='1' order by CategoryName");?>
                                                            <?php foreach($Categorys as $Category) { ?>
                                                                  <option value="<?php echo $Category['CategoryID'];?>" <?php echo ($_POST['Category']==$Category['CategoryID']) ? " selected='selected' " : "";?>><?php echo $Category['CategoryName'];?></option>
                                                            <?php } ?>
                                                        </select>
                                                    <?php } ?>
                                                    <span class="errorstring" id="ErrCategory"><?php echo isset($ErrCategory)? $ErrCategory : "";?></span>
                                               </div>
                                               <div class="form-group form-show-validation row">
                                                    <label for="name">Sub Category Name<span style="color:red">*</span></label>
                                                    <div class="col-sm-12" id="div_subcategory" style="padding-left: 0px;padding-right:0px;">
                                                        <select class="form-control" name="SubCategory" id="SubCategory">
                                                            <option value="0" <?php echo ($_POST['SubCategory']=="0") ? " selected='selected' " : "";?>>Select Sub Category Name</option>
                                                        </select>
                                                    </div>
                                                    <span class="errorstring" id="ErrSubCategory"><?php echo isset($ErrSubCategory)? $ErrSubCategory : "";?></span>
                                               </div>
                                               <div class="form-group form-show-validation row">
                                                    <label for="name">Brand Name<span style="color:red">*</span></label>
                                                    <select class="form-control" name="BrandName" id="BrandName">
                                                        <option value="0" <?php echo ($_POST['BrandName']=="0") ? " selected='selected' " : "";?>>Select Brand Name</option>
                                                        <?php $BrandNames = $mysql->select("select * from _tbl_brands where IsActive='1' order by BrandName");?>
                                                        <?php foreach($BrandNames as $BrandName) { ?>
                                                              <option value="<?php echo $BrandName['BrandID'];?>" <?php echo ($_POST['BrandName']==$BrandName['BrandID']) ? " selected='selected' " : "";?>><?php echo $BrandName['BrandName'];?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <span class="errorstring" id="ErrBrandName"><?php echo isset($ErrBrandName)? $ErrBrandName : "";?></span>
                                               </div>
                                                <div class="form-group form-show-validation row">
                                                    <label for="name">Product Name<span style="color:red">*</span></label>
                                                    <input type="text" class="form-control" id="ProductName" name="ProductName" placeholder="Enter Product Name" value="<?php echo (isset($_POST['ProductName']) ? $_POST['ProductName'] :"");?>">
                                                    <span class="errorstring" id="ErrProductName"><?php echo isset($ErrProductName)? $ErrProductName : "";?></span>
                                                </div> 
                                                <div class="form-group form-show-validation row">
                                                    <label for="name">Short Description</label>
                                                    <textarea class="form-control" maxlength="300" name="ShortDescription" id="ShortDescription"><?php echo (isset($_POST['ShortDescription']) ? $_POST['ShortDescription'] : "");?></textarea>
                                                    <label class="col-form-label" style="padding-top:0px;font-weight: normal;">Max 300 characters&nbsp;&nbsp;|&nbsp;&nbsp;<span id="textarea_feedback"></span></label>
                                                    <span class="errorstring" id="ErrShortDescription"><?php echo isset($ErrShortDescription)? $ErrShortDescription : "";?></span>
                                                </div> 
                                            </div>
                                       </div> 
                                        
                                       <div class="form-group form-show-validation row">
                                            <label for="name">Detail Description</label>
                                            <textarea class="form-control" rows="5" id="DetailDescription" name="DetailDescription" placeholder="Enter Detail Description"><?php echo (isset($_POST['DetailDescription']) ? $_POST['DetailDescription'] :"");?></textarea>
                                            <span class="errorstring" id="ErrDetailDescription"><?php echo isset($ErrDetailDescription)? $ErrDetailDescription : "";?></span>
                                       </div>
                                        <div class="form-group">
                                        <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                    </div>
                                    </div> 
                                    <div class="card-action"> 
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Add Product</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Add Product</button>
                                                <?php if($_GET['fr']=="sc"){ ?>
                                                    <a href="dashboard.php?action=SubCategory/list&status=All" class="btn btn-warning btn-border">Back</a>
                                                <?php } else if($_GET['fr']=="c") { ?>
                                                    <?php $subcategory = $mysql->select("select * from _tbl_sub_category where md5(SubCategoryID)='".$_GET['id']."'");?>
                                                    <a href="dashboard.php?action=Category/viewsubcategory&fr=c&id=<?php echo $subcategory[0]['CategoryID'];?>&status=All" class="btn btn-warning btn-border">Back</a>
                                                <?php } else { ?>
                                                    <a href="dashboard.php?action=Products/list&status=All" class="btn btn-warning btn-border">Back</a>
                                                <?php } ?>
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
<string name="image_chooser" style="display:none;">File Chooser</string>
<script>
 $(document).ready(function() {
        var text_max = 300;
        var text_length = $('#ShortDescription').val().length;
        $('#textarea_feedback').html(text_length + ' characters typed');
        $('#ShortDescription').keyup(function() {
            var text_length = $('#ShortDescription').val().length;
            var text_remaining = text_max - text_length;
            $('#textarea_feedback').html(text_length + ' characters typed');
        });
    });
    

function CallConfirmation(){
    ErrorCount=0;    
        $('#ErrCategory').html("");
        $('#ErrSubCategory').html("");
        $('#ErrBrandName').html("");
        $('#ErrProductName').html("");
       // $('#ErrProductPrice').html("");
       // $('#ErrSellingPrice').html("");
       // $('#ErrProductImage').html("");
        
        if($('#Category').val()=="0"){
            ErrorCount++;
           $('#ErrCategory').html("Please Select Category Name"); 
        }
        if($('#SubCategory').val()=="0"){
            ErrorCount++;
           $('#ErrSubCategory').html("Please Select Sub Category Name"); 
        }
        if($('#BrandName').val()=="0"){
            ErrorCount++;
           $('#ErrBrandName').html("Please Select Brand Name"); 
        }
        if(IsNonEmpty("ProductName","ErrProductName","Please Enter Product Name")){    
         //  Alphanumericwithdash("ProductName","ErrProductName","Please Enter Alpha Numerics Character"); 
        }
      //  if(IsNonEmpty("ProductPrice","ErrProductPrice","Please Enter MRP")){
        //   IsNumeric("ProductPrice","ErrProductPrice","Please Enter Numerics Character"); 
       // }
      //  if(IsNonEmpty("SellingPrice","ErrSellingPrice","Please Enter Selling Price")){
        //   IsNumeric("SellingPrice","ErrSellingPrice","Please Enter Numerics Character"); 
      //  }
      //  IsNonEmpty("ProductImage","ErrProductImage","Please Upload Product Image");
       // if(parseFloat($('#ProductPrice').val()) < parseFloat($('#SellingPrice').val())){
         //  ErrorCount++;
          // $('#ErrSellingPrice').html("Selling price Must Less than or Equal to MRP"); 
      //  }
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

<script>
    var loadingGif="<img src='assets/loading.gif' style='width:96px'>";
   function uploadimage(imgid){                                                                                       
        $('#image'+imgid).trigger("click");
    } 
   function image1_close() {
        $('#ProductImage').val("");
        $('#div_PI').html('<img onclick="uploadimage(\'1\')" id="src_image1" src="assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
        $('#div_PI').css({"border":"1px solid red"});
        $('#ErrProductImage').html("Please Upload Image");
    }
    
    function image1_onchage() {
        $('#div_PI').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image1')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: '../upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){
        
                if (response!="error") {
                    $('#ProductImage').val(response.trim());
                        $('#div_PI').html("<div><img src='<?php echo "../uploads/";?>"+response.trim()+"' style='width: 64px;margin-top: 5px;'></div>");
                      //  $('#div_PI').css({"border":"1px solid #ccc"});
                        $('#ErrProductImage').html("");
                    } else {
                        $('#ProductImage').val("");
                        $('#ErrProductImage').val("Error Upload File");
                    }
                }, 
            }); 
    }
<?php if($_GET['fr']=="sc" || $_GET['fr']=="c"){ ?>
  $(document).ready(function () {
        getSubCategory('<?php echo $SubCategorys[0]['CategoryID'];?>','<?php echo $SubCategorys[0]['SubCategoryID'];?>');
});  
<?php } ?>
    </script>  
        