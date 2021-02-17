<?php include_once("header.php");?>

        <!-- fullscreen menu ends -->

        <!-- page main start -->
        <div class="page">
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
            </header>
            <div class="page-content">
                 
                 <style>
                 
                 div.scrollmenu {
  background-color: #333;
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
}



.content_slider {
 
  text-align: center;
  overflow: hidden;
}

.content_slides {
  display: flex;
  
  overflow-x: auto;
  scroll-snap-type: x mandatory;
  
  
  
  scroll-behavior: smooth;
  -webkit-overflow-scrolling: touch;
  
  /*
  scroll-snap-points-x: repeat(300px);
  scroll-snap-type: mandatory;
  */
}
.content_slides::-webkit-scrollbar {
  /*width: 10px;
  height: 10px; */
}
.content_slides::-webkit-scrollbar-thumb {
  background: black;
  border-radius: 10px;
}
.content_slides::-webkit-scrollbar-track {
  background: transparent;
}
.content_slides > div {
  scroll-snap-align: start;
  flex-shrink: 0;   
 width: 300px; 
  height: 300px;
  margin-right: 50px;
  border-radius: 10px;
  background: #eee;   
  transform-origin: center center;
  transform: scale(1);
  transition: transform 0.5s;
  position: relative;
  
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 100px;
}
.content_slides > div:target {
/*   transform: scale(0.8); */
}
.author-info {
  background: rgba(0, 0, 0, 0.75);
  color: white;
  padding: 0.75rem;
  text-align: center;
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  margin: 0;
}
.author-info a {
  color: white;
}
 
.content_slider > a {
  /*display: inline-flex;
  width: 1.5rem;
  height: 1.5rem;
  background: white;
  text-decoration: none;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  margin: 0 0 0.5rem 0;
  position: relative;    */
}
.content_slider > a:active {
  top: 1px;
}
.content_slider > a:focus {
  background: #000;
}

/* Don't need button navigation */
@supports (scroll-snap-type) {
  .content_slider > a {
    display: none;
  }
}

 
                 </style>
                  <div class=" content_slider scrollmenu">
                  <?php
                       $tours = $mysql->select("select * from _tbl_tour  where IsPublish='1' ");
                       foreach($tours as $tour) {
                  ?>
  <a href="#div_<?php echo $tour['TourTypeID'];?>"><?php echo $tour['TourTypeName'];?></a>
  <?php } ?>
  <!--<a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>-->
  ...
</div> 


                  <div class="content-sticky-footer" style="min-height: auto; padding-bottom: 0px !important;margin-top:10px">
              <div>
      <div class="content_slider scrollmenu">
         <?php  foreach($tours as $tour) { ?>
            <a href="#slide-<?php echo $tour['TourTypeID'];?>"><?php echo $tour['TourTypeName'];?></a>
  <?php } ?>
 

  <div class="content_slides" style="background:#fff;">
      <?php   $tours = $mysql->select("select * from _tbl_tour  where IsPublish='1' "); 
      foreach($tours as $tour) {?>
    <div id="slide-<?php echo $tour['TourTypeID'];?>">
      <div class="row" style="padding:18px;padding-right: 23px;padding-top:0px">
                    <?php
                        $stours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and TourTypeID='".$tour['TourTypeID']."'");
                        foreach($stours as $stour) {
                            ?>
                                <div class="col-6" style="padding-right:0px;padding-left:0px;margin-bottom:5px;">
                                    <a href=""><div style="background: #fff;padding:5px;border: 0px solid #222;">
                                    <div style="border-radius:5px 5px 0px 0px;position:absolute;top:0px;margin-right:5px;color:#fff;background:rgba(45, 156, 210, 0.8);width:-moz-available;font-size:14px;padding:3px 5px"><?php echo $stour['SubTourTypeName'];?></div>
                                     <img src="https://www.trip78.in/uploads/<?php echo $stour['Image'];?>" style="width:100%;margin:0px auto;border-radius:5px;">
                                     </div>
                                     </a>
                                </div>
                            <?php
                        }
                    ?>
                </div>
    </div>
    <?php } ?>
    
  </div>
</div>
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
