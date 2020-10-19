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
 <div class="breadcrumb-content"> 
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Destinations by Themes</li>
        </ul>
      </nav>
    </div>
<div class="container">
    <div class="row">
        <div class="col-md-12 thumbWidget">
        <h2 style="font-size:13px;margin-bottom:0px;">Destinations by Themes </h2>
       <div class="scrollmenu">
        
           <a href=""> <div style="font-size:12px;color:#888;text-align:left;line-height:15px">
             <img src="https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/honeymoon_romantic.png?tr=w-148,h-187" style="width:90px"><br>
             <b>Honeymoon</b><br>
             <span style="font-size:11px">70+ desinations</span>
            </div></a>
            
           <a href=""> <div style="font-size:12px;color:#888;text-align:left;line-height:15px">
             <img src="https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/family.png?tr=w-148,h-187" style="width:90px"><br>
             <b>Family</b><br>
             <span style="font-size:11px">70+ desinations</span>
            </div>  </a>
            
             <a href=""><div style="font-size:12px;color:#888;text-align:left;line-height:15px">
             <img src="https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/friends_group.png?tr=w-148,h-187" style="width:90px"><br>
             <b>Friends/Group</b><br>
             <span style="font-size:11px">70+ desinations</span>
            </div>  </a>
            
             <a href=""><div style="font-size:12px;color:#888;text-align:left;">
             <img src="https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/solo.png?tr=w-148,h-187" style="width:90px"><br>
             <b>Solo</b><br>
             <span style="font-size:11px">70+ desinations</span>
            </div>  </a>
            
              <a href=""><div style="font-size:12px;color:#888;text-align:left;line-height:15px">
             <img src="https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/adventure.png?tr=w-148,h-187" style="width:90px"><br>
             <b>Adventure</b><br>
             <span style="font-size:11px">70+ desinations</span>
            </div> </a>                                                                 
            
            <a href=""><div style="font-size:12px;color:#888;text-align:left;line-height:15px">
             <img src="https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/nature.png?tr=w-148,h-187" style="width:90px"><br>
             <b>Nature</b><br>
             <span style="font-size:11px">70+ desinations</span>
            </div>    </a>
            
              <a href=""><div style="font-size:12px;color:#888;text-align:left;line-height:15px">
             <img src="https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/religious.png?tr=w-148,h-187" style="width:90px"><br>
             <b>Religious</b><br>
             <span style="font-size:11px">70+ desinations</span>
            </div>   </a>
            
            <a href=""><div style="font-size:12px;color:#888;text-align:left;line-height:15px">
             <img src="https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/wildlife.png?tr=w-148,h-187" style="width:90px"><br>
             <b>Wildlife</b><br>
             <span style="font-size:11px">70+ desinations</span>
            </div>   </a>
            
            <a href=""><div style="font-size:12px;color:#888;text-align:left;line-height:15px">
             <img src="https://img.traveltriangle.com/public-product/homepage_illustrations/Square/2x/water+activities.png?tr=w-148,h-187" style="width:90px"><br>
             <b>Water Activities</b><br>
             <span style="font-size:11px">70+ desinations</span>
            </div>   </a>
            
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