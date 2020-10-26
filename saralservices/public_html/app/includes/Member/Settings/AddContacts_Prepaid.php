 <style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px}
</style>
<?php 
    $sql = $mysql->select("select * from `_tbl_transactions` where `txnid`='".$_GET['id']."'");    
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Add My Contacts</div>
                        </div>
                        <form method="POST" action="" id="ContactForm" onsubmit="return checkInputs()">
                            <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-12">
                                        
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text  btn-sm" id="basic-addon1" style="padding-left: 77px;">Name</span>
                                                    </div>
                                                    <input type="text"  value="<?php echo (isset($_POST['ContactName']) ? $_POST['ContactName'] : "");?>" name="ContactName" id="ContactName" class="form-control" placeholder="Contact Name" style="font-size:16px">
                                                </div>
                                                <div class="errorstring" id="ErrContactName"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text  btn-sm" id="basic-addon1" style="padding-left: 24px;">Mobile Number</span>
                                                    </div>
                                                    <input type="text"  readonly  value="<?php echo $sql[0]['rcnumber'];?>" maxlength="10" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="Mobile Number" style="font-size:16px">
                                                </div>
                                                <div class="errorstring" id="ErrMobileNumber"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text  btn-sm" id="basic-addon1" style="padding-left: 17px;">Mobile Operator</span>
                                                    </div>
                                                    <select id="Operator" readonly="readonly" name="Operator" class="form-control" style="font-size:16px">
                                                        <option value="RA" <?php echo (isset($_POST[ 'Operator'])) ? (($_POST[ 'Operator']== "RA") ? " selected='selected' " : "") : (($sql[0]['operatorcode']== "RA") ? " selected='selected' " : "");?>>Airtel</option>
                                                        <option value="RB" <?php echo (isset($_POST[ 'Operator'])) ? (($_POST[ 'Operator']== "RB") ? " selected='selected' " : "") : (($sql[0]['operatorcode']== "RB") ? " selected='selected' " : "");?>>BSNL</option>
                                                        <option value="RI" <?php echo (isset($_POST[ 'Operator'])) ? (($_POST[ 'Operator']== "RI") ? " selected='selected' " : "") : (($sql[0]['operatorcode']== "RI") ? " selected='selected' " : "");?>>Idea</option>
                                                        <option value="RJ" <?php echo (isset($_POST[ 'Operator'])) ? (($_POST[ 'Operator']== "RJ") ? " selected='selected' " : "") : (($sql[0]['operatorcode']== "RJ") ? " selected='selected' " : "");?>>Jio</option>
                                                        <option value="RV" <?php echo (isset($_POST[ 'Operator'])) ? (($_POST[ 'Operator']== "RV") ? " selected='selected' " : "") : (($sql[0]['operatorcode']== "RV") ? " selected='selected' " : "");?>>Vodafone</option>
                                                    </select>
                                                </div>
                                                <div class="errorstring" id="ErrOperator"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <button type="button" class="btn btn-primary  btn-sm" onclick="doConfrim()"  name="submitRequest">Save Contact</button>
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
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static"  aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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

$(document).ready(function(){
        
        $("#ContactName").blur(function() {
            $('#ErrContactName').html("");   
            var ac_name = $('#ContactName').val().trim();
            if (ac_name.length==0) {
                $('#ErrContactName').html("Please Enter Name"); 
            } else {
                if (!(is_AlphaNumeric(ac_name))) {
                    $('#ErrContactName').html("Please Enter Alpha Numeric Characters Only");
                }
            }
        });
    });
   
var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://www.saralservices.in/app/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
function doConfrim() {
    $('#ErrContactName').html(""); 
   
        var Error=0;                                                                                    
        
        var ac_name = $('#ContactName').val().trim();
        if (ac_name.length==0) {
            $('#ErrContactName').html("Please Enter Name");   
            Error++;      
        } else {
            if (!(is_AlphaNumeric(ac_name))) {
                $('#ErrContactName').html("Please Enter Alpha Numeric Characters Only");
            Error++; 
            }
        }
        
     
    if (Error==0) {
     
      var txt = '<h5 class="modal-title" style="text-align: center;width:100%">Confirmation</h5> <br>'
                    +'<div class="form-group" style="text-align:left;margin-bottom: -12px;">'
                        +'<div class="input-group mt-1">'
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1"  style="padding-left:78px;font-weight:bold;font-size:12px;">Name</span>'
                            +'</div>'
                            +'<input type="text" value="'+$('#ContactName').val()+'" class="form-control" disabled="disabled">'
                        +'</div>'
                 +'</div>'
                 +'<div class="form-group" style="margin-bottom: -14px;">'                
                    +'<div class="input-group">'
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1" style="padding-left:19px;font-weight:bold;font-size:12px">Mobile Number</span>'
                            +'</div>'
                            +'<input type="text" value="'+$('#MobileNumber').val()+'"  name="_MobileNumber" id="_MobileNumber" class="form-control" disabled="disabled">'
                      +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align:left">' 
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="font-weight:bold;font-size:12px;">Mobile Operator</span>'
                        +'</div>'
                        +'<input type="text" value="'+$('#Operator option:selected').text()+'"  name="_Operator" id="_Operator" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-warning" onclick="doSaveContact()">Confirm</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);
        $('#ConfirmationPopup').modal("show");
        return false;
    } else {
     $('#ConfirmationPopup').modal("hide");
     $('#submitRequest').trigger("click");
    }
}
  

function doSaveContact() {
        
    var Cbuttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-danger btn-sm' data-dismiss='modal'>Continue</button>";    
    var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=Settings/AddMyContact\"'>Add Another Contact</button>";
        
        $('#error_MobileNumber').html(""); 
        
        
        var ebnumber = $('#MobileNumber').val();
            if (!(ebnumber.length>5)) {
                $('#error_MobileNumber').html("Invalid Mobile Number");
                Error++;
                return false;
            }
       
       // $("#planDetails").html(loading);
    $("#xconfrimation_text").html(loading);
        
        $.post( "webservice.php?action=savemycontact",  $( "#ContactForm" ).serialize(),function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                  html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://www.saralservices.in/app/assets/accessdenied.png' style='width:128px'><br><br>Failed.<br>"+obj.message;
                  html += "<br>" + Cbuttons;
            } else {
                 html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://www.saralservices.in/app/assets/tick.jpg' style='width:128px'><br><br>your contact saved<br></div>";
                html += "<br>" + buttons;
            }
            $("#xconfrimation_text").html(html);
        });
    }

</script>
          