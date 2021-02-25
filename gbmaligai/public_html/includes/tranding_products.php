<div class="container pro-bg" style="display: none;">
                <h2 class="home-head pull-left tab-head">Trending products</h2>
                
                <hr />
                <div class="category-tab pro-bg pro-nepr">
                    
                    <div class="tab-content">
                    <div class="tab-pane fade active in">
                            <div class="row thummargin">
                            <?php $Products = $mysql->select("select * from _tbl_products where IsActive='1'");?>
                                <?php foreach($Products as $Product){ ?> 
                                    <div class="product-layout col-xs-3">
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
                                               
                                                 
                                                <div class="input-group col-xs-12 col-sm-12 qop">
                                                    <label class="control-label col-sm-2 col-xs-2 qlable" for="input-quantity"> Qty </label>
                                                    <input type="number" name="quantity" min="1" value="1" step="1" id="fqty_46" class="form-control col-sm-2 col-xs-9 qtyq" />
                                                    <input type="hidden" name="product_id" value="" />

                                                    <button
                                                        type="button"
                                                        class="acart"
                                                        data-loading-text="Loading..."
                                                        onclick="var xqty='fqty_46';
              var aqty = parseInt(document.getElementById(xqty).value);
              console.log(aqty);
              if(aqty <=0){
              alert('Invalid quantity');
              }
              else{
              cart.add(46,aqty);  
              }"
                                                        class="btn btn-primary btn-lg btn-block col-sm-4 pull-right"
                                                    >
                                                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                <!-- quantity option End -->
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>