<?php  $data = $mysql->select("select * from _tbl_franchisee where userid='".$_GET['frid']."'");  ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                View Franchisee
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Franchisee Name</label>
                                <div class="col-md-3"><?php echo $data[0]['FranchiseeName'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Email ID</label>
                                <div class="col-md-3"><?php echo $data[0]['EmailID'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">IsActive</label>
                                <div class="col-md-3"><?php if($data[0]['IsActive']==1){ echo "Active" ;}else { "Deactive";};?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Created On</label>
                                <div class="col-md-3"><?php echo $data[0]['CreatedOn'];?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
    $fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
    $toDate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
    $txn = $mysql->select("select * from _tbl_accounts where (date(TxnDate)>=date('".$fromDate."') and date(TxnDate)<=date('".$toDate."') ) and FranchiseeID='".$_GET['frid']."' order by AccountID desc");
?> 

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Transactions
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group form-group-default">
                                            <label>From Date</label>
                                            <input type="text" class="form-control" id="fdate" name="fdate" value="<?php echo $fromDate;?>" placeholder="From Date">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group form-group-default">
                                            <label>To Date</label>
                                            <input type="text" class="form-control" id="tdate" name="tdate" value="<?php echo  $toDate;?>" placeholder="To Date">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="submit" value="View" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Txn ID</th>
                                            <th>Txn Date</th>
                                            <th>Particulars</th>                                                                                           
                                            <th>Value</th> 
                                            <th>Credit</th> 
                                            <th>Debit</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php foreach($txn as $t){ ?>
                                    
                                        <tr>
                                            
                                            <td><?php echo $t['AccountID'];?></td>
                                            <td><?php echo $t['TxnDate'];?></td>
                                            <td><?php echo $t['Particulars'];?></td>
                                            <td style="text-align: right"><?php echo number_format($t['TxnValue'],2);?></td>
                                            <td style="text-align: right"><?php echo ($t['Credit']>0) ? number_format($t['Credit'],2) : "0.00";?></td>
                                            <td style="text-align: right"><?php echo ($t['Debit']>0) ? number_format($t['Debit'],2) : "0.00";?></td>
                                            <td style="text-align: right"><?php echo number_format($t['Balance'],2);?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="https://klx.co.in/klxadmin/dashboard.php?action=franchisee/list&f=a">Back</a> 
                                </div>                                        
                            </div>
                        </div> 
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {$('#myTable').DataTable({ "order": [[ 0, "desc" ]]});

$('#fdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        
        $('#tdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });

});

</script>