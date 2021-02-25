<?php include_once("header.php");?>
<?php if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            $dupMobile = $mysql->select("select * from _tbl_customer where MobileNumber='".$_POST['MobileNumber']."'");
            if(sizeof($dupMobile)>0){
                $ErrMobileNumber ="Mobile Number Already Exist<br>";
                $ErrorCount++;
            }
            $dupemail = $mysql->select("select * from _tbl_customer where EmailID='".$_POST['EmailID']."'");
            if(sizeof($dupemail)>0){
                $ErrEmailID ="Email ID Already Exist<br>";
                $ErrorCount++;
            }
            if($ErrorCount==0){
                   $random = sizeof($mysql->select("select * from _tbl_customer")) + 1;
                   $UserCode ="CSTMR0000".$random;
                   
              $id = $mysql->insert("_tbl_customer",array("CustomerCode" => $UserCode,
                                                         "CustomerName" => $_POST['Name'],
                                                         "EmailID"      => $_POST['EmailID'],
                                                         "MobileNumber" => $_POST['MobileNumber'],
                                                         "Password"     => $_POST['Password'],
                                                         "CreatedOn"    => date("Y-m-d H:i:s")));
              
            if(sizeof($id)>0){
                $user = $mysql->select("select * from _tbl_customer where CustomerID='".$id."'");
                $_SESSION['User'] = $user[0];
                echo "<script>location.href='index.php';</script>";
            }
    }
}
    
?>
<div id="account-login" class="container">
	<ul class="breadcrumb">
		<li><a>Home</a></li>
		<li><a href="register.php">Register</a></li>
	</ul>
    <div class="row">
        <div id="content" class="col-md-9 col-sm-8 col-xs-12">
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<div class="well">
						<h2 class="heading">Register</h2>
						<form action="" method="post" enctype="multipart/form-data" onsubmit="return SubmitLogin();">
							<div class="form-group">
								<label class="control-label" for="input-email">Name<span class="required" style="color:red">*</span></label>
								<input type="text" id="Name" name="Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] :"");?>" class="form-control" />
								<span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
							</div>
							<div class="form-group">
								<label class="control-label" for="input-email">Email ID<span class="required" style="color:red">*</span></label>
								<input type="text" id="EmailID" name="EmailID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] :"");?>" class="form-control" />
								<span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
							</div>
							<div class="form-group">
								<label class="control-label" for="input-email">Mobile Number<span class="required" style="color:red">*</span></label>
								<input type="text" id="MobileNumber" name="MobileNumber" maxlength="10" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :"");?>" class="form-control onlynumeric" />
								<span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
							</div>
							<div class="form-group">
								<label class="control-label" for="input-password">Password<span class="required" style="color:red">*</span></label>
								<input type="password" id="Password" name="Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>" class="form-control" />
								<span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span><br>
								
								<span class="errorstring" style="text-align: center"><?php echo isset($ErrMessage)? $ErrMessage : "";?></span>
								
								<input type="submit" value="Register" class="btn btn-primary"  name="btnsubmit" />
                        </form>
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>
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
</script>
<script>
$(document).ready(function () {
   $("#Name").blur(function () {                                                                
        if(IsNonEmpty("Name","ErrName","Please Enter Name<br>")){
           IsAlphaNumeric("Name","ErrName","Please Enter Alpha Numerics Characters Only<br>");
        }
   });
   $("#EmailID").blur(function () {                                                                
        if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email address<br>")){
            IsEmail("EmailID","ErrEmailID","Please Enter Valid Email address<br>");
        }
   });
   $("#MobileNumber").blur(function () {                                                                
        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number<br>")){
            IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number<br>");
        }
   });
   $("#Password").blur(function () {
        IsNonEmpty("Password","ErrPassword","Please Enter Password<br>");
   });                                                                                                    
});
 function SubmitLogin() { 
         ErrorCount=0;       
         $('#ErrName').html("");            
         $('#ErrEmailID').html("");            
         $('#ErrMobileNumber').html("");            
         $('#ErrPassword').html("");
         
        if(IsNonEmpty("Name","ErrName","Please Enter Name<br>")){
           IsAlphaNumeric("Name","ErrName","Please Enter Alpha Numerics Characters Only<br>");
        }
        if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email address<br>")){
            IsEmail("EmailID","ErrEmailID","Please Enter Valid Email address<br>");
        }
        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number<br>")){
            IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number<br>");
        }
       IsNonEmpty("Password","ErrPassword","Please Enter Password<br>");
        return (ErrorCount==0) ? true : false;
 }
</script>