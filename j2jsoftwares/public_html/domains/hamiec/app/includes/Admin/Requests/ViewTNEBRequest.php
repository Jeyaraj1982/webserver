
<?php 
  $sql= $mysql->select("select * from `_tbl_transactions` where  `txnid`='".$_GET['ReqID']."'");
?>

        <!-- Sidebar -->

        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                     
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">TNEB Request detail</div>
                                </div>
                                <form id="frmapprove" method="post">
                                <input type="hidden" value="<?php echo $sql[0]['txnid'];?>" id="RequestID" Name="RequestID"    >
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Member ID </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['MemberID'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Amount </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['rcamount'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="MobileNumber" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">TNEB Number </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['rcnumber'];?></div>
                                        </div>
                                       <div class="form-group form-show-validation row">
                                            <label for="CommunicationAddress" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"> Txn Date </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['txndate'];?></div>
                                       </div>
                                       <div class="form-group form-show-validation row">
                                            <label for="CommunicationAddress" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left"> Status </label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $sql[0]['TxnStatus'];?></div>
                                       </div>
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
