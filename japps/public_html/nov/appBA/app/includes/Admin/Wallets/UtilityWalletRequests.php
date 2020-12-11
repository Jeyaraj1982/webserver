<?php 
if (isset($_GET['filter']) && $_GET['filter']=="all") {
 $Requests  = $mysql->select("SELECT *
                        FROM _tbl_wallet_request_utility
                        LEFT  JOIN _tbl_Members  
                        ON _tbl_wallet_request_utility.MemberID=_tbl_Members.MemberID order by _tbl_wallet_request_utility.RequestID desc" );
 $title="All Requests";
} elseif (isset($_GET['filter']) && $_GET['filter']=="approved") {
 $Requests  = $mysql->select("SELECT *
                        FROM _tbl_wallet_request_utility
                        LEFT  JOIN _tbl_Members  
                        ON _tbl_wallet_request_utility.MemberID=_tbl_Members.MemberID where _tbl_wallet_request_utility.IsApproved='1'  order by _tbl_wallet_request_utility.RequestID desc" );
 $title="Approved Requests";
} elseif (isset($_GET['filter']) && $_GET['filter']=="rejected") {
 $Requests  = $mysql->select("SELECT *
                        FROM _tbl_wallet_request_utility
                        LEFT  JOIN _tbl_Members  
                        ON _tbl_wallet_request_utility.MemberID=_tbl_Members.MemberID where _tbl_wallet_request_utility.IsRejected='1' order by _tbl_wallet_request_utility.RequestID desc" );
$title="Rejected Requests";
} elseif  (isset($_GET['filter']) && $_GET['filter']=="pending") {
 $Requests  = $mysql->select("SELECT *
                        FROM _tbl_wallet_request_utility
                        LEFT  JOIN _tbl_Members  
                        ON _tbl_wallet_request_utility.MemberID=_tbl_Members.MemberID where _tbl_wallet_request_utility.IsRejected='0' and _tbl_wallet_request_utility.IsApproved='0'  order by _tbl_wallet_request_utility.RequestID desc" );
$title="Pending Requests";
} else   {
 $Requests  = $mysql->select("SELECT *
                        FROM _tbl_wallet_request_utility
                        LEFT  JOIN _tbl_Members  
                        ON _tbl_wallet_request_utility.MemberID=_tbl_Members.MemberID where _tbl_wallet_request_utility.IsRejected='0' and _tbl_wallet_request_utility.IsApproved='0' order by _tbl_wallet_request_utility.RequestID desc" );
$title="Pending Requests";
}
  ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallest/UtilityWalletRequests">Wallet</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallets/UtilityWalletRequests">Refill Wallet Requests</a></li>
        </ul>
    </div>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=Wallets/UtilityWalletRequests&filter=pending" ><small>Pending</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Wallets/UtilityWalletRequests&filter=approved"><small>Approved</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Wallets/UtilityWalletRequests&filter=rejected"><small>Rejected</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=Wallets/UtilityWalletRequests&filter=all"><small>All</small></a> 
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Wallet Refill Requests</h4>
                        <span><?php echo $title;?></span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th><b>Requested</b></th>
                                        <th><b>Member</b></th>
                                        <th><b>To Bank</b></th>
                                        <th><b>Txn ID</b></th>
                                        <th><b>Txn Date</b></th>
                                        <th><b>Amount</b></th>
                                        <th><b>Status</b></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Requests as $Request){ ?>
                                    <tr>
                                        <td><?php echo $Request['TransferDate'];?></td>
                                        <td><?php echo $Request['MemberName'];?><br><?php echo $Request['MemberCode'];?></td>
                                        <td><?php echo $Request['BankName'];?><br><?php echo $Request['AccountNumber'];?></td>
                                        <td><?php echo $Request['Mode'];?><br><?php echo $Request['TransactionNumber'];?></td>
                                        <td><?php echo date("Y-m-d",strtotime($Request['TransferDate']));?></td>
                                        <td><?php echo  number_format($Request['Amount'],2);?></td>
                                        <td>
                                            <?php 
                                                if($Request['IsApproved']=="0" && $Request['IsRejected']=="0") {  
                                                    echo "Pending";   
                                                }
                                                if($Request['IsApproved']=="1" && $Request['IsRejected']=="0") {
                                                    echo  "Approved<br>";
                                                    echo $Request['IsApprovedOn'];
                                                }
                                                if($Request['IsApproved']=="0" && $Request['IsRejected']=="1") {
                                                    echo  "Rejected<br>";
                                                    echo $Request['IsRejectedOn'];
                                                } 
                                            ?>
                                        </td>
                                        <td><a href="dashboard.php?action=Wallets/UtilityViewWalletRequest&code=<?php echo $Request['RequestID'];?>">View</a></td>
                                    </tr>
                                    <?php }?>  
                                    <?php if(sizeof($Requests)=="0"){?>
                                    <tr>
                                        <td colspan="8" style="text-align: center;">No Datas Found</td>
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
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
</script>