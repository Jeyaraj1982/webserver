<?php $Transactions=$mysql->select("SELECT * FROM _tbl_wallet_utility where Date(`TxnDate`)>=Date('".$_POST['From']."') and Date(`TxnDate`)<=Date('".$_POST['To']."') and  MemberID='".$_SESSION['User']['MemberID']."' order by TxnID desc"); ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallet/Transactions">Wallet</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallet/Transactions">Transaction</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Wallet Transaction</h4>
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
                                        <th>Txn Date</th>
                                        <th>Particulars</th>
                                        <th>Credits</th>
                                        <th>Debits</th>
                                        <th>Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(sizeof($Transactions)=="0"){?>
                                    <tr>
                                        <td colspan="5" style="text-align: center;">No records found</td>
                                    </tr>
                                    <?php }?> 
                                    <?php foreach ($Transactions as $Transaction){ ?>
                                    <tr>
                                        <td><?php echo date("M d, Y",strtotime($Transaction['TxnDate']));?></td>
                                        <td><?php echo $Transaction['Particulars'];?></td>
                                        <td style="text-align: right"><?php echo number_format($Transaction['Credits'],2);?></td>
                                        <td style="text-align: right"><?php echo number_format($Transaction['Debits'],2);?></td>
                                        <td style="text-align: right"><?php echo number_format($Transaction['AvailableBalance'],2);?></td>
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
</div>
<script>
$('#From').datetimepicker({format: 'YYYY-MM-DD'});
$('#To').datetimepicker({format: 'YYYY-MM-DD'});
</script> 