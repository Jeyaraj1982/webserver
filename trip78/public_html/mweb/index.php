<?php include_once("header.php");?>

        <!-- fullscreen menu ends -->

        <!-- page main start -->
        <style>
        .content-sticky-footer {padding-bottom:0px !important;}
        
        </style>
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
                    <!--<a href="javascript:void(0)" onclick="window.history.back();"><i class="material-icons">keyboard_backspace</i></a>-->
                    <a href="javascript:void(0)" class="menu-left"><i class="material-icons">menu</i></a>
                </div>
                <div class="col center">
                    <a href="" class="logo">
                        <figure><img src="https://trip78.in/images/logo_footer.png" alt=""></figure></a>
                </div>
                <div class="right">
                    <a href="javascript:void(0)" class="searchbtn"><i class="material-icons">search</i></a>
                    <!--<a href="javascript:void(0)" class="menu-right"><i class="material-icons">person</i></a>-->
                </div>
            </header>
            <div class="page-content" style="padding-top:34px">
                <div class="content-sticky-footer" style="min-height: auto; padding-bottom: 0px !important;">
                    <div data-pagination='{"el": ".swiper-pagination", "hideOnClick": true}' class="swiper-container swiper-init demo-swiper" style="height:180px;padding:0px;">
                        <div class="swiper-pagination" style="margin-top:10px;"></div>
                        <div class="swiper-wrapper" style="padding:0px !important">
                         <?php
                        $sliders = $mysql->select("select * from _tbl_sliders  ");     
                      
                        foreach($sliders as $slider) {
                    ?>
                            <div class="swiper-slide" style="padding:0px !important"><img style="width:100%;" src="<?php echo "https://www.trip78.in/uploads/".$slider['SliderImage'];?>" alt="Home Slider 1"></div>
                            <?php } ?>
                           
                        </div>
                    </div>
                </div>
                  <div class="content-sticky-footer" style="height: calc(100vh-270px); padding-bottom: 0px !important;verlfow:auto;margin-top:10px">
                <div class="row" style="padding:18px;padding-right: 18px;padding-top:0px;padding-bottom:0px;">
                    <?php
                        $tours = $mysql->select("select * from _tbl_tour  where IsPublish='1' ");
                        foreach($tours as $tour) {
                            ?>
                                <div  class="col-6" style="margin-bottom:13px;padding-left: 5px;padding-right: 5px;" >
                                    <!--<a href="subtour.php?tour=<?php echo $tour['TourTypeID'];?>"><div style="background: #fff;padding:5px;border: 0px solid #222;">-->
                                    <a href="subtour.php?tour=<?php echo $tour['TourTypeID'];?>">
                                       <div style="background: #000;border: 0px solid #222;">
                                    <!--<div style="border-radius:5px 5px 0px 0px;position:absolute;top:0px;margin-right:5px;color:#fff;background:rgba(45, 156, 210, 0.8);width:-moz-available;font-size:14px;padding:3px 5px"><?php echo $tour['TourTypeName'];?></div>-->
                                    <div style="border-radius:5px 5px 0px 0px;position:absolute;top:0px;margin-right:5px;color:yellow;background:rgba(45, 156, 210, 0.8);width:-moz-available;font-size:14px;padding:3px 5px"><?php echo $tour['TourTypeName'];?></div>
                                     <img src="https://www.trip78.in/uploads/<?php echo $tour['Image'];?>" style="width:100%;margin:0px auto;border-radius:5px;">
                                     </div>
                                     </a>
                                </div>
                            <?php
                        }
                    ?>
                </div>
                
                
                
                <?php
$MostPopularTourPackages=array();
    $MostPopularTourPackages[] = array("TourThemeID"=>1,"PackageName"=>"Honeymoon","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/honeymoon_romantic.png?tr=w-365,h-260");
    $MostPopularTourPackages[] = array("TourThemeID"=>2,"PackageName"=>"Family","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/family.png?tr=w-365,h-260");
    $MostPopularTourPackages[] = array("TourThemeID"=>3,"PackageName"=>"Friends/Group","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/friends_group.png?tr=w-365,h-260");
    $MostPopularTourPackages[] = array("TourThemeID"=>4,"PackageName"=>"Solo","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/solo.png?tr=w-365,h-260");
?>
    <div class="row" style="padding:18px;padding-right: 18px;padding-top:20px">
    <div class="col-12" style="padding-left:10px;">
    <div style="height:20px;">
      <span style="float:left;color:yellow;padding-left:0px;font-size:18px;">Popular Packages</span>
      <a style="float:right;font-size:12px;color:yellow;margin-top:5px;" href="viewthemes.php">View all</a>
    </div>
    <br>
   
    
    </div>
        <?php foreach($MostPopularTourPackages as $TourPackage) {?>
        <div  class="col-6" style="margin-bottom:13px;padding-left: 5px;padding-right: 5px;" >
        <!--<a href="subtour.php?tour=<?php echo $tour['TourTypeID'];?>"><div style="background: #fff;padding:5px;border: 0px solid #222;">-->
            <a href="viewthemepackages.php?theme=<?php echo $TourPackage['TourThemeID'];?>&from=allthemes.php">
            <div style="background: #000;border: 0px solid #222;">
            <!--<div style="border-radius:5px 5px 0px 0px;position:absolute;top:0px;margin-right:5px;color:#fff;background:rgba(45, 156, 210, 0.8);width:-moz-available;font-size:14px;padding:3px 5px"><?php echo $tour['TourTypeName'];?></div>-->
            <div style="border-radius:5px 5px 0px 0px;position:absolute;top:0px;margin-right:5px;color:yellow;background:rgba(45, 156, 210, 0.8);width:-moz-available;font-size:14px;padding:3px 5px"><?php echo (($TourPackage['PackageName']));?></div>
                <img src="<?php echo $TourPackage['Image1'];?>" style="width:100%;margin:0px auto;border-radius:5px;">
            </div>
            </a>
            <!--<p><?php echo sizeof($mysql->select("select * from _tbl_tours_package where IsPublish='1' and TourThemeID='".$TourPackage['TourThemeID']."'"));?> Destinations</p>-->
        </div>
    <?php } ?>
            </div>
    
 
          <br>
          <br>
          <br>
          <br>

                </div>
                
                <div class="footer-wrapper" style="bottom:0px">
                    <div class="footer dark" style="background:#333px;">
                        <div class="row mx-0">
                            <div class="col">
                                <img src="https://trip78.in/images/logo_footer.png" style="height:50px;">
                            </div>
                            <div class="col-8 text-right" style="font-size:12px;">
                             Copyright @2018 Trip78.in
                           <!--     <a href="" class="social"><img src="img/facebook.png" alt=""></a>
                                <a href="" class="social"><img src="img/googleplus.png" alt=""></a>
                                <a href="" class="social"><img src="img/linkedin.png" alt=""></a>
                                <a href="" class="social"><img src="img/twitter.png" alt=""></a>
                                -->
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
        var mySwiper = new Swiper('.swiper-container', {
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },
            autoplay: {
                delay: 5000,
            },
        });
        setTimeout(function(){
            $('.content-sticky-footer').css({"padding-bottom":"0px  !important"});
            $('.swiper-container').css({"height":"180px !important"});
        },1000);
        

    </script>
</body>

</html>
