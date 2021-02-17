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
                        About Trip78</a>
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
                 
                 
                
                   
 

                  <div class="content-sticky-footer" style="padding-bottom: 0px !important;margin-top:10px">            
 
 
    
        <div class="block-title text-center" style="font-size:30px;line-height:30px;margin-bottom:0px;padding-bottom:0px;padding-top:0px;">About Trip78 </div>
                    <h2 class="text-center mt-0 mb-4"></h2>
                    <div class="row mx-0">
                        <div class="col text-center">
                        <img src="https://trip78.in/assets/abous_logo.png" alt="" style="width: 200px;margin:0px auto;"><br>
                            <p style="text-align: left;">Thank you so much for your support. We truly appreciate your support and confidence that you have on us. we are looking forward to serving you continuously. We are the very famous online tour agency in India.Thought out our website "Trip78" you may know our cost and verity of tour packages all over the world. For Trip 78, you are the starting point of everything we do. Thus with every trip, we ensure working sincerely to fulfil your expectation in an enjoyable and responsible way. Our vision to give you a consistent occasion encounter makes as one of the main visit administrator in the regularly extending travel industry. We start our business since 2000, in excess of more than 1000multiple customers all over the world. we are the most trustable travel agency in India. We know the development and accomplishment of our organisation relies on satisfying our customers need each day. Trip78 provides more than 500 packages all over the world. Exclusive special tours for couples, ladies and students. Whether it's a corporate tour, family tour,honeymoon, adventure tours,wildlife,water activities,nature, we have varieties of tour packages to suit the most of your taste, requirement and budget. So Hurry up! book a package and enjoy your holidays with Trip78. </p>
                        </div>
                         
                     
                    
                       
                    </div>
                    <br>
                </div>
   
   
 
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
