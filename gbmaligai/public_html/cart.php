<?php include_once("header.php");?>
<div id="checkout-cart" class="container">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="">Shopping Cart</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-12">
            <h1 class="heading">Shopping Cart</h1>
            <?php if(sizeof($_SESSION['items'])==0){ ?>
                <div style="text-align: center;width:100%"><img src="image/catalog/carti.png" style="font-size: 200px"><br>
                    No Cart Items Found<br>
                    <div class="buttons clearfix"> <a class="btn btn-default" href="index.php"> Continue shopping&nbsp; <i class="fa fa-arrow-right"> </i></a></div>
                </div>
            <?php }else{ ?>
                <?php
                    if (isset($_POST['updateQtyBtn'])) {
                        $temp = array();
                        foreach($_SESSION['items'] as $item) {
                            if ($item['PriceTagID']==$_POST['PriceTagID']) {
                                if ($_POST['Qty']>0) {
                                    $item['Qty']=$_POST['Qty'];
                                } else {
                                    $item=array();
                                }
                            } 
                            if (sizeof($item)>0) {
                                $temp[] = $item;      
                            }                                                      
                        }
                        $_SESSION['items']=$temp;
                    }
                    if (isset($_POST['removeQtyBtn'])) {
                        $temp = array();
                        foreach($_SESSION['items'] as $item) {
                            if ($item['PriceTagID']==$_POST['PriceTagID']) {
                                    $item=array();
                            } 
                            if (sizeof($item)>0) {
                                $temp[] = $item;      
                            }                                                      
                        }
                        $_SESSION['items']=$temp;
                    }
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td class="text-center" style="width:100px">Image</td>
                                <td class="text-left">Product Name</td>
                                <td class="text-left" style="width:120px">Unit</td>
                                <td class="text-right" style="width:120px">Unit Price</td>
                                <td class="text-left" style="width:120px;text-align:center">Quantity</td>
                                <td class="text-right" style="width:150px">Total</td>
                            </tr>
                        </thead>
                        <tbody>
						<?php 
							$subtotal=0;
							foreach($_SESSION['items'] as $item) { 
							    $subtotal+=$item['Qty']*$item['Price'];
						?>
                            <tr>
                                <td class="text-center" style="padding:0px !important">
                                    <a href="uploads/<?php echo $item['ProductImage'];?>">
                                        <img src="uploads/<?php echo $item['ProductImage'];?>" class="img-thumbnail" style="height:64px" />
                                    </a>
                                </td>
                                <td class="text-left">
                                    <a><?php echo $item['ProductName'];?></a>
                                    <form action="" method="post" style="margin-top: 7px;">
                                        <input type="hidden" value="<?php echo $item['PriceTagID'];?>" name="PriceTagID">
                                        <button type="submit" name="removeQtyBtn" style="padding: 0px 10px;font-size: 12px;border: 1px solid #ccc;background: #f1f1f1;padding-top: 2px;">Remove</button>
                                    </form>
                                </td>
                                <td class="text-left"><a><?php echo $item['Units'];?>-<?php echo $item['UnitName'];?></a></td>
                                <td class="text-right">&#8377;<?php echo number_format($item['Price'],2);?></td>
                                <td class="text-left">
                                    <form action="" method="post">
                                    <div class="input-group btn-block" style="max-width: 118px;">
                                        <input type="hidden" value="<?php echo $item['PriceTagID'];?>" name="PriceTagID">
                                        <input type="number" name="Qty" value="<?php echo $item['Qty'];?>" size="1" class="form-control" style="width:80px" />
                                        <span class="input-group-btn">
                                            <button type="submit" name="updateQtyBtn" data-toggle="tooltip" title="Update" class="btn btn-primary cartbt"><i class="fa fa-refresh"></i></button>
                                        </span>
                                    </div>
                                    </form>
                                </td>
                                <td class="text-right">&#8377;<?php echo number_format($item['Qty']*$item['Price'],2);?></td>
                            </tr>
						<?php } ?> 
                        </tbody>
                    </table>
                </div>
            
           
            <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                    <table class="table table-bordered" style="width:270px;float:right">
                        <tr>
                            <td class="text-right"  style="width:120px"><strong>Sub-Total:</strong></td>
                            <td class="text-right"  style="width:150px">&#8377;<?php echo number_format($subtotal,2);?></td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Total:</strong></td>
                            <td class="text-right">&#8377;<?php echo number_format($subtotal,2);?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="buttons clearfix">
                <div class="pull-left"><a href="index.php" class="btn btn-default">Continue Shopping</a></div>
                <div class="pull-right"><a href="checkout.php" class="btn btn-primary">Continue Purchase</a></div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include_once("footer.php");?>
