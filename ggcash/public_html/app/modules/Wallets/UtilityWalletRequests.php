<?php
if (isset($_GET['filter']) && $_GET['filter']=="all") {
    $records = $mysql->select("select * from _tbl_wallet_request_utility where MemberID='".$_SESSION['User']['MemberID']."' order by RequestID Desc");
    $title = "All Records";
    $error = "No records found";
} elseif (isset($_GET['filter']) && $_GET['filter']=="approved") {
    $records = $mysql->select("select * from _tbl_wallet_request_utility where MemberID='".$_SESSION['User']['MemberID']."' and `IsApproved`='1' order by RequestID Desc");
    $title = "Approved Records";
    $error = "No approved records found";
}  elseif (isset($_GET['filter']) && $_GET['filter']=="rejected") {
    $records = $mysql->select("select * from _tbl_wallet_request_utility where MemberID='".$_SESSION['User']['MemberID']."' and `IsRejected`='1' order by RequestID Desc");
    $title = "Rejected Records";
    $error = "No rejected records found";
}  elseif (isset($_GET['filter']) && $_GET['filter']=="pending") {
    $records = $mysql->select("select * from _tbl_wallet_request_utility where MemberID='".$_SESSION['User']['MemberID']."' and `IsApproved`='0'  and `IsRejected`='0' order by RequestID Desc");
    $title = "Pending Records";
    $error = "No pending records found";
} else {
    $records = $mysql->select("select * from _tbl_wallet_request_utility where MemberID='".$_SESSION['User']['MemberID']."' and `IsApproved`='0'  and `IsRejected`='0' order by RequestID Desc");
    $title = "Pending Records";
    $error = "No pending records found";
}
?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-6 align-self-center">
                <h4 class="page-title">Wallet Requests</h4>
                <span><?php echo $title;?></span>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Wallet Requests</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-6" style="text-align:right">
                <h4>
                    <a href="dashboard.php?action=Wallets/UtilityWalletRequests&filter=pending" ><small>Pending</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Wallets/UtilityWalletRequests&filter=approved"><small>Approved</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Wallets/UtilityWalletRequests&filter=rejected"><small>Rejected</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Wallets/UtilityWalletRequests&filter=all"><small>All</small></a> 
                </h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xlg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table v-middle" style="border: 1px solid; border-color: #e1e1e1;">
                                <thead>
                                    <tr>
                                        <th class="border-top-0"><b>Txn Date</b></th>
                                        <th class="border-top-0"><b>Amount</b></th>
                                        <th class="border-top-0"><b>Bank Name</b></th>
                                        <th class="border-top-0"><b>Account Number</b></th>
                                        <th class="border-top-0"><b>IFSCode</b></th>
                                        <th class="border-top-0"><b>Mode</b></th>
                                        <th class="border-top-0"><b>Transaction ID</b></th>
                                        <th class="border-top-0"><b>Status</b></th>
                                        <th class="border-top-0"><b>Status On</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($records as $r){ ?>
                                    <tr>
                                        <td><?php echo $r['TransferDate'];?></td>
                                        <td><?php echo number_format($r['Amount'],2);?></td>
                                        <td><?php echo $r['BankName'];?></td>
                                        <td><?php echo $r['AccountNumber'];?></td>
                                        <td><?php echo $r['IFSCode'];?></td>
                                        <td><?php echo $r['Mode'];?></td>
                                        <td><?php echo $r['TransactionNumber'];?></td>
                                        <td>
                                            <?php 
                                                if($r['IsApproved']=="0" && $r['IsRejected']=="0") {   
                                                    echo "Pending";
                                                }
                                                if($r['IsApproved']=="1" && $r['IsRejected']=="0") { 
                                                    echo "Approved";
                                                }
                                                if($r['IsApproved']=="0" && $r['IsRejected']=="1") { 
                                                    echo "Rejected";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                if($r['IsApproved']=="1" && $r['IsRejected']=="0") {
                                                    echo $r['IsApprovedOn'];
                                                }
                                                if($r['IsApproved']=="0" && $r['IsRejected']=="1") {
                                                    echo  $r['IsRejectedOn'];
                                                } 
                                            ?>
                                        </td> 
                                        <td>
                                            <a href="dashboard.php?action=Wallets/ViewUtilityWalletRequest&code=<?php echo $r['RequestID'];?>">View</a>
                                        </td>
                                    </tr>
                                <?php }?>
                                <?php if(sizeof($r)=="0"){?>
                                    <tr>
                                        <td colspan="9" style="text-align: center;"><?php echo $error;?></td>
                                    </tr>
                                <?php }?>   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php include_once("footer.php"); ?>