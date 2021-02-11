    <div class="main-panel">
        <div class="container">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-title">
                                            Manage Galleries
                                        </div>
                                    </div>                                                    
                                    
                                </div>
                            </div>
                            <div class="card-body">
                                   <div class="row">
                                    <div class="col-md-3">
                                    
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-title">
                                            Gallery Groups
                                        </div>
                                        <br>
                                        <?php
                                            if (isset($_POST['AddGallery'])) {
                                                
                                                    $mysql->insert("_tbl_gallery_names",array("GalleryName"=>$_POST['GalleryName'],
                                                                                               "IsActive"=>"1"));
                                               
                                            }
                                        ?>
                                        <?php
                                            $categories = $mysql->select("select * from _tbl_gallery_names where IsActive='1' order by GalleryName");
                                            if (!(isset($_GET['gallery']))) {
                                                ?>
                                                <script>
                                                    location.href="dashboard.php?action=Website/Gallery/list&gallery=<?php echo $categories[0]['GalleryID'];?>";
                                                </script>
                                                <?php
                                            }
                                        ?>
                                         <ul class="sub-menu" style="line-height:30px;font-size:18px;list-style:none;padding-left:5px">
                            <?php foreach($categories as $category) { ?>
                                <li style="font-size:13px"><a href="dashboard.php?action=Website/Gallery/list&gallery=<?php echo $category['GalleryID'];?>" style="<?php echo $category['GalleryID']==$_GET['gallery'] ? 'color:#0081c8;font-weight:bold': 'color:#666;font-weight:normal';?>"><?php echo $category['GalleryName'];?></a>
                                
                                <a href="dashboard.php?action=Website/Gallery/remove&gallery=<?php echo $category['GalleryID'];?>" style="float:right;font-size:10px;">Remove</a>
                                <span style="float: right;">&nbsp;|&nbsp;</span>
                                <a href="dashboard.php?action=Website/Gallery/edit&gallery=<?php echo $category['GalleryID'];?>" style="float:right;font-size:10px;">Edit</a>
                                </li>
                            <?php } ?>
                        </ul>    
                                    </div>  
                                    
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

                                    
                                        <fieldset style="background:#f6f6f6;text-align:left;padding:10px;border:1px solid #f1f1f1;width:100%">
                                         
                                                <form action="" method="post" onsubmit="return SubmitGroupName();" >
                                                Gallery Group 
                                                <input class="form-control" tyep="text" name="GalleryName" id="GalleryName" placeholder="Enter Gallery Group Name"> 
                                                <div class="errorstring" id="ErrGalleryName"><?php echo isset($ErrGalleryName)? $ErrGalleryName : "";?></div> 
                                                <button type="submit" name="AddGallery" class="btn btn-primary btn-xs">Add  Gallery Group</button>
                                            </form>
                                        </fieldset>                                                  
                                   
                                </div>
                                    
                                    </div>
                                    <div class="col-md-9" style="border-left:1px solid #ccc">
                                    
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-title">
                                            Gallery Images
                                            <div style="font-size:14px;clear:both">
                                            <?php
                                                 $category = $mysql->select("select * from _tbl_gallery_names where GalleryID='".$_GET['gallery']."'");
                                                 echo  $category[0]['GalleryName']
                                            ?>
                                            </div>
                                        </div>
                                    </div>                                                    
                                    <div class="col-md-6">
                                        <?php
                                            if (isset($_POST['UploadThumb'])) {
                                                $target_dir = "../uploads/gallery/";
                                                $image = strtolower(time()."_".$_FILES['file']["name"]);
                                               
                                                if (move_uploaded_file($_FILES['file']["tmp_name"], $target_dir .$image)) {
                                                    $mysql->insert("_tbl_gallery_images",array("GalleryID"=>$_GET['gallery'],
                                                                                               "GalleryTitle"=>$_POST['GalleryTitle'],
                                                                                               "GalleryImage"=>$image,
                                                                                               "IsActive"=>"1"));
                                                }
                                            }
                                        ?>
                                        <fieldset style="background:#f6f6f6;text-align:left;padding:10px;border:1px solid #f1f1f1">
                                         
                                                <form action="" method="post" enctype="multipart/form-data">
                                                <input type="file" name="file"><br>
                                                <span style="font-size:12px">Image Size: Width 430x X Height 305px</span>
                                                <input tyep="text" name="GalleryTitle"> &nbsp; 
                                                <button type="submit" name="UploadThumb" class="btn btn-primary btn-xs">Add Thumb</button>
                                            </form>
                                        </fieldset>
                                            
                                            
                                  
                                            
                                               
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                    </div>
                                    
                                </div>
                                    <hr>
                                <div class="row" style="margin-top: 40px;">
                                    <?php
                                        if (isset($_POST['btnUpdate'])) {
                                            $mysql->execute("update _tbl_gallery_images set GalleryTitle='".$_POST['GalleryTitle']."' where GalleryImageID='".$_POST['GalleryImageID']."'");
                                        }
                                        
                                         if (isset($_POST['btnRemove'])) {
                                            $mysql->execute("update _tbl_gallery_images set IsActive='0' where GalleryImageID='".$_POST['GalleryImageID']."'");
                                        }
                                        
                                        $images = $mysql->select("select * from _tbl_gallery_images where IsActive='1' and GalleryID='".$_GET['gallery']."' ");
                                        
                                        foreach($images  as $image) {
                                    ?>
                                        <div class="col-sm-3">
                                            <img src="https://www.trip78.in/uploads/gallery/<?php echo $image['GalleryImage'];?>" style="width:100%">
                                            <?php
                                                list($width, $height) = getimagesize("../uploads/gallery/".$image['GalleryImage']);
                                                echo $width."px x ".$height."px";
                                            ?>
                                            <form action="" method="post">
                                                <input type="hidden" name="GalleryImageID" value="<?php echo $image['GalleryImageID'];?>">
                                                <input type="text" class="form-control" name="GalleryTitle" value="<?php echo $image['GalleryTitle'];?>">
                                                <input type="submit" value="Update Title" name="btnUpdate" class="btn btn-primary btn-sm">
                                                <input type="submit" value="Remove" name="btnRemove" class="btn btn-danger btn-sm">
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
        </div>
    </div>
    <div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body" id="confrimation_text" style="padding:10px;">
                    <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
                </div>
            </div>
        </div>
    </div>
<script>
    var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
    
    function CallConfirmation(CustomerReviewID){
        var txt = '<form action="" method="POST" id="Frm_'+CustomerReviewID+'">'
                    +'<input type="hidden" value="'+CustomerReviewID+'" id="CustomerReviewID" Name="CustomerReviewID">'
                    +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to delete Customer Review?'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="DeleteCustomerReview(\''+CustomerReviewID+'\')" >Yes, Confirm</button>'
                 +'</div></form>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
    }                                                                                                 
 
    function DeleteCustomerReview(SliderID) {
        var param = $( "#Frm_"+SliderID).serialize();          
        $("#confrimation_text").html(loading);
        $.post( "webservice.php?action=DeleteCustomerReview",param,function(data) {
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {
                html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
                html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-danger' data-dismiss='modal'>Cancel</button></div>"; 
            } else {
                html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
                html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Website/Reviews/list' class='btn btn-outline-danger'>Continue</a></div>"; 
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
        });
    }
</script>