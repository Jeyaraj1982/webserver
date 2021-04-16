<?php include_once("header.php");?>
  
<div id="account-login" class="container">
	<ul class="breadcrumb">
		<li><a>Home</a></li>
		<li><a href="payment-method.php">Payment Method</a></li>
	</ul>
    <div class="row">
        <div id="content" class="col-md-3 col-sm-3 col-xs-12">
			 
						<h2 class="heading">QR CODE</h2>
						 <img src="assets/QRCode.jpeg" style="max-width:300px">
					 
			 
		</div>
	</div>
</div>
<?php include_once("footer.php");?>
<script>
$(document).ready(function () {
   $("#EmailID").blur(function () {                                                                
        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number<br>")){
           // IsEmail("EmailID","ErrEmailID","Please Enter Valid Email address<br>");
        }
   });
$("#Password").blur(function () {
        IsNonEmpty("Password","ErrPassword","Please Enter Password<br>");
   });                                                                                                    
});
 function SubmitLogin() { 
         ErrorCount=0;       
         $('#ErrEmailID').html("");            
         $('#ErrPassword').html("");
       if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Email Mobile Number<br>")){
            //IsEmail("EmailID","ErrEmailID","Please Enter Valid Email address<br>");
        }
       IsNonEmpty("Password","ErrPassword","Please Enter Password<br>");
        return (ErrorCount==0) ? true : false;
 }
</script>