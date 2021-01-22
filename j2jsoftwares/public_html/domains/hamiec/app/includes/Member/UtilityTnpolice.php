<?php 
    $_OPERATOR = "UTNP";
    $data = $mysql->select("select * from _tbl_operators where OperatorCode='".$_OPERATOR."'");
    
    $enable = true;
   // $enable_error = "";
   // if ($data[0]['IsActive']!="1") {
   //     $enable = false;
   //     $enable_error = $data[0]['InactiveMessage'];
   // } 
?>
<?php if ($enable) { ?>
 <style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px}
</style>
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
        
        $("#DocNumber").blur(function() {
            $('#ErrDocNumber').html("");   
               var DocNumber = $('#DocNumber').val().trim();
            if (DocNumber.length==0) {
                $('#ErrDocNumber').html("Please Enter Document Number");   
            }
        });
        /*$("#ChassisNumber").blur(function() {
            $('#ErrChassisNumber').html("");   
               var ChassisNumber = $('#ChassisNumber').val().trim();
            if (ChassisNumber.length==0) {
                $('#ErrChassisNumber').html("Please Enter Chassis Number");   
            }
        });  */
        $("#VehicleOwnerName").blur(function() {
            $('#ErrVehicleOwnerName').html("");   
            var ac_name = $('#VehicleOwnerName').val().trim();
            if (ac_name.length==0) {
                $('#ErrVehicleOwnerName').html("Please Enter Vehicle Name"); 
            } else {
                if (!(is_AlphaNumeric(ac_name))) {
                    $('#ErrVehicleOwnerName').html("Please Enter Alpha Numeric Characters Only");
                }
            }
        });
        $("#Amount").blur(function() {
            $('#ErrAmount').html("");   
             var amt = $('#Amount').val().trim();
                if (amt.length==0) {
                    $('#ErrAmount').html("Please Enter Amount");   
                } else {
                    if (!( parseInt(amt)>=10)) {
                        $('#ErrAmount').html("Please Enter Greater than Rs.10");
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
        chassisshow();
        
    });

</script>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">TN Police</div>
                        </div>
                        <form method="POST" action="" id="ContactForm" onsubmit="return doConfrim();">
                            <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <select id="DocName"  name="DocName" class="form-control" onchange="chassisshow();">
                                                    <option value="ChellanNumber" <?php echo $_POST[ 'DocName'] ? " selected='selected' " : "";?>>Chellan No</option>
                                                    <option value="VehicleNumber" <?php echo $_POST[ 'DocName'] ? " selected='selected' " : "";?>>Vehicle No</option>
                                                    <option value="DrivingLicense" <?php echo $_POST[ 'DocName'] ? " selected='selected' " : "";?>>Driving License</option>
                                                </select>
                                                <div class="errorstring" id="ErrDocName"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                               <input type="text"  value="<?php echo (isset($_POST['DocNumber']) ? $_POST['DocNumber'] : "");?>" name="DocNumber" id="DocNumber" class="form-control">
                                               <div class="errorstring" id="ErrDocNumber"></div>
                                            </div>
                                        </div>
                                        <div id="chassis">
                                            <div class="row" id="chassis">
                                              <div  class="col-lg-12 col-md-12 col-sm-12">
                                                <label>Chassis Number</label>
                                                <input type="text"  value="<?php echo (isset($_POST['ChassisNumber']) ? $_POST['ChassisNumber'] : "");?>" name="ChassisNumber" id="ChassisNumber" class="form-control" placeholder="Chassis Number" >
                                                <div class="errorstring" id="ErrChassisNumber"></div>
                                              </div>
                                            </div>        
                                         </div>
                                         <div class="row">
                                            <div  class="col-lg-12 col-md-12 col-sm-12">
                                                <label>Vechicle Owner Name</label>
                                                <input type="text"  value="<?php echo (isset($_POST['VehicleOwnerName']) ? $_POST['VehicleOwnerName'] : "");?>" name="VehicleOwnerName" id="VehicleOwnerName" class="form-control" placeholder="Vehicle Owner Name" >
                                                <div class="errorstring" id="ErrVehicleOwnerName"></div>
                                            </div>
                                        </div>
                                        <div class="row">     
                                            <div  class="col-lg-12 col-md-12 col-sm-12">
                                                <label>Amount</label>
                                                <input type="number"  value="<?php echo (isset($_POST['Amount']) ? $_POST['Amount'] : "");?>" name="Amount" id="Amount" class="form-control" placeholder="Amount" >
                                                <div class="errorstring" id="ErrAmount"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                             <div  class="col-lg-12 col-md-12 col-sm-12">
                                                 <label>Customer Mobile Number</label>
                                                 <input type="number"  value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "");?>" maxlength="10" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="Mobile Number" >
                                                 <div class="errorstring" id="ErrMobileNumber"></div>
                                             </div>        
                                        </div>
                                        <div class="row">
                                             <div  class="col-lg-12 col-md-12 col-sm-12">
                                                 <div class="checkbox checkbox-danger checkbox-inline">
                                                    <input type="checkbox" class="checkbox-danger" name="whatsappRequired" id="whatsappRequired">
                                                    <label for="whatsappRequired">Require Whatsapp Receipt</label>
                                                </div>
                                             </div>        
                                        </div>   <br>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <button type="submit" class="btn btn-primary  btn-sm"  name="submitRequest">Pay Now</button>
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
var IsConfirm = 0;
var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://www.saralservices.in/app/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
function doConfrim() {
    $('#ErrDocNumber').html(""); 
    $('#ErrChassisNumber').html(""); 
    $('#ErrVehicleOwnerName').html(""); 
    $('#ErrMobileNumber').html(""); 
    $('#ErrAmount').html(""); 
   
        var Error=0;                                                                                    
        
        var DocNumber = $('#DocNumber').val().trim();
        if (DocNumber.length==0) {
            $('#ErrDocNumber').html("Please Enter Document Number");   
            Error++;      
        }
     /*   var ChassisNumber = $('#ChassisNumber').val().trim();
        if (ChassisNumber.length==0) {
            $('#ErrChassisNumber').html("Please Enter Chassis Number");   
            Error++;      
        }      */
        var ac_name = $('#VehicleOwnerName').val().trim();
        if (ac_name.length==0) {
            $('#ErrVehicleOwnerName').html("Please Enter Name");   
            Error++;      
        } else {
            if (!(is_AlphaNumeric(ac_name))) {
                $('#ErrVehicleOwnerName').html("Please Enter Alpha Numeric Characters Only");
            Error++; 
            }
        }
        var amt = $('#Amount').val().trim();
        if (amt.length==0) {
            $('#ErrAmount').html("Please Enter Amount");   
            Error++;      
        } else {
            if (!( parseInt(amt)>=10)) {
                $('#ErrAmount').html("Please Enter Greater than Rs.10");
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
    if (Error>0) {
            return false;
        }    
     
    if (IsConfirm==0) {
         
         
      var txt = '<h5 class="modal-title" style="text-align: center;width:100%">Confirmation</h5> <br>'
                 +'<div class="form-group" style="text-align:left">'
                    +'<input type="text" value="'+$('#DocName option:selected').text()+'" class="form-control" disabled="disabled">'
                 +'</div>'
                 +'<div class="form-group" style="text-align:left">'
                    +'<input type="text" value="'+$('#DocNumber').val()+'" class="form-control" disabled="disabled">'
                 +'</div>'
                 +'<div class="form-group" style="text-align:left">'
                    +'<label>Chassis Number</label>'
                    +'<input type="text" value="'+$('#ChassisNumber').val()+'" class="form-control" disabled="disabled">'
                 +'</div>'
                 +'<div class="form-group" style="text-align:left">'
                    +'<label>Vehicle Owner Name</label>'
                    +'<input type="text" value="'+$('#VehicleOwnerName').val()+'" class="form-control" disabled="disabled">'
                 +'</div>'
                 +'<div class="form-group" style="text-align:left">'
                    +'<label>Amount</label>'
                    +'<input type="text" value="'+$('#Amount').val()+'" class="form-control" disabled="disabled">'
                 +'</div>'
                  + '<div class="form-group"  style="text-align:left;">'
                    + '<label>Charge</label>'
                    + '<input type="text" value="'+ (($('#whatsappRequired').prop("checked") == true) ? "7.00" : "5.00") +'" name="_AmountCharge" id="_AmountCharge" class="form-control" disabled="disabled">'
                + '</div>'
                
                 +'<div class="form-group" style="text-align:left">'
                    +'<label>Customer Mobile Number</label>'
                    
                    +'<div class="input-group mt-1">'
                                +'<input type="number" value="'+$('#MobileNumber').val()+'" name="_MobileNumber" id="_MobileNumber" class="form-control" disabled="disabled">'      
                                +'<div class="input-group-append">'
                                    +'<span class="input-group-text" id="basic-addon1"  style="background:#e8e8e8;font-weight:bold;font-size:12px;">'+ (($('#whatsappRequired').prop("checked") == true) ? "<img src='https://mweb.saralservices.in/assets/whatsapp.png'>" : "") +'</span>'
                                +'</div>'
                            +'</div>'
                 +'</div>'
                 
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-warning" onclick="doSaveutilitytnpolice()">Confirm</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);
        $('#ConfirmationPopup').modal("show");
        return false;
    } else {
     return true;
    }
}
  

/*function doSaveutilitytnpolice() {
    IsConfirm=1;
    $("#confrimation_text").html(loading);
    $( "#submitRequest").trigger( "click" );
    }  */
    
function doSaveutilitytnpolice() {
    IsConfirm=1;
        var Cbuttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-danger btn-sm' data-dismiss='modal'>Close</button>";
        var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-primary btn-sm' onclick='location.href=\"dashboard.php?action=UtilityTnpolice\"'>Continue</button>";
       
    $("#confrimation_text").html(loading);
        
        $.post( "webservice.php?action=Saveutilitytnpolice",  $( "#ContactForm" ).serialize(),function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                  html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://www.saralservices.in/app/assets/accessdenied.png' style='width:128px'><br><br>Failed.<br>"+obj.message;
                  html += "<br>" + Cbuttons;
            } else {
                 html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://www.saralservices.in/app/assets/tick.jpg' style='width:128px'><br><br>"+obj.number+"<br>Rs&nbsp;"+obj.amount+"<br>Transaction&nbsp;"+obj.status+"<br>Trasaction Ref No:&nbsp;"+obj.txnid+"<br>Charges&nbsp;"+obj.charged+"</div>";
                html += "<br>" + buttons;
            }
            $("#confrimation_text").html(html);
          //  $('#ConfirmationPopup').modal("show");
            
        });
    }    

    
function chassisshow() {
if($('#DocName').val()=="VehicleNumber") {
  $("#chassis").show();  
}else {
  $("#chassis").hide();    
}
}

</script>
<?php
}
?>