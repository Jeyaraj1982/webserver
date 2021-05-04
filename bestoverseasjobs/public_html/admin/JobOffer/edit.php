<?php
$data=$mysql->select("select * from _tbl_joboffers where md5(JobOfferID)='".$_GET['id']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
          
            
            if($ErrorCount==0){
                if(strlen($_FILES["uploadimage1"]["name"])>0) {                                                 
                    $target_dir = "../uploads/";
                    $file =  $_FILES["uploadimage1"]["name"];
                    $target_file = $target_dir .$file;
                    if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
                    } 
                } else {
                   $file = $data[0]['SliderImage'];
                } 
                  
                
                 $mysql->execute("update _tbl_joboffers set `JobOfferImage` ='".$file."',
                                                        where JobOfferID='".$data[0]['JobOfferID']."'");
                 ?>
                    <script>
                    $(document).ready(function() {
                        swal("Slider Updated Successfully", {
                            icon:"success"
                        })
                    });
                    </script>
            <?php } 
    }  $data=$mysql->select("select * from _tbl_joboffers where md5(JobOfferID)='".$_GET['id']."'");
    
 
?>

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Edit Job</div>
                        </div>
                      
                        <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitSlider();" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name">Image<span class="required-label">*</span></label>
                                    <?php if($data[0]['JobOfferImage']!=""){ ?>
                                        <br><div class="col-sm-12"><img src='../uploads/<?php echo $data[0]['JobOfferImage'];?>' style='height: 200px;'></div>
                                    <?php } ?>
                                    <div class="col-sm-12"><input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" ></div>
                                    <span class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></span>
                                </div>
                                 
                                <div class="form-group">
                                    <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="btn btn-warning" type="submit" name="btnsubmit" value="Update Job">&nbsp;
                                        <a href="dashboard.php?action=JobOffer/list" class="btn btn-warning btn-border">Back</a>
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
