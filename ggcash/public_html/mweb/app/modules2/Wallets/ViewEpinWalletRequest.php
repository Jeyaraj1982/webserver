<?php 
    include_once("header.php");
    $Requests  = $mysqldb->select("SELECT * FROM _tbl_wallet_request_epin LEFT  JOIN _tbl_Members ON _tbl_wallet_request_epin.MemberID=_tbl_Members.MemberID where _tbl_wallet_request_epin.RequestID='".$_GET['code']."'");                                     
?>
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-9 align-self-center">
                    <h4 class="page-title">View Wallet Request</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">View Wallet Request</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">   
            <div class="row">
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <form method="post">
                                <h4 class="card-title text-orange"><i class="ti-user"></i>&nbsp;&nbsp;Wallet Requests</h4>
                                <div class="row">
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Member Name</strong>
                                        <br><p class="text-muted"><?php echo $Requests[0]['MemberName'];?></p>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Amount</strong>
                                        <br><p class="text-muted"><?php echo number_format($Requests[0]['Amount'],2);?></p>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Bank Name</strong>
                                        <br><p class="text-muted"><?php echo $Requests[0]['BankName'];?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Account Number</strong>
                                        <br><p class="text-muted"><?php echo $Requests[0]['AccountNumber'];?></p>
                                    </div>
                                    <div class="col-md-4 col-xs-6"> <strong>IFSCode</strong>
                                        <br><p class="text-muted"><?php echo $Requests[0]['IFSCode'];?></p>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Mode</strong>
                                        <br><p class="text-muted"><?php echo $Requests[0]['Mode'];?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Transaction ID</strong>
                                        <br><p class="text-muted"><?php echo $Requests[0]['TransactionNumber'];?></p>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Transaction Date</strong>
                                        <br><p class="text-muted"><?php echo $Requests[0]['TransferDate'];?></p>
                                    </div>
                                    <div class="col-md-4 col-xs-6 b-r"> <strong>Requested On</strong>
                                        <br><p class="text-muted"><?php echo $Requests[0]['RequestedOn'];?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4 col-xs-6 b-r">
                                        <?php if($Requests[0]['IsApproved']=="0" && $Requests[0]['IsRejected']=="0"){ ?>
                                            <p class="text-muted"><?php echo "Pending";?></p>
                                        <?php }?>
                                        <?php if($Requests[0]['IsApproved']=="1" && $Requests[0]['IsRejected']=="0"){ ?>
                                            <p class="text-muted"><?php echo "Approved";?><br><?php echo $Requests[0]['IsApprovedOn'];?></p>
                                        <?php }?>
                                        <?php if($Requests[0]['IsApproved']=="0" && $Requests[0]['IsRejected']=="1"){ ?>
                                            <p class="text-muted"><?php echo "Rejected";?><br><?php echo $Requests[0]['IsRejectedOn'];?></p>
                                        <?php }?>
                                    </div>
                                </div>
                            </form>
                            <div style="text-align:right">
                                <a href="dashboard.php?action=Wallets/EpinWalletRequests">List of Requests</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("footer.php"); ?>