<?php 
include_once("app/config.php");
include_once("header.php");

if (isset($_POST['btnsubmit'])) {
               $data = $mysql->select("Select * from `_tbl_Members` where `MobileNumber`='".$_POST['MobileNumber']."'");
               if (sizeof($data)==0)  {  ?>
               <script>
                $( document ).ready(function() {
                swal("Account Not Found!", {
                        icon : "failure",
                        buttons: {                    
                            confirm: {
                                className : 'btn btn-success'                                                                  
                            }
                        },
                    });
                });
            </script>
                <?php
                    }  else{   
                        $otp=rand(1000,9999);
                        $securitycode = $mysql->insert("_tbl_verification_code",array("MemberID"      => $data[0]['MemberID'],
                                                                                      "MemberName"    => $data[0]['MemberName'],
                                                                                      "RequestSentOn" => date("Y-m-d H:i:s"),
                                                                                      "SecurityCode"  => $otp,
                                                                                      "SMSTo"         => $data[0]['MobileNumber'])) ; 
                        $message = "Dear Member, Your forgetpassword otp is ".$otp."   Thanks Saral Services";
                          MobileSMS::sendSMS($_POST['MobileNumber'],$message,$data[0]['MemberID']);  
                                                                          
                ?>
                        <form action="https://www.saralservices.in/forgot-password-otp.php" id="reqFrm" method="post">
                            <input type="hidden" value="<?php echo $securitycode;?>" name="reqID">
                            <input type="hidden" value="<?php echo $data[0]['MobileNumber'];?>" name="reqMobileNumber">
                        </form>
                    <script>document.getElementById("reqFrm").submit();</script>
                <?php    } 
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
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="text" name="MobileNumber" class="form-control" id="MobileNumber" placeholder="Mobile Number"  value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :"");?>" required>
                        <div class="validate" id="ErrMobileNumber"></div>
                        <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                    </div>
                    
                    <?php if (isset($ErrorMessage)) { ?>
                        <div class="form-group" style="color: red"><?php echo $ErrorMessage;?></div>
                    <?php } ?>
                    <div class="text-center"><button type="submit" class="submitBtn" name="btnsubmit">Continue</button></div>  <br>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include_once("footer.php"); ?>
