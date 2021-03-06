<?php 
include_once("../../config.php");
    $invoiceValues  = $mysql->select("SELECT * FROM invoice_order WHERE md5(order_id) = '".$_GET['invoice_id']."'");
    $invoiceDate = date("d/m/Y", strtotime($invoiceValues[0]['order_date'])); 
    $invoiceItems = $mysql->select("SELECT * FROM invoice_order_item WHERE order_id = '".$invoiceValues[0]['order_id']."'");  
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
                                    <div class="row" style="padding: 10px;">
                                        <div class="col-md-6" style="float:left">
                                            <div class="invoice-desc" style="text-align: left;">
                                                <p>கடை எண் : L248</p>
                                            </div>
                                            <div style="border: 3px solid black;border-radius: 5px;width: 100px;text-align: center;">
                                                MMA
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="text-align: right;">
                                            <div class="invoice-desc">
                                                <p>
                                                    செல்  : 90470   22045<br />
                                                            90470 22063<br> 
                                                            90475 22063
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" style="text-align: center;">
                                            <h3 style="margin-bottom:-15px">M.A. தெளத்   பாட்ஷா</h3> <br>
                                            <p style="margin-top:0px;margin-bottom:0px;font-size:12px">புஷ்பா  கமிஷன்  வியாபாரம்   </p>   
                                            <p style="margin-top:0px;margin-bottom:0px;font-size:12px">மாட்டுத்தாவணி  வணிக  வளாகம், மதுரை  - 7.</p>   
                                            <p style="margin-top:0px;margin-bottom:0px;font-size:12px">Name: திரு M.A.செய்யது இப்ராஹிம் அவர்கள்   - KKD</p>   
                                        </div>
                                    </div>
                                    <div class="row" style="padding: 10px;">
                                        <div class="col-md-6" style="float: left;">
                                            <div class="invoice-desc" style="text-align: left;">
                                                <p>BNo : 58</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="text-align: right;">
                                            <div class="invoice-desc">
                                                <p>Date: <?php echo $invoiceDate;?></p>
                                            </div>
                                        </div>
                                    </div>                                                                           
                                    <div class="row">                                                               
                                        <div class="col-md-12">
                                            <div class="">
                                                <table class="table table-bordered" style="border: 1px solid #dee2e6;">
                                                        <tr>
                                                            <td style="border-right: 1px solid #dee2e6;border-bottom: 1px solid #dee2e6;font-size:11px;text-align: center;"><strong>எண் </strong></td>
                                                            <td style="border-right: 1px solid #dee2e6;border-bottom: 1px solid #dee2e6;font-size:11px;text-align: center;"><strong>விலை </strong></td>
                                                            <td style="border-right: 1px solid #dee2e6;border-bottom: 1px solid #dee2e6;font-size:11px;width:80px;text-align: center;"><strong>பொருள் </strong></td>
                                                            <td style="border-right: 1px solid #dee2e6;border-bottom: 1px solid #dee2e6;font-size:11px;text-align: center;"><strong>அளவு </strong></td>
                                                            <td style="border-bottom: 1px solid #dee2e6;text-align:right;width: 110px;font-size:11px;text-align: center;"><strong>தொகை </strong></td>      
                                                        </tr>   
                                                        <?php 
                                                            foreach($invoiceItems as $invoiceItem){
                                                             ?>                                                       
                                                            <tr>
                                                                <td style="border-right: 1px solid #dee2e6;width: 40px;font-size:10px;" align="left">1</td>                          
                                                                <td style="border-right: 1px solid #dee2e6;width:70px;font-size:10px;" align="right"><?php echo number_format($invoiceItem["order_item_price"],2);?></td>
                                                                <td style="border-right: 1px solid #dee2e6;font-size:10px;" align="left"><?php echo $invoiceItem["item_name"];?></td>
                                                                <td style="border-right: 1px solid #dee2e6;width:70px;font-size:10px;" align="right"><?php echo $invoiceItem["order_item_quantity"];?> </td>
                                                                <td align="right" style="font-size:10px;"><?php echo number_format($invoiceItem["order_item_final_amount"],2);?></td>
                                                            </tr>
                                                        <?php } ?>  
                                                             <tr>
                                                                <td colspan="5" style="text-align: right;border-top: 1px solid #dee2e6;font-size:10px;"><?php echo number_format($invoiceValues[0]["order_total_after_tax"],2);?></td>
                                                            </tr>
                                                </table>
                                            </div>
                                        </div>                                                                                                                                                                         
                                    </div> 
                                    <div class="row" style="padding: 10px;">
                                        <div class="col-md-12" style="text-align: right;">                                                    
                                            <div class="invoice-desc">
                                                <p style="margin-bottom: 0px !important;font-size:12px">முன்   பாக்கி:   <br>
                                                உடன் வரவு     : <?php echo number_format($invoiceValues[0]['order_amount_paid'],2);?><br>
                                                பாக்கி     :<?php echo number_format($invoiceValues[0]['order_total_amount_due'],2);?></p>
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
</div>