<?php $page = "subtour"; ?>
<?php 
    include_once("header.php");
    $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and TourTypeID='".$_GET['tours']."'");
    $SubToursType = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and TourTypeID='".$Tours[0]['TourTypeID']."'");
    $ToursTypes = $mysql->select("select * from _tbl_tour where IsPublish='1'"); 
?>
    <div class="site wrapper-content">
	    <div class="top_site_main" style="background-image:url(images/banner/top-heading.jpg);">
		    <div class="banner-wrapper container article_heading">
			    <div class="breadcrumbs-wrapper">
				    <ul class="phys-breadcrumb">
					    <li><a href="index.php" class="home">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page"><a href="subtours.php?tours=<?php echo $Tours[0]['TourTypeID'];?>"><?php echo $Tours[0]['TourTypeName'];?></a></li>
					</ul>
				</div>
				<h1 class="heading_primary">Tours</h1>
            </div>
		</div>
		<section class="content-area">
		    <div class="container">
			    <div class="row">
				    <div class="site-main col-sm-9 alignright" style="border-left:1px solid #ccc">
						 <div class="breadcrumbs-wrapper">
                            <ul class="phys-breadcrumb" style="font-weight:bold;">
                                <li class="breadcrumb-item active" aria-current="page"><a href="subtours.php?tours=<?php echo $Tours[0]['TourTypeID'];?>" style="font-size:24px !important;color:#0081c8"><?php echo $Tours[0]['TourTypeName'];?></a></li>
                            </ul>
                         </div>
                         <ul class="tours products wrapper-tours-slider">
                            <?php foreach($SubToursType as $SubTour) {?>
							<li class="item-tour col-md-4 col-sm-6 product">
								<div class="item_border item-product">
									<div class="post_images">
										<a href="viewpackages.php?subtour=<?php echo $SubTour['SubTourTypeID'];?>">
											<img width="430" height="305" src="https://www.trip78.in/uploads/<?php echo $SubTour['Image'];?>" alt="Discover Brazil" title="Discover Brazil">
										</a>
									</div>
									<div class="wrapper_content">
										<div class="post_title">
                                            <h4><a href="viewpackages.php?subtour=<?php echo $SubTour['SubTourTypeID'];?>" rel="bookmark"><?php echo $SubTour['SubTourTypeName'];?></a></h4>
                                        </div>                  
									    <p style="text-align:left;">Available Packages: <?php echo sizeof($mysql->select("select * from _tbl_tours_package where IsPublish='1' and SubTourTypeID='".$SubTour['SubTourTypeID']."'")); ?></p>
									</div>                          
								</div>
							</li>
							<?php } ?> 
						</ul>
					</div>
					<div class="widget-area align-left col-sm-3" style="border-right:1px solid #ccc">
                        <ul class="sub-menu" style="line-height:40px;font-size:18px;list-style:none">
                            <?php foreach($ToursTypes as $ToursType) { ?>
                                <li><a href="subtours.php?tours=<?php echo $ToursType['TourTypeID'];?>" style="<?php echo $ToursType['TourTypeID']==$_GET['tours'] ? 'color:#0081c8;font-weight:bold': '';?>"><?php echo $ToursType['TourTypeName'];?></a></li>
                            <?php } ?>
                        </ul>    
                    </div>
				</div>
			</div>
		</section>
	</div>
<?php include_once("footer.php");?>