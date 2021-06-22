
<?php 
  $sql= $mysql->select("select * from `_tbl_wallet_request` where  `RequestID`='".$_GET['ReqID']."'");
?>

        <!-- Sidebar -->

        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                     
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Request detail</div>
                                </div>
                                <form id="frmapprove" method="post">
                                <input type="hidden" value="<?php echo $sql[0]['MemberID'];?>" id="MemberID" Name="MemberID"    >
                                <input type="hidden" value="<?php echo $sql[0]['RequestID'];?>" id="RequestID" Name="RequestID"    >
                                <input type="hidden" value="<?php echo $sql[0]['Amount'];?>" id="Amount" Name="Amount"    >
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">TransferTo </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['TransferTo'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Amount </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['Amount'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mode </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['TransferMode'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Remarks </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['Remarks'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="CommunicationAddress" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"> Txn Date </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['TxnDate'];?></div>
                                        </div>
                                        <?php if($sql[0]['Status']==1){    ?>
                                          <div class="form-group form-show-validation row">
                                                <span style="color: green;" > Approved<br>
                                                Approved On : <?php echo $sql[0]['ApprovedOn'];?></span>
                                            </div>
                                        <?php } ?>
                                        <?php if($sql[0]['Status']==2){    ?>
                                          <div class="form-group form-show-validation row">
                                                <span style="color: red;" > Rejected<br>
                                                Approved On : <?php echo $sql[0]['RejectedOn'];?></span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php if($sql[0]['Status']==0){    ?>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-success " onclick="DoApprove(<?php echo $sql[0]['RequestID'];?>)"  name="submitRequest">Approve</button>
                                                <button type="button" class="btn btn-danger " onclick="DoReject(<?php echo $sql[0]['RequestID'];?>)"  name="submitRequest">Reject</button>
                                            </div>                                        
                                        </div>
                                    </div>
                                    <?php } ?>
                                </form>
                            </div>                                                                                             
                        </div>
                    </div>
                </div>
            </div>
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
 function DoApprove(RequestID) {
    var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-secondary btn-sm' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=Requests/WalletRequests\"'>Continue</button></div>";
    $("#confrimation_text").html(loading);
    
    $.post( "webservice.php?action=ApproveMemberWalletRequest",  $( "#frmapprove" ).serialize(),function( data ) {
        var obj = JSON.parse(data); 
        var html = "";
        if (obj.status=="failure") {
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://www.saralservices.in/app/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
            
        } else {
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://www.saralservices.in/app/assets/tick.jpg' style='width:128px'><br><br>Approved<br></div>";
            html += "<br>" + buttons;
            $('#ConfirmationPopup').modal("show");
        }
        $("#confrimation_text").html(html);
        
    });
}
function DoReject(RequestID) {
    var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-secondary btn-sm' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=Requests/WalletRequests\"'>Continue</button></div>";
    $("#confrimation_text").html(loading);
    
    $.post( "webservice.php?action=RejectMemberWalletRequest",  $( "#frmapprove" ).serialize(),function( data ) {
        var obj = JSON.parse(data); 
        var html = "";
        if (obj.status=="failure") {
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://www.saralservices.in/app/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
            
        } else {
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://www.saralservices.in/app/assets/tick.jpg' style='width:128px'><br><br>Rejected<br></div>";
            html += "<br>" + buttons;
        }
        $("#confrimation_text").html(html);
        $('#ConfirmationPopup').modal("show");
        
    });
}
</script>
