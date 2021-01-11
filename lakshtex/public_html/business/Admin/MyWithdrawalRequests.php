<?php 
$Requests  = $mysql->select("SELECT *
                        FROM _tbl_member_withdraw_request
                        LEFT  JOIN _tbl_member 
                        ON _tbl_member_withdraw_request.MemberID=_tbl_member.MemberID");
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12" style="text-align: right;">
                    <a href="/afl/withdrawal-requests">Active withdrawal Requests</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="/afl/withdrawal-requests/processed">Approved - Pending Payment</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="/afl/withdrawal-requests/paid">Approved - Paid</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="/afl/withdrawal-requests/rejected">Rejected Requestes</a>
                </div>
            </div>   <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        All Transaction
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-hover table-striped table-bordered" id="basic-datatables" style="width: 100%;border-top:1px solid #ebedf2;">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0"><b>Txn Date</b></th>
                                            <th class="border-top-0"><b>Amount</b></th>
                                            <th class="border-top-0"><b>Member Name</b></th>
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
                                            <td><a href="dashboard.php?action=ViewMyWithDrawRequests&code=<?php echo $Request['RequestID'];?>">View</a></td>
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
 

