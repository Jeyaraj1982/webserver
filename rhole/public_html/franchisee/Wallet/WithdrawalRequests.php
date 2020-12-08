<?php
  {
    $fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
    $toDate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
    if($_GET['filter']=="All"){
        $txn = $mysql->select("select * from _tbl_withdrawal_request where (date(TxnOn)>=date('".$fromDate."') and date(TxnOn)<=date('".$toDate."') ) and FranchiseeID='".$_SESSION['FRANCHISEE']['userid']."' order by RequestID desc");
    }
    if($_GET['filter']=="Requested"){
        $txn = $mysql->select("select * from _tbl_withdrawal_request where (date(TxnOn)>=date('".$fromDate."') and date(TxnOn)<=date('".$toDate."') ) and FranchiseeID='".$_SESSION['FRANCHISEE']['userid']."' and Status='0' order by RequestID desc");
    }
    if($_GET['filter']=="Paid"){
        $txn = $mysql->select("select * from _tbl_withdrawal_request where (date(TxnOn)>=date('".$fromDate."') and date(TxnOn)<=date('".$toDate."') ) and FranchiseeID='".$_SESSION['FRANCHISEE']['userid']."' and Status='1' order by RequestID desc");
    }
    if($_GET['filter']=="Rejected"){
        $txn = $mysql->select("select * from _tbl_withdrawal_request where (date(TxnOn)>=date('".$fromDate."') and date(TxnOn)<=date('".$toDate."') ) and FranchiseeID='".$_SESSION['FRANCHISEE']['userid']."' and Status='2' order by RequestID desc");
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
                                <div class="col-md-6"><div class="card-title">Withdrawal Requests</div></div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="dashboard.php?action=Wallet/WithdrawalRequests&filter=All" <?php if($_GET['filter']=="All"){ ?> style="text-decoration:underline;font-weight:bold;"<?php } ?>>All</a>&nbsp;&nbsp;|&nbsp;&nbsp;    
                                    <a href="dashboard.php?action=Wallet/WithdrawalRequests&filter=Requested" <?php if($_GET['filter']=="Requested"){ ?> style="text-decoration:underline;font-weight:bold;"<?php } ?>>Requested</a>&nbsp;&nbsp;|&nbsp;&nbsp;    
                                    <a href="dashboard.php?action=Wallet/WithdrawalRequests&filter=Paid" <?php if($_GET['filter']=="Paid"){ ?> style="text-decoration:underline;font-weight:bold;"<?php } ?>>Paid</a>&nbsp;&nbsp;|&nbsp;&nbsp;    
                                    <a href="dashboard.php?action=Wallet/WithdrawalRequests&filter=Rejected" <?php if($_GET['filter']=="Rejected"){ ?> style="text-decoration:underline;font-weight:bold;"<?php } ?>>Rejected</a>    
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
                                            <th style="width:200px">Txn Date</th>
                                            <th style="text-align: right;width:250px">Amount</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php foreach($txn as $t){ ?>
                                        <tr>
                                            <td><?php echo $t['TxnOn'];?></td>
                                            <td style="text-align: right"><?php echo number_format($t['Amount'],2);?></td>
                                            <td><?php echo $t['Remarks'];?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if(sizeof($txn)==0) {?>
                                        <tr>
                                            <td colspan="4" style="text-align: center;">No Requests Found</td>
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

/*$('#SearchTxn').change(function() {
    location.href= location.href+'&filter='+ $(this).val();
});*/
</script><?php } ?>