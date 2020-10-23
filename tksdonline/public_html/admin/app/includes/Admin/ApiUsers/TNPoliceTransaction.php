<?php
    $_OPERATOR = "UTNP";
    $data = $mysql->select("select * from _tbl_operators where OperatorCode='".$_OPERATOR."'");
    $title = "";
    $error = "No records found";
    if (isset($_GET['filter']) && $_GET['filter']=="paid") {
        $Members = $mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_member as mem on mem.MemberID=txn.memberid  where txn.OperatorCode='".$data[0]['OperatorLAPUCode']."' and txn.TxnStatus='success' and  md5(concat('j!j',txn.memberid))='".$_GET['d']."' order by txn.txnid desc");
        $title .= " Success Transactions";
    } if (isset($_GET['filter']) && $_GET['filter']=="reversed") {
        $Members = $mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_member as mem on mem.MemberID=txn.memberid  where txn.OperatorCode='".$data[0]['OperatorLAPUCode']."' and txn.TxnStatus='reversed' and  md5(concat('j!j',txn.memberid))='".$_GET['d']."' order by txn.txnid desc");
        $title .= " Reversed Transactions";  
    } if(isset($_GET['filter']) && $_GET['filter']=="requested") {
        $Members = $mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_member as mem on mem.MemberID=txn.memberid   where txn.OperatorCode='".$data[0]['OperatorLAPUCode']."' and txn.TxnStatus='requested' and  md5(concat('j!j',txn.memberid))='".$_GET['d']."' order by txn.txnid desc");
        $title .= " Requested Transactions";     
    }
    if(isset($_GET['filter']) && $_GET['filter']=="all") {
        $Members = $mysql->select("select txn.*,mem.MobileNumber from _tbl_transactions as txn left join _tbl_member as mem on mem.MemberID=txn.memberid   where txn.OperatorCode='".$data[0]['OperatorLAPUCode']."' and  md5(concat('j!j',txn.memberid))='".$_GET['d']."' order by txn.txnid desc");
        $title .= " All Transactions";    
    }
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=ApiUsers/TNPoliceTransaction">Utility Payments</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=ApiUsers/TNPoliceTransaction"><?php echo $data[0]['OperatorTypeCode'];?></a></li>
        </ul>
    </div>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=ApiUsers/TNPoliceTransaction&filter=requested" <?php if($_GET['filter']=="requested") {?>style="font-weight:bold;text-decoration:underline;" <?php }?>><small>Requested</small></a>&nbsp;|&nbsp; 
            <a href="dashboard.php?action=ApiUsers/TNPoliceTransaction&filter=paid" <?php if($_GET['filter']=="paid") {?>style="font-weight:bold;text-decoration:underline;" <?php }?>><small>Paid</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=ApiUsers/TNPoliceTransaction&filter=reversed" <?php if($_GET['filter']=="reversed") {?>style="font-weight:bold;text-decoration:underline;" <?php }?>><small>Reversed</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=ApiUsers/TNPoliceTransaction&filter=all" <?php if($_GET['filter']=="all") {?>style="font-weight:bold;text-decoration:underline;" <?php }?>><small>All</small></a>
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
                                    <td style="text-align: right;"><a href="javascript:openTxnTnPolicViewDialog('<?php echo $Member['txnid'];?>')">View</a></td>
                                    <?php } elseif (isset($_GET['filter']) && $_GET['filter']=="reversed") { ?>
                                    <td style="text-align: right;"><?php echo $Member['TxnStatus'];?></td>
                                    <td style="text-align: right;"><?php echo $Member['revDate'];?></td>
                                    <td style="text-align: right;"><a href="javascript:openTxnTnPolicViewDialog('<?php echo $Member['txnid'];?>')">View</a></td>
                                    <?php } else {?>
                                    <td style="text-align: right;">
                                        <a href="javascript:openTxnTnPolicViewDialog('<?php echo $Member['txnid'];?>')">View</a><br>
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
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
    function openTxnTnPolicViewDialog(txnid) {
       $('#txnData').html("Loading ...."); 
         $('#viewRxn').modal("show");
        $.ajax({url:'webservice.php?action=getTNPolic&txn='+txnid,success:function(data){
                 
                  var obj = JSON.parse(data); 
              var txt = '<div style="padding:10px;"><h5 class="modal-title" style="text-align: center;width:100%">Transaction Details</h5> <br>'
                 +'<div class="form-group" style="text-align:left">'
                    +'<input type="text" value="'+obj.DocumentType+'" class="form-control" disabled="disabled">'
                 +'</div>'
                 +'<div class="form-group" style="text-align:left">'
                    +'<input type="text" value="'+obj.DocumentNumber+'" class="form-control" disabled="disabled">'
                 +'</div>'  ;
                 if (obj.ChassisNumber.trim().length!=0) {
                 txt +='<div class="form-group" style="text-align:left">'
                    +'<label>Chassis Number</label>'
                    +'<input type="text" value="'+obj.ChassisNumber+'" class="form-control" disabled="disabled">'
                 +'</div>'
                 }
                 txt +='<div class="form-group" style="text-align:left">'
                    +'<label>Vehicle Owner Name</label>'
                    +'<input type="text" value="'+obj.VehicleOwnerName+'" class="form-control" disabled="disabled">'
                 +'</div>'
                 +'<div class="form-group" style="text-align:left">'
                    +'<label>Amount</label>'
                    +'<input type="text" value="'+obj.Amount+'" class="form-control" disabled="disabled">'
                 +'</div>'
                 +'<div class="form-group" style="text-align:left">'
                    +'<label>Customer Mobile Number</label>'
                    +'<input type="text" value="'+obj.CustomerMobileNumber+'" class="form-control" disabled="disabled">'
                 +'</div>'
                 
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;'
                 +'</div></div>';  
               $('#txnData').html(txt);
              
        }});
                                              
      
}
</script>
<div class="modal fade" id="viewRxn" tabindex="-1" role="dialog" aria-labelledby="viewRxn" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="txnData">
       
       
    </div>                          
  </div>
</div>