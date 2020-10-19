<?php include_once("header.php");?>
<?php
 
 if (isset($_GET['filter']) && $_GET['filter']=="all") {
 $Requests  = $mysqldb->select("SELECT *
                        FROM _tbl_wallet_request_epin
                        LEFT  JOIN _tbl_Members  
                        ON _tbl_wallet_request_epin.MemberID=_tbl_Members.MemberID where _tbl_wallet_request_epin.MemberID='".$_SESSION['User']['MemberID']."'order by _tbl_wallet_request_epin.RequestID DESC");
     
 } elseif (isset($_GET['filter']) && $_GET['filter']=="approved") {
 $Requests  = $mysqldb->select("SELECT *
                        FROM _tbl_wallet_request_epin
                        LEFT  JOIN _tbl_Members  
                        ON _tbl_wallet_request_epin.MemberID=_tbl_Members.MemberID where    _tbl_wallet_request_epin.IsApproved='1' and _tbl_wallet_request_epin.MemberID='".$_SESSION['User']['MemberID']."'order by _tbl_wallet_request_epin.RequestID DESC");
     
 }  elseif (isset($_GET['filter']) && $_GET['filter']=="rejected") {
 $Requests  = $mysqldb->select("SELECT *
                        FROM _tbl_wallet_request_epin
                        LEFT  JOIN _tbl_Members  
                        ON _tbl_wallet_request_epin.MemberID=_tbl_Members.MemberID where    _tbl_wallet_request_epin.IsRejected='1' and _tbl_wallet_request_epin.MemberID='".$_SESSION['User']['MemberID']."'order by _tbl_wallet_request_epin.RequestID DESC");
     
 }  elseif (isset($_GET['filter']) && $_GET['filter']=="pending") {
 $Requests  = $mysqldb->select("SELECT *
                        FROM _tbl_wallet_request_epin
                        LEFT  JOIN _tbl_Members  
                        ON _tbl_wallet_request_epin.MemberID=_tbl_Members.MemberID where  (  _tbl_wallet_request_epin.IsApproved='0' and  _tbl_wallet_request_epin.IsRejected='0') and _tbl_wallet_request_epin.MemberID='".$_SESSION['User']['MemberID']."'order by _tbl_wallet_request_epin.RequestID DESC");
     
 } else {
      $Requests  = $mysqldb->select("SELECT *
                        FROM _tbl_wallet_request_epin
                        LEFT  JOIN _tbl_Members  
                        ON _tbl_wallet_request_epin.MemberID=_tbl_Members.MemberID where  (  _tbl_wallet_request_epin.IsApproved='0' and  _tbl_wallet_request_epin.IsRejected='0') and _tbl_wallet_request_epin.MemberID='".$_SESSION['User']['MemberID']."'order by _tbl_wallet_request_epin.RequestID DESC");
     

 }
  ?>
  <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-6 align-self-center">
                        <h4 class="page-title">Wallet Requests</h4>
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
                        <h4 class="page-title">
                                <a href="dashboard.php?action=Wallets/EpinWalletRequests&filter=pending" ><small>Pending</small></a>&nbsp;|&nbsp;
                                <a href="dashboard.php?action=Wallets/EpinWalletRequests&filter=approved"><small>Approved</small></a>&nbsp;|&nbsp;
                                <a href="dashboard.php?action=Wallets/EpinWalletRequests&filter=rejected"><small>Rejected</small></a>&nbsp;|&nbsp;
                                <a href="dashboard.php?action=Wallets/EpinWalletRequests&filter=all"><small style="font-weight:bold;text-decoration:underline">All</small></a> </h4>
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
                                                <th class="border-top-0"><b>Requested On</b></th>
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
                                          <?php foreach ($Requests as $Request){ ?>
                                            <tr>
                                                <td><?php echo $Request['RequestedOn'];?></td>        
                                                <td><?php echo number_format($Request['Amount'],2);?></td>
                                                <td><?php echo $Request['BankName'];?></td>
                                                <td><?php echo $Request['AccountNumber'];?></td>
                                                <td><?php echo $Request['IFSCode'];?></td>
                                                <td><?php echo $Request['Mode'];?></td>
                                                <td><?php echo $Request['TransactionNumber'];?></td>
                                                 <td>
                                                    <?php if($Request['IsApproved']=="0" && $Request['IsRejected']=="0"){ ?>
                                                        <?php echo "Pending";?>
                                                    <?php }?>
                                                    <?php if($Request['IsApproved']=="1" && $Request['IsRejected']=="0"){ ?>
                                                        <?php echo "Approved";?>
                                                    <?php }?>
                                                    <?php if($Request['IsApproved']=="0" && $Request['IsRejected']=="1"){ ?>
                                                        <?php echo "Rejected";?>
                                                     <?php }?>
                                                </td>
                                                <td>
                                                    <?php if($Request['IsApproved']=="1" && $Request['IsRejected']=="0"){
                                                            echo $Request['IsApprovedOn'];}
                                                          if($Request['IsApproved']=="0" && $Request['IsRejected']=="1"){
                                                            echo  $Request['IsRejectedOn'];} 
                                                    ?>
                                                </td> 
                                                <td><a href="dashboard.php?action=Wallets/ViewEpinWalletRequest&code=<?php echo $Request['RequestID'];?>">View</a></td>
                                            </tr>
                                            <?php }?>
                                            <?php if(sizeof($Requests)=="0"){?>
                                                <tr>
                                                    <td colspan="9" style="text-align: center;">No Datas Found</td>
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


         <?php include_once("footer.php"); ?>



 
 