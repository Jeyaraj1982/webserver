<?php
$_OPERATOR = "UTNP";
    $data = $mysql->select("select * from _tbl_operators where OperatorCode='".$_OPERATOR."'");
    ?>
<style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px;color:red}
</style>
 
<div style="padding:0px;text-align:center;margin-bottom:20px;">
    <h5><?php echo $data[0]['OperatorTypeCode'];?></h5>
    <h6 style="color:#999">Balance: Rs. <?php echo number_format($application->getBalance($_SESSION['User']['MemberID']),2);?></h6>
</div> 
<div class="row" style="padding-bottom:30px">
    <img src="assets/img/<?php echo $data[0]['IconFile'];?>" style="width:25%;border:1px solid #ccc;border-radius:10px;margin:0px auto">    
</div>
<?php
    
    $enable = true;
    $enable_error = "";
    if ($data[0]['IsActive']!="1") {
        $enable = false;
        $enable_error = $data[0]['InactiveMessage'];
    } 
?>
<?php if ($enable) { ?>
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
 <?php 
  if (isset($_POST['submitRequest'])) {   ?>
     <script>$('#myModal').modal("show");</script>
  <?php  
        if($_POST['DocName']=="VehicleNumber"){
            $chsNumber = "-". $_POST['ChassisNumber'];
        }else {
            $chsNumber ="";
        }
      
        $result = $application->doBillPay(array("MemberID"             => $_SESSION['User']['MemberID'],
                                                "operator"             => $data[0]['OperatorLAPUCode'],
                                                "CustomerMobileNumber" => $_POST['CustomerMobileNumber'],
                                                "particulars"          => $data[0]['OperatorType']." TNEB ".$number,
                                                "number"               => $_POST['DocName']."-".$_POST['DocNumber'].$chsNumber,
                                                "markascredit"         => $_POST['markascredit'],         
                                                "credit_nickname"      => $_POST['credit_nickname'],
                                                "CrAmount"             => $_POST['CrAmount'],
                                                "whatsappRequired"     => $_POST['whatsappRequired']=="on" ? "1" : "0",
                                                "utility_tnpolice"     => array("DocumentType"         => $_POST['DocName'],
                                                                                "DocumentNumber"       => $_POST['DocNumber'],
                                                                                "ChassisNumber"        => $_POST['ChassisNumber'],
                                                                                "VehicleOwnerName"     => $_POST['VehicleOwnerName'],
                                                                                "Amount"               => $_POST['Amount'],
                                                                                "CustomerMobileNumber" => $_POST['MobileNumber'],
                                                                                "MemberID" => $_SESSION['User']['MemberID'],
                                                                                "CreatedOn"            =>date("Y-m-d H:i:s")),
                                                "amount"               => $_POST['Amount']));
        echo "<script>$('#myModal').modal('hide');</script>";
        if ($result['status']=="success" || $result['status']=="requested") { 
            
        ?>
         <div class="row">
                <div style="padding:20px;text-align:center;width:100%;color:#666;line-height:25px;padding-bottom:0px;">
                    <?php echo $result['number']; ?><br>
                    Rs. <?php echo $result['amount']; ?><br>
                </div>
                <div style="padding:20px;text-align:center;width:100%;">
                    Transaction <?php echo  $result['status'];?><br>
                    Trasaction Ref No: <?php echo $result['txnid'];?> <br>
                    Charges : <?php echo number_format($result['charged'],2);?> <br>
                    <?php if ($result['creditnote']==0) { ?>
                    <a href="dashboard.php?action=creditsales_addtxnt&back=txnhistory&txn=<?php echo $result['txnid'];?>" ><i id="icon-arrow" class="bx bxs-pin"></i><br>credit<br>sale</a>     <br>
                    <?php } ?>              
                </div>
                
                <a href="dashboard.php?action=utility_tnpolice" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
            </div>
        <?php } else {?>
           <div class="row">
                <div style="padding:20px;text-align:center;width:100%;color:#666;line-height:25px;padding-bottom:0px;">
                    <?php echo $result['number']; ?><br>
                    Rs. <?php echo $result['amount']; ?><br>
                </div>
                <div style="padding:20px;text-align:center;width:100%;color:red;line-height:25px;">
                    Transaction failed<br>
                    <?php echo $result['message']; ?>
                </div>
                <a href="dashboard.php?action=utility_tnpolice" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a><br><br>
                <a href="dashboard.php" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a>
            </div>
        <?php } ?>
    <?php } else { ?>
           
        <div class="row">
        <div class="col-12">
            <form action="" method="post" style="margin: 0px auto;" id="ContactForm" onsubmit="return doConfrim();">
                <div class="form-group" style="margin-bottom:5px">
                        <select id="DocName"  name="DocName" class="form-control" onchange="chassisshow();">
                            <option value="ChellanNumber" <?php echo $_POST[ 'DocName'] ? " selected='selected' " : "";?>>Chellan No</option>
                            <option value="VehicleNumber" <?php echo $_POST[ 'DocName'] ? " selected='selected' " : "";?>>Vehicle No</option>
                            <option value="DrivingLicense" <?php echo $_POST[ 'DocName'] ? " selected='selected' " : "";?>>Driving License</option>
                        </select>
                </div>
                <div class="form-group" style="margin-bottom:0px">
                    <input type="text"  value="<?php echo (isset($_POST['DocNumber']) ? $_POST['DocNumber'] : "");?>" name="DocNumber" id="DocNumber" class="form-control">
                    <div class="errorstring" id="ErrDocNumber"></div>
                </div>
                <div id="chassis">
                <div class="form-group" id="chassis" style="margin-bottom:0px;">
                    <label>Chassis Number</label>
                    <input type="text"  value="<?php echo (isset($_POST['ChassisNumber']) ? $_POST['ChassisNumber'] : "");?>" name="ChassisNumber" id="ChassisNumber" class="form-control" placeholder="Chassis Number" >
                    <div class="errorstring" id="ErrChassisNumber"></div>
                </div>
                </div>
                <div class="form-group" style="margin-bottom:0px">
                    <label>Vechicle Owner Name</label>
                    <input type="text"  value="<?php echo (isset($_POST['VehicleOwnerName']) ? $_POST['VehicleOwnerName'] : "");?>" name="VehicleOwnerName" id="VehicleOwnerName" class="form-control" placeholder="Vehicle Owner Name" >
                    <div class="errorstring" id="ErrVehicleOwnerName"></div>
                </div>
                <div class="form-group" style="margin-bottom:0px">
                    <label>Amount</label>
                    <input type="number"  value="<?php echo (isset($_POST['Amount']) ? $_POST['Amount'] : "");?>" name="Amount" id="Amount" class="form-control" placeholder="Amount" >
                    <div class="errorstring" id="ErrAmount"></div>
                </div>
                <div class="form-group" style="margin-bottom:0px">
                    <label>Customer Mobile Number</label>
                        <input type="number"  value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "");?>" maxlength="10" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="Mobile Number" >
                    <div class="errorstring" id="ErrMobileNumber"></div>
                </div>
               
                <br>
                <button type="submit" name="submitRequest" id="submitRequest" class="btn btn-success  glow w-100 position-relative">Pay now <i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button><br><br>
                <a href="dashboard.php" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a><br><br>
                <div style="text-align: center;">
                    <a href="dashboard.php?action=txnhistory&operator=<?php echo $_OPERATOR;?>" style="color:#555">Transaction History</a>
                </div>
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
         if($('#Amount').val()<=100)  {
             charge=10;
         }else {
             var subcharge = $('#Amount').val() - 100;
             var count = (parseInt(parseInt(subcharge)/100));
              var suff = ((parseInt(subcharge)%100));
              if (suff>0) {
                  count++;
              }
             
              charge = 10 +( count * 3); 
         }
         
         
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
                    + '<input type="text" value="'+charge+'" name="_AmountCharge" id="_AmountCharge" class="form-control" disabled="disabled">'
                + '</div>'
                 +'<div class="form-group" style="text-align:left">'
                    +'<label>Customer Mobile Number</label>'
                    +'<input type="text" value="'+$('#MobileNumber').val()+'" class="form-control" disabled="disabled">'
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
  

function doSaveutilitytnpolice() {
    IsConfirm=1;
    $("#confrimation_text").html(loading);
    $( "#submitRequest").trigger( "click" );
    }
function chassisshow() {
if($('#DocName').val()=="VehicleNumber") {
  $("#chassis").show();  
}else {
  $("#chassis").hide();    
}
}

</script> 
<?php } ?>
<?php } else { ?>
<div class="row">
    <div style="padding:20px;color:red;text-align:center;width:100%;"><?php echo $enable_error;?></div>
    <a href="dashboard.php?action=landline" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
    <a href="dashboard.php?action=landline" class="btn btn-success  glow w-100 position-relative"><i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;">Back</i></a>
</div>
<?php } ?>