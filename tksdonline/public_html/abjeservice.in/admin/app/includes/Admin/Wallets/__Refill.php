<?php
    if (isset($_POST['refillBtn2'])) {
        $member = $mysql->select("Select * from _tbl_member where `MobileNumber`='".$_POST['MemberCode']."'");
        $error=0;
        if (sizeof($member)==0) {
            $error++;
            $errormsg = "Agent not found";
        }
        if (!($_POST['Amount']*1>=100 && $_POST['Amount']*1<=10000000)) {
            $error++;
            $errormsg = "Amount must have greater than Rs.100 and Rs.10000000";
        }
        if ($error==0) {
            $balance = $application->getBalance($member[0]['MemberID'])+$_POST['Amount'];
            $id=$mysql->insert("_tbl_accounts",array("MemberID"    => $member[0]['MemberID'],
                                                     "Particulars" => 'Refill Wallet/FromAdmin',                    
                                                     "Credit"      => $_POST['Amount'],                    
                                                     "Debit"       => "0", 
                                                     "Balance"     => $balance,                   
                                                     "Voucher"     => "-1",                    
                                                     "TxnDate"     => date("Y-m-d H:i:s")));
            //$d = MobileSMS::sendSMS($member[0]['MobileNumber'],"Your Utility Wallet has been updated. Available Utility Wallet Balance Rs.".number_format($balance,2),$member[0]['MemberID']);
            ?>
            <script>
                swal("Transfer Successfully", {
                    icon:"success",
                    confirm: {value: 'Continue'}
                }).then((value) => {
                    location.href='dashboard.php?action=Wallets/Refill'
                });
            </script>
        <?php } else { ?>
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
            <li class="nav-item"><a href="dashboard.php?action=Wallets/Refill">Wallets</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Wallets/Refill">Refill To Member</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="card">
        <div class="card-header">
                    <div class="card-title">Refill to Member</div>
                </div>
            <div class="card-body">
                <form method="post" action="dashboard.php?action=Wallets/Refill_List">
                   
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-6 b-r">
                            <strong>Super Agent / Agent Mobile Number or number</strong>
                            <br>
                            <input type="text" name="MemberCode" id="MemberCode" class="form-control" value="<?php echo isset($_POST['MemberCode']) ? $_POST['MemberCode'] : "";?>">
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-4 col-xs-6 b-r">
                            <button type="submit" name="refillBtn" id="refillBtn" class="btn btn-primary" >Refill</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>            
</div>
<?php include_once("footer.php"); ?>