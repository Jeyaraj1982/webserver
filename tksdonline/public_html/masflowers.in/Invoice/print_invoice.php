<?php 
include_once("../../config.php");
?>

<?php 
    $invoiceValues  = $mysql->select("SELECT * FROM invoice_order WHERE md5(order_id) = '".$_GET['invoice_id']."'");
    $invoiceDate = date("d/M/Y, H:i", strtotime($invoiceValues[0]['order_date'])); 
    $invoiceItems = $mysql->select("SELECT * FROM invoice_order_item WHERE order_id = '".$invoiceValues[0]['order_id']."'");  
?>
                                                                                           
<div class="main-panel" style="position: relative;width: calc(100% - 250px);height: 100vh;min-height: 100%;float: right;transition: all .3s;">
            <div class="container" style="padding: 0px !important;min-height: calc(100% - 123px);margin-top: 61px;overflow: hidden;width: 100%;max-width: unset;">
                <div class="page-inner" style="padding-right: 2rem;padding-left: 2rem;">
                    <div class="row justify-content-center" style="justify-content: center !important;"> 
                        <div class="col-12 col-lg-10 col-xl-9">
                            <div class="row" style="display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;">
                                <div class="col-md-12" style="flex: 0 0 100%;max-width: 100%;">
                                    <div class="card card-invoice" style="border-radius: 5px;background-color: #ffffff;margin-bottom: 30px;-webkit-box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);-moz-box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);box-shadow: 2px 6px 15px 0px rgba(69, 65, 78, 0.1);border: 1px solid #ececec;position: relative;display: flex;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;">                                        
                                        <div class="card-header" style="border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;padding: .75rem 1.25rem;margin-bottom: 0;border-bottom: 1px solid rgba(0,0,0,.125);">
                                            <div class="invoice-header" style="display: flex;flex-direction: row;justify-content: space-between;align-items: center;margin-bottom: 15px;">
                                                <h3 class="invoice-title" style="font-size: 27px;font-weight: 400;">
                                                    Invoice
                                                </h3><br>
                                                <div class="invoice-logo" style="width: 150px;display: flex;align-items: center;">
                                                    <img src="<?php echo $Logo;?>" alt="company logo" style="width: 100%;vertical-align: middle;border-style: none;">
                                                </div>
                                            </div>
                                            <div class="row" style="display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;">
                                                <div class="col-md-6" style="flex: 0 0 50%;max-width: 50%;">
                                                <div class="invoice-desc" style="text-align: left;font-size: 13px;">
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
                                                <div class="col-md-6" style="flex: 0 0 50%;max-width: 50%;">
                                                <div class="invoice-desc" style="text-align: right;font-size: 13px;">
                                                    <h5 class="sub" style="font-size: 14px;margin-bottom: 8px;font-weight: 600;">Invoice To</h5>
                                                    <p style="font-size: 14px;line-height: 1.82;margin-bottom: 1rem;word-break: break-word;">
                                                        <?php echo $invoiceValues[0]['order_receiver_name'];?><br />
                                                        <?php echo $invoiceValues[0]['order_receiver_address'];?><br /> 
                                                        Invoice Number : <?php echo $invoiceValues[0]['order_code'];?><br />
                                                        Invoice Date : <?php echo $invoiceDate;?><br />
                                                    </p>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="card-body" style="padding: 0;border: 0px !important;width: 75%;margin: auto;">
                                            <div class="row" style="display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;">
                                                <div class="col-md-12" style="flex: 0 0 100%;max-width: 100%;">
                                                    <div class="invoice-detail" style="width: 100%;display: block;">
                                                        <div class="invoice-top">
                                                            <h3 class="title" style="font-size: 20px;"><strong style="font-weight: 600;">Order summary</strong></h3>
                                                        </div>
                                                        <div class="invoice-item">
                                                            <div class="table-responsive" style="width: 100% !important;overflow-x: auto;display: block;">
                                                                <table class="table table-striped" style="width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;">                         
                                                                        <tr>
                                                                            <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;border-top-color: rgb(235, 237, 242);border-bottom-color: rgb(235, 237, 242);padding: 0 25px !important;height: 60px;vertical-align: middle !important;"><strong>Item Code</strong></td>
                                                                            <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;border-top-color: rgb(235, 237, 242);border-bottom-color: rgb(235, 237, 242);padding: 0 25px !important;height: 60px;vertical-align: middle !important;"><strong>Item</strong></td>
                                                                            <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;border-top-color: rgb(235, 237, 242);border-bottom-color: rgb(235, 237, 242);padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: right;" class="text-right"><strong>Quantity</strong></td>
                                                                            <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;border-top-color: rgb(235, 237, 242);border-bottom-color: rgb(235, 237, 242);padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: right;" class="text-right"><strong>Price</strong></td>
                                                                            <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;border-top-color: rgb(235, 237, 242);border-bottom-color: rgb(235, 237, 242);padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align: right;" class="text-right"><strong>Totals</strong></td>
                                                                        </tr>                 
                                                                        <?php 
                                                                            foreach($invoiceItems as $invoiceItem){
                                                                             ?>
                                                                            <tr>
                                                                                <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;border-top-color: rgb(235, 237, 242);border-bottom-color: rgb(235, 237, 242);padding: 0 25px !important;height: 60px;vertical-align: middle !important;" align="left"><?php echo $invoiceItem["item_code"];?></td>
                                                                                <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;border-top-color: rgb(235, 237, 242);border-bottom-color: rgb(235, 237, 242);padding: 0 25px !important;height: 60px;vertical-align: middle !important;" align="left"><?php echo $invoiceItem["item_name"];?></td>
                                                                                <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;border-top-color: rgb(235, 237, 242);border-bottom-color: rgb(235, 237, 242);padding: 0 25px !important;height: 60px;vertical-align: middle !important;" align="right"><?php echo $invoiceItem["order_item_quantity"];?></td>
                                                                                <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;border-top-color: rgb(235, 237, 242);border-bottom-color: rgb(235, 237, 242);padding: 0 25px !important;height: 60px;vertical-align: middle !important;" align="right"><?php echo number_format($invoiceItem["order_item_price"],2);?></td>
                                                                                <td style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;border-top-color: rgb(235, 237, 242);border-bottom-color: rgb(235, 237, 242);padding: 0 25px !important;height: 60px;vertical-align: middle !important;" align="right"><?php echo number_format($invoiceItem["order_item_final_amount"],2);?></td>
                                                                            </tr>
                                                                        <?php } ?>  
                                                                            <tr>
                                                                                <td class="text-right" colspan="4" style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;border-top-color: rgb(235, 237, 242);border-bottom-color: rgb(235, 237, 242);padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right">
                                                                                    <p style="font-size: 14px;line-height: 1.82;margin-bottom: 1rem;word-break: break-word;">Total Amount: </p>
                                                                                    <p style="font-size: 14px;line-height: 1.82;margin-bottom: 1rem;word-break: break-word;">Paid Amount:  </p>
                                                                                    <p style="font-size: 14px;line-height: 1.82;margin-bottom: 1rem;word-break: break-word;">Payable Amount:  </p>
                                                                                    <p style="font-size: 14px;line-height: 1.82;margin-bottom: 1rem;word-break: break-word;">Transaction Mode:  </p>
                                                                                   
                                                                                </td>
                                                                                <td class="text-right" style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;border-top-color: rgb(235, 237, 242);border-bottom-color: rgb(235, 237, 242);padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right">
                                                                                    <p style="font-size: 14px;line-height: 1.82;margin-bottom: 1rem;word-break: break-word;"><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format($invoiceValues[0]['order_total_after_tax'],2);?> </p>
                                                                                    <p style="font-size: 14px;line-height: 1.82;margin-bottom: 1rem;word-break: break-word;"><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format($invoiceValues[0]['order_amount_paid'],2);?> </p>
                                                                                    <p style="font-size: 14px;line-height: 1.82;margin-bottom: 1rem;word-break: break-word;"><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format($invoiceValues[0]['order_total_amount_due'],2);?> </p>
                                                                                    <p style="font-size: 14px;line-height: 1.82;margin-bottom: 1rem;word-break: break-word;"><?php echo $invoiceValues[0]['TransactionMode'];?> </p>
                                                                                </td>
                                                                            </tr>
                                                                            <?php if($invoiceValues[0]['TransactionMode']=="Cash"){ ?> 
                                                                            <tr>
                                                                                <td class="text-right" colspan="5" style="border-top: 0 !important;border-bottom: 0 !important;font-size: 14px;border-color: #ebedf2 !important;border-top-color: rgb(235, 237, 242);border-bottom-color: rgb(235, 237, 242);padding: 0 25px !important;height: 60px;vertical-align: middle !important;text-align:right">
                                                                                    <p style="font-size: 14px;line-height: 1.82;margin-bottom: 1rem;word-break: break-word;"><i class="fas fa-rupee-sign" area-hidden="true"></i> 500 X <?php echo $invoiceValues[0]['CashFiveHundred'];?>&nbsp;=&nbsp;<i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format(500*$invoiceValues[0]['CashFiveHundred'],2);?></p>
                                                                                    <p style="font-size: 14px;line-height: 1.82;margin-bottom: 1rem;word-break: break-word;"><i class="fas fa-rupee-sign" area-hidden="true"></i> 200 X <?php echo $invoiceValues[0]['CashTwoHundred'];?>&nbsp;=&nbsp;<i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format(500*$invoiceValues[0]['CashTwoHundred'],2);?></p>
                                                                                    <p style="font-size: 14px;line-height: 1.82;margin-bottom: 1rem;word-break: break-word;"><i class="fas fa-rupee-sign" area-hidden="true"></i> 100 X <?php echo $invoiceValues[0]['CashOneHundred'];?>&nbsp;=&nbsp;<i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo number_format(500*$invoiceValues[0]['CashOneHundred'],2);?></p>
                                                                                    <p style="font-size: 14px;line-height: 1.82;margin-bottom: 1rem;word-break: break-word;">Total Amount Received:&nbsp;<i class="fas fa-rupee-sign" area-hidden="true"></i><?php echo number_format($invoiceValues[0]['TotalCashReceived'],2);?></p>
                                                                                    <p style="font-size: 14px;line-height: 1.82;margin-bottom: 1rem;word-break: break-word;">Return To Customer:&nbsp;<i class="fas fa-rupee-sign" area-hidden="true"></i><?php echo number_format($invoiceValues[0]['ReturnCashToCustomer'],2);?></p>
                                                                                </td>
                                                                            </tr>
                                                                            <?php } ?>
                                                                </table>
                                                            </div>
                                                        </div>                                                                                                                                                                         
                                                    </div>    
                                                    <div class="separator-solid  mb-3" style="border-top: 1px solid #ebecec;margin: 15px 0;"></div>
                                                </div>    
                                            </div>
                                        </div>
                                        <div class="card-footer" style="padding: 5px 0 50px;border: 0px !important;width: 75%;margin: auto;">
                                            <div class="row" style="display: flex;flex-wrap: wrap;margin-right: -15px;margin-left: -15px;">
                                                <div class="col-sm-7 col-md-5 mb-3 mb-md-0 transfer-to" style="margin-bottom: 0 !important;flex: 0 0 41.666667%;max-width: 41.666667%;">
                                                    <!--<h5 class="sub">Bank Transfer</h5>
                                                    <div class="account-transfer">
                                                        <div><span>Account Name:</span><span>Syamsuddin</span></div>
                                                        <div><span>Account Number:</span><span>1234567890934</span></div>
                                                        <div><span>Code:</span><span>BARC0032UK</span></div>
                                                    </div>-->
                                                </div>
                                                <div class="col-sm-5 col-md-7 transfer-total" style="display: flex;flex-direction: column;justify-content: center;text-align: right;flex: 0 0 58.333333%;max-width: 58.333333%;">
                                                     <h5 class="sub" style="font-size: 14px;margin-bottom: 8px;font-weight: 600;">Total</h5>
                                                     <div class="price" style="font-size: 28px;color: #1572E8;padding: 7px 0;font-weight: 600;"><i class="fas fa-rupee-sign" area-hidden="true"></i> <?php echo $invoiceValues[0]['order_total_after_tax'];?> </div>
                                                </div>                                                                   
                                            </div>
                                            <div class="separator-solid" style="border-top: 1px solid #ebecec;margin: 15px 0;"></div>
                                            <h6 class="text-uppercase mt-4 mb-3 fw-bold" style="font-weight: 600 !important;text-transform: uppercase !important;margin-top: 1.5rem !important;margin-bottom: 1rem !important;">
                                                Notes
                                            </h6>
                                            <?php echo $invoiceValues[0]['note'];?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>