 <style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px}
</style>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add My Bank Details</div>
                        </div>
                        <form method="POST" action="" id="ContactForm" onsubmit="return checkInputs()">
                            <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <label>Bank Name</label>
                                                    <input type="text"  value="<?php echo (isset($_POST['BankName']) ? $_POST['BankName'] : "");?>" name="BankName" id="BankName" class="form-control" placeholder="Bank Name" style="font-size:16px">
                                                <div class="errorstring" id="ErrBankName"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <label> Holder Name </label>
                                                    <input type="text"  value="<?php echo (isset($_POST['AccountName']) ? $_POST['AccountName'] : "");?>" name="AccountName" id="AccountName" class="form-control" placeholder="Account Holder Name" style="font-size:16px">
                                                <div class="errorstring" id="ErrAccountName"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                    <label>Account Number</label>
                                                    <input type="text"  value="<?php echo (isset($_POST['AccountNumber']) ? $_POST['AccountNumber'] : "");?>" name="AccountNumber" id="AccountNumber" class="form-control" placeholder="Account Number" style="font-size:16px">
                                                <div class="errorstring" id="ErrAccountNumber"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <label>IFSCode</label>
                                                <input type="text"  value="<?php echo (isset($_POST['IFSCode']) ? $_POST['IFSCode'] : "");?>" name="IFSCode" id="IFSCode" class="form-control" placeholder="IFS Code" style="font-size:16px">
                                                <div class="errorstring" id="ErrIFSCode"></div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom:10px">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                    <label>IsActive</label>
                                                    <select name="IsActive" id="IsActive" class="form-control">
                                                        <option value="1" <?php echo $_POST[ 'IsActive'] ? " selected='selected' " : "";?>>Yes</option>
                                                        <option value="0" <?php echo $_POST[ 'IsActive'] ? " selected='selected' " : "";?>>No</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <button type="button" class="btn btn-primary  btn-sm" onclick="doConfrim()"  name="submitRequest">Save Bank</button>
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
      
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>
         
      </div>
    </div>
  </div>
</div> 
<script>
 function is_AlphaNumeric(acname) {
    
    if (acname.length==0) {
        return false;
    }
    var reg = /^[a-z0-9\-\s]+$/i
    if (acname.match(reg)) {
        return true
    }
    return false;
}
function isIfscCodeValid(ifscode) {
    var reg = /^[A-Za-z]{4}[0-9]{6,7}$/
    if (ifscode.match(reg)) {
        return true
    }
    return false;
}

function is_valid_bank_account_number(acnumber) {
    
    if (acnumber.length<6) {
        return false;
    }
    var reg = /^[\w.]+$/i
    if (acnumber.match(reg)) {
        return true
    }
    return false;
}

function is_valid_bank_account_name(acname) {
    
    if (acname.length<3) {
        return false;
    }
    var reg = /^[a-z0-9\-\s]+$/i
    if (acname.match(reg)) {
        return true
    }
    return false;
}
$(document).ready(function(){
        
        $("#BankName").blur(function() {
            $('#ErrBankName').html("");   
            var ac_name = $('#BankName').val().trim();
            if (ac_name.length==0) {
                $('#ErrBankName').html("Please enter Bank Name"); 
            } else {
                if (!(is_AlphaNumeric(ac_name))) {
                    $('#ErrBankName').html("Bank Name is invalid");
                }
            }
        }); 
        $("#AccountName").blur(function() {
            $('#ErrAccountName').html("");   
            var ac_name = $('#AccountName').val().trim();
            if (ac_name.length==0) {
                $('#ErrAccountName').html("Please enter Account Name"); 
            } else {
                if (!(is_valid_bank_account_name(ac_name))) {
                    $('#ErrAccountName').html("Account name is invalid");
                }
            }
        });
        
        $("#AccountNumber").blur(function() {
            $('#ErrAccountNumber').html("");
            var ac_number = $('#AccountNumber').val().trim();
            if (ac_number.length==0) {
                $('#ErrAccountNumber').html("Please enter Account Number");
            } else {
                if (!(is_valid_bank_account_number(ac_number))) {
                    $('#ErrAccountNumber').html("Account number is invalid");
                }
            }
        });
        
        $("#IFSCode").blur(function() {
            $('#ErrIFSCode').html("");
            var ifsc = $('#IFSCode').val().trim();
            if (ifsc.length==0) {
                $('#ErrIFSCode').html("Please Enter IFSCode");
            } else {
                if(!(isIfscCodeValid($('#IFSCode').val()))) {
                    $('#ErrIFSCode').html("IFSCode is invalid");
                }
            }
        });
        
    });
   
var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://www.saralservices.in/app/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
function doConfrim() {
    $('#ErrBankName').html(""); 
    $('#ErrAccountName').html(""); 
    $('#ErrAccountNumber').html(""); 
    $('#ErrIFSCode').html(""); 
   
        var error=0;                                                                                    
      var ac_name = $('#BankName').val().trim();
        if (ac_name.length==0) {
            $('#ErrBankName').html("Please enter Bank Name"); 
             error++;
        } else {
            if (!(is_AlphaNumeric(ac_name))) {
                $('#ErrBankName').html("Bank Name is invalid");
                error++;
            }
        }
        var ac_name = $('#AccountName').val().trim();
        if (ac_name.length==0) {
            $('#ErrAccountName').html("Please enter Account Name"); 
             error++;
        } else {
            if (!(is_valid_bank_account_name(ac_name))) {
                $('#ErrAccountName').html("Account name is invalid");
                error++;
            }
        }
        
        var ac_number = $('#AccountNumber').val().trim();
        if (ac_number.length==0) {
            $('#ErrAccountNumber').html("Please enter Account Number");
             error++;
        } else {
            if (!(is_valid_bank_account_number(ac_number))) {
                $('#ErrAccountNumber').html("Account number is invalid");
                error++; 
            }
        }
        var ifsc = $('#IFSCode').val().trim();
        if (ifsc.length==0) {
            $('#ErrIFSCode').html("Please Enter IFSCode");
            error++;
        } else {
            if(!(isIfscCodeValid($('#IFSCode').val()))) {
                $('#ErrIFSCode').html("IFSCode is invalid");
                error++;
            }
        }  
        
         if (error>0) {
            return false;
        }
    if (error==0) {
         
      var txt = '<h5 class="modal-title" style="text-align: center;width:100%">Confirmation</h5> <br>'
                    +'<div class="form-group" style="text-align:left;margin-bottom: -12px;">'
                        +'<div class="input-group mt-1">'
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1"  style="padding-left:78px;font-weight:bold;font-size:12px;">Bank Name</span>'
                            +'</div>'
                            +'<input type="text" value="'+$('#BankName').val()+'" class="form-control" disabled="disabled">'
                        +'</div>'
                 +'</div>'
                 +'<div class="form-group" style="margin-bottom: -14px;">'                
                    +'<div class="input-group">'
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1" style="padding-left:86px;font-weight:bold">A/c Name</span>'
                            +'</div>'
                            +'<input type="text" value="'+$('#AccountName').val()+'"  name="_MobileNumber" id="_MobileNumber" class="form-control" disabled="disabled">'
                      +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align:left">' 
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="font-weight:bold;font-size:12px;">A/c Number</span>'
                        +'</div>'
                        +'<input type="text" value="'+$('#AccountNumber').text()+'"  name="_Operator" id="_Operator" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align: left;">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:33px;font-weight:bold;font-size:12px;">IFSCode</span>'
                        +'</div>'    
                        +'<input type="text" value="'+$('#IFSCode').val()+'"  name="_DTHNumber" id="_DTHNumber" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align: left;">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:25px;font-weight:bold;font-size:12px;">IsActive</span>'
                        +'</div>' 
                        +'<input type="text" value="'+$('#IsActive option:selected').text()+'"  name="_DTHOperator" id="_DTHOperator" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-warning" onclick="doSaveBankDetails()">Confirm</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);
        $('#ConfirmationPopup').modal("show");
        return false;
    } else {
     $('#ConfirmationPopup').modal("hide");
     $('#submitRequest').trigger("click");
    }
}
  

function doSaveBankDetails() {
        
        var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=AddBankDetails\"'>Add Another Account</button>";
        
        $('#ErrAccountNumber').html(""); 
        
        
        var ebnumber = $('#AccountNumber').val();
            if (!(ebnumber.length>5)) {
                $('#ErrAccountNumber').html("Invalid AccountNumber");
                error++;
                return false;
            }
       
       // $("#planDetails").html(loading);
    $("#xconfrimation_text").html(loading);
        
        $.post( "webservice.php?action=savemybankdetails",  $( "#ContactForm" ).serialize(),function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                  html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://www.saralservices.in/app/assets/accessdenied.png' style='width:128px'><br><br>Failed.<br>"+obj.message;
            } else {
                 html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://www.saralservices.in/app/assets/tick.jpg' style='width:128px'><br><br>Success<br></div>";
                html += "<br>" + buttons;
            }
            $("#xconfrimation_text").html(html);
        });
    }

</script>
          