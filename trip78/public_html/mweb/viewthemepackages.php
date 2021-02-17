<?php include_once("header.php");?>
<?php
    $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and TourThemeID='".$_GET['theme']."'");
    $theme = $mysql->select("select * from _tbl_tour_theme where  TourThemeID='".$_GET['theme']."'");
    $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and SubTourTypeID='".$_GET['subtour']."'");
    $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and TourTypeID='".$SubTours[0]['TourTypeID']."'");
?>
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
            <a href="viewthemes.php"><i class="material-icons">keyboard_backspace</i></a>
        </div>
        <div class="col center" style="padding-left:0px;">
            <a href="javascript:void(0)" class="logo">
            <!--<figure><img src="https://trip78.in/images/logo_footer.png" alt=""></figure>--><?php echo $theme[0]['TourTheme'];?></a>
        </div>
        <div class="right">
            <a href="javascript:void(0)" class="searchbtn"><i class="material-icons">search</i></a>
            <!--<a href="javascript:void(0)" class="menu-right"><i class="material-icons">person</i></a>-->
        </div>
    </header>  
    <div class="page-content" style="overflow:hidden">
        <div class="content-sticky-footer" style="padding-bottom: 0px !important;margin-top:5px">            
            <div class="row" style="padding:18px;padding-right: 18px;padding-top:0px;height:80vh; overflow: auto;">
                <div class="col-12" style="padding-left: 5px;padding-right: 5px;">
                    <?php foreach($Packages as $Package) {                             
                        
                             $tourThumb =  $mysql->select("select * from _tbl_tours_package_images where IsDelete='0' and PackageID='".$Package['PackageID']."' order by ImageOrder");
                        ?>
                    <div style="border:1px solid #eee;border-radius:7px;margin-top:5px;margin-bottom:7px;background:#f9f9f9">
                                <div class="row">
                                    <div class="col-5 col-md-4" style="padding-right:0px">
                                        <a href="tourpackagedetails.php?tid=<?php echo $Package['PackageID'];?>">
                                        <img src="https://www.trip78.in/uploads/package/<?php echo $tourThumb[0]['ImageName'];?>" alt="" width="100%" style="height: 100%;border-radius:6px 0px 0px 6px" />
                                        </a>
                                    </div>
                                    <div class="col-7 col-md-8" style="padding-left:5px">
                                        <a href="tourpackagedetails.php?tid=<?php echo $Package['PackageID'];?>">
                                            <h6 style="font-size: 13px;font-weight: bold;color: #444;margin-top:5px;margin-bottom:5px;"><?php echo $Package['PackageName'];?></h6>
                                        </a>
                                        <div class="row" style="margin-left: 0px;margin-right: 0px;">
                                            <div class="col-3 col-md-3" style="float: left;border-right:1px solid #eee;text-align:center;padding-left:0px;padding-right:3px">
                                                <span style="color: #c6c6c6;font-size: 15px;font-weight: bold;"><?php echo $Package['NightsCount'];?></span>
                                                <p style="color:#626060;;padding:0px;font-size:9px;margin-bottom: 0px;">Nights</p>
                                            </div>
                                            <div class="col-9 col-md-9" style="padding-left:3px;border-bottom: 1px solid #eee;">
                                                <p style="color:#626060;;padding:0px;font-size:10px;margin-bottom: 0px;">Joining  < <span style="color: #0eb53d;font-weight: bold;"><?php echo $Package['JoiningPlace'];?></span></p>
                                                <p style="color:#626060;;padding:0px;font-size:10px;margin-bottom: 0px;">Leaving  > <span style="color: red;font-weight: bold;"><?php echo $Package['LeavingPlace'];?></span></p>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-left: 0px;margin-right: 0px;">
                                             <div class="col-3 col-md-3" style="float: left;border-right:1px solid #eee;text-align:center;padding-left:0px;padding-right:3px">
                                                <hr style="margin-top:0px;margin-bottom:0px">
                                                <span style="color: #c6c6c6;font-size: 15px;font-weight: bold;"><?php echo $Package['CountryCount'];?></span> <p style="color:#626060;;padding:0px;font-size:9px;margin-bottom: 0px;">Country</p>
                                                <hr style="margin-top:0px;margin-bottom:0px">
                                                <span style="color: #c6c6c6;font-size: 15px;font-weight: bold;"><?php echo $Package['CityCount'];?></span> <p style="color:#626060;;padding:0px;font-size:9px;margin-bottom: 0px;"><?php echo ($Package['CityCount']>0)? "Cities" : "City";?></p>
                                            </div>                                                    
                                            <div class="col-9 col-md-9" style="padding-left:3px;padding-right:3px;text-align:center;padding-top:5px;">
                                                <p style="color:#626060;font-size:10px;text-align:center;margin-bottom: 0px;">All inclusive price | Per Person<br>
                                                    <span style="font-size:14px;font-weight:bold;color:red">Rs <?php echo $Package['PackagePrice'];?>*</span>
                                                    <br>
                                                    <a href="enquiry.php?package=<?php echo $Package['PackageID'];?>" class="btn btn-primary btn-sm" style="padding: 5px 10px;font-size: 11px;line-height: 1;text-transform: none;border-radius: 5px;margin-bottom:5px;margin-top:5px;">Enquiry Now</a>    
                                                </p>    
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                            </div>
                        <?php } ?>
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
