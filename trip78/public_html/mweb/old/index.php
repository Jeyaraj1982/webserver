<?php include_once("../config.php");?>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
</head>
<body>
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
<nav class="navbar navbar-expand navbar-dark bg-primary"> 
    <a href="#menu-toggle" id="menu-toggle" class="navbar-brand" style="color: white;">
        <span class="navbar-toggler-icon" style="font-size:12px;"></span>
    </a> 
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarsExample02">
                <ul class="navbar-nav mr-auto" style="padding-top: 3px;">
                    <li class="nav-item active" style="color: white;font-weight:bold">trip<span>78</span></li>
                </ul>
            </div>
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
        <div class="row" style="margin-right:0px;margin-left:0px">
                        <div class="col-12" style="padding-left: 0px;padding-right: 0px;">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                              </ol>
                              <div class="carousel-inner">     
                              <?php $sliders = $mysql->select("select * from _tbl_sliders where IsActive='1'");?>
                              <?php foreach($sliders as $slider){ ?>
                                <div class="carousel-item">
                                  <img class="d-block w-100" src="https://www.trip78.in/uploads/<?php echo $slider['SliderImage'];?>" alt="First slide" style="height: 140px;">
                                </div>  
                               <?php } ?>  
                              </div>
                              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                        </div>
                    </div>
            <div id="page-content-wrapper" style="padding:8px;padding-left:5px;padding-right:5px">
                <div class="container-fluid" style="padding-right:0px;padding-left:0px">
                    
                    <div class="row" style="margin-left:0px; margin-right:0px">
                        <?php $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1'");?>
                        <?php foreach($Tours as $Tour) {?>
                            <div class="col-6" onclick="location.href='subtours.php?tid=<?php echo $Tour['TourTypeID'];?>'" style="cursor: pointer;padding-right:4px;padding-left:4px;padding-bottom: 7px;">
                                <div style="position: absolute;color: white;bottom: 10;text-align: center;margin: 0px auto;width: -moz-available;font-weight:bold;font-size:14px"><?php echo $Tour['TourTypeName'];?></div>
                                <img src="https://www.trip78.in/uploads/<?php echo $Tour['Image'];?>" style="width: 100%;height: 120px;border-radius:5px">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div> 
     
  <!--<h2>Carousel Example</h2>
     --> 
</body>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
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
        $(document).ready( function(){
          // $("#sidebar-wrapper").hide(); 
            
        }); 
        $(document).ready(function () {
  $('#carouselExampleIndicators').find('.carousel-item').first().addClass('active');
}); 
        </script>
</html>