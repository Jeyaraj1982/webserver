<?php              
$data = $mysql->select("select * from `_tbl_payout_banktransfer` where  `BankTransferID`='".$_GET['id']."'");
if (isset($_POST['updateBtn'])) {
    
    $error =0;     
           if($_POST['AccountName']==""){
             $error++;
             $errorAccountName="Please Enter Account Name.";  
           }
           if(strlen($_POST['AccountName'])<3){
             $error++;
             $errorAccountName="Please Enter Valid Account Name.";  
           } 
            $regex = '/^[a-z0-9\-\s]+$/i'; 
            if (!(preg_match($regex, $_POST['AccountName']))) {
                $error++;
                $errorAccountName="AccountName is an invalid. Please try again.";
            }
            if($_POST['AccountNumber']==""){
             $error++;
             $errorAccountNumber="Please Enter Account Number.";  
           }
           if(strlen($_POST['AccountNumber'])<6){
             $error++;
             $errorAccountNumber="Please Enter Valid Account Number.";  
           } 
           $regex = '/^[\w.]+$/i';
            if (!(preg_match($regex, $_POST['AccountNumber']))) {
                $error++;
                $errorAccountNumber="AccountNumber is an invalid. Please try again.";
            }
            if($_POST['AccountIFSCode']==""){
             $error++;
             $errorAccountIFSCode="Please Enter IFSCode.";  
           }
           if(strlen($_POST['AccountIFSCode'])<6){
             $error++;
             $errorAccountIFSCode="Please Enter Valid IFSCode.";  
           } 
           $regex = '/^[A-Za-z]{4}[A-Za-z0-9]{6,7}$/';
            if (!(preg_match($regex, $_POST['AccountIFSCode']))) {
                $error++;
                $errorAccountIFSCode="IFSCode is an invalid. Please try again.";
            }
                                             
      
        if ($error==0) {
            $Bank = $mysql->select("select * from _tbl_member_bank_details where MemberID='".$data[0]['MemberID']."'");
            
            if(sizeof($Bank)==0){
                $mysql->insert("_tbl_member_bank_details",array("MemberID"      => $data[0]['MemberID'],
                                                                "AccountName"   => $_POST['AccountName'],
                                                                "AccountNumber" => $_POST['AccountNumber'],
                                                                "IFSCode"       => $_POST['AccountIFSCode'],
                                                                "CreatedOn"     => date("Y-m-d H:i:s")));
            }
            $PaymentTransferOn = $_POST['year']."-".$_POST['month']."-".$_POST['date'];
            $mysql->execute("update _tbl_payout_banktransfer set AccountName       = '".$_POST['AccountName']."',
                                                                 AccountNumber     = '".$_POST['AccountNumber']."',
                                                                 AccountIFSCode    = '".$_POST['AccountIFSCode']."' ,
                                                                 ModeOfPayment     = '".$_POST['ModeOfPayment']."' ,
                                                                 BankTransactionID = '".$_POST['BankTransactionID']."' ,
                                                                 PaymentRemarks    = '".$_POST['PaymentRemarks']."' ,
                                                                 PaymentTransferOn = '".$PaymentTransferOn."'
                                                                 where BankTransferID='".$data[0]['BankTransferID']."'");
              
            ?>
           <script>
            $(document).ready(function() {
                swal("Bank Information updated successfully", {
                    icon : "success" 
                });
            });   
            </script>
            <?php
                                                    
        }                                                                                                
}
if (isset($_POST['PaidBtn'])) {
    
    $error =0;     
           if($_POST['AccountName']==""){
             $error++;
             $errorAccountName="Please Enter Account Name.";  
           }
           if(strlen($_POST['AccountName'])<3){
             $error++;
             $errorAccountName="Please Enter Valid Account Name.";  
           } 
            $regex = '/^[a-z0-9\-\s]+$/i'; 
            if (!(preg_match($regex, $_POST['AccountName']))) {
                $error++;
                $errorAccountName="AccountName is an invalid. Please try again.";
            }
            if($_POST['AccountNumber']==""){
             $error++;
             $errorAccountNumber="Please Enter Account Number.";  
           }
           if(strlen($_POST['AccountNumber'])<6){
             $error++;
             $errorAccountNumber="Please Enter Valid Account Number.";  
           } 
           $regex = '/^[\w.]+$/i';
            if (!(preg_match($regex, $_POST['AccountNumber']))) {
                $error++;
                $errorAccountNumber="AccountNumber is an invalid. Please try again.";
            }
            if($_POST['AccountIFSCode']==""){
             $error++;
             $errorAccountIFSCode="Please Enter IFSCode.";  
           }
           if(strlen($_POST['AccountIFSCode'])<6){
             $error++;
             $errorAccountIFSCode="Please Enter Valid IFSCode.";  
           } 
           $regex = '/^[A-Za-z]{4}[A-Za-z0-9]{6,7}$/';
            if (!(preg_match($regex, $_POST['AccountIFSCode']))) {
                $error++;
                $errorAccountIFSCode="IFSCode is an invalid. Please try again.";
            }
                                             
      
        if ($error==0) {
            $Bank = $mysql->select("select * from _tbl_member_bank_details where MemberID='".$data[0]['MemberID']."'");
            
            if(sizeof($Bank)==0){
                $mysql->insert("_tbl_member_bank_details",array("MemberID"      => $data[0]['MemberID'],
                                                                "AccountName"   => $_POST['AccountName'],
                                                                "AccountNumber" => $_POST['AccountNumber'],
                                                                "IFSCode"       => $_POST['AccountIFSCode'],
                                                                "CreatedOn"     => date("Y-m-d H:i:s")));
            }
            $PaymentTransferOn = $_POST['year']."-".$_POST['month']."-".$_POST['date'];
            $mysql->execute("update _tbl_payout_banktransfer set AccountName       = '".$_POST['AccountName']."',
                                                                 AccountNumber     = '".$_POST['AccountNumber']."',
                                                                 AccountIFSCode    = '".$_POST['AccountIFSCode']."' ,
                                                                 ModeOfPayment     = '".$_POST['ModeOfPayment']."' ,
                                                                 BankTransactionID = '".$_POST['BankTransactionID']."' ,
                                                                 PaymentRemarks    = '".$_POST['PaymentRemarks']."' ,
                                                                 PaymentTransferOn = '".$PaymentTransferOn."',
                                                                 IsProcessed       = '1' ,
                                                                 ProcessedOn       = '".date("Y-m-d H:i:s")."'
                                                                 where BankTransferID='".$data[0]['BankTransferID']."'");
              
            ?>
           <script>
            $(document).ready(function() {
                swal("Paid successfully", {
                    icon : "success" 
                });
            });   
            </script>
            <?php
                                                    
        }                                                                                                
}
if (isset($_POST['reverseBtn'])) {
    
            
            $mysql->execute("update _tbl_payout_banktransfer set IsProcessed       = '2' ,
                                                                 ProcessedOn       = '".date("Y-m-d H:i:s")."',
                                                                 PaymentRemarks    = '".$_POST['PaymentRemarks']."',
                                                                 BankTransactionID = '',
                                                                 ModeOfPayment     = ''
                                                                 where BankTransferID='".$data[0]['BankTransferID']."'");
            
            $mysql->insert("_tbl_wallet_earnings",array("MemberID"          => $data[0]['MemberID'],
                                                        "MemberCode"        => $data[0]['MemberCode'],
                                                        "Particulars"       => "Payout Reversed / ".$data[0]['BankTransferID'],
                                                        "Credits"           => $data[0]['Amount'],
                                                        "Debits"            => "0",
                                                        "AvailableBalance"  => getEarningWalletBalance($data[0]['MemberID'])+$data[0]['Amount'],
                                                        "TxnDate"           => date("Y-m-d H:i:s")));
              
            ?>
           <script>
            $(document).ready(function() {
                swal("Reversed successfully", {
                    icon : "success" 
                });
            });   
            </script>
            <?php
                                                    
        }                                                                                                

$data = $mysql->select("select * from `_tbl_payout_banktransfer` where  `BankTransferID`='".$_GET['id']."'");
$_POST['date']=date("d");
$_POST['month']=date("m");
$_POST['year']=date("Y");
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/MyProfile">Payout Transactions</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/MyProfile">Bank Transfer</a></li>
        </ul>
    </div>
    <div class="row">
     <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Bank Transfer Report</div>
                    </div>
                    <div class="card-body">
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-5 col-md-4 col-sm-5 text-right">MemberID</label>
                                    <div class="col-lg-7 col-md-8 col-sm-7">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberCode'];?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-5 col-md-4 col-sm-5 text-right">Member Name</label>
                                    <div class="col-lg-7 col-md-8 col-sm-">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['MemberName'];?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-5 col-md-4 col-sm-5 text-right">Amount</label>
                                    <div class="col-lg-7 col-md-8 col-sm-7">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['Amount'];?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-5 col-md-4 col-sm-5 text-right">AccountName</label>
                                    <div class="col-lg-7 col-md-8 col-sm-7">
                                    <?php if($data[0]['IsProcessed']=="0" || $data[0]['IsProcessed']=="1"){ ?>
                                        <input class="form-control" type="text" name="AccountName" id="AccountName" value="<?php echo $data[0]['AccountName'];?>">
                                        <div class="help-block" style="color:red" id="ErrAccountName"><?php echo $errorAccountName;?></div>
                                    <?php } else { ?>
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['AccountName'];?></small>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-5 col-md-4 col-sm-5 text-right">AccountNumber</label>
                                    <div class="col-lg-7 col-md-8 col-sm-7">
                                       <?php if($data[0]['IsProcessed']=="0" || $data[0]['IsProcessed']=="1"){ ?>                                              
                                        <input class="form-control" type="text" name="AccountNumber" id="AccountNumber" value="<?php echo isset($_POST['AccountNumber']) ? $_POST['AccountNumber'] : $data[0]['AccountNumber'];?>">
                                        <div class="help-block" style="color:red" id="ErrAccountNumber"><?php echo $errorAccountNumber;?></div>
                                        <?php } else { ?>
                                            <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['AccountNumber'];?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-5 col-md-4 col-sm-5 text-right">AccountIFSCode</label>
                                    <div class="col-lg-7 col-md-8 col-sm-7">
                                        <?php if($data[0]['IsProcessed']=="0" || $data[0]['IsProcessed']=="1"){ ?>
                                        <input class="form-control" type="text" name="AccountIFSCode" id="AccountIFSCode" value="<?php echo isset($_POST['AccountIFSCode']) ? $_POST['AccountIFSCode'] : $data[0]['AccountIFSCode'];?>">
                                        <div class="help-block" style="color:red" id="ErrAccountIFSCode"><?php echo $errorAccountIFSCode;?></div>
                                        <?php } else { ?>
                                            <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['AccountIFSCode'];?></small>
                                        <?php } ?>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-5 col-md-4 col-sm-5 text-right">Mode of Payment</label>
                                    <div class="col-lg-7 col-md-8 col-sm-7">
                                        <?php if($data[0]['IsProcessed']=="0" || $data[0]['IsProcessed']=="1"){ ?>
                                        <select name="ModeOfPayment" id="ModeOfPayment" class="form-control">
                                            <option value="Cash" <?php echo (isset($_POST[ 'ModeOfPayment'])) ? (($_POST[ 'ModeOfPayment']== "Cash") ? " selected='selected' " : "") : (($data[0][ 'ModeOfPayment']== "Cash") ? " selected='selected' " : "");?>>Cash</option>
                                            <option value="Bank Transfer" <?php echo (isset($_POST[ 'ModeOfPayment'])) ? (($_POST[ 'ModeOfPayment']== "Bank Transfer") ? " selected='selected' " : "") : (($data[0][ 'ModeOfPayment']== "Bank Transfer") ? " selected='selected' " : "");?>>Bank Transfer</option>
                                        </select>
                                        <div class="help-block" style="color:red" id="ErrModeOfPayment"><?php echo $errorModeOfPayment;?></div>
                                        <?php } else { ?>
                                            <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['ModeOfPayment'];?></small>
                                        <?php } ?>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-5 col-md-4 col-sm-5 text-right">BankTransactionID</label>
                                    <div class="col-lg-7 col-md-8 col-sm-7">
                                        <?php if($data[0]['IsProcessed']=="0" || $data[0]['IsProcessed']=="1"){ ?>
                                        <input class="form-control" type="text" name="BankTransactionID" id="BankTransactionID" value="<?php echo isset($_POST['BankTransactionID']) ? $_POST['BankTransactionID'] : $data[0]['BankTransactionID'];?>">
                                        <div class="help-block" style="color:red" id="ErrBankTransactionID"><?php echo $errorBankTransactionID;?></div>
                                        <?php } else { ?>
                                            <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['BankTransactionID'];?></small>
                                        <?php } ?>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-5 col-md-4 col-sm-5 text-right">Is Paid</label>
                                    <div class="col-lg-7 col-md-8 col-sm-7">
                                        <small id="emailHelp" class="form-text text-muted">:&nbsp;
                                            <?php if($data[0]['IsProcessed']=="1"){ 
                                                    echo "Paid";
                                                  } if($data[0]['IsProcessed']=="0") { 
                                                    echo "Unpaid";
                                                  }if($data[0]['IsProcessed']=="2") { 
                                                    echo "Reversed";    
                                                  }
                                            ?>
                                        </small>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <?php if($data[0]['IsProcessed']=="0" || $data[0]['IsProcessed']=="1"){ ?>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-5 col-md-4 col-sm-5 text-right">Payment Transfer On</label>
                                    <div class="col-lg-7 col-md-8 col-sm-7">
                                        <?php if($data[0]['IsProcessed']=="0"  || $data[0]['IsProcessed']=="1"){ ?>
                                            <div class="form-group row" style="padding: 0px;">
                                                <div class="col-sm-3">
                                                    <select required="" name="date" id="date" class="form-control" style="width: 83px;">
                                                        <?php for($i=1;$i<=31;$i++) { ?>
                                                        <option value="<?php echo $i;?>" <?php echo ($_POST['date']==$i) ? " selected='selected' " : "";?> ><?php echo $i;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-5" >
                                                    <?php $month_array = array("","JAN","FEB","MAR","APR","MAY","JUN","JLY","AUG","SEP","OCT","NOV","DEC"); ?>
                                                    <select name="month" class="form-control"  style="padding-left:5px;text-align:center;width:140px">
                                                        <?php for($i=1;$i<=12;$i++) { ?>
                                                        <option value="<?php echo $i;?>" <?php echo ($_POST['month']==$i) ? " selected='selected' " : "";?> ><?php echo $month_array[$i];?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>                                                                    
                                                <div class="col-md-4">
                                                    <select name="year"  class="form-control" style="padding-left:5px;text-align:center">
                                                        <?php for($i=date("Y")-10;$i<=date("Y");$i++) { ?>
                                                        <option value="<?php echo $i;?>" <?php echo ($_POST['year']==$i) ? " selected='selected' " : "";?> ><?php echo $i;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>  
                                        <div class="help-block" style="color:red" id="ErrPaymentTransferOn"><?php echo $errorPaymentTransferOn;?></div>
                                        <?php } else { ?>
                                            <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['PaymentTransferOn'];?></small>
                                        <?php } ?>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <?php } ?>
						<div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group form-show-validation row">
                                    <label for="email" class="col-lg-5 col-md-4 col-sm-5 text-right">Remarks</label>
                                    <div class="col-lg-7 col-md-8 col-sm-7">
                                        <?php if($data[0]['IsProcessed']=="0" || $data[0]['IsProcessed']=="1"){ ?>
                                            <textarea class="form-control" name="PaymentRemarks" id="PaymentRemarks"><?php echo isset($_POST['PaymentRemarks']) ? $_POST['PaymentRemarks'] : $data[0]['PaymentRemarks'];?></textarea>
                                            <div class="help-block" style="color:red"><?php echo $errorPaymentRemarks;?></div>
                                        <?php } else { ?>
                                            <small id="emailHelp" class="form-text text-muted">:&nbsp;<?php echo $data[0]['PaymentRemarks'];?></small>
                                        <?php } ?>
                                    </div>
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div>
            <div class="row">  
                <div class="col-md-12 text-right">
                    <?php if($data[0]['IsProcessed']=="0" || $data[0]['IsProcessed']=="1"){ ?>
                        <button type="button" onclick="CallUpdateConfirmation()" class="btn btn-warning waves-effect waves-light">Save</button>
                        <button type="submit" name="updateBtn" id="updateBtn" class="btn btn-warning waves-effect waves-light" style="display: none;">Save</button>
                    <?php } ?>
					<?php if($data[0]['IsProcessed']=="0"){ ?>
                        <button type="button" onclick="CallPaidConfirmation()" class="btn btn-success waves-effect waves-light">Paid</button>
                        <button type="submit" name="PaidBtn" id="PaidBtn" class="btn btn-success waves-effect waves-light" style="display: none;">Paid</button>
                        
                        <button type="button" onclick="CallReverseConfirmation()" class="btn btn-primary waves-effect waves-light">Reverse</button>
                        <button type="submit" name="reverseBtn" id="reverseBtn" class="btn btn-primary waves-effect waves-light" style="display: none;">Reverse</button>
                    <?php } ?>
                    <a href="dashboard.php?action=Payout/BankTransfer"  class="btn btn-danger waves-effect waves-light">Cancel</a>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<script>

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
function isIfscCodeValid(ifscode) {
        var reg = /^[A-Za-z]{4}[0-9]{6,7}$/
        var reg = /^[A-Za-z]{4}[A-Za-z0-9]{6,7}$/
        if (ifscode.match(reg)) {
            return true
        }
        return false;
    }
$(document).ready(function(){
       
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
        
        $("#AccountNumber").blur(function() {
            $('#ErrAccountNumber').html("");
            var ac_number = $('#AccountNumber').val().trim();
            if (ac_number.length==0) {
                $('#ErrAccountNumber').html("Please enter Account Number");
            } else {
                if (!(is_valid_bank_account_number(ac_number))) {
                    $('#ErrAccountNumber').html("Account number is invalid");
                }
            }
        });
        
        $("#AccountIFSCode").blur(function() {
            $('#ErrAccountIFSCode').html("");
            var ifsc = $('#AccountIFSCode').val().trim();
            if (ifsc.length==0) {
                $('#ErrAccountIFSCode').html("Please Enter IFSCode");
            } else {
                if(!(isIfscCodeValid($('#AccountIFSCode').val()))) {
                    $('#ErrAccountIFSCode').html("IFSCode is invalid");
                }
            }
        });
        
    });
     function CallUpdateConfirmation(){
         ErrorCount=0;
            $('#ErrAccountName').html("");  
            $('#ErrAccountNumber').html(""); 
            $('#ErrAccountIFSCode').html("");
            
            var ac_name = $('#AccountName').val().trim();
            if (ac_name.length==0) {
                $('#ErrAccountName').html("Please enter Account Name"); 
                ErrorCount++;
            } else {
                if (!(is_valid_bank_account_name(ac_name))) {
                    $('#ErrAccountName').html("Account name is invalid");
                    ErrorCount++;
                }
            }
            var ac_number = $('#AccountNumber').val().trim();
            if (ac_number.length==0) {
                $('#ErrAccountNumber').html("Please enter Account Number");
                ErrorCount++;
            } else {
                if (!(is_valid_bank_account_number(ac_number))) {
                    $('#ErrAccountNumber').html("Account number is invalid"); 
                    ErrorCount++;
                }
            }
            $('#ErrAccountIFSCode').html("");
            var ifsc = $('#AccountIFSCode').val().trim();
            if (ifsc.length==0) {
                $('#ErrAccountIFSCode').html("Please Enter IFSCode");
                ErrorCount++;
            } else {
                if(!(isIfscCodeValid($('#AccountIFSCode').val()))) {
                    $('#ErrAccountIFSCode').html("IFSCode is invalid");
                    ErrorCount++;
                }
            }
            if(ErrorCount==0){
                var txt ='<div class="modal-header">'
                            +'<h4 class="heading"><strong>CONFIRMATION</strong> </h4>'
                            +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                                +'<span aria-hidden="true" class="white-text">&times;</span>'
                            +'</button>'
                        +'</div>'
                        +'<div class="modal-body">'                                                                     
                            +'<div class="form-group row">'                                                          
                                +'<div class="col-sm-12" style="text-align:center">'
                                    +'Are you sure want to update information?'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                        +'<div class="modal-footer flex-right">'
                            +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                            +'<button type="button" class="btn btn-danger" onclick="UpdateInformation()" >Yes, Confirm</button>'
                        +'</div>';
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
        }else{
            return false;
        }
}
function UpdateInformation() {
    $("#updateBtn" ).trigger( "click" );
}        
function CallPaidConfirmation(){
         ErrorCount=0;
            $('#ErrAccountName').html("");  
            $('#ErrAccountNumber').html(""); 
            $('#ErrAccountIFSCode').html("");
            
            var ac_name = $('#AccountName').val().trim();
            if (ac_name.length==0) {
                $('#ErrAccountName').html("Please enter Account Name"); 
                ErrorCount++;
            } else {
                if (!(is_valid_bank_account_name(ac_name))) {
                    $('#ErrAccountName').html("Account name is invalid");
                    ErrorCount++;
                }
            }
            var ac_number = $('#AccountNumber').val().trim();
            if (ac_number.length==0) {
                $('#ErrAccountNumber').html("Please enter Account Number");
                ErrorCount++;
            } else {
                if (!(is_valid_bank_account_number(ac_number))) {
                    $('#ErrAccountNumber').html("Account number is invalid"); 
                    ErrorCount++;
                }
            }
            $('#ErrAccountIFSCode').html("");
            var ifsc = $('#AccountIFSCode').val().trim();
            if (ifsc.length==0) {
                $('#ErrAccountIFSCode').html("Please Enter IFSCode");
                ErrorCount++;
            } else {
                if(!(isIfscCodeValid($('#AccountIFSCode').val()))) {
                    $('#ErrAccountIFSCode').html("IFSCode is invalid");
                    ErrorCount++;
                }
            }
            if(ErrorCount==0){
                var txt ='<div class="modal-header">'
                            +'<h4 class="heading"><strong>CONFIRMATION</strong> </h4>'
                            +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                                +'<span aria-hidden="true" class="white-text">&times;</span>'
                            +'</button>'
                        +'</div>'
                        +'<div class="modal-body">'                                                                     
                            +'<div class="form-group row">'                                                          
                                +'<div class="col-sm-12" style="text-align:center">'
                                    +'Are you sure want to paid?'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                        +'<div class="modal-footer flex-right">'
                            +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                            +'<button type="button" class="btn btn-danger" onclick="Paid()" >Yes, Confirm</button>'
                        +'</div>';
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
        }else{
            return false;
        }
}
function Paid() {
    $("#PaidBtn" ).trigger( "click" );
}                  
function CallReverseConfirmation(){
    var txt ='<div class="modal-header">'
                +'<h4 class="heading"><strong>CONFIRMATION</strong> </h4>'
                +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                    +'<span aria-hidden="true" class="white-text">&times;</span>'
                +'</button>'
            +'</div>'
            +'<div class="modal-body">'                                                                     
                +'<div class="form-group row">'                                                          
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'Are you sure want to reverse?'
                    +'</div>'
                +'</div>'
            +'</div>'
            +'<div class="modal-footer flex-right">'
                +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                +'<button type="button" class="btn btn-danger" onclick="Reverse()" >Yes, Confirm</button>'
            +'</div>';
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
function Reverse() {
    $("#reverseBtn" ).trigger( "click" );
}
</script>