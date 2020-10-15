 
<main id="main">
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Home Page Slider</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-sm-8 col-xs-12" style="margin:0px auto;">
            <div class="well-middle">
                <?php
                    if (isset($_POST['submitBtn'])) {
                        $error = "";
                        $e=0;
                         
                         $target_file = "../assets/profile/";
                         $filename = time()."_".$_FILES["ProfilePhoto"]["name"];
                        if (move_uploaded_file($_FILES["ProfilePhoto"]["tmp_name"], $target_file.$filename)) {
    
  } else {
      $filename="";                           
    $e++;
                            $error = "File upload error";
                        }
 
  
                        if ($e==0) {
                            $language= "";
                              foreach($_POST['Languages'] as $Language){
                                 $language .= $Language.", ";
 
}                           $data = $mysql->select("select * from _Scrollings where ProfilePhoto='".$filename."'");
                if (sizeof($data)==0) {
                      $id =  $mysql->insert("_Scrollings",array(
                                                    
                                                    "ProfilePhoto"  => $filename));
                      if ($id>0) {
                          echo "Added Successfully";
                      }
                }
                        } else {
                            ?>
                                  <div class="row">
                    <div class="col-sm-12">
                        <label style="color:red"><?php echo $error;?></label>
                        
                    </div>
                    </div>
                            <?php
                        }
                        
                        
                        
                       
                    }                                  
                ?>
                <form  enctype="multipart/form-data" action="" method="post">
              <div class="single-well" style="background:#fff;padding:20px;">
                <div class="row">
                    
                   
                    
                        <div class="col-sm-12">
                        <label>Profile Photo</label>
                        <input type="file" class="form-control" required name="ProfilePhoto" id="ProfilePhoto">
                    </div>
                    
                   
                    
                    <div class="col-sm-12">
                      <br><Br>
                        <input type="submit" class="btn btn-primary" name="submitBtn" value="Submit Profile">
                    </div>
                    
                    
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div> 
     