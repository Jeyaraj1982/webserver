<style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px;color: red;}
</style>   
<?php
    $_OPERATOR = "ET";
    $data = $mysql->select("select * from _tbl_operators where OperatorCode='".$_OPERATOR."'");
?>
<div style="padding:0px;text-align:center;margin-bottom:20px;">
    <h5><?php echo $data[0]['OperatorTypeCode'];?></h5>
    <h6 style="color:#999">Balance: Rs. <?php echo number_format($application->getBalance($_SESSION['User']['MemberID']),2);?></h6>
</div> 
<div class="row" style="padding-bottom:30px">
    <img src="assets/img/<?php echo $data[0]['IconFile'];?>" style="width:25%;border:1px solid #ccc;border-radius:10px;margin:0px auto">    
</div>
<?php
$mem = $mysql->select("select * from _tbl_member where MemberID='".$_SESSION['User']['MemberID']."'");
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
?>
<?php if ($enable) { ?>
    <?php if (isset($_POST['submitRequest'])) { ?>
        <script>$('#myModal').modal("show");</script>
        <?php
        $number = $_POST['region']."-".$_POST['number'];
        $result = $application->doBillPay(array("MemberID"             => $_SESSION['User']['MemberID'],
                                                "operator"             => $data[0]['OperatorLAPUCode'],
                                                "CustomerMobileNumber" => $_POST['CustomerMobileNumber'],
                                                "particulars"          => $data[0]['OperatorType']." TNEB ".$number,
                                                "number"               => $_POST['region']."-".$_POST['MobileNumber'],
                                                "markascredit"         => $_POST['markascredit'],         
                                                "credit_nickname"      => $_POST['credit_nickname'],
                                                "CrAmount"             => $_POST['CrAmount'],
                                                "whatsappRequired"             => $_POST['whatsappRequired']=="on" ? "1" : "0",
                                                "telegramRequired"             => $_POST['telegramRequired']=="on" ? "1" : "0",
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
                <a href="dashboard.php?action=bill_tneb" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a><br>
                <a href="dashboard.php?action=add_contacts_tneb&id=<?php echo $result['txnid'];?>" class="btn btn-outline-success  glow w-100 position-relative">Add Contact<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
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
                <a href="dashboard.php?action=bill_tneb" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a><br><br>
                <a href="dashboard.php" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="row">
            <form action="" method="post" style="width: 80%;margin: 0px auto;" id="frm_tneb" onsubmit="return checkInputs();">
                <div class="form-group"  style="margin-bottom:10px;">
                    <div class="input-group">
                        <select name="region" id="region" class="form-control">
                        <?php if(isset($_GET['region'])){ ?>     
                           <option value="1" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "1") ? " selected='selected' " : "") : (($_GET['region']== "1") ? " selected='selected' " : "");?>>01-Chennai-North</option>
                           <option value="2" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "2") ? " selected='selected' " : "") : (($_GET['region']== "2") ? " selected='selected' " : "");?>>02-Viluppuram</option>
                           <option value="3" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "3") ? " selected='selected' " : "") : (($_GET['region']== "3") ? " selected='selected' " : "");?>>03-Coimbatore</option>
                           <option value="4" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "4") ? " selected='selected' " : "") : (($_GET['region']== "4") ? " selected='selected' " : "");?>>04-Erode</option>
                           <option value="5" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "5") ? " selected='selected' " : "") : (($_GET['region']== "5") ? " selected='selected' " : "");?>>05-Madurai</option>
                           <option value="6" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "6") ? " selected='selected' " : "") : (($_GET['region']== "6") ? " selected='selected' " : "");?>>06-Trichy</option>
                           <option value="7" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "7") ? " selected='selected' " : "") : (($_GET['region']== "7") ? " selected='selected' " : "");?>>07-Tirunelvel</option>
                           <option value="8" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "8") ? " selected='selected' " : "") : (($_GET['region']== "8") ? " selected='selected' " : "");?>>08-Vellore</option>
                           <option value="9" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "9") ? " selected='selected' " : "") : (($_GET['region']== "9") ? " selected='selected' " : "");?>>09-chennai-South</option>
                        <?php } else {?>
                            <option value="1" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "1") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "1") ? " selected='selected' " : "");?>>01-Chennai-North</option>
                           <option value="2" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "2") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "2") ? " selected='selected' " : "");?>>02-Viluppuram</option>
                           <option value="3" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "3") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "3") ? " selected='selected' " : "");?>>03-Coimbatore</option>
                           <option value="4" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "4") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "4") ? " selected='selected' " : "");?>>04-Erode</option>
                           <option value="5" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "5") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "5") ? " selected='selected' " : "");?>>05-Madurai</option>
                           <option value="6" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "6") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "6") ? " selected='selected' " : "");?>>06-Trichy</option>
                           <option value="7" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "7") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "7") ? " selected='selected' " : "");?>>07-Tirunelvel</option>
                           <option value="8" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "8") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "8") ? " selected='selected' " : "");?>>08-Vellore</option>
                           <option value="9" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']== "9") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "9") ? " selected='selected' " : "");?>>09-chennai-South</option>
                        <?php } ?>
                        </select>
                        <div class="input-group-append" id="viewUser">
                            <span class="input-group-text" onclick="GetTNEBUsers()" id="basic-addon1" style="color:#1572E8 "><i class="icon-user"></i></span>
                        </div>
                    </div>
                </div> 
                <div class="form-group"  style="margin-bottom:0px;">
                    <div class="input-group">
                        <?php 
                        if(isset($_GET['ebnumber']))  {
                            $ebnumber=$_GET['ebnumber'];
                        } else {
                            $ebnumber ="";
                        }
                    ?>
                        <input type="number" onblur="getDetails()"  value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $ebnumber;?>" maxlength="10" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="TNEB Number" style="border-right:0px"> 
                        <div class="input-group-append">
                            <span class="input-group-text" id="progress_icon" style="background:#fff;padding: 0px;" ></span>
                        </div>
                    </div>
                    <div class="errorstring" id="ErrTNEBNumber"></div> 
                    <div id="result_div" style="width:100%;">
                    
                    </div> 
                </div>
                <div class="form-group" style="margin-bottom:0px;">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="padding-left:48px;font-weight:bold;font-size: 12px;">INR</span>
                        </div>
                        <input type="number"  value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" maxlength="10" name="Amount" id="Amount" class="form-control" placeholder="Amount" >
                    </div>
                    <div class="errorstring" id="ErrAmount"></div>
                </div>
                <div class="form-group" style="margin-bottom:0px;">
                    <div class="input-group" >
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="padding-left:48px;font-weight:bold;font-size: 12px;">+91</span>
                        </div>
                        <input type="number"  value="<?php echo isset($_POST['CustomerMobileNumber']) ? $_POST['CustomerMobileNumber'] : "";?>" maxlength="10" name="CustomerMobileNumber" id="CustomerMobileNumber" class="form-control" placeholder="Customer MobileNumber" >
                    </div>
                    <div class="errorstring" id="ErrCustomerMobileNumber"></div>
                </div>
                <!--<div class="form-group"  style="margin-bottom:0px;">
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" class="checkbox-danger" name="whatsappRequired" id="whatsappRequired">
                        <label for="whatsappRequired" style="font-weight:normal;font-size: 12px;color: #767d84;">Require Whatsapp Receipt</label>
                    </div>
                </div>-->
                <div class="form-group"  style="margin-bottom:0px;">
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" class="checkbox-danger" onchange="searchsubscriber()" readonly  name="telegramRequired" id="telegramRequired">
                        <label for="telegramRequired" style="font-weight:normal;font-size: 12px;color: #767d84;">Require Telegram Receipt</label>
                        <span id="errtelegram" style="font-size: 12px;color:red"></span>
                    </div>
                </div>
                <!--<div class="form-group">
                  <div class="checkbox checkbox-success checkbox-inline">
                    <input type="checkbox" class="checkbox-primary" onclick="do_markascredit()" name="markascredit" id="markascredit">
                    <label for="markascredit">Mark as credit</label>
                  </div>
                  <input type="text" class="form-control" value="" name="credit_nickname" id="credit_nickname" placeholder="Nick Name" style="display: none;margin-top:10px;">
                  <input type="number" class="form-control" value="" name="CrAmount" id="CrAmount" placeholder="Credit Amount" style="display: none;margin-top:10px;">
                </div>  -->
                <div class="form-group">
                    <p align="center" style="color:red" id="error_msg">&nbsp;<?php echo $error;?></p>
                </div>
                <button type="submit" name="submitRequest" id="submitRequest" class="btn btn-success  glow w-100 position-relative">Pay now<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button><br><br>
                <a href="dashboard.php" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a><br><br>
                <div style="text-align: center;">
                    <a href="dashboard.php?action=txnhistory&operator=<?php echo $_OPERATOR;?>" style="color:#555">Transaction History</a>
                </div>
            </form>         
        </div>
    <?php } ?>
<?php } else { ?>
<div class="row">
    <div style="padding:20px;color:red;text-align:center;width:100%;"><?php echo $enable_error;?></div>
    <a href="dashboard.php" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
    <a href="dashboard.php" class="btn btn-success  glow w-100 position-relative"><i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;">Back</i></a>
</div>
<?php } ?>
                                                            



<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="confrimation_text">                                               
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>
          <button type="button" onclick="doConfrim()" class="btn btn-success  glow w-100 position-relative">Pay now<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button><br><br>
          <a href="javascript:void(0)" data-dismiss="modal" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a><br><br>
      </div>
    </div>
  </div>
</div> 
  <div class="modal fade" id="confirmModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_texts" style="padding:10px;max-height: 80vh;overflow: auto;">
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>
         <div style="padding:20px;text-align:center">
         </div>
      </div>
    </div>
  </div>
</div>  
<script>
var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://www.saralservices.in/app/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
var IsConfirm = 0;
var process_icon_sm = "<img src='https://tksdonlineservice.in/assets/hloading.gif' style='height:25px;float:right;padding-right:10px'>";
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
                var resHtml= '<div style="background: #f9f8e8;border-radius:5px;padding:10px 15px"><div class="row"><div class="col-3" style="font-size:12px">Name</div><div class="col-9" style="font-size:12px;">: '+obj.billerName+'</div><div class="col-3" style="font-size:12px;padding-right: 0px;">Amount</div><div class="col-9" style="font-size:12px;">: '+obj.billAmount+'</div><div class="col-3"  style="font-size:12px;padding-right:0px">Bill Date</div><div class="col-9" style="font-size:12px;">: '+obj.billDate+'</div><div class="col-3" style="font-size:12px;padding-right:0px">Due Date</div><div class="col-9" style="font-size:12px;">: '+obj.dueDate+'</div></div></div>';   
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
                if (!(parseFloat(amt)>=10)) {
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
        if (!(parseFloat(amt)>=10)) {
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
            //Set Rs. 5 for each Rs. 5,000.
              var count = (parseInt(parseInt($('#Amount').val())/5000));
              var suff = ((parseInt($('#Amount').val())%5000));
              if (suff>0) {
                  count++;
              }
              charge = count * 5;
              
            var txt = '<div class="form-group">'                
                            +'<div class="input-group mt-1">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1"  style="border:none;padding-left:11px;font-weight:bold;font-size:12px;">EB Number</span>'
                                +'</div>'
                                +'<input type="text" value="'+$('#region').val()+'-'+$('#MobileNumber').val()+'" class="form-control" disabled="disabled">'
                            + '</div>'
                        +'</div>'
                        +'<div class="form-group">'
                            +'<div class="input-group">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="border:none;paddingpadding-left:57px;font-weight:bold;font-size:12px;">Amount</span>'
                                +'</div>'
                                +'<input type="number"  value="'+$('#Amount').val()+'" name="_Amount" id="_Amount" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group"> '
                            +'<div class="input-group mt-1">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1"  style="border:none;paddingpadding-left:56px;font-weight:bold;font-size:12px;">+91</span>'
                                +'</div>'
                                +'<input type="number" value="'+$('#CustomerMobileNumber').val()+'" name="_CustomerMobileNumber" id="_CustomerMobileNumber" class="form-control" disabled="disabled">'      
                                +'<div class="input-group-append">'
                                   // +'<span class="input-group-text" id="basic-addon1"  style="background:#e8e8e8;font-weight:bold;font-size:12px;">'+ (($('#whatsappRequired').prop("checked") == true) ? "<img src='http://tksdonlineservice.in/assets/img/whatsapp.png'>" : "") +'</span>'
                                    +'<span class="input-group-text" id="basic-addon1"  style="background:#e8e8e8;font-weight:bold;font-size:12px;">'+ (($('#telegramRequired').prop("checked") == true) ? "<img src='http://tksdonlineservice.in/assets/img/telegram.png'>" : "") +'</span>'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                        + '<div class="form-group"> '
                            +'<div class="input-group mt-1">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1"  style="border:none;paddingpadding-left:36px;font-weight:bold;font-size:12px;">Charge</span>'
                                +'</div>'
                                //+'<input type="number" value="'+ (($('#whatsappRequired').prop("checked") == true) ? (charge+2) : charge )  +'" name="_CustomerMobileNumber" id="_CustomerMobileNumber" class="form-control" disabled="disabled">'
                                +'<input type="number" value="'+ (($('#telegramRequired').prop("checked") == true) ? (charge+2) : charge )  +'" name="_CustomerMobileNumber" id="_CustomerMobileNumber" class="form-control" disabled="disabled">'
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
    IsConfirm=1;
    $("#confrimation_text").html(loading);
    $( "#submitRequest").trigger( "click" );
   /* var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-secondary btn-sm' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=bill_tneb\"'>Next Bill</button></div>";
    $("#confrimation_text").html(loading);
    
    $.post( "webservice.php?action=PayEBBill",  $( "#frm_tneb" ).serialize(),function( data ) {
        var obj = JSON.parse(data); 
        var html = "";
        if (obj.status=="failure") {
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://www.saralservices.in/app/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
            if (parseFloat(obj.balance)>=0) {
                html += "<br>Balance Amount: "+obj.balance
            }
            html += "</div>" +buttons;
            $('#balance_div').html("Rs. "+obj.balance);
        } else {
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://www.saralservices.in/app/assets/tick.jpg' style='width:128px'><br><br>Request Submitted<br>TNEB Number: "+obj.number+"<br>Amount: "+obj.amount+"<br>Txn ID: "+obj.txnid+"<br>Charges ID: "+obj.charged+"<br>Balance Amount: "+obj.balance+"</div>";
            html += "<br>" + buttons;
            $('#balance_div').html("Rs. "+obj.balance);
        }
        $("#confrimation_text").html(html);
    });  */
}         
function GetTNEBUsers() {
         $("#confrimation_texts").html(loading);
         $.ajax({url:'webservice.php?action=GetTNEBUsers&rand=<?php echo rand(3000,900000);?>',async:true,crossDomain:true,success:function(data){
            $('#confrimation_texts').html(data);
            $('#confirmModalLong').modal("show");
         }});
    } 
 <?php if(isset($_GET['ebnumber'])) {   ?>
 $(document).ready(function(){
    getDetails();
 });
     
 <?php } ?>
 function searchsubscriber(){
    $('#errtelegram').html("");  
   var customer_mobile = $('#CustomerMobileNumber').val().trim();
        if (customer_mobile.length==0) {
            $('#ErrCustomerMobileNumber').html("Please Enter mobile Number");
            $('#telegramRequired'). prop("checked", false);
            return false;
        } else {
            if (!($('#CustomerMobileNumber').val().length==10 && parseInt($('#CustomerMobileNumber').val())>6000000000 && parseInt($('#CustomerMobileNumber').val())<9999999999)) {
                $('#ErrCustomerMobileNumber').html("Invalid Mobile Number");
                $('#telegramRequired'). prop("checked", false);
                return false;
            }
        }
    $.ajax({url:'webservice.php?action=SearchTelegramsubs&CustomerMobileNumber='+customer_mobile,success:function(data){
        var obj = JSON.parse(data); 
        if(obj.status=="failure"){
            $('#errtelegram').html("Not Availbale");   
            $('#telegramRequired'). prop("checked", false);   
        }else {
            $('#errtelegram').html("");  
        }
    }});  
}
</script>