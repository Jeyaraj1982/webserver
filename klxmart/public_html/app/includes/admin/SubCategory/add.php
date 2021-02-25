<?php
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            $dupCategorySubName = $mysql->select("select * from _tbl_sub_category where SubCategoryName='".$_POST['SubCategoryName']."' and CategoryID='".$_POST['CategoryName']."'");
            if(sizeof($dupCategorySubName)>0){
                $ErrSubCategoryName ="Sub Category Name Already Exist in this Category";
                $ErrorCount++;   ?>
                <script>
                  $(document).ready(function() {
                        swal("<?php echo "Sub Category Name Already Exist in this Category";?>", {
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
                           $ErrorCount++;
                           ?>
                              <script>
                $(document).ready(function() {
                    swal("Sorry, there was an error uploading your file.", {
                        icon : "error" 
                    });
                 });
            </script>
                           <?php 
                        }
                 }
            
            if($ErrorCount==0){
               
              
                 $Category = $mysql->select("select * from _tbl_category where CategoryID='".$_POST['CategoryName']."'");  
                
                 $id = $mysql->insert("_tbl_sub_category",array("CategoryID"        => $Category[0]['CategoryID'],
                                                                "CategoryName"      => $Category[0]['CategoryName'],
                                                                "SubCategoryName"   => $_POST['SubCategoryName'],
                                                                "Description"       => $_POST['Description'],
                                                                "Image"             => $file,
                                                                "AddedOn"           => date("Y-m-d H:i:s")));
                 if($id>0){  
                     if($_GET['fr']=="c"){
                     ?>
                    <script>
                    $(document).ready(function() {
                        swal("Sub Category Added Successfully", {
                            icon:"success",
                            confirm: {value: 'Continue'}
                        }).then((value) => {
                            location.href='dashboard.php?action=Category/list&status=All'
                        });
                    });
                    </script>
                 <?php }else { ?>
                    <script>
                    $(document).ready(function() {
                        swal("Sub Category Added Successfully", {
                            icon:"success",
                            confirm: {value: 'Continue'}
                        }).then((value) => {
                            location.href='dashboard.php?action=SubCategory/list&status=All'
                        });
                    });
                    </script>    
                 <?php }
                 
                 }  ?>
                     
            <?php 
        }   ?>      
         
        <?php   
     
    }
?>
<script>
$(document).ready(function () {
    $("#CategoryName").blur(function () {
        $('#ErrCategoryName').html("");
        if($('#CategoryName').val()=="0"){
           $('#ErrCategoryName').html("Please Select Category Name"); 
        }
    });
    $("#SubCategoryName").blur(function () {
        if(IsNonEmpty("SubCategoryName","ErrSubCategoryName","Please Enter Sub Category Name")){
         //  IsAlphaNumeric("SubCategoryName","ErrSubCategoryName","Please Enter Alpha Numerics Character"); 
        }
    });
    $("#uploadimage1").blur(function () {
        //IsNonEmpty("uploadimage1","Errimage1","Please Upload Sub Category Image");
    });
});
function SubmitSubCategory() {
        ErrorCount=0;    
        $('#ErrCategoryName').html("");
        $('#ErrSubCategoryName').html("");
        $('#Errimage1').html("");
        
        if($('#CategoryName').val()=="0"){
           $('#ErrCategoryName').html("Please Select Category Name"); 
           ErrorCount++;
        }
        
        if(IsNonEmpty("SubCategoryName","ErrSubCategoryName","Please Enter Sub Category Name")){
           //IsAlphaNumeric("SubCategoryName","ErrSubCategoryName","Please Enter Alpha Numerics Character"); 
        }
       // IsNonEmpty("uploadimage1","Errimage1","Please Upload Sub Category Image");
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
                            <div class="card-title">Add Sub Category</div>
                        </div>
                        <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitSubCategory();" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name">Category Name<span style="color:red">*</span></label>
                                    <?php if($_GET['fr']=="c"){ ?>
                                        <select readonly="readonly" class="form-control" name="CategoryName" id="CategoryName">
                                            <option value="0" <?php echo ($_POST['CategoryName']=="0") ? " selected='selected' " : "";?>>Select Category Name</option>
                                            <?php $CategoryNames = $mysql->select("select * from _tbl_category");?>
                                            <?php foreach($CategoryNames as $CategoryName) { ?>
                                                  <option value="<?php echo $CategoryName['CategoryID'];?>" <?php echo (isset($_POST[ 'CategoryName'])) ? (($_POST[ 'CategoryName']==$CategoryName['CategoryID']) ? " selected='selected' " : "") : (($_GET['id']==md5($CategoryName['CategoryID'])) ? " selected='selected' " : "");?>><?php echo $CategoryName['CategoryName'];?></option>
                                            <?php } ?>
                                        </select>
                                    <?php }else{ ?>
                                    <select class="form-control" name="CategoryName" id="CategoryName">
                                        <option value="0" <?php echo ($_POST['CategoryName']=="0") ? " selected='selected' " : "";?>>Select Category Name</option>
                                        <?php $CategoryNames = $mysql->select("select * from _tbl_category where IsActive='1'");?>
                                        <?php foreach($CategoryNames as $CategoryName) { ?>
                                              <option value="<?php echo $CategoryName['CategoryID'];?>" <?php echo ($_POST['CategoryName']==$CategoryName['CategoryID']) ? " selected='selected' " : "";?>><?php echo $CategoryName['CategoryName'];?></option>
                                        <?php } ?>
                                    </select>
                                    <?php } ?>
                                    <span class="errorstring" id="ErrCategoryName"><?php echo isset($ErrCategoryName)? $ErrCategoryName : "";?></span>
                               </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name">Sub Category Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="SubCategoryName" name="SubCategoryName" placeholder="Enter Sub Category Name" value="<?php echo (isset($_POST['SubCategoryName']) ? $_POST['SubCategoryName'] :"");?>">
                                    <span class="errorstring" id="ErrSubCategoryName"><?php echo isset($ErrSubCategoryName)? $ErrSubCategoryName : "";?></span>
                                </div> 
                                <!--                  
                                <div class="form-group form-show-validation row">
                                    <label for="name">Sub Category Image<span class="required-label">*</span></label>
                                    <input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                    <span class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></span>
                                </div>
                                -->
                                <div class="form-group form-show-validation row">
                                    <label for="name">Description</label>
                                    <textarea class="form-control" name="Description" id="Description"><?php echo (isset($_POST['Description']) ? $_POST['Description'] : "");?></textarea>
                                    <span class="errorstring" id="ErrDescription"><?php echo isset($ErrDescription)? $ErrDescription : "";?></span>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="btn btn-warning" type="submit" name="btnsubmit" value="Add Sub Category">&nbsp;
                                        <?php if($_GET['fr']=="c") { ?>
                                            <a href="dashboard.php?action=Category/list&status=All" class="btn btn-warning btn-border">Back</a>
                                        <?php }else { ?>
                                            <a href="dashboard.php?action=SubCategory/list&status=All" class="btn btn-warning btn-border">Back</a>
                                        <?php } ?>
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
