<?php include_once("header.php");?>
<?php 
if (isset($_GET['subtour'])) {
$TourPackages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and SubTourTypeID='".$_GET['subtour']."' order by PackageOrder");
}

 

?>
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
				<h1 class="heading_primary">Tours</h1></div>
		</div>
		<section class="content-area">
			<div class="container">
				<div class="row">
					<div class="site-main col-sm-9 alignright" style="border-left:1px solid #ccc">
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
							 <li class="item-tour col-md-4 col-sm-6 product">
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
					<div class="widget-area align-left col-sm-3" style="border-right:1px solid #ccc">
                    
                    <ul class="sub-menu" style="line-height:30px;">
                             <?php
                                 $MainTours = $mysql->select("select * from _tbl_tour where IsPublish='1'"); 
                                 foreach($MainTours as $mTour) {
                             ?>
                                <li style="font-weight: bold"><a href="subtours.php?tours=<?php echo $mTour['TourTypeID'];?>"><?php echo $mTour['TourTypeName'];?></a>
                                <?php if ($TourPackages[0]['TourTypeID']==$mTour['TourTypeID']) { 
                                    
                                    
                                    ?>
                                    <ul style="padding-left:20px;line-height:30px;;">
                                      <?php $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and TourTypeID='".$TourPackages[0]['TourTypeID']."'");?>
                                      <?php foreach($SubTours as $SubTour){ ?>
                                      <?php $availablePackages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and SubTourTypeID='".$SubTour['SubTourTypeID']."'"); ?>
                                        <?php if (sizeof($availablePackages)>0) { ?>
                                        <li style="font-weight:normal"><a href="viewpackages.php?subtour=<?php echo $SubTour['SubTourTypeID'];?>" style="<?php echo $SubTour['SubTourTypeID']==$_GET['subtour'] ? 'color:#0081c8;font-weight:bold': '';?>"><?php echo $SubTour['SubTourTypeName'];?>
                                        (<?php echo sizeof($availablePackages);?>)
                                        </a></li>
                                        <?php } ?>
                                      <?php } 
                                      
                                      ?>
                                    </ul>
                                
                                    <?php
                                    
                                } ?>
                                
                                </li>
                                <?php } ?>
                                   <!-- <ul class="sub-menu">
                                        <li><a href="tours-list.html">Tour List</a></li>
                                        <li><a href="tours-2-cols.html">Grid – 2 cols</a></li>
                                        <li><a href="tours.html">Grid – 3 cols(width sidebar)</a></li>
                                        <li><a href="tours-3-cols.html">Grid – 3 cols (no sidebar)</a></li>
                                        <li><a href="tours-4-cols.html">Grid – 4 cols</a></li>
                                    </ul>-->       
                                </li>
                            </ul>    
                            
						 
						 
					</div>
				</div>
			</div>
		</section>
	</div>
<?php include_once("footer.php");?>