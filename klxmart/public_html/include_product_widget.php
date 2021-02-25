<div class="product-layout  col-sm-3 col-xs-6">                                   
                                            <div class="product-thumb transition">
                                                <div class="image">
                                                    <a href="viewproduct.php?id=<?php echo md5($Product['ProductID']);?>"  style="text-align: center;padding:10px">
                                                        <img src="<?php echo "uploads/".$Product['ProductImage'];?>" alt="<?php echo $Product['ProductName'];?>" title="<?php echo $Product['ProductName'];?>" class="img-responsive center-block" style="max-width:100%;height:120px;margin:0px auto;" />
                                                    </a>
                                                </div>
                                                <div class="caption text-center">
                                                    <h4 style="height:45px;width:90%;margin: 0px auto;padding-bottom:10px;text-overflow:unset;overflow:none;white-space:unset;font-size:12px;"><a href="viewproduct.php?id=<?php echo md5($Product['ProductID']);?>" style="color:#700f6a;font-weight:bold"><?php echo $Product['ProductName'];?></a></h4>
                                                    <p class="price"> <span class="price-new" style="font-size:20px;"> &#8377; <?php echo number_format($Product['SellingPrice'],2);?> </span> </p>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="price"> <span class="price-old" style="color:#888 !important;font-weight:normal"> &#8377; <?php echo number_format($Product['ProductPrice'],2);?> </span> </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p> <span class="price" style="color: red;font-weight:normal"> 
                                                            <?php 
                                                                $Percentage = 100-(($Product['SellingPrice']*100)/($Product['ProductPrice']*1));
                                                                echo ceil($Percentage)."% off";
                                                            ?> 
                                                            </span> </p>
                                                        </div>
                                                    </div>
                                                    <!--  <div class="input-group col-xs-12 col-sm-12 qop">
                                                        <label class="control-label col-sm-2 col-xs-2 qlable" for="input-quantity"> Qty </label> 
                                                        
                                                      <button type="button" class="acart" data-loading-text="Loading..." onclick="listaddtocart('<?php echo $Product['ProductID'];?>')" class="btn btn-primary btn-lg btn-block col-sm-4 pull-right" >
                                                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                                        </button>
                                                        
                                                    </div> -->
                                                    <div>
                                                                                                     <form id="frmid_<?php echo $Product['ProductID'];?>" name="frmid_<?php echo $Product['ProductID'];?>">
                                                        <input type="hidden" value="<?php echo $Product['ProductID'];?>" name="ProductID">
                                                        <input type="hidden" name="quantity" min="1" value="1" step="1" id="fqty_<?php echo $Product['ProductID'];?>" class="form-control col-sm-2 col-xs-9 qtyq" />
                                                          </form>
                                                        
                                                     <button onclick="listaddtocart('<?php echo $Product['ProductID'];?>')"  value="" class="cart_button" style="margin-top:0px"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;Add to Cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>