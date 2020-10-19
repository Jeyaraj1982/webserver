	 <footer class="footer">
        <div class="wrap">                                                                    
            <div class="row">
                <article class="one-third">
                    <br><img src="images/logo_trip78.png" style="height:100px"><br>
                    <b>Welcome Holidays</b><br>
                    520/3A, South Bye Pass Road,<br>
                    Tirunelveli,<br>
                    Tamil Nadu 628005<br>
                    
                </article>
                <article class="one-third">
                    <h6>Customer support</h6>
                    <ul>
                        <li><a href="Faq.php" title="Faq">Faq</a></li>
                        <li><a href="MakeReservation.php" title="How do I make a reservation?">How do I make a reservation?</a></li>
                        <li><a href="PaymentOptions.php" title="Payment options">Payment options</a></li>
                        <li><a href="BookingTips.php" title="Booking tips">Booking tips</a></li> 
                    </ul>
                </article> 
                <article class="one-third"> 
                    <h6>Follow us</h6>
                    <ul class="social">
                            <li><a href="#" title="facebook"><i class="fa fa-fw fa-facebook"></i></a></li>
                            <li><a href="#" title="twitter"><i class="fa fa-fw fa-twitter"></i></a></li>
                        </ul>
                </article>
                
                <div class="bottom full-width"> 
                    <p class="copy">Copyright trip78.in. All rights reserved</p>
                    <nav> 
                        <ul>
                            <li><a href="aboutus.php" title="About us">About us</a></li>
                            <li><a href="contactus.php" title="Contact">Contact</a></li>
                            <li><a href="Partners.php" title="Partners">Partners</a></li>
                            <li><a href="CustomerService.php" title="Customer service">Customer service</a></li>
                            <li><a href="Faq.php" title="FAQ">FAQ</a></li>
                            <li><a href="Careers.php" title="Careers">Careers</a></li>
                            <li><a href="TermsandConditions.php" title="Terms & Conditions">Terms &amp; Conditions</a></li>
                            <li><a href="Privacy.php" title="Privacy statement">Privacy statement</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    
    <script type="text/javascript" src="js/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="js/jquery.slimmenu.min.js"></script>
    <script type="text/javascript" src="js/lightslider.min.js"></script>
    <script type="text/javascript" src="js/lightgallery-all.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
    <script type="text/javascript"  src="js/infobox.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/styler.js"></script>
    <script type="text/javascript">    
        (function( $ ) {
            $(document).ready(function(){
                $('.form').hide();
                $('#form1').show();
                $('.f-item:nth-child(1)').addClass('active');
                $('.f-item:nth-child(1) span').addClass('checked');        

                $('#hero-gallery').lightSlider({
                    gallery:true,
                    item:1,
                    pager:false,
                    gallery:false,
                    slideMargin: 0,
                    speed:2000,
                    pause:6000,
                    mode: 'fade',
                    auto:true,
                    loop:true,
                    onSliderLoad: function() {
                        $('#hero-gallery').removeClass('cS-hidden');
                    }  
                });            
            });
        })(jQuery);
    </script>
    
 
</body>
</html>
    
   