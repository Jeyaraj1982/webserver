<?php 
   $fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
    $toDate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
    $txn = $mysql->select("select operatorcode, sum(rcamount) as amt  from _tbl_transactions  where 
       (date(txndate)>=date('".$fromDate."') and date(txndate)<=date('".$toDate."') ) and
    TxnStatus='success' group by operatorcode");
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Operator wise Sales
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
                                            <th>Operator Name</th>
                                            <th>Lapu Number</th>
                                            <th>Lapu Sales</th>
                                            <th>Sales</th>                                                                                           
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php 
                                    
                                     foreach($txn as $t){ ?>
                                        <tr style="background:#ccc;">
                                            <td><?php echo $operatorName[$t['operatorcode']];?></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align: right"><?php echo  number_format($t['amt'],2);?></td>
                                        </tr>
                                        <?php
                                            $subtxn = $mysql->select("select lapurefno, sum(rcamount) as amt  from _tbl_transactions where  (date(txndate)>=date('".$fromDate."') and date(txndate)<=date('".$toDate."') ) and TxnStatus='success' and operatorcode='".$t['operatorcode']."' group by lapurefno");
                                      foreach($subtxn as $st){ ?>
                                        <tr style="background:#fff;">
                                            <td></td>
                                            <td><?php echo $st['lapurefno'];?></td>
                                            <td style="text-align: right"><?php echo  number_format($st['amt'],2);?></td>
                                            <td></td>
                                        </tr>
                                        <?php } ?>
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