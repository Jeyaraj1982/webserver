<?php include_once("header.php"); ?>
<?php $whishlists = $mysql->select("select * from _tbl_whishlist where CustomerID='".$_SESSION['User']['CustomerID']."'");?>
<div class="inner-box">
    <div class="container">
      <div class="row"> 
        <div class="col-sm-12 col-md-12 jtv-best-sale special-pro">
          <div class="jtv-best-sale-list">
            <div class="wpb_wrapper">
              <div class="best-title text-left">
                <br><h2>My Whishlist</h2>
              </div>
            </div>
            <?php if(sizeof($whishlists)==0){ ?>
                <div style="text-align: center;">
                <div class="cart-icon" style="text-align: center;width:100%"><i class="icon-basket-loaded icons" style="font-size: 200px"></i></div>    <br>
                    No Whislists Found<br>
                <div class="cart_navigation"> <a class="continue-btn" href="index.php"> Continue shopping&nbsp; <i class="fa fa-arrow-right"> </i></a></div><br><br>
                </div>
                <?php }else{ ?>
            <div class="slider-items-products">
              <div id="jtv-best-sale-slider" class="product-flexslider">
                <div class="slider-items">
                <?php foreach($whishlists as $whishlist){ ?> 
				<?php $Product = $mysql->select("select * from _tbl_products where ProductID='".$whishlist['WhislistedProductID']."'");?>
				<div class="product-item">
                    <div class="item-inner">
                      <div class="product-thumbnail">
                       <?php if($Product[0]['IsNew']=="1"){ ?>
                        <div class="icon-new-label new-left">New</div>
                        <?php } ?>
                        <div class="pr-img-area"> <a title="Product title here" href="viewproduct.php?id=<?php echo md5($Product[0]['ProductID']);?>" style="text-align: center;padding:10px">
                           <img class="first-img" src="<?php echo "uploads/".$Product[0]['ProductImage'];?>" alt="HTML template" style="height: 200px;width:auto;margin:0px auto;"> <!--<img class="hover-img" src="<?php echo "uploads/".$Product[0]['ProductImage'];?>" alt="HTML template" style="height: 200px;width:auto;margin:0px auto;">-->
                          </a> 
						</div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"> <a title="Product title here" href="viewproduct.php?id=<?php echo md5($Product[0]['ProductID']);?>"><?php echo $Product[0]['ProductName'];?> </a> </div>
                          <div class="item-content">
                            <div class="rating" style="float:left;"><?php echo PrintStar($Product[0]['Ratings']);?></div>
                            <div style="text-align:right">
                                <span id="wishlist"><a style="cursor:pointer" onclick="removewishlist('<?php echo $Product[0]['ProductID'];?>')"><i class="fa fa-heart" style="color: red;"></i></a></span>
                            </div> 
                            <div class="item-price">
                              <div class="price-box">
                                <p class="special-price"> <span class="price"> &#8377; <?php echo number_format($Product[0]['SellingPrice'],2);?> </span> </p><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="old-price"> <span class="price" style="color:#575757 !important"> &#8377; <?php echo number_format($Product[0]['ProductPrice'],2);?> </span> </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p> <span class="price" style="color: green;"> 
                                        <?php 
                                             $Percentage = 100-(($Product[0]['SellingPrice']*100)/($Product[0]['ProductPrice']*1));
                                            echo ceil($Percentage)."% off";?> 
                                        </span> </p>
                                    </div>
                                </div> 
                              </div>
                            </div>
                           </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php }  ?>
                </div>
              </div>
            </div> 
            <?php } ?>                                                                   
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once("footer.php"); ?>