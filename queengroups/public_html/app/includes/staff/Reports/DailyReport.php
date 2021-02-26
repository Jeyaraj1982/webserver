<?php 
    $transactions = $mysql->select("select date(AddOn) as AddOn,sum(Debits) as Debits  from _queen_wallet where IsRecevied='1' and StaffID='".$_SESSION['User']['StaffID']."' group by date(AddOn) order by date(AddOn) desc");
    
    $Expenses = $mysql->select("select date(CreatedOn) as CreatedOn, sum(ExpenseAmount) ExpenseAmount from _queen_expenses where StaffID='".$_SESSION['User']['StaffID']."' group by date(CreatedOn) order by date(CreatedOn) desc");
    $result = array();
    foreach($transactions as $t) {
        $result[$t['AddOn']]['Received']=$t['Debits'];
    }
    
        foreach($Expenses as $t) {
        $result[$t['CreatedOn']]['Expenses']=$t['ExpenseAmount'];
    }

?>
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
                                       Reports
                                    <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>  </div>
                                </div>
                                <div class="col-md-8" style="text-align: right;">
                                    <a href="dashboard.php?action=Expenses/add" class="btn btn-primary btn-xs">Add Expense</a><br>
                                </div>
                            </div>
                        </div>                                       
                        <div class="card-body">                                                                                                                                             
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col" style="text-align:right">Recevied Amount</th>
                                                <th scope="col" style="text-align:right">Expense Amount</th>
                                                <th scope="col" style="text-align:right">Cash in Hand</th>
                                            </tr>                            
                                        </thead>
                                        <tbody>
                                       <?php if(sizeof($result)=="0") {  ?> 
                                        <tr>
                                                <td style="text-align: center;" colspan="3">No Expenses found</td>
                                            </tr>
                                       <?php } else {
                                       $totalRAmt=0;
                                       $totalEAmt=0;
                                        ?>
                                        <?php foreach($result as $k=>$v){ 
                                            $totalRAmt+=$v['Received'];
                                            $totalEAmt+=$v['Expenses'];
                                            ?>
                                       <tr>
                                                <td><?php echo date("d M, Y",strtotime($k));?></td>
                                                <td style="text-align:right"><?php echo number_format($v['Received'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($v['Expenses'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($v['Received']-$v['Expenses'],2);?></td>
                                            </tr>
                                        <?php } ?>
                                       <tr style="font-weight:bold;">
                                                <td style="text-align:right;">Total Amount</td>
                                                <td style="text-align:right"><?php echo number_format($totalRAmt,2);?></td>
                                                <td style="text-align:right"><?php echo number_format($totalEAmt,2);?></td>
                                                <td style="text-align:right"><?php echo number_format($totalRAmt-$totalEAmt,2);?></td>
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
