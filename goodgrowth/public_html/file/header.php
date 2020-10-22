<?php
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Good Growth Development</title>
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/revolution-slider.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<!--Favicon-->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="css/responsive.css" rel="stylesheet">

</head>

<body>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>-->
        <button type="button" class="btn btn-default" data-dismiss="modal" style="float:right">&times;</button>
        <h4 class="modal-title">Order Request</h4>
      </div>
      <div class="modal-body">
      <?php
        if (sizeof($_SESSION['items'])>10) {
            echo "<div style='color:red'>Product couldn't add to Cart. Maximum 10 products allowed on Cart.</div>";
        }
      ?>
        <table style="width:100%">
            <tr>
                <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;width:30px">SL</td>
                <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc">Product Name</td>
                <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;width:50px;text-align:right">Qty</td>
                <td style="padding:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;width:100px;text-align:right">Amount</td>
            </tr>
            <?php
            $i=1;
            $amount = 0;
            foreach($_SESSION['items'] as $item) {?>
            <tr>
                <td style="padding-top:3px;padding-bottom:3px;padding-left:5px;text-align:right"><?php echo $i;?>.</td>
                <td style="padding-top:3px;padding-bottom:3px;padding-left:5px;"><?php echo $item['PName'];?></td>
                
                <td style="padding-top:3px;padding-bottom:3px;text-align:right;padding-right:5px;">1</td>
                <td style="padding-top:3px;padding-bottom:3px;text-align:right;padding-right:5px;"><?php echo number_format($item['Price'],2);?></td>
            </tr>            
            <?php
            $i++;
            $amount += $item['Price'];
            } ?>
            <tr>
                <td style="padding-top:5px;padding-bottom:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;padding-left:5px;text-align:right"></td>
                <td style="padding-top:5px;padding-bottom:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;text-align:right;padding-right:5px;" colspan="2">Total</td>
                <td style="padding-top:5px;padding-bottom:5px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;text-align:right;padding-right:5px;"><?php echo number_format($amount,2);?></td>
            </tr> 
        </table>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Continue Shopping</button>
       <a href="order.php"><button type="button" class="btn btn-default" style="background:#c3f218">Checkout</button></a>
       
       <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>

<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>-->
        <button type="button" class="btn btn-default" data-dismiss="modal" style="float:right">&times;</button>
        <h4 class="modal-title">Order Request</h4>
      </div>
      <div class="modal-body">
      <div style="color:red">Item couldn't be add to cart. You selected item alreay in your cart.</div>
         
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Continue Shopping</button>
       <a href="order.php"><button type="button" class="btn btn-default" style="background:#c3f218">Checkout</button></a>
       
      
      </div>
    </div>
  </div>
</div>

<div class="page-wrapper">
 	
    <!-- Preloader -->
	
 	
    <!-- Main Header-->
    <header class="main-header">
    
        <!--Header-Upper-->
        <div class="header-upper">
        	<div class="auto-container">
            	<div class="clearfix">
                	
                	<div class="pull-left logo-outer mob-head">
                    	<div class="logo"><a href="index.php"><img src="images/logo.gif" alt="" title=""></a></div>
                    </div>
                    
                    <div class="pull-right upper-right clearfix hidden-xs hidden-sm">
                    	
                        <!--Info Box-->
                        <div class="upper-column info-box">
                         <?php if (sizeof($_SESSION['items'])==0) { ?>
                             <img src="images/shopping-cart-for-e-commerce.png"> No items found
                         <?php } else {?>
                           <a href="order.php"><img src="images/shopping-cart-for-e-commerce.png"> <?php echo sizeof($_SESSION['items']);?> item(s)</a>
                           <?php } ?>
                        </div>
                        <!--Info Box-->
                        
                        <!--Info Box-->
                        <div class="upper-column info-box">
                        	<div class="icon-box"><span class="flaticon-phone-call"></span></div>
                            <ul>
                            	<li><strong> +91 9751157370 </strong></li>
                                <li> +91 8870832788 </li>
                            </ul>
                        </div>
                        <!--Info Box-->
                        <div class="upper-column info-box">
                        	<ul class="social-icon-one">
                            	<li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                     
                             </ul>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        <!--End Header Upper-->
        
        <!--Header Lower-->
        <div class="header-lower">
            
        	<div class="auto-container">
            	<div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->    	
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li> <a href="/"class="<?php if($page=='home'){echo'current';}?>">Home</a> </li>
								<li><a href="about.php" class="<?php if($page=='about'){echo'current';}?>">About Us</a></li>
                                
                                <li><a href="health.php" class="<?php if($page=='health'){echo'current';}?>">Health</a></li>
                                <li><a href="wealth.php" class="<?php if($page=='wealth'){echo'current';}?>">Wealth</a></li>
                                <li><a href="entertainment.php" class="<?php if($page=='entertainment'){echo'current';}?>">Entertainment</a></li>
                                <li><a href="good-market.php" class="<?php if($page=='good-market'){echo'current';}?>">Market</a></li>
                                
                                      
                                 <li><a href="gallery.php" class="<?php if($page=='gallery'){echo'current';}?>">Gallery</a></li>
                                 <li><a href="download.php" class="<?php if($page=='download'){echo'current';}?>">Download</a></li>
                                 <li class="dropdown"><a href="#">Contact Us</a>
                                <ul>
								 <li><a href="contact.php" class="<?php if($page=='contact'){echo'current';;}?>">Contact Us</a></li>
                                 <li><a href="#"  class="<?php if($page=='branches'){echo'current';;}?>">Our Branches</a></li>
								</ul>
								</li>
								
						
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->
                    <div class="btn-box">
                    	<a  href="login.php" class="donate-btn theme-btn btn-style-one">Login/Signup</a>
                    </div>
                </div>
                
            </div>
            <?php
                $wNews = $mysql->select("select * from _tbl_Web_News where IsPublish='1' order by NewsID Desc");
            ?>
            <?php if (sizeof($wNews)>0) {?>
            <div style="padding:5px;background:#b6e01d;border-top:4px solid #94bb07 !important">
                  <marquee scrollamount="4" onmouseover="this.stop();" onmouseout="this.start()" id="mplay">
    <?php
        foreach($wNews as $p) {
            ?>
            <span style="font-size:18px;color:green">&#x2756;</span>&nbsp;<a class="Mlink" style="color:#333" href="News.php?NewsID=<?php echo $p['NewsID'];?>"><?php echo $p['NewsTitle'];?></a>&nbsp;&nbsp;&nbsp;
            <?php
        }
        ?>
    </marquee>
            
            </div>
            <?php } ?>
        </div>
        <!--End Header Lower-->
        
        <!--Sticky Header-->
        <div class="sticky-header">
        	<div class="auto-container clearfix">
            	<!--Logo-->
            	<div class="logo pull-left">
                	<a href="index.php" class="img-responsive"><img src="images/logo-small.png" alt="" title=""></a>
                </div>
                
                <!--Right Col-->
                <div class="right-col pull-right">
                	<!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->    	
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                            
								<li> <a href="/"class="<?php if($page=='home'){echo'current';}?>">Home</a> </li>
								<li><a href="about.php" class="<?php if($page=='about'){echo'current';}?>">About Us</a></li>
                                
                                <li><a href="health.php" class="<?php if($page=='health'){echo'current';}?>">Health</a></li>
                                <li><a href="wealth.php" class="<?php if($page=='wealth'){echo'current';}?>">Wealth</a></li>
                                <li><a href="entertainment.php" class="<?php if($page=='entertainment'){echo'current';}?>">Entertainment</a></li>
                                <li><a href="good-market.php" class="<?php if($page=='good-market'){echo'current';}?>">Market</a></li>
                                
                                      
                                 <li><a href="gallery.php" class="<?php if($page=='gallery'){echo'current';}?>">Gallery</a></li>
                                 <li><a href="download.php" class="<?php if($page=='download'){echo'current';}?>">Download</a></li>
                                 <li class="dropdown"><a href="#">Contact Us</a>
                                <ul>
								 <li><a href="contact.php" class="<?php if($page=='contact'){echo'current';;}?>">Contact Us</a></li>
                                 <li><a href="#"  class="<?php if($page=='branches'){echo'current';;}?>">Our Branches</a></li>
								</ul>
								</li>


							</ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
                
            </div>
        </div>
        <!--End Sticky Header-->
    
    </header>
    <!--End Main Header -->