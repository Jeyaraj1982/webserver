<?php
     include_once("config.php");
 ?>
<!DOCTYPE html>
<!--
Template Name: Frest HTML Admin Template
Author: :Pixinvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/pixinvent_portfolio
Renew Support: https://1.envato.market/pixinvent_portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Basic Card - Frest - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.min.css">
    
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/pickers/daterange/daterangepicker.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="assets/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <div class="header-navbar-shadow"></div>
    <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top ">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="navbar-collapse" id="navbar-mobile">
            <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
              <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon bx bx-menu"></i></a></li>
              </ul>
              
            </div>
            <ul class="nav navbar-nav float-right">
              <!--<li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a></li>
              <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon bx bx-search"></i></a>
                <div class="search-input">
                  <div class="search-input-icon"><i class="bx bx-search primary"></i></div>
                  <input class="input" type="text" placeholder="Explore Frest..." tabindex="-1" data-search="template-search">
                  <div class="search-input-close"><i class="bx bx-x"></i></div>
                  <ul class="search-list"></ul>
                </div>
              </li>
              <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i><span class="badge badge-pill badge-danger badge-up">5</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <div class="dropdown-header px-1 py-75 d-flex justify-content-between"><span class="notification-title">7 new Notification</span><span class="text-bold-400 cursor-pointer">Mark all as read</span></div>
                  </li>
                  <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                      <div class="media d-flex align-items-center">
                        <div class="media-left pr-0">
                          <div class="avatar mr-1 m-0"><img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="39" width="39"></div>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading"><span class="text-bold-500">Congratulate Socrates Itumay</span> for work anniversaries</h6><small class="notification-text">Mar 15 12:32pm</small>
                        </div>
                      </div></a>
                    <div class="d-flex justify-content-between read-notification cursor-pointer">
                      <div class="media d-flex align-items-center">
                        <div class="media-left pr-0">
                          <div class="avatar mr-1 m-0"><img src="../../../app-assets/images/portrait/small/avatar-s-16.jpg" alt="avatar" height="39" width="39"></div>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading"><span class="text-bold-500">New Message</span> received</h6><small class="notification-text">You have 18 unread messages</small>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between cursor-pointer">
                      <div class="media d-flex align-items-center py-0">
                        <div class="media-left pr-0"><img class="mr-1" src="../../../app-assets/images/icon/sketch-mac-icon.png" alt="avatar" height="39" width="39"></div>
                        <div class="media-body">
                          <h6 class="media-heading"><span class="text-bold-500">Updates Available</span></h6><small class="notification-text">Sketch 50.2 is currently newly added</small>
                        </div>
                        <div class="media-right pl-0">
                          <div class="row border-left text-center">
                            <div class="col-12 px-50 py-75 border-bottom">
                              <h6 class="media-heading text-bold-500 mb-0">Update</h6>
                            </div>
                            <div class="col-12 px-50 py-75">
                              <h6 class="media-heading mb-0">Close</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between cursor-pointer">
                      <div class="media d-flex align-items-center">
                        <div class="media-left pr-0">
                          <div class="avatar bg-primary bg-lighten-5 mr-1 m-0 p-25"><span class="avatar-content text-primary font-medium-2">LD</span></div>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading"><span class="text-bold-500">New customer</span> is registered</h6><small class="notification-text">1 hrs ago</small>
                        </div>
                      </div>
                    </div>
                    <div class="cursor-pointer">
                      <div class="media d-flex align-items-center justify-content-between">
                        <div class="media-left pr-0">
                          <div class="media-body">
                            <h6 class="media-heading">New Offers</h6>
                          </div>
                        </div>
                        <div class="media-right">
                          <div class="custom-control custom-switch">
                            <input class="custom-control-input" type="checkbox" checked id="notificationSwtich">
                            <label class="custom-control-label" for="notificationSwtich"></label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between cursor-pointer">
                      <div class="media d-flex align-items-center">
                        <div class="media-left pr-0">
                          <div class="avatar bg-danger bg-lighten-5 mr-1 m-0 p-25"><span class="avatar-content"><i class="bx bxs-heart text-danger"></i></span></div>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading"><span class="text-bold-500">Application</span> has been approved</h6><small class="notification-text">6 hrs ago</small>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between read-notification cursor-pointer">
                      <div class="media d-flex align-items-center">
                        <div class="media-left pr-0">
                          <div class="avatar mr-1 m-0"><img src="../../../app-assets/images/portrait/small/avatar-s-4.jpg" alt="avatar" height="39" width="39"></div>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading"><span class="text-bold-500">New file</span> has been uploaded</h6><small class="notification-text">4 hrs ago</small>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between cursor-pointer">
                      <div class="media d-flex align-items-center">
                        <div class="media-left pr-0">
                          <div class="avatar bg-rgba-danger m-0 mr-1 p-25">
                            <div class="avatar-content"><i class="bx bx-detail text-danger"></i></div>
                          </div>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading"><span class="text-bold-500">Finance report</span> has been generated</h6><small class="notification-text">25 hrs ago</small>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-between cursor-pointer">
                      <div class="media d-flex align-items-center border-0">
                        <div class="media-left pr-0">
                          <div class="avatar mr-1 m-0"><img src="../../../app-assets/images/portrait/small/avatar-s-16.jpg" alt="avatar" height="39" width="39"></div>
                        </div>
                        <div class="media-body">
                          <h6 class="media-heading"><span class="text-bold-500">New customer</span> comment recieved</h6><small class="notification-text">2 days ago</small>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="dropdown-menu-footer"><a class="dropdown-item p-50 text-primary justify-content-center" href="javascript:void(0)">Read all notifications</a></li>
                </ul>
              </li> -->
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                  <div class="user-nav d-sm-flex d-none"><span class="user-name">John Doe</span><span class="user-status text-muted">Available</span></div><span><img class="round" src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"></span></a>
                <div class="dropdown-menu dropdown-menu-right pb-0"><a class="dropdown-item" href="page-user-profile.html"><i class="bx bx-user mr-50"></i> Edit Profile</a><a class="dropdown-item" href="app-email.html"><i class="bx bx-envelope mr-50"></i> My Inbox</a><a class="dropdown-item" href="app-todo.html"><i class="bx bx-check-square mr-50"></i> Task</a><a class="dropdown-item" href="app-chat.html"><i class="bx bx-message mr-50"></i> Chats</a>
                  <div class="dropdown-divider mb-0"></div><a class="dropdown-item" href="auth-login.html"><i class="bx bx-power-off mr-50"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- END: Header-->
    <style>
    .Activedot {height:10px;width:10px;background-color:#20e512;border-radius:50%;display:inline-block;}
    .Deactivedot {height:10px;width:10px;background-color:#888;border-radius:50%;display:inline-block;}
    #star{color:red;}
    </style>