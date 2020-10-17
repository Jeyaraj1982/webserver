<?php
$data=$mysql->select("select * from _tbl_category where md5(CategoryID)='".$_GET['id']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            $dupCategoryName = $mysql->select("select * from _tbl_category where CategoryName='".$_POST['CategoryName']."' and CategoryID<>'".$data[0]['CategoryID']."'");
            if(sizeof($dupCategoryName)>0){
                $ErrCategoryName ="Category Name Already Exist";
                $ErrorCount++;   ?>
                <script>
                  $(document).ready(function() {
                        swal("<?php echo "Category Name Already Exist";?>", {
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
                  
                
                 $mysql->execute("update _tbl_category set `CategoryName`  ='".$_POST['CategoryName']."',
                                                           `Image`         ='".$file."',
                                                           `Description`   ='".str_replace("'","\\'",$_POST['Description'])."',
                                                           `IsActive`      ='".$_POST['IsActive']."' where CategoryID='".$data[0]['CategoryID']."'");
                 ?>
                    <script>
                    $(document).ready(function() {
                        swal("Category Updated Successfully", {
                            icon:"success"
                        })
                    });
                    </script>
            <?php } 
    }  $data=$mysql->select("select * from _tbl_category where md5(CategoryID)='".$_GET['id']."'");
?>
<script>
$(document).ready(function () {
    $("#CategoryName").blur(function () {
        if(IsNonEmpty("CategoryName","ErrCategoryName","Please Enter Category Name")){
           IsAlphaNumeric("CategoryName","ErrCategoryName","Please Enter Alpha Numerics Character"); 
        }
    });
});
function SubmitCategory() {
        ErrorCount=0;    
        $('#ErrCategoryName').html("");
        if(IsNonEmpty("CategoryName","ErrCategoryName","Please Enter Category Name")){
           IsAlphaNumeric("CategoryName","ErrCategoryName","Please Enter Alpha Numerics Character"); 
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
                            <div class="card-title">Edit Category</div>
                        </div>
                        <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitCategory();" id="addProduct" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name">Category Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="CategoryName" name="CategoryName" placeholder="Enter Category Name" value="<?php echo (isset($_POST['CategoryName']) ? $_POST['CategoryName'] :$data[0]['CategoryName']);?>">
                                    <span class="errorstring" id="ErrCategoryName"><?php echo isset($ErrCategoryName)? $ErrCategoryName : "";?></span>
                                </div> 
                                <div class="form-group form-show-validation row">
                                    <label for="name">Category Image<span class="required-label">*</span></label>
                                    <?php if($data[0]['Image']!=""){ ?>
                                        <br><div class="col-sm-12"><img src='../uploads/<?php echo $data[0]['Image'];?>' style='width: 64px;'></div>
                                    <?php } ?>
                                    <input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                    <span class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></span>
                                </div>
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
                                        <input class="btn btn-warning" type="submit" name="btnsubmit" value="Update Category">&nbsp;
                                        <a href="dashboard.php?action=Category/list&status=All" class="btn btn-warning btn-border">Back</a>
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
