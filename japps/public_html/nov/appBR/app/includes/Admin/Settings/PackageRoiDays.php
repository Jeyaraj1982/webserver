<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Settings/PayoutDays">Settings</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Settings/PayoutDays">Package ROI Payout Days</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6"><div class="card-title">Package ROI Payout Days</div></div>
                        <div class="col-md-6" style="text-align: right;"><a href="dashboard.php?action=Settings/AddPackageRoiDays" class="btn btn-primary btn-round">Add</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label>From Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control success" id="From" name="From" value="<?php echo isset($_POST['From']) ? $_POST['From'] : date("Y-m-d");?>" required="" aria-invalid="false"><label id="From-error" class="error" for="From"></label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-sm-3">
                                    <label class="col-sm-1">To Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control success" id="To" name="To" value="<?php echo isset($_POST['To']) ? $_POST['To'] : date("Y-m-d");?>" required="" aria-invalid="false"><label id="To-error" class="error" for="To"></label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-sm-2"><label class="col-sm-1"> &nbsp;</label><button type="submit" name="SearchBtn" class="btn btn-primary">View Package ROI Payout Days</button></div>
                            </div>
                        </form>
                    <?php if(isset($_POST['SearchBtn'])){
                        $fromDate = $_POST['From'];
                         $toDate = $_POST['To'];
                         if (strtotime($fromDate)<=strtotime($toDate)) {
                        $Dates =$mysql->select("select * from `_tbl_package_roi_payout_days` where (date(TxnDate)>=date('".$fromDate."') and  date(TxnDate)<=date('".$toDate."')) ");
                        
                         echo $fromDate." To ".$toDate;
                        ?>
                    <div class="table-responsive">
                    <?php echo "Number of Package ROI Payout Days ".sizeof($Dates);?>
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th><label>Txn Date</label></th>
                                    <th><label>From Date</label></th>
                                    <th><label>To Date</label></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Dates as $Date){ ?>
                                <tr>
                                    <td><?php  echo $Date['TxnDate'];?></td>
                                    <td><?php  echo $Date['DateFrom'];?></td>
                                    <td><?php  echo $Date['DateTo'];?></td>
                                </tr>
                                <?php }?> 
                            </tbody>
                        </table>
                    </div>
                    <?php } else {?>
                        Invalid Date
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>            
</div> 
<script>
    $('#From').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#To').datetimepicker({
            format: 'YYYY-MM-DD'
        });

    </script>