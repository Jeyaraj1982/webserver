<?php 
session_start();
include_once("config.php");?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>aaranju</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>aaranju</b>&nbsp;api services<br></a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php
        if (isset($_POST['loginBtn'])) {
            $u = $mysql->select("select * from _users where username='".$_POST['email']."' and password='".$_POST['password']."'") ;
            if (sizeof($u)>0) {
                $_SESSION['user']=$u[0];
                echo "<script>location.href='dashboard.php';</script>";
            } else {
                $error="Login failed." ;
            }
        }
      ?>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="email" value="<?php echo $_POST['email']; ?>" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" value="<?php echo $_POST['password']; ?>" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8" style="color:red">
           <?php echo $error; ?>
          </div>
          <div class="col-4">
            <button type="submit" name="loginBtn" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div> 
      </form>
      
    </div>
    
  </div>
  <div style='text-align:center;color: #777;font-size: 13px;font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";'>
        Mobile/DTH Recharge API | Bus Ticket API | Money Transfer API (IMPS/NEFT/UPI/Bank Account Verification/UPI ID Verification)
        Send Text/Image/Doc using Telegram API
        
        <br>
        <!--Transactional SMS API | Promotional SMS API | Whatsapp SMS API <br>
        PIN Code API | IFS Code API | Bulk Email API <br>
        HTML To PDF API | Text On Image API--> </div>
</div>

<p align="center" style='color: #aaa;font-size: 13px;font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";'>Powered By <b>aaranju api services</b></p>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
