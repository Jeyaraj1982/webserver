<style>
    .innerA {font-size:15px !important;color:#FFF5E8;background:#aaa}
    .innerA:hover {font-size:15px !important;color:#EA1A1F;font-weight:bold;}
    .jselected { border:1px solid #F3B628;background:#F3B628;color:#fff;font-weight:bold;}
</style>
<?php
$subcategoryid = $lists[0]['subcategoryid'];
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

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 product-width" style="width: 100%;">
<div>
<div style="border:1px solid #F3B628;background:#F3B628;color:#fff;font-weight:bold;padding:8px;">
    <?php echo $l['productname'];?>
</div>
<div style="margin:10px">
    <table style="width:100%;" cellpadding="0" cellspacing="0">
        <tr>
            <td style="width: 200px;vertical-align:top;border:none;">
            <img alt="image description" src="<?php echo $im;?>">
            </td>
            <td style="vertical-align:top;border:0px;line-height:20px;text-align:justify">
            <?php echo $l['productdescription'];?>
            <br><br>
            
            <table style="width: 200px;" align="right">
                <tr>
                    <td style="width:80px;padding:3px !important;line-height:1;background:#ccc;color:#222;font-weight:bold;">Size</td>
                    <td style="width:120px;padding:3px !important;line-height:1;background:#ccc;color:#222;font-weight:bold;">Price</td>
                </tr>
                <?php foreach($price as $pp) {?>
                <tr>
                    <td style="padding:3px !important;line-height:1"><?php echo $pp['productsize'];?></td>
                    <td style="padding:3px !important;line-height:1">Rs. <?php echo number_format($pp['productmrp'],2);?></td>
                </tr>
                <?php } ?>
                </table>
            </td>
        </tr>
 
        <tr>
            <td colspan="2" style="border:0px;padding:10px;text-align:left;">
            <?php foreach($image as $imm) {?>
              <img alt="image description" src="productimages/<?php echo $imm['filename'];?>" style="width:155px;border:1px solid #ccc;">
            <?php } ?>
            </td>
        </tr>
    </table>
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