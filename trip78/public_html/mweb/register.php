<?php include_once("header.php");?>
<div class="page" >
    <form class="searchcontrol">
        <div class="input-group">
            <div class="input-group-prepend">
                <button type="button" class="input-group-text close-search"><i class="material-icons">keyboard_backspace</i></button>
            </div>
            <input type="email" class="form-control border-0" placeholder="Search..." aria-label="Username">
        </div>
    </form>
    <header class="row m-0 fixed-header">
        <div class="left">
            <a href="index.php"><i class="material-icons">keyboard_backspace</i></a>
        </div>
        <div class="col center">
            <a href="" class="logo">Register</a>
        </div>
        <div class="right">
            <a href="javascript:void(0)" class="searchbtn"><i class="material-icons">search</i></a>
        </div>
    </header>
    <div class="page-content">
    <div class="content-sticky-footer" style="padding-bottom: 0px !important;margin-top:10px;padding:20px;">            
        <div class="block-title text-center" style="font-size:30px;line-height:30px;margin-bottom:0px;padding-bottom:0px;padding-top:0px;color:yellow !important">Register</div>
            <div class="row">
                <div class="col-md-12">
                    <div id="frmuserRegistrationForm" style="background:#f1f1f1;padding:10px;margin-top:50px">
                    <form action="" method="post" id="userRegistrationForm" name="userRegistrationForm" >
                        <div class="form-group">
                            <input type="text" class="form-control" id="UserName" name="UserName" placeholder="Your Name" style="padding-left:0px;">
                             <span id="ErrUserName" class="errorString"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="MobileNumber" name="MobileNumber" placeholder="Your MobileNumber" style="padding-left:0px;">
                             <span id="ErrMobileNumber" class="errorString"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="EmailID" name="EmailID" placeholder="Your EmailID" style="padding-left:0px;">
                             <span id="ErrEmailID" class="errorString"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="PinCode" name="PinCode" placeholder="Your Pincode" style="padding-left:0px">
                             <span id="ErrPinCode" class="errorString"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="Password" name="Password" placeholder="Your Password" style="padding-left:0px;">
                             <span id="ErrPassword" class="errorString"></span>
                        </div>
                        <button type="button"  onclick="doRegister()" class="btn btn-primary mb-2" style="padding:2px 20px">Register</button>
                    </form>
                    <label style="color: red;" id="errormessage"></label>
                    </div>
                </div>      
            </div>
            <script>
                function doRegister() {
                    ErrorCount=0;
                    jQuery("#loadingicon").html('');
                    jQuery("#ErrUserName").html('');
                    jQuery("#ErrEmailID").html('');
                    jQuery("#ErrMobileNumber").html('');
                    jQuery("#ErrPassword").html('');
                    jQuery("#ErrPinCode").html('');
        
                    IsNonEmpty("UserName","ErrUserName","Please Enter Name");
                    IsNonEmpty("EmailID","ErrEmailID","Please Enter Email");
                    IsNonEmpty("MobileNumber","ErrMobileNumber","Please Mobile Number");
                    IsNonEmpty("Password","ErrPassword","Please Enter Password");
                    IsNonEmpty("PinCode","ErrPinCode","Please Enter PinCode");
        
                    if (ErrorCount>0){
                        return false;
                    }
                    var param = jQuery("#userRegistrationForm").serialize();
                    jQuery("#errormessage").html("<img src='https://www.trip78.in/assets/loading.gif' style='width:32px'>");
                    jQuery.post( "webservice.php?action=doRegister",param,function(data) {
                        var obj = JSON.parse(data); 
                        var html = "";
                        jQuery("#errormessage").html('');
                        if (obj.status=="failure") {
                            jQuery("#errormessage").html(obj.message);
                        } else {
                            html = "<div style='text-align:center;font-size:20px;padding:50px;'><img src='https://www.trip78.in/admin/assets/tick.jpg' style='width:128px;margin:0px auto'><br><br><h5 style='line-height:30px;font-size: 32px;margin-bottom:0px'>"+obj.message+"</h5><br><br><input type='button' onclick='location.href=\"login.php\"' class='wpcf7-form-control wpcf7-submit' style='padding:10px 50px;background:#ffb300;box-shadow: 0 2px 0 0 rgba(255, 179, 0, 0.6);border:none;' value='Continue'>";
                            jQuery("#frmuserRegistrationForm").html(html);
                        }
                    });
                }
        </script>
    </div>
 
 
      
                
                <div class="footer-wrapper" style="display: none;">
                    <div class="footer">
                        <div class="row mx-0">
                            <div class="col">
                                Trip78
                            </div>
                            <div class="col-7 text-right">
                                <a href="" class="social"><img src="img/facebook.png" alt=""></a>
                                <a href="" class="social"><img src="img/googleplus.png" alt=""></a>
                                <a href="" class="social"><img src="img/linkedin.png" alt=""></a>
                                <a href="" class="social"><img src="img/twitter.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="footer dark" style="display: none;">
                        <div class="row mx-0">
                            <div class="col  text-center">
                                Copyright @2018, Trip78.in
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page main ends -->

    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://maxartkiller.com/website/mobileux/dashboard_html/js/jquery-3.2.1.min.js"></script>
    <script src="https://maxartkiller.com/website/mobileux/dashboard_html/js/popper.min.js"></script>
    <script src="https://maxartkiller.com/website/mobileux/dashboard_html/vendor/bootstrap-4.1.3/js/bootstrap.min.js"></script>

    <!-- Cookie jquery file -->
    <script src="https://maxartkiller.com/website/mobileux/dashboard_html/vendor/cookie/jquery.cookie.js"></script>

    <!-- sparklines chart jquery file -->
    <script src="https://maxartkiller.com/website/mobileux/dashboard_html/vendor/sparklines/jquery.sparkline.min.js"></script>

    <!-- Circular progress gauge jquery file -->
    <script src="https://maxartkiller.com/website/mobileux/dashboard_html/vendor/circle-progress/circle-progress.min.js"></script>

    <!-- Swiper carousel jquery file -->
    <script src="https://maxartkiller.com/website/mobileux/dashboard_html/vendor/swiper/js/swiper.min.js"></script>

    <!-- Application main common jquery file -->
    <script src="https://maxartkiller.com/website/mobileux/dashboard_html/js/main.js"></script>

    <!-- page level script -->
     <script>
     
     

// fetch('https://api.unsplash.com/photos/random/?count=5&client_id=52d8369eb3e2576a5f5b6423865e074e9c7045761bff1ac5664ff3e0bdb57a1d') 
//   .then(response => response.json())
//   .then(data => {
//     data.forEaach(function(image, i) {
//       document.querySelector("#slide-" + (i+1)).innerHTML = `
//         <img src="${image.urls.regular}" alt="">
//         <p class="author-info">
//           <a href="${image.links.html}?utm_source=slider-thing&utm_medium=referral&utm_campaign=api-credit">Photo by ${image.user.name}</a> on <a href="https://unsplash.com/">Unsplash</a>
//         </p>
//       `;
//     });
//   });


     </script>
</body>

</html>
