<?php
include_once("header.php");
include_once("LeftMenu.php"); 
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            $dupemail = $mysql->select("select * from _tbl_sales_products where ProductName='".$_POST['ProductName']."'");
            if(sizeof($dupemail)>0){
                $ErrProductName ="Product Name Already Exist";
                $ErrorCount++;
            }
            
            if($ErrorCount==0){
                
             //   $target_dir = "../uploads/";
             //   $file =  $_FILES["uploadimage1"]["name"];
             //   $target_file = $target_dir .$file;

            // if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
                 // echo "<script>alert('a');</script>";
                  $random = rand(100,999);
                $ProductCode ="PRCT00".$random;
                 
                 $unitm = $mysql->select("select * from _tbl_units where id='".$_POST['ProductQty']."'");
               
                        $id = $mysql->insert("_tbl_sales_products",array("ProductCode"          => $ProductCode,
                                                                         "BarCode"              => $_POST['BarCode'],
                                                                         "ProductName"          => $_POST['ProductName'],
                                                                         "ProductNameTamil"     => $_POST['ProductNameTamil'],
                                                                         "ProductUnitID"        => $_POST['ProductQty'],
                                                                         "ProductUnitName"      => $unitm[0]['unitname'],
                                                                         "ProductUnitFullName"  => $unitm[0]['unitfullname'],
                                                                         "ProductPrice"         => $_POST['ProductPrice'],
                                                                         "Description"          => str_replace("'","\\'",$_POST['Description']),
                                                                         "AddedOn"              => date("Y-m-d H:i:s")));
            if(sizeof($id)>0){
                unset($_POST);
                if($_GET['fr']=="invoice"){
                    $link="Invoice/create";
                }else {
                    $link="Products/list&status=All";
                }
                ?>
                <script>
                 $(document).ready(function() {
                    successpopup('<?php echo $link;?>');
                 }); 
            </script>
       <?php     }
       // }else {
       //      $successmessage ="Error Add Product";
      //  }
        
              } else {     ?>
                <script>
             $(document).ready(function() {
                swal("", "Error Add Product", "warning")
             });
            </script>
           <?php   }
                                         
                
    }
    
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
    });*/
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
        var ids = ["ProductNameTamil","Description"];
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
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">BarCode</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="BarCode" name="BarCode" placeholder="Enter BarCode" value="<?php echo (isset($_POST['BarCode']) ? $_POST['BarCode'] :"");?>">
                                                <span class="errorstring" id="ErrBarCode"><?php echo isset($ErrBarCode)? $ErrBarCode : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Name (In English)<span style="color:red">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="ProductName" name="ProductName" placeholder="Enter Product Name In English" value="<?php echo (isset($_POST['ProductName']) ? $_POST['ProductName'] :"");?>">
                                                <span class="errorstring" id="ErrProductName"><?php echo isset($ErrProductName)? $ErrProductName : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Product Name (In Tamil)</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="ProductNameTamil" name="ProductNameTamil" placeholder="Enter Product Name In Tamil" value="<?php echo (isset($_POST['ProductNameTamil']) ? $_POST['ProductNameTamil'] :"");?>">
                                                <span class="errorstring" id="ErrProductNameTamil"><?php echo isset($ErrProductNameTamil)? $ErrProductNameTamil : "";?></span>
                                            </div>                                                     
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Unit of Measurement<span style="color:red">*</span></label>                   
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select name="ProductQty" id="ProductQty" class="form-control">
                                                    <option value="0" <?php echo ($_POST['ProductQty']=="0") ? " selected='selected' " : "";?>>Select Unit of Measurement</option>
                                                    <?php $units = $mysql->select("select * from _tbl_units"); foreach($units as $unit){ ?>
                                                    <option value="<?php echo $unit['id'];?>" <?php echo ($_POST['ProductQty']==$unit['id']) ? " selected='selected' " : "";?>> <?php echo $unit['unitname'];?></option>
                                                    <?php } ?>
                                                </select>  
                                                <span class="errorstring" id="ErrProductQty"><?php echo isset($ErrProductQty)? $ErrProductQty : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Price Per Unit<span style="color:red">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="ProductPrice" name="ProductPrice" placeholder="Enter Product Price" value="<?php echo (isset($_POST['ProductPrice']) ? $_POST['ProductPrice'] :"");?>">
                                                <span class="errorstring" id="ErrProductPrice"><?php echo isset($ErrProductPrice)? $ErrProductPrice : "";?></span>
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
function CallConfirmation(){
    ErrorCount=0;    
        $('#ErrProductName').html("");
        //$('#ErrProductNameTamil').html("");
        $('#ErrProductQty').html("");
        $('#ErrProductPrice').html("");
        $('#ErrDescription').html("");
        
        if(IsNonEmpty("ProductName","ErrProductName","Please Enter Product Name In English")){
           IsAlphaNumeric("ProductName","ErrProductName","Please Enter Alpha Numerics Character"); 
        }
     //   IsNonEmpty("ProductNameTamil","ErrProductNameTamil","Please Enter Product Name In Tamil");
        
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
        if(ErrorCount==0) {
            var txt = '<div class="form-group row">'
                            +'<div class="col-sm-12" style="text-align:center">'
                                +'CONFIRMATION'
                            +'</div>'
                       +'</div>'
                       +'<div class="form-group row">'
                            +'<div class="col-sm-12" style="text-align:left">'
                            +'Are you sure want to add produt?'
                            +'</div>'
                        +'</div>'
                        +'<div style="padding:20px;text-align:center">'
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
function successpopup(link){
    var txt = '<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'<img src="http://japps.online/demo/admin/assets/tick.jpg" style="width:30%"><br><span>Product Added Successfully</span>'
                    +'</div>'
               +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-success" onclick="location.href=\'dashboard.php?action='+link+'\'" >Countinue</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
</script>
        <?php include_once("footer.php");?>