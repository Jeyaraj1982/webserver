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
                                                <th scope="col">Agent / Customer</th>
												<th scope="col" style="text-align:right">Recevied Amount</th>
												<th></th>
                                            </tr>                            
                                        </thead>
                                        <tbody>
                                                                                   
                                        <?php 
											$transactions = $mysql->select("select * from _queen_wallet where IsRecevied='1' and date(AddOn)=date('".$_GET['date']."') and StaffID='".$_SESSION['User']['StaffID']."'");
                                            $totalAmt=0;
                                        if(sizeof($transactions)=="0"){ ?>
                                            <tr>
                                                <td style="text-align: center;" colspan="5">No Transactions found</td>
                                            </tr>
                                        <?php } else {
											foreach($transactions as $transaction){ 
											$Agent = $mysql->select("select * from _queen_agent where AgentID='".$transaction['AgentID']."'");
                                            $totalAmt+= $transaction['Debits'];
										?>
											<tr>
                                                <td><?php echo date("M d,Y H:i", strtotime($transaction['AddOn']));?></td>
                                                <td><?php echo $Agent[0]['AgentName'];?></td>
                                                <td style="text-align:right"><?php echo number_format($transaction['Debits'],2);?></td>
                                            </tr> 
                                        <?php }  ?>
                                        <tr style="font-weight:bold;">
                                                <td></td>
                                                <td style="text-align:right;">Total Recevied Amount</td>
                                                <td style="text-align:right"><?php echo number_format($totalAmt,2);?></td>
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
