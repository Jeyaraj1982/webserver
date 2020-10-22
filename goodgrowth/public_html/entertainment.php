<?php 
    $page ='entertainment';
    include_once("config.php");
    include("file/header-entertainment.php");
?>
	<!--Main Slider-->
    <section class="main-slider" data-start-height="450" data-slide-overlay="yes">
    	
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                	     <?php
                    $sliders = $mysql->select("select * from _tbl_Web_Sliders where PublishArea='Entertainment' and IsPublish='1' order by SliderOrder");
                    foreach($sliders as $s) {
                ?>
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="images/entertainment/slider/<?php echo $s['SliderFileName'];?>"  data-saveperformance="off"  data-title="Awesome Title Here">
                        <img src="images/entertainment/slider/<?php echo $s['SliderFileName'];?>"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                    </li> 
                <?php } ?>
                </ul>
            </div>
        </div>
    </section>
  	<!--End Main Slider-->
    
    <!--Content Section-->
    <section class="content-section">
    	<div class="auto-container">
        	<div class="row clearfix">
            	<div class="column col-md-5 col-sm-12 col-xs-12">
                	<div class="sec-title">
                    	<h2><span>750+ Expert <br></span>People working with us <br> since 2010!!</h2>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12">
                	<div class="dark-text">We specialize in customized/tailor-made tours to India as well as international tour packages.</div>
                    <div class="text text-justify">A vacation at an overseas destination is surely an eternal memory. The idea of exploring foreign lands, interacting with people of different cultures, gaining knowledge about their heritage, visiting the numerous man-made and natural wonders, savoring the local cuisine, is an amazing one. If you too have the dream of visiting the world, Good Healthy Holidays is here to help you out. </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Content Section-->
    

    <!--Project Section-->
    <section class="project-section">
    	<div class="auto-container">
            <!--Sec Title-->
            <div class=" centered" style="padding-bottom:50px">
                <h2>Explore Top Destinations</h2>
                <div class="text"> Make your own tour or just tell us your requirement to let us plan your trip.</div>
            </div>
        </div>
        <div class="lower-content-section">
            <div class="auto-container">
                <div class="news-container">
                    <div class="row clearfix">
                    
                        <!--Project Block-->
                        <div class="project-block col-md-6 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="#"><img src="images/entertainment/Kodaikanal.jpg" alt="" /></a>
                                </div>
                                <div class="lower-box">
                                
                                    <h3><a class="tours" href="#">Kodaikanal  <span> 2 Days Starts From INR 2,000/- </span></a></h3>
                                   
                                </div>
                            </div>
                        </div>
                        
                        <!--Project Block-->
                        <div class="project-block col-md-6 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="#"><img src="images/entertainment/goa.jpg" alt="" /></a>
                                </div>
                                <div class="lower-box">
                                
                                    <h3><a class="tours" href="#">Goa <span> 3 Night 2 Day Starts From INR 10,000/- </span></a></h3>
                                </div>
                            </div>
                        </div>
                        </div>
						<div class="row clearfix">
                        <!--Project Block-->
                        <div class="project-block col-md-6 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="#"><img src="images/entertainment/thailand.jpg" alt="" /></a>
                                </div>
                                <div class="lower-box">
                                
                                    <h3><a class="tours" href="#">Thailand <span> 5 Night 4 Days Starts From INR 35,000/- </span></a></h3>
                                </div>
                            </div>
                        </div>
                         
                        <!--Project Block-->
                        <div class="project-block col-md-6 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="#"><img src="images/entertainment/mal-sing.jpg" alt="" /></a>
                                </div>
                                <div class="lower-box">
                                
                                    <h3><a  class="tours" href="#">Singapore & Malaysia <span> 5 Night 4 Days Starts From INR 45,000/- </span></a></h3>
                                
                                </div>
                            </div>
                        </div>
                         
                        <!--Project Block-->
                        
                        
                    </div>
                    
                    <div class="text-center">
                        <a href="#" class="theme-btn btn-style-four">See All Packages</a>
                    </div>
                    
                </div>
             </div>
         </div>
    </section>
    <!--End Project Section-->
 
    <!--Fullwidth Section One-->
    <section class="fullwidth-section-one">
    	<div class="section-outer clearfix">
        	<!--Left Column-->
        	<div class="col-md-6 left-column">
            	<div class="content">
                	<!--Sec Title-->
                    <div class="sec-title">
                    	<h2>Join us  & Get a  endless excitement features</h2>
                    </div>
					<ul class="list-style-two text-left">
                            <li> Vehicle Arrangements.</li>
                            <li> Organic Foods.</li>
                            <li> Best Accommodation.</li>
                            <li> Wonderful Guide.</li>
                            <li> Early Morning Yoga.</li>
                            <li> Evening Special Entertainment.</li>
                        </ul>

				</div>
            </div>
            <!--Image Column-->
        	<div class="col-md-6 image-column" style="background-image:url(images/entertainment/fullwidth-1.jpg);">
            	<div class="hidden-image">
                	<img src="images/entertainment/fullwidth-1.jpg" alt="" />
                </div>
            </div>
            
        </div>
    </section>
    <!--End Fullwidth Section One-->
    
    <!--Events Section-->
    <div class="events-section">
    	<div class="auto-container">
        	<div class="sec-title">
            	<h2>Latest Events</h2>
            </div>
            <div class="row clearfix">
            	<!--Carousel Column-->
            	<div class="carousel-column col-md-7 col-sm-12 col-xs-12">
                	<div class="two-item-carousel owl-carousel owl-theme">
                    	
                       <!--Event Style One-->
                        <div class="event-style-one">
                            <div class="inner">
                                <div class="image-box">
                                    <div class="image">
                                        <a href="#"><img src="images/resource/event-1.jpg" alt="" /></a>
                                    </div>
                                </div>
                                <div class="lower-box">
                                    <div class="date">2 Feb, 2019 in Courtallam</div>
                                    <h3><a href="#">Courtallam Associate Meet 2019</a></h3>
                                    <div class="text">Discussion made for joining a new member, conducted by the chairman of the Good Growth.</div>
                                </div>
                            </div>
                        </div>
                        
                        <!--Event Style One-->
                       <div class="event-style-one">
                            <div class="inner">
                                <div class="image-box">
                                    <div class="image">
                                        <a href="#"><img src="images/resource/event-2.jpg" alt="" /></a>
                                    </div>
                                </div>
                                <div class="lower-box">
                                    <div class="date">20 Feb, 2019 in Sivakasi</div>
                                    <h3><a href="#">Good Growth Stall Exhibition</a></h3>
                                    <div class="text">Good Growth herbal stall exhibition was conducted in  PSR engineering college, Sivakasi.</div>
                                </div>
                            </div>
                        </div>
                        
                        <!--Event Style One-->
                        <div class="event-style-one">
                            <div class="inner">
                                <div class="image-box">
                                    <div class="image">
                                        <a href="#"><img src="images/resource/event-1.jpg" alt="" /></a>
                                    </div>
                                </div>
                               <div class="lower-box">
                                    <div class="date">2 Feb, 2019 in Courtallam</div>
                                    <h3><a href="#">Courtallam Associate Meet 2019</a></h3>
                                    <div class="text">Discussion made for joining a new member, conducted by the chairman of the Good Growth.</div>
                                </div>
                            </div>
                        </div>
                        
                        <!--Event Style One-->
						 <!--Event Style One-->
                       <div class="event-style-one">
                            <div class="inner">
                                <div class="image-box">
                                    <div class="image">
                                        <a href="#"><img src="images/resource/event-2.jpg" alt="" /></a>
                                    </div>
                                </div>
                                <div class="lower-box">
                                    <div class="date">20 Feb, 2019 in Sivakasi</div>
                                    <h3><a href="#">Good Growth Stall Exhibition</a></h3>
                                    <div class="text">Good Growth herbal stall exhibition was conducted in  PSR engineering college, Sivakasi.</div>
                                </div>
                            </div>
                        </div>
                        
                
                        
                    </div>
                </div>
                <!--Featured Column-->
                <div class="Featured-column col-md-5 col-sm-12 col-xs-12">
                	<div class="featured-block-post">
                    	<div class="inner">
                        	<div class="title">Featured</div>
                        	<div class="image">
                            	<img src="images/entertainment/featured-image.jpg" alt="" />
                            </div>
                            <div class="gradient-layer"></div>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Events Section-->
    


    <?php  include("file/footer.php");?>
