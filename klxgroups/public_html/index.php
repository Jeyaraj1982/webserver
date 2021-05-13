<?php include_once("header.php"); ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" style="margin-top:64px;height:204px">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(xassets/img/slide/slide-1.jpg?r=2); background-size: auto;">
        <img src="assets/img/slide/slide-1.jpg?r=2" style="width: 100%;">
          <!--<div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Welcome to <span>Company</span></h2>
              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
            </div>
          </div>-->
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(xassets/img/slide/slide-2.jpg?r=3); background-size: auto;">
         <img src="assets/img/slide/slide-2.jpg?r=2" style="width: 100%;">
          <!--<div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Lorem Ipsum Dolor</h2>
              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
            </div>
          </div> -->
        </div>

        

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
      

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</strong></h2>
        <!--  <p>Laborum repudiandae omnis voluptatum consequatur mollitia ea est voluptas ut</p>-->
        </div>

        <div class="row">
        
         <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue" style="padding:20px 20px 20px 20px">
                <img src="assets/klx_travels.jpg" style="height:200px;width:100%">
                
              <h4><a href="taxi.php">KLX Travels</a></h4>
              <p>
               <a href="flight.php"><img src="assets/_flight.png" style="height:80px;width:80px;border:1px solid #ccc;margin-bottom:10px;margin-right:10px"></a>
               <a href="visa.php"><img src="assets/_visa.png" style="height:80px;width:80px;border:1px solid #ccc;margin-bottom:10px;margin-right:10px"></a>
               <a href="travels.php"><img src="assets/_holidays.png" style="height:80px;width:80px;border:1px solid #ccc;margin-bottom:10px"></a>
               <a href="curise.php"><img src="assets/_curise.png" style="height:80px;width:80px;border:1px solid #ccc;margin-bottom:10px;margin-right:10px"></a>
               <a href="studyabroad.php"><img src="assets/_studyabroad.png" style="height:80px;width:80px;border:1px solid #ccc;margin-bottom:10px;margin-right:10px"></a>
              
              </p>
              
            </div>                                            
          </div>

          
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue" style="padding:20px 20px 20px 20px">
                <img src="assets/car.jpg" style="height:200px;width:100%">
                
              <h4><a href="taxi.php">Taxi Booking</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
              <p style="padding:30px;padding-bottom:0px"><a href="taxi.php" class="btn btn-success">&nbsp;&nbsp;Book Now&nbsp;&nbsp;</a></p>
            </div>                                            
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box iconbox-orange " style="padding:20px 20px 20px 20px">
                <img src="assets/hotel.jpg" style="height:200px;width:100%">
              <h4><a href="hotel.php">Hotel Booking</a></h4>                            
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
              <p style="padding:30px;padding-bottom:0px"><a href="hotel.php" class="btn btn-primary">&nbsp;&nbsp;Book Now&nbsp;&nbsp;</a></p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300" style="margin-top:25px !important;">
            <div class="icon-box iconbox-pink" style="padding:20px 20px 20px 20px">
             <img src="assets/foodimage.jpg" style="height:200px;width:100%">
              <h4><a href="food.php">Food Order</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
              <p style="padding:30px;padding-bottom:0px"><a href="food.php" class="btn btn-danger">&nbsp;&nbsp;List Foods&nbsp;&nbsp;</a></p>
            </div>
          </div>

           
             <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300" style="margin-top:25px !important;">
            <div class="icon-box iconbox-pink" style="padding:20px 20px 20px 20px;width:100%">
             <img src="assets/freead.jpeg" style="height:295px;width:100%">
              <p style="padding:30px;padding-bottom:0px"><a href="https://www.klx.co.in" class="btn btn-info">&nbsp;&nbsp;Post Free Ad&nbsp;&nbsp;</a></p>
            </div>
          </div>

           

           

        </div>

      </div>
    </section> 

    <!-- ======= Portfolio Section ======= -->
      

     
      

  </main> 

<?php include_once("footer.php"); exit;?>
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Company</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Contact Us</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Taxi Booking</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Hotel Booking</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Food Orders</a></li>
            </ul>
          </div>

          <!--
          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
          -->

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>klxgroups.com</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/company-free-html-bootstrap-template/ -->
          Designed by <a href="https://klxgroups.com/">klxgroups</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <!--  
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        -->
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>