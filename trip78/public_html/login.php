<?php include_once("header.php");?> 
    <div class="site wrapper-content">
	    <div class="top_site_main" style="background-image:url(images/banner/top-heading.jpg);">
		    <div class="banner-wrapper container article_heading">
			    <div class="breadcrumbs-wrapper">
				    <ul class="phys-breadcrumb">
                        <li><a href="index.php" class="home">Home</a></li>
					    <li><a href="login.php" class="home">Login</a></li>
					</ul>
				</div>
				 
            </div>
		</div>
		<section class="content-area">
		    <div class="container">
			    <div class="row">
				    <div class="site-main col-sm-6" >
                        <h3 style="font-size:24px !important;color:#0081c8"><?php echo $Tours[0]['TourTypeName'];?></h3>
                        
                        <div class="form_popup from_login" tabindex="-1">
                            <div class="wpb_wrapper pages_content">
                                <h4>Login</h4>
                                <div id="frmuserRegistrationForm" role="form" class="wpcf7">
                                    <div class="screen-reader-response"></div>
                                    <form method="post" class="wpcf7-form" novalidate="novalidate"  id="userRegistrationForm" name="userRegistrationForm" style="border: none;"> 
                                    <div class="form-contact">
                                        <div class="form-contact-fields">
                                            <span class="wpcf7-form-control-wrap your-subject">
                                                <input type="text" class="input" name="UserName"  placeholder="Email/Mobile Number*" id="UserName" value="" class="wpcf7-form-control"  autocomplete="off" required="">
                                                <span id="ErrUserName" class="errorString"></span>
                                            </span>
                                        </div>
                                        <div class="form-contact-fields">
                                            <span class="wpcf7-form-control-wrap your-subject">
                                                <input type="password" class="input" name="Password" id="Password"  placeholder="Password*"  required="">
                                                <span id="ErrPassword" class="errorString"></span>
                                            </span>
                                        </div> 
                                        <div class="form-contact-fields">
                                            <input type="button" onclick="doLogin()" value="Login" class="wpcf7-form-control wpcf7-submit">
                                             <label style="color: red;" id="errormessage"></label>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
					</div>
					<div class="widget-area align-left col-sm-3" >
                             
                    </div>
				</div>
			</div>
		</section>
	</div>
<script>
    function doLogin() {
        ErrorCount=0;
         
        IsNonEmpty("UserName","ErrUserName","Please Enter Email/Mobile Number");
        IsNonEmpty("Password","ErrPassword","Please Enter Password");
        if (ErrorCount>0){
            return false;
        }
        var param = jQuery("#userRegistrationForm").serialize();
        jQuery("#errormessage").html("<img src='assets/loading.gif' style='width:32px'>");
        jQuery.post( "webservice.php?action=doLogin",param,function(data) {
            var obj = JSON.parse(data); 
            var html = "";
             jQuery("#errormessage").html('');
            if (obj.status=="failure") {
                jQuery("#errormessage").html(obj.message);
            } else {
                location.href='MyProfile.php';
                //html = "<div style='text-align:center;font-size:20px;padding:50px;'><img src='../admin/assets/tick.jpg' style='width:128px;margin:0px auto'><br><br><h5 style='line-height:30px;font-size: 32px;margin-bottom:0px'>"+obj.message+"</h5><br><br><input type='button' onclick='location.href=\"login.php\"' class='wpcf7-form-control wpcf7-submit' style='padding:10px 50px;background:#ffb300;box-shadow: 0 2px 0 0 rgba(255, 179, 0, 0.6);border:none;' value='Continue'>";
                //jQuery("#frmuserRegistrationForm").html(html);
            }
        });
    }
</script>
<?php include_once("footer.php");?>