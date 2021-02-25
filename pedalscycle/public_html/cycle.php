 <?php include_once("header.php");?>
        
		<!-- Start Page Title Area -->
		<div class="page-title">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="page-title-text">
                                    <h3>Cycles</h3>
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6">
                                <ul>
                                    <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li><i class="fa fa-angle-right"></i></li>
                                    <li class="active">Cycles</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		<!-- End Page Title Area -->
       
   
        
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
                                        <h3><a href="#"><?php echo $NewProducts[$i]['ProductName'];?> </a></h3>
                                       
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
                                        <h3><a href="#"><?php echo $NewProducts[$i]['ProductName'];?> </a></h3>
                                       
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
                                        <h3><a href="#"><?php echo $NewProducts[$i]['ProductName'];?> </a></h3>
                                       
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
                                        <h3><a href="#"><?php echo $NewProducts[$i]['ProductName'];?> </a></h3>
                                       
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
                                        <h3><a href="#"><?php echo $NewProducts[$i]['ProductName'];?> </a></h3>
                                       
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
                                        <h3><a href="#"><?php echo $NewProducts[$i]['ProductName'];?> </a></h3>
                                       
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
        <!-- End Featured Produts Area -->
    <?php include_once("footer.php"); ?>