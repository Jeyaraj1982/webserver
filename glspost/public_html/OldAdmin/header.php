<?php include_once("../config.php"); ?>
<!doctype html>
<html lang="en">
<head>                                          
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Golden Life Society.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="css/main.css" rel="stylesheet">
    <link href="https://demo.dashboardpack.com/architectui-html-pro/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
    
     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        .mb15 {margin-bottom:15px}
        </style>   
<body>
<script>
function myFunction() {
  var x = document.getElementById("chn");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <div style="font-weight:bold;font-size:20px;color:#E91E63">Golden Life Society</div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>                     
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>    <div class="app-header__content">
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                        <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
                                    </a>
                                    <div id="chn" tabindex="-1" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right" style="min-width:250px;max-width:250px;height:180px">
                                        <div class="dropdown-menu-header">
                                            <div class="dropdown-menu-header-inner bg-info">
                                                <div class="menu-header-image opacity-2" style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
                                                <div class="menu-header-content text-left">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Administrator
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div  class="scroll-area-xs">
                                            <div class="scrollbar-container ps">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a href="dashboard.php?action=ChangePassword" class="nav-link">ChangePassword
                                                        </a>
                                                    </li>
                                                    <li class="nav-item"><a href="../index.php?action=logout" class="nav-link">Logout</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading">
                                    Alina Mclourd
                                </div>
                                <div class="widget-subheading">
                                    VP People Manager
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                         </div>
        </div>
    </div>    
    <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div> 
                
                 
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                        <li>
                                <a href="dashboard.php">
                                    <i class="metismenu-icon pe-7s-home"></i>
                                    Dashboard
                                     
                                </a>
                        </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-users"></i>
                                    Members
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="dashboard.php?action=members/allmembers">
                                            <i class="metismenu-icon"></i>
                                            View Members
                                        </a>                                                                      
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-browser"></i>
                                    E-Pin
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                  <!--  <li>
                                        <a href="GenerateE-Pin.php">
                                            <i class="metismenu-icon"></i>
                                            Generate E-Pin
                                        </a>                                                                      
                                    </li>-->
                                    
                                      <li>
                                        <a href="dashboard.php?action=epins/GenerateE-PinToSold">
                                            <i class="metismenu-icon"></i>
                                            Sale E-Pins
                                        </a>                                                                      
                                    </li>
                                   <!-- <li>
                                        <a href="MyE-Pins.php">
                                            <i class="metismenu-icon">
                                            </i>My E-Pins
                                        </a>
                                    </li> -->
                                    <li>
                                        <a href="dashboard.php?action=epins/allepins">
                                            <i class="metismenu-icon">
                                            </i>All E-Pins
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    Products
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="dashboard.php?action=products/addproduct">
                                            <i class="metismenu-icon">
                                            </i>Add Product
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=products/manageproducts">
                                            <i class="metismenu-icon">
                                            </i>Manage Products
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=products/sellproduct">
                                            <i class="metismenu-icon">
                                            </i>Sell Products
                                        </a>
                                    </li> 
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-plugin"></i>
                                    E-Wallet
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="E-WalletSummary.php">
                                            <i class="metismenu-icon">
                                            </i>E-Wallet Summary
                                        </a>
                                    </li>
                                    <li>
                                        <a href="AllTransactions.php">
                                            <i class="metismenu-icon">
                                            </i>All Transactions
                                        </a>
                                    </li>
                                    <li>
                                        <a href="EarningsandInWardFunds.php">
                                            <i class="metismenu-icon">
                                            </i>Earnings &amp; Inward Funds
                                        </a>
                                    </li>
                                    <li>
                                        <a href="WithdrawalsandOutwardFunds.php">
                                            <i class="metismenu-icon">
                                            </i>Withdrawal &amp; Outward Funds
                                        </a>
                                    </li>
                                    <li>
                                        <a href="WithdrawFundFromE-Wallet.php">
                                            <i class="metismenu-icon">
                                            </i>Withdraw Fund From E-Wallet
                                        </a>
                                    </li>
                                    <li>
                                        <a href="MyWithdrawalRequests.php">
                                            <i class="metismenu-icon">
                                            </i>My Withdrawal Requests
                                        </a>
                                    </li>
                                    <li>
                                        <a href="PayoutPreference.php">
                                            <i class="metismenu-icon">
                                            </i>Payout Preference
                                        </a>
                                    </li>
                                    <li>
                                        <a href="FundTransfer.php">
                                            <i class="metismenu-icon">
                                            </i>Fund Transfer
                                        </a>
                                    </li>
                                </ul>
                            </li>
                              <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-users"></i>
                                    Notice Board
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="NewNotice.php">
                                            <i class="metismenu-icon"></i>
                                            New Notice
                                        </a>                                                                      
                                    </li>
                                    <li>
                                        <a href="ManageNotices.php">
                                            <i class="metismenu-icon"></i>
                                            Manage Notices
                                        </a>                                                                      
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    Settings
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="dashboard.php?action=ChangePassword">
                                            <i class="metismenu-icon">
                                            </i>Change Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?action=application/appsettings">
                                            <i class="metismenu-icon">
                                            </i>Application Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="MyProfile.php">
                                            <i class="metismenu-icon">
                                            </i>My Profile
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="../index.php?action=logout"><b>Logout</b></a></li>
                        </ul>
                    </div>
                </div>
            </div>
  <style>
    .errorstring{
        color:red;
    }
    .success{
        color:green ;
    }
    .failure{
        color:red ;
    }
  </style>  
  <style>
    .Activedot {height:10px;width:10px;background-color:#20e512;border-radius:50%;display:inline-block;}
            .Deactivedot {height:10px;width:10px;background-color:#888;border-radius:50%;display:inline-block;}
</style>        
            