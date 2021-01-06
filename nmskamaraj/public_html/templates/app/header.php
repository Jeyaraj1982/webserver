<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $this->tags->render(); ?>

    <link rel="home" href="<?= $this->params['site-name']; ?>" />

    <?php $this->loadCssAssets(); ?>
    <script>
        var base_url = '<?= $this->params['site-name']; ?>';
    </script>
    <meta charset="utf-8">
    <!-- Stylesheets -->
    <link rel="shortcut icon" href="<?= $_SERVER['BASE_URL']; ?>images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?= $_SERVER['BASE_URL']; ?>images/favicon.ico" type="image/x-icon">

    <meta content="en_US" property="og:locale">
    <meta content="arcusinfotech" property="og:site_name">
    <meta content="website" property="og:type">
    <meta name="robots" content="all">

    <?php $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
    <meta content="<?= $url; ?>" property="og:url">
    <link href="<?= $url; ?>" rel="canonical">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

    <div id="wrapper" class="clearfix">
        <!-- preloader -->
        <div id="preloader">
            <div id="spinner">
                <img alt="" src="<?= $_SERVER['BASE_URL']; ?>images/preloaders/5.gif">
            </div>
            <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
        </div>

        <!-- Header -->
        <header id="header" class="header">
            <div class="header-top bg-theme-colored2 sm-text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="widget text-white">
                                <ul class="list-inline xs-text-center text-white">
                                    <li class="m-0 pl-10 pr-10"> <a href="#" class="text-white"><i class="fa fa-phone text-white"></i>
                                            04652-253900</a> </li>
                                    <li class="m-0 pl-10 pr-10">
                                        <a href="#" class="text-white"><i class="fa fa-envelope-o text-white mr-5"></i>
                                            kamarajpolytechniccollege@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 pr-0">
                            <div class="widget">
                                <ul class="styled-icons icon-sm pull-right flip sm-pull-none sm-text-center mt-5">
                                    <!-- <li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus text-white"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin text-white"></i></a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle p-0 bg-lightest xs-text-center">
                <div class="container pt-10 pb-10">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <a class="menuzord-brand pull-left flip sm-pull-center" href="<?= $_SERVER['BASE_URL']; ?>">
                                <img src="<?= $_SERVER['BASE_URL']; ?>images/logo.png?r=202" class="logo"   alt="kamaraj polytechnic">
                            </a>
                        </div>
                        <div class="visible-lg-6 visible-md-6 col-md-6" style="text-align: right;">
                            <a class="menuzord-brand pull-right flip sm-pull-center" href="javascript:void(0)" onclick="ShowForms()">
                                <img src="<?= $_SERVER['BASE_URL']; ?>images/onlineadmission1.gif" class="onnline-admission"   alt="kamaraj polytechnic">
                            </a>
                            <br>already submitted, <a href="<?= $_SERVER['BASE_URL']; ?>viewform" style='color:blue'>click here to view   </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-nav">
                <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
                    <div class="container">
                        <nav id="menuzord" class="menuzord default menuzord-responsive">
                            <ul class="menuzord-menu">
                                <li class="active"><a href="<?= $_SERVER['BASE_URL']; ?>">Home</a></li>
                                <li><a href="<?= $_SERVER['BASE_URL']; ?>about-us">About Us</a></li>
                                <li><a href="#">Department</a>
                                    <ul class="dropdown">
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>department/automobile-engineering">Automobile Engineering</a></li>
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>department/computer-engineering">Computer Engineering</a></li>
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>department/civil-engineering">Civil Engineering</a></li>
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>department/mechanical-engineering">Mechanical Engineering</a></li>
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>department/electronics-communication-engineering">Electronics & Comm. Engg.</a></li>
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>department/electrical-electronics-engineering">Electrical & ELEC. Engg. </a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Placement</a>
                                    <ul class="dropdown">
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>mission">Mission</a></li>
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>action-plan-key-strategy">Action Plan And Key Strategy</a></li>
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>placement-cell">Placement Cell</a></li>
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>placement-training">Placement Training</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Facilities</a>
                                    <ul class="dropdown">
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>hostel">Hostel</a></li>
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>library">Library</a></li>
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>transport">Transport</a></li>
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>salient-features">laboratories</a></li>
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>activities">canteen</a></li>
                                        <!--  <li><a href="<?= $_SERVER['BASE_URL']; ?>others">Others</a></li>-->
                                    </ul>
                                </li>
                                <li><a href="#">CAMPUS LIFE</a>
                                    <ul class="dropdown">
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>campus-tour">Campus Tour</a></li>
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>sports">Sports</a></li>
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>social-activities">Social Activities</a></li>
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>special-events-celebrations">Special Events And Celebrations</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">GALLERY</a>
                                    <ul class="dropdown">
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>galleryaicte">AICTE</a></li>
                                        <li><a href="<?= $_SERVER['BASE_URL']; ?>Gallery">CAMPUS</a> </li>
                                    </ul>
                                </li>
                                <!--<li><a href="<?= $_SERVER['BASE_URL']; ?>gallery">Gallery</a> </li>-->
                                <li><a href="<?= $_SERVER['BASE_URL']; ?>">Alumni</a> </li>
                                <li><a href="<?= $_SERVER['BASE_URL']; ?>contact">Contact Us</a> </li>

                            </ul>
                            <!-- <div class="pull-right sm-pull-none mb-sm-15">
                                <a class="btn btn-colored btn-theme-colored2 mt-15 mt-sm-10 pt-10 pb-10" href="#">Online Admission</a>
                            </div> -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>
     <div class="modal fade" id="ConfirmationPopupfrselectyear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="top: 150px;">
    <div class="modal-content">
      <div class="modal-body" style="padding: 36px 40px;">
         <div  style="text-align: center;font-size:15px;">
            <div class="row">
                <div class="card" style="padding-bottom:0%;min-height:0px">
                    <div class="card-body">
                        <div class="col-sm-6"><button type="button" class="btn btn-colored btn-theme-colored2 text-white btn-lg pl-40 pr-40" onclick="location.href='<?= $_SERVER['BASE_URL']; ?>firstyear'">F<span style="text-transform: lowercase;">irst Year</span>  A<span style="text-transform: lowercase;">pplication Form</span></button></div>
                        <div class="col-sm-6" style="text-align: right;"><button type="button" class="btn btn-colored btn-theme-colored2 text-white btn-lg pl-40 pr-40" onclick="location.href='<?= $_SERVER['BASE_URL']; ?>secondyear'">S<span style="text-transform: lowercase;">econd Year</span>  A<span style="text-transform: lowercase;">pplication Form</span></button></div>
                    </div>
                </div>
            </div>
         </div>  
      </div>
    </div>
  </div>
</div>
<script>
function ShowForms() {
    $('#ConfirmationPopupfrselectyear').modal("show");
}                                                                                                                                                                                                         
</script>