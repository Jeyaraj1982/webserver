<?php include_once("header.php")?>
  
  <?php
               $Product = $mysql->select("select * from _tbl_products where md5(ProductID)='".$_GET['product']."'");  
               echo "select * from _tbl_products where md5(ProducTID)='".$_GET['product']."'";
                $images = $mysql->select("select * from _tbl_products_images where IsDelete='0' and ProductID='".$Product[0]['ProductID']."' order by ImageOrder");
        ?>      
		<!-- Start Page Title Area -->
		<div class="page-title">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="page-title-text">
                                    <h3><?php echo $Product[0]['ProductName'];?></h3>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6">
                                <ul>
                                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li><i class="fa fa-angle-right"></i></li>
                                    <li class="active"><?php echo $Product[0]['ProductName'];?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<!-- End Page Title Area -->
        
        <!-- Start About Area -->
        <section class="about-area ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-5">
                        <div>
                             <img src="assets/products/<?php echo $images[0]['ImageName'];?>" alt="upcoming-bike" style="width:100%;height:100%">
                        </div>
                    </div>
                    
                    <div class="col-lg-8 col-md-6 col-sm-7">
                        <div class="about-text" style="text-align: justify;">
                            <h2><?php echo $Product[0]['ProductName'];?></h2>
                        
                            <br>
                            <p><?php echo $Event[0]['Description'];?></p><br>
                          
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Area -->
    <?php if (sizeof($images)>1)     {?>
        <section class="gallery-area ptb-80">
            <div class="container">
               <!-- <div class="section-title">
                    <h2>Our <span>Gallery</span></h2>
                    <img src="assets/img/section-title-logo.png" alt="section-title-logo">
                </div>
                -->
                <div class="row m-0">
                
                  <?php
                   
                                    foreach($images as $galleryImage) {
                                ?>
                                
                    <div class="col-lg-4 col-md-6 p-0">
                        <div class="single-gallery">
                            <img src="assets/products/<?php echo $galleryImage['ImageName'];?>" alt="gallery">
                            <div class="picture-icon">
                                <a href="assets/products/<?php echo $galleryImage['ImageName'];?>" class="zoom-gallery"><i class="fa fa-picture-o"></i></a>
                            </div>
                        </div>
                    </div>
                   <?php } ?> 
                   
                </div>
            </div>
        </section>
    <?php } ?>
         
        
        
        
        
        
             
       <!-- Start Footer Area -->
    <?php include_once("footer.php");?>