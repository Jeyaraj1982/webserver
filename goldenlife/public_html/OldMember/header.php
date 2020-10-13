<?php
 include_once("../config.php");   
 ?>
<!doctype html>
<html lang="en">
<?php
  

                     
if (!($_SESSION['User']['MemberID']>0)) {
    ?>
        <script>
            alert("Your session may be expired. please login again..");
            location.href="../login.php";
        </script>
    <?php
}
?>
<head>                                          
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Golden Life Society Dashboard.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link href="css/main.css" rel="stylesheet">
    <link href="https://demo.dashboardpack.com/architectui-html-pro/main.d810cf0ae7f39f28f336.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://demo.dashboardpack.com/architectui-html-pro/main.cba69814a806ecc7945a.css" rel="stylesheet">
    <style>
        .border_5x {border:3px solid #888}
        .border_1x {border:3px solid orange}
    </style>
</head>
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
                    <!--<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>     -->    
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
        <div class="app-header__content">
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                           
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading">
                                    <?php echo $_SESSION['User']['MemberName'];?>
                                </div>
                                <div class="widget-subheading">
                                    <?php echo $_SESSION['User']['MemberCode'];?>
                                </div>
                            </div>
                             <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" id="chn" role="menu" aria-hidden="true" class="rm-pointers dropdown-menu-lg dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-menu-header">
                                            <div class="dropdown-menu-header-inner bg-info">
                                                <div class="menu-header-image opacity-2" style="background-image: url('assets/images/dropdown-header/city3.jpg');"></div>
                                                <div class="menu-header-content text-left">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                            </div>
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading"><?php echo $_SESSION['User']['MemberName'];?>
                                                                </div>
                                                                <div class="widget-subheading opacity-8"><?php echo $_SESSION['User']['MemberCode'];?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="scroll-area-xs" style="height: 150px;">
                                            <div class="scrollbar-container ps">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item"><a href="ChangePassword.php" class="nav-link">Change Password</a></li>
                                                    <li class="nav-item"><a href="MyProfile.php" class="nav-link">My Profile</a></li>
                                                    <li class="nav-item"><a href="MySponsor.php" class="nav-link">My Sponsor's Info</a></li>
                                                    <li class="nav-item"><a href="../index.php?action=logout" class="nav-link">Logout</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                                             
            </div>
        </div>
        
        
    </div>
     <div class="app-main" style="display:none"  >
             <div   style="background:yellow;padding:10px;width:100%">  
    <div class="container">
        <table style="width: 100%;">
            <tr>
                <td style="width: 120px;"><span style="color:#333">Latest News:</span></td>
                <td> <marquee>
                     <?php $news = $mysql->select("select * from `_tbl_noticeboard` where `IsPublish`='1'"); ?>
              <?php foreach($news as $n) { ?>
                  
                 <a  href="https://www.goldenlifesociety.co.in/news.php?news=<?php echo $n['NewsID'];?>" target="_blank"><?php echo $n['NewsTitle'];?></a>  &nbsp;
 
              <?php } ?>
              </marquee>
                </td>
            </tr>
        </table>
       
                                                                                   
        </div>
      </div>  
     </div>
    <div class="app-main">
    
            <div class="app-sidebar sidebar-shadow" style="padding-top:0px !important">
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
                    <div class="app-sidebar__inner" style="padding-top:50px">
                     <Br>
                        <ul class="vertical-nav-menu">
                        <li>
                                <a href="Dashboard.php">
                                    <i class="metismenu-icon pe-7s-home"></i>
                                    Dashboard
                                     
                                </a>
                        </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-display2"></i>
                                    Network
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li><a href="CreateMember.php"><i class="metismenu-icon"></i>Create Member</a></li>
                                    <li><a href="MyMembers.php"><i class="metismenu-icon"></i>My Members</a></li>
                                    <!--<li><a href="MemberTree.php"><i class="metismenu-icon"></i>Member Tree</a></li>
                                    <li><a href="Genealogy.php"><i class="metismenu-icon"></i>Genealogy Tree</a></li>-->
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-browser"></i>
                                    E-Pin
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <!--<li><a href="GenerateE-Pin.php"><i class="metismenu-icon"></i>Generate E-Pin</a></li>-->
                                    <li><a href="myepins.php"><i class="metismenu-icon"></i>My E-Pins</a></li>
                                    <li><a href="TransferEPins.php"><i class="metismenu-icon"></i>Transfer E-Pins</a></li>
                                </ul>
                            </li>
                             <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-plugin"></i>
                                    Earnings
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li><a href="EarningSummary.php"><i class="metismenu-icon"></i>Earnings Summary</a></li>
                                    <li><a href="EarningHistory.php"><i class="metismenu-icon"></i>Earning History</a></li>
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
                                        <a href="ViewAccountSummary.php">
                                            <i class="metismenu-icon">
                                            </i>E-Wallet Summary
                                        </a>
                                    </li>
                                    <li>
                                        <a href="MyWithdrawalRequests.php">
                                            <i class="metismenu-icon">
                                            </i>Withdrawal Requests
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-diamond"></i>
                                    My Profile
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    <li><a href="MyProfile.php"><i class="metismenu-icon"></i>My Profile</a></li>
                                    <li><a href="MySponsor.php"><i class="metismenu-icon"></i>My Sponsor Info</a></li>
                                    <li><a href="ChangePassword.php"><i class="metismenu-icon"></i>Change Password</a></li>
                                    <li><a href="MyNominiInformation.php"><i class="metismenu-icon"></i>Nominee Information</a></li>
                                    <li><a href="MyKYCInformation.php"><i class="metismenu-icon"></i>KYC Information</a></li>
                                    <li><a href="MyBankAccountInformation.php"><i class="metismenu-icon"></i>Bank Account Information</a></li>
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
            
            