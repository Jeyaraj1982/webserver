<?php
include_once("config.php");
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<meta charset="UTF-8">
<meta name="description" content="HVAC Template">
<meta name="keywords" content="HVAC, unica, creative, html">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>AstraFX</title>
<base href="https://colorlib.com/preview/theme/hvac/">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
<link rel="stylesheet" href="css/nice-select.css" type="text/css">
<link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
<link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
<link rel="stylesheet" href="<?php echo BaseUrl;?>/assets/css/style.css" type="text/css">
<link rel="stylesheet" href="<?php echo BaseUrl;?>/assets/css/sweetalert.css" type="text/css">
<script src="js/jquery-3.3.1.min.js" type="194b4c4ebcf722a69f5f0ce5-text/javascript"></script>
</head>
<body>

<div id="preloder">
<div class="loader"></div>
</div>

<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
<div class="offcanvas__widget">
<a href="<?php echo BaseUrl;?>/login.php" class="primary-btn"  style="background:#012068">Login</a>
</div>
<div class="offcanvas__logo">
<a href="<?php echo BaseUrl;?>"><img src="<?php echo BaseUrl;?>/assets/astrafx_newlogo.png" alt=""></a>
</div>
<div id="mobile-menu-wrap"></div>
 
                         
 
</div>


<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="<?php echo BaseUrl;?>"><img src="<?php echo BaseUrl;?>/assets/astrafx_newlogo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="header__nav">
                    <?php
                        $rurl = explode("/",$_SERVER['REQUEST_URI']);
                        $home = "";
                        $aboutus = "";
                        $plans = "";
                        $register = "";
                        $contactus = "";
                        $login = "";
                     
                        switch(strtolower($rurl[sizeof($rurl)-1])) {
                            case 'aboutus.php'   : $aboutus = ' class="active" ';break;
                            case 'plans.php'     : $plans = ' class="active" ';break;
                            case 'register.php'  : $register = ' class="active" ';break;
                            case 'contactus.php' : $contactus = ' class="active" ';break;
                            case 'login.php'     : $login = ' class="active" ';break;
                            default              : $home = ' class="active" ';break;
                        }
                    ?>
                    <nav class="header__menu">
                        <ul>
                            <li <?php echo $home;?>><a href="<?php echo BaseUrl;?>">Home</a></li>
                            <!--<li <?php echo $aboutus;?>><a href="<?php echo BaseUrl;?>/aboutus.php">About Us</a></li>-->
                            <li <?php echo $plans;?>><a href="<?php echo BaseUrl;?>/plans.php">Business Plan</a></li>
                            <!--<li <?php echo $register;?>><a href="<?php echo BaseUrl;?>/register.php">Register</a></li>-->
                            <li <?php echo $contactus;?>><a href="<?php echo BaseUrl;?>/contactus.php">Contact</a></li>
                        </ul>
                    </nav>
                    <div class="header__nav__widget">
                        <a href="<?php echo BaseUrl;?>/login.php" class="primary-btn"  style="background:#012068">Login</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <span class="fa fa-bars"></span>
        </div>
    </div>
</header>