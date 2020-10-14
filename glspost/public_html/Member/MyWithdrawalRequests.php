<?php
 $Requests  = $mysql->select("SELECT *
                        FROM _tbl_member_withdraw_request
                        LEFT  JOIN _tbl_member 
                        ON _tbl_member_withdraw_request.MemberID=_tbl_member.MemberID where _tbl_member_withdraw_request.MemberID='".$_SESSION['User']['MemberID']."'" );
  ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Withdrawal Requests
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered" style="width: 100%;border-top:1px solid #ebedf2;">
                                    <thead>
                                        <tr>
                                            <th><b>Txn Date</b></th>
                                            <th><b>Amount</b></th>
                                            <th><b>Member Name</b></th>
                                            <th><b>Bank Name</b></th>
                                            <th><b>Account Name</b></th>
                                            <th><b>Account Number</b></th>
                                            <th><b>IFSCode</b></th>
                                            <th><b>Status</b></th>
                                            <th><b>Status On</b></th>
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
                                                <td><a href="Dashboard.php?action=ViewMyWithDrawRequests&code=<?php echo $Request['RequestID'];?>">View</a></td>
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
    </div>
</div>
 