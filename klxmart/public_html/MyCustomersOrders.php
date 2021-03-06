<?php include_once("header.php");?>
<?php $Orders = $mysql->select("SELECT * FROM _tbl_orders WHERE MD5(CONCAT('Jeyaraj',CustomerID))='".$_GET['Customer']."' order by OrderID desc");

?>	
<div id="checkout-cart" class="container">
    <ul class="breadcrumb">
        <li><a href="http://templatetasarim.com/opencart/Basket/index.php?route=common/home">Home</a></li>
        <li><a href="http://templatetasarim.com/opencart/Basket/index.php?route=checkout/cart">My Customer's Orders</a></li>
    </ul>
    <div class="row">
        <div id="content" class="col-sm-12">
            <h1 class="heading">My Customer's Orders</h1>
            <?php if(sizeof($Orders)==0){ ?>
                <div class="cart-icon" style="text-align: center;width:100%"><i class="icon-basket-loaded icons" style="font-size: 200px"></i></div>    <br>
                No Orders Found<br>
                <div class="cart_navigation"> <a class="continue-btn" href="index.php"> Continue shopping&nbsp; <i class="fa fa-arrow-right"> </i></a></div>
            <?php }else{ ?>
			<form action="" method="post" enctype="multipart/form-data">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
								<th>Order Date</th>
								<th style="text-align:right">Order Value (&#8377;)</th>
                                <th>Status</th>
								<th style="text-align:right;">Possible Earning</th>
								<th style="text-align:right;">Earned</th>
                            </tr>
                        </thead>
                        <tbody>
                  <?php 
                  foreach($Orders as $order) { 
				     $items = $mysql->select("select * from _tbl_orders_itmes where OrderID='".$order['OrderID']."'");
                      ?> 
                    <tr> 
					  <td><?php echo date("M d, Y H:i",strtotime($order['OrderDate']));?> 	
                      <td class="price" style="text-align:right"><span><?php echo number_format($order['OrderTotal'],2);?></span></td>
                      <td>
						<?php 	if($order['OrderStatus']=="1"){
									echo "Order Placed";
								}if($order['OrderStatus']=="2"){
									echo "Confirmed";
								}if($order['OrderStatus']=="3"){
									echo "Cancel";
								}if($order['OrderStatus']=="4"){
									echo "Processing";
								}if($order['OrderStatus']=="5"){
                                    echo "Dispatched";
                                }if($order['OrderStatus']=="6"){
									echo "Delivered";
								} 
						 ?>	
					  </td>
                      <td  style="text-align:right;">
                      <?php   echo isset($order['TotalUplevelCommission']) ? number_format($order['TotalUplevelCommission'],2) : "0.00"; ?><Br>
                      <?php   echo isset($order['TotalUplevelCommissionL2']) ? number_format($order['TotalUplevelCommissionL2'],2) : "0.00"; ?><br>
                      <?php   echo isset($order['TotalUplevelCommissionL3']) ? number_format($order['TotalUplevelCommissionL3'],2) : "0.00"; ?>
                      </td>
                      <td  style="text-align:right;">
                      <?php  echo ($order['InvoiceID']>0) ? number_format($order['TotalUplevelCommission'],2) : "0.00"; ?> <bR>
                      <?php  echo ($order['InvoiceID']>0) ? number_format($order['TotalUplevelCommissionL2'],2) : "0.00"; ?>   <br>
                      <?php  echo ($order['InvoiceID']>0) ? number_format($order['TotalUplevelCommissionL3'],2) : "0.00"; ?>
                      </td>
                      <td  style="text-align:right;"><a href="MyCustomersOrdersView.php?Order=<?php echo md5("Jeyaraj".$order['OrderCode']);?>">view</td>
                    </tr>
                  <?php } ?>
                  </tbody>
                    </table>
                </div>
            </form>
           
            <div class="buttons clearfix">
                <div class="pull-left"><a href="MyReferredCustomers.php" class="btn btn-default">Back</a></div>
               
            </div>
        <?php } ?>
		</div>
    </div>
</div>
<?php include_once("footer.php");?>
