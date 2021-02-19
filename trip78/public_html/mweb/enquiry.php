<?php include_once("header.php");?>
<?php
    $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and PackageID='".$_GET['package']."'");
?>
<style>
.error_string{color:red};
</style>
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
            <a href="tourpackagedetails.php?tid=<?php echo $Packages[0]['PackageID'] ;?>"><i class="material-icons">keyboard_backspace</i></a>
        </div>
        <div class="col center" style="padding-left:0px;">
            <a href="javascript:void(0)" class="logo">
             <?php echo $Packages[0]['PackageName'];?></a>
        </div>
        <div class="right">
         <!--   <a href="javascript:void(0)" class="searchbtn"><i class="material-icons">search</i></a>
            <a href="javascript:void(0)" class="menu-right"><i class="material-icons">person</i></a> -->
        </div>
    </header>  
    <div class="page-content" style="overflow:auto">
        <div class="content-sticky-footer" style="padding-bottom: 0px !important;">            
            <div class="row" style="padding:18px;padding-right: 18px;padding-top:0px;">
                <div class="col-12" style="padding-left: 5px;padding-right: 5px;">
                <br> 
                                <h3 style="text-align:center;font-size:16px;font-weight:bold;color:yellow">Enquiry Form</h3>
                         <div style="background:#fff;padding:20px 10px;margin:10px;padding-top:10px;border:1px solid #ccc;border-radius:5px;">

               
                <form  id="tourBookingForm" method="POST" action="#">
                                                <input type="hidden" value="<?php echo $Packages[0]['PackageID'];?>" name="PackageID">
                                                <div class="form-group" style="margin-bottom:0px">
                                                    <input name="FullName" class="form-control" id="FullName" value="" placeholder="First name" type="text">
                                                    <span class="error_string" id="ErrFullName"></span>
                                                </div>
                                               
                                                <div class="form-group" style="margin-bottom:0px">
                                                    <input name="EmailID" class="form-control" id="EmailID" value="" placeholder="Email" type="text">
                                                    <span class="error_string" id="ErrEmailID"></span>
                                                </div>
                                                <div class="form-group" style="margin-bottom:0px">
                                                    <input name="MobileNumber" class="form-control" id="MobileNumber" value="" placeholder="Phone" type="text">
                                                    <span class="error_string" id="ErrMobileNumber"></span>
                                                </div>
                                                 <div class="form-group" style="margin-bottom:0px">
                                                    <input name="CurrentCity" class="form-control" id="CurrentCity" value="" placeholder="Current City" type="text">
                                                    <span class="error_string" id="ErrCurrentCity"></span>
                                                </div>
                                                 <div class="form-group" style="margin-bottom:0px">
                                                    <input name="Pincode" class="form-control" id="Pincode" value="" placeholder="Pincode" type="text">
                                                    <span class="error_string" id="ErrPincode"></span>
                                                </div>
                                                 <div class="form-group" style="margin-bottom:0px">
                                                    <input name="Description" class="form-control" id="Description" value="" placeholder="Description" type="text">
                                                    <span class="error_string" id="ErrDescription"></span>
                                                </div>
                                                <div class="form-group" style="margin-bottom:0px">
                                                    <label style="font-weight:normal">&nbsp;&nbsp;&nbsp;Number of Adults (age: above 12)</label>
                                                    <select name="NumberofAdults" id="NumberofAdults" class="form-control" style="min-height:auto;padding-top:5px">
                                                       
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                    <span class="error_string" id="ErrNumberofAdults"></span>
                                                 </div>
                                                <div  class="form-group" style="margin-bottom:0px">
                                                    <label style="font-weight:normal">&nbsp;&nbsp;&nbsp;Number of Infants (age: below 2 yr)</label>
                                                    <select name="NumberofInfants" id="NumberofInfants" class="form-control" style="min-height:auto;padding-top:5px">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>
                                                <div  class="form-group" style="margin-bottom:0px">
                                                    <label style="font-weight:normal">&nbsp;&nbsp;&nbsp;Number of Children (age: 3-12)</label>
                                                    <select name="NumberofChildrens" id="NumberofChildrens" class="form-control" style="min-height:auto;padding-top:5px">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>
                                                
                                                
                                                
                                                <!--
                                                <div class="">
                                                    <input type="text" name="date_book" value="" placeholder="Date Book" class="hasDatepicker">
                                                </div>
                                                -->
                                                 
                                               <div id="red" style="margin-top:10px;"></div>
                                                
                                                <br>
                                                <input class="btn btn-primary btn-sm" onclick="SaveEnquiryDetails()" value="Send Enquiry" type="button" class="btn btn-primary btn-sm" style="padding: 10px;font-size: 16px;line-height: 1;text-transform: none;border-radius: 5px;margin-bottom:5px;margin-top:5px;width: 100%;font-weight: bold;padding-bottom: 13px;">
                                            </form>
                                      <div style="display:none;"      >
                                      
                                      
                                      <img src='https://www.trip78.in/assets/loading.gif' style='width:32px'>
                                      </div>
                                            <script>
                                          function validateEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
  return regex.test(email);
}
                                  function SaveEnquiryDetails() {
                                      $("#ErrFullName").html("");
                                      $("#ErrCurrentCity").html("");
                                      $("#ErrPincode").html("");
                                      $("#ErrEmailID").html("");
                                      $("#ErrMobileNumber").html("");
                                    //  $("#ErrDescription").html("");
                                      var err=0;
                                      if ($('#FullName').val().trim().length==0) {
                                        $("#ErrFullName").html("Please enter full name");
                                        err++;
                                      }
                                      
                                        if ($('#EmailID').val().trim().length==0) {
                                        $("#ErrEmailID").html("Please enter email id");
                                        err++;
                                      } 
                                      
                                      if (!(validateEmail($('#EmailID').val())))            {
                                        $("#ErrEmailID").html("Please enter valid email id");
                                        err++;
                                      }    
                                      
                                       // if ($('#MobileNumber').val().trim().length==0) {           
                                      //  $("#ErrMobileNumber").html("Please enter Mobile Number");
                                      //  err++;
                                     // }
                                      
                                      
                                         var mobilenumber =  $("#MobileNumber").val();
                           
                       if (mobilenumber.trim().length!=10) {
                         
                             $("#ErrMobileNumber").html("Please enter mobile number");
                            err++;
                       }
                       
                       var mobilenumber = parseInt( $("#MobileNumber").val().trim());
                        mobilenumber = mobilenumber==NaN ? 0 : mobilenumber;
                           if (!(mobilenumber<9999999999 && mobilenumber>6000000000)) {
                             $("#ErrMobileNumber").html("Please enter valid mobile number");
                            err++;
                       }     
                                      
                                      
                                      
                                      
                                                                                           
                                       
                                      if ($('#CurrentCity').val().trim().length==0) {            
                                        $("#ErrCurrentCity").html("Please enter city name");
                                        err++;
                                      }
                                      
                                        if ($('#Pincode').val().trim().length!=6) {          
                                        $("#ErrPincode").html("Please enter pincode");
                                        err++;
                                      }
                                      
                                       //  if ($('#Description').val().trim().length<3) {          
                                       // $("#ErrDescription").html("Please enter description");
                                      //  err++;
                                    //  }
                                      
                                      if (err>0) {
                                          return false;
                                      }
                                      
                                     
                                      
                                      
                                         
                                      if ($('#NumberofAdults').val()==0) {           
                                        $("#ErrNumberofAdults").html("Please select atleast one Adults");
                                        return false;
                                      }
                                      
                                      
                                      
                                      
     var param = jQuery( "#tourBookingForm").serialize();
    //jQuery("#confrimation_text").html(loading);
    
    jQuery("#red").html("<img src='https://www.trip78.in/assets/loading.gif' style='width:32px'> processing ....");
    jQuery.post( "webservice.php?action=SubmitEnquiryDetails",param,function(data) {                                       
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            jQuery("#red").html("<div style='padding:10px;background:#f1f1f1;'>"+obj.message+"</div>");
        } else {
            jQuery("#red").html(""); 
            jQuery("#FullName").val("");
            jQuery("#CurrentCity").val("");
            jQuery("#NumberofAdults").val(0);
            jQuery("#NumberofInfants").val(0);
            jQuery("#NumberofChildrens").val(0);
            jQuery("#Pincode").val(0);
            jQuery("#EmailID").val(0);
            jQuery("#MobileNumber").val(0);
            jQuery("#Description").val(0);
                                                 
                                                   
            jQuery("#tourBookingForm").html("<div style='padding:10px;background:#f1f1f1;'>"+obj.message+"</div>");
        }
    });
}
                               </script>
                               </div>
               
               
                        </div>
                    </div>
                </div>
            </div> 
   <!--<div class="container">  
  <!--<h2>Carousel Example</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">

      <div class="item active">
        <img src="la.jpg" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          <h3>Los Angeles</h3>
          <p>LA is always so much fun!</p>
        </div>
      </div>

      <div class="item">
        <img src="chicago.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago!</p>
        </div>
      </div>
    
      <div class="item">
        <img src="ny.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3>New York</h3>
          <p>We love the Big Apple!</p>
        </div>
      </div>
  
    </div>

    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
    
    
 </div> -->            
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
