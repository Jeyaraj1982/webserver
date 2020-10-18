<?php
if (isset($_GET['filter']) && $_GET['filter']=="all") {
    $records = $mysql->select("select * from _tbl_member_bank_details where Date(`RequestedOn`)>=Date('".$_POST['From']."') and Date(`RequestedOn`)<=Date('".$_POST['To']."') and MemberID='".$_SESSION['User']['MemberID']."' order by RequestID Desc");
    $title = "All Records";
    $error = "No records found";
} elseif (isset($_GET['filter']) && $_GET['filter']=="approved") {
    $records = $mysql->select("select * from _tbl_member_bank_details where Date(`RequestedOn`)>=Date('".$_POST['From']."') and Date(`RequestedOn`)<=Date('".$_POST['To']."') and MemberID='".$_SESSION['User']['MemberID']."' and `IsApproved`='1' order by RequestID Desc");
    $title = "Approved Records";
    $error = "No approved records found";
}  elseif (isset($_GET['filter']) && $_GET['filter']=="rejected") {
    $records = $mysql->select("select * from _tbl_member_bank_details where Date(`RequestedOn`)>=Date('".$_POST['From']."') and Date(`RequestedOn`)<=Date('".$_POST['To']."') and MemberID='".$_SESSION['User']['MemberID']."' and `IsRejected`='1' order by RequestID Desc");
    $title = "Rejected Records";
    $error = "No rejected records found";
}  elseif (isset($_GET['filter']) && $_GET['filter']=="pending") {
    $records = $mysql->select("select * from _tbl_member_bank_details where Date(`RequestedOn`)>=Date('".$_POST['From']."') and Date(`RequestedOn`)<=Date('".$_POST['To']."') and MemberID='".$_SESSION['User']['MemberID']."' and `IsApproved`='0'  and `IsRejected`='0' order by RequestID Desc");
    $title = "Pending Records";
    $error = "No pending records found";
} else {
    $records = $mysql->select("select * from _tbl_member_bank_details where Date(`RequestedOn`)>=Date('".$_POST['From']."') and Date(`RequestedOn`)<=Date('".$_POST['To']."') and MemberID='".$_SESSION['User']['MemberID']."' and `IsApproved`='0'  and `IsRejected`='0' order by RequestID Desc");
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Payout Requests</h4>
                    <span><?php echo $title;?></span>
                </div>
                <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label>From</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control success" id="From" name="From" value="<?php echo isset($_POST['From']) ? $_POST['From'] : date("Y-m-d");?>" required="" aria-invalid="false">
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
                                        <input type="text" class="form-control success" id="To" name="To" value="<?php echo isset($_POST['To']) ? $_POST['To'] : date("Y-m-d");?>" required="" aria-invalid="false">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-sm-2"><label class="col-sm-1"> &nbsp;</label><button type="submit" name="viewTransaction" class="btn btn-primary">View transactions</button></div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    <?php if(strlen($_POST['From'])!=0 && strlen($_POST['To'])!=0) {?> 
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
                                    <td><?php echo date("M d, Y",strtotime($r['RequestedOn']));?></td>
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
    <?php } ?>
</div>
<script>
$('#From').datetimepicker({format: 'YYYY-MM-DD'});
$('#To').datetimepicker({format: 'YYYY-MM-DD'});
</script> 