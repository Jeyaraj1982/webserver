
<?php 
  $sql=$mysql->select("select * from _tbl_settings_emailapi where ApiCode='".$_GET['Code']."'");
?>
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Settings</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">View Email Api</div>
                                </div>
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-sm-3 text-left">Api Name </label>
                                            <div class="col-sm-9"><?php echo $sql[0]['ApiName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-sm-3 text-left">Host name </label>
                                            <div class="col-sm-9"><?php echo $sql[0]['HostName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-sm-3 text-left">Port No </label>
                                            <div class="col-sm-9"><?php echo $sql[0]['PortNumber'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-sm-3 text-left">Secure </label>
                                            <div class="col-sm-9"><?php echo $sql[0]['Secure'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-sm-3 text-left">UserName </label>
                                            <div class="col-sm-9"><?php echo $sql[0]['SMTPUserName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-sm-3 text-left">Password </label>
                                            <div class="col-sm-9"><?php echo $sql[0]['SMTPPassword'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-sm-3 text-left">Sender's Name </label>
                                            <div class="col-sm-9"><?php echo $sql[0]['SendersName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-sm-3 text-left">Remarks </label>
                                            <div class="col-sm-9"><?php echo $sql[0]['Remarks'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-sm-3 text-left">Status </label>
                                            <div class="col-sm-9"><span class="<?php echo ($sql[0]['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo ($sql[0]['IsActive']==1) ? 'Active' : 'Deactive';?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Aadhaar" class="col-sm-3 text-left">Status </label>
                                            <div class="col-sm-9"><?php echo date("d M, Y H:i",strtotime($sql[0]['CreatedOn']));?></div>
                                        </div>
                                        </div>
                                        <div class="card-action">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a href="dashboard.php?action=Email/ManageEmailApi&Status=All" id="show-signup" class="link">Back</a>
                                                </div>                                        
                                            </div>
                                        </div>
                                    </div>                                                                                             
                                </div>
                            </div>
                        </div>
                    </div>
             
        </div>
         
         
         
     