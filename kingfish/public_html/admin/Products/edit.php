<?php
include_once("header.php");
include_once("LeftMenu.php"); 
$data= $mysql->Select("select * from _tbl_products where md5(ProductID)='".$_GET['id']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            $dupemail = $mysql->select("select * from _tbl_products where ProductName='".$_POST['ProductName']."' and CategoryID='".$_POST['Category']."' and ProductID<>".$data[0]['ProductID']."'");
            if(sizeof($dupemail)>0){
                $ErrProductName ="Product Name Already Exist in this Category";
                $ErrorCount++;
            }
            
            if($ErrorCount==0){
            if(strlen($_FILES["uploadimage1"]["name"])>0) {                                                 
                    $target_dir = "../uploads/";
                    $file =  $_FILES["uploadimage1"]["name"];
                    $target_file = $target_dir .$file;

                    if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
                    } 
            } else {
                   $file = $data[0]['filepath1'];
            } 
                
                
                $category = $mysql->select("select * from _tbl_product_categories where CategoryID=".$_POST['Category']."'");
                $mysql->execute("update _tbl_products set `CategoryID`      ='".$_POST['Category']."',
                                                          `CategoryName`    ='".$category[0]['CategoryName']."',
                                                          `ProductName`     ='".$_POST['ProductName']."',
                                                          `ProductPrice`    ='".$_POST['ProductPrice']."',
                                                          `IsPublish`       ='".$_POST['IsPublish']."',
                                                          `filepath1`       ='".$file."',
                                                          `Description`     ='".str_replace("'","\\'",$_POST['Description'])."' where ProductID='".$data[0]['ProductID']."'");
           
                $successmessage ="Updated Successfully";
        }else {
             $ErrCurrentPassword ="Error updating ";
        }
    }
    $data= $mysql->Select("select * from _tbl_products where md5(ProductID)='".$_GET['id']."'");
?>
<script>
$(document).ready(function () {
    $("#ProductName").blur(function () {
        //if(IsNonEmpty("ProductName","ErrProductName","Please Enter Product Name")){
          // IsAlphaNumeric("ProductName","ErrProductName","Please Enter Alpha Numerics Character"); 
        //}
    });
    $("#ProductPrice").blur(function () {
      //  if(IsNonEmpty("ProductPrice","ErrProductPrice","Please Enter Product Price")){
     //      IsNumeric("ProductPrice","ErrProductPrice","Please Enter Numerics Character"); 
      //  }
    });
    $("#Description").blur(function () {
     //   IsNonEmpty("Description","ErrDescription","Please Enter Product Description");
    });
});
function SubmitProduct() {
        ErrorCount=0;    
        $('#ErrProductName').html("");
        $('#ErrProductPrice').html("");
        $('#ErrDescription').html("");
        
        //if(IsNonEmpty("ProductName","ErrProductName","Please Enter Product Name")){
           //IsAlphaNumeric("ProductName","ErrProductName","Please Enter Alpha Numerics Character"); 
        //}
        //if(IsNonEmpty("ProductPrice","ErrProductPrice","Please Enter Product Price")){
          // IsNumeric("ProductPrice","ErrProductPrice","Please Enter Numerics Character"); 
       // }
      //  IsNonEmpty("Description","ErrDescription","Please Enter Product Description");   
             //   return (ErrorCount==0) ? true : false;
       //  }
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
                                    <div class="card-title">Edit Product</div>
                                </div>
                                <form method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $_GET['id'];?>" id="ProductID" Name="ProductID">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Category</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">                
                                                <select class="form-control" id="Category" name="Category">   
                                                <?php $categories = $mysql->select("select * from _tbl_product_categories");?>
                                                <?php foreach($categories as $category){ ?>
                                                    <option value="<?php echo $category['CategoryID'];?>" <?php echo (isset($_POST[ 'Category'])) ? (($_POST[ 'Category']==$category['CategoryID']) ? " selected='selected' " : "") : (($data[0]['CategoryID']==$category['CategoryID']) ? " selected='selected' " : "");?>><?php echo $category['CategoryName'];?></option>
                                                <?php }?>
                                                </select>
                                                <span class="errorstring" id="ErrCategory"><?php echo isset($ErrCategory)? $ErrCategory : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Name</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="ProductName" name="ProductName" placeholder="Enter Product Name" value="<?php echo (isset($_POST['ProductName']) ? $_POST['ProductName'] : $data[0]['ProductName']);?>">
                                                <span class="errorstring" id="ErrProductName"><?php echo isset($ErrProductName)? $ErrProductName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Price</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="ProductPrice" name="ProductPrice" placeholder="Enter Product Price" value="<?php echo (isset($_POST['ProductPrice']) ? $_POST['ProductPrice'] :$data[0]['ProductPrice']);?>">
                                                <span class="errorstring" id="ErrProductPrice"><?php echo isset($ErrProductPrice)? $ErrProductPrice : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Image</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <?php if(strlen($data[0]['filepath1'])>1) { ?>
                                                    <img src="https://kingfish.in/<?php echo "uploads/".$data[0]['filepath1'];?>" style='width: 64px;height:64px;margin-top: 5px;'>
                                                <?php }?>                              
                                                    <input type="file" name="uploadimage1" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                                <div class="errorstring" id="Erruploadimage1"><?php echo isset($Erruploadimage1)? $Erruploadimage1 : "";?></div>
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
                                                <?php if($_GET['f']=="1"){ ?>
                                                    <a href="dashboard.php?action=Products/list" class="btn btn-warning btn-border">Back</a>
                                                <?php }else { ?>
                                                    <a href="dashboard.php?action=Products/viewproducts&id=<?php echo md5($data[0]['CategoryID']);?>" class="btn btn-warning btn-border">Back</a>
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
           <div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
      </div>
    </div>
  </div>
</div>
<script>
   var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://kingfish.in/admin/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 
 function CallConfirmation(){
    var txt = ' <div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to delete image?'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="DeleteImage()" >Yes, Confirm</button>'
                 +'</div> ';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
 
 function DeleteImage() {
    $("#confrimation_text").html(loading);
    $.post( "https://kingfish.in/admin/webservice.php?action=DeleteProductImage",  $( "#addProduct" ).serialize(),function( data ) {
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='https://kingfish.in/admin/assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-danger' data-dismiss='modal'>Cancel</button></div>"; 
        } else {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='https://kingfish.in/admin/assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Products/edit&id="+obj.productid+"' class='btn btn-outline-danger'>Continue</a></div>"; 
            $('#ConfirmationPopup').modal("show");
        }
        $("#confrimation_text").html(html);
        
    });
}
</script>

        <?php include_once("footer.php");?>