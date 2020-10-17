 
<?php 


if (isset($_GET['rowid'])) {
    $_POST['rowid']=$_GET['rowid'];
}
if (isset($_GET['btn'])) {
    $_POST[$_GET['btn']]=$_GET['btn'];
}
 
    $obj = new CommonController();  
         //   if (!($obj->isLogin())){
         //       echo $obj->printError("Login Session Expired. Please Login Again");
         //       exit;
         //   }
    
     if (isset($_POST['rmimage'])) {
                    $mysql->execute("update _jpostads set filepath1='' where postadid=".$_POST['rowid']);
                    echo $obj->printSuccess("Image Removed Successfully");
                    $_POST{"editbtn"}="editbtn";
               }
               
               if (isset($_POST['rmimage_t'])) {
                    $mysql->execute("update _jpostads set filepath2='' where postadid=".$_POST['rowid']);
                    echo $obj->printSuccess("Image Removed Successfully");
                    $_POST{"editbtn"}="editbtn";
               }
               
               if (isset($_POST['unpublishbtn'])) {
                    $mysql->execute("update _jpostads set ispublish=2 where postadid=".$_POST['rowid']);
                    echo $obj->printSuccess("Post Ad UnPublished Successfully");
                    $_POST{"editbtn"}="editbtn";
               }
               
               if (isset($_POST['cdeletebtn'])) {
                 //   $mysql->execute("update _jpostads set isdeleted=1,deletedon='".date("Y-m-d H:i:s")."' where postadid=".$_POST['rowid']);
                    
                    echo $obj->printSuccess("Deleted Successfully");
                   $_POST{"editbtn"}="editbtn"; 
                   
                   
                       $d = $mysql->select("select * from _jpostads  where postadid='".$_POST['rowid']."'");
         $filename = ((strlen(trim($d[0]['filepath1']))>4) && file_exists("/home/klxco/public_html/assets/".$config['thumb'].$d[0]['filepath1'])) ? "assets/".$config['thumb'].$d[0]['filepath1'] : "";
              
         if ($filename!="") {
             
                
                   if (copy("/home/klxco/public_html/".$filename,"/home/ztemp_klx/".$d[0]['filepath1'])) 
                   {
                    unlink("/home/klxco/public_html/".$filename);
                    $mysql->insert("_jpostads_deleted",array(
                    "postadid"=>$d[0]['postadid'],
                    "categid"=>$d[0]['categid'],
                    "subcateid"=>$d[0]['subcateid'],
                    "title"=>$d[0]['title'],
                    "content"=>$d[0]['content'],
                    "postedon"=>$d[0]['postedon'],
                    "visitors"=>$d[0]['visitors'],
                    "isactive"=>$d[0]['isactive'],
                    "isdelete"=>$d[0]['isdelete'],
                    "postedby"=>$d[0]['postedby'],
                    "adtype"=>"0",
                    "stateid"=>$d[0]['stateid'],
                    
                    "countryid"=>$d[0]['countryid'],
                    "distcid"=>$d[0]['distcid'],
                    "ispublish"=>$d[0]['ispublish'],
                    "expiredon"=>$d[0]['expiredon'],
                    "filepath1"=>$d[0]['filepath1'],
                    "filepath2"=>$d[0]['filepath2'],
                    "ispaid"=>$d[0]['ispaid'],
                    "location"=>$d[0]['location'],
                    "amount"=>$d[0]['amount'],
                    "isdeleted"=>"1",
                    "deletedon"=>date("Y-m-d H:i:s"),
                    "pposted"=>$d[0]['pposted']));
                    $mysql->execute("delete from _jpostads  where postadid='".$_POST['rowid']."'");
                              }
           
                   
                   
                   
                   
                   
                   
               }
               }
               
       if(isset($_POST{"updatebtn"})) {
         
            $pageContent = $mysql->select("select * from _jpostads where postadid=".$_POST['rowid']);           
            
            $param = array("postadid"=>$_POST['rowid'],"categid"=>$_POST['categid'],"subcategory"=>$_POST['subcategory'],"title"=>$_POST['title'],"content"=>str_replace("'","\\'",$_POST['content']),"adtype"=>$_POST['adtype'],"filename1"=>$filename1,"filename2"=>$filename2,"state"=>$_POST['state'],"district"=>$_POST['district'],"location"=>$_POST['location'],"amount"=>$_POST['amount'],"postby"=>$_SESSION['USER']['userid']);
               
            if ( (isset($_FILES["filepath1"]["tmp_name"])) && (strlen(trim($_FILES["filepath1"]["tmp_name"]))>0)) { 
                $obj->fileUpload($_FILES['filepath1'],"../../assets/".$config['thumb'],$config['imageArray'],$config['imgMaxSize'],$param["filename1"]);  
            } 
            
            if ( (isset($_FILES["filepath2"]["tmp_name"])) && (strlen(trim($_FILES["filepath2"]["tmp_name"]))>0)) { 
                $obj->fileUpload($_FILES['filepath2'],"../../assets/".$config['thumb'],$config['imageArray'],$config['imgMaxSize'],$param["filename2"]);  
            } 
           
         if ($obj->err==0){
             echo (JPostads::updatePostads($param)>0) ? $obj->printSuccess("Post Ads Updated  Successfully") : $obj->printError("Error Updating Post Ads");
         }
        $_POST{"editbtn"}="editbtn"; 
     }   ?>
     
     <div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
      
 <?php     if (isset($_POST{"editbtn"})){
                
      $pageContent =JPostads::getPostad($_POST['rowid']); 
      
     ?> 
     
 <script>
 setTimeout("loadPre()","1000");
     function loadPre() {
        getSubcategory('<?php echo $pageContent[0]['categid'];?>');
        getDistrict('<?php echo $pageContent[0]['stateid'];?>');
        getAdtype('<?php echo $pageContent[0]['categid'];?>');  
     }
 
     function getAdtype(categoryID) {
      $.ajax({url:'https://klx.co.in/klxadmin/postad/webservice.php?action=getAdtype&categoryID='+categoryID,success:function(data){
           $('#adtype').html(data);
      }});
     }
     
    // setTimeout("getAdtype('<?php echo $pageContent[0]['categid'];?>')",1500);
 </script>
<script>
     function getDistrict(stateID) {
      $.ajax({url:'https://klx.co.in/klxadmin/postad/webservice.php?action=getDistrict&stateID='+stateID,success:function(data){
           $('#district').html(data);
      }});
     }
 
     //setTimeout("getDistrict('<?php echo $pageContent[0]['stateid'];?>')",1500);
</script>                  
<script>
     function getSubcategory(categoryID) {
      $.ajax({url:'https://klx.co.in/klxadmin/postad/webservice.php?action=getSubcategory&categoryID='+categoryID,success:function(data){
           $('#subcategory').html(data);
           getAdtype(categoryID);
      }});
     }

     //setTimeout("getSubcategory('<?php echo $pageContent[0]['categid'];?>')",1500); 
 </script>                                                                                                   

                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Edit PostAds
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['postadid'];?>" id="rowid">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Published To</label>
                                        <div class="col-md-3">
                                            <select name="state" id="state" onchange="getDistrict($(this).val())" class="form-control">
                                                <option value="0" selected="selected">Select State Name</option> 
                                                <?php foreach(JPostads::getStateNames() as $statename) {?>
                                                    <option value="<?php echo $statename['stateid'];?>" <?php echo ($statename['stateid']==$pageContent[0]['stateid'])? 'selected="selected"':'';?>><?php echo $statename['statenames'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3"> 
                                            <select name="district" id="district" class="form-control">
                                                <?php foreach(JPostads::getDistricts($pageContent[0]['stateid']) as $district) {?>  
                                                <option value="<?php echo $district['distcid'];?>" <?php echo ($district['distcid']==$pageContent[0]['distcid'])? 'selected="selected"':'';?>><?php echo $district['districtname'];?></option> 
                                                <?php } ?> 
                                            </select>  
                                        </div>
                                        <div class="col-md-3">
                                            No.of Visitors:&nbsp;&nbsp;&nbsp;<?php echo $pageContent[0]['visitors'];?><br>
                                            <span><b>Posted On:</b>&nbsp;&nbsp;&nbsp;<?php echo $pageContent[0]['postedon'];?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Category</label>
                                        <div class="col-md-3">
                                            <select name="categid" id="categid" class="form-control" onchange="getSubcategory($(this).val())">
                                                <option value="0" selected="selected">Select Category Name</option>
                                                    <?php foreach(JPostads::getCategory() as $category) {?>
                                                    <option value="<?php echo $category['categid'];?>" <?php echo ($category['categid']==$pageContent[0]['categid'])? 'selected="selected"' : '';?>><?php echo $category['categname'];?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Subcategory</label>
                                        <div class="col-md-3">
                                            <select name="subcategory" class="form-control" id="subcategory">
                                                <option value="0" selected="selected">Select Sub Category</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Type of Ad.</label>
                                        <div class="col-md-3">
                                            <select name="adtype" class="form-control" id="adtype">
                                                <option value="0" selected="selected">Select Ad Type</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Title</label>
                                        <div class="col-md-3"><input type="text" name="title" class="form-control" value="<?php echo $pageContent[0]['title'];?>"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Content</label>
                                        <div class="col-md-3"><textarea name="content" class="form-control"><?php echo $pageContent[0]['content'];?></textarea></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Location</label>
                                        <div class="col-md-3"><input type="text" name="location" class="form-control" value="<?php echo $pageContent[0]['location'];?>"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">amount</label>
                                        <div class="col-md-3"><input type="text" name="amount" class="form-control" value="<?php echo $pageContent[0]['amount'];?>"></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">&nbsp;</label>
                                        <div class="col-md-3">
                                            <b>Upload Image</b><br>
                                            <?php if (strlen(trim($pageContent[0]['filepath1']))>0) {?> 
                                            <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath1'];?>" style="border:1px solid #ccc;padding:3px;margin-right:0px;" height="120"> <br>
                                            <input type="submit" value="Remove Image" name="rmimage" id="rmimage">
                                            <?php }?> <br>
                                            <input type="file" class="input" name="filepath1"/>
                                        </div>    
                                        <div class="col-md-3">
                                            <b>Upload Image</b><br>
                                            <?php if (strlen(trim($pageContent[0]['filepath2']))>0) {?> 
                                            <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath2'];?>"  style="border:1px solid #ccc;padding:3px;margin-right:0px;" height="120"> <br>
                                            <input type="submit" value="Remove Image" name="rmimage_t" id="rmimage_t">
                                            <?php }?> <br>
                                            <input type="file" class="input" name="filepath2"/>
                                        </div>    
                                    </div>
                                </div>
                                <div class="card-action">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success" name="updatebtn">Update</button>
                                            <button type="submit" class="btn btn-warning" name="unpublishbtn">UnPublish</button>
                                            <button type="submit" class="btn btn-danger" name="deletebtn">Delete</button>
                                        </div>                                        
                                    </div>
                                </div>
                            </form>
                                <script>$('#success').hide(3000);</script>
                               <?php
                               exit;
                              } if (isset($_POST{"viewbtn"})){
       
                                $pageContent =JPostads::getPostad($_POST['rowid']); ?>      
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                View PostAds
                            </div>
                        </div>
                                <form action="managepostads.php" method="post"> 
                            <input type='hidden' value='<?php echo $pageContent[0]["postadid"]?>' name='rowid' id='rowid' > 
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Post Ad Id</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['postadid'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Ad Title</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['title'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Ad Description</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['content'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Location</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['location'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Amount</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['amount'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Posted On</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['postedon'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">IsActive</label>
                                        <div class="col-md-3">
                                             <?php if ($pageContent[0]["isactive"]==1) {?>
                                                <span style='color:#08912A;font-weight:bold;'>Active</span> 
                                            <?php } else { ?>
                                                <span style='color:#FF090D;font-weight:bold;'>In Active</span> 
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Is Delete</label>
                                        <div class="col-md-3">
                                             <?php if ($pageContent[0]["isdelete"]==1) {?>
                                                <span style='color:#08912A;font-weight:bold;'>Delete</span> 
                                            <?php } else { ?>
                                                <span style='color:#FF090D;font-weight:bold;'>UnDelete</span> 
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Is Published</label>
                                        <div class="col-md-3">
                                             <?php if ($pageContent[0]["ispublish"]==1) {?>
                                                <span style='color:#08912A;font-weight:bold;'>Published</span>  
                                            <?php }else { ?>
                                                <span style='color:#FF090D;font-weight:bold;'>Unpublished</span> 
                                            <?php  }?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Expired On</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['expiredon'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Upload Image</label>
                                        <div class="col-md-3">
                                            <?php if (strlen(trim($pageContent[0]['filepath1']))>0) {?>    
                                                <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath1'];?>" align="left" style="margin:0px;border:1px solid #ccc;padding:3px;margin-right:0px;" height="120">
                                              <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Upload Image</label>
                                        <div class="col-md-3">
                                            <?php if (strlen(trim($pageContent[0]['filepath2']))>0) {?>    
                                                <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath2'];?>" align="left" style="margin:0px;border:1px solid #ccc;padding:3px;margin-right:0px;" height="120">
                                              <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success" name="editbtn">Edit</button>
                                            <button type="button" class="btn btn-warning" name="cancelbtn"  onclick="location.href='https://klx.co.in/klxadmin/dashboard.php?action=postad/viewpostads'">Cancel</button>
                                        </div>                                        
                                    </div>
                                </div>
                            </form>
                                <?php
                                    exit;
                                } 
                                if (isset($_POST{"deletebtn"})){
                                  $pageContent =JPostads::getPostad($_POST['rowid']);
                                ?>
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Delete PostAds
                            </div>
                        </div>
                                <form action="managepostads.php" method="post"> 
                            <input type='hidden' value='<?php echo $pageContent[0]["postadid"]?>' name='rowid' id='rowid' > 
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Post Ad Id</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['postadid'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Ad Title</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['title'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Ad Description</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['content'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Location</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['location'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Amount</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['amount'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Posted On</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['postedon'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">IsActive</label>
                                        <div class="col-md-3">
                                             <?php if ($pageContent[0]["isactive"]==1) {?>
                                                <span style='color:#08912A;font-weight:bold;'>Active</span> 
                                            <?php } else { ?>
                                                <span style='color:#FF090D;font-weight:bold;'>In Active</span> 
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Is Delete</label>
                                        <div class="col-md-3">
                                             <?php if ($pageContent[0]["isdelete"]==1) {?>
                                                <span style='color:#08912A;font-weight:bold;'>Delete</span> 
                                            <?php } else { ?>
                                                <span style='color:#FF090D;font-weight:bold;'>UnDelete</span> 
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Is Published</label>
                                        <div class="col-md-3">
                                             <?php if ($pageContent[0]["ispublish"]==1) {?>
                                                <span style='color:#08912A;font-weight:bold;'>Published</span>  
                                            <?php }else { ?>
                                                <span style='color:#FF090D;font-weight:bold;'>Unpublished</span> 
                                            <?php  }?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Expired On</label>
                                        <div class="col-md-3"><?php echo $pageContent[0]['expiredon'];?></div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Upload Image</label>
                                        <div class="col-md-3">
                                            <?php if (strlen(trim($pageContent[0]['filepath1']))>0) {?>    
                                                <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath1'];?>" align="left" style="margin:0px;border:1px solid #ccc;padding:3px;margin-right:0px;" height="120">
                                              <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Name" class="col-md-3 text-right">Upload Image</label>
                                        <div class="col-md-3">
                                            <?php if (strlen(trim($pageContent[0]['filepath2']))>0) {?>    
                                                <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath2'];?>" align="left" style="margin:0px;border:1px solid #ccc;padding:3px;margin-right:0px;" height="120">
                                              <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success" name="cdeletebtn">Delete</button>
                                            <button type="button" class="btn btn-warning" name="cancelbtn"  onclick="location.href='https://klx.co.in/klxadmin/dashboard.php?action=postad/viewpostads'">Cancel</button>
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



 