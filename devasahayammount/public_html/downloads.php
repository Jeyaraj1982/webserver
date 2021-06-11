<?php error_reporting(0);
include_once("config.php");
include_once("includes/header.php");

?>
 <div class="jTitle">Downloads</div>
 
  
        
          
          <?php if (isset($_REQUEST['downloads'])) { ?>
           
             <?php 
             $a = $mysql->select("select * from _jdownalbum where dalbumid=".$_REQUEST['downloads']);
             ?>
                   <div style="font-family:'Oswald';font-size:18px;color:#FF5F49;text-align:center;margin:20px;">
                    <?php echo $a[0]['albumtit']; ?>
                   </div>
             <?php 
             
           foreach($mysql->select("select * from _jdownloads where albumid=".$_REQUEST['downloads']) as $downloads) {
           if ($downloads['ispublished']) {
            ?>
           
           <div style="margin:2px;float:left;width:166px;height:320px;margin-right:13px;overflow:hidden">
            <table cellpadding="0" cellpadding="0"  style="font-family:'Droid Sans';font-size:13px;color:#444444">
                <tr>
                    <td style="padding-left:0px">
                        <div style='background:#fff;padding:3px'>
                           <!-- <div class="jContent" style="font-size:12px;color:#222;text-align:center;margin-bottom:10px;height:40px;">
                                <?php echo $downloads["downloadtitle"];?> 
                            </div> -->
                            <img src="assets/cms/<?php echo $downloads["thumb"];?>" title=" <?php echo $downloads["downloadtitle"];?>" style="height:263px;width:166px;"><br>
                            <a style="outline: none;" target="_blank" href ="assets/cms/<?php echo $downloads["downloadfilepath"];?>" title="Download File">
                                <img src="assets/images/download-now-button.png" style="margin-top:0px;width:163px;">
                            </a>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        
    
        <?php } } ?> 
              <?php } else {?>
          
           <table cellpadding="0" cellpadding="0" width="100%" style="font-family:'Droid Sans';font-size:13px;color:#444444">
          <?php foreach($mysql->select("select * from _jdownalbum") as $dalbum) {?>
            <tr>
                <td style="font-family:Oswald;font-size:16px;color:brown;"><a href="downloads.php?downloads=<?php echo $dalbum['dalbumid'];?>"><?php echo $dalbum['albumtit'];?></a></td>
            </tr>
           
        <?php  }  ?>
          </table> 
          
          <?php } ?>
      
                      
<?php
include_once("includes/footer.php");
?>
