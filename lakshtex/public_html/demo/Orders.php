<?php include_once("header.php");?>
<?php $Orders = $mysql->select("select * from invoice_order where CustomerID='".$_SESSION['User']['CustomerID']."' order by order_id desc");?>	
<section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          <div class="page-content page-order"><div class="page-title">
            <h2>My Orders</h2>
          </div>
            <div class="order-detail-content" style="text-align: center;">
            <?php if(sizeof($Orders)==0){ ?>
                <div class="cart-icon" style="text-align: center;width:100%"><i class="icon-basket-loaded icons" style="font-size: 200px"></i></div>    <br>
                No Orders Found<br>
                <div class="cart_navigation"> <a class="continue-btn" href="index.php"> Continue shopping&nbsp; <i class="fa fa-arrow-right"> </i></a></div>
            <?php }else{ ?>
              <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Order Date</th>
                      <th style="text-align:right">Order Value</th>
                      <th>Status</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $subtotal=0;
                  foreach($Orders as $order) { 
				     $items = $mysql->select("select * from invoice_order_item where order_id='".$order['order_id']."'");
					 $subtotal+=$items[0]['order_item_quantity']*$items[0]['order_item_price'];
					  
                      ?> 
                    <tr> 
					  <td><?php echo $order['OrderCode'];?> 	
					  <td><?php echo date("M d, Y H:i",strtotime($order['OrderDate']));?> 	
                      <td class="price" style="text-align:right"><span><?php echo number_format($order['OrderTotal'],2);?></span></td>
                      <td>
						<?php 	if($order['OrderStatus']=="1"){
									echo "Order Placed";
								}if($order['OrderStatus']=="2"){
									echo "Cancel";
								}if($order['OrderStatus']=="3"){
									echo "Processing";
								}if($order['OrderStatus']=="4"){
									echo "Dispatched";
								}if($order['OrderStatus']=="5"){
									echo "Delivered";
								} 
						 ?>	
					  </td>
                      <td><a href="vieworder.php?id=<?php echo $order['OrderCode'];?>">view</td>
                    </tr>
                  <?php } ?>
                  </tbody>
                  
                </table>
              </div>
              <?php } ?>
              <form action="index.php">
                <button type="submit" name="btnsubmit" id="btnsubmit" style="display: none;"></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </section>

<?php include_once("footer.php");?>
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
