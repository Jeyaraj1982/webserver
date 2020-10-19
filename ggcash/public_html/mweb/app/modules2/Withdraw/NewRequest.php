<?php include_once("header.php");?>
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
                            $BankDetails =$mysqldb->select("select * from _tbl_member_bank_details where MemberID='". $_SESSION['User']['MemberID']."'");
                            if (sizeof($BankDetails)>0) {
                                
                                if (getGGCashWalletBalance( $_SESSION['User']['MemberID'])>0) {
                                    
                               
                        ?>            
            <div class="container-fluid">
<div class="row">
<div class="col-12">
<div class="card">
                            <div class="card-body">
                                         <?php
 
                       if (isset($_POST['btnWithDraw'])) {
                                                 /*  $id=$mysqldb->insert("_tbl_wallet_transactions",array("MemberID"=>$_SESSION['User']['MemberID'],
                                                                             "Particulars"=>'Add To Wallet',                    
                                                                             "Credits"=>$_POST['amount'],                    
                                                                             "Debits"=>0,                    
                                                                             "TxnDate"=>date("Y-m-d H:i:s")));   */
                      $BankDetails =$mysqldb->select("select * from _tbl_member_bank_details where BankID='".$_POST['BankName']."'");                                                    
               $id=$mysqldb->insert("_tbl_member_withdraw_request",array("MemberID"          =>$_SESSION['User']['MemberID'],
                                                                         "RequestedOn"       =>date("Y-m-d H:i:s"),
                                                                         "Amount"            =>$_POST['Amount'],
                                                                         "BankName"          =>$BankDetails[0]['BankName'],
                                                                         "AccountNumber"     =>$BankDetails[0]['AccountNumber'],
                                                                         "IFSCode"           =>$BankDetails[0]['IFSCode'],
                                                                         "AccountName"       =>$BankDetails[0]['AccountName'])); 
                                         echo "<span style='color:green'>Your withdraw request has been updated.</span>";
                                         unset($_POST);
         
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
                                                    <label>Bank Name</label>
                                                    <select name="BankName" id="BankName" class="form-control">
                                                        <?php 
                                                                foreach($BankDetails as $BankDetail){
                                                         ?>
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
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary block-default" name="btnWithDraw">Submit</button>
                                        </div>
                                    </div>
                                    </form>
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



 
