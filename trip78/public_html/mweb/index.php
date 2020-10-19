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
            <div class="item"> <img src="https://www.trip78.in/uploads/<?php echo $slider['SliderImage'];?>" alt="India" style="width:100%"/> </div>
        <?php } ?>
           </div>
		  
     
    <a class="left carousel-control" href="#js_frm_040" role="button" data-slide="prev"> <span class="fa fa-arrow-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#js_frm_040" role="button" data-slide="next"> <span class="fa fa-arrow-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
</div>


       <style>
       div.scrollmenu {
  
  overflow: auto;
  white-space: nowrap;
}

div.scrollmenu a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 3px;
  text-decoration: none;
}

div.scrollmenu a:hover {
  background-color: #777;
}
.thumbWidget { border:0px solid #333;margin:10px;margin-left:0px;margin-right:0px;padding-left:8px;padding-right:15px;}
.budgetTour {padding:10px 20px;border:1px solid green;border-radius: 50px;color: green;margin-right: 10px;margin-bottom: 10px;}
.budgetTour:hover{background:green;color:#fff}

.SeasonTour {padding:10px 20px;border:1px solid #d62a94;border-radius: 50px;color: #d62a94;margin-right: 10px;margin-bottom: 10px;}
.SeasonTour:hover{background:#d62a94;color:#fff}
       </style>

 <div class="container">
    <div class="row">
        <div class="col-md-12 thumbWidget">
        <h2 style="font-size:13px;margin-bottom:0px;">Destinations by Themes
        <a href="DestinationByThemes.php" style="float:right;color:#5290dd">View All</a>
        </h2>
       <div class="scrollmenu">
           <?php $Honey=$mysql->select("select * from _tbl_tours_package where IsPublish='1' and TourThemeID='1'"); ?>
           <a href="tourpackagebythemes.php?tid=<?php echo md5($Honey[0]['TourThemeID']);?>"> <div style="font-size:12px;color:#888;text-align:left;line-height:15px">
             <img src="https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/honeymoon_romantic.png?tr=w-148,h-187" style="width:90px"><br>
             <b>Honeymoon</b><br>
             <span style="font-size:11px"><?php echo sizeof($Honey);?>&nbsp;Destination</span>
            </div></a>
           <?php $Family=$mysql->select("select * from _tbl_tours_package where IsPublish='1' and TourThemeID='2'"); ?> 
           <a href="tourpackagebythemes.php?tid=<?php echo md5($Family[0]['TourThemeID']);?>"> <div style="font-size:12px;color:#888;text-align:left;line-height:15px">
             <img src="https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/family.png?tr=w-148,h-187" style="width:90px"><br>
             <b>Family</b><br>
             <span style="font-size:11px"><?php echo sizeof($Family);?>&nbsp;Destination</span>
            </div>  </a>
             <?php $Friends=$mysql->select("select * from _tbl_tours_package where IsPublish='1' and TourThemeID='3'"); ?> 
             <a href="tourpackagebythemes.php?tid=<?php echo md5($Friends[0]['TourThemeID']);?>"><div style="font-size:12px;color:#888;text-align:left;line-height:15px">
             <img src="https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/friends_group.png?tr=w-148,h-187" style="width:90px"><br>
             <b>Friends/Group</b><br>
             <span style="font-size:11px"><?php echo sizeof($Friends);?>&nbsp;Destination</span>
            </div>  </a>
              <?php $Solo=$mysql->select("select * from _tbl_tours_package where IsPublish='1' and TourThemeID='4'"); ?> 
             <a href="tourpackagebythemes.php?tid=<?php echo md5($Solo[0]['TourThemeID']);?>"><div style="font-size:12px;color:#888;text-align:left;">
             <img src="https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/solo.png?tr=w-148,h-187" style="width:90px"><br>
             <b>Solo</b><br>
             <span style="font-size:11px"><?php echo sizeof($Solo);?>&nbsp;Destination</span>
            </div>  </a>
              <?php $Adventure=$mysql->select("select * from _tbl_tours_package where IsPublish='1' and TourThemeID='5'"); ?> 
              <a href="tourpackagebythemes.php?tid=<?php echo md5($Adventure[0]['TourThemeID']);?>"><div style="font-size:12px;color:#888;text-align:left;line-height:15px">
             <img src="https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/adventure.png?tr=w-148,h-187" style="width:90px"><br>
             <b>Adventure</b><br>
             <span style="font-size:11px"><?php echo sizeof($Adventure);?>&nbsp;Destination</span>
            </div> </a>                                                                 
              <?php $Nature=$mysql->select("select * from _tbl_tours_package where IsPublish='1' and TourThemeID='6'"); ?> 
            <a href="tourpackagebythemes.php?tid=<?php echo md5($$NatureSolo[0]['TourThemeID']);?>"><div style="font-size:12px;color:#888;text-align:left;line-height:15px">
             <img src="https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/nature.png?tr=w-148,h-187" style="width:90px"><br>
             <b>Nature</b><br>
             <span style="font-size:11px"><?php echo sizeof($Nature);?>&nbsp;Destination</span>
            </div>    </a>
              <?php $Religious=$mysql->select("select * from _tbl_tours_package where IsPublish='1' and TourThemeID='7'"); ?> 
              <a href="tourpackagebythemes.php?tid=<?php echo md5($Religious[0]['TourThemeID']);?>"><div style="font-size:12px;color:#888;text-align:left;line-height:15px">
             <img src="https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/religious.png?tr=w-148,h-187" style="width:90px"><br>
             <b>Religious</b><br>
             <span style="font-size:11px"><?php echo sizeof($Religious);?>&nbsp;Destination</span>
            </div>   </a>
             <?php $Wildlife=$mysql->select("select * from _tbl_tours_package where IsPublish='1' and TourThemeID='8'"); ?> 
            <a href="tourpackagebythemes.php?tid=<?php echo md5($Wildlife[0]['TourThemeID']);?>"><div style="font-size:12px;color:#888;text-align:left;line-height:15px">
             <img src="https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/wildlife.png?tr=w-148,h-187" style="width:90px"><br>
             <b>Wildlife</b><br>
             <span style="font-size:11px"><?php echo sizeof($Wildlife);?>&nbsp;Destination</span>
            </div>   </a>
              <?php $Water=$mysql->select("select * from _tbl_tours_package where IsPublish='1' and TourThemeID='9'"); ?> 
            <a href="tourpackagebythemes.php?tid=<?php echo md5($Water[0]['TourThemeID']);?>"><div style="font-size:12px;color:#888;text-align:left;line-height:15px">
             <img src="https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/water+activities.png?tr=w-148,h-187" style="width:90px"><br>
             <b>Water Activities</b><br>
             <span style="font-size:11px"><?php echo sizeof($Water);?>&nbsp;Destination</span>
            </div>   </a>
            
            </div>
            
        </div>
    </div>
 </div>
 
 
 <div class="container">
    <div class="row">
        <div class="col-md-12 thumbWidget">
        <h2 style="font-size:13px;margin-bottom:0px;">International Tours
        <a href="InternationalTours.php" style="float:right;color:#5290dd">View All</a>
        </h2>
       <div class="scrollmenu">
           <?php $Tours = $mysql->select("select * from _tbl_sub_tour where TourTypeID='1' and IsPublish='1'");?>
                    <?php foreach($Tours as $Tour) {?>
           <a href="tourpackage.php?tid=<?php echo md5($Tour['SubTourTypeID']);?>"> <div style="font-size:12px;color:#888;text-align:left;line-height:15px">
             <img src="https://www.trip78.in/uploads/<?php echo $Tour['Image'];?>" style="width:90px;height:113px"><br>
             <b><?php echo $Tour['SubTourTypeName'];?></b><br>
             <span style="font-size:11px"><?php echo sizeof($mysql->select("select * from _tbl_tours_package where IsPublish='1' and SubTourTypeID='".$Tour['SubTourTypeID']."'"));?>&nbsp;Destination</span>
            </div></a>
            
            <?php } ?>
            
            </div>
            
        </div>
    </div>
 </div>
 
  <div class="container">
    <div class="row">
        <div class="col-md-12 thumbWidget">
        <h2 style="font-size:13px;margin-bottom:0px;">Indian Tours
        <a href="IndianTours.php" style="float:right;color:#5290dd">View All</a>
        </h2>
       <div class="scrollmenu">
           <?php $Tours = $mysql->select("select * from _tbl_sub_tour where TourTypeID='6' and IsPublish='1'");?>
                    <?php foreach($Tours as $Tour) {?>
           <a href="tourpackage.php?tid=<?php echo md5($Tour['SubTourTypeID']);?>"> <div style="font-size:12px;color:#888;text-align:left;line-height:15px">
             <img src="https://www.trip78.in/uploads/<?php echo $Tour['Image'];?>" style="width:90px;height:113px"><br>
             <b><?php echo $Tour['SubTourTypeName'];?></b><br>
            </div></a>
            
            <?php } ?>
            
            </div>
            
        </div>
    </div>
 </div>
  
  <div class="container">
    <div class="row">
        <div class="col-md-12 thumbWidget">
        <h2 style="font-size:13px;margin-bottom:0px;">Budget Packages</h2>
       <div style="text-align:center;line-height:50px;">         
        <a class="budgetTour" href="tourpackagebudjetwise.php?fr=0&to=10000">Lessthan 10000</a>
        <a class="budgetTour" href="tourpackagebudjetwise.php?fr=10000&to=20000">10000 to 20000</a>
        <a class="budgetTour" href="tourpackagebudjetwise.php?fr=20000&to=40000">20000 to 40000</a>
        <a class="budgetTour" href="tourpackagebudjetwise.php?fr=40000&to=60000">40000 to 60000</a>
        <a class="budgetTour" href="tourpackagebudjetwise.php?fr=60000&to=80000">60000 to 80000</a>
        <a class="budgetTour" href="tourpackagebudjetwise.php?fr=80000&to=above">80000 and more</a>
        
            
            </div>
            
        </div>
    </div>
 </div>
 
  <div class="container">
    <div class="row">
        <div class="col-md-12 thumbWidget">
        <h2 style="font-size:13px;margin-bottom:0px;">Season Packages</h2>
       <div style="text-align:center;line-height:50px;">         
        <a class="SeasonTour" href="">Jan-Feb-Mar</a>
        <a class="SeasonTour" href="">Apr-May-Jun</a><br>
        <a class="SeasonTour" href="">Jly-Aug-Sep</a>
        <a class="SeasonTour" href="">Oct-Nov-Dec</a>
            </div>
        </div>
    </div>
 </div>
 
<?php include_once("footer.php");?>
<script>
$(document).ready(function () {
  $('.carousel-inner').find('.item').first().addClass('active');
}); 
</script>