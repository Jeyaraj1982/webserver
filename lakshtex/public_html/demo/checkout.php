<?php include_once("header.php");?>
<?php $page="checkout";?>
<div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="index.html">Home</a><span>»</span></li>
            <li><strong>Checkout</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

<section class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-9 col-xs-12">
<div class="page-title">
              <h2>Checkout</h2>
            </div>
          <div class="page-content checkout-page">
            <br>
            <div id="Reg-Log">
            <h4 class="checkout-sep">1. Checkout Method</h4>
            <div class="box-border">
              <div class="row">
                <div class="col-sm-6">
                 <div class="account-login">
          <div class="box-authentication" style="width:100%;">
            <h4>Register</h4>
            <p>Create your own account</p>
            <form method="post" action="" id="Frm_Register">
                
                <label for="EmailID">Name<span class="required" style="color:red">*</span></label>
                <input style="width:100%" id="Name" name="Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] :"");?>" type="text" class="form-control">
                <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                
                <label for="EmailID">Email address<span class="required" style="color:red">*</span></label>
                <input  style="width:100%" id="EmailID" name="EmailID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] :"");?>" type="text" class="form-control">
                <span class="errorstring" id="ErrEmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
                
                <label for="EmailID">Mobile Number<span class="required" style="color:red">*</span></label>
                <input  style="width:100%" id="MobileNumber" name="MobileNumber" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] :"");?>" maxlength="10" type="text" class="form-control onlynumeric">
                <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                
                <label for="Password">Password<span class="required" style="color:red">*</span></label>
                <input  style="width:100%" id="Password" name="Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>" type="password"  class="form-control">
                <span class="errorstring" id="ErrPassword"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
                <span id="message"></span> 
                <button class="button" type="button" onclick="CallRegister()"><i class="icon-user icons"></i>&nbsp; <span>Register & Continue</span></button>
            </form>
          </div>
        </div>
                </div>
                <div class="col-sm-6">
                  <div class="account-login">
          <div class="box-authentication" style="width:100%">
          <form method="post" action="" id="Frm_Login">
            <h4>Login</h4>
            <p class="before-login-text">Login into your account</p>
      
            <label for="EmailID">Email address<span class="required" style="color:red">*</span></label>
            <input style="width:100%" id="login_EmailID" name="EmailID" value="<?php echo (isset($_POST['EmailID']) ? $_POST['EmailID'] :"");?>" type="text" class="form-control">
            <span class="errorstring" id="Errlogin_EmailID"><?php echo isset($ErrEmailID)? $ErrEmailID : "";?></span>
            
            <label for="Password">Password<span class="required" style="color:red">*</span></label>
            <input style="width:100%" id="login_Password" name="Password" value="<?php echo (isset($_POST['Password']) ? $_POST['Password'] :"");?>" type="password"  class="form-control">
            <span class="errorstring" id="Errlogin_Password"><?php echo isset($ErrPassword)? $ErrPassword : "";?></span>
            
             <span id="messageLogin"></span> 
            <button type="button" onclick="CallLogin()" class="button" ><i class="icon-lock icons"></i>&nbsp; <span>Login & Continue</span></button>
            <p class="forgot-pass"><a href="#">Lost your password?</a></p>
          </form>
          </div>
        </div>
                </div>
              </div>
            </div>
            </div>
            
            <div class="box-border">
            <div id="SessionDetails">
                <?php if(isset($_SESSION['User']['CustomerID'])){ ?>
                <h4 class='checkout-sep'>1. Customer Details</h4>
                <?php echo $_SESSION['User']['CustomerName'];?><br>
                <?php echo $_SESSION['User']['EmailID'];?><br>
                <?php echo $_SESSION['User']['MobileNumber'];?>    
                <?php } ?> 
            </div>
            </div> 
            
            
            
<div>
    <h4 class="checkout-sep">2. Billing / Shipping Infomations</h4>
    <div id="SessionBillingDetails">
    <?php if(isset($_SESSION['Billing']['AddressLine1'])){ ?>
        <?php echo $_SESSION['Billing']['AddressLine1'];?><br>
        <?php echo $_SESSION['Billing']['AddressLine2'];?><br>
        <?php echo $_SESSION['Billing']['AddressLine3'];?><br>   
        Zip/PinCode: <?php echo $_SESSION['Billing']['PostalCode'];?><br>    
        Land-Mark: <?php echo $_SESSION['Billing']['LandMark'];?><br><br>
        <a onclick="ChangeBillingInfo()" style="cursor: pointer;color:red">[Change]</a> <br><br> 
     <?php  } ?>
    </div>
    
    <div id="BillingInfo" class="box-border" style="display:none">
        <form method="post" action="" id="Frm_BillingInfo">
              <ul>
                <li class="row">
                  <div class="col-sm-6">
                    <label for="company_name">Address Line1<span class="required" style="color:red">*</span></label>
                    <input type="text" name="AddressLine1" class="input form-control" id="AddressLine1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] :$_SESSION['Billing']['AddressLine1']);?>">
                    <span class="errorstring" id="ErrAddressLine1"><?php echo isset($ErrAddressLine1)? $ErrAddressLine1 : "";?></span>
                  </div>
                  <div class="col-sm-6">
                    <label for="email_address" class="required">Address Line2</label>
                    <input type="text" class="input form-control" name="AddressLine2" id="AddressLine2" value="<?php echo (isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] :$_SESSION['Billing']['AddressLine2']);?>">
                  </div>
                </li>
                <li class="row">
                  <div class="col-sm-6">
                    <label for="postal_code" class="required">Address Line3</label>
                    <input class="input form-control" type="text" id="AddressLine3" name="AddressLine3" value="<?php echo (isset($_POST['AddressLine3']) ? $_POST['AddressLine3'] :$_SESSION['Billing']['AddressLine3']);?>">
                  </div>
                   <div class="col-sm-6">
                    <label for="last_name" class="required">Zip/Postal Code<span class="required" style="color:red">*</span></label>
                    <input type="text" name="PostalCode" class="input form-control" id="PostalCode" value="<?php echo (isset($_POST['PostalCode']) ? $_POST['PostalCode'] :$_SESSION['Billing']['PostalCode']);?>">
                    <span class="errorstring" id="ErrPostalCode"><?php echo isset($ErrPostalCode)? $ErrPostalCode : "";?></span>
                  </div>
                </li>
                <li class="row">
                  <div class="col-sm-6">
                    <label for="first_name" class="required">Land Mark</label>
                    <input type="text" class="input form-control" name="LandMark" id="LandMark" value="<?php echo (isset($_POST['LandMark']) ? $_POST['LandMark'] :$_SESSION['Billing']['LandMark']);?>">
                  </div>
                </li> 
                <li>
                  <button class="button" type="button" onclick="SaveBillingInfo()"><i class="fa fa-angle-double-right"></i>&nbsp; <span>Continue</span></button>
                </li>
              </ul>
            </form>
    </div>
</div>


            <h4 class="checkout-sep">3. Payment Information</h4>
            <div class="box-border" id="PaymentInfo" style="display: none;">
              <ul>
              <!--  <li>
                  <label for="radio_button_5">
                    <input type="radio" checked="" name="radio_4" id="radio_button_5">
                    Bank Transfer </label>
                </li> -->
                <li>
                  <label for="radio_button_6">
                    <input type="radio" name="radio_4" id="radio_button_6" checked="checked">
                    Cash on Delivery</label>
                </li>
                <?php
                    $subtotal=0;
                  foreach($_SESSION['items'] as $item) { 
                      $subtotal+=$item['Qty']*$item['Price'];
                  }   echo "<label><span style='font-size:20px'>Order Value&nbsp;:&nbsp;&#8377;&nbsp;". number_format($subtotal,2)."</span>&nbsp;&nbsp;<a href='cart.php'>[View Details]</a></label>";
                 ?>
              </ul>
              <button class="button" type="button" onclick="ConfirmOrder()"><i class="fa fa-angle-double-right"></i>&nbsp; <span>Confirm Order</span></button>
              <button class="button" type="button" style="background: white;border:1px solid black;color:black" onclick="CancelOrder()"> <span>Cancel Order</span></button>
            </div>
             
             
          </div>
        </div>
        <aside class="right sidebar col-sm-3 col-xs-12">
          <div class="sidebar-checkout block">
            <div class="sidebar-bar-title">
               Order Overview
            </div>
            <div class="block-content">
               
            </div>
          </div>
        </aside>
      </div>
    </div>
  </section>

<div class="jtv-service-area">
    <div class="container">
      <div class="row">
        <div class="col col-md-3 col-sm-6 col-xs-12">
          <div class="block-wrapper ship">
            <div class="text-des">
              <div class="icon-wrapper"><i class="fa fa-paper-plane"></i></div>
              <div class="service-wrapper">
                <h3>World-Wide Shipping</h3>
                <p>On order over $99</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col col-md-3 col-sm-6 col-xs-12 ">
          <div class="block-wrapper return">
            <div class="text-des">
              <div class="icon-wrapper"><i class="fa fa-rotate-right"></i></div>
              <div class="service-wrapper">
                <h3>30 Days Return</h3>
                <p>Moneyback guarantee </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col col-md-3 col-sm-6 col-xs-12">
          <div class="block-wrapper support">
            <div class="text-des">
              <div class="icon-wrapper"><i class="fa fa-umbrella"></i></div>
              <div class="service-wrapper">
                <h3>Support 24/7</h3>
                <p>Call us: ( +123 ) 456 789</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col col-md-3 col-sm-6 col-xs-12">
          <div class="block-wrapper user">
            <div class="text-des">
              <div class="icon-wrapper"><i class="fa fa-tags"></i></div>
              <div class="service-wrapper">
                <h3>Member Discount</h3>
                <p>25% on order over $199</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once("footer.php");?>
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
<script>
var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
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
 function CallRegister(){
         
     $('#ErrName').html("");            
         $('#ErrEmailID').html("");            
         $('#ErrMobileNumber').html("");            
         $('#ErrPassword').html("");
         
     ErrorCount=0;   
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
       
     if(ErrorCount==0) {
        var param = $("#Frm_Register").serialize();
        $.post("webservice.php?action=Register", param,function( data ) {
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {
                $("#message").html("<span style='color:red'>"+obj.message+"</span>");
            }
            if (obj.status=="Success") {
                $("#SessionDetails").html("<h4 class='checkout-sep'>1. Customer Details</h4>"+obj.Name+"<br>"+obj.Email+"<br>"+obj.Mobile);
                $("#Reg-Log").hide();
                $("#BillingInfo").show();
            }
        });
     } else{
        return false;
     }
 }
 function CallLogin(){
         
         $('#Errlogin_EmailID').html("");            
         $('#Errlogin_Password').html("");
         
     ErrorCount=0;   
       if(IsNonEmpty("login_EmailID","Errlogin_EmailID","Please Enter Email address<br>")){
            IsEmail("login_EmailID","Errlogin_EmailID","Please Enter Valid Email address<br>");
        }
       IsNonEmpty("login_Password","Errlogin_Password","Please Enter Password<br>");
       
     if(ErrorCount==0) {
        var param = $("#Frm_Login").serialize();
        $.post("webservice.php?action=Login", param,function( data ) {
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {
                $("#messageLogin").html("<span style='color:red'>"+obj.message+"</span>");
            }
            if (obj.status=="Success") {
                $("#SessionDetails").html("<h4 class='checkout-sep'>1. Customer Details</h4>"+obj.Name+"<br>"+obj.Email+"<br>"+obj.Mobile);
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
