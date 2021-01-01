<style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px;color: red;}
</style> 
<?php
    $_OPERATOR = "BG";
    $data = $mysql->select("select * from _tbl_operators where OperatorCode='".$_OPERATOR."'");
?>
<div style="padding:0px;text-align:center;margin-bottom:20px;">
    <h5><?php echo $data[0]['OperatorTypeCode'];?></h5>
    <h6 style="color:#999">Balance: Rs. <?php echo number_format($application->getBalance($_SESSION['User']['MemberID']),2);?></h6>
</div> 
<div class="row" style="padding-bottom:30px">
    <img src="https://abjeservice.in/assets/img/<?php echo $data[0]['IconFile'];?>" style="width:25%;border:1px solid #ccc;border-radius:10px;margin:0px auto">    
</div>
<?php
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
        $number = $_POST['number'];
        $result = $application->doBillPay(array("MemberID"              => $_SESSION['User']['MemberID'],
                                                 "operator"             => $data[0]['OperatorLAPUCode'],
                                                 "CustomerMobileNumber" => $_POST['CustomerMobileNumber'],
                                                 "particulars"          => $data[0]['OperatorType']."Bharat GasBill ".$number,
                                                 "markascredit"         => $_POST['markascredit'],
                                                 "credit_nickname"      => $_POST['credit_nickname'],
                                                 "CrAmount"             => $_POST['CrAmount'],
                                                 "number"               => $_POST['MobileNumber'],
                                                 "whatsappRequired"     => $_POST['whatsappRequired']=="on" ? "1" : "0",
                                                 "telegramRequired"     => $_POST['telegramRequired']=="on" ? "1" : "0",
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
                <a href="dashboard.php?action=gasbill_bharat" class="btn btn-primary  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
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
                <a href="dashboard.php?action=gasbill_bharat" class="btn btn-primary  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a><br><br>
                <a href="dashboard.php?action=gasbill" class="btn btn-outline-primary glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="row">
            <form action="" method="post" style="width: 80%;margin: 0px auto;" onsubmit="return checkInputs()">
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Consumer Number / Mobile Number</label>
                    <input type="number"  value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>" maxlength="10" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="Consumer Number / Mobile Number" required="">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Bill Amount</label>
                    <input type="number"  value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" maxlength="10" name="Amount" id="Amount" class="form-control" placeholder="Amount" required="">
                </div>
                 <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Customer Mobile Number</label>
                    <input type="number"  value="<?php echo isset($_POST['CustomerMobileNumber']) ? $_POST['CustomerMobileNumber'] : "";?>" maxlength="10" name="CustomerMobileNumber" id="CustomerMobileNumber" class="form-control" placeholder="Customer MobileNumber" required="">
                    <div class="errorstring" id="ErrCustomerMobileNumber"></div>
                </div>
                <!--<div class="form-group" >
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" class="checkbox-danger" name="whatsappRequired" id="whatsappRequired">
                        <label for="whatsappRequired" style="font-weight:normal;font-size: 12px;color: #767d84;">Require Whatsapp Receipt</label>
                    </div>
                </div> -->
                <div class="form-group">
                    <div class="checkbox checkbox-primary checkbox-inline">
                        <input type="checkbox" class="checkbox-danger" onchange="searchsubscriber()" readonly  name="telegramRequired" id="telegramRequired">
                        <label for="telegramRequired" style="font-weight:normal;font-size: 12px;color: #767d84;">Require Telegram Receipt</label>
                        <span id="errtelegram" style="font-size: 12px;color:red"></span>
                    </div>
                </div>
                <div class="form-group">
                  <div class="checkbox checkbox-primary checkbox-inline">
                    <input type="checkbox" class="checkbox-primary" onclick="do_markascredit()" name="markascredit" id="markascredit">
                    <label for="markascredit" style="font-weight:normal;font-size: 12px;color: #767d84;">Mark as credit</label>
                  </div>
                  <input type="text" class="form-control" value="" name="credit_nickname" id="credit_nickname" placeholder="Nick Name" style="display: none;margin-top:10px;">
                  <input type="number" class="form-control" value="" name="CrAmount" id="CrAmount" placeholder="Credit Amount" style="display: none;margin-top:10px;">
                </div>
                <div class="form-group">
                    <p align="center" style="color:red" id="error_msg">&nbsp;<?php echo $error;?></p>
                </div>
                <button type="submit" name="submitRequest" id="submitRequest" class="btn btn-primary  glow w-100 position-relative">Pay now<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button><br><br>
                <a href="dashboard.php?action=gasbill" class="btn btn-outline-primary glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a>
                <br><br>
                <div style="text-align: center;">
                    <a href="dashboard.php?action=txnhistory&operator=<?php echo $_OPERATOR;?>" style="color:#555">Transaction History</a>
                </div>
            </form>         
        </div>
    <?php } ?>
<?php } else { ?>
<div class="row">
    <div style="padding:20px;color:red;text-align:center;width:100%;"><?php echo $enable_error;?></div>
    <a href="dashboard.php?action=gasbill" class="btn btn-primary  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
    <a href="dashboard.php?action=gasbill" class="btn btn-primary  glow w-100 position-relative"><i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;">Back</i></a>
</div>
<?php } ?>

<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                <div class="modal-body" id="confrimation_text">
            <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>
                
                <button type="button" onclick="doConfrim()" class="btn btn-primary  glow w-100 position-relative">Pay now<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button><br><br>
                <a href="javascript:void(0)" data-dismiss="modal" class="btn btn-outline-primary glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a><br><br>
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
var IsConfirm=0;                                                                                           
 function checkInputs() {
    $('#error_msg').html("&nbsp;");  
    var ebnumber = $('#MobileNumber').val();
    if (!(ebnumber.length>4)) {
        $('#error_msg').html("Invalid Consumer Number");
        return false;
    }else{
            if (!(is_AlphaNumeric(ebnumber))) {
                $('#error_msg').html("Please Enter Alpha Numeric Characters Only");
            }
        }  
    
    var amount = parseFloat($('#Amount').val());
    if (!(amount>=10)) {
        $('#error_msg').html("Amount must have greater than Rs. 10");
        return false;
    }
    
     var customer_mobile=parseFloat($('#CustomerMobileNumber').val());
    if (!(customer_mobile>=6000000000 && customer_mobile<=9999999999)) {
        $('#error_msg').html("Invalid customer mobile number");
        return false;
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

    if (IsConfirm==0) {
         var count = (parseInt(parseInt($('#Amount').val())/5000));
              var suff = ((parseInt($('#Amount').val())%5000));
              if (suff>0) {
                  count++;
              }
              charge = count * 3;
        
        var txt = '<div class="form-group" style="text-align:left;">'
                    + '<label class="text-bold-600" for="exampleInputEmail1">Consumer Number</label>'
                    + '<input type="text" value="'+$('#MobileNumber').val()+'" name="_MobileNumber" id="_MobileNumber" class="form-control" disabled="disabled">'
                + '</div>'
                 + '<div class="form-group"  style="text-align:left;">'
                    + '<label class="text-bold-600" for="exampleInputEmail1" style="text-align:left;">Amount</label>'
                    + '<input type="text" value="'+$('#Amount').val()+'" name="_Amount" id="_Amount" class="form-control" disabled="disabled"> '
                + '</div>'
                + '<div class="form-group"  style="text-align:left;">'
                    + '<label class="text-bold-600" for="exampleInputEmail1" style="text-align:left;">Charge</label>'
                    //+ '<input type="text" value="'+ (($('#whatsappRequired').prop("checked") == true) ? (charge+2) : charge )  +'" name="_AmountCharge" id="_AmountCharge" class="form-control" disabled="disabled">'
                    + '<input type="text" value="'+ (($('#telegramRequired').prop("checked") == true) ? (charge+2) : charge )  +'" name="_AmountCharge" id="_AmountCharge" class="form-control" disabled="disabled">'
                + '</div>'
                +'<div class="form-group"> '
                    +'<div class="input-group mt-1">'
                       +'<input type="number" value="'+$('#CustomerMobileNumber').val()+'" name="_CustomerMobileNumber" id="_CustomerMobileNumber" class="form-control" disabled="disabled">'      
                        +'<div class="input-group-append">'
                            //+'<span class="input-group-text" id="basic-addon1"  style="background:#e8e8e8;font-weight:bold;font-size:12px;">'+ (($('#whatsappRequired').prop("checked") == true) ? "<img src='http://tksdonlineservice.in/assets/img/whatsapp.png'>" : "") +'</span>'
                            +'<span class="input-group-text" id="basic-addon1"  style="background:#e8e8e8;font-weight:bold;font-size:12px;">'+ (($('#telegramRequired').prop("checked") == true) ? "<img src='http://tksdonlineservice.in/assets/img/telegram.png'>" : "") +'</span>'
                        +'</div>'
                    +'</div>'
                +'</div>';
                
        $('#xconfrimation_text').html(txt);                                                           
        $('#ConfirmationPopup').modal("show");
        return false;
    }else {
        return true;
    }
} 
       function doConfrim() {
    IsConfirm=1;
     $('#ConfirmationPopup').modal("hide");
     $('#overlay_body').show(); 
     $('#submitRequest').trigger("click");
}
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