<?php include_once("header.php");?>
<style>
.form-control{
display: block;
width: 100%;
padding: .375rem .75rem;
font-size: 1rem;
line-height: 1.5;
color: #495057;
background-color: #fff;
background-clip: padding-box;
border: 1px solid #ced4da;
border-radius: .25rem;
transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
} 
#btnLogin[type="submit"] {
    background: #E91E63;
    border: 0;
    border-radius: 3px;
    padding: 10px 30px;
    color: #fff;
    transition: 0.4s;
    cursor: pointer;
}
#btnLogin[type="submit"]:hover {
    background: #081e5b;
}
</style>
<?php  include_once("config.php"); ?>
                        <?php
                          
                             if (isset($_SESSION['User']) && $_SESSION['User']['MemberID']>0) {    
                                echo "<script>location.href='Member/Dashboard.php';</script>";
                            } 
                            if (isset($_POST['btnLogin'])) {
                                $d=$mysql->select("select * from `_tbl_member` where `MemberCode`='".$_POST['MemberCode']."' and `MemberPassword`='".$_POST['Password']."'");
                                if (sizeof($d)>0) {
                                      $_SESSION['User']=$d[0];
                                     
                                      
                                      echo "<script>location.href='Member/Dashboard.php';</script>";
                                } else {
                                    $error = "Invalid username or password";
                                }
                            }
                        ?>
                        <script>
                       /*     function submitLogin() {

                               $('#ErrMemberCode').html("");
                               $('#ErrPassword').html("");

                                ErrorCount = 0;
                                IsNonEmpty("MemberCode", "ErrMemberCode", "Please Enter Valid Member Code");
                                IsNonEmpty("Password", "ErrPassword", "Please Enter Valid Password");

                                if (ErrorCount == 0) {
                                    return true;
                                } else {
                                     return false;
                                }
                            }  */
                        </script>
    <section id="intro" style="background:#fcf4cf;">
        <div class="form-group row"> 
            <div class="col-sm-4"></div>
            <div class="col-sm-4" style="margin-top: 5%;">
                <div class="container"  style="padding-bottom: 45px;"> 
                    <form id="contactForm" method="post"  onsubmit="return submitLogin()"> 
                        <div class="h5 modal-title text-center">
                            <h4 class="mt-2" style="margin-bottom: 1.5rem;font-weight: normal;margin-top: .5rem !important;opacity: .6;"><div>Member Login</div><span style="font-size: 1.1rem;">Registered Member Login here.</span>   </h4>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="MemberCode" placeholder="Member Code here ...." id="MemberCode" required data-validation-required-message="Please enter your member code" value="<?php echo isset($_POST['MemberCode']) ? $_POST['MemberCode'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrMemberCode"><?php echo isset($ErrMemberCode)? $ErrMemberCode : "";?></span>
                        </div>     
                        <div class="form-group">
                            <input type="password" class="form-control" name="Password" placeholder="Password here ...." id="Password" required data-validation-required-message="Please enter your password" value="<?php echo isset($_POST['Password']) ? $_POST['Password'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                        </div>     
                        <button type="submit" class="btn btn-primary pull-right" id="btnLogin" name="btnLogin">Login</button><br />
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-4"></div>
  </section>
<?php include_once("footer.php");?>