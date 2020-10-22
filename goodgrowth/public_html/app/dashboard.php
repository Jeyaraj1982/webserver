<?php
    include_once("../config.php");
    if (isset($_GET['action']) && $_GET['action']=='logout')  {
        $mysql->execute("update _tbl_Members_LoginHistory set IsLogout='1', LogoutDateTime='".date("Y-m-d H:i:s")."' where sessionid='".session_id()."'");
        unset($_SESSION);
        session_destroy();
        echo "<script>location.href='../login.php';</script>";
    }

    function ErrorMsg($string){
        return "<div style='color:red;border:0px solid red;padding:10px;padding-left:5px;'>".$string."</div>";
    }

    function SuccessMsg($string){
        return "<div style='color:Green;border:0px solid Green;padding:10px;padding-left:5px;'>".$string."</div>";
    }

    if ($userData['MemberID']>0) {
        $userData['Path']=$userData['IsAdmin']==1 ? "Admin" : "Member";
    } else {
        echo "<script>alert('Login session may be expried. Please login again.');location.href='../login.php';</script>";
    }
    $mysql->execute("update _tbl_Members_LoginHistory set lastupdate='".date("Y-m-d H:i:s")."' where sessionid='".session_id()."'");

    function getBalance($MemberID) {
        global $mysql;
        $bal = $mysql->select("select (sum(CreditAmount)-sum(DebitAmount)) as bal from _tbl_Wallet_Transactions where MemberID='".$MemberID."'");
        return (sizeof($bal)==0) ? 0.00 : $bal[0]['bal'];
    }
    
    function convertcash($num){
        if(strlen($num)>3){
            $lastthree = substr($num, strlen($num)-3, strlen($num));
            $restunits = substr($num, 0, strlen($num)-3);
            $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits;
            $expunit = str_split($restunits, 2);
            for($i=0; $i<sizeof($expunit); $i++){
                $explrestunits .= (int)$expunit[$i].",";
            }   
            $thecash = $explrestunits.$lastthree;
        } else {
           $thecash = $convertnum;
        }
        return $thecash;
    }
?> 
<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
<title>GoodGrowth</title>
<style>
@font-face {    font-family: 'MyriadProSemiExt';    src: url('assets/fonts/sunl1ght/MyriadPro-SemiExt.eot');    src: local('Ã¢ËœÂº'), url('assets/fonts/sunl1ght/MyriadPro-SemiExt.woff') format('woff'),url('assets/fonts/sunl1ght/MyriadPro-SemiExt.ttf') format('truetype');    font-weight: normal;    font-style: normal;}
.heading1 {font-family: 'MyriadProSemiExt';font-size:16px;padding-bottom:12px;}
.heading1 span {border-bottom:2px solid #B0DE04;padding-bottom:5px;}
input[type=text], input[type=password], textarea {font-family: 'MyriadProSemiExt';font-size:12px;color:#333;padding:5px;border:1px solid #888;min-width:250px;}
select {font-family: 'MyriadProSemiExt';font-size:12px;color:#333;padding:3px;border:1px solid #888;}
.TMenu {cursor:pointer;color:#666;font-weight:bold;font-size:12px;font-family:arial;border-radius:0px 0px 5px 5px;background:#c4ed0e;float:left;margin-right:20px;padding:5px 20px;}
.TMenu:hover { background:#a7ce0a;color:#fff}
.loginBox {border-radius:5px;border:1px solid #a7ce0a;padding:5px;color:#444;font-weight:Bold;}
.loginBox:focus {background:#f9fcef}
.LoginBtn {cursor:pointer;padding:5px 15px;background:#a7ce0a;border:1px solid #a7ce0a;border-radius:5px;color:#fff;}
.LoginBtn:hover {background:#f9fcef;color:#a7ce0a}
.RegisterBtn {font-weight:Bold;cursor:pointer;padding:5px 20px;background:#f9fcef;border:1px solid #a7ce0a;border-radius:5px;color:#555}
.RegisterBtn:hover {background:#a7ce0a;color:#fff}
.footerLinnk {text-decoration:none;color:#888;text-transform:uppercase;font-family:arial;font-size:12px}
.footerLinnk:hover {text-decoration:underline;color:#222}
div, td, tr, th, table, li {font-family:MyriadProSemiExt;font-size:12px;color:#444}
.border {border:3px solid yellow;}
.SubmitBtn {text-decoration:none;font-family:MyriadProSemiExt;font-size:13px;cursor:pointer;padding:6px 20px;background:#f9fcef ;border:1px solid #a7ce0a;border-radius:5px;color:#a7ce0a;}
.SubmitBtn:hover {background:#a7ce0a;color:#fff}
.listTable td {padding: 5px;border-bottom: 1px dotted #A97C2B;font-family: MyriadProSemiExt;font-size: 13px;color: #666;}
.pageTitle{font-weight:bold;font-size:15px;color:green;padding-bottom:10px;margin-bottom:10px;}
.Gold {border:1px solid #D1B464;padding:30px;text-align:center;color:#fff;border-radius:5px;background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);}
.noGold a {color:#222;}
.noGold {border:1px solid #D1B464;padding:30px;text-align:center;color:#fff;border-radius:5px;background: #eddd97;}
.noGold2 {border:1px solid #D1B464;padding:30px;text-align:center;color:#fff;border-radius:5px;background: #eddd97;}   
.triangle-up { width: 0; height: 0; border-left: 10px solid transparent; border-right: 10px solid transparent; border-bottom: 20px solid #D1B464; }
.arrow_box {position: relative;background: #88b7d5;border: 4px solid #c2e1f5;}
.arrow_box:after, .arrow_box:before {bottom: 100%;left: 50%;border: solid transparent;content: " ";height: 0;width: 0;position: absolute;pointer-events: none;}
.arrow_box:after {border-color: rgba(136, 183, 213, 0);border-bottom-color: #88b7d5;border-width: 30px;margin-left: -30px;}
.arrow_box:before {border-color: rgba(194, 225, 245, 0);border-bottom-color: #c2e1f5;border-width: 36px;margin-left: -36px;}
.Mlink{color:#777;text-decoration:none;font-weight:normal}
.Mlink:hover{text-decoration:underline;}
.LMenu {border-bottom:1px dotted #ccc;padding:10px;font-family:MyriadProSemiExt;font-size:13px;color:#444}
.LMenu a {text-decoration:none;color:#333}
.LMenu a:hover {text-decoration:underline;color:#222}
.hlink {text-decoration:none;color:#333}
.hlink:hover {text-decoration:underline;color:#222}
.THMenu {text-decoration:none;text-transform:uppercase;font-family:"Open Sans", "Helvetica Neue", "Helvetica", "Arial", "sans-serif";    font-weight:bold;padding: 11px 20px;border:1px solid #f7fce3; border-bottom:2px solid #f7fce3;font-size: 15px;color: #444;}
.THMenu:hover{border-bottom:2px solid green}
</style>
<meta charset="utf-8">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<body style="margin:0px;background:#f9f9f9">
    <div style="background:#fcfcfc;border-bottom: 1px solid #f1f1f1;">
        <table style="width:1340px;margin:0px auto" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" style="width:100%">
                        <tr>
                            <td style="width:220px;height:100px;"><img src="assets/images/logo.png"></td>
                            <td style="vertical-align:top">
                            <?php if ($userData['Path']!="Admin") {?>
                                <div class="TMenu"><a href="dashboard.php?action=G3">G3</a></div>
                                <div class="TMenu"><a href="dashboard.php?action=GOLDWAY">GOOD WAY</a></div>
                                <div class="TMenu"><a href="dashboard.php?action=MYGOLD">MY GOLD</a></div>
                                <div class="TMenu"><a href="dashboard.php?action=SUPERGOLD">SUPER GOLD</a></div>
                                <div class="TMenu"><a href="dashboard.php?action=GOLDEAGLE">GOLD EAGLE</a></div>
                                <div class="TMenu"><a href="dashboard.php?action=GOLDFINISH">GOLD FINISH</a></div>
                            <?php } ?>
                            </td>
                            <td style="vertical-align: top;padding-top: 20px;padding-right:10px;" >
                                <div style="line-height:18px;text-align:right;font-size:18px;color:#888;font-weight:normal"   >
                                    Dear <?php echo $userData['FirstName'];?><br>
                                    <div style="padding-top:6px;">
                                        <table align="Right" cellspacing="0" cellpadding="3">
                                            <tr>
                                                <?php if ($userData['Path']!="Admin") {?>
                                                <td><img src="assets/images/investment.png"></td>
                                                <td style="padding-right:50px"><a href="dashboard.php?action=ViewMyPoints" class="hlink"><?php echo Points::getAvailablePoints($userData['MemberID']);?> points</a></td>
                                                <?php } ?>
                                                <td><img src="assets/images/wallet.png"></td>
                                                <td><a href="dashboard.php?action=WalletTransactions" class="hlink"><?php echo number_format(getBalance($userData['MemberID']),2);?></a></td>
                                                <td style="width:50px"></td>
                                                <td><?php echo $userData['MemberCode'];?></td>
                                                <td style="padding-right:0px"><span style="color:#aaa">|</span>&nbsp;&nbsp;&nbsp;<a href="dashboard.php?action=logout" class="hlink" style="color:#888"><img src="assets/images/logout.png" align="absmiddle">&nbsp;Logout</a></td>
                                            </tr>
                                            <?php if (isset($userData['LastLogin'])) {?>
                                            <tr>
                                                <td colspan="<?php echo ($userData['Path']!="Admin")?7:5;?>" style="text-align:right;color:#bbb">Last Login: <?php echo $userData['LastLogin'];?></td>
                                            </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
<style>

</style>
<?php if ($userData['Path']!="Admin") {/*?>
<div style="background:#f7fce3;padding:20px;">
    <div style="width:1100px;margin:0px auto;text-align:right" >
            <a class="THMenu" href="dashboard.php?action=Business">Home</a>
            <a class="THMenu" href="dashboard.php?action=../aboutus">About Us</a>
            <a class="THMenu" class="THMenu"  href="dashboard.php?action=../schemes">Our Schemes</a>
            <a class="THMenu" href="dashboard.php?action=../events">Events</a>
            <a class="THMenu" href="dashboard.php?action=../contact" style="padding-right:0px;">Contact Us</a>
    </div>
</div>
<?php */} ?>
<?php if ($userData['Path']!="Admin") {?>
<?php
$publishedNews = $mysql->select("select * from _tbl_News Where IsPublish='1' order by NewsID desc");
if (sizeof($publishedNews)>0) {
?>
<div style="background:#eaf7d9;padding:8px;color:#fff;font-weight: bold;font-size: 14px;">
    <marquee scrollamount="4" onmouseover="this.stop();" onmouseout="this.start()" id="mplay">
    <?php
        foreach($publishedNews as $p) {
            ?>
            <span style="font-size:18px;color:green">&#x2756;</span>&nbsp;<a class="Mlink" href="dashboard.php?action=News&ID=<?php echo $p['NewsID'];?>"><?php echo $p['NewsTitle'];?></a>&nbsp;&nbsp;&nbsp;
            <?php
        }
        ?>
    </marquee>
</div>
<?php } ?>
<?php } ?>
<?php if ($userData['Path']!="Admin") { /*?>
<div style="height:150px;overflow:hidden">
<img src="assets/images/faqs_parallax.jpg" style="width:100%">
</div>
<?php */} ?>
<div style="width:1340px;margin:0px auto;min-height:500px" >
<table style="width:1340px;margin:0px auto" cellspacing="0" cellpadding="0">
    <tr>
    <?php if (isset($_GET['action'])) { ?>
        <td style="width:200px;vertical-align:top" >
            <div style="background:#fff;padding:10px;">
                <div class="LMenu"><a href="dashboard.php?action=Business">Dashboard</a></div>
                <?php if ($userData['Path']=="Member") {?>
                
                <!--<div class="LMenu"><a href="dashboard.php?action=CreateMember">Create Member</a></div> -->
                <div class="LMenu"><a href="dashboard.php?action=MyMembers">My Members</a></div>
                
                <div class="LMenu"><a href="dashboard.php?action=myprofile">Profile</a></div>
                <!--<div class="LMenu"><a href="dashboard.php?action=mycontacts">Contacts</a></div>-->
                <div class="LMenu"><a href="dashboard.php?action=ChangePassword">Change Password</a></div>
                <div class="LMenu"><a href="dashboard.php?action=mydocuments">My Documents</a></div>
                <div class="LMenu"><a href="dashboard.php?action=LoginDetails">Login Details</a></div>
                
                <div class="LMenu"><a href="dashboard.php?action=WalletTransactions">My Accounts</a></div>
                <div class="LMenu"><a href="dashboard.php?action=DepositFunds">Deposit Funds</a></div>
                <div class="LMenu"><a href="dashboard.php?action=withdrawaltobank">Withdrawal through Bank</a></div>
                
                <div class="LMenu"><a href="dashboard.php?action=ManageInvoices">Manage Invoices</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=ManageReceipts">Manage Receipts</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=ManageSMSLog">Manage SMS Log</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=ManageEmailLog">Manage Email Log</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=Orders/New">New Order</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=Orders/List">Manage Orders</a></div>
                 
                 <div class="LMenu"><a href="dashboard.php?action=Scheme/Join">Join Scheme</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=Scheme/List">Manage Schemes</a></div>
                <!--<div class="LMenu"><a href="dashboard.php?action=couponorder">Coupon Order</a></div>
                <div class="LMenu"><a href="dashboard.php?action=currentcontacts">Current Contacts</a></div>
                <div class="LMenu"><a href="dashboard.php?action=inbox">Inbox</a></div>
                <div class="LMenu"><a href="dashboard.php?action=outbox">Outbox</a></div>-->
                <?php } ?>                     
                                                        
                <?php if ($userData['Path']=="Admin") {?>
                 <div class="LMenu"><a href="dashboard.php?action=CreateMember">Create Member</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=MyMembers">My Members</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=ChangePassword">Change Password</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=LoginDetails">Login Details</a></div>
                 <div style="background:#f1f1f1;border-bottom:1px dotted #ccc;padding:10px;font-weight:bold;text-transform:uppercase">Admin Console</div>
                 <div class="LMenu"><a href="dashboard.php?action=ManageMembers">Manage Members</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=ManagePlans">Manage Plans</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=VerifyDocuments">Document Verification</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=ManagePoints">Manage Points</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=ManageWallet">Manage Wallet</a></div>
                 <!--<div style="background:#f1f1f1;border-bottom:1px dotted #ccc;padding:10px;font-weight:bold;text-transform:uppercase">News</div>
                 <div class="LMenu"><a href="dashboard.php?action=CreateNews">Create News</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=ManageNews">Manage News</a></div>-->
                 <div class="LMenu"><a href="dashboard.php?action=ManageNews">Manage News</a></div>
                 <!--<div style="background:#f1f1f1;border-bottom:1px dotted #ccc;padding:10px;font-weight:bold;text-transform:uppercase">Orders</div>-->
                 <div class="LMenu"><a href="dashboard.php?action=ManageOrders">Manage Orders</a></div>
                 
                 <div class="LMenu"><a href="dashboard.php?action=ManageWebNews">Manage Web News</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=ManageSliders">Manage Sliders</a></div>
                 
                 
                 <div class="LMenu"><a href="dashboard.php?action=ManageInvoices">Manage Invoices</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=ManageReceipts">Manage Receipts</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=ManageSMSLog">Manage SMS Log</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=ManageEmailLog">Manage Email Log</a></div>
                 
                   
                 <div class="LMenu"><a href="dashboard.php?action=Orders/List">Manage Orders</a></div>
                 <div class="LMenu"><a href="dashboard.php?action=GoldOrders/List">Manage Gold Order</a></div>
                <?php } ?>
            </div>
        </td>
        <td style="vertical-align:top">
            <div style="padding-left:15px;padding-top:15px;"> 
                <?php include_once("includes/".$userData['Path']."/".$_GET['action'].".php"); ?>
            </div>
        </td>
    <?php } else {?>
        <td style="background:#fff;vertical-align:top">
        <style>
        .goldprice_tab{
    width:100%;
    border:1px solid #ccc;
    border-collapse:collapse;
    box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    text-align:center;
}
.goldprice_tab tr th{color: #fff;padding:14px;border:1px solid #ccc;-moz-box-sizing: border-box;background-color:#a7ce0a;}
.goldprice_tab tr:nth-child(odd){background-color: rgba(238, 245, 163, 0.14);}
.goldprice_tab tr td{padding:9px;border:1px solid #ccc;}
.incrs{font-weight:bold;color:#66ad30;}
.decrs{font-weight:bold;color:#da4646;}
        </style>
        <br><Br><br><Br>
        <div class="pageTitle" style="padding-left:10px">GOLD PRICE</div>
        <Div style="height:20px"></div>
        <div style="padding-left:10px">
             <?php
$x = file_get_contents("https://www.fresherslive.com/gold-rate-today/madurai");

$x = explode("<h2 class='tabtitle'>Today Gold Rate in Madurai 1Gram - 22 & 24 Carat Price Madurai</h2>",$x);
$x = explode("</table",$x[1]) ;
$x[0]=str_replace("(Standard Gold)","",$x[0]);
$x[0]=str_replace("(Pure Gold)","",$x[0]);
echo $x[0]."</table>";
?>
</div>
<br><br>
<div style="text-align:center">
    <img src="assets/images/banner.jpg" style="width:300px">
</div>
        </td>
        <td style="width:730px;">
            <div>
                <?php include_once("includes/Dashboard.php"); ?>
            </div>
        </td>
    <?php } ?>
    </tr>
</table>
</div>
<div style="background:#E3E4E6;padding:10px">
    <table style="width:1100px;margin:0px auto" cellspacing="0" cellpadding="0">
        <tr>
            <td></td>
            <td style="text-align:right;font-family:arial;font-size:14px;color:#000;font-weight:Bold;">

    <a href="" class="footerLinnk">TERMS OF USE</a>&nbsp;&nbsp;
    ::&nbsp;&nbsp;
    <a href="" class="footerLinnk">TERMS & CONDITIONS</a>&nbsp;&nbsp;
    ::&nbsp;&nbsp;
    <a href="" class="footerLinnk">Personal Data Protection Policy</a>&nbsp;&nbsp;
    ::&nbsp;&nbsp;
    <a href="" class="footerLinnk">COOKIES POLICY</a>&nbsp;&nbsp;
    ::&nbsp;&nbsp;
    <a href="" class="footerLinnk">GOLD CHARTS</a>&nbsp; 
     

</td>
        </tr>
    </table>
</div>
<div style="background:#fff;padding:11px;font-family:arial;font-size:10px;text-align:center;color:#555">&copy; Goodgrowth.in 2019. All Rights Reserved</div>
</body>
