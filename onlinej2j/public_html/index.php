<?php
    if (isset($_GET['mindex'])) {
        include_once("mindex.php");
    } else {
?>
<?php include_once("header.php");?>
	<div id="top"></div>
	 	
		<div class="wrapper">
			<div id="header" class="header-section" style="padding-top:120px !important;padding-bottom:60px">
				<div class="container header-section-container">
					<div class="col-lg-6 col-md-12 header-section-content">
						<div class="header-title-section"> 
							<h1 style="font-size:34px;"><span style="color:#666">Start <!--<span style="color:#E9544E">Smart</span>--> Business with</span> OnlineJ2J</h1>
							<br>
							<p>we provide world class experience in online retail services.</p>
							<br>                                   
                            <br>
							<br>
							<div class="header-title-all-btn-section">
								<div class="header-title-btn-section">
									<a class="theme-btn readmore-btn header-btn" href="#blogSection">Create Account For Free</a>
								</div>
								<!--
                                <div class="header-title-video-btn-section">
									<img src="assets/images/watch-video-btn-icon.svg">
									<a href="#top" class="video-btn-subtitle">YouTube Video</a>
								</div>
                                -->
							</div>
                            <p style="padding-top: 15px;font-size: 12px;">No activation fee, hidden charges, targets</p>
							<br>
							<br>
							<div class="header-title-footer" style="display:none">
								<a href="javascript:void(0)">You are in correct place</a> 
								<p>1000+ retailers & 10+ earnable services</p>
							</div>
                            <br><br>
                            <a href='https://play.google.com/store/apps/details?id=com.J2J.OnlineJ2J' target="_blank"><img src="<?php echo SITE_URL;?>/assets/images/googleplay.png" style="border-radius:10px;border:5px solid #D2D6FE;background:#000;padding-right: 10px;padding-left: 10px;padding-bottom: 3px;height:60px"></a>
						</div>
					</div>
					<div class="col-lg-6 col-md-12 header-img-section">
						<div class="header-img-card">
							<img src="assets/images/header.png">
						</div>
					</div>
				</div>
			</div>
    	 
		<div id="headerSection"></div>	
		<?php include_once("includes/services.php")	 ;?>
			
		<div id="aboutSection"></div>
			<div class="about-section">
				<div class="about-section-bg"></div>
				<div class="container about-section-container">
					<div class="col-lg-5 col-md-12 about-section-img-section">
						<div class="about-section-header-img-section">
							<img src="assets/images/about_img.png">
						</div>
					</div>
					<div class="col-lg-7 col-md-12 about-section-content-section">
						<div class="section-title-block">
							<p class="section-subtitle">About Service</p>
							<h2 class="section-title">Connect Anywhere & Anytime</h2>
							<p class="section-details">you can access our services from internet enabled devices of desktop / laptop / tablet & android app</p>
						</div>
						<div class="about-section-content-details">
							<ul class="about-section-content-details-ul">
								<li class="about-section-content-details-li">Instant Recharge, Transfer & Booking</li>
								<li class="about-section-content-details-li">Real Operator ID/Ref</li>
                                <li class="about-section-content-details-li">Detailed Report</li>
								<li class="about-section-content-details-li">Centralized Displute/Reverse System</li>
                                
							</ul>
							<ul class="about-section-content-details-ul">
								<li class="about-section-content-details-li">Whatsapp &Telegram Notifications</li>
                                <li class="about-section-content-details-li">Dedicated Own Servers</li>
                                <li class="about-section-content-details-li">A hassle-free online experience</li>
								<li class="about-section-content-details-li">A safe and secure payment process </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
    	 
		<div id="whatSection"></div>
			 
			<div class="what-we-do-section">
				<div class="container what-we-do-section-container">
					<div class="col-lg-6 col-md-12 what-we-do-section-details-secction">
						<div class="col-md-12 section-title-block">
							<p class="section-subtitle">What we do</p>
							<h2 class="section-title">Introduce your specific services or products</h2>
							<p class="section-details">Tell your visitors a little something about your products or services here. It's the perfect way to showcase features.</p>
						</div>
						<br>
						<div class="col-md-12 btn-section">
							<a href="#securitySection" class="theme-btn readmore-btn">Learn More</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-12 what-we-do-services-section">
						<div class="col-md-12 col-sm-12 col-xs-12 services-card-section">
							<div class="services-card">
								<div class="services-card-img-section">
									<img src="assets/images/247_support.svg">
								</div>
								<div class="services-card-details-section">
									<h3>24/7 Support</h3>
									<p>Customer service is extremely important in service-based business.</p>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 services-card-section">
							<div class="services-card">
								<div class="services-card-img-section">
									<img src="assets/images/tech_support.svg">
								</div>
								<div class="services-card-details-section">
									<h3>Tech Support</h3>
									<p>Show you know your way around a computer and technology, just like a pro.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-12 what-we-do-services-section what-we-do-services-second-section">
						<div class="col-md-12 col-sm-12 col-xs-12 services-card-section">
							<div class="services-card">
								<div class="services-card-img-section">
									<img src="assets/images/data_access.svg">
								</div>
								<div class="services-card-details-section">
									<h3>Data Access</h3>
									<p>Access data easily, just like you can edit this landing page template easily too.</p>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 services-card-section">
							<div class="services-card">
								<div class="services-card-img-section">
									<img src="assets/images/secure_storage.svg">
								</div>
								<div class="services-card-details-section">
									<h3>Secure Storage</h3>
									<p>We take security seriously, so there's nothing for your business to worry about.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
    	 
		<div id="securitySection"></div>
			 
			<div class="security-section" style="display: none;">
				<div class="security-section-bg">
				</div>
				<div class="security-section-bg-two">
				</div>
				<div class="container security-section-container">
					<div class="col-md-12 section-title-block">
						<p class="section-subtitle">Security</p>
						<h2 class="section-title">Secure Cloud Storage</h2>
					</div>
					<div class="container security-details-container">
						<div class="col-md-6 offset-md-3 col-sm-8 offset-sm-2 security-details-section">
							<div class="security-details-img-section">
								<img src="assets/images/platform_icon.png">
							</div>
							<div class="security-details-content-section">
								<p>We take security seriously, so there's nothing for you or your business to worry about. Read more about our safety and security features in the section below.</p>
								<br>
								<br>
								<div class="col-md-12 btn-section">
									<a href="#" class="theme-btn readmore-btn">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
    	 
	
    	 
		<div id="clientsSection"></div>
			 
			<div class="clients-section" style="display: none;">
				<div class="clients-section-bg">
				</div>
				<div class="container clients-section-container">
					<div class="col-md-12 clients-title-block">
						<h2 class="section-title">Our Clients</h2>
						<p class="section-details">We've worked with some great clients over the years</p>
					</div>
					<div class="container clients-list-container">
						<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 col-12 clients-list">
							<img src="assets/images/dummy_logo1.png">
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 col-12 clients-list">
							<img src="assets/images/dummy_logo2.png">
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 col-12 clients-list">
							<img src="assets/images/dummy_logo3.png">
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 col-12 clients-list">
							<img src="assets/images/dummy_logo2.png">
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6 col-xs-6 col-12 clients-list">
							<img src="assets/images/dummy_logo1.png">
						</div>
					</div>
					<div class="col-md-12 btn-section clients-btn-section">
						<a href="#testimonialsSection" class="theme-btn readmore-btn">What they say</a>
					</div>
				</div>
			</div>
    	 
		<div id="testimonialsSection"></div>			
			 
			<div class="testimonial-section" style="display: none;">
				<div class="container testimonial-section-container">
					<div class="col-md-12 testimonial-title-block">
						<p class="section-subtitle">Testimonial</p>
						<h2 class="section-title">Client Review</h2>
					</div>
					<div class="container testimonial-card-container">
						<div class="col-md-7 col-sm-8-offset-sm-2 col-xs-12 testimonial-card-container">
							<div class="testimonial-card">
								<ul class="testimonial-card-content">
									<li>Feature your top client review here so visitors know clients love your service. Sometimes, quality is better than quantity - <strong>Jon Bon, The Branding Co.</strong> </li>
								</ul>
							</div>
							<div class="testimonial-card-icon">
								<img src="assets/images/testimonial-icon.svg">
							</div>
							<div class="testimonial-card-author">
								<img src="assets/images/reviewer.png">
							</div>
						</div>
					</div>
				</div>
			</div>
    	 
		<div id="blogSection"></div>
		<?php include_once("includes/pricing.php"); ?>
			
    	
	
    	<!-- SECTION LABEL -->
	<?php include_once("footer.php"); ?>
    <?php } ?>