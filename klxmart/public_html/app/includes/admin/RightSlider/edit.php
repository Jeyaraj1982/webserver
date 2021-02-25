<?php
$data=$mysql->select("select * from _tbl_right_sliders where md5(SliderID)='".$_GET['id']."'");
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            $dupSlider = $mysql->select("select * from _tbl_right_sliders where SliderImage='".$_FILES["uploadimage1"]["name"]."' and SliderID<>'".$data[0]['SliderImage']."'");
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
                if(strlen($_FILES["uploadimage1"]["name"])>0) {                                                 
                    $target_dir = "../uploads/";
                    $file =  $_FILES["uploadimage1"]["name"];
                    $target_file = $target_dir .$file;
                    if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
                    } 
                } else {
                   $file = $data[0]['SliderImage'];
                } 
                  
                
                 $mysql->execute("update _tbl_right_sliders set `SliderImage` ='".$file."',
                                                          `Order`       ='".$_POST['Order']."' where SliderID='".$data[0]['SliderID']."'");
                 ?>
                    <script>
                    $(document).ready(function() {
                        swal("Slider Updated Successfully", {
                            icon:"success"
                        })
                    });
                    </script>
            <?php } 
    }  $data=$mysql->select("select * from _tbl_right_sliders where md5(SliderID)='".$_GET['id']."'");
?>

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
                                    <?php if($data[0]['SliderImage']!=""){ ?>
                                        <br><div class="col-sm-12"><img src='../uploads/<?php echo $data[0]['SliderImage'];?>' style='height: 200px;'></div>
                                    <?php } ?>
                                    <div class="col-sm-12"><input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" ></div>
                                    <span class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></span>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name">Slider Order</label>
                                    <select class="form-control" name="Order" id="Order">
                                    <?php $Slids = $mysql->select("select * from _tbl_right_sliders");?>
                                    <?php for($i=1;$i<=sizeof($Slids);$i++){ ?>
                                        <option value=<?php echo $i;?> <?php echo (isset($_POST[ 'Order'])) ? (($_POST[ 'Order']==$i) ? " selected='selected' " : "") : (($data[0]['Order']==$i) ? " selected='selected' " : "");?>><?php echo $i;?></option>
                                    <?php } ?>
                                    </select>                                                                                                       
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="btn btn-warning" type="submit" name="btnsubmit" value="Update Slider">&nbsp;
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
