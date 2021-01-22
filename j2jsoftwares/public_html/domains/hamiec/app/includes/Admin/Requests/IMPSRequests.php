<?php
    $OperatorType = "MTB";
    $data = $mysql->select("select * from _tbl_operators where OperatorCode='".$OperatorType."'");
    $OperatorTypeCodes = array();
    foreach($data as $d) {
         $OperatorTypeCodes[] = "'".$d['OperatorCode']."'";
    }
    $OperatorTypeCodes = implode(",",$OperatorTypeCodes);
    $title = "";
    $error = "No records found";
    if (isset($_GET['filter']) && $_GET['filter']=="success") {
        $Members = $mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_Members as mem on mem.MemberID=txn.memberid  where txn.operatorcode in (".$OperatorTypeCodes.") and txn.TxnStatus='success' order by txn.txnid desc");
        $title .= " Success Transactions";
    }
    if (isset($_GET['filter']) && $_GET['filter']=="reversed") {
        $Members = $mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_Members as mem on mem.MemberID=txn.memberid  where txn.operatorcode in (".$OperatorTypeCodes.") and txn.TxnStatus='reversed' order by txn.txnid desc");
        $title .= " Reversed Transactions";
    }
    if (isset($_GET['filter']) && $_GET['filter']=="failured") {
        $Members = $mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_Members as mem on mem.MemberID=txn.memberid  where txn.operatorcode in (".$OperatorTypeCodes.") and txn.TxnStatus='failure' order by txn.txnid desc");
        $title .= " Failure Transactions";
    }
    if (isset($_GET['filter']) && $_GET['filter']=="Accepted") {
        $Members = $mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_Members as mem on mem.MemberID=txn.memberid   where txn.operatorcode in (".$OperatorTypeCodes.") and txn.TxnStatus='accepted' order by txn.txnid desc");
        $title .= " Requested Transactions";
    }
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row" class="col-md-12" style="margin-bottom:10px;">
                <div class="col-md-12" style="text-align: right;">
                    <a href="dashboard.php?action=Requests/IMPSRequests&filter=Accepted"><small>Accepted</small></a>&nbsp;|&nbsp; 
                    <a href="dashboard.php?action=Requests/IMPSRequests&filter=success" ><small>Success</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Requests/IMPSRequests&filter=failured"><small>Failured</small></a>&nbsp;|&nbsp;
                    <a href="dashboard.php?action=Requests/IMPSRequests&filter=reversed"><small>Reversed</small></a>
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
                                            <th class="border-top-0"><b>Operator</b></th>
                                            <th class="border-top-0"><b>Account Details</b></th>
                                            <th class="border-top-0"><b>Amount</b></th>
                                            <?php if (isset($_GET['filter']) && $_GET['filter']=="paid") { ?>
                                            <th class="border-top-0"><b>Status</b></th>                                            
                                            <th class="border-top-0"><b>Reference Number</b></th>                                            
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
                                            <td><?php echo $Member['txndate'];?></td>
                                            <td><?php echo $Member['txnid'];?></td>
                                            <td><?php echo $Member['MobileNumber'];?></td>
                                            <td><?php echo $Member['operatorcode'];?></td>
                                            <td>
                                            
                                            <?php echo $Member['AccountName'];?><br>
                                            <?php echo $Member['rcnumber'];?><br>
                                            <?php echo $Member['IFSCode'];?><br>
                                            <?php echo $Member['Remarks'];?><br>
                                            
                                            </td>
                                            <td style="text-align: right"><?php echo number_format($Member['rcamount'],2);?></td>
                                            <?php if (isset($_GET['filter']) && $_GET['filter']=="success") { ?>
                                            <td style="text-align: right;"><?php echo $Member['TxnStatus'];?></td>
                                            <td style="text-align: right;"><?php echo $Member['OperatorNumber'];?></td>
                                            <td style="text-align: right;">view</td>
                                            <?php } if (isset($_GET['filter']) && $_GET['filter']=="reversed") { ?>
                                            <td style="text-align: right;"><?php echo $Member['TxnStatus'];?></td>
                                            <td style="text-align: right;"><?php echo $Member['revDate'];?></td>
                                            <?php } if (isset($_GET['filter']) && $_GET['filter']=="failure") { ?>
                                            <td style="text-align: right;"><?php echo $Member['TxnStatus'];?></td>
                                            <td style="text-align: right;"><?php echo $Member['revDate'];?></td>
                                            <?php } if (isset($_GET['filter']) && $_GET['filter']=="Accepted")  {?>
                                            <td style="text-align: right;">
                                               <a href="javascript:openBillDialog('updateModal','<?php echo $Member['txnid'];?>')">Update Txn</a>
                                                <br> 
                                            <a href="javascript:openDialog('exampleModal','<?php echo $Member['txnid'];?>')">Reverse</a></td> 
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
</script>