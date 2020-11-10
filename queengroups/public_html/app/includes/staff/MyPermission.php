<?php
$data= $mysql->Select("select * from _queen_staffs where StaffID='".$_SESSION['User']['StaffID']."'");
?>

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">My Permissions</div>
                        </div>
                            <div class="card-body">
                               <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-show-validation row">
                                            <div class="col-sm-12"><?php echo (($data[0]['AllowAddAgent']=="1") ? '<i class="fas fa-check" style="color:green"></i>' : '<i class="fas fa-times" style="color:red"></i>');?>&nbsp;&nbsp;Allow to add Agent</div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <div class="col-sm-12"><?php echo (($data[0]['AllowEditAgent']=="1") ? '<i class="fas fa-check" style="color:green"></i>' : '<i class="fas fa-times" style="color:red"></i>');?>&nbsp;&nbsp;Allow to edit Agent</div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <div class="col-sm-12"><?php echo (($data[0]['AllowAddCustomer']=="1") ? '<i class="fas fa-check" style="color:green"></i>' : '<i class="fas fa-times" style="color:red"></i>');?>&nbsp;&nbsp;Allow to add Customer</div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <div class="col-sm-12"><?php echo (($data[0]['AllowEditCustomer']=="1") ? '<i class="fas fa-check" style="color:green"></i>' : '<i class="fas fa-times" style="color:red"></i>');?>&nbsp;&nbsp;Allow to Edit Customer</div> 
                                        </div>
                                        <!--<div class="form-group form-show-validation row">
                                            <div class="col-sm-12"><?php echo (($data[0]['AllowAddExpenses']=="1") ? '<i class="fas fa-check" style="color:green"></i>' : '<i class="fas fa-times" style="color:red"></i>');?>&nbsp;&nbsp;Allow to add Expenses</div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <div class="col-sm-12"><?php echo (($data[0]['AllowEditExpenses']=="1") ? '<i class="fas fa-check" style="color:green"></i>' : '<i class="fas fa-times" style="color:red"></i>');?>&nbsp;&nbsp;Allow to edit Expenses</div> 
                                        </div>  -->
                                        <div class="form-group form-show-validation row">
                                            <div class="col-sm-12"><?php echo (($data[0]['AllowAddExpenseTypes']=="1") ? '<i class="fas fa-check" style="color:green"></i>' : '<i class="fas fa-times" style="color:red"></i>');?>&nbsp;&nbsp;Allow to add Expense Types</div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <div class="col-sm-12"><?php echo (($data[0]['AllowEditExpenseTypes']=="1") ? '<i class="fas fa-check" style="color:green"></i>' : '<i class="fas fa-times" style="color:red"></i>');?>&nbsp;&nbsp;Allow to edit Expense Types</div> 
                                        </div> 
                                        <div class="form-group form-show-validation row">
                                            <div class="col-sm-12"><?php echo (($data[0]['AllowAddService']=="1") ? '<i class="fas fa-check" style="color:green"></i>' : '<i class="fas fa-times" style="color:red"></i>');?>&nbsp;&nbsp;Allow to add Service</div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <div class="col-sm-12"><?php echo (($data[0]['AllowEditService']=="1") ? '<i class="fas fa-check" style="color:green"></i>' : '<i class="fas fa-times" style="color:red"></i>');?>&nbsp;&nbsp;Allow to edit Service</div> 
                                        </div> 
                                    </div>
                               </div> 
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12"> 
                                        <a href="dashboard.php" class="btn btn-warning btn-border">Back</a>
                                    </div>                                        
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
