<div style="padding:0px;text-align:center;margin-bottom:20px;">
    <h5>Credits Transfer</h5>
    <h6 style="color:#999">Balance: Rs. <?php echo $application->getBalance($_SESSION['User']['MemberID']);?></h6>
</div> 
<?php if ($_SESSION['User']['IsDistributor']=="1") { 
    $summary = $mysql->select("select * from `_tbl_member` where `MapedTo`='".$_SESSION['User']['MemberID']."' and `IsActive`='1' and MemberID='".$_GET['agent']."' order by MemberID desc");
    ?>
    <?php if (isset($_POST['submitRequest'])) { ?>
        <script>$('#myModal').modal("show");</script>
        <?php
        
           $error =0;                                       
        
        
        if (!($application->getBalance($_SESSION['User']['MemberID'])>=$_POST['Amount'])) {
            $error++;
            $result['status']="failure";
            $result['message']="insufficant balance";
        }
        
        if ($_POST['Amount']<1000) {
            $error++;
            $result['status']="failure";
            $result['message']="amount should be greater than 1000";
        }
        
        if ($_POST['Amount']!=$_POST['CAmount']) {
            $error++;
            $result['status']="failure";
            $result['message']="amount should be same";
        }
        
        
        if ($error==0) {
            
            $particulars = 'Refill Wallet/Distributor: '.$_SESSION['User']['MemberName'].' ('.$_SESSION['User']['MobileNumber'].') /Agent: '.$summary[0]['MemberName'].' ('.$summary[0]['MobileNumber'].')';
            $balance = $application->getBalance($_SESSION['User']['MemberID'])-$_POST['Amount'];
            $id=$mysql->insert("_tbl_accounts",array("MemberID"    => $_SESSION['User']['MemberID'],
                                                     "Particulars" => $particulars,                    
                                                     "Credit"      => "0",                    
                                                     "Debit"       => $_POST['Amount'], 
                                                     "Balance"     => $balance,                   
                                                     "Voucher"     => "101",                    
                                                     "TxnDate"     => date("Y-m-d H:i:s")));

            $com = $_POST['Amount'] * (0.50/100);

            $xid=$mysql->insert("_tbl_accounts",array("MemberID"    => $_SESSION['User']['MemberID'],
                                                     "Particulars" => 'Bonus Commission/FromAdmin Wallet Transfer',                    
                                                     "Credit"      => $com,                    
                                                     "Debit"       => "0", 
                                                     "Balance"     => $balance+$com,                   
                                                     "Voucher"     => "-2",                    
                                                     "TxnDate"     => date("Y-m-d H:i:s")));
                                                    
            $balance = $application->getBalance($summary[0]['MemberID'])+$_POST['Amount'];
            $id=$mysql->insert("_tbl_accounts",array("MemberID"    => $summary[0]['MemberID'],
                                                     "Particulars" => $particulars,                    
                                                     "Credit"      => $_POST['Amount'],                    
                                                     "Debit"       => "0", 
                                                     "Balance"     => $balance,                   
                                                     "Voucher"     => "102",                    
                                                     "TxnDate"     => date("Y-m-d H:i:s")));
                                                     
           //  MobileSMS::sendSMS($summary[0]['MobileNumber'],"Your wallet has credited Rs. ".$_POST['Amount'].". Wallet Balance Rs.".number_format($balance,2),$summary[0]['MemberID']);
            
        $message = "Dear ".$summary[0]['MemberName'].", Your wallet has been credited Rs. ".$_POST['Amount'].". Wallet Balance Rs.".number_format($balance,2);
        if ($summary[0]['TelegramID']>0)  {     
            TelegramMessageController::sendSMS($summary[0]['TelegramID'],$message,0,0);
        }
        Whatsapp::sendsms("91".$summary[0]['MobileNumber'],$message,0,"");
        
        /*SMSController::sendSMS(array("TelegramID"   => ($summary[0]['TelegramID']>0) ? $summary[0]['TelegramID'] : 0,
                                     "MobileNumber" => $summary[0]['MobileNumber'],
                                     "Message"      => $message,
                                     "MemberID"     => $summary[0]['MemberID']));*/
        
            $result['status']="success";
        } 
        
        
        echo "<script>$('#myModal').modal('hide');$('#title_').hide();</script>";
        if ($result['status']=="success") {
        ?>
            <div class="row">
                <div style="padding:20px;text-align:center;width:100%;color:#666;line-height:25px;padding-bottom:0px;">
                    <img src="assets/img/success.png" style="width:250px">
                </div>
                <div style="padding:20px;text-align:center;width:100%;">
                    Rs. <?php echo $_POST['Amount'];?> Transferred
                </div> 
                <a href="dashboard.php?action=agents_manage" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a>
            </div>
        <?php } else {?>
            <div class="row">
                <div style="padding:20px;text-align:center;width:100%;color:#666;line-height:25px;padding-bottom:0px;">
                    <img src="assets/img/failure.png" style="width:250px">
                </div>
                <div style="padding:20px;text-align:center;width:100%;color:red;line-height:25px;">
                    Transfer failed<br>
                    <?php echo $result['message']; ?>
                </div>
                <a href="dashboard.php?action=agents_manage" class="btn btn-success  glow w-100 position-relative">Continue<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a><br><br>
                <a href="dashboard.php?action=agents_manage" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a>
            </div>
        <?php } ?>
    <?php } else { ?>                     
        <div class="row">
            <form action="" method="post" style="width: 80%;margin: 0px auto;">
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Agent Name</label>
                    <input type="text"  value="<?php echo $summary[0]['MemberName'];?>" disabled="disabled" class="form-control">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Agent Mobile Number</label>
                    <input type="number"  value="<?php echo $summary[0]['MobileNumber'];?>" disabled="disabled"  class="form-control">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Amount</label>
                    <input type="number"  value="<?php echo isset($_POST['Amount']) ? $_POST['Amount'] : "";?>" maxlength="10" name="Amount" id="Amount" class="form-control" placeholder="Amount" required="">
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">Confirm Amount</label>
                    <input type="number"  value="<?php echo isset($_POST['CAmount']) ? $_POST['CAmount'] : "";?>" maxlength="10" name="CAmount" id="CAmount" class="form-control" placeholder="Confrim Amount" required="">
                </div>
                <div class="form-group">
                    <p align="center" style="color:red">&nbsp;<?php echo $error;?></p>
                </div>
                <button type="submit" name="submitRequest" class="btn btn-success  glow w-100 position-relative">Transfer now<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button><br><br>
                <a href="dashboard.php?action=agents_manage" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a>
            </form>         
        </div>
    <?php } ?>
<?php } else { ?>
<div class="row">
    <div style="padding:20px;color:red;text-align:center;width:100%;">Permission denied. please contact administrator</div>
    <div style="width: 100%"><a href="dashboard.php?action=agents_manage" class="btn btn-success  glow w-100 position-relative">Transfer Now<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></a></div>
    <div style="width:100%;padding-top:15px"><a href="dashboard.php?action=agents_manage" class="btn btn-outline-success glow w-100 position-relative"><i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;">Back</i></a></div>
</div>
<?php } ?>
