<?php
    include_once("header.php");
    include_once("LeftMenu.php"); 
    if (isset($_POST['btnsubmit'])) {
        
        $target_dir = "../uploads/";
        $file =  $_FILES["uploadimage1"]["name"];
        $target_file = $target_dir .$file;
        if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
            
            $id = $mysql->execute("update _tbl_sliders set SliderImage       = '".$file."',
                                                           SliderTitle       = '".$_POST['SliderTitle']."',
                                                           SliderDescription = '".$_POST['SliderDescription']."',
                                                           ButtonName        = '".$_POST['ButtonName']."',
                                                           ButtonLink        = '".$_POST['ButtonLink']."' where SliderID='".$_GET['slider']."'");
        } else {
            $id = $mysql->execute("update _tbl_sliders set SliderTitle       = '".$_POST['SliderTitle']."',
                                                           SliderDescription = '".$_POST['SliderDescription']."',
                                                           ButtonName        = '".$_POST['ButtonName']."',
                                                           ButtonLink        = '".$_POST['ButtonLink']."' where SliderID='".$_GET['slider']."'");
        }
    }
    
?>
<script>
 
function SubmitSlider() {
        ErrorCount=0;    
      
        
        
                return (ErrorCount==0) ? true : false;
     
</script>
<?php
    $slider = $mysql->select("select * from _tbl_sliders where SliderID='".$_GET['slider']."'");
?>
         
              
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Edit Slider</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitSlider();" id="addProduct" enctype="multipart/form-data">
                                    <div class="card-body">
                                     <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">SliderTitle<span class="required-label">*</span></label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input type="text" name="SliderTitle" class="form-control" id="SliderTitle" value="<?php echo $slider[0]["SliderTitle"];?>">
                                                <div class="errorstring" id="ErrSliderTitle"><?php echo isset($ErrSliderTitle)? $ErrSliderTitle : "";?></div>
                                            </div>
                                        </div>
                                        
                                         <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Slider Description<span class="required-label">*</span></label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input type="text" name="SliderDescription" class="form-control" id="SliderDescription" value="<?php echo $slider[0]["SliderDescription"];?>">
                                                <div class="errorstring" id="ErrSliderDescription"><?php echo isset($ErrSliderDescription)? $ErrSliderDescription : "";?></div>
                                            </div>
                                        </div>
                                        
                                         <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Button Name<span class="required-label">*</span></label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input type="text" name="ButtonName" class="form-control" id="ButtonName" value="<?php echo $slider[0]["ButtonName"];?>">
                                                <div class="errorstring" id="ErrButtonName"><?php echo isset($ErrButtonName)? $ErrButtonName : "";?></div>
                                            </div>
                                        </div>
                                        
                                         <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Button Link<span class="required-label">*</span></label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input type="text" name="ButtonLink" class="form-control" id="ButtonLink"  value="<?php echo $slider[0]["ButtonLink"];?>" >
                                                <div class="errorstring" id="ErrButtonLink"><?php echo isset($ErrButtonLink)? $ErrButtonLink : "";?></div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Slider Image<span class="required-label">*</span></label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <img src="<?php echo "../uploads/".$slider[0]['SliderImage'];?>" style='height:100px;margin-top: 5px;'><br>
                                                <input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                                <div class="errorstring" id="Erruploadimage1"><?php echo isset($Erruploadimage1)? $Erruploadimage1 : "";?></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                    </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Update Slider">&nbsp;
                                                <a href="dashboard.php?action=Website/Sliders/list" class="btn btn-warning btn-border">Back</a>
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