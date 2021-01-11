<?php include_once("config.php");?>
<?php $order = $mysql->select("select * from invoice_order where md5(order_id)='".$_GET['id']."'");
$items = $mysql->select("select * from invoice_order_item where order_id='".$order[0]['order_id']."'");
?> 
<?php $Stts = $mysql->select("select * from _tbl_order_status where OrderID='".$order[0]['order_id']."' order by StatusID Desc");?>   
<body style="background:#444;font-family:arial;font-size: 14px;letter-spacing: 0.05em;color: #2A2F5B;font-weight: 400;line-height: 1.5;">
    <div class="" style="width:850px;padding:25px;margin:0px auto;border:1px solid #333;">
        <div class="card card-invoice" style="border-radius: 5px;background-color: #ffffff;margin-bottom: 30px;box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);border: 0px;position: relative;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;">
            <div class="card-header" style="border-radius: 0px;padding: 50px 0px 20px;border: 0px !important;width: 75%;margin: auto;background-color: transparent;">
                <div class="invoice-header" style="display: flex;flex-direction: row;justify-content: space-between;align-items: center;margin-bottom: 15px;">
                    <h3 class="invoice-title" style="font-size: 27px;font-weight: 400;line-height: 1.4;margin-bottom: .5rem;color: inherit;margin-top: 0;">
                        Order
                    </h3>
                </div>
                <div class="row" style="margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;">
                    <div class="col-md-12" style="padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                        <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;max-width: 50%;position: relative;width: 100%;min-height: 1px;">
                            <?php echo $order[0]['CustomerName'];?><br>
                            <?php echo $order[0]['BillingAddress1'];?><br>
                            <?php if($order[0]['BillingAddress2']!=""){ echo $order[0]['BillingAddress2']."<br>"; }?>
                            <?php if($order[0]['BillingAddress3']!=""){ echo $order[0]['BillingAddress3']."<br>"; }?>
                            Zip/PinCode: <?php echo $order[0]['BillingPincode'];?><br>
                            <?php if($order[0]['BillingLandMark']!=""){ ?>Land-Mark: <?php echo $order[0]['BillingLandMark']."<br>";?><?php } ?>      
                            <?php echo $order[0]['CustomerEmailID'];?><br>
                            <?php echo $order[0]['CustomerMobileNumber'];?><br>
                        </div>
                        <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;text-align: right;max-width: 50%;position: relative;width: 100%;min-height: 1px;">
                            <?php echo "#".$order[0]['OrderCode'];?><br>
                            <?php echo date("M d, Y H:i",strtotime($order[0]['OrderDate']));?><br>
                            <span style="font-weight: bold;color:red"><?php echo $Stts[0]['Status'];?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" style="padding: 0;border: 0px !important;width: 75%;margin: auto;flex: 1 1 auto;">
                <div class="separator-solid" style="border-top: 1px solid #ebecec;margin: 15px 0;"></div>
                <div class="row" style="display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;">
                    <div class="col-md-12" style="flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                        <div class="invoice-detail" style="width: 100%;display: block;">
                            <div class="invoice-top">
                                <h3 class="title" style="font-size: 20px;line-height: 1.4;margin-bottom: .5rem;font-weight: 500;color: inherit;margin-top: 0;"><strong style="font-weight: 600;">Order summary</strong></h3>
                            </div>
                            <div class="invoice-item">
                                <div class="table-responsive" style="width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 5px !important;height: 60px;vertical-align: middle !important;text-align: inherit;">Item Code<br>&nbsp;</th>
                                                <th style="font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 5px !important;height: 60px;vertical-align: middle !important;text-align: inherit;">Item Name<br>&nbsp;</th>
                                                <th style="font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 5px !important;height: 60px;vertical-align: middle !important;text-align:right">Price<br><span style="font-size:11px"> (INR) </span></th>
                                                <th style="text-align:right;font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 5px !important;height: 60px;vertical-align: middle !important;text-align: inherit;">Quantity<br>&nbsp;</th>
                                                <th style="text-align:right;font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 5px !important;height: 60px;vertical-align: middle !important;text-align: inherit;">Total<br><span style="font-size:11px"> (INR) </span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                               <?php
                                                $items = $mysql->select("select * from invoice_order_item where order_id='".$order[0]['order_id']."'");
                                                $subtotal=0;
                                                    foreach($items as $item){ 
                                                    $product=$mysql->select("select * from _tbl_products where ProductID='".$item['item_code']."'");
                                                    $subtotal+=$item['order_item_quantity']*$item['order_item_price'];
                                                ?>    
                                                <tr>
                                                    <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 5px !important;height: 60px;vertical-align: middle !important;"><?php echo $product[0]['ProductCode'];?></td>
                                                    <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 5px !important;height: 60px;vertical-align: middle !important;"><?php echo $item['item_name'];?></td>
                                                    <td style="text-align:right"><?php echo number_format($item['order_item_price'],2);?></td>
                                                    <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 5px !important;height: 60px;vertical-align: middle !important;text-align:right"><?php echo $item['order_item_quantity'];?></td>
                                                    <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 5px !important;height: 60px;vertical-align: middle !important;text-align:right"><?php echo number_format($item['order_item_quantity']*$item['order_item_price'],2);?></td>
                                                </tr>
                                                <?php } ?>
                                                <tr>
                                                    <td colspan="4" style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 5px !important;height: 60px;vertical-align: middle !important;text-align:right">Sub Total (INR) </td>
                                                    <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 5px !important;height: 60px;vertical-align: middle !important;text-align:right"> <?php echo number_format($subtotal,2);?></td> 
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>    
                        <div class="separator-solid  mb-3" style="border-top: 1px solid #ebecec;margin: 15px 0;margin-bottom: 1rem !important;"></div>
                    </div>    
                </div>
            </div>
            <div class="card-footer" style="padding: 5px 0 50px;border: 0px !important;width: 75%;margin: auto;background-color: transparent;line-height: 30px;font-size: 13px;border-radius: 0 0 calc(.25rem - 1px) calc(.25rem - 1px);">
                <div class="row" style="display: flex;    flex-wrap: wrap;    margin-right: -15px;    margin-left: -15px;">
                    <div class="col-sm-7 col-md-5 mb-3 mb-md-0 transfer-to" style="margin-bottom: 0 !important;flex: 0 0 41.666667%;max-width: 41.666667%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                        
                    </div>
                    <div class="col-sm-5 col-md-7 transfer-total" style="text-align: right;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                        <h5 class="sub" style="font-size: 14px;margin-bottom: 8px;font-weight: 600;line-height: 1.4;">Total Amount </h5>
                        <div class="price" style="font-size: 28px;color: #1572E8;padding: 7px 0;font-weight: 600;"><span style="font-size: 14px;">INR&nbsp;</span><?php echo number_format($subtotal,2);?></div>
                    </div>
                </div>
                <div class="separator-solid" style="border-top: 1px solid #ebecec;margin: 15px 0;"></div>
                <div class="col-sm-12" style="max-width: 100%;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;">
                    <h5 class="sub" style="margin-bottom:0px;font-size: 14px;font-weight: 600;line-height: 1.4;">Order Staus</h5>
                    <div class="table-responsive" style="width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;">Status</th>
                                    <th style="font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;">Status On</th>
                                    <th style="font-weight: 600;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: inherit;">Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $statuses = $mysql->select("select * from _tbl_order_status where OrderID='".$order[0]['order_id']."' order by StatusID desc");
                                    foreach($statuses as $status){ 
                                ?>
                                    <tr>
                                        <td style="height: auto !important;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 5 25px !important;vertical-align: middle !important;"><?php echo $status['Status'];?></td>
                                        <td style="height: auto !important;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 5 25px !important;vertical-align: middle !important;"><?php echo date("M d, Y H:i",strtotime($status['StatusOn']));?></td>
                                        <td style="height: auto !important;border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 5 25px !important;vertical-align: middle !important;"><?php echo $status['Remarks'];?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>                                                                                                                                               
                </div>
            </div>
        </div>
    </div>
</body>