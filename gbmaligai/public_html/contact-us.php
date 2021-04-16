<?php include_once("header.php");?>
  
<div id="account-login" class="container">
	<ul class="breadcrumb">
		<li><a>Home</a></li>
		<li><a href="payment-method.php">Contact Us</a></li>
	</ul>
    <div class="row">
        <div id="content" class="col-md-6 col-sm-6 col-xs-12">
			 
						<h2 class="heading">Concat Us</h2>
						 <div id="contact" class= footcontact">
<ul class="list-unstyled f-left"  style="line-height:30px">
  <li><i class="fa fa-map-marker"></i>&nbsp;&nbsp;3/105, West Street, Eraviputhoor P.O</li>
  <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kanyakumari District. 629402</li>
  <!--<li><i class="fa fa-envelope"></i>company@gmail.com</li>-->
  <li><i class="fa fa-phone"></i>&nbsp;&nbsp;+91 9566585866,9629653683</li>
  <li><i class="fa fa-whatsapp"></i>&nbsp;&nbsp;+91 9566585866</li>
  <li><i class="fa fa-telegram"></i>&nbsp;&nbsp;+91 9566585866</li>
  <li><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;gbmaligai@gmail.com</li>
  </ul>
  <!--<ul class="list-inline list-unstyled foot-social">
  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
  <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>                     
  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
</ul>-->
</div>
					 
			 
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