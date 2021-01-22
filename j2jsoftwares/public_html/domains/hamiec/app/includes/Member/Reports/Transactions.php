<?php
    $operatorName = array("RA"=>"Airtel","RB"=>"BSNL","RJ"=>"JIO","RV"=>"Vodafone","RI"=>"IDEA","DD"=>"Dish TV","DA"=>"Airtel Digital Tv","DT"=>"Tatasky","DS"=>"Sun Direct","DV"=>"Videocon d2h","DB"=>"Big Tv");
    $fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
    $toDate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
    $operatr = isset($_POST['optr']) ? $_POST['optr'] : "all";
    if ($operatr=="all") {
       $sql="select * from _tbl_transactions where 
                                    MemberID='".$_SESSION['User']['MemberID']."' 
                                    and (date(txndate)>=date('".$fromDate."') and date(txndate)<=date('".$toDate."') )
                                    order by txnid desc "; 
    } else {
          $sql="select * from _tbl_transactions where 
                                    MemberID='".$_SESSION['User']['MemberID']."' 
                                    and (date(txndate)>=date('".$fromDate."') and date(txndate)<=date('".$toDate."') )
                                    and   operatorcode='".$operatr."'
                                    order by txnid desc "; 
    }
   
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
                             <div class="col-sm-3">
                                            <div class="form-group form-group-default">
                                                <label>Operator</label>
                                                <select name="optr" class="form-control">
                                                    <option value="all">All Operator</option>
                                                    <?php foreach($operatorName as $key=>$val) { ?>
                                                        <option value="<?php echo $key;?>" <?php echo ($operatr==$key) ? " selected='selected' " :"";?> ><?php echo $val;?></option>
                                                    <?php } ?>
                                                </select>
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
                                            } elseif ($t['TxnStatus']=="reversed") {
                                                echo "<span style='background:pink;color:#fff;padding:3px 10px;border-radius:5px'>Reversed</span><br><span style='font-size:11px;'>".$t['ReversedOn']."</span>";
                                            } else {
                                               echo "<span style='background:Orange;color:#fff;padding:3px 10px;border-radius:5px'>Pending</span>"; 
                                            }
                                              ?></td>
                                            <td style="text-align: right;font-size:13px;"><?php echo strlen($t['OperatorNumber'])>3 ? $t['OperatorNumber'] : "";?></td>
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