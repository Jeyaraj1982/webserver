<?php
   // $fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
   // $toDate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
    
    $txn = $mysql->select("select * from _tbl_transactions where operatorcode='ET' and md5(Concat('J!',`MemberID`))='".$_GET['d']."' order by txnid desc");
    ?> 
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                TNEB Logs
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Txn Date</th>
                                            <th>TNEB Number</th>
                                            <th style="text-align: right;">Amount</th>
                                            <th>Status</th>
                                            <th>Status On</th>
                                            <th>Bill Number</th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php foreach($txn as $t){ ?>
                                        <tr>
                                            <td><?php echo $t['txndate'];?></td>
                                            <td><?php echo $t['rcnumber'];?></td>
                                            <td style="text-align: right"><?php echo number_format($t['rcamount'],2);?></td>
                                            <td><?php echo $t['TxnStatus'];?></td>
                                            <td><?php echo $t['TxnStatusOn'];?></td>
                                            <td><?php echo $t['BillString'];?></td>
                                           
                                            <!--<td><a href="javascript:void(0);" onclick="ViewRequests('<?php echo $t['TxnDate'];?>','<?php echo $t['TransferTo'];?>','<?php echo number_format($t['Amount'],2);?>','<?php echo $t['TransferMode'];?>','<?php echo $t['RequestID'];?>','<?php echo $t['MemberID'];?>','<?php echo $t['Remarks'];?>')">View</a></td>-->
                                            <!--<td><a href="dashboard.php?action=Requests/ViewTNEBRequest&ReqID=<?php echo $t['txnid'];?>">View</a></td>-->
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
});

</script>

