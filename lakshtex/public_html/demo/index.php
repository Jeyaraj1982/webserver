<?php include_once("header.php");?>
<style>
img :hover{
    background:none !important;
}
</style>
  <!-- Slideshow  -->
  <div class="main-slider" id="home">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 jtv-slideshow">
          <div id="jtv-slideshow">
            <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container' >
              <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
                <ul>
                <?php $sliders=$mysql->select("select * from _tbl_sliders order by SliderOrder asc");?>
                <?php foreach($sliders as $slider){ ?>
                  <li data-transition='fade' data-slotamount='7' data-masterspeed='1000' data-thumb=''><img src='<?php echo "uploads/".$slider['SliderImage'];?>' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                    
                  </li>
                  <?php } ?>
                  <!--<li data-transition='fade' data-slotamount='7' data-masterspeed='1000' data-thumb=''><img src='assets/images/slider/slide-3.jpg' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                    <div class="caption-inner">
                      <div class='tp-caption LargeTitle sft  tp-resizeme' data-x='250'  data-y='110'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'>Template for your business</div>
                      <div class='tp-caption ExtraLargeTitle sft  tp-resizeme' data-x='200'  data-y='160'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap; color:#fff; text-shadow:none;'>Easy to modify</div>
                      <div class='tp-caption' data-x='310'  data-y='230'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap; color:#f8f8f8;'>Perfect website solution for your</div>
                      <div class='tp-caption sfb  tp-resizeme ' data-x='370'  data-y='280'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='#' class="buy-btn">Get Started</a> </div>
                    </div>
                  </li>
                  <li data-transition='fade' data-slotamount='7' data-masterspeed='1000' data-thumb=''><img src='assets/images/slider/slide-2.jpg' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                    <div class="caption-inner left">
                      <div class='tp-caption LargeTitle sft  tp-resizeme' data-x='350'  data-y='100'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'>It’s Time To Look</div>
                      <div class='tp-caption ExtraLargeTitle sft  tp-resizeme' data-x='350'  data-y='140'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>The New</div>
                      <div class='tp-caption ExtraLargeTitle sft  tp-resizeme' data-x='350'  data-y='185'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>Standard</div>
                      <div class='tp-caption' data-x='375'  data-y='245'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>The New Standard. under favorable smartwatches</div>
                      <div class='tp-caption sfb  tp-resizeme ' data-x='375'  data-y='290'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='#' class="buy-btn">Start Buying </a> </div>
                    </div>
                  </li> -->
                </ul>
                <div class="tp-bannertimer"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- service section -->
  <div class="jtv-service-area">
    <div class="container">
      <div class="row">
        <div class="col col-md-3 col-sm-6 col-xs-12" style="padding-left: 0px;">
          <div class="block-wrapper ship">
            <div class="text-des">
              <div class="icon-wrapper"><i class="fa fa-paper-plane"></i></div>
              <div class="service-wrapper">
                <h3>World-Wide Shipping</h3>
                <p>On order over $99</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col col-md-3 col-sm-6 col-xs-12 ">
          <div class="block-wrapper return">
            <div class="text-des">
              <div class="icon-wrapper"><i class="fa fa-rotate-right"></i></div>
              <div class="service-wrapper">
                <h3>100% secure payments</h3>
                <p>Credit/ Debit Card/ Banking </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col col-md-3 col-sm-6 col-xs-12">
          <div class="block-wrapper support">
            <div class="text-des">
              <div class="icon-wrapper"><i class="fa fa-umbrella"></i></div>
              <div class="service-wrapper">
                <h3>Support 24/7</h3>
                <p>Call us: ( +123 ) 456 789</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col col-md-3 col-sm-6 col-xs-12">
          <div class="block-wrapper user">
            <div class="text-des">
              <div class="icon-wrapper"><i class="fa fa-tags"></i></div>
              <div class="service-wrapper">
                <h3>Member Discount</h3>
                <p>25% on order over $199</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- All products-->
  
  <div class="container">
    <div class="home-tab">
      <div class="tab-title text-left">
        <h2>Best selling</h2>
        <ul class="nav home-nav-tabs home-product-tabs">
        <?php foreach($Categories as $Category){ ?>
          <li class="item"><a href="#Cat<?php echo $Category['CategoryID'];?>" data-toggle="tab" aria-expanded="false"><?php echo $Category['CategoryName'];?></a></li>
        <?php } ?>
        </ul>
      </div>
      <div id="productTabContent" class="tab-content">
      <?php
      $i=0;
      foreach($Categories as $Category){ ?>
        <div class="tab-pane <?php echo   ($i==0) ? 'active' : '';?>  in" id="Cat<?php echo $Category['CategoryID'];?>">
          <div class="featured-pro">
            <div class="slider-items-products">
              <div id="Cat<?php echo $Category['CategoryID'];?>-slider" class="product-flexslider hidden-buttons">
                <?php $Products = $mysql->select("select * from _tbl_products where CategoryID='".$Category['CategoryID']."' and IsActive='1'");?>
                <div class="slider-items slider-width-col4">
                <?php foreach($Products as $Product){ ?>
                  <div class="product-item">
                    <div class="item-inner">
                      <div class="product-thumbnail">
                      <?php if($Product['IsNew']=="1"){ ?>
                        <div class="icon-new-label new-left">New</div>
                      <?php } ?>
                        <div class="pr-img-area"> <a title="Product title here" href="viewproduct.php?id=<?php echo md5($Product['ProductID']);?>" style="text-align: center;padding:10px">
                           <img class="first-img" src="<?php echo "uploads/".$Product['ProductImage'];?>" alt="HTML template" style="height: 200px;width:auto;margin:0px auto;"> <!--<img class="hover-img" src="<?php echo "uploads/".$Product['ProductImage'];?>" alt="HTML template" style="height: 200px;width:auto;margin:0px auto;">-->
                          </a> </div>
                        <!--<div class="pr-info-area">
                          <div class="pr-button">
                            <div class="mt-button add_to_wishlist"><a href="wishlist.html"> <i class="fa fa-heart-o"></i> </a> </div>
                            <div class="mt-button add_to_compare"><a href="compare.html"> <i class="fa fa-link"></i> </a> </div>
                            <div class="mt-button quick-view"><a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                          </div>
                        </div> -->
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product title here" href="viewproduct.php?id=<?php echo md5($Product['ProductID']);?>"><?php echo $Product['ProductName'];?> </a> </div>
                          <div class="item-content">
                            <div class="rating" style="float: left;"><?php echo PrintStar($Product['Ratings']);?></div>
                            
                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price"> <span class="price"> &#8377; <?php echo number_format($Product['SellingPrice'],2);?> </span> </p><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="old-price"> <span class="price" style="color:#575757 !important"> &#8377; <?php echo number_format($Product['ProductPrice'],2);?> </span> </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p> <span class="price" style="color: green;"> 
                                        <?php 
                                             $Percentage = 100-(($Product['SellingPrice']*100)/($Product['ProductPrice']*1));
                                            echo ceil($Percentage)."% off";?> 
                                        </span> </p>
                                    </div>
                                </div>
                              </div>
                            </div>
                           <!-- <div class="pro-action">
                                <form action="" method="POST" id="frmid_<?php echo $Product['ProductID'];?>">
                                    <input type="hidden" name="ProductID" value="<?php echo $Product['ProductID'];?>">
                                    <button type="button" name="AddCart" class="add-to-cart" onclick="addtocart('<?php echo $Product['ProductID'];?>')"><span> Add to Cart </span> </button>
                                </form>
                            </div> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <?php $i++; } ?>
        
      </div>
    </div>
  </div>
  
  <div class="inner-box">
    <div class="container">
      <div class="row"> 
        <!-- Banner 
        <div class="col-md-3 top-banner hidden-sm">
          <div class="jtv-banner3">
            <div class="jtv-banner3-inner"><a href="#"><img src="assets/images/sub1.jpg" alt="HTML template"></a>
              <div class="hover_content">
                <div class="hover_data">
                  <div class="title"> Big Sale </div>
                  <div class="desc-text">Up to 55% off</div>
                  <span>Camera, Laptop & Mobile</span>
                  <p><a href="#" class="shop-now">Get it now!</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Best Sale -->
        <div class="col-sm-12 col-md-12 jtv-best-sale special-pro">
          <div class="jtv-best-sale-list">
            <div class="wpb_wrapper">                                                          
              <div class="best-title text-left">
                <h2>Special Offers</h2>
              </div>
            </div>
            <div class="slider-items-products">
              <div id="jtv-best-sale-slider" class="product-flexslider">
                <div class="slider-items">
                <?php $Products = $mysql->select("select * from _tbl_products where IsActive='1' order by ProductID DESC ");?>
                <?php foreach($Products as $Product){ ?> 
                  <div class="product-item">
                    <div class="item-inner">
                      <div class="product-thumbnail">
                        <?php if($Product['IsNew']=="1"){ ?>
                        <div class="icon-new-label new-left">New</div>
                      <?php } ?>
                        <div class="pr-img-area"> <a title="Product title here" href="viewproduct.php?id=<?php echo md5($Product['ProductID']);?>" style="text-align: center;padding:10px">
                           <img class="first-img" src="<?php echo "uploads/".$Product['ProductImage'];?>" alt="HTML template" style="height: 200px;width:auto;margin:0px auto;"><!-- <img class="hover-img" src="<?php echo "uploads/".$Product['ProductImage'];?>" alt="HTML template" style="height: 200px;width:auto;margin:0px auto;">-->
                          </a> </div>
                        <!--<div class="pr-info-area">
                          <div class="pr-button">
                            <div class="mt-button add_to_wishlist"><a href="wishlist.html"> <i class="fa fa-heart-o"></i> </a> </div>
                            <div class="mt-button add_to_compare"><a href="compare.html"> <i class="fa fa-link"></i> </a> </div>
                            <div class="mt-button quick-view"><a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                          </div>
                        </div> -->
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product title here" href="viewproduct.php?id=<?php echo md5($Product['ProductID']);?>"><?php echo $Product['ProductName'];?> </a> </div>
                          <div class="item-content">
                            <div class="rating" style="float: left;"><?php echo PrintStar($Product['Ratings']);?></div>
                            <div style="text-align:right">
                            <?php $whishlist = $mysql->select("select * from _tbl_whishlist where CustomerID='".$_SESSION['User']['CustomerID']."' and WhislistedProductID='".$Product['ProductID']."'");?>
                            <?php if(sizeof($whishlist)==0){ ?>
                                <span id="wishlist<?php echo $Product['ProductID'];?>"><a  style="cursor:pointer" onclick="addtowishlistindex('<?php echo $Product['ProductID'];?>')"><i class="fa fa-heart-o"></i></span>
                            <?php } else { ?>
                                <span id="wishlist<?php echo $Product['ProductID'];?>"><a  style="cursor:pointer" onclick="removewishlistindex('<?php echo $Product['ProductID'];?>')"><i class="fa fa-heart" style="color:#e83f33;vertical-align: 0px !important;"></i></a></span>
                            <?php } ?>   
                            </div>                                                                                                
                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price"> <span class="price"> &#8377; <?php echo number_format($Product['SellingPrice'],2);?> </span> </p><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="old-price"> <span class="price" style="color:#575757 !important"> &#8377; <?php echo number_format($Product['ProductPrice'],2);?> </span> </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p> <span class="price" style="color: green;"> 
                                        <?php 
                                             $Percentage = 100-(($Product['SellingPrice']*100)/($Product['ProductPrice']*1));
                                            echo ceil($Percentage)."% off";?> 
                                        </span> </p>
                                    </div>
                                </div>
                              </div>
                            </div>
                           <!-- <div class="pro-action">
                                <form action="" method="POST" id="frmid_<?php echo $Product['ProductID'];?>">
                                    <input type="hidden" name="ProductID" value="<?php echo $Product['ProductID'];?>">
                                    <button type="button" name="AddCart" class="add-to-cart" onclick="addtocart('<?php echo $Product['ProductID'];?>')"><span> Add to Cart </span> </button>
                                </form>
                            </div> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  <!-- Blog -->
  
  <div class="featured-products" style="display: none;">
    <div class="container">
      <div class="row"> 
        
        <!-- Best Sale -->
        <div class="col-sm-12 col-md-4 jtv-best-sale">
          <div class="jtv-best-sale-list">
            <div class="wpb_wrapper">
              <div class="best-title text-left">
                <h2>Top Rate</h2>
              </div>
            </div>
            <div class="slider-items-products">
              <div id="toprate-products-slider" class="product-flexslider">
                <div class="slider-items">
                  <ul class="products-grid">
                    <li class="item">
                      <div class="item-inner">
                        <div class="item-img"> <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="HTML template" src="assets/images/products/product-16.jpg"> </a> </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Product title here" href="viewproduct.php?id=<?php echo md5($Product['ProductID']);?>">Product title here </a> </div>
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span> </div>
                            </div>
                            <div class="pro-action">
                              <button type="button" class="add-to-cart"><i class="fa fa-shopping-cart"></i></button>
                            </div>
                            <div class="pr-button-hover">
                              <div class="mt-button add_to_wishlist"><a href="wishlist.html"> <i class="fa fa-heart-o"></i> </a> </div>
                              <div class="mt-button add_to_compare"><a href="compare.html"> <i class="fa fa-link"></i> </a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="item">
                      <div class="item-inner">
                        <div class="item-img"> <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="HTML template" src="assets/images/products/product-19.jpg"> </a> </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Product title here" href="single_product.html">Product title here </a> </div>
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$99.99</span> </span> </div>
                            </div>
                            <div class="pro-action">
                              <button type="button" class="add-to-cart"><i class="fa fa-shopping-cart"></i></button>
                            </div>
                            <div class="pr-button-hover">
                              <div class="mt-button add_to_wishlist"><a href="wishlist.html"> <i class="fa fa-heart-o"></i> </a> </div>
                              <div class="mt-button add_to_compare"><a href="compare.html"> <i class="fa fa-link"></i> </a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <ul class="products-grid">
                    <li class="item">
                      <div class="item-inner">
                        <div class="item-img"> <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="HTML template" src="assets/images/products/product-14.jpg"> </a> </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Product title here" href="single_product.html">Product title here </a> </div>
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span> </div>
                            </div>
                            <div class="pro-action">
                              <button type="button" class="add-to-cart"><i class="fa fa-shopping-cart"></i></button>
                            </div>
                            <div class="pr-button-hover">
                              <div class="mt-button add_to_wishlist"><a href="wishlist.html"> <i class="fa fa-heart-o"></i> </a> </div>
                              <div class="mt-button add_to_compare"><a href="compare.html"> <i class="fa fa-link"></i> </a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="item">
                      <div class="item-inner">
                        <div class="item-img"> <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="HTML template" src="assets/images/products/product-12.jpg"> </a> </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Product title here" href="single_product.html">Product title here </a> </div>
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$99.99</span> </span> </div>
                            </div>
                            <div class="pro-action">
                              <button type="button" class="add-to-cart"><i class="fa fa-shopping-cart"></i></button>
                            </div>
                            <div class="pr-button-hover">
                              <div class="mt-button add_to_wishlist"><a href="wishlist.html"> <i class="fa fa-heart-o"></i> </a> </div>
                              <div class="mt-button add_to_compare"><a href="compare.html"> <i class="fa fa-link"></i> </a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <ul class="products-grid">
                    <li class="item">
                      <div class="item-inner">
                        <div class="item-img"> <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="HTML template" src="assets/images/products/product-12.jpg"> </a> </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Product title here" href="single_product.html">Product title here </a> </div>
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span> </div>
                            </div>
                            <div class="pro-action">
                              <button type="button" class="add-to-cart"><i class="fa fa-shopping-cart"></i></button>
                            </div>
                            <div class="pr-button-hover">
                              <div class="mt-button add_to_wishlist"><a href="wishlist.html"> <i class="fa fa-heart-o"></i> </a> </div>
                              <div class="mt-button add_to_compare"><a href="compare.html"> <i class="fa fa-link"></i> </a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="item">
                      <div class="item-inner">
                        <div class="item-img"> <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="HTML template" src="assets/images/products/product-6.jpg"> </a> </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Product title here" href="single_product.html">Product title here </a> </div>
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $456.00 </span> </p>
                                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $567.00 </span> </p>
                              </div>
                            </div>
                            <div class="pro-action">
                              <button type="button" class="add-to-cart"><i class="fa fa-shopping-cart"></i></button>
                            </div>
                            <div class="pr-button-hover">
                              <div class="mt-button add_to_wishlist"><a href="wishlist.html"> <i class="fa fa-heart-o"></i> </a> </div>
                              <div class="mt-button add_to_compare"><a href="compare.html"> <i class="fa fa-link"></i> </a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Banner -->
        <div class="col-md-4 top-banner hidden-sm">
          <div class="jtv-banner3">
            <div class="jtv-banner3-inner"><a href="#"><img src="assets/images/sub1a.jpg" alt="HTML template"></a>
              <div class="hover_content">
                <div class="hover_data bottom">
                  <div class="desc-text">Top Brands at discount prices </div>
                  <div class="title">Electronisc Sale</div>
                  <span>Smartphone & Cell phone</span>
                  <p><a href="#" class="shop-now">Get it now!</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 jtv-best-sale">
          <div class="jtv-best-sale-list">
            <div class="wpb_wrapper">
              <div class="best-title text-left">
                <h2>New products</h2>
              </div>
            </div>
            <div class="slider-items-products">
              <div id="new-products-slider" class="product-flexslider">
                <div class="slider-items">
                  <ul class="products-grid">
                    <li class="item">
                      <div class="item-inner">
                        <div class="item-img"> <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="HTML template" src="assets/images/products/product-9.jpg"> </a> </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Product title here" href="single_product.html">Product title here </a> </div>
                            <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span> </div>
                            </div>
                            <div class="pro-action">
                              <button type="button" class="add-to-cart"><i class="fa fa-shopping-cart"></i></button>
                            </div>
                            <div class="pr-button-hover">
                              <div class="mt-button add_to_wishlist"><a href="wishlist.html"> <i class="fa fa-heart-o"></i> </a> </div>
                              <div class="mt-button add_to_compare"><a href="compare.html"> <i class="fa fa-link"></i> </a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="item">
                      <div class="item-inner">
                        <div class="item-img"> <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="HTML template" src="assets/images/products/product-2.jpg"> </a> </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Product title here" href="single_product.html">Product title here </a> </div>
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $456.00 </span> </p>
                                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $567.00 </span> </p>
                              </div>
                            </div>
                            <div class="pro-action">
                              <button type="button" class="add-to-cart"><i class="fa fa-shopping-cart"></i></button>
                            </div>
                            <div class="pr-button-hover">
                              <div class="mt-button add_to_wishlist"><a href="wishlist.html"> <i class="fa fa-heart-o"></i> </a> </div>
                              <div class="mt-button add_to_compare"><a href="compare.html"> <i class="fa fa-link"></i> </a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <ul class="products-grid">
                    <li class="item">
                      <div class="item-inner">
                        <div class="item-img"> <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="HTML template" src="assets/images/products/product-18.jpg"> </a> </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Product title here" href="single_product.html">Product title here </a> </div>
                            <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span> </div>
                            </div>
                            <div class="pro-action">
                              <button type="button" class="add-to-cart"><i class="fa fa-shopping-cart"></i></button>
                            </div>
                            <div class="pr-button-hover">
                              <div class="mt-button add_to_wishlist"><a href="wishlist.html"> <i class="fa fa-heart-o"></i> </a> </div>
                              <div class="mt-button add_to_compare"><a href="compare.html"> <i class="fa fa-link"></i> </a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="item">
                      <div class="item-inner">
                        <div class="item-img"> <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="HTML template" src="assets/images/products/product-11.jpg"> </a> </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Product title here" href="single_product.html">Product title here </a> </div>
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $456.00 </span> </p>
                                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $567.00 </span> </p>
                              </div>
                            </div>
                            <div class="pro-action">
                              <button type="button" class="add-to-cart"><i class="fa fa-shopping-cart"></i></button>
                            </div>
                            <div class="pr-button-hover">
                              <div class="mt-button add_to_wishlist"><a href="wishlist.html"> <i class="fa fa-heart-o"></i> </a> </div>
                              <div class="mt-button add_to_compare"><a href="compare.html"> <i class="fa fa-link"></i> </a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <ul class="products-grid">
                    <li class="item">
                      <div class="item-inner">
                        <div class="item-img"> <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="HTML template" src="assets/images/products/product-6.jpg"> </a> </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Product title here" href="single_product.html">Product title here </a> </div>
                            <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span> </div>
                            </div>
                            <div class="pro-action">
                              <button type="button" class="add-to-cart"><i class="fa fa-shopping-cart"></i></button>
                            </div>
                            <div class="pr-button-hover">
                              <div class="mt-button add_to_wishlist"><a href="wishlist.html"> <i class="fa fa-heart-o"></i> </a> </div>
                              <div class="mt-button add_to_compare"><a href="compare.html"> <i class="fa fa-link"></i> </a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="item">
                      <div class="item-inner">
                        <div class="item-img"> <a class="product-image" title="Retis lapen casen" href="product_detail.html"> <img alt="HTML template" src="assets/images/products/product-9.jpg"> </a> </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="Product title here" href="single_product.html">Product title here </a> </div>
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $456.00 </span> </p>
                                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $567.00 </span> </p>
                              </div>
                            </div>
                            <div class="pro-action">
                              <button type="button" class="add-to-cart"><i class="fa fa-shopping-cart"></i></button>
                            </div>
                            <div class="pr-button-hover">
                              <div class="mt-button add_to_wishlist"><a href="wishlist.html"> <i class="fa fa-heart-o"></i> </a> </div>
                              <div class="mt-button add_to_compare"><a href="compare.html"> <i class="fa fa-link"></i> </a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 <?php include_once("footer.php");?>
<script>

  jQuery(document).ready(function() {
      "use strict";
  <?php foreach($Categories as $Category){    ?>
    jQuery("#Cat<?php echo $Category['CategoryID'];?>-slider .slider-items").owlCarousel({
            items: 4,
            itemsDesktop: [1024, 4],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [640, 2],
            itemsMobile: [390, 1],
            navigation: !0,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1,
            autoPlay: false
        })   
   <?php } ?> 
  });
  
  </script>
  <script>
$(document).ready(function () {
  $('.home-product-tabs').find('.item').first().addClass('active');
  
}); 


</script>
