<?php include_once("header.php");?>
   <!-- #intro -->   
  <main id="main">
      
      
    <section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Contact Us</h2>
         <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt fugiat culpa esse aute nulla. malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>-->
        </div>
        <div class="row contact-info">
         <div class="col-lg-5"> 
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>    
              <address><b style='color:#E91E63'>Golden Life4 Society</b><br>
              Trichy Main Road, 27/2424, Elangovadigal Street,<br>
              Manju Nagar, Villupuram - 605401.<br>
              Tamilnadu. India  </address>
            </div> 
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+9104146-258927">+91 04146-258927</a></p>
              <p><a href="tel:+916374991927">+91 6374991927, +91 8903209430,<br>+91 7824948740, +91 9365808299</a></p>
            </div> 
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:goldenlife4society@gmail.com">goldenlife4society@gmail.com</a></p>
            </div> 
		 </div>
		 <div class="col-lg-7">
		      <div class="container">
        <div class="form"> 
		   <!-- Form itself -->
          <form name="sentMessage" class="well" id="contactForm"  novalidate> 
		 <div class="control-group">
                   <div class="form-group"><input type="text" class="form-control" placeholder="Full Name" id="name" required data-validation-required-message="Please enter your name" />
                   <p class="help-block"></p>
		           </div>
	         </div> 	
                <div class="form-group">
                  <div class="controls"><input type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Please enter your email" /></div>
	            </div> 	
               <div class="form-group">
                 <div class="controls"><textarea rows="10" cols="100" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter your message" minlength="5" data-validation-minlength-message="Min 5 characters" maxlength="999" style="resize:none"></textarea></div>
               </div> 		 
	     <div id="success"> </div> <!-- For success/fail messages -->
	    <button type="submit" class="btn btn-primary pull-right">Send</button><br />
          </form>
        </div>
      </div>
		 </div>
        </div>
      </div>
    </section><!-- #contact -->
  </main>
  <?php include_once("footer.php");?>