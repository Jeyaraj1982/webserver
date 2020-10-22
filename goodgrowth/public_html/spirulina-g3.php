<?php  include("file/header.php");?>

    

    
	<!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/5.jpg);">
    	<div class="auto-container">
        	<div class="inner-box">
                <h1>Quick Wash</h1>
                <ul class="bread-crumb">
                	<li><a href="index.php">Home</a></li>
                    <li>Quick Wash</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    
    <!--Team Section-->
   <div class="sidebar-page-container ">
    	<div class="auto-container">
        	<div class="row clearfix">
            	
                <!--Content Side / Shop Single-->
                <div class="content-side col-lg-9 col-md-8 col-sm-12 col-xs-12">
                	<div class="shop-page">
                    
                    	<!--Product Details Section-->
                        <section class="product-details">
                            <!--Basic Details-->
                            <div class="basic-details">
                                <div class="row clearfix">
                                
                                    <div class="image-column col-md-5 col-sm-6 col-xs-12">
                                        <img class="img-detail" src="images/products/spirulinaG3.jpg" alt="">
                                    </div>
                                    
                                    <!--Info Column-->
                                    <div class="info-column col-md-7 col-sm-6 col-xs-12">
                                    	<div class="details-header">
                                            <h4>SPIRULINA G3</h4>
                                            <div class="rating"><span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> <span class="fa fa-star-half-empty"></span> <span class="light fa fa-star"></span></div>
                                            <!--reviews-->
                                            <div class="reviews">
                                                <a href="#">4.5</a> <span class="separater">|</span> <a href="#">32 Reviews</a>
                                            </div>
                                          
                                        </div>

                                        <ol>
											
											<li>100 Tablets </li>
											<li>100% Organic </li>
											<li>Antibiotic   </li>
											<li>Antioxidants</li>
											<li>No Artifical colors flavours or preservatives</li>
											
                                        </ol>

                                        <div class="other-options">
                                        	
                                            
                                            <!--Btns Box-->
                                            <div class="btns-box">
                                            	<form action="" method="POST">
                                                <input type="hidden" name="ProName" value="Spirulina G3">
                                                <input type="hidden" name="ProPrice" value="600.00">
                                                <!--<a href="order.php"><button type="button" class="theme-btn btn-style-one add-to-cart">Order Now</button></a>-->
                                                 <button type="submit" name="AddCart"  class="theme-btn btn-style-one add-to-cart">Add Cart</button> 
                                                 <button type="submit" name="BuyNow" class="theme-btn btn-style-one add-to-cart">Buy Now</button> 
                                            </form> 
                                                
                                            	
                                            </div>
                                        </div>
									</div>
                                    
                                </div>
                            </div>
                            
                            
                        </section>
                    </div>
                </div>
    			<!--End Content Side-->
                
                <!--Sidebar Side-->
                <?php include ("file/category.php");?>
            </div>
        </div>
    </div>
 

    
   <?php  include("file/footer.php");?>
