<?php
$data= $mysql->Select("select * from _queen_services where MD5(ServiceID)='".$_GET['id']."'");
?>

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">View Service</div>
                        </div>
                            <div class="card-body">
                               <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Service Code</label>
                                            <div class="col-sm-9"><?php echo $data[0]['ServiceCode'];?></div> 
                                        </div>
										<div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Service Name</label>
                                            <div class="col-sm-9"><?php echo $data[0]['ServiceName'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Fees </label>
                                            <div class="col-sm-9"><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo number_format($data[0]['FeeAmount'],2);?>
                                            <div class="form-group form-show-validation row">
                                                <?php echo (($data[0]['AllowtoChangeStaff']=="1") ? '<i class="fas fa-check" style="color:green"></i>' : '<i class="fas fa-times" style="color:red"></i>');?>&nbsp;&nbsp;Allow to change staff
                                            </div>
                                            </div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Charges  </label>
                                            <div class="col-sm-9"><i class="fas fa-rupee-sign"></i>&nbsp;<?php echo number_format($data[0]['ServiceCharge'],2);?>
                                            <div class="form-group form-show-validation row">
                                                <?php echo (($data[0]['AllowtochargeChangeStaff']=="1") ? '<i class="fas fa-check" style="color:green"></i>' : '<i class="fas fa-times" style="color:red"></i>');?>&nbsp;&nbsp;Allow to change staff
                                            </div>
                                            </div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Is Active</label>
                                            <div class="col-sm-9"><?php if($data[0]['IsActive']=="1") { echo "Active"; } else { echo "Blocked";}?></div> 
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
                                        <a href="dashboard.php?action=Services/list&status=All" class="btn btn-warning btn-border">Back</a>
                                    </div>                                        
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
