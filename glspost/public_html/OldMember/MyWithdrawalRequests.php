<?php include_once("header.php");?>
<?php
 $Requests  = $mysql->select("SELECT *
                        FROM _tbl_member_withdraw_request
                        LEFT  JOIN _tbl_member 
                        ON _tbl_member_withdraw_request.MemberID=_tbl_member.MemberID where _tbl_member_withdraw_request.MemberID='".$_SESSION['User']['MemberID']."'" );
  ?>
<style>
.nav-tabs > li {
    background: #f8f9fa;
    padding-top: 15px;
    padding-left: 15px;
    padding-right: 15px;
    padding-bottom: 12px;
}
.nav-tabs > li:hover {
    background: white;
    padding-top: 15px;
    padding-left: 15px;
    padding-right: 15px;
    padding-bottom: 12px;
}
</style>

            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">                                                                              
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-medal icon-gradient bg-tempting-azure">
                                    </i>
                                </div>
                                <div>Withdrawal Requests</div>
                            </div>
                            <div class="page-title-actions">
                                 
                                <div class="d-inline-block dropdown">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                        <span class="btn-icon-wrapper pr-2 opacity-7">
                                            <i class="fa fa-business-time fa-w-20"></i>
                                        </span>
                                         Withdraw Request
                                    </button>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a href="NewWithdrawalRequest" class="nav-link">
                                                    <i class="nav-link-icon lnr-inbox"></i>
                                                    <span>
                                                      New
                                                    </span>
                                                   
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <i class="nav-link-icon lnr-book"></i>
                                                    <span>
                                                        View
                                                    </span>
                                                    
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>    </div>
                    </div> 
                     
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                                <thead>
                                   <tr>
                                                <th class="border-top-0"><b>Txn Date</b></th>
                                                <th class="border-top-0"><b>Amount</b></th>
                                                <th class="border-top-0"><b>Member Name</b></th>
                                                <th class="border-top-0"><b>Bank Name</b></th>
                                                <th class="border-top-0"><b>Account Name</b></th>
                                                <th class="border-top-0"><b>Account Number</b></th>
                                                <th class="border-top-0"><b>IFSCode</b></th>
                                                <th class="border-top-0"><b>Status</b></th>
                                                <th class="border-top-0"><b>Status On</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($Requests as $Request){?>
                                            <tr>
                                                <td><?php echo $Request['RequestedOn'];?></td>
                                                <td><?php echo  number_format($Request['Amount'],2);?></td>
                                                <td><?php echo $Request['MemberName'];?></td>
                                                <td><?php echo $Request['BankName'];?></td>
                                                <td><?php echo $Request['AccountName'];?></td>
                                                <td><?php echo $Request['AccountNumber'];?></td>
                                                <td><?php echo $Request['IFSCode'];?></td>
                                                <td>
                                                    <?php if($Request['IsApproved']=="0" && $Request['IsRejected']=="0"){  
                                                            echo "Pending";   }
                                                          if($Request['IsApproved']=="1" && $Request['IsRejected']=="0"){
                                                            echo  "Accepted";}
                                                          if($Request['IsApproved']=="0" && $Request['IsRejected']=="1"){
                                                            echo  "Rejected";} 
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if($Request['IsApproved']=="1" && $Request['IsRejected']=="0"){
                                                            echo $Request['IsApprovedOn'];}
                                                          if($Request['IsApproved']=="0" && $Request['IsRejected']=="1"){
                                                            echo  $Request['IsRejectedOn'];} 
                                                    ?>
                                                </td>
                                                <td><a href="ViewMyWithDrawRequests.php?code=<?php echo $Request['RequestID'];?>">View</a></td>
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
              <?php include("footer.php");?>