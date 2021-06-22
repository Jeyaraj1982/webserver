<?php include_once("config.php");?>
<!doctype html>
<html lang="en">
<head>
<title>Makkal Sevai Maiyam</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="https://www.vasterad.com/themes/hireo/css/style.css">
<link rel="stylesheet" href="https://www.vasterad.com/themes/hireo/css/colors/blue.css">
</head>
<body>
<div id="wrapper">
<header id="header-container" class="fullwidth">
	<div id="header">
		<div class="container">
			<div class="left-side">
				<div id="logo">                       
					<a href="index.php"><img src="assets/msm_label.png" alt="" style="max-width:none;width:250px !important;"></a>
				</div>
				<nav id="navigation">
					<ul id="responsive">
						<li><a href="index.php" class="current">Home</a></li>
						<li><a href="services.php">Services</a></li>
                        <?php if (isset($_SESSION['User']['CustomerID']) && $_SESSION['User']['CustomerID']>0) {?>
                            <li><a href="myservices.php">My Requests</a></li>
                            <li><a href="index.php?action=logout">Logout</a></li>
                        <?php } else { ?>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                        <?php } ?>
                        
					</ul>
				</nav>
				<div class="clearfix"></div>
			</div>
			<div class="right-side">
				 
				<span class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner" style="top:10px"></span>
						</span>
					</button>
				</span>
			</div>
		</div>
	</div>
</header>
<div class="clearfix"></div>






<!-- Intro Banner
================================================== -->
<!-- add class "disable-gradient" to enable consistent background overlay -->