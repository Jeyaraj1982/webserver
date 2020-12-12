
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Reports/Ledger">Reports</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Reports/Ledger">Ledger Summary</a></li>
        </ul>
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
                                //Date(`TxnDate`)>=Date('".$_POST['From']."') and Date(`TxnDate`)<=Date('".$_POST['To']."') and 
                                    $income = $mysql->select("select sum(Credits*1) as amt from `_tbl_wallet_earnings` where MemberID='".$_SESSION['User']['MemberID']."' and (Ledger='3')"); 
                                    $charges = $mysql->select("select sum(Debits*1) as amt from `_tbl_wallet_earnings` where MemberID='".$_SESSION['User']['MemberID']."' and (Ledger='30001')"); 
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
                                    $income = $mysql->select("select sum(Credits) as amt from `_tbl_wallet_earnings` where MemberID='".$_SESSION['User']['MemberID']."' and (Ledger='2')"); 
                                    $charges = $mysql->select("select sum(Debits) as amt from `_tbl_wallet_earnings` where MemberID='".$_SESSION['User']['MemberID']."' and (Ledger='20001')"); 
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
                                    $income = $mysql->select("select sum(Credits) as amt from `_tbl_wallet_earnings` where MemberID='".$_SESSION['User']['MemberID']."' and (Ledger='4')"); 
                                    $charges = $mysql->select("select sum(Debits) as amt from `_tbl_wallet_earnings` where MemberID='".$_SESSION['User']['MemberID']."' and (Ledger='40001')"); 
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
</div>
    <script>
    $('#From').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#To').datetimepicker({
            format: 'YYYY-MM-DD'
        });

    </script>