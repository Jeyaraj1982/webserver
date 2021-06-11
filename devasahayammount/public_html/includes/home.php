<?php
    $home = $mysql->select("select * from _jpages where ishomepage=1");
 
    if (sizeof($home)>0) {
        
    $pageContent = $mysql->select("select * from _jpages where pageid=".$home[0]['pageid']);
    echo "<div style='padding:10px;font-family:arial;font-size:13px;text-align:justify;'>";
    
    if ( (strlen(trim($pageContent[0]['filepath']))>0) && (file_exists("assets/cms/".$pageContent[0]['filepath']))) {
        echo "<img style='border:1px solid #ccc;height:140px' src='assets/cms/".$pageContent[0]['filepath']."'  align='right'>";    
    }
    echo $pageContent[0]['pagedescription'];
    echo "</div>";
    
    }
    
?>
<script>
function lightCandle(id,candle,res) {
    $('#'+res).html("<div style='text-align:center;width:100%;padding:5px;'><img src='assets/loader.gif'></div>");
    $('#'+id).attr({'src':'assets/burningcandle_1.gif'});
    $('#'+id).css({'cursor':'default'});
    $('#'+id).removeAttr('onclick');    
    var candlefor = res=='dres' ? 'D' : 'M';
    $.ajax({url:'webservice.php?lightCandle=1&candle='+candle+"&candlefor="+candlefor,success:function(data){$('#'+res).html(data);}});
}

</script>

<?php
       $dCandle = $mysql->select("select * from _candle where candlefor ='M' and sessionid='".session_id()."' and date(candleon)=date('".date("Y-m-d")."')");
     if (sizeof($dCandle)==0) {
       $dCandle[0]['candle1']=0;  
       $dCandle[0]['candle2']=0;  
       $dCandle[0]['candle3']=0;  
       $dCandle[0]['candle4']=0;  
       $dCandle[0]['candle5']=0;  
       $dCandle[0]['candle6']=0;  
       $dCandle[0]['candle7']=0;  
     }
  ?>
<table  style="width:100%">
    <tr>
     <td>
  
     
     <table width="width:100%">
        <tr>
            <td width="55%">
                <div style="font-family:'droid sans';font-size:13px;color:#777">
                    You are most welcome to light a candle for your personal intentions.
                </div>
       
                <div style="font-family:'droid sans';font-size:11px;color:#777;margin-top:10px">
                    உங்கள் கருத்துக்காக ஒரு மெழுகுவர்த்தியை ஏற்றவும்    
                </div>
            </td>
            <td width="5%">&nbsp;</td>
            <td>
                <div id='mres' style="font-family:'droid sans';font-size:11px;color:#FF7011">
                <?php 
                    $mC = $mysql->select("SELECT SUM(candle1+candle2+candle3+candle4+candle5+candle6+candle7+candle8+candle9) AS candles FROM _candle WHERE candlefor='M'"); 
                    $mC2 = $mysql->select("SELECT count(*) as conut  FROM _candle WHERE candlefor='M'"); 
                ?>
                Sessions: <?php echo $mC2[0]['conut'];?><br>
                Candles Lighted : <?php echo $mC[0]['candles']; ?><br>
                ஏற்றிவைக்கப்பட்ட மெழுகுவர்த்திகள் <?php echo $mC[0]['candles']; ?><br>
                </div>    
            </td>
        </tr>
     </table>

       
        </td>
        </tr>
        <tr>
        <td>
        <div style="text-align: center; background: url('assets/_matha.png') no-repeat scroll center center transparent; height: 290px;">

<br><br><br><Br>
<br><br><br><Br>

  <!--<img src='assets/burning-candle_0.gif' height="130px" onclick="this.src='assets/burningcandle_1.gif';$(this).css({'cursor':'default'});" style="cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  
  <img src='assets/burning-candle_0.gif' height="130px" onclick="this.src='assets/burningcandle_1.gif';$(this).css({'cursor':'default'});" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">-->  
  <?php if ($dCandle[0]['candle1']==0) {?>
  <img src='assets/burning-candle_0.gif' height="130px" id='mC1' onclick="lightCandle('mC1','1','mres')" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  
  <?php } else {?>
  <img src='assets/burningcandle_1.gif' height="130px" style="margin-left:-14px;cursor: default;" title="Already Lighted">  
  <?php } ?>
  
  <?php if ($dCandle[0]['candle2']==0) {?>
  <img src='assets/burning-candle_0.gif' height="130px"  id='mC2' onclick="lightCandle('mC2','2','mres')" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  
   <?php } else {?>
   <img src='assets/burningcandle_1.gif' height="130px"  id='mC2'  style="margin-left:-14px;cursor:default;" title="Already Lighted">  
   <?php } ?>
  <!--
  <img src='assets/blank_burning-candle.png' height="125px" style="margin-left:-14px;">  
  <img src='assets/blank_burning-candle.png' height="125px"  style="margin-left:-14px;">  
  -->
  
  <?php if ($dCandle[0]['candle3']==0) {?>
  <img src='assets/burning-candle_0.gif' height="130px" id='mC3' onclick="lightCandle('mC3','3','mres')" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  
  <?php } else { ?>
  <img src='assets/burningcandle_1.gif' height="130px" id='mC3' style="margin-left:-14px;cursor:default;" title="Already Lighted">  
  <?php } ?>
  <?php if ($dCandle[0]['candle4']==0) {?>
  <img src='assets/burning-candle_0.gif' height="90px"  id='mC4' onclick="lightCandle('mC4','4','mres')" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  
  <?php } else { ?>
  <img src='assets/burningcandle_1.gif' height="90px" style="margin-left:-14px;cursor:default;" title="Click here to Flame">  
  <?php } ?>
  
    
  <?php if ($dCandle[0]['candle5']==0) {?>
  <img src='assets/burning-candle_0.gif' height="130px" id='mC5' onclick="lightCandle('mC5','5','mres')" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  
  <?php } else { ?>
  <img src='assets/burningcandle_1.gif' height="130px" id='mC5' style="margin-left:-14px;cursor:default;" title="Already Lighted">  
  <?php } ?>
  
  <?php if ($dCandle[0]['candle6']==0) {?>
  <img src='assets/burning-candle_0.gif' height="130px"  id='mC6' onclick="lightCandle('mC6','6','mres')" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  
  <?php } else { ?>
  <img src='assets/burningcandle_1.gif' height="130px" style="margin-left:-14px;cursor:default;" title="Click here to Flame">  
  <?php } ?>
  
    <?php if ($dCandle[0]['candle7']==0) {?>
  <img src='assets/burning-candle_0.gif' height="130px"  id='mC7' onclick="lightCandle('mC7','7','mres')" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  
  <?php } else { ?>
  <img src='assets/burningcandle_1.gif' height="130px" style="margin-left:-14px;cursor:default;" title="Click here to Flame">  
  <?php } ?>
  
  
 <!-- <img src='assets/burning-candle_0.gif' height="130px" onclick="this.src='assets/burningcandle_1.gif';$(this).css({'cursor':'default'});" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  
  <img src='assets/burning-candle_0.gif' height="130px" onclick="this.src='assets/burningcandle_1.gif';$(this).css({'cursor':'default'});" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  -->
</div>
        </td>
        </tr>
</table>

<br><br>
<hr style="border:none;border-bottom:1px solid #e5e5e5">

<table style="width:100%">
        <tr>
        <td >
        <div style="font-family:'droid sans';font-size:13px;color:#777">
       You are most welcome to light a candle for your personal intentions.
       </div>
       
       <div style="font-family:'droid sans';font-size:11px;color:#777;margin-top:10px">
       உங்கள் கருத்துக்காக ஒரு மெழுகுவர்த்தியை ஏற்றவும்    
       </div>
       <div id='dres' style="font-family:'droid sans';font-size:11px;color:#FF7011;margin-top:50px">
            <?php 
                $mC = $mysql->select("SELECT SUM(candle1+candle2+candle3+candle4+candle5+candle6+candle7+candle8+candle9) AS candles FROM _candle WHERE candlefor='D'"); 
               
              ?>
           Candles Lighted : <?php echo $mC[0]['candles']; ?><br>
           ஏற்றிவைக்கப்பட்ட மெழுகுவர்த்திகள்  <?php echo $mC[0]['candles']; ?><br>
       </div>
        </td>
    </tr>
    
    <tr>
        <td>
        <div style="text-align: center; background: url('assets/devasahayampillai.png') no-repeat scroll center center transparent; height: 290px;">

<br><br><br><Br>
<br><br><br><Br>
<?php
 
     $dCandle = $mysql->select("select * from _candle where candlefor ='D' and sessionid='".session_id()."' and date(candleon)=date('".date("Y-m-d")."')");
     if (sizeof($dCandle)==0) {
       $dCandle[0]['candle1']=0;  
       $dCandle[0]['candle2']=0;  
       $dCandle[0]['candle3']=0;  
       $dCandle[0]['candle4']=0;  
       $dCandle[0]['candle5']=0;  
       $dCandle[0]['candle6']=0;  
       $dCandle[0]['candle7']=0;  
       $dCandle[0]['candle8']=0;  
       $dCandle[0]['candle9']=0;  
     }
?>
    <?php if ($dCandle[0]['candle1']==0) {?>
    <img src='assets/burning-candle_0.gif' height="130px" id='dC1' onclick="lightCandle('dC1','1','dres')" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  
    <?php } else {?>
    <img src='assets/burningcandle_1.gif' height="130px" style="margin-left:-14px;cursor: default;" title="Already Lighted">  
    <?php } ?>
    
    <?php if ($dCandle[0]['candle2']==0) {?>
    <img src='assets/burning-candle_0.gif' height="130px" id='dC2' onclick="lightCandle('dC2','2','dres')" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  
    <?php } else {?>
    <img src='assets/burningcandle_1.gif' height="130px" style="margin-left:-14px;cursor:default;" title="Already Lighted">  
    <?php } ?>
    
 
    <?php if ($dCandle[0]['candle3']==0) {?>
    <img src='assets/burning-candle_0.gif' height="130px" id='dC3' onclick="lightCandle('dC3','3','dres')" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  
    <?php } else { ?>
        <img src='assets/burningcandle_1.gif' height="130px"  style="margin-left:-14px;cursor:default;" title="Already Lighted">  
    <?php } ?>
    
    <?php if ($dCandle[0]['candle4']==0) {?>
    <img src='assets/burning-candle_0.gif' height="130px" id='dC4' onclick="lightCandle('dC4','4','dres')" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  
    <?php } else {?>
    <img src='assets/burningcandle_1.gif' height="130px" style="margin-left:-14px;cursor: default;" title="Already Lighted">  
    <?php } ?>
    
    
        <?php if ($dCandle[0]['candle5']==0) {?>
    <img src='assets/burning-candle_0.gif' height="90px" id='dC5' onclick="lightCandle('dC5','5','dres')" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  
    <?php } else {?>
    <img src='assets/burningcandle_1.gif' height="90px" style="margin-left:-14px;cursor: default;" title="Already Lighted">  
    <?php } ?>
    
    <?php if ($dCandle[0]['candle6']==0) {?>
    <img src='assets/burning-candle_0.gif' height="130px" id='dC6' onclick="lightCandle('dC6','6','dres')" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  
    <?php } else {?>
    <img src='assets/burningcandle_1.gif' height="130px" style="margin-left:-14px;cursor:default;" title="Already Lighted">  
    <?php } ?>
    
 
    <?php if ($dCandle[0]['candle7']==0) {?>
    <img src='assets/burning-candle_0.gif' height="130px" id='dC7' onclick="lightCandle('dC7','7','dres')" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  
    <?php } else { ?>
        <img src='assets/burningcandle_1.gif' height="130px"  style="margin-left:-14px;cursor:default;" title="Already Lighted">  
    <?php } ?>
    
    <?php if ($dCandle[0]['candle8']==0) {?>
    <img src='assets/burning-candle_0.gif' height="130px" id='dC8' onclick="lightCandle('dC8','8','dres')" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  
    <?php } else {?>
    <img src='assets/burningcandle_1.gif' height="130px" style="margin-left:-14px;cursor: default;" title="Already Lighted">  
    <?php } ?>
    
        <?php if ($dCandle[0]['candle9']==0) {?>
    <img src='assets/burning-candle_0.gif' height="130px" id='dC9' onclick="lightCandle('dC9','9','dres')" style="margin-left:-14px;cursor: url('assets/flame.cur'), default;" title="Click here to Flame">  
    <?php } else {?>
    <img src='assets/burningcandle_1.gif' height="130px" style="margin-left:-14px;cursor: default;" title="Already Lighted">  
    <?php } ?>
    
    
    
    
</div>
        </td>
        </tr>

</table>


  

<img src='assets/burningcandle_1.gif' height="0" width="0">
<img src='assets/loader.gif' height="0" width="0">
<br><br><br>
       <table style="width:100%;" cellpadding="0" cellspacing="0">
            <tr>
                <?php if ( (JFrame::getAppSetting('isenablephoto')) || (JFrame::getAppSetting('isenablevideo')) )  {?>
                    <td valign="top">
                        <?php
                        if (JFrame::getAppSetting('isenableevents')) {  
                        include_once("includes/hp_feature_events.php");
                        }
                        ?>
                        <br><Br>
                        <?php include_once("includes/osai.php"); ?>
                        <br><Br><Br>
                        <?php include_once("includes/books.php"); ?>
                    </td>
                    <td width="10">&nbsp;</td>
                    <td width="300" style="vertical-align: top;">
                        <?php 
                         if (JFrame::getAppSetting('isenablephoto')) {
                              include_once("includes/hp_feature_photos.php");
                         }
                         echo "<br>";
                         if (JFrame::getAppSetting('isenablevideo')) {
                              include_once("includes/hp_feature_videos.php");
                         } 
                         ?>
                    </td>
                    
                <?php } else { ?>
                    <td colspan="3"  valign="top">
                        <?php 
                          if (JFrame::getAppSetting('isenableevents')) {
                             include_once("includes/hp_feature_events.php");
                          }
                        ?>
                    </td>
                    <?php } ?>
                
            </tr>
             <tr>
                  <td colspan="3">
                     <?php 
                      if (JFrame::getAppSetting('isenablenews')) {
                          include_once("includes/hp_feature_news.php");
                      }
                     ?>
                  </td>
            </tr>
        </table>