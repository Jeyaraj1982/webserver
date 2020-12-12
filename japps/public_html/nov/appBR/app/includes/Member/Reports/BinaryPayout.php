
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Payouts/Transactions">Reports</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Payouts/Transactions">Binary Payout</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Payout Transactions</h4>
                </div>
                <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label>From</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control success" id="From" name="From" value="<?php echo isset($_POST['From']) ? $_POST['From'] : date("Y-m-d");?>" required="" aria-invalid="false"><label id="From-error" class="error" for="From"></label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-sm-3">
                                    <label class="col-sm-1">To</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control success" id="To" name="To" value="<?php echo isset($_POST['To']) ? $_POST['To'] : date("Y-m-d");?>" required="" aria-invalid="false"><label id="To-error" class="error" for="To"></label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-sm-2"><label class="col-sm-1"> &nbsp;</label><button type="submit" name="viewTransaction" class="btn btn-primary">View transactions</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       <?php if(strlen($_POST['From'])!=0 && strlen($_POST['To'])!=0) {?> 
       <?php
    //$requests = $mysql->select("select * from _tbl_payoutsummary where `PayableAmount` >0 and MemberID='".$_SESSION['User']['MemberID']."'  Order by `PayoutID` Desc");
  //  $requests = $mysql->select("select * from _tbl_payoutsummary where (`DebitLeft` >0 or `DebitRight`>0 ) and MemberID='".$_SESSION['User']['MemberID']."'  Order by `PayoutID` Desc");
    $requests = $mysql->select("select * from _tbl_payoutsummary where (Date(`PayoutProcessDate`)>=Date('".$_POST['From']."') and Date(`PayoutProcessDate`)<=Date('".$_POST['To']."')) and MemberID='".$_SESSION['User']['MemberID']."'  Order by `PayoutID` Desc");
    $requestsummary = $mysql->select("select   sum(TodayLeft) as _TodayLeft, sum(TodayRight) as _TodayRight , sum(DebitLeft) as _DebitLeft, sum(DebitRight) as _DebitRight from _tbl_payoutsummary where (`DebitLeft` >0 or `DebitRight`>0 ) and MemberID='".$_SESSION['User']['MemberID']."'  Order by `PayoutID` Desc");
    
?>
       <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Txn Date</th>
                                       <!-- <th style="text-align: center;">Total Left</th>-->
                                        <!--<th style="text-align: center;">Total Right</th>-->
                                       <th style="text-align: center;">Aval Left</th>
                                        <th style="text-align: center;">Aval Right</th>
                                       <!--  <th style="text-align: center;">Txn Left</th>
                                        <th style="text-align: center;">Txn Right</th>
                                        <th style="text-align: center;">Bal Left</th>
                                        <th style="text-align: center;">Bal Right</th> -->
                                        
                                        <th style="text-align: center;">Payout<br>PV</th>
                                        <th style="text-align: center;">Payable<br>PV</th>
                                        <!--<th style="text-align: center;">MiniPayout<br>PV</th>
                                        <th style="text-align: center;">MaxiPayout<br>PV</th>
                                        <th style="text-align: center;">Payable<br>PV</th>-->
                                        <th style="text-align: right;">Payout($)</th>
                                        <!--<th style="text-align: center;">Charge</th>-->
                                        <th style="text-align: right;">Charged($)</th>
                                        <th style="text-align: right;">Payable($)</th>
                                       <!-- <th style="text-align: center;">Remarks</th>-->
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
                                        <td><?php echo date("M d, Y",strtotime($r['PayoutProcessDate']));?></td>
                                        <!--<td style="text-align: right"><?php echo $r['TotalLeft'];?></td>
                                        <td style="text-align: right"><?php echo $r['TotalRight'];?></td>  -->
                                        
                                        <td style="text-align: right"><?php echo $r['AvailableLeft'];?></td>
                                        <td style="text-align: right"><?php echo $r['AvailableRight'];?></td>
                                        
                                      <!--  <td style="text-align: right"><?php echo $r['DebitLeft'];?></td>
                                        <td style="text-align: right"><?php echo $r['DebitRight'];?></td>
                                        
                                        <td style="text-align: right"><?php echo $r['RemainingLeft'];?></td>
                                        <td style="text-align: right"><?php echo $r['RemainingRight'];?></td> -->
                                        
                                        <td style="text-align: right"><?php echo $r['TodayPayoutPV'];?></td>
                                        <td style="text-align: right"><?php echo ($r['TodayPayoutPV']>0) ? $r['EligibleMaximumPayoutPV'] : 0;?></td>
                                       <!-- <td style="text-align: right"><?php echo $r['EligibleMinimumPayoutPV'];?></td>
                                        <td style="text-align: right"><?php echo $r['EligibleMaximumPayoutPV'];?></td>
                                        <td style="text-align: right"><?php echo $r['PayablePV'];?></td>-->
                                        <td style="text-align: right"><?php echo number_format($r['PayableAmount'],3);?></td>
                                        <!--<td style="text-align: right"><?php echo "10%";?></td>-->
                                        <td style="text-align: right"><?php echo number_format($r['ChargeAmount'],3);?></td>
                                        <td style="text-align: right"><?php echo number_format($r['PayableAmountDebitCharge'],3);?></td>
                                        <!--<td>
                                        <?php
                                            if ($r['IsPayoutEligible']==0) {
                                                echo "Payout not eligible";
                                            }
                                        ?>
                                        </td> -->
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
        <?
       }
         ?>
</div>
<script>
    $('#From').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#To').datetimepicker({
            format: 'YYYY-MM-DD'
        });

    </script>