<?php
    include_once("config.php");
?>
<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#">
 
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Trip78</title>
    

<link rel="apple-touch-icon" sizes="120x120" href="assets/fav/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/fav/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="assets/fav/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">



    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="xmlrpc.html">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="assets/css/flaticon.css" type="text/css" media="all">
    <link rel="stylesheet" href="assets/css/font-linearicons.css" type="text/css" media="all">
    <link rel="stylesheet" href="assets/css/booking.css" type="text/css" media="all">
    <link rel="stylesheet" href="assets/css/swipebox.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="style.css" type="text/css" media="all">
    <link rel="stylesheet" href="assets/css/travel-setting.css" type="text/css" media="all">
    <style>
    .shortcode-tour-reviews {
    background: rgb(38,189,247) url("images/bg-review.png");
}
    </style>
   <style>
.errorString {color:red;}
</style> 
    
</head>

<body class="single-product travel_tour-page travel_tour">
<div class="wrapper-container">
	<header id="masthead" class="site-header sticky_header affix-top">
		<div class="header_top_bar">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<aside id="text-15" class="widget_text">
							<div class="textwidget">
								<ul class="top_bar_info clearfix">
									<li><i class="fa fa-clock-o"></i>Mon - Sun 9.00 AM - 9.00 PM</li>
								</ul>
							</div>
						</aside>
					</div>
					<div class="col-sm-8 topbar-right">
						<aside id="text-7" class="widget widget_text">
							<div class="textwidget">
								<ul class="top_bar_info clearfix">
                                    <li><i class="fa fa-phone"></i> +91 9626687878</li>
									<li><i class="fa fa-envelope"></i> trip78mail@gmail.com </li>
								</ul>
							</div>
						</aside>
						<aside id="travel_login_register_from-2" class="widget widget_login_form">
							<span class="show_from loginx" onclick="location.href='login.php'"><i class="fa fa-user"></i>&nbsp;&nbsp;Login</span>
							<span class="register_btnx" style="margin-left:15px;position: relative;" onclick="location.href='register.php'">Register</span>
						</aside>
					</div>
				</div>
			</div>
		</div>
		<div class="navigation-menu">
			<div class="container">
				<div class="menu-mobile-effect navbar-toggle button-collapse" data-activates="mobile-demo">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</div>
				<div class="width-logo sm-logo">
					<a href="index.php" title="Travel" rel="home">
						<img src="images/logo_trip78.png" alt="Logo" width="474" height="130" class="logo_transparent_static">
						<img src="images/logo_trip78.png" alt="Sticky logo" width="474" height="130" class="logo_sticky">
					</a>
				</div>
				<nav class="width-navigation">
					<ul class="nav navbar-nav menu-main-menu side-nav" id="mobile-demo">
						<li class="<?php echo $page=="index" ? 'current-menu-ancestor current-menu-parent' : 'menu-item-has-children';?>">
							<a href="index.php">Home</a>							
						</li>
						<li class="<?php echo $page=="aboutus" ? 'current-menu-ancestor current-menu-parent' : 'menu-item-has-children';?>">
							<a href="aboutus.php">About Us</a>							
						</li>                      
						<li class="<?php echo $page=="subtour" ? 'current-menu-ancestor current-menu-parent' : 'menu-item-has-children';?>">
							<a href="javascript:void(0)">Tours</a>						
                             <ul class="sub-menu">
                             <?php
                                 $MainTours = $mysql->select("select * from _tbl_tour where IsPublish='1' order by ListOrder"); 
                                 foreach($MainTours as $mTour) {
                             ?>
                                <li><a href="subtours.php?tours=<?php echo $mTour['TourTypeID'];?>" style="font-size:16px;padding-top:10px;padding-bottom:10px"><?php echo $mTour['TourTypeName'];?></a></li>
                                <?php } ?>
                                      
                                </li>
                            </ul>    
						</li>						
						 
                        <li class="<?php echo $page=="gallery" ? 'current-menu-ancestor current-menu-parent' : 'menu-item-has-children';?>" ><a href="gallery.php">Gallery</a></li>
						<li class="<?php echo $page=="contactus" ? 'current-menu-ancestor current-menu-parent' : 'menu-item-has-children';?>" ><a href="contact.php">Contact</a></li>
						<li class="menu-right">
							<ul>
								<li id="travel_social_widget-2" class="widget travel_search">
									<div class="search-toggler-unit">
										<div class="search-toggler">
											<i class="fa fa-search"></i>
										</div>
									</div>
									<div class="search-menu search-overlay search-hidden">
										<div class="closeicon"></div>
										<form method="get" class="search-form" action="search.php">
											<input type="search" class="search-field" placeholder="Search ..." value="" name="s" title="Search for:">
											<input type="submit" class="search-submit font-awesome" value="&#xf002;">
										</form>
										<div class="background-overlay"></div>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>