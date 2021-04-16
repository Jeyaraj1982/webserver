<?php include_once("header.php");?>
<?php 
    $Product=$mysql->select("select * from _tbl_products where IsActive='1' and IsDelete='0' and ProductID='".$_GET['productid']."'");
    $Category = $mysql->select("select * from _tbl_category where CategoryID='".$Product[0]['CategoryID']."'"); 
    $SubCategories = $mysql->select("select * from _tbl_sub_category where CategoryID='".$Product[0]['CategoryID']."' order by SubCategoryName");  
    $product_prices = $mysql->select("select * from _tbl_products_prices where ProductID='".$Product[0]['ProductID']."'");
?>
<div id="product-product" class="container common-shed">
    <div class="row">
        <div id="content" class="col-sm-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>
                    <a href="c<?php echo $Category[0]['CategoryID'];?>_<?php echo parseStringForURL($Category[0]['CategoryName']);?>"><?php echo $Category[0]['CategoryName'];?></a>
                </li>
                <li>
                    <a href="s<?php echo $SubCategories[0]['SubCategoryID'];?>_<?php echo parseStringForURL($SubCategories[0]['SubCategoryName']);?>"><?php echo $SubCategories[0]['SubCategoryName'];?></a>
                </li>
                <li>
                    <a href="<?php echo parseStringForURL($Product[0]['ProductName'])."_p".$Product[0]['ProductID'];?>"><?php echo $Product[0]['ProductName'];?></a>
                </li>
            </ul>
            <div class="row">
                <div class="col-md-4 col-sm-6 proimg">
                    <ul class="thumbnails">
                          <?php $productimage = $mysql->select("select * from _tbl_products_images where IsDelete='0' and ProductID='".$Product[0]['ProductID']."' order by ImageOrder");?>
                        <li>
                            <a class="thumbnail" href="uploads/products/<?php echo $Product[0]['ProductID'];?>/<?php echo $productimage[0]['ImageName'];?>" title="iPod Classic">
                                <img data-zoom-image="uploads/products/<?php echo $Product[0]['ProductID'];?>/<?php echo $productimage[0]['ImageName'];?>" src="uploads/products/<?php echo $Product[0]['ProductID'];?>/<?php echo $productimage[0]['ImageName'];?>" id="inspzoom" class="img-responsive center-block" alt="image" />
                            </a>
                        </li>
                        <div class="row addoinalrow">
                            <li id="additional" class="owl-carousel">
                              
                                <?php foreach($productimage as $image) { ?>
                                <a class="col-xs-12" data-zoom-image="uploads/products/<?php echo $Product[0]['ProductID'];?>/<?php echo $image['ImageName'];?>" data-image="uploads/products/<?php echo $Product[0]['ProductID'];?>/<?php echo $image['ImageName'];?>" href="uploads/products/<?php echo $Product[0]['ProductID'];?>/<?php echo $image['ImageName'];?>">
                                    <img src="uploads/products/<?php echo $Product[0]['ProductID'];?>/<?php echo $image['ImageName'];?>" class="img-responsive center-block" alt="additional image" />
                                </a>
                                <?php } ?>
                            </li>
                        </div>
                    </ul>
                </div>
                <div class="col-md-8 col-sm-6 product-right">
                    <h1><?php echo $Product[0]['ProductName'];?></h1>
                    <?php echo $Product[0]['ShortDescription'];?>
                    <hr class="prosp" />
                    <ul class="list-unstyled">
                        <!--
                        <li>
                            <span class="text-prodecor">Brands</span><a class="textdeb"><?php echo $Product[0]['BrandName'];?></a>
                        </li>
                        -->
                        <li>
                            <span class="text-prodecor">Product Code:</span>
                            <?php echo $Product[0]['ProductCode'];?>
                        </li>
                        <li><span class="text-prodecor">Availability:</span> In Stock</li>
                        <hr class="prosp" />
                    </ul>
                     
                    <div class="row">
                      <div class="col-sm-12">
                          
                     <?php
                         foreach($product_prices as $product_price) {
                             
                              $isCart=0;
                              $cartQty=0;
                              foreach($_SESSION['items'] as $item) {
                                if ($item['PriceTagID']==$product_price['PriceTagID']) {
                                    $isCart++;
                                    $cartQty=$item['Qty'];
                                }                                                        
                              }
                                      
                             ?>
                               <div class="row" style="border-bottom:1px solid #eee;margin-bottom:20px;">
                                   <div class="col-sm-4 col-md-4 ">
                                        <?php if (strlen($product_price['BrandSizeText'])>0) {?>
                                        Size: <span style='color:green;'><?php echo $product_price['BrandSizeText'];?></span>&nbsp;&nbsp;
                                        <?php } ?>
                                        <span style='color:#555;'><?php echo $product_price['Units']." ".$product_price['UnitName'];?></span>
                                        <h2 style="margin-bottom:10px;color:#ea3a3c;margin-top:0px">
                                            <span style="font-size:16px">₹</span><?php echo number_format($product_price['SellingPrice']); ?>
                                            <?php 
                                                if ($product_price['SellingPrice']<$product_price['MRP']) {
                                                    echo "<span style=' text-decoration: line-through;color:#444'><span style='font-size:16px'>₹</span>".number_format($product_price['MRP'])."</span>"; 
                                                }             
                                            ?>
                                        </h2>
                                        
                                  </div>
                                    
                                        <div class="col-sm-4 col-md-4 col-xs-6">
                                            <div class="op-box qty-plus-minus" style="height:30px;" id="qtydiv_<?php echo $product_price['PriceTagID'];?>">
                                        
                                            <?php if ($isCart>0) { ?>
                                                   <?php echo "Qty: ".$cartQty;?>
                                            <?php } else {?>
                                            <form method="post" id=frmid_<?php echo $product_price['PriceTagID'];?>>
                                        <input type="hidden" name="ProductID" id="ProductID" value="<?php echo $Product[0]['ProductID'];?>"> 
                                        <input type="hidden" name="PriceTagID" id="PriceTagID" value="<?php echo $product_price['PriceTagID'];?>"> 
                                            <button type="button" class="form-control pull-left btn-number btnminus" onClick="var result = document.getElementById('qty_<?php echo $product_price['PriceTagID'];?>'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="dec qtybutton">
                                                <i class="fa fa-minus">&nbsp;</i>
                                            </button>
                                            <input id="qty_<?php echo $product_price['PriceTagID'];?>" type="text" name="qty" value="1" size="2" id="input-quantity" class="form-control input-number pull-left" />
                                            <button type="button" class="form-control pull-left btn-number btnplus"  onClick="var result = document.getElementById('qty_<?php echo $product_price['PriceTagID'];?>'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="inc qtybutton">
                                                <i class="fa fa-plus">&nbsp;</i>
                                            </button>
                                             </form>
                                            <?php } ?>
                                              
                                               </div>
                                        </div>
                                 
                                  
                                  <div class="col-sm-4 col-md-4 col-xs-4">
                                    <div id="cartadded_<?php echo $product_price['PriceTagID'];?>" style="<?php echo ($isCart>0) ? '' : ' display: none ';?>">
                                        <button type="button" style="background:#25bb25 !important" id="buttoncart_<?php echo $product_price['PriceTagID'];?>" class="btn add-to-cart btn-success" disabled="disabled"><i class="fa fa-check"></i> Added to cart</button>
                                        <a href="javascript:void(0)" onclick="CallConfirmationtopcart('<?php echo $product_price['PriceTagID'];?>')">Remove</a>
                                      </div>
                                      <div id="cartadd_<?php echo $product_price['PriceTagID'];?>"  style="<?php echo ($isCart>0) ? ' display: none ' : '  ';?>">
                                        <button type="button" id="buttoncart_<?php echo $product_price['PriceTagID'];?>" onclick="addtocart('<?php echo $Product[0]['ProductID'];?>','<?php echo $product_price['PriceTagID'];?>')" class="btn add-to-cart btn-primary"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;add to cart</button>
                                      </div>
                                      
                                       </div>
                              </div>
                              
                             <?php
                         }
                     ?>
                     
                      </div>
                    </div>
                    <div id="product" style="display:none;">
                        <!-- Quantity option -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2 col-md-1 col-xs-2 op-box qtlabel">
                                    <label class="control-label text-prodecorop" for="input-quantity">Qty</label>
                                </div>
                                <div class="col-md-11 col-sm-10 col-xs-10 op-box qty-plus-minus">
								   <button type="button" class="form-control pull-left btn-number btnminus" onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="dec qtybutton">
                                        <i class="fa fa-minus">&nbsp;</i>
                                    </button>
                                    <input id="qty" type="text" name="qty" value="1" size="2" id="input-quantity" class="form-control input-number pull-left" />
                                    <button type="button" class="form-control pull-left btn-number btnplus"  onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="inc qtybutton">
                                        <i class="fa fa-plus">&nbsp;</i>
                                    </button>
                                </div>
                            </div>
                            <hr class="prosp" />
                            <button type="button" id="buttoncart" onclick="addtocart('<?php echo $Product[0]['ProductID'];?>')" data-loading-text="Loading..." class="btn add-to-cart btn-primary">Add to Cart</button>
                           
                          
                        </div>
                        <!-- Quantity option end -->
                    </div>
                    <div class="rating" style="display:none">
                        <ul class="list-inline">
                            <li class="prodrate">
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                            </li>
                        </ul>
                        <hr class="prosp" />
                        <!-- AddToAny BEGIN -->
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                            <a class="a2a_button_facebook"></a>
                            <a class="a2a_button_twitter"></a>
                            <a class="a2a_button_google_plus"></a>
                            <a class="a2a_button_pinterest"></a>
                            <a class="a2a_button_linkedin"></a>
                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->
                    </div>
                </div>
            </div>
            <div class="propage-tab">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-description">
                        <div class="cpt_product_description">
                            <div>
                                <p>
                                    <?php echo $Product[0]['DetailDescription'];?>
                                </p>
                            </div>
                        </div>
                        <!-- cpt_container_end -->
                    </div>
                </div>
            </div>
            <!-- relatedproduct -->
            <div class="pro-bg"></div>
        </div>
    </div>
</div>



<script type="text/javascript">

  //  $(document).ready(function() {
 //     $('.thumbnails').magnificPopup({
  //      type:'image',
   //     delegate: 'a',
    //    gallery: {
   //       enabled: true
    //    }
    //  });
   // });
    //-->
</script>
<!-- related -->
<script type="text/javascript">
    $(document).ready(function () {
        $("#related").owlCarousel({
            itemsCustom: [
                [0, 1],
                [375, 2],
                [600, 3],
                [768, 3],
                [992, 4],
                [1200, 5],
            ],
            // autoPlay: 1000,
            navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            navigation: true,
            pagination: false,
        });
    });
</script>
<!-- related over -->

<script>
    if (jQuery(window).width() > 991) {
        //initiate the plugin and pass the id of the div containing gallery images
        $("#inspzoom").elevateZoom({ gallery: "additional", cursor: "pointer", galleryActiveClass: "active", imageCrossfade: true, loadingIcon: "" });
        //pass the images to Fancybox
        $("#inspzoom").bind("click", function (e) {
            var ez = $("#inspzoom").data("elevateZoom");
            $.fancybox(ez.getGalleryList());
            return false;
        });
    }
</script>
<!--ZOOM END-->

<!--slider for product-->
<script type="text/javascript">
    <!--
    $('#additional').owlCarousel({
      itemsCustom : [
            [0, 3],
            [412, 4],
            [600, 6],
            [768, 3],
            [992, 4],
            [1200, 4]
            ],
       autoPlay: 1000,
      autoPlay: true,
      navigation: false,
      navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      pagination: false
    });
    -->
	
</script>
<?php include_once("footer.php");?>
