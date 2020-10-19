

<?php
$fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
    $toDate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
    $records = $mysql->select("select * from _tbl_wallet_request_utility where MemberID='".$data[0]['MemberID']."' and (date(RequestedOn)>=date('".$fromDate."') and date(RequestedOn)<=date('".$toDate."') ) order by RequestID Desc");
    $cnt = sizeof($records);
    $title = "All Records";
    $error = "No records found";
?>    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title" style="line-height: 20px;">Wallet Refill Requests<br>
                    <span style="font-size:12px;color:#757373;">Member ID : <?php echo $_GET['MCode'];?></span>
                    <a style="float:right;font-size:13px;color:#1572E8;" href="dashboard.php?action=Members/ViewMember&cp=Wallet/WalletTxn&MCode=<?php echo $_GET['MCode'];?>">Wallet Transaction</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label>From</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control success" id="fdate" name="fdate" value="<?php echo isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");?>" required="" aria-invalid="false">
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
                                        <input type="text" class="form-control success" id="tdate" name="tdate" value="<?php echo isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");?>" required="" aria-invalid="false">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-sm-2"><label class="col-sm-1"> &nbsp;</label><button type="submit" name="viewTransaction" class="btn btn-purple">View Requests</button></div>
                            </div>
                        </form>
                    <?php if(strlen($_POST['fdate'])!=0 && strlen($_POST['tdate'])!=0) {?>
                    <br>
                    <div class="table-responsive">
                        <table style="width:100%;">
                            <thead>
                               <tr>
                                    <th>Txn Date</th>
                                    <th>Txn ID</th>
                                    <th>Bank To</th>
                                    <th>Bank Ref#</th>
                                    <th style="text-align: right;">Amount</th>
                                    <th style="text-align: right;">Status</th>
                                    <th style="text-align: right;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($records)==0) {?>
                                <tr>
                                    <td colspan="7" style="text-align: center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php foreach($records as $r) {?>
                                <tr>
                                    <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align:left"><?php echo $r['RequestedOn'];?></td>
                                    <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align:left"><?php echo $r['RequestID'];?></td>
                                    <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align:left">
                                        <?php echo $r['BankName'];?><bR>
                                        <?php echo $r['AccountNumber'];?>,<?php echo $r['Mode'];?> 
                                    </td>
                                    <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align:left"><?php echo $r['TransactionNumber'];?></td>
                                    <td  style="font-size:12px; border-bottom: 1px solid #ddd;text-align:right"><?php echo number_format($r['Amount'],2);?></td>
                                    <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align:right">
                                    <?php if($r['IsApproved']=="0" && $r['IsRejected']=="0"){ ?>
                                        <?php echo "Pending";?>
                                    <?php }?>
                                    <?php if($r['IsApproved']=="1" && $r['IsRejected']=="0"){ ?>
                                        <?php echo "Approved";?><br><?php echo $r['IsApprovedOn'];?>
                                    <?php }?>
                                    <?php if($r['IsApproved']=="0" && $r['IsRejected']=="1"){ ?>
                                        <?php echo "Rejected";?><br><?php echo $r['IsRejectedOn'];?>
                                    <?php }?>
                                    </td>
                                    <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align:right">
                                    <a href="dashboard.php?action=Wallet/ViewRequest&code=<?php echo $r['RequestID'];?>">View</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<script>
$(document).ready(function() {
    $('#fdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        $('#tdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });
});

</script>