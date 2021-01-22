 
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Account Summary
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Txn ID</th>
                                            <th>Txn Date</th>
                                            <th>Particulars</th>                                                                                           
                                            <th>Credit</th> 
                                            <th>Debit</th>
                                            <th>Balance</th>
                                             
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php 
                                    $txn = $mysql->select("select * from _tbl_accounts where MemberID='".$_SESSION['User']['MemberID']."' order by AccountID desc");
                                     foreach($txn as $t){ ?>
                                        <tr>
                                            <td><?php echo $t['AccountID'];?></td>
                                            <td><?php echo $t['TxnDate'];?></td>
                                            <td><?php echo $t['Particulars'];?></td>
                                            <td style="text-align: right"><?php echo  number_format($t['Credit'],2);?></td>
                                            <td style="text-align: right"><?php echo  number_format($t['Debit'],2);?></td>
                                            <td style="text-align: right"><?php echo  number_format($t['Balance'],2);?></td>
                                            
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
<script>$(document).ready(function() {$('#myTable').DataTable({ "order": [[ 0, "desc" ]]});});</script>