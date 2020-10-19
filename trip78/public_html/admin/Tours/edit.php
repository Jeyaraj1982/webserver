<?php
include_once("header.php");
include_once("LeftMenu.php"); 
$data= $mysql->Select("select * from _tbl_tour where md5(TourTypeID)='".$_GET['id']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            $dupemail = $mysql->select("select * from _tbl_tour where TourTypeName='".$_POST['TourTypeName']."' and TourTypeID<>".$data[0]['TourTypeID']."'");
            if(sizeof($dupemail)>0){
                $ErrTourTypeName ="Tour Name Already Exist ";
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
                   $file = $data[0]['Image'];
            } 
                $mysql->execute("update _tbl_tour set `TourTypeName`    ='".$_POST['TourTypeName']."',
                                                      `IsPublish`       ='".$_POST['IsPublish']."',
                                                      `Image`           ='".$file."' where TourTypeID='".$data[0]['TourTypeID']."'");
           
                $successmessage ="Updated Successfully";
        }else {
             $successmessage ="Error updating ";
        }
    }
    $data= $mysql->Select("select * from _tbl_tour where md5(TourTypeID)='".$_GET['id']."'");
?>
<script>
$(document).ready(function () {
    $("#TourTypeName").blur(function () {
        if(IsNonEmpty("TourTypeName","ErrTourTypeName","Please Enter Product Name")){
           IsAlphaNumeric("TourTypeName","ErrTourTypeName","Please Enter Alpha Numerics Character"); 
        }
    });
});
function SubmitProduct() {
        ErrorCount=0;    
        $('#ErrTourTypeName').html("");
        
        if(IsNonEmpty("TourTypeName","ErrTourTypeName","Please Enter Product Name")){
           IsAlphaNumeric("TourTypeName","ErrTourTypeName","Please Enter Alpha Numerics Character"); 
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
                                    <div class="card-title">Edit Product</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Tour Name<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="TourTypeName" name="TourTypeName" placeholder="Enter Tour Name" value="<?php echo (isset($_POST['TourTypeName']) ? $_POST['TourTypeName'] : $data[0]['TourTypeName']);?>">
                                                <span class="errorstring" id="ErrTourTypeName"><?php echo isset($ErrTourTypeName)? $ErrTourTypeName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Tour Image<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="hidden" name="uploadimage1" id="uploadimage1" value="<?php echo $data[0]['Image'];?>">
                                                <input type="file" onchange="image1_onchage()" name="image1" id="image1" style="display: none;"> 
                                                <div id="div_1">
                                                    <?php if(strlen($data[0]['Image'])>1) { ?>
                                                        <img src="../<?php echo "uploads/".$data[0]['Image'];?>" style='width: 64px;height:64px;margin-top: 5px;'>
                                                    <?php } ?>
                                                        <input type="file" name="uploadimage1" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                                </div>
                                                <div class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></div>
                                                <img src='../assets/loading.gif' style='width:0px'>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Is publish<span class="required-label">*</span></label>
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
                                                <a href="dashboard.php?action=Tours/list" class="btn btn-warning btn-border">Back</a>
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