<?php $Transactions=$mysql->select("SELECT * FROM _tbl_wallet_utility where Date(`TxnDate`)>=Date('".$_POST['From']."') and Date(`TxnDate`)<=Date('".$_POST['To']."') and  MemberID='".$data[0]['MemberID']."' order by TxnID desc"); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title" style="line-height: 20px;">Wallet Transaction<br>
                    <span style="font-size:12px;color:#757373;">Member ID : <?php echo $_GET['MCode'];?></span>   
                    <a style="float:right;font-size:13px;color:#1572E8;" href="dashboard.php?action=Members/ViewMember&cp=Wallet/WalletRequests&MCode=<?php echo $_GET['MCode'];?>">Wallet Requests</a> 
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label>From</label>
                                <div class="input-group">
                                    <input type="text" class="form-control success" id="From" name="From" value="<?php echo isset($_POST['From']) ? $_POST['From'] : date("Y-m-d");?>" required="" aria-invalid="false">
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
                                    <input type="text" class="form-control success" id="To" name="To" value="<?php echo isset($_POST['To']) ? $_POST['To'] : date("Y-m-d");?>" required="" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar-check"></i>
                                        </span>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-sm-2"><label class="col-sm-1"> &nbsp;</label><button type="submit" name="viewTransaction" class="btn btn-purple">View transactions</button></div>
                        </div>
                    </form>
                    <?php if(strlen($_POST['From'])!=0 && strlen($_POST['To'])!=0) {?>
                    <br>
                    <div class="table-responsive">
                        <table style="width:100%;">
                            <thead>
                               <tr>
                                    <th>Txn Date</th>
                                    <th>Particulars</th>
                                    <th style="text-align: right;">Credits</th>
                                    <th style="text-align: right;">Debits</th>
                                    <th style="text-align: right;">Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($Transactions)==0) {?>
                                <tr>
                                    <td colspan="5" style="text-align: center;">No records found</td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($Transactions as $Transaction){ ?>
                                <tr>
                                    <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align:left"><?php echo date("M d, Y",strtotime($Transaction['TxnDate']));?></td>
                                    <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align:left"><?php echo $Transaction['Particulars'];?></td>
                                    <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align: right"><?php echo number_format($Transaction['Credits'],2);?></td>
                                    <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align: right"><?php echo number_format($Transaction['Debits'],2);?></td>
                                    <td style="font-size:12px; border-bottom: 1px solid #ddd;text-align: right"><?php echo number_format($Transaction['AvailableBalance'],2);?></td>
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
$('#From').datetimepicker({format: 'YYYY-MM-DD'});
$('#To').datetimepicker({format: 'YYYY-MM-DD'});
</script>