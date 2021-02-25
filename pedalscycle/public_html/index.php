<?php include_once("header.php");?>
        
        
		<!-- Start Home Slides Area -->
		<div class="home-slides">
              <?php $sliders = $mysql->select("select * from _tbl_sliders where IsActive='1'");?>
                <?php foreach($sliders as $slider){ ?>
        
		    <div class="main-banner item-bg-one" style="background-image:url('assets/sliders/<?php echo $slider['SliderImage'];?>')">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="main-banner-text">
                                        <h1 style="color: #d81416;"><?php echo $slider['SliderTitle'];?><span></span></h1>
                                        <a href="<?php echo $slider['ButtonLink'];?>" class="btn btn-primary"><?php echo $slider['ButtonName'];?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         <?php } ?>
            
            
            
		</div>
		<!-- End Home Slides Area -->
        <div class="space"></div>

        <!-- Start Upcoming Bike -->
        <?php   $NewProducts = $mysql->select("select * from _tbl_events where   IsPublish='1'"); ?>
        <section class="upcoming-bikes-area">
            <div class="row m-0">
                <div class="col-lg-3 col-md-5 col-sm-5 p-0">
                    <div class="upcoming-bike-text">
                        <h2><?php echo sizeof($NewProducts);?>+</h2>
                        <h3>Upcoming Cycles</h3>
                    </div>
                </div>

                <div class="col-lg-9 col-md-7 col-sm-7 p-0">
                    <div class="row m-0">
                        <div class="upcoming-bike-slider">
                           <?php
                           
                              for($i=0;$i<sizeof($NewProducts);$i++) {
                          ?>                                                                       
                          <?php
                                    $images = $mysql->select("select * from _tbl_events_images where IsDelete='0' and EventID='".$NewProducts[$i]['EventID']."' order by ImageOrder");
                                    ?>
                                        
                            <div class="single-upcoming-bike">
                                <div class="upcoming-bike-image">
                                    <img src="assets/events/<?php echo $images[0]['ImageName'];?>" alt="upcoming-bike">
                                </div>

                                <div class="upcoming-bike-content">
                                   <!-- <p>January 03, 2020</p>-->
                                    <h3><a href="news.php?event=<?php echo md5($NewProducts[$i]['EventID']);?>"><?php echo $NewProducts[$i]['EventTitle'];?></a></h3>
                                    <a href="news.php?event=<?php echo md5($NewProducts[$i]['EventID']);?>" class="pull-right"><i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>

                            <?php } ?>

                            
                            
                            

                            

                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Upcoming Bike -->
        
        <!-- Start About Area -->
        <section class="about-area ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-5">
                        <div class="section-title half-background">
                            <iframe width="350" height="240" src="https://www.youtube.com/embed/gPjPAIsP0Ok" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    
                    <div class="col-lg-8 col-md-6 col-sm-7">
                        <div class="about-text" style="text-align: justify;">
                            <p>Welcome to PEDALS Cycle Gallery. We are a bicycle company that builds innovative, world-class brands, and distributes bicycle products from the best vendors in the industry to over 5,000 bike shops. We put purpose before profit and strive to be an extraordinary business to partner with and to work for. We aspire to make the world a better place, and get more butts on bikes, and we’ve made good on that goal for over 30 years. We at Nagercoil showcases vast selection of bicycles for young girls and boys as well as men and women. The collection differs in size, colour, price and type. Some of the popular types of bicycles that one can make a choice from are road bicycles, track bicycles, racing bicycles and flat bar bicycles. The footfall the place enjoys stems from the unmatched customer service that is delivered by the devoted staff that have been appointed here. Customers too are able to make an informed purchase as the sales executives here do a terrific job when laying out the details of the models.</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="features-box bg-1">
                            <div class="content">
                                <i class="fa fa-bicycle"></i>
                                <h3>All Brands</h3>
                                <p>All Popular brands are available here. </p>
                            </div>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="features-box bg-2">
                            <div class="content">
                                <i class="fa fa-life-ring"></i>
                                <h3>Support</h3>
                                <p>We provide best support for our customers.</p>
                            </div>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="features-box bg-3">
                            <div class="content">
                                <i class="fa fa-user"></i>
                                <h3>Quality</h3>
                                <p>We mainly focus on Quality products.</p>
                            </div>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="features-box bg-4">
                            <div class="content">
                                <i class="fa fa-bullseye"></i>
                                <h3>Affordable</h3>
                                <p>Each and Every products are at Affordable price.</p>
                            </div>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Area -->
        
        
        <!-- Start New Produts Area -->
        <section class="new-products-area ptb-80">
            <div class="container">
                <div class="section-title">
                    <h2><span>New</span> Products</h2>
                    <img src="assets/img/section-title-logo.png" alt="section-title-logo">
                </div>
                <div class="row">
                    <div class="bike-slider">
                          <?php
                              $NewProducts = $mysql->select("select * from _tbl_products where IsNew='1' and IsPublish='1'");
                              for($i=0;$i<sizeof($NewProducts);$i++) {
                          ?>
                          <div class="item">
                            <div class="col-lg-12">
                                <div class="single-product">
                                    <div class="product-image">
                                    <?php
                                    $images = $mysql->select("select * from _tbl_products_images where IsDelete='0' and ProductID='".$NewProducts[$i]['ProductID']."' order by ImageOrder");
                                    ?>
                                        <img src="assets/products/<?php echo $images[0]['ImageName'];?>" alt="new-product">
                                        <div class="hover-box">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Quick View</button>
                                           <!-- <a href="#" class="btn btn-primary">Add to Cart</a>-->
                                        </div>
                                    </div>

                                    <div class="product-content">
                                        <h3><a href="cycleinfo.php?product=<?php echo md5($NewProducts[$i]['ProductID']);?>"><?php echo $NewProducts[$i]['ProductName'];?> </a></h3>
                                       
                                        <ul>
                                            <?php for($j=1;$j<=$NewProducts[$i]['ProductRating'];$j++) {?>
                                            <li><i class="fa fa-star"></i></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    
                                    <div class="sale">
                                        sale
                                    </div>
                                </div>
                            </div>
                                <?php $i++; ?>
                            <div class="col-lg-12">
                                <div class="single-product">
                                    <div class="product-image">  <?php
                                    $images = $mysql->select("select * from _tbl_products_images where IsDelete='0' and ProductID='".$NewProducts[$i]['ProductID']."' order by ImageOrder");
                                    ?>
                                        <img src="assets/products/<?php echo $images[0]['ImageName'];?>" alt="new-product">
                                        <div class="hover-box">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Quick View</button>
                                           <!-- <a href="#" class="btn btn-primary">Add to Cart</a>-->
                                        </div>
                                    </div>

                                    <div class="product-content">
                                        <h3><a  href="cycleinfo.php?product=<?php echo md5($NewProducts[$i]['ProductID']);?>"><?php echo $NewProducts[$i]['ProductName'];?> </a></h3>
                                       
                                        <ul>
                                        <?php for($j=1;$j<=$NewProducts[$i]['ProductRating'];$j++) {?>
                                            <li><i class="fa fa-star"></i></li>
                                            <?php } ?>
                                          <!--  <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li> -->
                                        </ul>
                                    </div>
                                    
                                    <div class="sale">
                                        sale
                                    </div>
                                </div>
                            </div>
                                </div>
                            <?php  } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End New Produts Area -->
        
        
        <!-- Start Popular Produts Area -->
        <section class="popular-products-area ptb-80">
            <div class="container">
                <div class="section-title">
                    <h2><span>Popular</span> Products</h2>
                    <img src="assets/img/section-title-logo.png" alt="section-title-logo">
                </div>
                <div class="row">
                    <div class="bike-slider">
                         <?php
                              $NewProducts = $mysql->select("select * from _tbl_products where IsPopular='1' and IsPublish='1'");
                              for($i=0;$i<sizeof($NewProducts);$i++) {
                          ?>
                          <div class="item">
                            <div class="col-lg-12">
                                <div class="single-product">
                                    <div class="product-image">
                                    <?php
                                    $images = $mysql->select("select * from _tbl_products_images where IsDelete='0' and ProductID='".$NewProducts[$i]['ProductID']."' order by ImageOrder");
                                    ?>
                                        <img src="assets/products/<?php echo $images[0]['ImageName'];?>" alt="new-product">
                                        <div class="hover-box">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Quick View</button>
                                           <!-- <a href="#" class="btn btn-primary">Add to Cart</a>-->
                                        </div>
                                    </div>

                                    <div class="product-content">
                                        <h3><a h href="cycleinfo.php?product=<?php echo md5($NewProducts[$i]['ProductID']);?>"><?php echo $NewProducts[$i]['ProductName'];?> </a></h3>
                                       
                                        <ul>
                                            <?php for($j=1;$j<=$NewProducts[$i]['ProductRating'];$j++) {?>
                                            <li><i class="fa fa-star"></i></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    
                                    <div class="sale">
                                        sale
                                    </div>
                                </div>
                            </div>
                                <?php $i++; ?>
                            <div class="col-lg-12">
                                <div class="single-product">
                                    <div class="product-image">  <?php
                                    $images = $mysql->select("select * from _tbl_products_images where IsDelete='0' and ProductID='".$NewProducts[$i]['ProductID']."' order by ImageOrder");
                                    ?>
                                        <img src="assets/products/<?php echo $images[0]['ImageName'];?>" alt="new-product">
                                        <div class="hover-box">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Quick View</button>
                                           <!-- <a href="#" class="btn btn-primary">Add to Cart</a>-->
                                        </div>
                                    </div>

                                    <div class="product-content">
                                        <h3><a  href="cycleinfo.php?product=<?php echo md5($NewProducts[$i]['ProductID']);?>"><?php echo $NewProducts[$i]['ProductName'];?> </a></h3>
                                       
                                        <ul>
                                        <?php for($j=1;$j<=$NewProducts[$i]['ProductRating'];$j++) {?>
                                            <li><i class="fa fa-star"></i></li>
                                            <?php } ?>
                                          <!--  <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li> -->
                                        </ul>
                                    </div>
                                    
                                    <div class="sale">
                                        sale
                                    </div>
                                </div>
                            </div>
                                </div>
                            <?php  } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Popular Produts Area -->
        
        
        <!-- Start Featured Produts Area -->
        <section class="featured-products-area ptb-80">
            <div class="container">
                <div class="section-title">
                    <h2><span>Featured</span> Products</h2>
                    <img src="assets/img/section-title-logo.png" alt="section-title-logo">
                </div>
                <div class="row">
                    <div class="bike-slider">
                       <?php
                              $NewProducts = $mysql->select("select * from _tbl_products where IsFeatured='1' and IsPublish='1'");
                              for($i=0;$i<sizeof($NewProducts);$i++) {
                          ?>
                          <div class="item">
                            <div class="col-lg-12">
                                <div class="single-product">
                                    <div class="product-image">
                                    <?php
                                    $images = $mysql->select("select * from _tbl_products_images where IsDelete='0' and ProductID='".$NewProducts[$i]['ProductID']."' order by ImageOrder");
                                    ?>
                                        <img src="assets/products/<?php echo $images[0]['ImageName'];?>" alt="new-product">
                                        <div class="hover-box">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Quick View</button>
                                           <!-- <a href="#" class="btn btn-primary">Add to Cart</a>-->
                                        </div>
                                    </div>

                                    <div class="product-content">
                                        <h3><a  href="cycleinfo.php?product=<?php echo md5($NewProducts[$i]['ProductID']);?>"><?php echo $NewProducts[$i]['ProductName'];?> </a></h3>
                                       
                                        <ul>
                                            <?php for($j=1;$j<=$NewProducts[$i]['ProductRating'];$j++) {?>
                                            <li><i class="fa fa-star"></i></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    
                                    <div class="sale">
                                        sale
                                    </div>
                                </div>
                            </div>
                                <?php $i++; ?>
                            <div class="col-lg-12">
                                <div class="single-product">
                                    <div class="product-image">  <?php
                                    $images = $mysql->select("select * from _tbl_products_images where IsDelete='0' and ProductID='".$NewProducts[$i]['ProductID']."' order by ImageOrder");
                                    ?>
                                        <img src="assets/products/<?php echo $images[0]['ImageName'];?>" alt="new-product">
                                        <div class="hover-box">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Quick View</button>
                                           <!-- <a href="#" class="btn btn-primary">Add to Cart</a>-->
                                        </div>
                                    </div>

                                    <div class="product-content">
                                        <h3><a  href="cycleinfo.php?product=<?php echo md5($NewProducts[$i]['ProductID']);?>"><?php echo $NewProducts[$i]['ProductName'];?> </a></h3>
                                       
                                        <ul>
                                        <?php for($j=1;$j<=$NewProducts[$i]['ProductRating'];$j++) {?>
                                            <li><i class="fa fa-star"></i></li>
                                            <?php } ?>
                                          <!--  <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li> -->
                                        </ul>
                                    </div>
                                    
                                    <div class="sale">
                                        sale
                                    </div>
                                </div>
                            </div>
                                </div>
                            <?php  } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Featured Produts Area -->
        
        
        <!-- Start Fun Fcats Area-->
        <section class="fun-facts-area ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="fun-facts">
                            <i class="fa fa-calendar"></i>
                            <h2 class="count">10</h2>
                            <span>Different partners</span>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="fun-facts">
                            <i class="fa fa-bicycle"></i>
                            <h2 class="count">200</h2>
                            <span>Cycles For Sale</span>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="fun-facts">
                            <i class="fa fa-users"></i>
                            <h2 class="count">500</h2>
                            <span>Satisfied Customers</span>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="fun-facts">
                            <i class="fa fa-user"></i>
                            <h2 class="count">4</h2>
                            <span>Qualified Staff</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		
		        <div class="space"></div>


        <!-- End Fun Fcats Area-->       
         
		
		
        <!-- Start Testimonials Area-->
        <section class="testimonials-area ptb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="testimonials">
                            <h3 class="title">What clients say</h3>
                            <div class="testimonials-slider">
                            
                               <?php
                                   $customerReviews = $mysql->select("select * from _tbl_customer_reviews where IsActive='1'");
                                   foreach($customerReviews as $Review) {
                               ?>
                                <div class="single-feedback">
                                    <div class="client-pic">
                                        <img src="assets/customerreview/<?php echo $Review['CustomerThumb'];?>" alt="client-avatar" style="height:100px;width:100px;">
                                        
                                    </div>
                                     <div class="reviews-item-rating" style="color:#ffaa00;margin-top:10px;">
                                                        <?php for($i=1;$i<=$Review['CustomerRating'];$i++) {?>
                                                            <i class="fa fa-star"></i>
                                                        <?php } ?>
                                                    </div>
                                    <h4><?php echo $Review['CustomerName'];?></h4>
                               
                                    <p><?php echo $Review['CustomerSubject'];?></p>
                                </div>
                                
                            <?php } ?>      
                                
                                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Testimonials Area-->		
            
        <div style="padding: 20px"></div>

<?php include_once("footer.php");?>