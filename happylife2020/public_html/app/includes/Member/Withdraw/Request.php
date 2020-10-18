<?php
    $BankDetails =$mysql->select("select * from _tbl_member_bank_details where MemberID='". $_SESSION['User']['MemberID']."'");
    $EarningWalletBalance = getEarningWalletBalance($_SESSION['User']['MemberID']);
    
    if (sizeof($BankDetails)==0) {
    ?>   
    <script>
        swal({
            title: 'Payout',
            text: "No bank accounts details found in your account, you must add bank details",
            type: 'warning',
            buttons:{
                confirm: {
                    text : 'Add Bank Information',
                    className : 'btn btn-success'
                }
            }
        }).then((Delete) => {
            if (Delete) {
                location.href='dashboard.php?action=Payouts/AddBank';
            } else {
                swal.close();
            }
        });
    </script>
    <?php
    } elseif ($EarningWalletBalance==0 && (!(isset($_POST['btnWithDraw'])))) {
    ?>
        <script>
        swal({
            title: 'Payout',
            text: "Couldn't process your request, your have insufficiant fund.",
            type: 'warning',
            buttons:{
                confirm: {
                    text : 'Close',
                    className : 'btn btn-success'
                }
            }
        }).then((Delete) => {
            if (Delete) {
                location.href='dashboard.php';
            } else {
                swal.close();
            }
        });
    </script>
    <?php    
    } else {
    $MinimumPayout = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MinPayout')"); 
    $MaximumPayout = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('MaxPayout')"); 
    $PayoutCharges = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('PayoutCharges')"); 
    
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
                                                                          
                $balance = getEarningWalletBalance($_SESSION['User']['MemberID'])-$_POST['Amount'];
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
                $id=$mysql->insert("_tbl_payout_request_earnings",array("MemberID"      => $_SESSION['User']['MemberID'],
                                                                          "RequestedOn"   => date("Y-m-d H:i:s"),
                                                                          "Amount"        => $_POST['Amount'],
                                                                          "BankName"      => "Wallet Utility",
                                                                          "AccountNumber" => $_SESSION['User']['MemberCode'],
                                                                          "IFSCode"       => " ",
                                                                          "AccountName"   => " ",
                                                                          "IsApproved"    => "1",
                                                                          "IsApprovedOn"  => date("Y-m-d H:i:s"))); 
                
                $balance = getEarningWalletBalance($_SESSION['User']['MemberID'])-$_POST['Amount'];
                $did = $mysql->insert("_tbl_wallet_earnings",array("MemberID"=>$_SESSION['User']['MemberID'],
                                                                     "MemberCode"=>$_SESSION['User']['MemberCode'],
                                                                     "Particulars"=>"Payout To Utility, Req ID: ".$id,
                                                                     "TxnDate"=>date("Y-m-d H:i:s"),
                                                                     "Credits"=>"0",
                                                                     "Debits"=>$_POST['Amount'],
                                                                     "AvailableBalance"=>$balance,
                                                                     "details"=>"Instant Payout To Utility Wallet"));                                                          
                                                                     
                $balance = getUtilityhWalletBalance($_SESSION['User']['MemberID'])+$_POST['Amount'];
                $id=$mysql->insert("_tbl_wallet_utility",array("MemberID"         => $_SESSION['User']['MemberID'],
                                                                 "Particulars"      => 'Form Payout Request ID: '.$id,                    
                                                                 "Credits"          => $_POST['Amount'],                    
                                                                 "Debits"           => "0", 
                                                                 "AvailableBalance" => $balance,                   
                                                                 "RequestID"        => $id,                    
                                                                 "TxnDate"          => date("Y-m-d H:i:s"))); 
                
                                                                                                                                                                                         
                                                                 
                $member = $mysql->select("select * from `_tbl_Members` where `MemberID`='".$_SESSION['User']['MemberID']."'");
                $d = MobileSMS::sendSMS($member[0]['MobileNumber'],"Your Utility Wallet has been updated. Available Utility Wallet Balance Rs.".number_format($balance,2),$_SESSION['User']['MemberID']);
                 echo "<span style='color:green'>Amount Transfered To your utility wallet.</span>";  
           
            } elseif ($_POST['BankName']==-2) {
               
                $id=$mysql->insert("_tbl_payout_request_earnings",array("MemberID"      => $_SESSION['User']['MemberID'],
                                                                          "RequestedOn"   => date("Y-m-d H:i:s"),
                                                                          "Amount"        => $_POST['Amount'],
                                                                          "BankName"      => "Wallet Epin",
                                                                          "AccountNumber" => $_SESSION['User']['MemberCode'],
                                                                          "IFSCode"       => " ",
                                                                          "AccountName"   => " ",
                                                                          "IsApproved"    => "1",
                                                                          "IsApprovedOn"  => date("Y-m-d H:i:s")));
                                                                           
                $balance = getEarningWalletBalance($_SESSION['User']['MemberID'])-$_POST['Amount'];
                $did = $mysql->insert("_tbl_wallet_earnings",array("MemberID"=>$_SESSION['User']['MemberID'],
                                                                     "MemberCode"=>$_SESSION['User']['MemberCode'],
                                                                     "Particulars"=>"Payout To Epin Req ID: ".$id,
                                                                     "TxnDate"=>date("Y-m-d H:i:s"),
                                                                     "Credits"=>"0",
                                                                     "Debits"=>$_POST['Amount'],
                                                                     "AvailableBalance"=>$balance,
                                                                     "details"=>"Instant Payout To Epin Wallet"));
                
                 $balance = getEpinWalletBalance($_SESSION['User']['MemberID'])+$_POST['Amount'];                                                
                 $id=$mysql->insert("_tbl_wallet_epin",array("MemberID"         => $_SESSION['User']['MemberID'],
                                                               "Particulars"      => 'Form Payout Request ID: '.$id,                   
                                                               "Credits"          => $_POST['Amount'],                    
                                                               "Debits"           => "0", 
                                                               "AvailableBalance" => $balance,                   
                                                               "RequestID"        => $id,                    
                                                               "TxnDate"          => date("Y-m-d H:i:s")));  
                                                                     
                $member = $mysql->select("select * from `_tbl_Members` where `MemberID`='".$_SESSION['User']['MemberID']."'");
                $d = MobileSMS::sendSMS($member[0]['MobileNumber'],"Your EPin Wallet has been updated. Available Epin Wallet Balance Rs.".number_format($balance,2),$_SESSION['User']['MemberID']);
                 echo "<span style='color:green'>Amount Transfered To your Epin wallet.</span>";  
            }
            
            unset($_POST);
        } else {
            echo "<span style='color:red'>Payout amount must have between Rs.".$MinimumPayout[0]['ParamValue'] ." and  Rs.".$MaximumPayout[0]['ParamValue'] ."</span>";
        }
    }                                                                                           
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Payouts/Request">Payout</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Payouts/Request">Payout Request</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Payout Request</div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row"> 
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="email2">Payout Amount</label>
                                    <input class="form-control" id="refillAmount" placeholder="Payout Amount" type="text">
                                </div>
                                 <div class="form-group">
                                    <label for="email2">Payout To</label>
                                    <div class="select2-input">
                                        <select id="basic" name="basic" name="TransferTo" class="form-control">
                                            <option value="-1">My Utility Wallet</option>
                                            <?php foreach($BankDetails as $BankDetail){ ?>
                                            <option value="<?php echo $BankDetail['BankID'];?>" <?php echo $_POST[ 'BankName'] ? " selected='selected' " : "";?>><?php echo $BankDetail['BankName'];?>&nbsp;-&nbsp;<?php  echo $BankDetail['AccountNumber']; ?>&nbsp;-&nbsp;<?php echo $BankDetail['IFSCode']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <p align="right" style="margin-bottom: 0px;padding-bottom: 0px;margin-top: -15px;padding-right: 0px;margin-right: 0px;""><a href="dashboard.php?action=Payouts/AddBank">Add Bank</a></p>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <input class="btn btn-primary" id="password"  value="Send Request"   type="submit">
                                    &nbsp;&nbsp;<a href="dashboard.php?action=Payouts/Requests">View previous requests</a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                 <div class="form-group">
                                    <label for="email2">Available Balance:<br>Rs. 0.00</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                         <div class="col-md-12">
                                <div class="form-group" style="color:#888">
                                    Minimum Payout : Rs. <?php echo number_format($MinimumPayout[0]['ParamValue'],2);?> and Maximum Payout : Rs. <?php echo number_format($MaximumPayout[0]['ParamValue'],2);?><br>
                                    Payout Charges :  <?php echo number_format($PayoutCharges[0]['ParamValue'],2);?>%<br>
                                    Payout To your Wallet is instant service<br>
                                    Payout To your Bank Account is schedule service based on bank working days.
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
        });

        });
</script> 
<?php } ?>