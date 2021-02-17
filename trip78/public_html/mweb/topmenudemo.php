<?php include_once("../config.php");?>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel=apple-touch-icon type=image/png href=https://static.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png />
  <meta name=apple-mobile-web-app-title content=CodePen>
  <link rel=shortcut icon type=image/x-icon href=https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico />
  <link rel=mask-icon type="" href=https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg color=#111 />
  <link rel=stylesheet href=https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.1.2/css/swiper.min.css'>
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
.swiper-container {
  width: 100%;
  height: 100%;
}
@media screen and (min-width: 800px) {
  .swiper-container {
    width: 70%;
    margin-left: 15%;
  }
}

.swiper-slide {
  background: #fff;
  color: #333;
  font-size: 1.8rem;
  min-height: 300px;
  display: -webkit-box;
  display: flex;
  -webkit-box-pack: center;
          justify-content: center;
  -webkit-box-align: center;
          align-items: center;
  text-align: center;
}

.swiper-container-horizontal > .swiper-pagination {
  top: 0;
  bottom: auto;
}
.swiper-container-horizontal > .swiper-pagination .swiper-pagination-bullet {
  margin: 0;
}

.active-mark {
  background: #ffeb3b;
  width: 25%;
  height: 4px;
  position: absolute;
  left: 0;
  top: 52px;
  -webkit-transition: left 0.2s ease-out;
  transition: left 0.2s ease-out;
}

.swiper-pagination-bullet {
  background-color: #00D42B;
  border-radius: 0;
  box-sizing: border-box;
  color: #0e8927;
  cursor: pointer;
  font-size: 12px;
  font-weight: normal;
  opacity: 1;
  height: 56px;
  width: 25%;
  display: -webkit-inline-box;
  display: inline-flex;
  -webkit-box-align: center;
          align-items: center;
  -webkit-box-pack: center;
          justify-content: center;
  text-align: center;
  -webkit-transition: font-weight 0.22s ease;
  transition: font-weight 0.22s ease;
}
.swiper-pagination-bullet:nth-of-type(1).swiper-pagination-bullet-active ~ .active-mark {
  left: 0%;
}
.swiper-pagination-bullet:nth-of-type(2).swiper-pagination-bullet-active ~ .active-mark {
  left: 25%;
}
.swiper-pagination-bullet:nth-of-type(3).swiper-pagination-bullet-active ~ .active-mark {
  left: 50%;
}
.swiper-pagination-bullet:nth-of-type(4).swiper-pagination-bullet-active ~ .active-mark {
  left: 75%;
}
.swiper-pagination-bullet:first-of-type.swiper-pagination-bullet-active ~ .active-mark {
  left: 0;
}

.swiper-pagination-bullet-active {
  font-weight: bold;
}
</style>   
<script>
  window.console = window.console || function(t) {};
</script>
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }                                                                               
</script>
<?php $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and md5(TourTypeID)='".$_GET['tid']."'");?>
<?php $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1' and md5(TourTypeID)='".$_GET['tid']."'");?>
<nav class="navbar navbar-expand navbar-dark bg-primary" style="padding:3px;color:white"> 
    <a href="index.php" class="navbar-brand">
        <span class="navbar-toggler-icon"></span>
    </a>
    <div style="text-align: center;width: 100%;"><?php echo $Tours[0]['TourTypeName'];?></div>
</nav>
<div class=swiper-container>
        <div class=swiper-pagination>
        </div>
        <?php $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1'");?>
        <?php 
        $TourTypeName="";
        foreach($Tours as $Tour){
           $TourTypeName .="'".$Tour['TourTypeName']."'," ;
        } 
        $TourTypeName = substr($TourTypeName,0,strlen($TourTypeName)-1);
        ?>
        
        <div id="page-content-wrapper" style="padding:8px">
                <div class="container-fluid">
                    <div class="row">
                        <div class=swiper-wrapper>
                        <?php foreach($SubTours as $SubTour) {?>
                            <div class=swiper-slide >
                                <div class="col-6" onclick="location.href='tourpackage.php?tid=<?php echo md5($SubTour['SubTourTypeID']);?>'" style="cursor: pointer;padding-right:4px;padding-left:4px;padding-bottom: 7px;">
                                    <div style="position: absolute;color: white;bottom: 10;text-align: center;margin: 0px auto;width: -moz-available;font-weight:bold;font-size:14px"><?php echo $SubTour['SubTourTypeName'];?></div>
                                    <img src="https://www.trip78.in/uploads/<?php echo $SubTour['Image'];?>" style="width: 100%;height: 120px;border-radius:5px">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    </div>
                </div>
            </div>
          <div class=swiper-wrapper>
            <div class=swiper-slide>Tab 1</div> 
            <div class=swiper-slide>Tab 2</div>
            <div class=swiper-slide>Tab 3</div>
            <div class=swiper-slide>Tab 4</div>
        </div>
    </div>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script> <!-- Menu Toggle Script -->
<script src=https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.1.2/js/swiper.min.js'></script>
  
<script id=rendered-js >
    var swiper = new Swiper('.swiper-container', {
      pagination: '.swiper-pagination',
      slidesPerView: 1,
      paginationClickable: true,
      loop: true,
      paginationBulletRender: function (index, className) {
        //var tabsName = ['Apps', 'Tricks', 'News', 'Games'];
        var tabsName = [<?php echo $TourTypeName; ?>];
        if (index === tabsName.length - 1) {
          return '<span class=' + className + '>' +
          tabsName[index] + '</span>' +
          '<div class=active-mark ></div>';
        }
        return '<span class=' + className + '>' + tabsName[index] + '</span>';
      } });
</script>
</html>