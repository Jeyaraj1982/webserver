<?php 
session_start();
include_once("../config.php");
include_once("config.php");
if (!($_SESSION['user']['userid']>0)) {
    ?>
         <script>
            alert("Your login expired");
            location.href='https://www.aaranju.in';
         </script>
    <?php
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>aaranju</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo url;?>/plugins/fontawesome-free/css/all.min.css">
  <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
  <link rel="stylesheet" href="https://www.aaranju.in/assets/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo url;?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?php echo url;?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo url;?>/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo url;?>/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo url;?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?php echo url;?>/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo url;?>/plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav" >
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <!--
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
           
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
           
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i class="fas fa-th-large"></i></a>
      </li>
      -->                                                                           
      <li class="nav-item">
        <a class="nav-link"   href="http://www.aaranju.in/dashboard.php?action=logout"><i class="fas fa-sign-out-alt"></i></a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo url."/dashboard.php";?>" class="brand-link">
      <span class="brand-text font-weight-light">aaranju api</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo url;?>/dashboard.php" class="nav-link active">
              <p>Dashboard<i class="right fas fa-angle-left"></i></p>
            </a>
          </li>
          <!--<li class="nav-header">Services</li>  -->
          <li class="nav-header">&nbsp;</li>
          <li class="nav-item has-treeview" style="display: none;">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>Transactional SMS<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo url;?>/sms/sendsms.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send SMS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url;?>/sms/senderid.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sender's ID</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url;?>/sms/reports.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url;?>/sms/smsapi.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SMS API</p>
                </a>
              </li>
            </ul>
          </li>
          
          
          
          <li class="nav-item has-treeview">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>International SMS<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo url;?>/internationalsms/sendsms.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send SMS</p>
                </a>
              </li>
               
              <li class="nav-item">
                <a href="<?php echo url;?>/internationalsms/reports.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url;?>/internationalsms/smsapi.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SMS API</p>
                </a>
              </li>
            </ul>                                    
          </li>
          
          <li class="nav-item has-treeview">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mobile/DTH Recharge
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo url;?>/recharge/mobilerecharge.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mobile Recharge</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url;?>/recharge/dthrecharge.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DTH Recharge</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url;?>/recharge/reports.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url;?>/recharge/rechargeapi.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recharge API</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Bus Ticket Booking
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="<?php echo url;?>/busticket/bookticket.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Book Ticket</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url;?>/busticket/bookedtickets.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List of Tickets</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url;?>/busticket/api_doc.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bus Ticket Booking API</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Money Transfer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="<?php echo url;?>/moneytransfer/transfer.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Money Transfer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url;?>/moneytransfer/reports.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url;?>/moneytransfer/api_doc.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Money Transfer API</p>
                </a>
              </li>
            </ul>
          </li>
          
                    <li class="nav-item has-treeview" style="display:none">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>Whatsapp SMS<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview" style="margin-left:25px;">
              <li class="nav-item">
                <a href="<?php echo url;?>/whatsapp/sendsms.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send SMS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url;?>/sms/senderid.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Numbers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url;?>/sms/reports.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reports</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url;?>/whatsapp/api_doc.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Whataspp API</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>Telegram Service<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview" style="margin-left:25px;">
              <li class="nav-item">
                <a href="<?php echo url;?>/telegram/incomingreports.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Incomming Messages</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo url;?>/telegram/outgoingmessage.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Outgoing Messages</p>
                </a>
              </li>
             <li class="nav-item">
                <a href="<?php echo url;?>/telegram/subscriptions.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subscriptions</p>
                </a>
              </li>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>