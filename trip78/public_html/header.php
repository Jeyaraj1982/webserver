<?php include_once("config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Book Your Travel - Online Booking HTML Template">
	<meta name="description" content="Book Your Travel - Online Booking HTML Template">
	<meta name="author" content="themeenergy.com">
	<title>Trip78</title>
    
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/theme-turqoise.css" id="template-color" />
	<link rel="stylesheet" href="css/lightslider.min.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800|Roboto+Slab:400,700&subset=latin,latin-ext,greek-ext,greek,cyrillic,vietnamese,cyrillic-ext">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://use.fontawesome.com/e808bf9397.js"></script>
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link rel="stylesheet" href="css/styler.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="js/app.js"></script>
    
    <link rel="stylesheet" href="css/lightgallery.min.css" />
</head>
<body>
	<div class="loading">
		<div class="ball"></div>
		<div class="ball1"></div>                             
	</div>
	<header class="header" style="height:auto !important">
		<div class="wrap">
			<div class="logo"><a href="index.php" title="Book Your Travel"><img src="images/logo_trip78.png" style="height:100px"> </a></div>
			<div class="contact" style="color:#0081C8">
				<span style="color:#555">24/7 Support number</span>
				<span style="color:#555" class="number">+91 9677536373, +91 9626787878</span>
			</div>
		</div>
		<nav class="main-nav" style="background:#F29A05 !important;">
			<div class="wrap">
				<ul class="slimmenu" id="nav">
                <?php $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1'");?>
                <?php foreach($Tours as $Tour){?>
					<li>
                        <a href="subtour.php?tid=<?php echo md5($Tour['TourTypeID']);?>" title="index"><?php echo $Tour['TourTypeName'];?></a>
                         <ul>
                          <?php $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and TourTypeID='".$Tour['TourTypeID']."'");?>
                          <?php foreach($SubTours as $SubTour) { ?>
                            <li><a href="tourpackages.php?tid=<?php echo md5($SubTour['SubTourTypeID']);?>"><?php echo $SubTour['SubTourTypeName'];?></a></li>
                          <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
                    <li>
                        <a href="contactus.php" title="contact us">Contact</a>
                    </li>
				</ul>
			</div>
		</nav>
	</header>
    
    <style>
.gradient-button{
    background: #0081C8;
}
.gradient-button:hover{
    background: #046aa0;
}
</style> 