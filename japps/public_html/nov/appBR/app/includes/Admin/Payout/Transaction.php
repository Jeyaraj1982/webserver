<?php
    $requests = $mysql->select("select * from _tbl_payoutsummary where (`DebitLeft` >0 or `DebitRight`>0 ) and   date(PayoutProcessDate)=date('".$_GET['date']."')   Order by `PayoutID` Desc");
    $requests = $mysql->select("select * from _tbl_payoutsummary where  date(PayoutProcessDate)=date('".$_GET['date']."')   Order by `PayoutID` Desc");
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Payouts/Transactions">Payout</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Payouts/Transactions">Transactions</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Binary Payout Transactions</h4>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Member ID</th>
                                      <!--  <th style="text-align: center;">Total Left</th>
                                        <th style="text-align: center;">Total Right</th>-->
                                        <th style="text-align: center;">Aval Left</th>
                                        <th style="text-align: center;">Aval Right</th>
                                        <!--<th style="text-align: center;">Txn Left</th>
                                        <th style="text-align: center;">Txn Right</th>-->
                                        <th style="text-align: center;">Payout<br>PV</th>
                                        <!--<th style="text-align: center;">Bal Left</th>
                                        <th style="text-align: center;">Bal Right</th>-->
                                        <!--<th style="text-align: center;">MiniPayout<br>PV</th>-->
                                        <th style="text-align: center;">MaxiPayout<br>PV</th>
                                        <!--<th style="text-align: center;">Payable<br>PV</th>-->
                                        <th style="text-align: center;">Payout<br>Amt</th>
                                        <th style="text-align: center;">Charge</th>
                                        <th style="text-align: center;">Charged<br>Amount</th>
                                        <th style="text-align: center;">Credited<br>Amount</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (sizeof($requests)==0) {?>
                                    <tr>
                                        <td colspan="10" style="text-align: center;">No records found</td>
                                    </tr>
                                    <?php } ?>                   
                                    <?php foreach($requests as $r) { ?>
                                    <tr>
                                        <td style="text-align: left"><?php echo $r['MemberCode'];?></td>
                                        <!--<td style="text-align: right"><?php echo $r['TotalLeft'];?></td>
                                        <td style="text-align: right"><?php echo $r['TotalRight'];?></td>-->
                                        
                                        <td style="text-align: right"><?php echo $r['AvailableLeft'];?></td>
                                        <td style="text-align: right"><?php echo $r['AvailableRight'];?></td>
                                        
                                        <!--<td style="text-align: right"><?php echo $r['DebitLeft'];?></td>
                                        <td style="text-align: right"><?php echo $r['DebitRight'];?></td>-->
                                        
                                        <td style="text-align: right"><?php echo $r['TodayPayoutPV'];?></td>
                                        
                                        <!--<td style="text-align: right"><?php echo $r['RemainingLeft'];?></td>
                                        <td style="text-align: right"><?php echo $r['RemainingRight'];?></td>-->
                                        
                                        
                                        <!--<td style="text-align: right"><?php echo $r['EligibleMinimumPayoutPV'];?></td>-->
                                        <td style="text-align: right"><?php echo $r['EligibleMaximumPayoutPV'];?></td>
                                        <td style="text-align: right"><?php echo $r['PayablePV'];?></td>
                                        <!--<td style="text-align: right"><?php echo number_format($r['PayableAmount'],2);?></td>-->
                                        <td style="text-align: right"><?php echo "10%";?></td>
                                        <td style="text-align: right"><?php echo number_format($r['ChargeAmount'],2);?></td>
                                        <td style="text-align: right"><?php echo number_format($r['PayableAmountDebitCharge'],2);?></td>
                                        
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
    
    
     <?php  
     $Transactions=$mysql->select("select * from `_tbl_wallet_earnings` where Date(`TxnDate`)=Date('".$_GET['date']."')  and ( Ledger='3' or Ledger='30001') order by EarningID DESC"); 
     $binary_income_credited = $mysql->select("select sum(Credits) as Credits from `_tbl_wallet_earnings` where Date(`TxnDate`)=Date('".$_GET['date']."')  and  Ledger='3'  order by EarningID DESC");
     $binary_income_charged = $mysql->select("select sum(Debits) as Debits from `_tbl_wallet_earnings` where Date(`TxnDate`)=Date('".$_GET['date']."')  and  Ledger='30001'  order by EarningID DESC");
     ?>
     
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Binary Income</h4>
                    Binary Income Credited: $ <?php echo  (isset($binary_income_credited[0]['Credits'])) ? $binary_income_credited[0]['Credits'] : 0;?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    Charge Collected from Binary Income: $ <?php echo  (isset($binary_income_charged[0]['Debits'])) ? $binary_income_charged[0]['Debits'] : 0;?>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive">
                           <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>Member Code</th>
                                    <th>Particulars</th>
                                    <th>Credits</th>
                                    <th>Debits</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                           
                                <?php if(sizeof($Transactions)=="0"){?>
                                <tr>
                                    <td colspan="5" style="text-align: center;">No records found</td>
                                </tr>
                                <?php }?> 
                                <?php foreach ($Transactions as $Transaction){ ?>
                                <tr>
                                    <td><?php echo $Transaction['MemberCode'];?></td>
                                    <td><?php echo $Transaction['Particulars'];?></td>
                                    <td style="text-align: right"><?php echo number_format($Transaction['Credits'],2);?></td>
                                    <td style="text-align: right"><?php echo number_format($Transaction['Debits'],2);?></td>
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
    
      <?php  
     $Transactions=$mysql->select("select * from `_tbl_wallet_earnings` where Date(`TxnDate`)=Date('".$_GET['date']."')  and ( Ledger='2' or Ledger='20001') order by EarningID DESC"); 
     $package_roi_credited = $mysql->select("select sum(Credits) as Credits from `_tbl_wallet_earnings` where Date(`TxnDate`)=Date('".$_GET['date']."')  and  Ledger='2'  order by EarningID DESC");
     $package_roi_charged = $mysql->select("select sum(Debits) as Debits from `_tbl_wallet_earnings` where Date(`TxnDate`)=Date('".$_GET['date']."')  and  Ledger='20001'  order by EarningID DESC");
     ?>
     
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Package ROI</h4>
                    Package ROI Credited: $ <?php echo  (isset($package_roi_credited[0]['Credits'])) ? $package_roi_credited[0]['Credits'] : 0;?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    Charge Collected from Package ROI: $ <?php echo  (isset($package_roi_charged[0]['Debits'])) ? $package_roi_charged[0]['Debits'] : 0;?>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive">
                          <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>Member Code</th>
                                    <th>Particulars</th>
                                    <th>Credits</th>
                                    <th>Debits</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(sizeof($Transactions)=="0"){?>
                                <tr>
                                    <td colspan="5" style="text-align: center;">No records found</td>
                                </tr>
                                <?php }?> 
                                <?php foreach ($Transactions as $Transaction){ ?>
                                <tr>
                                    <td><?php echo $Transaction['MemberCode'];?></td>
                                    <td><?php echo $Transaction['Particulars'];?></td>
                                    <td style="text-align: right"><?php echo number_format($Transaction['Credits'],2);?></td>
                                    <td style="text-align: right"><?php echo number_format($Transaction['Debits'],2);?></td>
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
    
    
     <?php  
     $Transactions=$mysql->select("select * from `_tbl_wallet_earnings` where Date(`TxnDate`)=Date('".$_GET['date']."')  and ( Ledger='4' or Ledger='40001') order by EarningID DESC"); 
     $referral_roi_credited = $mysql->select("select sum(Credits) as Credits from `_tbl_wallet_earnings` where Date(`TxnDate`)=Date('".$_GET['date']."')  and  Ledger='4'  order by EarningID DESC");
     $referral_roi_charged = $mysql->select("select sum(Debits) as Debits from `_tbl_wallet_earnings` where Date(`TxnDate`)=Date('".$_GET['date']."')  and  Ledger='40001'  order by EarningID DESC");
     ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Referal ROI</h4>
                    Referal ROI Credited: $ <?php echo  (isset($referral_roi_credited[0]['Credits'])) ? $referral_roi_credited[0]['Credits'] : 0;?>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
                    Charge Collected from Referal ROI: $ <?php echo  (isset($referral_roi_charged[0]['Debits'])) ? $referral_roi_charged[0]['Debits'] : 0;?>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive">
                              <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>Member Code</th>
                                    <th>Particulars</th>
                                    <th>Credits</th>
                                    <th>Debits</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php  $Transactions=$mysql->select("select * from `_tbl_wallet_earnings` where Date(`TxnDate`)=Date('".$_GET['date']."')  and ( Ledger='4' or Ledger='40001') order by EarningID DESC"); ?>
                                <?php if(sizeof($Transactions)=="0"){?>
                                <tr>
                                    <td colspan="5" style="text-align: center;">No records found</td>
                                </tr>
                                <?php }?> 
                                <?php foreach ($Transactions as $Transaction){ ?>
                                <tr>
                                    <td><?php echo $Transaction['MemberCode'];?></td>
                                    <td><?php echo $Transaction['Particulars'];?></td>
                                    <td style="text-align: right"><?php echo number_format($Transaction['Credits'],2);?></td>
                                    <td style="text-align: right"><?php echo number_format($Transaction['Debits'],2);?></td>
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
<script>
    $(document).ready(function() {
     //   $('#basic-datatables').DataTable({});
    });
</script> 