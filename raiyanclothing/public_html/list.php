<?php
    $subcategoryid = $_REQUEST['l'];
?>
<style>
    .innerA {font-size:15px !important;color:#FFF5E8;background:#aaa}
    .innerA:hover {font-size:15px !important;color:#EA1A1F;font-weight:bold;}
      .jselected { border:1px solid #F3B628;background:#F3B628;color:#fff;font-weight:bold;}
</style>
<?php
if (sizeof($lists)>0) {
    foreach($lists as $l) {
        $image = $mysql->select("select * from _productimages where productid=".$l['productid']);
        $price = $mysql->select("select * from _productprice where productid=".$l['productid']);
        if (sizeof($image)>0) {
            $im = "productimages/".$image[0]['filename'];
        } else {
            $im = "images/products/product-02.jpg";
        }
?>
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 product-width">
    <div class="product">
	    <figure><img alt="image description" src="<?php echo $im;?>"></figure>
		<div class="img-hover">
		    <div class="box">
			    <div class="holder">
				    <div class="border-center">
					    <span class="product-name"><?php echo $l['productname'];?></span>
					</div>
                    
                    <div style="margin-top:20px;">
                        <select>
                            <?php foreach($price as $pp) {?>
                                <option value="">Size: <?php echo $pp['productsize'];?> :   Rs. <?php echo number_format($pp['productmrp'],2);?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div style="margin-top:20px;">
                        <a href="<?php echo $fileName;?>?product=<?php echo $l['productid'];?>" class="innerA" >View Details</a>
                    </div>
                    
					<span class="star-rating">
					    <i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
					</span>
                     
				</div>
			</div>
		</div>
        
        <div style="text-align:center;font-weight:bold;">
            <?php echo $l['productname'];?>
        </div>
        
        <div>
            <select>
                <?php foreach($price as $pp) {?>
                    <option value="">Size: <?php echo $pp['productsize'];?> : Rs. <?php echo number_format($pp['productmrp'],2);?></option>
                <?php } ?>
            </select>
        </div>
	</div>
</div>
<?php } ?>
<?php } else {?> 
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 product-width">
    <div class="product">
        No Items found
        
        
    </div>
</div>
<?php } ?>