 
<?php include_once("php/classes/mysql.php"); $mysql= new MySql(); include_once("php/classes/functions.php"); ?>
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
    <meta http-equiv="Content-Type" content="text/');l; charset=utf-8" />
    <meta name="google-translate-customization" content="4a1f57601a1e392c-58d234641fcf90cf-g256afeffa2c91660-1b"></meta>
    <script src="js/jquery-1.6.2.js"></script>
  <script>
    var temp=""
        function getParliment(stateID) {
            if (temp=="") {
                temp = $('#mapresult').html();
            }
            $.ajax({url:'getParliment.php?state='+stateID,success:function(data){$('#mapresult').html(data);}})
        }
    </script>


    <script>
        var switchTo5x=true;
        stLight.options({publisher: "bc852c04-6a87-4479-b32b-f4e16cdb24ce"});
        function view(post){$('#widget_result').html($('#result_'+post).html());switch(post){case 'photos':$('#_photos').css({'background':'#f1f1f1'});$('#_videos').css({'background':'#fff'});$('#_speech').css({'background':'#fff'});break;case 'videos':$('#_photos').css({'background':'#fff'});$('#_videos').css({'background':'#f1f1f1'});$('#_speech').css({'background':'#fff'});break;case 'speech':$('#_photos').css({'background':'#fff'});$('#_videos').css({'background':'#fff'});$('#_speech').css({'background':'#f1f1f1'});break;}}
        function getContent(post){$('#widget_content').html($('#result_'+post).html());switch(post){case 'members':$('#_members').css({'background':'#f1f1f1'});$('#_subscribers').css({'background':'#fff'});break;;case 'subscribers':$('#_members').css({'background':'#fff'});$('#_subscribers').css({'background':'#f1f1f1'});}}
    </script>
    <style>
        .smenul {color:#005D94;text-decoration: none;color:#FF00BF;font-size:13px;font-weight:bold}
        .smenul:hover {text-decoration:underline;font-weight:bold}
        .nav_right {text-decoration: none;background:#fff;font-weight:bold;border:1px solid #ccc;color:#444;padding:5px 40px;border-radius:5px 5px 0px 0px}
        .nav_right:hover {text-decoration: none;background:#999;font-weight:bold;border:1px solid #ccc;color:#444;padding:5px 40px;border-radius:5px 5px 0px 0px}

    </style>
    </head>
    <body   style="background:url(images/11_image.jpg) no-repeat #2DD6F7  ;margin: 0px;">
        <center>
            <div style="width: 1000px;margin:0px auto;border:0px solid red;text-align:left;">
                <table style="text-align: left;background:white;border:1px solid #999999;border-top:none;" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td colspan="2" style="text-align: left;background:#D6E5FF"><?php include_once("php/webpages/header.php"); ?></td></tr>
                        <tr>
                            <td valign="top" style='background:url(images/gradient-grey-down.png) repeat-x white'>
                                <div id="google_translate_element" style='margin-left:15px'></div>
                                <script type="text/javascript">function googleTranslateElementInit() {new google.translate.TranslateElement({pageLanguage: 'ta', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');}</script>
                                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                                <div style='border:1px solid #ccc;margin-left:12px;margin-top:12px;padding-top:12px;'>
                                <?php
                                    $displayContent=5;
                                        if (isset($_REQUEST['page'])) {
                                            $starting=($_REQUEST['page']-1)*$displayContent;
                                            $ending = $displayContent;
                                        } else {
                                            $starting=0;
                                            $ending = $displayContent;
                                        }
                 
                                        if (isset($_REQUEST['category']) && ($_REQUEST['category']>0)) {
                                            $cat = $mysql->select("select * from category where id=".$_REQUEST['category']);
                                            echo "<h2>".$cat[0]['category']."</h2>";
                                            $lists = $mysql->select("Select * from _posts where ispublished=1 and categoryid=".$_REQUEST['category']." order by id desc limit $starting,$ending");
                                            include_once("php/webpages/list.php");
                                        } else {
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
                                                    case '5' : include_once("php/webpages/contactus.php");
                                                        break;
                                                    default : 
                                                        $tp = $mysql->select("select count(*) as count from _posts where ispublished=1");
                                                        $tp=$tp[0]['count'];
                                                        $lists = $mysql->select("Select * from _posts where ispublished=1 order by id desc limit $starting,$ending");
                                                        include_once("php/webpages/list.php");
                                                        include_once("php/webpages/home.php");
                                                        break;
                                                    case '6' : 
                                                        include_once("php/webpages/downloads.php");
                                                        break;   
                                                    case '7' : include_once("php/webpages/memorandum.php");
                                                        break;   
                                                }
                 } else if (isset($_REQUEST['jsessionid'])) {
                    echo ViewPost($_REQUEST['jsessionid'],1);  
                 } else {
                    include_once("php/webpages/home.php");
                    $tp = $mysql->select("select count(*) as count from _posts where ispublished=1 and categoryid<2 ");
                    $tp=$tp[0]['count'];
            $uRL = "index.php";
                    $lists = $mysql->select("Select * from _posts where ispublished=1 and categoryid<2 order by id desc limit $starting,$ending");
                        include ("php/webpages/list.php");
//echo "<br><hr style='width:89%'><br><img src='images/new_icon.png'><br><br>";

//$tp = $mysql->select("select count(*) as count from _posts where ispublished=1 and categoryid>2 ");
  //                  $tp=$tp[0]['count'];
    //        $uRL = "news.php";
      //      $lists = $mysql->select("Select * from _posts where ispublished=1 and categoryid>2  order by id desc limit $starting,$ending");
        //             include ("php/webpages/list.php");
                 }
                  
                 }
                 

            ?>
            </div>
            <br><Br>
           <div align="center" id="mapresult" style="border: 1px solid rgb(204, 204, 204); margin-left: 15px; height: 564px; overflow: auto;background:#EEF6FC">
                <img width="468" height="564" border="0" usemap="#Map" alt="Historical places in india" src="images/indialarge.gif"> 
                <map name="Map">
                    <area alt="North india tour - jammu and kashmir" href="javascript:getParliment('15');" coords="107,6,119,5,130,6,135,15,144,20,153,31,163,36,177,30,189,30,199,37,197,49,193,54,188,61,183,66,181,75,184,81,186,88,184,95,176,93,168,92,159,87,149,82,142,80,135,84,131,91,125,95,118,90,109,84,101,73,100,53,109,43,103,34,96,28,89,18,96,10" shape="poly">
                    <area alt="North india tour - Himachal-pradesh" href="javascript:getParliment('14');" coords="144,81,154,88,166,91,172,96,175,101,183,99,195,99,208,99,222,99,230,98,241,99,251,99,257,99,257,108,239,109,210,109,176,108,175,115,165,117,160,122,161,131,154,131,147,125,141,115,134,106,127,99,133,88" shape="poly">
                    <!--<area href="#" coords="227,98" shape="poly">-->
                    <area alt="North india tour-uttranchal" href="javascript:getParliment('35');" coords="175,115,182,115,187,121,195,126,201,131,223,131,225,128,241,127,243,130,243,140,208,141,201,145,198,156,196,162,189,163,180,159,177,152,173,146,166,146,164,137,161,130,162,120,167,117" shape="poly">
                    <area alt="North india tour -punjab" href="javascript:getParliment('28');" coords="123,98,115,101,113,107,112,116,105,126,99,136,108,140,117,139,122,145,129,142,134,142,137,137,144,133,146,124,136,109,130,102" shape="poly">
                    <area alt="North india tour-haryana" href="javascript:getParliment('13');" coords="147,125,151,130,156,133,150,141,150,149,160,149,172,149,175,156,160,157,149,159,146,165,148,173,155,171,152,179,141,176,129,172,124,161,120,153,113,150,110,144,116,140,123,146,133,143,142,137" shape="poly">
                    <area alt="North india tour -delhi" href="javascript:getParliment('9');" coords="152,168,4" shape="circle">
                    <!--<area href="javascript:alert('toptour-north-india-delhi.');" coords="156,162,189,175" shape="rect">
                    <area href="javascript:alert('toptour-north-india-delhi.');" coords="152,168,4" shape="circle">-->
                    <area alt="North india tour- Uttar pradesh" href="javascript:getParliment('33');" coords="149,149,151,139,155,132,161,132,164,141,171,146,179,156,196,164,209,173,218,179,230,186,241,191,249,190,257,196,263,208,257,207,259,214,259,219,264,222,254,228,247,232,246,240,249,244,245,249,242,257,235,253,233,243,225,239,216,236,209,239,203,235,197,234,198,229,191,233,178,230,172,231,174,241,176,250,164,236,167,245,168,226,176,224,179,212,178,205,166,201,154,201,156,194,154,186,157,176,158,166" shape="poly">
                    <area alt="North india tour-Rajasthan" href="javascript:getParliment('29');" coords="97,135,105,139,111,140,109,145,117,153,125,164,132,174,141,176,147,182,153,184,154,193,157,201,163,201,155,206,150,211,140,217,137,226,141,230,150,230,143,237,146,245,137,247,131,250,126,244,119,238,114,235,109,245,111,256,106,263,101,269,93,261,86,250,82,240,70,237,58,235,51,234,47,219,46,215,40,213,39,203,40,197,31,196,30,188,37,180,46,172,52,176,63,175,74,166,86,154,92,143" shape="poly">
                    <area alt="West india tour-Gujarat" href="javascript:getParliment('12');" coords="50,234,68,237,80,240,87,254,99,268,105,273,98,278,97,289,91,298,96,300,90,305,90,315,85,313,82,324,74,318,75,306,72,292,72,284,70,278,67,289,65,298,61,303,53,306,45,308,37,307,31,298,25,290,19,283,16,274,27,274,35,272,39,270,37,264,29,266,23,265,14,261,8,254,10,246,18,237,28,239,34,243" shape="poly">
                    <area alt="West india tour - madhya pradesh" href="javascript:getParliment('20');" coords="142,216,156,206,168,202,177,207,176,219,170,224,163,234,165,245,174,251,174,241,172,231,180,232,188,234,196,229,199,236,210,240,219,236,226,241,233,249,236,258,225,259,219,260,218,265,223,267,224,275,218,280,212,285,206,292,204,302,202,306,196,299,189,302,182,298,173,302,166,299,156,304,152,295,144,294,136,308,128,300,117,301,111,296,102,290,96,282,106,275,105,266,111,258,110,247,115,236,126,246,127,253,136,247,145,245,143,239,149,230,141,230,137,226" shape="poly">
                    <area alt="West india tour - Maharastra" href="javascript:getParliment('21');" coords="73,317,83,326,86,313,91,317,91,304,97,300,92,296,99,288,110,295,117,303,128,301,132,309,137,307,142,300,149,294,155,304,166,299,172,303,182,298,190,302,195,299,202,307,201,317,200,322,200,331,204,336,207,344,198,349,198,357,191,347,187,337,180,338,169,333,165,337,160,345,156,349,156,356,149,359,139,367,133,374,127,378,119,376,117,384,113,388,107,385,102,390,94,389,96,398,97,406,89,407,81,400,79,379,77,364,74,352,76,342,72,333" shape="poly">
                    <area alt="West india tour - Goa" href="javascript:getParliment('11');" coords="85,406,93,406,93,413,94,420,91,422,86,415" shape="poly">
                    <area alt="South india tour-Karnataka" href="javascript:getParliment('17');" coords="107,386,118,389,121,377,130,379,138,370,144,363,153,358,151,369,149,374,151,378,148,386,149,394,144,396,150,401,146,406,142,406,144,415,141,422,137,428,140,435,146,437,147,446,157,442,161,449,165,458,168,463,163,469,157,465,150,467,148,474,151,478,144,484,136,483,132,489,126,485,120,480,115,473,109,468,103,464,99,446,96,435,93,425,93,406,98,404,95,396,94,390" shape="poly">
                    <area alt="South india tour-Kerala" href="javascript:getParliment('18');" coords="102,465,108,468,112,473,117,479,124,484,130,492,135,500,136,511,142,515,143,525,144,530,139,537,141,547,134,547,129,534,127,517,119,499,115,488,107,477" shape="poly">
                    <!--<area href="javascript:alert('toptour-south-india-kerala.');" coords="85,523,121,537" shape="rect">-->
                    <area alt="South india tour-Andhra pradesh" href="javascript:getParliment('2');" coords="169,334,176,340,185,339,189,349,194,357,203,361,211,373,219,374,227,371,233,361,239,366,245,357,250,350,257,356,266,357,252,365,244,377,233,383,230,389,226,399,215,399,212,405,207,410,201,407,195,416,193,428,194,439,197,453,195,456,191,451,187,455,179,457,172,462,165,460,161,451,157,444,149,444,144,438,137,432,140,423,143,412,142,407,150,404,143,395,150,390,149,381,150,370,154,356,156,348" shape="poly">
                    <area alt="South india tour-Tamil nadu" href="javascript:getParliment('31');" coords="127,486,133,489,138,483,146,484,152,478,150,468,157,465,164,471,170,461,180,457,190,453,197,456,198,469,192,478,186,489,188,499,187,513,179,516,173,525,169,534,160,537,157,548,150,556,139,551,141,542,145,533,145,519,134,509,137,501,132,494" shape="poly">
                    <area alt="East india tour-Orissa" href="javascript:getParliment('26');" coords="237,309,245,310,249,297,255,285,263,287,272,285,279,292,289,290,291,282,299,289,307,293,314,299,305,304,305,316,303,324,298,333,287,336,278,344,269,350,266,355,256,354,251,349,244,358,241,365,236,360,226,371,213,372,221,359,230,351,225,343,222,330,235,333,230,321,230,313" shape="poly">
                    <area alt="East india tour - chandigarh" href="javascript:getParliment('6');" coords="204,345,198,352,202,359,208,367,211,371,222,359,229,351,224,341,225,329,234,332,230,323,233,311,243,310,250,294,256,284,261,276,256,264,248,255,238,257,226,259,218,262,227,271,220,279,215,284,207,289,202,299,200,319,199,328" shape="poly">
                    <area alt="East india tour - Jarkhand" href="javascript:getParliment('16');" coords="245,253,248,244,256,245,262,246,272,246,279,246,284,242,292,243,299,245,303,238,309,231,315,228,318,241,313,250,306,258,296,263,287,265,292,272,299,279,302,288,291,282,285,288,277,292,271,284,264,285,258,284,261,275,257,264" shape="poly">
                    <area alt="East india tour-west bengal" href="javascript:getParliment('36');" coords="287,265,303,260,313,253,316,243,317,232,317,225,319,221,315,217,319,209,321,201,318,195,327,193,335,199,345,202,346,209,343,215,336,210,329,212,325,210,322,217,327,225,334,230,333,236,327,232,324,237,324,246,332,250,331,258,334,268,337,279,339,287,341,297,336,302,332,296,327,300,324,293,319,299,312,297,305,290,301,278,295,272" shape="poly">
                    <area alt="East india tour -Sikkim" href="javascript:getParliment('30');" coords="318,193,320,185,323,179,328,177,331,184,334,190,332,196,327,193" shape="poly">
                    <!-- <area href="javascript:alert('toptour-east-india-sikkim.');" coords="309,157,349,170" shape="rect">-->
                    <area alt="East india tour - bihar" href="javascript:getParliment('5');" coords="258,190,266,194,274,202,283,203,296,206,303,206,307,210,312,209,320,208,316,217,316,224,313,230,306,234,299,245,287,241,278,246,260,246,249,241,248,231,257,226,265,224,258,218,258,209,264,208,257,198" shape="poly">
                    <area alt="East india tour-Meghalaya" href="javascript:getParliment('23');" coords="348,220,349,226,356,230,369,229,378,232,386,234,393,226,387,219,382,213,372,216,358,214" shape="poly">
                    <!-- <area href="javascript:alert('toptour-east-india-meghalaya.');" coords="331,238,379,249" shape="rect"> -->
                    <area alt="East india tour-Assam" href="javascript:getParliment('4');" coords="344,213,348,208,344,202,350,201,354,198,360,200,370,199,381,198,390,196,400,195,409,191,415,182,424,182,433,177,433,182,432,187,421,197,411,208,406,214,402,221,402,227,397,235,398,245,390,249,386,242,388,234,394,227,391,218,384,213,373,216,360,214,352,217" shape="poly">
                    <area alt="East india tour-Tripura" href="javascript:getParliment('32');" coords="385,242,378,249,372,253,370,259,372,268,380,273,384,266,387,258,388,249" shape="poly">
                    <!--<area href="javascript:alert('toptour-east-india-tripura.');" coords="352,276,392,290" shape="rect">-->
                    <area alt="East india tour-arunachal pradesh" href="javascript:getParliment('3');" coords="379,197,379,189,374,183,379,178,386,179,390,171,397,167,405,163,410,158,418,151,424,148,431,152,438,146,444,155,446,162,455,162,460,170,456,179,458,190,450,185,441,192,435,196,430,191,437,183,439,175,424,181,411,184,406,194" shape="poly">
                    <!--<area href="javascript:alert('toptour-east-india-arunachal-pradesh.');" coords="394,119,452,145" shape="rect">-->
                    <area alt="East india tour_Nagaland" href="javascript:getParliment('25');" coords="427,191,418,199,411,209,407,215,401,223,403,227,414,223,423,222,428,217,456,216,463,215,461,207,446,207,429,208,434,197" shape="poly">
                    <area alt="East india tour_Nagaland" href="javascript:getParliment('22');" coords="398,235,406,226,414,222,421,229,427,230,444,230,454,231,453,241,422,241,419,250,410,250,399,247" shape="poly">
                    <area alt="East india tour-Mizoram" href="javascript:getParliment('24');" coords="396,246,404,252,406,259,436,260,441,259,441,269,405,269,402,276,401,290,393,281,390,270,387,260,389,247" shape="poly">
                </map>
                <br>
                   </div> 
    
<br><Br>


<div style="margin:10px">
<h2>General Secretry</h2>
<?php
$file = scandir("profile/banner");

foreach($file as $f) {
 if ( ($f!="..") && ($f!=".") ) {  
 $files[]=$f;
}}

$rc= rand(0,(sizeof($files)-1));

 

//$imgArray = array("imga.jpg","imgb.jpg","imgc.jpg","imgd.jpg","imge.png","imgf.gif","imgg.jpg","imgh.jpg","imgi.jpg","imgj.jpg","imgk.jpg","imgl.jpg","imgm.jpg");
  echo "<img style='width:450px' src='profile/banner/".$files[$rc]."'>";
?>
</div>
<div style="margin:10px">
<h2>IVP MEMBERS</h2>
<?php
$files = scandir("profile/facebook");
//print_r($files);
foreach($files as $f) {
 if ( ($f!="..") && ($f!=".") ) {  
echo "<img src='profile/facebook/".$f."' style='border:1px solid #f1f1f1;background:#222;margin:1px;padding:1px;'>";
}}
?>
</div>
            </td>
"
            <td width="300" bgcolor="white" valign="top" style="background:url(images/gradient-grey-down.png) repeat-x white;padding:10px;">
                <?php include_once("php/webpages/rightside.php"); ?>  
                             
            </td>
        </tr>
    </table>
            <?php include_once("php/webpages/footer.php"); ?>
        </div>    
    </center>
    <script>function go_() {$('.goog-te-gadget-simple').css("background","#FFEA51");$('.goog-te-gadget-simple').css("font-weight","bold");$('#feedjiti-viewDiv').css("display","none");$('#feedjiti-overlay2').css("display","none");}setTimeout("go_()",2000);</script>    
    </body>