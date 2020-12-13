<?php
    session_start();
    date_default_timezone_set("Asia/Calcutta");  
    include_once("classes/mysql.php");
    include_once("classes/Rc43.php");       
    //$mysql = new MySql("localhost","kasupana_user","mysqlPwd@123","kasupana_wincashdeal");
    $mysql = new MySql("localhost","kasupana_user","mysqlPwd@123","kasupana_wincashdeal");
    
    class DealMaass {
        
        var $userid = 0;
        
        function getBalance() {
            
            global $mysql;
            
            if (!($this->userid>0)) 
            return "0.00";
           
            
          //  $d = $mysql->select("select sum(creditamt-debitamount) as bal from _useraccount where userid=".$this->userid);
            $d = $mysql->select("select sum(cramount-dramount) as bal from _acc_txn where userid=".$this->userid);
            if (sizeof($d)>0) {
            return isset($d[0]['bal']) ? $d[0]['bal'] : "0.00";    
            } else {
                return "0.00";
            }
            
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
    }

                                       
    
    $dealmaass = new DealMaass();
    
    if ($_SESSION['USER']['userid']>0) {
     $dealmaass->userid = $_SESSION['USER']['userid'];   
     $UserCurrency = ($_SESSION['USER']['country']=="India") ? 'RS' : 'RM'; 
    }
    
    
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" >
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>WinCashDeal.com | Online Shopping </title>
        <base href="https://wincashdeal.kasupanamthuttu.com/">
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
        <script>
                         function getMenuItems(div) {
                             var bg;
                             switch (div) {
                                 case  'timeBased' :
                                    bg = '#C024BC';
                                    
                                    break;
                                    
                                      case  'bidBased' :
                                    bg = '#FF2626';
                                    
                                    break;
                                    
                                    case 'bookWin' :
                                           bg = '#A3A3A3'; 
                                               
                                    break;
                                    
                                    case 'mypage' : 
                                           bg = '#233842'; 
                                            break;  
                                            
                                                                                case 'freeparttimejob' : 
                                           bg = '#F1F1F1'; 
                                            break;
                                            
                                                                           case  'shopping' :
                                    bg = '#FA2898';
                                    
                                    break;
                                           
                                            
                                            default : 
                                                bg = '#FFFFFF'    ;
                                               
                            } 
                               $('#subMenu').html($('#'+div).html());
                               $('#subMenu').css({'background':bg});
                               
                            
                               
                         }
                </script>
        <script src="js/jquery.min.js"></script>
        <style>
            .timecaption {font-family:arial;font-size:10px;}
            .timeresult {font-family:arial;font-size:16px;font-weight:bold;}  
            #cBox {text-align:center;background:#45D4FF;border-radius:5px;padding:2px;width:27px;font-family:arial;font-size:12px;text-align:center;color:#ffffff;border:1px solid #37C9F2}      
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
    </head>
    <body style="margin:0px;background:#FFEED3" >
        <table align="center" cellpadding="5" cellspacing="5" width="1078" style="background:#FFEED3;border:3px solid #FFEED3">
            <tr>
                <td style="padding: 0px;padding-left:5px;"><img src="images/_wincashdeal.png"><br></td>
                <td>
                <a href="p/viewCart" target="_self" style="text-decoration:none"><div style="background:url(images/cardN.png) no-repeat;width:255px;padding:10px;font-weight:Bold;color:#ffffff;font-size:13px;">
                    <?php echo $cartString; ?>
                </div></a>
                <?php if ($_SESSION['USER']['userid']>0) {?>
                    <table align="right" style="font-family:arial;font-size:12px;width:271px;background:#E8FFD2;margin-right:4px;border:1px solid #5AC333;margin-top: -5px;" cellspacing="4" cellspacing="0" >
                        <tr>
                            <td style="font-weight:bold;">Dear <i><?php echo $_SESSION['USER']['personname'];?></i></td>
                        </tr>
                        <tr>
                            <td style="font-size:11px;">
                            Wallet : <?php echo $UserCurrency.". ".number_format($dealmaass->getBalance(),2);?>&nbsp;|&nbsp;
                             <a href="p/usr_mypage" style="color:#333333;text-decoration: none;" target="_self">My Page</a>&nbsp;|&nbsp;
                             <a href="p/usr_logout" style="color:#333333;text-decoration: none;" target="_self">Logout</a>
                             </td>
                        </tr>
                    </table>
                    <?php } else { ?>
                    <table align="right" style="font-family:arial;font-size:12px;width:271px;background:#E8FFD2;margin-right:4px;border:1px solid #5AC333;margin-top: -5px;" cellspacing="4" cellspacing="0" >
                        <tr>
                            <td style="font-weight:bold;"></td>
                        </tr>
                        <tr>
                            <td style="font-size:11px;">
                             <a href="p/register" style="color:#333333;text-decoration: none;" target="_self">Register</a>&nbsp;|&nbsp;
                             <a href="p/register" style="color:#333333;text-decoration: none;" target="_self">Login</a> 
                             </td>
                        </tr>
                    </table>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div>
                        <div style="cursor:pointer;border-radius:5px 5px 0px 0px;float:left;background-image:url(images/bg.png);color:#ffffff;font-weight:Bold;font-family:arial;font-size:12px;padding:5px;width:130px;text-align:center"
                          onclick="getMenuItems('home');location.href='http://www.wincashdeal.com';" id='_timeBased'>
                            Home   
                        </div>
                        <div style="cursor:pointer;border-radius:5px 5px 0px 0px;float:left;background-image:url(images/bg.png);color:#ffffff;font-weight:Bold;font-family:arial;font-size:12px;padding:5px;width:130px;text-align:center;margin-left:5px"
                          onclick="getMenuItems('timeBased');location.href='p/tba_live_auctions';" id='_timeBased'>
                            Time Based Auction   
                        </div>
                        <div style="cursor:pointer;border-radius:5px 5px 0px 0px;margin-left:5px;float:left;background-image:url(images/bg_red.png);color:#ffffff;font-weight:Bold;font-family:arial;font-size:12px;padding:5px;width:130px;text-align:center"
                            onclick="getMenuItems('bidBased');location.href='p/bba_live_auctions';"  id='_bidBased'>
                            Bid Based Auction 
                        </div>
                         <div style="cursor:pointer;border-radius:5px 5px 0px 0px;margin-left:5px;float:left;background-image:url(images/bg_gray.png);color:#ffffff;font-weight:Bold;font-family:arial;font-size:12px;padding:5px;width:110px;text-align:center"
                          onclick="getMenuItems('bookWin');location.href='p/btow_live_auctions';"  id='_bookWin'>
                            Match and Win 
                        </div>  
                         <div style="cursor:pointer;border-radius:5px 5px 0px 0px;margin-left:5px;float:left;background-image:url(images/bg_pink.png);color:#ffffff;font-weight:Bold;font-family:arial;font-size:12px;padding:5px;width:110px;text-align:center"
                          onclick="getMenuItems('shopping');location.href='p/shopping';"  id='_bookWin'>
                            Shop Now 
                        </div>                        
                        <div  onclick="javascript:getMenuItems('freeparttimejob');location.href='p/free_parttimejob_register';"   style="cursor:pointer;border-radius:5px 5px 0px 0px;margin-left:5px;float:left;background:#f1f1f1;color:#222;font-weight:Bold;font-family:arial;font-size:12px;padding:4px;width:130px;text-align:center;border:1px solid #e5e5e5;border-bottom: 1px solid #F1F1F1;">
                          Free Part Time Job
                        </div>           
                        <div onclick="javascript:getMenuItems('mypage');" style="cursor:pointer;border-radius:5px 5px 0px 0px;margin-left:5px;float:left;background-image:url(images/bg_blue.png);color:#ffffff;font-weight:Bold;font-family:arial;font-size:12px;padding:5px;width:80px;text-align:center">
                            My Page 
                        </div>
                    </div>
                    
                    <div style="clear:both;background:#C024BC;color:#fff;font-weight:bold;padding:5px;height:23px;padding-left:10px" id="subMenu">
                      
                    </div>
                </td>
            </tr> 
            
            <div id='freeparttimejob' style="display:none">
                
              <div onclick="javascript:location.href='p/free_parttimejob_register'" class="sub_Menu" style="color:#222">Register</div>
                <div onclick="javascript:location.href='p/free_parttimejob_login'" class="sub_Menu" style="color:#222">Login</div>
                
                
            </div>
            <div id='timeBased' style="display: none;">
                <div onclick="javascript:location.href='p/tba_live_auctions'" class="sub_Menu">Live Auctions</div>
                <div onclick="javascript:location.href='p/tba_howto_play'" class="sub_Menu">How To Play</div>
                <div onclick="javascript:location.href='p/tba_winners'" class="sub_Menu">Winners</div>
                <div onclick="javascript:location.href='p/tba_schemes'" class="sub_Menu">Free Gifts</div>                        
                <div onclick="javascript:location.href='p/tba_news'" class="sub_Menu" style="border-right:none">News</div>                                                
            </div>

            <div id='bidBased' style="display: none;">
                <div onclick="javascript:location.href='p/bba_live_auctions'" class="sub_Menu">Live Auctions</div>
                <div onclick="javascript:location.href='p/bba_howto_play'" class="sub_Menu">How To Play</div>
                <div onclick="javascript:location.href='p/bba_winners'" class="sub_Menu">Winners</div>
                <div onclick="javascript:location.href='p/bba_schemes'" class="sub_Menu">Free Gifts</div>                        
                <div onclick="javascript:location.href='p/bba_news'"    class="sub_Menu" style="border-right:none">News</div>                                                
            </div> 

            <div id='bookWin' style="display: none;">
                <div onclick="javascript:location.href='p/btow_live_auctions'" class="sub_Menu">Live Auctions</div>
                <div onclick="javascript:location.href='p/btow_howto_pay'"  class="sub_Menu">How To Play</div>
                <div onclick="javascript:location.href='p/btow_winners'"  class="sub_Menu">Winners</div>
                <div onclick="javascript:location.href='p/btow_schemes'"  class="sub_Menu">Free Gifts</div>                        
                <div onclick="javascript:location.href='p/btow_news'"   class="sub_Menu" style="border-right:none">News</div>                                                
            </div> 
            
            <div id='shopping' style="display: none;">
                <?php foreach($mysql->select("select * from _category order by categoryname") as $category) {?>
                    <div onclick="javascript:location.href='list/<?php echo $category['categoryid'];?>'" class="sub_Menu"><?php echo $category['categoryname'];?></div>  
                <?php } ?>
            </div> 
            
            <div id='mypage' style="display: none;">&nbsp;
            <?php if ($_SESSION['USER']['userid']>0) {?>
                <div onclick="javascript:location.href='p/usr_mypage'" class="sub_Menu">My Page</div>
                <!--<div onclick="javascript:location.href='p/usr_invoice'" class="sub_Menu">My Invoices</div>-->
                <div onclick="javascript:location.href='p/usr_bidhistory'" class="sub_Menu">Bid History</div>
                <div onclick="javascript:location.href='p/usr_accountsumary'" class="sub_Menu">Account Summary</div>
                <div onclick="javascript:location.href='p/requesttowalletupdate'" class="sub_Menu">Wallet Update Request</div>
                <div onclick="javascript:location.href='p/usr_logout'"  class="sub_Menu" style="border-right:none">Logout</div>
            <?php } else { ?>
                <div onclick="javascript:location.href='p/register'" class="sub_Menu">Register</div>
                <div onclick="javascript:location.href='p/register'"  class="sub_Menu" style="border-right:none">Login</div>
                <?php } ?>
            </div> 
            
               <script>//getMenuItems('shopping');</script>    
                 <?php
  //   if ($_REQUEST['page']=="free_parttimejob_register") {  echo "&nbsp;";  } else {
     if (true) {  echo "&nbsp;";  } else {
      ?>
            <tr>
                <td>
                
                    <div style="float:Left;font-family:arial;font-size:12px;color:#ffffff;background:#EA0E83;padding:5px;font-weight:bold;border:1px solid #EA0E83">Latest Winner&nbsp;&nbsp;</div>
                    <div  class="winners-name" id="winner-tick" style="float:Left;font-family:arial;font-size:12px;padding:5px;color:#999;border:1px solid #EA0E83;width:652px;height:15px"><b>Name : </b>Sundaresan P. <b>Product Name :</b> 25000 Bid Pack-Auction <b>Buy_</b></div>
                    
<script language="JavaScript" type="text/javascript">
<!-- 
// 1996 by Christoph Bergmann... http://acc.de/cb
// Please keep this note...
// global variables
var max=0;
function winnerlist()
{
   max=winnerlist.arguments.length;
   for (i=0; i<max; i++)
        this[i]=winnerlist.arguments[i];
}
winlist=new winnerlist
(
  "<b>Name : </b>Ranjeet Yadav <b>Product Name :</b> 50000 Bid Pack-Auction <b>Buying Price :</b> Rs. 0.13","<b>Name : </b>Ravi Morey <b>Product Name :</b> Philips Daily Collection Food Processor-Auction <b>Buying Price :</b> Rs. 3.51","<b>Name : </b>V V L S Kumar <b>Product Name :</b> American Tourister Backpack Code 9-Auction <b>Buying Price :</b> Rs. 1.31","<b>Name : </b>Saravanan D. Duraisamy <b>Product Name :</b> Samsung Galaxy S4-Auction <b>Buying Price :</b> Rs. 35.06","<b>Name : </b>Shikha Upadhyay <b>Product Name :</b> Morphy Richards 2 Slice Pop Up Toaster-Auction <b>Buying Price :</b> Rs. 1.57","<b>Name : </b>Sundaresan P. <b>Product Name :</b> 25000 Bid Pack-Auction <b>Buying Price :</b> Rs. 0.34","<b>Name : </b>Seema D. Pandre <b>Product Name :</b> Nikon Camera Carry Case-Auction <b>Buying Price :</b> Rs. 0.12","<b>Name : </b>Gaddam Srinivas <b>Product Name :</b> 50000 Bid Pack-Auction <b>Buying Price :</b> Rs. 1.21","<b>Name : </b>Manish Varshney <b>Product Name :</b> Casio CTK-2300 Keyboard-Auction <b>Buying Price :</b> Rs. 16.06","<b>Name : </b>Sankar Mahapatra <b>Product Name :</b> American Tourister Backpack Code 11-Auction <b>Buying Price :</b> Rs. 1.22"

);


var x=0; pos=0;
var l=winlist[0].length;
function winnerticker()
{
    document.getElementById("winner-tick").innerHTML=winlist[x].substring(0,pos)+"_";
    if(pos++==l)
    {
        pos=0;
        setTimeout("winnerticker()",3000);
        x++;
        if(x==max)
            x=0;
        l=winlist[x].length;
    } else
        setTimeout("winnerticker()",100);
}
winnerticker();
// end -->
</script> 
</script>

        </td>
                <td rowspan="3" valign="top">
                     <img src='images/bid-lowest-unique4.png' style="border:1px solid #ccc;" width="250">       
                </td>
    </tr> 
   
    <tr>
        <td>            
             <div style="height:250px;overflow:hidden;border:1px solid #cccccc;;">
                    <div>
                        <div class="fadein"> 
                            <img src="images/banner00.png?1=121" alt="" title=""   />    
                            <img src="images/banner01.png?1=121" alt="" title=""  />
                            <img src="images/banner03.png?1=121" alt="" title=""  />
                        </div> 
                    </div>
                </div>
                <div style="background:#EFEFEF;overflow:hidden;height:60px;text-align:center;border:1px solid #ccc;border-top:none;">
                    <img src="images/step1.jpg">
                    <img src="images/step2.jpg">
                    <img src="images/step3.jpg">
                </div>
            </td>
                  
    </tr>  
    <?php } ?> 
    <tr>
        <td width="762" style="vertical-align:top;"> 
        
        <?php
        
        if (isset($_REQUEST['page'])) {
            if ($_REQUEST['page']>0) {
                if ($_SESSION['USER']['userid']>0) {
                        include_once("pages/process.php");
                }else {
                    echo "<script>location.href='p/register';</script>";
                }
            } else {
                   
            include_once("pages/".$_REQUEST['page'].".php");    
          
            }
            
            
        } else   if (isset($_REQUEST['tba'])) { 
            $tbaID = $_REQUEST['tba'];
             include_once("pages/tba.php");  
        } else   if (isset($_REQUEST['bba'])) { 
            $bbaID = $_REQUEST['bba'];
              include_once("pages/bba.php");  
        } else   if (isset($_REQUEST['product'])) { 
            
            $productid = $_REQUEST['product'];
              include_once("pages/product.php");
              
               } else   if (isset($_REQUEST['list'])) { 
            
            $listid = $_REQUEST['list'];
              include_once("pages/shopping.php");
        } elseif (isset($_REQUEST['buynow'])) { 
            
            $ID = $_REQUEST['buynow'];
               if ($_SESSION['USER']['userid']>0) {
               include_once("pages/buynow.php");
    }   else {
        echo "<script>location.href='p/register';</script>";
    }
    
             //include_once("pages/tba.php");         
        } else {                               
          include_once("pages/home.php");
           // include_once("pages/shopping.php");
        }
    
?>
      
        </td>
        <td style="vertical-align:top;width:300px">
        <br /><br />
        <img src="images/2016-11-29.png" width="100%" /><br /><br />
        <img src="images/2016-11-29_.png" width="100%" /><br /><Br />
       <a style="display: none" href="http://info.flagcounter.com/iVo5"><img src="http://s09.flagcounter.com/count/iVo5/bg_FFFFFF/txt_000000/border_CCCCCC/columns_3/maxflags_12/viewers_WinCashDeal/labels_0/pageviews_1/flags_0/percent_0/" alt="Flag Counter" border="0" style="width:100%;"></a> 
         <?php
        $mysql->execute("update _pgcount set pagecount=pagecount+1 where id=1");
        $pcount = $mysql->select("select * from _pgcount");
         
        ?>
        <div style="font-family:'Trebuchet MS';font-size:16px;border:4px solid #ccc;background:#f9f9f9;color:#666;padding:5px;margin:10px;">
        <b>Page Views:</b>&nbsp;&nbsp;&nbsp;<?php echo $pcount[0]['pagecount'];?>
        </div>
        </td>
                                      
     </tr>
  
</table>
<div style="height:100px;">
<table align="center" cellpadding="5" cellspacing="5" width="1000">
         <tr>
        <td style="text-align:center;color:#B57E00">
            <a target="_self" href="http://www.wincashdeal.com" style="font-family:arial;font-size:12px;text-decoration:none;color:#B57E00;font-weight:Bold;">Home</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a target="_self" href="p/aboutus" style="font-family:arial;font-size:12px;text-decoration:none;color:#B57E00;font-weight:Bold;">About Us</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a target="_self" href="p/privacy" style="font-family:arial;font-size:12px;text-decoration:none;color:#B57E00;font-weight:Bold;">Privacy</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a target="_self" href="p/terms" style="font-family:arial;font-size:12px;text-decoration:none;color:#B57E00;font-weight:Bold;">Terms and Conditions</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a target="_self" href="p/faq" style="font-family:arial;font-size:12px;text-decoration:none;color:#B57E00;font-weight:Bold;">Faq</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a target="_self" href="p/testimonials" style="font-family:arial;font-size:12px;text-decoration:none;color:#B57E00;font-weight:Bold;">Testimonials</a>&nbsp;&nbsp;|&nbsp;&nbsp; 
            <a target="_self" href="p/contactus" style="font-family:arial;font-size:12px;text-decoration:none;color:#B57E00;font-weight:Bold;">Contact Us</a>  <br><br>
            Copyright @ 2016 - 2017 wincashdeal.Com
        </td>
     </tr>
     </table>
</div>
 <script>$(function(){$('.fadein img:gt(0)').hide();setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');},9000);});</script>
 </body>
 