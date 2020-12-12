<?php
    //$requests = $mysql->select("select * from _tbl_payoutsummary where `PayableAmount` >0 and MemberID='".$_SESSION['User']['MemberID']."'  Order by `PayoutID` Desc");
  //  $requests = $mysql->select("select * from _tbl_payoutsummary where (`DebitLeft` >0 or `DebitRight`>0 ) and MemberID='".$_SESSION['User']['MemberID']."'  Order by `PayoutID` Desc"); (Date(`PayoutProcessDate`)>=Date('".$_POST['From']."') and Date(`PayoutProcessDate`)<=Date('".$_POST['To']."')) and 
    $requests = $mysql->select("select * from _tbl_payoutsummary where MemberCode='".$_GET_['MCode']."'  Order by `PayoutID` Desc");
    $requestsummary = $mysql->select("select   sum(TodayLeft) as _TodayLeft, sum(TodayRight) as _TodayRight , sum(DebitLeft) as _DebitLeft, sum(DebitRight) as _DebitRight from _tbl_payoutsummary where (`DebitLeft` >0 or `DebitRight`>0 ) and MemberCode='".$_GET_['MCode']."'  Order by `PayoutID` Desc");
?>
<?php $action = explode("/",$_GET['cp']); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist" style="margin:0px auto;background:#fff">
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $action[1]=="BinaryPayout" ? 'active show ' : '';?>" id="pills-home-tab" href="dashboard.php?action=Members/ViewMember&cp=Reports/BinaryPayout&MCode=<?php echo $_GET['MCode'];?>" role="tab" >Binary Payout</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $action[1]=="BinaryIncome" ? 'active show ' : '';?>" id="pills-contact-tab"   href="dashboard.php?action=Members/ViewMember&cp=Reports/BinaryIncome&MCode=<?php echo $_GET['MCode'];?>">Binary Income</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $action[1]=="ReferralIncome" ? 'active show ' : '';?>" id="pills-contact-tab"   href="dashboard.php?action=Members/ViewMember&cp=Reports/ReferralIncome&MCode=<?php echo $_GET['MCode'];?>">Referral Income</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $action[1]=="RoiIncome" ? 'active show ' : '';?>" id="pills-contact-tab"   href="dashboard.php?action=Members/ViewMember&cp=Reports/RoiIncome&MCode=<?php echo $_GET['MCode'];?>">Roi Income</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $action[1]=="BankTransfer" ? 'active show ' : '';?>" id="pills-contact-tab"   href="dashboard.php?action=Members/ViewMember&cp=Reports/BankTransfer&MCode=<?php echo $_GET['MCode'];?>">Bank Transfer</a>
                    </li>
                    <li class="nav-item submenu">
                        <a class="nav-link <?php echo $action[1]=="Ledger" ? 'active show ' : '';?>" id="pills-contact-tab"   href="dashboard.php?action=Members/ViewMember&cp=Reports/Ledger&MCode=<?php echo $_GET['MCode'];?>">Ledger</a>
                    </li>
                </ul> 
            </div>
        </div>
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
                                       <!-- <td style="text-align: right"><?php echo $r['EligibleMinimumPayoutPV'];?></td>
                                        <td style="text-align: right"><?php echo $r['EligibleMaximumPayoutPV'];?></td>
                                        <td style="text-align: right"><?php echo $r['PayablePV'];?></td>-->
                                        <td style="text-align: right"><?php echo number_format($r['PayableAmount'],2);?></td>
                                        <!--<td style="text-align: right"><?php echo "10%";?></td>-->
                                        <td style="text-align: right"><?php echo number_format($r['ChargeAmount'],2);?></td>
                                        <td style="text-align: right"><?php echo number_format($r['PayableAmountDebitCharge'],2);?></td>
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
<?php } ?>

<script>
$('#From').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#To').datetimepicker({
        format: 'YYYY-MM-DD'
    });

</script>