<?php
    include_once("header.php");
    include_once("LeftMenu.php"); 

?>
<script>
    function SubmitSlider() {
        ErrorCount=0;    
        return (ErrorCount==0) ? true : false;
    }
</script>
<?php $data = $mysql->select("select * from _tbl_customer_reviews where CustomerReviewID='".$_GET['Review']."'"); ?>
    <div class="main-panel">
        <div class="container">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Edit Customer Review</div>
                            </div>
                            <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitSlider();" id="addProduct" enctype="multipart/form-data">
                                <div class="card-body">
                                <?php
                                        if (isset($_POST['btnsubmit'])) {
        
        $target_dir = "../assets/customerreview/";
        $file =  $_FILES["uploadimage1"]["name"];
        $target_file = $target_dir .$file;
        if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
            $id = $mysql->execute("update _tbl_customer_reviews set CustomerThumb       = '".$file."',
                                                                    CustomerName        = '".$_POST['CustomerName']."',
                                                                    CustomerRating      = '".$_POST['CustomerRating']."',
                                                                    CustomerSubject     = '".$_POST['CustomerSubject']."',
                                                                    CustomerDescription = '".$_POST['CustomerDescription']."' where CustomerReviewID='".$_GET['Review']."'");
        } else {
            $id = $mysql->execute("update _tbl_customer_reviews set CustomerName        = '".$_POST['CustomerName']."',
                                                                    CustomerRating      = '".$_POST['CustomerRating']."',
                                                                    CustomerSubject     = '".$_POST['CustomerSubject']."',
                                                                    CustomerDescription = '".$_POST['CustomerDescription']."' where CustomerReviewID='".$_GET['Review']."'");
        }
         echo successMessage('Updated Customer Review Successfully');
    }
                                ?>
                                    <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">SliderTitle<span class="required-label">*</span></label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" name="CustomerName" class="form-control" id="CustomerName" value="<?php echo $data[0]["CustomerName"];?>">
                                            <div class="errorstring" id="ErrCustomerName"><?php echo isset($ErrCustomerName)? $ErrCustomerName : "";?></div>
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Subject<span class="required-label">*</span></label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" name="CustomerSubject" class="form-control" id="CustomerSubject" value="<?php echo $data[0]["CustomerSubject"];?>">
                                            <div class="errorstring" id="ErrCustomerSubject"><?php echo isset($ErrCustomerSubject)? $ErrCustomerSubject : "";?></div>
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Description<span class="required-label">*</span></label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" name="CustomerDescription" class="form-control" id="CustomerDescription" value="<?php echo $data[0]["CustomerDescription"];?>">
                                            <div class="errorstring" id="ErrCustomerDescription"><?php echo isset($ErrCustomerDescription)? $ErrCustomerDescription : "";?></div>
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Rating<span class="required-label">*</span></label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <select name="CustomerRating" id="CustomerRating" class="form-control">
                                                <option value="1" <?php echo ($data[0]['CustomerRating']=="1")  ? " selected='selected' " : ""; ?>>1</option>
                                                <option value="2" <?php echo ($data[0]['CustomerRating']=="2")  ? " selected='selected' " : ""; ?>>2</option>
                                                <option value="3" <?php echo ($data[0]['CustomerRating']=="3")  ? " selected='selected' " : ""; ?>>3</option>
                                                <option value="4" <?php echo ($data[0]['CustomerRating']=="4")  ? " selected='selected' " : ""; ?>>4</option>
                                                <option value="5" <?php echo ($data[0]['CustomerRating']=="5")  ? " selected='selected' " : ""; ?>>5</option>
                                            </select>
                                            <div class="errorstring" id="ErrCustomerRating"><?php echo isset($ErrCustomerRating)? $ErrCustomerRating : "";?></div>
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Customer Image<span class="required-label">*</span></label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <img src="<?php echo "../uploads/customerreview/".$data[0]['CustomerThumb'];?>" style='height:100px;margin-top: 5px;'><br>
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
                                            <input class="btn btn-warning" type="submit" name="btnsubmit" value="Update Customer Review">&nbsp;
                                            <a href="dashboard.php?action=Website/Reviews/list" class="btn btn-warning btn-border">Back</a>
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
<?php include_once("footer.php");?>