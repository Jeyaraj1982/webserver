<?php
    include_once("header.php");
    include_once("LeftMenu.php"); 
   
?>   
    <div class="main-panel">
        <div class="container">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Remove Gallery Group Name</div>
                            </div>
                           
                            <form id="exampleValidation" method="POST" action="" >
                                <div class="card-body">
                                 <?php
                                 if (isset($_POST['btnsubmit'])) {
                                    $id = $mysql->execute("update _tbl_gallery_names set IsActive = '0' where GalleryID='".$_GET['gallery']."'");
                                    echo "Successfully Removed";
                                 }
                                 $data = $mysql->select("select * from _tbl_gallery_names where IsActive = '1' and GalleryID='".$_GET['gallery']."'");
                                 if (sizeof($data)>0)      {
                            ?>
                            
                                    <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Gallery Group Namee<span class="required-label">*</span></label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" disabled="disabled" name="GalleryName" class="form-control" id="GalleryName" value="<?php echo $data[0]["GalleryName"];?>">
                                            <div class="errorstring" id="ErrGalleryName"><?php echo isset($ErrGalleryName)? $ErrGalleryName : "";?></div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                <div class="card-action" style="border: none;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div>
                                            <?php
                                             if (sizeof($data)>0)      {
                                                   $images = $mysql->select("select * from _tbl_gallery_images where IsActive='1' and GalleryID='".$_GET['gallery']."' ");
                                            ?>
                                                This Gallery Group has <b><?php echo sizeof($images);?></b> images. <br>
                                                Are you want to remove ? <br>  <br>
                                                <?php } ?>
                                            </div>
                                            <?php  if (sizeof($data)>0)      { ?>
                                            <input class="btn btn-warning" type="submit" name="btnsubmit" value="Yes, Remove">&nbsp;
                                            <?php } ?>
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