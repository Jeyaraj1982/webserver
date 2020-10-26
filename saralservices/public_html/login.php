<?php 
include_once("app/config.php");
include_once("header.php");?>
<?php
    $cookie_name = "user";
$cookie_value = "Alex Porter";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    if (isset($_POST['btnsubmit'])) {
        
        $sql= "select * from `_tbl_Members` where  `MobileNumber`='".$_POST['MobileNumber']."'";                                         
       
        $data = $mysql->select($sql);
        if (sizeof($data)>0) {
            if ($data[0]['MemberPassword']==$_POST['Password']) {
              if($data[0]['IsActive']=="1") {
                    $_SESSION['User']=$data[0];
                    if ($data[0]['IsAdmin']==1) {
                        $_SESSION['User']['UserRole']="Admin";    
                    }
                    if ($data[0]['IsDistributor']==1) {
                        $_SESSION['User']['UserRole']="Distributor";    
                    }
                    if ($data[0]['IsDealer']==1) {
                        $_SESSION['User']['UserRole']="Dealer";    
                    }
                    if ($data[0]['IsMember']==1) {
                        $_SESSION['User']['UserRole']="Member";    
                    }
                
                    $loginid    = $mysql->insert("_tbl_logs_logins",array("LoginOn"       => date("Y-m-d H:i:s"),
                                                                          "LoginFrom"     => "Web",
                                                                          "Device"        => $clientinfo['Device'],
                                                                          "MemberID"      => $data[0]['MemberID'],
                                                                          "MemberCode"    => $data[0]['MemberCode'],
                                                                          "MobileNumber"  => $data[0]['MobileNumber'],
                                                                          "BrowserIP"     => $clientinfo['query'],
                                                                          "LoginStatus"     => "1",
                                                                          "CountryName"   => $clientinfo['country'],
                                                                          "BrowserName"   => $clientinfo['UserAgent'],
                                                                          "APIResponse"   => json_encode($clientinfo),
                                                                          "LoginPassword" => $_POST['Password']));  
                    echo "<script>location.href='https://www.saralservices.in/app/dashboard.php';</script>";     
                    exit;
                } else {
                    $ErrorMessage = "Account Deactivated";
                } 
            } else {
                $ErrorMessage = "Mobile Number Password Incorrect";
            } 
        } else {
            $ErrorMessage = "login failed";
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
            <h2>Join Now</h2>
        </div>
    </div>
</section>

<section id="contact" class="contact">
    <div class="container">
        <div class="section-title">
            <h2 data-aos="fade-up" class="aos-init aos-animate">Login to your account</h2>
        </div>
        <div class="row justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
            <div class="col-xl-4 col-lg-12 mt-4">
                <form action="" method="post" role="form" onsubmit="return SubmitNewMember();">
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="text" name="MobileNumber" class="form-control" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :"");?>" id="MobileNumber" placeholder="Mobile Number" required>
                        <div class="validate" id="ErrMobileNumber"></div>
                        <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                       <input type="password" class="form-control" name="Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>" id="Password" placeholder="Password" required>
                       <div class="validate"></div>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                        <label class="custom-control-label" for="customCheck">Remember me</label>
                    </div>
                    <?php if (isset($ErrorMessage)) { ?>
                        <div class="form-group" style="color: red"><?php echo $ErrorMessage;?></div>
                    <?php } ?>
                    <div class="text-center"><button type="submit" class="submitBtn" name="btnsubmit">Sign in</button></div>  <br>
                    <div class="text-center"> <a href="https://www.saralservices.in/forgotpassword.php">Forget Password</a></div>
                    <!--<div class="text-center"> <a href="https://wa.me/919566999505?text=I forgotten my password. please send">Forget Password</a></div>-->
                </form>
            </div>
        </div>
    </div>
</section>

<?php include_once("footer.php"); ?>
