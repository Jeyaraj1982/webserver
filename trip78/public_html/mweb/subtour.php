<?php include_once("header.php");?>

        <!-- fullscreen menu ends -->

        <!-- page main start -->
        <style>
                 
                 div.scrollmenu {
  background-color: #FED700;
  overflow: auto;
  white-space: nowrap;
  min-width:100%;
}

div.scrollmenu a {
  display: inline-block;
  color: #000;
  
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #B6A23F;
}
.divactive {
     background-color: #B6A23F;
}

         
 
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
                <?php
                     $tours = $mysql->select("select * from _tbl_tour   where TourTypeID='".$_GET['tour']."' and IsPublish='1' ");
                ?>
                    <a href="index.php"><i class="material-icons">keyboard_backspace</i></a>
                   <!-- <a href="javascript:void(0)" class="menu-left"><i class="material-icons">menu</i></a>-->                                                                                                          
                </div>
                <div class="col center">
                    <a href="" class="logo">
                        <!--<figure><img src="https://trip78.in/images/logo_footer.png" alt=""></figure>--><?php echo $tours[0]['TourTypeName'];?></a>
                </div>
                <div class="right">
                    <a href="javascript:void(0)" class="searchbtn"><i class="material-icons">search</i></a>
                    <!--<a href="javascript:void(0)" class="menu-right"><i class="material-icons">person</i></a>-->
                </div>
                <div class="scrollmenu">
                  <?php
                       $tours = $mysql->select("select * from _tbl_tour  where IsPublish='1' order by ListOrder");
                       $i=0;
                       foreach($tours as $tour) {
                           $i++;
                  ?>
  <a id="tab<?php echo $tour['TourTypeID'];?>" href="subtour.php?tour=<?php echo $tour['TourTypeID'];?>" <?php echo ($_GET['tour']==$tour['TourTypeID']) ? " class='divactive' " : "";?>><?php echo $tour['TourTypeName'];?></a>
  <?php } ?>
  <!--<a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>-->
 
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
            <div class="page-content" style="overflow:hidden">
                 
                 
                
                   
 

                  <div class="content-sticky-footer" style="padding-bottom: 0px !important;margin-top:60px">            
 
 
    
      <div class="row" style="padding:18px;padding-right: 18px;padding-top:0px;height:80vh; overflow: auto;">
                    <?php
                        $stours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and TourTypeID='".$_GET['tour']."' order by SubTourTypeName");
                        foreach($stours as $stour) {
                            ?>
                                <div class="col-6" style="padding-right:0px;padding-left:0px;margin-bottom:5px;">
                                    <!--<a href="tourpackage.php?subtour=<?php echo $stour['SubTourTypeID'];?>"><div style="background: #fff;padding:5px;border: 0px solid #222;">-->
                                    <a href="tourpackage.php?subtour=<?php echo $stour['SubTourTypeID'];?>"><div style="background: #000;padding:5px;border: 0px solid #222;">
                                    <!--<div style="border-radius:5px 5px 0px 0px;position:absolute;top:0px;margin-right:5px;color:#fff;background:rgba(45, 156, 210, 0.8);width:-moz-available;font-size:14px;padding:3px 5px"><?php echo $stour['SubTourTypeName'];?></div>-->
                                    <div style="border-radius:5px 5px 0px 0px;position:absolute;top:0px;margin-right:5px;color:yellow;background:rgba(45, 156, 210, 0.8);width:-moz-available;font-size:14px;padding:3px 5px"><?php echo $stour['SubTourTypeName'];?></div>
                                     <img src="https://www.trip78.in/uploads/<?php echo $stour['Image'];?>" style="width:100%;margin:0px auto;border-radius:5px;">
                                     </div>
                                     </a>
                                </div>
                            <?php
                        }
                    ?>
                </div>
   
   
 
</div>
      
                
                <div class="footer-wrapper"  style="margin-top:-110px">
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
