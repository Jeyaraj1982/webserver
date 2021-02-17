<?php include_once("header.php");?>

        <!-- fullscreen menu ends -->

        <!-- page main start -->
         
                 
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
                <?php
                     $tours = $mysql->select("select * from _tbl_tour   where TourTypeID='".$_GET['tour']."' and IsPublish='1' ");
                ?>
                    <a href="index.php"><i class="material-icons">keyboard_backspace</i></a>
                   <!-- <a href="javascript:void(0)" class="menu-left"><i class="material-icons">menu</i></a>-->                                                                                                          
                </div>
                <div class="col center">
                    <a href="" class="logo">
                        Contact Us</a>
                </div>
                <div class="right">
                    <a href="javascript:void(0)" class="searchbtn"><i class="material-icons">search</i></a>
                    <!--<a href="javascript:void(0)" class="menu-right"><i class="material-icons">person</i></a>-->
                </div>
                 
            </header>
            <?php if ($i>2) {?>
           <script>
            var element = document.getElementById("tab<?php echo $_GET['tour'];?>");

//element.scrollIntoView();
//element.scrollIntoView(false);
//element.scrollIntoView({block: "end"});
//element.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
element.scrollIntoView({behavior: "smooth"});
           </script>
           <?php } ?>
            <div class="page-content" style="">
                 
 <style>
 .errorString {color:red}
 </style>                
                
                   
 

<div class="content-sticky-footer" style="padding-bottom: 0px !important;margin-top:10px;padding:20px;">            
    <div class="block-title text-center" style="font-size:30px;line-height:30px;margin-bottom:0px;padding-bottom:0px;padding-top:0px;color:yellow !important">Contact </div>
        <div class="row">
            <div class="col-md-12">
                <div style="margin-top:50px;padding:10px;background:#f9f9f9">
                <form action="" method="post" id="pincodeForm" class="form-inline" novalidate="novalidate" >
                    <div class="form-group">
                        <input type="text" class="form-control" id="PinCode" name="PinCode" placeholder="Your Pincode" style="padding-left:0px;width:150px">
                    </div>
                    <button type="button"  onclick="getPincodeInfo()" class="btn btn-primary mb-2" style="padding:2px 20px">Get Contacts</button>
                </form>
                <div id="pincode_result"></div>
                </div>
            </div>      
        </div>
        <div class="pages_content padding-top-4x">
            <div class="wpb_wrapper pages_content">
            <br><br>
                <h4 style="color:yellow;">Have a question?</h4>
                 <div style="margin-top:50px;padding:10px;background:#f9f9f9">
                <div role="form" class="wpcf7" id="frmwebsiteEnquiryFrom">
                    <div class="screen-reader-response"></div>
                    <form action="" method="post" id="websiteEnquiryFrom" name="websiteEnquiryFrom" class="wpcf7-form" novalidate="novalidate">
                        <div class="form-contact">
                            <div class="form-group">
                                <input type="text" name="ContactName" id="ContactName" value="" size="40" class="form-control" placeholder="Your name*">
                                <span id="ErrContactName" class="errorString"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" name="MobileNumber" id="MobileNumber" value="" size="40" class="form-control" placeholder="Mobile Number*">
                                <span id="ErrMobileNumber" class="errorString"></span>
                            </div>
                            <div class="form-group">
                                <input type="Email" name="Email" id="Email" value="" size="40" class="form-control" placeholder="Email*">
                                <span id="ErrEmail" class="errorString"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" name="Subject" id="Subject" value="" size="40" class="form-control" placeholder="Subject">
                                <span id="ErrSubject" class="errorString"></span>
                            </div>
                            <div class="form-group">
                                <textarea name="Description" id="Description" cols="40" rows="3" class="form-control wpcf7-textarea" placeholder="Message"></textarea>
                                <span id="ErrDescription" class="errorString"></span>
                            </div>
                            <div class="form-group">
                                <input type="button" onclick="doSubmitEnquiry()" value="Submit" class="btn btn-primary mb-2">
                            </div>
                            <div class="form-group">
                                <label style="color: red;" id="errormessage"></label>
                                <label style="color: Green;" id="successmessage"></label>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <script type='text/javascript' src="https://www.trip78.in/assets/js/app.js"></script>
<script>
    function doSubmitEnquiry() {
        ErrorCount=0;
        jQuery("#loadingicon").html('');
        IsNonEmpty("ContactName","ErrContactName","Please Enter Name");
        IsNonEmpty("Email","ErrEmail","Please Enter Email");
        IsNonEmpty("MobileNumber","ErrMobileNumber","Please Mobile Number");
        IsNonEmpty("Subject","ErrSubject","Please Enter Subject");
        IsNonEmpty("Description","ErrDescription","Please Enter Description");
        if (ErrorCount>0){
            return false;
        }
        var param = jQuery("#websiteEnquiryFrom").serialize();
        jQuery("#errormessage").html("<img src='https://www.trip78.in/assets/loading.gif' style='width:32px'>");
        jQuery.post( "webservice.php?action=doSubmitEnquiry",param,function(data) {
            var obj = JSON.parse(data); 
            var html = "";
             jQuery("#errormessage").html('');
            if (obj.status=="failure") {
                jQuery("#errormessage").html(obj.message);
            } else {
                 html = "<div style='text-align:center;font-size:20px;padding:50px;'><img src='https://www.trip78.in/admin/assets/tick.jpg' style='width:128px;margin:0px auto'><br><br><h5 style='line-height:32px;font-size: 23px;margin-bottom:0px'>"+obj.message+"</h5><br><br><input type='button' onclick='location.href=\"index.php\"' class='wpcf7-form-control wpcf7-submit' style='padding:10px 50px;background:#ffb300;box-shadow: 0 2px 0 0 rgba(255, 179, 0, 0.6);border:none;' value='Continue'>";
                jQuery("#frmwebsiteEnquiryFrom").html(html);
            }
        });
    }
    
    function getPincodeInfo() {
        
           jQuery("#pincode_result").html("");
        if (jQuery('#PinCode').val()=="") {
            jQuery("#pincode_result").html("<span style='color:red'>Please enter valid pincode</span>");
            return true;
        }
        jQuery("#pincode_result").html("<img src='https://www.trip78.in/assets/loading.gif' style='width:32px'> Processing ...");
        
        var param = jQuery("#pincodeForm").serialize();
        jQuery.post( "webservice.php?action=getPincodeInfo",param,function(data) { 
            var obj = JSON.parse(data); 
            var html = "";
            
            if (obj.status=="failure") {
                jQuery("#pincode_result").html(obj.message);
            } else {
                 html = "<div style='text-align:center;padding:10px;text-align: left;border: 1px dashed #ccc;width: -moz-max-content;margin: 0px auto;background: #f9f9f9;border-radius: 10px;'>"
                    + obj.AgentName +"<br>"
                    + obj.MobileNumber +"<br>"
                    + obj.EmailID +"<br>"
                    + obj.AddressLine1 +"<br>"
                    + obj.AddressLine2 +"<br>"
                    + obj.CityName +"<br>"
                    + obj.DistrictName +"<br>"
                    + obj.StateName +"<br>"
                    + obj.CountryName + "</div>";
                jQuery("#pincode_result").html(html);
            }  
        });
         
    }
</script>
      
                
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
