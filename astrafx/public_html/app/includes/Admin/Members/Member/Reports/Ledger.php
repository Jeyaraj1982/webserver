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
                    <h4 class="card-title">Ledger Summary</h4>
                </div>    
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="table table-bordered table-hover" style="border: 1px solid #dee2e6;">
                            <thead>
                                <tr>
                                    <th>Income Type</th>
                                    <th>Income</th>
                                    <th style="text-align: right">Charges ($)</th>
                                    <th style="text-align: right">Credits ($)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $mem = $mysql->select("select * from _tbl_Members where MemberCode='".$_GET['MCode']."'");
                                //Date(`TxnDate`)>=Date('".$_POST['From']."') and Date(`TxnDate`)<=Date('".$_POST['To']."') and 
                                    $income = $mysql->select("select sum(Credits*1) as amt from `_tbl_wallet_earnings` where MemberID='".$mem[0]['MemberID']."' and (Ledger='3')"); 
                                    $charges = $mysql->select("select sum(Debits*1) as amt from `_tbl_wallet_earnings` where MemberID='".$mem[0]['MemberID']."' and (Ledger='30001')"); 
                                    $binary_credits = (isset($income[0]['amt']) ? $income[0]['amt'] : "0");
                                    $binary_debits = (isset($charges[0]['amt']) ? $charges[0]['amt'] : "0");
                                    $binary_balance = $binary_credits-$binary_debits;
                                ?>
                                <tr>
                                    <td>Binary</td>
                                    <td style="text-align: right"><?php echo number_format($binary_credits,3);?></td>
                                    <td style="text-align: right"><?php echo number_format($binary_debits,3);?></td>
                                    <td style="text-align: right"><?php echo number_format($binary_balance,3);?></td>
                                </tr>
                                <?php
                                //Date(`TxnDate`)>=Date('".$_POST['From']."') and Date(`TxnDate`)<=Date('".$_POST['To']."') and 
                                    $income = $mysql->select("select sum(Credits) as amt from `_tbl_wallet_earnings` where MemberID='".$mem[0]['MemberID']."' and (Ledger='2')"); 
                                    $charges = $mysql->select("select sum(Debits) as amt from `_tbl_wallet_earnings` where MemberID='".$mem[0]['MemberID']."' and (Ledger='20001')"); 
                                    $package_roi_credits = (isset($income[0]['amt']) ? $income[0]['amt'] : "0");
                                    $package_roi_debits = (isset($charges[0]['amt']) ? $charges[0]['amt'] : "0");
                                    $package_roi_balance = $package_roi_credits-$package_roi_debits;
                                ?>
                                <tr>
                                    <td>Package Roi</td>
                                    <td style="text-align: right"><?php echo number_format($package_roi_credits,3);?></td>
                                    <td style="text-align: right"><?php echo number_format($package_roi_debits,3);?></td>
                                    <td style="text-align: right"><?php echo number_format($package_roi_balance,3);?></td>
                                </tr>
                                <?php
                                //Date(`TxnDate`)>=Date('".$_POST['From']."') and Date(`TxnDate`)<=Date('".$_POST['To']."') and 
                                    $income = $mysql->select("select sum(Credits) as amt from `_tbl_wallet_earnings` where MemberID='".$mem[0]['MemberID']."' and (Ledger='4')"); 
                                    $charges = $mysql->select("select sum(Debits) as amt from `_tbl_wallet_earnings` where MemberID='".$mem[0]['MemberID']."' and (Ledger='40001')"); 
                                    $referral_roi_credits = (isset($income[0]['amt']) ? $income[0]['amt'] : "0");
                                    $referral_roi_debits = (isset($charges[0]['amt']) ? $charges[0]['amt'] : "0");
                                    $referral_roi_balance = $referral_roi_credits-$referral_roi_debits;
                                ?>
                                <tr>
                                    <td>Referral Roi</td>
                                    <td style="text-align: right"><?php echo number_format($referral_roi_credits,3);?></td>
                                    <td style="text-align: right"><?php echo number_format($referral_roi_debits,3);?></td>
                                    <td style="text-align: right"><?php echo number_format($referral_roi_balance,3);?></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <?php 
                                        $totalincome = $binary_credits+$package_roi_credits+$referral_roi_credits;
                                        $totalcharges = $binary_debits+$package_roi_debits+$referral_roi_debits;
                                        $totalBalance = $binary_balance+$package_roi_balance+$referral_roi_balance;
                                    
                                     ?>
                                    <td></td>
                                    <td style="text-align: right"><b><?php echo number_format($totalincome,3);?></b></td>
                                    <td style="text-align: right"><b><?php echo number_format($totalcharges,3);?></b></td>
                                    <td style="text-align: right"><b><?php echo number_format($totalBalance,3);?></b></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
$('#From').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#To').datetimepicker({
        format: 'YYYY-MM-DD'
    });

</script>