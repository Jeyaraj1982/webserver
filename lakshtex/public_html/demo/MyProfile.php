<?php include_once("header.php");?>
	
<div class="breadcrumbs">
    <div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ul>
					<li class="home"> <a title="Go to Home Page" href="index.html">Home</a><span>»</span></li>
					<li><strong>My Profile</strong></li>
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
				<h2>My Profile</h2>
            </div>
			<div class="page-content checkout-page">
				<br>
				<div class="box-border">
					<div id="SessionDetails">
						<div class="form-group row">
							<label class="col-sm-2">Name</label>
							<label class="col-sm-10">:&nbsp;<?php echo $_SESSION['User']['CustomerName'];?></label>
						</div>
						<div class="form-group row">
							<label class="col-sm-2">Email ID</label>
							<label class="col-sm-10">:&nbsp;<?php echo $_SESSION['User']['EmailID'];?></label>
						</div>
						<div class="form-group row">
							<label class="col-sm-2">Mobile Number</label>
							<label class="col-sm-10">:&nbsp;<?php echo $_SESSION['User']['MobileNumber'];?></label>
						</div>
						<div class="cart_navigation"> <a class="continue-btn" href="index.php"><i class="fa fa-arrow-left"> </i>&nbsp; Continue shopping</a></div>
					</div>
				</div> 
         </div>
        </div>
         
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
