<?php
    include_once("config.php");
    include_once("header.php");
?>
      <section class="section swiper-container swiper-slider swiper-slider-1 swiper-slider-4" data-loop="true" data-autoplay="5000" data-simulate-touch="false" data-slide-effect="fade">
        <div class="swiper-wrapper text-sm-left">
          <div class="swiper-slide context-dark" data-slide-bg="images/slide_1.png">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row justify-content-lg-end">
                   
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide context-dark" data-slide-bg="images/slider_2.png">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row justify-content-lg-end">
                   
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide context-dark" data-slide-bg="images/slider_3.png">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row justify-content-lg-end">
                   
                </div>
              </div>
            </div>                                         
          </div>
          
          <div class="swiper-slide context-dark" data-slide-bg="images/slider_4.png">
            <div class="swiper-slide-caption section-md">
              <div class="container">
                <div class="row justify-content-lg-end">
                   
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Swiper Pagination-->
        <div class="swiper-pagination" data-bullet-custom="true"></div>
        <!-- Swiper Navigation-->
        <div class="swiper-button-prev">
          <svg width="100%" height="100%" viewbox="0 0 78 78">
            <circle class="swiper-button-line" cx="39" cy="39" r="36"></circle>
            <circle class="swiper-button-line-2" cx="39" cy="39" r="36"></circle>
          </svg>
        </div>
        <div class="swiper-button-next">
          <svg width="100%" height="100%" viewbox="0 0 78 78">
            <circle class="swiper-button-line" cx="39" cy="39" r="36"></circle>
            <circle class="swiper-button-line-2" cx="39" cy="39" r="36"></circle>
          </svg>
        </div>
      </section>
      <!-- Section Services-->
      <section class="section section-xl section-top-0 bg-default text-md-left">
        <div class="container">
            <div class="row">
                <div class="col-12" style="padding-top:50px">
                
நீங்கள்  மீன் வாங்கும் போது சந்திக்கும் அனைத்து இடையூறுகளையும் முற்றிலுமாக அகற்றி, தரம், குறைந்த விலை மற்றும் வசதி ஆகியவற்றின் அடிப்படையில் நாங்களே சுத்தம் செய்து கட் பண்ணி உங்கள் வீடுகளுக்கு கொண்டு தருகிறோம். டெலிவரி இலவசம்.  அழைக்கவும் -  

         
<b style="font-size:30px;color:Green">9487611502</b>           
        </div>
            </div>
            </div>
      </section>
      <?php
       $Products = $mysql->select("select * from _tbl_products where CategoryID='2' and IsPublish='1'");
 
?>
 <section class="section section-xl bg-default text-center">
        <div class="container">
                   <div class="title-group">
            <h3 class="oh"><span class="d-inline-block wow slideInUp" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: slideInUp;">இன்றைக்கு கிடைக்கும்  மீன்கள் </span></h3>
            <!--<p class="text-width-small wow fadeInUp" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">Our company provides first-class petroleum solutions &amp; services for governmental and private organizations worldwide.</p>-->
          </div>
  
          <div class="row row-lg row-40 justify-content-center">
            <?php foreach($Products as $Product){ ?>
            <div class="col-md-6 col-lg-5 col-xl-4">                                                                                                                                                                                                                                                                                                                          
              <div class="oh">
                <!-- Services Classic-->
                <article class="services-classic wow slideInLeft" data-wow-delay="0s" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: slideInLeft;"><a class="services-classic-figure" href="https://kingfish.in/viewproduct.php?id=<?php echo md5($Product['ProductID']);?>"><img src="https://kingfish.in/uploads/<?php echo $Product['filepath1'];?>" alt="" style="width:370px;height:274px"></a>
                  <div class="services-classic-caption">
                    <div class="unit align-items-lg-center">
                      <div class="unit-left"></div>
                      <div class="unit-body">
                        <h5 class="services-classic-title"><a href="https://kingfish.in/viewproduct.php?id=<?php echo md5($Product['ProductID']);?>"><?php echo $Product['ProductName'];?></a></h5>
                        <p class="services-classic-text"><?php echo "RS. ".$Product['ProductPrice'];?></p>
                      </div>
                    </div>
                  </div>
                </article>
              </div>
            </div>
            <?php } ?>
            
          </div>  
        </div>
      </section>
 <!--     
      <section class="section section-xl section-top-0 bg-default text-md-left">
        <div class="container">
           
          <div class="owl-carousel bordered-4" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="4" data-mouse-drag="false" data-dots="true">
             
            <article class="services-tammy wow fadeInUp"><span class="services-tammy-counter box-ordered-item">01</span>
              <div class="services-tammy-caption">
                <h5 class="services-tammy-title"><a href="single-service.html">?®??®??®™????®•?®???? ?®®?®±????®±????®®??? ?®•?®??®?????®•?®±?®??®•?®????</a></h5><a class="services-tammy-figure" href="single-service.html"><img src="images/service1.jpg" alt="" width="218" height="129"/></a><a class="services-tammy-link" href="single-service.html">Read More</a>
              </div>
            </article>
             
            <article class="services-tammy wow fadeInUp" data-wow-delay=".05s"><span class="services-tammy-counter box-ordered-item">02</span>
              <div class="services-tammy-caption">
                <h5 class="services-tammy-title"><a href="single-service.html">?®®?®±????®± ?®‰?®??®µ????®•?®????</a></h5><a class="services-tammy-figure" href="single-service.html"><img src="images/service2.jpg" alt="" width="218" height="129"/></a><a class="services-tammy-link" href="single-service.html">Read More</a>
              </div>
            </article>
             
            <article class="services-tammy wow fadeInUp" data-wow-delay=".1s"><span class="services-tammy-counter box-ordered-item">03</span>
              <div class="services-tammy-caption">
                <h5 class="services-tammy-title"><a href="single-service.html">Welding Services</a></h5><a class="services-tammy-figure" href="single-service.html"><img src="images/service3.jpg" alt="" width="218" height="129"/></a><a class="services-tammy-link" href="single-service.html">Read More</a>
              </div>
            </article>
             
            <article class="services-tammy wow fadeInUp" data-wow-delay=".15s"><span class="services-tammy-counter box-ordered-item">04</span>
              <div class="services-tammy-caption">
                <h5 class="services-tammy-title"><a href="single-service.html">Ore Production</a></h5><a class="services-tammy-figure" href="single-service.html"><img src="images/service4.jpg" alt="" width="218" height="129"/></a><a class="services-tammy-link" href="single-service.html">Read More</a>
              </div>
            </article>
          </div>                                                                                                                                                                                                                                    
        </div>                                                                                                                                                                                                                               
      </section>
      -->
      <!-- About our plant-->
 
<?php include_once("footer.php");?>