<?php
    include_once("header.php");
    $plan = "Small Retailer";
    $text = "Free Register";
?>
    <div id="top"></div>
	<div id="contact" class="contact-section" style="margin-top:40px;">
	    <div class="container contact-section-container">
            <div class="col-lg-6 col-md-12">
                <p class="section-subtitle" style="margin-bottom:0px;">Free Registration</p>
                <div style="color:#555;font-size:12px;margin-bottom:15px;">No activation fee, hidden charges, targets</div>
                <div class="form-section">
					<form class="contact-us-form" id="retailer_registerform"  method="post" action="" autocomplete="off">
						<div class="col-md-12 contact-us-form-group">
                            <input type="text" onkeypress="return MemberNameKeypress(event);" name="MemberName" id="MemberName" placeholder="Your Name" value="" autocomplete="off" style="margin-bottom:0px">
                            <div id="ErrMemberName" class="col-md-12 contact-us-form-group" style="margin-top:0px;color:red;height:20px;font-size: 13px;text-align: right;padding-right: 7px;"></div>
                        </div>
                        <div class="col-md-12 contact-us-form-group">
							<input type="text" maxlength="10" onkeypress="return MobileNumberKeypress(event);" name="RetailerMobileNumber" id="RetailerMobileNumber" value="" placeholder="Mobile Number" autocomplete="off" style="margin-bottom:0px;">
                            <div id="ErrRetailerMobileNumber" class="col-md-12 contact-us-form-group" style="margin-top:0px;color:red;height:20px;font-size: 13px;text-align: right;padding-right: 7px;"></div>
						</div>
                		<div class="col-md-12 contact-us-form-group">
							<input type="Password" name="RetailerPassword" id="RetailerPassword" value="" placeholder="Password" autocomplete="off" style="margin-bottom:0px;">
                            <div id="ErrRetailerPassword" class="col-md-12 contact-us-form-group" style="margin-top:0px;color:red;height:20px;font-size: 13px;text-align: right;padding-right: 7px;"></div>
						</div>
                        <div class="col-md-12 contact-us-form-group">
                            <div style="border-radius: 10px;margin-top: 5px;margin-bottom: 3px;background: #fff;width: 100%;padding: 3px !important;font-size: 14px;line-height: 1.2;border:2px solid #206eea">
                                <table cellpadding="0" cellspacing="0" style="width:100%">
                                    <tr>
                                        <td style="width:120px"><img src="<?php echo SITE_URL;?>/captcha.php?rand=<?php echo rand();?>" id='captchaimg' style="margin-top:-6px"></td>
                                        <td><input type="text" name="captcha_code" id="captcha_code" placeholder="Enter the code" style="margin-top:0px;margin-bottom:0px;;border:none;height:40px !important;"></td>
                                    </tr>
                                </table>
                            </div>
                            <p style="font-size:12px">Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</p>
                        </div>
						<div class="col-md-12 contact-us-form-group" style="margin-top:20px;">
							<button class="theme-btn readmore-btn" type="button" onclick="RetailerRegister()" id="btnsubmit" name="btnsubmit">Register & Continue</button>
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
                        <li class="about-section-content-details-li" style="line-height:1.6;color:#333">Instant Notification via Telegram/Whatsapp</li>
                        <li class="about-section-content-details-li" style="line-height:1.6;color:#333">Advanced reports with 360 degree support</li>
                    </ul>
                </div>
            </div>
		</div>
	</div>
    <div class="modal fade" id="RegisterSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight: bold;font-size: 20px;">OnlineJ2J</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="line-height: 35px;">
                    <p><span style="color: green;font-weight: bold;font-size: 18px;">Congratulation !!!</span><br>
                    Your account created, now you can access our services.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="theme-btn" onclick="location.href='https://www.onlinej2j.com';" data-dismiss="modal" style="background:#fff;border-color: #fff;color:#888">No, Thanks </button>
                    <button type="button" onclick="location.href='https://www.onlinej2j.com/app/dashboard.php';" class="theme-btn">Open Dashboard</button>
                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript'>
        function refreshCaptcha(){
            $('#captcha_code').val("");
            var img = document.images['captchaimg'];
            img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
        }
        
        function MemberNameKeypress(e) {
             $("#ErrMemberName").html("");
            var regex = new RegExp("^[a-zA-Z ]+$");
            var strigChar = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(strigChar)) {
                return true;
            }
            $("#ErrMemberName").html("name must have alphabets and space");
            return false
        }
        
        function MobileNumberKeypress(e) {
            $("#ErrRetailerMobileNumber").html("");
            var regex = new RegExp("^[0-9]+$");
            var strigChar = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(strigChar)) {
                return true;
            }
            $("#ErrRetailerMobileNumber").html("mobile number must have numeric");
            return false
        }
        
        function RetailerRegister() {
            
            $("#login_result").html("");
            $("#ErrMemberName").html("");
            $("#ErrRetailerMobileNumber").html("");
            $("#ErrRetailerPassword").html("");
        
            if ($('#MemberName').val().trim().length==0) {
                $("#ErrMemberName").html("please enter your name");
                return false;
            } else {
                if (!(/^[a-zA-Z\s]+$/.test($('#MemberName').val().trim()))) {
                    $("#ErrMemberName").html("name must have alphabets and space");
                    return false; 
                } 
            }
        
            if ($('#RetailerMobileNumber').val().trim().length=0) {
                $("#ErrRetailerMobileNumber").html("please enter mobile number");
                return false;
            } else {
                if (!(parseInt($('#RetailerMobileNumber').val().trim())<9999999999 && parseInt($('#RetailerMobileNumber').val().trim())>6000000000)) {
                    $("#ErrRetailerMobileNumber").html("please enter valid mobile number");
                    return false; 
                }
            }
            
            if ($('#RetailerPassword').val().trim().length==0) {
                $("#ErrRetailerPassword").html("please enter password");
                return false;
            } else {
                if ($('#RetailerPassword').val().trim().length<6) {
                    $("#ErrRetailerPassword").html("password length 6 or more characters");
                    return false;
                }    
            }
            
            if ($('#captcha_code').val().length<6) {
                $("#login_result").html("Please enter captcha code");
                return false;
            }
        
            $("#btnsubmit").html("<img src='"+SITE_URL+"/assets/loading_white.gif'> Processing ...");
            $.post( SITE_URL+"/webservice.php?action=RetailerRegister",$("#retailer_registerform").serialize(),function(data) { 
                var obj  = JSON.parse(data); 
                var html = "";
                if (obj.status=="failure") {
                    $("#login_result").html(obj.message);
                    $("#btnsubmit").html("Register & Continue");
                    refreshCaptcha();
                    $('#captcha_code').val("");
                } else {
                    $("#MemberName").val("");
                    $("RetailerMobileNumber").val("");
                    $("RetailerPassword").val("");
                    $("#login_result").html("");
                    refreshCaptcha();
                    $('#RegisterSuccess').modal('show');
                }  
            });
        }
    </script>
<?php include_once("footer.php"); ?>