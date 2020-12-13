<?php 
    ini_set( "display_errors", 0);
    session_start();    
    include_once("php/class.DatabaseController.php");
    $mysql = new MySqldatabase("localhost","kasupana_user","mysqlPwd@123","kasupana_database");

    function validate($value) {
        return (strlen(trim($value))>0)? 0 : 1;
    }
    
    function isValidEmail($email){
        return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
    } 
    
    function generatePassword($length=9, $strength=0) {
        $vowels = 'aeuy';
        $consonants = 'bdghjmnpqrstvz';
        if ($strength & 1) {$consonants .= 'BDGHJLMNPQRSTVWXZ';}
        if ($strength & 2) {$vowels .= "AEUY";}
        if ($strength & 4) {$consonants .= '23456789';}
        if ($strength & 8) {$consonants .= '@#$%';}
        $password = '';
        $alt = time() % 2;
        for ($i = 0; $i < $length; $i++) {
            if ($alt == 1) {
                $password .= $consonants[(rand() % strlen($consonants))];
                $alt = 0;
            } else {
                $password .= $vowels[(rand() % strlen($vowels))];
                $alt = 1;
            }
        }
        return $password;
    }
    
    function getrealname($seoname) {
        $seoname = preg_replace('/\%/',' percentage',$seoname);
        $seoname = preg_replace('/\@/',' at ',$seoname);
        $seoname = preg_replace('/\&/',' and ',$seoname);
        $seoname = preg_replace('/[\s\W]+/','',$seoname);    // Strip off spaces and non-alpha-numeric
        $seoname = preg_replace('/[\.]+$/','',$seoname); // // Strip off the ending hyphens
        $seoname = strtolower($seoname);
        return $seoname;
    }
    
    function getAds($area) {
        $result="<div style='text-align:center;margin-top:18px'>";
        $path = "ads/".$area;
        $dir = scandir($path);    
        foreach($dir as $d ){
            if (($d!=".") && ($d!="..") && ($d!=".svn")){
               $result.="<img src='".$path."/".$d."' height='124' width='172' style='margin-bottom:10px;'><br>";
            }
        }
        return $result."</div>";
    }
 
    
    if (isset($_REQUEST['wpage']) && ($_REQUEST['wpage']=='logout')) {
        $_SESSION['user']['id']  = "-1";
        $_SESSION['user']['role']= "";  
        sleep(2);
        echo "<script>location.href='./';</script>";
    }
    
               

    if (isset($_POST['username']) && (isset($_POST['password']))) {
      
        if (($_POST['username']=="malaysiaadmin") && ($_POST['password']=="c4cat")) {
            $_SESSION['user']['role']="admin";
            $_SESSION['country']="Malaysia";
            sleep(2);
            echo "<script>location.href='webadmin';</script>";
        }  else  if (($_POST['username']=="admin") && ($_POST['password']=="keju18183bm")) {
            $_SESSION['user']['role']="admin";
            sleep(2);
            echo "<script>location.href='webadmin';</script>";
        }  else  if (($_POST['username']=="12district") && ($_POST['password']=="mydistrict")) { 
             $_SESSION['user']['role']="12district"; 
             sleep(2);
            echo "<script>location.href='12district';</script>";
        }  else  if (($_POST['username']=="erode") && ($_POST['password']=="myerode")) { 
             $_SESSION['user']['role']="erode"; 
             sleep(2);
            echo "<script>location.href='erode';</script>";
        }  if (($_POST['username']=="staff") && ($_POST['password']=="mystaff")) {
            $_SESSION['user']['role']="staff";
            sleep(2);
            echo "<script>location.href='staff';</script>";
        } else {
            $loginData = $mysql->select("select * from _clients where emailid='".$_POST['username']."' and password='".$_POST['password']."' and isactive=1 and isblock=0");
            if (sizeof($loginData)==1) {
                  $_SESSION['user']= $loginData[0];
                  $_SESSION['user']['role']="clients";
                  sleep(2);   
                   echo "<script>location.href='myhome';</script>";
            } else {
                $loginError="User authentication failed. please try again.";
            }
        }
    } 
?>
<html>
    <head>
        <title>Earn Money Tech</title>
        <style>
            .hmenu {color:#E8FFD2;font-weight:bold;font-family:arial;text-transform: uppercase;text-decoration: none;font-size:11px;}
            .hmenu:hover {color:#ffffff;font-weight:bold;font-family:arial;text-transform: uppercase;text-decoration: none;font-size:12px;}
            .question {color:#264A94;font-weight:bold;font-family:arial;text-align: left;font-size:13px;}
            .answer {color:#333;font-weight:normal;font-family:arial;text-align: left;margin-bottom:10px;font-size:13px;line-height:20px;text-align: justify;}
            .man {color:red;padding-left:3px;}
            .fadein { position:relative;}
            .lmenu {text-decoration: none;color:#214689;}
            .lmenu:hover {text-decoration: underline;color:#214689;font-weight:bold}
            .fadein img { left:7; top:0; }
            .flink {color:#FFF8C4;text-decoration: none;font-family:arial;font-size:12px;font-weight:bold}
            .flink:hover {color:#fff;text-decoration: underline;font-family:arial;font-size:12px;font-weight:bold}
        </style>
        <script type="text/javascript" src="../js/jquery-1.5.1.js"></script>
        <script type="text/javascript" src="js/jquery-1.5.1.js"></script>
    </head>
    <body bgcolor="#A1BCD9" style="background: #FF6600;">
        <center>
            <div style="width:988px;">
               <div style="text-align: center;font-size:30px;color:white;font-weight:bold;font-family:arial;">
               <img src="images/_logo.png">
               </div>
               
               <div> 
                    <table style="background: url('images/topmenu.png') no-repeat;width:978px;height:46px;" border="0">
                        <tr>
                            <td width="078" align="center"><a href="index.php" class="hmenu">HOME</a></td>
                            <td width="192" align="center"><a href="shopping" class="hmenu">ONLINE SHOPPING</a></td>
                            <td width="109" align="center"><a href="register" class="hmenu">REGISTER</a></td>
                            <td width="115" align="center"><a href="admatter" class="hmenu">ADVERTISEMENT</a></td>
                            <td width="144" align="center"><a href="extraincome" class="hmenu">OFF LINE JOBS</a></td>
                            <!--<td width="088" align="center"><a href="faq" class="hmenu">FAQ</a></td>-->
                            <td width="088" align="center"><a href="demowork" class="hmenu">DEMO WORK</a></td>
                            <td width="085" align="center"><a href="support" class="hmenu">CONTACT</a></td>
                            <td width="095" align="center"><a href="onlinejobs" class="hmenu">ONLINE JOBS</a></td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>
                <div style="background: white;">   
                <div style="height:255px;background :url('images/slidebackground.png') no-repeat #fff;overflow:hidden">
                    <div style="padding-top:5px;" >
                    <div class="fadein">  
                        <img src="images/bannera.png" alt="" title=""/>
                         <img src="images/bannerb.png" alt="" title=""/> 
                         <img src="images/bannerc.png" alt="" title=""/>  
                         <img src="images/bannerd.png" alt="" title=""/>  
                         <img src="images/bannere.png" alt="" title=""/> 
                         </div> 
                    </div>
                </div>
                <table style="background: url('images/menu.png') no-repeat;width:969px;height:114px" cellspacing="18">
                    <tr>
                        <td valign="top" width="200" style="padding-left:12 ;">
                            <div style="cursor:pointer" onclick="location.href='register';">
                                <div style="font-size:22px;font-family:Arial;color:white;font-weight:bold;">
                                    <img src="images/register.png" width="36" align="absmiddle">&nbsp;&nbsp;Register Now
                                </div>
                                <div style="font-size:13px;font-family:Arial;color:white;">Become our member and start earning...</div>
                            </div>
                        </td>
                        <td valign="top" width="230" style="padding-left:17;">
                            <div style="cursor:pointer" onclick="location.href='extraincome';">
                                <div style="font-size:22px;font-family:Arial;color:white;font-weight:bold;"> 
                                    <img src="images/play.png"  width="36" align="absmiddle">&nbsp;&nbsp;Earn More
                                </div>
                                <div style="font-size:13px;font-family:Arial;color:white;">Huge collection of useful sales products...</div>
                            </div>
                        </td>
                        <td valign="top" width="200"  style="padding-left:14;"> 
                            <div style="cursor:pointer" onclick="location.href='features';">
                                <div style="font-size:22px;font-family:Arial;color:white;font-weight:bold;"> 
                                    <img src="images/piechart.png"  width="36" align="absmiddle">&nbsp;&nbsp;Features
                                </div>
                                <div style="font-size:13px;font-family:Arial;color:white;">Read more about our Membership Features...</div>
                            </div>
                        </td>
                        <td valign="top"  style="padding-left:18;" >
                            <div style="cursor:pointer" onclick="location.href='faq';">
                                <div style="font-size:22px;font-family:Arial;color:white;font-weight:bold;"> 
                                    <img src="images/monitor.png"  width="36" align="absmiddle">&nbsp;&nbsp;FAQS
                                </div>
                                <div style="font-size:13px;font-family:Arial;color:white;">Read the most Frequently Asked Questions...</div>
                            </div>
                        </td>
                    </tr>
                </table>  
                <div>
                    <table cellpadding="5" cellspacing="0" style="width: 99%;">
                        <tr>
                            <td valign="top" width="195">
                                <table width="98%" cellpadding="5" cellspacing="0">
                                    <tr style="background:url('images/widgettop.png') no-repeat;height:15px;">
                                        <td style="height:15px;"></td>
                                    </tr>
                                    <tr bgcolor="#FFD29B" >
                                        <td valign="top">
                                            <center>
                                                <div style="text-align:left;font-family: arial;font-size:11px;font-weight: bold;color:#FF0F0F;border-bottom:1px solid #FF0F0F;width:90%;padding-bottom:10px">
                                                    <img src="images/folder_icon.png" align="absmiddle" width="32">&nbsp;&nbsp;Distributor Profile
                                                </div>
                                                <div style="text-align:left;background:#FFEDD8;height:80px;width:90%;margin-top:10px;font-family:arial;font-size:12px;color:#222;padding:5px;">
                                                    <?php if ($_SESSION['user']['role']=="clients"){ ?>
                                                         <b><?php echo $_SESSION['user']['firstname'];?><br></b>
                                                        <?php echo $_SESSION['user']['emailid'];?><br>
                                                        <?php echo $_SESSION['user']['city'];?><br>
                                                        <?php echo $_SESSION['user']['state'];?><br>
                                                    <?php } else {?> 
                                                        <b>earnmoneytech<br></b>
                                                        info@earnmoneytech.com<br>
                                                        India<br>
                                                    <?php } ?>
                                                </div>
                                                <div style="height:10px;"></div>
						                    </center>
                                        </td>
                                    </tr>
                                    <tr style="background: url('images/widgetbottom.png') no-repeat;">
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                                <br> 
                                <div>
                                <table width="98%" cellpadding="5" cellspacing="0">
                                    <tr style="background:url('images/widgettop.png') no-repeat;height:15px;">
                                        <td style="height:15px;"></td>
                                    </tr>
                                    <tr bgcolor="#FFD29B" >
                                        <td valign="top">
                                            <center>  
                                                <div style="text-align:left;font-family: arial;font-size:11px;font-weight: bold;color:#FF0F0F;border-bottom:1px solid #FF0F0F;width:90%;padding-bottom:10px;">
                                                    <img src="images/folder_icon.png" align="absmiddle" width="32">&nbsp;&nbsp;Advertisement:
                                                </div><br>
                                                <A href='spokenenglish'> <img src="images/_pack2.jpg?rnd=123" style="width: 180px;border:0px;"></a>
                                              <!--  
                                                <marquee direction='up' scrollamount=2 style='height:200px;'>
                                               
                                               <table style="font-size:12px;font-family:arial;" cellpadding="2" cellspacing="3" width="100%">
                                                    <tr><td width="12" align="right"><img src="images/1rightarrow.png" width="12"></td><td style="padding-left:0 ;">Online Copy & Paste AD</td></tr>
                                                    <tr><td width="12" align="right"><img src="images/1rightarrow.png" width="12"></td><td style="padding-left:0 ;"> Face book id Creation</td></tr>   
                                                    <tr><td width="12" align="right"><img src="images/1rightarrow.png" width="12"></td><td style="padding-left:0 ;">Twitter id  Creation </td></tr>   
                                                    <tr><td width="12" align="right"><img src="images/1rightarrow.png" width="12"></td><td style="padding-left:0 ;">Gmail id creation  </td></tr>   
                                                    <tr><td width="12" align="right"><img src="images/1rightarrow.png" width="12"></td><td style="padding-left:0 ;">You tube id Creation  </td></tr>   
                                                    <tr><td width="12" align="right"><img src="images/1rightarrow.png" width="12"></td><td style="padding-left:0 ;">Form Filling    </td></tr>   
                                                    <tr><td  width="12" align="right" valign="top"><img src="images/1rightarrow.png" width="12"></td><td style="padding-left:0 ;">Vodafone & Idea Voice Chat Process  </td></tr>   
                                                    <tr><td valign="top"><img src="images/1rightarrow.png" width="12"></td><td style="padding-left:0 ;">Call centre Online and Off line   </td></tr>   
                                                    <tr><td width="12" align="right"><img src="images/1rightarrow.png" width="12"></td><td style="padding-left:0 ;">Online and Off line  survey  </td></tr>   
                                                    <tr><td width="12" align="right"><img src="images/1rightarrow.png" width="12"></td><td style="padding-left:0 ;">Data Entry         </td></tr>   
                                                    <tr><td  width="12" align="right"valign="top"><img src="images/1rightarrow.png" width="12"></td><td style="padding-left:0 ;">Yahoo Power point slide  show </td></tr>   
                                                </table>
                                             
                                                </marquee>
                                                -->
                                            </center>
                                        </td>
                                    </tr>
                                    <tr style="background: url('images/widgetbottom.png') no-repeat;">
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                                   <br>
                                <script type="text/javascript" src="http://feedjit.com/serve/?vv=955&amp;tft=3&amp;dd=0&amp;wid=a6dcdc675b7ff9d0&amp;pid=0&amp;proid=0&amp;bc=FFFFFF&amp;tc=000000&amp;brd1=012B6B&amp;lnk=135D9E&amp;hc=FFFFFF&amp;hfc=2853A8&amp;btn=C99700&amp;ww=190&amp;wne=10&amp;wh=Live+Traffic+Feed&amp;hl=0&amp;hlnks=0&amp;hfce=0&amp;srefs=0&amp;hbars=0"></script><noscript><a href="http://feedjit.com/">Feedjit Live Blog Stats</a></noscript>
                                
                                <Br><bR><br>
                                 
                                <br> 
                                                                     <br><Br>
                           <!--     <marquee direction='up' scrollamount=2  behavior="alternate" style='height:400px;'>
                                <?php //echo getAds("right"); ?>
                                <a href="http://www.kejujobs.com"><img src='ads/right/d.png'></a><br><br>
                                <a href="http://www.no1marriage.com"><img src='ads/right/c.png'></a><br><br>
                                <a href="support"><img src='ads/right/b.png'></a><br><br>
                                <a href="support"><img src='ads/right/a.png'></a><br><Br>
                                </marquee>
                                <br><br><a href="extraincome"><img src='ads/right/spokenenglish.png' style="border:1px solid #ccc"></a><br><br>
-->
                                </div>         
                            </td>                   
                            <td valign="top" style="background:url('images/bg_.png') no-repeat #FEFEFF;">
                            <br>  
                                <div class="cfadein">
                                
                                      <a href="lfranchise"><img src='images/fran.png?rand=2' border="0" width="560"></a>   
                                     
                                </div>
                <div style="text-align:left;margin:10px;font-family:arial;font-size:12px;line-height: 20px;text-align:justify;">     
                                    <?php
                                        if (isset($_REQUEST['wpage']) ) {
                                            $param=explode("-",$_REQUEST['wpage']);
                                            if (sizeof($param)==2) {
                                                // check it is valid url
                                                $linkdata = $mysql->select("select * from _clients where userlink='".$_REQUEST['wpage']."' and isactive=1 and isblock=0");
                                                if (sizeof($linkdata)==1) {
                                                    // update visitor counts
                                                     $mysql->execute("update _clients set visitors=(visitors+1) where id=".$linkdata[0]['id']);
                                                     // update register session
                                                     $_SESSION['refference']=$linkdata[0]['id'];
                                                     // redirect the page
                                                     sleep(1);
                                                     echo "<script>location.href='./register';</script>";
                                                } else {
                                                    sleep(1);
                                                    echo "<script>location.href='./';</script>";
                                                }
                                            } else {
                                                switch ($_REQUEST['wpage']) {
                                                    // Guest
                                                    case 'features'             : include_once("pages/features.php");break;
                                                    case 'onlinejobs'             : include_once("pages/onlinejobs.php");break;
                                                    case 'member'               : include_once("pages/member.php");break;
                                                    case 'faq'                  : include_once("pages/faq.php");break;
                                                    case 'demowork'                  : include_once("pages/demowork.php");break;
                                                    case 'admatter'             : include_once("pages/admatter.php");break;
                                                    case 'register'             : include_once("pages/register.php");break;
                                                    case 'extraincome'          : include_once("pages/extraincome.php");break;
                                                    case 'support'              : include_once("pages/support.php");break;
                                                    case 'startworking'         : include_once("pages/startworking.php");break;
                                                    case 'profileadmatters'     : include_once("pages/admatters.php");break;
                                                    case 'forgotpassword'       : include_once("pages/forgotpassword.php");break;
                                                    case 'spokenenglish'        : include_once("pages/spokenenglish.php");break;
							   case 'shopping'             : include_once("pages/shopping.php");break;
                                                    // Clients 
                                                    case 'addbank'              : if ($_SESSION['user']['role']=="clients"){include_once("clients/addbank.php");}break;
                                                    case 'addnominee'           : if ($_SESSION['user']['role']=="clients"){include_once("clients/addnominee.php");}break;
                                                    case 'changepassword'       : if ($_SESSION['user']['role']=="clients"){include_once("clients/changepassword.php");}break;
                                                    case 'sendrequest'          : if ($_SESSION['user']['role']=="clients"){include_once("clients/sendrequest.php");}break;
                                                    case 'servicerequest'       : if ($_SESSION['user']['role']=="clients"){include_once("clients/servicerequest.php");}break;
                                                    case 'myprofile'            : if ($_SESSION['user']['role']=="clients"){include_once("clients/myprofile.php");}break;
                                                    case 'myaccount'            : if ($_SESSION['user']['role']=="clients"){include_once("clients/myaccount.php");}break;
                                                    case 'myhome'               : if ($_SESSION['user']['role']=="clients"){include_once("clients/myhome.php");}break;
                                                    case 'earning'              : if (($_SESSION['user']['role']=="clients") || ($_SESSION['user']['role']=="admin")){include_once("clients/earning.php");}break;
                                                    case 'withdrawal'           : if (($_SESSION['user']['role']=="clients") || ($_SESSION['user']['role']=="admin")){include_once("clients/withdrawal.php");}break;
                                                    case 'servicerequest'       : if ($_SESSION['user']['role']=="clients"){include_once("clients/servicerequest.php");}break;
                                                    case 'sendrequest'          : if ($_SESSION['user']['role']=="clients"){include_once("clients/sendrequest.php");}break;
                                                                                                        case 'myclients'          : if ($_SESSION['user']['role']=="clients"){include_once("clients/myclients.php");}break;
                                                    case 'visitorhistory'       : if ($_SESSION['user']['role']=="clients"){include_once("clients/visitorhistory.php");}break;

                                                    // Admin 
                                                    case 'webadmin'            : if ($_SESSION['user']['role']=="admin") {include_once("admin/webadmin.php");}break;  
                                                    case 'newclients'           : if (($_SESSION['user']['role']=="admin") || ($_SESSION['user']['role']=="erode") || ($_SESSION['user']['role']=="12district") || ($_SESSION['user']['role']=="staff") ) {include_once("admin/newclients.php");}break;  
                                                    case 'blockedclients'       : if (($_SESSION['user']['role']=="admin") || ($_SESSION['user']['role']=="erode") || ($_SESSION['user']['role']=="12district") || ($_SESSION['user']['role']=="staff"))  {include_once("admin/blockedclients.php");}break;  
                                                    case 'activeclients'        : if (($_SESSION['user']['role']=="admin") || ($_SESSION['user']['role']=="erode") || ($_SESSION['user']['role']=="12district") ) {include_once("admin/activeclients.php");}break;  
                                                    case 'editclient'           : if (($_SESSION['user']['role']=="admin") || ($_SESSION['user']['role']=="erode") || ($_SESSION['user']['role']=="12district") || ($_SESSION['user']['role']=="staff") ) {include_once("admin/editclient.php");}break;  
                                                    case 'updateclient'         : if ($_SESSION['user']['role']=="admin") {include_once("admin/updateclient.php");}break;  
                                                    case 'editrequest'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/editrequest.php");}break;  
                                                    case 'adpayment'            : if ($_SESSION['user']['role']=="admin") {include_once("admin/adpayment.php");}break;  
                                                    case 'disableaccount'       : if ($_SESSION['user']['role']=="admin") {include_once("admin/disableaccount.php");}break;  
                                                    case 'filter'               : if ($_SESSION['user']['role']=="admin") {include_once("admin/filterclients.php");}break;  
                                                    
                                                    case 'lfranchise'           : if ($_SESSION['user']['role']=="admin") {include_once("admin/franchise.php");}break;  
                                                    case 'visalist'             : if ($_SESSION['user']['role']=="admin") {include_once("admin/visalist.php");}break;  
                                                    case 'addproduct'           : if ($_SESSION['user']['role']=="admin") {include_once("admin/addproduct.php");}break;  
                                                    case 'districtwise'         : if ($_SESSION['user']['role']=="admin") {include_once("admin/districtwise.php");}break; 
                                                    case 'adsoftware'         : if ($_SESSION['user']['role']=="admin") {include_once("admin/adsoftware.php");}break; 
                                                    
                                                    case '12district'         : if ($_SESSION['user']['role']=="12district") {include_once("admin/12district.php");}break; 
                                                    case 'erode'         : if ($_SESSION['user']['role']=="erode") {include_once("admin/erode.php");}break; 

                                                     case 'contactlater'           : if (($_SESSION['user']['role']=="admin") || ($_SESSION['user']['role']=="staff")) {include_once("admin/contactlater.php");}break;  
                                                    case 'donotcontact'         : if (($_SESSION['user']['role']=="admin") || ($_SESSION['user']['role']=="staff"))  {include_once("admin/donotcontact.php");}break;  
                                                     case 'staff'  : if ($_SESSION['user']['role']=="staff") {include_once("admin/staff.php");}break;  
                                                    
                                                                           
                                                    default : include_once("pages/home.php");break;
                                                }
                                            }
                                        } else {
                                            include_once("pages/home.php"); 
                                        }
                                    ?>
                                </div>
                            </td>
                            <td valign="top" width="195">
                                <table width="98%" cellpadding="5" cellspacing="0">
                                    <tr style="background:url('images/widgettop.png') no-repeat;height:15px;">
                                        <td style="height:15px;"></td>
                                    </tr>
                                    <tr bgcolor="#FFD29B">
                                        <td valign="top">
						                    <center>
                                                <div style="text-align:left;font-family: arial;font-size:11px;font-weight: bold;color:#FF0F0F;border-bottom:1px solid #FF0F0F;width:90%;padding-bottom: 10px;">
                                                    <img src="images/folder_icon.png" align="absmiddle" width="32">&nbsp;&nbsp;Member's Login
                                                </div>
                                                <div style="width:90%;margin-top:10px;">
                                                    <?php if ($_SESSION['user']['role']=="clients") { ?>
                                                        <table cellpadding="2" cellspacing="5" style="text-align:left;font-size:12px;font-family:arial;" width="100%">
                                                            <tr><td><a href="myhome" class="lmenu">Home</a></td></tr>
                                                            <tr><td><a href="myprofile" class="lmenu">My Profile</a></td></tr>
                                                            <tr><td><a href="addbank" class="lmenu">Add Bank Details</a></td></tr>
                                                            <tr><td><a href="addnominee" class="lmenu">Add Nominee Details</a></td></tr>
                                                            <tr><td><a href="changepassword" class="lmenu">Change Password</a></td></tr>
                                                            <tr><td><a href="servicerequest" class="lmenu">Withdrawal Request</a></td></tr>
                                                            <tr><td><a href="myclients" class="lmenu">My Clients</a></td></tr>
                                                            <tr><td><a href="visitorhistory" class="lmenu">Visitor's History</a></td></tr>
                                                            <tr><td><a href="logout" class="lmenu">Logout</a></td></tr>
                                                        </table>
                                                        <div  style="margin-top:10px;margin-bottom:10px;border-bottom:1px solid #214689"></div>
                                                        <table cellpadding="2" cellspacing="5" style="text-align:left;font-size:12px;font-family:arial;" width="100%">
                                                            <tr><td><a href="profileadmatters" class="lmenu">Ad Matters</a></td></tr>  
                                                            <tr><td><a href="startworking" class="lmenu">Start Working</a></td></tr>  
                                                            <tr><td><a href="extraincome"  class="lmenu">Extra Income</a></td></tr>  
                                                        </table>    
                                                    <?php }  else if ($_SESSION['user']['role']=="staff") { ?>
                                                          <table cellpadding="2" cellspacing="5" style="text-align:left;font-size:12px;font-family:arial;" width="100%">
                                                            <tr><td><a href="staff" class="lmenu">Home</a></td></tr>
                                                            <tr><td><a href="newclients" class="lmenu">New Clients</a></td></tr>
                                                            <tr><td><a href="contactlater" class="lmenu">Contact Later</a></td></tr>
                                                            <tr><td><a href="donotcontact" class="lmenu">Don't Contact</a></td></tr>
                                                            <tr><td><a href="logout" class="lmenu">Logout</a></td></tr>
                                                        </table>
                                                        
                                                        <?php } else if ($_SESSION['user']['role']=="admin")  { ?>
                                                           <table cellpadding="2" cellspacing="5" style="text-align:left;font-size:12px;font-family:arial;" width="100%">
                                                            <tr><td><a href="webadmin" class="lmenu">Admin Home</a></td></tr>
                                                            <tr><td><a href="newclients" class="lmenu">New Clients</a></td></tr>
                                                            <tr><td><a href="blockedclients" class="lmenu">Blocked Clients</a></td></tr>
                                                            <tr><td><a href="activeclients" class="lmenu">Active Clients</a></td></tr>
                                                            <tr><td><a href="adsoftware" class="lmenu">Ad Software</a></td></tr>
                                                            <tr><td><a href="adpayment" class="lmenu">Make Payment</a></td></tr>
                                                            <?php
                                                                if ($_SESSION['country']!="Malaysia") {     
                                                            ?>
                                                            <tr><td><a href="districtwise" class="lmenu">District Wise</a></td></tr>
                                                            <?php } ?>
                                                            <tr><td><a href="logout" class="lmenu">Logout</a></td></tr>
                                                        </table>
                                                           <?php } else if ($_SESSION['user']['role']=="erode")  { ?>  
                                                            <table cellpadding="2" cellspacing="5" style="text-align:left;font-size:12px;font-family:arial;" width="100%">
                                                            <tr><td><a href="erode" class="lmenu">Admin Home</a></td></tr>
                                                            
                                                             <tr><td><a href="logout" class="lmenu">Logout</a></td></tr>
                                                        </table>                             
                                                      <?php } else if ($_SESSION['user']['role']=="12district")  { ?>  
                                                            <table cellpadding="2" cellspacing="5" style="text-align:left;font-size:12px;font-family:arial;" width="100%">
                                                            <tr><td><a href="12district" class="lmenu">Admin Home</a></td></tr>
                                                            
                                                             <tr><td><a href="logout" class="lmenu">Logout</a></td></tr>
                                                        </table>                             
                                                    <?php } else { ?>
                                                        <form action="" method="post">
                                                            <table style="text-align:left;font-family: arial;font-size:12px;color:#333" width="100%">
                                                                <tr><td>E-mail id</td></tr>
                                                                <tr><td><input type="text" name="username" style="border: 1px solid #97BEEF;width:100%;padding:2px;"></td></tr>
                                                                <tr><td>Password</td></tr>
                                                                <tr><td><input type="password" name="password" style="border: 1px solid #97BEEF;;width:100%;padding:2px;"></td></tr>
                                                                <tr><td style="padding-top:5px ;"><input type="image" src="images/insider_login_button.gif"></td></tr>
                                                                <tr><td style="padding-top:5px"><a href="forgotpassword" style="text-decoration: none;color:#214689;">Forgot Password?</a></td></tr>
                                                                <?php if (strlen($loginError)>4) {?>
                                                                <tr><td style="color: red"><?php echo $loginError;?></td></tr>
                                                                <?php } ?> 
                                                            </table>
                                                        </form>
                                                    <?php } ?>                                                
                                                </div>	
						                    </center>
                                        </td>
                                    </tr>
                                    <tr style="background: url('images/widgetbottom.png') no-repeat;">
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                                <br> 
                                <table width="98%" cellpadding="5" cellspacing="0">
                                    <tr style="background:url('images/widgettop.png') no-repeat;height:15px;">
                                        <td style="height:15px;"></td>
                                    </tr>
                                    <tr bgcolor="#FFD29B">
                                        <td valign="top">
                                            <center>
                                                <div style="text-align:left;font-family: arial;font-size:11px;font-weight: bold;color:#FF0F0F;border-bottom:1px solid #FF0F0F;width:90%;padding-bottom:10px;">
                                                    <img src="images/folder_icon.png" width="32" align="absmiddle">&nbsp;&nbsp;Recent Members
                                                </div>
                                                <div style="width:90%;margin-top:10px;">
                                                    <marquee scrollamount=2 direction="up" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 2, 0);" style="height:150px">
                                                        <table cellpadding="2" cellspacing="5" style="text-align:left;font-size:12px;font-family:arial;" width="100%">
                                                        <?php
                                                                $recentmembers = $mysql->select("select * from _clients where isactive=1 and isblock=0 order by activatedon desc limit 0,12");
                                                                foreach($recentmembers as $rmember) {
                                                        ?>
                                                            <tr><td style='color:#214689;'><?php echo $rmember['firstname'];?></td></tr>  
                                                        <?php } ?>
                                                        </table>                                                   
                                                    </marquee>
                                                </div>    
                                            </center>
                                        </td>
                                    </tr>
                                    <tr style="background: url('images/widgetbottom.png') no-repeat;">
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>  
                                <br>
                                <p align="center">
                                    <img src="http://s04.flagcounter.com/count/1E6/bg_FFFFFF/txt_000000/border_CCCCCC/columns_2/maxflags_46/viewers_Earn+Money+Tech+Com/labels_0/pageviews_1/flags_1/" alt="free counters" border="0">
                                </p>
                                
                             <!--   <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fearnmoneytech&amp;width=190&amp;height=350&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:190px; height:350px;border:1px solid #FFD29B;" allowTransparency="true"></iframe>
                                <br><br>
                                <marquee direction='up' scrollamount=2  behavior="alternate" style='height:400px;'>
                                <?php //echo getAds("right"); ?>
                                <a href="support"><img src='ads/right/a.png'></a><br><Br>
                                <a href="support"><img src='ads/right/b.png'></a><br><br>
                                <a href="http://www.no1marriage.com"><img src='ads/right/c.png'></a><br><br>
                                <a href="http://www.kejujobs.com"><img src='ads/right/d.png'></a>
                                </marquee>                            
                                <br><br><a href="extraincome"><img src='ads/right/spokenenglish.png' style="border:1px solid #ccc"></a><br><br> -->
                            </td>
                        </tr>
                    </table>
                </div> 
                 
            </div>
            <div style="width: 988px;height: 50px;background:url('images/slidebackground_.png') no-repeat"></div>
            <div style="width:980px;color:#FFF8C4;font-family:arial;font-size:12px;font-weight: bold;">
                <br>
                <a class="flink" href="http://www.earnmoneytech.com">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a class="flink"  href="features">Membership Features</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a class="flink" href="register">Register Now</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a class="flink" href="admatter">Advertisement</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a class="flink" href="extraincome">Earn More</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a class="flink" href="faq">FAQS</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <a class="flink" href="support">Contact</a><br><br>
                All rights reserved. earnmoneytech 2012
            </div>
            </div>            
        </center>
    </body>
</html>
<script>$(function(){$('.fadein img:gt(0)').hide();setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');},3000);});</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33846595-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>