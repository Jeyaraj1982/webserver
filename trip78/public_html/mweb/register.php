<?php include_once("header.php");?>


<?php if (isset($_POST['Register'])) {
        $ErrorCount =0;
            $dupMobile = $mysql->select("select * from _tbl_users where MobileNumber='".$_POST['Mobile']."'");
            if(sizeof($dupMobile)>0){
                $ErrMobile ="Mobile Number Already Exist";
                $ErrorCount++;?>
                <script>
                    $(document).ready(function() {
                        swal("Mobile Number Already Exists", {
                            icon:"error"
                    });
                    });
                </script>
            <?php }
            $dupemail = $mysql->select("select * from _tbl_users where EmailID='".$_POST['Email']."'");
            if(sizeof($dupemail)>0){
                $ErrEmail ="Email ID Already Exist";
                $ErrorCount++;?>
                <script>
                    $(document).ready(function() {
                        swal("Email ID Already Exists", {
                            icon:"error"
                    });
                    });
                </script>
            <?php }
            if($ErrorCount==0){
                   $random = sizeof($mysql->select("select * from _tbl_users")) + 1;
                   $UserCode ="USR0000".$random;
                   
              $id = $mysql->insert("_tbl_users",array("UserCode"     => $UserCode,
                                                      "UserName"     => $_POST['Name'],
                                                      "EmailID"      => $_POST['Email'],
                                                      "MobileNumber" => $_POST['Mobile'],
                                                      "Password"     => $_POST['Password'],
                                                      "CreatedOn"    => date("Y-m-d H:i:s")));
              
            if(sizeof($id)>0){
                    $user = $mysql->select("select * from _tbl_users where UserID='".$id."'");
                    $_SESSION['User'] = $user[0];
                ?>
                <script>
                    $(document).ready(function() {
                        swal("Registered Successfully", {
                            icon:"success",
                            confirm: {value: 'Continue'}
                        }).then((value) => {
                            location.href='index.php'
                        });
                    });
                </script>
        <?php     }
    }
}
    
?>
<body class="style-1">

<section class="contact">
  <div class="container">
    <div class="row">
	<div class="col-md-2"></div>
      <div class="col-md-8">
         	<div style="width:100%;text-align:center"><h4>Register</h4></div>
			 			<form action="" id="books" method="post">
              <input type="hidden" name="PackagesId" value="28" required>
              <div class="row">
                <div class="form-group col-xs-12">
                <label>Name</label>
                  <input type="text" name="Name" class="form-control" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] :"");?>" placeholder="Name" required>
                </div>
                <div class="form-group col-xs-6">
                <label>Email ID</label>
                  <input type="email" name="Email" class="form-control" value="<?php echo (isset($_POST['Email']) ? $_POST['Email'] :"");?>" placeholder="Email" required>
                </div>
                <div class="form-group col-xs-6 col-left-padding">
                <label>Mobile Number</label>
                  <input type="text" name="Mobile" maxlength="10" class="form-control onlynumeric" value="<?php echo (isset($_POST['Mobile']) ? $_POST['Mobile'] :"");?>" placeholder="Phone Number">
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
                    <input type="submit" name="Register" value="Register Now" class="btn-blue btn-red" />
                    <span class="btn-blue btn-red" onclick="location.href='index.php'" style="background: white;color: #d60d45;">Back</span>
                  </div>
                </div>
                <div class="col-xs-12" style="text-align: center;">
                  <div class="comment-btn">
                    <p>Already have an account?<span onclick="location.href='login.php'" style="background: white;color: #d60d45;">Login</span>
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
$('#books').validate({
 rules: {  
 Password: {
      	required: true,
        minlength: 3,
    },
 Email: {
			required: true,
		 	} ,
 Mobile: {
			required: true, 
			number: true, 
			minlength: 10,
		 	},		  
        },
 Name: {
          required: true,
          minlength: 3,
    },
	});
</script>
