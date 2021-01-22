<?php 
    include_once("header.php");
?>
<div id="top"></div>
<div id="contact" class="contact-section" style="margin-top:100px;">
    <div class="container contact-section-container">
	    <div class="col-lg-6 col-md-12" style="padding-left:0px">
            <p class="section-subtitle">Retailer Login</p>
            <div class="form-section">                                                                        
			    <form class="contact-us-form" method="post" action="" id="retailer_loginfrm">
			        <div class="col-md-12 contact-us-form-group">
				        <input type="text" name="MobileNumber" id="MobileNumber" placeholder="Mobile Number">
				    </div>
				    <div class="col-md-12 contact-us-form-group">
				        <input type="Password" name="Password" id="Password" placeholder="Password">
                    </div>
                    <div class="col-md-12 contact-us-form-group">
                        <div style="border-radius: 10px;margin-top: 10px;margin-bottom: 3px;background: #fff;width: 100%;padding: 3px !important;font-size: 14px;line-height: 1.2;border:2px solid #206eea">
                            <table cellpadding="0" cellspacing="0" style="width:100%">
                                <tr>
                                    <td style="width:120px"><img src="<?php echo SITE_URL;?>/captcha.php?rand=<?php echo rand();?>" id='captchaimg' style="margin-top;-6px"></td>
                                    <td><input type="text" name="captcha_code" id="captcha_code" placeholder="Enter the code" style="margin-top:0px;margin-bottom:0px;;border:none;height:40px !important"></td>
                                </tr>
                            </table>
                        </div>
                        <p style="font-size:12px">Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh                         </p>
                    </div>
				    <div class="col-md-12 contact-us-form-group" style="margin-top:20px;">
                        <button class="theme-btn readmore-btn" type="button" name="btnsubmit" onclick="RetailerLogin()" id="btnsubmit">Login</button>
                        &nbsp;Forget Password
                    </div>
                    <div id="login_result" class="col-md-12 contact-us-form-group" style="margin-top:10px;color:red">
				        
				    </div>
			    </form>
		    </div>                         
	    </div>
        <div class="col-lg-6 col-md-12 contact-section-details-secction">
            <div class="col-md-12 section-title-block">
                <!--<p class="section-details">We're always happy to help, so get in touch today.</p>-->
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    function refreshCaptcha(){
        var img = document.images['captchaimg'];
        img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
    }

    function RetailerLogin() {
        
        $("#login_result").html("");
        $("#btnsubmit").html("<img src='"+SITE_URL+"/assets/loading_white.gif'> Processing ...");
        
        if ($('#MobileNumber').val().length!=10) {
             $("#login_result").html("Please enter valid mobile number");
             $("#btnsubmit").html("Login");
             return false();
        }
        
        if ($('#Password').val().length<6) {
             $("#login_result").html("Please enter valid password");
             $("#btnsubmit").html("Login");
             return false();
        }
        
        if ($('#captcha_code').val().length!=6) {
             $("#login_result").html("Please enter captcha code");
             $("#btnsubmit").html("Login");
             return false();
        }
        
        var param = $("#retailer_loginfrm").serialize();
        $.post( SITE_URL+"/webservice.php?action=RetailerLogin",param,function(data) { 
            var obj = JSON.parse(data); 
            var html = "";
            
            if (obj.status=="failure") {
               $("#login_result").html(obj.message);
               $("#btnsubmit").html("Login");
               refreshCaptcha();
               $('#captcha_code').val("");
            } else {
                var resultData = obj.data; 
                // html = "<div style='text-align:center;padding:15px 30px;text-align: left;border: 1px dashed #ccc;width: -moz-max-content;margin: 0px auto;background: #f9f9f9;border-radius: 10px;'>"
                  //  + obj.AgentName +"<br>"
                    //+ obj.MobileNumber +"<br>"
                    //+ obj.EmailID +"<br>"
                    
                    //+ obj.AddressLine1 +"<br>"
                    //+ obj.AddressLine2 +"<br>"
                    //+ obj.CityName +"<br>"
                    //+ obj.DistrictName +"<br>"
                    //+ obj.StateName +"<br>"
                    //+ obj.CountryName + "</div>";
                //jQuery("#pincode_result").html(html);
                location.href= resultData.url;
            }  
        });
    }
    
   
</script>  
<?php include_once("footer.php"); ?>