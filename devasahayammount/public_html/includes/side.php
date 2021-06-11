<?php if (JFrame::getAppSetting('layout')==1) { ?>
    <td width="220" valign="top" style="border-left:1px dashed #ccc;background:#fff;padding:10px;">        
<?php } ?>
<?php if (JFrame::getAppSetting('layout')==2) { ?>
    <td width="220" valign="top" style="border-right :1px dashed #ccc;background:#fff;padding:10px;">        
<?php } ?>


        <style>
                                .viewmore {font-size:11px;color:#555;text-decoration: none;font-family:arial;}
                                .viewmore:hover {font-size:11px;color:#333;text-decoration: underline;font-family:arial;}
                                .qLink {font-size:13px;color:#555;text-decoration: none;font-family:"Droid Sans";}
                                .qLink:hover {font-size:13px;color:#333;text-decoration: underline;font-family:"Droid Sans";}
                            </style>      
                            <div class='jContent_title' style=" border-bottom: 2px solid #047d9b;cursor:default;">Today Readings</div>
                                <div>
                                <?php $todayReading = $mysql->select("select title,title_t,`date` as date from _jreading where date(`date`)=date('".date("Y-m-d")."')"); ?>

                                <marquee direction="up" scrollamount="2" style="font-size:12px;font-family:'Droid Sans';height:100px;margin:5px;margin-right:0px;" onmouseover="this.stop()" onmouseout="this.start()">
                                        <b>English:</b><br>
                                        
                                        <ul>
                                        <?php
                                         
                                            foreach($todayReading as $tr) {
                                                
                                                 $t = trim($tr['title']);
                                                  
                                                    
                                                if (strlen(trim($t))>0) {
                                                    echo "<li><a class='qLink' href='readings.php?l=e&r=".$tr['date']."'>".$t."</a></li>";    
                                                }
                                            }
                                        ?>
                                        </ul>
                                        <br><b>Tamil:</b><br>
                                        <ul>
                                        <?php
                                            foreach($todayReading as $tr) {
                                                if (strlen(trim($tr['title_t']))>0) {

                                                echo "<li><a class='qLink' style='font-size:12px' href='readings.php?l=t&r=".$tr['date']."'>".$tr['title_t']."</a></li>";
                                                }
                                            }
                                        ?>
                                        </ul>
                                        
                                </marquee>
                                </div>
                                
                            <Br><br>
                            <img src="http://www.freundcontainer.com/images/art/grid-arrow-right.png" align="absmiddle" style="width: 12px;"><a href="readings.php" class='viewmore'>More Reading</a>
                              <div class='jContent_title' style=" border-bottom: 2px solid #047d9b;cursor:default;">Mass Booking</div>
                              <form action="massbooking.php" method="post" id="rmbookingfrm" name="rmbookingfrm">
                            <table style="font-size:11px;font-family:'Droid Sans';color:#555;margin-top:8px;margin-bottom:6px">
                                <tr>
                                    <td colspan="2" style="text-align: right;">To Book Mass for your needs from anytime anywhere as you want.</td>
                                </tr>
                                <tr>
                                <td><img src="assets/images/eucharist.jpg" width="100"></td>
                                <td>&nbsp;&nbsp;Select Mass Booking Date<br><input type="text" name="adatepicker_f" id="adatepicker_f" value="<?php echo date("Y-m-d");?>" style="margin-left:6px;margin-top:6px;">
                                 <div id="m_adatepicker_f" style="margin-top: 7px; margin-bottom: 5px; height: 37px; padding-left: 6px;"></div>
                                <img src="assets/images/_booknow.png" onclick="$('#rmbookingfrm').submit();" width="100" style="cursor: pointer;">
                                </td>
                                </tr>
                            </table>
                            </form>
                            <script>new JsDatePick({useMode:2,target:"adatepicker_f",dateFormat:"%Y-%m-%d",yearsRange:[2013,2020]});</script> 
                            <div class='jContent_title' style=" border-bottom: 2px solid #047d9b;cursor:default;">Daily Prayer</div>
                            <img src="http://www.freundcontainer.com/images/art/grid-arrow-right.png" align="absmiddle" style="width: 12px;"><a href="dailyprayer"  class='viewmore'>View Daily Prayer</a>
                            <div class='jContent_title' style=" border-bottom: 2px solid #047d9b;cursor:default;">Donate</div>
                            
                            <table style="font-size:11px;font-family:'Droid Sans';color:#555;margin-top:8px;margin-bottom:6px">
                            <tr>
                                <td>You can donate via online using Credit Card/Debit Card/Net Banking across from India.<br><br>
                                You can also donate do deposit/transfer to our bank.<br>
                                <a href="donate.php" style="outline:none;"><img src="assets/images/green-donate-button.png" width="120" style="margin-top:6px;"></a>
                                </td>
                                <td><img src="assets/images/donate_hand_box.jpg" width="100"></td>
                            </tr>
                            </table>
                             <div class='jContent_title' style=" border-bottom: 2px solid #047d9b;cursor:default;">Other Links</div>
                          <div style="font-family:arial;font-size:12px;margin-left:20px;text-align:left;line-height:30px">
                          <img src="assets/right-arrow.png" align="absmiddle">&nbsp;<A href="news.php" class="qLink">News</a> <br>
                          <img src="assets/right-arrow.png" align="absmiddle">&nbsp;<A href="events.php" class="qLink">Events</a> <br>
                          <img src="assets/right-arrow.png" align="absmiddle">&nbsp;<A href="photos.php" class="qLink">Photo Gallery </a> <br>
                          <img src="assets/right-arrow.png" align="absmiddle">&nbsp;<A href="videos.php" class="qLink">Video Gallery </a> <br>
                          <img src="assets/right-arrow.png" align="absmiddle">&nbsp;<A href="musics.php" class="qLink">Audios</a> <br>
                          <img src="assets/right-arrow.png" align="absmiddle">&nbsp;<A href="downloads.php" class="qLink">Downloads</a> <br>
                          <hr style="border:none;border-bottom:1px solid #f1f1f1">
                          <img src="assets/right-arrow.png" align="absmiddle">&nbsp;<A href="index.php?page=52" class="qLink">Prayers</a><br>
                          <img src="assets/right-arrow.png" align="absmiddle">&nbsp;<A href="index.php?page=34" class="qLink">Sub Stations</a><br>
                          <img src="assets/right-arrow.png" align="absmiddle">&nbsp;<A href="index.php?page=35" class="qLink">Parish Boundary</a><br>
                          <img src="assets/right-arrow.png" align="absmiddle">&nbsp;<A href="downloads.php?downloads=8" class="qLink">Newsletter</a><br>
                          </div>
                          
                          <!--<div class='jContent_title' style="margin-bottom:5px;margin-top:5px;border-bottom: 2px solid #047d9b;">Calendar</div>
                          <link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
                          <script type="text/javascript" src="jquery.1.4.2.js"></script>
                          <script type="text/javascript" src="jsDatePick.jquery.min.1.3.js"></script>
                          
                          <script type="text/javascript">
    window.onload = function(){        
        
        g_globalObject = new JsDatePick({
            useMode:1,
            isStripped:true,
            target:"div3_example"
            /*selectedDate:{                This is an example of what the full configuration offers.
                day:5,                        For full documentation about these settings please see the full version of the code.
                month:9,
                year:2006
            },
            yearsRange:[1978,2020],
            limitToToday:false,
            cellColorScheme:"beige",
            dateFormat:"%m-%d-%Y",
            imgPath:"img/",
            weekStartDay:1*/
        });
        
        g_globalObject.setOnSelectedDelegate(function(){
            var obj = g_globalObject.getSelectedDay();
            alert("a date was just selected and the date is : " + obj.day + "/" + obj.month + "/" + obj.year);
            document.getElementById("div3_example_result").innerHTML = obj.day + "/" + obj.month + "/" + obj.year;
        });
        
        
        
 
        
        g_globalObject2.setOnSelectedDelegate(function(){
            var obj = g_globalObject2.getSelectedDay();
            alert("a date was just selected and the date is : " + obj.day + "/" + obj.month + "/" + obj.year);
            document.getElementById("div3_example_result").innerHTML = obj.day + "/" + obj.month + "/" + obj.year;
        });        
        
    };
</script>     -->
 
    
    
    <div id="div3_example" style="margin:0 auto;width:205px; height:230px;">
        
    </div>
    
      <div style="height:20px">&nbsp;</div>
            <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/dsmountshrine" data-widget-id="571633647782871040">Tweets by @dsmountshrine</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            <br><br>
 
  
  <div class='jContent_title' style="margin-bottom:5px;margin-top:5px;border-bottom: 2px solid #047d9b;">Visitors</div>
  
  <a href="http://info.flagcounter.com/MdIA"><img src="http://s09.flagcounter.com/count/MdIA/bg_FFFFFF/txt_000000/border_CCCCCC/columns_2/maxflags_12/viewers_DSMount/labels_1/pageviews_1/flags_0/" alt="Flag Counter" border="0"></a>
        
          
  <div class='jContent_title' style=" border-bottom: 2px solid #047d9b;">Other Links</div>
  <span style="font-family:arial;font-size:12px;">
  Prayer Request <br>
  Witnesses <br>
  Mount Innovations<br>
  </span>
  
                                
</td>