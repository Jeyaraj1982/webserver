<?php include_once("includes/header.php"); ?>
<div style="height:50px">
</div>
 <section id="contact" class="section-padding">    
      <div class="container">
        <div class="section-header text-center">          
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Member Login</h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        <div class="row contact-form-area wow fadeInUp" data-wow-delay="0.3s"> 
        <div class="margin" style="max-width: 350px;margin:0px auto;">
            
               
            
               <?php 
    include_once("config.php");
    if (isset($_POST['submitBtn'])) {
        $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_POST['emailAddress']."'");
      
        
        if (sizeof($data)>0) {
            
            if ($data[0]['MemberPassword']==$_POST['loginPassword']) {
                
                $package = $mysql->select("select * from _tbl_Settings_Packages where PackageID='".$data[0]['CurrentPackageID']."'");
                $data[0]['Role']="Member";
                $data[0]['PackageIcon']=$package[0]['FileName'];
                $id=$mysql->insert("_tbl_members_login_logs",array("MemberID"  => $data[0]['MemberID'],
                                                                   "LoginOn"   => date("Y-m-d H:i:s"),
                                                                   "IsSuccess" => "1"));
                if ($data[0]['RequireMobileOtpLogin']==1) {
                    $otp = rand(9999,99999);
                    $data[0]['otp']=$otp;
                    $_SESSION['XUser']=$data[0];                   
                    $message = "Your login code is ". $otp;
                    MobileSMS::sendSMS($data[0]['MobileNumber'],$message,$data[0]['MemberID']);
                    echo "<script>location.href='verify.php';</script>";
                } else {
                    $_SESSION['User']=$data[0];                   
                    echo "<script>location.href='app/dashboard.php';</script>";
                }
            } else {
                $error = "<span style='color:red'>Member ID or Password incorrect</span>";
                $id=$mysql->insert("_tbl_members_login_logs",array("MemberID"  => $_SESSION['User']['MemberID'],
                                                                   "LoginOn"   => date("Y-m-d H:i:s"),
                                                                   "IsSuccess" => "0")); 
            } 
        } else {
            $error = "<span style='color:red'>login failed</span>";
        }   
    }
?>
                      
         
            <form action=""   method="post">
            <div class="line">
                <div class="form-group">
                    <label for="username" class="placeholder">Member ID<span style="color:red">*</span></label><br>
                    <input id="username" class="form-control" name="emailAddress" type="text" placeholder="Enter your MemberID" class=" subject" required style="background:#fff">
                    
                </div>
                <div class="form-group">
                    <label for="password" class="placeholder">Password<span style="color:red">*</span></label><br>
                    <input id="password" class="form-control" name="loginPassword" placeholder="Enter your password" type="password" class="  subject" required style="background:#fff">
                </div>
                <?php if (isset($error)) { ?>
                <div class="form-group">
                    <label for="password" class="placeholder"><?php echo $error;?></label>
                </div>
                <?php } ?>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="submitBtn" value="Sign In">Sign In</button>
                </div>
                </form>
         

                
                 
           <div style="text-align:center;font-size:15px;">Already a member? <a href="joinnow.php" class="text-primary-hover" style="color:#00B5A6; ">Join Now</a>    </div>
            </div>
    </div>
</div>
</section>
<?php include_once("includes/footer.php"); ?>    