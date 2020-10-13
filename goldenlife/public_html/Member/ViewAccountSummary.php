<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Account Summary<br>
                                        <span style="font-size:12px;">Available Balance: Rs. <?php echo number_format(getWithdrawableBalance($_SESSION['User']['MemberCode']),2);?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered" id="basic-datatables" style="width: 100%;border-top:1px solid #ebedf2;">
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
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
</script>