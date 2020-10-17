<?php
    {
?>
 <style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px}
</style>
<?php $balance = $application->getBalance($_SESSION['FRANCHISEE']['userid']);?>
<?php if($balance>=0){ ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Withdrawal Request</div>
                        </div>
                        <form method="POST" action="" id="frm_wallet_request" onsubmit="return beforeSubmit()">
                            <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <label>Available Balance</label>
                                                <input type="text" disabled="disabled" class="form-control  btn-sm" id="AvailableBalance" name="AvailableBalance" value="Rs.<?php echo number_format($application->getBalance($_SESSION['FRANCHISEE']['userid']),2); ?>" style="font-size:16px" maxlength="12">
                                            </div>
                                        </div>    <br>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <label>Withdrawal Amount</label>
                                                    <input type="text" class="form-control  btn-sm" id="Amount" name="Amount" placeholder="Amount" style="font-size:16px" maxlength="12">
                                                <div class="errorstring" id="ErrAmount"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <label>Remarks</label>
                                                <input type="text"  value="<?php echo isset($_POST['Remarks']) ? $_POST['Remarks'] : "";?>"   name="Remarks" id="Remarks" class="form-control" placeholder="Remarks" >
                                            </div>
                                        </div>    <br>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <button type="button" class="btn btn-primary  btn-sm" onclick="beforeSubmit()"  name="submitRequest">Submit Request</button>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;padding-top:20px;">
         <h5 class="modal-title" style="text-align: center;width:100%">Confirmation</h5> 
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>
          <div style="padding:20px;text-align:center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-warning" onclick="doConfrim()" name="submitRequest" >Confirm</button>
         </div>
      </div>
    </div>
  </div>
</div> 
   <script>
     var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://klx.co.in/klxfranchisee/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
     var IsConfirm = 0;
    $(document).ready(function(){
        
        $("#Remarks").blur(function() {
            $('#ErrRemarks').html("");
            var n = $('#Remarks').val().trim();
            if (n.length==0) {
                $('#ErrRemarks').html("Please enter Remaks");
            } 
        });
        
        $("#Amount").blur(function() {
            $('#ErrAmount').html("");
            var amt = $('#Amount').val().trim();
            if (amt.length==0) {
                $('#ErrAmount').html("Please enter Amount");
            } else {
                if (!(parseFloat(amt)>=0 )) {
                    $('#ErrAmount').html("Amount must have greater than Rs.0");
                }
            }
        });
    });
    
    function beforeSubmit() {
        
        $('#ErrAmount').html(""); 
        $('#ErrRemarks').html(""); 
        
        var error=0;                                                                                    
        
        
        var n = $('#Remarks').val().trim();
        if (n.length==0) {
            $('#ErrRemarks').html("Please enter Remaks");
             error++;
        } 
        
        var amt = $('#Amount').val().trim();
         if (amt.length==0) {
            $('#ErrAmount').html("Please enter Amount");
             error++;
        } else {
        if (!(parseFloat(amt)>=10 && parseFloat(amt)<=7000)) {
            $('#ErrAmount').html("Amount must have greater than Rs.10");
             error++;
        }
        }
       
        if (error>0) {
            return false;
        }
        
        if (error==0) {
            var txt = '<div class="form-group" style="margin-bottom: -14px;">' 
                            +'<div class="input-group mt-1">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1"  style="padding-left:32px;font-weight:bold;font-size:12px;">Available Blance</span>'
                                +'</div>'
                                +'<input type="text" value="'+$('#AvailableBalance').val()+'" class="form-control" disabled="disabled">'
                            + '</div>'
                        +'</div>'
                        +'<div class="form-group" style="margin-bottom: -14px;">'
                            +'<div class="input-group">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="padding-left:10px;font-weight:bold;font-size:12px;">Withdrawal Amount</span>'
                                +'</div>'
                                +'<input type="text"  value="'+$('#Amount').val()+'" name="_Amount" id="_Amount" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group" style="margin-bottom: -14px;">'
                            +'<div class="input-group">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="padding-left:79px;font-weight:bold;font-size:12px;">Remarks</span>'
                                +'</div>'
                                +'<input type="text"  value="'+$('#Remarks').val()+'" name="_Remarks" id="_Remarks" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>';
             $('#xconfrimation_text').html(txt); 
             $('#ConfirmationPopup').modal("show");
             return false;
        } else {
            return true;
        }
    }
    
    function doConfrim() {
    $("#confrimation_text").html(loading);
    var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-secondary btn-sm' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=Wallet/WithdrawalRequest\"'>Next Request</button></div>";
    $("#confrimation_text").html(loading);
    
    $.post( "https://klx.co.in/webservice.php?action=FranchiseeWithdrawalRequest",  $( "#frm_wallet_request" ).serialize(),function( data ) {
        var obj = JSON.parse(data); 
        var html = "";
        if (obj.status=="failure") {
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://klx.co.in/klxfranchisee/assets/accessdenied.png' style='width:128px'><br><br>Request failed.<br>"+obj.message;
            html += "</div>" +buttons;
        } else {
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://klx.co.in/klxfranchisee/assets/tick.jpg' style='width:128px'><br><br>Request Submitted</div>";
            html += "<br>" + buttons;
        }
        $("#confrimation_text").html(html);
    });
}
   
   $('#TxnDate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
   </script>
<?php } else { ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body" style="text-align: center;">
                            <img src='https://klx.co.in/klxfranchisee/assets/accessdenied.png' style='width:128px'><br><br>
                            Your wallet must have balance greater than Rs.0<br>
                            <a href="dashboard.php?action=Wallet/WithdrawalRequest">Withdrawal Request</a>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>
          <?php } ?>