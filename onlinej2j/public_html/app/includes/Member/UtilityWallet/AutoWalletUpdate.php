<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <?php $banks = $mysql->select("select * from tbl_admin_bank_details where IsActive='1' and is_dmt='0'");?>
            <div class="row">
                <div class="col-md-7">
                    <div class="card" style="border:1px solid #ccc">
                        <div class="card-header">
                            <div class="card-title" style="line-height:23px;">
                                Auto-Wallet Refill<br>
                                <span style="font-size:13px;color:#555">for Money Transfer Service</span>
                            </div>
                        </div>
                        <form method="POST" action="" id="frm_wallet_request" onsubmit="return beforeSubmit()">
                            <input type="hidden" value="" name="TxnDate" id="TxnDate">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                             
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group">              
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="width:230px !important;text-align:right;display:block;padding-top:10px">Your Bank Account Number</span>
                                                    </div>
                                                    <input type="text"  value="<?php echo isset($_POST['AccountNumber']) ? $_POST['AccountNumber'] : "";?>"   name="Remarks" id="Remarks" class="form-control" placeholder="Your Bank Account Number" >
                                                </div>
                                                <div class="errorstring" id="ErrRemarks" style="text-align: right">&nbsp;</div>  
                                            </div>
                                        </div>
                                        
                                          <div class="row" style="margin-top:3px">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group">              
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="width:230px !important;text-align:right;display:block;padding-top:10px">IFSC Code</span>
                                                    </div>
                                                    <input type="text"  value="<?php echo isset($_POST['IFSCode']) ? $_POST['IFSCode'] : "";?>"   name="Remarks" id="Remarks" class="form-control" placeholder="IFSC Code" >
                                                </div>
                                                <div class="errorstring" id="ErrRemarks" style="text-align: right">&nbsp;</div>  
                                            </div>
                                        </div>
                                        
                                        
                                           
                                        
                                        
                                        <div class="row "  style="margin-top:3px">
                                            <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: right;">
                                                <a href="dashboard.php?action=UtilityWallet/AutoWalletRequests">Previous Requests</a>&nbsp;&nbsp;
                                                <button type="button" class="btn btn-outline-secondary" onclick="location.href='dashboard.php';"  name="submitRequest">Cancel</button>&nbsp;&nbsp;
                                                <button type="button" class="btn btn-primary" onclick="beforeSubmit()"  name="submitRequest">Add Bank to Auto wallet update</button>
                                            </div>                                        
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </form>
                        
                        
                    </div>
                    <div class="card" style="border:1px solid #ccc">
                    <div class="card-header">
                            <div class="card-title" style="line-height:23px;">
                                Added Your bank information<br>
                            </div>
                        </div>
                     <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                             
                                         
                                        
                                           
                                        
                                        
                                           
                                        
                                        
                                         
                                    </div>
                                    
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card" style="border:1px solid #ccc">
                        <div class="card-header">
                            <div class="card-title"><img src="<?php echo SITE_URL;?>/app/assets/icons/bank_24.png" style="margin-top:-10px;">&nbsp;Bank Information</div>
                        </div>
                        <div class="card-body">
                            ICICI Bank<br><br>
                            J2J Software Solutions<br>
                            70809070809073244<br>
                            ICIC0000104<br><br>
                        </div>
                    </div>
                    <div class="card" style="border:1px solid #ccc">
                        <div class="card-header">
                            <div class="card-title"><img src="<?php echo SITE_URL;?>/app/assets/icons/lightbulb_24.png" style="margin-top:-10px;">&nbsp;Note</div>
                        </div>
                        <div class="card-body">
                            Payment/Wallet Update are available 24x7 fully automate system.<br><br>
                            Wallet will refill instantly, when you transfer amount to our bank.<br><br>
                            No need to full payment request form.<br>  
                        </div>
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
               
            </div>
        </div>
    </div>
</div>

<script>
     var loading = "<div style='padding:80px;text-align:center;color:#aaa;padding-top:65px'><img src='assets/spinner.gif'  style='width:80px'><br><br>Processing ...</div>";
     var _confrimation_text = '<h5 class="modal-title" style="text-align: lett;width:100%;font-size: 18px;padding-left: 10px;padding-bottom: 15px;">Confirmation of wallet updtae request.</h5> '
                            + '<div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>'
                            + '<div style="padding:20px;text-align:right">'
                            + '<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;'
                            + '<button type="button" class="btn btn-primary" onclick="doConfrim()" name="submitRequest" >Yes, Confirm</button>'
                            + '</div>';
  
     var IsConfirm = 0;
    $(document).ready(function(){
        
        $("#Remarks").blur(function() {
            $('#ErrRemarks').html("&nbsp;");
            var n = $('#Remarks').val().trim();
            if (n.length==0) {
                $('#ErrRemarks').html("Please enter Transaction ID");
            } 
        });
    });
    
    function beforeSubmit() {
        
        $('#confrimation_text').html(_confrimation_text); 
        $('#ErrRemarks').html("&nbsp;"); 
        
        var error=0;                                                                                    
        
        
        var n = $('#Remarks').val().trim();
        if (n.length==0) {
            $('#ErrRemarks').html("Please enter Transaction ID");
             error++;
        } 
        
        if (error>0) {
            return false;
        }
        
        if (error==0) {
            var txt = ' '
                        +'<div class="form-group" style="margin-bottom: -14px;">'
                            +'<div class="input-group">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="width:120px;;font-weight:bold;font-size:12px;text-align:right">INR (₹)</span>'
                                +'</div>'
                                +'<input type="text"  value="'+$('#Amount').val()+'" name="_Amount" id="_Amount" class="form-control" disabled="disabled" style="background:#fff !important">'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group" style="margin-bottom: -14px;">'
                            +'<div class="input-group">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="width:120px;;font-weight:bold;font-size:12px;;text-align:right">Mode</span>'
                                +'</div>'
                                +'<input type="text"  value="'+$('#Mode option:selected').text()+'" name="_Mode" id="_Mode" class="form-control" disabled="disabled"  style="background:#fff !important">'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group" style="margin-bottom: -14px;">'
                            +'<div class="input-group">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="width:120px;;font-weight:bold;font-size:12px;;text-align:right">Txn Date</span>'
                                +'</div>'
                                +'<input type="text"  value="'+$('#d').val()+"/"+$('#m').val()+"/"+$('#y').val()+'" name="_TxnDate" id="_TxnDate" class="form-control" disabled="disabled"  style="background:#fff !important">'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group" style="margin-bottom: -14px;">'
                            +'<div class="input-group">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="font-weight:bold;font-size:12px;width:120px;;text-align:right">Transaction ID</span>'
                                +'</div>'
                                +'<input type="text"  value="'+$('#Remarks').val()+'" name="_Remarks" id="_Remarks" class="form-control" disabled="disabled"  style="background:#fff !important">'
                            +'</div>'
                        +'</div>';
             $('#xconfrimation_text').html(txt); 
             $('#ConfirmationPopup').modal({backdrop: 'static', keyboard: false})  
             $('#ConfirmationPopup').modal("show");
             
             return false;
        } else {
            return true;
        }
    }
                                                      
    function doConfrim() {
        
        $('#TxnDate').val($('#y').val()+"-"+$('#m').val()+"-"+$('#d').val());
        $("#confrimation_text").html(loading);
    
        $.post( "webservice.php?action=WalletRequest",  $( "#frm_wallet_request" ).serialize(),function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#888;padding-top:50px;'><img src='assets/warning.png' style='width: 96px;'><br><br>Request couldn't processed, "+obj.message+".<br><br><a style='color:#2b8def' href='javascript:void(0)' data-dismiss='modal'>Continue</a><br><br></div>";
            } else {
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#888;padding-top:50px;'><img src='assets/success_tick.png' style='width: 96px;border: 2px solid #3398FE;border-radius: 50%;padding: 10px;'><br><br>Request Submitted, you wil get response within 15min to 4hrs based on your payment mode.<br><br><a style='color:#2b8def' href='dashboard.php?action=UtilityWallet/WalletRequests'>Continue</a><br><br></div>";
            }
            $("#confrimation_text").html(html);
        });
    }
</script>      