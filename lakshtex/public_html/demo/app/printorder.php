<?php 
include_once("../config.php");
?>
<?php 
$Orders = $mysql->select("select * from invoice_order where md5(order_id)='".$_GET['id']."'");
$items = $mysql->select("select * from invoice_order_item where order_id='".$Orders[0]['order_id']."'");
?>  
<?php $Stts = $mysql->select("select * from _tbl_order_status where OrderID='".$Orders[0]['order_id']."' order by StatusID Desc");?>                                                                                           
<div class="main-panel" style="position: relative;height: 100vh;min-height: 100%;transition: all .3s;">
	<div style="font-family:arial;font-size: 14px;letter-spacing: 0.05em;color: #2A2F5B;font-weight: 400;line-height: 1.5;">
        <div class="" style="width:850px;padding:25px;margin:0px auto;border:1px solid #333;">
            <div class="row" style="flex-wrap: wrap;">
                <div class="col-md-12" style="max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                    <div class="card" style="border-radius: 5px;background-color: #ffffff;margin-bottom: 30px;border: 0px;position: relative;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;">
                        <div class="card-body" style="padding: 0;border: 0px !important;margin: auto;flex: 1 1 auto;"> 
                            <h5 style="margin-bottom:0px;font-weight: bold;font-size:20px;margin-top: 0px;"><b>Order</b></h5>
                            <div class="row" style="margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;">
                                <div class="col-md-12" style="padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;max-width: 50%;position: relative;width: 100%;min-height: 1px;">
                                        <h5 style="margin-bottom:0px;font-weight: bold;font-size:15px"><b>Customer Details</b></h5>
                                         <b><?php echo $Orders[0]['CustomerName'];?></b><br>
                                         <?php echo $Orders[0]['BillingAddress1'];?><br>
                                         <?php if($Orders[0]['BillingAddress2']!=""){ echo $Orders[0]['BillingAddress2']."<br>"; }?>
                                         <?php if($Orders[0]['BillingAddress3']!=""){ echo $Orders[0]['BillingAddress3']."<br>"; }?>
                                         Zip/PinCode: <?php echo $Orders[0]['BillingPincode'];?><br>
                                         <?php if($Orders[0]['BillingLandMark']!=""){ ?>Land-Mark: <?php echo $Orders[0]['BillingLandMark']."<br>";?><?php } ?><br>    
                                         <?php echo $Orders[0]['CustomerEmailID'];?><br>
                                         <?php echo $Orders[0]['CustomerMobileNumber'];?><br>
                                    </div>
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;text-align: right;max-width: 50%;position: relative;width: 100%;min-height: 1px;">
                                        <h5 style="margin-bottom:0px;font-weight: bold;font-size:15px"><b>Order Details</b></h5>
                                        <?php echo "Order Number: ".$Orders[0]['OrderCode'];?><br>
                                        <?php echo date("M d, Y H:i",strtotime($Orders[0]['OrderDate']));?><br>
                                        <span style="font-weight: bold;color:red"><?php echo $Stts[0]['Status'];?></span>
										 
                                    </div>
                                </div>                          
                            </div>                                                                     
                            <br><br>
							<h3 class="title"><strong>Order summary</strong></h3>
                            <div class="table-responsive" style="width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;">
                                    <table class="table table-striped mt-3" border="1" style="width:100%" cellspacing="0" cellpadding="3">
                                        <thead>
                                            <tr>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;">Item Code</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;">Item Name</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: right;">Price (Rs)</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: right;">Quantity</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: right;">Total (Rs)</th>
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
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;"><?php echo $product[0]['ProductCode'];?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;"><?php echo $item['item_name'];?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($item['order_item_price'],2);?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo $item['order_item_quantity'];?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($item['order_item_quantity']*$item['order_item_price'],2);?></td>
                                            </tr>
                                        <?php } ?> 
											<tr>
                                                <td colspan="4" style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align: right;">Sub Total</td>
												<td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($subtotal,2);?></td>
											</tr>
                                        <?php if(sizeof($items)=="0"){ ?>
                                            <tr>
                                                <td colspan="5" style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align: center;">No Items Found</td>
                                            </tr>                                 
                                        <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                            <div class="row" style="flex-wrap: wrap;margin-right: -15px;margin-left: -15px;">
					            <div class="col-sm-12 transfer-total" style="text-align: right;display: flex;flex-direction: column;justify-content: center;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;">
						            <h5 class="sub" style="font-size: 14px;margin-bottom: 8px;font-weight: 600;line-height: 1.4;">Total Amount</h5>
						            <div class="price" style="font-size: 28px;padding: 7px 0;font-weight: 600;">Rs <?php echo number_format($Orders[0]['OrderTotal'],2);?></div>
					            </div><br><br><br><br>
				            </div>                                
                        </div>                                                                                                                                             
						
					</div>                                                                                             
                </div>
            </div>
        </div>
    </div>

</div>
 <script>
 window.print();
 </script>