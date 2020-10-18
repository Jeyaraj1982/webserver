<?php foreach($lists as $l) {?>
    <div style="padding:10px;padding-bottom:0px;padding-top:0px;line-height:20px;font-size:12px;text-align:justify">
        <div style="font-weight:bold;color:black;"><a href="?jsessionid=<?php echo md5($l['id']);?>" style="color:#0163C7;"><?php echo $l['title'];?></a>
  	<span style='color:#888'>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $l['lastupdate'];?></span> 

</div>
	
        <div style='margin-top:5px;'>
            <?php if (strlen(trim($l['thumb']))>2) { ?>
                <img src='profile/<?php echo $l['thumb'];?>' style='height:95px;width:145px;margin-bottom:5px;padding-right:5px;' align='left'>
            <?php } else { 
                    $imgData = explode("src=",$l['description']);
                    $imgData = explode('"',$imgData[1]);
                    if (strlen(trim($imgData[1]))>0) { ?>
                        <img src='<?php echo $imgData[1];?>' style='height:95px;width:145px;margin-bottom:5px;padding-right:5px;' align='left'>
                    <?php } else { ?>
                        <img src='images/v.jpg' style='height:95px;width:145px;margin-bottom:5px;padding-right:5px;' align='left'>
                    <?php }  ?>
            <?php } ?>
            <?php   
            $tmpText = substr(strip_tags(str_replace("&nbsp;","",$l['description'])),0,1400);
            $pos = strpos($tmpText, "read it");
               if ($pos>0) {
               echo substr($tmpText,$pos+8,strlen($tmpText));       
               } else {
                   echo substr($tmpText,0,750);
               }
            
            ?> 
            &nbsp;&nbsp;[<a style="font-size:11px;color:#0163C7" href="?jsessionid=<?php echo md5($l['id']);?>">மேலும்</a>]
        </div>
       
        <hr style="border:1px solid #f5f5f5;margin:10px;margin-top:5px;margin-bottom:5px;width:100%">
    </div>
<?php } ?>
<div style="padding:10px;">
<?php 
    $param="?rnd=".md5(rand(1000,2500))."&";
    if (isset($_REQUEST['pid'])) {
        $param.="pid=".$_REQUEST['pid']."&";
    } 
    if ($tp>$displayContent) { 
        for($i=1;$i<=ceil($tp/$displayContent);$i++) {
            echo "<a style='text-decoration:none;font-weight:bold;font-size:12px;font-family:arial;' href='".$uRL.$param."page=".$i."'>".($i)."</a>&nbsp;";
      } 
    }?>
</div>    