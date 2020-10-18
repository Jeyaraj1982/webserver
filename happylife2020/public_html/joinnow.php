<?php
    include_once("config.php");
    include_once("includes/header.php");
?>
   <main role="main">
      <!-- Content -->
     
        <header class="section background-primary background-transparent text-center" data-image-src="assets/img/parallax-02.jpg" style="padding:50px !important">
            <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Join Now</h1>
            <div class="background-parallax" style="background-image:url(assets/img/parallax-06.jpg)"></div>
        </header>
        <div class="section background-white"> 
        
          <div class="line">
           <div class="margin" style="max-width: 350px;margin:0px auto;">
            <h2 class="text-size-30" style="text-align: center;">Member Registration</h2>
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
            <div class="s-12">
                <button type="submit" class="submit-form button border-radius text-white background-primary" name="submitBtn" value="Sign In">Continue</button>
            </div>
            <div style="text-align:center;font-size:15px;">Not a member yet? <a href="login.php" class="text-primary-hover" style="color:#00B5A6; ">Join Now</a></div>
        </form>
    <?php } ?>       
        </div>
            </div>
        </div>   
        
    </main>
<?php include_once("includes/footer.php"); ?>    