<?php
$data= $mysql->Select("select * from _queen_expenses where MD5(ExpenseID)='".$_GET['id']."'");
?>

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">View Expense</div>
                        </div>
                            <div class="card-body">
                               <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Expense Type</label>
                                            <div class="col-sm-9"><?php echo $data[0]['ExpenseType'];?></div> 
                                        </div>
										<div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Short Description</label>
                                            <div class="col-sm-9"><?php echo $data[0]['ShortDescription'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Expense Amount</label>
                                            <div class="col-sm-9"><?php echo number_format($data[0]['ExpenseAmount'],2);?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Payment Mode</label>
                                            <div class="col-sm-9"><?php echo $data[0]['PaymentMode'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Expense Details</label>
                                            <div class="col-sm-9"><?php echo $data[0]['ExpenseDetails'];?></div> 
                                        </div>
                                       <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Created On</label>
                                            <div class="col-sm-9"><?php echo date("d M Y, H:i", strtotime($data[0]['CreatedOn']));?></div> 
                                        </div>  
                                    </div>
                               </div> 
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12"> 
                                        <a href="dashboard.php?action=Expenses/list&status=All" class="btn btn-warning btn-border">Back</a>
                                    </div>                                        
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
