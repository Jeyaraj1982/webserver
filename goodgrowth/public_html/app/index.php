<?php
include_once("../config.php");
if (isset($_POST['LoginBtn'])) {
    $userData = $mysql->select("select * from _tbl_Members where MemberUserName='".$_POST['UserName']."' and MemberPassword='".$_POST['UserPassword']."'");
    if (sizeof($userData)>0) {
        
        $_SESSION['UserData']=$userData[0];
        
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
        $mysql->insert("_tbl_Members_LoginHistory",array("MemberID"=>$_SESSION['UserData']['MemberID'],
                                                        "IPAddress"=>$_SERVER['REMOTE_ADDR'],
                                                        "UserAgent"=>$_SERVER['HTTP_USER_AGENT'],
                                                        "CountryName"=>$country,
                                                        "CityName"=>$city,
                                                        "LoginDateTime"=>date("Y-m-d H:i:s")));
        echo "<script>location.href='dashboard.php';</script>";
    } else {
        $message="Login failed";
    }
}
?>
<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
<title>GoodGrowth</title>
<style>
.TMenu {cursor:pointer;color:#666;font-weight:bold;font-size:12px;font-family:arial;border-radius:0px 0px 5px 5px;background:#c4ed0e;float:left;margin-right:20px;padding:5px 20px;}
.TMenu:hover { background:#a7ce0a;color:#fff}
.loginBox {border-radius:5px;border:1px solid #a7ce0a;padding:5px;color:#444}
.loginBox:focus {background:#f9fcef}
.LoginBtn {cursor:pointer;padding:5px 15px;background:#a7ce0a;border:1px solid #a7ce0a;border-radius:5px;color:#fff;}
.LoginBtn:hover {background:#f9fcef;color:#a7ce0a}
.RegisterBtn {font-weight:Bold;cursor:pointer;padding:5px 20px;background:#f9fcef;border:1px solid #a7ce0a;border-radius:5px;color:#555}
.RegisterBtn:hover {background:#a7ce0a;color:#fff}
.footerLinnk {text-decoration:none;color:#888;text-transform:uppercase;font-family:arial;font-size:12px}
.footerLinnk:hover {text-decoration:underline;color:#222}
</style>
<body style="margin:0px;background:#f9f9f9">
<div style="background:#f1fcc4">
<table style="width:1100px;margin:0px auto" cellspacing="0" cellpadding="0">
    <tr>
        <td>
            <table cellspacing="0" cellpadding="0" style="width:100%">
                <tr>
                    <td style="width:300px;height:100px;">
                        <img src="assets/images/logo.png">
                    </td>
                    <td style="vertical-align:top">
                       
                    </td>
                    <td style="text-align:right;width:508px" >
                        <form action="" method="post">
                        <input type="text" placeholder="Login here ..." class="loginBox" name="UserName" value="<?php echo (isset($message)) ? $_POST['UserName'] : '' ; ?>" >
                        <input type="Password" placeholder="Password here ..."   class="loginBox" name="UserPassword" value="<?php echo (isset($message)) ? $_POST['UserPassword'] : '' ; ?>" >
                        <input type="Submit" value="Login" class="LoginBtn" name="LoginBtn">
                        <input type="Button" value="REGISTRATION" class="RegisterBtn">   
                        <?php
                            if (isset($message)) {
                                echo "<div style='color:red;text-align:left'>&nbsp;".$message."</div>";
                            }
                        ?>
                        </form>                    
                        
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</div>
<style>
.LMenu {border-top:1px dotted #ccc;padding:10px;font-family:arial;font-size:12px;color:#444}
.LMenu a {text-decoration:none;color:#333}
.LMenu a:hover {text-decoration:underline;color:#222}
</style>
<div style="height:40px;background:#f7fce3">

</div>
<div style="width:1100px;margin:0px auto;min-height:500px" >
<table style="width:1100px;margin:0px auto" cellspacing="0" cellpadding="0">
    <tr>
        <td style="width:200px;vertical-align:center" >
            
        </td>
        <td>
        
        </td>
    </tr>
</table>
</div>
<div style="background:#E3E4E6;padding:10px">
    <table style="width:1100px;margin:0px auto" cellspacing="0" cellpadding="0">
        <tr>
            <td></td>
            <td style="text-align:right;font-family:arial;font-size:14px;color:#000;font-weight:Bold;">

    <a href="" class="footerLinnk">TERMS OF USE</a>&nbsp;&nbsp;
    ::&nbsp;&nbsp;
    <a href="" class="footerLinnk">PROGRAM TERMS & CONDITIONS</a>&nbsp;&nbsp;
    ::&nbsp;&nbsp;
    <a href="" class="footerLinnk">Personal Data Protection Policy</a>&nbsp;&nbsp;
    ::&nbsp;&nbsp;
    <a href="" class="footerLinnk">COOKIES POLICY</a>&nbsp;&nbsp;
    ::&nbsp;&nbsp;
    <a href="" class="footerLinnk">GOLD CHARTS</a>&nbsp;&nbsp;
    ::&nbsp;&nbsp;
    <a href="" class="footerLinnk">GOLD FIXING</a>

</td>
        </tr>
    </table>
    
</div>
 
<div style="background:#fff;padding:11px;font-family:arial;font-size:10px;text-align:center;color:#555">&copy; Goodgrowth.in 2019. All Rights Reserved</div>
</body>