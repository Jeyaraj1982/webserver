<?php 
include_once("config.php");
?>
<?php 
$Orders = $mysql->select("select * from _tbl_orders where md5(OrderID)='".$_GET['id']."'");
$items = $mysql->select("select * from _tbl_orders_items where OrderID='".$Orders[0]['OrderID']."'");
?>  
<?php $Stts = $mysql->select("select * from _tbl_order_status where OrderID='".$Orders[0]['OrderID']."' order by StatusID Desc");?>                                                                                           
<div class="main-panel" style="position: relative;height: 100vh;min-height: 100%;transition: all .3s;">
	<div style="font-family:arial;font-size: 14px;letter-spacing: 0.05em;color: #2A2F5B;font-weight: 400;line-height: 1.5;">
        <div class="" style="width:850px;padding:25px;margin:0px auto;border:1px solid #333;">
            <div class="row" style="flex-wrap: wrap;">
                <div class="col-md-12" style="max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                    <div class="card" style="border-radius: 5px;background-color: #ffffff;margin-bottom: 30px;border: 0px;position: relative;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;">
                        <div class="card-body" style="padding: 0;border: 0px !important;margin: auto;flex: 1 1 auto;"> 
                            <h5 style="margin-bottom:0px;font-weight: bold;font-size:20px;margin-top: 0px;"><b>Order</b></h5>
							<h3 class="title"><strong>Order summary</strong></h3>
                            <div class="table-responsive" style="width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;">
                                    <table class="table table-striped mt-3" border="1" style="width:100%" cellspacing="0" cellpadding="3">
                                        <thead>
                                            <tr>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;">Sl</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;">Product Name</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;">Unit</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: right;">Quantity</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: right;width:120px">Price (Rs)</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: right;width:120px">Total (Rs)</th>
                                            </tr>
                                        </thead>                             
                                        <tbody>
                                        <?php 
                                            $items = $mysql->select("select * from _tbl_orders_items where OrderID='".$Orders[0]['OrderID']."'");
                                             $subtotal=0;
                                             $i=0;
                                            foreach($items as $item){ 
                                                $i++;
                                            $product=$mysql->select("select * from _tbl_products where ProductID='".$item['ProductID']."'");
                                            $subtotal+=$item['Qty']*$item['Price'];
                                        ?>
                                            <tr>                             
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right;"><?php echo $i;?>.&nbsp;</td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;"><?php echo $item['ProductName'];?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;"><?php echo $item['Units']." ".$item['UnitName'];?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($item['Qty'],2);?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right">&nbsp;</td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right">&nbsp;</td>
                                            </tr>
                                        <?php } ?> 
											<tr>
                                                <td colspan="4" style="border-bottom: 0 !important;font-size: 14px;;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align: right;font-weight:bold;">Sub Total</td>
												<td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right;font-weight:bold;width:120px">&nbsp;</td>
											</tr>
                                        <?php if(sizeof($items)=="0"){ ?>
                                            <tr>
                                                <td colspan="5" style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align: center;">No Items Found</td>
                                            </tr>                                 
                                        <?php } ?>
                                        </tbody>
                                    </table>
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