<?php  include_once("../config.php");   ?>                                                                                    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="images/favicon.png" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.css">
    <link rel="stylesheet" href="assets/css/demo.css">
    <script src="assets/js/app.js" type='text/javascript'></script>
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
</head>
<style>
    .errorstring {font-size:10px;color:red}

    .Activedot {height:10px;width:10px;background-color:#20e512;border-radius:50%;display:inline-block;}
    .Deactivedot {height:10px;width:10px;background-color:#888;border-radius:50%;display:inline-block;}
    .imageGrey{-webkit-filter: grayscale(100%);}
    .clock {
   
    color: #17D4FE;
    font-size: 17px;
    width:100%;
    font-weight:bold;
    margin:0px auto;
    text-align:left
}
</style>
<?php if($Page!="login") {?>
<div class="wrapper">
<div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
                
               
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">
                
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret" style="text-align: left;">
                            <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span style="color:white"> 
                                    <?php  echo $_SESSION['User']['AdminName']; ?>
                                </span>  
                                <br>
                                <span style="color:white">Admin Panel</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">                                                                                                
                                   <i class="flaticon-user-1" style="font-size:28px;color:#fff"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">                      
                                            <div class="avatar-lg">
                                            <i class="flaticon-user-1" style="font-size:36px"></i>
                                            <!--<img src="../assets/img/profile.jpg" alt="image profile" class="avatar-img rounded">--></div>
                                            <div class="u-text">
                                                <h4><?php echo $_SESSION['User']['AdminName'];?></h4>
                                                <p class="text-muted"><?php echo $_SESSION['User']['EmailID'];?></p>
                                                
                                            </div>
                                        </div>         
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>                                    
                                        <a class="dropdown-item" href="dashboard.php?action=ChangePassword">Change Password</a>
                                        <a class="dropdown-item" href="dashboard.php?action=logout">Logout</a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
             
        </div>
<?php } ?>
<script>
function showHidePwd(pwd,btn) {
  var x = document.getElementById(pwd);
  if (x.type === "password") {
    x.type = "text";
    btn.html('<i class="icon-eye"></i>');
  } else {
    x.type = "password";
    btn.html('<i class="icon-eye"></i>');
  }
}
</script>
      