<?php
    $fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
    $toDate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
    $txn = $mysql->select("select * from _tbl_accounts where (date(TxnDate)>=date('".$fromDate."') and date(TxnDate)<=date('".$toDate."') ) and MemberID='".$_SESSION['User']['MemberID']."' order by AccountID desc");
?> 
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Account Summary
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
                                        <input type="submit" value="View" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Txn ID</th>
                                            <th>Txn Date</th>
                                            <th>Particulars</th>                                                                                           
                                            <th>Value</th> 
                                            <th>Credit</th> 
                                            <th>Debit</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php foreach($txn as $t){ ?>
                                    
                                        <tr>
                                            
                                            <td><?php echo $t['AccountID'];?></td>
                                            <td><?php echo $t['TxnDate'];?></td>
                                            <td><?php
                                            if($s['CreditTo']>0) {
                                                $CreditTo = $mysql->select("select * from _tbl_Members where MemberID='".$t['CreditTo']."'");  
                                                echo $CreditTo[0]['MemberName'];?>
                                            <?php   } ?><?php echo $t['Particulars'];?></td>
                                            <td style="text-align: right"><?php echo number_format($t['TxnValue'],2);?></td>
                                            <td style="text-align: right"><?php echo ($t['Credit']>0) ? number_format($t['Credit'],2) : "";?></td>
                                            <td style="text-align: right"><?php echo ($t['Debit']>0) ? number_format($t['Debit'],2) : "";?></td>
                                            <td style="text-align: right"><?php echo number_format($t['Balance'],2);?></td>
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