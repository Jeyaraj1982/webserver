<div style="padding:0px;text-align:center;margin-bottom:20px;">
    <h5>Gas Bill</h5>
</div> 
<div class="row">
    <div class="col-4" style="padding-right:6px;padding-left:6px">
        <?php $gascont = $mysql->select("SELECT COUNT(txnid) AS cnt FROM _tbl_transactions where TxnStatus='requested' and operatorcode='BG' and memberid='".$_SESSION['User']['MemberID']."' ");?>
        <a href="dashboard.php?action=gasbill_bharat" class="btn btn-icon glow mb-1" style="width:100%"  >
            <img src="https://abjeservice.in/assets/img/logo_bharat-gas.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
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
        </a>
    </div>
    <div class="col-4" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=gasbill_hbgas" class="btn btn-icon glow mb-1" style="width:100%"  >
            <img src="https://abjeservice.in/assets/img/logo_hb_gas.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
            <?php $gascont = $mysql->select("SELECT COUNT(txnid) AS cnt FROM _tbl_transactions where TxnStatus='requested' and operatorcode='HPG' and memberid='".$_SESSION['User']['MemberID']."' ");?>
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
        </a>
    </div>
    <div class="col-4" style="padding-right:6px;padding-left:6px">
        <a href="dashboard.php?action=gasbill_indane" class="btn btn-icon glow mb-1" style="width:100%"  >
            <img src="https://abjeservice.in/assets/img/logo_indane_gas.png" style="width:100%;border:1px solid #ccc;border-radius:10px;">
            <?php $gascont = $mysql->select("SELECT COUNT(txnid) AS cnt FROM _tbl_transactions where TxnStatus='requested' and operatorcode='ING' and memberid='".$_SESSION['User']['MemberID']."' ");?>
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
        </a>
    </div>
</div>
            
            
             
              