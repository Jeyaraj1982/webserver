<?php
    include_once("config.php");
    include_once("header.php");
?>
<main>
    <div class="customer-page mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                    <div class="login">
                        <div id="CustomerLoginForm">
                            <form method="post" action="" id="customer_login" accept-charset="UTF-8">
                                <div class="login-form-container">
                                    <div class="login-text">
                                        <h2>Login</h2> 
                                    </div>
                                    <div class="login-form">
           <?php
                                                                                                               
           if (isset($_POST['submitBtn'])) {
            
            $epin =$mysql->select("SELECT * FROM `_tblEpins` where `EPIN`='".$_POST['Epin']."' and `PINPassword`='".$_POST['PinPassword']."'");
            
            if (sizeof($epin)==1)  {
                
                if ($epin[0]['IsUsed']==0) {
                    
                    $data = md5($epin[0]['EPIN'].$epin[0]['PINPassword'].$epin[0]['EPINID']);
                    ?>
                    <form action="createmember.php" class="customform ajax-form" id="signupCForm" method="post">
                        <input type="hidden" value="<?php echo $data;?>" name="data">
                        <div class="s-12">
                            <label for="Epin">Sponser ID</label>
                            <input type="text" class="form-control" readonly="readonly" value="<?php echo $epin[0]['OwnToCode'];?>">
                        </div>
                        <div class="s-12">
                            <label for="Epin">Sponser Name</label>
                            <input type="text" class="form-control" readonly="readonly"  value="<?php echo $epin[0]['OwnToName'];?>">
                        </div>
                        <div class="s-12">
                            <label for="Epin">E-Pin</label>
                            <input type="text" class="form-control" readonly="readonly"  value="<?php echo $epin[0]['EPIN'];?>">
                        </div>
                        <button class="submit-form button border-radius text-white background-primary" name="submitBtn" type="submit">Confirm & Continue</button>
                    </form>
                    <?php
                    $isSuccess=true;                   

                } else {
                    $error = "Entered epin already used.";
                }
            } else {
                $error = "Invalid epin & pin password.";
            }

        }   
    
    if (!(isset($isSuccess) && $isSuccess==true)) {
    ?>
    
    
        <form action="" class="customform ajax-form" method="post">
            <div class="s-12">
                <label for="username" class="placeholder">Epin<span style="color:red">*</span></label><br>
                <input id="Epin" name="Epin" type="text" placeholder="Enter your EPin" class=" subject" required style="background:#fff">
            </div>
            <div class="s-12">
                <label for="password" class="placeholder">Pin Password<span style="color:red">*</span></label><br>
                <input id="PinPassword" name="PinPassword" placeholder="Enter your Epin password" type="password" class="  subject" required style="background:#fff">
            </div>
            <?php if (isset($error)) { ?>
            <div class="s-12">
                <label for="password" class="placeholder"><?php echo $error;?></label>
            </div>
            <?php } ?>
            
            <div class="login-toggle-btn">
                                            <div class="form-action-button">
                                                <button type="submit" class="theme-default-button" name="submitBtn">Continue</button>
                                            </div>
                                        </div>
                                        
            <br>
            <div style="text-align:center;font-size:15px;">Already a member? <a href="login.php" class="text-primary-hover" style="color:#00B5A6; ">Login Now</a></div>
        </form>
    <?php } ?>       
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