<?php include_once("../config.php");?>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<style>
.nav {
    padding-right: 0;
}
#page-content-wrapper {
  width: 100%;
  position: absolute;
  padding: 15px;
}
</style>   
<?php $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and md5(TourTypeID)='".$_GET['tid']."'");?>
<?php $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and md5(TourTypeID)='".$_GET['tid']."'");?>
<nav class="navbar navbar-expand navbar-dark bg-primary" style="padding:3px;color:white"> 
    <a href="index.php" class="navbar-brand">
        <span class="navbar-toggler-icon"></span>
    </a>
    <div style="text-align: center;width: 100%;"><?php echo $Tours[0]['TourTypeName'];?></div>
</nav>
<nav class="navbar navbar-expand navbar-dark" style="height: 40px;;overflow:auto;background:#d4d4d4 !important;color:black;">
    <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
            <?php $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1'");?>
                <?php foreach($Tours as $Tour){?>
                    <li class="nav-item active" style="padding: 7px;width:160px"> <a class="nav-link" href="subtour.php?tid=<?php echo md5($Tour['TourTypeID']);?>" style="color: #4a4a4a;text-transform:uppercase;font-size: 14px;"><?php echo $Tour['TourTypeName'];?></a> </li>
                <?php } ?>
        </ul>
    </div>
</nav>

            <div id="page-content-wrapper" style="padding:8px">
                <div class="container-fluid">
                    <div class="row">
                        <?php foreach($SubTours as $SubTour) {?>
                            <div class="col-6" onclick="location.href='tourpackage.php?tid=<?php echo md5($SubTour['SubTourTypeID']);?>'" style="cursor: pointer;padding-right:4px;padding-left:4px;padding-bottom: 7px;">
                                <div style="position: absolute;color: white;bottom: 10;text-align: center;margin: 0px auto;width: -moz-available;font-weight:bold;font-size:14px"><?php echo $SubTour['SubTourTypeName'];?></div>
                                <img src="https://www.trip78.in/uploads/<?php echo $SubTour['Image'];?>" style="width: 100%;height: 120px;border-radius:5px">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div> 
   <!--<div class="container">  
  <!--<h2>Carousel Example</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">

      <div class="item active">
        <img src="la.jpg" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          <h3>Los Angeles</h3>
          <p>LA is always so much fun!</p>
        </div>
      </div>

      <div class="item">
        <img src="chicago.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago!</p>
        </div>
      </div>
    
      <div class="item">
        <img src="ny.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h3>New York</h3>
          <p>We love the Big Apple!</p>
        </div>
      </div>
  
    </div>

    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
    
    
 </div> --> 
</body>
 <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script> <!-- Menu Toggle Script -->
        <script>
          $(function(){
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

            $(window).resize(function(e) {
              if($(window).width()<=768){
                $("#wrapper").removeClass("toggled");
              }else{
                $("#wrapper").addClass("toggled");
              }
            });
          });
           
        </script>
</html>