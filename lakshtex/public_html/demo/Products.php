<?php include_once("header.php");?>
<?php
   $Products = $mysql->select("select * from _tbl_products where CategoryID='".$_GET['cid']."' and SubCategoryID='".$_GET['sid']."' and IsActive='1'");
   $Category = $mysql->select("select * from _tbl_category where CategoryID='".$Products[0]['CategoryID']."'"); 
   $SubCategory = $mysql->select("select * from _tbl_sub_category where SubCategoryID='".$Products[0]['SubCategoryID']."'"); 
?>
<?php if(sizeof($Products)==0){ ?>
    <div class="jtv-service-area">
    <div class="container">
      <div class="row">
        <div class="col col-md-12 col-sm-12 col-xs-12" style="padding-left: 0px;text-align: center;">
          <div class="block-wrapper ship">
            <div class="text-des">
              <div class="service-wrapper" style="text-align: center;">
                <h3>Products Not Available</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><br><br><br><br><br><br>
<?php } else { ?>
 <div class="inner-box">
    <div class="container">
      <div class="row"> 
        <div class="col-sm-12 col-md-12 jtv-best-sale special-pro">
          <div class="jtv-best-sale-list">
            <div class="wpb_wrapper">
              <div class="best-title text-left">
                <br><h2><?php echo $Category[0]['CategoryName'];?>&nbsp;&nbsp;<span>&raquo;</span>&nbsp;&nbsp;<span style="font-weight: normal"><?php echo $SubCategory[0]['SubCategoryName'];?></span></h2>
              </div>
            </div>
            <div class="slider-items-products">
              <div id="jtv-best-sale-slider" class="product-flexslider">
                <div class="slider-items">
                <?php foreach($Products as $Product){ ?> 
                  <div class="product-item">
                    <div class="item-inner">
                      <div class="product-thumbnail">
                        <div class="icon-new-label new-left">New</div>
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
                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
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
<?php } ?>
 <?php include_once("footer.php");?>
