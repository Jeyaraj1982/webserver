<?php include_once("header.php");?>
<?php $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and md5(TourTypeID)='".$_GET['tid']."'");?>
<?php $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and TourTypeID='".$Tours[0]['TourTypeID']."'");?>
<style>
  .style-1 #js_frm_040 {
    height: 240px !important;
}
  </style>
  
 <div id="home_banner" class="banner-style-1 banner-with-form">
  <div id="js_frm_040" class="carousel slide ps_control_hrbrarrow swipe_x ps_easeOutQuint" data-ride="carousel" data-pause="hover" data-interval="4000" data-duration="2000">
    <div class="carousel-inner" role="listbox">
            <?php $sliders = $mysql->select("select * from _tbl_sliders where IsActive='1'");?>
        <?php foreach($sliders as $slider){ ?>
            <div class="item"> <img src="../../uploads/<?php echo $slider['SliderImage'];?>" alt="India" style="width:100%" /> </div>
        <?php } ?>
    <a class="left carousel-control" href="#js_frm_040" role="button" data-slide="prev"> <span class="fa fa-arrow-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#js_frm_040" role="button" data-slide="next"> <span class="fa fa-arrow-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
</div>
<?php 
         $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and md5(SubTourTypeID)='".$_GET['tid']."'");
         $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and md5(SubTourTypeID)='".$_GET['tid']."'");
         $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and TourTypeID='".$SubTours[0]['TourTypeID']."'");
   ?>
 <div class="breadcrumb-content"> 
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item" aria-current="page"><?php echo $Tours[0]['TourTypeName'];?></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo $SubTours[0]['SubTourTypeName'];?></li>
        </ul>
      </nav>
    </div>
<section class="destinations" style="Padding-top:0px !important">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="index.php" class="btn-blue btn-red btn-style-1" style="margin-top:10px;">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <?php foreach($Packages as $Package) { ?>
            <div class="recent-post clearfix sidebar-item" style="margin-bottom: 15px;">
                <div class="recent-item">
                    <div class="col-md-4 recent-image" style="padding-right: 0px;padding-left: 0px;width:40%;margin-left: -15px;margin-bottom: -15px;margin-top: -15px;margin-right: 10px;">
                        <a href=""><img src="https://www.trip78.in/uploads/package/<?php echo $Package['Image1'];?>" class="img-responsive img-thumbnail" style="height: 136px;max-width: 200% !important;width:140px;padding: 0px;border: none;border-radius:0px"></a>
                    </div>
                    <div class="col-md-8 recent-content" style="width:60%;margin-top: -15px !important;padding-right: 0px;"> 
                        <h3 style="margin-top:0px;margin-bottom:0px;"><a href="tourpackage.php?tid=<?php echo md5($SubTour['SubTourTypeID']);?>" style="font-size: 15px;"><?php echo $Package['PackageName'];?></a></h3>
                        <div class="author-detail">
                            <p><?php echo $Package['NightsCount'];?> Night&nbsp;|&nbsp;<?php echo $Package['CountryCount'];?> Country&nbsp;|&nbsp;<?php echo $Package['CityCount'];?> City</p>                            
                        </div>
                        <a style="padding-left:0px;font-size:15px;font-weight:bold" class="tag tag-blue"><?php echo "Rs. ". number_format($Package['PackagePrice'],2);?></a>
                        <div class="button" style="margin-top:10px">
                            <a href="tourpackage.php?tid=<?php echo md5($SubTour['SubTourTypeID']);?>" class="btn-blue btn-red" style="padding: 0px 10px;" tabindex="-1">View All Packages</a>
                        </div>
                    </div>
                </div>
            </div>
         <?php } ?>
        </div>
    </div>
 </div>                                                                                                                             
 </section>                                                                                                             
<?php include_once("footer.php");?>
<script>
$(document).ready(function () {
  $('.carousel-inner').find('.item').first().addClass('active');
}); 
</script>