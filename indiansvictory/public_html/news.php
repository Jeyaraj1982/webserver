<?php include_once("php/classes/mysql.php"); $mysql= new MySql(); include_once("php/classes/functions.php"); ?>
<html>
    <head>
<?php
 if (isset($_REQUEST['jsessionid'])) {
     $lists = $mysql->select("Select * from _posts where md5(id)='".$_REQUEST['jsessionid']."'");  
$title_=$lists[0]['title'];
} else {
$title_ = "";
}
?>
        <title><?php echo $title_;?> - Indians Victory Party</title>
         <script type="text/javascript">var switchTo5x=true;</script>
 <script src="http://code.jquery.com/jquery-latest.js"></script>

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "bc852c04-6a87-4479-b32b-f4e16cdb24ce"}); </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="google-translate-customization" content="4a1f57601a1e392c-58d234641fcf90cf-g256afeffa2c91660-1b"></meta>
    </head>
<body bgcolor="#E2E2E2" style="margin: 0px;">
<center>
<div style="width: 1000px;margin:0px auto;border:0px solid red;text-align:left;">
    <table style="text-align: left;background:white;" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td colspan="2" style="text-align: left;background:#D6E5FF"><?php include_once("php/webpages/header.php"); ?></td>
        </tr>
        <tr>
            <td valign="top" style='background:url(images/gradient-grey-down.png) repeat-x white'>
               <br> <img src="images/banner.png"> <br>  <br>
<div id="google_translate_element" style='margin-left:15px'></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'ta', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<br> 
        
            <div style='border:1px solid #ccc;margin-left:12px'>
             <br>
                <?php
                $displayContent=5;
                 if (isset($_REQUEST['page'])) {
                    $starting=($_REQUEST['page']-1)*$displayContent;
                    $ending = $displayContent;
                 } else {
                    $starting=0;
                    $ending = $displayContent;
                 }
                 
                 if (isset($_REQUEST['pid'])) {
                    switch($_REQUEST['pid']) {
                        case '2' : include_once("php/webpages/aboutus.php");break;
                        
                        case 'register' : include_once("php/webpages/register.php");break;
                        
                        case '3' : 
                            echo "<h3 style='margin:10px;'>Activities</h3>";
                            $lists = $mysql->select("Select * from _posts where categoryid=1 and ispublished=1 order by id desc limit $starting,$ending");
                            include_once("php/webpages/list.php");
                            break;
                        case '4' :
                            echo "<h3 style='margin:10px;'>News</h3>";
                            $lists = $mysql->select("Select * from _posts where categoryid=2 and ispublished=1 order by id desc limit $starting,$ending");
                            include_once("php/webpages/list.php");
                            break;
                        case '5' : include_once("php/webpages/contactus.php");break;
                            default : 
                            
                            $tp = $mysql->select("select count(*) as count from _posts where ispublished=1");
                            $tp=$tp[0]['count'];
                            $lists = $mysql->select("Select * from _posts where ispublished=1 order by id desc limit $starting,$ending");
                            include_once("php/webpages/list.php");
                            include_once("php/webpages/home.php");break;
                        case '6' : include_once("php/webpages/downloads.php");break;   
                        case '7' : include_once("php/webpages/memorandum.php");break;   
                        
                    }
                 } else if (isset($_REQUEST['jsessionid'])) {
                    echo ViewPost($_REQUEST['jsessionid'],1);  
                 } else {
                    
                    include_once("php/webpages/home.php");
                    $tp = $mysql->select("select count(*) as count from _posts where ispublished=1  and categoryid>2 ");
                    $tp=$tp[0]['count'];
	echo "<img src='images/new_icon.png'><br><br>";
			$uRL = "news.php";
			$lists = $mysql->select("Select * from _posts where ispublished=1 and categoryid>2  order by id desc limit $starting,$ending");
                     include ("php/webpages/list.php");
                 }
            ?>
            </div>
           <br><Br>
<div>
<?php
$imgArray = array("imga.jpg","imgb.jpg","imgc.jpg","imgd.jpg","imge.png","imgf.gif","imgg.jpg","imgh.jpg","imgi.jpg","imgj.jpg","imgk.jpg","imgl.jpg","imgm.jpg");
  echo "<img src='images/".$imgArray[rand(0,(sizeof($imgArray)-1))]."'>";
?>
</div>
            </td>
 
            <td width="300" bgcolor="white" valign="top" style="background:url(images/gradient-grey-down.png) repeat-x white;padding:10px;">
                <?php include_once("php/webpages/rightside.php"); ?>  
                <br><br>
                <div>
                <a href="http://flgc.info/NuIrT3"><img src="http://s10.flagcounter.com/count/pA9q/bg_FFFFFF/txt_000000/border_CCCCCC/columns_3/maxflags_30/viewers_Indiansvictoryparty.com/labels_1/pageviews_1/flags_1/" alt="free counters" border="0"></a>
                </div>          
            </td>
        </tr>
    </table>
<?php include_once("php/webpages/footer.php"); ?>
</div>    
</center>
    </body>

<script>
function go_() {
//( background:#FFEA51;color:#FF803E;font-weight:bold;

$('.goog-te-gadget-simple').css("background","#FFEA51");
$('.goog-te-gadget-simple').css("font-weight","bold");

$('#feedjiti-viewDiv').css("display","none");
$('#feedjiti-overlay2').css("display","none");








}

setTimeout("go_()",2000);

</script>    
  </html>
  
