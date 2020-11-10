<?php include_once("../config.php");?>
<?php 
  $Orders = $mysql->select("SELECT * FROM _queen_orders where AgentID='1' and (date(OrderOn)>='2020-10-28' and date(OrderOn)<='2020-10-28' ) order by OrderID asc");
        $data = $mysql->select("select * from _queen_agent where AgentID='1'");
?>
<div id="print" style="display:none">
    <div style="font-family:arial;font-size: 14px;letter-spacing: 0.05em;color: #2A2F5B;font-weight: 400;line-height: 1.5;">
        <div class="" style="width:850px;padding:25px;margin:0px auto;border:1px solid #333;">
            <div class="row" style="flex-wrap: wrap;">
                <div class="col-md-12" style="max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                    <div class="card" style="border-radius: 5px;background-color: #ffffff;margin-bottom: 30px;border: 0px;position: relative;flex-direction: column;min-width: 0;word-wrap: break-word;background-clip: border-box;">
                        <div class="card-body" style="padding: 0;border: 0px !important;margin: auto;flex: 1 1 auto;"> 
                            <h5 style="margin-bottom:0px;font-weight: bold;font-size:20px;margin-top: 0px;"><b>Agent Report</b></h5>
                            <div class="row" style="margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;">
                                <div class="col-md-12" style="padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;max-width: 50%;position: relative;width: 100%;min-height: 1px;">
                                       
                                    </div>
                                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;float: left;text-align: right;max-width: 50%;position: relative;width: 100%;min-height: 1px;">
                                        <h5 style="margin-bottom:0px;font-weight: bold;font-size:15px"><b>Reporting Details</b></h5>
                                        <?php if(!($_POST['FromDate']==$_POST['ToDate'])) {?>
                                        From : <?php echo date("d M, Y",strtotime($_POST['FromDate']));?><br>
                                        To   : <?php echo date("d M, Y",strtotime($_POST['ToDate']));?><br>
                                        <?php } else{ ?>
                                        Date : <?php echo date("d M, Y",strtotime($_POST['FromDate']));?><br>
                                        <?php } ?>
                                        <br>
                                    </div>
                                </div>                          
                            </div>                                                                     
                            <br><br> 
                            <div class="table-responsive" style="width: 100% !important;overflow-x: auto;display: block;width: 100%;margin-bottom: 1rem;background-color: transparent;border-collapse: collapse;">
                                    <table class="table table-striped mt-3" border="1" style="width:100%" cellspacing="0" cellpadding="3">
                                        <thead>
                                            <tr>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: inherit;">Agent Code</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: inherit;">Agent Name</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: inherit;text-align:right">Order Value</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: inherit;text-align:right">Paid</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: inherit;text-align:right">Unpaid</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: inherit;text-align:right">Over all unpaid</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: inherit;text-align:right">Wallet Balance</th>
                                                <th style="font-weight: 600;font-size: 14px;padding: 0 5px !important;vertical-align: middle !important;text-align: inherit;text-align:right">Payable Amount</th>
                                            </tr>
                                        </thead>                             
                                        <tbody>
                                        <?php
                                            function PrintRow($Agent) {
                                        ?>
                                            <tr>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;"><?php echo $Agent["AgentCode"];?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;"><?php echo $Agent["AgentName"];?><br><?php echo $Agent['SurName'];?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($Agent['OrderValue'],2);?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($Agent['PaidValue'],2);?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($Agent['UnpaidValue'],2);?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($Agent['OverallUnpaidValue'],2);?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($Agent['Balance'],2);?></td>
                                                <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($Agent['OverallUnpaidValue']-$Agent['Balance'],2);?></td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                        <?php if ($PrintedRows>0) { ?>
                                        <tr>
                                            <td colspan="4" style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($AllPaidValue,2);?></td>
                                            <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($AllUnPaidValue,2);?></td>
                                            <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($AllOverUnpaidValue,2);?></td>
                                            <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($WalletBalance,2);?></td>
                                            <td style="font-size: 14px;padding: 0 5px !important;height: auto !important;vertical-align: middle !important;text-align:right"><?php echo number_format($AllOverUnpaidValue-$WalletBalance,2);?></td>
                                        </tr>
                                        <?php } else {?>
                                            <tr>
                                                <td colspan="8" style="text-align: center;">No Records Found</td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
                             <div class="row" style="margin-right:0px;margin-left:0px;display: flex;flex-wrap: wrap;">
                                <div class="col-md-12" style="padding-right:0px;padding-left:0px;flex: 0 0 100%;max-width: 100%;position: relative;width: 100%;min-height: 1px;">
                                    Reported On   : <?php echo date("d M, Y H:i");?>
                                </div>
                             </div>
                            <br><br><br><br>                                
                        </div>                                                                                                                                             
                    </div>                                                                                             
                </div>                                                                   
            </div>
        </div>
    </div>
</div>