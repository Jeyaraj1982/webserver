<?php
    include_once("header.php");
    include_once("LeftMenu.php"); 
   
?>
<script>
    $(document).ready(function () {
        $("#GalleryName").blur(function () {
            IsNonEmpty("GalleryName","ErrGalleryName","Please Enter Gallery Group Name");
        });
    });
    function SubmitGroupName() {
        ErrorCount=0;    
        $('#GalleryName').html("");
        IsNonEmpty("GalleryName","ErrGalleryName","Please Enter Gallery Group Name");
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
                                <div class="card-title">Edit Gallery Group Name</div>
                            </div>
                            <?php
                                 if (isset($_POST['btnsubmit'])) {
                                    $id = $mysql->execute("update _tbl_gallery_names set GalleryName = '".$_POST['GalleryName']."' where GalleryID='".$_GET['gallery']."'");
                                    echo "Successfully updated";
                                 }
                                 $data = $mysql->select("select * from _tbl_gallery_names where GalleryID='".$_GET['gallery']."'");
                                 
                            ?>
                            <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitGroupName();" id="addProduct" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Gallery Group Namee<span class="required-label">*</span></label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" name="GalleryName" class="form-control" id="GalleryName" value="<?php echo $data[0]["GalleryName"];?>">
                                            <div class="errorstring" id="ErrGalleryName"><?php echo isset($ErrGalleryName)? $ErrGalleryName : "";?></div>
                                        </div>
                                    </div>
                                <div class="card-action">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="btn btn-warning" type="submit" name="btnsubmit" value="Update">&nbsp;
                                            <a href="dashboard.php?action=Website/Gallery/list" class="btn btn-warning btn-border">Back</a>
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