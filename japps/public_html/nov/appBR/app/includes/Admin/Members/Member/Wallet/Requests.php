<?php 
  $mem = $mysql->select("select * from _tbl_Members where MemberCode='".$_GET['MCode']."'");
?>
<?php $action = explode("/",$_GET['cp']); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist" style="margin:0px auto;background:#fff">
                <li class="nav-item submenu">
                    <a class="nav-link <?php echo $action[1]=="Transactions" ? 'active show ' : '';?>" id="pills-home-tab" href="dashboard.php?action=Members/ViewMember&cp=Wallet/Transactions&MCode=<?php echo $_GET['MCode'];?>" role="tab" >Transaction</a>
                </li>
                <li class="nav-item submenu">
                    <a class="nav-link <?php echo $action[1]=="Requests" ? 'active show ' : '';?>" id="pills-contact-tab"   href="dashboard.php?action=Members/ViewMember&cp=Wallet/Requests&MCode=<?php echo $_GET['MCode'];?>">Requests</a>
                </li>
            </ul> 
        </div>
    </div>
</div>
<div class="row" style="margin-bottom:10px;">
    <div class="col-md-12" style="text-align: right;">
        <a href="dashboard.php?action=Members/ViewMember&cp=Wallet/Requests&filter=pending&MCode=<?php echo $_GET['MCode'];?>" ><small>Pending</small></a>&nbsp;|&nbsp;
        <a href="dashboard.php?action=Members/ViewMember&cp=Wallet/Requests&filter=approved&MCode=<?php echo $_GET['MCode'];?>"><small>Approved</small></a>&nbsp;|&nbsp;
        <a href="dashboard.php?action=Members/ViewMember&cp=Wallet/Requests&filter=rejected&MCode=<?php echo $_GET['MCode'];?>"><small>Rejected</small></a>&nbsp;|&nbsp;
        <a href="dashboard.php?action=Members/ViewMember&cp=Wallet/Requests&filter=all&MCode=<?php echo $_GET['MCode'];?>"><small>All</small></a> 
    </div>
</div>
<?php
if (isset($_GET['filter']) && $_GET['filter']=="all") {
    $records = $mysql->select("select * from _tbl_wallet_request_utility where MemberID='".$mem[0]['MemberID']."' order by RequestID Desc");
    $title = "All Records";
    $error = "No records found";
} elseif (isset($_GET['filter']) && $_GET['filter']=="approved") {
    $records = $mysql->select("select * from _tbl_wallet_request_utility where MemberID='".$mem[0]['MemberID']."' and `IsApproved`='1' order by RequestID Desc");
    $title = "Approved Records";
    $error = "No approved records found";
}  elseif (isset($_GET['filter']) && $_GET['filter']=="rejected") {
    $records = $mysql->select("select * from _tbl_wallet_request_utility where MemberID='".$mem[0]['MemberID']."' and `IsRejected`='1' order by RequestID Desc");
    $title = "Rejected Records";
    $error = "No rejected records found";
}  elseif (isset($_GET['filter']) && $_GET['filter']=="pending") {
    $records = $mysql->select("select * from _tbl_wallet_request_utility where MemberID='".$mem[0]['MemberID']."' and `IsApproved`='0'  and `IsRejected`='0' order by RequestID Desc");
    $title = "Pending Records";
    $error = "No pending records found";
} else {
    $records = $mysql->select("select * from _tbl_wallet_request_utility where MemberID='".$mem[0]['MemberID']."' and `IsApproved`='0'  and `IsRejected`='0' order by RequestID Desc");
    $title = "Pending Records";
    $error = "No pending records found";
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card"> 
            <div class="card-header">
                <h4 class="card-title">Wallet Requests</h4>
                <span style="font-weight:20">Available Balance : $ <?php echo getEarningWalletBalance($mem[0]['MemberID']);?></span> 
            </div>   
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Requested Date</th>
                                <th>Transfered Date</th>
                                <th>Bank To</th>
                                <th>Bank Ref#</th>
                                <th>Amount ($)</th>
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
                                <td><?php echo date("M d, Y H:i",strtotime($r['RequestedOn']));?></td>
                                <td><?php echo date("M d, Y",strtotime($r['TransferDate']));?></td>
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
                                    <?php echo "Approved";?><br><?php echo date("M d, Y",strtotime($r['IsApprovedOn']));?>
                                <?php }?>
                                <?php if($r['IsApproved']=="0" && $r['IsRejected']=="1"){ ?>
                                    <?php echo "Rejected";?><br><?php echo date("M d, Y",strtotime($r['IsRejectedOn']));?>
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
<script>
$('#From').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#To').datetimepicker({
        format: 'YYYY-MM-DD'
    });

</script>