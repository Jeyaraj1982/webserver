<?php include_once("header.php"); ?>
    
     
     
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2 style="margin-bottom:0px">Taxi Booking</h2>
          
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
     

    <section id="contact" class="contact" style="padding-top:20px;">
      <div class="container">
           
          
        <div class="row  justify-content-center" data-aos="fade-up">
          <div class="col-6">
          <?php
               $vechile = $mysql->select("select * from _tbl_taxi where TaxiTypeID='".$_GET['taxi']."'");
               
          ?>
          
                <img data-u="image" src="assets/cars/<?php echo $vechile[0]['TaxiThumb'];?>" style="width:100%;" /> 
            
          </div>
           <div class="col-6">
           
           </div>
          <div class="col-lg-12">
           <!-- <h5 style="margin-bottom:20px">Taxi Booking</h5>-->
            <?php
                if (isset($_POST['SubmitTaxiRequest'])) {
    $mysql->insert("_tbl_booking_taxi",array("FromPlaceName"        => $_POST['FromPlaceName'],
                                             "ToPlaceName"          => $_POST['ToPlaceName'],
                                             "NumberOfPerson"       => $_POST['NumberOfPerson'],
                                             "TaxiType"             => $_POST['TaxiType'],
                                             "CustomerName"         => $_POST['CustomerName'],
                                             "CustomerMobileNumber" => $_POST['CustomerMobileNumber'],
                                             "CustomerDetails"      => $_POST['CustomerDetails'],
                                             "RequestedOn"          => date("Y-m-d H:i:s")));
             ?>
              <div class="sent-message">Your request has submitted.</div>
             <?php
 
}    else {
            ?>
            
            <form action="" method="post" role="form" class="php-email-form" style="padding:10px;">
            <input type="hidden" value="1" name="SubmitTaxiRequest">
            <input type="hidden" value="0" name="NumberOfPerson">
            <input type="hidden" value="0" name="TaxiType">
              <div class="row">
                <div class="col-md-6 form-group">
                    <label>From Place</label>
                  <input type="text" name="FromPlaceName" class="form-control" id="FromPlaceName" placeholder="From Place" data-rule="minlen:4" data-msg="Please enter from place" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>To Place</label>
                  <input type="text" class="form-control" name="ToPlaceName" id="ToPlaceName" placeholder="To Place" data-rule="minlen:4" data-msg="Please enter to place" />
                  <div class="validate"></div>
                </div>
              </div>
              <!--
               <div class="row  mt-3">
                <div class="col-md-6 form-group">
                    <label>No of Person</label>
                    <select name="NumberOfPerson" class="form-control" id="NumberOfPerson">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Taxi Type</label>
                 
                  <select name="TaxiType" class="form-control" id="TaxiType">
                        <option value="AC">A/C</option>
                        <option value="NON_AC">Non A/C</option>
                    </select>
                 
                  <div class="validate"></div>
                </div>
              </div>
            -->
                 <div class="row  mt-3">
                <div class="col-md-6 form-group">
                    <label>Your Name</label>
                  <input type="text" name="CustomerName" class="form-control" id="CustomerName" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter your name" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Your Mobile Number</label>
                  <input type="text" class="form-control" name="CustomerMobileNumber" id="CustomerMobileNumber" placeholder="Your Mobile Number" data-rule="minlen:10" data-msg="Please enter your mobile number" />
                  <div class="validate"></div>
                </div>
              </div>
              
   
              <div class="form-group mt-3">
               <label>Description</label>
                <textarea class="form-control" name="CustomerDetails" id="CustomerDetails" rows="3" data-rule="required" data-msg="Please write details" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your request has submitted.</div>
              </div>
              <div class="text-center"><button type="submit"  >Send Booking Request</button></div>
            </form>
   <?php } ?>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  <script type="text/javascript">jssor_1_slider_init();</script>
   <?php include_once("footer.php");?>