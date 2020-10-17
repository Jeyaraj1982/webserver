<?php include_once("../../config.php"); ?>
<script src="../../assets/js/jquery-1.7.2.js"></script>
<link rel="stylesheet" href="./../../assets/css/demo.css">
<body style="margin:0px;">
<?php 


    $obj = new CommonController();  
            if (!($obj->isLogin())){
                echo $obj->printError("Login Session Expired. Please Login Again");
                exit;
            }
    
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
                    $mysql->execute("update _jpostads set isdeleted=1,deletedon='".date("Y-m-d H:i:s")."' where postadid=".$_POST['rowid']);
                    
                    echo $obj->printSuccess("Deleted Successfully");
                   $_POST{"editbtn"}="editbtn"; 
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
     } 
      
      if (isset($_POST{"editbtn"})){
          
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
      $.ajax({url:'webservice.php?action=getAdtype&categoryID='+categoryID,success:function(data){
           $('#adtype').html(data);
      }});
     }
     
    // setTimeout("getAdtype('<?php echo $pageContent[0]['categid'];?>')",1500);
 </script>
<script>
     function getDistrict(stateID) {
      $.ajax({url:'webservice.php?action=getDistrict&stateID='+stateID,success:function(data){
           $('#district').html(data);
      }});
     }
 
     //setTimeout("getDistrict('<?php echo $pageContent[0]['stateid'];?>')",1500);
</script>                  
<script>
     function getSubcategory(categoryID) {
      $.ajax({url:'webservice.php?action=getSubcategory&categoryID='+categoryID,success:function(data){
           $('#subcategory').html(data);
           getAdtype(categoryID);
      }});
     }

     //setTimeout("getSubcategory('<?php echo $pageContent[0]['categid'];?>')",1500); 
 </script>
<style>
table {font-family:'Trebuchet MS';font-size:13px;color:#222;width:100%}
textarea {font-family:'Trebuchet MS';font-size:13px;color:#222;width:100%}
</style>
<div class="titleBar">Edit PostAds</div>  
            <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['postadid'];?>" id="rowid">
                        <table cellpadding="5" cellspacing="0" align="center" style="font-family:arial;font-size:12px;color:#222;width:100%">
                            <tr>
                                <td style="text-align:right;">Published To</td>
                                <td>
                                   <select name="state" id="state" onchange="getDistrict($(this).val())" style="width:180px;">
                                    <option value="0" selected="selected">Select State Name</option> 
                                        <?php foreach(JPostads::getStateNames() as $statename) {?>
                                            <option value="<?php echo $statename['stateid'];?>" <?php echo ($statename['stateid']==$pageContent[0]['stateid'])? 'selected="selected"':'';?>><?php echo $statename['statenames'];?></option>
                                        <?php } ?>
                                     </select> 
                                     <select name="district" id="district"  style="width:180px;">
                                        <?php foreach(JPostads::getDistricts($pageContent[0]['stateid']) as $district) {?>  
                                        <option value="<?php echo $district['distcid'];?>" <?php echo ($district['distcid']==$pageContent[0]['distcid'])? 'selected="selected"':'';?>><?php echo $district['districtname'];?></option> 
                                        <?php } ?> 
                                    </select>  
                                </td>
                                <td align="left" style="font-family:'Trebuchet MS';font-size:12px;">No.of Visitors:&nbsp;&nbsp;&nbsp;<?php echo $pageContent[0]['visitors'];?><br>
                                    <span><b>Posted On:</b>&nbsp;&nbsp;&nbsp;<?php echo $pageContent[0]['postedon'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:right;">Category&nbsp;&nbsp;</td>
                                <td>
                                    <select name="categid" id="categid" style="width:365px" onchange="getSubcategory($(this).val())">
                                    <option value="0" selected="selected">Select Category Name</option>
                                        <?php foreach(JPostads::getCategory() as $category) {?>
                                        <option value="<?php echo $category['categid'];?>" <?php echo ($category['categid']==$pageContent[0]['categid'])? 'selected="selected"' : '';?>><?php echo $category['categname'];?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:right;">Subcategory&nbsp;&nbsp;</td>
                                <td>
                                    <select name="subcategory" id="subcategory" style="width:365px">
                                        <option value="0" selected="selected">Select Sub Category</option> 
                                    </select>
                                </td>
                           </tr>
                           <tr>
                                <td style="text-align:right;">Type of Ad.&nbsp;&nbsp;</td>
                                <td>
                                    <select name="adtype" id="adtype" style="width:365px">
                                        <option value="0" selected="selected">Select Ad Type</option> 
                                    </select>
                               </td>
                           </tr>
                           <tr>
                                <td style="text-align:right;">Title&nbsp;&nbsp;</td>
                                <td><input type="text" name="title" style="width:365px;" value="<?php echo $pageContent[0]['title'];?>"></td> 
                           </tr>
                           <tr>
                                <td style="text-align:right;">Content&nbsp;&nbsp;</td>
                                <td><textarea style="width:365px;height:170px;" name="content"><?php echo $pageContent[0]['content'];?></textarea></td> 
                           </tr>
                           <tr>
                                <td style="text-align:right;">Location&nbsp;&nbsp;</td>
                                <td><input type="text" name="location" style="width:365px;" value="<?php echo $pageContent[0]['location'];?>"></td> 
                           </tr>
                           <tr>
                                <td style="text-align:right;">Amount&nbsp;&nbsp;</td>
                                <td><input type="text" name="amount" style="width:365px;" value="<?php echo $pageContent[0]['amount'];?>"></td> 
                           </tr>
                           <tr>
                                <td></td>
                                <td>
                                  <table>
                                    <tr>
                                        <td style="width: 300;font-size:12px;"><b>Upload Image</b></td>
                                        <td style="font-size:12px;"><b>Upload Image</b></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:left;">
                                            <?php if (strlen(trim($pageContent[0]['filepath1']))>0) {?> 
                                            <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath1'];?>" style="border:1px solid #ccc;padding:3px;margin-right:0px;" height="120"> <br>
                                            <input type="submit" value="Remove Image" name="rmimage" id="rmimage">
                                            <?php }?>
                                        </td>
                                        <td style="text-align:left;">
                                            <?php if (strlen(trim($pageContent[0]['filepath2']))>0) {?> 
                                            <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath2'];?>"  style="border:1px solid #ccc;padding:3px;margin-right:0px;" height="120"> <br>
                                            <input type="submit" value="Remove Image" name="rmimage_t" id="rmimage_t">
                                            <?php }?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="file" class="input" name="filepath1"/></td>                        
                                        <td><input type="file" class="input" name="filepath2"/></td>                        
                                    </tr>
                                </table>
                                </td> 
                            </tr>
                            <tr>
                                <td></td>
                                <td align="left"><input type="submit" name="updatebtn" value="Update" bgcolor="grey">&nbsp;&nbsp;&nbsp;<input type="submit" name="unpublishbtn" value="Unpublish" bgcolor="grey">&nbsp;&nbsp;&nbsp;<input type="submit" name="deletebtn" value="Delete" bgcolor="grey"></td> 
                            </tr>                                     
                        </table>
                    </form>
                     <script>$('#success').hide(3000);</script>
       <?php
       exit;
      }
     
      if (isset($_POST{"viewbtn"})){
       
          $pageContent =JPostads::getPostad($_POST['rowid']); 
      ?>
        <div class="titleBar">View PostAds</div> 
               <form action="managepostads.php" method="post"> 
                <input type='hidden' value='<?php echo $pageContent[0]["postadid"]?>' name='rowid' id='rowid' > 
                <table cellpadding="5" cellspacing="0" align="center" style="font-family:arial;font-size:12px;color:#222;width:100%">
                    <tr>
                        <td>Post Ad Id</td>
                        <td><?php echo $pageContent[0]['postadid'];?></td>
                    </tr>
                    <tr>
                        <td>Ad Title</td>
                        <td><?php echo $pageContent[0]['title'];?></td>
                    </tr>
                    <tr>
                        <td style="width:150px">Ad Description</td>
                        <td style="text-align:justify;font-family:arial;font-size:12px;">
                            <?php echo $pageContent[0]['content'];?>
                        </td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td><?php echo $pageContent[0]['location'];?></td>
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td><?php echo $pageContent[0]['amount'];?></td>
                    </tr>
                    <tr>
                        <td>Posted On</td>
                        <td><?php echo $pageContent[0]['postedon'];?></td>
                    </tr>
                    <tr>
                        <td>Is Active</td>  
                        <td> <?php if ($pageContent[0]["isactive"]==1) {?>
                                <span style='color:#08912A;font-weight:bold;'>Active</span> 
                            <?php } else { ?>
                                <span style='color:#FF090D;font-weight:bold;'>In Active</span> 
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td >Is Delete</td>  
                        <td> <?php if ($pageContent[0]["isdelete"]==1) {?>
                                <span style='color:#08912A;font-weight:bold;'>Delete</span> 
                            <?php } else { ?>
                                <span style='color:#FF090D;font-weight:bold;'>UnDelete</span> 
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Is Published</td>  
                        <td> <?php if ($pageContent[0]["ispublish"]==1) {?>
                                <span style='color:#08912A;font-weight:bold;'>Published</span>  
                            <?php }else { ?>
                                <span style='color:#FF090D;font-weight:bold;'>Unpublished</span> 
                            <?php  }?>
                        </td>
                    </tr>
                    <tr>
                        <td>Expired On</td>
                        <td><?php echo $pageContent[0]['expiredon'];?></td>
                    </tr>
                    <tr>
                        <td>Upload Image</td>
                        <td>
                          <?php if (strlen(trim($pageContent[0]['filepath1']))>0) {?>    
                            <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath1'];?>" align="left" style="margin:0px;border:1px solid #ccc;padding:3px;margin-right:0px;" height="120">
                          <?php } ?>
                        </td>
                    </tr> 
                    <tr>
                        <td>Upload Image</td> 
                        <td>
                          <?php if (strlen(trim($pageContent[0]['filepath2']))>0) {?>    
                            <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath2'];?>" align="left" style="margin:0px;border:1px solid #ccc;padding:3px;margin-right:0px;" height="120">
                          <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input style='font-size:11px;' type='submit' name='editbtn' value='Edit'>
                            <input style='font-size:11px;' type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='viewpostads.php'"> 
                        </td>
                    </tr>
                </table>
            </form>
            </td>
        </tr>
    </table>        
        
       <?php
       exit;
      }
      if (isset($_POST{"deletebtn"})){
        
      $pageContent =JPostads::getPostad($_POST['rowid']);
       
       ?>
        <div class="titleBar">Delete PostAds</div> 
               <form action="managepostads.php" method="post"> 
                <input type='hidden' value='<?php echo $pageContent[0]["postadid"]?>' name='rowid' id='rowid' > 
                <table cellpadding="5" cellspacing="0" align="center" style="font-family:arial;font-size:12px;color:#222;width:100%">
                    <tr>
                        <td>Post Ad Id</td>
                        <td><?php echo $pageContent[0]['postadid'];?></td>
                    </tr>
                    <tr>
                        <td>Ad Title</td>
                        <td><?php echo $pageContent[0]['title'];?></td>
                    </tr>
                    <tr>
                        <td style="width:150px">Ad Description</td>
                        <td style="text-align:justify;font-family:arial;font-size:12px;">
                            <?php echo $pageContent[0]['content'];?>
                        </td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td><?php echo $pageContent[0]['location'];?></td>
                    </tr>
                    <tr>
                        <td>Amount</td>
                        <td><?php echo $pageContent[0]['amount'];?></td>
                    </tr>
                    <tr>
                        <td>Posted On</td>
                        <td><?php echo $pageContent[0]['postedon'];?></td>
                    </tr>
                    <tr>
                        <td>Is Active</td>  
                        <td> <?php if ($pageContent[0]["isactive"]==1) {?>
                                <span style='color:#08912A;font-weight:bold;'>Active</span> 
                            <?php } else { ?>
                                <span style='color:#FF090D;font-weight:bold;'>In Active</span> 
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td >Is Delete</td>  
                        <td> <?php if ($pageContent[0]["isdelete"]==1) {?>
                                <span style='color:#08912A;font-weight:bold;'>Delete</span> 
                            <?php } else { ?>
                                <span style='color:#FF090D;font-weight:bold;'>UnDelete</span> 
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Is Published</td>  
                        <td> <?php if ($pageContent[0]["ispublish"]==1) {?>
                                <span style='color:#08912A;font-weight:bold;'>Published</span> 
                             <?php }else { ?>
                                <span style='color:#FF090D;font-weight:bold;'>Unpublished</span> 
                             <?php }?>
                        </td>
                    </tr>
                    <tr>
                        <td>Expired On</td>
                        <td><?php echo $pageContent[0]['expiredon'];?></td>
                    </tr>
                    <tr>
                        <td>Upload Image</td>
                        <td>
                          <?php if (strlen(trim($pageContent[0]['filepath1']))>0) {?>    
                            <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath1'];?>" align="left" style="margin:0px;border:1px solid #ccc;padding:3px;margin-right:0px;" height="120">
                          <?php } ?>
                        </td>
                    </tr> 
                    <tr>
                        <td>Upload Image</td> 
                        <td>
                          <?php if (strlen(trim($pageContent[0]['filepath2']))>0) {?>    
                            <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath2'];?>" align="left" style="margin:0px;border:1px solid #ccc;padding:3px;margin-right:0px;" height="120">
                          <?php } ?>
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Delete" name="cdeletebtn">
                <input style='font-size:11px;' type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='viewpostads.php'"> 
         </form>
       <?php } ?>
<script>$('#success').hide(3000);</script> 
</body>