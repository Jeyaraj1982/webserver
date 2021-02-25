<?php
include_once("header.php");
include_once("LeftMenu.php"); 
$data= $mysql->Select("select * from _tbl_events where md5(EventID)='".$_GET['id']."'");
?>
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">View Event Information</div>
                                </div>
                                    <div class="card-body">
                                          
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Event Title</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['EventTitle'];?></div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Event Date</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['EventDate'];?></div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">From</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['StartingPoint'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">To</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['EndingPoint'];?></div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Routes</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Routes'];?></div>
                                        </div>                                                 
                                         <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Description</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Description'];?></div>
                                        </div>
                                                                   
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">IsPublish</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <?php if($data[0]['IsPublish']=="1"){ echo "Yes";}else { echo "No";} ?>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Added On</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['AddedOn'];?></div>
                                        </div>
                                        
                                          
                                        </div>
                                        
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">                                  
                                                <a href="dashboard.php?action=Events/list" class="btn btn-warning">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                            </div>
                        </div>
                        
                        
                        <div class="row" style="margin-top:15px">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-title">
                                                Thumbnails 
                                            </div>
                                        </div>      
                                        <div class="col-md-6" style="text-align: right;">
                                        <?php
                                            if (isset($_POST['UploadThumb'])) {
                                               
                                                $target_dir = "../assets/events/";
                                                $image = strtolower(time()."_".$_FILES['file']["name"]);
                                              
                                                if (move_uploaded_file($_FILES['file']["tmp_name"], $target_dir .$image)) {    
                                                    $mysql->insert("_tbl_events_images",array("EventID"=>$data[0]['EventID'],
                                                                                               "ImageName"=>$image,
                                                                                               "ImageOrder"=>sizeof($mysql->select("select * from _tbl_events_image where IsDelete='0' EventID='".$data[0]['EventID']."'"))+1,
                                                                                               "IsDelete"=>"0"));
                                                        }
                                            }
                                        ?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <input type="file" name="file"><br>
                                            
                                            <button type="submit" name="UploadThumb" class="btn btn-primary btn-xs">Add Thumb</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                    <?php
                                        if (isset($_POST['btnRemove'])) {
                                            $mysql->execute("update _tbl_events_images set IsDelete='1' where ImageID='".$_POST['ImageID']."'");
                                        }
                                        
                                        if (isset($_POST['btnUpdateOrder'])) {
                                            $mysql->execute("update _tbl_events_images set ImageOrder='".$_POST['ImageOrder']."' where ImageID='".$_POST['ImageID']."'");
                                        }
                                        
                                        
                                        $images = $mysql->select("select * from _tbl_events_images where IsDelete='0' and EventID='".$data[0]['EventID']."' order by ImageOrder");
                                        
                                        foreach($images  as $image) {
                                    ?>
                                        <div class="col-sm-3">
                                            <img src="../assets/events/<?php echo $image['ImageName'];?>" style="width:100%">
                                            <?php
                                                list($width, $height) = getimagesize("../assets/events/".$image['ImageName']);
                                                //echo $width."px x ".$height."px";
                                            ?>
                                            <form action="" method="post">
                                                <input type="hidden" name="ImageID" value="<?php echo $image['ImageID'];?>">
                                                <select name="ImageOrder" class="form-control">
                                                    <option value="0">Select Order</option>            
                                                    <?php for($i=1;$i<=sizeof($images);$i++) { ?>
                                                            <option value="<?php echo $i;?>" <?php echo ($i==$image['ImageOrder']) ? " selected='selected' " : "";?> ><?php echo $i;?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                                <br>
                                                <input type="submit" value="Update Order" name="btnUpdateOrder" class="btn btn-primary btn-sm">
                                                <input type="submit" value="Remove Image" name="btnRemove" class="btn btn-danger btn-sm">
                                            </form>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    
                    
                     
                     
                     
                     
                </div>
            </div>

<?php include_once("footer.php");?>
 
 