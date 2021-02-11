 <?php include_once("header.php");?>
   
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2 style="margin-bottom:0px;">Hotel Booking</h2>
           
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
     

    <section id="contact" class="contact" style="padding-top:10px;">
      <div class="container">

          
      
        <div class="row  justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
         <!--   <h5  style="margin-bottom:20px">Hotel Booking</h5>-->
            <?php
            
                if (isset($_POST['SubmitBookingRequest'])) {
                    
    $mysql->insert("_tbl_booking_hotel",array("HotelPlaceName"       => $_POST['HotelPlaceName'],
                                             "HotelType"            => $_POST['HotelType'],
                                             "CheckInDate"          => $_POST['YY']."-".$_POST['MM']."=".$_POST['DD'],
                                             "NumberOfDays"         => $_POST['NumberOfDays'],
                                             "adult"                => $_POST['adult'],
                                             "children"             => $_POST['children'],
                                             "PickupLocation"       => $_POST['PickupLocation'],
                                             "CustomerMobileNumber" => $_POST['CustomerMobileNumber'],
                                             "CustomerDetails"      => $_POST['CustomerDetails'],
                                             "RequestedOn"          => date("Y-m-d H:i:s")));
             ?>
              <div class="sent-message">Your request has submitted.</div>
             <?php
 
}    else {
            ?>
            <?php
                 $hotels = $mysql->select("select * from _tbl_hotels where HotelID='".$_GET['hotel']."'");
                 foreach($hotels as $hotel) {
             ?>  
              <div class="col-6 " style="text-align: center;margin-bottom:10px;">
                <div class="card">
                    <div class="card-body" style="padding:0px;padding-bottom:10px;">
                
                    <img data-u="image" src="assets/hotel/<?php echo $hotel['HotelThumb'];?>" style="width:100%;height:150px;;margin-bottom:10px" />
                    <?php echo $hotel['HotelName'];?>
                
                </div>
                </div>
            </div>
            <?php } ?>
            <form action="" method="post" role="form" class="php-email-form" style="padding:10px;">
             <input type="hidden" value="1" name="SubmitBookingRequest">
             <div class="row  mt-3">
                <div class="col-12">
                    <label>Package</label>
                    <select class="form-control" name="adult"  id="adult"> / 
                    <?php
                        $packages = $mysql->select("select * from _tbl_hotels_packages where HotelID='".$_GET['hotel']."'");
                        foreach($packages as $package) {
                            ?>
                            <option value="<?php echo $package['HotelPackageID'];?>"><?php echo $package['PackageName'];?> (Rs. <?php echo $package['Price'];?>)</option>
                            <?php
                        }
                    ?>
                   </select>
                  <div class="validate"></div>
                </div>
                </div>  
               <div class="row  mt-3">
                <div class="col-md-6 form-group">
                    <label>Check In date</label>
                   <div class="row  form-group">
                <div class="col-4">
                     <select name="DD"  id="DD" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                    </div>
                    <div class="col-4">
                    <select name="MM"   id="MM" class="form-control">
                        <option value="1">JAN</option>
                        <option value="2">FEB</option>
                        <option value="3">MAR</option>
                        <option value="4">APR</option>
                        <option value="5">MAY</option>
                        <option value="6">JUN</option>
                        <option value="7">JLY</option>
                        <option value="8">AUG</option>
                        <option value="9">SEP</option>
                        <option value="10">OCT</option>
                        <option value="11">NOV</option>
                        <option value="12">DEC</option>
                    </select>
                    </div>
                    <div class="col-4">
                       <select name="YY"  id="YY" class="form-control">
                        <option value="2021">2021</option>
               
                    </select>
                    </div>
                </div>     
                   
                  
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>No of Days</label>
                  
                   <select class="form-control" name="NumberOfDays"  id="NumberOfDays"> / 
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                   </select>
                  <div class="validate"></div>
                </div>
              </div>
                
                <div class="row  mt-3">
                <div class="col-6">
                    <label>Aduits<br><span style="font-size:11px">(above 12yrs)</span></label>
                    <select class="form-control" name="adult"  id="adult"> / 
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                   </select>
                  <div class="validate"></div>
                </div>
                <div class="col-6">
                    <label>Children<br><span style="font-size:11px">(3yrs -12 yrs)</span></label>
                    <select class="form-control" name="children"  id="children"> / 
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                   </select>
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Pickup Location</label>
                  <input type="text" class="form-control" name="PickupLocation" id="PickupLocation" placeholder="Pickup Location" data-rule="email" data-msg="Please enter pickup location" />
                  <div class="validate"></div>
                </div>
              </div>
              
                 <div class="row  mt-3">
                <div class="col-md-6 form-group">
                    <label>Your Name</label>
                  <input type="text" name="CustomerName" class="form-control" id="CustomerName" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Your Mobile Number</label>
                  <input type="text" class="form-control" name="CustomerMobileNumber" id="CustomerMobileNumber" placeholder="Your Mobile Number" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              
   
              <div class="form-group mt-3">
               <label>Description</label>
                <textarea class="form-control" name="CustomerDetails" rows="3" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Booking Request</button></div>
            </form>
            <?php } ?>
          </div>

        </div>

      </div>                                                
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  <script type="text/javascript">jssor_1_slider_init();</script>
 <?php include_once("footer.php");?>