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
<?php 
         $Packages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and md5(SubTourTypeID)='".$_GET['tid']."'");
         $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and md5(SubTourTypeID)='".$_GET['tid']."'");
         $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and TourTypeID='".$SubTours[0]['TourTypeID']."'");
   ?>
<nav class="navbar navbar-expand navbar-dark bg-primary" style="padding:3px;color:white"> 
    <a href="index.php" class="navbar-brand">
        <span class="navbar-toggler-icon"></span>
    </a>
    <div style="text-align: center;width: 100%;"><?php echo $SubTours[0]['SubTourTypeName'];?></div>
</nav>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="form-group row">                              
                        <?php/* foreach($Packages as $Package) { ?>
                            <div class="col-sm-12" onclick="location.href='subtours.php?tid=<?php echo md5($SubTour['SubTourTypeID']);?>'" style="cursor: pointer;">
                                <div class="col-sm-4"><img src="../uploads/package/<?php echo $Package['Image1'];?>" alt="" width="100%" /></div>
                                <div class="col-sm-8">
                                    <h3><?php echo $Package['PackageName'];?></h3>
                                    <div style="width: 50px;border-right:1px solid #cccccc;float:left">
                                        <span style="color: #c6c6c6;font-size: 20px;font-weight: bold;"><?php echo $Package['NightsCount'];?></span>                                                             
                                        <p style="color:#cccccc;padding:0px;font-size:10px">Nights</p> <hr style="margin: 0px;">
                                        <span style="color: #c6c6c6;font-size: 20px;font-weight: bold;"><?php echo $Package['CountryCount'];?></span>
                                        <p style="color:#cccccc;padding:0px;font-size:10px">Country</p><hr style="margin: 0px;">                                      
                                        <span style="color: #c6c6c6;font-size: 20px;font-weight: bold;"><?php echo $Package['CityCount'];?></span>
                                        <p style="color:#cccccc;padding:0px;font-size:10px">City</p>
                                    </div>
                                     <div style="padding-top:10px;float:left;height: 60px;">
                                        <p style="color:#cccccc;padding:0px;font-size:12px">Joining  < <span style="color: #3bd73b;font-weight: bold;"><?php echo $Package['JoiningPlace'];?></span></p>
                                        <p style="color:#cccccc;padding:0px;font-size:12px">Leaving  > <span style="color: red;font-weight: bold;"><?php echo $Package['LeavingPlace'];?></span></p>
                                        <hr style="margin: 13px 0 10px;">
                                        <p style="color:#cccccc;padding-left:10px;font-size:12px">All inclusive price | Per Person<br><span style="font-size:16px;font-weight:bold;color:red">Rs <?php echo $Package['PackagePrice'];?>*</span></p>
                                        <br>
                                        <a href="hotel.html" class="gradient-button">Book now</a>
                                    </div>                                                                    
                                </div>
                            </div>
                        <?php }*/ ?>
                        <?php foreach($Packages as $Package) { ?>
                        <div class="card" style="margin-bottom:10px" onclick="location.href='tourpackagedetails.php?tid=<?php echo md5($Package['PackageID']);?>'">
                                <div class="row">
                                    <div class="col-5 col-md-4" style="padding-right:0px">
                                        <img src="https://www.trip78.in/uploads/package/<?php echo $Package['Image1'];?>" alt="" width="100%" style="height: 100%;" />
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <h6><?php echo $Package['PackageName'];?></h6>
                                        <div class="row" style="margin-right:0px">
                                            <div class="col-4 col-md-4" style="float: left;border-right:1px solid #cccccc;border-bottom: 1px solid #ccc;"><span style="color: #c6c6c6;font-size: 15px;font-weight: bold;"><?php echo $Package['NightsCount'];?></span> <p style="color:#626060;;padding:0px;font-size:9px;margin-bottom: 0px;">Nights</p></div>
                                            <div class="col-8 col-md-8" style="padding-left:3px;border-bottom: 1px solid #ccc;">
                                                <p style="color:#626060;;padding:0px;font-size:10px;margin-bottom: 0px;">Joining  < <span style="color: #3bd73b;font-weight: bold;"><?php echo "Alexandria". $Package['JoiningPlace'];?></span></p>
                                                <p style="color:#626060;;padding:0px;font-size:10px;margin-bottom: 0px;">Leaving  > <span style="color: red;font-weight: bold;"><?php echo "Cairo". $Package['LeavingPlace'];?></span></p>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-right:0px">
                                            <div class="col-4 col-md-4" style="float: left;border-right:1px solid #cccccc;">
                                                <span style="color: #c6c6c6;font-size: 15px;font-weight: bold;"><?php echo $Package['CountryCount'];?></span> <p style="color:#626060;;padding:0px;font-size:9px;margin-bottom: 0px;">Country</p>
                                                <hr style="margin-top:0px;margin-bottom:0px">
                                                <span style="color: #c6c6c6;font-size: 15px;font-weight: bold;"><?php echo $Package['CityCount'];?></span> <p style="color:#626060;;padding:0px;font-size:9px;margin-bottom: 0px;">City</p>
                                            </div>
                                            <div class="col-8 col-md-8" style="padding-left:3px">
                                                <p style="color:#626060;;padding-left:10px;font-size:10px;text-align:center;margin-bottom: 0px;">All inclusive price | Per Person<br>
                                                    <span style="font-size:16px;font-weight:bold;color:red">Rs <?php echo $Package['PackagePrice'];?>*</span>
                                                    <br>
                                                    <a href="hotel.html" class="gradient-button">Book now</a>    
                                                </p>    
                                            </div>
                                        </div>
                                    </div>
                                </div>     
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
           /* $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });*/

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