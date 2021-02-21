<?php 
include_once("../../config.php");
    $invoiceValues  = $mysql->select("SELECT * FROM invoice_order WHERE md5(order_id) = '".$_GET['invoice_id']."'");
    $invoiceDate = date("d/m/Y", strtotime($invoiceValues[0]['order_date'])); 
    $invoiceItems = $mysql->select("SELECT * FROM invoice_order_item WHERE order_id = '".$invoiceValues[0]['order_id']."'");  
    $oldbalance = $mysql->select("select (sum(order_total_amount_due)) as bal from invoice_order where user_id='".$invoiceValues[0]['user_id']."' and order_id<>'".$invoiceValues[0]['order_id']."'");
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-invoice" style="max-width: 400px;min-width: 400px;padding: 17px;">
                                <div style="border: 1px solid black;">
                                    <div class="row" style="padding: 10px;padding-bottom:0px">
                                        <div class="col-md-12" style="text-align:center"><p style="margin-bottom:0px;font-size:10px">பிஸ்மில்லா ஹிர்ரஹ்மா னிர்ரஹீம்</p> </div>  
                                    </div>
                                    <div class="row" style="padding: 10px;padding-bottom:0px">
                                        <div class="col-md-12" style="text-align: right;">               
                                            <div class="invoice-desc">
                                                <p style="line-height: 15px;font-size: 11px;">
                                                    செல்  : 73738   86876<br />
                                                            83009 25835  <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-12" style="text-align: center;">
                                            <h3 style="margin-bottom:-15px;color:red;font-weight:bold">M.A.செய்யது இப்ராஹீம்</h3> <br>
                                            <p style="margin-top:0px;margin-bottom:0px;font-size:15px;font-weight:bold">புஷ்ப  கமிஷன்  வியாபாரம்   </p>   
                                            <p style="margin-top:0px;margin-bottom:0px;font-size:12px;font-weight:bold;line-height:15px">பள்ளி வாசல் எதிர்புறம்</p>   
                                            <p style="margin-top:0px;margin-bottom:0px;font-size:12px;font-weight:bold;line-height:15px">பழைய பேருந்து நிலையம்    ,  காரைக்குடி.</p>   
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row" style="padding: 10px;padding-bottom:0px">                                
                                        <div class="col-md-6" style="float: left;">
                                            <div class="invoice-desc" style="text-align: left;">
                                                <p style="margin-bottom: 0px !important;">No : <span style="font-size: 12px;"><?php echo $invoiceValues[0]['order_code'];?></span></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="text-align: right;">
                                            <div class="invoice-desc">
                                                <p style="margin-bottom: 0px !important;font-size: 12px;">தேதி  : <span style="border-bottom: 1px dotted #ccc;padding-bottom: 3px;font-size: 12px;"><?php echo $invoiceDate;?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding: 10px;padding-top:0px">                                                              
                                        <div class="col-md-12" style="float: left;">
                                                <p style="margin-bottom: 0px !important;border-bottom: 1px dotted #ccc;padding-bottom: 3px;font-size:12px">திரு <?php echo $invoiceValues[0]['order_receiver_name_tamil'];?></p>                                                  
                                        </div>
                                    </div>
                                    <div class="row">                                                              
                                        <div class="col-md-12" style="float: left;">
                                                <div class="invoice-desc"><p style="padding-right: 10px;font-size:10px;margin-top: -10px !important;">அவர்கள்</p></div>                                                  
                                        </div>
                                    </div>                                                                           
                                    <div class="row">                                                               
                                        <div class="col-md-12">
                                            <div class="">
                                                <table class="" style="border: 1px solid #dee2e6;width:100%;border-bottom:none">
                                                        <tr>
                                                            <td style="border-right: 1px solid #dee2e6;border-bottom: 1px solid #dee2e6;font-size:11px;text-align: center;width: 70px;"><strong>விலை </strong></td>
                                                            <td style="border-right: 1px solid #dee2e6;border-bottom: 1px solid #dee2e6;font-size:11px;text-align: center;"><strong>பொருள் </strong></td>
                                                            <td style="border-right: 1px solid #dee2e6;border-bottom: 1px solid #dee2e6;font-size:11px;text-align: center;width: 70px;"><strong>அளவு </strong></td>
                                                            <td style="border-bottom: 1px solid #dee2e6;text-align:right;font-size:11px;text-align: center;width: 90px;"><strong>தொகை </strong></td>      
                                                        </tr>   
                                                        <?php 
                                                            foreach($invoiceItems as $invoiceItem){
                                                             ?>                                                       
                                                            <tr>
                                                                <td style="border-right: 1px solid #dee2e6;font-size:10px;padding-right:10px" align="right"><?php echo number_format($invoiceItem["order_item_price"],2);?></td>
                                                                <td style="border-right: 1px solid #dee2e6;font-size:10px;padding-left:5px" align="left"><?php echo $invoiceItem["item_name"];?></td>
                                                                <td style="border-right: 1px solid #dee2e6;font-size:10px;padding-right:10px" align="right"><?php echo $invoiceItem["order_item_quantity"];?> </td>
                                                                <td align="right" style="font-size:11px;padding-right:10px"><?php echo number_format($invoiceItem["order_item_final_amount"],2);?></td>
                                                            </tr>
                                                        <?php } ?>  
                                                            <tr>
                                                                <td colspan="4" style="text-align: right;border-top: 1px solid #dee2e6;border-bottom: 1px solid #dee2e6;font-size:11px;padding-right:10px"><b><?php echo number_format($invoiceValues[0]["order_total_after_tax"],2);?></b></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" style="font-size:10px;text-align:right;">முன்   பாக்கி:</td>
                                                                <td style="text-align: right;padding-right:10px;font-size:11px;border-bottom: 1px solid #dee2e6;">0.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" style="font-size:10px;text-align:right;"></td>
                                                                <td style="text-align: right;padding-right:10px;font-size:11px;border-bottom: 1px solid #dee2e6;"><b><?php echo number_format($invoiceValues[0]["order_total_after_tax"],2);?></b></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">&nbsp;</td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td colspan="3" style="font-size:10px;text-align:right;">உடன் வரவு     : </td>
                                                                <td style="text-align: right;padding-right:10px;font-size:11px;border-bottom: 1px solid #dee2e6;"> <?php echo number_format($invoiceValues[0]['order_amount_paid'],2);?></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" style="font-size:10px;text-align:right;">பாக்கி     :</td>
                                                                <td style="text-align: right;padding-right:10px;font-size:11px"><b><?php echo number_format($invoiceValues[0]['order_total_amount_due'],2);?></b></td>
                                                            </tr>
                                                </table>
                                                <br>
                                            </div>
                                        </div>                                                                                                                                                                         
                                    </div> 
                                </div>    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12" style="text-align:left">
                            <button type="button" onclick="location.href='http://masflowers.in/admin/Invoice/printinvoice.php?invoice_id=<?php echo $_GET['invoice_id'];?>'" class="btn btn-primary btn-sm">Print</button>    
                        </div>
                    </div>    
                </div>
            </div>
        </div>                                                                                                 
    </div>
</div>