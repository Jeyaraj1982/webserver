<?php
include_once("/home/ggcash/public_html/config.php");
?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

	<title>Dashboard</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="">
	<meta name="description" content="" />
	<meta name="author" content="" />
    <!--  <script src="https://gcchub.org/panel/assets/libs/jquery/dist/jquery.min.js"></script>
<link href="https://gcchub.org/panel/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
<link href="https://gcchub.org/panel/assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
<link href="https://gcchub.org/panel/assets/libs/jquery-steps/steps.css" rel="stylesheet">
<link href="https://gcchub.org/panel/assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
<link href="https://gcchub.org/panel/assets/libs/footable/css/footable.bootstrap.min.css" rel="stylesheet">
<link href="https://gcchub.org/panel/assets/libs/tablesaw/dist/tablesaw.css" rel="stylesheet">
<link href="https://gcchub.org/panel/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
<link href="https://gcchub.org/panel/assets/extra-libs/prism/prism.css" rel="stylesheet">
<link href="https://gcchub.org/panel/assets/dist/css/style.min.css" rel="stylesheet"> -->

               <script src="assets/js/jquery.min.js"></script>
        <link href="assets/css/chartist.min.css" rel="stylesheet">
        <link href="assets/css/jquery.steps.css" rel="stylesheet">
        <link href="assets/css/steps.css" rel="stylesheet">
        <link href="assets/css/magnific-popup.css" rel="stylesheet">
        <link href="assets/css/footable.bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/tablesaw.css" rel="stylesheet">
        <link href="assets/css/c3.min.css" rel="stylesheet">
        <link href="assets/css/prism.css" rel="stylesheet">
        <!--<link href="https://gcchub.org/panel/assets/dist/css/style.min.css" rel="stylesheet">-->
        <link href="assets/css/style.min.css" rel="stylesheet">
        <script src="../assets/app.js"></script>  
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
        <script src="assets/js/jquery-ui.js"></script>
        <style>
        /*https://gcchub.org/*/
            .errorstring{color:red;}
            .page-wrapper{background:#EEF5F9}
        </style>
<style>
.mb15 {margin-bottom:15px !important;}
</style>           
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->                                                     
</head>
<style>
    .Activedot {height:10px;width:10px;background-color:#20e512;border-radius:50%;display:inline-block;}
            .Deactivedot {height:10px;width:10px;background-color:#888;border-radius:50%;display:inline-block;}
</style>
<body data-gr-c-s-loaded="true">
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        
<header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <a class="navbar-brand" href="dashboard.php">
                        <b class="logo-icon">
                           <img src="http://ggcash.in/images/logo.png"   class="light-logo" /> 
                        </b>
                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <li class="nav-item dropdown mega-dropdown"><a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <!-- <span class="d-none d-md-block">Quick Email <i class="fa fa-angle-down"></i></span>
                             <span class="d-block d-md-none"><i class="mdi mdi-dialpad font-24"></i></span>  -->
                            </a>
                            <div class="dropdown-menu animated bounceInDown">
                                <div class="mega-dropdown-menu row">
                                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Send Quick Message</h4>
                                <form method="post" action="QuickEmail">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>To </label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Admin" disabled readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>From </label>
                                                <div class="form-group">
                                                    <input type="text" name="from_email" id="from_email" value="assurekumar@gmail.com" class="form-control" required="" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Subject </label>
                                                <div class="form-group">
                                                    <input type="text" name="subject" id="subject" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Message </label>
                                                <div class="form-group">
                                                    <textarea name="zendesk_message" id="zendesk_message" class="form-control" required="" style="height: 80px;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-right">
                                                
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://gcchub.org/panel/assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow"><span class="bg-primary"></span></span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class=""><img src="https://gcchub.org/panel/assets/images/users/1.jpg" alt="user" class="img-circle" width="60"></div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0"><?php echo $_SESSION['User']['AdminName'];?> </h4>
                                        <p class=" m-b-0"><?php echo $_SESSION['User']['AdminEmail'];?></p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="viewprofile.php"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <!--<a class="dropdown-item" href="https://gcchub.org/panel/Ticket/MyTickets"><i class="ti-email m-r-5 m-l-5"></i> My Tickets</a>-->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="ChangePassword.php"><i class="ti-settings m-r-5 m-l-5"></i> Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i class="ti-shift-right m-r-5 m-l-5"></i> Logout</a>
    
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard </span></a></li>

                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Personal</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-arrow-down-bold-hexagon-outline"></i><span class="hide-menu">Members</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="dashboard.php?action=Members/List" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-circle"></i><span class="hide-menu"> List of Members</span></a></li>
                            </ul>
                        </li>
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">User Stakings</span></li>
                        
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Refer</span></li>
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Genealogy</span></li>
                       <!-- <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-sitemap"></i><span class="hide-menu">My Team</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="https://gcchub.org/panel/User/STree" class="sidebar-link"><i class="mdi mdi-file-tree"></i><span class="hide-menu"> Sponsor Genealogy</span></a></li>
                                <li class="sidebar-item"><a href="https://gcchub.org/panel/User/Pgene" class="sidebar-link"><i class="mdi mdi-file-tree"></i><span class="hide-menu"> Placement Genealogy </span></a></li>
                                <li class="sidebar-item"><a href="https://gcchub.org/panel/User/FindClub" class="sidebar-link"><i class="mdi mdi-file-tree"></i><span class="hide-menu"> Find Club Members </span></a></li>
                                <li class="sidebar-item"><a href="https://gcchub.org/panel/User/BusinessSummary" class="sidebar-link"><i class="mdi mdi-file-tree"></i><span class="hide-menu"> Business Summary </span></a></li>
                            </ul>
                        </li>-->

                                                
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Accounts</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-bank"></i><span class="hide-menu">Account(s)</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="accountsummary.php" class="sidebar-link"><i class="mdi mdi-bank"></i><span class="hide-menu"> Available Balance</span></a></li>
                                <li class="sidebar-item"><a href="earningtransactions.php" class="sidebar-link"><i class="mdi mdi-bank"></i><span class="hide-menu"> Earning Balance </span></a></li>
                                
                            </ul>
                        </li>
                         <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Withdrawal</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-arrow-down-bold-hexagon-outline"></i><span class="hide-menu">Wallet</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="dashboard.php?action=Wallets/EpinWalletRequests" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-circle"></i><span class="hide-menu">Epin Update Request</span></a></li>
                                <li class="sidebar-item"><a href="dashboard.php?action=Wallets/UtilityWalletRequests" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-circle"></i><span class="hide-menu">Utility Update Request</span></a></li>
                                <!--<li class="sidebar-item"><a href="addCash.php" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-circle"></i><span class="hide-menu"> Wallet History</span></a></li>-->
                            </ul>                                                                                                                                                         
                        </li>
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Withdrawal</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-arrow-down-bold-hexagon-outline"></i><span class="hide-menu">Withdraw</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="dashboard.php?action=Withdraw/WithDrawRequests" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-circle"></i><span class="hide-menu"> Withdraw Requests </span></a></li>
                                <li class="sidebar-item"><a href="withdrawcashstatus.php" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-circle"></i><span class="hide-menu">Withdraw History </span></a></li>
                            </ul>
                        </li>

                        
                         <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Settings</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-arrow-down-bold-hexagon-outline"></i><span class="hide-menu">Settings</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="dashboard.php?action=Settings/GeneralSettings" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-circle"></i><span class="hide-menu"> General Settings </span></a></li>
                                <li class="sidebar-item"><a href="dashboard.php?action=Settings/EnrollmentPackage" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-circle"></i><span class="hide-menu"> Enrollment Packages </span></a></li>
                                <li class="sidebar-item"><a href="dashboard.php?action=Settings/PayoutSettings" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-circle"></i><span class="hide-menu"> Payout Settings</span></a></li>
                                <li class="sidebar-item"><a href="dashboard.php?action=Settings/WithdrawalSettings" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-circle"></i><span class="hide-menu"> Withdrawal Settings</span></a></li>
                                <li class="sidebar-item"><a href="dashboard.php?action=Settings/AdminSettings" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-circle"></i><span class="hide-menu"> Admin Settings</span></a></li>
                            </ul>
                        </li>
                        
                         <!--
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Tickets</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Mail</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="https://gcchub.org/panel/Ticket/CreateTicket" class="sidebar-link"><i class="mdi mdi-email-variant"></i><span class="hide-menu"> Compose</span></a></li>
                                <li class="sidebar-item"><a href="https://gcchub.org/panel/Ticket/MyTickets" class="sidebar-link"><i class="mdi mdi-email-open"></i><span class="hide-menu"> My Tickets </span></a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="https://gcchub.org/panel/User/DAICO" aria-expanded="false"><i class="mdi mdi-emoticon-happy"></i><span class="hide-menu">DAICO</span></a></li>

                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Information</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-newspaper"></i><span class="hide-menu">Informations</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="https://gcchub.org/panel/User/Faq" class="sidebar-link"><i class="mdi mdi-book-open"></i><span class="hide-menu"> FAQ</span></a></li>
                                <li class="sidebar-item"><a href="https://gcchub.org/panel/User/Policy" class="sidebar-link"><i class="mdi mdi-book-open"></i><span class="hide-menu"> Privacy Policy </span></a></li>
                                <li class="sidebar-item"><a href="https://gcchub.org/panel/User/ClubDetails" class="sidebar-link"><i class="mdi mdi-book-open"></i><span class="hide-menu"> GCC-CLUBs </span></a></li>
                                <li class="sidebar-item"><a href="https://gcchub.org/panel/User/PPT" class="sidebar-link"><i class="mdi mdi-book-open"></i><span class="hide-menu"> GCCHub PPT </span></a></li>
                            </ul>
                        </li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <style type="text/css">
.mini-navbar li.active .nav-second-level {
    left: 125px;
}
.mini-navbar .nav .nav-second-level {
    position: absolute;
    left: 70px;
    top: 0;
    background-color: #2f4050;
    padding: 10px 10px 10px 10px;
    font-size: 12px;
    z-index: 1 !important;
}
</style>        
