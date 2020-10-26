<?php 
 $m = $mysql->select("select * from _tbl_Members where MemberID='".$_SESSION['User']['MemberID']."'");
                if(strlen($m[0]['MemberPin']==0)){
                  echo "<script>location.href='dashboard.php?action=create_pin';</script>";  
                exit;
                } else{
?>
<div style="padding:0px;text-align:center;margin-bottom:20px;"></div> 
<?php if ($_SESSION['User']['IsMember']==1) { ?>

<div class="row">
    <div class="col-3" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=mobilerc" class="btn glow mb-1 theme-1">
            <img src="" class="theme-1-icon" id="icon_prepaidmobile">
            <br>Prepaid
        </a>
    </div>       

    <div class="col-3" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=dthrc" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_dth.png" class="theme-1-icon">
            <br>DTH
        </a>
    </div>
    <div class="col-3" style="padding-right:6px;padding-left:6px;text-align: right;">
        <a href="dashboard.php?action=moneytransfer_tobank" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_mmoneytransfer.png" class="theme-1-icon">
            <br>IMPS
        </a>
    </div>
     <div class="col-3" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=bill_tneb" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_tneb.png" class="theme-1-icon">
            <?php $tnebtxncont = $mysql->select("SELECT COUNT(txnid) AS cnt FROM _tbl_transactions where TxnStatus='accepted' and operatorcode='ET' and MemberID='".$_SESSION['User']['MemberID']."'");?>
                <?php if($tnebtxncont[0]['cnt']>0){ 
                    $notification_css="";
                    if ($tnebtxncont[0]['cnt']<=9) {
                        $notification_css = "padding:4px 7px 5px 8px;margin-top:-12px;right:10px";
                        $count = $tnebtxncont[0]['cnt']; 
                    } elseif ($tnebtxncont[0]['cnt']>=10 && $tnebtxncont[0]['cnt']<100) {
                        $notification_css = "padding:4px 5px 6px 5px;margin-top:-16px;right:10px";
                        $count = $tnebtxncont[0]['cnt'];
                    } else {
                        $notification_css = "padding:7px 4px 8px 7px;margin-top:-20px;right:5px";
                        $count = "99+";
                    }
                    ?>
                    <span style="position:absolute;top:20px;;background-color: #CE3131;text-align: center;border-radius:50%;font-size: 10px;color: #ffffff;<?php echo $notification_css;?>"><?php echo $count;?></span>
                <?php } ?>
            <br>TNEB
        </a>
    </div> 
</div>
<div class="row">
    <div class="col-3" style="padding-right:6px;padding-left:6px;">
        <a href="dashboard.php?action=utility_tnpolice" class="btn glow mb-1 theme-1">
            <img src="assets/img/police.jpeg" class="theme-1-icon">
            <?php $utnptxncont = $mysql->select("SELECT COUNT(txnid) AS cnt FROM _tbl_transactions where TxnStatus='accepted' and operatorcode='UTNP'  and MemberID='".$_SESSION['User']['MemberID']."'");?>
                <?php if($utnptxncont[0]['cnt']>0){ 
                    $notification_css="";
                    if ($utnptxncont[0]['cnt']<=9) {
                        $notification_css = "padding:4px 7px 5px 8px;margin-top:-12px;right:10px";
                        $count = $utnptxncont[0]['cnt']; 
                    } elseif ($utnptxncont[0]['cnt']>=10 && $utnptxncont[0]['cnt']<100) {
                        $notification_css = "padding:4px 5px 6px 5px;margin-top:-16px;right:10px";
                        $count = $utnptxncont[0]['cnt'];
                    } else {
                        $notification_css = "padding:7px 4px 8px 7px;margin-top:-20px;right:5px";
                        $count = "99+";
                    }
                    ?>
                    <span style="position:absolute;top:20px;;background-color: #CE3131;text-align: center;border-radius:50%;font-size: 10px;color: #ffffff;<?php echo $notification_css;?>"><?php echo $count;?></span>
                <?php } ?>
            <br>TN Police
        </a>
    </div>
    <div class="col-3" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=txnhistory"  class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_transaction.png" class="theme-1-icon">
            <br>Txns
        </a>                                                                                      
    </div>
    <div class="col-3 " style="padding-right:6px;padding-left:6px;text-align: right;">
        <a href="dashboard.php?action=pendings" class="btn glow mb-1 theme-1">
            <?php $txncont = $mysql->select("SELECT COUNT(txnid) AS cnt FROM _tbl_transactions where TxnStatus='requested' and MemberID='".$_SESSION['User']['MemberID']."'");?>
            <img src="assets/img/logo_transaction_pending.png" class="theme-1-icon">
                <?php if($txncont[0]['cnt']>0){ 
                    $notification_css="";
                    if ($txncont[0]['cnt']<=9) {
                        $notification_css = "padding:4px 7px 5px 8px;margin-top:-12px;right:10px";
                        $count = $txncont[0]['cnt']; 
                    } elseif ($txncont[0]['cnt']>=10 && $txncont[0]['cnt']<100) {
                        $notification_css = "padding:4px 5px 6px 5px;margin-top:-16px;right:10px";
                        $count = $txncont[0]['cnt'];
                    } else {
                        $notification_css = "padding:7px 4px 8px 7px;margin-top:-20px;right:5px";
                        $count = "99+";
                    }
                    ?>
                    <span style="position:absolute;top:20px;;background-color: #CE3131;text-align: center;border-radius:50%;font-size: 10px;color: #ffffff;<?php echo $notification_css;?>"><?php echo $count;?></span>
                <?php } ?>
            <br>Pendings  
        </a>    
    </div>
    <div class="col-3" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=txnhistory_num"  class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_transaction_search.png" class="theme-1-icon">
            <br>Search
        </a>    
    </div>
</div>
<div class="row">
     <div class="col-3" style="padding-right:6px;padding-left:6px;text-align: right;">
        <a href="dashboard.php?action=accountsummary" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_accounts_history.png" class="theme-1-icon">
            <br>Accounts
        </a>
    </div>
     <div class="col-3" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=manage_news" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_news.png" class="theme-1-icon">
            <br>News  
        </a>
    </div>
    <div class="col-3" style="padding-right:6px;padding-left:6px">                     
        <a href="dashboard.php?action=wallet" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_wallet.png" class="theme-1-icon">
            <br>Wallet  
        </a>
    </div>
    <div class="col-3" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=settings" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_settings.png" class="theme-1-icon">
            <br>Settings  
        </a>
    </div>
</div>
<div class="row">
    <div class="col-3" style="padding-right:6px;padding-left:6px;">
        <a href="dashboard.php?action=my_contacts_manage" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_contacts.png" class="theme-1-icon">
            <br>Contacts
        </a>
    </div>    
</div>
 <?php } ?>   
 <div class="row">  
   <?php if ($_SESSION['User']['IsDealer']==1) { ?>
    <div class="col-3" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=agents_manage" class="btn glow mb-1 theme-1">
             <img src="assets/img/logo_distributors.png" class="theme-1-icon">
             <br>Retailers
        </a>
    </div>
    <div class="col-3" style="padding-right:6px;padding-left:6px;text-align: right;">
        <a href="dashboard.php?action=accounts" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_accounts_history.png" class="theme-1-icon">
            <br>Accounts
        </a>
    </div>
    <div class="col-3" style="padding-right:6px;padding-left:6px;text-align: right;">
        <a href="dashboard.php?action=settings" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_settings.png" class="theme-1-icon">
            <br>My Profile
        </a>
    </div>
    <div class="col-3" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=manage_news" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_news.png" class="theme-1-icon">
            <br>News  
        </a>
    </div>
    <div class="col-3" style="padding-right:6px;padding-left:6px">                     
        <a href="dashboard.php?action=wallet" class="btn glow mb-1 theme-1">
            <img src="assets/img/logo_wallet.png" class="theme-1-icon">
            <br>Wallet  
        </a>
    </div>
    <?php } ?>
</div>  
<?php } ?> 
    <script>
    $('#icon_prepaidmobile').attr("src",icon_prepaidmobile);
    </script> 
 