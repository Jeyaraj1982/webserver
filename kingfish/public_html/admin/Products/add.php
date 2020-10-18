<?php
include_once("header.php");
include_once("LeftMenu.php"); 
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            $dupemail = $mysql->select("select * from _tbl_products where ProductName='".$_POST['ProductName']."' and CategoryID='".$_POST['Category']."'");
            if(sizeof($dupemail)>0){
                $ErrProductName ="Product Name Already Exist in this Category";
                $ErrorCount++;
            }
            
            if($ErrorCount==0){
                
                $target_dir = "../uploads/";
                $file =  $_FILES["uploadimage1"]["name"];
                $target_file = $target_dir .$file;

              if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
                 // echo "<script>alert('a');</script>";
               
                
                $category = $mysql->select("select * from _tbl_product_categories where CategoryID=".$_POST['Category']."'");
                        $id = $mysql->insert("_tbl_products",array("CategoryID"      => $_POST['Category'],
                                                                   "CategoryName"    => $category[0]['CategoryName'],
                                                                   "ProductName"     => $_POST['ProductName'],
                                                                   "ProductPrice"    => $_POST['ProductPrice'],
                                                                   "Description"     => str_replace("'","\\'",$_POST['Description']),
                                                                   "filepath1"       => $file,
                                                                   "AddedOn"         => date("Y-m-d H:i:s")));
            if(sizeof($id)>0){
                unset($_POST);
                $successmessage ="Product Added Successfully".$target_path;
            }
        }else {
             $ErrCurrentPassword ="Error Add Product";
        }
        
              } else {
                $ErrCurrentPassword =  "Sorry, there was an error uploading your file.";
              }
                
                
    }
    
?>
<script>
$(document).ready(function () {
    $("#Category").blur(function () {
       var category = $('#Category').val().trim();
        if (category=="0") {
            $('#ErrCategory').html("Please Select Category");   
        }else{
            $('#ErrCategory').html("");
        }
    });
    $("#ProductName").blur(function () {
      //  if(IsNonEmpty("ProductName","ErrProductName","Please Enter Product Name")){
         //  IsAlphaNumeric("ProductName","ErrProductName","Please Enter Alpha Numerics Character"); 
       // }
    });
    $("#ProductPrice").blur(function () {
      //  if(IsNonEmpty("ProductPrice","ErrProductPrice","Please Enter Product Price")){
         //  IsNumeric("ProductPrice","ErrProductPrice","Please Enter Numerics Character"); 
       // }
    });
   // $("#Description").blur(function () {
     //   IsNonEmpty("Description","ErrDescription","Please Enter Product Description");
   // });
   
   
   
   
});
function SubmitProduct() {
        ErrorCount=0;    
        $('#ErrCategory').html("");
        $('#ErrProductName').html("");
        $('#ErrProductPrice').html("");
        $('#ErrDescription').html("");
        
        //if(IsNonEmpty("ProductName","ErrProductName","Please Enter Product Name")){
           //IsAlphaNumeric("ProductName","ErrProductName","Please Enter Alpha Numerics Character"); 
        //}
       // if(IsNonEmpty("ProductPrice","ErrProductPrice","Please Enter Product Price")){
           //IsNumeric("ProductPrice","ErrProductPrice","Please Enter Numerics Character"); 
        //}
        //IsNonEmpty("Description","ErrDescription","Please Enter Product Description");   
        var category = $('#Category').val().trim();
        if (category=="0") {                                                                                             
            $('#ErrCategory').html("Please Select Category");   
            ErrorCount++;      
        }else{
            $('#ErrCategory').html("");
        }
                return (ErrorCount==0) ? true : false;
         }
</script>
 <script type="text/javascript" src="https://stat.dinamalar.com/new/js/jsapi_v3.js"></script>
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
        var ids = ["ProductName","Description"];
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
                                    <div class="card-title">Add Product</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Category</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" id="Category" name="Category">   
                                                    <option value="0" <?php echo ($_POST['Category']=="0") ? " selected='selected' " : "";?>>Select Category</option>                                                                                     
                                                <?php $categories = $mysql->select("select * from _tbl_product_categories");?>
                                                <?php foreach($categories as $category){ ?>
                                                    <option value="<?php echo $category['CategoryID'];?>" <?php echo ($_POST['Category']==$category['CategoryID']) ? " selected='selected' " : "";?>> <?php echo $category['CategoryName'];?></option>
                                                <?php }?>
                                                </select>
                                                <span class="errorstring" id="ErrCategory"><?php echo isset($ErrCategory)? $ErrCategory : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Name</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="ProductName" name="ProductName" placeholder="Enter Product Name" value="<?php echo (isset($_POST['ProductName']) ? $_POST['ProductName'] :"");?>">
                                                <span class="errorstring" id="ErrProductName"><?php echo isset($ErrProductName)? $ErrProductName : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Price</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="ProductPrice" name="ProductPrice" placeholder="Enter Product Price" value="<?php echo (isset($_POST['ProductPrice']) ? $_POST['ProductPrice'] :"");?>">
                                                <span class="errorstring" id="ErrProductPrice"><?php echo isset($ErrProductPrice)? $ErrProductPrice : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Image</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                                <!--<input type="hidden" name="uploadimage1" id="uploadimage1">
                                                <input type="file" onchange="image1_onchage()" name="image1" id="image1" style="display: none;"> 
                                                <div id="div_1">
                                                        <img id="src_image1" onclick="uploadimage('1')" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                                                    </div>
                                                    <div class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></div>
                                                <img src='https://www.klx.co.in/assets/loading.gif' style='width:0px'>   -->
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Description</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <textarea class="form-control" id="Description" name="Description" placeholder="Enter Product Description"><?php echo (isset($_POST['Description']) ? $_POST['Description'] :"");?></textarea>
                                                <span class="errorstring" id="ErrDescription"><?php echo isset($ErrDescription)? $ErrDescription : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                    </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Add Product">
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <!--<string name="image_chooser" style="display:none">File Chooser</string>-->
<script>
  /*  var loadingGif="<img src='https://www.klx.co.in/assets/loading.gif' style='width:96px'>";
    function uploadimage(imgid){                                                                                       
        $('#image'+imgid).trigger("click");
    }
    function image1_close() {
        $('#uploadimage1').val("");
        $('#div_1').html('<img onclick="uploadimage(\'1\')" id="src_image1" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
        $('#Errimage1').html("Please Upload Image");
    }                                                                                                 
    function image1_onchage() {
        $('#div_1').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image1')[0].files[0];                                                                       
        fd.append('file', files); 
        $.ajax({
            url: 'https://kingfish.in/admin/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){
        
                if (response!="error") {
                    $('#uploadimage1').val(response);
                        $('#div_1').html("<div><img src='https://kingfish.in/admin/<?php echo "uploads/";?>"+response.trim()+"' style='width: 64px;margin-top: 5px;'><br><span onclick='image1_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
                        $('#Errimage1').html("");
                    } else {
                        alert("error");
                    }
                }, 
            }); 
    } */
</script>

        <?php include_once("footer.php");?>