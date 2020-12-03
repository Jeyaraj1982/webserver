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
   
   if($_GET['filter']=="All"){
        $txn = $mysql->select("select * from _tbl_wallet_request where (date(TxnDate)>=date('".$fromDate."') and date(TxnDate)<=date('".$toDate."') ) and FranchiseeID='".$_GET['frid']."' order by RequestID desc");
    }
    if($_GET['filter']=="Requested"){
        $txn = $mysql->select("select * from _tbl_wallet_request where (date(TxnDate)>=date('".$fromDate."') and date(TxnDate)<=date('".$toDate."') ) and FranchiseeID='".$_GET['frid']."' and Status='0' order by RequestID desc");
    }
    if($_GET['filter']=="Paid"){
        $txn = $mysql->select("select * from _tbl_wallet_request where (date(TxnDate)>=date('".$fromDate."') and date(TxnDate)<=date('".$toDate."') ) and FranchiseeID='".$_GET['frid']."' and Status='1' order by RequestID desc");
    }
    if($_GET['filter']=="Rejected"){
        $txn = $mysql->select("select * from _tbl_wallet_request where (date(TxnDate)>=date('".$fromDate."') and date(TxnDate)<=date('".$toDate."') ) and FranchiseeID='".$_GET['frid']."' and Status='2' order by RequestID desc");
    }
   
    ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="form-group row">
                                <div class="col-md-6"><div class="card-title">Wallet Requests</div></div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="https://klx.co.in/klxadmin/dashboard.php?action=franchisee/walletrequests&filter=All&frid=<?php echo $_GET["frid"];?>" <?php if($_GET['filter']=="All"){ ?> style="text-decoration:underline;font-weight:bold;"<?php } ?>>All</a>&nbsp;&nbsp;|&nbsp;&nbsp;    
                                    <a href="https://klx.co.in/klxadmin/dashboard.php?action=franchisee/walletrequests&filter=Requested&frid=<?php echo $_GET["frid"];?>" <?php if($_GET['filter']=="Requested"){ ?> style="text-decoration:underline;font-weight:bold;"<?php } ?>>Requested</a>&nbsp;&nbsp;|&nbsp;&nbsp;    
                                    <a href="https://klx.co.in/klxadmin/dashboard.php?action=franchisee/walletrequests&filter=Paid&frid=<?php echo $_GET["frid"];?>" <?php if($_GET['filter']=="Paid"){ ?> style="text-decoration:underline;font-weight:bold;"<?php } ?>>Paid</a>&nbsp;&nbsp;|&nbsp;&nbsp;    
                                    <a href="https://klx.co.in/klxadmin/dashboard.php?action=franchisee/walletrequests&filter=Rejected&frid=<?php echo $_GET["frid"];?>" <?php if($_GET['filter']=="Rejected"){ ?> style="text-decoration:underline;font-weight:bold;"<?php } ?>>Rejected</a>    
                                </div>
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
                                        <input type="submit" value="View Requests" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table id="" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Txn Date</th>
                                            <th>Transfer To</th>                                                                                           
                                            <th style="text-align: right;">Amount</th>
                                            <th>Mode</th>
                                            <th>Status</th>
                                            <th>Status On</th>
                                            <th></th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php foreach($txn as $t){ ?>
                                        <tr>
                                            <td><?php echo $t['TxnDate'];?></td>
                                            <td><?php echo $t['TransferTo'];?></td>
                                            <td style="text-align: right"><?php echo number_format($t['Amount'],2);?></td>
                                            <td><?php echo $t['TransferMode'];?></td>
                                            <td><?php
                                                    if($t['Status']==0){
                                                        echo "Requested";
                                                    }
                                                    if($t['Status']==1){
                                                        echo "Paid";
                                                    }
                                                    if($t['Status']==2){
                                                        echo "Rejected";
                                                    }
                                             ?></td>
                                             <td><?php
                                                    if($t['Status']==0){
                                                        echo $t['TxnDate'];
                                                    }
                                                    if($t['Status']==1){
                                                        echo $t['ApprovedOn'];
                                                    }
                                                    if($t['Status']==2){
                                                        echo $t['RejectedOn'];
                                                    }
                                             ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if(sizeof($txn)==0) {?>
                                        <tr>
                                            <td colspan="7" style="text-align: center;">No Requests Found</td>
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