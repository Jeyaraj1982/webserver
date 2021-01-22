
<?php 
  $sql=$mysql->select("select * from _tbl_settings_mobilesms where ApiCode='".$_GET['Code']."'");
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
                                    <div class="card-title">View SMS Api</div>
                                </div>
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-sm-3 text-left">Api Name </label>
                                            <div class="col-sm-9"><?php echo $sql[0]['ApiName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-sm-3 text-left">Api Url </label>
                                            <div class="col-sm-9"><?php echo $sql[0]['ApiUrl'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-sm-3 text-left">Mobile Number </label>
                                            <div class="col-sm-9"><?php echo $sql[0]['MobileNumber'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-sm-3 text-left">Message Text </label>
                                            <div class="col-sm-9"><?php echo $sql[0]['MessageText'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-sm-3 text-left">Method </label>
                                            <div class="col-sm-9"><?php echo $sql[0]['Method'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-sm-3 text-left">Time Out </label>
                                            <div class="col-sm-9"><?php echo $sql[0]['TimedOut'];?></div>
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
                                                    <a href="dashboard.php?action=SMS/ManageMobileSMS&Status=All" id="show-signup" class="link">Back</a>
                                                </div>                                        
                                            </div>
                                        </div>
                                    </div>                                                                                             
                                </div>
                            </div>
                        </div>
                    </div>
             
        </div>
         
         
         
     