 <?php include_once("header.php");?>

  <script src="assets/js/jssor.slider-28.1.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        window.jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: 1,
              $Idle: 0,
              $SlideDuration: 5000,
              $SlideEasing: $Jease$.$Linear,
              $PauseOnHover: 4,
              $SlideWidth: 200,
              $Align: 0
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2 style="margin-bottom:0px;font-size:15px">Hotel Booking</h2>
           
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
     
    <script>
    function getHotels(h) {
        location.href='hotels_by_city.php?city='+h;
    }
    </script>
    <section id="contact" class="contact" style="padding-top:10px;">
      <div class="container">

        <div class="row  justify-content-center">
            <div class="col-lg-12"> 
               <?php
             $cityNames = $mysql->select("select * from _tbl_hotel_citynames order by CityName");
             ?>
        
          <h3 style="text-align:center;">Select City</h3>                                        
                    <div class="card">
                        <div  class="card-body" id="ListDiv" style="padding:0px !important;">
                            <ul class="list-group list-group-bordered">
                            <?php foreach($cityNames as $cityName) { ?>
                                <li class="list-group-item cursor-hand" style="display: block" onclick="getHotels('<?php echo $cityName['HotelCityNameID'];?>')">
                                
                                <?php echo $cityName['CityName'];?>&nbsp;&nbsp;
                                (<?php echo sizeof( $hotels = $mysql->select("select * from _tbl_hotels where HotelCityID='".$cityName['HotelCityNameID']."'"));?>)
                                <i class="flaticon-right-arrow-4" style="float: right;"></i>  
                                </li>   
                                <?php } ?>
                         </ul>
                         </div>
                         </div>
                         
            </div>
            
          
          </div> 
      
         

      </div>                                                
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  <script type="text/javascript">jssor_1_slider_init();</script>
 <?php include_once("footer.php");?>