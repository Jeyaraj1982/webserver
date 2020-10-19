<?php include_once("../config.php");?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Swipeable Tabs - Materialize CSS</title>
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css'>
  <link rel="stylesheet" href="css/style.css">    
  
<style>
.carousel .carousel-item{
  width:100%;
}    
</style>
<style>
.nav {
    padding-right: 0;
}
.carousel{
    height: 90vh !important;
overflow: auto;
}
#page-content-wrapper {
  width: 100%;
  position: absolute;
  padding: 15px;
}
</style>  
</head>
<body>   

<?php $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and md5(TourTypeID)='".$_GET['tid']."'");?>                                  
  <ul id="tabs-swipe-demo" class="tabs">
  <?php 
        $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1'");
        foreach($Tours as $Tour){      
  ?>
    <li class="tab col s3"><a href="#swipe-<?php echo $Tour['TourTypeID'];?>"><?php echo $Tour['TourTypeName'];?></a></li>
  <?php } ?>
  </ul>
  <div id="page-content-wrapper" style="padding:8px">
        <div class="container-fluid">
        <?php foreach($Tours as $Tour){      ?>
        <div id="swipe-<?php echo $Tour['TourTypeID'];?>">
            <div class="row">
            <?php $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and TourTypeID='".$Tour['TourTypeID']."'");?>
                  <?php foreach($SubTours as $SubTour) {?>
                    <div class="col-6" onclick="location.href='tourpackage.php?tid=<?php echo md5($SubTour['SubTourTypeID']);?>'" style="cursor: pointer;padding-right:4px;padding-left:4px;padding-bottom: 7px;width:50%;float:left">
                        <div style="position: absolute;color: white;bottom: 10;text-align: center;margin: 0px auto;font-weight:bold;font-size:14px"><?php echo $SubTour['SubTourTypeName'];?></div>
                        <img src="https://www.trip78.in/uploads/<?php echo $SubTour['Image'];?>" style="width: 100%;height: 120px;border-radius:5px">
                    </div>
                  <?php } ?>
            </div>
        </div>
        <?php } ?>
        </div>
    </div>  
  
  
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js'></script>
<script  src="js/index.js"></script>
 
<script>$(document).ready(function(){
    $('ul.tabs').tabs({
      swipeable : true,
      responsiveThreshold : 1920
    });
  });</script>
  </body>

</html>
