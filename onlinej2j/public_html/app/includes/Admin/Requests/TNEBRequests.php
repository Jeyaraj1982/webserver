<?php
     if (isset($_POST['txnupdateBtn'])) {
        //$return = $application->reverseBillPay($_POST['txnid'],$_POST['Remarks'],$errormsg);
        $t = $mysql->select("select * from  _tbl_transactions where txnid='".$_POST['txnid']."'");
            $mysql->execute("update _tbl_transactions set 
                            OperatorNumber='".$_POST['OperatorNumber']."',
                            OperatorDate='".$_POST['OperatorDate']."', 
                            Remarks='".$_POST['Remarks']."', 
                            AdminRemarks='".$_POST['ARemarks']."', 
                            BillString='".$_POST['BillString']."', 
                            BillDate='".date("Y-m-d H:i:s")."', 
                            TxnStatus='success' where txnid='".$_POST['txnid']."'");
            $mem = $mysql->select("select * from _tbl_Members where MemberID='".$t[0]['MemberID']."'");
            $optr = $mysql->select("select * from _tbl_operators where  operatorcode='".$t[0]['memberid']."'");
        MobileSMS::sendSMS($t[0]['CustomerMobileNumber'],"Dear Customer, You requested ".$optr[0]['OperatorName']." bill payment of ".$t[0]['rcnumber'].",  Rs.".$t[0]['rcamount']." has paid. Receipt/Provider/Bill number: ".$_POST['OperatorNumber']." Agent: ".$mem[0]['MemberName'],$mem[0]['MemberID']);                     
        $return = true;
        if ($return) {
            echo "<script>setTimeout('billsuccessDialog()',1000);</script>";
        } else {
            echo "<script>setTimeout('billerrorDialog()',1000);</script>";
        }
    }                                                     
    
       if (isset($_POST['reverseBtn'])) {
           
        $return = $app->reverseBillPay($_POST['txnid'],$_POST['Remarks'],$errormsg);
         $t = $mysql->select("select * from  _tbl_transactions where txnid='".$_POST['txnid']."'");
            $mem = $mysql->select("select * from _tbl_Members where MemberID='".$t[0]['MemberID']."'");
            $optr = $mysql->select("select * from _tbl_operators where  operatorcode='".$t[0]['memberid']."'");
            MobileSMS::sendSMS($mem[0]['MobileNumber'],"Dear Customer, You requested ".$optr[0]['OperatorName']." bill payment of ".$t[0]['rcnumber'].",  Rs.".$t[0]['rcamount']." has reversed.",$mem[0]['MemberID']);                     
        
        if ($return) {
            echo "<script>setTimeout('successDialog()',1000);</script>";
        } else {
            echo "<script>setTimeout('errorDialog()',1000);</script>";
        }
    }
?>
<?php
    $_OPERATOR = "ET";
    $data = $mysql->select("select * from _tbl_operators where OperatorCode='".$_OPERATOR."'");
    $title = "";
    $error = "No records found";
    if (isset($_GET['filter']) && $_GET['filter']=="paid") {
        $Members = $mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_Members as mem on mem.MemberID=txn.memberid  where txn.OperatorCode='".$data[0]['OperatorCode']."' and txn.TxnStatus='success' order by txn.txnid desc");
        $title .= " Success Transactions";
    } 
    if (isset($_GET['filter']) && $_GET['filter']=="reversed") {
        $Members = $mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_Members as mem on mem.MemberID=txn.memberid  where txn.OperatorCode='".$data[0]['OperatorCode']."' and txn.TxnStatus='reversed' order by txn.txnid desc");
        $title .= " Reversed Transactions";
    }
    if (isset($_GET['filter']) && $_GET['filter']=="failure") {
        $Members = $mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_Members as mem on mem.MemberID=txn.memberid  where txn.OperatorCode='".$data[0]['OperatorCode']."' and txn.TxnStatus='failure' order by txn.txnid desc");
        $title .= " Failured Transactions";
    }
    if (isset($_GET['filter']) && $_GET['filter']=="accepted") {
        $Members = $mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_Members as mem on mem.MemberID=txn.memberid  where txn.OperatorCode='".$data[0]['OperatorCode']."' and txn.TxnStatus='accepted' order by txn.txnid desc");
        $title .= " Accepted Transactions";
    } 
    if (isset($_GET['filter']) && $_GET['filter']=="all") {
        $Members = $mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_Members as mem on mem.MemberID=txn.memberid   where txn.OperatorCode='".$data[0]['OperatorCode']."' order by txn.txnid desc");
        $title .= " All Transactions";
    }
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row" class="col-md-12" style="margin-bottom:10px;">
                <div class="col-md-12" style="text-align: right;">
                    <a href="dashboard.php?action=Requests/TNEBRequests&filter=accepted" <?php if($_GET['filter']=="accepted"){ ?> style="text-decoration:underline;font-weight:bold;" <?php } ?>><small>Accepted</small></a>&nbsp;|&nbsp; 
                    <a href="dashboard.php?action=Requests/TNEBRequests&filter=paid"  <?php if($_GET['filter']=="paid"){ ?> style="text-decoration:underline;font-weight:bold;" <?php } ?>><small>Success</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Requests/TNEBRequests&filter=failure"  <?php if($_GET['filter']=="failure"){ ?> style="text-decoration:underline;font-weight:bold;" <?php } ?>><small>Failure</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Requests/TNEBRequests&filter=reversed" <?php if($_GET['filter']=="reversed"){ ?> style="text-decoration:underline;font-weight:bold;" <?php } ?>><small>Reversed</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Requests/TNEBRequests&filter=all" <?php if($_GET['filter']=="all"){ ?> style="text-decoration:underline;font-weight:bold;" <?php } ?>><small>All</small></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Manage <?php echo $data[0]['OperatorTypeCode'];?></h4>
                            <span><?php echo $title;?></span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover" >
                                    <thead>        
                                        <tr>
                                    <th class="border-top-0"><b>Requested</b></th>
                                    <th class="border-top-0"><b>Txn ID</b></th>
                                    <th class="border-top-0"><b>Agent ID</b></th>
                                    <th class="border-top-0"><b>Number</b></th>
                                    <th class="border-top-0"><b>Amount</b></th>
                                    <?php if (isset($_GET['filter']) && $_GET['filter']=="paid") { ?>
                                    <th class="border-top-0"><b>Status</b></th>                                            
                                    <th class="border-top-0"><b>Bill Number</b></th>                                            
                                    <th class="border-top-0"><b>&nbsp;</b></th>
                                    <?php } elseif (isset($_GET['filter']) && $_GET['filter']=="reversed") { ?>
                                    <th class="border-top-0"><b>Status</b></th>                                            
                                    <th class="border-top-0"><b>Reversed On</b></th>                                            
                                    <th class="border-top-0"><b>&nbsp;</b></th>
                                    <?php } else {?>
                                    <th class="border-top-0"><b>&nbsp;</b></th>
                                    <?php } ?>

                                </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (sizeof($Members)==0) { ?>
                                        <tr>
                                            <td colspan="8" style="text-align:center;"><?php echo $error;?></td>
                                        </tr>
                                        <?php } ?>
                                        <?php foreach ($Members as $Member){ ?>
                                        <tr>
                                            <td id="txndate_<?php echo $Member['txnid'];?>"><?php echo $Member['txndate'];?></td>
                                            <td id="txnid_<?php echo $Member['txnid'];?>"><?php echo $Member['txnid'];?></td>
                                            <td id="id_<?php echo $Member['txnid'];?>"><?php echo $Member['MobileNumber'];?></td>
                                            <td id="number_<?php echo $Member['txnid'];?>"><?php echo $Member['rcnumber'];?></td>
                                            <td id="amount_<?php echo $Member['txnid'];?>" style="text-align: right"><?php echo number_format($Member['rcamount'],2);?></td>
                                            <?php if (isset($_GET['filter']) && $_GET['filter']=="paid") { ?>
                                            <td style="text-align: right;"><?php echo $Member['TxnStatus'];?></td>
                                            <td style="text-align: right;"><?php echo $Member['OperatorNumber'];?></td>
                                            <td style="text-align: right;">view</td>
                                            <?php } elseif (isset($_GET['filter']) && $_GET['filter']=="reversed") { ?>
                                            <td style="text-align: right;"><?php echo $Member['TxnStatus'];?></td>
                                            <td style="text-align: right;"><?php echo $Member['revDate'];?></td>
                                            <?php } else {?>
                                            <td style="text-align: right;">
                                                <a href="javascript:openBillDialog('updateModal','<?php echo $Member['txnid'];?>')">Update Txn</a>
                                                <br>
                                                <a href="javascript:openDialog('exampleModal','<?php echo $Member['txnid'];?>')">Reverse</a>
                                            </td>
                                            <?php } ?>
                                            
                                        </tr>
                                        <?php }?> 
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
function openDialog(m,t) {
    $('#txnid').val(t);
    $('#'+m).modal("show");
}    

function openBillDialog(m,t) {
    $('#bill_txnid').val(t);
    $('#'+m).modal("show");
}

function successDialog() {
    $('#reversedsuccess').modal("show");
}
function errorDialog() {
    $('#reversederror').modal("show");
}

function billsuccessDialog() {
    $('#billsuccess').modal("show");
}
function billerrorDialog() {
    $('#billerror').modal("show");
}
</script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reverse Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <input type="hidden" name="txnid" id="txnid" value="">
      <div class="modal-body">
        Are you want to revese the transaction ?<br><br>
        Reason for reverse<br>
        <input type="text" class="form-control" name="message" id="message" required placeholder="Remarks">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
        <button type="submit" name="reverseBtn" class="btn btn-primary">Reverse</button>
      </div>
      </form>
    </div>                          
  </div>
</div>
<div class="modal fade" id="reversedsuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reversed</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;color:#888">
      <img src="https://www.saralservices.in/app/assets/success.png"><br><br>
        Your transaction reversed.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
      </div>
    </div>                          
  </div>
</div>
<div class="modal fade" id="reversederror" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reversed</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;color:#777">
      <img src="https://www.saralservices.in/app/assets/fail.png"><br><br>
        Reversed failed.<br><?php echo (isset($errormsg)) ? $errormsg : "";?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
      </div>
    </div>                          
  </div>
</div>


<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Operator Number</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <input type="hidden" name="txnid" id="bill_txnid" value="">
      <div class="modal-body">
        <div class="form-group">
            <label for="email2">Operator Number</label>
            <input type="text" class="form-control" name="OperatorNumber" id="OperatorNumber" required placeholder="OperatorNumber">
        </div>
        
        <div class="form-group">
            <label for="email2">Bill Date</label>
            <input type="text" class="form-control" name="OperatorDate" id="OperatorDate" value="<?php echo date("d-M-Y");?>" required placeholder="BillDate">
        </div>
        
        <div class="form-group">
            <label for="email2">Remarks</label>
            <input type="text" class="form-control" name="Remarks" id="Remarks" required placeholder="Remarks">
        </div>
        
         <div class="form-group">
            <label for="email2">Admin Remarks</label>
            <input type="text" class="form-control" name="ARemarks" id="ARemarks" required placeholder="AdminRemarks" required="">
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
        <button type="submit" name="txnupdateBtn" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>                          
  </div>
</div>
<div class="modal fade" id="billsuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reversed</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;color:#888">
      <img src="https://www.saralservices.in/app/assets/success.png"><br><br>
        Your transaction updated.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
      </div>
    </div>                          
  </div>
</div>
<div class="modal fade" id="billerror" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reversed</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: center;color:#777">
      <img src="https://www.saralservices.in/app/assets/fail.png"><br><br>
        update failed.<br><?php echo (isset($errormsg)) ? $errormsg : "";?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
      </div>
    </div>                          
  </div>
</div>