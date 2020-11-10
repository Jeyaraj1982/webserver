<?php
$data= $mysql->Select("select * from _queen_agent where MD5(AgentID)='".$_GET['id']."'");
?>

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">View Agent</div>
                        </div>
                            <div class="card-body">
                               <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Agent Code</label>
                                            <div class="col-sm-9"><?php echo $data[0]['AgentCode'];?></div> 
                                        </div>
										<div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Agent Name</label>
                                            <div class="col-sm-9"><?php echo $data[0]['AgentName'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Sur Name</label>
                                            <div class="col-sm-9"><?php echo $data[0]['SurName'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Mobile Number</label>
                                            <div class="col-sm-9"><?php echo $data[0]['MobileNumber'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Alternative Mobile No</label>
                                            <div class="col-sm-9"><?php echo $data[0]['AlternativeMobileNumber'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label class="col-sm-3" for="name">Description</label>
                                            <div class="col-sm-9"><?php echo $data[0]['Description'];?></div> 
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
                                        <a href="dashboard.php?action=Agent/list&status=All" class="btn btn-warning btn-border">Back</a>
                                    </div>                                        
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
