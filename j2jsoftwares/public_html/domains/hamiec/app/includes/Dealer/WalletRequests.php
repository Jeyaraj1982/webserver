<?php
    $fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
    $toDate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
    $txn = $mysql->select("select * from _tbl_wallet_request where (date(TxnDate)>=date('".$fromDate."') and date(TxnDate)<=date('".$toDate."') ) and MemberID='".$_SESSION['User']['MemberID']."' order by RequestID desc");
    ?> 
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Wallet Requests
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
                                            <th>Transfer To</th>                                                                                           
                                            <th style="text-align: right;">Amount</th>
                                            <th>Mode</th>
                                            <th>Status</th>
                                            <th>Status On</th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php foreach($txn as $t){ ?>
                                        <tr>
                                            <td><?php echo $t['TxnDate'];?></td>
                                            <td><?php echo $t['TransferTo'];?></td>
                                            <td style="text-align: right"><?php echo number_format($t['Amount'],2);?></td>
                                            <td><?php echo $t['TransferMode'];?></td>
                                            <td><?php 
                                                if($t['Status']==0){
                                                    echo "Requested";
                                                }if($t['Status']==1){
                                                    echo "Approved";
                                                }
                                                if($t['Status']==2){
                                                    echo "Rejected";
                                                }
                                            ?></td>
                                            <td><?php 
                                                if($t['Status']==0){
                                                    echo $t['TxnDate'];
                                                }if($t['Status']==1){
                                                    echo $t['ApprovedOn'];
                                                }
                                                if($t['Status']==2){
                                                    echo  $t['RejectedOn'];
                                                }
                                            ?></td>
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

</script>