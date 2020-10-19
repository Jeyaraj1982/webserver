<?php
session_start();
include_once("config.php");

if ($_SESSION['User']['MemberID']>0) {
    
} else {
    echo "<script>location.href='../login';</script>";
}
     class Webservice {
        
        var $serverURL="";
        
        function Webservice() {
            global $loginID;
            $this->serverURL  = "http://aaranju.in/busticket/api.php?action="; 
        }
       
        function getData($method,$param=array()) {  
            return json_decode($this->_callUrl($method,$param),true);
        }
        
        function _callUrl($method,$param) {
            
            global $__Global;
            $postvars = '';
            foreach($param as $key=>$value) {
            }
            foreach($_GET as $key=>$value) {
            }
            $postvars .= "qry=".base64_encode(json_encode(array("UserAgent"=>$__Global['HTTP_USER_AGENT'],"IPAddress"=>$__Global['REMOTE_ADDR'])));
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$this->serverURL.$method);
            curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,300);
            curl_setopt($ch,CURLOPT_TIMEOUT, 200);
            $response = curl_exec($ch);
            curl_close ($ch);
               
            return $response;
        }
    }
    
    $webservice = new Webservice();
?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>Dashboard</title>
        <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="style.css" rel="stylesheet">
	    <script src="assets/js/jquery.min.js"></script>
        <link href="assets/css/chartist.min.css" rel="stylesheet">
        <link href="assets/css/jquery.steps.css" rel="stylesheet">
        <link href="assets/css/steps.css" rel="stylesheet">
        <link href="assets/css/magnific-popup.css" rel="stylesheet">
        <link href="assets/css/footable.bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/tablesaw.css" rel="stylesheet">
        <link href="https://gcchub.org/panel/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
        <link href="https://gcchub.org/panel/assets/extra-libs/prism/prism.css" rel="stylesheet">
        <link href="https://gcchub.org/panel/assets/dist/css/style.min.css" rel="stylesheet">
        <script src="../assets/app.js"></script>  
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="assets/js/jquery-ui.js"></script>
        <style>
        /*https://gcchub.org/*/
            .errorstring{color:red;}
            .page-wrapper{background:#EEF5F9}
        </style>
    </head>
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
                        <a class="navbar-brand" href="dashboard.php"><b class="logo-icon"><img src="http://ggcash.in/images/logo.png"   class="light-logo" /> </b></a>
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
                                        <h4 class="m-b-0"><?php echo $_SESSION['User']['MemberName'];?> </h4>
                                        <p class=" m-b-0"><?php echo $_SESSION['User']['MemberEmail'];?></p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="viewprofile.php"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="ChangePassword.php"><i class="fas fa-key font-20 m-r-10"></i> Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
    
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard </span></a></li>
                        <!--<li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Personal</span></li>
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Genealogy</span></li>-->
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-bank"></i><span class="hide-menu">E-Pins</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="dashboard.php?action=EPins/Generate" class="sidebar-link"><i class="mdi mdi-bank"></i><span class="hide-menu">Generate Epins</span></a>
                                    <a href="dashboard.php?action=EPins/MyPins" class="sidebar-link"><i class="mdi mdi-bank"></i><span class="hide-menu">My E-Pins</span></a>
                                </li>
                            </ul>
                        </li> 
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-bank"></i><span class="hide-menu">Members</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="dashboard.php?action=Members/CreateMember" class="sidebar-link"><i class="mdi mdi-bank"></i><span class="hide-menu">Create Member</span></a>
                                    <a href="dashboard.php?action=Members/MyMembers" class="sidebar-link"><i class="mdi mdi-bank"></i><span class="hide-menu">My Members</span></a>
                                    <a href="dashboard.php?action=Members/MyAllMembers" class="sidebar-link"><i class="mdi mdi-bank"></i><span class="hide-menu">My All Members</span></a>
                                </li>
                            </ul>
                        </li>  
                         <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-bank"></i><span class="hide-menu">My Team</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="dashboard.php?action=Members/GenealogyTree" class="sidebar-link"><i class="mdi mdi-bank"></i><span class="hide-menu">Genealogy Tree</span></a>
                                    <a href="dashboard.php?action=Members/MySponsor" class="sidebar-link"><i class="mdi mdi-bank"></i><span class="hide-menu">My Sponsor Information</span></a>
                                    <a href="dashboard.php?action=Members/MyUpline" class="sidebar-link"><i class="mdi mdi-bank"></i><span class="hide-menu">My Upline Information</span></a>
                                </li>
                            </ul>
                        </li> 
                        <!--<li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Accounts</span></li>-->
                        <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-bank"></i><span class="hide-menu">Account(s)</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="accountsummary.php" class="sidebar-link"><i class="mdi mdi-bank"></i><span class="hide-menu">Account Summary</span></a>
                                    <a href="earningsummary.php" class="sidebar-link"><i class="mdi mdi-bank"></i><span class="hide-menu">Earning Summary</span></a>
                                </li>
                                
                            </ul>
                        </li>  
                        <!--<li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Withdrawal</span></li>-->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-arrow-up-bold-hexagon-outline"></i><span class="hide-menu">Wallet</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="addCash.php" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-circle"></i><span class="hide-menu"> Add Cash To Wallet</span></a></li>
                                <li class="sidebar-item"><a href="MyWalletRequests.php" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-circle"></i><span class="hide-menu">Wallet Requests</span></a></li>
                            </ul>
                        </li>
                        <!--<li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Withdrawal</span></li>-->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-arrow-down-bold-hexagon-outline"></i><span class="hide-menu">Withdraw</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="NewRequest.php" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-circle"></i><span class="hide-menu">New Request</span></a></li>
                                <li class="sidebar-item"><a href="WithDrawRequests.php" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-circle"></i><span class="hide-menu">Withdraw Requests</span></a></li>
                                <li class="sidebar-item"><a href="AddBank.php" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-circle"></i><span class="hide-menu">Add Bank</span></a></li>
                            </ul>
                        </li> 
                        <!--<li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Recharge</span></li>-->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-arrow-down-bold-hexagon-outline"></i><span class="hide-menu">Recharge</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="MobileRecharge.php" class="sidebar-link"><i class="mdi mdi-cellphone"></i><span class="hide-menu">Mobile Recharge</span></a></li>
                                <li class="sidebar-item"><a href="DTHRecharge.php" class="sidebar-link"><i class="mdi mdi-airplay"></i><span class="hide-menu">DTH Recharge</span></a></li>
                            </ul>
                        </li>
                        <!--<li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Ticket Booking</span></li>-->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-arrow-down-bold-hexagon-outline"></i><span class="hide-menu">Ticket Booking</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="BusTicketBooking.php" class="sidebar-link"><i class="mdi mdi-bus"></i><span class="hide-menu">Bus Ticket Booking</span></a></li>
                                <li class="sidebar-item"><a href="BusTicketTransactions.php" class="sidebar-link"><i class="mdi mdi-airplay"></i><span class="hide-menu">Transactions</span></a></li>
                            </ul>
                        </li>
                          <!--<li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Purchase Order</span></li>-->
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-arrow-down-bold-hexagon-outline"></i><span class="hide-menu">Purchase Order</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="dashboard.php?action=Orders/New" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-circle"></i><span class="hide-menu">New Order</span></a></li>
                                <li class="sidebar-item"><a href="dashboard.php?action=Orders/List" class="sidebar-link"><i class="mdi mdi-arrow-down-bold-circle"></i><span class="hide-menu">Manage Orders</span></a></li>
                                
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <style type="text/css">
            .mini-navbar li.active .nav-second-level {left: 125px;}
            .mini-navbar .nav .nav-second-level {position:absolute;left:70px;top:0;background-color:#2f4050;padding:10px 10px 10px 10px;font-size: 12px;z-index:1 !important;}
        </style>