<?php
    $Requests  = $mysql->select("SELECT * FROM `_tbl_wallet_request_utility`
                                 LEFT  JOIN `_tbl_Members`  
                                 ON `_tbl_wallet_request_utility`.`MemberID`=`_tbl_Members`.`MemberID` where `_tbl_wallet_request_utility`.`RequestID`='".$_GET['code']."'");                                     
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallest/UtilityWalletRequests">Wallet</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallets/UtilityViewWalletRequest">Refill Wallet Request Information</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Wallet Refill Request Information</h4>
                        <span><?php echo $title;?></span>
                    </div>
                    <div class="card-body">         
                        <?php 
                            if (isset($_POST['Approve'])) {
                                $isProcess = $mysql->select("Select * from _tbl_wallet_request_utility where `IsApproved`='0' and `IsRejected`='0' and `RequestID`='".$_GET['code']."'");
                                $OldBalance = getEarningWalletBalance($Requests[0]['MemberID']);
                                 echo $mysql->error;
                                if (sizeof($isProcess)==1) {
                                    $balance = getEarningWalletBalance($Requests[0]['MemberID'])+$Requests[0]['Amount'];
                                     
                                    $id=$mysql->insert("_tbl_wallet_earnings",array("MemberID"         => $Requests[0]['MemberID'],
                                                                                   "MemberCode"         => $Requests[0]['MemberCode'],
                                                                                   "Particulars"      => 'Approved Wallet Request: '.$Requests[0]['RequestID'],                    
                                                                                   "Credits"          => $Requests[0]['Amount'],                    
                                                                                   "Debits"           => "0", 
                                                                                   "AvailableBalance" => $balance,                   
                                                                                   "TxnDate"          => date("Y-m-d H:i:s"))); 
                                   
                                    $mysql->execute("update _tbl_wallet_request_utility set `WalletTransactionID`='".$id."', 
                                                                                            `TransactionOn`='".date('Y-m-d H:i:s')."',
                                                                                            `IsApproved`='1',
                                                                                            `IsApprovedOn`='".date('Y-m-d H:i:s')."',
                                                                                            `OldBalance`='".$OldBalance."',  
                                                                                            `NewBalance`='".number_format("",2)."'  
                                                                                            where 
                                                                                            `RequestID`='".$_GET['code']."'");                                     
                                    $member = $mysql->select("select * from `_tbl_Members` where `MemberID`='".$Requests[0]['MemberID']."'");
                                 //   $d = MobileSMS::sendSMS($member[0]['MobileNumber'],"Your Utility Wallet has been updated. Available Utility Wallet Balance Rs.".number_format($balance,2),$Requests[0]['MemberID']);
                                    ?>
                                    <script>location.href='dashboard.php?action=Wallets/UtilityViewWalletRequest&&s=1&code=<?php echo $Requests[0]['RequestID'];?>';</script>
                                    <?php 
                                } else {
                                    echo "Already Processed";
                                }
                            }
                            if (isset($_POST['Reject'])) {
                                $isProcess = $mysql->select("Select * from _tbl_wallet_request_utility where `IsApproved`='0' and `IsRejected`='0' and `RequestID`='".$_GET['code']."'");
                                $OldBalance = getEarningWalletBalance($Requests[0]['MemberID']);
                                if (sizeof($isProcess)==1) {
                                     $balance = getEarningWalletBalance($Requests[0]['MemberID'])+$Requests[0]['Amount'];
                                    $mysql->execute("update _tbl_wallet_request_utility set `IsRejected`='1', 
                                                                                            `IsRejectedOn`='".date('Y-m-d H:i:s')."',
                                                                                            `OldBalance`='".$OldBalance."',  
                                                                                            `NewBalance`='0000' 
                                                                                            where 
                                                                                            `RequestID`='".$_GET['code']."'");
                                    $member = $mysql->select("select * from `_tbl_Members` where `MemberID`='".$Requests[0]['MemberID']."'");
                                   // $d = MobileSMS::sendSMS($member[0]['MobileNumber'],"Your Utility Wallet update request (Req.ID: ".$_GET['code'].") amount Rs.".$Requests[0]['Amount']." as been rejected",$Requests[0]['MemberID']);
                                    ?>
                                    <script>location.href='dashboard.php?action=Wallets/UtilityViewWalletRequest&&s=0&code=<?php echo $Requests[0]['RequestID'];?>';</script>
                                    <?php
                                } else {
                                   echo "Already Processed";                                                  
                                }
                            }
                            $Requests  = $mysql->select("SELECT * FROM `_tbl_wallet_request_utility`
                                                             LEFT  JOIN `_tbl_Members`  
                                                             ON `_tbl_wallet_request_utility`.`MemberID`=`_tbl_Members`.`MemberID` where `_tbl_wallet_request_utility`.`RequestID`='".$_GET['code']."'");                                     
                        ?>
                        <p style="color:red"><?php echo $successmessage; ?></p>
                        <form method="post">
                            <div class="row">
                                <div class="col-md-4 col-xs-6 b-r"> 
                                    <strong>Request ID</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $Requests[0]['RequestID'];?></p>
                                </div>
                                <div class="col-md-4 col-xs-6 b-r"> 
                                    <strong>Amount</strong>
                                    <br>
                                    <p class="text-muted"><?php echo number_format($Requests[0]['Amount'],2);?></p>
                                </div>
                                <div class="col-md-4 col-xs-6 b-r"> <strong>Requested On</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $Requests[0]['RequestedOn'];?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-xs-6 b-r"> 
                                    <strong>Member Code</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $Requests[0]['MemberCode'];?></p>
                                </div>
                                <div class="col-md-4 col-xs-6 b-r"> 
                                    <strong>Member Name</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $Requests[0]['MemberName'];?></p>
                                </div>
                                <div class="col-md-4 col-xs-6 b-r"> 
                                    <strong></strong>
                                    <br>
                                    <p class="text-muted"></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                 <div class="col-md-4 col-xs-6 b-r"> <strong>Bank Name</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $Requests[0]['BankName'];?></p>
                                </div>
                                <div class="col-md-4 col-xs-6 b-r"> 
                                    <strong>Account Number</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $Requests[0]['AccountNumber'];?></p>
                                </div>
                                <div class="col-md-4 col-xs-6 b-r"> 
                                    <strong>Mode</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $Requests[0]['Mode'];?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4 col-xs-6 b-r"> 
                                    <strong>Transaction ID</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $Requests[0]['TransactionNumber'];?></p>
                                </div>
                                <div class="col-md-4 col-xs-6 b-r"> 
                                    <strong>Transaction Date</strong>
                                    <br>
                                    <p class="text-muted"><?php echo date("Y-m-d",strtotime($Requests[0]['TransferDate']));?></p>
                                </div>
                                <div class="col-md-4 col-xs-6 b-r"> <strong>Remarks</strong>
                                    <br>
                                    <p class="text-muted"><?php echo $Requests[0]['Remarks'];?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 col-xs-6 b-r">
                                    <?php if($Requests[0]['IsApproved']=="0" && $Requests[0]['IsRejected']=="0"){ ?>
                                        <button type="submit" name="Approve" id="Approve" class="btn btn-primary" >Approve</button>&nbsp;&nbsp;
                                        <button type="submit" name="Reject" id="Reject" class="btn btn-danger" >Reject</button>&nbsp;&nbsp;
                                        <a href="dashboard.php?action=Wallets/UtilityWalletRequests">List of Utility Wallet Update Requests</a>
                                    <?php }?>
                                    <?php if($Requests[0]['IsApproved']=="1" && $Requests[0]['IsRejected']=="0"){ ?>
                                        <p class="text-muted"><?php echo "Approved";?><br><?php echo $Requests[0]['IsApprovedOn'];?></p>
                                        <a href="dashboard.php?action=Wallets/UtilityWalletRequests">List of Utility Wallet Update Requests</a>
                                    <?php }?>
                                    <?php if($Requests[0]['IsApproved']=="0" && $Requests[0]['IsRejected']=="1"){ ?>
                                        <p class="text-muted"><?php echo "Rejected";?><br><?php echo $Requests[0]['IsRejectedOn'];?></p>
                                        <a href="dashboard.php?action=Wallets/UtilityWalletRequests">List of Utility Wallet Update Requests</a>
                                    <?php }?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>