<?php include_once("header.php");?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <?php
                if ($_SESSION['user']['transactionsms']==1) {
                    echo transactionsms();
                }
                
                if ($_SESSION['user']['international_sms']==1) {
                    echo internationalsms();
                }
                
                if ($_SESSION['user']['promotionalsms']==1) {
                    echo promotionalsms();
                }
                
                if ($_SESSION['user']['service_ifscode']==1) {
                    echo service_ifscode();
                } 
                
                if ($_SESSION['user']['service_pincode']==1) {
                    echo service_pincode();
                }
                
                if ($_SESSION['user']['mobiledthrecharge']==1) {
                    echo mobiledthrecharge();
                }
                
                if ($_SESSION['user']['busticket']==1) {
                    echo service_busticket();
                }
                
                if ($_SESSION['user']['service_email']==1) {
                    echo service_email();
                }
                
                if ($_SESSION['user']['moneytransfer']==1) {
                    echo service_moneytransfer();
                }
                
                if ($_SESSION['user']['service_whatsapp']==1) {
                    echo service_whatsapp();
                }
                
                if ($_SESSION['user']['service_rechargeplan']==1) {
                    echo service_rechargeplan();
                }
                
                if ($_SESSION['user']['service_tnebbill_info']==1) {
                    echo service_tnebbill_info();
                }
                
                if ($_SESSION['user']['service_tnebbill_payment']==1) {
                    echo service_tnebbill_payment();
                }
                
                if ($_SESSION['user']['service_telegram']==1) {
                    echo service_telegram();
                }
                ?>
            </div>
            <div class="row">
                <?php
                if ($_SESSION['user']['transactionsms']==0) {
                    echo transactionsms();
                }
                
                 if ($_SESSION['user']['international_sms']==0) {
                    echo internationalsms();
                }
                
                if ($_SESSION['user']['promotionalsms']==0) {
                    echo promotionalsms();
                }
                
                if ($_SESSION['user']['service_ifscode']==0) {
                    echo service_ifscode();
                } 
                
                if ($_SESSION['user']['service_pincode']==0) {
                    echo service_pincode();
                }
                
                if ($_SESSION['user']['mobiledthrecharge']==0) {
                    echo mobiledthrecharge();
                }
                
                if ($_SESSION['user']['busticket']==0) {
                    echo service_busticket();
                }
                
                if ($_SESSION['user']['service_email']==0) {
                    echo service_email();
                }
                
                if ($_SESSION['user']['moneytransfer']==0) {
                    echo service_moneytransfer();
                }
                
                if ($_SESSION['user']['service_whatsapp']==0) {
                    echo service_whatsapp();
                }
                
                if ($_SESSION['user']['service_rechargeplan']==0) {
                    echo service_rechargeplan();
                }
                
                if ($_SESSION['user']['service_tnebbill_info']==0) {
                    echo service_tnebbill_info();
                }
                
                if ($_SESSION['user']['service_tnebbill_payment']==0) {
                    echo service_tnebbill_payment();
                }
                
                if ($_SESSION['user']['service_telegram']==0) {
                    echo service_telegram();
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php function transactionsms() {
    $service_enabled =  ($_SESSION['user']['transactionsms']==1) ? ture : false;
    ?>
    <div class="col-lg-3 col-6">
        <div class="small-box <?php echo $service_enabled  ? 'bg-success' : 'bg-secondary'; ?>">
            <div class="inner">
                <h3><?php echo SMS::getTransactionSMSCredits($_SESSION['user']['userid']);  ?></h3>
                <p>Transactional SMS</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <?php if ($_SESSION['user']['transactionsms']==1)  {?>
            <a href="<?php echo url;?>/sms/sendsms.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            <?php } else { ?>
            <a href="javascript:void(0)" class="small-box-footer">To enable contact admin</a>
            <?php } ?>
        </div>
    </div>
<?php } ?>


<?php function internationalsms() {
    $service_enabled =  ($_SESSION['user']['international_sms']==1) ? ture : false;
    ?>
    <div class="col-lg-3 col-6">
        <div class="small-box <?php echo $service_enabled  ? 'bg-success' : 'bg-secondary'; ?>">
            <div class="inner">
                <h3>$<?php echo number_format(InternationalSMS::getBalanceInternationalSMS($_SESSION['user']['userid']),2);  ?></h3>
                <p>International SMS</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <?php if ($_SESSION['user']['international_sms']==1)  {?>
            <a href="<?php echo url;?>/internationalsms/sendsms.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            <?php } else { ?>
            <a href="javascript:void(0)" class="small-box-footer">To enable contact admin</a>
            <?php } ?>
        </div>
    </div>
<?php } ?>
                
<?php function promotionalsms() {
    $service_enabled =  ($_SESSION['user']['promotionalsms']==1) ? ture : false;
    ?>
    <div class="col-lg-3 col-6">
        <div class="small-box <?php echo $service_enabled  ? 'bg-success' : 'bg-secondary'; ?>">
            <div class="inner">
                <h3>0<sup style="font-size: 20px"></sup></h3>
                <p>Promotional SMS</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <?php if ($_SESSION['user']['promotionalsms']==1)  {?>
            <a href="<?php echo url;?>/sms/sendsms.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            <?php } else { ?>
            <a href="javascript:void(0)"  class="small-box-footer">To enable contact admin</a>
            <?php } ?>
        </div>
    </div>
<?php } ?>
                
<?php function service_ifscode() { 
    $service_enabled =  ($_SESSION['user']['service_ifscode']==1) ? ture : false;
    ?>
    <div class="col-lg-3 col-6">
        <div class="small-box <?php echo $service_enabled  ? 'bg-success' : 'bg-secondary'; ?>">
            <div class="inner">
                <h3>0</h3>
                <p>IFS Code Credits</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <?php if ($_SESSION['user']['service_ifscode']==1)  {?>
            <a href="<?php echo url;?>/sms/sendsms.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            <?php } else { ?>
            <a href="javascript:void(0)"  class="small-box-footer">To enable contact admin</a>
            <?php } ?>
        </div>
    </div>
<?php } ?>
                 
<?php function service_pincode() { 
    $service_enabled =  ($_SESSION['user']['service_pincode']==1) ? ture : false;
    ?>
    <div class="col-lg-3 col-6">
        <div class="small-box <?php echo $service_enabled  ? 'bg-success' : 'bg-secondary'; ?>">
            <div class="inner">
                <h3>0</h3>
                <p>Pincode Credits</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <?php if ($_SESSION['user']['service_pincode']==1)  {?>
                <a href="<?php echo url;?>/sms/sendsms.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            <?php } else { ?>
                <a href="javascript:void(0)"  class="small-box-footer">To enable contact admin</a>
            <?php } ?>
        </div>
    </div>
<?php }  ?>                 
      
<?php function mobiledthrecharge() {
$service_enabled =  ($_SESSION['user']['mobiledthrecharge']==1) ? ture : false;
 ?>
    <div class="col-lg-3 col-6">
        <div class="small-box <?php echo $service_enabled  ? 'bg-success' : 'bg-secondary'; ?>">
            <div class="inner">
                <h3>Rs. <?php echo number_format(Recharge::get_balance($_SESSION['user']['userid']),2);?></h3>
                <p>Mobile/DTH Recharge</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <?php if ($_SESSION['user']['mobiledthrecharge']==1)  {?>
            <a href="<?php echo url;?>/recharge/mobilerecharge.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            <?php } else { ?>
            <a href="javascript:void(0)" class="small-box-footer">To enable contact admin</a>
            <?php } ?>
        </div>
    </div>
<?php } ?>
        
<?php function service_busticket() { 
    $service_enabled =  ($_SESSION['user']['busticket']==1) ? ture : false;
    ?>
    <div class="col-lg-3 col-6">
        <div class="small-box <?php echo $service_enabled  ? 'bg-success' : 'bg-secondary'; ?>">
            <div class="inner">
                <h3>Rs. <?php echo number_format(BusTicket::get_balance($_SESSION['user']['userid']),2);?></h3>
                <p>Bus Ticket Booking</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <?php if ($_SESSION['user']['busticket']==1)  {?>
            <a href="<?php echo url;?>/sms/sendsms.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            <?php } else { ?>
            <a href="javascript:void(0)"  class="small-box-footer">To enable contact admin</a>
            <?php } ?>
        </div>
    </div>
<?php } ?>
            
<?php function service_email() { 
    $service_enabled =  ($_SESSION['user']['service_email']==1) ? ture : false;
    ?>
    <div class="col-lg-3 col-6">
        <div class="small-box <?php echo $service_enabled  ? 'bg-success' : 'bg-secondary'; ?>">
            <div class="inner">
                <h3>0</h3>
                <p>Email Credits</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <?php if ($_SESSION['user']['service_email']==1)  {?>
            <a href="<?php echo url;?>/sms/sendsms.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            <?php } else { ?>
            <a href="javascript:void(0)"  class="small-box-footer">To enable contact admin</a>
            <?php } ?>
        </div>
    </div>
<?php } ?>
                   
<?php function service_moneytransfer() { 
    $service_enabled =  ($_SESSION['user']['moneytransfer']==1) ? ture : false;
    ?>
    <div class="col-lg-3 col-6">
        <div class="small-box <?php echo $service_enabled  ? 'bg-success' : 'bg-secondary'; ?>">
            <div class="inner">
                <h3>Rs. <?php echo number_format(MoneyTransfer::get_balance($_SESSION['user']['userid']),2);?></h3>
                <p>Money Transfer</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <?php if ($_SESSION['user']['moneytransfer']==1)  {?>
            <a href="<?php echo url;?>/moneytransfer/transfer.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            <?php } else { ?>
            <a href="javascript:void(0)"  class="small-box-footer">To enable contact admin</a>
            <?php } ?>
        </div>
    </div>
<?php } ?>

<?php function service_whatsapp() {
$service_enabled =  ($_SESSION['user']['service_whatsapp']==1) ? ture : false;
 ?>
      <div class="col-lg-3 col-6">
        <div class="small-box <?php echo $service_enabled  ? 'bg-success' : 'bg-secondary'; ?>">
            <div class="inner">
                <h3>0</h3>
                <p>Whatsapp API Credits</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <?php if ($_SESSION['user']['service_whatsapp']==1)  {?>
            <a href="<?php echo url;?>/whatsapp/sendmessage.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            <?php } else { ?>
            <a href="javascript:void(0)" class="small-box-footer">To enable contact admin</a>
            <?php } ?>
        </div>
      </div>
<?php } ?>

<?php function service_rechargeplan() { 
    $service_enabled =  ($_SESSION['user']['service_rechargeplan']==1) ? ture : false;
    ?>
    <div class="col-lg-3 col-6">
        <div class="small-box <?php echo $service_enabled  ? 'bg-success' : 'bg-secondary'; ?>">
            <div class="inner">
                <h3>0</h3>
                <p>Recharge Plan API</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <?php if ($_SESSION['user']['service_rechargeplan']==1)  {?>
            <a href="<?php echo url;?>/recharge/mobilerecharge.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            <?php } else { ?>
            <a href="javascript:void(0)" class="small-box-footer">To enable contact admin</a>
            <?php } ?>
        </div>
    </div>
<?php } ?>

<?php function service_tnebbill_info() {
        $service_enabled =  ($_SESSION['user']['service_tnebbill_info']==1) ? ture : false;
?>
    <div class="col-lg-3 col-6">
        <div class="small-box <?php echo $service_enabled  ? 'bg-success' : 'bg-secondary'; ?>">
            <div class="inner">
                <h3>0</h3>
                <p>TNEB Bill Info</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <?php if ($_SESSION['user']['service_tnebbill_info']==1)  {?>
            <a href="<?php echo url;?>/moneytransfer/transfer.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            <?php } else { ?>
            <a href="javascript:void(0)"  class="small-box-footer">To enable contact admin</a>
            <?php } ?>
        </div>
    </div>
<?php } ?>

<?php function service_tnebbill_payment() { 
        $service_enabled =  ($_SESSION['user']['service_tnebbill_payment']==1) ? ture : false;
    ?>
    <div class="col-lg-3 col-6">
        <div class="small-box <?php echo $service_enabled  ? 'bg-success' : 'bg-secondary'; ?>">
            <div class="inner">
                <h3>Rs. 0</h3>
                <p>Bill Payment (TNEB)</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <?php if ($_SESSION['user']['service_tnebbill_payment']==1)  {?>
            <a href="<?php echo url;?>/recharge/mobilerecharge.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            <?php } else { ?>
            <a href="javascript:void(0)" class="small-box-footer">To enable contact admin</a>
            <?php } ?>
        </div>
    </div>
<?php } ?>

<?php function service_telegram() {
    $service_enabled =  ($_SESSION['user']['service_telegram']==1) ? ture : false;
    ?>
    <div class="col-lg-3 col-6">
        <div class="small-box <?php echo $service_enabled  ? 'bg-success' : 'bg-secondary'; ?>">
            <div class="inner">
                <h3>Rs. <?php echo Telegram::getBalance($_SESSION['user']['userid']);  ?></h3>
                <p>Telegram Service</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <?php if ($_SESSION['user']['service_telegram']==1)  {?>
            <a href="<?php echo url;?>/telegram/incomingreports.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            <?php } else { ?>
            <a href="javascript:void(0)" class="small-box-footer">To enable contact admin</a>
            <?php } ?>
        </div>
    </div>
<?php } ?>



<?php include_once("footer.php");?>