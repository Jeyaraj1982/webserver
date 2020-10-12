<?php include_once("header.php") ; ?>

<section id="services" class="section-padding bg-gray">
      <div class="container">
        <!--
        <div class="row" >
                                                  
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="padding-left:15px;padding-right:15px">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
 
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="assets/slider4.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/slider5.png" alt="Second slide">
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
          
          -->
          
          
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
             <div class="text-wrapper" style="padding-top: 15px;padding-left:0px;padding-right:0px;padding-bottom:0px;">
              <h2 class="title-hl wow fadeInLeft" data-wow-delay="0.3s">Website Designing</h2>
        Need to grow your business with Websites, Mobile Apps, E-commerce Webstore, or Digital Marketing services? We are here to help you with our efficacious solutions and help your business reach customers in large numbers. Give us a call and discuss your requirement with us.
        </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="text-wrapper" style="padding-top: 15px;padding-left:0px;padding-right:0px;padding-bottom:0px">
            <img src="assets/min-web-dev.gif" style="width:100%;border:1px solid #333;background:#fff;padding:10px;border-radius:5px">
            </div>
         </div>
        <?php for($i=3;$i<=10;$i++) {?>
         <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="text-wrapper" style="padding-top: 15px;padding-left:0px;padding-right:0px;padding-bottom:0px">
            <img src="assets/project<?php echo $i;?>.jpeg" style="width:100%;border:1px solid #333;background:#fff;padding:10px;border-radius:5px">
            </div>
         </div>
         <?php } ?>
         
           
        </div>
         
        
         
      </div>
    </section>
    
    
<?php include_once("footer.php");  ?>