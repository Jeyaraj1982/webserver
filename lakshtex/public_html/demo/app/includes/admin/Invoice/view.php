<?php $Invoice = $mysql->select("select * from tbl_invoice where md5(InvoiceID)='".$_GET['id']."'");
$items = $mysql->select("select * from _tbl_invoice_item where InvoiceID='".$Invoice[0]['InvoiceID']."'");
?>    
<?php $Stts = $mysql->select("select * from _tbl_order_status where OrderID='".$Invoice[0]['OrderID']."' order by StatusID Desc");?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
	            <div class="col-md-12">
		            <div class="card card-invoice">
			            <div class="card-header">
				            <div class="invoice-header">
					            <h3 class="invoice-title">
						            Invoice
					            </h3>
					            <div class="invoice-logo">
						            <img src="../assets/img/examples/logoinvoice.svg" alt="company logo">
					            </div>
				            </div>
                            <div class="row" style="margin-right:0px;margin-left:0px">
                                <div class="col-md-12" style="padding-right:0px;padding-left:0px">
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;">
                                        <h5 style="margin-bottom:0px;font-weight: bold;">Customer Details</h5>
                                        <b><?php echo $Invoice[0]['CustomerName'];?></b><br>
                                        <?php echo $Invoice[0]['BillingAddress1'];?><br>
                                        <?php if($Invoice[0]['BillingAddress2']!=""){ echo $Invoice[0]['BillingAddress2']."<br>"; }?>
                                        <?php if($Invoice[0]['BillingAddress3']!=""){ echo $Invoice[0]['BillingAddress3']."<br>"; }?>
                                        Zip/PinCode: <?php echo $Invoice[0]['BillingPincode'];?><br>
                                        <?php if($Invoice[0]['BillingLandMark']!=""){ ?>Land-Mark: <?php echo $Invoice[0]['BillingLandMark']."<br>";?><?php } ?><br>    
                                        <?php echo $Invoice[0]['CustomerEmailID'];?><br>
                                        <?php echo $Invoice[0]['CustomerMobileNumber'];?><br>
                                    </div>
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;text-align: right;">
                                        <h5 style="margin-bottom:0px;font-weight: bold;">Invoice Details</h5>
                                        <?php echo "Invoice Number: ".$Invoice[0]['InvoiceCode'];?><br>
                                        <?php echo date("M d, Y H:i",strtotime($Invoice[0]['InvoiceDate']));?><br> <br>
                                        <h5 style="margin-bottom:0px;font-weight: bold;">Order Details</h5>
                                        <?php echo "Order Number: ".$Invoice[0]['OrderCode'];?><br>
                                        <?php echo date("M d, Y H:i",strtotime($Invoice[0]['OrderDate']));?><br>
                                         <br><br><br><br><br>
                                        <a href="printinvoice.php?id=<?php echo md5($Invoice[0]['InvoiceID']);?>" target="blank" class="btn btn-primary btn-sm">Print</a>
				                    </div>
                                </div>
			                </div>
                        </div>
			            <div class="card-body">
				        <div class="row">
					        <div class="col-md-12">
						        <div class="invoice-detail">
							        <div class="invoice-top">
								        <h3 class="title"><strong>Invoice summary</strong></h3>
							        </div>
                                    <div class="separator-solid"></div>
							        <div class="invoice-item">
								        <div class="table-responsive">
									        <table class="table table-striped">
										        <thead>
											        <tr>
												        <th>Item Code<br>&nbsp;</th>
                                                        <th>Item Name<br>&nbsp;</th>
                                                        <th style="text-align:right">Price<br> ( <i class="fas fa-rupee-sign"></i> )</th>
                                                        <th style="text-align:right">Quantity<br>&nbsp;</th>
                                                        <th style="text-align:right">Total<br> ( <i class="fas fa-rupee-sign"></i> )</th>
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
                                                            <td><?php echo $item['item_name'];?></td>
                                                            <td style="text-align:right"><?php echo number_format($item['invoice_item_price'],2);?></td>
                                                            <td style="text-align:right"><?php echo $item['invoice_item_quantity'];?></td>
                                                            <td style="text-align:right"><?php echo number_format($item['invoice_item_quantity']*$item['invoice_item_price'],2);?></td>
                                                        </tr>
                                                    <?php } ?>
                                                        <tr>
                                                            <td colspan="4" style="text-align:right">Sub Total ( <i class="fas fa-rupee-sign"></i> )</td>
                                                            <td style="text-align:right"> <?php echo number_format($subtotal,2);?></td> 
                                                        </tr>
                                                </tbody>
									        </table>
								        </div>
							        </div>
						        </div>	
						        <div class="separator-solid  mb-3" style="margin-top:0px"></div>
					        </div>	
				        </div>
			        </div>
			            <div class="card-footer">
				            <div class="row">
					            <div class="col-sm-7 col-md-5 mb-3 mb-md-0 transfer-to">
						            
					            </div>
					            <div class="col-sm-5 col-md-7 transfer-total">
						            <h5 class="sub">Total Amount</h5>
						            <div class="price"><i class="fas fa-rupee-sign"></i> <?php echo number_format($subtotal,2);?></div>
					            </div>
				            </div>
				            <div class="separator-solid"></div>
			            </div>
		            </div>
	            </div>
            </div>
        </div>
    </div>
</div>

