<?php include_once("header.php"); ?>
<style type="text/css">
.chats_personname {font-size:14px;font-weight:bold;text-transform: uppercase}
.chats_ads{font-size:12px;color:#666}
.chats_msg{font-size:12px;color:#999}
</style>
<div class="main-panel" style="width:100%;height:auto !important">
    <div class="container"> 
                <?php
                    $chats = $mysql->select("select * from _chat_initiate where (adPosted='".$_SESSION['USER']['userid']."' or adViewed='".$_SESSION['USER']['userid']."') ");
                    $print_count = 0;
                    if (sizeof($chats)>0) {
                        ?>
                        <div>
                        <?php
                    foreach($chats as $c) {
                        $d = JPostads::getAd($c['adID'],0);
                        $postedBy = $c['adPosted'];
                        $viewedBy = $c['adViewed'];
                        $postedByInfo = $mysql->select("select * from _jusertable where userid='".$postedBy."'");
                        $viewedByInfo = $mysql->select("select * from _jusertable where userid='".$viewedBy."'");
                        $filename = ((strlen(trim($d[0]['filepath1']))>4) && file_exists("assets/".$config['thumb'].$d[0]['filepath1'])) ? "assets/".$config['thumb'].$d[0]['filepath1'] : "assets/cms/".Jca::getAppSetting('noimage');
                        if ($_SESSION['USER']['userid']==$postedBy) { 
                            $msg = $mysql->select("select * from _tblmessages where chatroomid='".$c['ChatID']."' and sentby='". $viewedBy."' order by chatid desc limit 0,1"); 
                        }  else {
                            $msg = $mysql->select("select * from _tblmessages where chatroomid='".$c['ChatID']."' and sentby='".$postedBy."' order by chatid desc limit 0,1");                             
                        }
                        if (sizeof($msg)>0) {
                            $print_count++;
                        ?>                                                         
                        <div class="row" style="<?php echo $print_count==0 ? 'border-top:2px solid #ccc;' :'';?>;border-bottom:2px solid #ccc;background:#fefefe">
                            <div class="col-2">
                                <div  style="padding:10px;">
                                    <img src='<?php echo base_url.$filename;?>' style="height:50px;width:50px;border-radius:3px">
                                </div>
                            </div>
                            <div class="col-8" style="padding-top:10px;padding-left:20px;line-height:15px;">
                                <?php if ($_SESSION['USER']['userid']==$postedBy) { ?>
                                    <span class='chats_personname'><?php echo $viewedByInfo[0]['personname'];?></span><br>
                                    <span class='chats_ads'>Ad: <?php echo substr($d[0]['title'],0,25)." ...";?></span><br>
                                    <span class='chats_msg'>Msg: <?php echo substr($msg[0]['message'],0,25)." ...";?></span>
                                <?php }  else {?>
                                    <span class='chats_personname'><?php echo $postedByInfo[0]['personname'];?></span><br>
                                    <span class='chats_ads'>Ad: <?php echo substr($d[0]['title'],0,25)." ...";?></span><br>
                                    <span class='chats_msg'>Msg: <?php echo substr($msg[0]['message'],0,25)." ...";?></span>
                                <?php } ?>
                            </div>
                            <div class="col-2" style="padding-left:0px;padding-top:15px;">
                                <a href="<?php echo country_url;?>chat/room/<?php echo md5("j2jsoftwaresolutoins_".$c['ChatID']);?>&back=chats" style="color:#555;font-weight:bold;text-decoration:none;"><i class="flaticon-right-arrow-4" style="font-size:28px"></i></a>
                            </div>
                        </div>
                    <?php } ?> 
                    <?php } ?>
                    <?php if ($print_count==0) { ?>
                        <div style="padding:20px;text-align:center;padding-top:50px;">   
                         <i class="flaticon-chat-4" style="font-size:72px"></i><br>
                         <span style="color:#888"> No chats found<br><br><br></span> 
                         <a href="<?php echo country_url;?>" class="btn btn-primary btn-sm" style="padding:5px 20px;padding-right:10px;">Continue&nbsp;&nbsp;<i class="flaticon-right-arrow" style="float:right"></i></a>  
                  </div>
                    <?php } ?>
                     
                    </div>
                   <?php } else { ?>
                    <div style="padding:20px;text-align:center;padding-top:50px;">   
                         <i class="flaticon-chat-4" style="font-size:72px"></i><br>
                         <span style="color:#888"> No chats found<br><br><br></span> 
                         <a href="<?php echo country_url;?>" class="btn btn-primary btn-sm" style="padding:5px 20px;padding-right:10px;">Continue&nbsp;&nbsp;<i class="flaticon-right-arrow" style="float:right"></i></a>  
                  </div>
                   <?php } ?>                           
            
        </div> 
    </div>
<?php include_once("footer.php"); ?>