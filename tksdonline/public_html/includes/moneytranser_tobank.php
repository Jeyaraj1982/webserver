<style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px;color:red;}
</style>
<?php
    $_OPERATOR = "MTB";
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
//if (sizeof($t)>0) {
if ($_SESSION['User']['MoneyTransfer']==0) {
    $enable = false;
    $enable_error = "In your account, Operator was disabled. to enable please contact support team";
} else {
    if ($data[0]['IsActive']!="1") {
        $enable = false;
        $enable_error = $data[0]['InactiveMessage'];
    } 
}
   $upper_lmit =getUpperLimit($_SESSION['User']['MemberID']);
    $today_transfer  = getTodayTransfered($_SESSION['User']['MemberID']);
      $today_dealer_transfer  = getDealerTodayTransfered($_SESSION['User']['MapedTo']);
      
      
?>                                                             
<?php if ($enable) { ?>
    <?php if (isset($_POST['submitRequest'])) { ?>
        <script>$('#myModal').modal("show");</script>
        <?php      
        $result = array();
        
     //   if ($_POST['Amount']<=($upper_lmit-$today_transfer)) {
        if ($_POST['Amount']<=($upper_lmit-($today_transfer+$today_dealer_transfer))) {
            
            $result = $application->doMoneyTransfer(array("MemberID"             => $_SESSION['User']['MemberID'],
                                                          "operator"             => $data[0]['OperatorLAPUCode'],
                                                          "particulars"          => "MoneyTransfer ".$_POST['number']."/".$_POST['IFSCode'],
                                                          "number"               => $_POST['MobileNumber'],
                                                          "CustomerMobileNumber" => $_POST['CustomerMobileNumber'],
                                                          "Remarks"              => $_POST['Remarks'],
                                                          "AccountName"          => $_POST['AccountName'],
                                                          "api"          => true,
                                                          "markascredit"         => $_POST['markascredit'],
                                                          "credit_nickname"      => $_POST['credit_nickname'],
                                                          "IFSCode"              => $_POST['IFSCode'],
                                                          "CrAmount"             => $_POST['CrAmount'],
                                                          "amount"               => $_POST['Amount']));    
                                                         
         } else {
             $result['amount']  = $_POST['Amount'];   
             $result['status']  = "failure";   
             $result['message'] = "Failed. Your account allow to maximum ".($upper_lmit-$today_transfer)."/per transaction";   
         }                           
         
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
                <a href="dashboard.php?action=moneytranser_tobank" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
            </div>
        <?php } else {?>
            <div class="row">
                <div style="padding:20px;text-align:center;width:100%;color:#666;line-height:25px;padding-bottom:0px;">
                    
                    Rs. <?php echo $result['amount']; ?><br>
                </div>
                <div style="padding:20px;text-align:center;width:100%;color:red;line-height:25px;">
                    Transaction failed<br>
                    <?php echo $result['message']; ?>
                </div>
                <a href="dashboard.php?action=moneytranser_tobank" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a><br><br>
                <a href="dashboard.php?action=moneytransfer" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a>
            </div>
        <?php } ?>
    <?php } else { ?> 
        <div class="row">
        <div class="col-12">
        <?php
            
            if ($upper_lmit>0) {
               
                ?>
                <table align="center" style="width: 320px;">
                    <tr>
                        <td>Today Your's Upper Limit</td>
                        <td style="text-align: right"><?php echo number_format($upper_lmit,2);?></td>
                    </tr>
                    <tr>
                        <td>Today You Transfered</td>
                        <td style="text-align: right"><?php echo number_format($today_transfer,2);?></td>
                    </tr>
                    <tr>
                        <td>Today Allow to Transfer</td>
                        <td style="text-align: right"><?php echo number_format($upper_lmit-$today_transfer,2);?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                           <div style="border-radius:5px;background:#f0ffef;border:1px solid #c4f4c1;padding:10px;font-size:11px;color:#107707">To Increase today's limit, please contact support team.</div>
                        </td>
                    </tr>
                </table>
                <?php
                
            } else {
                ?>
                <table align="center" style="width: 300px;">
                    <tr>
                        <td>Today Your's Upper Limit</td>
                        <td style="text-align: right"><?php echo number_format($upper_lmit,2);?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:center;color:red">
                            Your are not allow to transfer money, please contact support team
                        </td>
                    </tr>
                </table>
                <style>
                #frms{display:none}
                </style>
                <?php
                 
            }
            
        ?>
        <?php
            if (isset($_GET['bid'])) {
                $benifechery_details = $mysql->select("select * from _tbl_moneytransfer_benifechery where md5(concat(BenificheryID,AccountNumber))='".$_GET['bid']."'");
            }
        ?>
            
            <form action="" method="post" id="frms"  onsubmit="return beforeSubmit()">
                <div class="form-group"  style="margin-bottom:0px">
                    <label for="exampleInputEmail1">Account Name</label>
                    <?php  if (sizeof($benifechery_details)>0) { ?>
                    <input type="text" readonly="readonly" value="<?php echo $benifechery_details[0]['AccountHolderName'];?>" maxlength="30" name="AccountName" id="AccountName" class="form-control" placeholder="Account Name" >
                    <?php } else { ?>
                    <input type="text" value="<?php echo isset($_POST['AccountName']) ? $_POST['AccountName'] : "";?>" maxlength="30" name="AccountName" id="AccountName" class="form-control" placeholder="Account Name" >
                    <?php } ?>
                    <div class="errorstring" id="ErrAccountName"></div>
                </div>
                <div class="form-group" style="margin-bottom:0px">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width:90px;text-align:right;font-weight:bold;font-size:12px;">A/c Number</span>
                        </div>
                          <?php  if (sizeof($benifechery_details)>0) { ?>
                          <input type="text" readonly="readonly" value="<?php echo $benifechery_details[0]['AccountNumber'];?>" maxlength="30" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="Account Number" >
                          <?php } else {?>
                          <input type="text" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['AccountNumber'] : "";?>" maxlength="30" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="Account Number" >
                            <?php } ?>
                    </div>
                    <div class="errorstring" id="ErrAccountNumber"></div>
                </div>
                <div class="form-group" style="margin-bottom:0px">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width:90px;text-align:right;font-weight:bold;font-size:12px;">IFSCode</span>
                        </div>
                         
                          <?php  if (sizeof($benifechery_details)>0) { ?>
                          <input type="text"  readonly="readonly" value="<?php echo $benifechery_details[0]['IFSCCode'];?>" maxlength="11" name="IFSCode" id="IFSCode" class="form-control" placeholder="IFSCode" style="text-transform:uppercase;">
                          <?php } else { ?>
                          <input type="text" onblur="getIFSCode()" value="<?php echo isset($_POST['IFSCode']) ? $_POST['IFSCode'] : "";?>" maxlength="11" name="IFSCode" id="IFSCode" class="form-control" placeholder="IFSCode" style="text-transform:uppercase;">
                        <?php } ?>
                        <div class="col-sm-12" id="result_div" style="padding:0px;"></div>
                    </div>
                    <div class="errorstring" id="ErrIFSCode"></div>
                </div>
                <div class="form-group" style="margin-bottom:0px">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width:90px;text-align:right;font-weight:bold;font-size:12px;">INR</span>
                        </div>
                        <input type="number"  value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" maxlength="7" name="Amount" id="Amount" class="form-control" placeholder="Amount" >
                    </div>
                    <div class="errorstring" id="ErrAmount"></div>
                </div>
                <div class="form-group" style="margin-bottom:0px">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width:90px;text-align:right;font-weight:bold;font-size:12px;">Remarks</span>
                        </div>
                        <input type="text"  value="<?php echo isset($_POST['Remarks']) ? $_POST['Remarks'] : "";?>"   name="Remarks" id="Remarks" class="form-control" placeholder="Remarks" >
                    </div>
                    <div class="errorstring" id="ErrRemarks"></div> 
                </div>
                <div class="form-group" style="margin-bottom:0px">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" style="width:90px;text-align:right;font-weight:bold;font-size:12px;">+91</span>
                        </div>
                        <?php  if (sizeof($benifechery_details)>0) { ?>
                        <input type="number" readonly="readonly"  value="<?php echo $benifechery_details[0]['CustomerMobileNumber'];?>"  maxlength="10" name="CustomerMobileNumber" id="CustomerMobileNumber" class="form-control" placeholder="Customer Mobile Number" >
                        <?php } else {?>
                        <input type="number" value="<?php echo isset($_POST['CustomerMobileNumber']) ? $_POST['CustomerMobileNumber'] : "";?>" maxlength="10" name="CustomerMobileNumber" id="CustomerMobileNumber" class="form-control" placeholder="Customer Mobile Number" >
                        <?php } ?>
                    </div>
                     <div class="errorstring" id="ErrCustomerMobileNumber"></div>
                </div>
                <div class="form-group" style="display:none;">
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
                <a href="dashboard.php?action=moneytransfer" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a>
                <br><br>
                <div style="text-align: center;">
                    <a href="dashboard.php?action=txnhistory&operator=<?php echo $_OPERATOR;?>" style="color:#555">Transaction History</a>
                </div>
            </form>         
        </div>
        </div>
    <?php } ?>
<?php } else { ?>
<div class="row">
    <div class="col-12">
        <div style="padding:20px;color:red;text-align:center;width:100%;"><?php echo $enable_error;?></div>
        <a href="dashboard.php?action=moneytranser_tobank" class="btn btn-success  glow w-100  position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>  <br> <br>
        <a href="dashboard.php?action=moneytransfer" class="btn btn-outline-success  glow w-100  position-relative"><i id="icon-arrow" class="bx bx-left-arrow-alt">Back</i></a>
    </div> 
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

<script>
    var IsConfirm=0;     
    var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://www.saralservices.in/app/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
    var valid_ifscode = 0;
    
    function isIfscCodeValid(ifscode) {
        var reg = /^[A-Za-z]{4}[0-9]{6,7}$/
        var reg = /^[A-Za-z]{4}[A-Za-z0-9]{6,7}$/
        if (ifscode.match(reg)) {
            return true
        }
        return false;
    }

    function is_valid_bank_account_number(acnumber) {
        if (acnumber.length<6) {
            return false;
        }
        var reg = /^[\w.]+$/i
        if (acnumber.match(reg)) {
            return true
        }
        return false;
    }

    function is_valid_bank_account_name(acname) {
        if (acname.length<3) {
            return false;
        }
        var reg = /^[a-z0-9\-\s]+$/i
        if (acname.match(reg)) {
            return true
        }
        return false;
    }

    function is_valid_bank_remarks(remarks) {
        if (!(remarks.length>=10 && remarks.length<=20)) {
            return false;
        }
        var reg = /^[a-z0-9\-\s]+$/i
        if (remarks.match(reg)) {
            return true
        }
        return false;
    }

function getIFSCode() {
    
    $('#ErrIFSCode').html("");
    $('#result_div').html("");
    var ifsc_code = $('#IFSCode').val().trim();
    if (ifsc_code.length==0) {
        $('#ErrIFSCode').html("Please enter IFS Code");
        return false; 
    }
    
    if (isIfscCodeValid($('#IFSCode').val())) {
        $.post( "webservice.php?action=getIFSCode&IFSCode="+$('#IFSCode').val().toUpperCase(),"",function( rdata ) {
            var obj = JSON.parse(rdata);
            var objData = obj.data;
            if (obj.status=="success") {
                var resHtml= '<div style="background:#fcfcfc;border-radius:5px;padding:10px 15px;font-size:12px;margin-top:10px;"><div class="row"><div class="col-12"><b>'+objData.BANK+'</b></div><div class="col-12"><b>Branch:</b> '+objData.BRANCH+'</div><div class="col-12"><b>City: </b>'+objData.CITY+'</div><div class="col-12"><b>District: </b>'+objData.DISTRICT+'</div><div class="col-12"><b>State: </b>'+objData.STATE+'</div></div></div>';   
                $('#result_div').html(resHtml);
                valid_ifscode = 1;
            } else {
                $('#ErrIFSCode').html("IFSCode is invalid");
                //$('#result_div').html(obj.message);
                valid_ifscode=0;
            }
        });
    } else {
        $('#ErrIFSCode').html("IFSCode is invalid");
        return false;
    }
}   

var IsConfirm=0;

    $(document).ready(function(){
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
        
        $("#IFSCode").blur(function() {
            $('#ErrIFSCode').html("");
            var ifsc = $('#IFSCode').val().trim();
            if (ifsc.length==0) {
                $('#ErrIFSCode').html("Please Enter IFSCode");
            } else {
                if(!(isIfscCodeValid($('#IFSCode').val()))) {
                    $('#ErrIFSCode').html("IFSCode is invalid");
                }
            }
        });
        
        $("#AccountName").blur(function() {
            $('#ErrAccountName').html("");   
            var ac_name = $('#AccountName').val().trim();
            if (ac_name.length==0) {
                $('#ErrAccountName').html("Please enter Account Name"); 
            } else {
                if (!(is_valid_bank_account_name(ac_name))) {
                    $('#ErrAccountName').html("Account name is invalid");
                }
            }
        });
        
        $("#MobileNumber").blur(function() {
            $('#ErrAccountNumber').html("");
            var ac_number = $('#MobileNumber').val().trim();
            if (ac_number.length==0) {
                $('#ErrAccountNumber').html("Please enter Account Number");
            } else {
                if (!(is_valid_bank_account_number(ac_number))) {
                    $('#ErrAccountNumber').html("Account number is invalid");
                }
            }
        });
        
        $("#Remarks").blur(function() {
            $('#ErrRemarks').html("");
            var n = $('#Remarks').val().trim();
            if (n.length==0) {
                $('#ErrRemarks').html("Please enter Remaks");
            } else {
                if (!(is_valid_bank_remarks(n))) {
                    if(n.length<=10){
                        $('#ErrRemarks').html("Minimum 10 characters required");
                    }else {
                        $('#ErrRemarks').html("Please Enter Alphanumberic characters");
                    }
                }
            }
        });
        
        $("#Amount").blur(function() {
            $('#ErrAmount').html("");
            var amt = $('#Amount').val().trim();
            if (amt.length==0) {
                $('#ErrAmount').html("Please enter Amount");
            } else {
                if (!(parseFloat(amt)>=10 && parseFloat(amt)<=10000)) {
                    $('#ErrAmount').html("Amount must have Rs.100 to  Rs.10000");
                }
            }
        });
    });
    
    function beforeSubmit() {
        
        $('#ErrCustomerMobileNumber').html(""); 
        $('#ErrAccountName').html(""); 
        $('#ErrAccountNumber').html(""); 
        $('#ErrAmount').html(""); 
        $('#ErrIFSCode').html(""); 
        $('#ErrRemarks').html(""); 
        
        var error=0;                                                                                    
        
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
       
        var ifsc = $('#IFSCode').val().trim();
        if (ifsc.length==0) {
            $('#ErrIFSCode').html("Please Enter IFSCode");
            error++;
        } else {
            if(!(isIfscCodeValid($('#IFSCode').val()))) {
                $('#ErrIFSCode').html("IFSCode is invalid");
                error++;
            }
        }
      
        var ac_name = $('#AccountName').val().trim();
        if (ac_name.length==0) {
            $('#ErrAccountName').html("Please enter Account Name"); 
             error++;
        } else {
            if (!(is_valid_bank_account_name(ac_name))) {
                $('#ErrAccountName').html("Account name is invalid");
                error++;
            }
        }
        
        var ac_number = $('#MobileNumber').val().trim();
        if (ac_number.length==0) {
            $('#ErrAccountNumber').html("Please enter Account Number");
             error++;
        } else {
            if (!(is_valid_bank_account_number(ac_number))) {
                $('#ErrAccountNumber').html("Account number is invalid");
                error++; 
            }
        }
         
        var n = $('#Remarks').val().trim();
        if (n.length==0) {
            $('#ErrRemarks').html("Please enter Remaks");
             error++;
        } else {
            if (!(is_valid_bank_remarks(n))) {
                if(n.length<=10){
                 $('#ErrRemarks').html("Minimum 10 characters required");
                 error++;   
                }else {
                    $('#ErrRemarks').html("Please Enter Alphanumberic characters");
                 error++;
                }
            }
        }
        
        var amt = $('#Amount').val().trim();
         if (amt.length==0) {
            $('#ErrAmount').html("Please enter Amount");
             error++;
        } else {
        if (!(parseFloat(amt)>=10 && parseFloat(amt)<=10000)) {
            $('#ErrAmount').html("Amount must have Rs.100 to  Rs.10000");
             error++;
        }
        }
        
        if(!(valid_ifscode == 1)){
            $('#ErrIFSCode').html("IFSCode is invalid");
                error++;
        }
           
        if (error>0) {
            return false;
        }
        
        
    var charge=0;
    if (parseFloat($('#Amount').val())<=3000) {
        charge=10;
    } else if (parseFloat($('#Amount').val())>3000 && $('#Amount').val()<=7000) {
        charge=15;
    } else if (parseFloat($('#Amount').val())>7000 && $('#Amount').val()<=10000) {
        charge=20;
    }
         
         
            var charge_count =  parseInt( parseFloat($('#Amount').val())/5000);
                  var charge_prefix = parseFloat($('#Amount').val())%5000;
                  if (charge_prefix>0) {
                    charge_count++;
                  }
                  charge = charge_count * 15;
                 
         if (IsConfirm==0 ) {
      
            var txt = '<div class="form-group">'
                            +'<span style="font-size:13px;padding-left:3px">Account Name</span>'
                            +'<input type="text" value="'+$('#AccountName').val()+'" name="_AccountName" id="_AccountName" class="form-control" disabled="disabled">'
                        +'</div>'
                        +'<div class="form-group">'                
                            +'<div class="input-group">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="padding-left:9px;font-weight:bold;font-size:12px;">A/c Number</span>'
                                +'</div>'
                                +'<input type="text" value="'+$('#MobileNumber').val()+'" name="_MobileNumber" id="_MobileNumber" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group">'
                            +'<div class="input-group mt-1">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="padding-left:30px;font-weight:bold;font-size:12px;">IFSCode</span>'
                                +'</div>'
                                +'<input type="text" value="'+$('#IFSCode').val()+'" name="_IFSCode" id="_IFSCode" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group">'
                            +'<div class="input-group">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="padding-left:57px;font-weight:bold;font-size:12px;">INR</span>'
                                +'</div>'
                                +'<input type="number"  value="'+$('#Amount').val()+'" name="_Amount" id="_Amount" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group">'
                            +'<div class="input-group mt-1">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="padding-left:27px;font-weight:bold;font-size:12px;">Remarks</span>'
                                +'</div>'
                                +'<input type="text"  value="'+$('#Remarks').val()+'"   name="_Remarks" id="_Remarks" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>'
                          +'<div class="form-group">'
                            +'<div class="input-group mt-1">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="padding-left:27px;font-weight:bold;font-size:12px;">Charges</span>'
                                +'</div>'
                                +'<input type="text"  value="'+charge+'"   name="_Remarks" id="_Remarks" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group"> '
                            +'<div class="input-group mt-1">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1"  style="padding-left:56px;font-weight:bold;font-size:12px;">+91</span>'
                                +'</div>'
                                +'<input type="number" value="'+$('#CustomerMobileNumber').val()+'" name="_CustomerMobileNumber" id="_CustomerMobileNumber" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>';
                            
                $('#xconfrimation_text').html(txt);    
               $('#ConfirmationPopup').modal("show");
            
            return false;
        } else {
            return true;
        } 
    
}

     function doConfrim() {   
          IsConfirm++;
         $("#confrimation_text").html(loading);
     $('#submitRequest').trigger("click");     
}
/*

Money transfer
upto 3,000 Rs. 10,
3001 to 7,000 Rs. 15,
7001 to 10,000 Rs. 20.
*/
</script>
 <?php  if (sizeof($benifechery_details)>0) { ?>
                          <script> valid_ifscode = 1;</script>
 <?php } ?>