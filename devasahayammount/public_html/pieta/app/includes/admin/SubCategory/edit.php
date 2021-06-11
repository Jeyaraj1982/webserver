<?php
$data=$mysql->select("select * from _tbl_sub_category where md5(SubCategoryID)='".$_GET['id']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            $dupSubCategoryName = $mysql->select("select * from _tbl_category where CategoryName='".$_POST['CategoryName']."' and SubCategoryID<>'".$data[0]['SubCategoryID']."'");
            if(sizeof($dupSubCategoryName)>0){
                $ErrSubCategoryName ="Sub Category Name Already Exist in this Category";
                $ErrorCount++;   ?>
                <script>
                  $(document).ready(function() {
                        swal("<?php echo "Sub Category Name Already Exist in this Category";?>", {
                            icon : "error" 
                        });
                     });
                </script>
           <?php }
            
            if($ErrorCount==0){
                if(strlen($_FILES["uploadimage1"]["name"])>0) {                                                 
                    $target_dir = "../uploads/";
                    $file =  $_FILES["uploadimage1"]["name"];
                    $target_file = $target_dir .$file;
                    if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
                    } 
                } else {
                   $file = $data[0]['Image'];
                } 
                  
                 $Category = $mysql->select("select * from _tbl_category where CategoryID='".$_POST['CategoryName']."'");  
               
                 $mysql->execute("update _tbl_sub_category set `CategoryID`       ='".$Category[0]['CategoryID']."',
                                                               `CategoryName`     ='".$Category[0]['CategoryName']."',
                                                               `SubCategoryName`  ='".$_POST['SubCategoryName']."',
                                                               `Image`            ='".$file."',
                                                               `Description`      ='".str_replace("'","\\'",$_POST['Description'])."',
                                                               `IsActive`         ='".$_POST['IsActive']."' where SubCategoryID='".$data[0]['SubCategoryID']."'");
                 ?>
                    <script>
                    $(document).ready(function() {
                        swal("Sub Category Updated Successfully", {
                            icon:"success"
                        })
                    });
                    </script>
            <?php } 
    }  $data=$mysql->select("select * from _tbl_sub_category where md5(SubCategoryID)='".$_GET['id']."'");
       $pc= $mysql->Select("SELECT COUNT(ProductID) AS cnt FROM _tbl_products where CategoryID='".$data[0]['CategoryID']."' and SubCategoryID='".$data[0]['SubCategoryID']."'"); 
?>
<script>
$(document).ready(function () {
    $("#CategoryName").blur(function () {
        $('#ErrCategoryName').html("");
        if($('#CategoryName').val()=="0"){
           $('#ErrCategoryName').html("Please Select Category Name"); 
        }
    });
    $("#SubCategoryName").blur(function () {
        if(IsNonEmpty("SubCategoryName","ErrSubCategoryName","Please Enter Sub Category Name")){
           Alphanumericwithdash("SubCategoryName","ErrSubCategoryName","Please Enter Alpha Numerics Character"); 
        }
    });
});
</script>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Sub Category</div>
                        </div>
                        <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitSubCategory();" id="addProduct" enctype="multipart/form-data">
                            <input type="hidden" value="<?php echo $pc[0]['cnt'];?>" name="ProductCount" id="ProductCount">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name">Category Name<span style="color:red">*</span></label>
                                    <select class="form-control" name="CategoryName" id="CategoryName">
                                        <option value="0" <?php echo (isset($_POST[ 'CategoryName'])) ? (($_POST[ 'CategoryName']=="0") ? " selected='selected' " : "") : (($data[0]['CategoryID']=="0") ? " selected='selected' " : "");?>>Select Category Name</option>
                                        <?php $CategoryNames = $mysql->select("select * from _tbl_category where IsActive='1'");?>
                                        <?php foreach($CategoryNames as $CategoryName) { ?>
                                              <option value="<?php echo $CategoryName['CategoryID'];?>" <?php echo (isset($_POST[ 'CategoryName'])) ? (($_POST[ 'CategoryName']==$CategoryName['CategoryID']) ? " selected='selected' " : "") : (($data[0]['CategoryID']==$CategoryName['CategoryID']) ? " selected='selected' " : "");?>><?php echo $CategoryName['CategoryName'];?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="errorstring" id="ErrCategoryName"><?php echo isset($ErrCategoryName)? $ErrCategoryName : "";?></span>
                               </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name">Sub Category Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="SubCategoryName" name="SubCategoryName" placeholder="Enter Sub Category Name" value="<?php echo (isset($_POST['SubCategoryName']) ? $_POST['SubCategoryName'] :$data[0]['SubCategoryName']);?>">
                                    <span class="errorstring" id="ErrSubCategoryName"><?php echo isset($ErrSubCategoryName)? $ErrSubCategoryName : "";?></span>
                                </div>
                                <!-- 
                                <div class="form-group form-show-validation row">
                                    <label for="name">Sub Category Image<span class="required-label">*</span></label>
                                    <?php if($data[0]['Image']!=""){ ?>
                                        <br><div class="col-sm-12"><img src='../uploads/<?php echo $data[0]['Image'];?>' style='width: 64px;'></div>
                                    <?php } ?>
                                    <input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                    <span class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></span>
                                </div>
                                -->
                                <div class="form-group form-show-validation row">
                                    <label for="name">Description</label>
                                    <textarea class="form-control" name="Description" id="Description"><?php echo (isset($_POST['Description']) ? $_POST['Description'] : $data[0]['Description']);?></textarea>
                                    <span class="errorstring" id="ErrDescription"><?php echo isset($ErrDescription)? $ErrDescription : "";?></span>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name">Is Active</label>
                                    <select class="form-control" name="IsActive" id="IsActive">
                                        <option value="1" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="1") ? " selected='selected' " : "") : (($data[0]['IsActive']=="1") ? " selected='selected' " : "");?>>Yes</option>
                                        <option value="0" <?php echo (isset($_POST[ 'IsActive'])) ? (($_POST[ 'IsActive']=="0") ? " selected='selected' " : "") : (($data[0]['IsActive']=="0") ? " selected='selected' " : "");?>>No</option>
                                    </select>                                                                                                       
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Update Sub Category</button>&nbsp;
                                        <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Update Sub Category</button>
                                        <?php if($_GET['fr']=="vc"){ ?>
                                             <a href="dashboard.php?action=Category/viewsubcategory&status=All&id=<?php echo md5($data[0]['CategoryID']);?>" class="btn btn-warning btn-border">Back</a>
                                        <?php } else { ?>
                                            <a href="dashboard.php?action=SubCategory/list&status=All" class="btn btn-warning btn-border">Back</a>
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
        $('#ErrCategoryName').html("");
        $('#ErrSubCategoryName').html("");
        
        if($('#CategoryName').val()=="0"){
           $('#ErrCategoryName').html("Please Select Category Name"); 
           ErrorCount++;
        }
        
        if(IsNonEmpty("SubCategoryName","ErrSubCategoryName","Please Enter Sub Category Name")){
           Alphanumericwithdash("SubCategoryName","ErrSubCategoryName","Please Enter Alpha Numerics Character"); 
        }
        
        if(ErrorCount==0) {
            if($('#IsActive').val()=="0" && $('#ProductCount').val()>0){
                Errormsg = "<span style='color:red'> Brand have Products</span>";
            }else{
                Errormsg ="";
            }
            var txt= '<div class="modal-header" style="padding-bottom:5px">'
                         +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                         +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                         +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to update sub category?<br>'
                                +''+Errormsg+''
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="UpdateSubCategory()" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");                                                      
        }else{
            return false;
        }
        }
function UpdateSubCategory() {
    $( "#btnsubmit" ).trigger( "click" );
}

</script>
