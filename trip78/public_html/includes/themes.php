<?php
$MostPopularTourPackages=array();
    $MostPopularTourPackages[] = array("TourThemeID"=>1,"PackageName"=>"Honeymoon","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/honeymoon_romantic.png?tr=w-365,h-260");
    $MostPopularTourPackages[] = array("TourThemeID"=>2,"PackageName"=>"Family","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/family.png?tr=w-365,h-260");
    $MostPopularTourPackages[] = array("TourThemeID"=>3,"PackageName"=>"Friends/Group","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/friends_group.png?tr=w-365,h-260");
    
    
    $MostPopularTourPackages[] = array("TourThemeID"=>4,"PackageName"=>"Solo","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/solo.png?tr=w-365,h-260");
    $MostPopularTourPackages[] = array("TourThemeID"=>5,"PackageName"=>"Adventure","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/adventure.png?tr=w-365,h-260");
    
    $MostPopularTourPackages[] = array("TourThemeID"=>6,"PackageName"=>"Nature","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/nature.png?tr=w-365,h-260");
    $MostPopularTourPackages[] = array("TourThemeID"=>7,"PackageName"=>"Religious","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/religious.png?tr=w-365,h-260");
    
    $MostPopularTourPackages[] = array("TourThemeID"=>7,"PackageName"=>"Wildlife","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/wildlife.png?tr=w-365,h-260");
    $MostPopularTourPackages[] = array("TourThemeID"=>7,"PackageName"=>"Water Activities","Image1"=>"https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/water+activities.png?tr=w-365,h-260");
?>
<div style="padding-top:50px">
    <div class="container">
        <div class="shortcode_title text-white title-center title-decoration-bottom-center">
            <div class="title_subtitle" style="color:#222">Take a Look at Our</div>
            <h3 class="title_primary" style="color:#222">MOST POPULAR PACKAGES</h3>
            <span class="line_after_title" style="color:#ffffff"></span>
        </div>
        <div class="row wrapper-tours-slider">
            <div class="tours-type-slider list_content" data-dots="true" data-nav="true" data-responsive='{"0":{"items":1}, "480":{"items":2}, "768":{"items":2}, "992":{"items":3}, "1200":{"items":4}}'>
                <?php foreach($MostPopularTourPackages as $TourPackage) {?>
                <div class="item-tour">
                    <div class="item_border">
                        <div class="item_content">
                            <div class="post_images">
                                <a href="viewthemepackages.php?theme=<?php echo $TourPackage['TourThemeID'];?>" class="travel_tour-LoopProduct-link">
                                    <img src="<?php echo $TourPackage['Image1'];?>" alt="" title="" style="width:max-content;width:365px">
                                </a>
                            </div>
                            <div class="wrapper_content">
                                <div class="post_title">
                                    <h4 style="">
                                        <a href="viewthemepackages.php?theme=<?php echo $TourPackage['TourThemeID'];?>" rel="bookmark"><?php echo (($TourPackage['PackageName']));?></a>
                                    </h4>
                                    <p><?php echo sizeof($mysql->select("select * from _tbl_tours_package where IsPublish='1' and TourThemeID='".$TourPackage['TourThemeID']."'"));?> Destinations</p>
                                </div>
                            </div>
                        </div>
                        <div class="read_more">
                            <a href="viewthemepackages.php?theme=<?php echo $TourPackage['TourThemeID'];?>" class="read_more_button">
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
