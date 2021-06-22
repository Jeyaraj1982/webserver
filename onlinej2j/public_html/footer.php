	<div id="top"></div>		
			<div class="sub-form-section" style="display: none;">
				<div class="container sub-form-section-container">
					<div class="col-lg-6 col-md-12 col-sm-12">
						<h2 class="section-title">Subscribe to newsletter</h2>
						<p class="section-details sub-form-section-details">We'll only send you important news and updates</p>
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 sub-form-card-section">
						<form class="sub-form" method="post" action="subscribe.php">
							<input class="sub-form-input" type="email" name="newsletter_email" placeholder="Email address">
							<button class="theme-btn sub-form-btn">Subscribe</button>
						</form>
					</div>
				</div>
			</div>
    	 
		<div id="top"></div>
			 
			<div class="footer-section" style="padding-bottom:40px !important;padding-top:5px !important;"> 
				<div class="container footer-section-container">
					<div class="col-lg-4 col-md-8 col-sm-12 col-xs-12 col-12 footer-section-div">
						<img class="footer-logo" src="<?php echo SITE_URL;?>/assets/logo.png" style="background: #fff;padding: 5px 20px;border-radius: 5px;">
						<p>We aim to be the best technology platform in India, which power the most trusted brands. Online services have become a basic need of our life because of hectic schedule and less time.</p>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 col-12 footer-section-div">
						<h3>Menu Links</h3>
						<ul class="footer-section-ul">
							<li><a href="<?php echo SITE_URL;?>/aboutus.php">About Us</a></li>
							<li><a href="<?php echo SITE_URL;?>/services.php">Services</a></li>
							<li><a href="<?php echo SITE_URL;?>/features.php">Features</a></li>
							<li><a href="<?php echo SITE_URL;?>/register.php">Join as retailer </a></li>
                            <li><a href="<?php echo SITE_URL;?>/contactus.php">Contact Us</a></li>
						</ul>
					</div>
					<div class="col-lg-3 col-md-8 col-sm-4 col-xs-6 col-12 footer-section-div">
						<h3>Information</h3>
						<ul class="footer-section-ul">
							<li><a href="<?php echo SITE_URL;?>/terms.php">Terms of Service</a></li>
							<li><a href="<?php echo SITE_URL;?>/privacy.php">Privacy Policy</a></li>
							<li><a href="<?php echo SITE_URL;?>/refundpolicy.php">Refund Policy </a></li>
						</ul>
					</div>
					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6 col-12 footer-section-div">
						<h3>Resources</h3>
						<ul class="footer-section-ul">
                            <li><a href="<?php echo SITE_URL;?>/api.php">API Documents</a></li>
                             
						</ul>
					</div>
				</div>		
			</div>


			 
			 
            <div class="copyright-section" style="border-top:none;background:#444;padding:15px 0px !important">
				<div class="container copyright-section-container" >
					<!--<img src="assets/images/copyright.svg">-->
                    <p><a href="https://www.j2jsoftwaresolutions.com" target="_blank" title="Codefest">J2J Software Solutions</a>&trade;. All rights reserved 2012-2021.</p>
				</div>
			</div>
           
		</div>        
  	<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  	<!-- Header scroll -->
	<script type="text/javascript">
		$(window).scroll(function() {
		    if ($(this).scrollTop() > 20) {
		      $('#navbar').addClass('header-scrolled');
		    } else {
		      $('#navbar').removeClass('header-scrolled');
		    }
		 });		
	</script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WS30KRKFM4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-WS30KRKFM4');
</script>
</body>
</html>