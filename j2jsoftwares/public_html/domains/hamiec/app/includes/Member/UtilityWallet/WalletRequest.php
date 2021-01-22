<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <?php $banks = $mysql->select("select * from tbl_admin_bank_details where IsActive='1' and is_dmt='0'");?>
            <div class="row">
                <div class="col-md-7">
                    <div class="card" style="border:1px solid #ccc">
                        <div class="card-header">
                            <div class="card-title" style="line-height:23px;">
                                Utility Wallet Refill Request<br>
                                <span style="font-size:13px;color:#555">for Mobile Recharge, DTH services</span>
                            </div>
                        </div>
                        <form method="POST" action="" id="frm_wallet_request" onsubmit="return beforeSubmit()">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="width:130px !important;text-align:right;display:block;padding-top:8px">Amount (₹)</span>
                                                    </div>
                                                    <select class="form-control" id="Amount" name="Amount">
                                                        <?php for($i=5000;$i<=20000;$i+=1000) {?>
                                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="input-group mt-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="width:130px !important;text-align:right;display:block;padding-top:8px">Mode</span>
                                                    </div>
                                                    <select name="Mode" id="Mode" class="form-control" style="font-size: 16px;">
                                                        <option value="IMPS" <?php echo ($_POST['Mode']=="IMPS") ? " selected='selected' " : "";?>> IMPS</option>    
                                                        <option value="NEFT" <?php echo ($_POST['Mode']=="NEFT") ? " selected='selected' " : "";?>> NEFT</option>    
                                                        <option value="RTG"  <?php echo ($_POST['Mode']=="RTGS") ? " selected='selected' " : "";?>> RTGS</option>    
                                                        <option value="RTG"  <?php echo ($_POST['Mode']=="GPAY") ? " selected='selected' " : "";?>> GPAY</option>    
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group mt-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="width:130px !important;text-align:right;display:block;padding-top:8px">Txn date</span>
                                                    </div>
                                                     <select  class="form-control col-4">
                                                        <option value="01">01</option>
                                                        <option value="02">02</option>
                                                        <option value="03">03</option>
                                                        <option value="04">04</option>
                                                        <option value="05">05</option>
                                                        <option value="06">06</option>
                                                        <option value="07">07</option>
                                                        <option value="08">08</option>
                                                        <option value="09">09</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                   
                                                    <select  class="form-control col-4">
                                                        <option value="01">JAN</option>
                                                        <option value="02">FEB</option>
                                                        <option value="03">MAR</option>
                                                        <option value="04">APR</option>
                                                        <option value="05">MAY</option>
                                                        <option value="06">JUN</option>
                                                        <option value="07">JLY</option>
                                                        <option value="08">AUG</option>
                                                        <option value="09">SEP</option>
                                                        <option value="10">OCT</option>
                                                        <option value="11">NOV</option>
                                                        <option value="12">DEC</option>
                                                    </select>
                                                     <select  class="form-control col-4">
                                                        <option>2021</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group mt-3">              
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="width:130px !important;text-align:right;display:block;padding-top:10px">Transaction ID</span>
                                                    </div>
                                                    <input type="text"  value="<?php echo isset($_POST['Remarks']) ? $_POST['Remarks'] : "";?>"   name="Remarks" id="Remarks" class="form-control" placeholder="Bank Transaction Ref Number" >
                                                </div>
                                                <div class="errorstring" id="ErrRemarks" style="text-align: right">&nbsp;</div>  
                                            </div>
                                        </div>
                                        <div class="row  mt-3">
                                            <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: right;">
                                                <button type="button" class="btn btn-outline-secondary" onclick="location.href='dashboard.php';"  name="submitRequest">Cancel</button>
                                                <button type="button" class="btn btn-primary" onclick="beforeSubmit()"  name="submitRequest">Submit Request</button>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card" style="border:1px solid #ccc">
                        <div class="card-header">
                            <div class="card-title"><img src="<?php echo SITE_URL;?>/app/assets/icons/bank_24.png" style="margin-top:-10px;">&nbsp;Bank Information</div>
                        </div>
                        <div class="card-body">
                            <?php echo $banks[0]['BankName'];?><br><br>
                            <?php echo $banks[0]['AccountName'];?><br>
                            <?php echo $banks[0]['AccountNumber'];?><br>
                            <?php echo $banks[0]['IFSCode'];?><br><br>
                        </div>
                    </div>
                    <div class="card" style="border:1px solid #ccc">
                        <div class="card-header">
                            <div class="card-title"><img src="<?php echo SITE_URL;?>/app/assets/icons/lightbulb_24.png" style="margin-top:-10px;">&nbsp;Note</div>
                        </div>
                        <div class="card-body">
                            Payment/Wallet Update are available <br>Monday To Saturday 9 AM to 8 PM.<br><br>
                            Payment request rather than this timings will be processed only on next working day.<br><br>
                            To avoid the delay in Payment/Wallet Update, kindly provide the correct details.<Br><br>
                            Minimum 30 minutes to Maximum 2 hours.<br>     
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
            $('#ErrRemarks').html("&nbsp;");
            var n = $('#Remarks').val().trim();
            if (n.length==0) {
                $('#ErrRemarks').html("Please enter Transaction ID");
            } 
        });
    });
    
    function beforeSubmit() {
        
        $('#ErrRemarks').html("&nbsp;"); 
        
        var error=0;                                                                                    
        
        
        var n = $('#Remarks').val().trim();
        if (n.length==0) {
            $('#ErrRemarks').html("Please enter Transaction ID");
             error++;
        } 
        
        var amt = $('#Amount').val().trim();
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
                                    +'<span class="input-group-text" id="basic-addon1" style="padding-left:28px;font-weight:bold;font-size:12px;">Transaction ID</span>'
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
</script>
          