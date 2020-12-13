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
        <script src="../js/jquery.min.js"></script>
        <style>
            .timecaption {font-family:arial;font-size:10px;}
            .timeresult {font-family:arial;font-size:16px;font-weight:bold;}  
            #cBox {text-align:center;background:#45D4FF;border-radius:5px;padding:2px;width:27px;font-family:arial;font-size:12px;text-align:center;color:#ffffff;border:1px solid #37C9F2}      
            .fadein { position:relative;}
            .lmenu {text-decoration: none;color:#214689;}
            .lmenu:hover {text-decoration: underline;color:#214689;font-weight:bold}
            .fadein img { left:7; top:0; }    
            div {font-family:arial;font-size:12px;}     
            .sub_Menu {cursor:pointer;float:left;color:#ffffff;font-weight:Bold;font-family:arial;font-size:12px;padding:5px;text-align:left;border-right:1px dotted #cccccc;padding-left:20px;padding-right: 20px;}
        </style>
        
<?php
 include_once("config.php");   
    $item =  $mysql->select("select * from _items where md5(itemid)='".$_REQUEST['item']."'");
    $item = $item[0];
?>
<div style="float:left;width:370px;height:415px;border:1px solid #cccccc;margin-right:<?php echo ($c==0) ? '18px' : '0px'; ?>;margin-bottom: <?php echo ($c==0) ? '18px' : '0px'; ?>;" >
    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="70%" style="padding-left:5px"><div style="color:#666666;font-family: arial;font-size:18px;height:44px"><?php echo $item['itemname'];?></div></td>
            <td align="right" valign="top"><div style='background:#A419AA;color:#ffffff;font-family: arial;font-size:12px;width:90px;padding:5px;text-align:left;font-weight:bold;'>Rs. <?php echo number_format($item['price'],2);?>/-</div></td>
        </tr>
        <tr>
            <td colspan="2"><div style="text-align: center;"><img src="../productimages/<?php echo $item['productimage']; ?>"   height="241"></div></td>
        </tr>
        <tr>
            <td colspan="2">
                <table cellspacing="1" cellpadding="0" align="right">
                    <tr>
                        <td><div id="cBox" style="width:58px;height:26px;padding-top:10px;font-weight:Bold;">Closed In</div></td>
                        <td><div id="cBox"><span id="daysBox_<?php echo $i;?>"  class="timeresult"></span><br><span id="ddBox_<?php echo $i;?>" class="timecaption"></span></div></td>
                        <td><div id="cBox"><span id="hoursBox_<?php echo $i;?>" class="timeresult"></span><br><span id="hhBox_<?php echo $i;?>" class="timecaption"></span></div></td>
                        <td><div id="cBox"><span id="minsBox_<?php echo $i;?>"  class="timeresult"></span><br><span id="mmBox_<?php echo $i;?>" class="timecaption"></span></div></td>
                        <td><div id="cBox"><span id="secsBox_<?php echo $i;?>"  class="timeresult"></span><br><span id="ssBox_<?php echo $i;?>" class="timecaption"></span></div></td> 
                    </tr>
                    <tr>
                        <td colspan="5">
                            <div style="border:0px solid #DD13D0;background-image:url(../images/bg.png);width:195px;border-radius:5px;padding:2px;margin-bottom: 5px;">
                                <table width="100%">
                                    <tr>    
                                        <td style="width: 85px;"><div style="border:1px solid #ffffff;background:#ffffff;width:85px;border-radius:5px;;font-family: arial;font-size:16px;padding:5px;text-align:center;color:#666666">Rs. <?php echo $item['bidamount'];?> / Bid</div></td>
                                        <td><div style="color:#ffffff;font-family: arial;font-size:16px;padding:5px;font-weight:bold;text-align:center">Buy Now</td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="background:#f1f1f1;padding:5px;height:40px;border-top:1px solid #aaaaaa;font-family:arial;font-size:12px;">Current Lowest Unique bidder:  </td>
        </tr>    
    </table>
</div>
<script type="text/javascript">cd('<?php echo date("m d, Y H:i:s",strtotime($item['endon']));?>','<?php echo $i;?>');</script>
 
            