<?php include_once("header.php");?>
<?php $Orders = $mysql->select("select * from invoice_order where OrderCode='".$_GET['id']."'");
$items = $mysql->select("select * from invoice_order_item where order_id='".$Orders[0]['order_id']."'");
?>	
<?php $Stts = $mysql->select("select * from _tbl_order_status where OrderID='".$Orders[0]['order_id']."' order by StatusID Desc");?>   
<div class=" " style="">
<section class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <div class="col-main col-sm-9 col-xs-12">
                    
                <div class="page-content checkout-page">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class='checkout-sep' style="border:none;margin-bottom:0px">Customer Details</h4>
                            <b><?php echo $Orders[0]['CustomerName'];?></b><br>
                            <?php echo $Orders[0]['BillingAddress1'];?><br>
                            <?php if($Orders[0]['BillingAddress2']!=""){ echo $Orders[0]['BillingAddress2']."<br>"; }?>
                            <?php if($Orders[0]['BillingAddress3']!=""){ echo $Orders[0]['BillingAddress2']."<br>"; }?>
                            Zip/PinCode: <?php echo $Orders[0]['BillingPincode'];?><br>
                            <?php if($Orders[0]['BillingLandMark']!=""){ ?>Land-Mark: <?php echo $Orders[0]['BillingLandMark']."<br>";?><?php } ?><br>    
                            <?php echo $Orders[0]['CustomerEmailID'];?><br>
                            <?php echo $Orders[0]['CustomerMobileNumber'];?><br>
                        </div>
                        <div class="col-sm-6" style="text-align:right">
                            <h4 class='checkout-sep' style="border:none;margin-bottom:0px">Order Details</h4>
                            <?php echo "Order Number: ".$Orders[0]['OrderCode'];?><br>
                            <?php echo date("M d, Y H:i",strtotime($Orders[0]['OrderDate']));?><br>
                            <span style="font-weight: bold;color:red"><?php echo $Stts[0]['Status'];?></span><br><br><br><br><br><br>
                            <a href="printorder.php?id=<?php echo md5($Orders[0]['order_id']);?>" target="blank" class="btn btn-primary btn-sm">Print</a>
                        </div>
                    </div>
                    <hr>
                    <h4 class="checkout-sep" style="border:none;margin-bottom:0px">Order Summary</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered cart_summary">
                            <thead>
                                <tr>
                                    <th>Item Code</th>
                                    <th>Item Name</th>
                                    <th style="text-align:right">Price ( &#8377; )</th>
                                    <th style="text-align:right">Quantity</th>
                                    <th style="text-align:right">Total ( &#8377; )</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $items = $mysql->select("select * from invoice_order_item where order_id='".$Orders[0]['order_id']."'");
                                    $subtotal=0;
                                    foreach($items as $item){ 
                                    $product=$mysql->select("select * from _tbl_products where ProductID='".$item['item_code']."'");
                                    $subtotal+=$item['order_item_quantity']*$item['order_item_price'];
                                ?>
                                    <tr>
                                        <td><?php echo $product[0]['ProductCode'];?></td>
                                        <td><?php echo $item['item_name'];?></td>
                                        <td style="text-align:right"><?php echo number_format($item['order_item_price'],2);?></td>
                                        <td style="text-align:right"><?php echo $item['order_item_quantity'];?></td>
                                        <td style="text-align:right"><?php echo number_format($item['order_item_quantity']*$item['order_item_price'],2);?></td>
                                    </tr>
                                <?php } ?>
                                    <tr>
                                        <td colspan="4" style="text-align:right">Sub Total</td>
                                        <td style="text-align:right">&#8377; <?php echo number_format($subtotal,2);?></td> 
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-12" style="text-align:right">
                            <h4 class="checkout-sep" style="border:none;margin-bottom:0px">Total Amount</h4>
                            <h3 style="color:red">&#8377; <?php echo number_format($subtotal,2);?></h3>
                        </div>
                    </div>
                    <hr>
                    <h4 class="checkout-sep" style="border:none;margin-bottom:0px">Order Status</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered cart_summary">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Status On</th>
                                    <th>Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $statuses = $mysql->select("select * from _tbl_order_status where OrderID='".$Orders[0]['order_id']."' order by StatusID desc");?>
                                <?php foreach($statuses as $status){ ?>
                                    <tr>
                                        <td style="height: auto !important;"><?php echo $status['Status'];?></td>
                                        <td style="height: auto !important;"><?php echo date("M d, Y H:i",strtotime($status['StatusOn']));?></td>
                                        <td style="height: auto !important;"><?php echo $status['Remarks'];?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="jtv-service-area">
    <div class="container">
      <div class="row">
        <div class="col col-md-3 col-sm-6 col-xs-12">
          <div class="block-wrapper ship">
            <div class="text-des">
              <div class="icon-wrapper"><i class="fa fa-paper-plane"></i></div>
              <div class="service-wrapper">
                <h3>World-Wide Shipping</h3>
                <p>On order over $99</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col col-md-3 col-sm-6 col-xs-12 ">
          <div class="block-wrapper return">
            <div class="text-des">
              <div class="icon-wrapper"><i class="fa fa-rotate-right"></i></div>
              <div class="service-wrapper">
                <h3>30 Days Return</h3>
                <p>Moneyback guarantee </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col col-md-3 col-sm-6 col-xs-12">
          <div class="block-wrapper support">
            <div class="text-des">
              <div class="icon-wrapper"><i class="fa fa-umbrella"></i></div>
              <div class="service-wrapper">
                <h3>Support 24/7</h3>
                <p>Call us: ( +123 ) 456 789</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col col-md-3 col-sm-6 col-xs-12">
          <div class="block-wrapper user">
            <div class="text-des">
              <div class="icon-wrapper"><i class="fa fa-tags"></i></div>
              <div class="service-wrapper">
                <h3>Member Discount</h3>
                <p>25% on order over $199</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>