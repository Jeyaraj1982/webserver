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
                                            <label for="name">Staff Name</label>
                                            <div class="col-sm-12"><?php echo $data[0]['StaffName'];?></div> 
                                        </div>
										<div class="form-group form-show-validation row">
                                            <label for="name">Sur Name</label>
                                            <div class="col-sm-12"><?php echo $data[0]['SurName'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Login Name</label>
                                            <div class="col-sm-12"><?php echo $data[0]['LoginName'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Login Password</label>
                                            <div class="col-sm-12"><?php echo $data[0]['LoginName'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Is Active</label>
                                            <div class="col-sm-12"><?php if($data[0]['IsActive']=="1") { echo "Yes"; } else { echo "No";}?></div> 
                                       </div>
                                       <div class="form-group form-show-validation row">
                                            <label for="name">Created On</label>
                                            <div class="col-sm-12"><?php echo date("d M Y, H:i", strtotime($data[0]['CreatedOn']));?></div> 
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
