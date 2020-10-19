<?php include_once("header.php");?>
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-9 align-self-center">
                    <h4 class="page-title">Mobile Recharge</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Mobile Recharge</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                        <?php
                          $balance = getUtilityhWalletBalance($_SESSION['User']['MemberID']);
                                if (isset($_POST['btnRecharge'])) { 
                
                         $error=0;
                                   
                                     if (!($_POST['Amount']<=$balance)) {
                                        $error++;
                                        $errormsg = "Transaction failed. Insufficiant balance. your utility wallet balance Rs. ".number_format($balance,2); 
                                     }
                                     
                                     if (!($_POST['Amount']>=10 && $_POST['Amount']<=5000)) {
                                        $error++;
                                        $errormsg = "Transaction failed. Invalid amount. Amount must have Rs. 10 to Rs. 5000"; 
                                     }
                                     
                                      if (!($_POST['ConfirmAmount']==$_POST['Amount'])) {
                                        $error++;
                                        $ErrConfirmAmount = "Transaction failed. Amount not matched with Confirm amount"; 
                                     }
                                }            
                                         ?>
                                    <script>
                                        $(document).ready(function() {
                                            $("#MobileNumber").keypress(function(e) {
                                                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                                    $("#ErrMobileNumber").html("Digits Only").fadeIn().fadeIn("fast");
                                                    return false;
                                                }
                                            });
                                            $("#Amount").keypress(function(e) {
                                                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                                    $("#ErrAmount").html("Digits Only").fadeIn().fadeIn("fast");
                                                    return false;
                                                }
                                            });
                                            $("#ConfirmAmount").keypress(function(e) {
                                                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                                                    $("#ErrConfirmAmount").html("Digits Only").fadeIn().fadeIn("fast");
                                                    return false;
                                                }
                                            });
                                            $("#Amount").blur(function() {
                                                IsNonEmpty("Amount", "ErrAmount", "Please Enter Amount");
                                            });
                                            $("#MobileNumber").blur(function() {
                                                IsNonEmpty("MobileNumber", "ErrMobileNumber", "Please Enter Mobile Number");
                                            });
                                            $("#ConfirmAmount").blur(function() {
                                                IsNonEmpty("ConfirmAmount", "ErrConfirmAmount", "Please Enter Confirm Amount");
                                            });
                                        });

                                        function submitamount() {

                                            $('#ErrMobileNumber').html("");
                                            $('#ErrAmount').html("");
                                            $('#ErrConfirmAmount').html("");
                                            ErrorCount = 0;
                                            IsMobileNumber("MobileNumber", "ErrMobileNumber", "Please Enter Valid Mobile Number");
                                            if (IsNonEmpty("Amount", "ErrAmount", "Please Enter Amount")) {

                                                if (!(parseInt($('#Amount').val()) >= 10 && parseInt($('#Amount').val()) <= 10000)) {
                                                    $("#ErrAmount").html("Please enter above 10 and below 10000");
                                                    return false;
                                                }
                                            }
                                            if (IsNonEmpty("ConfirmAmount", "ErrConfirmAmount", "Please Enter ConfirmAmount")) {

                                                if (!(parseInt($('#ConfirmAmount').val()) >= 10 && parseInt($('#Amount').val()) <= 10000)) {
                                                    $("#ErrConfirmAmount").html("Please enter above 10 and below 10000");
                                                    return false;
                                                }
                                            }
                                            var Amount = document.getElementById("Amount").value;
                                            var ConfirmAmount = document.getElementById("ConfirmAmount").value;
                                            if (Amount != ConfirmAmount) {
                                                ErrorCount++;
                                                $('#ErrConfirmAmount').html("Amounts do not match.");

                                            }
                                            if (ErrorCount == 0) {
                                                return true;
                                            } else {
                                                return false;
                                            }

                                        }
                                    </script>
                                    <form action="" method="post" onsubmit="return submitamount();">
                                        <div class="tablesaw-bar tablesaw-mode-stack"></div>
                                        <br>
                                        <Br>
                                        <div class="form-actions">
                                            <div class="form-group user-test" id="user-exists">
                                                <label>Operator</label>
                                                <select name="Operator" id="Operator" class="form-control">
                                                    <?php $Operators =$mysqldb->select("select * from _tbl_operators where IsActive='1' and IsMobile='1' order by `OperatorName`");
                                                                foreach($Operators as $Operator){
                                                         ?>
                                                        <option value="<?php echo $Operator['OperatorCode'];?>" <?php echo $_POST[ 'Operator'] ? " selected='selected' " : "";?>>
                                                            <?php echo $Operator['OperatorName'];?>
                                                        </option>
                                                        <?php }?>
                                                </select>
                                                <div class="help-block"></div>
                                                <div class="help-block">
                                                    <p class="error" id="username-exists"></p>
                                                </div>
                                            </div>
                                            <div class="form-group user-test" id="user-exists">
                                                <label>Enter Mobile Number</label>
                                                <input type="text" maxlength="10" name="MobileNumber" id="MobileNumber" placeholder="Mobile Number" value="<?php echo (isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "");?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Mobile Number">
                                                <span class="errorstring" id="ErrMobileNumber"><?php echo isset($ErrMobileNumber)? $ErrMobileNumber : "";?></span>
                                                <div class="help-block"></div>
                                                <div class="help-block">
                                                    <p class="error" id="username-exists"></p>
                                                </div>
                                            </div>
                                            <div class="form-group user-test" id="user-exists">
                                                <label>Enter Amount</label>
                                                <input type="text" name="Amount" id="Amount" placeholder="Enter the amount. Your balance Rs. <?php echo number_format($balance,2);?>" value="<?php echo (isset($_POST['Amount']) ? $_POST['Amount'] : "");?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Amount">
                                                <span class="errorstring" id="ErrAmount"><?php echo isset($ErrAmount)? $ErrAmount : "";?></span>
                                                <div class="help-block"></div>
                                                <div class="help-block">
                                                    <p class="error" id="username-exists"></p>
                                                </div>
                                            </div>
                                            <div class="form-group user-test" id="user-exists">
                                                <label>Enter Confirm Amount</label>
                                                <input type="text" name="ConfirmAmount" id="ConfirmAmount" placeholder="Confirm Amount" value="<?php echo (isset($_POST['ConfirmAmount']) ? $_POST['ConfirmAmount'] : "");?>" class="form-control" required="" aria-invalid="true" data-validation-required-message="Please enter Confirm Amount">
                                                <span class="errorstring" id="ErrConfirmAmount"><?php echo isset($ErrConfirmAmount)? $ErrConfirmAmount : "";?></span>
                                                <div class="help-block"></div>
                                                <div class="help-block">
                                                    <p class="error" id="username-exists"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <span style="color:red"><?php echo $errormsg; ?></span>
                                        <div class="form-actions">
                                            <div class="text-right">
                                
                                <a href="dashboard.php?action=MoblieRecharge/MobileRechargeTransactions">View Transactions</a> &nbsp;&nbsp;
                            
                                                <button type="submit" class="btn btn-primary block-default" name="btnRecharge">Recharge Now</button>
                                            </div>
                                        </div>
                                    </form>
                        </div>
                    </div>
                </div>
                 <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                        <?php 
            if (isset($_POST['btnRecharge']) && ($error==0)) { 
                
                $id=$mysqldb->insert("_tbl_wallet_utility",array("MemberID"         => $_SESSION['User']['MemberID'],
                                                                      "Particulars"      => "Mobile Recharge ".$_POST['MobileNumber'],                    
                                                                      "Credits"          => "0",                    
                                                                      "Debits"           => $_POST['Amount'], 
                                                                      "AvailableBalance" => getUtilityhWalletBalance($_SESSION['User']['MemberID'])-$_POST['Amount'],                   
                                                                      "TxnDate"          => date("Y-m-d H:i:s")));

                $OperatorDetails =$mysqldb->select("select * from _tbl_operators where OperatorCode='".$_POST['Operator']."' and IsActive='1' and IsMobile='1'");
                
                $Recharge=$mysqldb->insert("_tbl_recharge_transactions",array("MemberID"     => $_SESSION['User']['MemberID'],
                                                                              "TxnDate"      => date("Y-m-d H:i:s"),                    
                                                                              "OperatorType" => "MRC",                    
                                                                              "OperatorCode" => $_POST['Operator'],                    
                                                                              "OperatorName" => $OperatorDetails[0]['OperatorName'],                    
                                                                              "RCNumber"     => $_POST['MobileNumber'],                    
                                                                              "RCAmount"     => $_POST['Amount'],                    
                                                                              "OperatorID"   => "",                    
                                                                              "Status"       => "SUCCESS",
                                                                              "WalletTxnID"  => $id));

                $mysqldb->execute("update _tbl_wallet_transactions set RechargeTransactionID='".$Recharge."' where TxnID='".$id."'");
                $request = file_get_contents("http://aaranju.in/recharge/api.php?apiusername=Z2djYXNoQGdtY&apipassword=WlsLmNvbQ==&optr=".$_POST['Operator']."&number=".$_POST['MobileNumber']."&amount=".$_POST['Amount']."&uid=".$Recharge);
                $response = json_decode($request,true);
                
                if ($response['response']['status']=="FAILURE") {
                    
                    $mysqldb->execute("update _tbl_wallet_utility set Debits='0',AvailableBalance=".(getUtilityhWalletBalance($_SESSION['User']['MemberID'])+$_POST['Amount'])." where TxnID='".$id."'");
                    $mysqldb->execute("update _tbl_recharge_transactions set Status='Failure' where RcTxnID='".$Recharge."'");
                        ?>
                        <div style="padding:36px">
                            <table align="center" style="margin:50px;width:400px;margin:0px auto">
                                <tr>
                                    <td style="text-align:center"><img src="assets/images/fail.png" style="width: 150px;"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center">
                                        <table align="center" style="width:300px;margin:0px auto">
                                            <tr>
                                                <td style="text-align:right;">Operator</td>
                                                <td  style="text-align:left;">:&nbsp;&nbsp;<?php echo $OperatorDetails[0]['OperatorName']; ?></td>
                                            </tr>
                                             <tr>
                                                <td style="text-align:right;">Number</td>
                                                <td style="text-align:left;">:&nbsp;&nbsp;<?php echo $_POST['MobileNumber']; ?></td>
                                            </tr>
                                             <tr>
                                                <td style="text-align:right;">Amount</td>
                                                <td style="text-align:left;">:&nbsp;&nbsp;<?php echo $_POST['Amount'];?></td>
                                            </tr>
                                             <tr>
                                                <td style="text-align:right;">Status</td>
                                                <td style="color:red;text-align:left;">:&nbsp;&nbsp;Failed (<?php echo $response['response']['error'];?>)</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <br><br>
                            <p align="center">
                                <a href="dashboard.php?action=MobileRecharge/MobileRechargeTransactions.php">View Summary</a>
                            </p>
                        </div>
                        <?php
                    
                } else {
                    $mysqldb->execute("update _tbl_recharge_transactions set OperatorID='".$response['response']['transid']."' where RcTxnID='".$Recharge."'");
                    //echo "Recharge Successfully"; 
                    ?>
                    <div style="padding:36px">
                            <table align="center" style="margin:50px;width:400px;margin:0px auto">
                                <tr>
                                    <td style="text-align:center"><img src="assets/images/tick.png" style="width: 150px;"></td>
                                </tr>
                                <tr>
                                    <td style="text-align:center">
                                        <table align="center" style="width:300px;margin:0px auto">
                                            <tr>
                                                <td style="text-align:right;">Operator</td>
                                                <td  style="text-align:left;">:&nbsp;&nbsp;<?php echo $OperatorDetails[0]['OperatorName']; ?></td>
                                            </tr>
                                             <tr>
                                                <td style="text-align:right;">Number</td>
                                                <td style="text-align:left;">:&nbsp;&nbsp;<?php echo $_POST['MobileNumber']; ?></td>
                                            </tr>
                                             <tr>
                                                <td style="text-align:right;">Amount</td>
                                                <td style="text-align:left;">:&nbsp;&nbsp;<?php echo $_POST['Amount'];?></td>
                                            </tr>
                                             <tr>
                                                <td style="text-align:right;">Status</td>
                                                <td style="color:green;text-align:left;">:&nbsp;&nbsp;Success</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <br><br>
                            <p align="center">
                                <a href="dashboard.php?action=MobileRecharge/MobileRechargeTransactions.php">View Summary</a>
                            </p>
                        </div>
                    <?php 
                }
                unset($_POST);
            } else {
                ?>
                        <div class="tablesaw-bar tablesaw-mode-stack"><h4 class="card-title text-orange">Recent Recharge Transactions</h4></div>
                            <div class="table-responsive">
                                    <table class="table v-middle" style="border: 1px solid; border-color: #e1e1e1;margin-bottom:0px">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0"><b>Txn Date</b></th>
                                                <th class="border-top-0"><b>Operator</b></th>
                                                <th class="border-top-0"><b>Number</b></th>
                                                <th class="border-top-0"><b>Amount</b></th>
                                                <th class="border-top-0"><b>Status</b></th>
                                                <th class="border-top-0"><b>Operator ID</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $Recharges = $mysqldb->select("Select * From _tbl_recharge_transactions where MemberID='".$_SESSION['User']['MemberID']."' and OperatorType='MRC' order by RcTxnID DESC LIMIT 0,5");?>
                                          <?php foreach ($Recharges as $Recharge){ ?>
                                            <tr>
                                                <td><?php echo $Recharge['TxnDate'];?></td>
                                                <td><?php echo $Recharge['OperatorName'];?></td>
                                                <td><?php echo $Recharge['RCNumber'];?></td>
                                                <td><?php echo  number_format($Recharge['RCAmount'],2);?></td>
                                                <td><?php echo $Recharge['Status'];?></td>
                                                <td><?php echo $Recharge['OperatorID'];?></td>
                                            </tr>
                                         <?php }?>
                                          <?php 
                                            $Transactioncount=$mysqldb->select("select count(RcTxnID) as count FROM _tbl_recharge_transactions where MemberID='".$_SESSION['User']['MemberID']."' and OperatorType='MRC'");
                                                if($Transactioncount[0]['count']>5){
                                            ?>
                                             <tr>    
                                                <td colspan="6" style="text-align: center;padding:10px !important;" ><a href="MobileRechargeTransactions.php">View More</a></td>
                                            </tr>
                                         <?php }?>  
                                         <?php if($Transactioncount[0]['count']=="0"){?>
                                                <tr>
                                                    <td colspan="6" style="text-align: center;">No Datas Found</td>
                                                </tr>
                                         <?php }?>  
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
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
            </script>
        </div>

        <?php include_once("footer.php"); ?>