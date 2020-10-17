<?php 
$obj = new CommonController();
    
           /* if (!($obj->isLogin())){
                echo $obj->printError("Login Session Expired. Please Login Again");
                exit;
            }  */

            if (isset($_POST['rmimage'])) {
              $mysql->execute("update _jsuccessstory set filepath='' where storyid=".$_POST['rowid']);
              echo $obj->printSuccess("Image Removed Successfully");
              $_POST{"editbtn"}="editbtn";
           }
           
     if(isset($_POST{"updatebtn"})){
         
                $param = array("storyid"=>$_POST['rowid'],"storytitle"=>$_POST['storytitle'],"storydescription"=>str_replace("'","\\'",$_POST['storydescription']),"storyname"=>$_POST['storyname'],"email"=>$_POST['storyemail'],"mobileno"=>$_POST['storymobile'],"ispublish"=>$_POST['ispublish']);
            
               if ($obj->isEmptyField($_POST['storyname'])) {
                    echo $obj->printError("Story Name Shouldn't be blank");
               }
                
               if ($obj->isEmptyField($_POST['storytitle'])) {
                    echo $obj->printError("Story Title Shouldn't be blank");
               }
                
               if ($obj->isEmptyField($_POST['storyemail'])) {
                    echo $obj->printError("Email Shouldn't be blank");
                }
                
               if ($obj->isEmptyField($_POST['storymobile'])) {
                    echo $obj->printError("Mobile No Shouldn't be blank");
                }
       
               if ( (isset($_FILES["filepath"]["tmp_name"])) && (strlen(trim($_FILES["filepath"]["tmp_name"]))>0)) { 
                   
                $obj->fileUpload($_FILES['filepath'],"../../assets/".$config['thumb'],$config['imageArray'],$config['imgMaxSize'],$param["filename"]);    
               } 
         
              if ($obj->err==0) {
                 echo (JSuccessStory::updateStory($param)>0) ? $obj->printSuccess("New Success Stories Updated  Successfully") : $obj->printError("Error Updating Success Story");
             }else {
                    echo $obj->printErrors();
             }
            
         $_POST{"editbtn"}="editbtn"; 
               
      } 

      if (isset($_POST{"editbtn"})){
      
       $pageContent = JSuccessStory::getTestimonials($_POST['rowid']);
       
  
     ?> 

                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Edit Testimonials
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['storyid'];?>" id="rowid">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Title</label>
                                        <div class="col-md-3"><input type="text" name="storytitle" class="form-control" value="<?php echo $pageContent[0]['storytitle'];?>"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12"><textarea name="storydescription" class="form-control"><?php echo $pageContent[0]['storydesc'];?></textarea></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Thumb Image:</label>
                                        <div class="col-md-3">
                                            <?php if (strlen(trim($pageContent[0]['filepath']))>0) {?> 
                                            <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath'];?>" align="left" style="margin:5px;border:1px solid #ccc;padding:3px;margin-right:0px;" height="120"><br>
                                        <?php }?>
                                        </div>
                                        <div class="col-md-3">
                                            Is Publish?  <select name="ispublish" class="col-md-3"><option value='1' <?php echo ($pageContent[0]["ispublish"]) ? 'selected="selected"' : '';?>>Yes</option><option value='0' <?php echo ($pageContent[0]["ispublish"]!=1) ? 'selected="selected"' : '';?>>No</option></select><br>
                                            PostedOn:<?php echo $pageContent[0]['postedon'];?>  <br>
                                            <input type="submit" value="Remove Image" name="rmimage" id="rmimage">&nbsp;&nbsp;<input type="file" class="input" name="filepath"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Name</label>
                                        <div class="col-md-3"><input type="text" name="storyname" class="form-control" value="<?php echo $pageContent[0]['storyname'];?>"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Email</label>
                                        <div class="col-md-3"><input type="text" name="storyemail" class="form-control" value="<?php echo $pageContent[0]['email'];?>"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Mobile No.</label>
                                        <div class="col-md-3"><input type="text" name="storymobile" class="form-control" value="<?php echo $pageContent[0]['mobile'];?>"></div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success" name="updatebtn">Update</button>
                                            <button type="button" class="btn btn-warning" name="cancelbtn"  onclick="location.href='https://klx.co.in/klxadmin/dashboard.php?action=successstories/viewtestimonials'">Cancel</button>
                                        </div>                                        
                                    </div>
                                </div>
                            </form>
                                <script>$('#success').hide(3000);</script>
                               <?php
                               exit;
                              } if (isset($_POST{"viewbtn"})){
       
                                $pageContent = JSuccessStory::getTestimonials($_POST['rowid']);?>
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                View Testimonials
                            </div>
                        </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Title</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['storytitle'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Description</label>
                                        <div class="col-md-3">
                                            <?php if (strlen(trim($pageContent[0]['filepath']))>0) {?>
                                            <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath'];?>" align="right" style="margin:5px;border:1px solid #ccc;padding:3px;margin-right:0px;" height="120">
                                             <?php } ?>   
                                            <?php echo $pageContent[0]['storydesc'];?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Name</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['storyname'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Email</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['email'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Mobile No.</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['mobile'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Is Published</label>
                                        <div class="col-md-3">
                                             <?php if ($pageContent[0]["ispublish"]==1) {?>
                                                <span style='color:#08912A;font-weight:bold;'>Published</span> 
                                            <?php } else { ?>
                                                <span style='color:#FF090D;font-weight:bold;'>Un Published</span> 
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Posted On</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['postedon'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Last Modified</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['lastmodified'];?></div>
                                    </div>
                                    <form action='https://klx.co.in/klxadmin/dashboard.php?action=testimonials/managetestimonials' method='post' style='height:0px;'>
                                        <input type='hidden' value='<?php echo $pageContent[0]['storyid'];?>' name='rowid' id='rowid' >
                                        <input style='font-size:11px;' type='submit' name='editbtn' value='Edit'>                                                                                                              
                                        <input style='font-size:11px;' type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='https://klx.co.in/klxadmin/dashboard.php?action=testimonials/viewtestimonials'"> 
                                   </form>
                                </div>
                                <?php
                                    exit;                                                  
                                } 
                               if(isset($_POST{"cdeletebtn"})){
          
                               $pageContent = JSuccessStory::deleteStory($_POST['rowid']); 
                               echo CommonController::printSuccess("Deleted Successfully");
                               echo "<script>setTimeout(\"window.open('viewtestimonials.php','rpanel')\",1500);</script>";  
                              }
                          
                              if (isset($_POST{"deletebtn"})){
                                  
                               $pageContent = JSuccessStory::getTestimonials($_POST['rowid']);
       
                                ?>
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Delete Testimonials
                            </div>
                        </div>
                                <form action="" method="post"> 
                            <input type='hidden' value='<?php echo $pageContent[0]["postadid"]?>' name='rowid' id='rowid' > 
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Title</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['storytitle'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Description</label>
                                        <div class="col-md-3">
                                            <?php if (strlen(trim($pageContent[0]['filepath']))>0) {?>
                                            <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath'];?>" align="right" style="margin:5px;border:1px solid #ccc;padding:3px;margin-right:0px;" height="120">
                                             <?php } ?>   
                                            <?php echo $pageContent[0]['storydesc'];?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Name</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['storyname'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Email</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['email'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Mobile No.</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['mobile'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Is Published</label>
                                        <div class="col-md-3">
                                             <?php if ($pageContent[0]["ispublish"]==1) {?>
                                                <span style='color:#08912A;font-weight:bold;'>Published</span> 
                                            <?php } else { ?>
                                                <span style='color:#FF090D;font-weight:bold;'>Un Published</span> 
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Posted On</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['postedon'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Last Modified</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['lastmodified'];?></div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['storyid'];?>"> 
                                            <button type="submit" class="btn btn-success" name="cdeletebtn">Delete</button>
                                            <button type="button" class="btn btn-warning" name="cancelbtn"  onclick="location.href='https://klx.co.in/klxadmin/dashboard.php?action=testimonials/viewtestimonials'">Cancel</button>
                                        </div>                                        
                                    </div>
                                </div>
                            </form>    
                                  <?php } ?>
<script>$('#success').hide(3000);</script>                                                                                 
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>


