
<?php $page ='wealth'; 
include_once("config.php");
 include("file/header-gold.php");?>

    
	<!--Main Slider-->
    <section class="main-slider" data-start-height="450" data-slide-overlay="yes">
    	
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                	 <?php
                    $sliders = $mysql->select("select * from _tbl_Web_Sliders where PublishArea='Wealth' and IsPublish='1' order by SliderOrder");
                    foreach($sliders as $s) {
                ?>
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="images/wealth/<?php echo $s['SliderFileName'];?>"  data-saveperformance="off"  data-title="Awesome Title Here">
                        <img src="images/wealth/<?php echo $s['SliderFileName'];?>"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                    </li> 
                <?php } ?>
                </ul>
            </div>
        </div>
    </section>
  	<!--End Main Slider-->
    

	    
    <!--Volunter Section-->
    <section class="volunter-section">
    	<div class="auto-container">
            <div class="row clearfix">
                <!--Content Column-->
                <div class="col-lg-6 col-md-5 col-sm-12 col-xs-12">
                    <div class="inner">
                        <!--Sec Title-->
                        <div class="sec-title medium">
                            <h2>We’ve <span>Golden Harvest Plans,</span><br> is a smart, secure and convenient way to acquire of your choice.</h2>
							
                        </div>
                        
                        <!--Volunter Box-->
                        <div class="volunter-box">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <span class="icon"><img src="images/resource/icon-5.png" alt="" /></span>
                                </div>
                                <h3><a href="#">Golden Harvest 10 months		</a></h3>
                                <div class="text">Customer should pay a fixed installment amount on due date every month with Good Gold for 10 months.
								From the end of the 10th month customer will be eligible for a special discount which will vary from 55% to 75% of one installment.</div>
                            </div>
                        </div>
                        
                        <!--Volunter Box-->
                        <div class="volunter-box">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <span class="icon"><img src="images/resource/icon-6.png" alt="" /></span>
                                </div>
                                <h3><a href="#">Golden Harvest 12 months</a></h3>
                                <div class="text">Customer should pay a fixed installment amount on due date every month with Good Gold for 12 months.
								From the end of the 12th month customer will be eligible for a special discount which will vary from 55% to 75% of one installment.</div>
                            </div>
                        </div>
						<div class="volunter-box hidden-md hidden-lg">
                            <div class="inner-box">
                                <div class="icon-box ">
                                    <span class="icon"><img src="images/resource/icon-7.png" alt="" /></span>
                                </div>
                                <h3><a href="#">Golden Harvest 18 months</a></h3>
                                <div class="text">Customer should pay a fixed installment amount on due date every month with Good Gold for 18 months.
								From the end of the 18th month customer will be eligible for a special discount which will vary from 55% to 75% of one installment.</div>
                            </div>
                        </div>
                        
              
                        
                    </div>
                </div>
                <!--Image Column-->
                <div class="image-column style-two col-lg-6 col-md-7 col-sm-12 col-xs-12">
                    <div class="image">
                        <img src="images/wealth/r1.jpg" alt="" />
                    </div>
                </div>
				
				
				          <!--Volunter Box-->
                        <div class="col-md-12 ">
						
                        <div class="volunter-box hidden-sm hidden-xs">
                            <div class="inner-box">
                                <div class="icon-box ">
                                    <span class="icon"><img src="images/resource/icon-7.png" alt="" /></span>
                                </div>
                                <h3><a href="#">Golden Harvest 18 months</a></h3>
                                <div class="text">Customer should pay a fixed installment amount on due date every month with Good Gold for 18 months.
								From the end of the 18th month customer will be eligible for a special discount which will vary from 55% to 75% of one installment.</div>
                            </div>
                        </div>
                        </div>
				
            </div>
        </div>
    </section>
    <!--End Volunter Section-->
    
	
	
									<!--Gallery of Gold & silver-->
									
									
	<section class="projects-section">
    	<div class="auto-container">
        	
            <!--Sortable Gallery-->
            <div class="mixitup-gallery">
            
                <!--Filter-->
                <div class="filters clearfix">
                    <ul class="filter-tabs filter-btns text-center">
                     
                        <li class="filter" data-role="button" data-filter=".image">Gold Products</li>
                        <li class="filter" data-role="button" data-filter=".video">Silver Products</li>
                   </ul>
                </div>
                
                <div class="filter-list row clearfix" id="MixItUpE1DBFC">
					<!--Gallery Block-->
					
					<div class="gallery-block col-md-4 col-sm-6 col-xs-12 mix  image " style="display: inline-block;">
                        <div class="inner-box">
                            <div class="image-box"><img src="images/wealth/gold-coin.png" alt="">
                                <div class="overlay-box">
                                    <div class="content">
                                        <a href="images/wealth/gold-coin.png" class="lightbox-image" data-fancybox-group="project-gallery"><span class="icon fa fa-picture-o"></span></a>
                                    </div>
                                </div>
                            </div>
                      
                        </div>
                    </div>
				
				        
                    <div class="gallery-block col-md-4 col-sm-6 col-xs-12 mix  image " style="display: inline-block;">
                        <div class="inner-box">
                            <div class="image-box"><img src="images/gal/necklace.jpg" alt="">
                                <div class="overlay-box">
                                    <div class="content">
                                        <a href="images/gal/necklace.jpg" class="lightbox-image" data-fancybox-group="project-gallery"><span class="icon fa fa-picture-o"></span></a>
                                    </div>
                                </div>
                            </div>
                      
                        </div>
                    </div>
                    
					
				
				        <!--Gallery Block-->
                    <div class="gallery-block col-md-4 col-sm-6 col-xs-12 mix  video" style="display: inline-block;">
						<div class="inner-box">
                             <div class="image-box"><img src="images/gal/silver2.jpg" alt="">
                                <div class="overlay-box">
                                    <div class="content">
                                        <a href="images/gal/silver2.jpg" class="lightbox-image" data-fancybox-group="project-gallery"><span class="icon fa fa-picture-o"></span></a>
                                    </div>
                                </div>
                            </div>
                      
                        </div>
                    </div><div class="gallery-block col-md-4 col-sm-6 col-xs-12 mix  image " style="display: inline-block;">
                        <div class="inner-box">
                            <div class="image-box"><img src="images/gal/ring1.jpg" alt="">
                                <div class="overlay-box">
                                    <div class="content">
                                        <a href="images/gal/ring1.jpg" class="lightbox-image" data-fancybox-group="project-gallery"><span class="icon fa fa-picture-o"></span></a>
                                    </div>
                                </div>
                            </div>
                      
                        </div>
                    </div>
                    
				
                    <!--Gallery Block-->
                    <div class="gallery-block col-md-4 col-sm-6 col-xs-12 mix  video" style="display: inline-block;">
                        <div class="inner-box">
                             <div class="image-box"><img src="images/gal/silver1.jpg" alt="">
                                <div class="overlay-box">
                                    <div class="content">
                                        <a href="images/gal/silver1.jpg" class="lightbox-image" data-fancybox-group="project-gallery"><span class="icon fa fa-picture-o"></span></a>
                                    </div>
                                </div>
                            </div>
                      
                        </div>
                    </div>

                    <!--Gallery Block-->
                    
					
                    
            
          
                    
                </div>
                
            </div>
			<!--End Sortable Gallery-->
            
        
            
        </div>
    </section>
	
	
											<!--End Gallery of Gold & silver-->





    <!--Project Section-->
    <section class="project-section">
    	<div class="auto-container">
            <!--Sec Title-->
            <div style="padding-bottom:40px!important" class="sec-title centered">
                <h2>Our Schemes</h2>
            </div>
        </div>
        <div class="lower-content-section">
            <div class="auto-container">
                <div class="news-container">
                    <div class="row clearfix">
                    
                        <!--Project Block-->
                        <div class="project-block col-md-4 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="#"><img src="images/wealth/project-1.jpg" alt="" /></a>
                                </div>
                                <div class="lower-box">
                                    
                                    <h3><a href="#">Golden Harvest 10 months plans</a></h3>
                                    <div class="text">Customer should pay a fixed installment amount on due date every month with Good Gold for 10 months.</div>
                                   
                                </div>
                            </div>
                        </div>
                        
                        <!--Project Block-->
                        <div class="project-block col-md-4 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="#"><img src="images/wealth/project-2.jpg" alt="" /></a>
                                </div>
                                <div class="lower-box">
                                    
                                    <h3><a href="#">Golden Harvest 12 months Plans</a></h3>
                                    <div class="text">Customer should pay a fixed installment amount on due date every month with Good Gold for 12 months.</div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <!--Project Block-->
                        <div class="project-block col-md-4 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="#"><img src="images/wealth/project-3.jpg" alt="" /></a>
                                </div>
                                <div class="lower-box">
                                    
                                    <h3><a href="#">Golden Harvest 18 months plans</a></h3>
                                    <div class="text">Customer should pay a fixed installment amount on due date every month with Good Gold for 18 months.</div>
                                 
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="text-center">
                        <a href="#" class="theme-btn btn-style-four">See All Schemes</a>
                    </div>
                    
                </div>
             </div>
         </div>
    </section>
    <!--End Project Section-->



   <?php  include("file/footer.php");?>
