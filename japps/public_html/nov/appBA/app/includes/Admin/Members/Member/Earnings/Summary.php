<?php $requests = $mysql->select("select * from _tbl_wallet_earnings where MemberID='".$data[0]['MemberID']."'  Order by `EarningID` DESC"); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">A/C Summary</h4>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Txn ID</th>
                                        <th>Txn Date</th>
                                        <th>Particulars</th>  
                                        <th>Credit</th>
                                        <th>Debits</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (sizeof($requests)==0) {?>
                                    <tr>
                                        <td colspan="5" style="text-align: center;">No records found</td>
                                    </tr>
                                    <?php } ?>
                                    <?php foreach($requests as $r) { ?>
                                    <tr>
                                        <td><?php echo $r['EarningID'];?></td>
                                        <td><?php echo $r['TxnDate'];?></td>
                                        <td><?php echo $r['Particulars'];?></td>   
                                        <td style="text-align: right"><?php echo number_format($r['Credits'],2);?></td>
                                        <td style="text-align: right"><?php echo number_format($r['Debits'],2);?></td>
                                        <td style="text-align: right"><?php echo number_format($r['AvailableBalance'],2);?></td>
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
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
</script> 