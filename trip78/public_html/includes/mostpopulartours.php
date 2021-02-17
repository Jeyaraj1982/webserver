<?php
     $MostPopularTourPackages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and IsMostPopularTour='1' order by MostPopularOrder");
?>
<div class="padding-top-6x padding-bottom-6x section-background" style="background-image:url(images/home/bg-popular.jpg)">
    <div class="container">
	    <div class="shortcode_title text-white title-center title-decoration-bottom-center">
		    <div class="title_subtitle">Take a Look at Our</div>
			<h3 class="title_primary">MOST POPULAR TOURS</h3>
			<span class="line_after_title" style="color:#ffffff"></span>
		</div>
			
        <div class="row wrapper-tours-slider">
			<div class="tours-type-slider list_content" data-dots="true" data-nav="true" data-responsive='{"0":{"items":1}, "480":{"items":2}, "768":{"items":2}, "992":{"items":3}, "1200":{"items":4}}'>
                <?php foreach($MostPopularTourPackages as $TourPackage) {?>
                <div class="item-tour">
					<div class="item_border">
						<div class="item_content">
							<div class="post_images">
								<a href="single-tour.html" class="travel_tour-LoopProduct-link">
									<span class="price">
                                        <!--
                                        <del>
										    <span class="travel_tour-Price-amount amount">$87.00</span>
                                        </del>
                                        -->
										<ins><span class="travel_tour-Price-amount amount"><?php echo number_format($TourPackage['PackagePrice']);?></span></ins>
                                         
									</span>
									<!--<span class="onsale">Sale!</span>-->
									<img src="https://www.trip78.in/uploads/package/<?php echo $TourPackage['Image1'];?>" alt="" title="">
								</a>
								<!--
                                <div class="group-icon">
									<a href="#" data-toggle="tooltip" data-placement="top" title="" class="frist" data-original-title="River Cruise"><i class="flaticon-transport-2"></i></a>
									<a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Wildlife"><i class="flaticon-island"></i></a>
								</div>
                                -->
							</div>
							<div class="wrapper_content">
								<div class="post_title">
                                    <h4>
									    <a href="tourpackagedetails.php?tid=<?php echo md5($TourPackage['PackageID']);?>" rel="bookmark"><?php echo (($TourPackage['PackageName']));?></a>
									</h4>
                                </div>
								<span class="post_date"><?php $TourPackage['DaysCount'];?> DAYS ><?php $TourPackage['NightsCount'];?> NIGHTS</span>
								<p><?php echo substr($TourPackage['Description'],0,50)."...";?></p>
							</div>
						</div>
						<div class="read_more">
							<div class="item_rating">
                                <?php for($i=1;$i<=$TourPackage['PackageRating'];$i++) {?>
								<i class="fa fa-star"></i>
                                <?php } ?>
							</div>
							<a href="tourpackagedetails.php?tid=<?php echo md5($TourPackage['PackageID']);?>" class="read_more_button">
                                VIEW MORE <i class="fa fa-long-arrow-right"></i>
                            </a>
							<div class="clear"></div>
						</div>
					</div>
				</div>
                <?php } ?>
            </div>
		</div>
	</div>
</div>