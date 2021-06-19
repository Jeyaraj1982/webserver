<?php include_once("config.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="nexifysoftware.com">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title><?php echo SITE_TITLE;?></title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/icofont.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/flag-icon.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
  </head>
  <body>
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card">
            <div>
              <div>
                <a class="logo" href="index.php">
                    <img class="img-fluid for-light" src="assets/app/<?php echo $_SETTINGS['LoginPageLogo'];?>" style="height:72px" alt="looginpage">
                </a>
              </div>
              <div class="login-main">
              <?php
              
                   if (isset($_POST['LoginBtn'])) {
                       
                       if ($_POST['LoginArea']=="admin")  {
                           $user_data = $mysql->select("select * from _tbl_admin where IsActive='1' and LoginName='".$_POST['LoginEmail']."' and LoginPassword='".$_POST['LoginPassword']."'");
                           
                           if (sizeof($user_data)>0) {
                               if ($user_data[0]['IsSuperAdmin']=="1") {
                                   $user_data[0]['role']="superadmin";
                                   $user_data[0]['logged']=1;
                               } else {
                                  $user_data[0]['role']="admin";
                                   $user_data[0]['logged']=1; 
                               }
                               $_SESSION['User']=$user_data[0];
                               $mysql->insert("_tbl_logs_logins",array("AdminID"       => $user_data[0]['AdminID'],
                                                                       "LoginDateTime" => date("Y-m-d H:i:s"),
                                                                       "IPAddress"     => $_SERVER['REMOTE_ADDR'])); 
                               echo "<script>location.href='dashboard.php';</script>";
                               exit;
                           } else {
                               $error = "Login failed, given details incoreect";
                           }
                       }
                       
                       if ($_POST['LoginArea']=="advocate")  {
                           $user_data = $mysql->select("select * from _tbl_master_advocates where IsActive='1' and LoginName='".$_POST['LoginEmail']."' and LoginPassword='".$_POST['LoginPassword']."'");
                           
                           if (sizeof($user_data)>0) {
                          
                                   $user_data[0]['role']="advocate";
                                   $user_data[0]['logged']=1;
                              
                               $_SESSION['User']=$user_data[0];
                                $mysql->insert("_tbl_logs_logins",array("AdvocateID"   => $user_data[0]['AdvocateID'],
                                                                       "LoginDateTime" => date("Y-m-d H:i:s"),
                                                                       "IPAddress"     => $_SERVER['REMOTE_ADDR'])); 
                               echo "<script>location.href='dashboard.php';</script>";
                               exit;
                           } else {
                               $error = "Login failed, given details incoreect";
                           }
                       }
                       
                       if ($_POST['LoginArea']=="staff")  {
                           $user_data = $mysql->select("select * from _tbl_master_staffs where IsActive='1' and LoginName='".$_POST['LoginEmail']."' and LoginPassword='".$_POST['LoginPassword']."'");
                           
                           if (sizeof($user_data)>0) {
                                $user_data[0]['role']="staff";
                                $user_data[0]['logged']=1;
                                $_SESSION['User']=$user_data[0];
                                $mysql->insert("_tbl_logs_logins",array("StaffID"   => $user_data[0]['StaffID'],
                                                                       "LoginDateTime" => date("Y-m-d H:i:s"),
                                                                       "IPAddress"     => $_SERVER['REMOTE_ADDR'])); 
                                echo "<script>location.href='dashboard.php';</script>";
                                exit;
                           } else {
                               $error = "Login failed, given details incoreect";
                           }
                       }
                   }
               ?> 
                <form class="theme-form" action="" method="post">
                  <h4>Sign in to account</h4>
                  <!--<p>Enter your LoginName & LoginPassword to login</p>-->
                   <div class="form-group m-t-15 m-checkbox-inline custom-radio-ml">
                          <div class="form-check form-check-inline radio radio-primary"  style="margin-right:0px !important">
                            <input class="form-check-input" id="radioinline1" name="LoginArea" type="radio" value="admin" checked="checked">
                            <label class="form-check-label mb-0" for="radioinline1" style="font-size:14px">Administrators</label>
                          </div>
                          <div class="form-check form-check-inline radio radio-primary"  style="margin-right:0px !important">
                            <input class="form-check-input" id="radioinline2" type="radio" name="LoginArea" value="advocate">
                            <label class="form-check-label mb-0" for="radioinline2"   style="font-size:14px">Advocates</label>
                          </div>
                          <div class="form-check form-check-inline radio radio-primary" style="margin-right:0px !important">
                            <input class="form-check-input" id="radioinline3" type="radio" name="LoginArea" value="staff">
                            <label class="form-check-label mb-0" for="radioinline3"   style="font-size:14px">Staffs</label>
                          </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">LoginName</label>
                    <input class="form-control" type="text" required="" name="LoginEmail" placeholder="jhon">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <input class="form-control" type="password" name="LoginPassword" required="" placeholder="*********">
                  </div>
                  <?php if (isset($error)) { ?>
                  <div class="form-group">
                     <label class="col-form-label" style="color:red"><?php echo $error;?></label>
                  </div>
                  <?php } ?>
                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input id="checkbox1" type="checkbox">
                      <label class="text-muted" for="checkbox1">Remember password</label>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit" name="LoginBtn">Sign in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="assets/js/jquery-3.5.1.min.js"></script>
      <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
      <script src="assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="assets/js/icons/feather-icon/feather-icon.js"></script>
      <script src="assets/js/config.js"></script>
      <script src="assets/js/script.js"></script>
    </div>
  </body>
</html>