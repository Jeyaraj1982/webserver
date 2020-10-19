<?php
include_once("header.php");
include_once("LeftMenu.php"); 
$data= $mysql->Select("select * from _tbl_sub_tour where md5(SubTourTypeID)='".$_GET['id']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            $dupemail = $mysql->select("select * from _tbl_sub_tour where SubTourTypeName='".$_POST['SubTourTypeName']."' and TourTypeID='".$_POST['TourType']."' and SubTourTypeID<>'".$data[0]['SubTourTypeID']."'");
            if(sizeof($dupemail)>0){
                $ErrSubTourTypeName ="Sub Tour Type Name Already Exist in this Tour Type";
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
                $mysql->execute("update _tbl_sub_tour set `TourTypeID`      ='".$_POST['TourType']."',
                                                               `TourTypeName`    ='".$tour[0]['TourTypeName']."',
                                                               `SubTourTypeName` ='".$_POST['SubTourTypeName']."',
                                                               `PriceStartingFrom` ='".$_POST['PriceStartingFrom']."',
                                                               `IsPublish`       ='".$_POST['IsPublish']."',
                                                               `Image`           ='".$file."' where SubTourTypeID='".$data[0]['SubTourTypeID']."'");
           
                $successmessage ="Updated Successfully";
            }else {
             $successmessage ="Error updating ";
        }
    }
    $data= $mysql->Select("select * from _tbl_sub_tour where md5(SubTourTypeID)='".$_GET['id']."'");

?>
<script>
$(document).ready(function () {
    $("#TourType").blur(function () {
       var TourType = $('#TourType').val().trim();
        if (TourType=="0") {
            $('#ErrTourType').html("Please Select TourType");   
        }else{
            $('#ErrTourType').html("");                                                              
        }
    });
    $("#SubTourTypeName").blur(function () {
        if(IsNonEmpty("SubTourTypeName","ErrSubTourTypeName","Please Enter Sub Tour Type Name")){
           IsAlphaNumeric("SubTourTypeName","ErrSubTourTypeName","Please Enter Alpha Numerics Character"); 
        }
    });
   
    $("#Description").blur(function () {
        IsNonEmpty("Description","ErrDescription","Please Enter Product Description");
    });
});
function SubmitProduct() {
        ErrorCount=0;    
        $('#ErrTourType').html("");
        $('#ErrSubTourTypeName').html("");
        $('#ErrDescription').html("");
        
        if(IsNonEmpty("SubTourTypeName","ErrSubTourTypeName","Please Enter Sub Tour Type Name")){
           IsAlphaNumeric("SubTourTypeName","ErrSubTourTypeName","Please Enter Alpha Numerics Character"); 
        }
       
        IsNonEmpty("Description","ErrDescription","Please Enter Product Description");   
        var TourType = $('#TourType').val().trim();
        if (TourType=="0") {
            $('#ErrTourType').html("Please Select TourType");   
            ErrorCount++;      
        }else{
            $('#ErrTourType').html("");
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
                                    <div class="card-title">Edit Sub Tour Type</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Tour Type<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select class="form-control" id="TourType" name="TourType">   
                                                    <option value="0" <?php echo ($_POST['TourType']=="0") ? " selected='selected' " : "";?>>Select Tour Type</option>                                                                                     
                                                <?php $TourTypes = $mysql->select("select * from _tbl_tour");?>
                                                <?php foreach($TourTypes as $TourType){ ?>
                                                    <option value="<?php echo $TourType['TourTypeID'];?>" <?php echo (isset($_POST[ 'TourType'])) ? (($_POST[ 'TourType']==$TourType['TourTypeID']) ? " selected='selected' " : "") : (($data[0]['TourTypeID']==$TourType['TourTypeID']) ? " selected='selected' " : "");?>><?php echo $TourType['TourTypeName'];?></option>
                                                <?php }?>
                                                </select>
                                                <span class="errorstring" id="ErrTourType"><?php echo isset($ErrTourType)? $ErrTourType : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Sub Tour Name<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="SubTourTypeName" name="SubTourTypeName" placeholder="Enter Sub Tour Type Name" value="<?php echo (isset($_POST['SubTourTypeName']) ? $_POST['SubTourTypeName'] : $data[0]['SubTourTypeName']);?>">
                                                <span class="errorstring" id="ErrSubTourTypeName"><?php echo isset($ErrSubTourTypeName)? $ErrSubTourTypeName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Price Starting From<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="PriceStartingFrom" name="PriceStartingFrom" placeholder="Enter Sub Tour Type Name" value="<?php echo (isset($_POST['PriceStartingFrom']) ? $_POST['PriceStartingFrom'] : $data[0]['PriceStartingFrom']);?>">
                                                <span class="errorstring" id="ErrPriceStartingFrom"><?php echo isset($ErrPriceStartingFrom)? $ErrPriceStartingFrom : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Sub Tour Image<span class="required-label">*</span></label>
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
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Update Sub Tour">&nbsp;
                                                <a href="dashboard.php?action=SubTours/list" class="btn btn-warning btn-border">Back</a>
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