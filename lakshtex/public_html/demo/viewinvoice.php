<?php include_once("header.php");?>

<?php $Invoice = $mysql->select("select * from tbl_invoice where InvoiceCode='".$_GET['id']."'");
$items = $mysql->select("select * from _tbl_invoice_item where InvoiceID='".$Invoice[0]['InvoiceID']."'");
?> 
<div class=" " style="">
<section class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <div class="col-main col-sm-9 col-xs-12">
                    
                <div class="page-content checkout-page">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class='checkout-sep' style="border:none;margin-bottom:0px">Customer Details</h4>
                            <b><?php echo $Invoice[0]['CustomerName'];?></b><br>
                            <?php echo $Invoice[0]['BillingAddress1'];?><br>
                            <?php if($Invoice[0]['BillingAddress2']!=""){ echo $Invoice[0]['BillingAddress2']."<br>"; }?>
                            <?php if($Invoice[0]['BillingAddress3']!=""){ echo $Invoice[0]['BillingAddress3']."<br>"; }?>
                            Zip/PinCode: <?php echo $Invoice[0]['BillingPincode'];?><br>
                            <?php if($Invoice[0]['BillingLandMark']!=""){ ?>Land-Mark: <?php echo $Invoice[0]['BillingLandMark']."<br>";?><?php } ?><br>
                            <?php echo $Invoice[0]['CustomerEmailID'];?><br>
                            <?php echo $Invoice[0]['CustomerMobileNumber'];?><br>   
                        </div>
                        <div class="col-sm-6" style="text-align:right">
                            <h4 class='checkout-sep' style="border:none;margin-bottom:0px">Invoice Details</h4>
                            <?php echo "Invoice Number: ".$Invoice[0]['InvoiceCode'];?><br>
                            <?php echo date("M d, Y H:i",strtotime($Invoice[0]['InvoiceDate']));?><br><br>
                            <h4 class='checkout-sep' style="border:none;margin-bottom:0px">Order Details</h4>
                            <?php echo "Order Number: ".$Invoice[0]['OrderCode'];?><br>
                            <?php echo date("M d, Y H:i",strtotime($Invoice[0]['OrderDate']));?><br><br>
                             <a href="printinvoice.php?id=<?php echo md5($Invoice[0]['InvoiceID']);?>" target="blank" class="btn btn-primary btn-sm">Print</a>
                        </div>
                    </div>
                    <hr>
                    <h4 class="checkout-sep" style="border:none;margin-bottom:0px">Invoice Summary</h4>
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
                                        $subtotal=0;
                                        foreach($items as $item){ 
                                        $product=$mysql->select("select * from _tbl_products where ProductID='".$item['item_code']."'");
                                        $subtotal+=$item['invoice_item_quantity']*$item['invoice_item_price'];
                                    ?>                                                                                                                 
                                    <tr>
                                        <td><?php echo $product[0]['ProductCode'];?></td>
                                        <td><?php echo $item['item_name'];?><br><?php echo $item['item_description'];?></td>
                                        <td style="text-align:right"><?php echo number_format($item['invoice_item_price'],2);?></td>
                                        <td style="text-align:right"><?php echo $item['invoice_item_quantity'];?></td>
                                        <td style="text-align:right"><?php echo number_format($item['invoice_item_quantity']*$item['invoice_item_price'],2);?></td>
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