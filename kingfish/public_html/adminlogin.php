<?php
     include_once("config.php"); 
     $mysql =   new MySql();
     if (isset($_POST['loginbtn'])) {
         echo "aa";
          $record = $mysql->select("select * from admintbl where UserName='".$_POST['UserName']."' and Password='".$_POST['Password']."'");
          echo "aa";
          if (sizeof($record)>0) {
            $_SESSION['USER'] = $record[0];
            echo " <script>location.href='admin/dashboard.php';</script>";
          } else {
              $error = "Invalid Login details";
          }
    }           
 ?>   
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Steelworks</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">                                                 
    <meta charset="utf-8">
    <!--<base href="https://livedemo00.template-help.com/wt_prod-10987/theme/">-->
    <base href="http://kingfish.in/">
    <script src="/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script><link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style-3.css" id="main-styles-link">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>
    <div class="ie-panel"><a href="https://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
      <div class="wrapper-triangle">
        <div class="pen">
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>
          <div class="line-triangle">
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
            <div class="triangle"></div>
          </div>                                                                          
        </div>
      </div>
    </div>
    <div class="page">
      <!-- Page Header-->
      <header class="section page-header">
        <!-- RD Navbar-->
        
      </header>
<section class="section section-lg bg-default text-md-left">
        <div class="container">
          <div class="row row-50 justify-content-center justify-content-xl-between">
            <div class="col-lg-3"></div>
            <div class="col-lg-6" >
              <div class="box-width-xl-520">
                <h3 class="text-spacing-50 font-weight-bold" style="text-align: center;">Admin Login</h3>
                <div class="form-login">
                  <form class="" action="" method="post">
                    <div class="form-wrap">
                      <label class="form-label" for="login-name">User Name*</label>
                      <input class="form-input" id="UserName" name="UserName" type="text" data-constraints="@Required">
                    </div>
                    <div class="form-wrap">
                      <label class="form-label" for="login-password">Password</label>
                      <input class="form-input" id="Password"  type="password" name="password" data-constraints="@Required">
                    </div>
                    <label class="checkbox-inline">
                      <input name="input-checkbox-1" value="checkbox-1" type="checkbox">Remember Me
                    </label>    <br>
                    <?php echo $error;?>
                    <div class="row row-14 gutters-14">
                      <div class="col-sm-6 col-lg-5 col-xl-6">
                        <button class="" type="submit" name="loginbtn">Login</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>                                                                              
            </div>
            <div class="col-lg-3"></div>
          </div>
        </div>
      </section>
<script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
</body>