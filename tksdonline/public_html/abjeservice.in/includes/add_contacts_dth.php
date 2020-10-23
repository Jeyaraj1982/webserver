<style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px;color:red}
</style>
<?php 
    $sql = $mysql->select("select * from `_tbl_transactions` where `txnid`='".$_GET['id']."'");    
?>
<div style="padding:0px;text-align:center;">
    <h5>Add Contacts</h5>
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

</script> 
    
           
        <div class="row">
        <div class="col-12">
            <form action="" method="post" style="margin: 0px auto;" id="ContactForm" onsubmit="return checkInputs();">
                <div class="form-group" style="margin-bottom:0px">
                    <div class="input-group mt-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"  style="padding-left:65px;font-weight:bold;font-size:12px;">Name</span>
                        </div>
                        <input type="text"  value="<?php echo (isset($_POST['ContactName']) ? $_POST['ContactName'] : "");?>" name="ContactName" id="ContactName" class="form-control" placeholder="Contact Name" required>
                    </div>
                    <div class="errorstring" id="ErrContactName"></div>
                </div>
                <div class="form-group" style="margin-bottom:0px">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="padding-left:25px;font-weight:bold;font-size:12px;">DTH Number</span>
                        </div>
                        <input type="text" readonly="readonly" value="<?php echo $sql[0]['rcnumber'];?>" name="DTHNumber" id="DTHNumber" class="form-control" placeholder="DTH Number" >
                    </div>
                    <div class="errorstring" id="Errdthnumber"></div>
                </div>
                <div class="form-group" style="margin-bottom:0px">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"  style="padding-left:20px;font-weight:bold;font-size:12px;">DTH Operator</span>
                        </div>
                        <select id="DTHOperator" readonly  name="DTHOperator" class="form-control">
                            <option value="0" <?php echo (isset($_POST[ 'DTHOperator'])) ? (($_POST[ 'DTHOperator']== "0") ? " selected='selected' " : "") : (($sql[0]['operatorcode']== "0") ? " selected='selected' " : "");?>>Select</option>
                            <option value="DA" <?php echo (isset($_POST[ 'DTHOperator'])) ? (($_POST[ 'DTHOperator']== "DA") ? " selected='selected' " : "") : (($sql[0]['operatorcode']== "DA") ? " selected='selected' " : "");?>>Airtel DTH</option>
                            <option value="DB" <?php echo (isset($_POST[ 'DTHOperator'])) ? (($_POST[ 'DTHOperator']== "DB") ? " selected='selected' " : "") : (($sql[0]['operatorcode']== "DB") ? " selected='selected' " : "");?>>Big TV</option>
                            <option value="DD" <?php echo (isset($_POST[ 'DTHOperator'])) ? (($_POST[ 'DTHOperator']== "DD") ? " selected='selected' " : "") : (($sql[0]['operatorcode']== "DD") ? " selected='selected' " : "");?>>Dish TV</option>
                            <option value="DS" <?php echo (isset($_POST[ 'DTHOperator'])) ? (($_POST[ 'DTHOperator']== "DS") ? " selected='selected' " : "") : (($sql[0]['operatorcode']== "DS") ? " selected='selected' " : "");?>>Sun Direct</option>
                            <option value="DT" <?php echo (isset($_POST[ 'DTHOperator'])) ? (($_POST[ 'DTHOperator']== "DT") ? " selected='selected' " : "") : (($sql[0]['operatorcode']== "DT") ? " selected='selected' " : "");?>>Tata Sky</option>
                            <option value="DV" <?php echo (isset($_POST[ 'DTHOperator'])) ? (($_POST[ 'DTHOperator']== "DV") ? " selected='selected' " : "") : (($sql[0]['operatorcode']== "DV") ? " selected='selected' " : "");?>>Videocon d2h</option>
                        </select>
                    </div>       
                    <div class="errorstring" id="ErrDTHOperator"></div> 
                </div>
                
                <br>
                <button type="button" name="submitRequest" onclick="doConfrim()" class="btn btn-success  glow w-100 position-relative">Save Contact<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button><br><br>
                <a href="dashboard.php?action=settings_manage_mycontacts" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a><br><br>
            </form>         
        </div>
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
        var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-primary btn-sm' onclick='location.href=\"dashboard.php?action=settings_manage_mycontacts\"'>Close</button>&nbsp;&nbsp;<button type='button' class='btn btn-success btn-sm' onclick='location.href=\"dashboard.php?action=settings_add_mycontacts\"'>Add Another</button>";
        
        $('#error_MobileNumber').html(""); 
        
    $("#xconfrimation_text").html(loading);                                                                                                                                                               
        
        $.post( "webservice.php?action=savemycontact_dth",  $( "#ContactForm" ).serialize(),function( data ) {
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