<?php include_once("header.php");?>
<?php $Orders = $mysql->select("select * from _tbl_orders where md5(concat('Jeyaraj',OrderCode))='".$_GET['Order']."'");
$items = $mysql->select("select * from _tbl_orders_items where OrderID='".$Orders[0]['OrderID']."'");
?>	
<?php $Stts = $mysql->select("select * from _tbl_order_status where OrderID='".$Orders[0]['OrderID']."' order by StatusID Desc");?>   
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
                            <!--<a href="printorder.php?id=<?php echo md5($Orders[0]['order_id']);?>" target="blank" class="btn btn-primary btn-sm">Print</a>-->
                        </div>
                    </div>
                    <h4 class="checkout-sep" style="border:none;font-size:16px;color:#555;font-weight:bold;">Order Summary</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered cart_summary">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Item Name</th>
                                    <th style="text-align:left">Unit</th>
                                    <th style="text-align:right">Price ( &#8377; )</th>
                                    <th style="text-align:right">Quantity</th>
                                    <th style="text-align:right">Total ( &#8377; )</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $subtotal=0;
                                    $i=1;
                                    foreach($items as $item){ 
                                ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $item['ProductName'];?></td>
                                        <td class="text-left"><a><?php echo $item['Units'];?>-<?php echo $item['UnitName'];?></a></td>
                                        <td style="text-align:right"><?php echo number_format($item['Price'],2);?></td>
                                        <td style="text-align:right"><?php echo $item['Qty'];?></td>
                                        <td style="text-align:right"><?php echo number_format($item['Amount'],2);?></td>
                                    </tr>
                                <?php                               
                                    $i++;
                                    } ?>
                                    <tr>
                                        <td colspan="5" style="text-align:right">Sub Total (&#8377;)</td>
                                        <td style="text-align:right;font-weight:bold"><?php echo number_format($Orders[0]['OrderTotal'],2);?></td> 
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-sm-12" style="text-align:right">
                            <h4 class="checkout-sep" style="border:none;margin-bottom:0px">Total Amount</h4>
                            <h3 style="color:red">&#8377; <?php echo number_format($Orders[0]['OrderTotal'],2);?></h3>
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
 