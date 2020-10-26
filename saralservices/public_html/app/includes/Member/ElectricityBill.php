
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">TNEB</div>
                        </div>
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
                        $mem = $mysql->select("select * from _tbl_Members where MemberID='".$_SESSION['User']['MemberID']."'");;
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
                                        
                                        <a href="dashboard.php?action=bill_tneb" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
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
                            <div class="card-body">
                                <form action="" method="post" id="frm_tneb" onsubmit="return checkInputs();">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-lg-12 col-md-12 col-sm-12">      
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
                                                            <span class="input-group-text" onclick="GetTNEBUsers()" id="basic-addon1"><i class="icon-user"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                    <?php 
                                                        if(isset($_GET['ebnumber']))  {
                                                            $ebnumber=$_GET['ebnumber'];
                                                        } else {
                                                            $ebnumber ="";
                                                        }
                                                    ?>
                                                    <input type="number" onblur="getDetails()"  value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $ebnumber;?>" maxlength="15" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="TNEB Number" style="margin-top: 5px;">
                                                    <div class="errorstring" id="ErrTNEBNumber" style="float: right;"></div> 
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text  btn-sm" id="basic-addon1">INR</span>
                                                        </div>
                                                        <input type="number" class="form-control  btn-sm"  value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" id="Amount" name="Amount" placeholder="Amount" style="font-size:16px" maxlength="12">
                                                    </div>
                                                    <span class="errorstring" id="ErrAmount" style="float: right;" ></span>
                                                </div>
                                            </div>   
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text btn-sm" id="basic-addon1">+91</span>
                                                        </div>
                                                        <input type="number" class="form-control" value="<?php echo isset($_POST['CustomerMobileNumber']) ? $_POST['CustomerMobileNumber'] : "";?>" id="CustomerMobileNumber" name="CustomerMobileNumber" placeholder="Customer Mobile Number" maxlength="10">
                                                    </div>
                                                    <div class="errorstring" id="ErrCustomerMobileNumber" style="float: right;"></div>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="checkbox checkbox-danger checkbox-inline">
                                                        <input type="checkbox" class="checkbox-danger" name="whatsappRequired" id="whatsappRequired">
                                                        <label for="whatsappRequired">Require Whatsapp Receipt</label>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--    <div class="row" style="margin-bottom:15px;">
                                                <div class="col-lg-12 col-md-12 col-sm-12">   
                                                    <div class="checkbox checkbox-success checkbox-inline">
                                                        <input type="checkbox" class="checkbox-primary" onclick="do_markascredit()" name="markascredit" id="markascredit">
                                                        <label for="markascredit">Mark as credit</label>
                                                    </div>
                                                    <input type="text" class="form-control" value="" name="credit_nickname" id="credit_nickname" placeholder="Nick Name" style="display: none;margin-top:10px;">
                                                    <input type="number" class="form-control" value="" name="CrAmount" id="CrAmount" placeholder="Credit Amount" style="display: none;margin-top:10px;">
                                                </div>
                                                <p align="center" style="color:red" id="error_msg"></p>
                                            </div>  -->
                                            <?php if(isset($error)){?>
                                            <div class="row" style="margin-bottom:5px;">
                                                <p align="center" style="color:red" id="error_msg">&nbsp;<?php echo $error;?></p>
                                            </div>
                                            <?php } ?>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <button type="submit" class="btn btn-primary  btn-sm" name="submitRequest">Pay now</button>
                                                </div>                                        
                                            </div>
                                            
                                        </div>
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
                <div class="col-md-5">
                <div class="card" style="margin-bottom:5px;">
                <div class="card-body" id="result_div">
                    <div style="padding:100px 95px;color:#ccc;text-align: center;font-size: 16px;">
                        Enter the tneb number to view customer information
                    </div> 
                </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                             <div class="card-title">Recent Transactions</div>
                        </div>
                    <div class="card-body" id="recentRecharges">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Txn ID</th>
                                            <th>Txn Date</th>
                                            <th>Number</th>                                                                                           
                                            <th>Operator</th>                                                                                           
                                            <th>Amount</th>                                                                                           
                                            <th>Status</th>                                                                                           
                                            <th>Operator ID</th>                                                                                           
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php foreach($txn as $t){ ?>
                                        <tr>
                                            <td><?php echo $t['txnid'];?></td>
                                            <td><?php echo $t['txndate'];?></td>
                                            <td><?php echo $t['rcnumber'];?></td>
                                            <td><?php echo $operatorName[$t['operatorcode']];?></td>
                                            <td style="text-align: right"><?php echo  number_format($t['rcamount'],2);?></td>
                                            <td><?php 
                                            if ($t['TxnStatus']=="failure") {
                                                echo "<span style='background:red;color:#fff;padding:3px 10px;border-radius:5px' title='".$t['msg']."'>Failure</span>";
                                            } elseif ($t['TxnStatus']=="success") {
                                                echo "<span style='background:green;color:#fff;padding:3px 10px;border-radius:5px'>Success</span>";
                                            } else {
                                               echo "<span style='background:Orange;color:#fff;padding:3px 10px;border-radius:5px'>Pending</span>"; 
                                            }
                                              ?></td>
                                            <td style="text-align: right"><?php echo strlen($t['OperatorNumber'])>3 ? $t['OperatorNumber'] : "";?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;">
         
         </div>
         <div style="padding:20px;text-align:center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-warning" onclick="doConfrim()">Confirm</button>
         </div>
      </div>
    </div>
  </div>
</div>


<script>
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

 var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://www.saralservices.in/app/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";

function getDetails() {
    $('#ConfirmationPopup').modal("hide");
    if ($('#MobileNumber').val().length>7){
     $('#result_div').html(loading);
        
        $.post( "webservice.php?action=getTNEBDetails",  $( "#frm_tneb" ).serialize(),function( data ) {
        var obj = JSON.parse(data); 
                     
        if (obj.error=="0") {
          var resHtml= '<div style="background:#fcfcfc;border-radius:5px;padding:10px 15px"><div class="row"><div class="col-4">Name</div><div class="col-8">: '+obj.billerName+'</div><div class="col-4">Amount</div><div class="col-8">: '+obj.billAmount+'</div><div class="col-4">Bill Date</div><div class="col-8">: '+obj.billDate+'</div><div class="col-4">Due Date</div><div class="col-8">: '+obj.dueDate+'</div></div></div>';   
             $('#result_div').html(resHtml);
             $('#Amount').val(obj.billAmount);
             } else {
                 $('#result_div').html(obj.errMsg);
             }
          });
    }
}

var IsConfirm=0;

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
                                    +'<span class="input-group-text" id="basic-addon1"  style="padding-left:14px;font-weight:bold;font-size:12px;">EB Number</span>'
                                +'</div>'
                                +'<input type="text" value="'+$('#region').val()+'-'+$('#MobileNumber').val()+'" class="form-control" disabled="disabled">'
                            + '</div>'
                        +'</div>'
                        +'<div class="form-group" style="margin-bottom: -14px;">'
                            +'<div class="input-group">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1" style="padding-left:57px;font-weight:bold;font-size:12px;">INR</span>'
                                +'</div>'
                                +'<input type="text"  value="'+$('#Amount').val()+'" name="_Amount" id="_Amount" class="form-control" disabled="disabled">'
                            +'</div>'
                        +'</div>'
                        +'<div class="form-group" style="margin-bottom: -12px;"> '
                            +'<div class="input-group mt-1">'
                                +'<div class="input-group-prepend">'
                                    +'<span class="input-group-text" id="basic-addon1"  style="padding-left:56px;font-weight:bold;font-size:12px;">+91</span>'
                                +'</div>'
                                +'<input type="text" value="'+$('#CustomerMobileNumber').val()+'" name="_CustomerMobileNumber" id="_CustomerMobileNumber" class="form-control" disabled="disabled">'
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
                                +'<input type="text" value="'+ (($('#whatsappRequired').prop("checked") == true) ? "10.00" : "8.00") +'" name="_CustomerMobileNumber" id="_CustomerMobileNumber" class="form-control" disabled="disabled">'
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
    
    var buttons ="";
    
    $.post( "webservice.php?action=PayEBBill",  $( "#frm_tneb" ).serialize(),function( data ) {
        var obj = JSON.parse(data); 
        var html = "";
        if (obj.status=="failure") {
            var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-secondary btn-sm' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=ElectricityBill\"'>Next Bill</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=Settings/AddContacts_tneb&id="+obj.txnid+"\"'>Add Contact</button></div>";
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://www.saralservices.in/app/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
            if (parseFloat(obj.balance)>=0) {
                html += "<br>Balance Amount: "+obj.balance
            }
            html += "</div>" +buttons;
            $('#balance_div').html("Rs. "+obj.balance);
        } else {
            var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-secondary btn-sm' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=ElectricityBill\"'>Next Bill</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=Settings/AddContacts_tneb&id="+obj.txnid+"\"'>Add Contact</button></div>";
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://www.saralservices.in/app/assets/tick.jpg' style='width:128px'><br><br>Request Submitted<br>TNEB Number: "+obj.number+"<br>Amount: "+obj.amount+"<br>Txn ID: "+obj.txnid+"<br>Charges ID: "+obj.charged+"<br>Balance Amount: "+obj.balance+"</div>";
            html += "<br>" + buttons;
            $('#balance_div').html("Rs. "+obj.balance);
        }
        $("#confrimation_text").html(html);
    });
}



function do_markascredit() {
if($('#markascredit').prop("checked") == true){
$('#credit_nickname').show();
$('#credit_nickname').attr("required","");
$('#CrAmount').show();
$('#CrAmount').attr("required","");
} else if($('#markascredit').prop("checked") == false) {
$('#credit_nickname').hide();
$('#credit_nickname').removeAttr("required");
$('#CrAmount').hide();
$('#CrAmount').removeAttr("required");
}
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
          