<?php include_once("header.php"); ?>
<main>
 <div id="shopify-section-1545200746835" class="shopify-section">
 <section class="homepage-content" id="section-1545200746835">
  <div class="container">
    <div class="row" >
    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="padding-left:15px;padding-right:15px">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
 
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="assets/images/slider_112_11.png?v=1545200798" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/images/slider_12.png?v=1545200798" alt="Second slide">
    </div>                                                                                 
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                                                                             
       
          
          </div>                                    
      </div>
</section>
                                                        
<style data-shopify>@font-face {
  font-family: "Open Sans";                           
  font-weight: 400;
  font-style: normal;
  src: url("https://fonts.shopifycdn.com/open_sans/opensans_n4.5460e0463a398b1075386f51084d8aa756bafb17.woff2?&hmac=b6802c8274c3cd18da36cfd2c72f894815128651c45261ab566956ebfb89900b") format("woff2"),
       url("https://fonts.shopifycdn.com/open_sans/opensans_n4.8512334118d0e9cf94c4626d298dba1c9f12a294.woff?&hmac=0491ad48cbcdd4bad3dd718c7ee0163d865d552bdd2420b93b0e844f84f80b7e") format("woff");
}

  @font-face {
  font-family: "Open Sans";
  font-weight: 400;
  font-style: normal;
  src: url("https://fonts.shopifycdn.com/open_sans/opensans_n4.5460e0463a398b1075386f51084d8aa756bafb17.woff2?&hmac=b6802c8274c3cd18da36cfd2c72f894815128651c45261ab566956ebfb89900b") format("woff2"),
       url("https://fonts.shopifycdn.com/open_sans/opensans_n4.8512334118d0e9cf94c4626d298dba1c9f12a294.woff?&hmac=0491ad48cbcdd4bad3dd718c7ee0163d865d552bdd2420b93b0e844f84f80b7e") format("woff");
}

  #section-1545200746835 .hero-content h1, #section-1545200746835 .hero-content h2 {
    font-family: "Open Sans", sans-serif;
  }
  #section-1545200746835 .hero-content a, #section-1545200746835 .hero-content p {
    font-family: "Open Sans", sans-serif;
    font-weight: 400;
    font-style: normal;
  }
  #section-1545200746835 .hero-content a {
    border: 1px solid #333;
    font-size: 13px;
    background-color: transparent;
    color: #333;
    border-radius: 0px;
    text-transform: unset;
  }
  #section-1545200746835 .hero-content a:hover {
    border: 1px solid #333;
    background-color: #333;
    color: #fff;
  }
  @media only screen and (max-width: 767px) {
    #section-1545200746835 .hero-content a {
    font-size: 12px; } 
  }
  @media only screen and (max-width: 479px) {
    #section-1545200746835 .hero-content a {
    font-size: 11px; } 
  }</style>
<script>
  var heroSlider = $('.hero-slider');
  heroSlider.slick({
    
    arrows: false,
    autoplay: false,
    autoplaySpeed: 5000,
    dots: true,
    pauseOnFocus: false,
    pauseOnHover: false,
    fade: true,
    infinite: true,
    slidesToShow: 1,
  });
  var bgImg = new Image();
  bgImg.src = $('.slider-item').css('background-image').replace(/"/g,"").replace(/url\(|\)$/ig, "");
  bgImg.onload = function() {
    $('.slider-item').css({'height':this.height});
  }
</script>
</div>
 
  <br><br><br><br><br><br>
          </main>

<?php include_once("footer.php");?>        