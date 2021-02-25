<?php include_once("header.php");?>
<?php $Orders = $mysql->select("select * from _tbl_orders where md5(concat('Jeyaraj',OrderCode))='".$_GET['Order']."'");
$items = $mysql->select("select * from _tbl_orders_items where OrderID='".$Orders[0]['OrderID']."'");
?>	
<?php $Stts = $mysql->select("select * from _tbl_order_status where OrderID='".$Orders[0]['OrderID']."' order by StatusID Desc");?>   
<div class=" " style="">
<section class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <div class="col-main col-sm-10 col-xs-12">
                    
                <div class="page-content checkout-page">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class='checkout-sep' style="border:none;margin-bottom:0px">Customer Details</h4>
                            <b><?php echo $Orders[0]['CustomerName'];?></b><br>
                        </div>
                        <div class="col-sm-6" style="text-align:right">
                            <h4 class='checkout-sep' style="border:none;margin-bottom:0px">Order Details</h4>
                            <?php echo date("M d, Y H:i",strtotime($Orders[0]['OrderDate']));?><br>
                            <span style="font-weight: bold;color:red"><?php echo $Stts[0]['Status'];?></span><br>
                        </div>
                    </div>
                    <hr>
                    <h4 class="checkout-sep" style="border:none;font-size:15px">Order Summary</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered cart_summary">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th style="text-align:right">Price (&#8377;)</th>
                                    <th style="text-align:right">Quantity</th>
                                    <th style="text-align:right">Total (&#8377;)</th> 
                                    <th style="text-align:right">Earnings Per Qty (&#8377;)</th> 
                                    <th style="text-align:right">Total Possible Earning (&#8377;)</th> 
                                    <th style="text-align:right">Total Earned (&#8377;)</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($items as $item){ ?>
                                    <tr>
                                        <td><?php echo $item['ProductName'];?></td>
                                        <td style="text-align:right"><?php echo number_format($item['Price'],2);?></td>
                                        <td style="text-align:right"><?php echo $item['Qty'];?></td>
                                        <td style="text-align:right"><?php echo number_format($item['Amount'],2);?></td>
                                        <td style="text-align:right">
                                            <?php echo number_format($item['ProductCommission'],2);?><br>
                                            <?php echo number_format($item['ProductCommissionL2'],2);?><br>
                                            <?php echo number_format($item['ProductCommissionL3'],2);?>
                                            
                                        </td>
                                        <td style="text-align:right">
                                        
                                        <?php echo number_format($item['TotalCommission'],2);?> <br>
                                        <?php echo number_format($item['TotalCommissionL2'],2);?><br>
                                        <?php echo number_format($item['TotalCommissionL3'],2);?>
                                        
                                        
                                        </td>
                                        <td style="text-align:right">
                                            <?php echo number_format($Orders[0]['InvoiceID']>0 ? $item['TotalCommission'] : 0.00,2);?><br>
                                            <?php echo number_format($Orders[0]['InvoiceID']>0 ? $item['TotalCommissionL2'] : 0.00,2);?><br>
                                            <?php echo number_format($Orders[0]['InvoiceID']>0 ? $item['TotalCommissionL3'] : 0.00,2);?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr style="font-weight:bold;">
                                        <td></td>
                                        <td style="text-align:right"> </td>
                                        <td style="text-align:right"> </td>
                                        <td style="text-align:right"><?php echo number_format($Orders[0]['OrderTotal'],2);?></td>
                                        <td style="text-align:right"></td>
                                        <td style="text-align:right"><?php echo number_format($Orders[0]['TotalUplevelCommission']+$Orders[0]['TotalUplevelCommissionL2']+$Orders[0]['TotalUplevelCommissionL3'],2);?></td>
                                        <td style="text-align:right"><?php echo number_format($Orders[0]['InvoiceID']>0 ? $Orders[0]['TotalUplevelCommission']+$Orders[0]['TotalUplevelCommissionL2']+$Orders[0]['TotalUplevelCommissionL3'] : 0.00,2);?></td>
                                    </tr>
                                    
                            </tbody>
                        </table>
                    </div>
                  
                </div>
            </div>
        </div>
    </section>
</div>
 