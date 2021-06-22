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
                                                    <input type="text"  value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "");?>" maxlength="10" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="Mobile Number" style="font-size:16px">
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
                                                    <select id="Operator"  name="Operator" class="form-control" style="font-size:16px">
                                                        <option value="RA" <?php echo $_POST[ 'Operator'] ? " selected='selected' " : "";?>>Airtel</option>
                                                        <option value="RB" <?php echo $_POST[ 'Operator'] ? " selected='selected' " : "";?>>BSNL</option>
                                                        <option value="RI" <?php echo $_POST[ 'Operator'] ? " selected='selected' " : "";?>>Idea</option>
                                                        <option value="RJ" <?php echo $_POST[ 'Operator'] ? " selected='selected' " : "";?>>Jio</option>
                                                        <option value="RV" <?php echo $_POST[ 'Operator'] ? " selected='selected' " : "";?>>Vodafone</option>
                                                    </select>
                                                </div>
                                                <div class="errorstring" id="ErrOperator"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text  btn-sm" id="basic-addon1" style="padding-left: 37px;">DTH Number</span>
                                                    </div>
                                                    <input type="text"  value="<?php echo (isset($_POST['DTHNumber']) ? $_POST['DTHNumber'] : "");?>" name="DTHNumber" id="DTHNumber" class="form-control" placeholder="DTH Number" style="font-size:16px">
                                                </div>
                                                <div class="errorstring" id="ErrErrDTHNumber"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text  btn-sm" id="basic-addon1" style="padding-left: 29px;">DTH Operator</span>
                                                    </div>
                                                   <select id="DTHOperator"  name="DTHOperator" class="form-control" style="font-size: 16px;">
                                                        <option value="0" <?php echo $_POST[ 'DTHOperator'] ? " selected='selected' " : "";?>>Select</option>
                                                        <option value="DA" <?php echo $_POST[ 'DTHOperator'] ? " selected='selected' " : "";?>>Airtel DTH</option>
                                                        <option value="DB" <?php echo $_POST[ 'DTHOperator'] ? " selected='selected' " : "";?>>Big TV</option>
                                                        <option value="DD" <?php echo $_POST[ 'DTHOperator'] ? " selected='selected' " : "";?>>Dish TV</option>
                                                        <option value="DS" <?php echo $_POST[ 'DTHOperator'] ? " selected='selected' " : "";?>>Sun Direct</option>
                                                        <option value="DT" <?php echo $_POST[ 'DTHOperator'] ? " selected='selected' " : "";?>>Tata Sky</option>
                                                        <option value="DV" <?php echo $_POST[ 'DTHOperator'] ? " selected='selected' " : "";?>>Videocon d2h</option>
                                                    </select>
                                                </div>
                                                <div class="errorstring" id="ErrDTHOperator"></div>  
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text  btn-sm" id="basic-addon1" style="padding-left: 53px;">EB Region</span>
                                                    </div>
                                                    <select name="region" id="region" class="form-control">
                                                       <option value="0" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "0") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "0") ? " selected='selected' " : "");?>>Select</option>
                                                       <option value="1" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "1") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "1") ? " selected='selected' " : "");?>>01-Chennai-North</option>
                                                       <option value="2" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "2") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "2") ? " selected='selected' " : "");?>>02-Viluppuram</option>
                                                       <option value="3" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "3") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "3") ? " selected='selected' " : "");?>>03-Coimbatore</option>
                                                       <option value="4" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "4") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "4") ? " selected='selected' " : "");?>>04-Erode</option>
                                                       <option value="5" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "5") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "5") ? " selected='selected' " : "");?>>05-Madurai</option>
                                                       <option value="6" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "6") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "6") ? " selected='selected' " : "");?>>06-Trichy</option>
                                                       <option value="7" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "7") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "7") ? " selected='selected' " : "");?>>07-Tirunelvel</option>
                                                       <option value="8" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "8") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "8") ? " selected='selected' " : "");?>>08-Vellore</option>
                                                       <option value="9" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "9") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "9") ? " selected='selected' " : "");?>>09-chennai-South</option>
                                                    </select>
                                                </div>
                                                <div class="errorstring" id="Errregion"></div> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text  btn-sm" id="basic-addon1" style="padding-left: 47px;">EB Number</span>
                                                    </div>
                                                    <input type="text"  value="<?php echo (isset($_POST['TNEBNumber']) ? $_POST['TNEBNumber'] : "");?>" name="TNEBNumber" id="TNEBNumber" class="form-control" placeholder="TNEB Number" >
                                                </div>
                                                <div class="errorstring" id="ErrTNEBNumber"></div>  
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
function is_tneb_number(tneb) {
    if (tneb.length<7) {
        return false;
    }
    var reg = /^\d+$/
    if (tneb.match(reg)) {
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
        
        $("#MobileNumber").blur(function(){
            $('#ErrMobileNumber').html("");
            var m = $('#MobileNumber').val().trim();
            if (m.length==0) {
                $('#ErrMobileNumber').html("Please Enter Mobile Number");
            } else {
                if (!($('#MobileNumber').val().length==10 && parseInt($('#MobileNumber').val())>6000000000 && parseInt($('#MobileNumber').val())<9999999999)) {
                    $('#ErrMobileNumber').html("Invalid Mobile Number");
                }
            }
        });
        $("#TNEBNumber").blur(function() {
            $('#ErrTNEBNumber').html(""); 
            var ebnumber = $('#TNEBNumber').val().trim();
             if (ebnumber.length>0) {  
                if (!(is_tneb_number(ebnumber))) {
                    $('#ErrTNEBNumber').html("TNEB number is invalid");
                }
             }
        });
        $("#DTHNumber").blur(function() {
            $('#ErrDTHNumber').html(""); 
            var dthnumber = $('#DTHNumber').val().trim();
             if (dthnumber.length>0) {  
                if (!(is_tneb_number(dthnumber))) {
                    $('#ErrDTHNumber').html("DTH number is invalid");
                }
             }
        });
        
    });
   
var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://www.saralservices.in/app/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
function doConfrim() {
    $('#ErrContactName').html(""); 
    $('#ErrMobileNumber').html(""); 
    $('#ErrTNEBNumber').html(""); 
    $('#ErrDTHNumber').html(""); 
   
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
        
        var m = $('#MobileNumber').val().trim();
        if (m.length==0) {
            $('#ErrMobileNumber').html("Please Enter Mobile Number");
           Error++;   
        } else {
            if (!($('#MobileNumber').val().length==10 && parseInt($('#MobileNumber').val())>6000000000 && parseInt($('#MobileNumber').val())<9999999999)) {
                $('#ErrMobileNumber').html("Invalid Mobile Number");
            Error++;           
            }
        }
        var ebnumber = $('#TNEBNumber').val().trim();
        if (ebnumber.length>0) {  
            if (!(is_tneb_number(ebnumber))) {
                $('#ErrTNEBNumber').html("TNEB Number is invalid");
                Error++;  
            }
         }
        var dthnumber = $('#DTHNumber').val().trim();
        if (dthnumber.length>0) {  
            if (!(is_tneb_number(dthnumber))) {
                $('#ErrDTHNumber').html("DTH Number is invalid");
                Error++;       
            }
         }
     
    if (Error==0) {
      var tnebreg = $('#region').val(); 
         if(tnebreg==0){
            tnebregion =""; 
         }else {
             tnebregion = $('#region option:selected').text(); 
         }
         var dthoperator = $('#DTHOperator').val(); 
         if(dthoperator==0){
            dthoperator =""; 
         }else {
             dthoperator = $('#DTHOperator option:selected').text(); 
         }      
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
                +'<div class="form-group" style="margin-bottom: -14px;text-align: left;">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:34px;font-weight:bold;font-size:12px;">DTH Number</span>'
                        +'</div>'    
                        +'<input type="text" value="'+$('#DTHNumber').val()+'"  name="_DTHNumber" id="_DTHNumber" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;text-align: left;">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:26px;font-weight:bold;font-size:12px;">DTH Operator</span>'
                        +'</div>' 
                        +'<input type="text" value="'+dthoperator+'"  name="_DTHOperator" id="_DTHOperator" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group" style="margin-bottom: -14px;">'
                   +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="border: none;padding-left:53px;font-weight:bold;font-size:12px;">EB Region</span>'
                        +'</div>'
                        +'<input type="text" value="'+tnebregion+'" name="_TNEBNumber" id="_TNEBNumber" class="form-control" disabled="disabled">'
                   +'</div>'
                +'</div>'
                +'<div class="form-group" style="text-align: left;">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="padding-left:45px;font-weight:bold;font-size:12px;">EB Number</span>'
                        +'</div>'
                        +'<input type="text" value="'+$('#TNEBNumber').val()+'" name="_TNEBNumber" id="_TNEBNumber" class="form-control" disabled="disabled">'
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
          