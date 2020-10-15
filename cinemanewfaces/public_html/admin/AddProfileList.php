 <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<main id="main">
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Register</h2>
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
                        $dupEmail = $mysql->select("select * from _Members where MemberEmail='".trim($_POST['MemberEmail'])."'");
                        if (sizeof($dupEmail)>0) {
                            $e++;
                            $error = "This email already exists";
                        }
                        $dupMobile = $mysql->select("select * from _Members where MemberMobile='".trim($_POST['MemberMobile'])."'");
                        if (sizeof($dupMobile)>0) {
                            $e++;
                            $error = "This mobile number already exists";
                        }
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
 
}                      $data = $mysql->select("select * from _Directories where ProfilePhoto='".$filename."'");
                if (sizeof($data)==0) {
                      $id =  $mysql->insert("_Directories",array(
                                                    "PersonName"    => " ",
                                                    "PhoneNumber"  => " ",
                                                    "Category"      => " ",
                                                    "PlaceName"     => " ",
                                                    "ProfilePhoto"  => $filename));
                                                    
                      /*$id =  $mysql->insert("_Directories",array(
                                                    "PersonName"    => $_POST['MemberName'],
                                                    "PhoneNumber"  => $_POST['MemberMobile'],
                                                    "Category"      => $_POST['Category'],
                                                    "PlaceName"     => $_POST['PlaceName'],
                                                    "ProfilePhoto"  => $filename));  */
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
                  <!--  <div class="col-sm-12">
                        <label>Name</label>
                        <input type="text" class="form-control" required name="MemberName" id="MemberName" value="<?php echo isset($_POST['MemberName']) ? $_POST['MemberName'] : "";?>" placeholder="Person Name">
                    </div>
                   
                    
                    <div class="col-sm-12">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" required name="MemberMobile" id="MemberMobile" value="<?php echo isset($_POST['MemberMobile']) ? $_POST['MemberMobile'] : "";?>" placeholder="Mobile Number">
                    </div>
                    
                    
                          
                     <div class="col-sm-12">
                        <label>Category</label>
                         <select name="Category" id="Category" class="form-control">
                            <option value="artist">Artist</option>
                            <option value="director">Director</option>
                            <option value="musicdirector">Music Director</option>
                            <option value="artdirector">Art Director</option>
                            <option value="makeupman">Makeup Man</option>
                            <option value="technician">Technician</option>
                            <option value="others">Others</option>
                        </select>
                    </div> 
                     
                       <div class="col-sm-12">
                        <label>Place Name</label>
                        <input type="text" class="form-control" required name="PlaceName" id="PlaceName"  value="<?php echo isset($_POST['PlaceName']) ? $_POST['PlaceName'] : "";?>" placeholder="Place Name">
                    </div>
                            
                   
                     -->  
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
     