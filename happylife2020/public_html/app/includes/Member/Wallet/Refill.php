<?php
    if (isset($_POST['btnAddFund'])) {
        $error=0;
        if ($_POST['Amount']<1000) {
            $error++;
            $errormsg = "Amount must have Rs. 1000 and above";  
        }
        if (strlen(trim($_POST['TransactionNumber']))<3) {
            $error++;
            $errormsg = "You must provide transaction number";  
        }
        if ($error==0) {
            
            $BankDetails =$mysql->select("select * from _tbl_admin_bank_details where BankID='".$_POST['TransferTo']."'");                                                    
            $id=$mysql->insert("_tbl_wallet_request_utility",array("MemberID"       => $_SESSION['User']['MemberID'],
                                                                   "RequestedOn"    => date("Y-m-d H:i:s"),
                                                                   "Amount"         => $_POST['Amount'],
                                                                   "BankName"       => $BankDetails[0]['BankName'],
                                                                   "AccountNumber"  => $BankDetails[0]['AccountNumber'],
                                                                   "TransferDate"   => $_POST['yy']."-".$_POST['mm']."-".$_POST['dd']." 00:00:00",
                                                                   "IFSCode"        => $BankDetails[0]['IFSCode'],
                                                                   "Mode"           => $_POST['Mode'],
                                                                   "TransactionNumber" => $_POST['TransactionNumber'])); 
            unset($_POST);
?>
            <script>
              $(document).ready(function() {
                    swal("Your wallet update request has been sent!", {
                        icon : "success" 
                    });
                 });
            </script>
<?php }  else { ?>
            <script>
              $(document).ready(function() {
                    swal("<?php echo $errormsg;?>", {
                        icon : "error" 
                    });
                 });
            </script>
<?php
      }  
    
    }       
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallet/Refill">Wallet</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallet/Refill">Refill</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Refill Wallet</div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row"> 
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="email2">Refill Amount</label>
                                    <input class="form-control" id="Amount" name="Amount" value="<?php echo (isset($_POST['Amount']) ? $_POST['Amount'] : "");?>"  placeholder="Amount" type="text">
                                </div>
                                 <div class="form-group">
                                    <label for="email2">Transfer To</label>
                                    <div class="select2-input">
                                    <?php $BankDetails =$mysql->select("select * from _tbl_admin_bank_details order by BankName");   ;?>
                                        <select id="basic"  name="TransferTo" class="form-control">
                                           <?php foreach($BankDetails as $BankDetail) {?>
                                            <option value="<?php echo $BankDetail['BankID'];?>" <?php echo $_POST[ 'BankName'] ? " selected='selected' " : "";?>><?php echo $BankDetail['BankName'];?>&nbsp;-&nbsp;<?php  echo $BankDetail['AccountNumber']; ?>&nbsp;-&nbsp;<?php echo $BankDetail['IFSCode']; ?></option>
                                           <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email2">Transaction ID</label>
                                    <input class="form-control" name="TransactionNumber" placeholder="Transaction Reference Number" id="TransactionNumber" value="<?php echo (isset($_POST['TransactionNumber']) ? $_POST['TransactionNumber'] : "");?>" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="password">Transaction Mode</label>
                                    <select name="Mode" id="Mode" class="form-control">
                                        <option value="NEFT" <?php echo $_POST[ 'Mode'] ? " selected='selected' " : "";?>>NEFT</option>
                                        <option value="IMPS" <?php echo $_POST[ 'Mode'] ? " selected='selected' " : "";?>>IMPS</option>
                                        <option value="FT" <?php echo $_POST[ 'Mode'] ? " selected='selected' " : "";?>>Same Bank To Same Bank</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password">Transaction Date</label>
                                    <div class="input-group">
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
                                                    <option value="2020">2020</option>
                                                </select>
                                            </td>
                                        </tr>
                                       </table>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="password">Remarks</label>
                                    <input class="form-control" id="remarks" name="remarks" placeholder="Remarks" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" id="password" name="btnAddFund" value="Send Request" placeholder="Password" type="submit">
                                    &nbsp;&nbsp;<a href="dashboard.php?action=Wallet/Requests">View previous requests</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
<script>
 $(document).ready(function() {
$('#datepicker').datetimepicker({
            format: 'MM/DD/YYYY',
        });
        $('#basic').select2({
            theme: "bootstrap"
        });  $('#Mode').select2({
            theme: "bootstrap"
        });

        });
</script>