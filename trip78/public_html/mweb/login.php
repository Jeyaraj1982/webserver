<?php include_once("header.php");?>
<?php
    if (isset($_POST['LoginBtn'])) {
         
         $userdata = $mysql->select("select * from _tbl_users where EmailID='".$_POST['Email']."' and Password='".$_POST['Password']."' ");
                if (sizeof($userdata)>0) {
                    $_SESSION['User']=$userdata[0];
                   echo "<script>location.href='index.php';</script>";
                }  else { ?>
                    <script>
                    $(document).ready(function() {
                        swal("Invalid Login Details", {
                            icon:"error"
                    });
                    });
                </script>
                <?php }
       }
    
?>
<body class="style-1">
<section class="contact">
  <div class="container">
    <div class="row">
	<div class="col-md-2"></div>
      <div class="col-md-8">
        <div style="width:100%;text-align:center"><h4>Login</h4></div>
		    <form action="" id="Login" method="post">
              <div class="row">
                <div class="form-group col-xs-6">
                <label>Email ID</label>
                  <input type="email" name="Email" class="form-control" value="<?php echo (isset($_POST['Email']) ? $_POST['Email'] :"");?>" placeholder="Email" required>
                </div>
                <div class="form-group col-xs-6 col-left-padding">
                <label>Password</label>
                  <input type="password" name="Password" class="form-control" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>" placeholder="Password">
                </div>
                <!--<div class="form-group col-xs-12">
                  <label for="contact-form-captcha">Captcha</label>
                  <strong>What's 7 + 4 = </strong>
                  <input name="answer" type="text" class="form-control" placeholder="Enter Captcha Value" required=""/>
                </div>-->
                <div class="col-xs-12" style="text-align: center;">
                  <div class="comment-btn">
                    <input type="submit" name="LoginBtn" value="Login Now" class="btn-blue btn-red" />
                    <span class="btn-blue btn-red" onclick="location.href='index.php'" style="background: white;color: #d60d45;">Back</span>
                  </div>
                </div>
                <div class="col-xs-12" style="text-align: center;">
                  <div class="comment-btn">
                    <span onclick="location.href='register.php'" style="background: white;color: #d60d45;">Register</span>
                  </div>
                </div>
              </div>
            </form>
      </div>
       	<div class="col-md-2"></div>
    </div>
  </div>
</section>
<?php include_once("footer.php");?>
<script>
	$('#datepicker').datepicker({
	autoclose : true,
	format: "dd-mm-yyyy"
	});
</script>
<script>
$(document).ready(function() {
   $(".onlynumeric").keydown(function (e) {
       // Allow: backspace, delete, tab, escape, enter and .
       if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
           (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
            // Allow: home, end, left, right, down, up
           (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
       }
       // Ensure that it is a number and stop the keypress
       if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
           e.preventDefault();
       }
   });
});
$('#Login').validate({
 rules: {  
 Email: {
			required: true,
            } ,
 Password: {
          required: true,
          minlength: 3,
    },
 	  
        }
	});
</script>
