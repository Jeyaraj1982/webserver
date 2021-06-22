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
                            <input type="hidden" value="" name="TxnDate" id="TxnDate">
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
                                                     <select  id="d" name="d"  class="form-control col-4">
                                                        <option value="01" <?php echo date("d")==1 ? 'Selected="selected" ' : "";?>>01</option>
                                                        <option value="02"  <?php echo date("d")==2 ? 'Selected="selected" ' : "";?>>02</option>
                                                        <option value="03"  <?php echo date("d")==3 ? 'Selected="selected" ' : "";?>>03</option>
                                                        <option value="04"  <?php echo date("d")==4 ? 'Selected="selected" ' : "";?>>04</option>
                                                        <option value="05"  <?php echo date("d")==5 ? 'Selected="selected" ' : "";?>>05</option>
                                                        <option value="06"  <?php echo date("d")==6 ? 'Selected="selected" ' : "";?>>06</option>
                                                        <option value="07"  <?php echo date("d")==7 ? 'Selected="selected" ' : "";?>>07</option>
                                                        <option value="08"  <?php echo date("d")==8 ? 'Selected="selected" ' : "";?>>08</option>
                                                        <option value="09"  <?php echo date("d")==9 ? 'Selected="selected" ' : "";?>>09</option>
                                                        <option value="10"  <?php echo date("d")==10 ? 'Selected="selected" ' : "";?>>10</option>
                                                        
                                                        <option value="11" <?php echo date("d")==11 ? 'Selected="selected" ' : "";?>>11</option>
                                                        <option value="12"  <?php echo date("d")==12 ? 'Selected="selected" ' : "";?>>12</option>
                                                        <option value="13"  <?php echo date("d")==13 ? 'Selected="selected" ' : "";?>>13</option>
                                                        <option value="14"  <?php echo date("d")==14 ? 'Selected="selected" ' : "";?>>14</option>
                                                        <option value="15"  <?php echo date("d")==15 ? 'Selected="selected" ' : "";?>>15</option>
                                                        <option value="16"  <?php echo date("d")==16 ? 'Selected="selected" ' : "";?>>16</option>
                                                        <option value="17"  <?php echo date("d")==17 ? 'Selected="selected" ' : "";?>>17</option>
                                                        <option value="18"  <?php echo date("d")==18 ? 'Selected="selected" ' : "";?>>18</option>
                                                        <option value="19"  <?php echo date("d")==19 ? 'Selected="selected" ' : "";?>>19</option>
                                                        <option value="20"  <?php echo date("d")==20 ? 'Selected="selected" ' : "";?>>20</option>
                                                        
                                                        <option value="21" <?php echo date("d")==21 ? 'Selected="selected" ' : "";?>>21</option>
                                                        <option value="22"  <?php echo date("d")==22 ? 'Selected="selected" ' : "";?>>22</option>
                                                        <option value="23"  <?php echo date("d")==23 ? 'Selected="selected" ' : "";?>>23</option>
                                                        <option value="24"  <?php echo date("d")==24 ? 'Selected="selected" ' : "";?>>24</option>
                                                        <option value="25"  <?php echo date("d")==25 ? 'Selected="selected" ' : "";?>>25</option>
                                                        <option value="26"  <?php echo date("d")==26 ? 'Selected="selected" ' : "";?>>26</option>
                                                        <option value="27"  <?php echo date("d")==27 ? 'Selected="selected" ' : "";?>>27</option>
                                                        <option value="28"  <?php echo date("d")==28 ? 'Selected="selected" ' : "";?>>28</option>
                                                        <option value="29"  <?php echo date("d")==29 ? 'Selected="selected" ' : "";?>>29</option>
                                                        <option value="30"  <?php echo date("d")==30 ? 'Selected="selected" ' : "";?>>30</option>
                                                        
                                                        <option value="31"  <?php echo date("d")==31 ? 'Selected="selected" ' : "";?>>10</option>
                                                    </select>
                                                   
                                                    <select id="m" name="m"  class="form-control col-4">
                                                        <option value="01" <?php echo date("m")==1 ? 'Selected="selected" ' : "";?>>JAN</option>
                                                        <option value="02"  <?php echo date("m")==2 ? 'Selected="selected" ' : "";?>>FEB</option>
                                                        <option value="03"  <?php echo date("m")==3 ? 'Selected="selected" ' : "";?>>MAR</option>
                                                        <option value="04"  <?php echo date("m")==4 ? 'Selected="selected" ' : "";?>>APR</option>
                                                        <option value="05"  <?php echo date("m")==5 ? 'Selected="selected" ' : "";?>>MAY</option>
                                                        <option value="06" <?php echo date("m")==6 ? 'Selected="selected" ' : "";?>>JUN</option>
                                                        <option value="07" <?php echo date("m")==7 ? 'Selected="selected" ' : "";?>>JLY</option>
                                                        <option value="08" <?php echo date("m")==8 ? 'Selected="selected" ' : "";?>>AUG</option>
                                                        <option value="09" <?php echo date("m")==9 ? 'Selected="selected" ' : "";?>>SEP</option>
                                                        <option value="10" <?php echo date("m")==10 ? 'Selected="selected" ' : "";?>>OCT</option>
                                                        <option value="11" <?php echo date("m")==11 ? 'Selected="selected" ' : "";?>>NOV</option>
                                                        <option value="12" <?php echo date("m")==12 ? 'Selected="selected" ' : "";?>>DEC</option>
                                                    </select>
                                                     <select  id="y" name="y" class="form-control col-4">
                                                        <option value="2021"  <?php echo date("y")==2021 ? 'Selected="selected" ' : "";?>>2021</option>
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
                                                <a href="dashboard.php?action=UtilityWallet/WalletRequests">Previous Requests</a>&nbsp;&nbsp;
                                                <button type="button" class="btn btn-outline-secondary" onclick="location.href='dashboard.php';"  name="submitRequest">Cancel</button>&nbsp;&nbsp;
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