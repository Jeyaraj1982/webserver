<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card-title">
                                        Payment Recevied
                                    <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>  </div>
                                </div>
                            </div>
                        </div>                                       
                        <div class="card-body">                                                                                                                                             
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Txn On</th>
												<th scope="col" style="text-align:right">Recevied Amount</th>
												<th></th>
                                            </tr>                            
                                        </thead>
                                        <tbody>
                                                                                   
                                        <?php 
											$transactions = $mysql->select("select date(AddOn) as AddOn,sum(Debits) as Debits  from _queen_wallet where IsRecevied='1' and StaffID='".$_SESSION['User']['StaffID']."' group by date(AddOn) order by date(AddOn) desc");
                                            
                                            $totalAmt=0;
                                        if(sizeof($transactions)=="0"){ ?>
                                            <tr>
                                                <td style="text-align: center;" colspan="5">No Transactions found</td>
                                            </tr>
                                        <?php } else {
											foreach($transactions as $transaction){ 
                                            $totalAmt+= $transaction['Debits'];
										?>
											<tr>
                                                <td><?php echo date("M d,Y", strtotime($transaction['AddOn']));?></td>
                                                <td style="text-align:right"><?php echo number_format($transaction['Debits'],2);?></td>
                                                <td style="text-align: right"><a href="dashboard.php?action=Payments/list&date=<?php echo date("Y-m-d",strtotime($transaction['AddOn']));?>">View Transactions</a></td>
                                            </tr> 
                                        <?php }  ?>
                                        <tr style="font-weight:bold;">
                                                <td style="text-align:right;">Total Recevied Amount</td>
                                                <td style="text-align:right"><?php echo number_format($totalAmt,2);?></td>
                                                <td>&nbsp;</td>
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
