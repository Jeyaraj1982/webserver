<?php
    $obj = new CommonController();
    
     /*   if (!($obj->isLogin())){
            echo $obj->printError("Login Session Expired. Please Login Again");
            exit;
        } */

   if (isset($_POST{"save"})) {
        
                $param = array("storytitle"         =>$_POST['storytitle'],
                               "storydescription"   =>str_replace("'","\\'",$_POST['storydescription']),
                               "storyname"          =>$_POST['storyname'],
                               "email"              =>$_POST['storyemail'],
                               "mobileno"           =>$_POST['storymobile'],
                               "storytype"          =>'S',
                               "ispublish"          =>$_POST['ispublish']);
       
               if ($obj->isEmptyField($_POST['storyname'])) {
                    echo $obj->printError("Name Shouldn't be blank");
                }
                
               if ($obj->isEmptyField($_POST['storytitle'])) {
                    echo $obj->printError("Title Shouldn't be blank");
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
                echo (JSuccessStory::addStory($param)>0) ? $obj->printSuccess("New Success Story Added Successfully") : $obj->printError("Error Adding Page");
                unset($_POST); 
            }else {
            echo $obj->printErrors();
           }                       
   }                                     
?>
<script>
     function getSubcategory(categoryID) {
      $.ajax({url:'../../webservice.php?f=1&action=getSubcategory&categoryID='+categoryID,success:function(data){
          alert(data);
           $('#list_subcategory').html(data);
      }});
     }
 </script>
 <script>
     function getDistrict(stateID) {
      $.ajax({url:'../../webservice.php?f=1&action=getDistrict&stateID='+stateID,success:function(data){
           $('#list_district').html(data);
      }});
     }
 </script>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                New Success Stories
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="Title" class="col-md-3 text-right">Title</label>
                                    <div class="col-md-3"><input type="text" name="storytitle" style="width:100%;" value="<?php echo isset($_POST['storytitle']) ? $_POST['storytitle'] : ""; ?>" autocomplete="off" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <textarea name="storydescription" style="height: 350px;width:100%" class="form-control"><?php echo isset($_POST['storydescription']) ? $_POST['storydescription'] : ""; ?></textarea>
                                    </div>
                               </div>  
                               <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Name</label>
                                    <div class="col-md-3"><input type="text" name="storyname" class="form-control" style="width:100%;" value="<?php echo isset($_POST['storyname']) ? $_POST['storyname'] : ""; ?>" autocomplete="off"></div>
                               </div>
                               <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Email</label>
                                    <div class="col-md-3"><input type="text" name="storyemail" style="width:100%;" class="form-control" value="<?php echo isset($_POST['storyemail']) ? $_POST['storyemail'] : ""; ?>" autocomplete="off"></div>
                               </div> 
                               <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Mobile No.</label>
                                    <div class="col-md-3"><input type="text" name="storymobile" maxlength="10" class="form-control" value="<?php echo isset($_POST['storymobile']) ? $_POST['storymobile'] : ""; ?>" style="width:100%;" autocomplete="off"></div>
                               </div>
                               <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Thumb Image:</label>
                                    <div class="col-md-3"><input type="file" class="input" name="filepath"/></div>
                               </div>
                               <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Is Publish? </label>
                                    <div class="col-md-3"><select name="ispublish" class="form-control"><option value='1'>Publish</option><option value='0'>Unpublish</option></select></div>
                               </div> 
                               <div class="form-group row">
                                    <div class="col-md-12" style="text-align: center;color:red"><?php echo $error;?></div>
                               </div>     
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success" name="save">save</button>
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
<script>$('#success').hide(3000);</script>  