<?php
    $_OPERATOR = "PV";
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
        $result = $application->doBillPay(array("MemberID"             => $_SESSION['User']['MemberID'],
                                                "operator"             => $data[0]['OperatorLAPUCode'],
                                                "CustomerMobileNumber" => $_POST['CustomerMobileNumber'],
                                                "particulars"          => $data[0]['OperatorType']." TNEB ".$number,
                                                "number"               => $_POST['MobileNumber'],
                                                "markascredit"         => $_POST['markascredit'],
                                                "credit_nickname"      => $_POST['credit_nickname'],
                                                "CrAmount"             => $_POST['CrAmount'],
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
                <a href="dashboard.php?action=postpaid_vodafone" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
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
                <a href="dashboard.php?action=postpaid_vodafone" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a><br><br>
                <a href="dashboard.php?action=mobilepostpaid" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="row">
            <form action="" method="post" style="width: 80%;margin: 0px auto;" onsubmit="return checkInputs()">
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Mobile Number</label>
                    <input type="number"  value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>" maxlength="10" name="MobileNumber" id="MobileNumber" class="form-control" id="exampleInputEmail1" placeholder="Mobile Number" required="">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Amount</label>
                    <input type="number"  value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" maxlength="10" name="Amount" id="Amount" class="form-control" placeholder="Amount" required="">
                </div>
                 <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Customer Mobile Number</label>
                    <input type="number"  value="<?php echo isset($_POST['CustomerMobileNumber']) ? $_POST['CustomerMobileNumber'] : "";?>" maxlength="10" name="CustomerMobileNumber" id="CustomerMobileNumber" class="form-control" placeholder="Customer MobileNumber" required="">
                </div>
                <div class="form-group">
                  <div class="checkbox checkbox-success checkbox-inline">
                    <input type="checkbox" class="checkbox-primary" onclick="do_markascredit()" name="markascredit" id="markascredit">
                    <label for="markascredit">Mark as credit</label>
                  </div>
                  <input type="text" class="form-control" value="" name="credit_nickname" id="credit_nickname" placeholder="Nick Name" style="display: none;margin-top:10px;">
                  <input type="number" class="form-control" value="" name="CrAmount" id="CrAmount" placeholder="Credit Amount" style="display: none;margin-top:10px;">
                </div>
                <div class="form-group">
                    <p align="center" style="color:red" id="error_msg">&nbsp;<?php echo $error;?></p>
                </div>
                <button type="submit" name="submitRequest" id="submitRequest" class="btn btn-success  glow w-100 position-relative">Pay now<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button><br><br>
                <a href="dashboard.php?action=mobilepostpaid" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a>
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
    <a href="dashboard.php?action=mobilepostpaid" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
    <a href="dashboard.php?action=mobilepostpaid" class="btn btn-success  glow w-100 position-relative"><i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;">Back</i></a>
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
      <div class="modal-body">
           
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Mobile Number</label>
                    <input type="text" value="" name="_MobileNumber" id="_MobileNumber" class="form-control" disabled="disabled">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Amount</label>
                    <input type="text" value="" name="_Amount" id="_Amount" class="form-control" disabled="disabled">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Customer Mobile Number</label>
                    <input type="number" value=""  name="_CustomerMobileNumber" id="_CustomerMobileNumber" class="form-control" disabled="disabled">
                </div>
                <button type="button" onclick="doConfrim()" class="btn btn-success  glow w-100 position-relative">Pay now<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button><br><br>
                <a href="javascript:void(0)" data-dismiss="modal" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a><br><br>
      </div>
    </div>
  </div>
</div>

<script>
var IsConfirm=0;
function checkInputs() {
    $('#error_msg').html("&nbsp;");  
    var ebnumber = $('#MobileNumber').val();
    if (!(ebnumber.length==10)) {
        $('#error_msg').html("Invalid Mobile Number");
        return false;
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
        $('#_MobileNumber').val($('#MobileNumber').val());
        $('#_CustomerMobileNumber').val($('#CustomerMobileNumber').val());
        $('#_Amount').val($('#Amount').val());
        $('#ConfirmationPopup').modal("show");
        return false;
    } else {
        return true;
    }
}
       function doConfrim() {
    IsConfirm=1;
     $('#ConfirmationPopup').modal("hide");
     $('#submitRequest').trigger("click");
}
</script>