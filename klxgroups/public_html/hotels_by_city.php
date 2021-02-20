 <?php include_once("header.php");?>

   
     
     
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2  style="margin-bottom:0px;font-size:15px">Hotel Booking</h2>
           
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
     
     
    <section id="contact" class="contact" style="padding-top:20px;">
      <div class="container">
          <div class="row ">
               <div class="col-12" style="text-align:center;font-size:20px;margin-bottom:20px;">
                <label>Select Hotel</label>
               </div>
           <?php
                 $hotels = $mysql->select("select * from _tbl_hotels where IsActive='1' and HotelCityNameID='".$_GET['city']."'");
                 foreach($hotels as $hotel) {
             ?>  
              <div class="col-6 " style="text-align: center;margin-bottom:10px;">
                <div class="card">
                    <div class="card-body" style="padding:0px;padding-bottom:10px;">
                <a href="hotel_booking.php?hotel=<?php echo $hotel['HotelID'];?>" style="color:#222">
                    <img data-u="image" src="assets/hotel/<?php echo $hotel['HotelThumb'];?>" style="width:100%;height:150px;;margin-bottom:10px" />
                    <?php echo $hotel['HotelName'];?>
                </a>
                </div>
                </div>
            </div>
            <?php } ?>
             
               
            
            
          
          </div>
      
         

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  
 <?php include_once("footer.php");?>