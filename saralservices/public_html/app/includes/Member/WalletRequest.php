 <style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px}
</style>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Wallet request</div>
                        </div>
                        <form method="POST" action="" id="frm_wallet_request" onsubmit="return beforeSubmit()">
                            <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <label>Transfer To</label>
                                                <select name="TransferTo" id="TransferTo" class="form-control" style="font-size: 16px;">
                                                    <?php $banks = $mysql->select("select * from tbl_admin_bank_details where IsActive='1'");?>
                                                        <?php foreach($banks as $bank){ ?>
                                                            <option value="<?php echo $bank['BankName'];?>" <?php echo ($_POST['TransferTo']==$bank['BankName']) ? " selected='selected' " : "";?>> <?php echo $bank['BankName'];?></option>
                                                        <?php } ?>
                                                </select>
                                                <div class="errorstring" id="ErrTransferTo"></div> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group mb-3 mt-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text  btn-sm" id="basic-addon1" style="padding-left: 39px;">INR</span>
                                                    </div>
                                                    <input type="text" class="form-control  btn-sm" id="Amount" name="Amount" placeholder="Amount" style="font-size:16px" maxlength="12">
                                                </div>
                                                <div class="errorstring" id="ErrAmount"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text  btn-sm" id="basic-addon1" style="padding-left: 29px;">Mode</span>
                                                    </div>
                                                    <select name="Mode" id="Mode" class="form-control" style="font-size: 16px;">
                                                        <option value="IMPS" <?php echo ($_POST['Mode']=="IMPS") ? " selected='selected' " : "";?>> IMPS</option>    
                                                        <option value="NEFT" <?php echo ($_POST['Mode']=="NEFT") ? " selected='selected' " : "";?>> NEFT</option>    
                                                        <option value="RTG" <?php echo ($_POST['Mode']=="RTG") ? " selected='selected' " : "";?>> RTG</option>    
                                                    </select>
                                                </div>
                                                <div class="errorstring" id="ErrMode"></div>  
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text  btn-sm" id="basic-addon1">Txn date</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="TxnDate" name="TxnDate" value="<?php echo isset($_POST['TxnDate']) ? $_POST['TxnDate'] : date("Y-m-d");?>" style="font-size: 16px;">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-calendar-check"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="errorstring" id="ErrMode"></div>  
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text  btn-sm" id="basic-addon1">Remarks</span>
                                                    </div>
                                                    <input type="text"  value="<?php echo isset($_POST['Remarks']) ? $_POST['Remarks'] : "";?>"   name="Remarks" id="Remarks" class="form-control" placeholder="Remarks" >
                                                </div>
                                                <div class="errorstring" id="ErrRemarks"></div>  
                                            </div>
                                        </div>
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
     var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://www.saralservices.in/app/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
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
                if (!(parseFloat(amt)>=10 )) {
                    $('#ErrAmount').html("Amount must have greater than Rs.10");
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
                                    +'<span class="input-group-text" id="basic-addon1"  style="padding-left:11px;font-weight:bold;font-size:12px;">Transfer To</span>'
                                +'</div>'
                                +'<input type="text" value="'+$('#TransferTo').val()+'" class="form-control" disabled="disabled">'
                            + '</div>'
                        +'</div>'
                        +'<div class="form-group" style="margin-bottom: -14px;">'
                            +'<div class="input-group">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="padding-left:57px;font-weight:bold;font-size:12px;">INR</span>'
                                +'</div>'
                                +'<input type="text"  value="'+$('#Amount').val()+'" name="_Amount" id="_Amount" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group" style="margin-bottom: -14px;">'
                            +'<div class="input-group">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="padding-left:47px;font-weight:bold;font-size:12px;">Mode</span>'
                                +'</div>'
                                +'<input type="text"  value="'+$('#Mode option:selected').text()+'" name="_Mode" id="_Mode" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group" style="margin-bottom: -14px;">'
                            +'<div class="input-group">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="padding-left:27px;font-weight:bold;font-size:12px;">Txn Date</span>'
                                +'</div>'
                                +'<input type="text"  value="'+$('#TxnDate').val()+'" name="_TxnDate" id="_TxnDate" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group" style="margin-bottom: -14px;">'
                            +'<div class="input-group">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="padding-left:28px;font-weight:bold;font-size:12px;">Remarks</span>'
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
    var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-secondary btn-sm' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=WalletRequest\"'>Next Request</button></div>";
    $("#confrimation_text").html(loading);
    
    $.post( "webservice.php?action=WalletRequest",  $( "#frm_wallet_request" ).serialize(),function( data ) {
        var obj = JSON.parse(data); 
        var html = "";
        if (obj.status=="failure") {
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://www.saralservices.in/app/assets/accessdenied.png' style='width:128px'><br><br>Request failed.<br>"+obj.message;
            html += "</div>" +buttons;
        } else {
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://www.saralservices.in/app/assets/tick.jpg' style='width:128px'><br><br>Request Submitted</div>";
            html += "<br>" + buttons;
        }
        $("#confrimation_text").html(html);
    });
}
   
   $('#TxnDate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
   </script>
          