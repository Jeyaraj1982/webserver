<?php
    include_once("../../config.php"); 
     $obj = new CommonController();
     
          if(isset($_POST{"save"})) {
            
                if ($obj->isEmptyField($_POST['title'])) {
                    echo $obj->printError("Title Shouldn't be blank");
                }
                
                $param=array("categid"=>$_POST['categid'],"subcategory"=>$_POST['subcategory'],"title"=>$_POST['title'],"content"=>str_replace("'","\\'",$_POST['content']),"adtype"=>$_POST['adtype'],"state"=>$_POST['state'],"district"=>$_POST['district'],"postedby"=>$_SESSION['USER']['userid']);  
               
                if ( (isset($_FILES["filepath1"]["tmp_name"])) && (strlen(trim($_FILES["filepath1"]["tmp_name"]))>0)) { 
                    $obj->fileUpload($_FILES['filepath1'],"../../assets/".$config['thumb'],$config['imageArray'],$config['imgMaxSize'],$param["filename1"]);  
                } 
                
                if ( (isset($_FILES["filepath2"]["tmp_name"])) && (strlen(trim($_FILES["filepath2"]["tmp_name"]))>0)) { 
                    $obj->fileUpload($_FILES['filepath2'],"../../assets/".$config['thumb'],$config['imageArray'],$config['imgMaxSize'],$param["filename2"]);  
                }
                
           if ($obj->err==0) {

           echo (JPostads::addPostads($param)>0) ? $obj->printSuccess("New Postads added successfully") : $obj->printError("Error adding Postads");
           unset($_POST);
           }
      }
?>

 <script>
     function getSubcategory(categoryID) {
      $.ajax({url:'webservice.php?action=getSubcategory&categoryID='+categoryID,success:function(data){
           $('#subcategory').html(data);
      }});
     }
 </script>
 <script>
     function getDistrict(stateID) {
      $.ajax({url:'webservice.php?action=getDistrict&stateID='+stateID,success:function(data){
           $('#district').html(data);
      }});
     }
 </script>
<script src="../../assets/js/jquery-1.7.2.js"></script>  
<link rel="stylesheet" href="../../assets/css/demo.css">
<style>
table {font-family:'Trebuchet MS';font-size:13px;color:#222;width:100%}
textarea {font-family:'Trebuchet MS';font-size:13px;color:#222;width:100%}
</style>
 <body style="margin:0px;">
 <div class="titleBar">Post New Ads</div>
 <table cellpadding="5" cellspacing="0" width="100%">
    <tr>
        <td style="vertical-align: top;">
                <form action="" method="post" style="background-color:#fff;" enctype="multipart/form-data"> 
                    <table style="margin:0px auto;color: #333;font-family:'Trebuchet MS';font-size: 13px;" cellpadding="3" cellspacing="0" align="left">
                        <tr>
                            <td style="text-align:left;">Published To</td>
                            <td>
                                <select name="state" id="state" onchange="getDistrict($(this).val())" style="width:180px;">
                                <option value="0" selected="selected">Select State Name</option> 
                                    <?php foreach(JPostads::getStateNames() as $statename) {?>
                                        <option value="<?php echo $statename['stateid'];?>" <?php echo ($statename['stateid']==$pageContent[0]['stateid'])? 'selected="selected"':'';?><?php echo isset($_POST['state']) ? $_POST['state'] : ""; ?>><?php echo $statename['statenames'];?></option>
                                    <?php } ?>
                                 </select> 
                                 <select name="district" id="district"  style="width:180px;">
                                <option value="0" selected="selected">Select District Name</option> 
                                </select> 
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:left;">Category&nbsp;&nbsp;</td>
                            <td>
                                <select style="width:365px" name="categid" id="categid" onchange="getSubcategory($(this).val())">
                                <option value="0" selected="selected">Select Category</option>
                                    <?php foreach(JPostads::getCategory() as $category) {?>
                                    <option value="<?php echo $category['categid'];?>"<?php echo isset($_POST['categid']) ? $_POST['categid'] : ""; ?>><?php echo $category['categname'];?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:left;">Subcategory&nbsp;&nbsp;</td>
                            <td>
                                <select style="width:365px" name="subcategory" id="subcategory">
                                    <option value="0" selected="selected">Select Sub Category</option> 
                                </select>
                            </td>
                       </tr>
                       <tr>
                            <td style="text-align:left;">Type of Ad.&nbsp;&nbsp;</td>
                            <td><label ><input type="radio" name="adtype" value="1" selected="selected"/>I want to Sell</label>&nbsp;&nbsp;
                                <label ><input type="radio" name="adtype" value="2" selected="selected" />I want to Buy</label>&nbsp;&nbsp;
                                <label ><input type="radio" name="adtype" value="3" selected="selected" />I want to Rent/Lease</label>
                            </td> 
                       </tr>
                       <tr>
                             <td style="text-align:left;">Title&nbsp;&nbsp;</td>
                             <td><input type="text" name="title" style="width:365px" maxlength="74" value="<?php echo isset($_POST['title']) ? $_POST['title'] : ""; ?>"></td> 
                       </tr>
                       <tr>
                             <td style="text-align:left;vertical-align: top">Content&nbsp;&nbsp;</td>
                             <td><textarea style="width:365px;height:170px;" name="content"><?php echo isset($_POST['content']) ? $_POST['content'] : ""; ?></textarea></td> 
                       </tr>
                       <tr>
                            <td style="text-align:left;">Add Image</td>
                            <td><table>
                                <tr>
                                    <td><input type="file" class="input" name="filepath1"/></td>                        
                                    <td><input type="file" class="input" name="filepath2"/></td>                        
                                </tr>
                                </table> 
                            </td>
                        </tr>
                       <tr>
                            <td></td>
                            <td align="left"><input type="submit" name="save" value="Post Ad" bgcolor="grey">  
                       </tr> 
                    </table>
                </form>
              <script>$('#success').hide(3000);</script> 
        </td>
    </tr>
  </table>
  </body>
                    


