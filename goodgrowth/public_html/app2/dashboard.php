<?php
    include_once("../config.php");
    
    if (isset($_GET['action']) && $_GET['action']=='logout')  {
        $mysql->execute("update _tbl_Members_LoginHistory set IsLogout='1', LogoutDateTime='".date("Y-m-d H:i:s")."' where sessionid='".session_id()."'");
        if (isset($_SESSION['redirect'])) {
            $url = $_SESSION['redirect'];
        } else {
            $url = "../login.php";
        }
        unset($_SESSION);
        session_destroy();
        echo "<script>alert('".$url."');</script>";
        echo "<script>location.href='".$url."';</script>";
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
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--http://webapplayers.com/homer_admin-v2.0/index.html-->
    <!-- Page title -->
    <title>GoodGrowth</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <script src="vendor/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="vendor/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="vendor/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="styles/style.css">

</head>
<body class="fixed-navbar sidebar-scroll">

<style>
    .skin-option {
        position: fixed;
        text-align: center;
        right: -1px;
        padding: 10px;
        top: 80px;
        width: 150px;
        height: 133px;
        text-transform: uppercase;
        background-color: #ffffff;
        box-shadow: 0 1px 10px 0px rgba(0, 0, 0, 0.05), 10px 12px 7px 3px rgba(0, 0, 0, .1);
        border-radius: 4px 0 0 4px;
        z-index: 100;
    }
      .content {min-height:1000px !important;}
      .TMenu {cursor:pointer;color:#666;font-weight:bold;font-size:12px;font-family:arial;border-radius:0px 0px 5px 5px;background:#c4ed0e;float:left;margin-right:20px;padding:5px 20px;}
.TMenu:hover { background:#a7ce0a;color:#fff}

</style>
<!-- End skin option / for demo purpose only -->

<!-- Header -->
<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version" style="padding:0px ;">
        <span>
            <img src="assets/images/logo.png" style="width:80%">
        </span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo" style="padding-top:0px ;">
            <span><img src="assets/images/logo.png" style="width:80%"></span>
        </div>
        <div class="mobile-menu">
            <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
                <i class="fa fa-chevron-down"></i>
            </button>
            <div class="collapse mobile-navbar" id="mobile-collapse">
                <ul class="nav navbar-nav">
                    <li style="height:160px;">
                    <div>
                    <br>
                                <div style="text-align: center;">
                <span class="font-bold no-margins">Dear <?php echo $userData['FirstName'];?> </span>
                <br>
                <span class="font-bold no-margins"><?php echo $userData['MemberCode'];?> </span>
            </div>
                    <div class="row m-t-sm m-b-sm">
                <?php if ($userData['Path']!="Admin") {?>
                <div class="col-lg-12" style="text-align: center;">
                    <h4 class="m-t-xs"><img src="assets/images/investment.png">&nbsp;<a href="dashboard.php?action=ViewMyPoints" class="hlink"><?php echo Points::getAvailablePoints($userData['MemberID']);?>&nbsp;Points</a></h4>
                </div>
                <?php } ?>
                <div class="col-lg-12" style="text-align: center;">
                    <h4 class="m-t-xs"><img src="assets/images/wallet.png">&nbsp;<a href="dashboard.php?action=WalletTransactions" class="hlink"><?php echo number_format(getBalance($userData['MemberID']),2);?></a></h4>
                </div>
                <?php if (isset($userData['LastLogin'])) {?>
                <div class="col-lg-12" style="text-align: center;">
                    <h5 class="m-t-xs">Last Login: <?php echo $userData['LastLogin'];?></h5>
                 <?php } ?>
                </div>
            </div>
                    </div>
                    </li>
                    <li>
                        <a class="" href="dashboard.php?action=myprofile">Profile</a>
                    </li>
                    <li>
                        <a class="" href="dashboard.php?action=logout">Logout</a>
                    </li>
                    <li><hr style="margin:0px;padding:0px;"></li>
                    <li>
                        <a href="dashboard.php?action=G3" class="TMenu" style="padding:2px 5px;height:auto;font-size:12px;">G3</a>&nbsp;
                        <a href="dashboard.php?action=GOLDWAY" class="TMenu" style="padding:2px 5px;height:auto;font-size:12px;">Gold Way</a>&nbsp;
                        <a href="dashboard.php?action=MYGOLD" class="TMenu" style="padding:2px 5px;height:auto;font-size:12px;">My Gold</a>&nbsp;
                    </li>
                     <li>
                        <a href="dashboard.php?action=SUPERGOLD" class="TMenu" style="padding:2px 5px;height:auto;font-size:12px;">Super Gold</a>&nbsp;
                        <a href="dashboard.php?action=GOLDEAGLE" class="TMenu" style="padding:2px 5px;height:auto;font-size:12px;">Gold Eagle</a>&nbsp;
                        <a href="dashboard.php?action=GOLDFINISH" class="TMenu" style="padding:2px 5px;height:auto;font-size:12px;">Gold Finish</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav no-borders">
                <li>
                    <span>
                       <a href="dashboard.php?action=G3" class="TMenu">G3</a>&nbsp;  
                       <a href="dashboard.php?action=GOLDWAY" class="TMenu">Gold Way</a>&nbsp;
                       <a href="dashboard.php?action=MYGOLD" class="TMenu">My Gold</a>&nbsp;  
                       <a href="dashboard.php?action=SUPERGOLD" class="TMenu">Super Gold</a>&nbsp;  
                       <a href="dashboard.php?action=GOLDEAGLE" class="TMenu">Gold Eagle</a> &nbsp; 
                       <a href="dashboard.php?action=GOLDFINISH" class="TMenu">Gold Finish</a>  
                    </span>
                </li>
                <li>
                    <a class="right-sidebar" style="font-size: 16px;">
                        <?php echo $userData['FirstName'];?>
                    </a>
                
                <li>
                    <a href="javascript:void(0)" id="sidebar" class="right-sidebar-toggle">
                        <i class="pe-7s-upload pe-7s-news-paper"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="dashboard.php?action=logout">
                        <i class="pe-7s-upload pe-rotate-90"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!-- Navigation -->
   <?php if (isset($_GET['action'])) {?> 
<aside id="menu">
    <div id="navigation">
          <?php if ($userData['Path']=="Member") {?>
        <ul class="nav" id="side-menu">
            <li class="active">
                <a href="dashboard.php?action=Business"> <span class="nav-label">Dashboard</span></a>
            </li>
             <li>
                <a href="#"><span class="nav-label">My Team</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="dashboard.php?action=MyMembers"> <span class="nav-label">My Members</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">Orders</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="dashboard.php?action=Orders/New"> <span class="nav-label">New Order</span></a>
                    </li>
                    <li>
                        <a href="dashboard.php?action=Orders/List"> <span class="nav-label">Manage Orders</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">Schemes</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                   <li>
                        <a href="dashboard.php?action=Scheme/Join"> <span class="nav-label">Join Scheme</span></a>
                    </li>
                    <li>
                        <a href="dashboard.php?action=Scheme/List"> <span class="nav-label">Manage Schemes</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">My Accounts</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="dashboard.php?action=WalletTransactions"> <span class="nav-label">My Accounts</span></a>
                    </li>
                    <li>
                        <a href="dashboard.php?action=DepositFunds"> <span class="nav-label">Deposit Funds</span></a>
                    </li>
                    <li>
                        <a href="dashboard.php?action=withdrawaltobank"> <span class="nav-label">Withdrawal through Bank</span></a>
                    </li>
                    <li>
                        <a href="dashboard.php?action=ManageInvoices"> <span class="nav-label">Manage Invoices</span></a>
                    </li>
                    <li>
                        <a href="dashboard.php?action=ManageReceipts"> <span class="nav-label">Manage Receipts</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">My Profile</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="dashboard.php?action=myprofile"> <span class="nav-label">My Profile</span></a>
                    </li>
                    <li>
                        <a href="dashboard.php?action=ChangePassword"> <span class="nav-label">Change Password</span></a>
                    </li>
                     <li>
                        <a href="dashboard.php?action=mydocuments"> <span class="nav-label">My Documents</span></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="nav-label">Logs</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="dashboard.php?action=LoginDetails"> <span class="nav-label">Login Details</span></a>
                    </li>
                    <li>
                        <a href="dashboard.php?action=ManageSMSLog"> <span class="nav-label">Manage SMS Log</span></a>
                    </li>
                    <li>
                        <a href="dashboard.php?action=ManageEmailLog"> <span class="nav-label">Manage Email Log</span></a>
                    </li>
                </ul>
            </li>
            
            
           

        </ul>
     <?php
          }
          
          ?>
          
           <?php if ($userData['Path']=="Admin") {?>
           
           <?php          
     } 
      ?>

    </div>
</aside>
 

<!-- Main Wrapper -->
<div id="wrapper">
<?php if ($userData['Path']!="Admin") {?>
<?php
$publishedNews = $mysql->select("select * from _tbl_News Where IsPublish='1' order by NewsID desc");
if (sizeof($publishedNews)>0) {
?>
    <div class="small-header">
        <div class="hpanel">
            <div class="panel-body" style="background: #eaf7d9;text-align: center;">
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
        </div>
    </div> 
    <?php } ?>
<?php } ?>                                                                     
    
     <?php include_once("includes/".$userData['Path']."/".$_GET['action'].".php"); ?>

    <!-- Right sidebar -->
    <div id="right-sidebar" class="animated fadeInRight">

        <div class="p-m">
            <button id="sidebar-close" class="right-sidebar-toggle sidebar-button btn btn-default m-b-md"><i class="pe pe-7s-close"></i>
            </button>
            <div style="text-align: center;">
                <span class="font-bold no-margins">Dear <?php echo $userData['FirstName'];?> </span>
                <br>
                <span class="font-bold no-margins"><?php echo $userData['MemberCode'];?> </span>
            </div>
            <div class="row m-t-sm m-b-sm">
                <?php if ($userData['Path']!="Admin") {?>
                <div class="col-lg-12" style="text-align: center;">
                    <h4 class="m-t-xs"><img src="assets/images/investment.png">&nbsp;<a href="dashboard.php?action=ViewMyPoints" class="hlink"><?php echo Points::getAvailablePoints($userData['MemberID']);?>&nbsp;Points</a></h4>
                </div>
                <?php } ?>
                <div class="col-lg-12" style="text-align: center;">
                    <h4 class="m-t-xs"><img src="assets/images/wallet.png">&nbsp;<a href="dashboard.php?action=WalletTransactions" class="hlink"><?php echo number_format(getBalance($userData['MemberID']),2);?></a></h4>
                </div>
                <?php if (isset($userData['LastLogin'])) {?>
                <div class="col-lg-12" style="text-align: center;">
                    <h5 class="m-t-xs">Last Login: <?php echo $userData['LastLogin'];?></h5>
                 <?php } ?>
                </div>
            </div>
        </div>
    </div>

<?php          
      } else {?>
        <div class="content" style="min-height:1000px !important">
            <div class="row">
            <div class="col-lg-6"><br><br>
                     <?php include_once("includes/Dashboard.php"); ?>
                </div>
                <div class="col-lg-6">
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
                    <br><br>
                    <h4 class="font-light m-b-xs" style="color:green"><b>Gold Price</b></h4>
                    <?php
$x = file_get_contents("https://www.fresherslive.com/gold-rate-today/madurai");

$x = explode("<h2 class='tabtitle'>Today Gold Rate in Madurai 1Gram - 22 & 24 Carat Price Madurai</h2>",$x);
$x = explode("</table",$x[1]) ;
$x[0]=str_replace("(Standard Gold)","",$x[0]);
$x[0]=str_replace("(Pure Gold)","",$x[0]);
echo $x[0]."</table>";
?>          <br>
<div style="text-align:center">
    <img src="assets/images/banner.jpg" style="width:300px">
</div>
                </div>
            </div>
        </div> 
   <?php  } ?>        <!-- Footer-->
    <footer class="footer" style="text-align: center;position:relative">
        <span class="pull-center">
          <table style="margin:0px auto" cellspacing="0" cellpadding="0">
          <tbody>   
            <tr>
                <td></td>
                <td>
                <a href="" class="footerLinnk">TERMS OF USE</a>&nbsp;&nbsp;::&nbsp;&nbsp;<a href="" class="footerLinnk">TERMS &amp; CONDITIONS</a>&nbsp;&nbsp;::&nbsp;&nbsp;<a href="" class="footerLinnk">Personal Data Protection Policy</a>&nbsp;&nbsp;::&nbsp;&nbsp;<a href="" class="footerLinnk">COOKIES POLICY</a>&nbsp;&nbsp;::&nbsp;&nbsp;<a href="" class="footerLinnk">GOLD CHARTS</a>&nbsp; 
                </td>
            </tr>
          </tbody>
        </table>
    </footer>

</div>  

<!-- Vendor scripts -->
<script src="vendor/jquery-ui/jquery-ui.min.js"></script>  
<script src="vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="vendor/jquery-flot/jquery.flot.js"></script>
<script src="vendor/jquery-flot/jquery.flot.resize.js"></script>
<script src="vendor/jquery-flot/jquery.flot.pie.js"></script>
<script src="vendor/flot.curvedlines/curvedLines.js"></script>
<script src="vendor/jquery.flot.spline/index.js"></script>
<script src="vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="vendor/iCheck/icheck.min.js"></script>
<script src="vendor/peity/jquery.peity.min.js"></script>
<script src="vendor/sparkline/index.js"></script>

<!-- App scripts -->
<script src="scripts/homer.js"></script>
<script src="scripts/charts.js"></script>

<script>

    $(function () {

        /**
         * Flot charts data and options
         */
        var data1 = [ [0, 55], [1, 48], [2, 40], [3, 36], [4, 40], [5, 60], [6, 50], [7, 51] ];
        var data2 = [ [0, 56], [1, 49], [2, 41], [3, 38], [4, 46], [5, 67], [6, 57], [7, 59] ];

        var chartUsersOptions = {
            series: {
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 1,
                    fill: 0.4
                },
            },
            grid: {
                tickColor: "#f0f0f0",
                borderWidth: 1,
                borderColor: 'f0f0f0',
                color: '#6a6c6f'
            },
            colors: [ "#62cb31", "#efefef"],
        };

        $.plot($("#flot-line-chart"), [data1, data2], chartUsersOptions);

        /**
         * Flot charts 2 data and options
         */
        var chartIncomeData = [
            {
                label: "line",
                data: [ [1, 10], [2, 26], [3, 16], [4, 36], [5, 32], [6, 51] ]
            }
        ];

        var chartIncomeOptions = {
            series: {
                lines: {
                    show: true,
                    lineWidth: 0,
                    fill: true,
                    fillColor: "#64cc34"

                }
            },
            colors: ["#62cb31"],
            grid: {
                show: false
            },
            legend: {
                show: false
            }
        };

        $.plot($("#flot-income-chart"), chartIncomeData, chartIncomeOptions);



    });

</script>
 

</body>
</html>