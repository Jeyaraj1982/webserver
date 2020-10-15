
<?php include_once("header.php");?>

<br><br><br>
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
                         $target_file = "assets/profile/";
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
 
}
                      $id =  $mysql->insert("_Members",array(
                                                    "MemberName"    => $_POST['MemberName'],
                                                    "MemberEmail"   => $_POST['MemberEmail'],
                                                    "MemberMobile"  => $_POST['MemberMobile'],
                                                    "Gender"        => $_POST['Gender'],
                                                    "Age"           => $_POST['Age'],
                                                    "Category"      => $_POST['Category'],
                                                    "BodyHeight"    => $_POST['BodyHeight'],
                                                    "BodyWeight"    => $_POST['BodyWeight'],
                                                    "Fresher"       => $_POST['Fresher'],
                                                    "ExperienceDetails" => $_POST['ExperienceDetails'],
                                                    "PlaceName"     => " ",
                                                    "StateName"     => $_POST['StateName'],
                                                    "DistrictName"  => $_POST['DistrictName'],
                                                    "ProfilePhoto"  => $filename,
                                                    "youtubevideo1" => $_POST['youtubevideo1'],
                                                    "youtubevideo2" => $_POST['youtubevideo2'],
                                                    "Languages" => $language,
                                                    "RegisteredOn"  => date("Y-m-d H:i:s"),
                                                    "IsPaidMember"  => "0"));
                   
                      if ($id>0) {
                          echo "<script>location.href='RequestSubmitted.php?xnd=".md5("x".$id)."';</script>";
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
                        <label>Name</label>
                        <input type="text" class="form-control" required name="MemberName" id="MemberName" value="<?php echo isset($_POST['MemberName']) ? $_POST['MemberName'] : "";?>" placeholder="Person Name">
                    </div>
                     <div class="col-sm-12">
                        <label>Email ID</label>
                        <input type="text" class="form-control" required name="MemberEmail" id="MemberEmail"  value="<?php echo isset($_POST['MemberEmail']) ? $_POST['MemberEmail'] : "";?>" placeholder="Email ID">
                    </div>
                    
                    <div class="col-sm-12">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" required name="MemberMobile" id="MemberMobile" value="<?php echo isset($_POST['MemberMobile']) ? $_POST['MemberMobile'] : "";?>" placeholder="Mobile Number">
                    </div>
                    
                    <div class="col-sm-6">
                        <label>Gender</label>
                        <select name="Gender" class="form-control" id="Gender">
                            <option value="male">Male</option>
                            <option value="female">FeMale</option>
                        </select>
                    </div>
                    
                     <div class="col-sm-6">
                        <label>Age</label>
                        <input type="text" class="form-control" required name="Age" id="Age" value="<?php echo isset($_POST['Age']) ? $_POST['Age'] : "";?>" placeholder="Age">
                    </div>
                          
                     <div class="col-sm-12">
                        <label>Category</label>
                         <select name="Category" id="Category" class="form-control">
                        <?php $statenames = $mysql->select("select * from _Category   order by CategoryName ");?>
                            <?foreach($statenames as $statename) {?>
                            <option value="<?php echo $statename['CategoryName'];?>"><?php echo $statename['CategoryName'];?></option>
                             <?php } ?>
                        </select>
                    </div> 
                    
                      <div class="col-sm-6">
                        <label>Body Height (Centimeters)</label>
                        <input type="text" class="form-control" required name="BodyHeight" id="BodyHeight" value="<?php echo isset($_POST['BodyHeight']) ? $_POST['BodyHeight'] : "";?>" placeholder="Body Height">
                    </div>
                    
                      <div class="col-sm-6">
                        <label>Body Weight (Kg)</label>
                        <input type="text" class="form-control" required name="BodyWeight" id="BodyWeight"  value="<?php echo isset($_POST['BodyWeight']) ? $_POST['BodyWeight'] : "";?>" placeholder="Body Weight">
                    </div>
                    
                    <div class="col-sm-12">
                        <label>Are you fresher?</label>
                        <select name="Fresher" id="Fresher" class="form-control">
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
                    </div>
                       <div class="col-sm-12">
                        <label>Experience Details</label>
                        <input type="text" class="form-control" name="ExperienceDetails" id="ExperienceDetails"  value="<?php echo isset($_POST['ExperienceDetails']) ? $_POST['ExperienceDetails'] : "";?>" placeholder="Experience datails">
                    </div>
                    
                  
                    <div class="col-sm-6">
                        <label>State Name</label>
                        <select name="StateName" id="StateName" class="form-control" onchange="getDistrictName()">
                            <option value="0">Select State Name</option>
                        <?php $statenames = $mysql->select("select * from _jstatenames where countryid='1' order by statenames ");?>
                            <?foreach($statenames as $statename) {?>
                            <option value="<?php echo $statename['statenames'];?>"><?php echo $statename['statenames'];?></option>
                             <?php } ?>
                        </select>
                    </div>
                    
                     <div class="col-sm-6" id="districtnamediv">
                        <label>District Name Name</label>
                        <select name="DistrictName" id="DistrictName" class="form-control">
                           <option value="0">Select District Name</option>
                        </select>
                    </div>
                    
                        <div class="col-sm-12">
                        <label>Profile Photo</label>
                        <input type="file" class="form-control" required name="ProfilePhoto" id="ProfilePhoto">
                    </div>
                    
                        <div class="col-sm-6">
                        <label>Youtube Video Link #1</label>
                        <input type="text" class="form-control" name="youtubevideo1" value="<?php echo isset($_POST['youtubevideo1']) ? $_POST['youtubevideo1'] : "";?>" placeholder="Youtube video link 1">
                    </div>
                    
                      <div class="col-sm-6">
                        <label>Youtube Video Link #2</label>
                        <input type="text" class="form-control" name="youtubevideo2" value="<?php echo isset($_POST['youtubevideo2']) ? $_POST['youtubevideo2'] : "";?>" placeholder="Youtube video link 2">
                    </div>  
                    <div class="col-sm-6">
                  
                        <label>Languages</label>
                        <div>
                        <input type="checkbox" name="Languages[]" value="Tamil"> Tamil   &nbsp;&nbsp;&nbsp;
                        <input type="checkbox" name="Languages[]" value="English"> English &nbsp;&nbsp;&nbsp;
                        <input type="checkbox" name="Languages[]" value="Malayalam"> Malayalam  &nbsp;&nbsp;&nbsp;
                        <input type="checkbox" name="Languages[]" value="Hindi"> Hindi &nbsp;&nbsp;&nbsp;
                        <input type="checkbox" name="Languages[]" value="Telgu"> Telgu &nbsp;&nbsp;&nbsp;
                        </div>
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
     <script>
                                function getDistrictName() {
                                    $.ajax({url:'service.php?action=getDistrictName&statename='+$('#StateName').val(),success:function(data){
                                        $('#districtnamediv').html(data);
                                    }});
                                }
                             </script>
<?php include_once("footer.php"); ?>