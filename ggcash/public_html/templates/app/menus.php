<body>
<!-- Preloader -->
<div id="preloader">
  <div data-loader="dual-ring"></div>
</div>
<!-- Preloader End --> 

<!-- Document Wrapper   
============================================= -->
<div id="main-wrapper">
  
<header id="header" class="<?=($this->action == 'home') ? 'bg-transparent header-text-light' : '';?>">
    <div class="container">
      <div class="header-row">
        <div class="header-column justify-content-start"  > 
          <!-- Logo
          ============================= -->
          <div class="logo"> <a class="d-flex" href="<?=$_SERVER['BASE_URL'];?>" title=""><img src="images/logo.png" alt=""></a> </div>
          <!-- Logo end --> 
          <!-- Collapse Button
          ============================== -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-nav"> <span></span> <span></span> <span></span> </button>
          <!-- Collapse Button end --> 
          
          <!-- Primary Navigation
          ============================== -->
          <nav class="primary-menu navbar navbar-expand-lg">
              <div id="header-nav" class="collapse navbar-collapse">
              <ul class="navbar-nav mr-auto">
                <li><a href="<?=$_SERVER['BASE_URL'];?>">Home</a></li>
                <li><a href="<?=$_SERVER['BASE_URL'];?>special-offer">Special Offer</a></li>
                <li><a href="<?=$_SERVER['BASE_URL'];?>about-us">About Us</a></li>
                <li><a href="<?=$_SERVER['BASE_URL'];?>how-it-works">How it works</a></li>
                <li><a href="<?=$_SERVER['BASE_URL'];?>register">Register</a></li>
                    <li><a href="<?=$_SERVER['BASE_URL'];?>/mlm/index.php">Matrix Login</a></li>
                    <!--<li><a href="<?=$_SERVER['BASE_URL'];?>faq">Faq</a></li>
                <li><a href="<?=$_SERVER['BASE_URL'];?>support">Support</a></li>--> 
             </ul>
            </div>
          </nav>
          <!-- Primary Navigation end --> 
        </div>
        <div class="header-column justify-content-end"> 
          <!-- Login & Signup Link
          ============================== -->
          <nav class="login-signup navbar navbar-expand">
            <ul class="navbar-nav">
              <li><a href="<?=$_SERVER['BASE_URL'];?>login">Login</a> </li>
              <li class="align-items-center h-auto ml-sm-3"><a class="btn btn-primary d-none d-sm-block" href="<?=$_SERVER['BASE_URL'];?>signup">Sign Up</a></li>
            </ul>
          </nav>
          <!-- Login & Signup Link end --> 
        </div>
      </div>
    </div>
  </header>