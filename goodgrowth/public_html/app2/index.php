<?php
    include_once("../config.php");
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Page title -->
    <title>GoodGrowth</title>
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->
    <!-- Vendor styles -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="styles/style.css">
    <Style>
        
        .TMenu {cursor:pointer;color:#666;font-weight:bold;font-size:12px;font-family:arial;border-radius:0px 0px 5px 5px;background:#c4ed0e;float:left;margin-right:20px;padding:5px 20px;}
        .TMenu:hover { background:#a7ce0a;color:#fff}
        .loginBox {border-radius:5px;border:1px solid #a7ce0a !important;padding:5px;color:#444;padding-left:10px;}
        .loginBox:focus {background:#f9fcef}
        .LoginBtn {cursor:pointer;padding:5px 15px;background:#a7ce0a;border:1px solid #a7ce0a;border-radius:5px;color:#fff;}
        .LoginBtn:hover {background:#f9fcef;color:#a7ce0a}
    
    </style>
</head>
<body >
<!-- Simple splash screen-->
<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Homer - Responsive Admin Theme</h1><p>Special Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p><div class="spinner"> <div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div> <div class="rect4"></div> <div class="rect5"></div> </div> </div> </div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<?php
        
        
        if (isset($_POST['LoginBtn'])) {
            
            $userData = $mysql->select("select * from _tbl_Members where MemberUserName='".$_POST['UserName']."' and MemberPassword='".$_POST['UserPassword']."' and IsActive=1");
            
            if (sizeof($userData)>0) {
                
                $lastLogin = $mysql->select("select * from _tbl_Members_LoginHistory where MemberID='".$userData[0]['MemberID']."' order by MemberLoginID Desc limit 1,2");
                if (sizeof($lastLogin)>0) {
                    $userData[0]['LastLogin']=$lastLogin[0]['LoginDateTime'];
                }
                $_SESSION['UserData']=$userData[0];
                $_SESSION['redirect']=="http://goodgrowth.in/app2/index.php";
                $ip_address=$_SERVER['REMOTE_ADDR'];
                /*Get user ip address details with geoplugin.net*/
                $geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip_address;
                $addrDetailsArr = unserialize(file_get_contents($geopluginURL));
                /*Get City name by return array*/
                $city = $addrDetailsArr['geoplugin_city'];
                /*Get Country name by return array*/
                $country = $addrDetailsArr['geoplugin_countryName'];
                if(!$city){
                    $city='Not Define';
                }
                if(!$country){
                    $country='Not Define';
                }
                $mysql->insert("_tbl_Members_LoginHistory",array("MemberID"      => $_SESSION['UserData']['MemberID'],
                                                                 "IPAddress"     => $_SERVER['REMOTE_ADDR'],
                                                                 "UserAgent"     => $_SERVER['HTTP_USER_AGENT'],
                                                                 "CountryName"   => $country,
                                                                 "CityName"      => $city,
                                                                 "sessionid"      => session_id(),
                                                                 "lastupdate"      => date("Y-m-d H:i:s"),
                                                                 "LoginDateTime" => date("Y-m-d H:i:s")));
                sleep(2);
                if ($userData[0]['IsAdmin']==1) {
                    //echo "<script>location.href='app/dashboard.php';</script>";    
                } else {
                    echo "<script>location.href='dashboard.php';</script>";
                }
            } else {
                $message="Login failed";
            }
        }
     ?>
<div class="login-container" >
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <img src="http://goodgrowth.in/images/footer-logo.png">
                <h3>Login</h3>
                <!--<small>This is the best app ever!</small>-->
            </div>
            <div class="hpanel">
                <div class="panel-body" style="border:none">
                        <form action="" id="loginForm" method="post">
                            <div class="form-group">
                                <label class="control-label" for="username">Login Name</label>
                                <input type="text" placeholder="Login Name" title="Login Name" required="" name="UserName" value="<?php echo (isset($message)) ? $_POST['UserName'] : '' ; ?>"  id="UserName" class="form-control loginBox">
                                <!--<span class="help-block small">Your unique username to app</span>-->
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="Password" required="" name="UserPassword" value="<?php echo (isset($message)) ? $_POST['UserPassword'] : '' ; ?>"  id="UserPassword" class="form-control loginBox">
                            </div>
                            <?php
                                if (isset($message)) {
                                    ?>
                                     <div class="form-group">
                                     <?php echo $message;?>
                            </div>
                                    <?php
                                }
                            ?>
                            <button name="LoginBtn" type="submit" class="btn btn-success btn-block LoginBtn">Login</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <strong>Goodgrowth</strong> Copyright @  2020
        </div>
    </div>
</div>


<!-- Vendor scripts -->
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="vendor/iCheck/icheck.min.js"></script>
<script src="vendor/sparkline/index.js"></script>

<!-- App scripts -->
<script src="scripts/homer.js"></script>

</body>
</html>