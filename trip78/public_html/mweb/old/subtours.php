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
    height: 80vh !important;
overflow: auto;
}
#page-content-wrapper {
  width: 100%;
  position: absolute;
  padding: 15px;
}
</style>  
<style>
 
.nav {
    padding-right: 0;
}



    .nav-tabs .nav-item + .nav-item {
        margin-right: 0.2rem;
    }



    .nav-pills .nav-item + .nav-item {
        margin-right: 0.2rem;
    }

.nav-stacked .nav-item + .nav-item {
    margin-right: 0;
}







.navbar-nav .nav-link + .nav-link {
    margin-right: 1rem;
}

.navbar-nav .nav-item + .nav-item {
    margin-right: 1rem;
}

@media (max-width: 543px) {
    .navbar-toggleable .navbar-nav .nav-item {
        margin-right: 0;
    }
}

@media (max-width: 767px) {
    .navbar-toggleable-sm .navbar-nav .nav-item {
        margin-right: 0;
    }
}

@media (max-width: 991px) {
    .navbar-toggleable-md .navbar-nav .nav-item {
        margin-right: 0;
    }
}



#wrapper {
  padding-left: 0;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

#wrapper.toggled {
  padding-left: 250px;
}

#sidebar-wrapper {
  z-index: 1000;
  position: fixed;
  left: 250px;
  width: 0;
  height: 100%;
  margin-left: -250px;
  overflow-y: auto;
 // background:white;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
  
  border-top-right-radius: 10px;
  background:white;
  box-shadow: 3px 3px 13px #666;
  -moz-box-shadow: 3px 3px 13px #666;
  -webkit-box-shadow: 3px 3px 13px #666;
}

#wrapper.toggled #sidebar-wrapper {
  width: 250px;
}

#page-content-wrapper {
  width: 100%;
  position: absolute;
  padding: 15px;
}

#wrapper.toggled #page-content-wrapper {
  position: absolute;
  margin-right: 0px;
}


/* Sidebar Styles */

.sidebar-nav {
  position: absolute;
  top: 0;
  width: 250px;
  margin: 0;
  padding: 0;
  list-style: none;
}

.sidebar-nav li {
  text-indent: 20px;
  line-height: 40px;
}

.sidebar-nav li a {
  display: block;
  text-decoration: none;
  color: #007bff;
}

.sidebar-nav li :hover {
  text-decoration: none;
  color: #fff;
 /*background: rgba(255, 255, 255, 0.2);*/
 background:#5aaaff;;
}


@media(min-width:768px) {
  #wrapper {
    padding-left: 0;
  }
  #wrapper.toggled {
    padding-right: 250px;
  }
  #sidebar-wrapper {
    width: 0;
  }
  #wrapper.toggled #sidebar-wrapper {
    width: 250px;
  }
  #page-content-wrapper {
    padding: 20px;
    position: relative;
  }
  #wrapper.toggled #page-content-wrapper {
    position: relative;
    margin-right: 0;
  }
}

</style> 
</head>
<body>   
 <nav class="navbar navbar-expand navbar-dark bg-primary"> 
    <a href="#menu-toggle" id="menu-toggle" class="navbar-brand" style="color: white;">
        <span class="navbar-toggler-icon" style="font-size:12px;"></span>
    </a> 
    <span style="color: white;font-weight:bold">trip<span>78</span></span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            
        </nav>
        <div id="wrapper" class="toggled">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li> <a href="#">Dashboard</a> </li>
                    <li> <a href="#">Shortcuts</a> </li>
                    <li> <a href="#">Overview</a> </li>
                    <li> <a href="#">Events</a> </li>
                    <li> <a href="#">About</a> </li>
                    <li> <a href="#">Services</a> </li>
                    <li> <a href="#">Contact</a> </li>
                </ul>
            </div>  
        </div>
<?php $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and md5(TourTypeID)='".$_GET['tid']."'");?>                                  
  <ul id="tabs-swipe-demo" class="tabs">
  <?php 
        $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1'");
        foreach($Tours as $Tour){      
  ?>
    <li class="tab col s3" id="li<?php echo $Tour['TourTypeID'];?>"><a id="m<?php echo $Tour['TourTypeID'];?>" href="#swipe-<?php echo $Tour['TourTypeID'];?>"><?php echo $Tour['TourTypeName'];?></a></li>
  <?php } ?>
  </ul>
  <div id="page-content-wrapper" style="padding:8px">
        <div class="container-fluid">
        <?php foreach($Tours as $Tour){      ?>
        <div id="swipe-<?php echo $Tour['TourTypeID'];?>">
            <div class="row">
            <?php $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and TourTypeID='".$Tour['TourTypeID']."'");?>
                  <?php foreach($SubTours as $SubTour) {?>
                    <div class="col-6" onclick="location.href='tourpackage.php?tid=<?php echo md5($SubTour['SubTourTypeID']);?>'" style="cursor: pointer;padding-right:4px;padding-left:4px;padding-bottom: 7px;width:50%;float:left;overflow: auto;">
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
    $('#m<?php echo $_GET['tid'];?>').trigger("click");
  });</script>
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
        $(document).ready( function(){
           $("#sidebar-wrapper").hide(); 
            
        }); 
        $(document).ready(function () {
  $('#carouselExampleIndicators').find('.carousel-item').first().addClass('active');
}); 
        </script>
  </body>

</html>
