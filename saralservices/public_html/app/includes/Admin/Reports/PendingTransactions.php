 
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
        
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                               Pending Transaction Summary
                            </div>
                        </div>
                        <div class="card-body">
                                     <?php
                                         if (isset($_POST['updateBtn'])) {
                                             
                                             $updateTxn = $mysql->select("select * from _tbl_transactions where  TxnStatus='accepted'  and txnid='".$_POST['txnID']."'");
                                             if (sizeof($updateTxn)==1) {
                                                 
                                                 if ($_POST['status']=="failure") {
                                                     $sql = $mysql->execute("update _tbl_transactions set TxnStatus='reversed',ReversedOn='".date("Y-m-d H:i:s")."'  where txnid='".$_POST['txnID']."'");
                                                     $select_accrecords = $mysql->select("select * from _tbl_accounts where AccountID='".$updateTxn[0]['ACtxnid']."'");
                                                        $balance = $app->getBalance($updateTxn[0]['MemberID']);      
                                                             $ACtxnid = $mysql->insert("_tbl_accounts",array("TxnDate"     => date("Y-m-d H:i:s"),
                                                                        "MemberID"    => $updateTxn[0]['MemberID'],
                                                                        "Particulars" => "Reversed/".$select_accrecords[0]['Particulars'],
                                                                        "TxnValue"    => $select_accrecords[0]['TxnValue'],
                                                                        "Credit"      => $select_accrecords[0]['Debit'],
                                                                        "Debit"       => "0",
                                                                        "Balance"     => $balance+$select_accrecords[0]['Debit'],
                                                                        "Voucher"     => "121"));        
                                                    echo "<script>alert('reversed successfully');</script>";                     
                                                 }
                                             
                                                if ($_POST['status']=="success") {
                                                    if (strlen(trim($_POST['optrID']))>5) {
                                                        $sql = $mysql->execute("update _tbl_transactions set TxnStatus='success', OperatorNumber='".$_POST['optrID']."' where txnid='".$_POST['txnID']."'");
                                                        echo "<script>alert('updated  successfully');</script>";                     
                                                    } else {
                                                        echo "<script>alert('Please enter operator id');</script>";
                                                    }
                                                }
                                             } else {
                                                  echo "<script>alert(\"txn already processed\");</script>";
                                             }
                                         }
                                         
          $sql="select * from _tbl_transactions where 
                              
                                    
                                         TxnStatus='accepted'
                                    order by txnid desc "; 
    
 $txn = $mysql->select($sql); 
                                     ?>
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
                                        <tr>
                                            <td></td>
                                            <td colspan="6">
                                             <Br> 
                                               <table>
                                               <tr>
                                                    <td style="padding:0px 5px !important;height:auto !important;">Lapu Number</td>
                                                    <td style="padding:0px 5px !important;height:auto !important;">:&nbsp;<?php echo $t['lapurefno'];?></td>
                                                  </tr>
                                              <?php $res = json_decode($t['urlresponse'],true);
                                              
                                              foreach($res as $k=>$v) {
                                                  ?>
                                                  <tr>
                                                    <td style="padding:0px 5px !important;height:auto !important;"><?php echo $k;?></td>
                                                    <td style="padding:0px 5px !important;height:auto !important;">:&nbsp;<?php echo $v;?></td>
                                                  </tr>
                                                  
                                                  <?php
                                              }
                                              
                                              ?>
                                              
                                              </table>
                                              <Br>
                                              <form action="" method="post">
                                                <input type="hidden" name="txnID" value="<?php echo $t['txnid'];?>">
                                              <table>
                                              <tr>
                                                    <td style="padding:0px 5px !important;height:auto !important;vertical-align: top;">Action</td>
                                              
                                                    <td style="padding:0px 5px !important;height:auto !important;">
                                                    <select class="form-control  btn-sm" name="status">
                                                        <option value="failure">failure & refund</option>
                                                        <option value="success">success</option>
                                                    </select>
                                                    </td>
                                                    <td>
                                                    <input class="form-control" type='text' name="optrID" placeholder="Operator ID">
                                                    </td>
                                                    <td>
                                                    <input type="submit" value="Update" name="updateBtn" class="btn btn-primary btn-sm" style="width:100%">
                                                    </td>
                                                  </tr>
                                              </table>
                                              </form>
                                            </td>
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