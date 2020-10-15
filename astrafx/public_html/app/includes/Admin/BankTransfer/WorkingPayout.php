
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=BankTransfer/ReferalIncome">Bank Transfer</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=BankTransfer/WorkingPayout">Weekly Working Payout</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Weekly Working Payout</h4>
                </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label>Payout Week</label>
                                    <select class="form-control" name="payoutDate">
                                        <option value="1">Jun 20, 2020</option>
                                    </select>   
                                </div>
                                 
                                <div class="col-sm-2"><label class="col-sm-1"> &nbsp;</label><button type="submit" name="viewTransaction" class="btn btn-primary">View transactions</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(strlen($_POST['payoutDate'])!=0) {?>   
    <div style="padding:25px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">    
                <div class="card-body">
                    <div class="row">
                             <div class="col-sm-3">
                                    <label>Total Amount ($)</label>
                                    <input type="text" disabled="disabled" class="form-control" value="0.00">
                                </div>
                                <div class="col-sm-3">
                                    <label>Settled Amount ($)</label>
                                    <input type="text" disabled="disabled" class="form-control" value="0.00">
                                </div> 
                                
                                <div class="col-sm-3">
                                    <label>Unsettled ($)</label>
                                    <input type="text" disabled="disabled" class="form-control" value="0.00">
                                </div>
                                 
                    </div>
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>Member ID</th>
                                    <th style="text-align: right">Binary<br>Income</th>
                                    <th style="text-align: right">Referral<br>Income</th>
                                    <th style="text-align: right">Total<br>Income</th>
                                    <th style="text-align: right">Before<br>Wallet</th>
                                    <th style="text-align: right">After<br>Wallet</th>
                                    <th style="text-align: right">Amount<br>To Transfer</th>
                                    <th style="text-align: right">Bank<br>Account No</th>
                                    <th style="text-align: right">Bank<br>IFS Code</th>
                                    <th style="text-align: right">Bank<br>Ref ID</th>
                                    <th style="text-align: right">Verified</th>
                                    <th style="text-align: right">Manual</th>
                                    <th style="text-align: right">Automatic</th>
                                    <th style="text-align: right">Settled</th>
                                    <th style="text-align: right">Settled<br>On</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                //$Transactions=$mysql->select("select * from `_tbl_wallet_earnings` where Date(`TxnDate`)>=Date('".$_POST['From']."') and Date(`TxnDate`)<=Date('".$_POST['To']."') and MemberID='".$_SESSION['User']['MemberID']."' and (Ledger='4' or Ledger='40001') order by EarningID DESC"); 
                                ?>
                               
                                <?php if(sizeof($Transactions)=="0"){?>
                                <tr>
                                    <td colspan="15" style="text-align: center;">No records found</td>
                                </tr>
                                <?php }?> 
                                <?php foreach ($Transactions as $Transaction){ ?>
                                <tr>
                                    <td><?php echo date("M d, Y",strtotime($Transaction['TxnDate']));?></td>
                                    <td><?php echo $Transaction['Particulars'];?></td>
                                    <td style="text-align: right"><?php echo number_format($Transaction['Credits'],2);?></td>
                                    <td style="text-align: right"><?php echo number_format($Transaction['Debits'],2);?></td>
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