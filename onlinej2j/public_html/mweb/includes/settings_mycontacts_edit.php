<style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px}
</style>
<div style="padding:0px;text-align:center;margin-bottom:20px;">
    <h5>Edit My Contacts</h5>
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
                    $('#ErrTDTHNumber').html("DTH number is invalid");
                }
             }
        });
        
    });
</script>
<?php $mycontacts = $mysql->select("select * from _tbl_my_contact where ContactID='".$_GET['cid']."'");?> 
    
           
        <div class="row">
            <form action="" method="post" style="width: 80%;margin: 0px auto;" id="ContactForm" onsubmit="return checkInputs();">
            <input type="text"  value="<?php echo $mycontacts[0]['ContactID'];?>" name="ContactID" id="ContactID" style="display:none">
                <div class="form-group" style="margin-bottom:0px">
                    <div class="input-group mt-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"  style="padding-left:65px;font-weight:bold;font-size:12px;">Name</span>
                        </div>
                        <input type="text"  value="<?php echo (isset($_POST['ContactName']) ? $_POST['ContactName'] : $mycontacts[0]['ContactName']);?>" name="ContactName" id="ContactName" class="form-control" placeholder="Contact Name" required>
                    </div>
                    <div class="errorstring" id="ErrContactName"></div>
                </div>
                <div class="form-group" style="margin-bottom:0px">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="padding-left:11px;font-weight:bold;font-size:12px;">Mobile Number</span>
                        </div>
                        <input type="text"  value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $mycontacts[0]['MobileNumber']);?>" maxlength="10" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="Mobile Number" required>
                    </div>
                    <div class="errorstring" id="ErrMobileNumber"></div>
                </div>
                <div class="form-group" style="margin-bottom:0px">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"  style="padding-left:5px;font-weight:bold;font-size:12px;">Mobile Operator</span>
                        </div>
                        <select id="Operator"  name="Operator" class="form-control">
                            <option value="RA" <?php echo (isset($_POST[ 'Operator'])) ? (($_POST[ 'Operator']== "RA") ? " selected='selected' " : "") : (($mycontacts[0][ 'MobileOperator']== "RA") ? " selected='selected' " : "");?>>Airtel</option>
                            <option value="RB" <?php echo (isset($_POST[ 'Operator'])) ? (($_POST[ 'Operator']== "RB") ? " selected='selected' " : "") : (($mycontacts[0][ 'MobileOperator']== "RB") ? " selected='selected' " : "");?>>BSNL</option>
                            <option value="RI" <?php echo (isset($_POST[ 'Operator'])) ? (($_POST[ 'Operator']== "RI") ? " selected='selected' " : "") : (($mycontacts[0][ 'MobileOperator']== "RI") ? " selected='selected' " : "");?>>Idea</option>
                            <option value="RJ" <?php echo (isset($_POST[ 'Operator'])) ? (($_POST[ 'Operator']== "RJ") ? " selected='selected' " : "") : (($mycontacts[0][ 'MobileOperator']== "RJ") ? " selected='selected' " : "");?>>Jio</option>
                            <option value="RV" <?php echo (isset($_POST[ 'Operator'])) ? (($_POST[ 'Operator']== "RV") ? " selected='selected' " : "") : (($mycontacts[0][ 'MobileOperator']== "RV") ? " selected='selected' " : "");?>>Vodafone</option>
                        </select>
                    </div>    
                    <div class="errorstring" id="ErrOperator"></div>  
                </div>
                <div class="form-group" style="margin-bottom:0px">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="padding-left:25px;font-weight:bold;font-size:12px;">DTH Number</span>
                        </div>
                        <input type="text"  value="<?php echo (isset($_POST['DTHNumber']) ? $_POST['DTHNumber'] : $mycontacts[0]['DTHNumber']);?>" name="DTHNumber" id="DTHNumber" class="form-control" placeholder="DTH Number" >
                    </div>
                    <div class="errorstring" id="Errdthnumber"></div>
                </div>
                <div class="form-group" style="margin-bottom:0px">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"  style="padding-left:20px;font-weight:bold;font-size:12px;">DTH Operator</span>
                        </div>
                        <select id="DTHOperator"  name="DTHOperator" class="form-control">
                            <option value="0" <?php echo (isset($_POST[ 'DTHOperator'])) ? (($_POST[ 'DTHOperator']== "0") ? " selected='selected' " : "") : (($mycontacts[0][ 'DTHOperator']== "0") ? " selected='selected' " : "");?>>Select</option>
                            <option value="DA" <?php echo (isset($_POST[ 'DTHOperator'])) ? (($_POST[ 'DTHOperator']== "DA") ? " selected='selected' " : "") : (($mycontacts[0][ 'DTHOperator']== "DA") ? " selected='selected' " : "");?>>Airtel DTH</option>
                            <option value="DB" <?php echo (isset($_POST[ 'DTHOperator'])) ? (($_POST[ 'DTHOperator']== "DB") ? " selected='selected' " : "") : (($mycontacts[0][ 'DTHOperator']== "DB") ? " selected='selected' " : "");?>>Big TV</option>
                            <option value="DD" <?php echo (isset($_POST[ 'DTHOperator'])) ? (($_POST[ 'DTHOperator']== "DD") ? " selected='selected' " : "") : (($mycontacts[0][ 'DTHOperator']== "DD") ? " selected='selected' " : "");?>>Dish TV</option>
                            <option value="DS" <?php echo (isset($_POST[ 'DTHOperator'])) ? (($_POST[ 'DTHOperator']== "DS") ? " selected='selected' " : "") : (($mycontacts[0][ 'DTHOperator']== "DS") ? " selected='selected' " : "");?>>Sun Direct</option>
                            <option value="DT" <?php echo (isset($_POST[ 'DTHOperator'])) ? (($_POST[ 'DTHOperator']== "DI") ? " selected='selected' " : "") : (($mycontacts[0][ 'DTHOperator']== "DI") ? " selected='selected' " : "");?>>Tata Sky</option>
                            <option value="DV" <?php echo (isset($_POST[ 'DTHOperator'])) ? (($_POST[ 'DTHOperator']== "DV") ? " selected='selected' " : "") : (($mycontacts[0][ 'DTHOperator']== "DV") ? " selected='selected' " : "");?>>Videocon d2h</option>
                        </select>
                    </div>       
                    <div class="errorstring" id="ErrDTHOperator"></div> 
                </div>
                <div class="form-group" style="margin-bottom:0px">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"  style="padding-left:41px;font-weight:bold;font-size:12px;">EB Region</span>
                        </div>
                        <select name="region" id="region" class="form-control">
                           <option value="0" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "0") ? " selected='selected' " : "") : (($mycontacts[0][ 'TNEBRegion']== "0") ? " selected='selected' " : "");?>>Select</option>
                           <option value="1" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "1") ? " selected='selected' " : "") : (($mycontacts[0][ 'TNEBRegion']== "1") ? " selected='selected' " : "");?>>01-Chennai-North</option>
                           <option value="2" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "2") ? " selected='selected' " : "") : (($mycontacts[0][ 'TNEBRegion']== "2") ? " selected='selected' " : "");?>>02-Viluppuram</option>
                           <option value="3" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "3") ? " selected='selected' " : "") : (($mycontacts[0][ 'TNEBRegion']== "3") ? " selected='selected' " : "");?>>03-Coimbatore</option>
                           <option value="4" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "4") ? " selected='selected' " : "") : (($mycontacts[0][ 'TNEBRegion']== "4") ? " selected='selected' " : "");?>>04-Erode</option>
                           <option value="5" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "5") ? " selected='selected' " : "") : (($mycontacts[0][ 'TNEBRegion']== "5") ? " selected='selected' " : "");?>>05-Madurai</option>
                           <option value="6" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "6") ? " selected='selected' " : "") : (($mycontacts[0][ 'TNEBRegion']== "6") ? " selected='selected' " : "");?>>06-Trichy</option>
                           <option value="7" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "7") ? " selected='selected' " : "") : (($mycontacts[0][ 'TNEBRegion']== "7") ? " selected='selected' " : "");?>>07-Tirunelvel</option>
                           <option value="8" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "8") ? " selected='selected' " : "") : (($mycontacts[0][ 'TNEBRegion']== "8") ? " selected='selected' " : "");?>>08-Vellore</option>
                           <option value="9" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "9") ? " selected='selected' " : "") : (($mycontacts[0][ 'TNEBRegion']== "9") ? " selected='selected' " : "");?>>09-chennai-South</option>
                        </select>
                    </div>
                    <div class="errorstring" id="Errregion"></div>
                </div>
                <div class="form-group" style="margin-bottom:0px">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"  style="padding-left:34px;font-weight:bold;font-size:12px;">EB Number</span>
                        </div>
                        <input type="text"  value="<?php echo (isset($_POST['TNEBNumber']) ? $_POST['TNEBNumber'] : $mycontacts[0]['TNEBNumber']);?>" maxlength="10" name="TNEBNumber" id="TNEBNumber" class="form-control" placeholder="TNEB Number" >
                    </div>
                    <div class="errorstring" id="ErrTNEBNumber"></div>
                </div>
                <br>
                <button type="button" name="submitRequest" onclick="doConfrim()" class="btn btn-success  glow w-100 position-relative">Update Contact<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button><br><br>
                <a href="dashboard.php?action=settings_manage_mycontacts" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a><br><br>
            </form>         
        </div>
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                    +'<div class="form-group">'
                        +'<div class="input-group mt-1">'
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1"  style="border: none;padding-left:73px;font-weight:bold;font-size:12px;">Name</span>'
                            +'</div>'
                            +'<input type="text" value="'+$('#ContactName').val()+'" class="form-control" disabled="disabled">'
                        +'</div>'
                 +'</div>'
                 +'<div class="form-group">'                
                    +'<div class="input-group">'
                            +'<div class="input-group-prepend">'
                                +'<span class="input-group-text" id="basic-addon1" style="border: none;padding-left:19px;font-weight:bold;font-size:12px;">Mobile Number</span>'
                            +'</div>'
                            +'<input type="text" value="'+$('#MobileNumber').val()+'"  name="_MobileNumber" id="_MobileNumber" class="form-control" disabled="disabled">'
                      +'</div>'
                +'</div>'
                +'<div class="form-group">' 
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="border: none;font-weight:bold;font-size:12px;">Mobile Operator</span>'
                        +'</div>'
                        +'<input type="text" value="'+$('#Operator option:selected').text()+'"  name="_Operator" id="_Operator" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="border: none;padding-left:33px;font-weight:bold;font-size:12px;">DTH Number</span>'
                        +'</div>'    
                        +'<input type="text" value="'+$('#DTHNumber').val()+'"  name="_DTHNumber" id="_DTHNumber" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="border: none;padding-left:25px;font-weight:bold;font-size:12px;">DTH Operator</span>'
                        +'</div>' 
                        +'<input type="text" value="'+dthoperator+'"  name="_DTHOperator" id="_DTHOperator" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="border: none;border: none;padding-left:42px;font-weight:bold;font-size:12px;">EB Region</span>'
                        +'</div>'
                        +'<input type="text" value="'+tnebregion+'" name="_TNEBNumber" id="_TNEBNumber" class="form-control" disabled="disabled">'
                    +'</div>'
                +'</div>'
                +'<div class="form-group">'
                    +'<div class="input-group mt-1">'
                        +'<div class="input-group-prepend">'
                            +'<span class="input-group-text" id="basic-addon1"  style="border: none;padding-left:42px;font-weight:bold;font-size:12px;">EB Number</span>'
                        +'</div>'
                        +'<input type="text" value="'+$('#TNEBNumber').val()+'" name="_TNEBNumber" id="_TNEBNumber" class="form-control" disabled="disabled">'
                    +'</div>' 
                +'</div>' 
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-warning" onclick="doUpdateContact()">Confirm</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);
        $('#ConfirmationPopup').modal("show");
        return false;
    } else {
     $('#ConfirmationPopup').modal("hide");
     $('#submitRequest').trigger("click");
    }
}
  

function doUpdateContact() {
        
       
        
        $('#error_MobileNumber').html(""); 
        
        
        var ebnumber = $('#MobileNumber').val();
            if (!(ebnumber.length>5)) {
                $('#error_MobileNumber').html("Invalid Mobile Number");
                Error++;
                return false;
            }
       
       // $("#planDetails").html(loading);
    $("#xconfrimation_text").html(loading);
         var Cbuttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-danger btn-sm' data-dismiss='modal'>Continue</button>";
        $.post( "webservice.php?action=updatemycontact",  $( "#ContactForm" ).serialize(),function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                  html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://www.saralservices.in/app/assets/accessdenied.png' style='width:128px'><br><br>Failed.<br>"+obj.message;
                  html += "<br>" + Cbuttons;
            } else {
                 html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://www.saralservices.in/app/assets/tick.jpg' style='width:128px'><br><br>Your contact updated<br></div>";
                html += "<br>"; 
                html += "<div style='text-align:center;padding:10px;'><a href='dashboard.php?action=settings_mycontacts_edit&cid="+obj.cid+"' class='btn btn-danger btn-sm' >Continue</a>";
            }
            $("#xconfrimation_text").html(html);
        });
    }

</script>