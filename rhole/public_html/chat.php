<?php
    include_once("header.php");

    /* Create Chat Room */
    if (isset($_GET['create']) && $_GET["create"]==1) {
        $d = JPostads::getAd($_GET['ad'],0);
        $chat_history = $mysql->select("select * from _chat_initiate where adID='".$_GET['ad']."' and adPosted='".$d[0]["postedby"]."' and adViewed='".$_SESSION['USER']['userid']."'");
        if (sizeof($chat_history)==0) {
            $id= $mysql->insert("_chat_initiate",array("adID"     => $_GET['ad'],
                                                       "adPosted" => $d[0]["postedby"],
                                                       "adViewed" => $_SESSION['USER']['userid'],
                                                       "ChatInit" => date("Y-m-d H:i:s")));  
            $url = country_url."chat/room/".md5("j2jsoftwaresolutoins_".$id);
        } else {
            $url = country_url."chat/room/".md5("j2jsoftwaresolutoins_".$chat_history[0]['ChatID']);    
        }
?>
<script>location.href="<?php echo $url;?>";</script>      
<?php
    exit;
    }
    /* End of Create Chat room */
    
    $chatRoom = $mysql->select("select * from _chat_initiate where md5(concat('j2jsoftwaresolutoins_',ChatID))='".$_GET['ad']."'");
    $adID = $chatRoom[0]['adID'];
    $postedBy = $chatRoom[0]['adPosted'];
    $viewedBy = $chatRoom[0]['adViewed'];
    $postedByInfo = $mysql->select("select * from _jusertable where userid='".$postedBy."'");
    $viewedByInfo = $mysql->select("select * from _jusertable where userid='".$viewedBy."'");
    $d = JPostads::getAd($adID,0);
    if (isset($_GET['a']) && $_GET['a']>0) {
        $ads = JPostads::getPostadByCategory($_REQUEST['a']);   
        $c = JPostads::getCategory($_GET['a']);   
    } else {                                    
        $ads = JPostads::getPostadBySubCategory($_REQUEST['s']);   
        $c = JPostads::getCategory($_GET['s']);;               
    }
?>
<style type="">
.row .mobilemenu {display:none}
</style>  
<div class="main-panel" style="width: 100%;">  
    <div class="row"> 
        <div class="col-md-12" style="height:50px;background:#e5e5e5;padding-top:10px;padding-bottom:10px;">
            <div style="width:100%">
                <table style="width: 95%;margin:0px auto">
                    <tr>
                        <td style="width:32px">
                            <a href="<?php echo country_url;?>"><img src="<?php echo AppUrl;?>/assets/back_1.png" style="height:24px"></a> 
                        </td>
                        <td style="width:32px">
                            <img src="<?php echo AppUrl;?>/assets/user.png" style="height:32px"> 
                        </td>
                        <td style="padding-left:10px;line-height:15px">
                             <?php if ($_SESSION['USER']['userid']==$postedBy) { ?>
                            <span style='font-size:17px;'><?php echo $viewedByInfo[0]['personname'];?></span><br>
                            <span style='font-size:17px;font-size:12px;color:#666'>Ad: <?php echo substr($d[0]['title'],0,25)." ...";?></span>
                            <?php }  else {?>
                               <span style='font-size:17px;'><?php echo $postedByInfo[0]['personname'];?></span><br>
                            <span style='font-size:17px;font-size:12px;color:#666'>Ad: <?php echo substr($d[0]['title'],0,25)." ...";?></span>
                            <?php } ?>
                        </td>
                        <td style="width:32px">
                            <?php if ($_SESSION['USER']['userid']==$postedBy) { ?>
                              <a href="tel:<?php echo $viewedByInfo[0]['mobile'];?>"><img src="<?php echo AppUrl;?>/assets/phone.png" style="height:24px"></a><br> 
                            <?php }  else {?>
                            <a href="tel:<?php echo $postedByInfo[0]['mobile'];?>"><img src="<?php echo AppUrl;?>/assets/phone.png" style="height:24px"></a><br> 
                            <?php } ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div style="min-height:300px;max-height:300px;overflow:auto;padding:15px;" id="chatBox">
                                 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="height:90px;background:#f1f1f1">
            <div style="padding:10px;">
                <form id='chatForm' name='chatForm'>
                    <input type="hidden" name="adid" id="adid" value="<?php echo $adID;?>" id="adid">
                    <input type="hidden" name="chatRoom" id="chatRoom" value="<?php echo $_GET['ad'];?>" id="adid">
                    <table style="width:100%;margin:0px auto;background:#fff">
                        <tr>
                            <td>
                                <textarea name="message" id="message" style="padding:11px;border:none;width:100%"  placeholder="Type a message"></textarea>
                            </td>
                            <td style="width: 90px;text-align:right">
                                <input type="button" class="btn btn-primary" style="border:none"  onclick="sendMessage(1)"  value="Send">
                            </td>
                        </tr>
                    </table>
                </form>         
            </div>
        </div>
    </div>
</div>   
<script>
setInterval(function(){sendMessage('0');},3000);
</script>
<?php include_once("footer.php"); ?>