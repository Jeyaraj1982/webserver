<?php
    include_once("config.php");
?>

<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang=""> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Raiyan Suiting & Clothing</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/ico" href="images/favicon.ico">
		<link rel="stylesheet" href="css/bootstrap.css">
<script src="https://use.fontawesome.com/849597cb80.js"></script>

	
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/color.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>
	
	<div id="wrapper">
		<!--************************************
				Header Start
		*************************************-->
				<header id="header" class="haslayout">
			<div class="top-bar haslayout">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12 pull-right text-right">
							<span class="phone">
								<i class="fa fa-phone" aria-hidden="true"></i>
								<em style="color:#fff" >+91 9444234680</em>
								<i class="fa fa-phone" aria-hidden="true"></i>
								<em style="color:#fff" >+91 7373503131</em>
								<i class="fa fa-phone" aria-hidden="true"></i>
								<em style="color:#fff" >+91 8056151515</em>
							</span>
							<span class="email">
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
								<em><a href="#"style="color:#fff" >info@raiyanclothing.com</a></em>
							</span>
						</div>
						</div>
				</div>
			</div>
			<nav id="nav" class="haslayout navbar">
				<div class="container">
					<div class="navbar-header">
						<button aria-expanded="false" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<strong class="logo">
							<a href="index.php">
								<img src="images/logo.png" alt="image description">
							</a>
						</strong>
					</div>
					<div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse pull-right">
						<div class="row">
								<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="about-us.php">About Us</a></li>
								<li  class="active"><a href="womans-clothing.php">Womens </a></li>
								<li><a href="mans-clothing.php">Mens</a></li>
								<li><a href="kids-clothing.php">Kids</a></li>
							    <li><a href="#">gallery</a></li>
							    <li><a href="contact-us.php">Contact Us</a></li>
								<li ><a href="store-locator.php">Store Locator</a></li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
		</header><!--************************************
				Header End
		*************************************-->
		<!--************************************
				Banner Start
		*************************************-->
		<section class="banner haslayout parallax-window" data-position="center 0" data-parallax="scroll" data-bleed="100" data-speed="0.2" data-image-src="images/pagebanner-images/img-06.jpg">
			<div class="container">
				<h1>Raiyan </h1>
			</div>
		</section>
		<!--************************************
				Banner End
		*************************************-->
		<!--************************************
				BreadCrumbs End
		*************************************-->
		<div class="breadcrumbs haslayout">
			<div class="container">
				<span class="page-title">Raiyan Clothing</span>
				<ol class="breadcrumb">
					<li><a href="/">Home</a></li>
					<li class="active">Womans Clothing</li>
				</ol>
			</div>
		</div>
		<!--************************************
				BreadCrumbs Start
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="main" class="haslayout">
			<div class="container">
				<div class="row">
					<div id="twocolumns" class="section-padding haslayout">
						<div class="col-lg-9 col-md-9 col-sm-12 pull-right">
							<div id="content">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="product-banner">
											<img src="images/img-47.jpg" alt="image description">
										</div>
                                        <div class="products">
                                            <div class="row">
                                            <?php
                                            $fileName = "womans-clothing.php";
                                            if (isset($_REQUEST['product'])) {
                                                $lists = $mysql->select("select * from _products where productid=".$_REQUEST['product']." and ispublished=1");
                                                include_once("details.php");
                                            } elseif (isset($_REQUEST['l'])) {
                                                $lists = $mysql->select("select * from _products where subcategoryid=".$_REQUEST['l']." and ispublished=1 order by productid desc");
                                                include_once("list.php");
                                            } else {
                                                $lists = $mysql->select("select * from _products where maincategoryid=3 and ispublished=1 order by productid desc");
                                                include_once("list.php");
                                            }
                                            ?>
                                            </div>
                                        </div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-12 pull-left">
							<aside id="sidebar">
								<form class="filter-form">
									<fieldset>
									
								
							
										<div class="widget filter brand">
											<h4>Catageries</h4>
											<ul>
												 <?php
                                                 $lists = $mysql->select("select * from _subcategories where maincategoryid=3 order by subcategoryname");
                                                 foreach($lists as $l) {
                                                     ?>
                                                         <li <?php echo ($subcategoryid==$l['subcategoryid']) ? " class='jselected'" : '' ;?> ><a href="mans-clothing.php?l=<?php echo $l['subcategoryid'];?>" <?php echo ($subcategoryid==$l['subcategoryid']) ? " style='color:#fff'" : '' ;?> ><?php echo $l['subcategoryname'];?></a></li>
                                                     <?php
                                                 }
                                                 ?>
											</ul>
										</div>
									</fieldset>
								</form>
								<div class="widget sidebar-banner">
									<figure><img src="images/banner-01.jpg" alt="image description"></figure>
									<div class="banner-text">
										<span class="banner-title">Women Fashion Wear</span>
										<p>Latest Female Clothes to shop for Best Collection.</p>
										<a class="theme-btn-sm btn-shopnow" href="store-locator.php">Visit Shop</a>
									</div>
								</div>
							
							</aside>
						</div>
					</div>
				</div>
			</div>
			</main>
		<!--************************************
				Main End
		*************************************-->
		<!--************************************
				Footer Start
		*************************************-->
	<footer id="footer" class="haslayout" >
			<div class="quick-info background-size section-padding" style="padding-top:120px">
				<div class="container">
					<div class="row">
				
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 footer-col">
							<div class="heading-leftborder">
								<h2>Quick Links</h2>
							</div>
							<ul>
								<li><a href="/">Home</a></li>
								<li><a href="about-us.php">About Us</a></li>
								<li><a href="mans-clothing.php">Mens Collection</a></li>
								<li><a href="womans-clothing.php">Womens Collection</a></li>
								<li><a href="kids-clothing.php">Kids Collection</a></li>
								<li><a href="#">Gallery</a></li>
								<li><a href="contact-us.php">Contact Us</a></li>
								
								
							
							
							</ul>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 footer-col">
							<div class="heading-leftborder">
								<h2>News Letter</h2>
							</div>
							<p>Get our Newsletter to know the Latest Dress Arrivals and Offers </p>
							<form class="newsletter-form">
								<fieldset>
									<div class="form-group">
										<input type="text" placeholder="Name" class="form-control theme-style">
									</div>
									<div class="form-group">
										<input type="email" placeholder="Email" class="form-control theme-style">
									</div>
									<div class="form-group pull-left">
										<button type="submit" class="theme-btn">Send</button>
									</div>
								</fieldset>
							</form>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 footer-col">
							<div class="heading-leftborder">
								<h2>Head Office</h2>
							</div>
							<ul class="info-area">
								<li>
									<strong>Address:</strong>
									<address>309 W.G.C.Road <br>Opp. to periya Palli Vasal,<br> Tuticorin, Tamil Nadu, India.</address>
								</li>
								<li>
									<strong>Phone:</strong>
									<em>
										<i>+91 0461-2300788  - Shop</i>
										<i>+91 7373503131 - Mobile</i> <i>+91 8056151515 - Mobile</i>
									</em>
								</li>
								<li>
									<strong>Email:</strong>
									<em><a href="#">raiyanclothing@gmail.com</a></em>
								</li>
							</ul>
						</div>
						
						
							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 footer-col">
							<div class="heading-leftborder">
								<h2>Branch Office</h2>
							</div>
							<ul class="info-area">
								<li>
									<strong>Address:</strong>
									<address>5-33,5-34,Main Road, <br>Opp., Old Bus Stand<br> Kovilpatti, Tamil Nadu, India.</address>
								</li>
								<li>
									<strong>Phone:</strong>
									<em>
										<i>+91 04632- 233786  - Shop</i>
										<i>+91 9444234680 - Mobile</i><br>
									</em>
								</li>
								<li>
									<strong>Email:</strong>
									<em><a href="#">info@raiyanclothing.com</a></em>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bar haslayout">
				<div class="container">
					<div class="pull-left left">
						<p>&copy; 2016 | All Rights Reserved | Raiyan Clothing</p>
					</div>
					<!-- <div class="pull-right right">
						<img src="images/icon-payment.png" alt="image description">
					</div> -->
				</div>
			</div>
		</footer>
			<!--************************************
				Footer End
		*************************************-->
	</div>
	<!--************************************
			Wrapper End
	*************************************-->
	<script src="js/vendor/jquery-plugin.min.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	
	<script src="js/main.js"></script>
</body>
</html>