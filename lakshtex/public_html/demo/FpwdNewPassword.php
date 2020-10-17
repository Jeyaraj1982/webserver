<?php include_once("header.php");?>
<?php
        if (isset($_POST['btnsubmit'])) {
			$data = $mysql->select("Select * from `_tbl_verification_code` where ID='".$_POST['reqID']."'");
            $id = $mysql->execute("update `_tbl_customer` set `Password`='".$_POST['ConfirmPassword']."' where `CustomerID`='".$data[0]['CustomerID']."'"); 
			if ($id>0) {  
				echo "<script>location.href='PasswordSaved.php';</script>";  
			} else {
              $status = "Error Change password";
			}
		}
      ?> 
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="index.php">Home</a><span>&raquo;</span></li>
            <li><strong>Save Password</strong></li>
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
		  <input type="hidden"  value="<?php echo $_POST['reqEmail'];?>" name="reqEmail">
                     <input type="hidden"  value="<?php echo $_POST['reqID'];?>" name="reqID">
            <h4 style="text-align: center;">Save Password</h4>
            <br>
            <label for="Password">Password<span class="required">*</span></label>
            <input style="width:100%" id="Password" name="Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>" type="password"  class="form-control">
            <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
            <br>
			
			<label for="Password">Confirm Password<span class="required">*</span></label>
            <input style="width:100%" id="ConfirmPassword" name="ConfirmPassword" value="<?php echo (isset($_POST['ConfirmPassword']) ? $_POST['ConfirmPassword'] :"");?>" type="password"  class="form-control">
            <span class="errorstring" id="ErrConfirmPassword"><?php echo isset($ErrConfirmPassword)? $ErrConfirmPassword : "";?></span>
            
            <span class="errorstring" style="text-align: center"><?php echo isset($status)? $status : "";?></span>
            <br>
            
            <button type="submit" class="button" name="btnsubmit"><i class="icon-lock icons"></i>&nbsp; <span>Save Password</span></button>
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
        IsNonEmpty("Password","ErrPassword","Please Enter Password<br>");
   });
   $("#ConfirmPassword").blur(function () {
        IsNonEmpty("ConfirmPassword","ErrConfirmPassword","Please Enter Confirm Password<br>");
   });                                                                                                    
});
 function SubmitPassword() { 
         ErrorCount=0;       
         $('#ErrPassword').html("");
         $('#ErrConfirmPassword').html("");
		
		IsNonEmpty("Password","ErrPassword","Please Enter Password<br>");
		IsNonEmpty("ConfirmPassword","ErrConfirmPassword","Please Enter Confirm Password<br>");
		
		if ($('#Password').val().trim() != $('#ConfirmPassword').val().trim()) {
			ErrorCount++;
			$('#ErrConfirmPassword').html("Passwords do not match.");
		}
        return (ErrorCount==0) ? true : false;
 }
</script>