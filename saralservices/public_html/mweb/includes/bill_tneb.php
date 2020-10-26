<?php
    $_OPERATOR = "ET";
    $data = $mysql->select("select * from _tbl_operators where OperatorCode='".$_OPERATOR."'");
    $enable = true;
    $enable_error = "";
    $t = $mysql->select("select * from _tbl_member_operator where MemberID='".$_SESSION['User']['MemberID']."' and OperatorCode='".$_OPERATOR."'");
    if (sizeof($t)>0) {
        $enable = false;
        $enable_error = "In your account, Operator was disabled. to enable please contact support team";
    } else {
        if ($data[0]['IsActive']!="1") {
            $enable = false;
            $enable_error = $data[0]['InactiveMessage'];
        } 
    }
    $enable=true;
    $mem = $mysql->select("select * from _tbl_Members where MemberID='".$_SESSION['User']['MemberID']."'");
?>
<style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px}
</style>
<div class="container" style="margin-top:0px !important;padding:0px">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="background: none;">
                    <div class="card-header">
                        <div class="card-title" style="text-align: center;">TNEB</div>
                    </div>
                    <?php if ($enable) { ?>
                
                            <?php   { ?> 
                            <div class="card-body" style="padding:0px;">
                                <form action="" method="post" id="frm_tneb" onsubmit="return checkInputs();">
                                    <div class="row" style="margin-bottom:0px;">
                                        <div class="input-group">
                                            <select name="region" id="region" class="form-control">
                                               <?php if(isset($_GET['region'])){ ?>     
                                                   <option value="1" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "1") ? " selected='selected' " : "") : (($_GET['region']== "1") ? " selected='selected' " : "");?>>01-Chennai-North</option>
                                                   <option value="2" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "2") ? " selected='selected' " : "") : (($_GET['region']== "2") ? " selected='selected' " : "");?>>02-Viluppuram</option>
                                                   <option value="3" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "3") ? " selected='selected' " : "") : (($_GET['region']== "3") ? " selected='selected' " : "");?>>03-Coimbatore</option>
                                                   <option value="4" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "4") ? " selected='selected' " : "") : (($_GET['region']== "4") ? " selected='selected' " : "");?>>04-Erode</option>
                                                   <option value="5" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "5") ? " selected='selected' " : "") : (($_GET['region']== "5") ? " selected='selected' " : "");?>>05-Madurai</option>
                                                   <option value="6" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "6") ? " selected='selected' " : "") : (($_GET['region']== "6") ? " selected='selected' " : "");?>>06-Trichy</option>
                                                   <option value="7" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "7") ? " selected='selected' " : "") : (($_GET['region']== "7") ? " selected='selected' " : "");?>>07-Tirunelveli</option>
                                                   <option value="8" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "8") ? " selected='selected' " : "") : (($_GET['region']== "8") ? " selected='selected' " : "");?>>08-Vellore</option>
                                                   <option value="9" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "9") ? " selected='selected' " : "") : (($_GET['region']== "9") ? " selected='selected' " : "");?>>09-chennai-South</option>
                                                <?php } else {?>
                                                    <option value="1" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "1") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "1") ? " selected='selected' " : "");?>>01-Chennai-North</option>
                                                   <option value="2" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "2") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "2") ? " selected='selected' " : "");?>>02-Viluppuram</option>
                                                   <option value="3" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "3") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "3") ? " selected='selected' " : "");?>>03-Coimbatore</option>
                                                   <option value="4" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "4") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "4") ? " selected='selected' " : "");?>>04-Erode</option>
                                                   <option value="5" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "5") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "5") ? " selected='selected' " : "");?>>05-Madurai</option>
                                                   <option value="6" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "6") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "6") ? " selected='selected' " : "");?>>06-Trichy</option>
                                                   <option value="7" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "7") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "7") ? " selected='selected' " : "");?>>07-Tirunelveli</option>
                                                   <option value="8" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "8") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "8") ? " selected='selected' " : "");?>>08-Vellore</option>
                                                   <option value="9" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "9") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "9") ? " selected='selected' " : "");?>>09-chennai-South</option>
                                                <?php } ?>
                                            </select>
                                            <div class="input-group-append" id="viewUser">
                                                <span class="input-group-text" onclick="GetTNEBUsers()" id="basic-addon1" style="border: none;background:#fff;color:#1572E8 "><i class="icon-user"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom:0px;margin-top:10px">
                                        <div class="input-group">
                                            <?php 
                                                if(isset($_GET['ebnumber']))  {
                                                    $ebnumber=$_GET['ebnumber'];
                                                } else {
                                                    $ebnumber ="";
                                                }
                                            ?>
                                            <input type="number" onblur="getDetails()"  value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $ebnumber;?>" maxlength="15" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="TNEB Number" style="border-right:0px"> 
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="progress_icon" style="background:#fff;" ></span>
                                            </div>
                                        </div>
                                        <div class="errorstring" id="ErrTNEBNumber"></div> 
                                        <div id="result_div" style="width:100%;">
                                        
                                    </div> 
                                    </div>
                                    <div class="row" style="margin-bottom:0px;">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1" style="padding-left:48px;font-weight:bold">INR</span>
                                            </div>
                                            <input type="number"  value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" maxlength="10" name="Amount" id="Amount" class="form-control" placeholder="Amount" >
                                        </div>
                                        <div class="errorstring" id="ErrAmount"></div>
                                           
                                    </div> 
                                    <div class="row" style="margin-bottom:0px;">
                                        <div class="input-group" >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1" style="padding-left:48px;font-weight:bold">+91</span>
                                            </div>
                                            <input type="number"  value="<?php echo isset($_POST['CustomerMobileNumber']) ? $_POST['CustomerMobileNumber'] : "";?>" maxlength="10" name="CustomerMobileNumber" id="CustomerMobileNumber" class="form-control" placeholder="Customer MobileNumber" >
                                        </div>
                                        <div class="errorstring" id="ErrCustomerMobileNumber"></div>
                                    </div>
                                    <div class="row">
                                        <div class="checkbox checkbox-danger checkbox-inline">
                                            <input type="checkbox" class="checkbox-danger" name="whatsappRequired" id="whatsappRequired">
                                            <label for="whatsappRequired">Require Whatsapp Receipt</label>
                                        </div>
                                    </div>
                                   <!-- <div class="row">
                                        <div class="checkbox checkbox-success checkbox-inline">
                                            <input type="checkbox" class="checkbox-primary" onclick="do_markascredit()" name="markascredit" id="markascredit">
                                            <label for="markascredit">Mark as credit</label>
                                        </div>
                                        <input type="text" class="form-control" value="" name="credit_nickname" id="credit_nickname" placeholder="Nick Name" style="display: none;margin-top:10px;">
                                        <input type="number" class="form-control" value="" name="CrAmount" id="CrAmount" placeholder="Credit Amount" style="display: none;margin-top:10px;">
                                    </div>  -->                
                                    <?php if(isset($error)){?>
                                    <div class="row" style="margin-bottom:0px;">
                                        <p align="center" style="color:red" id="error_msg">&nbsp;<?php echo $error;?></p>
                                    </div>
                                    <?php } ?>
                                    <div class="row" style="margin-top:10px;margin-bottom:10px;">
                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0px;">
                                            <button type="button" class="btn btn-black" onclick="location.href='dashboard.php';" style="background:#6c757d !important;width: 46%;">Back</button>
                                            <button type="submit" class="btn btn-danger" name="submitRequest" style="width: 46%;float:right">Pay now</button>
                                        </div>                                        
                                    </div>
                                    
                                    <div class="col-12" style="margin-top:10px;text-align:center">
                                        <a href="dashboard.php?action=txnhistory&operator=<?php echo $_OPERATOR;?>">Transaction History</a>
                                    </div>
                                      
                                </form>         
                            </div>
                           <?php } ?>
                            <?php } else { ?>
                            <div class="row">
                                <?php if(isset($enable_error)){?>
                                <div style="padding:20px;color:red;text-align:center;width:100%;"><?php echo $enable_error;?></div>
                                <?php } ?>
                                <a href="dashboard.php" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
                                <a href="dashboard.php" class="btn btn-success  glow w-100 position-relative"><i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;">Back</i></a>
                            </div>
                            <?php } ?>
                        </div>
                   </div>
                </div>
          </div>
        </div>
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
var process_icon_sm = "<img src='https://mweb.saralservices.in/assets/hloading.gif' style='height:25px;float:right'>";
function getDetails() {
    $('#result_div').css({"margin-bottom":"0px"});
    $('#result_div').html("");
    if ($('#MobileNumber').val().length>7){
        $('#ErrAmount').html("");
        $('#Amount').val("");
        $('#progress_icon').html(process_icon_sm);
        $.post( "webservice.php?action=getTNEBDetails",$("#frm_tneb").serialize(),function( data ) {
            var obj = JSON.parse(data); 
            if (obj.error=="0") {
                var resHtml= '<div style="background:#fcfcfc;border-radius:5px;padding:10px 15px"><div class="row"><div class="col-3" style="font-size:12px;">Name</div><div class="col-9" style="font-size:12px;">: '+obj.billerName+'</div><div class="col-3" style="font-size:12px;">Amount</div><div class="col-9" style="font-size:12px;">: '+obj.billAmount+'</div><div class="col-3"  style="font-size:12px;padding-right:0px">Bill Date</div><div class="col-9" style="font-size:12px;">: '+obj.billDate+'</div><div class="col-3" style="font-size:12px;padding-right:0px">Due Date</div><div class="col-9" style="font-size:12px;">: '+obj.dueDate+'</div></div></div>';   
                $('#result_div').css({"margin-bottom":"10px"});
                $('#result_div').html(resHtml);
                $('#Amount').val(obj.billAmount);
            } else {
                var resHtml= '<div style="background:#f9f8e8;border-radius:5px;padding:10px 15px"><div class="row"><div class="col-12" style="font-size:12px;">'+obj.errMsg+'</div></div></div>';   
                $('#result_div').html(resHtml);
                 $('#result_div').css({"margin-bottom":"10px"});
            }
            $('#progress_icon').html("");
        });
    }
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
         $("#MobileNumber").blur(function() {
            $('#ErrTNEBNumber').html("");   
            var ebnumber = $('#MobileNumber').val().trim();
            if (ebnumber.length==0) {
                $('#ErrTNEBNumber').html("Please Enter TNEB Number"); 
            } else {
                if (!(is_tneb_number(ebnumber))) {
                    $('#ErrTNEBNumber').html("TNEB number is invalid");
                }
            }
        });
        
        $("#Amount").blur(function() {
            $('#ErrAmount').html("");
            var amt = $('#Amount').val().trim();
            if (amt.length==0) {
                $('#ErrAmount').html("Please enter Amount");
            } else {
                if (!(parseFloat(amt)>=10 && parseFloat(amt)<=7000)) {
                    $('#ErrAmount').html("Amount must have greater than Rs. 10");
                }
            }
        });
        $("#CustomerMobileNumber").blur(function(){
            $('#ErrCustomerMobileNumber').html("");
            var m = $('#CustomerMobileNumber').val().trim();
            if (m.length==0) {
                $('#ErrCustomerMobileNumber').html("Please Enter mobile Number");
            } else {
                if (!($('#CustomerMobileNumber').val().length==10 && parseInt($('#CustomerMobileNumber').val())>6000000000 && parseInt($('#CustomerMobileNumber').val())<9999999999)) {
                    $('#ErrCustomerMobileNumber').html("Invalid Mobile Number");
                }
            }
        });
    });

function checkInputs() {
        
        $('#ErrTNEBNumber').html(""); 
        $('#ErrAmount').html(""); 
        $('#ErrCustomerMobileNumber').html(""); 
        
        var error=0;                                                                                    
        
       
        
        var ebnumber = $('#MobileNumber').val().trim();
        if (ebnumber.length==0) {
            $('#ErrTNEBNumber').html("Please Enter TNEB Number"); 
             error++;
        } else {
            if (!(is_tneb_number(ebnumber))) {
                $('#ErrTNEBNumber').html("Invalid TNEB Number");
                error++;
            }
        }
        
        var amt = $('#Amount').val().trim();
         if (amt.length==0) {
            $('#ErrAmount').html("Please enter Amount");
             error++;
        } else {
        if (!(parseFloat(amt)>=10 && parseFloat(amt)<=7000)) {
            $('#ErrAmount').html("Amount must have greater than Rs. 10");
             error++;
        }
        }
        
        var m = $('#CustomerMobileNumber').val().trim();
        if (m.length==0) {
            $('#ErrCustomerMobileNumber').html("Please Enter mobile Number");
            error++;
        } else {
            if (!($('#CustomerMobileNumber').val().length==10 && parseInt($('#CustomerMobileNumber').val())>6000000000 && parseInt($('#CustomerMobileNumber').val())<9999999999)) {
                $('#ErrCustomerMobileNumber').html("Invalid Mobile Number");
                error++;
            }
        }
        
   
        if($('#markascredit').prop("checked") == true) {
        
            var nick_name = $('#credit_nickname').val();
            if (!(nick_name.length>=3)) {
                $('#error_msg').html("Invalid customer nick name");
                return false;
            }
            
            var camount = parseFloat($('#CrAmount').val());
            if (!(camount>0)) {
                $('#error_msg').html("Credit amount must have greater than Rs. 0.00");
                return false;
            }
            
            if (!(camount<=amount)) {
                $('#error_msg').html("Credit amount must have lessthan bill amount");
                return false;
            }
        } 
        
        if (error>0) {
            return false;
        }

        if (IsConfirm==0) {
            var txt = '<div class="form-group" style="margin-bottom: -14px;">'                
                            +'<div class="input-group mt-1">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1"  style="padding-left:11px;font-weight:bold;font-size:12px;">EB Number</span>'
                                +'</div>'
                                +'<input type="text" value="'+$('#region').val()+'-'+$('#MobileNumber').val()+'" class="form-control" disabled="disabled">'
                            + '</div>'
                        +'</div>'
                        +'<div class="form-group" style="margin-bottom: -14px;">'
                            +'<div class="input-group">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="padding-left:57px;font-weight:bold;font-size:12px;">INR</span>'
                                +'</div>'
                                +'<input type="number"  value="'+$('#Amount').val()+'" name="_Amount" id="_Amount" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group" style="margin-bottom: -12px;"> '
                            +'<div class="input-group mt-1">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1"  style="padding-left:56px;font-weight:bold;font-size:12px;">+91</span>'
                                +'</div>'
                                +'<input type="number" value="'+$('#CustomerMobileNumber').val()+'" name="_CustomerMobileNumber" id="_CustomerMobileNumber" class="form-control" disabled="disabled">'      
                                +'<div class="input-group-append">'
                                    +'<span class="input-group-text" id="basic-addon1"  style="background:#e8e8e8;font-weight:bold;font-size:12px;">'+ (($('#whatsappRequired').prop("checked") == true) ? "<img src='https://mweb.saralservices.in/assets/whatsapp.png'>" : "") +'</span>'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                        + '<div class="form-group" style="margin-bottom: -12px;"> '
                            +'<div class="input-group mt-1">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1"  style="padding-left:36px;font-weight:bold;font-size:12px;">Charge</span>'
                                +'</div>'
                                +'<input type="number" value="'+ (($('#whatsappRequired').prop("checked") == true) ? "10.00" : "8.00") +'" name="_CustomerMobileNumber" id="_CustomerMobileNumber" class="form-control" disabled="disabled">'
                            +'</div>'
                        + '</div>';
             $('#xconfrimation_text').html(txt); 
             $('#ConfirmationPopup').modal("show");
             return false;
        } else {
            return true;
        }
}

function doConfrim() {
    $("#confrimation_text").html(loading);
    var buttons = "";
    
    $.post( "webservice.php?action=PayEBBill",  $( "#frm_tneb" ).serialize(),function( data ) {
        var obj = JSON.parse(data); 
        var html = "";
        if (obj.status=="failure") {
            buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-secondary btn-sm' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=bill_tneb\"'>Next Bill</button></div>";
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://www.saralservices.in/app/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
            if (parseFloat(obj.balance)>=0) {
                html += "<br>Balance Amount: "+obj.balance
            }
            html += "</div>" +buttons;
            $('#balance_div').html("Rs. "+obj.balance);
        } else {
            buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-secondary btn-sm' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=bill_tneb\"'>Next Bill</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=my_contacts_add_tneb&id="+obj.txnid+"\"'>Save Contact</button></div>";    
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://www.saralservices.in/app/assets/tick.jpg' style='width:128px'><br><br>Request Submitted<br>TNEB Number: "+obj.number+"<br>Amount: "+obj.amount+"<br>Txn ID: "+obj.txnid+"<br>Charges ID: "+obj.charged+"<br>Balance Amount: "+obj.balance+"</div>";
            html += "<br>" + buttons;
            $('#balance_div').html("Rs. "+obj.balance);
        }
        $("#confrimation_text").html(html);
    });
}  
<?php if(isset($_GET['ebnumber'])) {   ?>
 $(document).ready(function(){
    getDetails();
 });
 
 <?php } ?>
 function GetTNEBUsers() {
         $("#confrimation_text").html(loading);
         $.ajax({url:'webservice.php?action=GetTNEBUsers&rand=<?php echo rand(3000,900000);?>',async:true,crossDomain:true,success:function(data){
            $('#confrimation_text').html(data);
            $('#ConfirmationPopup').modal("show");
         }});
    }   
    
</script>