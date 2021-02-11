<?php
include_once("header.php");
include_once("LeftMenu.php"); 
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            if($ErrorCount==0){
                
                    $target_dir = "../assets/cars/";
                    $file =  $_FILES["uploadimage1"]["name"];
                    $target_file = $target_dir .$file;

                  if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
                     
                     $id = $mysql->insert("_tbl_taxi",array("TaxiName"  => $_POST['TourTypeName'],
                                                            "TaxiThumb"         => $file,
                                                            "IsActive"         => "1",
                                                            "Description"         => $_POST['Description']));
                     if(sizeof($id)>0){
                        unset($_POST);
                        $successmessage ="Taxi Type Added Successfully";
                     }
                  }else {
                        $successmessage ="Error Add Taxi";
                  }
        
        } else {
                $successmessage =  "Sorry, there was an error uploading your file.";
              }
    }
    
?>
<script>
$(document).ready(function () {
    $("#TourTypeName").blur(function () {
        if(IsNonEmpty("TourTypeName","ErrTourTypeName","Please Enter Tour Name")){
           IsAlphaNumeric("TourTypeName","ErrTourTypeName","Please Enter Alpha Numerics Character"); 
        }
    });
});
function SubmitProduct() {
        ErrorCount=0;    
        $('#ErrTourTypeName').html("");
        
        if(IsNonEmpty("TourTypeName","ErrTourTypeName","Please Enter Tour Name")){
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
                                    <div class="card-title">Add Taxi Type</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Taxi Type Name<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="TourTypeName" name="TourTypeName" placeholder="Enter Tour Name" value="<?php echo (isset($_POST['TourTypeName']) ? $_POST['TourTypeName'] :"");?>">
                                                <span class="errorstring" id="ErrTourTypeName"><?php echo isset($ErrTourTypeName)? $ErrTourTypeName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Taxi Image<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                                <div class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></div>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Description<span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="Description" name="Description" placeholder="Enter Description" value="<?php echo (isset($_POST['TourTypeName']) ? $_POST['TourTypeName'] :"");?>">
                                                <span class="errorstring" id="ErrTourTypeName"><?php echo isset($ErrTourTypeName)? $ErrTourTypeName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                    </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Add Taxi Type">&nbsp;
                                                <a href="dashboard.php?action=Taxi/TaxiTypes" class="btn btn-warning btn-border">Back</a>
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