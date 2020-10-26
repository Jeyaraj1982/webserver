<style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px}
</style>
    <div class=""> 
        <div class="container" style="margin-top:0px !important;padding:0px;">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="background: none;">
                            <div class="card-header">
                                <div class="card-title" style="text-align: center;">Money Transfer</div>
                            </div>
                            <?php
                                $_OPERATOR = "MTB";
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
                            ?>
                            <?php if ($enable) { ?>
                                <?php if (isset($_POST['submitRequest'])) { ?>
                                    <script>$('#myModal').modal("show");</script>
                                    <?php                          
                                    $number = $_POST['region']."-".$_POST['number'];
                                /*    $result = $application->doMoneyTransfer(array("MemberID"              => $_SESSION['User']['MemberID'],
                                                                             "operator"             => $data[0]['OperatorLAPUCode'],
                                                                             "particulars"          => $data[0]['OperatorType']."MoneyTransfer ".$number,
                                                                             "number"               => $_POST['MobileNumber'],
                                                                             "CustomerMobileNumber" => $_POST['CustomerMobileNumber'],
                                                                             "Remarks"              => $_POST['Remarks'],
                                                                             "AccountName"          => $_POST['AccountName'],
                                                                             "markascredit"         => $_POST['markascredit'],
                                                                             "credit_nickname"      => $_POST['credit_nickname'],
                                                                             "IFSCode"              => $_POST['IFSCode'],
                                                                             "CrAmount"             => $_POST['CrAmount'],
                                                                             "amount"               => $_POST['Amount']));   */
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
                                                <?php echo $result['number']; ?><br>
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
                            <div class="card-body" style="padding:0px;">
                                <form action="" method="post" id="frm_moneytransfer" onsubmit="return beforeSubmit()">
                                    <div class="row" style="margin-bottom:0px;">
                                        <label for="exampleInputEmail1" style="text-transform: none;padding-left: 4px;padding-bottom: 2px;;">Account Name</label>
                                        <input type="text" value="<?php echo isset($_POST['AccountName']) ? $_POST['AccountName'] : "";?>" maxlength="30" name="AccountName" id="AccountName" class="form-control" placeholder="Account Name" >
                                        <div class="errorstring" id="ErrAccountName"></div>                                    
                                    </div>
                                    <div class="row" style="margin-bottom:0px;">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1" style="padding-left:9px;font-weight:bold;font-size:12px;">A/c Number</span>
                                            </div>
                                            <input type="number" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>" maxlength="30" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="Account Number" >
                                        </div>
                                        <div class="errorstring" id="ErrAccountNumber"></div>                                    
                                    </div>

                                    <div class="row" style="margin-bottom:0px;">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1" style="padding-left:32px;font-weight:bold;font-size:12px;">IFSCode</span>
                                            </div>
                                            <input type="text" onblur="getIFSCode()" value="<?php echo isset($_POST['IFSCode']) ? $_POST['IFSCode'] : "";?>" maxlength="11" name="IFSCode" id="IFSCode" class="form-control" placeholder="IFSCode" style="text-transform:uppercase;">
                                            <div class="col-sm-12" id="result_div" style="padding:0px;"></div>
                                        </div>
                                        <div class="errorstring" id="ErrIFSCode"></div>
                                    </div>
                                    <div class="row" style="margin-bottom:0px;">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1" style="padding-left:59px;font-weight:bold;font-size:12px;">INR</span>
                                            </div>
                                            <input type="number"  value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" maxlength="7" name="Amount" id="Amount" class="form-control" placeholder="Amount" >
                                        </div>
                                        <div class="errorstring" id="ErrAmount"></div>                                    
                                    </div> 
                                    <div class="row" style="margin-bottom:0px;">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1" style="padding-left:30px;font-weight:bold;font-size:12px;">Remarks</span>
                                            </div>
                                            <input type="text"  value="<?php echo isset($_POST['Remarks']) ? $_POST['Remarks'] : "";?>"   name="Remarks" id="Remarks" class="form-control" placeholder="Remarks" >
                                        </div>
                                        <div class="errorstring" id="ErrRemarks"></div>                                    
                                    </div>
                                    <div class="row" style="margin-bottom:0px;">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1" style="padding-left:59px;font-weight:bold;font-size:12px;">+91</span>
                                            </div>
                                            <input type="number"  value="<?php echo isset($_POST['CustomerMobileNumber']) ? $_POST['CustomerMobileNumber'] : "";?>" maxlength="10" name="CustomerMobileNumber" id="CustomerMobileNumber" class="form-control" placeholder="Customer Mobile Number" >
                                        </div>
                                         <div class="errorstring" id="ErrCustomerMobileNumber"></div>
                                    </div>
                                    <div class="row" style="margin-bottom:0px;display: none;">
                                      <div class="checkbox checkbox-success checkbox-inline">
                                        <input type="checkbox" class="checkbox-primary" onclick="do_markascredit()" name="markascredit" id="markascredit">
                                        <label for="markascredit">Mark as credit</label>
                                      </div>
                                      <input type="text" class="form-control" value="" name="credit_nickname" id="credit_nickname" placeholder="Nick Name" style="display: none;margin-top:10px;">
                                      <input type="number" class="form-control" value="" name="CrAmount" id="CrAmount" placeholder="Credit Amount" style="display: none;margin-top:10px;">
                                    </div>
                                    <p align="center" style="color:red" id="error_msg"></p>
                                    <?php  if(isset($error)) { ?>
                                    <div class="row" style="margin-bottom:5px;">
                                        <p align="center" style="color:red" id="error_msg">&nbsp;<?php echo $error;?></p>
                                    </div>
                                    <?php } ?>
                                    <div class="row" style="margin-top:5px;">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 0px;">
                                        <button type="button" class="btn btn-black" onclick="location.href='dashboard.php';" style="background:#6c757d !important;width: 46%;">Back</button>
                                        <button type="submit" class="btn btn-danger" name="submitRequest" style="width: 46%;float:right">Transfer now</button>
                                    </div>                                        
                                </div>
                                </form>         
                            </div>
                            <?php } ?>
                                <?php } else { ?>
                                <div class="row">
                                    <div style="padding:20px;color:red;text-align:center;width:100%;"><?php echo $enable_error;?></div>
                                    <a href="dashboard.php?action=moneytranser_tobank" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
                                    <a href="dashboard.php?action=moneytransfer" class="btn btn-success  glow w-100 position-relative"><i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;">Back</i></a>
                                </div>
                                <?php } ?>
                        </div>
                   </div>
                </div>
          </div>
        </div>
    </div>

<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         <h5 class="modal-title" style="text-align: center;width:100%">Confirmation</h5> <br>
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
 var valid_ifscode = 0;
 
 
 
 
 
function isIfscCodeValid(ifscode) {
    var reg = /^[A-Za-z]{4}[0-9]{6,7}$/
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
                if (!(parseFloat(amt)>=10 && parseFloat(amt)<=7000)) {
                    $('#ErrAmount').html("Amount must have Rs.100 to  Rs.7000");
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
        if (!(parseFloat(amt)>=10 && parseFloat(amt)<=7000)) {
            $('#ErrAmount').html("Amount must have Rs.100 to  Rs.7000");
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
        
        
         
         if (IsConfirm==0 ) {
      
            var txt = '<div class="form-group" style="text-align:left;margin-bottom: -12px;">'
                            +'<span style="font-size:13px;padding-left:3px">Account Name</span>'
                            +'<input type="text" value="'+$('#AccountName').val()+'" name="_AccountName" id="_AccountName" class="form-control" disabled="disabled">'
                        +'</div>'
                        +'<div class="form-group" style="margin-bottom: -14px;">'                
                            +'<div class="input-group">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="padding-left:9px;font-weight:bold;font-size:12px;">A/c Number</span>'
                                +'</div>'
                                +'<input type="text" value="'+$('#MobileNumber').val()+'" name="_MobileNumber" id="_MobileNumber" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group" style="margin-bottom: -10px;">'
                            +'<div class="input-group mt-1">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="padding-left:30px;font-weight:bold;font-size:12px;">IFSCode</span>'
                                +'</div>'
                                +'<input type="text" value="'+$('#IFSCode').val()+'" name="_IFSCode" id="_IFSCode" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group" style="margin-bottom: -14px;">'
                            +'<div class="input-group">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="padding-left:57px;font-weight:bold;font-size:12px;">INR</span>'
                                +'</div>'
                                +'<input type="number"  value="'+$('#Amount').val()+'" name="_Amount" id="_Amount" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group" style="margin-bottom: -14px;">'
                            +'<div class="input-group mt-1">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="padding-left:27px;font-weight:bold;font-size:12px;">Remarks</span>'
                                +'</div>'
                                +'<input type="text"  value="'+$('#Remarks').val()+'"   name="_Remarks" id="_Remarks" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group" style="margin-bottom: -12px;"> '
                            +'<div class="input-group mt-1">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1"  style="padding-left:56px;font-weight:bold;font-size:12px;">+91</span>'
                                +'</div>'
                                +'<input type="number" value="'+$('#CustomerMobileNumber').val()+'" name="_CustomerMobileNumber" id="_CustomerMobileNumber" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>'
                         +'<div class="form-group" style="margin-bottom: -12px;"> '
                            +'<div class="input-group mt-1">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1"  style="padding-left:36px;font-weight:bold;font-size:12px;">Charge</span>'
                                +'</div>'
                                +'<input type="number" value="15.00" name="_CustomerMobileNumber" id="_CustomerMobileNumber" class="form-control" disabled="disabled">'
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
    $("#confrimation_text").html(loading);
    var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-secondary btn-sm' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=moneytransfer_tobank\"'>Next Transfer</button></div>";
    $("#confrimation_text").html(loading);
    
    $.post( "webservice.php?action=doMoneyTransfer",  $( "#frm_moneytransfer" ).serialize(),function( data ) {
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
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://www.saralservices.in/app/assets/tick.jpg' style='width:128px'><br><br>Transfer Request Submitted<br>A/C Number: "+obj.number+"<br>IFSC Code: "+obj.ifsccode+"<br>Amount: "+obj.amount+"<br>Saral ID: "+obj.txnid+"<br>Bank Ref : "+obj.operatorid+"<br>Balance: "+obj.balance+"</div>";
            html += "<br>" + buttons;
            $('#balance_div').html("Rs. "+obj.balance);
        }
        $("#confrimation_text").html(html);
    });
}
</script>