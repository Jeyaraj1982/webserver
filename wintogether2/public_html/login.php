<?php
 include_once("config.php");
 include_once("header.php"); 
   
    if (isset($_POST['submitBtn'])) {
        $data = $mysql->select("select * from `_tbl_Members` where  `MemberCode`='".$_POST['emailAddress']."'");
        
        if (sizeof($data)>0) {
            
            if ($data[0]['MemberPassword']==$_POST['loginPassword']) {
                
                if($data[0]['IsActive']=="0"){
                    $error = "<span style='color:red;font-size:13px'>Member Blocked, Please Contact Administrator</span>";
                }else {
                    $package = $mysql->select("select * from _tbl_Settings_Packages where PackageID='".$data[0]['CurrentPackageID']."'");
                $data[0]['Role']="Member";
                $data[0]['PackageIcon']=$package[0]['FileName'];
                $id=$mysql->insert("_tbl_members_login_logs",array("MemberID"  => $data[0]['MemberID'],
                                                                   "LoginOn"   => date("Y-m-d H:i:s"),
                                                                   "IsSuccess" => "1"));
               // if ($data[0]['RequireMobileOtpLogin']==1) {
               //     $otp = rand(9999,99999);
               //     $data[0]['otp']=$otp;
               //     $_SESSION['XUser']=$data[0];                   
               //     $message = "Your happylife2020.in login code is ". $otp;
                // //   MobileSMS::sendSMS($data[0]['MobileNumber'],$message,$data[0]['MemberID']);
                //    echo "<script>location.href='verify.php';</script>";
              //  } else {
                    $_SESSION['User']=$data[0];      
                    if($data[0]['MemberTxnPassword']==""){
                        echo "<script>location.href='app/dashboard.php';</script>";     
                    }else {             
                        echo "<script>location.href='app/dashboard.php';</script>";
                    }
               // }    
                    
                } 
            } else {
                $error = "<span style='color:red;font-size:13px'>Member ID or Password incorrect</span>";
                $id=$mysql->insert("_tbl_members_login_logs",array("MemberID"  => $_SESSION['User']['MemberID'],
                                                                   "LoginOn"   => date("Y-m-d H:i:s"),
                                                                   "IsSuccess" => "0")); 
            } 
        } else {
            $error = "<span style='color:red;font-size:13px'>login failed</span>";
        }   
    }
?>
                         
         
        


<main>
    <div class="customer-page mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                    <div class="login">
                        <div id="CustomerLoginForm">
                            <form method="post" action="" id="customer_login" accept-charset="UTF-8">
                                <div class="login-form-container" style="background: none;">
                                    <div class="login-text">
                                        <h2>Member Login</h2> 
                                    </div>
                                    <div class="login-form" style="border: none;padding-top:0px">
                                        <input type="text" name="emailAddress" id="emailAddress" class="input-full" value="<?php echo (isset($_POST['emailAddress']) ? $_POST['emailAddress'] :"");?>" placeholder="Member ID" autocorrect="off" autocapitalize="off" autofocus="" style="border:1px solid #ccc">
                                        <input type="password" value="" name="loginPassword" id="loginPassword" value="<?php echo (isset($_POST['loginPassword']) ? $_POST['loginPassword'] :"");?>" class="input-full" placeholder="Password"  style="border:1px solid #ccc;margin-bottom:5px">
                                        <?php if (isset($error)) { ?>
                                        <div class="s-12" style="text-align: center;">
                                            <label for="password" class="placeholder"><?php echo $error;?></label>
                                        </div>
                                        <?php } ?>
                                        <div class="login-toggle-btn">
                                            <div class="form-action-button">
                                                <button type="submit" class="theme-default-button" name="submitBtn">Sign In</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include_once("footer.php"); ?>