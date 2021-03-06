<?php
if (isset($_GET['filter']) && $_GET['filter']=="all") {
    $records = $mysql->select("select * from _tbl_member_bank_details where MemberID='".$_SESSION['User']['MemberID']."' order by RequestID Desc");
    $title = "All Records";
    $error = "No records found";
} elseif (isset($_GET['filter']) && $_GET['filter']=="approved") {
    $records = $mysql->select("select * from _tbl_member_bank_details where MemberID='".$_SESSION['User']['MemberID']."' and `IsApproved`='1' order by RequestID Desc");
    $title = "Approved Records";
    $error = "No approved records found";
}  elseif (isset($_GET['filter']) && $_GET['filter']=="rejected") {
    $records = $mysql->select("select * from _tbl_member_bank_details where MemberID='".$_SESSION['User']['MemberID']."' and `IsRejected`='1' order by RequestID Desc");
    $title = "Rejected Records";
    $error = "No rejected records found";
}  elseif (isset($_GET['filter']) && $_GET['filter']=="pending") {
    $records = $mysql->select("select * from _tbl_member_bank_details where MemberID='".$_SESSION['User']['MemberID']."' and `IsApproved`='0'  and `IsRejected`='0' order by RequestID Desc");
    $title = "Pending Records";
    $error = "No pending records found";
} else {
    $records = $mysql->select("select * from _tbl_member_bank_details where MemberID='".$_SESSION['User']['MemberID']."' and `IsApproved`='0'  and `IsRejected`='0' order by RequestID Desc");
    $title = "Pending Records";
    $error = "No pending records found";
}
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Payouts/Requests">Payouts</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Payouts/Requests">Payout Requests</a></li>
        </ul>
    </div>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=Payouts/Requests&filter=pending" ><small>Pending</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Payouts/Requests&filter=approved"><small>Approved</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Payouts/Requests&filter=rejected"><small>Rejected</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Payouts/Requests&filter=all"><small>All</small></a> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Payout Requests</h4>
                    <span><?php echo $title;?></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>RequestedOn</th>
                                    <th>Amount</th>
                                    <th>BankName</th>
                                    <th>Status</th>
                                   <!-- <th></th>-->
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
                                    <td style="text-align: right"><?php echo number_format($r['Amount'],2);?></td>
                                    <td>
                                        <?php echo $r['BankName'];?><bR>
                                        <?php echo $r['AccountNumber'];?>,<?php echo $r['IFSCode'];?> 
                                    </td>
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
                                    <!--<td>
                                    <a href="dashboard.php?action=Wallet/ViewRequest&code=<?php echo $r['RequestID'];?>">View</a>
                                    </td>-->
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
        $('#basic-datatables').DataTable({});
    });
</script>