<?php include_once("header.php");?>
		
		 
		<div class="page-title">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="page-title-text">
                                    <h3>Our Gallery</h3>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6">
                                <ul>
                                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li><i class="fa fa-angle-right"></i></li>
                                    <li class="active">Our Gallery</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<!-- End Page Title Area -->
        
        <!-- Start Gallery Area -->
        <section class="gallery-area ptb-80">
            <div class="container">
                <div class="section-title">
                    <h2>Our <span>Gallery</span></h2>
                    <img src="assets/img/section-title-logo.png" alt="section-title-logo">
                </div>
                <div class="row m-0">
                
                  <?php
                                    $galleryImages = $mysql->select("select * from _tbl_gallery_images where IsActive='1' order by GalleryID");
                                    foreach($galleryImages as $galleryImage) {
                                ?>
                                
                    <div class="col-lg-4 col-md-6 p-0">
                        <div class="single-gallery">
                            <img src="assets/gallery/<?php echo $galleryImage['GalleryImage'];?>" alt="gallery">
                            <div class="picture-icon">
                                <a href="assets/gallery/<?php echo $galleryImage['GalleryImage'];?>" class="zoom-gallery"><i class="fa fa-picture-o"></i></a>
                            </div>
                        </div>
                    </div>
                   <?php } ?> 
                   
                </div>
            </div>
        </section>
        
         
        <!-- End Gallery Area -->
    <?php include_once("footer.php");?>