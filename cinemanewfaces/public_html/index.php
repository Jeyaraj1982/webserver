<?php include_once("header.php");?>

<!-- ======= Slider Section ======= -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="assets/img/slider/banner_01.jpg" alt="" title="#slider-direction-1" />
        <img src="assets/img/slider/banner_02.jpg" alt="" title="#slider-direction-2" />
        <img src="assets/img/slider/banner_03.jpg" alt="" title="#slider-direction-3" />
        <img src="assets/img/slider/banner_04.jpg" alt="" title="#slider-direction-4" />
        <img src="assets/img/slider/banner_05.jpg" alt="" title="#slider-direction-4" />
      </div>
    </div>
  </div><!-- End Slider -->
  <?php
    
  ?>
  <div style="background:#000;padding:10px;height:150px;" id="scrollThumb">
 
  </div>
  <main id="main">                                           

     
    <div id="about" class="about-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>About Cinema New Faces</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- single-well start-->
          <div class="col-md-6 col-sm-6 col-xs-12">        
            <div class="well-left">
              <div class="single-well">
                <a href="#">
                  <img src="assets/img/about/11.png" alt="">
                </a>
              </div>
            </div>                                    
          </div>                 
          <!-- single-well end-->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="well-middle">
              <div class="single-well">
                <a href="#">
                  <h4 class="sec-head">Features</h4>
                </a>
                <p>
                  இது ஒரு புதிய சினிமா திறமைகளுக்கான ஆன்லைன் தளமாகும். நடிகர்கள், நடிகைகள், இயக்குநர்கள், தொழில்நுட்ப வல்லுநர்கள், இசை அமைப்பாளர்கள், திரைப்பட தயாரிப்பாளர்கள் இந்த வலைத்தளத்தை தங்கள் சிறந்த வாழ்க்கைக்கு பயன்படுத்தலாம்.
                </p>
                <ul>
                  <li>
                    <i class="fa fa-check"></i> Director Training
                  </li>
                  <li>
                    <i class="fa fa-check"></i> Acting Training
                  </li>
                  <li>
                    <i class="fa fa-check"></i> Register Your profile Details
                  </li>
                  <li>
                    <i class="fa fa-check"></i> Get Chance
                  </li>
               
                </ul>
              </div>
            </div>
          </div>
          <!-- End col-->
        </div>
      </div>
    </div><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <div id="services" class="services-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
              <h2>Our Services</h2>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <!-- Start Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="fa fa-camera-retro"></i>
                  </a>
                  <h4>Director Training</h4>
                  <p>
                   we provide direcotr training at low cost
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="fa fa-camera-retro"></i>
                  </a>
                  <h4>Acting Training </h4>
                  <p>
                      we provide acting training at low cost
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="fa fa-ticket"></i>
                  </a>
                  <h4>Sharing Profiles</h4>
                  <p>
                    Share registered members profiles to leading cine companies.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
           
          <!-- End Left services -->
           
          <!-- End Left services -->
           
        </div>
      </div>
    </div><!-- End Services Section -->

    <!-- ======= Skills Section ======= -->
     <!-- End Skills Section -->

    <!-- ======= Team Section ======= -->
    <div id="team" class="our-team-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Latest profiles</h2>
            </div>
          </div>
        </div>
        <div class="row" id="activeMembers">           
        
   
        </div>
      </div>
    </div> 
   
<?php include_once("footer.php"); ?> 
  <script>
     $(document).ready(function() {
        $.ajax({url:'service.php?action=scrollThumb',success:function(data) {
            $('#scrollThumb').html(data);
        }});
        $.ajax({url:'service.php?action=activeMembers',success:function(data){
            $('#activeMembers').html(data) ;
        }});

});
     </script>