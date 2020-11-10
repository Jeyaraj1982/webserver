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
                            <div class="card-title">My Profile</div>
                        </div>
                            <div class="card-body">
                               <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Staff Name</label>
                                            <label class="col-sm-9"><?php echo $data[0]['StaffName'];?></label> 
                                        </div>
										<div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Sur Name</label>
                                            <label class="col-sm-9"><?php echo $data[0]['SurName'];?></label> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Login Name</label>
                                            <label class="col-sm-9"><?php echo $data[0]['LoginName'];?></label> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Login Password</label>
                                            <label class="col-sm-9"><?php echo $data[0]['LoginPassword'];?></label> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Is Active</label>
                                            <label class="col-sm-9"><?php if($data[0]['IsActive']=="1") { echo "Active"; } else { echo "Blocked";}?></label> 
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
