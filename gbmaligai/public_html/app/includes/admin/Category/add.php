
<script>
$(document).ready(function () {
    $("#CategoryName").blur(function () {
        if(IsNonEmpty("CategoryName","ErrCategoryName","Please Enter Category Name")){
          // IsAlphaNumeric("CategoryName","ErrCategoryName","Please Enter Alpha Numerics Character"); 
        }
    });
    $("#uploadimage1").blur(function () {
      //  IsNonEmpty("uploadimage1","Errimage1","Please Upload Category Image");
    });
});
function SubmitCategory() {
        ErrorCount=0;    
        $('#ErrCategoryName').html("");
        $('#Errimage1').html("");
        
        if(IsNonEmpty("CategoryName","ErrCategoryName","Please Enter Category Name")){
          // IsAlphaNumeric("CategoryName","ErrCategoryName","Please Enter Alpha Numerics Character"); 
        }
        //IsNonEmpty("uploadimage1","Errimage1","Please Upload Category Image");
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
                            <div class="card-title">Add Category</div>
                        </div>
                        <?php
    if (isset($_POST['btnsubmit'])) {
        
        $ErrorCount =0;
        
        $dupCategoryName = $mysql->select("select * from _tbl_category where CategoryName='".$_POST['CategoryName']."'");
        if(sizeof($dupCategoryName)>0) {
            $ErrCategoryName ="Category Name Already Exist";
            $ErrorCount++;   ?>
                <script>
                  $(document).ready(function() {
                        swal("<?php echo "Category Name Already Exist";?>", {
                            icon : "error" 
                        });
                     });
                </script>
        <?php }
        $target_dir = "../uploads/";
        $file =  $_FILES["uploadimage1"]["name"];
        $target_file = $target_dir .$file;
        if (isset($_FILES["uploadimage1"]["name"]) && $_FILES["uploadimage1"]["name"]!="") {
                
            if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
        
            } else {
            ?>
            <script>
                $(document).ready(function() {
                    swal("Sorry, there was an error uploading your file.", {
                        icon : "error" 
                    });
                 });
            </script>
                  <?php
                  $ErrorCount++;
            }
        }
            
        if($ErrorCount==0){
            $id = $mysql->insert("_tbl_category",array("CategoryName"  => $_POST['CategoryName'],
                                                            "Description"   => str_replace("'","\\'",$_POST['Description']),
                                                            "Image"         => $file,
                                                            "AddedOn"       => date("Y-m-d H:i:s")));
            $mysql->execute("update _tbl_category set ListOrder='".(sizeof($mysql->select("select CategoryID from _tbl_category")))."' where CategoryID='".$id."'");
                 if($id>0){  ?>
                    <script>
                    $(document).ready(function() {
                        swal("Category Added Successfully", {
                            icon:"success",
                            confirm: {value: 'Continue'}
                        }).then((value) => {
                            location.href='dashboard.php?action=Category/list&status=All'
                        });
                    });
                    </script>
                 <?php } ?>
                     
            <?php 
        }    ?>      
          
        <?php  
    
    }
?>
                        <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitCategory();" id="addProduct" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name">Category Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="CategoryName" name="CategoryName" placeholder="Enter Category Name" value="<?php echo (isset($_POST['CategoryName']) ? $_POST['CategoryName'] :"");?>">
                                    <span class="errorstring" id="ErrCategoryName"><?php echo isset($ErrCategoryName)? $ErrCategoryName : "";?></span>
                                </div> 
                                <div class="form-group form-show-validation row">
                                    <label for="name">Category Image</label>
                                    <input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                    <span class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></span>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name">Description</label>
                                    <textarea class="form-control" name="Description" id="Description"><?php echo (isset($_POST['Description']) ? $_POST['Description'] : "");?></textarea>
                                    <span class="errorstring" id="ErrDescription"><?php echo isset($ErrDescription)? $ErrDescription : "";?></span>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="btn btn-warning" type="submit" name="btnsubmit" value="Add Category">&nbsp;
                                        <a href="dashboard.php?action=Category/list&status=All" class="btn btn-warning btn-border">Back</a>
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
