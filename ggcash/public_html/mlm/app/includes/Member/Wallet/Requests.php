<?php
$fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
    $toDate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
if (isset($_GET['filter']) && $_GET['filter']=="all") {
    $records = $mysql->select("select * from _tbl_wallet_request_utility where MemberID='".$_SESSION['User']['MemberID']."' and (date(RequestedOn)>=date('".$fromDate."') and date(RequestedOn)<=date('".$toDate."') ) order by RequestID Desc");
    $cnt = sizeof($records);
    $title = "All Records";
    $error = "No records found";
} elseif (isset($_GET['filter']) && $_GET['filter']=="approved") {
    $records = $mysql->select("select * from _tbl_wallet_request_utility where MemberID='".$_SESSION['User']['MemberID']."' and `IsApproved`='1' and (date(RequestedOn)>=date('".$fromDate."') and date(RequestedOn)<=date('".$toDate."') ) order by RequestID Desc");
    $title = "Approved";
    $error = "No approved records found";
    $cnt = sizeof($records);
}  elseif (isset($_GET['filter']) && $_GET['filter']=="rejected") {
    $records = $mysql->select("select * from _tbl_wallet_request_utility where MemberID='".$_SESSION['User']['MemberID']."' and `IsRejected`='1' and (date(RequestedOn)>=date('".$fromDate."') and date(RequestedOn)<=date('".$toDate."') ) order by RequestID Desc");
    $title = "Rejected";
    $error = "No rejected records found";
    $cnt = sizeof($records);
}  elseif (isset($_GET['filter']) && $_GET['filter']=="pending") {
    $records = $mysql->select("select * from _tbl_wallet_request_utility where MemberID='".$_SESSION['User']['MemberID']."' and `IsApproved`='0'  and `IsRejected`='0' order by RequestID Desc");
    $title = "Pendings";
    $error = "No pending records found";
    $cnt = sizeof($records);
} else {
    $records = $mysql->select("select * from _tbl_wallet_request_utility where MemberID='".$_SESSION['User']['MemberID']."' and `IsApproved`='0'  and `IsRejected`='0' order by RequestID Desc");
    $title = "Pendings";
    $error = "No pending records found";
    $cnt = sizeof($records);
}
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallet/Requests">Wallet</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallet/Requests">Refill Requests</a></li>
        </ul>
    </div>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=Wallet/Requests&filter=pending" <?php if($_GET['filter']=="pending") { ?> Style="text-decoration:underline;font-weight:bold" <?php } ?>><small>Pending</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Wallet/Requests&filter=approved" <?php if($_GET['filter']=="approved") { ?> Style="text-decoration:underline;font-weight:bold" <?php } ?>><small>Approved</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Wallet/Requests&filter=rejected" <?php if($_GET['filter']=="rejected") { ?> Style="text-decoration:underline;font-weight:bold" <?php } ?>><small>Rejected</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Wallet/Requests&filter=all" <?php if($_GET['filter']=="all") { ?> Style="text-decoration:underline;font-weight:bold" <?php } ?>><small>All</small></a> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Wallet Refill Requests</h4>
                    <span><?php echo $cnt;?>&nbsp;<?php echo $title;?></span>
                </div>
                <div class="card-body">
                <?php if (isset($_GET['filter']) && $_GET['filter']!="pending") { ?>
                    <form action="" method="post">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label>From</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control success" id="fdate" name="fdate" value="<?php echo isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");?>" required="" aria-invalid="false">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-sm-3">
                                    <label class="col-sm-1">To</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control success" id="tdate" name="tdate" value="<?php echo isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");?>" required="" aria-invalid="false">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-sm-2"><label class="col-sm-1"> &nbsp;</label><button type="submit" name="viewTransaction" class="btn btn-primary">View Requests</button></div>
                            </div>
                        </form>
                    <?php } ?>
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>Txn Date</th>
                                    <th>Txn ID</th>
                                    <th>Bank To</th>
                                    <th>Bank Ref#</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($records)==0) { ?>
                                <tr>
                                    <td colspan="7" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php foreach($records as $r) {?>
                                <tr>
                                    <td><?php echo $r['RequestedOn'];?></td>
                                    <td><?php echo $r['RequestID'];?></td>
                                    <td>
                                        <?php echo $r['BankName'];?><bR>
                                        <?php echo $r['AccountNumber'];?>,<?php echo $r['Mode'];?> 
                                    </td>
                                    <td><?php echo $r['TransactionNumber'];?></td>
                                    <td style="text-align: right"><?php echo number_format($r['Amount'],2);?></td>
                                    <td>
                                    <?php if($r['IsApproved']=="0" && $r['IsRejected']=="0"){ ?>
                                        <?php echo "Pending";?>
                                    <?php }?>
                                    <?php if($r['IsApproved']=="1" && $r['IsRejected']=="0"){ ?>
                                        <?php echo "Approved";?><br><?php echo $r['IsApprovedOn'];?>
                                    <?php }?>
                                    <?php if($r['IsApproved']=="0" && $r['IsRejected']=="1"){ ?>
                                        <?php echo "Rejected";?><br><?php echo $r['IsRejectedOn'];?>
                                    <?php }?>
                                    </td>
                                    <td>
                                    <a href="dashboard.php?action=Wallet/ViewRequest&code=<?php echo $r['RequestID'];?>">View</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#fdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        
        $('#tdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });

});

</script>