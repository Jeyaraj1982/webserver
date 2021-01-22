<?php $page = "aboutus"; ?>
<?php include_once("header.php");?>
	<div class="site wrapper-content">
		<div class="top_site_main" style="background-image:url(images/banner/top-heading.jpg);">
			<div class="banner-wrapper container article_heading">
				<div class="breadcrumbs-wrapper">
					<ul class="phys-breadcrumb">
						<li><a href="index.php" class="home">Home</a></li>
						<li>About Us</li>
					</ul>
				</div>
				<h1 class="heading_primary">Tours</h1></div>
		</div>
		<section class="content-area">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<img style="padding-top: 50px;" src="assets/abous_logo.png" alt="" width="250px" height="250px">
					</div>
					<div class="site-main col-sm-9 alignright">
						<ul class="tours products wrapper-tours-slider">
							<h1 class="item-tour col-md-4 col-sm-6 product">
								About Trip78
							</h1>						
						</ul>						
					</div>
					<div class="site-main col-sm-9 alignright" style="text-align: justify; padding-bottom: 50px;">
						<span style="padding-left: 50px;" >Thank you so much for your support. We truly appreciate your support and confidence that you have on us. we are looking forward to serving you continuously. We are the very famous online  tour agency in India.Thought out our website "Trip78" you may know our cost and verity of tour packages all over the world.  For Trip 78, you are the starting point of everything we do. Thus with every trip,  we ensure working sincerely to fulfil your expectation in an enjoyable and responsible way. Our vision to give you a consistent occasion encounter makes as one of the main visit administrator in the regularly extending travel industry. </span>
						We start our business since 2000, in excess of more than 1000multiple customers all over the world. we are the most trustable travel agency in India. We know the development and accomplishment of our organisation relies on satisfying our customers need each day. Trip78 provides more than 500 packages all over the world. Exclusive special tours for couples, ladies and students. Whether it's a corporate tour, family tour,honeymoon, adventure tours,wildlife,water activities,nature,  we have varieties of tour packages to suit the most of your taste, requirement and budget. So Hurry up! book a package and enjoy your holidays with Trip78.
					</div>
					<div class="wrapper-special-tours"  >
						<div class="row" >
                        <?
                                $SubTours = $mysql->select("SELECT * FROM _tbl_sub_tour WHERE IsPublish='1' order by RAND() LIMIT 3");
                                foreach($SubTours as $SubTour) {
                                    $priceFrom = $mysql->select("SELECT (PackagePrice*1) as PackagePrice  FROM _tbl_tours_package WHERE SubTourTypeID='".$SubTour['SubTourTypeID']."' ORDER BY PackagePrice*1 LIMIT 0,1");
                                    $priceFrom = isset($priceFrom[0]['PackagePrice']) ? $priceFrom[0]['PackagePrice'] : "0.00";
                                    
                        ?>
							<div class="inner-special-tours col-md-4">
								<a href="viewpackages.php?subtour=<?php echo $SubTour['SubTourTypeID'];?>">
									<img width="430" height="305" src="https://www.trip78.in/uploads/<?php echo $SubTour['Image'];?>" alt="<?php echo $SubTour['SubTourTypeName'];?>" title="<?php echo $SubTour['SubTourTypeName'];?>"></a>
								<div class="item_rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<div class="post_title"><h3>
									<a href="viewpackages.php?subtour=<?php echo $SubTour['SubTourTypeID'];?>" rel="bookmark"><?php echo $SubTour['SubTourTypeName'];?></a>
								</h3></div>
								<div class="item_price">
									<span class="price">From Rs. <?php echo number_format($priceFrom,2);?></span>
								</div>
							</div>
                            <?php } ?>
							 
							 
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php include_once("footer.php");?>