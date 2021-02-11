<?php include_once("header.php"); ?>
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
          <h2 style="margin-bottom:0px">Taxi Booking</h2>
          
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
     

    <section id="contact" class="contact" style="padding-top:20px;">
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
                <img data-u="image" src="assets/cars/auto.png" style="height:200px" />
            </div>
            <div>
                <img data-u="image" src="assets/cars/ertiga.png" style="height:150px" />
            </div>
            <div>
                <img data-u="image" src="assets/cars/inova.png" style="height:200px" />
            </div>
            <div>
                <img data-u="image" src="assets/cars/mahindravan.png" style="height:200px"/>
            </div>
            <div>
                <img data-u="image" src="assets/cars/swift.png" style="height:200px" />
            </div>
            <div>
                <img data-u="image" src="assets/cars/temp_traveller.png" style="height:200px" />
            </div>
            <div>
                <img data-u="image" src="assets/cars/tyotaets.png" style="height:200px" />    
            </div>
            <div>
                <img data-u="image" src="assets/cars/tataindigo.png" style="height:200px" />
            </div>
            <div>
                <img data-u="image" src="assets/cars/toya_for.png" style="height:200px" />
            </div>
            <div>
                <img data-u="image" src="assets/cars/polo.png" style="height:200px"/>
            </div>
           
            <div>
                <img data-u="image" src="assets/cars/polo.png" />
            </div>
        </div> 
    </div>
              </form> 
            </div>
            
          
          </div>
          <br>
        <div class="row  justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
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
            
            <form action="" method="post" role="form" class="php-email-form">
            <input type="hidden" value="1" name="SubmitTaxiRequest">
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