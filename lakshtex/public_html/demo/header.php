<?php include_once("config.php");?>
<?php $Categories = $mysql->select("select * from _tbl_category where IsActive='1' order by CategoryName");?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>eCommerce Website</title>
<meta name="google" content=""/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link type="text/css" rel="stylesheet" href="assets/style.css">
</head>
<body class="cms-index-index cms-home-page">
<style>
    .errorstring {font-size:10px;color:red}
	
</style> 
<div id="mobile-menu">
  <ul>
    <li><a href="index.php" class="home1">Home Pages</a>
    </li>
     <?php 
            foreach($Categories as $Category){
                $subSubCategorys=$mysql->select("select * from _tbl_sub_category where IsActive='1' and CategoryID='".$Category['CategoryID']."' order by SubCategoryName");       
      ?>
    <li><a href="index.php" class="home1"><?php echo $Category['CategoryName'];?></a>
      <ul>
        <?php foreach($subSubCategorys as $subSubCategory) { ?>
            <li><a><span><?php echo $subSubCategory['SubCategoryName'];?></span></a></li>
        <?php } ?>
      </ul>
    </li>
    <?php } ?>
  </ul>
</div>
<!-- end mobile menu -->
<div id="page"> 


  <!-- Header -->
  <header>
    <div class="header-container">
      <div class="header-top" style="background: #ffffff;">
        <div class="container">
          <div class="row" style="display: none;">
            <div class="col-sm-4 col-md-4 col-xs-12"> 
              <div class="welcome-msg hidden-xs hidden-sm">Default welcome msg! </div>
              <div class="language-currency-wrapper">
                <div class="inner-cl">
                  <div class="block block-language form-language">
                    <div class="lg-cur"><span><img src="assets/assets/images/flag-default.jpg" alt="French"><span class="lg-fr">French</span><i class="fa fa-angle-down"></i></span></div>
                    <ul>
                      <li><a class="selected" href="#"><img src="assets/images/flag-english.jpg" alt="english"><span>English</span></a></li>
                      <li><a href="#"><img src="assets/images/flag-default.jpg" alt="French"><span>French</span></a></li>
                      <li><a href="#"><img src="assets/images/flag-german.jpg" alt="German"><span>German</span></a></li>
                      <li><a href="#"><img src="assets/images/flag-brazil.jpg" alt="Brazil"><span>Brazil</span></a></li>
                      <li><a href="#"><img src="assets/images/flag-chile.jpg" alt="Chile"><span>Chile</span></a></li>
                      <li><a href="#"><img src="assets/images/flag-spain.jpg" alt="Spain"><span>Spain</span></a></li>
                    </ul>
                  </div>
                  <div class="block block-currency">
                    <div class="item-cur"><span>USD</span><i class="fa fa-angle-down"></i></div>
                    <ul>
                      <li><a href="#"><span class="cur_icon">€</span>EUR</a></li>
                      <li><a href="#"><span class="cur_icon">¥</span>JPY</a></li>
                      <li><a class="selected" href="#"><span class="cur_icon">$</span>USD</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="headerlinkmenu col-md-8 col-sm-8 col-xs-12"> <span class="phone  hidden-xs hidden-sm">Call Us: +123.456.789</span>
              <ul class="links">
                <li class="hidden-xs"><a title="Help Center" href="#"><span>Help Center</span></a></li>
                <li><a title="Store Locator" href="#"><span>Store Locator</span></a></li>
                <li><a title="Checkout" href="checkout.html"><span>Checkout</span></a></li>
                <li>
                  <div class="dropdown"><a class="current-open" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><span>My Account</span> <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="account_page.html">Account</a></li>
                      <li><a href="wishlist.html">Wishlist</a></li>
                      <li><a href="orders_list.html">Order Tracking</a></li>
                      <li><a href="about_us.html">About us</a></li>
                      <li class="divider"></li>
                      <li><a href="account_page.html">Log In</a></li>
                      <li><a href="register_page.html">Register</a></li>
                    </ul>
                  </div>
                </li>
                <li><a title="login" href="account_page.html"><span>Login</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- header inner -->
      <div class="header-inner">
        <div class="container">
          <div class="row">
            <div class="col-sm-3 col-md-3 col-xs-12 jtv-logo-block"> 
              <!-- Header Logo -->
              <div class="logo"><a title="e-commerce" href="index.php"><img alt="Famous" title="Famous logo" src="assets/images/logo.png"></a> </div>
            </div>
            <!--<div class="col-xs-12 col-sm-3 col-md-3 jtv-top-search"> 
              
               Search -->
              
              <!--<div class="top-search">
                <div id="search">
                  <form>
                    <div class="input-group">
                      <select class="cate-dropdown hidden-xs hidden-sm" name="category_id">
                        <option>All Categories</option>
                        <option>women</option>
                        <option>&nbsp;&nbsp;&nbsp;Chair </option>
                        <option>&nbsp;&nbsp;&nbsp;Decoration</option>
                        <option>&nbsp;&nbsp;&nbsp;Lamp</option>
                        <option>&nbsp;&nbsp;&nbsp;Handbags </option>
                        <option>&nbsp;&nbsp;&nbsp;Sofas </option>
                        <option>&nbsp;&nbsp;&nbsp;Essential </option>
                        <option>Men</option>
                        <option>Electronics</option>
                        <option>&nbsp;&nbsp;&nbsp;Mobiles </option>
                        <option>&nbsp;&nbsp;&nbsp;Music &amp; Audio </option>
                      </select>
                      <input type="text" class="form-control" placeholder="Enter your search..." name="search">
                      <button class="btn-search" type="button"><i class="fa fa-search"></i></button>
                    </div>
                  </form>
                </div>
              </div>
              
              <!-- End Search
              
            </div> --> 
            <?php if(isset($_SESSION['User']['CustomerID'])){ ?>
                <div class="col-xs-12 col-sm-6 col-md-6 top-cart">
            <?php } else { ?>
                <div class="col-xs-12 col-sm-9 col-md-9 top-cart">
            <?php } ?>  
              <!-- top cart -->
              <div class="top-cart-contain">
                <div class="mini-cart">
                  <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"><a href="javascript:void(0)">
                    <div class="cart-icon"><i class="icon-basket-loaded icons"></i><span class="cart-total" id="cart_total">0</span></div>
                    <div class="shoppingcart-inner hidden-xs"><span class="cart-title">My Cart</span> </div>
                    </a></div>
                  <div>
                    <div class="top-cart-content">
                      <div class="block-subtitle hidden">Recently added items</div>
                      <div id="cart_items">
                            No items Found
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php if(isset($_SESSION['User']['CustomerID'])){ ?>
            <div class="col-xs-12 col-sm-3 col-md-3 top-cart">
                <div class="link-wishlist" style="float: right;"><span><?php echo $_SESSION['User']['CustomerName'];?></span>&nbsp;&nbsp;<a href="logout.php"><i class="icon-logout icons" title="Logout" style="font-size: 20px;vertical-align: -3px;"></i></a></div>    
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- end header -->
  <nav>
    <div class="container">
      <div class="row">
        <div class="mm-toggle-wrap">
          <div class="mm-toggle"><i class="fa fa-align-justify"></i> </div>
          <span class="mm-label">All Categories</span> </div>
        
        <div class="col-md-12 col-sm-12 jtv-megamenu">
          <div class="mtmegamenu">
            <ul class="hidden-xs">
              <li class="mt-root demo_custom_link_cms">
                <div class="mt-root-item"><a href="index.php">
                  <div class="title title_font"><span class="title-text">Home</span></div>
                  </a></div>
              </li>
              <?php 
                    foreach($Categories as $Category){
                        $subSubCategorys=$mysql->select("select * from _tbl_sub_category where IsActive='1' and CategoryID='".$Category['CategoryID']."' order by SubCategoryName");       
              ?>
              
              <li class="mt-root">
                <div class="mt-root-item"><a href="javascript:void(0)">
                  <div class="title title_font"><span class="title-text"><?php echo $Category['CategoryName'];?></span></div>
                  </a></div>
                <ul class="menu-items col-xs-12">
                    <?php 
                        foreach($subSubCategorys as $subSubCategory) { 
                        $Products = $mysql->select("select * from _tbl_products where CategoryID='".$subSubCategory['CategoryID']."' and SubCategoryID='".$subSubCategory['SubCategoryID']."' and IsActive='1'");        
                        if(sizeof($Products)>0){ 
                    ?>
                      <li class="menu-item depth-1 menucol-1-3">
                        <div class="title"><a href="Products.php?cid=<?php echo $subSubCategory['CategoryID'];?>&sid=<?php echo $subSubCategory['SubCategoryID'];?>"><span><?php echo $subSubCategory['SubCategoryName'];?></span></a></div>
                      </li>
                    <?php } ?>
                    <?php } ?>
                </ul>
              </li>
              <?php } ?>
              
              
              <li class="mt-root demo_custom_link_cms" style="float: right;margin-right:0px">
                <div class="mt-root-item"><a>
                  <div class="title title_font"><span class="title-text">My Account</span></div>
                  </a></div>
                <ul class="menu-items col-md-3 col-sm-4 col-xs-12">
                    <?php if(isset($_SESSION['User']['CustomerID'])){ ?>
                      <li class="menu-item depth-1">
                        <div class="title"><a href="MyProfile.php"><span>My Profile</span></a></div>
                      </li>
                      <li class="menu-item depth-1">
                        <div class="title"><a href="Orders.php"><span>My Orders</span></a></div>
                      </li>
                      <li class="menu-item depth-1">
                        <div class="title"><a href="Invoices.php"><span>My Invoices</span></a></div>
                      </li>
                      <li class="menu-item depth-1">
                        <div class="title"><a href="mywishlist.php"><span>My Wishlist</span></a></div>
                      </li>
                      <li class="menu-item depth-1">
                        <div class="title"><a href="ChangePassword.php"><span>Change Password</span></a></div>
                      </li>
                    <?php } else { ?>      
                      <li class="menu-item depth-1">
                        <div class="title"><a href="login.php"><span>Login</span></a></div>
                      </li>  
                      <li class="menu-item depth-1">
                        <div class="title"><a href="register.php"><span>Register</span></a></div>
                      </li>
                    <?php } ?>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <form id="frmid_0">
  
  </form>