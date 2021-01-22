<?php
    $fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
    $toDate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
    
    $txn = $mysql->select("select * from _tbl_transactions where (date(TxnDate)>=date('".$fromDate."') and date(TxnDate)<=date('".$toDate."') ) and operatorcode!='RA' and operatorcode!='RI' and operatorcode!='RJ' and operatorcode!='RB' and operatorcode!='RV' order by txnid desc");
    ?> 
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                TNEB Requests
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
                                            <th>Member ID</th>                                                                                           
                                            <th style="text-align: right;">Amount</th>
                                            <th>TNEB Number</th>
                                            <th>Status</th>
                                            <th>Status On</th>
                                            <th></th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php foreach($txn as $t){ ?>
                                        <tr>
                                            <td><?php echo $t['txndate'];?></td>
                                            <td><?php echo $t['MemberID'];?></td>
                                            <td style="text-align: right"><?php echo number_format($t['rcamount'],2);?></td>
                                            <td><?php echo $t['rcnumber'];?></td>
                                            <td><?php echo $t['TxnStatus'];?></td>
                                           
                                            <!--<td><a href="javascript:void(0);" onclick="ViewRequests('<?php echo $t['TxnDate'];?>','<?php echo $t['TransferTo'];?>','<?php echo number_format($t['Amount'],2);?>','<?php echo $t['TransferMode'];?>','<?php echo $t['RequestID'];?>','<?php echo $t['MemberID'];?>','<?php echo $t['Remarks'];?>')">View</a></td>-->
                                            <td><a href="dashboard.php?action=Requests/ViewTNEBRequest&ReqID=<?php echo $t['txnid'];?>">View</a></td>
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

