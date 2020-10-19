<?php
    include_once("config.php");
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
        var base_url  = 'https://ggcash.in/';
    </script>

    <link href="https://ggcash.in/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen" /><link href="https://ggcash.in/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" media="screen" /><link href="https://ggcash.in/assets/css/stylesheet.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body style="background:#f1f5f6">
<!-- Preloader -->
<div id="preloader">
  <div data-loader="dual-ring"></div>
</div>
 
<div id="main-wrapper">
  <div id="content">
  <div class="login-signup-page mx-auto my-5">
    <div class="logo text-center"> <a class="d-flex" href="#" title=""><img src="https://ggcash.in/images/logo.png" alt="" style="margin: 0px auto;"></a> </div>
   
      <h3 class="font-weight-400 text-center" style="margin-top:10px;">Sign In</h3>
      <!--<p class="lead text-center">Your login information is safe with us.</p>-->
      <div class="bg-light shadow-md rounded p-4 mx-2">
      <?php
        if (isset($_POST['submitBtn'])) {
           
            $sql= "select * from `_tbl_Members` where  `MemberCode`='".$_POST['emailAddress']."'";
            $data = $mysqldb->select($sql);
            
            if (sizeof($data)>0) {
                
                if ($data[0]['MemberPassword']==$_POST['loginPassword']) {
                    $_SESSION['User']=$data[0];                   
                   $id=$mysqldb->insert("_tbl_members_login_logs",array("MemberID"   =>$_SESSION['User']['MemberID'],
                                                                        "LoginOn"    =>date("Y-m-d H:i:s"),
                                                                         "IsSuccess" =>"1")); 
                    ?>
                 <script>location.href='app/dashboard.php';</script>
                 <?php
                } else {
                     echo    "<span style='color:red'>Member ID password incorrect</span>";
                   $id=$mysqldb->insert("_tbl_members_login_logs",array("MemberID"   =>$_SESSION['User']['MemberID'],
                                                                        "LoginOn"    =>date("Y-m-d H:i:s"),
                                                                         "IsSuccess" =>"0")); 
                } 
                   
                 
                 
           }   else {
            echo    "<span style='color:red'>login failed</span>";
                         
           }   
       }
      ?>
       
      <form id="loginForm" method="post">
          <div class="form-group">
          <label for="emailAddress">Member ID</label>
          <input type="text" class="form-control" name= "emailAddress" id="emailAddress" required placeholder="Enter Your Member ID">
        </div>
          <div class="form-group">
          <label for="loginPassword">Password</label>
          <input type="password" class="form-control" name= "loginPassword" id="loginPassword" required placeholder="Enter Password">
        </div>
           
          <button class="btn btn-primary btn-block my-4"  name="submitBtn" type="submit">Sign In</button>
        </form>
      <p class="text-3 text-muted text-center mb-0">Don't have an account? <a class="btn-link" href="signup.php">Sign Up</a></p>
    </div>
    </div>
    </div>
 
 
    <div style="text-align: center;width:100%">
        <p class="text-center   mb-2 mb-lg-0">Copyright &copy; 2019 GGCASH. All Rights Reserved.</p>
        <br>
    </div>
 
 
  <!-- Footer end --> 
  
</div>
<!-- Document Wrapper end --> 

<!-- Back to Top
============================================= --> 
<a id="back-to-top" data-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i class="fa fa-chevron-up"></i></a> 

  <script type="text/javascript" charset="utf-8" src="https://ggcash.in/assets/js/vendor/jquery/jquery.min.js"></script><script type="text/javascript" charset="utf-8" src="https://ggcash.in/assets/js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script><script type="text/javascript" charset="utf-8" src="https://ggcash.in/assets/js/vendor/owl.carousel/owl.carousel.min.js"></script><script type="text/javascript" charset="utf-8" src="https://ggcash.in/assets/js/theme.js"></script>
</body>
</html>