<?php include_once("header.php");?>
<?php
  $Requests  = $mysqldb->select("SELECT *
                        FROM `_tbl_wallet_request_utility`
                        LEFT  JOIN `_tbl_Members`  
                        ON `_tbl_wallet_request_utility`.`MemberID`=`_tbl_Members`.`MemberID` where `_tbl_wallet_request_utility`.`RequestID`='".$_GET['code']."'");                                     
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
        <?php 
            if (isset($_POST['Approve'])) {
                $balance = getUtilityhWalletBalance($Requests[0]['MemberID'])+$Requests[0]['Amount'];
                $id=$mysqldb->insert("_tbl_wallet_utility",array("MemberID"         => $Requests[0]['MemberID'],
                                                              "Particulars"      =>'Add To Wallet',                    
                                                              "Credits"          => $Requests[0]['Amount'],                    
                                                              "Debits"           => "0", 
                                                              "AvailableBalance" => $balance,                   
                                                              "RequestID"        => $Requests[0]['RequestID'],                    
                                                              "TxnDate"=>date("Y-m-d H:i:s")));  
                echo $mysqldb->qry;
                $mysqldb->execute("update _tbl_wallet_request_utility set `WalletTransactionID`='".$id."', 
                                                                       `TransactionOn`='".date('Y-m-d H:i:s')."',
                                                                       `IsApproved`='1',
                                                                       `IsApprovedOn`='".date('Y-m-d H:i:s')."' 
                                                                       where 
                                                                       `RequestID`='".$_GET['code']."'");                                     
                $member = $mysqldb->select("select * from `_tbl_Members` where `MemberID`='".$Requests[0]['MemberID']."'");
                $d = MobileSMS::sendSMS($member[0]['MobileNumber'],"Your Utility Wallet has been updated. Available Utility Wallet Balance Rs.".number_format($balance,2),$Requests[0]['MemberID']);
                $successmessage="Approved Successfully";  
                ?>
                <script>location.href='dashboard.php?action=Wallets/UtilityViewWalletRequest&code=<?php echo $Requests[0]['RequestID'];?>';</script>
                <?php 
            }
            if (isset($_POST['Reject'])) {
                $mysqldb->execute("update _tbl_wallet_request_utility set `IsRejected`='1', 
                                                                       `IsRejectedOn`='".date('Y-m-d H:i:s')."' 
                                                                       where 
                                                                       `RequestID`='".$_GET['code']."'");
                 $member = $mysqldb->select("select * from `_tbl_Members` where `MemberID`='".$Requests[0]['MemberID']."'");
               $d = MobileSMS::sendSMS($member[0]['MobileNumber'],"Your Utility Wallet update request (Req.ID: ".$_GET['code'].") amount Rs.".$Requests[0]['Amount']." as been rejected",$Requests[0]['MemberID']);
                ?>
                <script>location.href='dashboard.php?action=Wallets/UtilityViewWalletRequest&code=<?php echo $Requests[0]['RequestID'];?>';</script>
                <?php
            }
              $Requests  = $mysqldb->select("SELECT *
                        FROM `_tbl_wallet_request_utility`
                        LEFT  JOIN `_tbl_Members`  
                        ON `_tbl_wallet_request_utility`.`MemberID`=`_tbl_Members`.`MemberID` where `_tbl_wallet_request_utility`.`RequestID`='".$_GET['code']."'");                                     
                                   

        ?>
        <div class="card-body">
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
                                <div class="col-md-4 col-xs-6 b-r"> <strong> </strong>
                                    <br>
                                    <p class="text-muted"></p>
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
                </div>            </div>
            


         <?php include_once("footer.php"); ?>



 
