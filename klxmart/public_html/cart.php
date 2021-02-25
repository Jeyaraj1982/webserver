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
            <form action="" method="post" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td class="text-center">Image</td>
                                <td class="text-left">Product Name</td>
                                <td class="text-left">Quantity</td>
                                <td class="text-right">Unit Price</td>
                                <td class="text-right">Total</td>
                            </tr>
                        </thead>
                        <tbody>
						<?php 
							$subtotal=0;
							foreach($_SESSION['items'] as $item) { 
							$subtotal+=$item['Qty']*$item['Price'];
						?>
                            <tr>
                                <td class="text-center">
                                    <a href="uploads/<?php echo $item['ProductImage'];?>">
                                        <img src="uploads/<?php echo $item['ProductImage'];?>" class="img-thumbnail" style="height:64px" />
                                    </a>
                                </td>
                                <td class="text-left"><a><?php echo $item['ProductName'];?></a></td>
                                <td class="text-left">
                                    <div class="input-group btn-block" style="max-width: 200px;">
                                        <input type="text" name="quantity[137]" value="<?php echo $item['Qty'];?>" size="1" class="form-control" />
                                        <span class="input-group-btn">
                                            <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-primary cartbt"><i class="fa fa-refresh"></i></button>
                                            <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-danger" onclick="CallConfirmation('<?php echo $item['ProductID'];?>')"><i class="fa fa-times-circle"></i></button>
                                        </span>
                                    </div>
                                </td>
                                <td class="text-right">&#8377;<?php echo number_format($item['Price'],2);?></td>
                                <td class="text-right">&#8377;<?php echo number_format($item['Qty']*$item['Price'],2);?></td>
                            </tr>
						<?php } ?>
                        </tbody>
                    </table>
                </div>
            </form>
           
            <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                    <table class="table table-bordered">
                        <tr>
                            <td class="text-right"><strong>Sub-Total:</strong></td>
                            <td class="text-right">&#8377;<?php echo number_format($item['Qty']*$item['Price'],2);?></td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>Total:</strong></td>
                            <td class="text-right">&#8377;<?php echo number_format($item['Qty']*$item['Price'],2);?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="buttons clearfix">
                <div class="pull-left"><a href="index.php" class="btn btn-default">Continue Shopping</a></div>
                <div class="pull-right"><a href="checkout.php" class="btn btn-primary">Checkout</a></div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include_once("footer.php");?>
