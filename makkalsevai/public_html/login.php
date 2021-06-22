<?php include_once("header.php"); ?>
<div class="container">
    <div class="row" style="margin-top:100px">
        <div class="col-xl-5 offset-xl-3">
            <div class="login-register-page">
                <div class="welcome-text">
                    <h3>Login</h3>
                </div>
                <?php
            
                    if (isset($_POST['Login'])) {
                        $data = $mysql->select("select * from _tbl_customers where MobileNumber='".$_POST['MobileNumber']."' and Password='".$_POST['Password']."' ");
                        if (sizeof($data)>0) {
                              $_SESSION['User']=$data[0];
                              ?>
                              <script>
                                location.href='services.php';
                              </script>
                              <?php
                                  exit;
                              
                        } else {
                            $loginError = "Invalid login details";
                        }
                    }
                ?>                                                                  
                <form method="post" action="">
                    <div class="input-with-icon-left">
                        <i class="icon-material-baseline-mail-outline"></i>
                        <input type="text" class="input-text with-border" name="MobileNumber" id="MobileNumber" placeholder="Enter Mobile Number" required="">
                    </div>
                    <div class="input-with-icon-left">
                        <i class="icon-material-outline-lock"></i>
                        <input type="password" class="input-text with-border" name="Password" id="Password" placeholder="Password" required="">
                        <?php
                            if (isset($loginError)) {
                                echo "<span style='color:red'>".$loginError."</span>";
                            }
                        ?>
                    </div>
                
                <button class="button full-width button-sliding-icon ripple-effect margin-top-10" type="submit" name="Login" >Log In <i class="icon-material-outline-arrow-right-alt"></i></button>
                  <br><span>Don't have an account? <a href="register.php<?php echo isset($_GET['service'])? '?service='.$_GET['service'] : "";?>" >Sign Up!</a></span>
                  </form>
            </div>
        </div>
    </div>
</div>   
<?php include_once("footer.php");?>