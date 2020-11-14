    <?php
      include_once("webadmin/mysql.php");
      $mysql =   new MySql();
    ?> 

  <header class="kamaraj-main-header">
        <div class="kamaraj-header-nav scrollingto-fixed">
            <div class="container">
                 <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <nav class="navbar navbar-default kamaraj-navbar">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand logo-obs" href="index.php">
                                        <img src="images/new_logo.png" alt="">
                                    </a>                            
                                </div>
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav navbar-right" data-hover="dropdown" data-animations="flipInY">
                                        <li class=" active"> <a href="index.php">Home </a> </li>
                                        <li><a href="about.php">About Us</a></li>
                                                <li class="dropdown">
                                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Department </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="automobile.php">Automobile Engineering</a> </li>
                                                <li><a href="computerscience.php">Computer Engineering</a></li>
                                                <li><a href="civilengineering.php">Civil Engineering</a></li>
                                                <li><a href="mechanical.php">Mechanical Engineering</a></li>
                                                <li><a href="ece.php">Electronics & Comm. Engg.</a></li>
                                                <li><a href="eee.php">Electrical & Elec. Engg. </a></li>
                                            </ul>
                                        </li>
                                        <li><a href="placement.php">Placement</a> </li>
                                                <li class="dropdown">
                                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Facilities</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="hostel.php">Hostel</a></li>
                                                <li><a href="library.php">Library</a> </li>
                                                <li><a href="transport.php">Transport</a> </li>
                                                <li><a href="salient-features.php">Salient Features</a> </li>
                                                <li><a href="activities.php">Activities</a> </li>
                                                <li><a href="others.php">Others</a> </li>
                                            </ul>
                                        </li>
                                        <li><a href="gallery.php">Gallery</a> </li>
                                        <li><a href="alumini.php">Alumni</a> </li>
                                        <li><a href="contact.php">Contact Us</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>