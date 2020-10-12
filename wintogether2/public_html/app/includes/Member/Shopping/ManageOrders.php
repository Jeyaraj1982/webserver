<?php
    //$requests = $mysql->select("select * from _tbl_wallet_earnings where MemberID='".$_SESSION['User']['MemberID']."'  Order by `EarningID`") ;
    $requests = array();
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Shopping/ManageOrders">Shopping</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Shopping/ManageOrders">Manage Orders</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Orders</h4>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Txn Date</th>
                                        <th>Particulars</th>
                                        <th>Order Value</th>
                                        <th>Is Delivered</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (sizeof($requests)==0) {?>
                                    <tr>
                                        <td colspan="6" style="text-align: center;">No records found</td>
                                    </tr>
                                    <?php } ?>
                                    <?php foreach($requests as $r) { ?>
                                    <tr>
                                        <td><?php echo $r['TxnDate'];?></td>
                                        <td><?php echo $r['Particulars'];?></td>
                                        <td><?php echo number_format($r['Credits']);?></td>
                                        <td><?php echo number_format($r['Debits']);?></td>
                                        <td><?php echo number_format($r['AvailableBalance']);?></td>
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
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
</script>  