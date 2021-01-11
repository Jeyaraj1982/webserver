
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Add Bank Account Information
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php $bankInformation = $mysql->select("Select * from _tbl_member_banknames where MemberID='".$_SESSION['User']['MemberID']."'  order by BankID desc limit 0,1"); ?>
                            <?php if(sizeof($bankInformation)==0){?>
                                <?php
                                 if (isset($_POST['updateBtn'])) {
                                     $mysql->insert("_tbl_member_banknames",array("MemberID"          => $_SESSION['User']['MemberID'],
                                                                                  "MemberCode"        => $_SESSION['User']['MemberCode'],
                                                                                  "AccountHolderName" => $_POST['AccountHolderName'],
                                                                                  "AccountNumber"     => $_POST['AccountNumber'],
                                                                                  "AccountType"       => $_POST['AccountType'],
                                                                                  "Added"             => date("Y-m-d H:i:s"),
                                                                                  "IFSCode"           => $_POST['IFSCode']));
                                 ?>
                                     
                                     <script>
                                        $(document).ready(function() {
                                            swal("Added successfully", { 
                                                icon:"success",
                                                confirm: {value: 'Continue'}
                                            }).then((value) => {
                                                location.href='Dashboard.php?action=MyBankAccountInformation'
                                            });
                                        });
                                    </script>
                                     <?php
                                 }
                                    
                                ?>
                                <form action="" method="post" onsubmit="return submitbank()">
                                    <div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">A/c holder Name<span id="star">*</span></div>
                                            <div class="col-sm-9">
                                                <input type="text" name="AccountHolderName" id="AccountHolderName"  class="form-control" value="<?php echo isset($_POST['AccountHolderName']) ? $_POST['AccountHolderName'] : $bankInformation[0]['AccountHolderName'];?>">
                                                <span class="errorstring" id="ErrAccountHolderName"><?php echo isset($ErrAccountHolderName)? $ErrAccountHolderName : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">Account Number<span id="star">*</span></div>
                                            <div class="col-sm-9">
                                                <input type="text" name="AccountNumber" id="AccountNumber" class="form-control" value="<?php echo $bankInformation[0]['AccountNumber'];?>">
                                                <span class="errorstring" id="ErrAccountNumber"><?php echo isset($ErrAccountNumber)? $ErrAccountNumber : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">A/c Type<span id="star">*</span></div>
                                            <div class="col-sm-3">
                                                <select class="form-control" name="AccountType" id="AccountType">
                                                    <option value="Savings" <?php echo (isset($_POST[ 'AccountType'])) ? (($_POST[ 'AccountType']=="Savings") ? " selected='selected' " : "") : (($bankInformation[0]['AccountType']=="Savings") ? " selected='selected' " : "");?>>Savings</option>                        
                                                    <option value="Current" <?php echo (isset($_POST[ 'AccountType'])) ? (($_POST[ 'AccountType']=="Current") ? " selected='selected' " : "") : (($bankInformation[0]['AccountType']=="Current") ? " selected='selected' " : "");?>>Current</option>                        
                                                </select>
                                            </div>                            
                                            <div class="col-sm-2">IFS Code<span id="star">*</span></div>
                                            <div class="col-sm-4">
                                                <input type="text" name="IFSCode" id="IFSCode" class="form-control" value="<?php echo isset($_POST['IFSCode']) ? $_POST['IFSCode'] : $bankInformation[0]['IFSCode'];?>">
                                                <span class="errorstring" id="ErrIFSCode"><?php echo isset($ErrIFSCode)? $ErrIFSCode : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                           <div class="col-sm-12"><button type="submit" name="updateBtn" class="btn btn-primary"  >Update Bank Information</button></div>
                                        </div>
                                    </div>  
                                </form>
                                <?php } else {?>
                                     <div class="form-group row" style="text-align:center;">
                                       <div class="col-sm-12"><a class="btn btn-primary" href="Dashboard.php?action=MyBankAccountInformation">View Bank Account Information</a></div>
                                    </div>  
                                <?php }?>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function isIfscCodeValid(ifscode) {
        var reg = /^[A-Za-z]{4}[0-9]{6,7}$/
        var reg = /^[A-Za-z]{4}[A-Za-z0-9]{6,7}$/
        if (ifscode.match(reg)) {
            return true
        }
        return false;
    }
  $(document).ready(function () {
        $("#AccountHolderName").blur(function () {
            if(IsNonEmpty("AccountHolderName", "ErrAccountHolderName", "Please Enter A/c holder Name")){
                IsAlphaNumeric("AccountHolderName", "ErrAccountHolderName", "Please Enter Alpha Numerics Characters Only");
            }
        });
        $("#AccountNumber").blur(function () {
            if(IsNonEmpty("AccountNumber", "ErrAccountNumber", "Please Enter Account Number")){
                IsAlphaNumeric("AccountNumber", "ErrAccountNumber", "Please Enter Alpha Numerics Characters Only");
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
  });
  function submitbank(){
      ErrorCount=0;
        $('#ErrAccountHolderName').html("");
        $('#ErrAccountNumber').html("");
        $('#ErrIFSCode').html("");
        
        if(IsNonEmpty("AccountHolderName", "ErrAccountHolderName", "Please Enter A/c holder Name")){
            IsAlphaNumeric("AccountHolderName", "ErrAccountHolderName", "Please Enter Alpha Numerics Characters Only");
        }
        if(IsNonEmpty("AccountNumber", "ErrAccountNumber", "Please Enter Account Number")){
            IsAlphaNumeric("AccountNumber", "ErrAccountNumber", "Please Enter Alpha Numerics Characters Only");
        }
        
        var ifsc = $('#IFSCode').val().trim();
        if (ifsc.length==0) {
            $('#ErrIFSCode').html("Please Enter IFSCode");
            ErrorCount++;
        } else {
            if(!(isIfscCodeValid($('#IFSCode').val()))) {
                $('#ErrIFSCode').html("IFSCode is invalid");
                ErrorCount++;
            }
        }
        return (ErrorCount==0) ? true : false;
  }
 </script>
 