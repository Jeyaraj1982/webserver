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
          <h2 style="margin-bottom:0px;">Hotel Booking</h2>
           
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
     

    <section id="contact" class="contact" style="padding-top:10px;">
      <div class="container">

        <div class="row  justify-content-center">
            <div class="col-lg-10"> 
             <form class="php-email-form" style="padding:0px;">
            <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:200px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:200px;overflow:hidden;">
            <div>
                <img data-u="image" src="assets/hotel/hotel1.png" style="height:200px" />
            </div>
            <div>
                <img data-u="image" src="assets/hotel/hotel2.png" style="height:150px" />
            </div>
            <div>
                <img data-u="image" src="assets/hotel/hotel3.png" style="height:200px" />
            </div>
            <div>
                <img data-u="image" src="assets/hotel/hotel4.png" style="height:200px"/>
            </div>
            <div>
                <img data-u="image" src="assets/hotel/hotel5.png" style="height:200px" />
            </div>
            <div>
                <img data-u="image" src="assets/hotel/hotel1.png" style="height:200px" />
            </div>
            <div>
                <img data-u="image" src="assets/hotel/hotel2.png" style="height:200px" />    
            </div>
            <div>
                <img data-u="image" src="assets/hotel/hotel3.png" style="height:200px" />
            </div>
            <div>
                <img data-u="image" src="assets/hotel/hotel4.png" style="height:200px" />
            </div>
            <div>
                <img data-u="image" src="assets/hotel/hotel5.png" style="height:200px"/>
            </div>
           
            <div>
                <img data-u="image" src="assets/hotel/hotel1.png" />
            </div>
        </div> 
    </div>
    </form>
               
            </div>
            
          
          </div> 
       <br>
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
            <form action="" method="post" role="form" class="php-email-form">
             <input type="hidden" value="1" name="SubmitBookingRequest">
              <div class="row">
                <div class="col-md-6 form-group">
                    <label>Hotel Location</label>
                  <input type="text" name="HotelPlaceName" class="form-control" id="HotelPlaceName" placeholder="Your Place Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label>Hotel Type</label>
                  
                  
                   <select name="HotelType" class="form-control" id="HotelType">
                        <option value="Lodge">Lodge</option>
                        <option value="Manson">Manson</option>
                        <option value="Resort">Resort</option>
                        <option value="1_Star">1 Star </option>
                        <option value="2_Star">2 Star</option>
                        <option value="3_Star">3 Star</option>
                        <option value="4_Star">4 Star</option>
                        <option value="5_Star">5 Star</option>
                    </select>
                  <div class="validate"></div>
                </div>
              </div>
               <div class="row  mt-3">
                <div class="col-md-6 form-group">
                    <label>Check In date</label>
                   <div class="row  form-group">
                <div class="col-md-4 col-lg-4">
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
                    <div class="col-md-4  col-lg-4">
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
                    <div class="col-md-4  col-lg-4">
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
                <div class="col-md-3 form-group">
                    <label>No of aduits <span style="font-size:11px">(above 12yrs)</span></label>
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
                <div class="col-md-3 form-group">
                    <label>No of  children <span style="font-size:11px">(3yrs -12 yrs)</span></label>
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