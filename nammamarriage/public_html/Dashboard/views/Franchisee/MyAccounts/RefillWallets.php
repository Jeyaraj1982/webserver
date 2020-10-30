<?php
    $res =$webservice->getData("Franchisee","GetRefillWalletBankNameAndMode");
    $BankNames=$res['data']['BankName'];
    $Modes=$res['data']['ModeOfTransfer'];
?>
<style>
    .ft-left-nav li a{color:#333}
    .ft-left-nav li:hover{background: #dee7fc;} 
    .ft-left-nav li {color:black;}
    .linkactive1{color:#fff  !important;cursor:pointer;border-bottom:transparent;background:#5983e8;}
    .linkactive1:hover{background:#5983e8;color:#333}
    .linkactive1 a{color:#fff !important;font-weight: bold;} 
</style>
<script>
        $(document).ready(function() {
            $("#Amount").keypress(function(e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    $("#ErrAmount").html("Digits Only").fadeIn().fadeIn("fast");
                    return false;
                }
            });
            $("#Amount").blur(function() {
                IsNonEmpty("Amount", "ErrAmount", "Please Enter Amount");
            });
            $("#check").blur(function() {
                IsNonEmpty("check", "Errcheck", "If yo agree terms and conditions please select");
            });
        });

        function submitamount() {

            $('#ErrAmount').html("");
            $('#Errcheck').html("");
            $('#ErrTxnDate').html("");
            $('#ErrTxnId').html(""); 
            
            IsNonEmpty("TxnDate","ErrTxnDate","Please Enter Transaction Date");
            if(IsNonEmpty("TxnId","ErrTxnId","Please Enter Transaction ID")) {
                IsAlphaNumeric("TxnId","ErrTxnId","Please Enter Alpha Numeric characters only");
            }

            if (IsNonEmpty("Amount", "ErrAmount", "Please Enter Amount")) {
                if (!(parseInt($('#Amount').val()) >= 500 && parseInt($('#Amount').val()) <= 10000)) {
                    $("#ErrAmount").html("Please enter above 500 and below 10000");
                    return false;
                }

                if (!(parseInt($('#Amount').val() % 100) == 0)) {
                    $("#ErrAmount").html("Please enter only multiples of 100");
                    return false;
                }
            }     
            
            if (document.form1.check.checked == false) {
                $("#Errcheck").html("Please agree terms and conditions");
                return false;
            }
            $('#form1').submit();
        }
    </script>
<?php if (sizeof($BankNames)==0)    { ?>
<div class="col-12 grid-margin" style="padding:0px !important">
    <div class="card">
        <div class="card-body" style="padding:15px !important">
            <h4 class="card-title" style="font-size: 22px;margin-top:0px;margin-bottom:15px">Refill Wallet Using Bank</h4>
            <span style="color:#999;">It's is safe transaction and gives refill amount.</span>
            <span style="color:#666"><br><br><br><br><br>Currently bank transfer not allowed.<br>
            Please contact support team.
            <br><br><br><br><br><br><br><br><br>
            </span>
        </div>
    </div>
</div>
 <?php } else { ?>
<div class="col-12 grid-margin" style="padding:0px !important">
    <div class="card">
        <div class="card-body" style="padding:15px !important">
            <h4 class="card-title" style="font-size: 22px;margin-top:0px;margin-bottom:15px">My Accounts</h4>
            <h5 style="color:#666">Financial Transactions, Invoices and Refill your wallet all in one place.</h5>
            <h6 style="color:#999;margin-bottom:0px">This page gives you quick access to topup your wallets and tools that let you manage the transactions.</h6>
        </div>
    </div>
</div>
<?php
        if (isset($_POST['saverequest'])) {
            $response =$webservice->getData("Franchisee","SaveBankRequest",$_POST);
            echo  ($response['status']=="success") ? $dashboard->showSuccessMsg($response['message'])
                                                   : $dashboard->showErrorMsg($response['message']);
        }
        ?>
<div class="col-12 grid-margin" style="padding:0px !important">
    <div class="card">
        <div class="card-body" style="padding:15px !important">
            <form method="post" action="" onsubmit="return submitamount()" name="form1" id="form1">
        <br>
        <br>
        <div class="form-group row">
        <div class="col-sm-8">
        <div class="form-group row">
            <div class="col-sm-5">Bank To<span id="star">*</span></div>
            <div class="col-sm-7">
                <select id="BankName" class="form-control" name="BankName" style="border: 1px solid #ccc;padding: 3px;padding-left: 3px;padding-left: 10px;">
                    <?php foreach($BankNames as $BankName) { ?>
                        <option value="<?php echo $BankName['BankID'];?>" <?php echo ($_POST[ 'BankName']==$BankName[ 'BankName']) ? " selected='selected' " : "";?>>
                            <?php echo $BankName['BankName'];?>
                        </option>
                        <?php } ?>
                </select>
                <span class="errorstring" id="ErrBankName"><?php echo isset($ErrBankName)? $ErrBankName : "";?></span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-5"> Refill Amount: (₹)<span id="star">*</span></div>
            <div class="col-sm-7">
                <input type="text" class="form-control" placeholder="Enter Amount" name="Amount" id="Amount" style="border:1px solid #ccc;padding:3px;padding-left:10px;">
                <span style="color:#999;font-size:11px;">Multiples of 100 &amp; Min ₹ 500 & Max ₹ 10000</span>
                <br>
                <span class="errorstring" id="ErrAmount"></span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-5">Transaction Date<span id="star">*</span></div>
            <div class="col-sm-7">
                <input type="date" class="form-control" name="TxnDate" id="TxnDate" style="border:1px solid #ccc;padding:3px;padding-left:10px;">
                <span class="errorstring" id="ErrTxnDate"></span> 
            </div>
        </div>  
        <div class="form-group row">
            <div class="col-sm-5"> Mode<span id="star">*</span></div>
            <div class="col-sm-7">
                <select id="Mode" class="form-control" name="Mode" style="border: 1px solid #ccc;padding: 3px;padding-left: 3px;padding-left: 10px;">
                    <?php foreach($Modes as $Mode) { ?>
                        <option value="<?php echo $Mode['SoftCode'];?>" <?php echo ($_POST[ 'MODE']==$Mode[ 'SoftCode']) ? " selected='selected' " : "";?>>
                            <?php echo $Mode['CodeValue'];?>
                        </option>
                    <?php } ?>
                </select>
                <span class="errorstring" id="ErrMode"><?php echo isset($ErrMode)? $ErrMode : "";?></span>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-5">Transaction ID<span id="star">*</span></div>
            <div class="col-sm-7">
                <input type="text" class="form-control" placeholder="Transaction Id" name="TxnId" id="TxnId" style="border:1px solid #ccc;padding:3px;padding-left:10px;">
                <span class="errorstring" id="ErrTxnId"></span>
            </div>
        </div>
        <input type="checkbox" name="check" id="check">&nbsp;<label for="check" style="font-weight:normal">I understand terms of wallet udpate </label>&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#condition">Lean more</a>
        <Br><span class="errorstring" id="Errcheck"></span><br>
        <div class="form-group row">
            <div class="col-sm-3">
            <button type="submit" class="btn btn-primary" name="saverequest" style="height:36px;color:white;cursor:pointer;font-family:roboto">Submit</button>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-9">
            <a href="WalletRequests" >List of Previous Requests</a>
            </div>
        </div>
       </div> 
        <div class="col-sm-4" style="border-left:1px solid #e6e6e6;;overflow: auto;">
        <?php foreach($BankNames as $BankName) { ?>
        <div class="form-group row">
            <div class="col-sm-12">
                <?php echo $BankName['BankName'];?><br>
                <?php echo $BankName['AccountName'];?><br>
                <?php echo $BankName['AccountNumber'];?><br>
                <?php echo $BankName['IFSCode'];?><br>
            </div>
        </div>
        <hr>
        <?php } ?>
    </div>
        </form>
        </div>
    </div>
</div>
<?php } ?> 