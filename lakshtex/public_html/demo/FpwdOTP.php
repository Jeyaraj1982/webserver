<?php include_once("header.php");?>
<?php
     if (isset($_POST['btnsubmit'])) {
            $data = $mysql->select("Select * from `_tbl_verification_code` where ID='".$_POST['reqID']."'");
             if (sizeof($data)>0) {
                 if ($data[0]['SecurityCode']==$_POST['SequirityCode']) {   ?>
                    <form action="FpwdNewPassword.php" id="reqFrm" method="post">
                                        <input type="hidden" value="<?php echo $_POST['reqID'];?>" name="reqID">
                                        <input type="hidden" value="<?php echo $data[0]['EMailTo'];?>" name="reqEmail">
                                    </form>
                                    <script>
                                        document.getElementById("reqFrm").submit();
                                    </script>
                         <?php
                 } else {
                    $status = "invalid";
                 }
             } else {
                $status = "invalid access";                                                                     
             }
        }
        
 ?> 
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="index.php">Home</a><span>&raquo;</span></li>
            <li><strong>Forgotten Password</strong></li>
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
          <form method="post" action="" onsubmit="return SubmitSecuirityCode();">
            <h4 style="text-align: center;">Forgot Your Password</h4><br>
            <p class="before-login-text" style="text-align: center;">
We have sent an security code to your email. Please enter the code and continue.
</p>
<input type="hidden"  value="<?php echo $_POST['reqEmail'];?>" name="reqEmail">
                        <input type="hidden"  value="<?php echo $_POST['reqID'];?>" name="reqID">
            <br>
            <label for="EmailID">Verification Code<span class="required">*</span></label>
            <input style="width:100%" id="SequirityCode" name="SequirityCode" value="<?php echo isset($_POST['SequirityCode']) ? $_POST['SequirityCode'] : '';?>" type="text" class="form-control">
            <span class="errorstring" id="ErrSequirityCode"><?php echo isset($ErrSequirityCode)? $ErrSequirityCode : "";?></span>
            
            <span class="errorstring" style="text-align: center"><?php echo isset($status)? $status : "";?></span>
            <br>
            <div style="text-align:center">
				<button type="submit" class="button" name="btnsubmit"><i class="icon-lock icons"></i>&nbsp; <span>Submit</span></button>
				<p class="forgot-pass"><a href="login.php"><br>Back to Signin</a></p>
			</div> 
		  </form>
          </div>
        </div>
      </div>
    </div>
  </section>
   
<?php include_once("footer.php");?>
<script>
$(document).ready(function () {
   $("#SequirityCode").blur(function () {                                                                
        IsNonEmpty("SequirityCode","ErrSequirityCode","Please Enter Verification Code<br>");
   });
                                                                                                   
});
 function SubmitSecuirityCode() { 
         ErrorCount=0;       
         $('#ErrSequirityCode').html("");   
         
        IsNonEmpty("SequirityCode","ErrSequirityCode","Please Enter Verification Code<br>");
      
	 return (ErrorCount==0) ? true : false;
 }
</script>
