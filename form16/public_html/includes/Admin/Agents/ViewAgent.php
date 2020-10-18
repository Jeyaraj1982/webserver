
<?php 
  $sql= $mysql->select("select * from `_tbl_Agents` where  `AgentCode`='".$_GET['ACode']."'");
?>
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Agent Information</div>
                                </div>
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Name </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['AgentName'];?></div>
                                        </div>
                                        
                                        <div class="form-group form-show-validation row">
                                            <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['MobileNumber'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Email ID </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['EmailID'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="CommunicationAddress" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Address </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['AddressLine1'];?><?php if(strlen($sql[0]['AddressLine2'])>0){?>, <?php echo $sql[0]['AddressLine2']; }?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="PanCard" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">City Name</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['CityName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="PanCard" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Pincode</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['Pincode'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">GSTNumber </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['GSTNumber'];?></div>
                                        </div>     
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Password </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['Password'];?></div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Status </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><span class="<?php echo ($sql[0]['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo $sql[0]['IsActive']==1 ? 'Active' : 'Disabled';?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Created On </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['CreatedOn'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Created By </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['CreatedByName'];?></div>
                                        </div>
                                        </div>
                                        <div class="card-action">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a href="dashboard.php?action=Agents/ManageAgents&Status=All" id="show-signup" class="link">Back</a>
                                                </div>                                        
                                            </div>
                                        </div>
                                    </div>                                                                                             
                                </div>
                            </div>
                        </div>
                    </div>
             
        </div>
         
         
         
     