
<?php 
$Member=$mysql->select("select * from _tbl_Members where MemberCode='".$_GET['MCode']."'");
  $sql= $mysql->select("select * from `_tbl_Admin` where  `AdminID`='".$Member[0]['StaffID']."'");
?>
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Staff</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">View Staff</div>
                                </div>
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Name </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['AdminName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="FathersName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Father's Name </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['FathersName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Gender </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['Sex'];?></div>
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
                                        <!--<div class="form-group form-show-validation row">
                                            <label for="PanCard" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Pincode</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['PinCode'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">User Name </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['UserName'];?></div>
                                        </div>    -->
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Password </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['Password'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Employee Code </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['EmployeeCode'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Status </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><span class="<?php echo ($sql[0]['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo ($sql[0]['IsActive']==1) ? 'Active' : 'Deactive';?></div>
                                        </div>
                                        </div>
                                        <div class="card-action">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a href="dashboard.php?action=SearchMember" id="show-signup" class="link">Back</a>
                                                </div>                                        
                                            </div>
                                        </div>
                                    </div>                                                                                             
                                </div>
                            </div>
                        </div>
                    </div>
             
        </div>
         
         
         
     