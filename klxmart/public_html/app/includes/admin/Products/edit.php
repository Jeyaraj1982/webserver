<?php
$data=$mysql->select("select * from _tbl_products where md5(ProductID)='".$_GET['id']."'");  
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            $dupemail = $mysql->select("select * from _tbl_products where ProductName='".$_POST['ProductName']."' and ProductID<>'".$data[0]['ProductID']."' ");
            if(sizeof($dupemail)>0){
                $ErrProductName ="Product Name Already Exist";
                $ErrorCount++;
            }
            if($ErrorCount==0){
              
               $Brand = $mysql->select("select * from _tbl_brands where BrandID='".$_POST['BrandName']."'"); 
               $Category = $mysql->select("select * from _tbl_category where CategoryID='".$_POST['Category']."'");
               $SubCategory = $mysql->select("select * from _tbl_sub_category where SubCategoryID='".$_POST['SubCategory']."'");
                
              $mysql->execute("update _tbl_products set `CategoryID`        ='".$Category[0]['CategoryID']."',
                                                        `CategoryName`      ='".$Category[0]['CategoryName']."',
                                                        `SubCategoryID`     ='".$SubCategory[0]['SubCategoryID']."',
                                                        `SubCategoryName`   ='".$SubCategory[0]['SubCategoryName']."',
                                                        `BrandID`           ='".$Brand[0]['BrandID']."',
                                                        `BrandName`         ='".$Brand[0]['BrandName']."',
                                                        `ProductName`       ='".$_POST['ProductName']."',
                                                        `ProductPrice`      ='".$_POST['ProductPrice']."',
                                                        `ProductImage`      ='".$_POST['ProductImage']."',
                                                        `Commission`        ='".$_POST['Commission']."',
                                                        `CommissionL2`      ='".$_POST['CommissionL2']."',
                                                        `CommissionL3`      ='".$_POST['CommissionL3']."',
                                                        `SellingPrice`      ='".$_POST['SellingPrice']."',
                                                        `StockAvailable`    ='".$_POST['StockAvailable']."',
                                                        `IsActive`          ='".$_POST['IsActive']."',
                                                        `ShortDescription`  ='".str_replace("'","\\'",$_POST['ShortDescription'])."',
                                                        `DetailDescription` ='".str_replace("'","\\'",$_POST['DetailDescription'])."' where ProductID='".$data[0]['ProductID']."'");
               
                ?>
                <script>
                    $(document).ready(function() {
                        swal("Product Updated Successfully", {
                            icon:"success"
                        })
                    });
                    </script>
       <?php     }
        
    }
  $data=$mysql->select("select * from _tbl_products where md5(ProductID)='".$_GET['id']."'");  
?>
<script>
function getSubCategory(CategoryID,SubCategoryID) {
        $.ajax({url:'../webservice.php?action=getSubCategory&CategoryID='+CategoryID+'&SubCategoryID='+SubCategoryID,success:function(data){
            $('#div_subcategory').html(data);
            $('#ErrSubCategory').html('');
        }});
    }
$(document).ready(function () {
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
    $("#ProductImage").blur(function () {
        IsNonEmpty("ProductImage","ErrProductImage","Please Upload Product Image");
    });
    $("#ErrSellingPrice").blur(function () {
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
                                    <div class="card-title">Edit Product</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                   <input type="hidden" name="ProductImage" id="ProductImage" value="<?php echo (isset($_POST['ProductImage']) ? $_POST['ProductImage'] :$data[0]['ProductImage']);?>">
                                   <input type="file" onchange="image1_onchage()" name="image1" id="image1" style="display: none;"> 
                                   <input type="file" id='files' name="files[]" multiple style="display:none">
                                     
                                     <input type="hidden" name="totalfiles" id="totalfiles">
                                     <input type="hidden" name="ProductID" id="ProductID" value="<?php echo $data[0]['ProductID'];?>">
                                    <div class="card-body">
                                       <div class="form-group row">
                                            <div class="col-sm-4" style="text-align: center;">
                                                <div id="div_PI">
                                                    <div><img src='../uploads/<?php echo $data[0]['ProductImage'];?>' style='width: 64px;margin-top: 5px;'><br><span onclick='image1_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>
                                                </div> 
                                                <button type="button" onclick="uploadimage('1')" class="btn btn-primary btn-sm" style="padding: 0px 10px 0px 10px;">Browse</button>
                                                <div class="errorstring" id="ErrProductImage"><?php echo isset($ErrProductImage)? $ErrProductImage : "";?></div>  
                                            </div>
                                            <div class="col-sm-8">
												<div class="form-group form-show-validation row">
                                                    <label for="name">Category Name<span style="color:red">*</span></label>
                                                    <select class="form-control" name="Category" id="Category" onchange="getSubCategory($(this).val())">
                                                        <option value="0" <?php echo ($_POST['Category']=="0") ? " selected='selected' " : "";?>>Select Category Name</option>
                                                        <?php $Categorys = $mysql->select("select * from _tbl_category where IsActive='1' order by CategoryName");?>
                                                        <?php foreach($Categorys as $Category) { ?>
                                                              <option value="<?php echo $Category['CategoryID'];?>" <?php echo (isset($_POST[ 'Category'])) ? (($_POST[ 'Category']==$Category['CategoryID']) ? " selected='selected' " : "") : (($data[0]['CategoryID']==$Category['CategoryID']) ? " selected='selected' " : "");?>><?php echo $Category['CategoryName'];?></option>
														<?php } ?>
                                                    </select>
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
                                                        <option value="0" <?php echo (isset($_POST[ 'BrandName'])) ? (($_POST[ 'BrandName']=="0") ? " selected='selected' " : "") : (($data[0]['BrandID']=="0") ? " selected='selected' " : "");?>>Select Brand Name</option>
                                                        <?php $BrandNames = $mysql->select("select * from _tbl_brands where IsActive='1' order by BrandName");?>
                                                        <?php foreach($BrandNames as $BrandName) { ?>
                                                              <option value="<?php echo $BrandName['BrandID'];?>" <?php echo (isset($_POST[ 'BrandName'])) ? (($_POST[ 'BrandName']==$BrandName['BrandID']) ? " selected='selected' " : "") : (($data[0]['BrandID']==$BrandName['BrandID']) ? " selected='selected' " : "");?>><?php echo $BrandName['BrandName'];?></option>
                                                        
                                                        <?php } ?>
                                                    </select>
                                                    <span class="errorstring" id="ErrBrandName"><?php echo isset($ErrBrandName)? $ErrBrandName : "";?></span>
                                                </div>
                                                <div class="form-group form-show-validation row">
                                                    <label for="name">Product Name<span style="color:red">*</span></label>
                                                    <input type="text" class="form-control" id="ProductName" name="ProductName" placeholder="Enter Product Name" value="<?php echo (isset($_POST['ProductName']) ? $_POST['ProductName'] :$data[0]['ProductName']);?>">
                                                    <span class="errorstring" id="ErrProductName"><?php echo isset($ErrProductName)? $ErrProductName : "";?></span>
                                                </div> 
                                                <div class="form-group form-show-validation row">
                                                    <label for="name">Short Description</label>
                                                    <textarea class="form-control" maxlength="300" name="ShortDescription" id="ShortDescription"><?php echo (isset($_POST['ShortDescription']) ? $_POST['ShortDescription'] : $data[0]['ShortDescription']);?></textarea>
                                                    <label class="col-form-label" style="padding-top:0px;font-weight: normal;">Max 300 characters&nbsp;&nbsp;|&nbsp;&nbsp;<span id="textarea_feedback"></span></label>
                                                    <span class="errorstring" id="ErrProductName"><?php echo isset($ErrProductName)? $ErrProductName : "";?></span>
                                                </div> 
                                                <div class="form-group form-show-validation row">
                                                    <div class="col-sm-6" style="padding-left: 0px;">
                                                        <label for="name">MRP (Rs)<span style="color:red">*</span></label>
                                                        <input type="text" class="form-control" id="ProductPrice" name="ProductPrice" placeholder="Enter Product Price" value="<?php echo (isset($_POST['ProductPrice']) ? $_POST['ProductPrice'] :$data[0]['ProductPrice']);?>">
                                                        <span class="errorstring" id="ErrProductPrice"><?php echo isset($ErrProductPrice)? $ErrProductPrice : "";?></span>    
                                                    </div>
                                                    <div class="col-sm-6" style="padding-left: 0px;padding-right: 0px;">
                                                        <label for="name">Selling Price (Rs)<span style="color:red">*</span></label>
                                                        <input type="text" class="form-control" id="SellingPrice" name="SellingPrice" placeholder="Enter Selling Price" value="<?php echo (isset($_POST['SellingPrice']) ? $_POST['SellingPrice'] :$data[0]['SellingPrice']);?>">
                                                        <span class="errorstring" id="ErrSellingPrice"><?php echo isset($ErrSellingPrice)? $ErrSellingPrice : "";?></span>
                                                    </div>
                                               </div> 
                                               <div class="form-group form-show-validation row">
                                                    <div class="col-sm-6" style="padding-left: 0px;">
                                                        <label for="name">Stock Available<span style="color:red">*</span></label>
                                                        <select class="form-control" name="StockAvailable" id="StockAvailable">
                                                            <option value="Yes" <?php echo (isset($_POST[ 'StockAvailable'])) ? (($_POST[ 'StockAvailable']=="Yes") ? " selected='selected' " : "") : (($data[0]['StockAvailable']=="Yes") ? " selected='selected' " : "");?>>Yes</option>
                                                            <option value="No" <?php echo (isset($_POST[ 'StockAvailable'])) ? (($_POST[ 'StockAvailable']=="No") ? " selected='selected' " : "") : (($data[0]['StockAvailable']=="No") ? " selected='selected' " : "");?>>No</option>
                                                        </select>
                                                        <span class="errorstring" id="ErrStockAvailable"><?php echo isset($ErrStockAvailable)? $ErrStockAvailable : "";?></span>
                                                    </div>
                                                    <div class="col-sm-6" style="padding-left: 0px;">
                                                        <label for="name">Is Active<span style="color:red">*</span></label>
                                                        <select class="form-control" name="IsActive" id="IsActive">
                                                            <option value="1" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="1") ? " selected='selected' " : "") : (($data[0]['IsActive']=="1") ? " selected='selected' " : "");?>>Yes</option>
                                                            <option value="0" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="0") ? " selected='selected' " : "") : (($data[0]['IsActive']=="0") ? " selected='selected' " : "");?>>No</option>
                                                        </select>
                                                        <span class="errorstring" id="ErrIsActive"><?php echo isset($ErrIsActive)? $ErrIsActive : "";?></span>
                                                    </div> 
                                                    
                                                    <div class="col-sm-12" style="padding-left: 0px;">
                                                        <label for="name">Refferal Commission (Level; 1)<span style="color:red">*</span></label>
                                                        <input type="text" class="form-control" id="Commission" name="Commission" placeholder="Enter Commission" value="<?php echo (isset($_POST['Commission']) ? $_POST['Commission'] : $data[0]['Commission']);?>">
                                                        <span class="errorstring" id="ErrCommission"><?php echo isset($ErrCommission)? $ErrCommission : "";?></span>
                                                    </div>  
                                                     <div class="col-sm-12" style="padding-left: 0px;">
                                                        <label for="name">Refferal Commission  (Level; 2)<span style="color:red">*</span></label>
                                                        <input type="text" class="form-control" id="CommissionL2" name="CommissionL2" placeholder="Enter Commission Level 2" value="<?php echo (isset($_POST['CommissionL2']) ? $_POST['CommissionL2'] : $data[0]['CommissionL2']);?>">
                                                        <span class="errorstring" id="ErrCommissionL2"><?php echo isset($ErrCommissionL2)? $ErrCommissionL2 : "";?></span>
                                                    </div>
                                                     <div class="col-sm-12" style="padding-left: 0px;">
                                                        <label for="name">Refferal Commission  (Level; 3)<span style="color:red">*</span></label>
                                                        <input type="text" class="form-control" id="Commission" name="CommissionL3" placeholder="Enter Commission Level 3" value="<?php echo (isset($_POST['CommissionL3']) ? $_POST['CommissionL3'] : $data[0]['CommissionL3']);?>">
                                                        <span class="errorstring" id="ErrCommissionL3"><?php echo isset($ErrCommissionL3)? $ErrCommissionL3 : "";?></span>
                                                    </div> 
                                               </div>  
                                            </div>
                                       </div>
                                      
                                       <div class="form-group form-show-validation row">
                                            <label for="name">Detail Description</label>
                                            <textarea class="form-control" rows="5" id="DetailDescription" name="DetailDescription" placeholder="Enter Detail Description"><?php echo (isset($_POST['DetailDescription']) ? $_POST['DetailDescription'] :$data[0]['DetailDescription']);?></textarea>
                                            <span class="errorstring" id="ErrDetailDescription"><?php echo isset($ErrDetailDescription)? $ErrDetailDescription : "";?></span>
                                       </div>
                                       
                                         <div class="form-group form-show-validation row">
                                            <div class="col-sm-12" style="text-align: right;">
                                                 <button type="button" class="btn btn-primary btn-sm" onclick="$('#files').trigger('click');"><i class="fas fa-cloud-upload-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Add Thumb</button>
                                                 <div id="file_upload_progress" style="color:red"></div>
                                                 <div id="file_upload_error" style="color:red"></div>
                                                 <div style="border: 1px solid #ebedf2;padding:10px;height:250px" id="total_div">
                                                 <?php $additionals= $mysql->select("select * from _tbl_product_additional_image where ProductID='".$data[0]['ProductID']."'");
                                                       foreach($additionals as $additional){ ?> 
                                                         <?php $i=1; ?>
                                                                <div id="div_<?php echo $additional['ProductImageID'];?>" style="float: left;margin-right:10px;margin-bottom:25px;height:113px;width:70px;text-align: center;border: 1px solid #ccc;border-radius: 5px;">
                                                                    <div>
                                                                        <img src='<?php echo "../uploads/".$additional['ProductImage'];?>' style='width: 60px;height:80px;;margin-top: 5px;'>
                                                                        <br><span onclick="CallConfirmDeleteImage('<?php echo $additional['ProductImageID'];?>',<?php echo $additional['ProductImageID'];?>)" class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span>
                                                                    </div>
                                                                </div>     
                                                         <?php $i++; ?>    
                                                       <?php } ?>    
                                                 </div> 
                                            </div>               
                                        </div>
                                        <div class="form-group">
                                        <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                    </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Update Product</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Update Product</button>
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
        $('#ErrProductPrice').html("");
        $('#ErrSellingPrice').html("");
        $('#ErrProductImage').html("");
        
        
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
          // Alphanumericwithdash("ProductName","ErrProductName","Please Enter Alpha Numerics Character"); 
        }
        if(IsNonEmpty("ProductPrice","ErrProductPrice","Please Enter MRP")){
           IsNumeric("ProductPrice","ErrProductPrice","Please Enter Numerics Character"); 
        }
        if(IsNonEmpty("SellingPrice","ErrSellingPrice","Please Enter Selling Price")){
           IsNumeric("SellingPrice","ErrSellingPrice","Please Enter Numerics Character"); 
        }
        IsNonEmpty("ProductImage","ErrProductImage","Please Upload Product Image");
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
                                +'Are you sure want to update produt?<br>'
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
    
    
   var img_count=0;
   var uploaded_count=0;
   var img_path = '<?php echo "../uploads/";?>';
   
   function random_string() {
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < 6; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}


   $(document).ready(function() {
       
       $('#files').change(function() {
           $('#file_upload_progress').html();
           $('#file_upload_error').html();
           var form_data = new FormData();
           var p="";
           var error_txt="";
           var totalfiles = document.getElementById('files').files.length;
            
             
         /*  if ((uploaded_count+totalfiles)>6) {
                $('#file_upload_error').html("Maximum allowed 6 images"); 
                //alert("Maximum allowed 6 images"); 
                return true;
           }   */
               
           var divs = [];
           for (var index = 0; index < (totalfiles); index++) {
               
               form_data.append("files[]", document.getElementById('files').files[index]);
               
               $('#file_upload_error').html(document.getElementById('files').files[index]);
               
               var rnd = random_string();
               divs.push(rnd);
               var t = $('#total_div').html();
               var imgtag='<div id="div_'+rnd+'" style="float: left;margin-right:10px;margin-bottom:25px;height:113px;width:70px;text-align: center;border: 1px solid #ccc;border-radius: 5px;">' + loadingGif + '</div>'; 
               $('#total_div').html(t+imgtag);
           }
           
            if (uploaded_count==0) {          
            } else {
            }
            // AJAX request
            
            $.ajax({                                     
                url: '../ajaxfile.php?ProductID=<?php echo $data[0]['ProductID'];?>',
                   type: 'post',
                   xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        $("#file_upload_error").html(percentComplete+'%');
                        
                    }
                }, false);
                return xhr;
            },
            beforeSend: function(){
                $('#file_upload_progress').html('-');
            },
             error:function(){
                $('#file_upload_progress').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
            },
                   data: form_data,                
                   dataType: 'json',
                   contentType: false,                                            
                   processData: false,
                   success: function (response) {
                   $('#files').val("");

                   for(var index = 0; index < response.length; index++) {
                       if (response[index]['error']==0) {   
                        var src = response[index]['filename'];
                        var ProductImageID = response[index]['ProductImageID'];
                              var res_imgage= '<div><img src="../uploads/'+src+'" style="width: 60px;height:80px;margin-top: 5px;">'
                                            + '<br><span onclick="CallConfirmDeleteImage(\''+ProductImageID+'\',\''+divs[index]+'\')" class="btn btn-danger btn-sm" style="padding: 0px 10px;font-size: 10px;">Delete</span></div>';
                                        
                                
                            $('#div_'+divs[index]).html(res_imgage);
                       } else {
                            $('#uploadimage'+(uploaded_count+1)).val("");
                            $('#img'+uploaded_count).html("<div style='font-size:10px;color:red;text-align:center'>"+response[index]['message']+"</div>");
                            uploaded_count++;  
                       }
                    }      
                  $('#totalfiles').val(uploaded_count);                                    
                }
            });
        });
    });                        
    function image_close(id) {
        $('#uploadimage'+id).val("");
        $('#div_'+id).html("");
    }
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
                        alert("error");
                    }
                }, 
            }); 
    }
function CallConfirmDeleteImage(ProductImageID,divid){
    var text = '<form action="" method="POST" id="DeleteProductImageFrm'+ProductImageID+'">'
                    +'<input type="hidden" value="'+ProductImageID+'" id="ProductImageID" Name="ProductImageID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete this image?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteProductImage(\''+ProductImageID+'\',\''+divid+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                                                               
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteProductImage(ProductImageID,divid) {
     var param = $( "#DeleteProductImageFrm"+ProductImageID).serialize();
    $("#confrimation_text").html(loadingGif);
    $.post( "../webservice.php?action=DeleteProductImage",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            $('#div_'+divid).hide();
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a data-dismiss='modal' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
    });
}    
$(document).ready(function () {
		getSubCategory('<?php echo $data[0]['CategoryID'];?>','<?php echo $data[0]['SubCategoryID'];?>');
});
    </script>  
