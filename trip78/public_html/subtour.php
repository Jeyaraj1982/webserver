<?php include_once("header.php");?>
<?php 
    $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and md5(TourTypeID)='".$_GET['tid']."'");
    $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and md5(TourTypeID)='".$_GET['tid']."'");
?>
    <style>
    .box-container {
    padding: 10px;
    background: #fff;
    position: relative;
    margin: 10px 0;
}
.shadow {                                                                                         
    -webkit-box-shadow: 0 5px 16px rgba(0,0,0,.18);
    box-shadow: 0 5px 16px rgba(0,0,0,.18);
}
    box-container--academy__titile, .tour-block-title {
    border-bottom: 1px solid rgba(0,0,0,.1);
    padding-bottom: 8px;
    margin-top: 0;
}

</style>
	<main class="main">
		<div class="wrap">
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="index.php" title="Home">Home</a></li>
                    <li><a title="Travel guides"><?php echo $Tours[0]['TourTypeName'];?></a></li>
                </ul>
            </nav>
			<div class="row">
				<div class="full-width">
                    <div class="box-container shadow ng-scope" ng-if="gitInternationalLoaded" style="padding:0px 25px !important;">
                        <h2 class="tour-block-title"><?php echo $Tours[0]['TourTypeName'];?></h2>
                        <div class="owl-stage-outer" style="clear: both;">
                            <div class="row">   
                                <?php foreach($SubTours as $SubTour){?>
                                <article class="one-fourth">
                                    <div style="border:1px solid #ccc">
                                        <figure><a href="tourpackages.php?tid=<?php echo md5($SubTour['SubTourTypeID']);?>" title=""><img src="uploads/<?php echo $SubTour['Image'];?>" alt="" style="width: 100%;height: 150px;"></a></figure>
                                        <div class="details">
                                           <div class="form-group row">
                                                <div class="col-sm-12" style="padding-left:5px">
                                                    <h4 style="margin-top:0px;;text-align:left;margin-bottom: -23px;"><?php echo $SubTour['SubTourTypeName'];?><?php if(strlen($SubTour['PriceStartingFrom'])>0) { ?><br><span style="color: red;font-size:13px;font-weight:400">Starting From INR <?php echo number_format($SubTour['PriceStartingFrom']);?></span><?php }?></h4>
                                                </div>
                                                                                                                                                                                                                                              
                                           </div>
                                           <div class="row">
                                            <div class="col-sm-12" style="padding-right:5px;text-align:right">
                                                <a href="tourpackages.php?tid=<?php echo md5($SubTour['SubTourTypeID']);?>" title="View all" class="gradient-button" style="font-size: 12px;padding: 5px 12px !important;line-height: 12px !important;height: -moz-max-content;border-radius: 0px !important;">View Packages</a>
                                            </div>
                                           </div>
                                         </div>                                       
                                    </div>                                                                                
                                </article>
                               <?php } ?>
                            </div>                                                                                        
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</main>                                                                          
	<?php include_once("footer.php");?>