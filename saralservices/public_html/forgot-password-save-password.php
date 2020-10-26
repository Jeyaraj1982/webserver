<?php 
include_once("app/config.php");
include_once("header.php");
if (isset($_POST['btnsubmit'])) {
    $data = $mysql->select("Select * from `_tbl_verification_code` where `ReqID`='".$_POST['reqID']."' ");
    $mem = $mysql->select("Select * from `_tbl_Members` where `MemberID`='".$data[0]['MemberID']."' ");
         
         if (!(strlen(trim($_POST['NewPassword']))>=6)) {
            $ErrNewPassword = "Please enter valid new password must have 6 characters";
            $err++;
         } 
         if (!(strlen(trim($_POST['ConfirmNewPassword']))>=6)) {
            $ErrConfirmNewPassword = "Please enter valid confirm new password  must have 6 characters"; 
            $err++;
         } 
         if ($_POST['ConfirmNewPassword']!=$_POST['NewPassword']) {
            $ErrConfirmNewPassword = "Password do not match"; 
            $err++;
         }
         if($err==0){
             $mysql->execute("update _tbl_Members set `MemberPassword`='".$_POST['ConfirmNewPassword']."' where `MemberID`='".$data[0]['MemberID']."'");
             
             $mysql->execute("update _tbl_verification_code set `OldPassword`='".$mem[0]['MemberPassword']."', `NewPassword`='".$_POST['ConfirmNewPassword']."', `Status`='Done' where `ReqID`='".$data[0]['ReqID']."'");
           
         ?>
         <script>
                $(document).ready(function() {        
                    swal({
                        title: "Password Saved Successfully",
                         type: "success",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }).then((value) => {
                        location.href="https://www.saralservices.in"
                    });
                });
        </script>
         <?php }
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
a {
    color: #666;
    text-decoration: none;
}
a:hover {
    color: #ff7e54;
    text-decoration: none;
}
</style>
<section class="section-40 section-md-60 section-lg-90 section-xl-120 bg-gray-dark page-title-wrap overlay-5" style="background-image: url(images/bg-image-4.jpg);">
    <div class="container">
        <div class="page-title text-center">
            <h2>Forgot Password</h2>
        </div>
    </div>
</section>
 <script>
 function SubmitNewPassword() {
      ErrorCount=0; 
    var password = document.getElementById("NewPassword").value;
        var confirmPassword = document.getElementById("ConfirmNewPassword").value;
        if (password != confirmPassword) {
            ErrorCount++;
            $('#ErrConfirmNewPassword').html("Passwords do not match.");
        }
        return (ErrorCount==0) ? true : false;
 }
 </script>
<section id="contact" class="contact">
    <div class="container">
        <div class="section-title">
            <h2 data-aos="fade-up" class="aos-init aos-animate">New Password</h2>
        </div>
        <div class="row justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
            <div class="col-xl-4 col-lg-12 mt-4">
                <form action="" method="post" role="form" onsubmit="return SubmitNewPassword();">
                    <input type="hidden"  value="<?php echo $_POST['reqMobileNumber'];?>" name="reqMobileNumber">
                    <input type="hidden"  value="<?php echo $_POST['reqID'];?>" name="reqID">
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="NewPassword" class="form-control" id="NewPassword" placeholder="New Password"  value="<?php echo (isset($_POST['NewPassword']) ? $_POST['NewPassword'] :"");?>" required>
                        <span class="errorstring" id="ErrNewPassword" style="color: red"><?php echo isset($ErrNewPassword)? $ErrNewPassword : "";?></span>
                    </div>
                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="password" name="ConfirmNewPassword" class="form-control" id="ConfirmNewPassword" placeholder="Confirm New Password"  value="<?php echo (isset($_POST['ConfirmNewPassword']) ? $_POST['ConfirmNewPassword'] :"");?>" required>
                        <span class="errorstring" id="ErrConfirmNewPassword" style="color: red"><?php echo isset($ErrConfirmNewPassword)? $ErrConfirmNewPassword : "";?></span>
                    </div>
                    
                    <?php if (isset($ErrorMessage)) { ?>
                        <div class="form-group" style="color: red"><?php echo $ErrorMessage;?></div>
                    <?php } ?>
                    <div class="text-center"><button type="submit" class="submitBtn" name="btnsubmit">Save My Password</button></div>  <br>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include_once("footer.php"); ?>
