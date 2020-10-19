<?php
    $BankDetails =$mysqldb->select("select * from _tbl_member_bank_details where MemberID='". $_SESSION['User']['MemberID']."'");
    $MinimumPayout = $mysqldb->select("select * from `_tbl_Settings_Params` where ParamCode in ('MinPayout')"); 
    $MaximumPayout = $mysqldb->select("select * from `_tbl_Settings_Params` where ParamCode in ('MaxPayout')"); 
    $PayoutCharges = $mysqldb->select("select * from `_tbl_Settings_Params` where ParamCode in ('PayoutCharges')"); 
?>
<div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">GGCash Wallet WithDraw To Bank</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">GGCash Wallet WithDraw To Bank</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                if (sizeof($BankDetails)>0) {
                    if (getGGCashWalletBalance($_SESSION['User']['MemberID'])>0) {
                        ?>            
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-9">
                                        <div class="card">
                                            <div class="card-body">
                                                <?php
                                                    if (isset($_POST['btnWithDraw'])) {
                                                        
                                                        if ($_POST['Amount']>=$MinimumPayout[0]['ParamValue'] && $_POST['Amount']<=$MaximumPayout[0]['ParamValue'] ) {
                                                            
                                                            $BankDetails =$mysqldb->select("select * from _tbl_member_bank_details where BankID='".$_POST['BankName']."'");                                                    
                                                            if ($_POST['BankName']>0) {
                                                                $id=$mysqldb->insert("_tbl_payout_request_earnings",array("MemberID"      => $_SESSION['User']['MemberID'],
                                                                                                                          "RequestedOn"   => date("Y-m-d H:i:s"),
                                                                                                                          "Amount"        => $_POST['Amount'],
                                                                                                                          "BankName"      => $BankDetails[0]['BankName'],
                                                                                                                          "AccountNumber" => $BankDetails[0]['AccountNumber'],
                                                                                                                          "IFSCode"       => $BankDetails[0]['IFSCode'],
                                                                                                                          "AccountName"   => $BankDetails[0]['AccountName'])); 
                                                                                                                          
                                                                $balance = getGGCashWalletBalance($_SESSION['User']['MemberID'])-$_POST['Amount'];
                                                                $did = $mysqldb->insert("_tbl_wallet_earnings",array("MemberID"=>$_SESSION['User']['MemberID'],
                                                                                                                     "MemberCode"=>$_SESSION['User']['MemberCode'],
                                                                                                                     "Particulars"=>"Payout To Bank Req ID: ".$id,
                                                                                                                     "TxnDate"=>date("Y-m-d H:i:s"),
                                                                                                                     "Credits"=>"0",
                                                                                                                     "Debits"=>$_POST['Amount'],
                                                                                                                     "AvailableBalance"=>$balance,
                                                                                                                     "details"=>"Instant Payout To Epin Wallet")); 
                                                                
                                                                echo "<span style='color:green'>Your withdraw request has been sent to team.</span>"; 
                                                                
                                                            } elseif ($_POST['BankName']==-1) {
                                                                $id=$mysqldb->insert("_tbl_payout_request_earnings",array("MemberID"      => $_SESSION['User']['MemberID'],
                                                                                                                          "RequestedOn"   => date("Y-m-d H:i:s"),
                                                                                                                          "Amount"        => $_POST['Amount'],
                                                                                                                          "BankName"      => "Wallet Utility",
                                                                                                                          "AccountNumber" => $_SESSION['User']['MemberCode'],
                                                                                                                          "IFSCode"       => " ",
                                                                                                                          "AccountName"   => " ",
                                                                                                                          "IsApproved"    => "1",
                                                                                                                          "IsApprovedOn"  => date("Y-m-d H:i:s"))); 
                                                                
                                                                $balance = getGGCashWalletBalance($_SESSION['User']['MemberID'])-$_POST['Amount'];
                                                                $did = $mysqldb->insert("_tbl_wallet_earnings",array("MemberID"=>$_SESSION['User']['MemberID'],
                                                                                                                     "MemberCode"=>$_SESSION['User']['MemberCode'],
                                                                                                                     "Particulars"=>"Payout To Utility, Req ID: ".$id,
                                                                                                                     "TxnDate"=>date("Y-m-d H:i:s"),
                                                                                                                     "Credits"=>"0",
                                                                                                                     "Debits"=>$_POST['Amount'],
                                                                                                                     "AvailableBalance"=>$balance,
                                                                                                                     "details"=>"Instant Payout To Utility Wallet"));                                                          
                                                                                                                     
                                                                $balance = getUtilityhWalletBalance($_SESSION['User']['MemberID'])+$_POST['Amount'];
                                                                $id=$mysqldb->insert("_tbl_wallet_utility",array("MemberID"         => $_SESSION['User']['MemberID'],
                                                                                                                 "Particulars"      => 'Form Payout Request ID: '.$id,                    
                                                                                                                 "Credits"          => $_POST['Amount'],                    
                                                                                                                 "Debits"           => "0", 
                                                                                                                 "AvailableBalance" => $balance,                   
                                                                                                                 "RequestID"        => $id,                    
                                                                                                                 "TxnDate"          => date("Y-m-d H:i:s"))); 
                                                                
                                                                
                                                                $member = $mysqldb->select("select * from `_tbl_Members` where `MemberID`='".$_SESSION['User']['MemberID']."'");
                                                                $d = MobileSMS::sendSMS($member[0]['MobileNumber'],"Your Utility Wallet has been updated. Available Utility Wallet Balance Rs.".number_format($balance,2),$_SESSION['User']['MemberID']);
                                                                 echo "<span style='color:green'>Amount Transfered To your utility wallet.</span>";  
                                                           
                                                            } elseif ($_POST['BankName']==-2) {
                                                               
                                                                $id=$mysqldb->insert("_tbl_payout_request_earnings",array("MemberID"      => $_SESSION['User']['MemberID'],
                                                                                                                          "RequestedOn"   => date("Y-m-d H:i:s"),
                                                                                                                          "Amount"        => $_POST['Amount'],
                                                                                                                          "BankName"      => "Wallet Epin",
                                                                                                                          "AccountNumber" => $_SESSION['User']['MemberCode'],
                                                                                                                          "IFSCode"       => " ",
                                                                                                                          "AccountName"   => " ",
                                                                                                                          "IsApproved"    => "1",
                                                                                                                          "IsApprovedOn"  => date("Y-m-d H:i:s"))); 
                                                                                                                          
                                                                 $balance = getGGCashWalletBalance($_SESSION['User']['MemberID'])-$_POST['Amount'];
                                                                $did = $mysqldb->insert("_tbl_wallet_earnings",array("MemberID"=>$_SESSION['User']['MemberID'],
                                                                                                                     "MemberCode"=>$_SESSION['User']['MemberCode'],
                                                                                                                     "Particulars"=>"Payout To Epin Req ID: ".$id,
                                                                                                                     "TxnDate"=>date("Y-m-d H:i:s"),
                                                                                                                     "Credits"=>"0",
                                                                                                                     "Debits"=>$_POST['Amount'],
                                                                                                                     "AvailableBalance"=>$balance,
                                                                                                                     "details"=>"Instant Payout To Epin Wallet"));                                                                                                                                                                           

                                                                 $balance = getEpinWalletBalance($_SESSION['User']['MemberID'])+$_POST['Amount'];                                                
                                                                 $id=$mysqldb->insert("_tbl_wallet_epin",array("MemberID"         => $_SESSION['User']['MemberID'],
                                                                                                               "Particulars"      => 'Form Payout Request ID: '.$id,                   
                                                                                                               "Credits"          => $_POST['Amount'],                    
                                                                                                               "Debits"           => "0", 
                                                                                                               "AvailableBalance" => $balance,                   
                                                                                                               "RequestID"        => $id,                    
                                                                                                               "TxnDate"          => date("Y-m-d H:i:s")));  
                                                              
                                                                $member = $mysqldb->select("select * from `_tbl_Members` where `MemberID`='".$_SESSION['User']['MemberID']."'");
                                                                $d = MobileSMS::sendSMS($member[0]['MobileNumber'],"Your EPin Wallet has been updated. Available Epin Wallet Balance Rs.".number_format($balance,2),$_SESSION['User']['MemberID']);
                                                                 echo "<span style='color:green'>Amount Transfered To your Epin wallet.</span>";  
                                                            }
                                                            
                                                            unset($_POST);
                                                        } else {
                                                            echo "<span style='color:red'>Payout amount must have between Rs.".$MinimumPayout[0]['ParamValue'] ." and  Rs.".$MaximumPayout[0]['ParamValue'] ."</span>";
                                                        }
                                                    }                                                                                           
                                                ?>
                                                <script>
                                                $(document).ready(function () {
                                                    $("#Amount").keypress(function (e) {
                                                        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                                            $("#ErrAmount").html("Digits Only").fadeIn().fadeIn("fast");
                                                            return false;
                                                        }
                                                    });
                                                    $("#Amount").blur(function () { 
                                                        IsNonEmpty("Amount","ErrAmount","Please Enter Amount");
                                                    });
                                                });
                                                function submitamount() {
        
        $('#ErrAmount').html("");
          ErrorCount=0;
          IsNonEmpty("Amount","ErrAmount","Please Enter Amount");
          if (ErrorCount==0) {
                            return true;
                        } else{
                            return false;
                        }
                 
}
</script>
                                         <form action="" method="post" onsubmit="return submitamount();">
                                <div class="tablesaw-bar tablesaw-mode-stack"></div> 
                                                   <br><Br>
                                  <div class="form-actions">
                                                <div class="form-group user-test" id="user-exists">
                                                    <label>Payout To</label>
                                                    <select name="BankName" id="BankName" class="form-control">
                                                        <option value="-1">My Utility Wallet</option>
                                                        <option value="-2">My Epin Wallet</option>
                                                        <?php foreach($BankDetails as $BankDetail){ ?>
                                                        <option value="<?php echo $BankDetail['BankID'];?>" <?php echo $_POST[ 'BankName'] ? " selected='selected' " : "";?>><?php echo $BankDetail['BankName'];?>&nbsp;-&nbsp;<?php  echo $BankDetail['AccountNumber']; ?>&nbsp;-&nbsp;<?php echo $BankDetail['IFSCode']; ?></option>
                                                        <?php }?>
                                                    </select>
                                                    <div class="help-block"></div>
                                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                                </div>
                                                <div class="form-group user-test" id="user-exists">
                                                    <label>Enter  Amount</label>
                                                    <input type="text" name="Amount" id="Amount" placeholder="Amount" value="<?php echo (isset($_POST['Amount']) ? $_POST['Amount'] : "");?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Username">
                                                    <span class="errorstring" id="ErrAmount"><?php echo isset($ErrAmount)? $ErrAmount : "";?></span>
                                                    <div class="help-block"></div>
                                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                                </div>
                                            </div>
                                <div class="form-actions">
                                        <div class="text-left">
                                            <button type="submit" class="btn btn-primary block-default" name="btnWithDraw">Submit</button>
                                            &nbsp;&nbsp;<a href="dashboard.php?action=Withdraw/WithDrawRequests">View previous requests</a>
                                        </div>
                                        
                                         <div class="form-group" style="color:#888"><br><br>
                                    Minimum Payout : Rs. <?php echo number_format($MinimumPayout[0]['ParamValue'],2);?> and Maximum Payout : Rs. <?php echo number_format($MaximumPayout[0]['ParamValue'],2);?><br>
                                    Payout Charges :  <?php echo number_format($PayoutCharges[0]['ParamValue'],2);?>%<br>
                                    Payout To your Wallet is instant service<br>
                                    Payout To your Bank Account is schedule service based on bank working days.
                                </div>
                                    </div> 
                                    
                                    
                                    </form>
                            </div>
                        </div>
</div>
                                    <div class="col-3">
                                     <div class="card">
                                            <div class="card-body" style="height:400px">
                                    Available Balance: <br>
                                    Rs. <?php echo number_format(getGGCashWalletBalance( $_SESSION['User']['MemberID']),2);?>
                                    </div>
                                    </div>
                                    </div>
</div>

<script src="https://gcchub.org/panel/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script>
//=============================================//
//    File export                              //
//=============================================//
$('#file_export').DataTable({
dom: 'Bfrtip',
buttons: [
'copy', 'csv', 'excel', 'pdf', 'print'
]
});
$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-cyan text-white mr-1');
</script>            </div>
<?php  } else { ?>
             <div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
                            <div class="card-body" style="text-align: center;padding:100px;">
                            <img src="assets/images/digital-wallet.png"><br>
                                Wallet Balance Rs. <?php echo number_format(getGGCashWalletBalance( $_SESSION['User']['MemberID']),2);?><br><br>
                               
                                 Couldn't able do withdraw process<br>
                                 Your GGCash Wallet has insufficant balance to withdraw.<br><br>
                                 <a href="dashboard.php?action=Accounts/earningsummary">View summary</a>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
<?php } ?>
<?php } else { ?>

             <div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
                            <div class="card-body" style="text-align: center;padding:100px;">
                            <img src="assets/images/withdraw_bank.png"><br><br>
                               
                                <a href="dashboard.php?action=Withdraw/AddBank">Click here</a> to add your bank information.
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
<?php } ?>
            
            


         <?php include_once("footer.php"); ?>



 
