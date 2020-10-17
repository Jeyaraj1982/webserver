<?php include_once("header.php"); ?>
<div class="main-panel"  style="width: 100%;height:auto !important">
    <div class="container">
        <div class="page-inner">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Post</h4>
                </div>
                <div class="card-body">
                    <?php 
                        $obj = new CommonController();  
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
                            $mysql->execute("update _jpostads set isdelete=1 where postadid=".$_POST['rowid']);
                            echo $obj->printSuccess("Deleted Successfully");
                            $_POST{"editbtn"}="editbtn"; 
                        }
                        
                        if(isset($_POST{"updatebtn"})) {
                            
                            $pageContent = $mysql->select("select * from _jpostads where postadid=".$_POST['rowid']);           
                            $param = array("postadid"=>$_POST['rowid'],"categid"=>$_POST['categid'],"subcategory"=>$_POST['subcategory'],"title"=>$_POST['title'],"content"=>str_replace("'","\\'",$_POST['content']),"adtype"=>$_POST['adtype'],"filename1"=>$filename1,"filename2"=>$filename2,"state"=>$_POST['state'],"district"=>$_POST['district'],"location"=>$_POST['location'],"amount"=>$_POST['amount'],"postby"=>$_SESSION['USER']['userid']);
                            if ( (isset($_FILES["filepath1"]["tmp_name"])) && (strlen(trim($_FILES["filepath1"]["tmp_name"]))>0)) { 
                                $obj->fileUpload($_FILES['filepath1'],"assets/".$config['thumb'],$config['imageArray'],$config['imgMaxSize'],$param["filename1"]);  
                            } 
                            if ( (isset($_FILES["filepath2"]["tmp_name"])) && (strlen(trim($_FILES["filepath2"]["tmp_name"]))>0)) { 
                                $obj->fileUpload($_FILES['filepath2'],"assets/".$config['thumb'],$config['imageArray'],$config['imgMaxSize'],$param["filename2"]);  
                            } 
                            if ($obj->err==0){
                                echo (JPostads::updatePostads($param,$_GET['ad'])>0) ? $obj->printSuccess("Post Ads Updated  Successfully") : $obj->printError("Error Updating Post Ads");
                            } else {
                                    
                            }
                            //$_POST{"editbtn"}="editbtn"; 
                        }            
      
                        $pageContent =JPostads::getMyAd($_GET['ad'],$_SESSION['USER']['userid']); 
                    ?> 
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['postadid'];?>" id="rowid">
                        <div class="row mb-2">
                         <div class="col-sm-12">
                            <label>Published To<?php echo $slsubcategory[0]['subcatename'];?>123</label>
                            <select name="state" class="form-control" id="state" onchange="getDistrict($(this).val())">
                                <option value="0" selected="selected">Select State Name</option> 
                                <?php foreach(JPostads::getStateNames() as $statename) {?>
                                <option value="<?php echo $statename['stateid'];?>" <?php echo ($statename['stateid']==$pageContent[0]['stateid'])? 'selected="selected"':'';?>><?php echo $statename['statenames'];?></option>
                                <?php } ?>
                            </select> 
                            </div> 
                        </div>   
                        <div class="row mb-2">
                         <div class="col-sm-12">
                            <select name="district" class="form-control" id="district">
                                <?php foreach(JPostads::getDistricts($pageContent[0]['stateid']) as $district) {?>  
                                <option value="<?php echo $district['distcid'];?>" <?php echo ($district['distcid']==$pageContent[0]['distcid'])? 'selected="selected"':'';?>><?php echo $district['districtname'];?></option> 
                                <?php } ?> 
                            </select>    
                            </div>
                        </div>
                        <div class="row mb-2">
                         <div class="col-sm-12">
                            <label>Category</label>
                             <select name="categid" id="categid"  class="form-control" onchange="getSubcategory($(this).val())">
                                <option value="0" selected="selected">Select Category Name</option>
                                <?php foreach(JPostads::getCategory() as $category) {?>
                                <option value="<?php echo $category['categid'];?>" <?php echo ($category['categid']==$pageContent[0]['categid'])? 'selected="selected"' : '';?>><?php echo $category['categname'];?></option>
                                <?php } ?>
                             </select>
                             </div>
                        </div>
                        <div class="row mb-2">
                         <div class="col-sm-12">
                            <label>Sub Category</label>
                            <select name="subcategory" id="subcategory" class="form-control">
                                <option value="0" selected="selected">Select Sub Category</option> 
                            </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <label>Title</label> 
                                <input type="text" name="title" class="form-control" value="<?php echo $pageContent[0]['title'];?>">
                            </div>
                        </div> 
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <label>Content</label>
                                <textarea style="height:170px;" class="form-control" name="content"><?php echo $pageContent[0]['content'];?></textarea>
                            </div>
                        </div>
                            <div class="row mb-2">
                            <div class="col-sm-12">
                                <label>Location</label>
                                <input type="text" name="location"  class="form-control" value="<?php echo $pageContent[0]['location'];?>">
                            </div>         
                        </div>
                             <div class="row mb-2">
                            <div class="col-sm-12">
                                <label>Amount</label>
                                <input type="text" name="amount" class="form-control" value="<?php echo $pageContent[0]['amount'];?>">
                            </div>
                        </div>
                       <div class="row mb-2" >
                        <div class="col-sm-6">
                         <?php if (strlen(trim($pageContent[0]['filepath1']))>0) {?> 
                                            <img src="<?php echo base_url;?>/assets/<?php echo $config['thumb'].$pageContent[0]['filepath1'];?>" style="border:1px solid #ccc;padding:3px;margin-right:0px;" height="120"> <br>
                                            <input type="submit" value="Remove Image" name="rmimage" id="rmimage">
                                            <?php }?>
                                            <input type="file" class="input" name="filepath1"/>
                        </div>
                        <div class="col-sm-6">
                                 <?php if (strlen(trim($pageContent[0]['filepath2']))>0) {?> 
                                            <img src="../../assets/<?php echo $config['thumb'].$pageContent[0]['filepath2'];?>"  style="border:1px solid #ccc;padding:3px;margin-right:0px;" height="120"> <br>
                                            <input type="submit" value="Remove Image" name="rmimage_t" id="rmimage_t">
                                            <?php }?>
                                            <input type="file" class="input" name="filepath2"/>
                        </div>
                       </div>
                       <div class="row mb-2" >
                        <div class="col-sm-12">
                        <input type="submit" name="updatebtn" class="btn btn-primary" value="Update" >&nbsp;&nbsp;&nbsp;
                        <!--<input type="submit" name="unpublishbtn" value="Unpublish" bgcolor="grey">&nbsp;&nbsp;&nbsp;
                        <input type="submit" name="deletebtn" value="Delete" bgcolor="grey">-->
                        </div>
                       </div>
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
<script>

    function getSubcategory(categoryID,sCategoryID) {
        $.ajax({url:'<?php echo base_url;?>webservice.php?action=getSubcategory&categoryID='+categoryID+'&sCategoryID='+sCategoryID,success:function(data){
           $('#subcategory').html(data);
           getAdtype(categoryID);
        }});
    }
    
    //setTimeout("getSubcategory('<?php echo $pageContent[0]['categid'];?>')",1500); 
     
     setTimeout("loadPre()","1000");
     function getDistrict(stateID,distID) {
         $.ajax({url:'<?php echo base_url;?>webservice.php?action=getDistrict&stateID='+stateID+'&distID='+distID,success:function(data){
           $('#district').html(data);
         }});
     }
 
     //setTimeout("getDistrict('<?php echo $pageContent[0]['stateid'];?>')",1500);
     
     function loadPre() {
        getSubcategory('<?php echo $pageContent[0]['categid'];?>','<?php echo $pageContent[0]['subcateid'];?>');
        getDistrict('<?php echo $pageContent[0]['stateid'];?>','<?php echo $pageContent[0]['distcid'];?>');
        getAdtype('<?php echo $pageContent[0]['categid'];?>');  
     }
 
     function getAdtype(categoryID) {
      $.ajax({url:'<?php echo base_url;?>webservice.php?action=getAdtype&categoryID='+categoryID,success:function(data){
           $('#adtype').html(data);
      }});
     }
     
    // setTimeout("getAdtype('<?php echo $pageContent[0]['categid'];?>')",1500);
 </script> 
 
 <table cellpadding="5" cellspacing="0" align="center" style="font-family:arial;font-size:12px;color:#222;width:100%">
                            <tr>
                                <td style="text-align:right;"></td>
                                <td>
                                   
                                </td>
                                <td align="left" style="font-family:'Trebuchet MS';font-size:12px;">No.of Visitors:&nbsp;&nbsp;&nbsp;<?php echo $pageContent[0]['visitors'];?><br>
                                    <span><b>Posted On:</b>&nbsp;&nbsp;&nbsp;<?php echo $pageContent[0]['postedon'];?></span>
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
                                <td></td>
                                <td align="left">
                                
                                </td> 
                            </tr>                                     
                        </table>               
<?php include_once("footer.php");?>