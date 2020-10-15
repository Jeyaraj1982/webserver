<?php
    if (isset($_POST['SubmitBtn'])) {
        $error=0;
        if (strlen(trim($_POST['PackageROIPayoutDay']))<1) {
            $error++;
            $errormsg = "You must provide Package ROI Payout Day";  
        }
        if (strlen(trim($_POST['FromDate']))<1) {
            $error++;
            $errormsg = "You must provide from day";  
        }
        if (strlen(trim($_POST['ToDate']))<1) {
            $error++;
            $errormsg = "You must provide to day";  
        }
        $date =$mysql->select("select * from _tbl_package_roi_payout_days where TxnDate='".$_POST['PackageROIPayoutDay']."'"); 
        if(sizeof($date)>0){
           $error++;
           $errormsg = "Package ROI Payout day already added";  
        } 
        
        if ($error==0) {
            $id=$mysql->insert("_tbl_package_roi_payout_days",array("TxnDate"  => $_POST['PackageROIPayoutDay'],
                                                                    "DateFrom" => $_POST['FromDate'], 
                                                                    "DateTo"   => $_POST['ToDate'])); 
            unset($_POST);
?>
            <script>
              $(document).ready(function() {
                    swal("Package ROI Payout Day Added!", {
                        icon : "success" 
                    });
                 });
            </script>
<?php }  else { ?>
            <script>
              $(document).ready(function() {
                    swal("<?php echo $errormsg;?>", {
                        icon : "error" 
                    });
                 });
            </script>
<?php
      }  
    
    }       
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Settings/AaddPackageROIDays">Settings</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Settings/AddPackageROIDays">Add Package ROI Payout Days</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Add Package ROI Payout Days</div>
                </div>
                <div class="card-body"> 
                    <form action="" method="post">
                        <div class="form-group row">
                           <div class="col-sm-3">
                                <label>Package ROI Payout Day</label>
                                <div class="input-group">
                                    <input type="text" class="form-control success" id="PackageROIPayoutDay" name="PackageROIPayoutDay" value="<?php echo isset($_POST['PackageROIPayoutDay']) ? $_POST['PackageROIPayoutDay'] : "";?>" required="" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar-check"></i>
                                        </span>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-sm-3">
                                <label>From Date</label>
                                <div class="input-group">
                                    <input type="text" class="form-control success" id="FromDate" name="FromDate" value="<?php echo isset($_POST['FromDate']) ? $_POST['FromDate'] : "";?>" required="" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar-check"></i>
                                        </span>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-sm-3">
                                <label>To Date</label>
                                <div class="input-group">
                                    <input type="text" class="form-control success" id="ToDate" name="ToDate" value="<?php echo isset($_POST['ToDate']) ? $_POST['ToDate'] : "";?>" required="" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar-check"></i>
                                        </span>
                                    </div>
                                </div>    
                            </div>
                           <div class="col-sm-2"><label>&nbsp;</label><br> <button type="submit" name="SubmitBtn" class="btn btn-primary">Save</button></div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#PackageROIPayoutDay').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    $('#FromDate').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    $('#ToDate').datetimepicker({
            format: 'YYYY-MM-DD'
        });
       
    </script>