<?php
    ini_set( "display_errors", 0);
    session_start();    
    date_default_timezone_set('Asia/Calcutta');
    include_once("controller/class.DatabaseController.php");
    include_once("controller/class.MobileSMSController.php");
    include_once("controller/class.EmailController.php");
    $mysql = new MySqldatabase("localhost","kasupana_user","mysqlPwd@123","kasupana_database");
    define("YEAR_FROM",date("Y"));
    define("YEAR_TO",date("Y")+1);
    $month = array("","JAN","FEB","MAR","APR","MAY","JUN","JLY","AUG","SEP","OCT","NOV","DEC");
    
                                       
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require __DIR__.'/lib/mail/src/Exception.php';
    require __DIR__.'/lib/mail/src/PHPMailer.php';
    require __DIR__.'/lib/mail/src/SMTP.php';
    $mail    = new PHPMailer;
    function reInitMail() {
        global $mail;
        $mail    = new PHPMailer;
    }   

    function validate($value) {
        return (strlen(trim($value))>0)? 0 : 1;
    }
    
    function getReferalIncome($JobTypeID) {
        global $mysql;
        $jobtypes = $mysql->select("select * from _tbl_JobTypes where JobTypeID='". $JobTypeID."'");
        return $jobtypes[0]['ReferalIncome'];
    }
    
    function isValidEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
    
    if (isset($_GET['wpage']) && $_GET['wpage']=="usr_logout")                                         {
        session_destroy();
        echo "<script>location.href='PlayAndWin';</script>";
        exit;
    }
    
    if (isset($_REQUEST['wpage']) && ($_REQUEST['wpage']=='logout')) {
        $_SESSION['user']['id']  = "-1";
        $_SESSION['user']['role']= "";  
        sleep(2);
        echo "<script>location.href='./';</script>";
    }
    
    function getLink($n,$text) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'.$text; 
        $randomString = '@'; 
        for ($i = 0; $i < $n; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        } 
        return $randomString; 
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
        $seoname = str_replace(' ','',$seoname); // // Strip off the ending hyphens
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
    
    if (isset($_POST['loginBtn'])) {
        
        
        $admin_loginData = $mysql->select("select * from _admins where Username='".$_POST['username']."' and UserPassword='".$_POST['password']."'");
        $loginData = $mysql->select("select * from _clients where emailid='".$_POST['username']."' and password='".$_POST['password']."'");
        
        if (sizeof($admin_loginData)==1) {
            $_SESSION['user']= $admin_loginData[0];
            sleep(2);
            if ($admin_loginData[0]['role']=="admin") {
                echo "<script>location.href='webadmin';</script>";    
                exit;
            } elseif ($admin_loginData[0]['role']=='fadmin') {
                echo "<script>location.href='franchiseeadmin';</script>";    
                exit;
            }
            
            
            
        } elseif (sizeof($loginData)==1) {
            
            if ($loginData[0]['isactive']==1) {
                $_SESSION['user']= $loginData[0];             
                $_SESSION['user']['role']="clients";
                sleep(2);   
                echo "<script>location.href='myhome';</script>";
                exit;
            } else {
                $_SESSION['xuser']= $loginData[0];
                echo "<script>location.href='AccountActivation';</script>";
                exit;
            }
        } else {
            $loginError="User authentication failed. please try again.";
        }
        
    }
     
    $dashboard = "login";
    if ($_SESSION['user']['role']=="admin") {
        $dashboard= "webadmin";
    }
     if ($_SESSION['user']['role']=="fadmin") {
        $dashboard= "franchiseeadmin";
    }
    if ($_SESSION['user']['role']=="clients") {
        $dashboard= "myhome";
    }
    
    class DealMaass {
        
        var $userid = 0;
        
        function getBalance() {
            
            global $mysql;
            if (!($this->userid>0)) 
                return "0.00";

            $d = $mysql->select("select sum(cramount-dramount) as bal from _acc_txn where userid=".$this->userid);
            if (sizeof($d)>0) {
                return isset($d[0]['bal']) ? $d[0]['bal'] : "0.00";    
            } else {
                return "0.00";
            }
        }                          
        function getUserBalance($userid) {
            
            global $mysql;
            
            $d = $mysql->select("select sum(cramount-dramount) as bal from _acc_txn where userid='".$userid."'");
           
                return isset($d[0]['bal']) ? $d[0]['bal'] : "0.00";    
            
        }
        
        
        function getPoints($userid) {
            global $mysql;
             $d = $mysql->select("select sum(Credits-Debits) as bal from _tblPoints where userid='".$userid."'");
           
                return isset($d[0]['bal']) ? $d[0]['bal'] : "0";    
          
        }
        
         function getReferalEarnings($userid) {
            
            global $mysql;
            
            $d = $mysql->select("select sum(cramount-dramount) as bal from _acc_txn where IsReferalIncome='1' and userid='".$userid."'");
           
                return isset($d[0]['bal']) ? $d[0]['bal'] : "0.00";    
            
        }
        
         function getCashWining($userid) {
            
            global $mysql;
            
            $d = $mysql->select("select sum(cramount-dramount) as bal from _acc_txn where IsEarning='1' and userid='".$userid."'");
           
                return isset($d[0]['bal']) ? $d[0]['bal'] : "0.00";    
            
        }
        
        
        function getLowestBidRate($itemid) {
            
            global $mysql; 
            $bid = $mysql->select("SELECT * FROM _bids AS bid ,
                                (SELECT MIN(bidrate) AS bidrate FROM 
                                    (SELECT COUNT(*) AS COUNT, bidrate FROM  _bids WHERE productid='".$itemid."' GROUP BY bidrate) AS t1 
                                        WHERE t1.count=1 ) AS t2 WHERE bid.bidrate = t2.bidrate AND productid='".$itemid."' ");
                                         return $bid;
        }
        
        function GetLowestBidUserName($itemid) {
            global $mysql; 
            $bid = $this->getLowestBidRate($itemid);
            if (sizeof($bid)>0) {
                $user= $mysql->select("select * from _usertable where userid=".$bid[0]['userid']);
                return $user[0]['personname'];
            } else {
                return "";
            }   
        }
        
        function getWinnerM2W($itemID) {
            global $mysql;
            $item =  $mysql->select("select * from _items where itemid='".$itemID."'");
            $bidusers = $mysql->select("select * from _bids as b where b.productid='".$itemID."' and b.bidrate='".$item[0]['skey']."'"); 
            if (sizeof($bidusers)>0) {
                $user= $mysql->select("select * from _usertable where userid=".$bidusers[0]['userid']);   
                return $user[0]['personname'];
            } else {
                return "N/A";
            }
        }
    }

    $dealmaass = new DealMaass();
                                    
    if ($_SESSION['USER']['userid']>0) {
        $dealmaass->userid = $_SESSION['USER']['userid'];   
        $UserCurrency = ($_SESSION['USER']['country']=="India") ? 'RS' : 'RM'; 
    }
  /*  
    if (isset($_POST['cartItem'])) {
        $p = $mysql->select("select * from _items where md5(itemid)='".$_POST['cartItem']."'");
        $_SESSION['cartItem'][] = $p[0];
    }
    
    if (isset($_POST['removeItem']))   {
        $c=0;
        foreach($_SESSION['cartItem'] as $citem) {     
             if ($citem['itemid']==$_POST['removeItem']) {
                 $r = $c;
             }
             $c++;
        }
        
        unset($_SESSION['cartItem'][$r]);
        $_SESSION['cartItem'] = array_values($_SESSION['cartItem']);
    }
    
    if (sizeof($_SESSION['cartItem'])>0) {
        $subtotal = 0;
        foreach($_SESSION['cartItem'] as $citem) {
            $subtotal += $citem['ourprice'];
        }
        
        $cartString = "Cart: ".sizeof($_SESSION['cartItem'])." item(s) - Rs. ".number_format($subtotal,2);      
    } else {
          $cartString = "Cart: 0 item(s)";  
    }
    */
    $parray = array("webadmin","login","withdrawal","earning","sendrequest","servicerequest","visitorhistory","myclients","myhome","updateclient","filter","adpayment",
     "GameRegister", "Withdraw", "AccountActivation", "WithdrawalRequests", "GAME_WithdrawRequests", "WithdrawRequestView", "WithdrawRequests",   "bookandwin_edit","GAME_FundTransfer", "bookandwin_view", "S2W", "S2W_HowToPlay", "S2W_PlayGame",  "S2W_AddItem","S2W_ListItems","S2W_EditItem", "S2W_viewItem",   "winners", "Payment", "AdMoney", "WalletPayment",   "winners_edit",  "gameusers",    "bookandwin_new",    "testimonials_new", "testimonials", "testimonials_edit", "winners_new", "Testimonials",  "Winners", "TBA_HowToPlay", "M2W_HowToPlay",
    "adPostingList", "gamevisitorhistory",  "earningfromreferal",    "earningcashwinning",    "WalletPaymentPaypal",
     "CollegeAdmission",               "manageTopEarns",    "addTopEarns",  "topearners_edit",
     "Service_Add","Service_List",  "Service_Edit",  "BuyPayment",
     
       "Offer_Add", "Offer_Edit","Offer_List",  "MyDocuments",    "Franchisee_Add","Franchisee_List","Franchisee_Edit",   "DistrictFranchisee_edit",
       "Doc_Add", "Doc_Edit","Doc_List",   "pjhowtoplay",
     "contactus", "PGTxn", "myreferals", "usr_mypage", "Error", "TBA_PlayGame", "GamesTermsofConditions", "timebased_new", "timebased_view","timebased_edit", "timebased_users", "timebasedAuction", "bidbasedAuction", "bookandwin", "GamePortal", "GAME_WalletRequests", "buynow", "usr_postbids", "approve", "usr_bidhistory", "usr_accountsumary", "requesttowalletupdate", "PlayAndWin", "M2W_PlayGame", "adPostingTitles","viewproduct", "BBA_viewItem", "BBA_EditItem", "BBA_ListItems", "BBA_AddItem", "M2W_viewItem", "M2W_EditItem", "M2W_ListItems", "M2W_AddItem", "PlayGame", "EditProduct", "Description", "addProduct", "AllProducts", "ListProducts", "viewProduct",   "changepassword","addnominee","addbank","myprofile","newclients","blockedclients","activeclients","editclient","editrequest","resumes","paidresumes","viewresume");
      
           function getBrowserType() {
        
        if (!empty($_SERVER['HTTP_USER_AGENT'])) { 
           $HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT']; 
        } else if (!empty($HTTP_SERVER_VARS['HTTP_USER_AGENT'])) { 
           $HTTP_USER_AGENT = $HTTP_SERVER_VARS['HTTP_USER_AGENT']; 
        } else if (!isset($HTTP_USER_AGENT)) { 
           $HTTP_USER_AGENT = ''; 
        } 

        

        return $HTTP_USER_AGENT;
    }        
?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>kasupanamthuttu.com</title>
      <base href="https://www.kasupanamthuttu.com/">
      <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="owl-carousel/owl.theme.css"> 
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>    
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"  crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"   crossorigin="anonymous">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"  crossorigin="anonymous"></script>
      
      
      <script>
        function cd(endDate,divId) {
            var timeevent = new Date(endDate);
            var now = new Date();
            var timeDiff = timeevent.getTime() - now.getTime();
            if (timeDiff <= 0) {
                clearTimout(timer);
                document.write("Template Countdown finished");
            }
            var seconds = Math.floor(timeDiff / 1000);
            var minutes = Math.floor(seconds / 60);
            var hours = Math.floor(minutes / 60);
            var days = Math.floor(hours /24);
            var dd = ""; var hh = ""; var mm = ""; var ss = "";
            hours %=24; minutes %= 60; seconds %=60;
            if (seconds == 1) { ss = "Sec"; } else ss = "Secs";
            if (minutes == 1) { mm = "Min"; } else mm = "Mins";
            if (hours == 1)   { hh = "Hr"; } else hh = "Hrs";
            if (days == 1) { dd = "Day"; } else dd = "Days";    
            document.getElementById("daysBox_"+divId).innerHTML = days;
            document.getElementById("hoursBox_"+divId).innerHTML = hours;
            document.getElementById("minsBox_"+divId).innerHTML = minutes;
            document.getElementById("secsBox_"+divId).innerHTML = seconds;
            document.getElementById("ddBox_"+divId).innerHTML = dd;
            document.getElementById("hhBox_"+divId).innerHTML = hh;
            document.getElementById("mmBox_"+divId).innerHTML = mm;
            document.getElementById("ssBox_"+divId).innerHTML = ss;
            var timer = setTimeout("cd('"+endDate+"','"+ divId +"')",1000);
        }
        </script>
        <style>
            .bidderinfo {margin:5px;text-align:center;border:1px solid #eee;background:#fffaed;padding:5px;font-size:12px;}
            .timecaption {font-family:arial;font-size:10px;}
            .timeresult {font-family:arial;font-size:16px;font-weight:bold;}  
            #cBox {text-align:center;background:#257FCB;border-radius:5px;padding:2px;width:90%;margin:0px auto;font-family:arial;font-size:12px;text-align:center;color:#ffffff;border:1px solid #37C9F2}      
            .fadein { position:relative;}
            .lmenu {text-decoration: none;color:#214689;}
            .lmenu:hover {text-decoration: underline;color:#214689;font-weight:bold}
            .fadein img { left:7; top:0; }    
            div {font-family:arial;font-size:12px;}     
            .sub_Menu {cursor:pointer;float:left;color:#ffffff;font-weight:Bold;font-family:arial;font-size:12px;padding:5px;text-align:left;border-right:1px dotted #cccccc;padding-left:15px;padding-right: 15px;}
            ._mnu {color:#666666;font-family: arial;font-size:13px;text-decoration: none;font-weight:bold;}
            ._mnu:hover {text-decoration:underline;font-weight:bold;font-size:13px;}
            h1,h2,h3,h4,h5,h6 {font-family:arial;color:#4C525B;border-bottom:1px solid #4C525B;margin-bottom:25px;}
            .pagecontent {font-family:arial;font-size:14px;line-height:23px;color:#222222;text-align:justify}
        </style>
        <link rel="stylesheet" href="css/components.css">
        <link rel="stylesheet" href="css/icons.css">
        <link rel="stylesheet" href="css/responsee.css">
   </head>
   <body class="size-960">
      <header>
         <div class="line">
            <div class="box" style="background:none;padding-left:0px;padding-bottom:2px;padding-top:10px">
               <div class="s-12 l-12">
                  <img class="" src="assets/logo0.png" style="height:65px;">
               </div>
            </div>
         </div>
         <div class="line">                                         
            <nav class="margin-bottom">
               <div class="top-nav s-12 l-12">
                  <ul>
                     <li><a href="index.php">Home</a></li>
                     <!--<li><a href="register">Register Now</a></li>-->
                     <!--<li><a href="GameRegister">Register Now</a></li>-->
                     <li><a href="fulltimejob">Full Time Job</a></li>
                     <!--<li><a href="PlayAndWin">Play and Win</a></li>-->
                     <li><a href="PartTimeJob">Part Time Job</a></li>
                     <li><a href="shippingjobs">Shipping Job</a></li>
                     <li><a href="Services">Extra Benefits</a></li>
                     <li><a href="Buy">Bright Future</a></li>
                     <li><a href="CollegeAdmission">College Admission</a></li>
                     
                     <?php if ($dashboard!="login") {?>
                        <li style="float:right"><a href="<?php echo $dashboard;?>"><i class="icon-sli-book-open" style="font-weight:bold;"></i>&nbsp;&nbsp;Dashboard</a></li>
                     <?php } else { ?>
                        <li style="float:right"><a href="login"><i class="icon-sli-login" style="font-weight:bold;"></i>&nbsp;&nbsp;Login</a></li>
                     <?php } ?>
                  </ul>
               </div>               
            </nav>                                               
         </div>
      </header>                                    
      <section>
         <div class="line">
            <div id="header-carousel" class="owl-carousel owl-theme margin-bottom">
                <?php if ($_REQUEST['wpage']=="shippingjobs")   {?>
                    <div class="item"><img src="assets/ship_banner1.png" alt=""></div>
                    <div class="item"><img src="assets/ship_banner2.png" alt=""></div>
                    <div class="item"><img src="assets/ship_banner3.png" alt=""></div>
                <?php } elseif ($_REQUEST['wpage']=="fulltimejob") {?>
                    <div class="item"><img src="assets/job1.png" alt=""></div>
                    <div class="item"><img src="assets/job2.png" alt=""></div>
                    <div class="item"><img src="assets/job3.png" alt=""></div>
                <?php } elseif ($_REQUEST['wpage']=="xCollegeAdmission") {?>
                    <div class="item"><img src="assets/collegebanner1.png" alt=""></div>
                    <div class="item"><img src="assets/collegebanner2.png" alt=""></div>
                <?php } else {
                        if (isset($_POST['agree'])) {
                            $parray[] = "register";
                        }
                        if (!(in_array($_REQUEST['wpage'],$parray))) { 
                ?>
                    <div class="item"><img src="assets/banner1.png" alt=""></div>
                    <div class="item"><img src="assets/banner2.png" alt=""></div>
                    <div class="item"><img src="assets/banner3.png" alt=""></div>
            
                <?php }
                } ?>                       
            </div>
         </div>
        
         <!-- HOME PAGE BLOCK -->      
         <div class="line" style="display: none;">
            <div class="margin">
               <div class="s-12 m-6 l-4 margin-bottom">
                  <div class="box">
                     <h2>About</h2>
                     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                  </div>
               </div>
               <div class="s-12 m-6 l-4 margin-bottom">
                  <div class="box">
                     <h2>Company</h2>
                     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                  </div>
               </div>
               <div class="s-12 m-6 l-4 margin-bottom">
                  <div class="box">
                     <h2>Services</h2>
                     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                  </div>
               </div>
            </div>
            
         </div>
 
         <?php
         //$x = $mysql->select("select * from _usertable");
         //foreach($x as $xx ) {
           // $mysql->execute("update _usertable set rlink='".$xx['userid']."@".getrealname($xx['personname'])."' where userid='".$xx['userid']."'");    
        // }
         
         
                                        if (isset($_REQUEST['wpage']) ) {
                                            $param=explode("-",$_REQUEST['wpage']);
                                            $param2=explode("@",$_REQUEST['wpage']);
                                            //$param=explode("@",$_REQUEST['wpage']);
                                            //  $link=$data[0]['id']."-".getrealname($data[0]['firstname']);
                                            if (sizeof($param)==2 || sizeof($param2)==2) {
                                                
                                               if (sizeof($param)==2)  {
                                                $linkdata = $mysql->select("select * from _clients where userlink='".$_REQUEST['wpage']."' and isactive=1 and isblock=0");
                                                if (sizeof($linkdata)==1) {
                                                     $mysql->execute("update _clients set visitors=(visitors+1) where id=".$linkdata[0]['id']);
                                                     $_SESSION['refference']=$linkdata[0]['id'];
                                                     sleep(1);
                                                     echo "<script>location.href='./register';</script>";
                                                } else {
                                                    sleep(1);
                                                    echo "<script>location.href='./';</script>";
                                                }
                                               }
                                               
                                               
                                               if (sizeof($param2)==2)  {
                                                $linkdata = $mysql->select("select * from _usertable where rlink='".$_REQUEST['wpage']."'");
                                                if (sizeof($linkdata)==1) {
                                                     $mysql->execute("update _usertable set visitors=(visitors+1) where userid=".$linkdata[0]['userid']);
                                                     
                                                    $_SESSION['xrefference']=$linkdata[0]['userid']; 
                                                     
                      //$json = json_decode(file_get_contents("http://api.ipinfodb.com/v3/ip-city/?key=550aff244c23ee15e1dfca6551d6afc2e9fdf79f4d976952b4688a667a782dbf&ip=".$_SERVER['REMOTE_ADDR']."&format=json"));
    $url = "https://api.ipinfodb.com/v3/ip-city/?key=550aff244c23ee15e1dfca6551d6afc2e9fdf79f4d976952b4688a667a782dbf&ip=".$_SERVER['REMOTE_ADDR']."&format=json";
    
       $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $json = json_decode(curl_exec($ch),true);
    $error = curl_error($ch);
    curl_close($ch);
     
    
      $array = array(
     
        "browser"=>getBrowserType(),
        "ip"=>$_SERVER['REMOTE_ADDR'],
        "country"=>$json['countryName'],
        "regionname"=>$json['regionName'],         
        "cityname"=>$json['cityName'],
        "latitude"=>$json['latitude'],
        "longitude"=>$json['longitude'],
        "timezone"=>$json['timeZone'],
        "viewon"=>date("Y-m-d H:i:s"),
        "userid"=>(($_SESSION['xrefference']>0)? $_SESSION['xrefference']: '0')
      );
                                                    
                                                      
           if (true) {
           //if ($_SESSION['xrefference']!=$_SESSION['USER']['userid']) {
          $d = $mysql->select("select * from _uservisits where ip='".$_SERVER['REMOTE_ADDR']."' and userid='".$_SESSION['xrefference']."' and (date(viewon) = date('".date("Y-m-d")."'))");

          $rclient = $mysql->select("select * from _usertable where userid=".$_SESSION['xrefference']);    

          
          if (sizeof($d)==0) {     
            $recordId = $mysql->insert("_uservisits",$array);
        
        /*    if ($rclient[0]['plan']==1) {
                $cramount_ref=1.00;
            } else if ($rclient[0]['plan']==2) {
                $cramount_ref=2.00;
            } else if ($rclient[0]['plan']==3) {
                $cramount_ref=3.00;    
            }*/
       
       
     /*  if ($rclient[0]['country']=="india") {
        $cramount_ref = getCommissionAmount($rclient[0]['country'],$rclient[0]['plan'])    ;
        
            $array = array("clientid"=>$_SESSION['refference'],
                "date"=>date("Y-m-d H:i:s"),
                "particulars" => "Earn via visting your link - ".$recordId,
                "cramount" => $cramount_ref,
                "dramount" => '0',
                "description"=>"Earn via visting your link - ".$recordId
            );
            $recordId = $mysql->insert("_clients_account",$array);        
          }
        }  */
          
       
                                                     
                                                     
                                                     
                                                     
          }   
           }                                
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     sleep(1);
                                                     echo "<script>location.href='./GameRegister';</script>";
                                                } else {
                                                    sleep(1);
                                                    echo "<script>location.href='./';</script>";
                                                }
                                               }
                                               
                                               
                                                
                                                
                                                
                                                
                                                
                                            } else {
                                                
                                                
                                                
                                                switch ($_REQUEST['wpage']) {
                                                    // Guest
                                                    case 'postresume'             : include_once("pages/postresume.php"); break;
                                                    case 'ResumePayment'             : include_once("pages/ResumePayment.php"); break;
                                                    case 'shippingjobs'             : include_once("pages/shippingjobs.php"); break;
                                                    case 'PlayAndWin'             : include_once("pages/PlayAndWin.php");break;
                                                    case 'M2W_PlayGame'             : include_once("pages/M2W_PlayGame.php");break;
                                                    case 'Offer'             : include_once("pages/Offer.php");break;
                                                    case 'Payment'             : include_once("pages/Payment.php");break;
                                                    case 'AdMoney'             : include_once("pages/AdMoney.php");break;
                                                    case 'WalletPayment'             : include_once("pages/WalletPayment.php");break;
                                                    case 'WalletPaymentPaypal'             : include_once("pages/WalletPaymentPaypal.php");break;
                                                    case 'Error'             : include_once("pages/Error.php");break;
                                                    case 'AboutUs'             : include_once("pages/AboutUs.php");break;
                                                    case 'Privacy'             : include_once("pages/Privacy.php");break;
                                                    case 'Services'             : include_once("pages/Services.php");break;
                                                    case 'Buy'             : include_once("pages/Buy.php");break;
                                                    case 'CollegeAdmission'             : include_once("pages/CollegeAdmission.php");break;
                                                    case 'PartTimeJob'             : include_once("pages/PartTimeJob.php");break;
                                                    case 'GameRegister'             : include_once("pages/GameRegister.php");break;
                                                    case 'AccountActivation'             : include_once("pages/AccountActivation.php");break;
                                                    
                                                    case 'TBA_PlayGame'             : include_once("pages/TBA_PlayGame.php");break;
                                                    case 'S2W_PlayGame'             : include_once("pages/S2W_PlayGame.php");break;
                                                    case 'S2W_HowToPlay'             : include_once("pages/S2W_HowToPlay.php");break;
                                                    case 'S2Win_PlayGame'             : include_once("pages/S2Win_PlayGame.php");break;
                                                    case 'GamePortal'             : include_once("pages/GamePortal.php");break;
                                                   
                                                    case 'Testimonials'             : include_once("pages/Testimonials.php");break;
                                                    case 'Winners'             : include_once("pages/Winners.php");break;
                                                    case 'TBA_HowToPlay'             : include_once("pages/TBA_HowToPlay.php");break;
                                                    case 'M2W_HowToPlay'             : include_once("pages/M2W_HowToPlay.php");break;
                                                    case 'GamesTermsofConditions'             : include_once("pages/GamesTermsofConditions.php");break;
                                                   
                                                    case 'login'             : include_once("pages/login.php");break;
                                                    case 'fulltimejob'             : include_once("pages/fulltimejob.php");
                                                                  
                                                    break;
                                                    case 'features'             : include_once("pages/features.php");break;
                                                    case 'onlinejobs'             : include_once("pages/onlinejobs.php");break;
                                                    case 'member'               : include_once("pages/member.php");break;
                                                    case 'faq'                  : include_once("pages/faq.php");break;
                                                    case 'demowork'                  : include_once("pages/demowork.php");break;
                                                    case 'admatter'             : include_once("pages/admatter.php");break;
                                                    case 'register'             : include_once("pages/register.php");break;
                                                    case 'extraincome'          : include_once("pages/extraincome.php");break;
                                                    case 'contactus'              : include_once("pages/contactus.php");break;
                                                    case 'startworking'         : include_once("pages/startworking.php");break;
                                                    case 'profileadmatters'     : include_once("pages/admatters.php");break;
                                                    case 'forgotpassword'       : include_once("pages/forgotpassword.php");break;
                                                    
                                                    case 'spokenenglish'        : include_once("pages/spokenenglish.php");break;
                               case 'shopping'             : include_once("pages/shopping.php");break;
                               case 'BuyPayment'             : include_once("pages/BuyPayment.php");break;
                               
                               case 'MyDocuments'       : include_once("pages/MyDocuments.php");break;
                                                    // Clients 
                                                    case 'Description'              : if ($_SESSION['user']['role']=="clients"){include_once("clients/Description.php");}break;
                                                    
                                                    
                                                    case 'buynow'              : 
                                                    if ($_SESSION['user']['role']=="clients") {
                                                        include_once("pages/buynow.php");
                                                    } else {
                                                        include_once("pages/buynow.php");
                                                    }
                                                    break;
                                                    
                                                    case 'PlayGame'              : 
                                                    if ($_SESSION['user']['role']=="clients") {
                                                        include_once("clients/PlayGame.php");
                                                    } else {
                                                        include_once("pages/PlayGame.php");
                                                    }
                                                    break;
                                                    
                                                    
                                                    case 'usr_mypage' :
                                                    
                                                    if (isset($_SESSION['USER']['userid'])) {
                                                        include_once("game_clients/usr_mypage.php");
                                                    }
                                                    break; 
                                                    
                                                    case 'earningcashwinning' :
                                                    
                                                    if (isset($_SESSION['USER']['userid'])) {
                                                        include_once("game_clients/usr_mypage.php");
                                                    }
                                                    
                                                    case 'myreferals' :
                                                    
                                                    if (isset($_SESSION['USER']['userid'])) {
                                                        include_once("game_clients/myreferals.php");
                                                    }
                                                    break;
                                                    
                                                    case 'S2W' :
                                                    
                                                    if (isset($_SESSION['USER']['userid'])) {
                                                        include_once("pages/S2W.php");
                                                    }
                                                    break;
                                                    
                                                    case 'Withdraw' :
                                                    
                                                    if (isset($_SESSION['USER']['userid'])) {
                                                        include_once("game_clients/Withdraw.php");
                                                    }
                                                    break;
                                                    
                                                      
                                                    
                                                    case 'gamevisitorhistory' :
                                                    
                                                    if (isset($_SESSION['USER']['userid'])) {
                                                        include_once("game_clients/gamevisitorhistory.php");
                                                    }
                                                    break;
                                                    
                                                    case 'earningfromreferal' :
                                                    
                                                    if (isset($_SESSION['USER']['userid'])) {
                                                        include_once("game_clients/earningfromreferal.php");
                                                    }
                                                    break;
                                                    
                                                    
                                                    
                                                    
                                                    
                                                     case 'WithdrawalRequests' :
                                                    
                                                    if (isset($_SESSION['USER']['userid'])) {
                                                        include_once("game_clients/WithdrawalRequests.php");
                                                    }
                                                    break;
                                                    
                                                    case 'usr_bidhistory' :
                                                    
                                                    if (isset($_SESSION['USER']['userid'])) {
                                                        include_once("game_clients/usr_bidhistory.php");
                                                    }
                                                    break;
                                                    
                                                    case 'usr_activebidhistory' :
                                                    
                                                    if (isset($_SESSION['USER']['userid'])) {
                                                        include_once("game_clients/usr_activebidhistory.php");
                                                    }
                                                    break;
                                                    
                                                    case 'usr_accountsumary' :
                                                    
                                                    if (isset($_SESSION['USER']['userid'])) {
                                                        include_once("game_clients/usr_accountsumary.php");
                                                    }
                                                    break;
                                                    
                                                    case 'requesttowalletupdate' :
                                                    
                                                    if (isset($_SESSION['USER']['userid'])) {
                                                        include_once("game_clients/requesttowalletupdate.php");
                                                    }
                                                    break; 
                                                    
                                                    case 'usr_postbids' :
                                                    
                                                    if (isset($_SESSION['USER']['userid'])) {
                                                        include_once("pages/usr_postbids.php");
                                                    }
                                                    break;
                                                    
                                                    
                                                    case 'pjhowtoplay'              : if ($_SESSION['user']['role']=="clients"){include_once("clients/pjhowtoplay.php");}break;
                                                    case 'addbank'              : if ($_SESSION['user']['role']=="clients"){include_once("clients/addbank.php");}break;
                                                    case 'AllProducts'              : if ($_SESSION['user']['role']=="clients"){include_once("clients/AllProducts.php");}break;
                                                    case 'viewProduct'              : if ($_SESSION['user']['role']=="clients"){include_once("clients/viewProduct.php");}break;
                                                    case 'adPostingList'              : if ($_SESSION['user']['role']=="clients"){include_once("clients/adPostingList.php");}break;
                                                    case 'adPostingTitles'              : if ($_SESSION['user']['role']=="clients"){include_once("clients/adPostingTitles.php");}break;
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
                                                    
                                                    case 'franchiseeadmin'     : if ($_SESSION['user']['role']=="fadmin") {include_once("admin/franchiseeadmin.php");}break;  
                                                    case 'fnewclients'         : if (($_SESSION['user']['role']=="fadmin")) {include_once("admin/fnewclients.php");}break;  
                                                    case 'fblockedclients'     : if (($_SESSION['user']['role']=="fadmin"))  {include_once("admin/fblockedclients.php");}break;  
                                                    case 'factiveclients'      : if (($_SESSION['user']['role']=="fadmin")) {include_once("admin/factiveclients.php");}break;  
                                                    case 'fgameusers'      : if (($_SESSION['user']['role']=="fadmin")) {include_once("admin/fgameusers.php");}break;  
                                                   
                                                    
                                                    case 'webadmin'            : if ($_SESSION['user']['role']=="admin") {include_once("admin/webadmin.php");}break;  
                                                    
                                                    
                                                    case 'manageTopEarns'            : if ($_SESSION['user']['role']=="admin") {include_once("admin/TopEarners/list.php");}break;  
                                                    case 'addTopEarns'            : if ($_SESSION['user']['role']=="admin") {include_once("admin/TopEarners/new.php");}break;  
                                                    case 'topearners_edit'            : if ($_SESSION['user']['role']=="admin") {include_once("admin/TopEarners/edit.php");}break;  
                                                    
                                                    case 'addProduct'            : if ($_SESSION['user']['role']=="admin") {include_once("admin/addProduct.php");}break;  
                                                    case 'ListProducts'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/ListProducts.php");}break;  
                                                    case 'viewproduct'           : if ($_SESSION['user']['role']=="admin") {include_once("admin/viewProduct.php");}break;  
                                                    case 'EditProduct'           : if ($_SESSION['user']['role']=="admin") {include_once("admin/EditProduct.php");}break;  
                                                                
                                                    
                                                    case 'S2W_AddItem'           : if ($_SESSION['user']['role']=="admin") {include_once("admin/Strach2Win/AddItem.php");}break;  
                                                    case 'S2W_ListItems'         : if ($_SESSION['user']['role']=="admin") {include_once("admin/Strach2Win/ListItems.php");}break;  
                                                    case 'S2W_EditItem'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Strach2Win/EditItem.php");}break;  
                                                    case 'S2W_viewItem'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Strach2Win/viewItem.php");}break;  
                                                   
                                                                                                        
                                                    case 'M2W_AddItem'           : if ($_SESSION['user']['role']=="admin") {include_once("admin/Match2Win/AddItem.php");}break;  
                                                    case 'M2W_ListItems'         : if ($_SESSION['user']['role']=="admin") {include_once("admin/Match2Win/ListItems.php");}break;  
                                                    case 'M2W_EditItem'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Match2Win/EditItem.php");}break;  
                                                    case 'M2W_viewItem'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Match2Win/viewItem.php");}break;  
                                                   
                                                    case 'bookandwin_view'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Match2Win/bookandwin_view.php");}break;  
                                                    case 'bookandwin_new'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Match2Win/bookandwin_new.php");}break;  
                                                    case 'bookandwin_edit'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Match2Win/bookandwin_edit.php");}break;  
                                                    case 'bookandwin'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Match2Win/bookandwin.php");}break;  
                                                    
                                                    case 'timebasedAuction'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/TBA/timebasedAuction.php");}break;  
                                                    case 'timebased_edit'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/TBA/timebased_edit.php");}break;  
                                                    case 'timebased_view'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/TBA/timebased_view.php");}break;  
                                                    case 'timebased_users'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/TBA/timebased_users.php");}break;  
                                                    case 'timebased_new'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/TBA/timebased_new.php");}break;  
                                                              
                                                    case 'testimonials'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/testimonials/testimonials.php");}break;  
                                                    case 'testimonials_edit'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/testimonials/testimonials_edit.php");}break;  
                                                    case 'testimonials_new'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/testimonials/testimonials_new.php");}break;  
                                                              
                                                    case 'winners'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Winners/winners.php");}break;  
                                                    case 'winners_edit'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Winners/winners_edit.php");}break;  
                                                    case 'winners_new'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Winners/winners_new.php");}break;  
                                                   
                                                    case 'Service_Add'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Services/ServicesNew.php");}break;  
                                                    case 'Service_List'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Services/ListOfServices.php");}break;  
                                                    case 'Service_Edit'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Services/ServicesEdit.php");}break;  
                                                                       
                                                     case 'Offer_Add'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Offers/new.php");}break;  
                                                    case 'Offer_List'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Offers/list.php");}break;  
                                                    case 'Offer_Edit'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Offers/edit.php");}break;  
                                                  
                                                     case 'Doc_Add'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Documents/new.php");}break;  
                                                    case 'Doc_List'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Documents/list.php");}break;  
                                                    case 'Doc_Edit'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/Documents/edit.php");}break;  
                                                    
                                                    case 'Franchisee_Add'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/DistrictFranchisee/new.php");}break;  
                                                    case 'Franchisee_List'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/DistrictFranchisee/list.php");}break;  
                                                    case 'Franchisee_Edit'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/DistrictFranchisee/edit.php");}break;  
                                                  
                                                  
                                                    case 'WithdrawRequestView'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/WithdrawRequestView.php");}break;  
                                                    case 'gameusers'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/gameusers.php");}break;  
                                                    case 'PGTxn'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/PGTxn.php");}break;  
                                                
                                                    
                                                    case 'GAME_WalletRequests'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/walletrequests.php");}break;  
                                                    case 'GAME_FundTransfer'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/fundtransfer.php");}break;  
                                                    case 'GAME_WithdrawRequests'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/WithdrawRequests.php");}break;  
                                                    case 'approve'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/approve.php");}break;  
                                                   
                                                    case 'bidbasedAuction'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/BidBased/bidbasedAuction.php");}break;  
                                                    case 'bidbased_users'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/BidBased/bidbased_users.php");}break;  
                                                    
                                                    case 'bidbased_view'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/BidBased/bidbased_view.php");}break;  
                                                    case 'bidbased_new'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/BidBased/bidbased_new.php");}break;  
                                                    case 'bidbased_edit'          : if ($_SESSION['user']['role']=="admin") {include_once("admin/BidBased/bidbased_edit.php");}break;  
                                                    
                                                    
                                                  //  case 'viewproduct'            : if ($_SESSION['user']['role']=="admin") {include_once("admin/viewProduct.php");}break;  
                                                  //  case 'EditProduct'            : if ($_SESSION['user']['role']=="admin") {include_once("admin/EditProduct.php");}break;  
                                                    
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
                                                     case 'resumes'  : if ($_SESSION['user']['role']=="admin") {include_once("admin/resumes.php");}break;  
                                                     case 'paidresumes'  : if ($_SESSION['user']['role']=="admin") {include_once("admin/paidresumes.php");}break;  
                                                     case 'viewresume'  : if ($_SESSION['user']['role']=="admin") {include_once("admin/viewresume.php");}break;  
                                                    
                                                                           
                                                    default : include_once("pages/home.php");break;
                                                }
                                                
                                                
                                            }
                                        } else {
                                            include_once("pages/home.php"); 
                                        }
                                    ?>
                                    
      
         
      <!-- FOOTER -->
      <section>
         <div class="line">
         <div class="box margin-bottom">
      <div class="row">
        <div class="col-sm-8"></div>
        <div class="col-sm-4">
            <a href="https://info.flagcounter.com/HaLc"><img src="https://s01.flagcounter.com/count2/HaLc/bg_FFFFFF/txt_000000/border_CCCCCC/columns_3/maxflags_24/viewers_0/labels_1/pageviews_1/flags_0/percent_0/" alt="Flag Counter" border="0"></a>
        </div>
      </div>
        </div>
      </div>
      </section>
      <footer class="line">
         <div class="box">
            <div class="s-12 l-9">
                <div>
                    <a href="https://www.kasupanamthuttu.com/AboutUs" style="color:orange">About Us</a>  &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="https://www.kasupanamthuttu.com/Privacy" style="color:orange">Privacy Policy</a>  &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="https://www.kasupanamthuttu.com/contactus" style="color:orange">Contact Us</a>  &nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="https://www.kasupanamthuttu.com/GamesTermsofConditions" style="color:orange">Game Terms & Conditions</a>  
                </div>
               <p>Copyright 2019-2020, kasupanamthuttu.com</p>
            </div>
            <div class="s-12 l-3" style="text-align: right;">
                <img src="https://www.kasupanamthuttu.com/assets/footerpayments.png" style="height: 80px;">
            </div>
           <!-- <div class="s-12 l-6">
               <a class="right" href="http://www.myresponsee.com" title="Responsee - lightweight responsive framework">Design and coding by Responsee Team</a>
            </div>-->
         </div>
      </footer>                                                                   
      <script type="text/javascript" src="https://www.kasupanamthuttu.com/js/responsee.js"></script>               
      <script type="text/javascript" src="https://www.kasupanamthuttu.com/owl-carousel/owl.carousel.js"></script>
      
      <script type="text/javascript">
        jQuery(document).ready(function($) {
          var owl = $('#header-carousel');
          owl.owlCarousel({
           /* nav: true,
            dots: true, */
            items: 1,
            loop: true,
            navText: ["&#xf007","&#xf006"],
            autoplay: true,
            autoplayTimeout: 3000
          });
          var owl = $('#gallery-carousel');
          owl.owlCarousel({
          /*  nav: false,
            dots: true,  */
            loop: true,
            navText: ["&#xf007","&#xf006"],
            autoplay: true,
            autoplayTimeout: 3000,
            responsive: {
              0: {
                items: 1
              },
              769: {
                items: 2
              },
              960: {
                items: 4
              }
            }
          });
        })
      </script>
   </body>
</html>