<?php 
    include_once("header.php");
    $Membercount=$mysqldb->select("select count(MemberID) as count FROM _tbl_Members");
    $EPinWalletUpdatecount=$mysqldb->select("select count(RequestID) as count FROM _tbl_wallet_request_epin where IsApproved='0' and IsRejected='0'");
    $UtilityWalletUpdatecount=$mysqldb->select("select count(RequestID) as count FROM _tbl_wallet_request_utility where IsApproved='0' and IsRejected='0'");
    $Orders=$mysqldb->select("select count(OrderID) as count FROM PaymentStatus where OrderDeliveredon=null");
    
    
function generateCoupon($CouponRegID) {
    global $mysqldb;
    $xdata = $mysqldb->select("select * from _VoucherRegistration where  CouponRegID='".$CouponRegID."'");
    $file_name = $xdata[0]['MobileNumber']."_".md5(time().$xdata[0]['ApplicantName']).".png";
    $param = array('customer_name' => $xdata[0]['ApplicantName'],
                   'id_number'     => $xdata[0]['MobileNumber'],
                   'card_value'    => $xdata[0]['Amount'],
                   'coupon_number' => $xdata[0]['CouponNumber'],
                   'qr_value'      => $xdata[0]['VoucherKey'],
                   'file_name'     => $file_name); 
    $url = "https://ggcash.in/admin/idcard/idgen2.php";
    
    $ch = curl_init();
    $postvars = '';
    foreach($param as $key=>$value) {
        $postvars .= $key . "=" . $value . "&";
    }
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST, 1);             
    curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
    curl_setopt($ch,CURLOPT_TIMEOUT, 200);
    $response = curl_exec($ch);
    curl_close ($ch);
    $mysqldb->execute("update _VoucherRegistration set `FileName`='".$file_name."' where CouponRegID='".$CouponRegID."'");
}


function generateBonusCard($BonusCardID) {
    global $mysqldb;
    $xdata = $mysqldb->select("select * from _BonusCardRegistration where  BonusCardRegID='".$BonusCardID."'");
    $file_name = $xdata[0]['MobileNumber']."_".md5(time().$xdata[0]['ApplicantName']).".png";
    $param = array('customer_name' => strtoupper($xdata[0]['ApplicantName']),
                   'card_value'    => $xdata[0]['Amount'],
                   'coupon_number' => strtoupper($xdata[0]['BonusCardNumber']),
                   'scheme_name'    => $xdata[0]['Scheme'],
                   'date_from'     => strtoupper(date("d-M-Y",strtotime($xdata[0]['EntryDate']))),
                   'date_to'       => strtoupper(date("d-M-Y",strtotime($xdata[0]['DueDate']))),
                   'qr_value'      => $xdata[0]['QrCode'],
                   'file_name'     => $file_name); 
    $url = "https://ggcash.in/admin/idcard/bonus_card.php";
    
    $ch = curl_init();
    $postvars = '';
    foreach($param as $key=>$value) {
        $postvars .= $key . "=" . $value . "&";
    }
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST, 1);             
    curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
    curl_setopt($ch,CURLOPT_TIMEOUT, 200);
    $response = curl_exec($ch);
    curl_close ($ch);
    $mysqldb->execute("update _BonusCardRegistration set `FileName`='".$file_name."' where BonusCardRegID='".$BonusCardID."'");
}

?>
<?php if (isset($_GET['action'])) {
    
    include_once("modules/".$_GET['action'].".php");
    
 } else { 
     ?>                                     

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-9 align-self-center">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
        
        <div class="row">
                <div class="col-sm-12 col-md-3">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #1EA185;background:#fcfae8">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/members.png"></span>
                                </div>
                                <div class="ml-auto">                                                       
                                    <h5 class="font-normal text-right">Total Members</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;"><?php echo $Membercount[0]['count'];?></h3>
                                    <a href="dashboard.php?action=Members/List" style="font-size:11px;float:right">View Members</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-3">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #6D9225;background:#fcfae8">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/epinwallet.png"></span>
                                </div>
                                <div class="ml-auto">
                                    <h5 class="font-normal text-right">E-Pin Wallet Balance</h5>
                                    <?php $wallet_epin =  $mysqldb->select("SELECT SUM(Credits)-SUM(Debits) as bal FROM _tbl_wallet_epin");?>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;"><?php echo number_format($wallet_epin[0]['bal'],2);?></h3>
                                    <a href="dashboard.php?action=Wallets/EpinWalletMemberwise" style="font-size:11px;float:right">View History</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-3">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #6D9225;background:#fcfae8">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/earningwallet.png"></span>
                                </div>
                                <div class="ml-auto">
                                    <h5 class="font-normal text-right">GGCash Wallet Balance</h5>
                                    <?php $wallet_earning =  $mysqldb->select("SELECT SUM(Credits)-SUM(Debits) as bal FROM _tbl_wallet_earnings");?>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;"><?php echo number_format($wallet_earning[0]['bal'],2);?></h3>
                                    <a href="dashboard.php?action=Wallets/GGCashWalletMemberwise" style="font-size:11px;float:right">View History</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-3">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid Orange;background:#fcfae8">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/utilitywallet.png"></span>
                                </div>
                                <div class="ml-auto">
                                <?php $wallet_utility =  $mysqldb->select("SELECT SUM(Credits)-SUM(Debits) as bal FROM _tbl_wallet_utility");?>
                                    <h5 class="font-normal text-right">Utility Wallet Balance</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;"><?php echo number_format($wallet_utility[0]['bal'],2);?></h3>
                                    <a href="dashboard.php?action=Wallets/UtilityWalletMemberwise" style="font-size:11px;float:right">View History</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                  

            </div>
            
               <div class="row">
                <div class="col-sm-12 col-md-3">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #6D9225">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/whatsapp.png"></span>
                                </div>
                                <div class="ml-auto">
                                    <h5 class="font-normal text-right">Whatsapp SMS Credits</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;">0</h3>
                                    <a href="dashboard.php?action=Accounts/earningsummary" style="font-size:11px;float:right">View History</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-3">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #6D9225">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/smartphone.png"></span>
                                </div>
                                <div class="ml-auto">
                                    <h5 class="font-normal text-right">API SMS Balance</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;"><?php echo MobileSMS::getBalance();?></h3>
                                    <a href="dashboard.php?action=Accounts/earningsummary" style="font-size:11px;float:right">View History</a>
                                </div>
                            </div>
                        </div>                                                 
                    </div>
                </div>
                                        
                <div class="col-sm-12 col-md-3">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #6D9225">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/satellite-tv.png"></span>
                                </div>
                                <div class="ml-auto">
                                    <h5 class="font-normal text-right">API Recharge Balance</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;">
                                        <?php 
                                        $optr= $mysqldb->select("select * from `_tbl_operators` ");
                                        $balance = 0;
                                        foreach($optr as $o) {
                                            if ($o['OperatorCode']!="BUS_TICKET_BOOKING") {
                                             $response = file_get_contents("http://ecfast.in/hybrid/api/balance.php?optr=".$o['OperatorCode']."&uname=admin@ggcash.in&pwd=123456");
                                                $data = explode(",",$response);
                                                             $balance += $data[1];   
                                            }
                                        }
                                        echo number_format($balance,2);
                                            //$rc = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('InitialRecharge')");
                                        //echo $rc[0]['ParamValue']+ Recharge::getBalance();
                                        ?>
                                    </h3>
                                    <a href="dashboard.php?action=Recharge/Operatorwise" style="font-size:11px;float:right">View History</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                                
                
                <div class="col-sm-12 col-md-3">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid Orange">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/bus.png"></span>
                                </div>
                                <div class="ml-auto">
                                    <h5 class="font-normal text-right">API Bus Ticket Balance</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;">
                                        <?php
                                        $response = file_get_contents("http://ecfast.in/hybrid/api/balance.php?optr=BUS_TICKET_BOOKING&uname=admin@ggcash.in&pwd=123456");
                                            $data = explode(",",$response);
                                            echo number_format($data[1],2);                        
                                            
                                        //$bc = $mysql->select("select * from `_tbl_Settings_Params` where ParamCode in ('InitialBusTicket')");
                                          //echo $bc[0]['ParamValue'];
                                        ?>
                                        </h3>
                                    <a href="dashboard.php?action=Recharge/Operatorwise" style="font-size:11px;float:right">View History</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                  

            </div>
            
                <div class="row">
                <div class="col-sm-12 col-md-3">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #1EA185">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/withdraw.png"></span>
                                </div>
                                <div class="ml-auto">                                                       
                                    <h5 class="font-normal text-right">GGCash Withdrawal Request</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;">0</h3>
                                    <a href="dashboard.php?action=Withdraw/WithDrawRequests" style="font-size:11px;float:right">View History</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-3">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #6D9225;;background:#fcfae8">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/walletrequest.png"></span>
                                </div>
                                <div class="ml-auto">                                 
                                    <h5 class="font-normal text-right">E-Pin Wallet Update Request</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;"><?php echo $EPinWalletUpdatecount[0]['count'];?></h3>
                                    <a href="dashboard.php?action=Wallets/EpinWalletRequests" style="font-size:11px;float:right">View History</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-3">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #6D9225;background:#fcfae8">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/walletrequest.png"></span>
                                </div>
                                <div class="ml-auto">
                                    <h5 class="font-normal text-right">Utility Wallet Update Request</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;"><?php echo $UtilityWalletUpdatecount[0]['count'];?></h3>
                                    <a href="dashboard.php?action=Wallets/UtilityWalletRequests" style="font-size:11px;float:right">View History</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                 <div class="col-sm-12 col-md-3">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #1EA185">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/orders.png"></span>
                                </div>
                                <div class="ml-auto">                                                       
                                    <h5 class="font-normal text-right">New Orders</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;"><?php echo isset($Orders[0]['count']) ? $Orders[0]['count'] : 0;?></h3>
                                    <a href="dashboard.php?action=Orders/List" style="font-size:11px;float:right">View Orders</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
           <?php
                $lvl_1 = $mysql->select("select * from _tbl_daily where MemberLevel='1'");
                $lvl_2 = $mysql->select("select * from _tbl_daily where MemberLevel='2'");
                $lvl_3 = $mysql->select("select * from _tbl_daily where MemberLevel='3'");
                $lvl_4 = $mysql->select("select * from _tbl_daily where MemberLevel='4'");
                $lvl_5 = $mysql->select("select * from _tbl_daily where MemberLevel='5'");
                $lvl_6 = $mysql->select("select * from _tbl_daily where MemberLevel='6'");
                
                $member_1 = sizeof($lvl_1)-(sizeof($lvl_2)+sizeof($lvl_3)+sizeof($lvl_4)+sizeof($lvl_5)+sizeof($lvl_6)) ;
                $member_2 = sizeof($lvl_2)-(sizeof($lvl_3)+sizeof($lvl_4)+sizeof($lvl_5)+sizeof($lvl_6)) ;
                $member_3 = sizeof($lvl_3)-(sizeof($lvl_4)+sizeof($lvl_5)+sizeof($lvl_6)) ;
                $member_4 = sizeof($lvl_4)-(sizeof($lvl_5)+sizeof($lvl_6)) ;
                $member_5 = sizeof($lvl_5)-(sizeof($lvl_6)) ;
                $member_6 = sizeof($lvl_6);
            ?> 
            <div class="row">
             <div class="col-sm-12 col-md-2">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #1EA185">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/orders.png"></span>
                                </div>
                                <div class="ml-auto">                                                       
                                    <h5 class="font-normal text-right">Level-1</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;"><?php echo $member_1; ?></h3>
                                    <a href="dashboard.php?action=Members/LevelMembers&L=1" style="font-size:11px;float:right">View Members</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #1EA185">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/orders.png"></span>
                                </div>
                                <div class="ml-auto">                                                       
                                    <h5 class="font-normal text-right">Level-2</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;"><?php echo $member_2; ?></h3>
                                    <a href="dashboard.php?action=Members/LevelMembers&L=2" style="font-size:11px;float:right">View Members</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #1EA185">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/orders.png"></span>
                                </div>
                                <div class="ml-auto">                                                       
                                    <h5 class="font-normal text-right">Level-3</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;"><?php echo $member_3;?></h3>
                                    <a href="dashboard.php?action=Members/LevelMembers&L=3" style="font-size:11px;float:right">View Members</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #1EA185">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/orders.png"></span>
                                </div>
                                <div class="ml-auto">                                                       
                                    <h5 class="font-normal text-right">Level-4</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;"><?php echo $member_4; ?></h3>
                                    <a href="dashboard.php?action=Members/LevelMembers&L=4" style="font-size:11px;float:right">View Members</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #1EA185">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/orders.png"></span>
                                </div>
                                <div class="ml-auto">                                                       
                                    <h5 class="font-normal text-right">Level-5</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;"><?php echo $member_5; ?></h3>
                                    <a href="dashboard.php?action=Members/LevelMembers&L=5" style="font-size:11px;float:right">View Members</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-2">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #1EA185">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/orders.png"></span>
                                </div>
                                <div class="ml-auto">                                                       
                                    <h5 class="font-normal text-right">Level-6</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;"><?php echo $member_6; ?></h3>
                                    <a href="dashboard.php?action=Members/LevelMembers&L=6" style="font-size:11px;float:right">View Members</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            
            
            <div class="row">
             <div class="col-sm-12 col-md-4">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #1EA185">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/orders.png"></span>
                                </div>
                                <div class="ml-auto">                                                       
                                    <h5 class="font-normal text-right">Voucher Requested</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;">
                                        <?php echo sizeof($mysql->select("select * from _VoucherRegistration where IsActivated='0'"));?>
                                    </h3>
                                    <a href="dashboard.php?action=Vouchers/List&f=requested" style="font-size:11px;float:right">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #1EA185">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/orders.png"></span>
                                </div>
                                <div class="ml-auto">                                                       
                                    <h5 class="font-normal text-right">Voucher Issued</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;">
                                    <?php echo sizeof($mysql->select("select * from _VoucherRegistration where IsActivated='1'"));?>
                                    </h3>
                                    <a href="dashboard.php?action=Vouchers/List&f=activated" style="font-size:11px;float:right">View</a>
                                </div>
                            </div>
                        </div>
                    </div>              
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #1EA185">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/orders.png"></span>
                                </div>
                                <div class="ml-auto">                                                       
                                    <h5 class="font-normal text-right">Voucher Rejected</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;">
                                    <?php echo sizeof($mysql->select("select * from _VoucherRegistration where IsActivated='2'"));?>
                                    </h3>
                                    <a href="dashboard.php?action=Vouchers/List&f=rejected" style="font-size:11px;float:right">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
             <div class="col-sm-12 col-md-4">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #1EA185">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/orders.png"></span>
                                </div>
                                <div class="ml-auto">                                                       
                                    <h5 class="font-normal text-right">Bonus Card</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;">
                                        &nbsp;
                                    </h3>
                                    <a href="dashboard.php?action=BonusCard/Create" style="font-size:11px;float:right">Create</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #1EA185">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/orders.png"></span>
                                </div>
                                <div class="ml-auto">                                                       
                                    <h5 class="font-normal text-right">Active Bonus Cards</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;">
                                    <?php echo sizeof($mysql->select("SELECT * FROM _BonusCardRegistration WHERE DATE(DueDate)>=DATE('".date("Y-m-d")."')"));?>
                                    </h3>
                                    <a href="dashboard.php?action=BonusCard/List&f=activated" style="font-size:11px;float:right">View</a>
                                </div>
                            </div>
                        </div>
                    </div>              
                </div>
                 <div class="col-sm-12 col-md-4">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #1EA185">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"><img src="assets/images/orders.png"></span>
                                </div>
                                <div class="ml-auto">                                                       
                                    <h5 class="font-normal text-right">Expired Bonus Cards</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;">
                                    <?php echo sizeof($mysql->select("SELECT * FROM _BonusCardRegistration WHERE DATE(DueDate)<DATE('".date("Y-m-d")."')"));?>
                                    </h3>
                                    <a href="dashboard.php?action=BonusCard/List&f=activated" style="font-size:11px;float:right">View</a>
                                </div>
                            </div>
                        </div>
                    </div>              
                </div>
                <div class="col-sm-12 col-md-4">
                    
                </div>
            
            </div> 
            <div class="row">
                <div class="col-sm-12 col-lg-12">
<div class="card">
<div class="card-body">
 
<div class="d-md-flex align-items-center">
<div>
<h4 class="card-title">Transaction History</h4>
<h5 class="card-subtitle">History as you Like</h5>
</div>
</div>
<!-- title -->
<ul class="nav nav-pills custom-pills m-t-40" id="pills-tab2" role="tablist">
<li class="nav-item text-center width-33">
<a class="nav-link active" id="pills-home-tab2" data-toggle="pill" href="#test11" role="tab" aria-selected="false"> Recent members</a>
</li>
<li class="nav-item text-center width-33">
<a class="nav-link" id="pills-profile-tab2" data-toggle="pill" href="#test12" role="tab" aria-selected="true">Withdrawal History</a>
</li>
<li class="nav-item text-center width-33">
<a class="nav-link" id="pills-profile-tab3" data-toggle="pill" href="#test13" role="tab" aria-selected="true">Wallet Update</a>
</li>
</ul>
<div class="tab-content m-t-20" id="pills-tabContent2">
<div class="tab-pane fade active show" id="test11" role="tabpanel" aria-labelledby="pills-home-tab2">
<div class="table-responsive">
    <table class="table v-middle" style="border: 1px solid; border-color: #e1e1e1;">
        <thead>
            <tr>
                <th class="border-top-0">Member Name  </th>
                <th class="border-top-0">Member Email</th>
                <th class="border-top-0">Mobile Number</th>
                <th class="border-top-0" style="text-align: right;">Epin Wallet</th>
                <th class="border-top-0" style="text-align: right;">GGC Wallet</th>
                <th class="border-top-0" style="text-align: right;">Utitlity Wallet</th>
                <th class="border-top-0"></th>
            </tr>
        </thead>
        <tbody>
        <?php
 
  $Members =$mysqldb->select("select * from _tbl_Members  order by MemberID DESC LIMIT 0,5");
  ?>         <?php foreach ($Members as $Member){ ?>
                <tr>
                    <td><span class="<?php echo ($Member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo $Member['MemberName'];?></td>
                    <td><?php echo $Member['MemberEmail'];?></td>
                    <td><?php echo $Member['MobileNumber'];?></td>
                    <td style="text-align: right"><?php echo number_format(getEpinWalletBalance($Member['MemberID']),2);?> </td>
                    <td style="text-align: right"><?php echo number_format(getGGCashWalletBalance($Member['MemberID']),2);?> </td>
                    <td style="text-align: right"><?php echo number_format(getUtilityhWalletBalance($Member['MemberID']),2);?> </td>
                    <td><a href="dashboard.php?action=Members/EditMember&code=<?php echo $Member['MemberCode'];?>">Edit</a>&nbsp;&nbsp;&nbsp;
                    <a href="dashboard.php?action=Members/ViewMember&code=<?php echo $Member['MemberCode'];?>">View</a></td>
                </tr>
  <?php }?>    <?php 
                    $Membercount=$mysqldb->select("select count(MemberID) as count FROM _tbl_Members");
                        if($Membercount[0]['count']>5){
                    ?>
                     <tr>    
                        <td colspan="4" style="text-align: center;"><a href="dashboard.php?action=Members/List">View More</a></td>
                    </tr>
                 <?php }?>  
                 <?php if($Membercount[0]['count']=="0"){?>
                        <tr>
                            <td colspan="4" style="text-align: center;">No Members Found</td>
                        </tr>
                 <?php }?>
        </tbody>
    </table>
</div>
</div>
<div class="tab-pane fade " id="test12" role="tabpanel" aria-labelledby="pills-profile-tab2">
<div class="table-responsive">
    <table class="table table-bordered table-hover " style="border: 1px solid; border-color: #e1e1e1;">
        <thead>
            <tr>
                <th class="border-top-0">Sl No</th>
                <th class="border-top-0">Date</th>
                <th class="border-top-0">Amount</th>
                <th class="border-top-0">Status</th>
            </tr>
        </thead>
        <tbody>
                    </tbody>
    </table>
</div>
</div>
<div class="tab-pane fade show" id="test13" role="tabpanel" aria-labelledby="pills-profile-tab3">
<table class="table v-middle" style="border: 1px solid; border-color: #e1e1e1;">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0"><b>Member Name</b></th>
                                                <th class="border-top-0"><b>Amount</b></th>
                                                <th class="border-top-0"><b>Bank Name</b></th>
                                                <th class="border-top-0"><b>Account Number</b></th>
                                                <th class="border-top-0"><b>IFSCode</b></th>
                                                <th class="border-top-0"><b>Mode</b></th>
                                                <th class="border-top-0"><b>Transaction ID</b></th>
                                                <th class="border-top-0"><b>Txn Date</b></th>
                                                <th class="border-top-0"><b></b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  $Requests  = $mysqldb->select("SELECT *
                                                                            FROM _tbl_wallet_request_epin
                                                                            LEFT  JOIN _tbl_Members  
                                                                            ON _tbl_wallet_request_epin.MemberID=_tbl_Members.MemberID"); ?>
                                          <?php foreach ($Requests as $Request){ ?>
                                            <tr>
                                                <td><?php echo $Request['MemberName'];?></td>
                                                <td><?php echo number_format($Request['Amount'],2);?></td>
                                                <td><?php echo $Request['BankName'];?></td>
                                                <td><?php echo $Request['AccountNumber'];?></td>
                                                <td><?php echo $Request['IFSCode'];?></td>
                                                <td><?php echo $Request['Mode'];?></td>
                                                <td><?php echo $Request['TransactionNumber'];?></td>
                                                <td><?php echo $Request['TransferDate'];?></td>
                                                <td><a href="dashboard.php?action=Wallets/EpinViewWalletRequest&code=<?php echo $Request['RequestID'];?>">View</a></td>
                                            </tr>
                                         <?php }?>  
                                         <?php if(sizeof($Requests)==0){?>
                                                <tr>
                                                    <td colspan="4" style="text-align: center;">No Transactions Found</td>
                                                </tr>
                                         <?php }?>  
                                        </tbody>
                                    </table>
</div>                                                                           
</div>
</div>                                                            
</div>
</div>
</div>
<script type="text/javascript">
window.onload=function(){
  var js_array = ["01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"];
  var bonus_array = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
  var average_array = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
  var month_year = $("#month_year").val();
  var average_bonus = 50;
  showGraph(js_array,bonus_array,average_array,month_year,average_bonus);
}; 

</script>

<a class="btn" id="open-mod" alt="default" data-toggle="modal" data-target="#responsive-modal" data-backdrop="static" data-keyboard="false" class="model_img img-fluid" style="display: none !important; font-size: 0px;">&nbsp;</a>
                                <div id="responsive-modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>One of your staking <span class="text-danger">not having transaction id</span></h3>
    
                                                <button type="button" class="close text-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                                            </div>
                                                                                    </div>
                                    </div>
                                </div>


<style type="text/css">
@media (max-width: 39.9375em){
.text-right {
    text-align: right !important; 
}
}
</style>            </div>
            

<?php } ?>
         <?php include_once("footer.php"); ?>



 
