
    <div style="line-height:20px;overflow:hidden;margin-top:15px;margin-bottom:0px;">
    <div style="background:url(images/ivp_activities.png);height:45px;"></div>
    
    <div style='padding:10px;padding-top:0px;padding-left:5px;height:340px;'>
        <a href="javascript:view('photos');" id="_photos" class='nav_right' >&nbsp;&nbsp;Photos&nbsp;&nbsp;</a>
       
      <!--  <a href="javascript:view('speech');" id="_speech" class='nav_right'>&nbsp;&nbsp;Speech&nbsp;&nbsp;</a>-->
        <div id="widget_result" style="margin-top:3px;border:1px solid #ccc;height:297px;"></div>
        
        <div id='result_photos' style='display:none'>
            <marquee scrollamount=2 direction="up" style='height:250px;margin:10px;overflow:hidden;' onmouseover="this.stop();" onmouseout="this.start();">
                <table cellspacing='0' cellpadding='0'>
                    <?php $lists = $mysql->select("Select * from _posts where ispublished=1 and categoryid=7  order by id desc "); ?>
                  
                    <?php foreach($lists as $l) {?>
                    <tr>
                        <td style="text-align: center;">
                            <?php 
// if (strlen(trim($l['thumb']))>0) {
if (false) { ?>
                                <img src='profile/<?php echo $l['thumb'];?>' style='height:60px;width:75px;margin-bottom:5px;padding-right:5px;border:1px solid #f1f1f1;' align='left'>
                            <?php } else { 
                                $imgData = explode("src=",$l['description']);
                                $imgData = explode('"',$imgData[1]);
 
                                if (strlen(trim($imgData[1]))>0) { ?>
                                    <a href="?jsessionid=<?php echo md5($l['id']);?>" style="color:#0163C7;font-size:10px;text-decoration:none;line-height:15px"><img src='<?php echo $imgData[1];?>' style='width:95%;margin-bottom:5px;padding-right:5px;border:1px solid #f1f1f1;' align='left'></a>
                                <?php } else { /* ?>
                                    <a href="?jsessionid=<?php echo md5($l['id']);?>" style="color:#0163C7;font-size:10px;text-decoration:none;line-height:15px"><img src='images/v.jpg' style='height:60px;width:60px;margin-bottom:5px;padding-right:5px;border:1px solid #f1f1f1;' align='left'></a>
                                <?php */}  ?>
                            <?php } ?>
                        </td>
                       <!-- <td valign='top'><a href="?jsessionid=<?php echo md5($l['id']);?>" style="color:#0163C7;font-size:10px;text-decoration:none;line-height:15px"><?php echo $l['title'];?></a></td>-->
                    </tr>
                    <?php } ?>
                </table>
            </marquee>
            <div style="background:#f1f1f1;text-align:right;padding:3px;border-top:1px solid #eee"><a href-'http://indiansvictoryparty.com/?category=7'>More Photos ...</a></div>
        </div>
</div>

<div style='margin:5px'>
 <a href="javascript:view('videos');" id="_videos" class='nav_right'>&nbsp;&nbsp;Videos&nbsp;&nbsp;</a>
        <div id='result_videos' style='border:1px solid #ccc;'>

        <marquee scrollamount=2 direction="up" style='height:250px;margin:10px;overflow:hidden;' onmouseover="this.stop();" onmouseout="this.start();">
                <table cellspacing='0' cellpadding='0' style="width: 100%;">
                    <?php $lists = $mysql->select("Select * from _posts where ispublished=1 and categoryid=8  order by id desc limit 0,20"); ?>
                    <?php //$lists = array("","","","","","");?>
                    <?php foreach($lists as $l) {?>
                    <tr>
                        <td>
<?php
                                $imgData = explode("http://www.youtube.com/v/",$l['description']);
                              //  $imgData = explode('',$imgData[1]);
$imgData = explode('"',$imgData[1]);
 
$ipath ='http://img.youtube.com/vi/'.trim($imgData[0]).'/default.jpg'; 
?>
                            
                        <a href="?jsessionid=<?php echo md5($l['id']);?>" style="color:#0163C7;font-size:11px;text-decoration:none;line-height:15px"><img src='<?php echo $ipath;?>' style='width:95%;margin-bottom:5px;padding-right:5px;border:1px solid #f1f1f1;' align='left'></a>
                              
                        </td>
                        
                    </tr>
                    <?php } ?>
                </table>
            </marquee>
            <div style="background:#f1f1f1;text-align:right;padding:3px;border-top:1px solid #eee">More Videos ...</div>         
        </div>
                <div id='result_speech' style='display:none'>
        <marquee scrollamount=2 direction="up" style='height:250px;margin:10px;overflow:hidden;' onmouseover="this.stop();" onmouseout="this.start();">
                <table cellspacing='0' cellpadding='0'>
                    <?php $lists = $mysql->select("Select * from _posts where ispublished=1 and categoryid>2  order by id desc limit 0,20"); ?>
                    <?php $lists = array("","","","","","");?>
                    <?php foreach($lists as $l) {?>
                    <tr>
                        <td style="text-align: center;">
                            <?php if (strlen(trim($l['thumb']))>0) { ?>
                                <img src='profile/<?php echo $l['thumb'];?>' style='height:60px;width:75px;margin-bottom:5px;padding-right:5px;border:1px solid #f1f1f1;' align='left'>
                            <?php } else { 
                                $imgData = explode("src=",$l['description']);
                                $imgData = explode('"',$imgData[1]);
                                if (strlen(trim($imgData[1]))>0) { ?>
                                    <a href="?jsessionid=<?php echo md5($l['id']);?>" style="color:#0163C7;font-size:10px;text-decoration:none;line-height:15px"><img src='<?php echo $imgData[1];?>' style='height:60px;width:95%;margin-bottom:5px;padding-right:5px;border:1px solid #f1f1f1;' align='left'></a>
                                <?php } else { /*?>
                                    <img src='images/v.jpg' style='height:60px;width:60px;margin-bottom:5px;padding-right:5px;border:1px solid #f1f1f1;' align='left'>
                                <?php  */}  ?>
                            <?php } ?>
                        </td>
<!--                        <td valign='top'><a href="?jsessionid=<?php echo md5($l['id']);?>" style="color:#0163C7;font-size:10px;text-decoration:none;line-height:15px"><?php echo $l['title'];?></a></td>-->
                    </tr>
                    <?php } ?>
                </table>
            </marquee>
            <div style="background:#f1f1f1;text-align:right;padding:3px;border-top:1px solid #eee">More Speeches ...</div>         
        </div> 
        <script>view('photos');</script>
        </div>
    </div>                                                        
    
    <div style="background:url(images/ivp_donatenow.png);height:45px;"></DIV>
    <div style="margin-bottom:15px;text-align:center">
        <a href="?jsessionid=<?php echo md5('66');?>" style="color:#0163C7;"><img src="images/donate-Now.gif" width="280" border="0"></a>
    </div> 
<!--
    <div style="line-height:20px;overflow:hidden;margin-top:15px;margin-bottom:0px;">        
        <div style="background:url(images/ivp_joinivp.png);height:45px;"></div>
        <div style='padding:10px;padding-top:0px;padding-left:5px;height:340px;'>
            <a href="javascript:getContent('members');" id="_members" class='nav_right'>&nbsp;&nbsp;Members&nbsp;&nbsp;</a>
            <a href="javascript:getContent('subscribers');" id="_subscribers" class='nav_right'>&nbsp;&nbsp;Email Subscriber&nbsp;&nbsp;</a>
            <div id="widget_content" style="margin-top:3px;border:1px solid #ccc;height:297px;"></div>
            
            <div id='result_members' style='display:none'>
                
            </div>
            <div id='result_subscribers' style='display:none'>
                     <table cellpadding="5" cellspacing="0" width="100%">
                        <tr>
                            <td>Enter Email Address</td>
                        </tr>
                        <tr>
                            <td><input type='text'></td>
                        </tr>
                        <tr>
                            <td><input type='submit' value="Subscribe"></td>
                        </tr>
                     </table>
            </div>
            <script>getContent('members');</script>
        </div>
    </div>
    
   -->  

    <div style="line-height: 25px;border:2px solid #FF00BF;padding:10px;background:#FFF4FC;margin-bottom:30px;">
        <?php
            $ar = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
            foreach($ar as $a) {
               // $l = $mysql->select("Select * from _posts where ispublished=1  and id=".$a);
                foreach($mysql->select("Select * from _posts where ispublished=1  and id=".$a) as $lp) {
                    echo "<img src='images/right.png' border='0' align='absmiddle'>&nbsp;&nbsp;<a href='?jsessionid=".md5($lp['id'])."' class='smenul'>".trim($lp['title'])."</a><br>";
                }
            }
        ?>
    </div>  

    <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FIndian_victory_party%2F452121048155942&amp;width=300&amp;height=419&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:425px;" allowTransparency="true"></iframe>

    <div style="margin-top:10px;margin-bottom:15px;">
        <table cellpadding="5" cellspacing="0">
        <!--    <tr>
                <td><script type="text/javascript" src="http://100widgets.com/js_data.php?id=89"></script></td>
                <td><embed src="http://100widgets.com/js/clock082.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="10096001" quality="High" wmode="transparent" height="133" width="154"></td>
            </tr>-->
            <tr>
                <td colspan="2" style="text-align: center;"><a href='?pid=register'><img src='images/Join-Now1.gif' border="0"></a>     </td>
            </tr>
        </table>
    </div>
    
    <div style="margin-top:10px;margin-bottom:15px;">
        <a href="http://flgc.info/NuIrT3"><img src="http://s10.flagcounter.com/count/pA9q/bg_FFFFFF/txt_000000/border_CCCCCC/columns_3/maxflags_30/viewers_Indiansvictoryparty.com/labels_1/pageviews_1/flags_1/" alt="free counters" border="0"></a>
    </div>

    <div>
        <script type="text/javascript" src="http://feedjit.com/serve/?vv=955&amp;tft=3&amp;dd=0&amp;wid=a603a7d5cb3a25ab&amp;pid=0&amp;proid=0&amp;bc=FFFFFF&amp;tc=000000&amp;brd1=012B6B&amp;lnk=135D9E&amp;hc=FFFFFF&amp;hfc=2853A8&amp;btn=C99700&amp;ww=285&amp;wne=20&amp;wh=Live+Traffic+Feed&amp;hl=0&amp;hlnks=0&amp;hfce=0&amp;srefs=1&amp;hbars=0"></script>
	
    </div>    
    
    <div style="line-height:20px;border:1px solid #f1f1f1;padding:10px;height:360px;overflow:hidden;margin-bottom:15px;display:none;">
        <img src='images/new_icon.png'><br><br>
        <marquee scrollamount=2 direction="up" style='height:300px;' onmouseover="this.stop();" onmouseout="this.start();">
            <table cellspacing='0' cellpadding='0'>
            <?php $lists = $mysql->select("Select * from _posts where ispublished=1 and categoryid>2  order by id desc limit 0,20"); ?>
            <?php foreach($lists as $l) {?>
                <tr>
                    <td>
                        <?php if (strlen(trim($l['thumb']))>0) { ?>
                            <img src='profile/<?php echo $l['thumb'];?>' style='height:60px;width:75px;margin-bottom:5px;padding-right:5px;border:1px solid #f1f1f1;' align='left'>
                        <?php } else { 
                            $imgData = explode("src=",$l['description']);
                            $imgData = explode('"',$imgData[1]);
                            if (strlen(trim($imgData[1]))>0) { ?>
                                <img src='<?php echo $imgData[1];?>' style='height:60px;width:75px;margin-bottom:5px;padding-right:5px;border:1px solid #f1f1f1;' align='left'>
                            <?php } else { ?>
                                <img src='images/v.jpg' style='height:95px;width:60px;margin-bottom:5px;padding-right:5px;border:1px solid #f1f1f1;' align='left'>
                            <?php }  ?>
                        <?php } ?>
                    </td>
                    <td valign='top'><a href="?jsessionid=<?php echo md5($l['id']);?>" style="color:#0163C7;font-size:10px;text-decoration:none;line-height:15px"><?php echo $l['title'];?></a></td>
                </tr>
            <?php } ?>
            </table>
        </marquee>
    </div>
