<?php $page='login';  include("file/header.php");?>
    <section class="team-section" style="padding-top:40px">
     <?php
        include_once("config.php");
        
        if (isset($_POST['LoginBtn'])) {
            
            $userData = $mysql->select("select * from _tbl_Members where MemberUserName='".$_POST['UserName']."' and MemberPassword='".$_POST['UserPassword']."' and IsActive=1");
            
            if (sizeof($userData)>0) {
                
                $lastLogin = $mysql->select("select * from _tbl_Members_LoginHistory where MemberID='".$userData[0]['MemberID']."' order by MemberLoginID Desc limit 1,2");
                if (sizeof($lastLogin)>0) {
                    $userData[0]['LastLogin']=$lastLogin[0]['LoginDateTime'];
                }
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
                    echo "<script>location.href='app/dashboard.php';</script>";    
                } else {
                    echo "<script>location.href='app2/dashboard.php';</script>";
                }
            } else {
                $message="Login failed";
            }
        }
     ?>
     <style>
        .TMenu {cursor:pointer;color:#666;font-weight:bold;font-size:12px;font-family:arial;border-radius:0px 0px 5px 5px;background:#c4ed0e;float:left;margin-right:20px;padding:5px 20px;}
        .TMenu:hover { background:#a7ce0a;color:#fff}
        .loginBox {border-radius:5px;border:1px solid #a7ce0a;padding:5px;color:#444;width:250px;padding-left:10px;}
        .loginBox:focus {background:#f9fcef}
        .LoginBtn {cursor:pointer;padding:5px 15px;background:#a7ce0a;border:1px solid #a7ce0a;border-radius:5px;color:#fff;}
        .LoginBtn:hover {background:#f9fcef;color:#a7ce0a}
     </style>
     <form action="" method="post">
        <table style="width:1100px;margin:0px auto" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <table cellspacing="0" cellpadding="0" style="width:100%">
                        <tr>
                            <td style="width:508px" >
                                <h2>&nbsp;Login</h2>
                                <table>
                                    <tr>
                                        <td style="padding:5px">
                                            <input type="text" placeholder="Login Name here ..." class="loginBox" name="UserName" value="<?php echo (isset($message)) ? $_POST['UserName'] : '' ; ?>" >    
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px">
                                            <input type="Password" placeholder="Password here ..."   class="loginBox" name="UserPassword" value="<?php echo (isset($message)) ? $_POST['UserPassword'] : '' ; ?>" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px">
                                            <input type="Submit" value="Login" class="LoginBtn" name="LoginBtn">&nbsp;&nbsp;&nbsp;<a href="forgotpassword.php">Forgot Password</a>
                                        </td>
                                    </tr>
                                    <?php
                                        if (isset($message)) {
                                            echo "<tr><td  style='padding:5px'><div style='color:red;text-align:left'>&nbsp;".$message."</div></td></tr>";
                                        }
                                    ?>
                                </table>       
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
     </form> 
     </section>
<?php  include("file/footer.php");?>