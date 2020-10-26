<?php 
include_once("app/config.php");
include_once("header.php");
if (isset($_POST['btnsubmit'])) {
    $data = $mysql->select("Select * from `_tbl_verification_code` where `ReqID`='".$_POST['reqID']."' ");
             if (sizeof($data)>0) {
                 if ($data[0]['SecurityCode']==$_POST['VerificationCode']) { ?>
                     <form action="https://www.saralservices.in/forgot-password-save-password.php" id="reqFrm" method="post">
                        <input type="hidden" value="<?php echo $data[0]['ReqID'];?>" name="reqID">
                        <input type="hidden" value="<?php echo $data[0]['SMSTo'];?>" name="reqMobileNumber">
                     </form>
                    <script>document.getElementById("reqFrm").submit();</script>
                <?php } else{
                        $ErrVerificationCode ="Invalid Verfication Code";
                    }
             } else {
                    $ErrorMessage ="Invalid Access";
             }                 
} 
$resend = "";
    if (isset($_POST['reqMobileNumber'])) {
        $resend = $_POST['reqMobileNumber'];
    } elseif (isset($data[0]['SMSTo'])) {
        $resend = $data[0]['SMSTo'];
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

<section id="contact" class="contact">
    <div class="container">
        <div class="section-title">
            <h2 data-aos="fade-up" class="aos-init aos-animate">Forgot Password</h2>
        </div>
        <div class="row justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
            <div class="col-xl-4 col-lg-12 mt-4">
                <form action="" method="post" role="form" onsubmit="return SubmitNewMember();">
                    <input type="hidden"  value="<?php echo $_POST['reqMobileNumber'];?>" name="reqMobileNumber">
                    <input type="hidden"  value="<?php echo $_POST['reqID'];?>" name="reqID">
                    <div class="form-group">
                        <input type="text" name="VerificationCode" class="form-control" id="VerificationCode" placeholder="VerificationCode"  value="<?php echo (isset($_POST['VerificationCode']) ? $_POST['VerificationCode'] :"");?>" required>
                        <div class="validate" id="ErrVerificationCode"></div>
                        <span class="errorstring" id="ErrVerificationCode"><?php echo isset($ErrVerificationCode)? $ErrVerificationCode : "";?></span>
                    </div>
                    
                    <?php if (isset($ErrorMessage)) { ?>
                        <div class="form-group" style="color: red"><?php echo $ErrorMessage;?></div>
                    <?php } ?>
                    <div class="text-center"><button type="submit" class="submitBtn" name="btnsubmit">Verify Code</button></div>  <br>
                </form>
                <div class="form-group" style="text-align: center;">
                    <a href="javascript:void(0)" onclick="ResendForgetPasswordOtp()" class="link float-right" style="cursor: pointer;">Resend</a>
                    <form action="https://www.saralservices.in/forgotpassword.php" id="reqFrm" method="post">
                        <input type="hidden" value="<?php echo $resend;?>" name="MobileNumber">
                        <button type="submit" hidden="hidden" name="btnsubmit" id="btnsubmit" class="btn btn-primary glow position-relative w-100">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
 <script>
        function ResendForgetPasswordOtp() {
            $( "#btnsubmit" ).trigger( "click" );
        }
    </script>
<?php include_once("footer.php"); ?>
