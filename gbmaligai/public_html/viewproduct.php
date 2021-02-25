<?php include_once("header.php");?>
<?php $Product=$mysql->select("select * from _tbl_products where md5(ProductID)='".$_GET['id']."'");?>
<form method="post" action="" id=frmid_<?php echo $Product[0]['ProductID'];?>>
<input type="hidden" name="ProductID" id="ProductID" value="<?php echo $Product[0]['ProductID'];?>"> 
<div id="product-product" class="container common-shed">
    <div class="row">
        <div id="content" class="col-sm-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>
                    <a><?php echo $Product[0]['ProductName'];?></a>
                </li>
            </ul>
            <div class="row">
                <div class="col-md-5 col-sm-6 proimg">
                    <ul class="thumbnails">
                        <li>
                            <a class="thumbnail" href="uploads/<?php echo $Product[0]['ProductImage'];?>" title="iPod Classic">
                                <img data-zoom-image="uploads/<?php echo $Product[0]['ProductImage'];?>" src="uploads/<?php echo $Product[0]['ProductImage'];?>" id="inspzoom" class="img-responsive center-block" alt="image" />
                            </a>
                        </li>
                        <div class="row addoinalrow">
                            <li id="additional" class="owl-carousel">
                                <?php $productimage = $mysql->select("select * from _tbl_product_additional_image where ProductID='".$Product[0]['ProductID']."'");?>
                                <?php foreach($productimage as $image) { ?>
                                <a class="col-xs-12" data-zoom-image="uploads/<?php echo $image['ProductImage'];?>" data-image="uploads/<?php echo $image['ProductImage'];?>" href="uploads/<?php echo $image['ProductImage'];?>">
                                    <img src="uploads/<?php echo $image['ProductImage'];?>" class="img-responsive center-block" alt="additional image" />
                                </a>
                                <?php } ?>
                            </li>
                        </div>
                    </ul>
                </div>
                <div class="col-md-7 col-sm-6 product-right">
                    <h1><?php echo $Product[0]['ProductName'];?></h1>
                    <hr class="prosp" />
                    <ul class="list-unstyled">
                        <li>
                            <span class="text-prodecor">Brands</span><a class="textdeb"><?php echo $Product[0]['BrandName'];?></a>
                        </li>
                        <li>
                            <span class="text-prodecor">Product Code:</span>
                            <?php echo $Product[0]['ProductCode'];?>
                        </li>
                        <li><span class="text-prodecor">Availability:</span> In Stock</li>
                        <hr class="prosp" />
                    </ul>
                    <table>
                        <tr>
                            <td style="padding-right: 10px;">
                                <p class="price">
                                    <span class="price-new" style="color: green; font-weight: bold;">
                                        &#8377;
                                        <?php echo number_format($Product[0]['SellingPrice'],2);?>
                                    </span>
                                </p>
                            </td>
                            <td style="padding-right: 10px;">
                                <p class="price">
                                    <strike>
                                        <span class="price-old" style="color: #575757; font-weight: bold;">
                                            &#8377;
                                            <?php echo number_format($Product[0]['ProductPrice'],2);?>
                                        </span>
                                    </strike>
                                </p>
                            </td>
                            <td style="padding-right: 10px;">
                                <p>
                                    <span class="price" style="color: green;font-weightbold">
                                        <?php 
					 $Percentage = 100-(($Product[0]['SellingPrice']*100)/($Product[0]['ProductPrice']*1));
					echo ceil($Percentage)."% off";?>
                                    </span>
                                </p>
                            </td>
                        </tr>
                    </table>

                    <div id="product">
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
</form>


<script type="text/javascript">

    $(document).ready(function() {
      $('.thumbnails').magnificPopup({
        type:'image',
        delegate: 'a',
        gallery: {
          enabled: true
        }
      });
    });
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
