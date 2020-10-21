<?php include_once("includes/header.php"); ?>
<div style="height:50px">
</div>
  <section id="contact" class="section-padding">    
      <div class="container">
        <div class="section-header text-center">          
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Countact Us</h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        <div class="row contact-form-area wow fadeInUp" data-wow-delay="0.3s">   
          <div class="col-lg-7 col-md-12 col-sm-12">
            <div class="contact-block">
              <form id="contactForm">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name" required data-error="Please enter your name">
                      <div class="help-block with-errors"></div>
                    </div>                                 
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" placeholder="Email" id="email" class="form-control" name="email" required data-error="Please enter your email">
                      <div class="help-block with-errors"></div>
                    </div> 
                  </div>
                   <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" placeholder="Subject" id="msg_subject" class="form-control" required data-error="Please enter your subject">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group"> 
                      <textarea class="form-control" id="message" placeholder="Your Message" rows="7" data-error="Write your message" required></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                    <div class="submit-button text-left">
                      <button class="btn btn-common" id="form-submit" type="submit">Send Message</button>
                      <div id="msgSubmit" class="h3 text-center hidden"></div> 
                      <div class="clearfix"></div> 
                    </div>
                  </div>
                </div>            
              </form>
            </div>
          </div>
          <div class="col-lg-5 col-md-12 col-xs-12">
             Address<br><br><br>
              <a style="font-size:18px;color:#555"> Maligai</a>,<br>#1A Chidambara Nagar 1<sup>st</sup> Street,<br>Tuticorin -628008.<br><br>
              <a href="#" style="font-size:14px;color:#555">+91 0461-4985333 <br>+91 8190807072</a>
          </div>
        </div>
      </div> 
    </section>
<?php include_once("includes/footer.php"); ?>    