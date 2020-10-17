<?php 
include_once("../config.php");
?>
<?php

$Page="login";

include_once("header.php");
 $msg = "";
    if (isset($_POST['loginbtn'])) {
 
          $record = $mysql->select("select * from _tbl_franchisee where EmailID='".trim($_POST['email'])."' and Password='".trim($_POST['upass'])."'");
          if (sizeof($record)>0) {
            $bank = $mysql->select("select * from _tbl_franchisee_bank_details where FranchiseeID='".$record[0]['userid']."'");  
            $_SESSION['FRANCHISEE'] = $record[0];
            if(sizeof($bank)=="0"){
                echo "<script>location.href='dashboard.php?action=AddBankAccount';</script>";    
            } else{
                echo "<script>location.href='dashboard.php';</script>";
            } 
          } else {
              echo "<script>alert('Invalid Login Details')";
          }
    }
      ?>
<script>
$(document).ready(function () {
   $("#email").blur(function () {
        IsNonEmpty("email","Erremail","Please Enter Email");
   });
$("#upass").blur(function () {
        IsNonEmpty("upass","Errupass","Please Enter Password");
   });                                                                                                    
});
 function SubmitLogin() { 
                         ErrorCount=0;       
                         $('#Erremail').html("");            
                         $('#Errupass').html("");
                       IsNonEmpty("email","Erremail","Please Enter User Name");
                       IsNonEmpty("upass","Errupass","Please Enter Password");
                        return (ErrorCount==0) ? true : false;
                 }
</script>                                                                
<body class="login">
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center" style="line-height:45px;"> <img src="https://www.klx.co.in/assets/cms/klx_log.png"  style="margin-left:25px;"><br>Franchisee Login</h3>
            <form method="POST" action="" onsubmit="return SubmitLogin();">
                <div class="login-form">
                <div class="form-group form-floating-label">
                    <input id="email" name="email" type="text" class="form-control input-border-bottom" value="<?php echo (isset($_POST['email']) ? $_POST['email'] :"");?>">
                    <label for="email" class="placeholder">User Name</label>
                    <span class="errorstring" id="Erremail"><?php echo isset($Erremail)? $Erremail : "";?></span>
                </div>
                <div class="form-group form-floating-label">
                    <input id="upass" name="upass" type="password" class="form-control input-border-bottom" value="<?php echo (isset($_POST['upass']) ? $_POST['upass'] :"");?>">
                    <label for="upass" class="placeholder">Password</label>
                    <div class="show-password" >
                        <span onclick="showHidePwd('upass',$(this))"><i class="icon-eye"></i> </span>
                    </div>
                    <span class="errorstring" id="Errupass"><?php echo isset($Errupass)? $Errupass : "";?></span>
                </div>
                <div class="form-group form-floating-label"  style="text-align: center">
                    <span class="errorstring"><?php echo $ErrorMessage;?></span>
                </div>
                <div class="form-action mb-3">
                    <button type="submit" class="btn btn-primary btn-rounded btn-login" name="loginbtn">Sign In</button>
                </div>
            </div>
            </form>
        </div>
    </div>
<?php include_once("footer.php");?>