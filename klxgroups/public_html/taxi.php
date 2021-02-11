<?php include_once("header.php"); ?>
    
     
     
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2 style="margin-bottom:0px;font-size:15px">Taxi Booking</h2>
          
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
     

    <section id="contact" class="contact" style="padding-top:20px;">
      <div class="container">
          <div class="row ">
               <div class="col-12" style="text-align:center;font-size:20px;">
                <label>Select Vechile</label>
               </div>
           <?php
                 $vechiles = $mysql->select("select * from _tbl_taxi order by taxi_order");
                 foreach($vechiles as $vechile) {
             ?>  
              <div class="col-6 ">
                <a href="taxi_booking.php?taxi=<?php echo $vechile['TaxiTypeID'];?>"><img data-u="image" src="assets/cars/<?php echo $vechile['TaxiThumb'];?>" style="width:100%;" /></a>
            </div>
            <?php } ?>
             
               
            
            
          
          </div>
      
         

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
   
   <?php include_once("footer.php");?>