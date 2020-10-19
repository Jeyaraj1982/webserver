<?php include_once("header.php");?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-9 align-self-center">
                <h4 class="page-title">Add Cash To Utility Wallet</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Cash To Utility Wallet</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

            
    <div class="container-fluid">
               <div class="row">
<div class="col-12">
<div class="card">
         
                            <div class="card-body">  
<div class="custom-control custom-radio" style="float: left;margin-right:20px;">
  <input type="radio" class="custom-control-input" id="pg_offline" name="defaultExampleRadios" checked>
  <label class="custom-control-label" for="pg_offline">Offline Payments (NEFT/IMPS/FT)</label>
</div>

<!-- Default checked -->
<div class="custom-control custom-radio" style="float: left;margin-right:20px;">
  <input type="radio" class="custom-control-input" id="pg_creditcards" name="defaultExampleRadios" disabled="disabled" >
  <label class="custom-control-label" for="pg_creditcards">Credit Cards<br>
    <span style="font-size: 11px;color: #aaa;">Service comming soon</span>
  </label>
</div>

<!-- Default checked -->                 
<div class="custom-control custom-radio" style="float: left;margin-right:20px;">
  <input type="radio" class="custom-control-input" id="pg_netbanking" name="defaultExampleRadios" disabled="disabled" >
  <label class="custom-control-label" for="pg_netbanking">Internet Banking/Debit Cards
  <br><span style="font-size: 11px;color: #aaa;">Service comming soon</span>
  </label>
</div>

<div class="custom-control custom-radio" style="float: left;margin-right:20px;">
  <input type="radio" class="custom-control-input" id="pg_paypal" name="defaultExampleRadios" disabled="disabled" >
  <label class="custom-control-label" for="pg_paypal">Paypal
  <br><span style="font-size: 11px;color: #aaa;">Service comming soon</span>
  </label>
</div>

<div class="custom-control custom-radio" style="float: left;margin-right:20px;">
  <input type="radio" class="custom-control-input" id="pg_ewallet" name="defaultExampleRadios" disabled="disabled" >
  <label class="custom-control-label" for="pg_ewallet">Other E-Wallets
  <br><span style="font-size: 11px;color: #aaa;">Service comming soon</span>
  </label>
</div>
        
    </div>
    </div>
    </div>
    </div>
<div class="row">
<div class="col-sm-6">
<div class="card">
         
                            <div class="card-body">
                                         <?php

                       if (isset($_POST['btnAddFund'])) {
                                                 /*  $id=$mysqldb->insert("_tbl_wallet_transactions",array("MemberID"=>$_SESSION['User']['MemberID'],
                                                                             "Particulars"=>'Add To Wallet',                    
                                                                             "Credits"=>$_POST['amount'],                    
                                                                             "Debits"=>0,                    
                                                                             "TxnDate"=>date("Y-m-d H:i:s")));   */
                      $BankDetails =$mysqldb->select("select * from _tbl_bank_details where BankID='".$_POST['BankName']."'");                                                    
                        $id=$mysqldb->insert("_tbl_wallet_request_utility",array("MemberID"       =>$_SESSION['User']['MemberID'],
                                                                         "RequestedOn"    =>date("Y-m-d H:i:s"),
                                                                         "Amount"         =>$_POST['Amount'],
                                                                         "BankName"       =>$BankDetails[0]['BankName'],
                                                                         "AccountNumber"  =>$BankDetails[0]['AccountNumber'],
                                                                         "TransferDate"   => $_POST['yy']."-".$_POST['mm']."-".$_POST['dd'],
                                                                         "IFSCode"        =>$BankDetails[0]['IFSCode'],
                                                                         "Mode"           =>$_POST['Mode'],
                                                                         "TransactionNumber" =>$_POST['TransactionNumber'])); 
                                         echo "<span style='color:green'>Your wallet has been updated.</span>";
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
        $("#TransactionNumber").keypress(function (e) {
          //  if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
             //   $("#ErrTransactionNumber").html("Digits Only").fadeIn().fadeIn("fast");
             //   return false;
          //  }
        });
        $("#Amount").blur(function () { 
            IsNonEmpty("Amount","ErrAmount","Please Enter Amount");
        });
        $("#TransactionNumber").blur(function () { 
            IsNonEmpty("TransactionNumber","ErrTransactionNumber","Please Enter Transaction ID");
        });
    });
    function submitamount() {
           return true;
        $('#ErrAmount').html("");
        $('#ErrTransactionNumber').html("");
          //ErrorCount=0;
        if(IsNonEmpty("Amount","ErrAmount","Please Enter Amount")) {
            
            if (!( parseInt($('#Amount').val())>=100 && parseInt($('#Amount').val())<=10000)) {
                $("#ErrAmount").html("Please enter above 100 and below 10000") ;
                return false;
            }
            
            if (!( parseInt($('#Amount').val() % 100)==0)) {
                $("#ErrAmount").html("Please enter only multiples of 100") ;
                return false;  
            }
        } 
        if(IsNonEmpty("TransactionNumber","ErrTransactionNumber","Please Enter Transaction ID")){ 
           // IsAlphaNumeric("TransactionNumber","ErrTransactionNumber","Please Enter alphanumerics characters only"); 
             return false;
        }
          if (ErrorCount==0) {
                           
                            return true;
                        } else{
                            return false;
                        }
                 
}
</script>
                                         <form action="" method="post" onsubmit="return submitamount();">
                                <div class="tablesaw-bar tablesaw-mode-stack"></div> 
                                                
                                                
                                                   
                                                   


                                  <div class="form-actions">
                                                <div class="form-group user-test" id="user-exists">
                                                    <label>Enter  Amount</label>
                                                    <input type="text" name="Amount" id="Amount" placeholder="Amount" value="<?php echo (isset($_POST['Amount']) ? $_POST['Amount'] : "");?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Username">
                                                    <span style="color:#999;font-size:11px;">Multiples of 100 and Minimum &#8377; 100 & Maximum &#8377; 10000</span><br>
                                                    <span class="errorstring" id="ErrAmount"><?php echo isset($ErrAmount)? $ErrAmount : "";?></span>
                                                    <div class="help-block"></div>
                                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                                </div>
                                                <div class="form-group user-test" id="user-exists">
                                                    <label>Bank Name</label>
                                                    <select name="BankName" id="BankName" class="form-control">
                                                        <?php $BankDetails =$mysqldb->select("select * from _tbl_bank_details ");
                                                                foreach($BankDetails as $BankDetail){
                                                         ?>
                                                        <option value="<?php echo $BankDetail['BankID'];?>" <?php echo $_POST[ 'BankName'] ? " selected='selected' " : "";?>><?php echo $BankDetail['BankName'];?>&nbsp;-&nbsp;<?php  echo $BankDetail['AccountNumber']; ?>&nbsp;-&nbsp;<?php echo $BankDetail['IFSCode']; ?></option>
                                                        <?php }?>
                                                    </select>
                                                    <div class="help-block"></div>
                                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                                </div>
                                                <div class="form-group user-test" id="user-exists">
                                                    <label>Mode</label>
                                                    <select name="Mode" id="Mode" class="form-control">
                                                        <option value="NEFT" <?php echo $_POST[ 'Mode'] ? " selected='selected' " : "";?>>NEFT</option>
                                                        <option value="IMPS" <?php echo $_POST[ 'Mode'] ? " selected='selected' " : "";?>>IMPS</option>
                                                        <option value="FT" <?php echo $_POST[ 'Mode'] ? " selected='selected' " : "";?>>Same Bank To Same Bank</option>
                                                    </select>
                                                    <div class="help-block"></div>
                                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                                </div>
                                                 <div class="form-group user-test" id="user-exists">
                                                    <label>Transaction ID</label>
                                                    <input type="text" name="TransactionNumber" placeholder="Transaction Reference Number" id="TransactionNumber" value="<?php echo (isset($_POST['TransactionNumber']) ? $_POST['TransactionNumber'] : "");?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Transaction Number">
                                                    <span class="errorstring" id="ErrTransactionNumber"><?php echo isset($ErrTransactionNumber)? $ErrTransactionNumber : "";?></span>
                                                    <div class="help-block"></div>
                                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                                </div>
                                                <div class="form-group user-test" id="user-exists">
                                                    <label>Transaction Date</label>
                                                   <!-- <input type="date" name="TransactionOn" id="TransactionOn" value="<?php echo (isset($_POST['TransactionOn']) ? $_POST['TransactionOn'] : "");?>" class="form-control"> -->
                                                    <table>
                                                        <tr>                     
                                                            <td>
                                                                    <select name="dd" class="form-control">
                                                        <option value="1" <?php echo date("d")==1 ? " selected='selected' " : "";?>>01</option>
                                                        <option value="2" <?php echo date("d")==2 ? " selected='selected' " : "";?>>02</option>
                                                        <option value="3" <?php echo date("d")==3 ? " selected='selected' " : "";?>>03</option>
                                                        <option value="4" <?php echo date("d")==4 ? " selected='selected' " : "";?>>04</option>
                                                        <option value="5" <?php echo date("d")==5 ? " selected='selected' " : "";?>>05</option>
                                                        <option value="6" <?php echo date("d")==6 ? " selected='selected' " : "";?>>06</option>
                                                        <option value="7" <?php echo date("d")==7 ? " selected='selected' " : "";?>>07</option>
                                                        <option value="8" <?php echo date("d")==8 ? " selected='selected' " : "";?>>08</option>
                                                        <option value="9" <?php echo date("d")==9 ? " selected='selected' " : "";?>>09</option>
                                                        <option value="10" <?php echo date("d")==10 ? " selected='selected' " : "";?>>10</option>
                                                        <option value="11" <?php echo date("d")==11 ? " selected='selected' " : "";?>>11</option>
                                                        <option value="12" <?php echo date("d")==12 ? " selected='selected' " : "";?>>12</option>
                                                        <option value="13" <?php echo date("d")==13 ? " selected='selected' " : "";?>>13</option>
                                                        <option value="14" <?php echo date("d")==14 ? " selected='selected' " : "";?>>14</option>
                                                        <option value="15" <?php echo date("d")==15 ? " selected='selected' " : "";?>>15</option>
                                                        <option value="16" <?php echo date("d")==16 ? " selected='selected' " : "";?>>16</option>
                                                        <option value="17" <?php echo date("d")==17 ? " selected='selected' " : "";?>>17</option>
                                                        <option value="18" <?php echo date("d")==18 ? " selected='selected' " : "";?>>18</option>
                                                        <option value="19" <?php echo date("d")==19 ? " selected='selected' " : "";?>>19</option>
                                                        <option value="20" <?php echo date("d")==20 ? " selected='selected' " : "";?>>20</option>
                                                        <option value="21" <?php echo date("d")==21 ? " selected='selected' " : "";?>>21</option>
                                                        <option value="22" <?php echo date("d")==22 ? " selected='selected' " : "";?>>22</option>
                                                        <option value="23" <?php echo date("d")==23 ? " selected='selected' " : "";?>>23</option>
                                                        <option value="24" <?php echo date("d")==24 ? " selected='selected' " : "";?>>24</option>
                                                        <option value="25" <?php echo date("d")==25 ? " selected='selected' " : "";?>>25</option>
                                                        <option value="26" <?php echo date("d")==26 ? " selected='selected' " : "";?>>26</option>
                                                        <option value="27" <?php echo date("d")==27 ? " selected='selected' " : "";?>>27</option>
                                                        <option value="28" <?php echo date("d")==28 ? " selected='selected' " : "";?>>28</option>
                                                        <option value="29" <?php echo date("d")==29 ? " selected='selected' " : "";?>>29</option>
                                                        <option value="30" <?php echo date("d")==30 ? " selected='selected' " : "";?>>30</option>
                                                        <option value="31" <?php echo date("d")==31 ? " selected='selected' " : "";?>>31</option>
                                                    </select> 
                                                            </td>
                                                            <td>
                                                    <select name="mm" class="form-control">
                                                        <option value="1" <?php echo date("m")==1 ? " selected='selected' " : "";?>>JAN</option>
                                                        <option value="2" <?php echo date("m")==2 ? " selected='selected' " : "";?>>FEB</option>
                                                        <option value="3" <?php echo date("m")==3 ? " selected='selected' " : "";?>>MAR</option>
                                                        <option value="4" <?php echo date("m")==4 ? " selected='selected' " : "";?>>APR</option>
                                                        <option value="5" <?php echo date("m")==5 ? " selected='selected' " : "";?>>MAY</option>
                                                        <option value="6" <?php echo date("m")==6 ? " selected='selected' " : "";?>>JUN</option>
                                                        <option value="7" <?php echo date("m")==7 ? " selected='selected' " : "";?>>JLY</option>
                                                        <option value="8" <?php echo date("m")==8 ? " selected='selected' " : "";?>>AUG</option>
                                                        <option value="9" <?php echo date("m")==9 ? " selected='selected' " : "";?>>SEP</option>
                                                        <option value="10" <?php echo date("m")==10 ? " selected='selected' " : "";?>>OCT</option>
                                                        <option value="11" <?php echo date("m")==11 ? " selected='selected' " : "";?>>NOV</option>
                                                        <option value="12" <?php echo date("m")==12 ? " selected='selected' " : "";?>>DEC</option>
                                                       
                                                    </select> 
                                                    </td>
                                                    <td>
                                                    <select name="yy" class="form-control">
                                                        <option value="2019">2019</option>
                                                    </select>
                                                    </td>
                                                    </tr>
                                                    </table>
                                                    <div class="help-block"></div>
                                                    <div class="help-block"><p class="error" id="username-exists"></p></div>
                                                </div>
                                            </div>
                                <div class="form-actions">
                                        <div class="text-right">
                                        <a href="dashboard.php?action=Wallets/UtilityWalletRequests">View Previous requests</a>&nbsp;&nbsp;
                                            <button type="submit" class="btn btn-primary block-default" name="btnAddFund">Send Requests</button>
                                        </div>
                                    </div>
                                    </form>
                            </div>
                        </div>
</div>

<div class="col-sm-6">
<div class="card">
         
                            <div class="card-body">
                            <div style="text-align: center;padding-top:80px;padding-bottom:80px;">
                              <img src="assets/images/e-wallet.png" style="width: 256px;"><br>
                              Your wallet has INR. <?php echo number_format(getUtilityhWalletBalance($_SESSION['User']['MemberID']),2);?>
                              <br>
                              <a href="dashboard.php?action=Accounts/utlityummary" >View Account Summary </a>
                              </div>
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
            
            


         <?php include_once("footer.php"); ?>



 
