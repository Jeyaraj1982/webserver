<?php include_once("header.php");?>
<?php
        if (isset($_POST['btnsubmit'])) {
        $data = $mysql->select("select * from `_tbl_customer` where `CustomerID`='".$_SESSION['User']['CustomerID']."'");
        if($data[0]['Password']==$_POST['CurrentPassword']){
            $mysql->execute("update `_tbl_customer` set `Password`='".$_POST['confirmnewpassword']."' where `CustomerID`='".$_SESSION['User']['CustomerID']."'"); 
            unset($_POST);
            $successmessage ="Password Changed Successfully<br>";
        }else {
             $ErrCurrentPassword ="Incorrect Current Password ";
        }
    }
      ?> 
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="index.php">Home</a><span>&raquo;</span></li>
            <li><strong>My Account</strong><span>&raquo;</span></li>
            <li><strong>Change Password</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="page-content">
        <div class="account-login">
          <div class=" " style="width:400px;margin:0px auto;padding:20px;">
          <form method="post" action="" onsubmit="return SubmitPassword();">
            <h4 style="text-align: center;">Change Password</h4>
            <br>
            <label for="CurrentPassword">Current Password<span class="required" style="color:red">*</span></label>
            <input style="width:100%" id="CurrentPassword" name="CurrentPassword" value="<?php echo (isset($_POST['CurrentPassword']) ? $_POST['CurrentPassword'] :"");?>" type="password" class="form-control">
            <span class="errorstring" id="ErrCurrentPassword"><?php echo isset($ErrCurrentPassword)? $ErrCurrentPassword : "";?></span>
            <br>
			<label for="CurrentPassword">New Password<span class="required" style="color:red">*</span></label>
            <input style="width:100%" id="Password" name="Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>" type="password" class="form-control">
            <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
            <br>
			<label for="CurrentPassword">Confirm New Password<span class="required" style="color:red">*</span></label>
            <input style="width:100%" id="confirmnewpassword" name="confirmnewpassword" value="<?php echo (isset($_POST['confirmnewpassword']) ? $_POST['confirmnewpassword'] :"");?>" type="password" class="form-control">
            <span class="errorstring" id="Errconfirmnewpassword"><?php echo isset($Errconfirmnewpassword)? $Errconfirmnewpassword : "";?></span>
            <br>
            
            <span class="errorstring" style="text-align: center"><?php echo isset($successmessage)? $successmessage : "";?></span>
            <br>
            
            <button type="submit" class="button" name="btnsubmit"><i class="icon-lock icons"></i>&nbsp; <span>Change Password</span></button>
         </form>
          </div>
        </div>
      </div>
    </div>
  </section>
   
<?php include_once("footer.php");?>
<script>
$(document).ready(function () {
    $("#Password").blur(function () {
        IsNonEmpty("Password","ErrPassword","Please Enter New Password");
    });
    $("#CurrentPassword").blur(function () {
        IsNonEmpty("CurrentPassword","ErrCurrentPassword","Please Enter Current Password");
    });
    $("#confirmnewpassword").blur(function () {
        IsNonEmpty("confirmnewpassword","Errconfirmnewpassword","Please Enter Confirm New Password");
    });
});
function SubmitPassword() {
        ErrorCount=0;    
        $('#ErrPassword').html("");
        $('#Errconfirmnewpassword').html("");
        $('#ErrCurrentPassword').html("");
        
        IsNonEmpty("CurrentPassword","ErrCurrentPassword","Please Enter Current Password");
        IsNonEmpty("Password","ErrPassword","Please Enter New Password");
        IsNonEmpty("confirmnewpassword","Errconfirmnewpassword","Please Enter Confirm New Password"); 
        var password = document.getElementById("Password").value;
                var confirmPassword = document.getElementById("confirmnewpassword").value;
                if (password != confirmPassword) {
                    ErrorCount++;
                    $('#Errconfirmnewpassword').html("Passwords do not match.");
                }
                return (ErrorCount==0) ? true : false;
         }
</script>