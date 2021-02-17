<?php $page = "index"; ?>
<?php include_once("header.php")?>
	<div class="site wrapper-content">
		<div class="home-content" role="main">
			<div class="top_site_main">

 			</div>
			<div id="home-page-slider-image" class="carousel slide" data-ride="carousel">
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
                    <?php
                        $sliders = $mysql->select("select * from _tbl_sliders  ");     
                        $i=0;
                        foreach($sliders as $slider) {
                    ?>
                    <div class="item <?php echo $i==0 ? ' active ' : '';?>">
						<img src="<?php echo "https://www.trip78.in/uploads/".$slider['SliderImage'];?>" alt="Home Slider 1">
						<div class="carousel-caption content-slider">
							<div class="container">
                            <?php if (strlen(trim($slider['SliderTitle']))>0) {?>
                                <h2><?php echo $slider['SliderTitle'];?></h2>
                            <?php } ?>
							<?php if (strlen(trim($slider['SliderDescription']))>0) {?>
							<p><?php echo $slider['SliderDescription'];?></p>
                            <?php } ?>
                             <?php if (strlen(trim($slider['ButtonName']))>0) {?>
							<p><a href="<?php echo $slider['ButtonLink'];?>" class="btn btn-slider"><?php echo $slider['ButtonName'];?></a></p>
                            <?php } ?>
							</div>
						</div>
					</div>
                    <?php $i++; } ?>
				</div>
				<!-- Controls -->
				<a class="carousel-control-left" href="#home-page-slider-image" data-slide="prev">
					<i class="lnr lnr-chevron-left"></i>
				</a>
				<a class="carousel-control-right" href="#home-page-slider-image" data-slide="next">
					<i class="lnr lnr-chevron-right"></i>
				</a>
			</div>
			<div class="section-white padding-top-6x padding-bottom-6x tours-type">
				<div class="container">
					<div class="shortcode_title title-center title-decoration-bottom-center">
						<div class="title_subtitle">Find a Tour by</div>
						<h3 class="title_primary">DESTINATION</h3><span class="line_after_title"></span>
					</div>
					<div class="wrapper-tours-slider wrapper-tours-type-slider">
						<div class="tours-type-slider" data-dots="true" data-nav="true" data-responsive='{"0":{"items":1}, "480":{"items":2}, "768":{"items":3}, "992":{"items":4}, "1200":{"items":5}}'>
                        
                        <?php
                             $WSubTours = $mysql->select("select * from _tbl_sub_tour where SubTourTypeID in (select SubTourTypeID from _tbl_homepage) order by SubTourTypeName");
                             foreach($WSubTours as $WSubTour) {
                        ?>
                            <div class="tours_type_item">
								<a href="viewpackages.php?subtour=<?php echo $WSubTour['SubTourTypeID'];?>" class="tours-type__item__image">
									<img src="https://www.trip78.in/uploads/<?php echo $WSubTour['Image'];?>" alt="<?php echo $WSubTour['SubTourTypeName'];?>" style="height:200px !important;width:200px !important">
								</a>
								<div class="content-item">
									<div class="item__title"><?php echo $WSubTour['SubTourTypeName'];?></div>
								</div>
							</div>
						<?php } ?>	 
						</div>
					</div>
				</div>
			</div>

			<?php include_once("includes/tours.php");?>

			<div class="container two-column-respon mg-top-6x mg-bt-6x">
				<div class="row">
					<div class="col-sm-12 mg-btn-6x">
						<div class="shortcode_title title-center title-decoration-bottom-center">
							<h3 class="title_primary">WHY CHOOSE US?</h3><span class="line_after_title"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="wpb_column col-sm-4">
						<div class="widget-icon-box widget-icon-box-base iconbox-center">
							<div class="box-icon icon-image circle">
								<img src="images/home/Map-Marker.png" alt="">
							</div>
							<div class="content-inner">
								<div class="sc-heading article_heading">
									<h3 style="color:#000000" class="heading__primary">Handpicked hotels</h3>
								</div>                              
								<div class="desc-icon-box">
									<div>We carefully select each of our properties from leading brands and boutique properties to ensure you'll always have a great room to come back to after each day of travelling.</div>
								</div>
							</div>
						</div>
					</div>
					<div class="wpb_column col-sm-4">
						<div class="widget-icon-box widget-icon-box-base iconbox-center">
							<div class="box-icon icon-image ">
								<img src="images/home/Worldwide-Location.png" alt="">
							</div>
							<div class="content-inner">
								<div class="sc-heading article_heading">
									<h3 style="color:#000000" class="heading__primary">World Class Tours</h3>
								</div>
								<div class="desc-icon-box">
									<div>Company dedicated to helping you develop a carefree travel experience which will surely influence you and your group for the rest of your lives.</div>
								</div>
							</div>
						</div>
					</div>
					<div class="wpb_column col-sm-4">
						<div class="widget-icon-box widget-icon-box-base iconbox-center">
							<div class="box-icon icon-image ">
								<img src="images/home/Hot-Air-Balloon.png" alt="">
							</div>
							<div class="content-inner">
								<div class="sc-heading article_heading">
									<h3 style="color:#000000" class="heading__primary">Best Price Guarantee</h3>
								</div>
								<div class="desc-icon-box">
									<div>Our pricing is updated constantly to ensure you get the best price available online or at your destination. 100% guaranteed is committed to showing you the 'honest price' on our website.</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                
                <div class="row">
                    <div class="wpb_column col-sm-4">
                        <div class="widget-icon-box widget-icon-box-base iconbox-center">
                            <div class="box-icon icon-image circle">
                                <img src="images/home/allage.png" alt="">
                            </div>
                            <div class="content-inner">
                                <div class="sc-heading article_heading">
                                    <h3 style="color:#000000" class="heading__primary">Packages for all age groups</h3>
                                </div>
                                <div class="desc-icon-box">
                                    <div>Family tour packages guarantee relaxation and activities for the complete family. Right from adults and kids to elderly, family packages include a vast range of sightseeing trips.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wpb_column col-sm-4">
                        <div class="widget-icon-box widget-icon-box-base iconbox-center">
                            <div class="box-icon icon-image ">
                                <img src="images/home/satisfied.png" alt="">
                            </div>
                            <div class="content-inner">
                                <div class="sc-heading article_heading">
                                    <h3 style="color:#000000" class="heading__primary">Expert Tour Leaders</h3>
                                </div>
                                <div class="desc-icon-box">
                                    <div>Our Guides are true specialists- natural enthusiasts, because they are great communicators and friendly hosts.They are there to bring the history and archaeological sites to life.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wpb_column col-sm-4">
                        <div class="widget-icon-box widget-icon-box-base iconbox-center">
                            <div class="box-icon icon-image ">
                                <img src="images/home/customer.png" alt="">
                            </div>
                            <div class="content-inner">
                                <div class="sc-heading article_heading">
                                    <h3 style="color:#000000" class="heading__primary">Customer satisfaction</h3>
                                </div>
                                <div class="desc-icon-box">
                                    <div>Customer satisfaction is our primary goal. Your upmost satisfaction is key to our success. We strive to create a unique experience for each service.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>

			<div class="padding-top-6x padding-bottom-6x bg__shadow section-background" style="background-image:url(assets/bg-pallarax.jpeg)">
				<div class="container">
					<div class="shortcode_title text-white title-center title-decoration-bottom-center">
						<div class="title_subtitle">Some statistics about Trip78</div>
						<h3 class="title_primary">CENTER ACHIEVEMENTS</h3>
						<span class="line_after_title" style="color:#ffffff"></span>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<div class="stats_counter text-center text-white">
								<div class="wrapper-icon">
									<i class="flaticon-airplane"></i>
								</div>
								<div class="stats_counter_number">300</div>
								<div class="stats_counter_title">Customers</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="stats_counter text-center text-white">
								<div class="wrapper-icon">
									<i class="flaticon-island"></i>           
								</div>
								<div class="stats_counter_number">100</div>
								<div class="stats_counter_title">Destinations</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="stats_counter text-center text-white">
								<div class="wrapper-icon">
									<i class="flaticon-globe"></i>
								</div>
								<div class="stats_counter_number">150</div>
								<div class="stats_counter_title">Tours</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="stats_counter text-center text-white">
								<div class="wrapper-icon">
									<i class="flaticon-people"></i>
								</div>
								<div class="stats_counter_number">5</div>
								<div class="stats_counter_title">Tour types</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-center padding-top-6x">
							
						</div>
					</div>
				</div>             
			</div>
         
			<?php include_once("includes/themes.php");?>
            
            
            <!--<div class="section-white padding-top-6x padding-bottom-6x">-->
			<div>
                <!--<div class="container">-->
				<div>
					<div class="row">
						<div class="col-sm-12">
							<div class="shortcode_title title-center title-decoration-bottom-center">
								<h2 class="title_primary">Tours Reviews</h2>
								<span class="line_after_title"></span>
							</div>
							<div class="shortcode-tour-reviews wrapper-tours-slider">
								<div class="tours-type-slider" data-autoplay="true" data-dots="true" data-nav="false" data-responsive='{"0":{"items":1}, "480":{"items":1}, "768":{"items":1}, "992":{"items":1}, "1200":{"items":1}}'>
                                    <?php $reviews = $mysql->select("select * from _tbl_customer_reviews where IsActive='1' order by CustomerReviewID desc");
                                    foreach($reviews as $review) {?>
									<div class="tour-reviews-item">
										<div class="reviews-item-info">
											<img alt="" src="https://www.trip78.in/uploads/customerreview/<?php echo $review['CustomerThumb'];?>" class="avatar avatar-95 photo" height="90" width="90">
											<div class="reviews-item-info-name"><?php echo $review['CustomerName'];?></div>
											<div class="reviews-item-rating">
                                                <?php for($i=1;$i<=$review['CustomerRating'];$i++) {?>
                                                <i class="fa fa-star"></i>
                                                <?php } ?>
											</div>
										</div>
										<div class="reviews-item-content">
											<h3 class="reviews-item-title">
												<a href="javascript:void(0)"><?php echo $review['CustomerSubject'];?></a>
											</h3>
											<div class="reviews-item-description"><?php echo $review['CustomerDescription'];?></div>
										</div>
									</div>
                                    <?php }?>
								</div>
							</div>
						</div>
						 
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include_once("footer.php");?>