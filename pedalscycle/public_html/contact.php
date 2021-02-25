 <?php include_once("header.php");?>
		
		<!-- Start Page Title Area -->
		<div class="page-title">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="page-title-text">
                                    <h3>Contact Us</h3>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6">
                                <ul>
                                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li><i class="fa fa-angle-right"></i></li>
                                    <li class="active">Contact Us</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<!-- End Page Title Area -->
    


        <!-- Start Contact Area -->
        <section class="contact-area ptb-80">
            <div class="container">
			   <div class="section-title">
                    <h2> <span>Contact Us</span></h2>
                    <img src="assets/img/section-title-logo.png" alt="section-title-logo">
        </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="contact-box">
                            <i class="fa fa-map-marker"></i>
                            <h4>Address</h4>
                            <p>419, Kattayanvilai, Near E.B.Office(Fly Over), M.S. Road, Nagercoil- 629003, Kanyakumari District.</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="contact-box">
                            <i class="fa fa-phone"></i>
                            <h4>Phone</h4>
                            <p><a href="#">+91 94860 87858</a></p>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="contact-box">
                            <i class="fa fa-envelope"></i>
                            <h4>Email</h4>
                            <p><a href="#">pedalstn74@gmail.com</a></p>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </section>
        <!-- End Contact Area -->
        
        <!-- Start Contcta Area -->
        <div class="contact ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-6 col-md-6 offset-md-6">
                        <form action='contactsubmit.php' method="post" id="contactForm">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="ContactName" id="ContactName" placeholder="Your Name" required data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="Email" id="Email" placeholder="Your Email" required data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="MobileNumber" id="MobileNumber" placeholder="Your Phone Number" required data-error="Please enter your phone number">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="Subject" id="Subject" placeholder="Subject" required data-error="Please enter your subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="Description" class="form-control" id="Description" cols="30" rows="6" placeholder="Message" required data-error="Write your message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 col-md-12">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Send Message">
                                    <!-- <button type="submit" name="submit" class="btn btn-primary">Send Message</button> -->
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Contact Area -->
        
        <div style="padding: 20px"></div>
     <?php include_once("footer.php");?>