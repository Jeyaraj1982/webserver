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
						    <div class="form-group row" style="margin-bottom: 0px;">
							    <label class="col-sm-3">Name</label>
							    <label class="col-sm-9">:&nbsp;<?php echo $_SESSION['User']['CustomerName'];?></label>
						    </div>
						    <div class="form-group row" style="margin-bottom: 0px;">
							    <label class="col-sm-3">Email ID</label>
							    <label class="col-sm-9">:&nbsp;<?php echo $_SESSION['User']['EmailID'];?></label>
						    </div>
						    <div class="form-group row" style="margin-bottom: 0px;">
                                <label class="col-sm-3">Mobile Number</label>
                                <label class="col-sm-9">:&nbsp;<?php echo $_SESSION['User']['MobileNumber'];?></label>
                            </div>   <br><br>
                            <div>
                                <h4 class="checkout-sep"> Billing / Shipping Infomations</h4>
                                <div id="BillingInfo" class="box-border" style="">
                                    <form method="post" action="" id="Frm_BillingInfo">
                                        <ul>
                                            <li class="row">
                                                <div class="col-sm-6">
                                                    <label for="company_name">Address Line1<span class="required" style="color:red">*</span></label>
                                                    <input type="text" name="AddressLine1" class="input form-control" id="AddressLine1" value="<?php echo (isset($_POST['AddressLine1']) ? $_POST['AddressLine1'] : $_SESSION['User']['AddressLine1']);?>">
                                                    <span class="errorstring" id="ErrAddressLine1"></span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="email_address" class="required">Address Line2</label>
                                                    <input type="text" class="input form-control" name="AddressLine2" id="AddressLine2" value="<?php echo (isset($_POST['AddressLine2']) ? $_POST['AddressLine2'] : $_SESSION['User']['AddressLine2']);?>">
                                                </div>
                                            </li>
                                            <li class="row">
                                                <div class="col-sm-6">
                                                    <label for="postal_code" class="required">Address Line3</label>
                                                    <input class="input form-control" type="text" id="AddressLine3" name="AddressLine3" value="<?php echo (isset($_POST['AddressLine3']) ? $_POST['AddressLine3'] : $_SESSION['User']['AddressLine3']);?>">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="last_name" class="required">Zip/Postal Code<span class="required" style="color:red">*</span></label>
                                                    <input type="text" name="PostalCode" class="input form-control" id="PostalCode" value="<?php echo (isset($_POST['PostalCode']) ? $_POST['PostalCode'] : $_SESSION['User']['PostalCode']);?>">
                                                    <span class="errorstring" id="ErrPostalCode"></span>
                                                </div>
                                            </li>
                                            <li class="row">
                                                <div class="col-sm-6">
                                                    <label for="first_name" class="required">Land Mark</label>
                                                    <input type="text" class="input form-control" name="LandMark" id="LandMark" value="<?php echo (isset($_POST['LandMark']) ? $_POST['LandMark'] : $_SESSION['User']['LandMark']);?>">
                                                </div>
                                            </li> 
                                            <li>
                                                <button class="button" type="button" onclick="SaveBillingInfo()"><i class="fa fa-angle-double-right"></i>&nbsp; <span>Continue</span></button>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
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

</script>

<script>

 function SaveBillingInfo(){
         
     $('#ErrAddressLine1').html("");            
     $('#ErrPostalCode').html("");            
     
     ErrorCount=0;   
   
    IsNonEmpty("AddressLine1","ErrAddressLine1","Please Enter AddressLine1<br>");
    IsNonEmpty("PostalCode","ErrPostalCode","Please Enter Zip/Postal Code<br>");
       
     if(ErrorCount==0) {
        var param = $("#Frm_BillingInfo").serialize();
        $.post("webservice.php?action=UpdateBillingInfo", param,function( data ) {
            var obj = JSON.parse(data); 
            var html = "";                                                                               
            if (obj.status=="failure") {
                    html = "<div class='modal-body'>";
                        html += "<div class='form-group row'>";
                            html += "<div class='col-sm-12' style='text-align:center'><img src='accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div>";
                        html += "</div>";
                    html += "</div>";
                    html += "<div class='modal-footer' style='border-top: none;padding-top: 0px;'>";
                        html += "<div class='col-sm-12' style='text-align:center'><button type='button' class='button pro' data-dismiss='modal'>Continue</button></div>";
                    html += "</div>";
                $("#xconfrimation_text").html(html);
                $('#ConfirmationPopup').modal("show");
            }if (obj.status=="success") {
                html = "<div class='modal-body'>";
                    html += "<div class='form-group row'>";
                        html += "<div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div>";
                    html += "</div>";
                html += "</div>";
                html += "<div class='modal-footer' style='border-top: none;padding-top: 0px;'>";
                    html += "<div class='col-sm-12' style='text-align:center'><a href='' class='button pro'>Continue</a></div>";
                html += "</div>";
            }
        
        });
     } else{
        return false;
     }
 }
</script>
