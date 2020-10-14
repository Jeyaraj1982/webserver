<?php include_once("header.php");?>
<div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-medal icon-gradient bg-tempting-azure">
                                    </i>
                                </div>
                                <div>Account Summary  <br>
                                <span style="font-size:12px;">Available Balance: Rs. <?php echo number_format(getWithdrawableBalance($_SESSION['User']['MemberCode']),2);?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Txn Date</th>
                                    <th>Particulars</th>
                                    <th>Credit</th>
                                    <th>Debit</th>
                                    <th>Balance</th>
                                </tr>
                                </thead>
                                <tbody>
                                 <?php
                                     $earings = $mysql->select("select * from `_tbl_accounts` where `MemberCode`='".$_SESSION['User']['MemberCode']."' order by AcTxnID Desc");
                                     foreach($earings as $e) {
                                         ?>
                                         <tr>
                                            <td><?php echo $e['TxnDate'];?></td>
                                            <td><?php echo $e['Particulars'];?></td>
                                            <td style="text-align:right"><?php echo $e['Credit'];?></td>
                                            <td style="text-align:right"><?php echo $e['Debit'];?></td>
                                            <td style="text-align:right"><?php echo $e['Balance'];?></td>
                                         </tr>
                                         <?php
                                     }
                                 ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              <?php include_once("footer.php");?>