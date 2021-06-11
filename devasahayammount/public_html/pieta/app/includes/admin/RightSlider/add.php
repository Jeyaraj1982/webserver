<?php
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            $dupSlider = $mysql->select("select * from _tbl_right_sliders where SliderImage='".$_FILES["uploadimage1"]["name"]."'");
            if(sizeof($dupSlider)>0){
                $ErrSlider ="Image Already Exist";
                $ErrorCount++;   ?>
                <script>
                  $(document).ready(function() {
                        swal("<?php echo "Image Already Exist";?>", {
                            icon : "error" 
                        });
                     });
                </script>
           <?php }
            
            if($ErrorCount==0){
                $target_dir = "../uploads/";
                $file =  $_FILES["uploadimage1"]["name"];
                $target_file = $target_dir .$file;

              if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
                  
                 $id = $mysql->insert("_tbl_right_sliders",array("SliderImage"         => $file,
                                                           "AddedOn"       => date("Y-m-d H:i:s")));
                 if($id>0){  ?>
                    <script>
                    $(document).ready(function() {
                        swal("Slider Added Successfully", {
                            icon:"success",
                            confirm: {value: 'Continue'}
                        }).then((value) => {
                            location.href='dashboard.php?action=RightSlider/list'
                        });
                    });
                    </script>
                 <?php } ?>
                     
            <?php 
        } else {   ?>      
            <script>
                $(document).ready(function() {
                    swal("Sorry, there was an error uploading your image.", {
                        icon : "error" 
                    });
                 });
            </script>
        <?php  }
    }
    }
?>
<script>
$(document).ready(function () {
    $("#uploadimage1").blur(function () {
        IsNonEmpty("uploadimage1","Errimage1","Please Upload Slider Image");
    });
});
function SubmitSlider() {
        ErrorCount=0;    
        $('#Errimage1').html("");
        
        IsNonEmpty("uploadimage1","Errimage1","Please Upload Slider Image");
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
                            <div class="card-title">Add Slider</div>
                        </div>
                        <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitSlider();" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name">Slider Image<span class="required-label">*</span></label>
                                    <input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                    <span class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></span>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="btn btn-warning" type="submit" name="btnsubmit" value="Add Slider">&nbsp;
                                        <a href="dashboard.php?action=RightSlider/list" class="btn btn-warning btn-border">Back</a>
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
