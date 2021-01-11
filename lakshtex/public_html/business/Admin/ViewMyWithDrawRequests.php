<?php
  $Requests  = $mysql->select("SELECT *
                        FROM _tbl_member_withdraw_request
                        LEFT  JOIN _tbl_member 
                        ON _tbl_member_withdraw_request.MemberID=_tbl_member.MemberID where _tbl_member_withdraw_request.RequestID='".$_GET['code']."'");
  
  if (isset($_POST['approveBtn'])) {
        $id = $mysql->execute("Update _tbl_member_withdraw_request set IsApproved       ='1',
                                                                       IsApprovedOn     ='".date("Y-m-d H:i:s")."',
                                                                       Admin_TxnID      ='".$_POST['BankTransactionID']."',
                                                                       Admin_TxnMode    ='".$_POST['TransactionMode']."',
                                                                       Admin_TxnDate    ='".$_POST['TransactionDate']."' where RequestID='".$Requests[0]['RequestID']."'");
        if($id>0){ ?>
            <script>
                $(document).ready(function() {
                    swal("Request Approved successfully", { 
                        icon:"success",
                     confirm: {value: 'Continue'}
                    }).then((value) => {
                        location.href=''
                    });
                });
            </script>    
        <?php }
  }
  if (isset($_POST['rejectBtn'])) {
        $id = $mysql->execute("Update _tbl_member_withdraw_request set IsRejected       ='1',
                                                                       RejectRemarks    ='".$_POST['RejectRemarks']."',
                                                                       IsRejectedOn     ='".date("Y-m-d H:i:s")."' where RequestID='".$Requests[0]['RequestID']."'");
                                                                       
              $mysql->insert("_tbl_wallet_earning",array("MemberID"    => $Requests[0]['MemberID'],
                                                         "MemberCode"  => $Requests[0]['MemberCode'],
                                                         "Txndate"     => date("Y-m-d H:i:s"),
                                                         "Particulars" => "Withdrawal Request Rejected",
                                                         "Amount"      => $Requests[0]['Amount'],
                                                         "Credit"      => $Requests[0]['Amount'],
                                                         "Debit"       => "0",
                                                         "Balance"     => getWithdrawableBalance($_SESSION['User']['MemberCode'])+$Requests[0]['Amount']));
        if($id>0){ ?>
            <script>
                $(document).ready(function() {
                    swal("Request Rejected successfully", { 
                        icon:"success",
                     confirm: {value: 'Continue'}
                    }).then((value) => {
                        location.href=''
                    });
                });
            </script>    
        <?php }
  }
  ?>

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        My WithDraw Requests
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <input type="hidden" name="BankTransactionID" id="BankTransactionID">
                                <input type="hidden" name="TransactionMode" id="TransactionMode">
                                <input type="hidden" name="TransactionDate" id="TransactionDate">
                                <input type="hidden" name="RejectRemarks" id="RejectRemarks">
                                <div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">Member Name</div>
                                        <div class="col-sm-9">
                                            <input type="text" disabled='disabled' style="background:#fff !important;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['MemberName'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">Amount</div>
                                        <div class="col-sm-9">
                                            <input type="text" disabled='disabled' style="background:#fff !important;border:1px solid #fff" class="form-control" value="<?php echo number_format($Requests[0]['Amount'],2);?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">Account Number</div>
                                        <div class="col-sm-9">
                                            <input type="text" disabled='disabled' style="background:#fff !important;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['AccountNumber'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">IFS Code</div>
                                        <div class="col-sm-9">
                                            <input type="text" disabled='disabled' style="background:#fff !important;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['IFSCode'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">Requested On</div>
                                        <div class="col-sm-9">
                                            <input type="text" disabled='disabled' style="background:#fff !important;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['RequestedOn'];?>">
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                       <div class="col-sm-12">
                                            <?php if($Requests[0]['IsApproved']=="0" && $Requests[0]['IsRejected']=="0"){ ?>
                                                <button type="button" onclick="CallConfirmationApprove()" class="btn btn-success">Approve</button>&nbsp;&nbsp;
                                                <button type="button" onclick="CallConfirmationReject()" class="btn btn-danger">Reject</button>
                                                <button type="submit" style="display: none;" name="approveBtn" id="approveBtn" class="btn btn-success">Approve</button>
                                                <button type="submit" style="display: none;" name="rejectBtn" id="rejectBtn" class="btn btn-danger">Reject</button>
                                            <?php } ?>
                                       </div>
                                    </div>    
                                </div> 
                            </form>
                            <div>
                                <?php if($Requests[0]['IsApproved']=="1"){?> 
                                <h4 class="card-title text-orange"><i class="ti-user"></i>&nbsp;&nbsp;Transaction Details</h4>
                                <div class="form-group row">
                                    <div class="col-sm-3">Bank Txn ID</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff !important;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['Admin_TxnID'];?>">
                                    </div>
                                </div>
                               <div class="form-group row">
                                    <div class="col-sm-3">Txn Mode</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff !important;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['Admin_TxnMode'];?>">
                                    </div>
                               </div>
                               <div class="form-group row">
                                    <div class="col-sm-3">Txn Date</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff !important;border:1px solid #fff" class="form-control" value="<?php echo $Requests[0]['Admin_TxnDate'];?>">
                                    </div>
                                </div>
                            <?php }?>
                            </div> 
                            <div>
                                <?php if($Requests[0]['IsApproved']=="1" && $Requests[0]['IsRejected']=="0"){ ?>
                                    <p class="text-muted"><?php echo "Approved";?><br><?php echo $Requests[0]['IsApprovedOn'];?></p>
                                <?php }?>
                                <?php if($Requests[0]['IsApproved']=="0" && $Requests[0]['IsRejected']=="1"){ ?>
                                     <p class="text-muted"><?php echo "<span style='color:red'>Rejected</span>";?><br><?php echo $Requests[0]['RejectRemarks'];?><br><?php echo $Requests[0]['IsRejectedOn'];?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
        <div class="modal-content" >
            <div id="xconfrimation_text"></div>
        </div>
    </div>
</div>
<script>
function CallConfirmationApprove(){
    var txt= '<div class="modal-header" style="padding-bottom:5px">'
                 +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                 +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                    +'<span aria-hidden="true" style="color:black">&times;</span>'
                 +'</button>'
             +'</div>'
             +'<div class="modal-body">'
                +'<div class="form-group row">'                                                            
                    +'<div class="col-sm-12">'
                        +'Are you sure want to approve?<br>'
                    +'</div>'
                +'</div>'
                +'<div class="form-group row">'
                        +'<div class="col-sm-3">Bank Txn ID</div>'
                        +'<div class="col-sm-9">'
                            +'<input type="text" class="form-control" id="TxnID" name="TxnID"><span class="errorstring" id="ErrTxnID"></span>'
                        +'</div>'
                    +'</div>'
                   +'<div class="form-group row">'
                        +'<div class="col-sm-3">Txn Mode</div>'
                        +'<div class="col-sm-9">'
                            +'<select name="TxnMode" id="TxnMode" class="form-control">'
                                +'<option value="IMPS">IMPS</option>'
                                +'<option value="NEFT">NEFT</option>'
                            +'</select>'
                        +'</div>'
                   +'</div>'
                   +'<div class="form-group row">'
                        +'<div class="col-sm-3">Txn Date</div>'
                        +'<div class="col-sm-2" style="padding-right: 0px;">'
                            +'<select required="" name="FromD" id="FromD" class="form-control" style="border:1px solid #ccc">'
                                <?php for($i=1;$i<=31;$i++) {?>
                                +'<option value="<?php echo $i;?>" <?php echo (isset($_POST[ 'FromD'])) ? (($_POST[ 'FromD']==$i) ? " selected='selected' " : "") : (($FromD==$i) ? " selected='selected' " : "");?> ><?php echo $i;?></option>'
                                <?php } ?>                                             
                            +'</select>'
                        +'</div>'
                        +'<div class="col-sm-4" style="padding-right: 0px;padding-left: 0px;">'
                            +'<select required="" style="border:1px solid #ccc" class="form-control" name="FromM" id="FromM" aria-invalid="true" data-validation-required-message="Please select birth month">'
                                +'<option value="1"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==1) ? " selected='selected' " : "") : (($FromM==1) ? " selected='selected' " : "");?>>January</option>'
                                +'<option value="2"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==2) ? " selected='selected' " : "") : (($FromM==2) ? " selected='selected' " : "");?>>February</option>'
                                +'<option value="3"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==3) ? " selected='selected' " : "") : (($FromM==3) ? " selected='selected' " : "");?>>March</option>'
                                +'<option value="4"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==4) ? " selected='selected' " : "") : (($FromM==4) ? " selected='selected' " : "");?>>April</option>'
                                +'<option value="5"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==5) ? " selected='selected' " : "") : (($FromM==5) ? " selected='selected' " : "");?>>May</option>'
                                +'<option value="6"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==6) ? " selected='selected' " : "") : (($FromM==6) ? " selected='selected' " : "");?>>June</option>'
                                +'<option value="7"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==7) ? " selected='selected' " : "") : (($FromM==7) ? " selected='selected' " : "");?>>July</option>'
                                +'<option value="8"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==8) ? " selected='selected' " : "") : (($FromM==8) ? " selected='selected' " : "");?>>August</option>'
                                +'<option value="9"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==9) ? " selected='selected' " : "") : (($FromM==9) ? " selected='selected' " : "");?>>September</option>'
                                +'<option value="10" <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==10) ? " selected='selected' " : "") : (($FromM==10) ? " selected='selected' " : "");?>>October</option>'
                                +'<option value="11" <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==11) ? " selected='selected' " : "") : (($FromM==11) ? " selected='selected' " : "");?>>November</option>'
                                +'<option value="12" <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==12) ? " selected='selected' " : "") : (($FromM==12) ? " selected='selected' " : "");?>>December</option>'
                            +'</select>' 
                        +'</div>'
                        +'<div class="col-sm-3" style="padding-right: 0px;padding-left: 0px;">'
                            +'<select required="" style="border:1px solid #ccc" class="form-control" name="FromY" id="FromY" aria-invalid="true" data-validation-required-message="Please select birth year">'
                                <?php for($i=date("Y");$i<=date("Y");$i++) {?>
                                +'<option value="<?php echo $i;?>" <?php echo (isset($_POST[ 'FromY'])) ? (($_POST[ 'FromY']==$i) ? " selected='selected' " : "") : (($FromY==$i) ? " selected='selected' " : "");?> ><?php echo $i;?></option>'
                                <?php } ?>                       
                            +'</select>'
                        +'</div>'
                    +'</div>'
             +'</div>'
             +'<div class="modal-footer">'
                +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                +'<button type="button" class="btn btn-success" onclick="Approve()" >Yes, Confirm</button>'
             +'</div>';
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");                                                      
}
function Approve() {
     ErrorCount=0;    
     $('#ErrTxnID').html("");
        
        IsNonEmpty("TxnID","ErrTxnID","Please Enter Bank Txn ID");
     
     if(ErrorCount==0) {
        $("#BankTransactionID").val($("#TxnID").val());
        $("#TransactionMode").val($("#TxnMode").val());
        $("#TransactionDate").val($("#FromD").val()+"-"+$("#FromM").val()+"-"+$("#FromY").val());
        $("#approveBtn").trigger( "click" );
     }else{
         return false;
     }
}
function CallConfirmationReject(){
    var txt= '<div class="modal-header" style="padding-bottom:5px">'
                 +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                 +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                    +'<span aria-hidden="true" style="color:black">&times;</span>'
                 +'</button>'
             +'</div>'
             +'<div class="modal-body">'
                +'<div class="form-group row">'                                                            
                    +'<div class="col-sm-12">'
                        +'Are you sure want to reject?<br>'
                    +'</div>'
                +'</div>'
                +'<div class="form-group row">'                                                            
                    +'<div class="col-sm-12">'
                        +'<textarea name="RejectedRemarks" id="RejectedRemarks" class="form-control" placeholder="Rejected Remarks"></textarea>'
                    +'</div>'
                +'</div>'
             +'</div>'
             +'<div class="modal-footer">'
                +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                +'<button type="button" class="btn btn-danger" onclick="Reject()" >Yes, Confirm</button>'
             +'</div>';
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");                                                      
}
function Reject() {
     $("#RejectRemarks").val($("#RejectedRemarks").val());
    $("#rejectBtn").trigger( "click" );
}
</script>