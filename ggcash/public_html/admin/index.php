<?php include_once("/home/ggcash/public_html/config.php"); ?>

 <?php
        if (isset($_POST['submitBtn'])) {
            
            
              
            //  $sql= "select * from `_tbl_admin` where  `AdminPassword`='".$_POST['loginPassword']."' and `AdminEmail`='".$_POST['emailAddress']."'";
          $sql= "select * from `_tbl_admin` where  `AdminEmail`='".$_POST['emailAddress']."'";
          $data = $mysqldb->select($sql);
           
          
           if (sizeof($data)>0) {
                   if ($data[0]['AdminPassword']==$_POST['loginPassword']) {
                   $_SESSION['User']=$data[0];
                    $id=$mysqldb->insert("_tbl_admin_login_logs",array("AdminID"   =>$_SESSION['User']['AdminID'],
                                                                        "LoginOn"    =>date("Y-m-d H:i:s"),
                                                                         "IsSuccess" =>"1")); 
                 ?>
                <script>location.href='dashboard.php';</script>
                 <?php
                } else {
                     echo    "<span style='color:red'>Username password incorrect</span>";
                   $id=$mysqldb->insert("_tbl_admin_login_logs",array("AdminID"   =>$_SESSION['User']['AdminID'],
                                                                        "LoginOn"    =>date("Y-m-d H:i:s"),
                                                                         "IsSuccess" =>"0")); 
                } 
                   
                 
                 
           }   else {
            echo    "<span style='color:red'>login failed</span>";
                         
           }   
       }
      ?>



<!doctype html>
<html class="no-js" lang="en-US">

<head>
    <title>login</title>

<meta charset="utf-8">
<title>GG Cash </title>
<meta name="description" content="GG Cash ">
<meta name="keywords" content="GG Cash ">
<meta name="robots" content="index, follow" />

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i' type='text/css'>
<link href="images/favicon.png" rel="icon" />

 <script src="https://kit.fontawesome.com/1495d5c517.js"></script>

 <script type="text/javascript">
        var base_url  = 'http://ggcash.in/';
    </script>

    <link href="http://ggcash.in/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" /><link href="http://ggcash.in/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" media="screen" /><link href="http://ggcash.in/assets/css/stylesheet.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body style="background:#f1f5f6">
<!-- Preloader -->
<div id="preloader">
  <div data-loader="dual-ring"></div>
</div>
<!-- Preloader End --> 

<!-- Document Wrapper   
============================================= -->
<div id="main-wrapper">
  
    <!-- Content
  ============================================= -->
  <div id="content">
  <br><br><br>
  <div class="login-signup-page mx-auto my-5">
      <h3 class="font-weight-400 text-center">Administrator Portal</h3>
      <p class="lead text-center">for administrator and admin staffs.</p>
      <div class="bg-light shadow-md rounded p-4 mx-2">
            <form id="loginForm" method="post">
          <div class="form-group">
          <label for="emailAddress">User Name</label>
          <input type="text" class="form-control" name= "emailAddress" id="emailAddress" required placeholder="User Name">
        </div>
          <div class="form-group">
          <label for="loginPassword">Password</label>
          <input type="password" class="form-control" name= "loginPassword" id="loginPassword" required placeholder="Enter Password">
        </div>
           
          <button class="btn btn-primary btn-block my-4"  name="submitBtn" type="submit">Login</button>
        </form>
      
    </div>
    </div>
  <!-- Content end -->
 
    
  <!-- Footer
  ============================================= -->
   
  <!-- Footer end --> 
  
</div>
<!-- Document Wrapper end --> 

<!-- Back to Top
============================================= --> 
<a id="back-to-top" data-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i class="fa fa-chevron-up"></i></a> 

  <script type="text/javascript" charset="utf-8" src="http://ggcash.in/assets/js/vendor/jquery/jquery.min.js"></script><script type="text/javascript" charset="utf-8" src="http://ggcash.in/assets/js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script><script type="text/javascript" charset="utf-8" src="http://ggcash.in/assets/js/vendor/owl.carousel/owl.carousel.min.js"></script><script type="text/javascript" charset="utf-8" src="http://ggcash.in/assets/js/theme.js"></script>
</body>
</html>