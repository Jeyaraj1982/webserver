<?php include_once("header.php");?>
<?php $TourPackages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and ( (PackageName like '%".$_GET['s']."%') or (ShortDescription like '%".$_GET['s']."%') or (Description like '%".$_GET['s']."%') ) ") ;?>
<?php $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and SubTourTypeID='".$TourPackages[0]['SubTourTypeID']."'");?>
<?php $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and TourTypeID='".$TourPackages[0]['TourTypeID']."'");?>
	<div class="site wrapper-content">
		<div class="top_site_main" style="background-image:url(images/banner/top-heading.jpg);">
			<div class="banner-wrapper container article_heading">
				<div class="breadcrumbs-wrapper">
					<ul class="phys-breadcrumb">
						<li><a href="index.php" class="home">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="subtours.php?tours=<?php echo $Tours[0]['TourTypeID'];?>"><?php echo $Tours[0]['TourTypeName'];?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="viewpackages.php?subtour=<?php echo $SubTours[0]['SubTourTypeID'];?>"><?php echo $SubTours[0]['SubTourTypeName'];?></a></li>
					</ul>
				</div>
				<h1 class="heading_primary">Search Result</h1></div>
		</div>
		<section class="content-area">
			<div class="container">
				<div class="row">
					<div class="site-main col-sm-12 alignright">
                    <div class="breadcrumbs-wrapper">
                    <ul class="phys-breadcrumb" style="font-weight:bold;">
                         <li class="breadcrumb-item active" aria-current="page"><a href="subtours.php?tours=<?php echo $Tours[0]['TourTypeID'];?>" style="font-size:20px !important;color:#0081c8"><?php echo $Tours[0]['TourTypeName'];?></a></li>
                         <li class="breadcrumb-item active" aria-current="page"><a href="viewpackages.php?subtour=<?php echo $SubTours[0]['SubTourTypeID'];?>" style="font-size:20px !important;color:#0081c8"><?php echo $SubTours[0]['SubTourTypeName'];?></a></li>
                    </ul>
                </div>
						<ul class="tours products wrapper-tours-slider">
                            <?php foreach($TourPackages as $TourPackage) {
                                   $tourThumb =  $images = $mysql->select("select * from _tbl_tours_package_images where IsDelete='0' and PackageID='".$TourPackage['PackageID']."' order by ImageOrder");
                                ?>
							 <li class="item-tour col-md-3 col-sm-6 product">
                                <div class="item_border item-product">
                                    <div class="post_images">
                                        <a href="tour_information.php?tid=<?php echo md5($TourPackage['PackageID']);?>">
                                            <span class="price">&#8377; <?php echo number_format($TourPackage['PackagePrice']);?></span>
                                            <img src="https://www.trip78.in/uploads/package/<?php echo $tourThumb[0]['ImageName'];?>" alt="Discover Brazil" title="Discover Brazil" width="430" height="305">
                                        </a>
                                    </div>
                                    <div class="wrapper_content">
                                        <div class="post_title"><h4 style="height: 50px;line-height: 24px;">
                                            <a href="tour_information.php?tid=<?php echo md5($TourPackage['PackageID']);?>" rel="bookmark"><?php echo (($TourPackage['PackageName']));?></a>
                                        </h4></div>
                                        <span class="post_date" style="margin-bottom:5px;"><b><?php echo $TourPackage['NightsCount'];?></b> NIGHTS&nbsp;<b><?php echo $TourPackage['DaysCount'];?></b> DAYS </span>
                                        <p style="height: 50px;overflow: hidden;font-size: 12px;line-height: 17px;-webkit-line-clamp: 3;-webkit-box-orient: vertical;"><?php echo $TourPackage['ShortDescription'];?></p>
                                    </div>
                                    <div class="read_more">
                                        <div class="item_rating">               
                                             <?php for($i=1;$i<=$TourPackage['PackageRating'];$i++) {?>
                                <i class="fa fa-star"></i>
                                <?php } ?>
                                        </div>
                                        <a rel="nofollow" href="tour_information.php?tid=<?php echo md5($TourPackage['PackageID']);?>" class="button product_type_tour_phys add_to_cart_button">Read more</a>
                                    </div>
                                </div>
                            </li>
							<?php } ?> 
						</ul>
						<!--<div class="navigation paging-navigation" role="navigation">
							<ul class="page-numbers">
								<li><span class="page-numbers current">1</span></li>
								<li><a class="page-numbers" href="#">2</a></li>
								<li><a class="next page-numbers" href="#"><i class="fa fa-long-arrow-right"></i></a>
								</li>
							</ul>
						</div>
                        -->
					</div>
					 
				</div>
			</div>
		</section>
	</div>
<?php include_once("footer.php");?>