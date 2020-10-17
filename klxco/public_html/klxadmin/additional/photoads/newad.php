<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Add Photo Addvertisement
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data"  >
                            <div class="card-body">  
                            
                            <?php
     $obj = new CommonController();
     
          if(isset($_POST{"save"})) {
            
         
            
           
                  if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 20971520) {
         $errors[]='File size must be excately 20 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../assets/photoads/".$file_name);
         
         
            $param=array("FileName" => $file_name,
                              
                               "CreatedOn"      => date("Y-m-d H:i:s"));
                               
               $id = $mysql->insert("Ads_Photo",$param);
               
               if(sizeof($id)>0){
                   unset($_POST);
                  echo $obj->printSuccess("Saved Successfully");
              }  else {
                  echo $obj->printError("Error");
              }  
         
         
      }else{
         echo $obj->printError(implode(",",$errors));
      }
   }
                  
               
            
      }                             
?>
 
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">File</label>
                                    <div class="col-md-3">
                                        <input type="file" name="image" required="required">
                                        <span class="errorstring" id="Errfile"></span>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success" name="save">Save</button>
                                        <a href="dashboard.php?action=additional/photoads/manage" class="btn btn-outline-success">Back</a>
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