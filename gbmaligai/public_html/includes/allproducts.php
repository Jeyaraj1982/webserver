<div class="container">
                <div class="category-tab pro-bg pro-nepr">
                    <h2 class="pull-left">All Proudcts</h2>
                    <!--category-tab-->
                    <div class="visible-xs catbe"><button type="button" class="toggle catb collapsed" data-toggle="collapse" data-target="#cat_tab" aria-expanded="false"></button></div>
                    <ul class="nav nav-tabs collapse footer-collapse text-right home-product-tabs" id="cat_tab">
                        <?php foreach($Categories as $Category){ ?>
							<li class="item"><a href="#Cat-<?php echo $Category['CategoryID'];?>" data-toggle="tab"><?php echo $Category['CategoryName'];?></a></li>
						<?php } ?>
					</ul>
                    <hr />
                    <div class="tab-content">
					<?php
						$i=0;
						foreach($Categories as $Category){ ?>
                        <div class="tab-pane fade <?php echo   ($i==0) ? 'active' : '';?> in" id="Cat-<?php echo $Category['CategoryID'];?>">
                            <div class="row thummargin">
                                <div id="cattab" class="owl-theme owl-carousel">
								<?php $Products = $mysql->select("select * from _tbl_products where CategoryID='".$Category['CategoryID']."' and IsActive='1'");?>
								<?php foreach($Products as $Product){ ?> 
									<form method="post" action="" id=frmid_<?php echo $Product['ProductID'];?>>
									<input type="hidden" name="ProductID" id="ProductID" value="<?php echo $Product['ProductID'];?>">
                                    <div class="product-layout col-xs-12">
                                        <div class="product-thumb transition">
                                            <div class="image">
                                                <a href="viewproduct.php?id=<?php echo md5($Product['ProductID']);?>"  style="text-align: center;padding:10px">
                                                    <img src="<?php echo "uploads/".$Product['ProductImage'];?>" alt="<?php echo $Product['ProductName'];?>" title="<?php echo $Product['ProductName'];?>" class="img-responsive center-block" style="height: 200px;width:auto;margin:0px auto;" />
                                                </a>
                                            </div>
                                            <div class="caption text-center">
                                                <h4><a href="viewproduct.php?id=<?php echo md5($Product['ProductID']);?>"><?php echo $Product['ProductName'];?></a></h4>
                                                <p class="price"> <span class="price-new"> &#8377; <?php echo number_format($Product['SellingPrice'],2);?> </span> </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="price"> <span class="price-old" style="color:#575757 !important"> &#8377; <?php echo number_format($Product['ProductPrice'],2);?> </span> </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p> <span class="price" style="color: green;"> 
                                        <?php 
                                             $Percentage = 100-(($Product['SellingPrice']*100)/($Product['ProductPrice']*1));
                                            echo ceil($Percentage)."% off";?> 
                                        </span> </p>
                                    </div>
                                </div>
                                                <div class="button-group">
                                                    <button type="button" data-toggle="tooltip" title="Add to Wish List" onclick="wishlist.add('46');">
                                                        <svg width="16px" height="16px"><use xlink:href="#addwish"></use></svg>
                                                    </button>
                                                    <button type="button" data-toggle="tooltip" title="Compare this Product" onclick="compare.add('46');">
                                                        <svg width="16px" height="16px"><use xlink:href="#addcompare"></use></svg>
                                                    </button>
                                                    <div class="bquickv" data-toggle="tooltip" title="Quick View"></div>
                                                </div>
                                                <!-- quantity option -->
                                                <div class="input-group col-xs-12 col-sm-12 qop">
                                                    <label class="control-label col-sm-2 col-xs-2 qlable" for="input-quantity"> Qty </label>
                                                    <input type="number" name="quantity" min="1" value="1" step="1" id="fqty_46" class="form-control col-sm-2 col-xs-9 qtyq" />
                                                    <input type="hidden" name="product_id" value="" />

                                                    <button type="button" class="acart" id="btncart" onclick="listaddtocart('<?php echo $Product['ProductID'];?>')" class="btn btn-primary btn-lg btn-block col-sm-4 pull-right">
                                                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                <!-- quantity option End -->
                                            </div>
                                        </div>
                                    </div>
									</form>
								<?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php $i++;} ?>
						
                    </div>
                </div>
            </div>