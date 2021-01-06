<div class="main-content">

      <!-- Section: inner-header -->
      <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="<?=$_SERVER['BASE_URL'];?>images/bg/bg1.jpg">
        <div class="container pt-120 pb-60">
          <!-- Section Content -->
          <div class="section-content">
            <div class="row"> 
              <div class="col-md-6">
                <h2 class="text-theme-colored3 font-36">Gallery</h2>
                <ol class="breadcrumb text-left mt-10 white">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Gallery</a></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <!-- Gallery Grid 3 -->
      <section>
        <div class="container">
          <div class="section-content">
            <div class="row">
              <div class="col-md-12">
                <!-- Portfolio Filter -->
                <div class="portfolio-filter">
                  <a href="#" class="active" data-filter="*">All</a>
                  <a href="#branding" class="" data-filter=".branding">AICTE</a>
                </div>
                <!-- End Portfolio Filter -->
              
                <!-- Portfolio Gallery Grid -->
                <div id="grid" class="gallery-isotope default-animation-effect grid-3 gutter clearfix">
                      
                <?php for($i=1;$i<=15;$i++) {?>
                 <div class="gallery-item branding">
                    <div class="thumb">
                      <img class="img-fullwidth" src="<?=$_SERVER['BASE_URL'];?>images/aicte_images/<?php echo $i;?>.jpeg" alt="project">
                      <div class="overlay-shade"></div>
                      <div class="icons-holder">
                        <div class="icons-holder-inner">
                          <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a data-lightbox="image" href="<?=$_SERVER['BASE_URL'];?>images/aicte_images/<?php echo $i;?>.jpeg"><i class="fa fa-plus"></i></a>
                            <a href="#"><i class="fa fa-link"></i></a>
                          </div>
                        </div>
                      </div>
                      <a class="hover-link" data-lightbox="image" href="<?=$_SERVER['BASE_URL'];?>images/aicte_images/<?php echo $i;?>.jpeg">View more</a>
                    </div>
                  </div>
                 <?php } ?>
                  
                </div>
                <!-- End Portfolio Gallery Grid -->
  
              </div>
            </div>
          </div>
        </div>
      </section>
  
    </div>
    <!-- end main-content -->