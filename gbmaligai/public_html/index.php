<?php include_once("header.php");?>
<div id="common-home" class="container-fluid">
     
    <div class="row">
        <div id="content" class="col-sm-12">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4"></div>
                    <div class="col-md-6 col-sm-8 slide-padding">
                        
                        <div class="homeslide">
                         <div class="row">
                    <div class="col-md-12">
                            <div>
                            <table  style="background:#f1f1f1;width: 100%;margin-bottom: 10px;padding: important;border-radius: 5px;">
                                <tr>
                                    <td style="padding-top:1px;width: 100px;background: #ccc;">&nbsp;Free Delivery:</td>
                                    <td style="padding-left:10px"> 
                                        <marquee>
                                            Nagercoil, Agastheeswaram taluk, Thovalai taluk 
                                        </marquee>
                                    </td>
                                     <td style="text-align: right;padding-left:10px">More...:</td>
                                </tr>
                            </table>
                          </div> 
    
                        </div>
                    </div>
                            <div id="slideshow0" class="owl-carousel owl-theme">
							<?php $sliders=$mysql->select("select * from _tbl_sliders order by SliderOrder asc");?>
							<?php foreach($sliders as $slider){ ?>
                                <div class="text-center">
                                    <a href="#"><img src="<?php echo "uploads/".$slider['SliderImage'];?>" alt="slider" class="img-responsive" /></a>
                                </div>
							<?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 sliderightbanner hidden-sm hidden-xs"></div>
                </div>
                
                
            </div>
            
            
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#slideshow0").owlCarousel({
                        itemsCustom: [[0, 1]],
                        autoPlay: 2500,
                        animateIn: "fadeIn",
                        animateOut: "fadeOut",
                        loop: true,
                        navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                        navigation: true,
                        pagination: false,
                    });
                });
            </script>
            <div class="rightbanner">
            <?php $Rsliders=$mysql->select("select * from _tbl_right_sliders order by SliderOrder asc");?>
            <?php foreach($Rsliders as $Rslider){ ?>
                <div class="banner-effect">
                    <a href="#">
                        <img src="<?php echo "uploads/".$Rslider['SliderImage'];?>" alt="banner" class="img-responsive" />
                    </a>
                </div>
            <?php } ?>
            </div>

          
          

            <script type="text/javascript">
			$(document).ready(function () {
			  $('.home-product-tabs').find('.item').first().addClass('active');
			}); 
                $(document).ready(function () {
                    $(".tab-content .tab-pane #cattab").owlCarousel({
                        itemsCustom: [
                            [0, 2],
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
            <!--<div class="container">
                <div class="topbanner">
                    <div class="row">
                        <div class="imgbanner col-xs-4 col-md-4 col-sm-4 firstbanner">
                            <div class="banner-effect">
                                <a href="#">
                                    <img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/allbanner/365X400-1-365x400.png" alt="banner" class="img-responsive" />
                                </a>
                            </div>
                        </div>

                        <div class="cbanner col-xs-4 col-md-4 col-sm-4">
                            <div class="banner-effect">
                                <a href="#">
                                    <img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/allbanner/center-banner-1-380x190.png" alt="banner" class="img-responsive center-block" />
                                </a>
                            </div>
                            <div class="banner-effect">
                                <a href="#">
                                    <img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/allbanner/center-banner-2-380x190.png" alt="banner" class="img-responsive center-block" />
                                </a>
                            </div>
                        </div>

                        <div class="col-xs-4 secondbanner">
                            <div class="sellbanner banner-effect">
                                <a href="#">
                                    <img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/allbanner/365X400-365x400.png" alt="banner" class="img-responsive center-block" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <?php $Categories = $mysql->select("select * from _tbl_category where IsActive='1' order by ListOrder");?>
            <?php foreach($Categories as $Category) { ?>
                <?php $Products = $mysql->select("select * from _tbl_products where CategoryID='".$Category['CategoryID']."' and IsActive='1' order by ProductID desc limit 0,4");?>
                <?php if (sizeof($Products)>0) {?>
                <div class="container pro-bg">
                    <h2 class="home-head pull-left"><?php echo $Category['CategoryName'];?></h2>
                    <hr />
				    <div class="category-tab pro-bg pro-nepr">
                        <div class="tab-content">
					        <div class="tab-pane fade active in">
                                <div class="row thummargin">
                                    <?php foreach($Products as $Product){ 
                                    include("include_product_widget.php")    ;
								     } ?>
                                </div>
                            </div>
                        </div>
                    </div>
			    </div>
                <?php } ?>
            <?php } ?>
            
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#latest").owlCarousel({
                        itemsCustom: [
                            [0, 2],
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
            
            <!--<div class="offerbanner container">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <div class="banner-effect">
                            <a href="#">
                                <img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/offerbanner/555X200-555x200.png" alt="offer Banner" class="img-responsive" />
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <div class="banner-effect">
                            <a href="#">
                                <img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/offerbanner/555X200-3-555x200.png" alt="offer Banner" class="img-responsive" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>-->

            <!--<div class="container">
                <div class="pro-bg pro-nepr">
                    <h2>Deal Of the day</h2>
                    <hr />
                    <div class="row thummargin">
                        <div id="count" class="owl-theme owl-carousel">
                            <div class="product-layout col-xs-12">
                                <div class="product-thumb transition">
                                    <div class="image">
                                        <a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/product&amp;product_id=30">
                                            <img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/product/07-700x700.png" alt="Canon EOS 5D" title="Canon EOS 5D" class="img-responsive center-block" />
                                        </a>
                                        <span class="salepro">sale</span>
                                    </div>
                                    <div class="caption text-center">
                                        <h4><a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/product&amp;product_id=30">Canon EOS 5D</a></h4>
                                        <p class="price"><span class="price-new">$98.00</span> <span class="price-old">$122.00</span></p>

                                        <div class="button-group">
                                            <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('30');">
                                                <svg width="16px" height="16px"><use xlink:href="#addwish"></use></svg>
                                            </button>
                                            <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('30');">
                                                <svg width="16px" height="16px"><use xlink:href="#addcompare"></use></svg>
                                            </button>
                                            <div class="bquickv" data-toggle="tooltip" title="Quick View"></div>
                                        </div>
                                        <div class="input-group col-xs-12 col-sm-12 qop">
                                            <label class="control-label col-sm-2 col-xs-2 qlable" for="input-quantity"> Qty </label>
                                            <input type="number" name="quantity" min="1" value="1" step="1" id="fqty_30" class="form-control col-sm-2 col-xs-9 qtyq" />
                                            <input type="hidden" name="product_id" value="" />

                                            <button
                                                type="button"
                                                class="acart"
                                                data-loading-text="Loading..."
                                                onclick="var xqty='fqty_30';
              var aqty = parseInt(document.getElementById(xqty).value);
              console.log(aqty);
              if(aqty <=0){
              alert('Invalid quantity');
              }
              else{
              cart.add(30,aqty);  
              }"
                                                class="btn btn-primary btn-lg btn-block col-sm-4 pull-right"
                                            >
                                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="Countdown30" class="box-timer"></div>

                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $("#Countdown30").countdown({
                                                until: new Date(2020, 12 - 1, 26, 00, 00, 00),
                                                labels: ["Years", "Months", "Weeks", "Days", "Hrs", "Mins", "Secs"],
                                                labels1: ["Year", "Month", "Week", "Day", "Hr", "Min", "Sec"],
                                            });
                                            //$('#Countdown<?php echo $product['product_id'];?>').countdown('pause');
                                        });
                                    </script>
                                </div>
                            </div>

                            <div class="product-layout col-xs-12">
                                <div class="product-thumb transition">
                                    <div class="image">
                                        <a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/product&amp;product_id=47">
                                            <img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/product/08-700x700.png" alt="HP LP3065" title="HP LP3065" class="img-responsive center-block" />
                                        </a>
                                        <span class="salepro">sale</span>
                                    </div>
                                    <div class="caption text-center">
                                        <h4><a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/product&amp;product_id=47">HP LP3065</a></h4>
                                        <p class="price"><span class="price-new">$110.00</span> <span class="price-old">$720.80</span></p>

                                        <div class="button-group">
                                            <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('47');">
                                                <svg width="16px" height="16px"><use xlink:href="#addwish"></use></svg>
                                            </button>
                                            <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('47');">
                                                <svg width="16px" height="16px"><use xlink:href="#addcompare"></use></svg>
                                            </button>
                                            <div class="bquickv" data-toggle="tooltip" title="Quick View"></div>
                                        </div>
                                        <div class="input-group col-xs-12 col-sm-12 qop">
                                            <label class="control-label col-sm-2 col-xs-2 qlable" for="input-quantity"> Qty </label>
                                            <input type="number" name="quantity" min="1" value="1" step="1" id="fqty_47" class="form-control col-sm-2 col-xs-9 qtyq" />
                                            <input type="hidden" name="product_id" value="" />

                                            <button
                                                type="button"
                                                class="acart"
                                                data-loading-text="Loading..."
                                                onclick="var xqty='fqty_47';
              var aqty = parseInt(document.getElementById(xqty).value);
              console.log(aqty);
              if(aqty <=0){
              alert('Invalid quantity');
              }
              else{
              cart.add(47,aqty);  
              }"
                                                class="btn btn-primary btn-lg btn-block col-sm-4 pull-right"
                                            >
                                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="Countdown47" class="box-timer"></div>

                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $("#Countdown47").countdown({
                                                until: new Date(2021, 01 - 1, 03, 00, 00, 00),
                                                labels: ["Years", "Months", "Weeks", "Days", "Hrs", "Mins", "Secs"],
                                                labels1: ["Year", "Month", "Week", "Day", "Hr", "Min", "Sec"],
                                            });
                                            //$('#Countdown<?php echo $product['product_id'];?>').countdown('pause');
                                        });
                                    </script>
                                </div>
                            </div>

                            <div class="product-layout col-xs-12">
                                <div class="product-thumb transition">
                                    <div class="image">
                                        <a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/product&amp;product_id=36">
                                            <img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/product/12-700x700.png" alt="iPod Nano" title="iPod Nano" class="img-responsive center-block" />
                                        </a>
                                        <span class="salepro">sale</span>
                                    </div>
                                    <div class="caption text-center">
                                        <h4><a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/product&amp;product_id=36">iPod Nano</a></h4>
                                        <p class="price"><span class="price-new">$86.00</span> <span class="price-old">$122.00</span></p>

                                        <div class="button-group">
                                            <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('36');">
                                                <svg width="16px" height="16px"><use xlink:href="#addwish"></use></svg>
                                            </button>
                                            <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('36');">
                                                <svg width="16px" height="16px"><use xlink:href="#addcompare"></use></svg>
                                            </button>
                                            <div class="bquickv" data-toggle="tooltip" title="Quick View"></div>
                                        </div>
                                        <div class="input-group col-xs-12 col-sm-12 qop">
                                            <label class="control-label col-sm-2 col-xs-2 qlable" for="input-quantity"> Qty </label>
                                            <input type="number" name="quantity" min="1" value="1" step="1" id="fqty_36" class="form-control col-sm-2 col-xs-9 qtyq" />
                                            <input type="hidden" name="product_id" value="" />

                                            <button
                                                type="button"
                                                class="acart"
                                                data-loading-text="Loading..."
                                                onclick="var xqty='fqty_36';
              var aqty = parseInt(document.getElementById(xqty).value);
              console.log(aqty);
              if(aqty <=0){
              alert('Invalid quantity');
              }
              else{
              cart.add(36,aqty);  
              }"
                                                class="btn btn-primary btn-lg btn-block col-sm-4 pull-right"
                                            >
                                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="Countdown36" class="box-timer"></div>

                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $("#Countdown36").countdown({
                                                until: new Date(2020, 12 - 1, 26, 00, 00, 00),
                                                labels: ["Years", "Months", "Weeks", "Days", "Hrs", "Mins", "Secs"],
                                                labels1: ["Year", "Month", "Week", "Day", "Hr", "Min", "Sec"],
                                            });
                                            //$('#Countdown<?php echo $product['product_id'];?>').countdown('pause');
                                        });
                                    </script>
                                </div>
                            </div>

                            <div class="product-layout col-xs-12">
                                <div class="product-thumb transition">
                                    <div class="image">
                                        <a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/product&amp;product_id=32">
                                            <img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/product/05-700x700.png" alt="iPod Touch" title="iPod Touch" class="img-responsive center-block" />
                                        </a>
                                        <span class="salepro">sale</span>
                                    </div>
                                    <div class="caption text-center">
                                        <h4><a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/product&amp;product_id=32">iPod Touch</a></h4>
                                        <p class="price"><span class="price-new">$122.00</span> <span class="price-old">$122.00</span></p>

                                        <div class="button-group">
                                            <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('32');">
                                                <svg width="16px" height="16px"><use xlink:href="#addwish"></use></svg>
                                            </button>
                                            <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('32');">
                                                <svg width="16px" height="16px"><use xlink:href="#addcompare"></use></svg>
                                            </button>
                                            <div class="bquickv" data-toggle="tooltip" title="Quick View"></div>
                                        </div>
                                        <div class="input-group col-xs-12 col-sm-12 qop">
                                            <label class="control-label col-sm-2 col-xs-2 qlable" for="input-quantity"> Qty </label>
                                            <input type="number" name="quantity" min="1" value="1" step="1" id="fqty_32" class="form-control col-sm-2 col-xs-9 qtyq" />
                                            <input type="hidden" name="product_id" value="" />

                                            <button
                                                type="button"
                                                class="acart"
                                                data-loading-text="Loading..."
                                                onclick="var xqty='fqty_32';
              var aqty = parseInt(document.getElementById(xqty).value);
              console.log(aqty);
              if(aqty <=0){
              alert('Invalid quantity');
              }
              else{
              cart.add(32,aqty);  
              }"
                                                class="btn btn-primary btn-lg btn-block col-sm-4 pull-right"
                                            >
                                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="Countdown32" class="box-timer"></div>

                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $("#Countdown32").countdown({
                                                until: new Date(2021, 01 - 1, 02, 00, 00, 00),
                                                labels: ["Years", "Months", "Weeks", "Days", "Hrs", "Mins", "Secs"],
                                                labels1: ["Year", "Month", "Week", "Day", "Hr", "Min", "Sec"],
                                            });
                                            //$('#Countdown<?php echo $product['product_id'];?>').countdown('pause');
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <script type="text/javascript">
                $(document).ready(function () {
                    $("#count").owlCarousel({
                        itemsCustom: [
                            [0, 1],
                            [375, 2],
                            [600, 3],
                            [768, 3],
                            [992, 4],
                            [1200, 4],
                        ],
                        // autoPlay: 1000,
                        navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                        navigation: true,
                        pagination: false,
                    });
                });
            </script>
            <!--<div class="">
                <div class="container">
                    <div class="col-md-12 logo-slider">
                        <div id="carousel0" class="owl-carousel owl-theme">
                            <div class="text-center"><img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/brand/brand-58-150x100.png" alt="Coca Cola" class="center-block img-responsive" /></div>
                            <div class="text-center"><img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/brand/brand-5-150x100.png" alt="RedBull" class="center-block img-responsive" /></div>
                            <div class="text-center"><img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/brand/1-150x100.png" alt="Nintendo" class="center-block img-responsive" /></div>
                            <div class="text-center"><img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/brand/2-150x100.png" alt="Starbucks" class="center-block img-responsive" /></div>
                            <div class="text-center"><img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/brand/brand-2-150x100.png" alt="Disney" class="center-block img-responsive" /></div>
                            <div class="text-center"><img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/brand/brand-3-150x100.png" alt="NFL" class="center-block img-responsive" /></div>
                            <div class="text-center"><img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/brand/brand-4-150x100.png" alt="Dell" class="center-block img-responsive" /></div>
                            <div class="text-center"><img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/brand/brand-58-150x100.png" alt="Sony" class="center-block img-responsive" /></div>
                            <div class="text-center"><img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/brand/brand-6-150x100.png" alt="Burger King" class="center-block img-responsive" /></div>
                            <div class="text-center"><img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/brand/brand-7-150x100.png" alt="Harley Davidson" class="center-block img-responsive" /></div>
                            <div class="text-center"><img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/brand/brand-8-150x100.png" alt="Canon" class="center-block img-responsive" /></div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function () {
                    $("#carousel0").owlCarousel({
                        itemsCustom: [
                            [0, 2],
                            [412, 3],
                            [600, 4],
                            [768, 5],
                            [992, 5],
                            [1200, 6],
                        ],
                        autoPlay: 2500,
                        loop: true,
                        navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                        navigation: false,
                        pagination: false,
                    });
                });
            </script>      -->
            <?php /*<div class="container">
                <div class="box blog_inspire pro-nepr pro-bg">
                    <div class="cmn-title wow bounce">
                        <h2>Latest Blog</h2>
                        <hr />
                    </div>
                    <div class="box-content">
                        <div class="box-product">
                            <div class="row thummargin">
                                <div id="blog" class="owl-carousel owl-theme">
                                    <div class="product-block col-xs-12">
                                        <div class="blog-left">
                                            <div class="inspire-blog-image">
                                                <img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/blog/blog-5-1170x800.jpg" alt="Latest Blog" title="Latest Blog" class="img-responsive" />
                                                <div class="blog-post-image-hover"></div>
                                                <p class="inspire_post_hover">
                                                    <!-- <a class="icon zoom" title="Click to view Full Image " href="http://templatetasarim.com/opencart/Basket/image/cache/catalog/blog/blog-5-1170x800.jpg" data-lightbox="example-set">jjj</a> -->
                                                    <a class="icon readmore_link" title="Click to view Read More " href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=5">jjj</a>
                                                </p>
                                            </div>
                                            <div class="inspire-post-author">
                                                <span class="write-comment"> <a href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=5">0 Comments</a> </span>
                                                <span>|</span><span class="date-time">Sunday 01st July 2018</span>
                                            </div>
                                        </div>
                                        <div class="blog-right">
                                            <h4><a href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=5">Nullam laoreet lobortis ligula</a></h4>
                                            <div class="blog-desc">nibh euismod nec. Fusce ornare a ex at elementum. ...</div>
                                            <a class="bread" href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=5">read more..</a>
                                        </div>
                                    </div>
                                    <div class="product-block col-xs-12">
                                        <div class="blog-left">
                                            <div class="inspire-blog-image">
                                                <img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/blog/blog-4-1170x800.jpg" alt="Latest Blog" title="Latest Blog" class="img-responsive" />
                                                <div class="blog-post-image-hover"></div>
                                                <p class="inspire_post_hover">
                                                    <!-- <a class="icon zoom" title="Click to view Full Image " href="http://templatetasarim.com/opencart/Basket/image/cache/catalog/blog/blog-4-1170x800.jpg" data-lightbox="example-set">jjj</a> -->
                                                    <a class="icon readmore_link" title="Click to view Read More " href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=4">jjj</a>
                                                </p>
                                            </div>
                                            <div class="inspire-post-author">
                                                <span class="write-comment"> <a href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=4">4 Comments</a> </span>
                                                <span>|</span><span class="date-time">Sunday 01st July 2018</span>
                                            </div>
                                        </div>
                                        <div class="blog-right">
                                            <h4><a href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=4">Aenean commodo volutpat ornare</a></h4>
                                            <div class="blog-desc">Donec vestibulum sem vitae quam posuere lobortis. ...</div>
                                            <a class="bread" href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=4">read more..</a>
                                        </div>
                                    </div>
                                    <div class="product-block col-xs-12">
                                        <div class="blog-left">
                                            <div class="inspire-blog-image">
                                                <img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/blog/new-1170x800.jpg" alt="Latest Blog" title="Latest Blog" class="img-responsive" />
                                                <div class="blog-post-image-hover"></div>
                                                <p class="inspire_post_hover">
                                                    <!-- <a class="icon zoom" title="Click to view Full Image " href="http://templatetasarim.com/opencart/Basket/image/cache/catalog/blog/new-1170x800.jpg" data-lightbox="example-set">jjj</a> -->
                                                    <a class="icon readmore_link" title="Click to view Read More " href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=3">jjj</a>
                                                </p>
                                            </div>
                                            <div class="inspire-post-author">
                                                <span class="write-comment"> <a href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=3">2 Comments</a> </span>
                                                <span>|</span><span class="date-time">Sunday 01st July 2018</span>
                                            </div>
                                        </div>
                                        <div class="blog-right">
                                            <h4><a href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=3">Donec vestibulum sem vitae quam posuere lobortis</a></h4>
                                            <div class="blog-desc">Donec vestibulum sem vitae quam posuere lobortis. ...</div>
                                            <a class="bread" href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=3">read more..</a>
                                        </div>
                                    </div>
                                    <div class="product-block col-xs-12">
                                        <div class="blog-left">
                                            <div class="inspire-blog-image">
                                                <img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/blog/blog-2-1170x800.jpg" alt="Latest Blog" title="Latest Blog" class="img-responsive" />
                                                <div class="blog-post-image-hover"></div>
                                                <p class="inspire_post_hover">
                                                    <!-- <a class="icon zoom" title="Click to view Full Image " href="http://templatetasarim.com/opencart/Basket/image/cache/catalog/blog/blog-2-1170x800.jpg" data-lightbox="example-set">jjj</a> -->
                                                    <a class="icon readmore_link" title="Click to view Read More " href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=2">jjj</a>
                                                </p>
                                            </div>
                                            <div class="inspire-post-author">
                                                <span class="write-comment"> <a href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=2">0 Comments</a> </span>
                                                <span>|</span><span class="date-time">Sunday 01st July 2018</span>
                                            </div>
                                        </div>
                                        <div class="blog-right">
                                            <h4><a href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=2">Sed mi libero, placerat eu gravida</a></h4>
                                            <div class="blog-desc">Nulla quis augue et augue maximus tempor at et eni...</div>
                                            <a class="bread" href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=2">read more..</a>
                                        </div>
                                    </div>
                                    <div class="product-block col-xs-12">
                                        <div class="blog-left">
                                            <div class="inspire-blog-image">
                                                <img src="http://templatetasarim.com/opencart/Basket/image/cache/catalog/blog/blog-1170x800.jpg" alt="Latest Blog" title="Latest Blog" class="img-responsive" />
                                                <div class="blog-post-image-hover"></div>
                                                <p class="inspire_post_hover">
                                                    <!-- <a class="icon zoom" title="Click to view Full Image " href="http://templatetasarim.com/opencart/Basket/image/cache/catalog/blog/blog-1170x800.jpg" data-lightbox="example-set">jjj</a> -->
                                                    <a class="icon readmore_link" title="Click to view Read More " href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=1">jjj</a>
                                                </p>
                                            </div>
                                            <div class="inspire-post-author">
                                                <span class="write-comment"> <a href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=1">0 Comments</a> </span>
                                                <span>|</span><span class="date-time">Sunday 01st July 2018</span>
                                            </div>
                                        </div>
                                        <div class="blog-right">
                                            <h4><a href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=1">Duis blandit tristique augue, et dignissim</a></h4>
                                            <div class="blog-desc">Duis blandit tristique augue, et dignissim nisi pe...</div>
                                            <a class="bread" href="http://templatetasarim.com/opencart/Basket/index.php?route=information/blogger&amp;blogger_id=1">read more..</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function () {
                    $("#blog").owlCarousel({
                        itemsCustom: [
                            [0, 1],
                            [600, 2],
                            [768, 3],
                            [992, 3],
                            [1200, 4],
                        ],
                        // autoPlay: 1000,
                        navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                        navigation: true,
                        pagination: false,
                    });
                });
            </script>
            <?php */ ?>
        </div>
    </div>
</div>
<?php include_once("footer.php");?>
