<footer class="kamaraj-footer-field">
        <div class="container">
            <div class="row animatedParent animateOnce animateOnce">
                <div class="col-md-3">
                    <div class="kamaraj-footer-about">
                        <img class="kamaraj-foooter-logo" src="images/nms_logo2.png" style="width: 130px;height:140px" alt="">
                        <p>N.M.S. Kamaraj Polytechnic College, Pazhavilai was established on 22 nd September 1982.The Philanthropic and magnanimous people of this area had offered great help for establishing this polytechnic College in the name of the great leader Perunthalaivar. Thiru.K.Kamaraj.</p>
                
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="kamaraj-footer-link">
                        <h4 class="kamaraj-footer-heading">Links</h4>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="placement.php">Placement</a></li>
                            <li><a href="hostel.php">Facilities</a></li>
							<li><a href="alumini.php">Alumini</a></li>
                            <li><a href="contact.php">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="kamaraj-footer-link">
                        <h4 class="kamaraj-footer-heading">Links</h4>
                        <ul>
                            <li><a href="automobile.php">Automobile Engineering</a></li>
                            <li><a href="computerscience.php">Computer Engineering</a></li>
                            <li><a href="civilengineering.php">Civil Engineering</a></li>
                            <li><a href="eee.php">Electrical & Electronics Engineering</a></li>
                            <li><a href="ece.php">Electronics & Communication Engineering</a></li>
                            <li><a href="mechanical.php">Mechanical Engineering Us</a>
                            </li>
                        </ul>
                    </div>
                </div>                                         
                <div class="col-md-3">
                    <div class="kamaraj-footer-contact">
                        <h4 class="kamaraj-footer-heading">Contact Us</h4>
                        <img src="images/footer.jpg" alt="">
                        <div class="kamaraj-mailbox">
                            <p><i class="fa fa-envelope"></i>nmskptc_2003@yahoo.co.in</p>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>Kamaraj Polytechnic College, Pazhavilai ,Kanyakumari District</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <section class="kamaraj-copyright-field">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="kamaraj-copyright">
                        <p>Copyright© 2017 NMS Kamaraj Polytechnic College. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

      <!-- script start from here -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-dropdownhover.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/jquery-scrolltofixed-min.js"></script>
    <script type="text/javascript" src="js/isotope.js"></script>
    <script type="text/javascript" src="js/stellar.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="js/jquery.masonry.min.js"></script>
    <script type="text/javascript" src="js/css3-animate-it.js"></script>
    <script type="text/javascript" src="js/bootstrap-slider.js"></script>
    <script type="text/javascript" src="js/jquery.scrollUp.js"></script>
    <script type="text/javascript" src="js/classie.js"></script>

    <!-- Custom script for all pages -->
    <script type="text/javascript" src="js/script.js"></script>
    
    
     
    <script type="text/javascript">
        $(document).ready(function($) {
            $('.start-count').each(function() {
                var $this = $(this);
                $this.data('target', parseInt($this.html()));
                $this.data('counted', false);
                $this.html('0');
            });

            $(window).bind('scroll', function() {
                var speed = 3000;
                $('.start-count').each(function() {
                    var $this = $(this);
                    if (!$this.data('counted') && $(window).scrollTop() + $(window).height() >= $this.offset().top) {
                        $this.data('counted', true);
                        $this.animate({
                            dummy: 1
                        }, {
                            duration: speed,
                            step: function(now) {
                                var $this = $(this);
                                var val = Math.round($this.data('target') * now);
                                $this.html(val);
                                if (0 < $this.parent('.value').length) {
                                    $this.parent('.value').css('width', val + '%');
                                }
                            }
                        });
                    }
                });
            }).triggerHandler('scroll');
        });
    </script>
     <style>
    .btn-pink{
        background:#d10e69;
        border:1px solid #d10e69;
    }
    .btn-pink:hover{
        background:#ffeaf4;
        color:#d10e69;
        border:1px solid #d10e69;
    }
    .btn-green{
        background:#3a9345;
        border:1px solid #3a9345;
    }
    .btn-green:hover{
        background:#e0ffe4;
        color:#3a9345;
        border:1px solid #3a9345;
    }
 </style>   
  <div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="top: 150px;">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding: 36px 40px;">
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-6"><button type="button" class="btn btn-default kamaraj-big-btn btn-pink" onclick="location.href='2020_firstyear.php'">F<span style="text-transform: lowercase;">irst Year</span> <br> A<span style="text-transform: lowercase;">pplication Form</span></button></div>
                        <div class="col-sm-6" style="text-align: right;"><button type="button" class="btn btn-default kamaraj-big-btn btn-green" onclick="location.href='2020_secondyear.php'">S<span style="text-transform: lowercase;">econd Year</span> <br> A<span style="text-transform: lowercase;">pplication Form</span></button></div>
                    </div>
                </div>
            </div>
         </div>  
      </div>
    </div>
  </div>
</div>
<script>
function ShowForms() {
    $('#ConfirmationPopup').modal("show");
}                                                                                                                                                                                                         
</script>