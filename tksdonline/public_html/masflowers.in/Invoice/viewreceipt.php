<?php 
    $receipt  = $mysql->select("SELECT * FROM receipt WHERE md5(ReceiptID) = '".$_GET['receipt_id']."'");
    $receiptDate = date("d/M/Y, H:i:s", strtotime($receipt[0]['receipt_date'])); 
    $invoiceValues  = $mysql->select("SELECT * FROM invoice_order WHERE order_id = '".$receipt[0]['order_id']."'");
    $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceValues[0]['order_date'])); 
    $invoiceItems = $mysql->select("SELECT * FROM invoice_order_item WHERE order_id = '".$invoiceValues[0]['order_id']."'"); 
   
?>
<div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-10 col-xl-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-invoice">
                                        <div class="card-header">
                                            <div class="invoice-header">
                                                <h3 class="invoice-title">
                                                    Receipt
                                                </h3><br>
                                                <div class="invoice-logo">
                                                    <img src="<?php echo $Logo;?>" alt="company logo">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="invoice-desc" style="text-align: left;">
                                                    <?php echo ShopName; ?><br>                           
                                                    <?php echo FromName; ?><br>
                                                    <?php echo MobileNumber; ?><br>
                                                    <?php echo Email; ?><br>
                                                    <?php echo Address1; ?><br>
                                                    <?php echo Address2; ?><br>
                                                    <?php echo Address3; ?><br>
                                                    <?php echo Pincode; ?><br>
                                                </div>
                                            </div>
                                                <div class="col-md-6">
                                                <div class="invoice-desc">
                                                    <h5 class="sub">Receipt To</h5>
                                                    <p>
                                                        <?php echo $invoiceValues[0]['order_receiver_name'];?><br />
                                                        <?php echo $invoiceValues[0]['order_receiver_address'];?><br /> 
                                                        Receipt ID : <?php echo $receipt[0]['receipt_code'];?><br />
                                                        Receipt Date : <?php echo $receiptDate;?><br />
                                                    </p>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="separator-solid"></div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="invoice-detail">
                                                        <div class="invoice-item">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped">
                                                                    <tr style="background:white">
                                                                        <td class="text-right">
                                                                            <p>Total Amount: </p>
                                                                            <p>Paid Amount:  </p>
                                                                            <p>Payable Amount:  </p>
                                                                            <p>Receipt Amount:  </p>
                                                                            <p>Txn Mode:  </p>
                                                                        </td>
                                                                        <td class="text-right" style="width: 150px;">
                                                                            <p><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format($invoiceValues[0]['order_total_after_tax'],2);?> </p>
                                                                            <p><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format($invoiceValues[0]['order_amount_paid'],2);?> </p>
                                                                            <p><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format($invoiceValues[0]['order_total_amount_due'],2);?> </p>
                                                                            <p><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format($receipt[0]['receipt_amount'],2);?> </p>
                                                                            <p> <?php echo $invoiceValues[0]['TransactionMode'];?> </p>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            
                                                                <?php if($invoiceValues[0]['TransactionMode']=="Cash"){ ?> 
                                                                <div class="row">
                                                                <div class="col-md-12" style="text-align:right">
                                                                    <table style="float:right" class="table table-bordered">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="text-right"><p><i class="fas fa-rupee-sign" area-hidden="true"></i> 2000 X <?php echo $invoiceValues[0]['CashTwoThousand'];?></p></td>
                                                                                <td class="text-right"><p><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format(2000*$invoiceValues[0]['CashTwoThousand'],2);?></p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-right"><p><i class="fas fa-rupee-sign" area-hidden="true"></i> 500 X <?php echo $invoiceValues[0]['CashFiveHundred'];?></p></td>
                                                                                <td class="text-right"><p><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format(500*$invoiceValues[0]['CashFiveHundred'],2);?></p></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-right"><p><i class="fas fa-rupee-sign" area-hidden="true"></i> 200 X <?php echo $invoiceValues[0]['CashTwoHundred'];?></p></td>
                                                                                <td class="text-right"><p><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format(200*$invoiceValues[0]['CashTwoHundred'],2);?></p></td> 
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-right"><p><i class="fas fa-rupee-sign" area-hidden="true"></i> 100 X <?php echo $invoiceValues[0]['CashOneHundred'];?></p></td>
                                                                                <td class="text-right"><p><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format(100*$invoiceValues[0]['CashOneHundred'],2);?></p></td> 
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-right"><p><i class="fas fa-rupee-sign" area-hidden="true"></i> 50 X <?php echo $invoiceValues[0]['CashFiftyRupees'];?></p></td>
                                                                                <td class="text-right"><p><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format(50*$invoiceValues[0]['CashFiftyRupees'],2);?></p></td> 
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-right"><p><i class="fas fa-rupee-sign" area-hidden="true"></i> 20 X <?php echo $invoiceValues[0]['CashTwentyRupees'];?></p></td>
                                                                                <td class="text-right"><p><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format(20*$invoiceValues[0]['CashTwentyRupees'],2);?></p></td> 
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-right"><p><i class="fas fa-rupee-sign" area-hidden="true"></i> 10 X <?php echo $invoiceValues[0]['CashTenRupees'];?></p></td>
                                                                                <td class="text-right"><p><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format(10*$invoiceValues[0]['CashTenRupees'],2);?></p></td> 
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-right"><p> Coins X <?php echo $invoiceValues[0]['Coins'];?></p></td>
                                                                                <td class="text-right"><p><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format(1*$invoiceValues[0]['Coins'],2);?></p></td> 
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-right"><p>Total Amount Received</p></td>
                                                                                <td class="text-right"><p><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format($invoiceValues[0]['TotalCashReceived'],2);?></p></td> 
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-right"><p>Return To Customer</p></td>
                                                                                <td class="text-right"><p><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format($invoiceValues[0]['ReturnCashToCustomer'],2);?></p></td> 
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    </div>
                                                                    </div>
                                                                <?php } ?>
                                                            
                                                            
                                                        </div>
                                                    </div>    
                                                    <div class="separator-solid  mb-3"></div>
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-sm-7 col-md-5 mb-3 mb-md-0 transfer-to">                                                               
                                                    <!--<h5 class="sub">Bank Transfer</h5>
                                                    <div class="account-transfer">
                                                        <div><span>Account Name:</span><span>Syamsuddin</span></div>
                                                        <div><span>Account Number:</span><span>1234567890934</span></div>
                                                        <div><span>Code:</span><span>BARC0032UK</span></div>
                                                    </div>-->
                                                </div>
                                                <div class="col-sm-5 col-md-7 transfer-total" style="text-align: right;">
                                                </div>                                                     
                                            </div>
                                            <h6 class="text-uppercase mt-4 mb-3 fw-bold">
                                                Notes
                                            </h6>
                                            <p class="text-muted mb-0">
                                                <?php echo $receipt[0]['description'];?>
                                            </p>
                                            <div class="row">
                                                <div class="col-sm-12" style="text-align:right">
                                                    <button type="button" onclick="location.href='http://japps.online/demo/admin/Invoice/print_receipt.php?receipt_id=<?php echo $_GET['receipt_id'];?>'" class="btn btn-primary btn-sm">Print</button>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>