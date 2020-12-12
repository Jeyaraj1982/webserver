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
                    <h4 class="card-title">Binary Income</h4>
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
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>Txn Date</th>
                                    <th>Particulars</th>
                                    <th style="text-align: right">Credits</th>
                                    <th style="text-align: right">Debits</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $mem = $mysql->select("select * from _tbl_Members where MemberCode='".$_GET['MCode']."'");
                                $Transactions=$mysql->select("select * from `_tbl_wallet_earnings` where Date(`TxnDate`)>=Date('".$_POST['From']."') and Date(`TxnDate`)<=Date('".$_POST['To']."') and MemberID='".$mem[0]['MemberID']."' and (Ledger='3' or Ledger='30001') order by EarningID DESC"); 
                                ?>
                               
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
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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