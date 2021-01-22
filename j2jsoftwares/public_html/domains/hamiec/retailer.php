<?php
    include_once("header.php");
    
    $amount = 0;
    if ($_GET['plan']=="small_retailer") {
        $plan="Small Retailer";
        $amount = 399;
        $text = "First year Rs. 399 then Rs. 199/yr";
    } elseif ($_GET['plan']=="large_retailer") {
        $plan="Large Retailer";
        $amount = 699;
        $text = "First year Rs. 699 then Rs. 199/yr";
    } elseif ($_GET['plan']=="enterprise_retailer") {
        $plan="Enterprice";
        $amount = 999;
        $text = "First year Rs. 999 then Rs. 199/yr";
    } else {
        echo "<script>location.href='".SITE_URL."/register.php';</script>";
        exit;
    }

    if (isset($_POST['btnsubmit'])) {
        ?>
        <script>
        location.href='https://www.j2jsoftwaresolutions.com/payments/config.php?action=paynow';</script>
        <?php
        exit;
       
    }
?>
    <div id="top"></div>
	<div id="contact" class="contact-section" style="margin-top:100px;">
	    <div class="container contact-section-container">
            <div class="col-lg-6 col-md-12">
                <p class="section-subtitle" style="margin-bottom:0px;">Retailer Registration</p>
                <div style="text-align: right;margin-bottom:15px">
                    <span style="font-weight:bold;"><?php echo $plan;?></span> <a style="color:#E8524C;font-weight:bold;font-size:12px" href="<?php echo SITE_URL;?>/register.php">[Change]</a><br>
                    <span style="color:#555;font-size:12px"><?php echo $text;?></span>
                </div>
                <div class="form-section">
					<form class="contact-us-form" id="retailer_registerform" method="post" action="" autocomplete="off">
						<div class="col-md-12 contact-us-form-group">
                            <input type="text" name="RetailerName" id="RetailerName" placeholder="Retailer Name" value="" autocomplete="off">
                        </div>
                        <div class="col-md-12 contact-us-form-group">
							<input type="text" name="RetailerMobileNumber" id="RetailerMobileNumber" value="" placeholder="Mobile Number" autocomplete="off">
						</div>
                        <div class="col-md-12 contact-us-form-group">
                            <input type="text" name="RetailerEmail" id="RetailerEmail" value="" placeholder="Email ID" autocomplete="off">
                        </div>
						<div class="col-md-12 contact-us-form-group">
							<input type="Password" name="RetailerPassword" id="RetailerPassword" value="" placeholder="Password" autocomplete="off">
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
							<button class="theme-btn readmore-btn" type="button" onclick="RetailerRegister()" id="btnsubmit" name="btnsubmit">Pay Now</button>
                            &nbsp;&nbsp;already have a account? <a href="<?php echo SITE_URL?>/login.php">login</a>
						</div>
                        <div id="login_result" class="col-md-12 contact-us-form-group" style="margin-top:10px;color:red">
                        
                        </div>
					</form>
				</div>                         
			</div>
            <div class="col-lg-6 col-md-12 contact-section-details-secction">
                 
                <div class="col-md-9 section-title-block" style="margin:0px auto">
                    <p class="section-subtitle" style="color:#888">Major Highlights</p>
                    <br>
                <ul class="about-section-content-details-ul">
                    <li class="about-section-content-details-li" style="line-height:1.6;color:#333">User-friendly powerfull interface.</li>
                    <li class="about-section-content-details-li" style="line-height:1.6;color:#333">Instant Recharges lessthan 5 seconds.</li>
                    <li class="about-section-content-details-li" style="line-height:1.6;color:#333">Instant Money Transfer lessthan 5 seconds to any bank in India</li>
                    <li class="about-section-content-details-li" style="line-height:1.6;color:#333">24x7 Service</li>
                    <li class="about-section-content-details-li" style="line-height:1.6;color:#333">Indian Server, 99.90% uptime</li>
                    <li class="about-section-content-details-li" style="line-height:1.6;color:#333">Instant Notification via Telegram App</li>
                    <li class="about-section-content-details-li" style="line-height:1.6;color:#333">Advanced reports with 360 degree support</li>
                </ul>
                </div>
            </div>
		</div>
	</div>
    <script type='text/javascript'>
        function refreshCaptcha(){
            var img = document.images['captchaimg'];
            img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
        }
           function RetailerRegister() {
        
        $("#login_result").html("");
        $("#btnsubmit").html("<img src='"+SITE_URL+"/assets/loading_white.gif'> Processing ...");
        
        if ($('#RetailerName').val().length==10) {
             $("#login_result").html("Please enter valid retailer name");
             $("#btnsubmit").html("Login");
             return false();
        } 
        
        if ($('#RetailerMobileNumber').val().length!=10) {
             $("#login_result").html("Please enter valid mobile number");
             $("#btnsubmit").html("Login");
             return false();
        }
        
        if ($('#RetailerPassword').val().length<6) {
             $("#login_result").html("Please enter valid password");
             $("#btnsubmit").html("Login");
             return false();
        }
        
        if ($('#captcha_code').val().length!=6) {
             $("#login_result").html("Please enter captcha code");
             $("#btnsubmit").html("Login");
             return false();
        }
        
        var param = $("#retailer_registerform").serialize();
        $.post( SITE_URL+"/webservice.php?action=RetailerRegister",param,function(data) { 
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