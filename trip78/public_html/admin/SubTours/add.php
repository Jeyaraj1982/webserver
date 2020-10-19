<?php
include_once("header.php");
include_once("LeftMenu.php"); 
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            $dupemail = $mysql->select("select * from _tbl_sub_tour where SubTourTypeName='".$_POST['SubTourTypeName']."' and TourTypeID='".$_POST['TourType']."'");
            if(sizeof($dupemail)>0){
                $ErrSubTourTypeName ="Sub Tour Type Name Already Exist in this Tour Type";
                $ErrorCount++;
            }
            
            if($ErrorCount==0){
                
                $target_dir = "../uploads/";
                    $file =  $_FILES["uploadimage1"]["name"];
                    $target_file = $target_dir .$file;

                  if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {

                    $tour = $mysql->select("select * from _tbl_tour where TourTypeID =".$_POST['TourType']."'");
                    $id = $mysql->insert("_tbl_sub_tour",array("TourTypeID"      => $_POST['TourType'],
                                                               "TourTypeName"    => $tour[0]['TourTypeName'],
                                                               "SubTourTypeName" => $_POST['SubTourTypeName'],
                                                               "PriceStartingFrom" => $_POST['PriceStartingFrom'],
                                                               "Image"           => $file,
                                                               "AddedOn"         => date("Y-m-d H:i:s")));
                     if(sizeof($id)>0){
                        unset($_POST);
                        $successmessage ="Sub Tour Type Added Successfully";
                     }
                  }else {
                        $successmessage ="Error Add Sub Tour";
                  }
            }
    }
    
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
        if(IsNonEmpty("SubTourTypeName","ErrSubTourTypeName","Please Enter SubTour Type Name")){
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
        $('#ErrPriceStartingFrom').html("");                                                                             
        
        if(IsNonEmpty("SubTourTypeName","ErrSubTourTypeName","Please Enter SubTour Type Name")){
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
                                    <div class="card-title">Add Sub Tour Type</div>
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
                                                    <option value="<?php echo $TourType['TourTypeID'];?>" <?php echo ($_POST['TourType']==$TourType['TourTypeID']) ? " selected='selected' " : "";?>> <?php echo $TourType['TourTypeName'];?></option>
                                                <?php }?>
                                                </select>
                                                <span class="errorstring" id="ErrTourType"><?php echo isset($ErrTourType)? $ErrTourType : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Sub Tour Name<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="SubTourTypeName" name="SubTourTypeName" placeholder="Enter Sub Tour Type Name" value="<?php echo (isset($_POST['SubTourTypeName']) ? $_POST['SubTourTypeName'] :"");?>">
                                                <span class="errorstring" id="ErrSubTourTypeName"><?php echo isset($ErrSubTourTypeName)? $ErrSubTourTypeName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">                                                                                                                                                                
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Price Starting From<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="PriceStartingFrom" name="PriceStartingFrom" placeholder="Enter Price Starting From" value="<?php echo (isset($_POST['PriceStartingFrom']) ? $_POST['PriceStartingFrom'] :"");?>">
                                                <span class="errorstring" id="ErrPriceStartingFrom"><?php echo isset($ErrPriceStartingFrom)? $ErrPriceStartingFrom : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Image<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">                                       
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Add Sub Tour">&nbsp;
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