<?php include_once("config.php");?>
<?php $Categories = $mysql->select("select * from _tbl_category where IsActive='1' order by ListOrder");?>
<!DOCTYPE html>
    <html dir="ltr" lang="en">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title><?php echo WEB_Title;?></title>
            <meta name="description" content="Online Shopping Hub" />
            <script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>
            <link href="catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
            <script src="catalog/view/javascript/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="catalog/view/javascript/inspire/product-slider-zoom/jquery.elevatezoom.js" type="text/javascript"></script>
            <link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
            <link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />
            <link href="catalog/view/theme/default/stylesheet/stylesheet.css" rel="stylesheet">
            <!--<script src="catalog/view/javascript/countdown/jquery.plugin.min.js" type="text/javascript"></script>
            <script src="catalog/view/javascript/countdown/jquery.countdown.min.js" type="text/javascript"></script>-->
            <link href="catalog/view/javascript/jquery/swiper/css/owl.carousel.css" type="text/css" rel="stylesheet" media="screen" />
            <link href="catalog/view/javascript/jquery/swiper/css/owl.theme.css" type="text/css" rel="stylesheet" media="screen" />
            <link href="catalog/view/javascript/jquery/swiper/css/swiper.min.css" type="text/css" rel="stylesheet" media="screen" />
            <link href="catalog/view/javascript/jquery/swiper/css/opencart.css" type="text/css" rel="stylesheet" media="screen" />
            <link href="catalog/view/javascript/jquery/swiper/css/css/owl.carousel.css" type="text/css" rel="stylesheet" media="screen" />
            <link href="catalog/view/javascript/jquery/swiper/css/css/owl.theme.css" type="text/css" rel="stylesheet" media="screen" />
            <link href="catalog/view/javascript/jquery/magnific/magnific-popup.css" type="text/css" rel="stylesheet" media="screen" />
            <!--<link href="catalog/view/theme/default/stylesheet/inspirenewsletter.css" type="text/css" rel="stylesheet" media="screen" />-->
            <script src="catalog/view/javascript/blog/lightbox-2.6.min.js" type="text/javascript"></script>
            <link href="catalog/view/javascript/blog/lightbox.css" rel="stylesheet" type="text/css" />
            <script src="catalog/view/javascript/inspire/custom.js" type="text/javascript"></script>
            <script src="catalog/view/javascript/jquery/app.js" type="text/javascript"></script>
            <script src="catalog/view/javascript/jquery/swiper/js/owl.carousel.min.js" type="text/javascript"></script>
            <script src="catalog/view/javascript/jquery/swiper/js/swiper.jquery.js" type="text/javascript"></script>
            <!--<script src="catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js" type="text/javascript"></script>
            <script src="catalog/view/javascript/jquery/inspirequickview.js" type="text/javascript"></script>
            <script src="catalog/view/javascript/jquery/inspirenewsletter.js" type="text/javascript"></script>-->
            <script src="catalog/view/javascript/common.js" type="text/javascript"></script>
            <!--<link href="catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet" media="screen" />
            <script src="catalog/view/javascript/jquery/datetimepicker/moment/moment.min.js" type="text/javascript"></script>
            <script src="catalog/view/javascript/jquery/datetimepicker/moment/moment-with-locales.min.js" type="text/javascript"></script>
            <script src="catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>-->
            <style>
                .static-menu li{padding-bottom:14px !important;}
                .errorstring{font-size:11px;color:red;}
                #sub a {color: green;}
               /* .theme-menu-background{background:#700f6a !important}
                #theme-background{background:#700f6a !important}
                .cart_button {width: 90%;padding: 10px;border: none;background: #700f6a;color: #fff;font-weight: bold;margin-top:10px;border-radius:5px;}
                .cart_button:hover {background: #ffcafc;color: #700f6a}
                */
            </style>
        </head>
        <body>
            <nav id="top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5 col-xs-7 header-social">
                            <div class="header-social">
                                <div class="socials-block">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <!--<li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
                                        <!--<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="top-links" class="col-sm-7 col-xs-5 text-right">
                            <ul class="list-inline pull-right">
                                <!-- 
                                <li class="hidden-sm hidden-xs">
                                <b>COUPON :</b> GROCERY10OFF
                                </li>
                                -->
                                <li class="dropdown"><a href="javascript:void(0)" title="My Account" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user hidden-md hidden-lg hidden-sm"></i><span class="hidden-xs">My Account</span>&nbsp;<i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right userdown">
                                        <?php if(isset($_SESSION['User']['CustomerID'])){ ?>
                                        <li><a href="<?php echo WEB_URL;?>/MyPage.php">My Page</a></li>
                                        <li><a href="<?php echo WEB_URL;?>/MyProfile.php">My Profile</a></li>
                                        <li><a href="<?php echo WEB_URL;?>/MyOrders.php">My Orders</a></li>
                                        <!--<li><a href="<?php echo WEB_URL;?>/Wishlist.php">My Wishlist</a></li>-->
                                        <li><a href="<?php echo WEB_URL;?>/ChangePassword.php">Change Password</a></li>
                                        <li><a href="<?php echo WEB_URL;?>/?do=logout">Logout</a></li>
                                        <?php } else { ?>      
                                        <li><a href="<?php echo WEB_URL;?>/login.php"><i class="fa fa-sign-in"></i>Login</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            </ul>                                                 
                        </div>
                    </div>
                </div>
            </nav>
            
            <header style="background:#49a140;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <div id="logo">
                                <a href="<?php echo WEB_URL;?>/index.php">
                                    <img src="<?php echo $_CONFIG['LOGO_URL']; ?>" title=" " alt=" " class="img-responsive" style="height:60px !important;max-width:none !important;margin-left:0px !important;" />
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7 co-sm-6 col-xs-12 xsse">
                            <div id="search-by-category">
                                <div class="search-container">
                                    <div class="search-box input-group">
                                        <input type="text" name="search" id="text-search" value="" placeholder="Search" class=""  />
                                        <div id="sp-btn-search" class="input-group-btn">
                                            <button type="button" id="btn-search-category" class="btn"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="search-ajax">
                                    <div class="ajax-loader-container" style="display: none;">
                                        <img src="https://templatetasarim.com/opencart/Basket/image/catalog/loader.gif" class="ajax-load-img" alt="loader" />
                                    </div>
                                    <div class="ajax-result-container">
                                        <!-- Content of search results -->
                                    </div>
                                </div>
                                <input type="hidden" id="ajax-search-enable" value="1" />
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-2 col-sm-3 text-right xs-cart">
                            <a href="" class="hidden-sm hidden-xs hidden-md">
                                <img src="image/catalog/icon-call.png"/>
                                <div class="cartco">
                                    <span>Call us:</span><br>
                                    <span id="cart-total">9566585866</span>
                                </div>
                            </a>
                            <div id="cart" class="btn-group">
                                <button data-toggle="dropdown" data-loading-text="Loading..." class="dropdown-toggle">
                                    <img src="image/catalog/carti.png"/>
                                    <div class="cartco">
                                        <span>My cart</span><br>
                                        <span>
                                            <span class="cartcount" id="cart_total">0</span>
                                            <i class="fa fa-rupee"></i>&nbsp;
                                            <span id="cart_amt">0.00</span>
                                        </span>
                                    </div>
                                </button>
                                <ul class="dropdown-menu pull-right" id="cart_items" style="list-style: none;">
                                    <li>
                                        <p class="text-center">Your shopping cart is empty!</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="allmenu theme-menu-background" style="background:#218417">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class="hidden-xs">
                                <div id="wr-menu">
                                    <button class="btn-block text-left" type="button" data-target="#all-menu" data-toggle="collapse" aria-expanded="true" >
                                        <i class="fa fa-bars"></i>
                                        <span class="cate">All Categories</span>
                                    </button>
                                </div>                      
                               <?php if (strtolower($_SERVER['SCRIPT_NAME'])=="/index.php") { ?>
                                <div id="all-menu" class="collapse in" aria-expanded="true">
                                <?php } else {?>
                                <div id="all-menu" class="collapse">
                                <?php } ?>
                                    <nav id="menu" class="navbar">
                                        <div class="navbar-header"><span id="category" class="visible-xs">All Categories</span>
                                            <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
                                        </div>
                                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                                            <ul class="nav">
                                                <?php 
                                                    foreach($Categories as $Category) {
                                                        $SubCategories = $mysql->select("select * from _tbl_sub_category where CategoryID='".$Category['CategoryID']."' and IsActive='1' order by ListOrder");  
                                                ?>
                                                <li class="<?php echo (sizeof($SubCategories)>0) ? 'dropdown moremenu' : 'moremenu';?>">
                                                <?php if (sizeof($SubCategories)>0) {?>
                                                    <a href="javascript:void(0)">
                                                <?php } else { ?>
                                                    <a href="<?php echo WEB_URL;?>/c<?php echo $Category['CategoryID']."_".parseStringForURL($Category['CategoryName']);?>">
                                                <?php } ?>
                                                        <!--
                                                        <div class="menu-img pull-left">
                                                            <img src="http://templatetasarim.com/opencart/Basket/image/catalog/menu-icon/9.png" alt="beauty">
                                                        </div>
                                                        -->
                                                        <?php echo $Category['CategoryName'];?>
                                                        <?php if (sizeof($SubCategories)>0) {?>
                                                        <i class="fa fa-angle-down pull-right enangle"></i>
                                                        <?php } ?>
                                                    </a>                                          
                                                    <?php if (sizeof($SubCategories)>0) { ?>
                                                     <div class="dropdown-menu">
                                                        <div class="dropdown-inner">   
                                                            <ul class="nav">
                                                                <?php foreach($SubCategories as $SubCategory) { ?> 
                                                                <li><a href="s<?php echo $SubCategory['SubCategoryID']."_".parseStringForURL($SubCategory['SubCategoryName']);?>"> <?php echo $SubCategory['SubCategoryName'];?> </a> </li>
                                                                <?php } ?>
                                                                <li><a href="c<?php echo $Category['CategoryID']."_".parseStringForURL($Category['CategoryName']);?>">All Items</a> </li>
                                                            </ul>
                                                        </div>
                                                     </div>
                                                     <?php } ?>
                                                </li>
                                                <?php } ?> 
                                             </ul>
                                        </div>
                                        <!-- submenu 
                                        <li class="dropdown moremenu">
                                            <a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/category&amp;path=20" class="dropdown-toggle header-menu" data-toggle="dropdown">
                                                <div class="menu-img pull-left">
                                                    <img src="http://templatetasarim.com/opencart/Basket/image/catalog/menu-icon/3.png" alt="Desktops">
                                                </div>
                                                Desktops <i class="fa fa-angle-down pull-right enangle"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-inner">
                                                    <ul class="list-unstyled">
                                                        <li class="dropdown-submenu"> <a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/category&amp;path=20_26" class="submenu-title"> PC (17) </a>
                                                            <ul class="list-unstyled grand-child">
                                                                <li><a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/category&amp;path=26_61"> beuty &amp; Spa (6) </a> </li>
                                                                <li><a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/category&amp;path=26_63"> Smart Phone (16) </a> </li>
                                                                <li><a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/category&amp;path=26_62"> Smart watch (17) </a> </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled">
                                                        <li class="dropdown-submenu"> <a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/category&amp;path=20_27" class="submenu-title"> Mac (17) </a>
                                                            <ul class="list-unstyled grand-child">
                                                                <li><a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/category&amp;path=27_66"> Decor (15) </a> </li>
                                                                <li><a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/category&amp;path=27_67"> Decor (15) </a> </li>
                                                                <li><a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/category&amp;path=27_64"> Printers (5) </a> </li>
                                                                <li><a href="http://templatetasarim.com/opencart/Basket/index.php?route=product/category&amp;path=27_65"> Trackballs (8) </a> </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        -->
                                    </nav>
                                </div>
                            </div>
                            <div class="hidden-sm hidden-md hidden-lg">
                                <nav id="menu" class="navbar">
                                    <div class="navbar-header"><!-- <span id="category" class="visible-xs">All Categories</span> -->
      <button type="button" class="btn btn-navbar" onclick="openNav()" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"  style="margin-top:-50px !important;position:absolute !important;"></i></button>
    </div>

<div id="mySidenav" class="sidenav">
 <div class="close-nav">
      <span class="categories">Categories</span>
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-close"></i></a>
  </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
       
                                                <?php 
                                                    foreach($Categories as $Category) {
                                                        $SubCategories = $mysql->select("select * from _tbl_sub_category where CategoryID='".$Category['CategoryID']."' and IsActive='1' order by ListOrder");  
                                                ?>
                                                <li class="<?php echo (sizeof($SubCategories)>0) ? 'dropdown moremenu' : 'moremenu';?>">
                                                <?php if (sizeof($SubCategories)>0) {?>
                                                    <a href="javascript:void(0)" class="dropdown-toggle header-menu" data-toggle="dropdown">
                                                <?php } else { ?>
                                                    <a href="<?php echo WEB_URL;?>/c<?php echo $Category['CategoryID']."_".parseStringForURL($Category['CategoryName']);?>">
                                                <?php } ?>
                                                        <!--
                                                        <div class="menu-img pull-left">
                                                            <img src="http://templatetasarim.com/opencart/Basket/image/catalog/menu-icon/9.png" alt="beauty">
                                                        </div>
                                                        -->
                                                        <?php echo $Category['CategoryName'];?>
                                                        <?php if (sizeof($SubCategories)>0) {?>
                                                        <i class="fa fa-angle-down pull-right enangle"></i>
                                                        <?php } ?>
                                                    </a>                                          
                                                    <?php if (sizeof($SubCategories)>0) { ?>
                                                     <div class="dropdown-menu">
                                                        <div class="dropdown-inner">   
                                                            <ul class="list-unstyled">
                                                                <?php foreach($SubCategories as $SubCategory) { ?> 
                                                                <li><a href="s<?php echo $SubCategory['SubCategoryID']."_".parseStringForURL($SubCategory['SubCategoryName']);?>" style="font-weight:normal"> <?php echo $SubCategory['SubCategoryName'];?> </a> </li>
                                                                <?php } ?>
                                                                <li><a href="c<?php echo $Category['CategoryID']."_".parseStringForURL($Category['CategoryName']);?>">All Items</a> </li>
                                                            </ul>
                                                        </div>
                                                     </div>
                                                     <?php } ?>
                                                </li>
                                                <?php } ?> 
                                             </ul>
                                         
    </div>
    </div>
  </nav>

</div>


<script type="text/javascript">
 function headermenu() {
     if (jQuery(window).width() < 768)
     {
         jQuery('ul.nav li.dropdown a.header-menu').attr("data-toggle","dropdown");        
     }
     else
     {
         jQuery('ul.nav li.dropdown a.header-menu').attr("data-toggle",""); 
     }
}
$(document).ready(function(){headermenu();});
jQuery(window).resize(function() {headermenu();});
jQuery(window).scroll(function() {headermenu();});
</script>
      </div>
      <div class="col-md-9 col-sm-8">
        <ul class="list-inline static-menu hidden-xs menu">
		<?php 
            foreach(array() as $Category) {
                $subSubCategorys=$mysql->select("select * from _tbl_sub_category where IsActive='1' and CategoryID='".$Category['CategoryID']."' order by SubCategoryName");       
		?>
            <li class="dropdown open"><a class="dropdown-toggle"><?php echo $Category['CategoryName'];?></a>
			<ul class="dropdown-menu dropdown-menu-right userdown">
				<?php foreach($subSubCategorys as $subSubCategory) { ?>
					<li id="sub"><a href="Products.php?cid=<?php echo $subSubCategory['CategoryID'];?>&sid=<?php echo $subSubCategory['SubCategoryID'];?>"><span><?php echo $subSubCategory['SubCategoryName'];?></span></a></li>
				<?php } ?>                                       
			</ul>
			</li>
			<?php } ?> 
             <li class="dropdown open"><a class="dropdown-toggle" href="payment-method.php">Payment Methods</a></li>
             <li class="dropdown open"><a class="dropdown-toggle" href="contact-us.php">Support</a></li>
			<!--<li class="dropdown open" style="float:right;margin-right:0px;padding-right:0px"><a class="dropdown-toggle"><span>My Account</span></a>
				<ul class="dropdown-menu dropdown-menu-right userdown">
					<?php if(isset($_SESSION['User']['CustomerID'])){ ?>
                      <li id="sub"><a href="MyProfile.php"><span>My Profile</span></a></li>
                      <li id="sub"><a href="MyOrders.php"><span>My Orders</span></a></li>
                      <li id="sub"><a href="Wishlist.php"><span>My Wishlist</span></a></li>
                      <li id="sub"><a href="ChangePassword.php"><span>Change Password</span></a></li>
                    <?php } else { ?>      
					<li id="sub"><a href="login.php"><span>Login</span></a></li>
					<li id="sub"><a href="register.php"><span>Register</span></a></li>
                    <?php } ?>
				</ul>
			<li> -->
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
  
<!--<div id="page-preloader" class="visible">
      <div class="preloader">
          <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
          </div>
      </div>
</div>-->