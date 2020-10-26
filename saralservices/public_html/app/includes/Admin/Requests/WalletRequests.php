<?php
    $fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
    $toDate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
    $txn = $mysql->select("select * from _tbl_wallet_request where (date(TxnDate)>=date('".$fromDate."') and date(TxnDate)<=date('".$toDate."') ) order by RequestID desc");
    ?> 
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Wallet Requests
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
                                            <form method="post" id="frm_<?php echo $t['RequestID'];?>">
                                            <input type="hidden" id="RequestID" name="RequestID" value="<?php echo $t['RequestID'];?>">
                                            <td><?php echo $t['TxnDate'];?></td>
                                            <td><?php echo $t['TransferTo'];?></td>
                                            <td style="text-align: right"><?php echo number_format($t['Amount'],2);?></td>
                                            <td><?php echo $t['TransferMode'];?></td>
                                            <td><?php
                                                    if($t['Status']==0){
                                                        echo "pending";
                                                    }
                                                    if($t['Status']==1){
                                                        echo "Approved";
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
                                            <!--<td><a href="javascript:void(0);" onclick="ViewRequests('<?php echo $t['TxnDate'];?>','<?php echo $t['TransferTo'];?>','<?php echo number_format($t['Amount'],2);?>','<?php echo $t['TransferMode'];?>','<?php echo $t['RequestID'];?>','<?php echo $t['MemberID'];?>','<?php echo $t['Remarks'];?>')">View</a></td>-->
                                            <td><a href="dashboard.php?action=Requests/ViewWalletRequest&ReqID=<?php echo $t['RequestID'];?>">View</a></td>
                                            </form>
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
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
      </div>
    </div>
  </div>
</div>
 <script>
 var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://www.saralservices.in/app/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 function ViewRequests(TxnDate,TransferTo,Amount,TransferMode,RequestID,MemberID,Remarks) {
     var txt = '<h5 class="modal-title" style="text-align: center;width:100%">Request Details</h5> <br>'
                    +'<form method="post" id="frm_approve">'
                    +'<input type="hidden" value="'+MemberID+'" id="MemberID">'
                    +'<input type="hidden" value="'+RequestID+'" id="RequestID">'
                    +'<div class="form-group" style="text-align:left;margin-bottom: -12px;">'
                    +'<div class="form-group" style="text-align:left;margin-bottom: -12px;">'
                        +'<div class="input-group mt-1">'
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1"  style="padding-left:78px;font-weight:bold;font-size:12px;">Txn Date</span>'
                            +'</div>'
                            +'<input type="text" value="'+TxnDate+'" class="form-control" disabled="disabled">'
                        +'</div>'
                 +'</div>'
                 +'<div class="form-group" style="margin-bottom: -14px;">'                
                    +'<div class="input-group">'
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1" style="padding-left:86px;font-weight:bold">Transfer To</span>'
                            +'</div>'
                            +'<input type="text" value="'+TransferTo+'"  name="_MobileNumber" id="_MobileNumber" class="form-control" disabled="disabled">'
                      +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align:left">' 
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="font-weight:bold;font-size:12px;">INR</span>'
                        +'</div>'
                        +'<input type="text" value="'+Amount+'"  name="_Operator" id="_Operator" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align: left;">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:33px;font-weight:bold;font-size:12px;">Mode</span>'
                        +'</div>'    
                        +'<input type="text" value="'+TransferMode+'"  name="_DTHNumber" id="_DTHNumber" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align: left;">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:25px;font-weight:bold;font-size:12px;">Remarks</span>'
                        +'</div>' 
                        +'<input type="text" value="'+Remarks+'"  name="_DTHOperator" id="_DTHOperator" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                 
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-success" onclick="DoApprove()">Approve</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-danger" onclick="DoApprove('+RequestID+')">Reject</button>&nbsp;&nbsp;&nbsp;'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);
     $('#ConfirmationPopup').modal("show");
 }
 
 function DoApprove(RequestID) {
    var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-secondary btn-sm' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=bill_tneb\"'>Next Bill</button></div>";
    $("#confrimation_text").html(loading);
    
    $.post( "webservice.php?action=ApproveMemberWalletRequest",  $( "#frm_"+RequestID+"" ).serialize(),function( data ) {
        var obj = JSON.parse(data); 
        var html = "";
        if (obj.status=="failure") {
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://www.saralservices.in/app/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
            
        } else {
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://www.saralservices.in/app/assets/tick.jpg' style='width:128px'><br><br>Success<br></div>";
            html += "<br>" + buttons;
        }
        $("#confrimation_text").html(html);
    });
}
</script>
