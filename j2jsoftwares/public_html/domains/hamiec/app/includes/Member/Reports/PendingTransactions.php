<?php
 
          $sql="select * from _tbl_transactions where 
                                    MemberID='".$_SESSION['User']['MemberID']."' 
                                    
                                    and    TxnStatus='accepted'
                                    order by txnid desc "; 
    
 $txn = $mysql->select($sql);    
?>

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Transaction Summary
                            </div>
                        </div>
                        <div class="card-body">
                         
                            <div class="table-responsive">
                                 <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Txn ID</th>
                                            <th>Txn Date</th>
                                            <th>Number</th>                                                                                           
                                            <th>Operator</th>                                                                                           
                                            <th>Amount</th>                                                                                           
                                            <th>Status</th>                                                                                           
                                            <th>Operator ID</th>                                                                                           
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php foreach($txn as $t){ ?>
                                        <tr>
                                            <td style="font-size:13px;"><?php echo $t['txnid'];?></td>
                                            <td style="font-size:13px;"><?php echo $t['txndate'];?></td>
                                            <td style="font-size:13px;"><?php echo $t['rcnumber'];?></td>
                                            <td style="font-size:13px;"><?php echo $operatorName[$t['operatorcode']];?></td>
                                            <td  style="text-align: right;font-size:13px;"><?php echo  number_format($t['rcamount'],2);?></td>
                                            <td><?php 
                                            if ($t['TxnStatus']=="failure") {
                                                echo "<span style='background:red;color:#fff;padding:3px 10px;border-radius:5px' title='".$t['msg']."'>Failure</span>";
                                            } elseif ($t['TxnStatus']=="success") {
                                                echo "<span style='background:green;color:#fff;padding:3px 10px;border-radius:5px'>Success</span>";
                                            } else {
                                               echo "<span style='background:Orange;color:#fff;padding:3px 10px;border-radius:5px'>Pending</span>"; 
                                            }
                                              ?></td>
                                            <td style="text-align: right;font-size:13px;"><?php echo $t['OperatorNumber'];?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if (sizeof($txn)==0) {?>
                                       <tr>
                                            <td style="font-size:13px;text-align:center" colspan="7">No Transactions found</td>
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
<script>$(document).ready(function(){ 
//{$('#myTable').DataTable({ "order": [[ 0, "desc" ]]});

$('#fdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        
        $('#tdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });
});</script>