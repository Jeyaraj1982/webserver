<?php
    $images = $mysql->select("select * from _tbl_products_images where IsDelete='0' and ProductID='".$Product['ProductID']."' order by ImageOrder");  
    $href= "p".$Product['ProductID']."_".parseStringForURL($Product['ProductName']);
    $product_prices = $mysql->select("select * from _tbl_products_prices where ProductID='".$Product['ProductID']."'");
?>
<div class="product-layout  col-sm-3 col-xs-6" style="margin-bottom:10px;">                                   
    <div class="product-thumb transition">
        <div class="image">
            <a href="<?php echo $href;?>"  style="text-align: center;padding:10px">
                <img src="uploads/products/<?php echo $Product['ProductID'];?>/<?php echo $images[0]['ImageName'];?>" alt="<?php echo $Product['ProductName'];?>" title="<?php echo $Product['ProductName'];?>" class="img-responsive center-block" style="max-width:100%;height:120px;margin:0px auto;" />
            </a>
        </div>
        <div class="caption text-center">
            <h3 style="height:45px;width:90%;margin: 0px auto;padding-bottom:10px;text-overflow:unset;overflow:none;white-space:unset;font-size:12px;font-weight:normal">
            <a href="<?php echo $href;?>" style="color:#444;font-size:14px"><?php echo $Product['ProductName'];?></a>
            </h3>
            
            <p class="price" style="margin-bottom:10px;"> <span class="price-new" style="font-size:20px;">
            <?php if ($product_prices[0]['SellingPrice']==$product_prices[0]['MRP']) {?>
                &#8377; <?php echo number_format($product_prices[0]['SellingPrice'],2);?>/<span style="font-size:11px;font-weight:normal;color:#222"><?php echo $product_prices[0]['Units']." ".$product_prices[0]['UnitName'];?></span></span>
                <?php } ?>
                  <?php if ($product_prices[0]['SellingPrice']<$product_prices[0]['MRP']) {?>
                &#8377; <?php echo number_format($product_prices[0]['SellingPrice'],2);?> (<span style="text-decoration: line-through;color:red"><?php echo number_format($product_prices[0]['MRP'],2);?></span>)/
                
                <span style="font-size:11px;font-weight:normal;color:#222"><?php echo $product_prices[0]['Units']." ".$product_prices[0]['UnitName'];?></span></span>
                <?php } ?>
            </p>
            
            <?php if (sizeof($product_prices)==0)  {?>
            <!--
            <div>
                <form id="frmid_<?php echo $Product['ProductID'];?>" name="frmid_<?php echo $Product['ProductID'];?>">
                    <input type="hidden" value="<?php echo $Product['ProductID'];?>" name="ProductID">
                    <input type="hidden" value="<?php echo $product_prices[0]['PriceTagID'];?>" name="TagID">
                    <input type="hidden" name="quantity" min="1" value="1" step="1" id="fqty_<?php echo $Product['ProductID'];?>" class="form-control col-sm-2 col-xs-9 qtyq" />
                </form>
                <button onclick="listaddtocart('<?php echo $Product['ProductID'];?>')"  value="" class="btn btn-success" style="margin-top:0px"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;Add to Cart</button>
            </div>
            -->
            <?php } else {?>
                
            <?php } ?>  
            
            <a href="<?php echo $href;?>" > <button onclick="listaddtocart('<?php echo $Product['ProductID'];?>')"  value="" class="btn  btn-success" style="margin-top:0px"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;Add to Cart</button></a>
        </div>
    </div>
</div>