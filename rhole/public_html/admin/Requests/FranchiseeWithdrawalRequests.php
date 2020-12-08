<?php
    $fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
    $toDate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
   
   if($_GET['filter']=="All"){
        $txn = $mysql->select("select * from _tbl_withdrawal_request where (date(TxnOn)>=date('".$fromDate."') and date(TxnOn)<=date('".$toDate."') ) order by RequestID desc");
    }
    if($_GET['filter']=="Requested"){
        $txn = $mysql->select("select * from _tbl_withdrawal_request where (date(TxnOn)>=date('".$fromDate."') and date(TxnOn)<=date('".$toDate."') ) and Status='0' order by RequestID desc");
    }
    if($_GET['filter']=="Paid"){
        $txn = $mysql->select("select * from _tbl_withdrawal_request where (date(TxnOn)>=date('".$fromDate."') and date(TxnOn)<=date('".$toDate."') ) and Status='1' order by RequestID desc");
    }
    if($_GET['filter']=="Rejected"){
        $txn = $mysql->select("select * from _tbl_withdrawal_request where (date(TxnOn)>=date('".$fromDate."') and date(TxnOn)<=date('".$toDate."') ) and Status='2' order by RequestID desc");
    }
   
    ?> 
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="form-group row">
                                <div class="col-md-6"><div class="card-title">Wallet Requests</div></div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="<?php echo AppUrl;?>/admin/dashboard.php?action=Requests/FranchiseeWithdrawalRequests&filter=All" <?php if($_GET['filter']=="All"){ ?> style="text-decoration:underline;font-weight:bold;"<?php } ?>>All</a>&nbsp;&nbsp;|&nbsp;&nbsp;    
                                    <a href="<?php echo AppUrl;?>/admin/dashboard.php?action=Requests/FranchiseeWithdrawalRequests&filter=Requested" <?php if($_GET['filter']=="Requested"){ ?> style="text-decoration:underline;font-weight:bold;"<?php } ?>>Requested</a>&nbsp;&nbsp;|&nbsp;&nbsp;    
                                    <a href="<?php echo AppUrl;?>/admin/dashboard.php?action=Requests/FranchiseeWithdrawalRequests&filter=Paid" <?php if($_GET['filter']=="Paid"){ ?> style="text-decoration:underline;font-weight:bold;"<?php } ?>>Paid</a>&nbsp;&nbsp;|&nbsp;&nbsp;    
                                    <a href="<?php echo AppUrl;?>/admin/dashboard.php?action=Requests/FranchiseeWithdrawalRequests&filter=Rejected" <?php if($_GET['filter']=="Rejected"){ ?> style="text-decoration:underline;font-weight:bold;"<?php } ?>>Rejected</a>    
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">                                                              
                                    <div class="col-sm-2">
                                        <div class="form-group form-group-default">
                                            <label>From Date</label>
                                            <input type="text" class="form-control" id="fdate" name="fdate" value="<?php echo $fromDate;?>" placeholder="From Date">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group form-group-default">
                                            <label>To Date</label>
                                            <input type="text" class="form-control" id="tdate" name="tdate" value="<?php echo  $toDate;?>" placeholder="To Date">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="submit" value="View Requests" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table id="" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Txn Date</th>
                                            <th style="text-align: right;">Amount</th>
                                            <th>Status</th>
                                            <th>Status On</th>
                                            <th></th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php foreach($txn as $t){ ?>
                                        <tr>
                                            <form method="post" id="frm_<?php echo $t['RequestID'];?>">
                                            <input type="hidden" id="RequestID" name="RequestID" value="<?php echo $t['RequestID'];?>">
                                            <td><?php echo $t['TxnOn'];?></td>
                                            <td style="text-align: right"><?php echo number_format($t['Amount'],2);?></td>
                                            <td><?php
                                                    if($t['Status']==0){
                                                        echo "Requested";                                     
                                                    }
                                                    if($t['Status']==1){
                                                        echo "Paid";
                                                    }
                                                    if($t['Status']==2){
                                                        echo "Rejected";
                                                    }
                                             ?></td>
                                             <td><?php
                                                    if($t['Status']==0){
                                                        echo $t['TxnDate'];
                                                    }
                                                    if($t['Status']==1){
                                                        echo $t['ApprovedOn'];
                                                    }
                                                    if($t['Status']==2){
                                                        echo $t['RejectedOn'];
                                                    }
                                             ?></td>
                                            <!--<td><a href="javascript:void(0);" onclick="ViewRequests('<?php echo $t['TxnDate'];?>','<?php echo $t['TransferTo'];?>','<?php echo number_format($t['Amount'],2);?>','<?php echo $t['TransferMode'];?>','<?php echo $t['RequestID'];?>','<?php echo $t['MemberID'];?>','<?php echo $t['Remarks'];?>')">View</a></td>-->
                                            <td><a href="dashboard.php?action=Requests/ViewWithdrawalRequest&ReqID=<?php echo $t['RequestID'];?>">View</a></td>
                                            </form>
                                        </tr>
                                    <?php } ?>
                                    <?php if(sizeof($txn)==0) {?>
                                        <tr>
                                            <td colspan="7" style="text-align: center;">No Requests Found</td>
                                        </tr>
                                    <?php } ?>
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
<script>
$(document).ready(function() {$('#myTable').DataTable({ "order": [[ 0, "desc" ]]});

$('#fdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        
        $('#tdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });

});

</script>
