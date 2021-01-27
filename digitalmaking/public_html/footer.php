<div class="footer-section">
    <div class="container footer-container">
        <div class="col-lg-5 footer-logo">
            <img src="https://digitalmaking.in/assets/img/logo.png">
            <p class="footer-subsection-text">DigitalMaking.in provides online resume & visiting card distribution services.</p>
        </div>
        <div class="col-lg-4 footer-subsection">
            <h3 class="footer-subsection-title">Links</h3>
            <ul class="footer-subsection-list">
                <li><a href="https://www.digitalmaking.in/contactus.php">Contact Us</a></li>
            </ul>
        </div> 
        <div class="col-lg-3 footer-subsection">
            <h3 class="footer-subsection-title">Digital Making</h3>
            <ul class="footer-subsection-list">        
               <li>Harikrishna Street, Saligramam,</li>
               <li>Chennai. India.</li>
               <li>+91 8903833896</li>
               
                <!--<li>Unit 29, Abbey Road Ind Est<br>NW10 7XF London</li>
                <li><a href="mailto:client.services@domain.com">digitalmaking@gmail.com</a></li>-->
                <li><a href="mailto:digitalmakingid@gmail.com">digitalmakingid@gmail.com</a></li>
            </ul>    
        </div>
    </div>
    <div class="container footer-credits">
        <p>&copy; 2020 <a href="https://www.digitalmaking.in" target="_blank" title="Codefest">Digital Making</a>&trade;. All Rights Reserved.</p>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://digitalmaking.in/assets/js/accordian.js"></script>
<script src="https://digitalmaking.in/assets/js/owl/owl.carousel.js"></script>
<script type="text/javascript">
    $(window).scroll(function() {
        if ($(this).scrollTop() > 20) {
            $('#navbar').addClass('header-scrolled');
        } else {
            $('#navbar').removeClass('header-scrolled');
        }
    });        
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items:4,
            loop:true,
            nav:true,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            responsiveClass:true,
            responsive:{0:{items:2},600:{items:3},1000:{items:6}}              
        });
    });
        </script>
    </body>
</html>