<?php
    include_once("header.php");
    include_once("LeftMenu.php"); 
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
        if($ErrorCount==0){
            $target_dir = "../uploads/customerreview/";
            $file =  $_FILES["uploadimage1"]["name"];
            $target_file = $target_dir .$file;
            if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
                $id = $mysql->insert("_tbl_customer_reviews",array("CustomerThumb"       => $file,
                                                                   "IsActive"            => '1',
                                                                   "CustomerName"        => $_POST['CustomerName'],
                                                                   "CustomerRating"      => $_POST['CustomerRating'],
                                                                   "CustomerSubject"     => $_POST['CustomerSubject'],
                                                                   "CustomerDescription" => $_POST['CustomerDescription'],
                                                                   "AddedOn"             => date("Y-m-d H:i:s")));
                if(sizeof($id)>0){
                    unset($_POST);
                    $successmessage ="Added Customer Review Successfully";
                }
            } else {
                $successmessage ="Error Image";
            }
        } else {
            $successmessage =  "Sorry, there was an error uploading your file.";
        }
    }
?>
<script>
$(document).ready(function () {
    $("#uploadimage1").blur(function () {
        IsNonEmpty("uploadimage1","Erruploadimage1","Please Upload Slider Image"); 
    });
});
function SubmitSlider() {
    ErrorCount=0;    
    $('#Erruploadimage1').html("");
    IsNonEmpty("uploadimage1","Erruploadimage1","Please Upload Slider Image"); 
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
                                <div class="card-title">Add Customer Review</div>
                            </div>
                            <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitSlider();" id="addProduct" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Customer Name<span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="text" name="CustomerName" class="form-control" id="CustomerName">
                                            <div class="errorstring" id="ErrCustomerName"><?php echo isset($ErrCustomerName)? $ErrCustomerName : "";?></div>
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Subject<span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="text" name="CustomerSubject" class="form-control" id="CustomerSubject" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                            <div class="errorstring" id="ErrCustomerSubject"><?php echo isset($ErrCustomerSubject)? $ErrCustomerSubject : "";?></div>
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Description<span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="text" name="CustomerDescription" class="form-control" id="CustomerDescription">
                                            <div class="errorstring" id="ErrCustomerDescription"><?php echo isset($ErrCustomerDescription)? $ErrCustomerDescription : "";?></div>
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Rating<span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <select name="CustomerRating" class="form-control" id="CustomerRating">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <div class="errorstring" id="ErrCustomerRating"><?php echo isset($ErrCustomerRating)? $ErrCustomerRating : "";?></div>
                                        </div>
                                    </div>
                                    <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Customer Thumb<span class="required-label">*</span></label>
                                        <div class="col-lg-4 col-md-9 col-sm-8">
                                            <input type="file" name="uploadimage1" class="form-control" id="uploadimage1">
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
                                            <input class="btn btn-warning" type="submit" name="btnsubmit" value="Add Customer Review">&nbsp;
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