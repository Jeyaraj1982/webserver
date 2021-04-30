<?php
    include_once("config.php");
?>
<!doctype html>
<html lang="en" class="md">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no, viewport-fit=cover">
    <link rel="apple-touch-icon" href="img/f7-icon-square.png">
    <link rel="icon" href="img/f7-icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxartkiller.com/website/mobileux/dashboard_html/vendor/bootstrap-4.1.3/css/bootstrap.min.css">
    <!-- Material design icons CSS -->
    <link rel="stylesheet" href="vendor/materializeicon/material-icons.css">
    <!-- swiper carousel CSS -->
    <link rel="stylesheet" href="https://maxartkiller.com/website/mobileux/dashboard_html/vendor/swiper/css/swiper.min.css">
    <!-- app CSS -->
    <link id="theme" rel="stylesheet" href="css/style.css" type="text/css">
      <link rel="stylesheet" href="https://mweb.trip78.in/css/font-awesome.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://mweb.trip78.in/assets/css/flaticon.css" type="text/css" media="all"> 
<script type='text/javascript' src='https://www.trip78.in/assets/js/jquery.min.js'></script>
<script type='text/javascript' src="https://www.trip78.in/assets/js/app.js"></script>
   <style>
        .errorString {color:red}
    </style>  
    <title>Trip78</title>
    <style>
div.scrollmenu {
  background-color: #FED700;
  overflow: auto;
  white-space: nowrap;
  min-width:100%;
}

div.scrollmenu a {
  display: inline-block;
  color: #000;
  
  text-align: center;
  padding: 14px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #B6A23F;
}
.divactive {
     background-color: #B6A23F;
}

         
 
                 </style>
</head>

<body class="color-theme-blue push-content-right theme-light" style="background:#000">
    <div class="wrapper">
         
        <div class="sidebar sidebar-left">
            <div class="profile-link" style="background:#fff;"> 
                 <div>
                <div style="float:left;"><img src="https://trip78.in/images/logo_footer.png">  <br>
                 <span style="color:#333">&nbsp;&nbsp; trip78mail@gmail.com</span>
                 </div>
                 <div style="float:right;color:#666;text-align:right;font-size:30px;" onclick="$('.backdrop').trigger('click');"><i class="fa fa-times-circle" aria-hidden="true"></i></div>
                 <!--<a href="#" class="media">
                    <div class="w-auto h-100">
                        <figure class="avatar avatar-40"><img src="img/user1.png" alt=""> </figure>
                    </div>
                    <div class="media-body">
                        <h5>John Doe <span class="status-online bg-success"></span></h5>
                        <p>India</p>
                    </div>
                </a>-->
                </div>
                <div style="clear:both"></div>
            </div>
            <nav class="navbar">
                <ul class="navbar-nav">
                     
                    <li class="nav-item">
                        <a href="index.php" class="sidebar-close">
                            <div class="item-title">
                                <i class="material-icons">home</i> Home
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="register.php" class="sidebar-close">
                            <div class="item-title">
                                <i class="material-icons">person</i> Register
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="sidebar-close">
                            <div class="item-title">
                                <i class="material-icons">person</i> Login
                            </div>
                        </a>
                    </li>
                    
                      <li class="nav-item">
                        <a href="aboutus.php" class="sidebar-close">
                            <div class="item-title">
                                <i class="material-icons">domain</i> About Us
                            </div>
                        </a>
                    </li>
                      <li class="nav-item">
                        <a href="contactus.php" class="sidebar-close">
                            <div class="item-title">
                                <i class="material-icons">domain</i> Contact Us
                            </div>
                        </a>
                    </li>
                  
                </ul>
            </nav>
            <div style="padding:20px;">
            <b style="font-size:24px">Follow Us</b>
            <div style="color:#fff;font-size:24px;padding-top:10px;">
            
            <a target="_blank" href="https://twitter.com/Trip784" style="color:#fff"><i class="fa fa-twitter"></i></a>&nbsp;&nbsp;
            <a target="_blank" href="https://www.facebook.com/trip.seveneight.3"  style="color:#fff"><i class="fa fa-facebook"></i></a>&nbsp;&nbsp;
            <a target="_blank" href="https://www.instagram.com/trip_seveneight" style="color:#fff"><i class="fa fa-instagram"></i></a>&nbsp;&nbsp;
            <a target="_blank" href="https://trip78.tumblr.com/"  style="color:#fff"><i class="fa fa-tumblr"></i></a>&nbsp;&nbsp;
            <a target="_blank" href="https://in.pinterest.com/trip78mail/_saved"  style="color:#fff"><i class="fa fa-pinterest"></i></a>&nbsp;&nbsp;
            </div>
           </div>
                      <!-- <div class="profile-link text-center">
     <a href="login.html" class="btn btn-outline-white btn-block px-3">Logout</a>
            </div>
            -->
        </div>   
         

         
        <div class="sidebar sidebar-right">
            <header class="row m-0 fixed-header">
                <div class="left">
                    <a href="javascript:void(0)" class="menu-left-close"><i class="material-icons">keyboard_backspace</i></a>
                </div>
                <div class="col center">
                    <a href="" class="logo">Best Rated</a>
                </div>
            </header>
            <div class="page-content text-white">
                <div class="row mx-0 mt-3">
                    <div class="col">
                        <div class="card bg-none border-0 shadow-none">
                            <div class="card-body userlist_large">
                                <div class="media">
                                    <figure class="avatar avatar-120 rounded-circle my-2">
                                        <img src="img/user1.png" alt="user image">
                                    </figure>
                                    <div class="media-body">
                                        <h4 class="mt-0 text-white">Max Johnsons</h4>
                                        <p class="text-white">VP, Maxartkiller Co. Ltd., India</p>
                                        <h5 class="text-warning my-2">
                                            <i class="material-icons">star</i>
                                            <i class="material-icons">star</i>
                                            <i class="material-icons">star</i>
                                            <i class="material-icons">star</i>
                                            
                                        </h5>
                                        <div class="mb-0">Trip78.in</div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         

         

        <div class="modal fade popup-fullmenu" id="fullscreenmenu" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content fullscreen-menu">
                    <div class="modal-header">
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <a href="/profile/" class="block user-fullmenu popup-close">
                            <figure>
                                <img src="img/user1.png" alt="">
                            </figure>
                            <div class="media-content">
                                <h6>John Doe<br><small>India</small></h6>
                            </div>
                        </a>
                        <br>
                        <div class="row mx-0">
                            <div class="col">
                                <div class="menulist">
                                    <ul>
                                        <li>
                                            <a href="index.html" class="popup-close">
                                                <div class="item-title">
                                                    <i class="icon material-icons md-only">poll</i> Dashboard
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="projects.html" class="popup-close">
                                                <div class="item-title">
                                                    <i class="icon material-icons md-only">add_shopping_cart</i> Projects
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="project-detail.html" class="popup-close">
                                                <div class="item-title">
                                                    <i class="icon material-icons md-only">filter_none</i> Details
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="user-profile.html" class="popup-close">
                                                <div class="item-title">
                                                    <i class="icon material-icons md-only">person</i> Profile
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="aboutus.html" class="popup-close">
                                                <div class="item-title">
                                                    <i class="icon material-icons md-only">domain</i> About
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="component.html" class="popup-close">
                                                <div class="item-title">
                                                    <i class="icon material-icons md-only">pages</i> Component
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row mx-0">
                            <div class="col">
                                <a href="login.html" class="rounded btn btn-outline-white text-white popup-close">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>