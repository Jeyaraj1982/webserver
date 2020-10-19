<?php include_once("header.php");?>
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
           </div>
		  
    <!--<div class="js_frm_subscribe">
      <div class="kenburns_061_slide slider-content">
         <span class="sp-head">India</span>
       </div>
    </div>-->
    <a class="left carousel-control" href="#js_frm_040" role="button" data-slide="prev"> <span class="fa fa-arrow-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#js_frm_040" role="button" data-slide="next"> <span class="fa fa-arrow-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
</div>

<section class="destinations">
  <div class="container">
  <!--<div class="row">
  <div class="col-md-12"><p>Welcome to a soulful holiday experience in India, the cradle of ancient culture with a rich cultural heritage. Witness the sights and sounds of its incredibly diverse landscape, people, and cultures. Discover natural resources and everlasting human characteristics that cover the country&#39;s aspect with Havishe travel.Â </p>
</div>
  
  </div>-->
    <div class="row">
		<div class="col-md-12">
			<div class="row">
				<?php $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and md5(TourTypeID)='".$_GET['tid']."'");?>
					<?php $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and TourTypeID='".$Tours[0]['TourTypeID']."'");?>
					<?php foreach($SubTours as $SubTour) {?>
						<div class="col-md-4"><a href="tourpackage.php?tid=<?php echo md5($SubTour['SubTourTypeID']);?>">
							<div class="destination-item">
							  <div class="destination-image"> <img src="https://www.trip78.in/uploads/<?php echo $SubTour['Image'];?>" alt="Relishing Rajasthan">
								<div class="destination-overlay"></div>
								<div class="destination-btn">     <!--<span class="btn-blue btn-red">Book Now</span>--> </div>
							  </div>
							  <div class="destination-content">
								<h4 class="mbt-0"><?php echo $SubTour['SubTourTypeName'];?></h4>
							  </div>
							</div></a>
						  </div>
					<?php } ?>
			</div>
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