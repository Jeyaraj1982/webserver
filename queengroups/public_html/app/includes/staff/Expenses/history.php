 <?php 
    $Expenses = $mysql->select("select date(CreatedOn) as CreatedOn, sum(ExpenseAmount) ExpenseAmount from _queen_expenses where StaffID='".$_SESSION['User']['StaffID']."' group by date(CreatedOn) order by date(CreatedOn) desc");
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
                                        Manage Expenses
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
                                                <th scope="col" style="text-align:right">Expense Amount</th>
                                                <th scope="col"></th>
                                            </tr>                            
                                        </thead>
                                        <tbody>
                                       <?php if(sizeof($Expenses)=="0") {  ?> 
                                        <tr>
                                                <td style="text-align: center;" colspan="3">No Expenses found</td>
                                            </tr>
                                       <?php } else {
                                       $totalAmt=0;
                                        ?>
                                        <?php foreach($Expenses as $Expense){ 
                                            $totalAmt+=$Expense['ExpenseAmount'];
                                            ?>
                                       <tr>
                                                <td><?php echo date("d M, Y",strtotime($Expense['CreatedOn']));?></td>
                                                <td style="text-align:right"><?php echo number_format($Expense['ExpenseAmount'],2);?></td>
												<td style="text-align: right"><a href="dashboard.php?action=Expenses/list&date=<?php echo date("Y-m-d",strtotime($Expense['CreatedOn']));?>">View Transactions</a></td>
                                            </tr>
                                        <?php } ?>
                                       <tr style="font-weight:bold;">
                                                <td style="text-align:right;">Total Amount</td>
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
