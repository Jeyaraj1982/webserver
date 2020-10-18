<?php
    $requests = $mysql->select("select * from _tbl_payoutsummary where `PayableAmount` >0 and MemberID='".$_SESSION['User']['MemberID']."'  Order by `PayoutID` Desc")
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Orders/New">Order</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Orders/New">New Order</a></li>
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
                        
                         <a href="dashboard.php?action=Orders/addProduct">Add Product</a>
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Sl No</th>
                                        <th style="text-align: center;">Product Name</th>
                                        <th style="text-align: center;">BV</th>
                                        <th style="text-align: center;">Price</th>
                                        <th style="text-align: center;">Qty</th>
                                        <th style="text-align: center;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (sizeof($requests)==0) {?>
                                    <tr>
                                        <td colspan="10" style="text-align: center;">No records found</td>
                                    </tr>
                                    <?php } ?>
                                    <?php foreach($requests as $r) { ?>
                                    <tr>
                                        <td><?php echo date("Y-m-d",strtotime($r['PayoutProcessDate']));?></td>
                                        <td style="text-align: right"><?php echo $r['TotalLeft'];?></td>
                                        <td style="text-align: right"><?php echo $r['TotalRight'];?></td>
                                        
                                        <td style="text-align: right"><?php echo $r['AvailableLeft'];?></td>
                                        <td style="text-align: right"><?php echo $r['AvailableRight'];?></td>
                                        
                                        <td style="text-align: right"><?php echo $r['DebitLeft'];?></td>
                                        <td style="text-align: right"><?php echo $r['DebitRight'];?></td>
                                        
                                        <td style="text-align: right"><?php echo $r['RemainingLeft'];?></td>
                                        <td style="text-align: right"><?php echo $r['RemainingRight'];?></td>
                                        
                                        <td style="text-align: right"><?php echo $r['TodayPayoutPV'];?></td>
                                        <td style="text-align: right"><?php echo $r['EligibleMinimumPayoutPV'];?></td>
                                        <td style="text-align: right"><?php echo $r['EligibleMaximumPayoutPV'];?></td>
                                        <!--<td style="text-align: right"><?php echo $r['PayablePV'];?></td>-->
                                        <td style="text-align: right"><?php echo number_format($r['PayableAmount'],2);?></td>
                                        <td style="text-align: right"><?php echo "10%";?></td>
                                        <td style="text-align: right"><?php echo number_format($r['ChargeAmount'],2);?></td>
                                        <td style="text-align: right"><?php echo number_format($r['PayableAmountDebitCharge'],2);?></td>
                                        <td>
                                        <?php
                                            if ($r['IsPayoutEligible']==0) {
                                                echo "Payout not eligible";
                                            }
                                        ?>
                                        </td>
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