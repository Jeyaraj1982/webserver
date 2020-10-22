<?php $page ='home'; include("file/header.php");?>
    
    
	<!--Main Slider-->
    <section class="main-slider" data-start-height="450" data-slide-overlay="yes">
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                <?php
                    $sliders = $mysql->select("select * from _tbl_Web_Sliders where PublishArea='Index' and IsPublish='1' order by SliderOrder");
                    foreach($sliders as $s) {
                ?>
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="images/main-slider/<?php echo $s['SliderFileName'];?>"  data-saveperformance="off"  data-title="Awesome Title Here">
                        <img src="images/main-slider/<?php echo $s['SliderFileName'];?>"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                    </li> 
                <?php } ?>
                </ul>
            </div>
        </div>
    </section>
  	<!--End Main Slider-->
	
	
<section class="services-section">
    	<div class="auto-container">
        	<!--Sec Title-->
        	<div class="sec-title centered">
            	<div class="title">Welcome To Good Growth</div>
                <h2>People working with us since 2010!!</h2>
                <div class="text">AN ISO 9001 : 2008 certified company , Gmp &amp; FSSAI Certified. Our Products nutrients are naturally occurring preserved food with out preservative</div>
            </div>
            <div class="row clearfix">
            	<!--Services Block-->
            	<div class="services-block col-md-3 col-sm-6 col-xs-12">
                	<div class="inner-box wow fadeInLeft animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInLeft;">
                    	<div class="icon-box">
                        	<span class="icon"><img src="images/resource/icon-1.png" alt=""></span>
                        </div>
                        <h3><a href="health.php">Good Health</a></h3>
                        <div class="lower-box" style="background-image:url(images/resource/services-1.jpg);">
                        	<div class="curved-box"></div>
                        	<div class="text">Good Growth Health products are 100% natural ingredients and quality certified products.</div>
                            <a href="health.php" class="theme-btn btn-style-three">Read More</a>
                        </div>
                    </div>
                </div>
                
                <!--Services Block-->
            	<div class="services-block col-md-3 col-sm-6 col-xs-12">
                	<div class="inner-box wow fadeInLeft animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInLeft;">
                    	<div class="icon-box">
                        	<span class="icon"><img src="images/resource/icon-2.png" alt=""></span>
                        </div>
                        <h3><a href="wealth.php">Good Wealth</a></h3>
                        <div class="lower-box" style="background-image:url(images/resource/services-1.jpg);">
                        	<div class="curved-box"></div>
                        	<div class="text">Good Gold offers super special flexible gold schemes for their members with the best quality and purity.</div>
                            <a href="wealth.php" class="theme-btn btn-style-three">Read More</a>
                        </div>
                    </div>
                </div>
                
                <!--Services Block-->
            	<div class="services-block col-md-3 col-sm-6 col-xs-12">
                	<div class="inner-box wow fadeInLeft animated" data-wow-delay="600ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 600ms; animation-name: fadeInLeft;">
                    	<div class="icon-box">
                        	<span class="icon"><img src="images/resource/icon-3.png" alt=""></span>
                        </div>
                        <h3><a href="entertainment.php">Good Entertainment</a></h3>
                        <div class="lower-box" style="background-image:url(images/resource/services-1.jpg);">
                        	<div class="curved-box"></div>
                        	<div class="text">Good Healthy Holidays providing an unbelievable tourism package at an affordable price with more fun and excited.</div>
                            <a href="entertainment.php" class="theme-btn btn-style-three">Read More</a>
                        </div>
                    </div>
                </div>
                
                <!--Services Block-->
            	<div class="services-block col-md-3 col-sm-6 col-xs-12">
                	<div class="inner-box wow fadeInLeft animated" data-wow-delay="900ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 900ms; animation-name: fadeInLeft;">
                    	<div class="icon-box">
                        	<span class="icon"><img src="images/resource/icon-4.png" alt=""></span>
                        </div>
                        <h3><a href="good-market.php">Good Market</a></h3>
                        <div class="lower-box" style="background-image:url(images/resource/services-1.jpg);">
                        	<div class="curved-box"></div>
                        	<div class="text">Good Market provides an organic food products with best quality and best price.</div>
                            <a href="good-market.php" class="theme-btn btn-style-three">Read More</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>


	   <!--Gallery Section-->
    <section class="gallery-section">
    	<div class="auto-container">
        	<div class="title-bar clearfix">
                <!--Sec Title-->
                <div class="sec-title pull-left">
                    <h2>Our Products</h2>
                </div>
                
                <!--Filter-->
                <div class="filters pull-right">
                    <ul class="filter-tabs filter-btns clearfix">
                        <li class="filter active" data-role="button" data-filter="all">All</li>
                        <li class="filter" data-role="button" data-filter=".personal">Personal Care</li>
                        <li class="filter" data-role="button" data-filter=".hair">Hair Care</li>
                        <li class="filter" data-role="button" data-filter=".health">Health Care</li>
                    </ul>
                </div>
                
			</div>
        </div>
        <div class="filter-list clearfix">
                
            <!--Default Gallery Item-->
            <div class="default-gallery-item medium-item mix all health">
                <div class="inner-box">
                    <figure class="image-box"><img src="images/gallery/1.jpg" alt=""></figure>
                    <!--Overlay Box-->
                    <div class="overlay-box">
                        <div class="overlay-inner">
                            <div class="content">
                                <div class="border-box"></div>
                                <div class="title">Good Growth</div>
                                <h3><a href="omega-369.php">Omega 369</a></h3>
                                
                                <a href="omega-369.php" class="option-btn"><span class="flaticon-plus-symbol"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			   <!--Default Gallery Item-->
            <div class="default-gallery-item medium-item mix all health">
                <div class="inner-box">
                    <figure class="image-box"><img src="images/gallery/2.jpg" alt=""></figure>
                    <!--Overlay Box-->
                    <div class="overlay-box">
                        <div class="overlay-inner">
                            <div class="content">
                                <div class="border-box"></div>
                                <div class="title"> Good Growth </div>
                                <h3><a href="spirulina-tablets.php">Spirulina (60) Tablets</a></h3>
								   
                                <a href="spirulina-tablets.php" class="option-btn"><span class="flaticon-plus-symbol"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                     
            <!--Default Gallery Item-->
            <div class="default-gallery-item medium-item mix all health">
                <div class="inner-box">
                    <figure class="image-box"><img src="images/gallery/3.jpg" alt=""></figure>
                    <!--Overlay Box-->
                    <div class="overlay-box">
                        <div class="overlay-inner">
                            <div class="content">
                                <div class="border-box"></div>
                                <div class="title">Good Growth</div>
                                <h3><a href="amla-juice.php">Amla Juice</a></h3>
								
                                <a href="amla-juice.php" class="option-btn"><span class="flaticon-plus-symbol"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
                        
            <!--Default Gallery Item-->
            <div class="default-gallery-item medium-item mix all health">
                <div class="inner-box">
                    <figure class="image-box"><img src="images/gallery/4.jpg" alt=""></figure>
                    <!--Overlay Box-->
                    <div class="overlay-box">
                        <div class="overlay-inner">
                            <div class="content">
                                <div class="border-box"></div>
                                <div class="title">Good Growth</div>
                                <h3><a href="kungumam.php">Kungumam</a></h3>
								
                                <a href="kungumam.php" class="option-btn"><span class="flaticon-plus-symbol"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
			
            
            <!--Default Gallery Item-->
            <div class="default-gallery-item medium-item mix all personal">
                <div class="inner-box">
                    <figure class="image-box"><img src="images/gallery/5.jpg" alt=""></figure>
                    <!--Overlay Box-->
                    <div class="overlay-box">
                        <div class="overlay-inner">
                            <div class="content">
                                <div class="border-box"></div>
                                <div class="title">Good Growth</div>
                                <h3><a href="skin-multipurpose-cream.php">Skin Multipurpose Cream</a></h3>
								  
                                <a href="skin-multipurpose-cream.php" class="option-btn"><span class="flaticon-plus-symbol"></span></a>
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            <!--Default Gallery Item-->
            <div class="default-gallery-item medium-item mix all personal">
                <div class="inner-box">
                    <figure class="image-box"><img src="images/gallery/6.jpg" alt=""></figure>
                    <!--Overlay Box-->
                    <div class="overlay-box">
                        <div class="overlay-inner">
                            <div class="content">
                                <div class="border-box"></div>
                                <div class="title">Good Growth</div>
                                <h3><a href="pimple-cream.php">Pimple Cream</a></h3>
								    
                                <a href="pimple-cream.php" class="option-btn"><span class="flaticon-plus-symbol"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--Default Gallery Item-->
            <div class="default-gallery-item medium-item mix all personal">
                <div class="inner-box">
                    <figure class="image-box"><img src="images/gallery/7.jpg" alt=""></figure>
                    <!--Overlay Box-->
                    <div class="overlay-box">
                        <div class="overlay-inner">
                            <div class="content">
                                <div class="border-box"></div>
                                <div class="title"> Good Growth </div>
                                <h3><a href="menz-3-in-1-gel.php">Menz 3 in 1 Gel</a></h3>
								
								   
								
                                <a href="menz-3-in-1-gel.php" class="option-btn"><span class="flaticon-plus-symbol"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--Default Gallery Item-->
            <div class="default-gallery-item medium-item mix all personal">
                <div class="inner-box">
                    <figure class="image-box"><img src="images/gallery/8.jpg" alt=""></figure>
                    <!--Overlay Box-->
                    <div class="overlay-box">
                        <div class="overlay-inner">
                            <div class="content">
                                <div class="border-box"></div>
                                <div class="title"> Good Growth </div>
                                <h3><a href="spirulina-gel.php">Spirulina Gel</a></h3>
								   
                                <a href="spirulina-gel.php" class="option-btn"><span class="flaticon-plus-symbol"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--Default Gallery Item-->
            <div class="default-gallery-item medium-item mix all hair">
                <div class="inner-box">
                    <figure class="image-box"><img src="images/gallery/9.jpg" alt=""></figure>
                    <!--Overlay Box-->
                    <div class="overlay-box">
                        <div class="overlay-inner">
                            <div class="content">
                                <div class="border-box"></div>
                                <div class="title"> Good Growth </div>
                                <h3><a href="rejunate-hair-oil.php">Rejunate Hair Oil</a></h3>
								   
                                <a href="rejunate-hair-oil.php" class="option-btn"><span class="flaticon-plus-symbol"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--Default Gallery Item-->
            <div class="default-gallery-item medium-item mix all hair">
                <div class="inner-box">
                    <figure class="image-box"><img src="images/gallery/10.jpg" alt=""></figure>
                    <!--Overlay Box-->
                    <div class="overlay-box">
                        <div class="overlay-inner">
                            <div class="content">
                                <div class="border-box"></div>
                                <div class="title"> Good Growth </div>
                                <h3><a href="aloe-shampoo.php">Aloe Shampoo</a></h3>
								   
                                <a href="aloe-shampoo.php" class="option-btn"><span class="flaticon-plus-symbol"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                  
            <!--Default Gallery Item-->
            <div class="default-gallery-item medium-item mix all hair">
                <div class="inner-box">
                    <figure class="image-box"><img src="images/gallery/11.jpg" alt=""></figure>
                    <!--Overlay Box-->
                    <div class="overlay-box">
                        <div class="overlay-inner">
                            <div class="content">
                                <div class="border-box"></div>
                                <div class="title"> Good Growth </div>
                                <h3><a href="hair-care-black.php">Hair Care Black</a></h3>
								   
                                <a href="hair-care-black.php" class="option-btn"><span class="flaticon-plus-symbol"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                  
            <!--Default Gallery Item-->
            <div class="default-gallery-item medium-item mix all hair">
                <div class="inner-box">
                    <figure class="image-box"><img src="images/gallery/12.jpg" alt=""></figure>
                    <!--Overlay Box-->
                    <div class="overlay-box">
                        <div class="overlay-inner">
                            <div class="content">
                                <div class="border-box"></div>
                                <div class="title"> Good Growth </div>
                                <h3><a href="hair-regrow.php">Hair Regrow</a></h3>
								   
                                <a href="hair-regrow.php" class="option-btn"><span class="flaticon-plus-symbol"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                 
            <!--Default Gallery Item-->
            <div class="default-gallery-item medium-item mix all personal">
                <div class="inner-box">
                    <figure class="image-box"><img src="images/gallery/13.jpg" alt=""></figure>
                    <!--Overlay Box-->
                    <div class="overlay-box">
                        <div class="overlay-inner">
                            <div class="content">
                                <div class="border-box"></div>
                                <div class="title"> Good Growth </div>
                                <h3><a href="tooth-powder.php">Tooth Powder</a></h3>
								   
                                <a href="tooth-powder.php" class="option-btn"><span class="flaticon-plus-symbol"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
			
                 
            <!--Default Gallery Item-->
            <div class="default-gallery-item medium-item mix all personal">
                <div class="inner-box">
                    <figure class="image-box"><img src="images/gallery/14.jpg" alt=""></figure>
                    <!--Overlay Box-->
                    <div class="overlay-box">
                        <div class="overlay-inner">
                            <div class="content">
                                <div class="border-box"></div>
                                <div class="title"> Good Growth </div>
                                <h3><a href="coconut-milk-soap.php">Coconut Milk Soap</a></h3>
								   
                                <a href="coconut-milk-soap.php" class="option-btn"><span class="flaticon-plus-symbol"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
			
			
			
        </div>
        <div class="text-center events-section">
                        <a href="products.php" class="theme-btn btn-style-four">See All Products</a>
                    </div>
    </section>
    <!--End Gallery Section-->
    
    <!--Fullwidth Section One-->
    <section class="fullwidth-section-one">
    	<div class="section-outer clearfix">
        	<!--Image Column-->
        	<div class="image-column" style="background-image:url(images/resource/fullwidth-1.jpg);">
            	<div class="hidden-image">
                	<img src="images/resource/fullwidth-1.jpg" alt="" />
                </div>
            </div>
            
        	<!--Left Column-->
        	<div class="left-column">
           
		   <div class="content">
                	<!--Sec Title-->
                    <div class="sec-title">
                    	<h2>Join in <span>Gold Harvest Scheme</span> to save money </h2>
                    </div>
					<div class="text">Good Gold introduce a Gold Harvest plans for 10,12,18 months, Customer should pay a fixed installment amount on due date every month with Good Gold for 10, 12 and 18 months. From the end of the 10th, 12th and 18th month customer will be eligible for a special discount which will vary from 55% to 75% of one installment.</div>
                    <div class="row clearfix">
                    	<!--Donate Box-->
                    	<div class="donate-box col-md-4 col-sm-4 col-xs-12">
                        	<div class="inner">
                            	<div class="icon-box">
                                	<span class="icon flaticon-piggy-bank"></span>
                                </div>
                                <h3><a href="#">Save Now</a></h3>
                            </div>
                        </div>
                        
                        <!--Donate Box-->
                    	<div class="donate-box col-md-4 col-sm-4 col-xs-12">
                        	<div class="inner">
                            	<div class="icon-box">
                                	<span class="icon flaticon-cash"></span>
                                </div>
                                <h3><a href="#">Get Discount</a></h3>
                            </div>
                        </div>
                        
                        <!--Donate Box-->
                    	<div class="donate-box col-md-4 col-sm-4 col-xs-12">
                        	<div class="inner">
                            	<div class="icon-box">
                                	<span class="icon flaticon-heart"></span>
                                </div>
                                <h3><a href="#">Be Happy</a></h3>
                            </div>
                        </div>
                        	<div class="text-center">
                        <a href="wealth.php" class="theme-btn btn-style-four">See All Details</a>
                    </div>
                    </div>
                </div>
		   
		   
		   </div>
            
        </div>
    </section>
    <!--End Fullwidth Section One-->
    
    <!--Volunter Section-->
    <section class="volunter-section">
    	<div class="auto-container">
        	<div class="content-inner">
                <div class="row clearfix">
                	<!--Content Column-->
                    <div class="content-column col-md-6 col-sm-12 col-xs-12">
                    	<div class="inner">
                        	<!--Sec Title-->
                            <div class="sec-title medium">
                            	<div class="sub-title">Healthy </div>
                                <h2> Good Healthy <span> Holidays </span></h2>
                            </div>
                            
                            <!--Volunter Box-->
                            <div class="volunter-box">
                            	<div class="inner-box">
                                	<div class="icon-box">
                                    	<span class="icon"><img src="images/resource/icon-5.png" alt="" /></span>
                                    </div>
                                    <h3><a href="#">kodaikanal</a></h3>
                                    <div class="text">All Stunning Places in kodaikanal Starts from INR 1,900.</div>
                                </div>
                            </div>
                            
                            <!--Volunter Box-->
                            <div class="volunter-box">
                            	<div class="inner-box">
                                	<div class="icon-box">
                                    	<span class="icon"><img src="images/resource/icon-6.png" alt="" /></span>
                                    </div>
                                    <h3><a href="#">Goa</a></h3>
                                    <div class="text"> Sandy beaches, amazing parties, starts from INR 9,900.</div>
                                </div>
                            </div>
                            
                            <!--Volunter Box-->
                            <div class="volunter-box">
                            	<div class="inner-box">
                                	<div class="icon-box">
                                    	<span class="icon"><img src="images/resource/icon-7.png" alt="" /></span>
                                    </div>
                                    <h3><a href="#">Malaysia</a></h3>
                                    <div class="text"> Rich mix of cultural attractions and rapidly expanding cities in Malaysia, Starts from INR 35,000.</div>
                                </div>
                            </div>
                             
                            <!--Volunter Box-->
                            <div class="volunter-box">
                            	<div class="inner-box">
                                	<div class="icon-box">
                                    	<span class="icon"><img src="images/resource/icon-7.png" alt="" /></span>
                                    </div>
                                    <h3><a href="#">Indonesia</a></h3>
                                    <div class="text"> Presenting the most complete natural wealth on earth,  Starts from INR 45,000.</div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!--Image Column-->
                    <div class="image-column col-md-6 col-sm-12 col-xs-12">
                    	<div class="image">
                        	<img src="images/resource/bulb.jpg" alt="" />
                        </div>
                    </div>
					
					
			
					
                </div>
            </div>
					<div class="text-center">
                        <a href="entertainment.php" class="theme-btn btn-style-four">See All Details</a>
                    </div>
					
        </div>
    </section>
    <!--End Volunter Section-->
    


    <!--Counter Section-->
    <section class="counter-section" style="background-image:url(images/app-bg.jpg);">
    	<div class="auto-container">
        	<!--Sec Title-->
       
            <!--Fact Counter-->
    <div class="row">
						<div class="col-lg-12">
							<div class="sec-heading style1">
								<h2>DOWNLOAD THE NEW GOOD GROWTH APP</h2>
							</div>
							<div class="download-app-sec">
								<p> Search For GOOD GROWTH  in the Android & iOS Market </p>
								<div class="banner-btns">
									<a href="#" title="" class="apple-store"><i class="fab fa fa-apple" aria-hidden="true"></i><span class="small-text">Get It From</span>Appstore</a>
									<a href="https://play.google.com/store/apps/details?id=com.imax.goodgrowth" target="_blank" title="" class="play-store"><i class="fab fa fa-android" aria-hidden="true"></i><span class="small-text">Get It From</span>Appstore</a>
								</div>
							</div>
						</div>
					</div>
            
        </div>
    </section>
    <!--End Counter Section-->
    

   
    <!--Events Section-->
    <div class="events-section">
    	<div class="auto-container">
        	<div class="sec-title">
            	<h2>Latest Events</h2>
            </div>
            <div class="row clearfix">
            	<!--Carousel Column-->
            	<div class="carousel-column col-md-6 col-sm-12 col-xs-12">
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
                        
                        <!--Event Style One-->
                       
                        
                    </div>
                </div>
                <!--Featured Column-->
            
      <div class="video-column col-md-6 col-sm-12 col-xs-12">
                	<div class="inner-box">
                    
                        
                        <!--Video Box-->
                        <div class="video-box">
                            <figure class="image">
                                <img src="images/resource/video-1.jpg" alt="">
                            </figure>
                            <a href="https://youtu.be/bgq7h6oG4L0" class="lightbox-image overlay-box"><span class="flaticon-arrow"></span></a>
                     




					 </div>
				  </div>
                </div>
              
            </div>
        </div>
    </div>
    <!--End Events Section-->
   

   <script>

jQuery(document).ready(function($){
  
  window.onload = function (){
    $(".bts-popup").delay(1000).addClass('is-visible');
	}
  
	//open popup
	$('.bts-popup-trigger').on('click', function(event){
		event.preventDefault();
		$('.bts-popup').addClass('is-visible');
	});
	
	//close popup
	$('.bts-popup').on('click', function(event){
		if( $(event.target).is('.bts-popup-close') || $(event.target).is('.bts-popup') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup when clicking the esc keyboard button
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		$('.bts-popup').removeClass('is-visible');
	    }
    });
});</script>
<div class="bts-popup" role="alert">
    <div class="bts-popup-container">
      <img src="images/front.png" alt="" width="100%" />
      	<p>We are a certified company with 30 years of professional expertise done a traditional medical DNA research and scientifically they referred. </p>
				<div class="bts-popup-button">
		       <a href="#0">Enter</a>
         </div>
        <a href="#0" class="bts-popup-close img-replace">Close</a>
    </div>
</div>
<?php  include("file/footer.php");?>

    