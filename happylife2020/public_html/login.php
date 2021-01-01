<?php include_once("includes/header.php");?>

<div class="breadcrumb-option set-bg" data-setbg="https://www.astrafx.uk/assets/img/banner_0004.png" style="padding:300px 0 60px">
<div class="container">
<div class="row">
<div class="col-lg-12 text-center">
<div class="breadcrumb__text">
<h2>Login</h2>
<div class="breadcrumb__links">
<a href="<?php echo BaseUrl;?>"><i class="fa fa-home"></i> Home</a>
<span>Login</span>
</div>
</div>
</div>
</div>
</div>
</div>


<?php 
    
    if (isset($_POST['submitBtn'])) {
        
        $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='x2".$_POST['emailAddress']."'");
        
        if (sizeof($data)>0) {
            
            if ($data[0]['MemberPassword']==$_POST['loginPassword']) {
                
               // $package = $mysql->select("select * from _tbl_Settings_Packages where PackageID='".$data[0]['CurrentPackageID']."'");
                $data[0]['Role']="Member";
               // $data[0]['PackageIcon']=$package[0]['FileName'];
                $id=$mysql->insert("_tbl_members_login_logs",array("MemberID"  => $data[0]['MemberID'],
                                                                   "LoginOn"   => date("Y-m-d H:i:s"),
                                                                   "IsSuccess" => "1"));
             //   if ($data[0]['RequireMobileOtpLogin']==1) {
             //       $otp = rand(9999,99999);
             //       $data[0]['otp']=$otp;
             //       $_SESSION['XUser']=$data[0];                   
             //       $message = "Your happylife2020.in login code is ". $otp;
             //       MobileSMS::sendSMS($data[0]['MobileNumber'],$message,$data[0]['MemberID']);
             //       echo "<script>location.href='verify.php';</script>";
              //  } else {
                    $_SESSION['User']=$data[0];                   
                    echo "<script>location.href='".BaseUrl."/app/dashboard.php';</script>";
              //  }
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

<section class="contact spad">
<div class="container">
<div class="row">
<div class="col-lg-4 col-md-4" style="margin:0px auto">
<div class="contact__form">
<form action="" method="post">
<h3 style="text-align:center">Login</h3>
<br>              
<b>Astrafx ID</b>
<input type="text" placeholder="Astrafx ID" name="emailAddress" value="<?php echo isset($_POST['emailAddress']) ? $_POST['emailAddress'] : '';?>" style="margin-top:5px;"><br>
<b>Password</b>
<input type="password" placeholder="Password" name="loginPassword"  value="<?php echo isset($_POST['loginPassword']) ? $_POST['loginPassword'] : '';?>"  style="margin-top:5px;">
<button type="submit" class="site-btn" name="submitBtn" style="background:#012068">Login</button>&nbsp;&nbsp;
<?php 
if (isset($error)) {
    echo $error;
}               
?>

</form>
</div>
</div>
</div>
</div>
</section>


 

<?php include_once("includes/footer.php");?>