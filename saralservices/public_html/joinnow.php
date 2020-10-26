<?php include_once("header.php");?>
<script>
function SubmitNewMember() {
    $('#Errname').html("");
    ErrorCount=0;
    IsNonEmpty("name","Errname","Please Enter name");
    if (ErrorCount==0) {
                            return true;
                        } else{
                            return false;
                        }
                 
}                             
</script>
<?php 
include_once("app/config.php");
if (isset($_POST['btnsubmit'])) {
    $error=0;
    $data = $mysql->select("select * from `_tbl_Members` where  `MobileNumber`='".$_POST['mobilenumber']."'");
    if (sizeof($data)>0) {
            $error++;
            $errormsg = "Mobile Number Already Exists";
        }
    $data = $mysql->select("select * from `_tbl_Members` where  `EmailID`='".$_POST['email']."'");
    if (sizeof($data)>0) {
            $error++;
            $errormsg = "EmailID Already Exists";
        }
  if ($error==0) {
   $id= $mysql->insert("_tbl_Members",array("MemberName"      => $_POST['name'],
                                            "MobileNumber"    => $_POST['mobilenumber'],
                                            "EmailID"         => $_POST['email'],
                                            "MemberPassword"  => $_POST['password'],
                                            "CreatedOn"       => date("Y-m-d H:i:s"),
                                            "IsMember"        => "1",
                                            "IsMember"        => "1",
                                            "IsActive"        => "1",
                                            "MapedTo"         => "1",
                                            "MapedToName"     => "Admin"));
 unset($_POST); ?>
     <script>
     setTimeout(
   //  function(){swal("Registered Successfully!", "", "success"); },1500);
     function(){swal({
  title: "Registered Successfully",
  type: "success",
  closeOnConfirm: false,
  showLoaderOnConfirm: true
}, function () {
 location.href="https://www.saralservices.in/login.php"
});},1500);
                
            </script>

<?php    }   else { ?>

             <script>
             setTimeout(
                     function(){swal({
                  title: "<?php echo $errormsg;?>",
                  type: "warning",
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                });},1500);
             
            </script>
            <?php
        }
}
?>
<style>
.submitBtn{
    background: #ff7e54;
border: 0;                                                                                 
padding: 10px 24px;
color: #fff;
transition: 0.4s;
cursor: pointer;
}
</style>
<section class="section-40 section-md-60 section-lg-90 section-xl-120 bg-gray-dark page-title-wrap overlay-5" style="background-image: url(images/bg-image-4.jpg);">
    <div class="container">
        <div class="page-title text-center">
            <h2>Join Now</h2>
        </div>
    </div>
</section>

<section id="contact" class="contact">
    <div class="container">
        <div class="section-title">
            <h2 data-aos="fade-up" class="aos-init aos-animate">Join Now</h2>
        </div>
        <div class="row justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
            <div class="col-xl-4 col-lg-12 mt-4">
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label>Retailer Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : "";?>" placeholder="Retailer Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" / required>
                        <div class="validate" id="Errname"></div>
                        <span class="errorstring" id="Errname"><?php echo isset($Errname)? $Errname : "";?></span>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                       <input type="text" class="form-control" name="email" id="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : "";?>" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" / required>
                       <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="text" class="form-control" name="mobilenumber" value="<?php echo isset($_POST['mobilenumber']) ? $_POST['mobilenumber'] : "";?>" id="mobilenumber" placeholder="Mobile Number" data-rule="minlen:10" data-msg="Please enter a valid mobile number" / required>
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : "";?>" id="password" placeholder="Password" data-rule="minlen:6" data-msg="Please enter at least 6 chars" / required>
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="confirmpassword" value="<?php echo isset($_POST['confirmpassword']) ? $_POST['confirmpassword'] : "";?>" id="confirmpassword" placeholder="Confirm Password" data-rule="minlen:6" data-msg="Please enter at least 6 chars" / required>
                        <div class="validate"></div>                              
                    </div>
                   
                    <div class="text-center"><button type="submit" class="submitBtn" name="btnsubmit">Register</button></div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include_once("footer.php"); ?>
