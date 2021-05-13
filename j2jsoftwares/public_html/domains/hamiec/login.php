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
			        <div class="col-md-12 contact-us-form-group" style="line-height:18px;">
				        <input type="text" name="MobileNumber" id="MobileNumber" placeholder="Mobile Number" onkeypress="movePasswordBox(event)" style="margin-bottom:0px;">
                        <span style="color:red;font-size:12px;" id="ErrorMobileNumber">&nbsp;</span>
				    </div>
				    <div class="col-md-12 contact-us-form-group">
				        <input type="Password" name="Password" id="Password" placeholder="Password" onkeypress="moveCaptchaBox(event)"  style="margin-top:0px;margin-bottom:0px;">
                        <span style="color:red;font-size:12px;" id="ErrorPassword">&nbsp;</span>
                    </div>
                    <div class="col-md-12 contact-us-form-group" style="margin-top: -5px;">
                        <div style="border-radius: 10px;background: #fff;width: 100%;padding: 3px !important;font-size: 14px;line-height: 1.2;border:2px solid #206eea">
                            <table cellpadding="0" cellspacing="0" style="width:100%">
                                <tr>
                                    <td style="width:120px"><img src="<?php echo SITE_URL;?>/captcha.php?rand=<?php echo rand();?>" id='captchaimg' style="margin-top;-6px"></td>
                                    <td><input type="text" name="captcha_code"   maxlength="6" onkeypress="handle(event)" id="captcha_code" placeholder="Enter the code" style="margin-top:0px;margin-bottom:0px;;border:none;height:40px !important"></td>
                                    <td style="text-align: right;font-size:12px;">
                                       Can't read?<br>click <a href='javascript: refreshCaptcha();'>here</a> to refresh
                                    </td>
                                </tr>
                            </table>
                        </div>
                         <span style="color:red;font-size:12px;" id="ErrorCaptcha">&nbsp;</span>
                    </div>
				    <div class="col-md-12 contact-us-form-group">
                        <button class="theme-btn readmore-btn" type="button" name="btnsubmit" onclick="RetailerLogin()"  id="btnsubmit">Login</button>
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
function validIndianMobileNumber(number) {
    if ( (parseInt(number)>=6000000000) && (parseInt(number)<=9999999999)) {
        return true;
    }
    return false;
}
    function refreshCaptcha(){
        var img = document.images['captchaimg'];
        img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
    }
    
    function movePasswordBox(e) {
        
        $("#ErrorMobileNumber").html("&nbsp;");
        if(e.keyCode === 13){
            e.preventDefault();
            if (!(validIndianMobileNumber($('#MobileNumber').val()))) {
                $("#ErrorMobileNumber").html("&nbsp;Please enter valid mobile number");  
                return false;
            }
            $('#Password').focus();
        }
    }
    
    function moveCaptchaBox(e) {
        
        $("#ErrorPassword").html("&nbsp;");
        if (e.keyCode === 13) {
            e.preventDefault();
            if ($('#Password').val().length<6) {
                $("#ErrorPassword").html("Please enter valid password");
                return false;
            }
            $('#captcha_code').focus();
        }
    }
    
    function handle(e) {
        
        $("#ErrorCaptcha").html("&nbsp;");
        if(e.keyCode === 13){
            e.preventDefault(); // Ensure it is only this code that runs
            if ($('#captcha_code').val().length!=6) {
                $("#ErrorCaptcha").html("Please enter captcha code");
                return false;
            }
            RetailerLogin();
        }
    }

    function RetailerLogin() {
        
        $("#ErrorCaptcha").html("&nbsp;");
        $("#ErrorPassword").html("&nbsp;");
        $("#ErrorMobileNumber").html("&nbsp;");
        
        $("#login_result").html("&nbsp;");
        
        if (!(validIndianMobileNumber($('#MobileNumber').val()))) {
             $("#ErrorMobileNumber").html("Please enter valid mobile number");
             return false;
        }
        
        if ($('#Password').val().length<6) {
             $("#ErrorPassword").html("Please enter valid password");
             return false;
        }
        
        if ($('#captcha_code').val().length!=6) {
             $("#ErrorCaptcha").html("Please enter captcha code");
             return false;
        }
        
        $("#btnsubmit").html("<img src='"+SITE_URL+"/assets/loading_white.gif'> Processing ...");
        
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
                location.href= resultData.url;
            }  
        });
    }
</script>  
<?php include_once("footer.php"); ?>