<?php include_once("header.php");?>
<div id="checkout-cart" class="container">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a>Checkout</a></li>
    </ul>
	<div class="row">
        <div id="content" class="col-sm-12">
            <div class="row">
				<div id="content" class="col-md-9 col-sm-8 col-xs-12">
					<div id="Reg-Log">
						<h4 class="heading">1. Checkout Method</h4>
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="well" style="margin-bottom:0px">
									<h2 class="heading">Register</h2>
									<form method="post" action="" id="Frm_Register">
										<div class="form-group">
											<label class="control-label" for="input-email">Name<span class="required" style="color:red">*</span></label>
											<input type="text" id="Name" name="Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] :"");?>" class="form-control" />
											<span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
										</div>
                                        <?php if (JApp::REGISTER_EMAIL) {?>
										<div class="form-group">
											<label class="control-label" for="input-email">Email ID
                                            <?php if (JApp::MANDATORY_EMAIL) {?>
                                            <span class="required" style="color:red">*</span>
                                            <?php } ?>
                                            </label>
											<input type="text" id="EmailID" name="EmailID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] :"");?>" class="form-control" />
											<span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
										</div>
                                        <?php } ?>
										<div class="form-group">
											<label class="control-label" for="input-email">Mobile Number<span class="required" style="color:red">*</span></label>
											<input type="text" id="MobileNumber" name="MobileNumber" maxlength="10" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :"");?>" class="form-control onlynumeric" />
											<span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
										</div>
                                        <?php  if (JApp::REFERAL_PROGRAM) {?>
                                        <div class="form-group">
                                            <label class="control-label" for="input-email">Referral Code</label>
                                            <input type="text" id="Referral" name="Referral" value="<?php echo (isset($_POST['Referral']) ? $_POST['Referral'] :"");?>" class="form-control" />
                                            <span class="errorstring" id="ErrReferral"><?php echo isset($ErrReferral)? $ErrReferral : "";?></span>
                                        </div>
                                        <?php } ?>
										<div class="form-group">
											<label class="control-label" for="input-password">Password<span class="required" style="color:red">*</span></label>
											<input type="password" id="Password" name="Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>" class="form-control" />
											<span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span><br>
											
											<button type="button" onclick="CallRegister()" class="btn btn-primary">Register</button>
                                            <span class="errorstring" id="reg_message" style="text-align: center"><?php echo isset($ErrMessage)? $ErrMessage : "";?></span>
										</div>
									</form>
								</div> 
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="well" style="margin-bottom:0px">
									<h2 class="heading">Login</h2>
									<form method="post" action="" id="Frm_Login">
										<div class="form-group">
											<label class="control-label" for="input-email">Mobile Number<span class="required" style="color:red">*</span></label>
											<input type="text" id="LoginMobileNumber" name="LoginMobileNumber" value="<?php echo (isset($_POST['LoginMobileNumber']) ? $_POST['LoginMobileNumber'] :"");?>" class="form-control" />
											<span class="errorstring" id="$ErrLoginMobileNumber"><?php echo isset($ErrLoginMobileNumber)? $ErrLoginMobileNumber : "";?></span>
										</div>
										<div class="form-group">
											<label class="control-label" for="input-password">Password<span class="required" style="color:red">*</span></label>
											<input type="password" id="LoginPassword" name="LoginPassword" value="<?php echo (isset($_POST['LoginPassword']) ? $_POST['LoginPassword'] :"");?>" class="form-control" />
											<span class="errorstring" id="ErrLoginPassword"><?php echo isset($ErrLoginPassword)? $ErrLoginPassword : "";?></span><br>
											<span class="errorstring" style="text-align: center" id="messageLogin"><?php echo isset($ErrMessage)? $ErrMessage : "";?></span>
											<a href="http://templatetasarim.com/opencart/Basket/index.php?route=account/forgotten">Forgotten Password</a></div>
											<button type="button" onclick="CallLogin()" class="btn btn-primary">Login</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div id="SessionDetails">
					<?php if(isset($_SESSION['User']['CustomerID'])) { ?>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<h2 class="heading">1. Customer Details</h2>
							<div class="well" style="border:none;margin-bottom:0px">
								<div class="form-group">
									<label>Name</label>&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $_SESSION['User']['CustomerName'];?><br>
									<label>Email address&nbsp;&nbsp;:&nbsp;&nbsp;</label><?php echo $_SESSION['User']['EmailID'];?><br>
									<label>Mobile Number&nbsp;&nbsp;:&nbsp;&nbsp;</label><?php echo $_SESSION['User']['MobileNumber'];?>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					</div>
                    <h4 class="heading">2. Billing / Shipping Infomations</h4>
					<div id="BillingInfo" style="display: none;">     
                     
						<div class="row" style="margin-right: 0px;margin-left: 0px;">
							<div class="well" style="margin-bottom:0px">
								<form method="post" action="" id="Frm_BillingInfo">
									<div class="form-group row">
										<div class="col-sm-6">
											<label for="company_name">Address Line1<span class="required" style="color:red">*</span></label>
											<input type="text" name="AddressLine1" class="input form-control" id="AddressLine1" value="<?php echo  $_SESSION['User']['AddressLine1'];?>">
											<span class="errorstring" id="ErrAddressLine1"><?php echo isset($ErrAddressLine1)? $ErrAddressLine1 : "";?></span>
										</div>
										<div class="col-sm-6">
											<label for="email_address" class="required">Address Line2</label>
											<input type="text" class="input form-control" name="AddressLine2" id="AddressLine2" value="<?php echo ( $_SESSION['User']['AddressLine2']);?>">
										</div>                 
									</div>
									<div class="form-group row">
										<div class="col-sm-6">
											<label for="postal_code" class="required">Address Line3</label>
											<input class="input form-control" type="text" id="AddressLine3" name="AddressLine3" value="<?php echo ( $_SESSION['User']['AddressLine3']);?>">
										</div>
										<div class="col-sm-6">
											<label for="last_name" class="required">Zip/Postal Code<span class="required" style="color:red">*</span></label>
											<input type="text" name="PostalCode" class="input form-control" id="PostalCode" value="<?php echo ( $_SESSION['User']['PostalCode']);?>">
											<span class="errorstring" id="ErrPostalCode"><?php echo isset($ErrPostalCode)? $ErrPostalCode : "";?></span>
										</div>
									</div>
									<div class="form-group row">
										<div class="col-sm-6">
											<label for="first_name" class="required">Land Mark</label>
											<input type="text" class="input form-control" name="LandMark" id="LandMark" value="<?php echo ( $_SESSION['User']['LandMark']);?>">
										</div>
									</div>
									<div class="form-group">
										<button type="button"  onclick="SaveBillingInfo()" class="btn btn-primary">Continue</button>
									</div>
									</form>
							</div> 
						</div>
					</div>
				    <div id="SessionBillingDetails">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php if(isset($_SESSION['Billing']['AddressLine1'])){ ?>   
                                <div class="well" style="border:none;margin-bottom:0px;">
                                        <?php echo $_SESSION['Billing']['AddressLine1'];?><br>
                                        <?php echo $_SESSION['Billing']['AddressLine2'];?><br>
                                        <?php echo $_SESSION['Billing']['AddressLine3'];?><br>   
                                        Zip/PinCode: <?php echo $_SESSION['Billing']['PostalCode'];?><br>    
                                        Land-Mark: <?php echo $_SESSION['Billing']['LandMark'];?><br><br>
                                        <a onclick="ChangeBillingInfo()" style="cursor: pointer;color:red">[Change]</a> <br><br> 
                                </div>
                                <?php  } ?>
                            </div>
                        </div>
                    </div>
					<h4 class="heading">3. Payment Information</h4>
					<div class="row" id="payment_div" style="display: none;">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="well" style="border:none;margin-bottom:0px;">
								<div class="form-group">
									<label for="radio_button_6">
									<input type="radio" name="radio_4" id="radio_button_6" checked="checked">
									Cash on Delivery</label>
									<?php
									$subtotal=0;
								  foreach($_SESSION['items'] as $item) { 
									  $subtotal+=$item['Qty']*$item['Price'];
								  }   echo "<div class='form-group'><label><span>Order Value&nbsp;:&nbsp;&#8377;&nbsp;". number_format($subtotal,2)."</span>&nbsp;&nbsp;<a href='cart.php'>[View Cart]</a></label></div>";
								 ?>
								 <button class="btn btn-primary" type="button" onclick="ConfirmOrder()"><i class="fa fa-angle-double-right"></i>&nbsp; <span>Confirm Order</span></button>
								 <button class="btn btn-primary" type="button" style="background: white;border:1px solid black;color:black" onclick="CancelOrder()"> <span>Cancel Order</span></button>
								</div>
							</div>
						</div>
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

<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>

<script>
var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 function CallRegister(){
     ErrorCount=0;       
         $('#ErrName').html("");            
       //  $('#ErrEmailID').html("");            
         $('#ErrMobileNumber').html("");            
         $('#ErrPassword').html("");
         $('#reg_message').html("");
         
        if(IsNonEmpty("Name","ErrName","Please Enter Name<br>")){
           IsAlphaNumeric("Name","ErrName","Please Enter Alpha Numerics Characters Only<br>");
        }
      //  if(IsNonEmpty("EmailID","ErrEmailID","Please Enter Email address<br>")){
          //  IsEmail("EmailID","ErrEmailID","Please Enter Valid Email address<br>");
       // }
        if(IsNonEmpty("MobileNumber","ErrMobileNumber","Please Enter Mobile Number<br>")){
            IsMobileNumber("MobileNumber","ErrMobileNumber","Please Enter Valid Mobile Number<br>");
        }
       IsNonEmpty("Password","ErrPassword","Please Enter Password<br>");
       
     if(ErrorCount==0) {
        var param = $("#Frm_Register").serialize();
        $.post("webservice.php?action=Register", param,function( data ) {
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {
                $("#reg_message").html("<span style='color:red'>"+obj.message+"</span>");
            }
            if (obj.status=="Success") {
                $("#SessionDetails").html("<h2 class='heading'>Customer Details</h2><label>Name</label>&nbsp;&nbsp;:&nbsp;&nbsp;"+obj.Name+"<br><label>Email address&nbsp;&nbsp;:&nbsp;&nbsp;</label>"+obj.Email+"<br><label>Mobile Number&nbsp;&nbsp;:&nbsp;&nbsp;</label>"+obj.Mobile+"<br><br>");
                $("#Reg-Log").hide();     
                $("#BillingInfo").show();
            }
        });
     } else{
        return false;
     }
 }
 function CallLogin(){
         
         ErrorCount=0;       
        // $('#ErrLoginEmailID').html("");            
         $('#ErrLoginPassword').html("");
       if(IsNonEmpty("LoginMobileNumber","ErrLoginMobileNumber","Please Enter Mobile Number<br>")){
            //IsEmail("LoginEmailID","ErrLoginEmailID","Please Enter Valid Email address<br>");
        }
       IsNonEmpty("LoginPassword","ErrLoginPassword","Please Enter Password<br>");
       
     if(ErrorCount==0) {
        var param = $("#Frm_Login").serialize();
        $.post("webservice.php?action=Login", param,function( data ) {
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {
                $("#messageLogin").html("<span style='color:red'>"+obj.message+"</span>");
            }
            if (obj.status=="Success") {
                $("#SessionDetails").html("<h2 class='heading'>1. Customer Details</h2><div class='well' style='border:none;margin-bottom:0px;'><div class='form-group'><label>Name</label>&nbsp;&nbsp;:&nbsp;&nbsp;"+obj.Name+"<br><label>Email address&nbsp;&nbsp;:&nbsp;&nbsp;</label>"+obj.Email+"<br><label>Mobile Number&nbsp;&nbsp;:&nbsp;&nbsp;</label>"+obj.Mobile+"</div></div>");
                $("#AddressLine1").val(obj.AddressLine1);
                $("#AddressLine2").val(obj.AddressLine2);
                $("#AddressLine3").val(obj.AddressLine3);
                $("#PostalCode").val(obj.PostalCode);
                $("#LandMark").val(obj.LandMark);
                $("#Reg-Log").hide();
                $("#BillingInfo").show();
            }
        });
     } else{
        return false;
     }
 }
 function SaveBillingInfo(){
         
     $('#ErrAddressLine1').html("");            
     $('#ErrPostalCode').html("");            
     
     ErrorCount=0;   
   
    IsNonEmpty("AddressLine1","ErrAddressLine1","Please Enter AddressLine1<br>");
    IsNonEmpty("PostalCode","ErrPostalCode","Please Enter Zip/Postal Code<br>");
       
     if(ErrorCount==0) {
        var param = $("#Frm_BillingInfo").serialize();
        $.post("webservice.php?action=SaveBillingInfo", param,function( data ) {
            var obj = JSON.parse(data);
            obj=obj.Billing;
            var  text=""+obj.AddressLine1+"<br>"+obj.AddressLine2+"<br>"+obj.AddressLine3+"<br>Zip/PinCode: "+obj.PostalCode+"<br>Land-Mark: "+obj.LandMark+"<br><br><a onclick='ChangeBillingInfo()' style='cursor: pointer;color:red'>[Change]</a> <br><br>";
            $('#SessionBillingDetails').html(text);    
            $("#Reg-Log").hide();
            $("#BillingInfo").hide();
            $("#PaymentInfo").show();
            $("#SessionBillingDetails").show();
            $("#payment_div").show();
        });
     } else{
        return false;
     }
 }
function ChangeBillingInfo(){
    $.ajax({url:'webservice.php?action=ChangeBillingInfo=',success:function(data){
        $("#BillingInfo").show();
        $("#SessionBillingDetails").hide();      
        }});    
          $("#payment_div").show();
 }
 function ConfirmOrder(){
    $('#ConfirmationPopup').modal("show"); 
    $("#xconfrimation_text").html(loading); 
    $.ajax({url:'webservice.php?action=PlaceOrder',success:function(data){
        var obj = JSON.parse(data); 
        var html = "";        
        if(obj.Status=="Success"){
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br>"+obj.message+"<br>Order ID&nbsp : &nbsp;"+obj.OrderID+"</div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a class='continue-btn' href='index.php'  style='border: 1px solid;padding: 5px 10px;'>Continue shopping&nbsp;<i class='fa fa-arrow-right'> </i></a></div>";     
        }
        $("#xconfrimation_text").html(html);
        }});    
 }
 function CancelOrder(){
     $('#ConfirmationPopup').modal("show"); 
    $("#xconfrimation_text").html(loading); 
    $.ajax({url:'webservice.php?action=CancelOrder',success:function(data){
        var obj = JSON.parse(data); 
        var html = "";        
        if(obj.Status=="Success"){
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br>"+obj.message+"</div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a class='continue-btn' href='index.php' style='border: 1px solid;padding: 5px 10px;'>Continue shopping&nbsp;<i class='fa fa-arrow-right'> </i></a></div>";     
        }
        $("#xconfrimation_text").html(html);
        }});        
 }
<?php if(isset($_SESSION['User']['CustomerID'])){ ?>
     $(document).ready(function () {
        $("#Reg-Log").hide();   
        var isBilling = "<?php echo isset($_SESSION['Billing']['AddressLine1']) ? 1 : 0;?>";
        if (isBilling=="0")  {
        $("#BillingInfo").show();        
        } else {
            $("#BillingInfo").hide();    
            $("#PaymentInfo").show(); 
        }
        
     });
 <?php } ?>
</script>