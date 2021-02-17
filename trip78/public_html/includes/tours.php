<?php
     $MainTours = $mysql->select("select * from _tbl_tour where IsPublish='1'"); 
     $imageArray=array();
     function addImageToImageArray($image) {
         global $imageArray;
         $imageArray[]=$image;
         return sizeof($imageArray);
     }
?>
<style>
.lnr {color:#222;font-weight:bold;}
</style>
<div>
    <div class="container">
	    <div class="shortcode_title text-white title-center title-decoration-bottom-center">
		    <div class="title_subtitle" style="color:#222">Take a Look at Our</div>
			<h3 class="title_primary" style="color:#222">MOST POPULAR TOURS</h3>
			<span class="line_after_title" style="color:#ffffff"></span>
		</div>
		<?php
            $k=1;
            foreach($MainTours as $MainTour) {
                $MostPopularTourPackages = $mysql->select("select * from _tbl_tours_package where TourTypeID='".$MainTour['TourTypeID']."' and IsPublish='1' order by PackageOrder");
                if (sizeof($MostPopularTourPackages)>0) {
        ?>	
                <div>
                    <h4 style="font-weight:bold;margin-top:30px;"><?php echo $MainTour['TourTypeName'];?></h4>
                </div>     

                <div id="oldsliderid_<?php echo $k;?>">
                    <div class="row">
                        <?php for($q=1;$q<=4;$q++) {?>
                        <div class="col-md-3">
                            <div class="item_border item-product">
                                <div class="post_images">
                                    <div style="text-align:center;background:#ccc">
                                        <img src="assets/prespinner.gif">
                                    </div>
                                </div>
                                <div class="wrapper_content">
                                    <div class="post_title">
                                        <h4 style="height: 50px;line-height: 24px;">&nbsp;&nbsp;Loading...</h4>
                                    </div>
                                    <span  style="margin-bottom:5px;">&nbsp;</span>
                                    <p style="height: 50px;overflow: hidden;font-size: 12px;line-height: 17px;-webkit-line-clamp: 3;-webkit-box-orient: vertical;">&nbsp;</p>
                                </div>
                                <div class="read_more">
                                    <div class="item_rating">               
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>        
                    </div>
                </div>
               
        
        <div class="row wrapper-tours-slider" id="sliderid_<?php echo $k;?>" style="height:0px !important;overflow:hidden;">
			<div class="tours-type-slider list_content" data-dots="true" data-nav="true" data-responsive='{"0":{"items":1}, "480":{"items":2}, "768":{"items":2}, "992":{"items":3}, "1200":{"items":4}}'>
                <?php foreach($MostPopularTourPackages as $TourPackage) {
                    $tourThumb =  $images = $mysql->select("select * from _tbl_tours_package_images where IsDelete='0' and PackageID='".$TourPackage['PackageID']."' order by ImageOrder");
                    ?>
                <div class="item-tour">
					<div class="item_border">
						<div class="item_content">
							<div class="post_images">      
								<a href="tour_information.php?tid=<?php echo md5($TourPackage['PackageID']);?>" class="travel_tour-LoopProduct-link">
									<span class="price">
										<ins><span class="travel_tour-Price-amount amount" style="letter-spacing:0px;">&#8377;&nbsp;<?php echo number_format($TourPackage['PackagePrice']);?></span></ins>
									</span>
                                    <img src="https://www.trip78.in/uploads/package/<?php echo $tourThumb[0]['ImageName'];?>" alt="" title="" id="image_<?php echo addImageToImageArray($tourThumb[0]['ImageName']);?>" style="width:max-content">
								</a>
							</div>
							<div class="wrapper_content">
								<div class="post_title">
                                    <h4 style="height: 50px;line-height: 24px;">
									    <a href="tour_information.php?tid=<?php echo md5($TourPackage['PackageID']);?>" rel="bookmark"><?php echo $TourPackage['PackageName'];?></a>
									</h4>
                                </div>
								<span class="post_date" style="margin-bottom:5px;"><b><?php echo $TourPackage['NightsCount'];?></b> NIGHTS&nbsp;<b><?php echo $TourPackage['DaysCount'];?></b> DAYS </span>
								<p style="height: 50px;overflow: hidden;font-size: 12px;line-height: 17px;-webkit-line-clamp: 3;-webkit-box-orient: vertical;"><?php echo $TourPackage['ShortDescription'];?></p>
							</div>
						</div>
						<div class="read_more">
							<div class="item_rating">
                                <?php for($i=1;$i<=$TourPackage['PackageRating'];$i++) {?>
								<i class="fa fa-star"></i>
                                <?php } ?>
							</div>
							<a href="tour_information.php?tid=<?php echo md5($TourPackage['PackageID']);?>" class="read_more_button">
                                VIEW MORE <i class="fa fa-long-arrow-right"></i>
                            </a>
							<div class="clear"></div>
						</div>
					</div>
				</div>
                <?php } ?>
            </div>
		</div>
        <?php   $k++; } 
            } ?>
	</div>
</div>
 <script>
 setTimeout(function(){
     <?php for($j=1;$j<=$k;$j++) {?>
          document.getElementById('oldsliderid_<?php echo $j;?>').style.display ="none"; 
          document.getElementById('sliderid_<?php echo $j;?>').style.height="auto"; 
          document.getElementById('sliderid_<?php echo $j;?>').style.overflow=""; 
     <?php } ?>
 },2000);
 </script>