<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="form-group row">
                <div class="col-sm-6"><h4 class="page-title"></h4></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Account Summary
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Txn Date</th> 
                                            <th>Particulars</th> 
                                            <th>Credit</th> 
                                            <th>Debit</th> 
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                        <?php
                                             $sql= $mysql->select("select * from `_wallet_member` where `MemberID`='".$_SESSION['User']['MemberID']."' order by `WalletTxnID` desc ");
                                             foreach($sql as $invoice){                                                
                                        ?> 
                                        <tr>
                                            <td><?php echo date("d M, Y H:i",strtotime($invoice['TxnDate']));?></td>
                                            <td><?php echo $invoice['Particulars'];?></td>
                                            <td style="text-align: right"><?php echo number_format($invoice['CreditAmount'],2);?></td>
                                            <td style="text-align: right"><?php echo number_format($invoice['DebitAmount'],2);?></td>
                                     
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
    </div>
</div>
<script>$(document).ready(function() {$('#myTable').DataTable({ "order": [[ 1, "desc" ]]});});</script>