<?php
    $requests = $mysql->select("select * from _payout where  MemberCode='".$_SESSION['User']['MemberCode']."' Order by `PayoutID` Desc")
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Payouts/Transactions">Payout</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Payouts/Transactions">Transactions</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Payout Transactions</h4>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th style="text-align: left;">Date</th>
                                        <th style="text-align: left;">Level</th>
                                        <th style="text-align: left;">Child</th>
                                        <th style="text-align: right;">LevelIncome</th>
                                        
                                    </tr>
                                </thead>
                                
                                <tbody>            
                                    <?php foreach($requests as $r) {?>
                                        <tr>
                                            <td><?php echo date("Y-m-d",strtotime($r['TxnDate']));?></td>
                                            <td style="text-align: right;"><?php echo $r['Level'];?></td>
                                            <td style="text-align: right;"><?php echo $r['ChildMemberCode'];?></td>
                                            <td style="text-align: right;"><?php echo number_format($r['Amount'],2);?></td>

                                        </tr>
                                    
                                    <?php } ?>
                                    <?php if (sizeof($requests)==0) {?>
                                    <tr>
                                        <td colspan="10" style="text-align: center;">No records found</td>
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
     //   $('#basic-datatables').DataTable({});
    });
</script> 