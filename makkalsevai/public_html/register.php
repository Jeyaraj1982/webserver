<?php include_once("header.php"); ?>
<div class="row" style="margin-top:100px">  
    <div class="col-xl-5 offset-xl-3">
        <div class="login-register-page">
            <div class="welcome-text">
                <h3 style="font-size: 26px;">Let's create your account!</h3>
            </div>
            <?php
              $error = 1;
                if (isset($_POST['Register'])) {


                    if (strlen(trim($_POST['CustomerName']))==0) {
                        $CustomerName = "Please enter Customer Name";
                        $error++; 
                    }
                    
                    if (strlen(trim($_POST['MMMobileNumber']))==0) {
                        $MMMobileNumber = "Please enter Mobile Number";
                        $error++; 
                    } 
                     if (strlen(trim($_POST['MMMobileNumber']))!=10) {
                        $MMMobileNumber = "Please enter valid mobile number";
                        $error++; 
                    } 
                    
                     if (!(trim($_POST['MMMobileNumber'])<=9999999999 && trim($_POST['MMMobileNumber'])>=6000000000 )) {
                        $MMMobileNumber = "Invalid mobile number";
                        $error++; 
                    } 
                    
                    if (strlen(trim($_POST['PPPassword']))==0) {
                        $PPPassword = "Please enter Password";
                        $error++; 
                    } 
                   
                    
                    $duplicateMobile = $mysql->select("select * from _tbl_customers where MobileNumber='".trim($_POST['MMMobileNumber'])."'");
                    if (sizeof($duplicateMobile)>0) {
                        $MMMobileNumber = "Mobile Number already exists";
                        $error++;
                    }
                    
                    if ($error==1) {
                      $data = array("CustomerName" => $_POST['CustomerName'],
                                                           "MobileNumber" => trim($_POST['MMMobileNumber']),
                                                           "Password"     => trim($_POST['PPPassword']),
                                                           "CreatedOn"    => date("Y-m-d H:i:s"));
                
                      
                   $id =  $mysql->insert("_tbl_customers",$data); 
                   $error=0;
                   ?>
                   <div style="text-align:center;">
  Your registration Compelted.
  
   <button class="button full-width button-sliding-icon ripple-effect margin-top-10"  onclick="location.href='services.php'"> Continue <i class="icon-material-outline-arrow-right-alt"></i></button>
                
</div>
                   <?php
                }
                } 
                if ($error>0)
                {
            ?>      
            <form method="post" action="" style="margin:20px;">   
                <div class="input-with-icon-left">
                    <i class="icon-material-baseline-mail-outline"></i>
                    <input type="text" class="input-text with-border" name="CustomerName" id="CustomerName" placeholder="Customer Name" required=""  value="<?php echo isset($_POST['CustomerName']) ? $_POST['CustomerName'] : "";?>">
                     <?php if (isset($CustomerName)) {?>
                        <span style="color:red"><?php echo $CustomerName;?></span>
                    <?php } ?>
                </div>
                <div class="input-with-icon-left">
                    <i class="icon-material-baseline-mail-outline"></i>
                    <input type="text" class="input-text with-border" name="MMMobileNumber" id="MMMobileNumber" placeholder="Mobile Number" value="<?php echo isset($_POST['MMMobileNumber']) ? $_POST['MMMobileNumber'] : "";?>" required="">
                    <?php if (isset($MMMobileNumber)) {?>
                        <span style="color:red"><?php echo $MMMobileNumber;?></span>
                    <?php } ?>
                </div>
                <div class="input-with-icon-left" data-tippy-placement="bottom" data-tippy="" data-original-title="Should be at least 8 characters long">
                    <i class="icon-material-outline-lock"></i>
                    <input type="password" class="input-text with-border" name="PPPassword" id="PPPassword" placeholder="Password" required=""  value="<?php echo isset($_POST['PPPassword']) ? $_POST['PPPassword'] : "";?>">
                     <?php if (isset($PPPassword)) {?>
                        <span style="color:red"><?php echo $PPPassword;?></span>
                    <?php } ?>
                </div>
                <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" name="Register">Register <i class="icon-material-outline-arrow-right-alt"></i></button>
                <br> <span>Already have an account? <a href="login.php">Log In!</a></span>
            </form>
            <?php } ?>
        </div>
    </div>
</div>   
<?php include_once("footer.php");?>