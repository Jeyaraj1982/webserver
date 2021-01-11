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
                        
    <section id="intro" >     
        <div class="row" style="margin-right:0px;margin-left:0px;"> 
            <div class="col-sm-8"></div>
            <div class="col-sm-4" style="margin-top: 5%;">
                <div class="container"  style="padding-bottom: 45px;"> 
                    <form id="contactForm" method="post"  onsubmit="return submitLogin()"> 
                        <div class="h5 modal-title text-center">
                            <h4 class="mt-2" style="margin-bottom: 1.5rem;font-weight: normal;margin-top: .5rem !important;opacity: .6;"><div>Member Login</div><span style="font-size: 1.1rem;">Registered Member Login here.</span>   </h4>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="MemberCode" placeholder="Member Code here ...." id="MemberCode"  data-validation-required-message="Please enter your member code" value="<?php echo isset($_POST['MemberCode']) ? $_POST['MemberCode'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrMemberCode"><?php echo isset($ErrMemberCode)? $ErrMemberCode : "";?></span>
                        </div>     
                        <div class="form-group">
                            <input type="password" class="form-control" name="Password" placeholder="Password here ...." id="Password"  data-validation-required-message="Please enter your password" value="<?php echo isset($_POST['Password']) ? $_POST['Password'] : '';?>" style="padding: 10px 14px;border-radius: 0;box-shadow: none;font-size: 15px;">
                            <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                        </div>     
                        <span class="errorstring"><?php echo isset($error)? $error : "";?></span>
                        <button type="submit" class="btn btn-primary pull-right" id="btnLogin" name="btnLogin">Login</button><br />
                    </form>
                </div>
            </div>
        </div>
      
  </section>
<?php include_once("footer.php");?>
<script>
$(document).ready(function () {
        $("#MemberCode").blur(function () {
            if(IsNonEmpty("MemberCode", "ErrMemberCode", "Please Enter Member Code")){
                IsAlphaNumeric("MemberCode", "ErrMemberCode", "Please Enter Alpha Characters Only");
            }
        });
        $("#Password").blur(function () {
            if(IsNonEmpty("Password","ErrPassword","Please enter your Password")){
                IsFPassword("Password","ErrPassword","Please enter more than 6 charcters");
            }
        });
});
function submitLogin(){
     ErrorCount=0;
        $('#ErrMemberCode').html("");
        $('#ErrPassword').html("");
        
        if(IsNonEmpty("MemberCode", "ErrMemberCode", "Please Enter Member Code")){
            IsAlphaNumeric("MemberCode", "ErrMemberCode", "Please Enter Alpha Characters Only");
        }
        if(IsNonEmpty("Password","ErrPassword","Please enter your Password")){
            IsFPassword("Password","ErrPassword","Please enter more than 6 charcters");
        }
        
        return (ErrorCount==0) ? true : false;
    }
</script>