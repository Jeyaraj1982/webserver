 <?php include_once("header.php");?>

  
     
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
             $cityNames = $mysql->select("select * from _tbl_hotel_citynames where isactive='1' order by CityName");
             ?>
        
          <h3 style="text-align:center;">Select City</h3>                                        
                    <div class="card">
                        <div  class="card-body" id="ListDiv" style="padding:0px !important;">
                            <ul class="list-group list-group-bordered">
                            <?php foreach($cityNames as $cityName) { ?>
                                <li class="list-group-item cursor-hand" style="display: block" onclick="getHotels('<?php echo $cityName['HotelCityNameID'];?>')">
                                
                                <?php echo $cityName['CityName'];?>&nbsp;&nbsp;
                                (<?php echo sizeof( $hotels = $mysql->select("select * from _tbl_hotels where IsActive='1' and HotelCityNameID='".$cityName['HotelCityNameID']."'"));?>)
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