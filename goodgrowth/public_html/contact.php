<?php $page='contact';  include("file/header.php");?>

	<!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/5.jpg);">
    	<div class="auto-container">
        	<div class="inner-box">
                <h1>Contact Us</h1>
                <ul class="bread-crumb">
                	<li><a href="index.php">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    
    <!--Contact Section-->
    <section class="contact-section">
    	<div class="auto-container">
        	<div class="row clearfix">
                
            	<!--Info Column-->
                <div class="info-column col-md-7 col-sm-12 col-xs-12">
                	
                    <h2>Send Us Message</h2>
                    <!--Contact Form-->
                    <div class="contact-form">
                        <form method="post" action="#" id="contact-form">
                            <div class="row clearfix">
                                    
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="username" value="" placeholder="Full Name">
                                </div>
                                
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="email" value="" placeholder="Email Address">
                                </div>
                                
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="phone" value="" placeholder="Phone Number">
                                </div> 
                                  
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <textarea name="message" placeholder="Message"></textarea>
                                </div>
                                
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" class="theme-btn btn-style-one">Send</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                    <!--End Contact Form-->
                    
                </div>
            
                <!--Form Container-->
                <div class="form-column col-md-5 col-sm-12 col-xs-12">
                	<div class="inner-column">
                        <h2>Our Address</h2>
                        <div class="text">5/3, Kamalam Annamalai Complex, <br>Mudangiyar Road, <br>Rajapalayam - 626117</div>
                        
                        <ul class="contact-info">
                            <li><div class="icon-box"><span class="flaticon-phone-call"></span></div><h4>Phone</h4>+91-9751157370, 8870832788</li>
                            <li><div class="icon-box"><span class="flaticon-web"></span></div><h4>Email</h4>goodgrowth@gmail.com</li>
                        </ul>
                        
                        <ul class="social-icon-six">
                            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                            <li><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
                            <li><a href="#"><span class="fa fa-vimeo"></span></a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!--End Contact Section-->
    
    <!--Map Section-->
    <section class="map-section">
    	<!--Map Outer-->
        <div class="map-outer">
            <!--Map Canvas-->
 
        </div>
    </section>
    <!--End Map Section-->
    
   <?php  include("file/footer.php");?>
