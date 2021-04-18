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
                            <table style="width: 100%;" cellpadding="0" cellspacing="0"> 
                                <tr>
                                    <td style="width:50%">
                                        <img src="<?php echo $_CONFIG['LOGO_URL']; ?>"  style="height:80px !important;max-width:none !important;margin-left:0px !important;">
                                    </td>
                                    <td style="text-align: right;">
                                        <?php 
                                            $settings = $mysql->select("select * from _tbl_settings");
                                            foreach($settings as $setting) {
                                                if ($setting['Param']=="CompanyName") {
                                                   echo "<B>".$setting['ParamValue']."</B><br>";
                                                }
                                                 if ($setting['Param']=="AddressLine1") {
                                                   echo $setting['ParamValue']."</B><br>";
                                                }
                                                 if ($setting['Param']=="AddressLine2") {
                                                   echo $setting['ParamValue']."<br>";
                                                }
                                                
                                                 if ($setting['Param']=="AddressLine3") {
                                                   echo $setting['ParamValue']."<br>";
                                                }
                                                
                                                 if ($setting['Param']=="MobileNumber") {
                                                   echo $setting['ParamValue']."<br>";
                                                }
                                                
                                                  if ($setting['Param']=="EmailID") {
                                                   echo $setting['ParamValue']."<br>";
                                                }
                                                
                                                  if ($setting['Param']=="Website") {
                                                   echo $setting['ParamValue']."<br>";
                                                }
                                            }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                            <hr style="border:none;border-top:1px solid #ccc;margin-top:20px;margin-bottom: 20px;">
                            <h5 style="margin-bottom:0px;font-weight: bold;font-size:20px;margin-top: 0px;text-align:center"><b>Order Information</b></h5>
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
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;">Sl</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;">Product Name</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;">Unit</th>
                                                
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: right;">M.R.P (Rs)</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: right;">GB Price (Rs)</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: right;">Quantity</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: right;">Total (Rs)</th>
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
                                                
                                               <!-- <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right">
                                                 <table style="width: 100%;" cellpadding="0" cellspacing="0" border="0">
                                                <tr>
                                                    <td style="text-align: right;width:50%">
                                                    <?php if (($item['MRP']-$item['Price'])>0) { ?>
                                                        (<span style="text-decoration: line-through"><?php echo number_format($item['MRP'],2);?></span>)&nbsp;&nbsp;
                                                       
                                                  <?php } ?>
                                                     </td>
                                                     <td style="text-align: right;">
                                                      <?php echo number_format($item['Price'],2);?>
                                                     </td>
                                                </tr>
                                            </table>
                                                </td>  -->
                                                 <td style="text-align:right"><?php echo number_format($item['MRP'],2);?></td>
                                          <td style="text-align:right"><?php echo number_format($item['Price'],2);?></td>
                                          <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($item['Qty'],2);?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($item['Qty']*$item['Price'],2);?></td>
                                            </tr>
                                        <?php } ?> 
											<tr>
                                                <td colspan="6" style="border-bottom: 0 !important;font-size: 14px;;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align: right;font-weight:bold;">Sub Total</td>
												<td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right;font-weight:bold;"><?php echo number_format($subtotal,2);?></td>
											</tr>
                                            
                                        <?php if(sizeof($items)=="0"){ ?>
                                            <tr>
                                                <td colspan="5" style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align: center;">No Items Found</td>
                                            </tr>                                 
                                        <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                            <div>
                                <table style="width: 100%;" cellpadding="0" cellspacing="0">
                                    <tr>
                                    <td style="width: 50%;"> 
                                <?php if ($Orders[0]['OrderSavedAmount']>0) {?>
                                           <h5 class="sub" style="font-size: 14px;margin-bottom: 8px;font-weight: bold;line-height: 1.4;">You Saved</h5>
                                    <div class="price" style="font-size: 28px;padding: 7px 0;font-weight: 600;">Rs <?php echo number_format($Orders[0]['OrderSavedAmount'],2);?></div>
                                <?php } ?>
                                </td>
                                <td style="text-align: right;">
                                      <h5 class="sub" style="font-size: 14px;margin-bottom: 8px;font-weight: bold;line-height: 1.4;">Total Amount</h5>
                                    <div class="price" style="font-size: 28px;padding: 7px 0;font-weight: 600;">Rs <?php echo number_format($Orders[0]['OrderTotal'],2);?></div>
                                </td>
                               </tr>
                               </table>  
                            </div>
                            <br><br><br><br>
                                                       
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