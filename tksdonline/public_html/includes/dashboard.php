<div class="row" style="display: none;">
    <div class="col-12">
        <div style="padding:20px;margin:10px;border:1px solid #ccc;background:#cefca9;text-align:center;color:#555;border-radius:10px">
    <b>Independence Day Offer</b><br><br>
    Purchase Rs.1947 get Rs.2020<br><br>
    Profit Rs. 73 + Rs. 50<br>
    Only 15 August 2020<br>
    00:19:47 to 20:20:20<br>
    </div>
    </div>
</div>
<div style="padding:0px;text-align:center;margin-bottom:20px;"></div> 
<div class="row">
    <div class="col-4" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=mobilerc"  class="btn btn-icon glow mb-1" style="width:100%"  >
            <img src="assets/img/logo_prepaid.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
            <br>Prepaid<br>Recharge
        </a>
    </div>       
    <div class="col-4" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=dthrc" class="btn btn-icon glow mb-1" style="width:100%">
            <img src="assets/img/logo_dth.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
            <br>DTH<br>Recharge
        </a>
    </div>
    <div class="col-4" style="padding-right:6px;padding-left:6px;text-align: right;">
        <a href="dashboard.php?action=moneytransfer" class="btn btn-icon  glow mb-1" style="width:100%" >
            <img src="assets/img/logo_mmoneytransfer.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
            <br>Money<br>Transfer
        </a>
    </div>
</div>

<div class="row">
    <div class="col-4" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=ticketbooking"  class="btn btn-icon glow mb-1" style="width:100%"  >
            <img src="assets/img/logo_ticket.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
            <br>Ticket<br>Booking 
        </a>
    </div>
    <div class="col-4" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=bill_tneb" class="btn btn-icon glow mb-1" style="width:100%">
              <?php $tnebcont = $mysql->select("SELECT COUNT(txnid) AS cnt FROM _tbl_transactions where TxnStatus='requested' and operatorcode='ET' and memberid='".$_SESSION['User']['MemberID']."' ");?>
              <img src="assets/img/logo_electricity.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                <?php  
                if($tnebcont[0]['cnt']>0){ 
                    $notification_css="";
                    if ($tnebcont[0]['cnt']<=9) {
                        $notification_css = "padding:4px 11px 4px 11px;margin-top:-30px;right:0PX";
                        $count = $tnebcont[0]['cnt']; 
                    } elseif ($tnebcont[0]['cnt']>=10 && $tnebcont[0]['cnt']<100) {
                        $notification_css = "padding: 3px 8px 3px 8px;margin-top:-30px;right:0PX";
                        $count = $tnebcont[0]['cnt'];
                    } else {
                        $notification_css = "padding: 3px 4px 3px 7px;margin-top:-30px;right:0px";
                        $count = "99+";
                    }
                    ?>
                    <span style="position:absolute;top:20px;;background-color: #27AE6E;text-align: center;border-radius:50%;font-size: 10px;color: #ffffff;<?php echo $notification_css;?>"><?php echo $count;?></span>
                <?php } ?>
            <br>Electricity<br>Bill
        </a>
    </div>
    <div class="col-4" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=gasbill"  class="btn btn-icon glow mb-1" style="width:100%"  >
             <?php $gascont = $mysql->select("SELECT COUNT(txnid) AS cnt FROM _tbl_transactions where TxnStatus='requested' and operatorcode IN (select OperatorCode from _tbl_operators where OperatorType='10')  and memberid='".$_SESSION['User']['MemberID']."' ");?>
             <img src="assets/img/logo_gasbill.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
             <?php                                                                                                                                             
                if($gascont[0]['cnt']>0){ 
                    $notification_css="";
                    if ($gascont[0]['cnt']<=9) {
                        $notification_css = "padding:4px 11px 4px 11px;margin-top:-30px;right:0PX";
                        $count = $gascont[0]['cnt']; 
                    } elseif ($gascont[0]['cnt']>=10 && $gascont[0]['cnt']<100) {
                        $notification_css = "padding: 3px 8px 3px 8px;margin-top:-30px;right:0PX";
                        $count = $gascont[0]['cnt'];
                    } else {
                        $notification_css = "padding: 3px 4px 3px 7px;margin-top:-30px;right:0px";
                        $count = "99+";
                    }
                    ?>
                    <span style="position:absolute;top:20px;;background-color: #27AE6E;text-align: center;border-radius:50%;font-size: 10px;color: #ffffff;<?php echo $notification_css;?>"><?php echo $count;?></span>
                <?php } ?>
            <br>Gas<br>Bill 
        </a>
    </div>
    
</div>

<div class="row">
    <div class="col-4" style="padding-right:6px;padding-left:6px;text-align: right;">
        <a href="dashboard.php?action=landline" class="btn btn-icon  glow mb-1" style="width:100%" >
            <img src="assets/img/logo_landline.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
            <br>Landline<br>Bill
        </a>
    </div>
    <div class="col-4" style="padding-right:6px;padding-left:6px">                                                                        
        <a href="dashboard.php?action=mobilepostpaid"  class="btn btn-icon glow mb-1" style="width:100%"  >
             <img src="assets/img/logo_postpaid.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
            <br>Postpaid<br>Bill 
        </a>
    </div>
    
    <div class="col-4" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=insurance" class="btn btn-icon glow mb-1" style="width:100%">
            <img src="assets/img/logo_insurance.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
            <br>Insurance<br>Policy
        </a>
    </div>
</div>                       

<div class="row">
    <div class="col-4" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=utility_tnpolice"  class="btn btn-icon glow mb-1" style="width:100%"  >
             <?php $tnpcont = $mysql->select("SELECT COUNT(txnid) AS cnt FROM _tbl_transactions where TxnStatus='requested' and operatorcode='UTNP' and memberid='".$_SESSION['User']['MemberID']."' ");?>
            <img src="assets/img/logo_tnpolice.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                <?php  
                if($tnpcont[0]['cnt']>0){ 
                    $notification_css="";
                    if ($tnpcont[0]['cnt']<=9) {
                        $notification_css = "padding:4px 11px 4px 11px;margin-top:-30px;right:0PX";
                        $count = $tnpcont[0]['cnt']; 
                    } elseif ($tnpcont[0]['cnt']>=10 && $tnpcont[0]['cnt']<100) {
                        $notification_css = "padding: 3px 8px 3px 8px;margin-top:-30px;right:0PX";
                        $count = $tnpcont[0]['cnt'];
                    } else {
                        $notification_css = "padding: 3px 4px 3px 7px;margin-top:-30px;right:0px";
                        $count = "99+";
                    }
                    ?>
                    <span style="position:absolute;top:20px;;background-color: #27AE6E;text-align: center;border-radius:50%;font-size: 10px;color: #ffffff;<?php echo $notification_css;?>"><?php echo $count;?></span>
                <?php } ?>
            <br>TN Police 
        </a>
    </div>
    <div class="col-4" style="padding-right:6px;padding-left:6px;text-align: right;">
        <a href="dashboard.php?action=accountsummary" class="btn btn-icon  glow mb-1" style="width:100%" >
            <img src="assets/img/logo_accounts.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
            <br>Account<br>Summary
        </a>
    </div>
    <div class="col-4" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=txnhistory"  class="btn btn-icon glow mb-1" style="width:100%"  >
            <img src="assets/img/logo_transaction.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
            <br>Txn<br>History
        </a>
    </div>
     <!--<div class="col-4" style="padding-right:6px;padding-left:6px">
       <a href="dashboard.php?action=pendings" class="btn btn-icon glow mb-1" style="width:100%">
            <?php $txncont = $mysql->select("SELECT COUNT(txnid) AS cnt FROM _tbl_transactions where TxnStatus='requested' and memberid='".$_SESSION['User']['MemberID']."'");?>
            <img src="assets/img/logo_pendings.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
                <?php  
                if($txncont[0]['cnt']>0){ 
                    $notification_css="";
                    if ($txncont[0]['cnt']<=9) {
                        $notification_css = "padding:4px 11px 4px 11px;margin-top:-30px;right:0PX";
                        $count = $txncont[0]['cnt']; 
                    } elseif ($txncont[0]['cnt']>=10 && $txncont[0]['cnt']<100) {
                        $notification_css = "padding: 3px 8px 3px 8px;margin-top:-30px;right:0PX";
                        $count = $txncont[0]['cnt'];
                    } else {
                        $notification_css = "padding: 3px 4px 3px 7px;margin-top:-30px;right:0px";
                        $count = "99+";
                    }
                    ?>
                    <span style="position:absolute;top:20px;;background-color: #27AE6E;text-align: center;border-radius:50%;font-size: 10px;color: #ffffff;<?php echo $notification_css;?>"><?php echo $count;?></span>
                <?php } ?>
            <br>Pending<br>Txn  
        </a>
    </div> -->
</div>
             
<div class="row">
    
    <div class="col-4" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=agents_manage"  class="btn btn-icon glow mb-1" style="width:100%"  >
             <img src="assets/img/logo_distributors.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
             <br>Manage<br>Agents
        </a>
    </div>
    <div class="col-4" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=settings" class="btn btn-icon glow mb-1" style="width:100%">
            <img src="assets/img/logo_settings.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
            <br>Profile<br>Settings  
          <!-- <img src="assets/img/logo_walletcredit.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
           <br>Wallet<br>Credits   -->
        </a>
    </div>
    <div class="col-4" style="padding-right:6px;padding-left:6px;text-align: right;">
        <a href="dashboard.php?action=settings_manage_mycontacts"  class="btn btn-icon  glow mb-1" style="width:100%" >
            <img src="assets/img/logo_myprofile.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
            <br>My<br>Contacts
        </a>     
    </div>
    <div class="col-4" style="padding-right:6px;padding-left:6px;text-align: right;">
        <a href="dashboard.php?action=creditsales" class="btn btn-icon  glow mb-1" style="width:100%" >
            <img src="assets/img/logo_creditsale.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
            <br>Credit<br>Sales
        </a>
    </div>
</div> 
         
          
           
              
       
     <!--       
            <div class="row">
                <div class="col-4" style="padding-right:6px;padding-left:6px">
                    <a href="dashboard.php?action=cashback" class="btn btn-icon btn-success glow  mb-1" style="min-width:100%">Cashback<br>
                    <?php echo number_format($application->getCashback($_SESSION['User']['MemberID']),2);?>
                    </a>
                </div>
                <div class="col-4" style="padding-right:6px;padding-left:6px">
                    <a href="dashboard.php?action=charges" class="btn btn-icon btn-success glow  mb-1" style="width:100%;font-size:0.9rem !important">Charges<br>
                    <?php echo number_format($application->getCharges($_SESSION['User']['MemberID']),2);?>
                    </a>
                </div>
                <div class="col-4" style="padding-right:6px;padding-left:6px;text-align: right;">
                    <a href="dashboard.php?action=pendingbills" class="btn btn-icon btn-success glow mb-1" style="width:100%">Pending<br>Bills</a>
                </div>
            </div> -->