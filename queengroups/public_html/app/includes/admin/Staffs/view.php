<?php
$data= $mysql->Select("select * from _queen_staffs where md5(StaffID)='".$_GET['id']."'");
?>

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">View Staffs</div>
                        </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Staff Code</label>
                                            <div class="col-sm-9"><?php echo $data[0]['StaffCode'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Staff Name</label>
                                            <div class="col-sm-9"><?php echo $data[0]['StaffName'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Sur Name</label>
                                            <div class="col-sm-9"><?php echo $data[0]['SurName'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Login Name</label>
                                            <div class="col-sm-9"><?php echo $data[0]['LoginName'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Login Password</label>
                                            <div class="col-sm-9"><?php echo $data[0]['LoginPassword'];?></div> 
                                        </div>
                                        
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Is Active</label>
                                            <div class="col-sm-9"><?php if($data[0]['IsActive']=="1") { echo "Active"; } else { echo "Blocked";}?></div> 
                                       </div>
                                       <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Created On</label>
                                            <div class="col-sm-9"><?php echo date("d M Y, H:i", strtotime($data[0]['CreatedOn']));?></div> 
                                        </div>
                                        <h4 class="card-title">Permission</h4>
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
                                        </div> -->
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
                                        <a href="dashboard.php?action=Staffs/list&status=All" class="btn btn-warning btn-border">Back</a>
                                    </div>                                        
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
