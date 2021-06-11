<?php include_once("../../config.php"); ?>
<style>
.mytr:hover{background:#f6f6f6;cursor:pointer}
</style>
<body style="margin:0px;">
 <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>View Videos</div>
<?php
    $obj = new CommonController();
        
    if (!($obj->isLogin())){
        echo $obj->printError("Login Session Expired. Please Login Again");
        exit;
    }
     
    echo "<table  cellspacing='0' cellspadding='5' style='font-size:13px;font-family:arial;color:#222;width:100%'>";


    foreach (JVideos::getVideos() as $r)
    {    
       $youtube = new youTube($r['videourl']);
        ?>
        <tr class='mytr'>
            <td style='padding:5px'>
                <b><?php echo $r["videotitle"];?></b>:
                <br><span style='color:#555'><?php echo strip_tags(substr(strip_tags($r["videodescription"]),0,300));?> ... </span>
            </td>
            <td>
            <!--<img src='".$youtube->getImage()."'><br>-->
             <iframe width='200' height='150' src='http://www.youtube.com/embed/".$r['videourl']."' frameborder='0' allowfullscreen></iframe><?php echo $youtube->getTitle();?>
            </td>
            <td width='160' style='text-align:center;'>
                <form action='managevideos.php' method='post' style='height:0px;'>
                    <input type='hidden' value='<?php echo $r["videoid"];?>' name='rowid' id='rowid' >
                    <input style='font-size:11px;' type='submit' name='editbtn' value='Edit'>
                    <input style='font-size:11px;' type='submit' name='viewbtn' value='View'>
                    <input style='font-size:11px;' type='submit' name='deletebtn' value='Delete'>
                </form>
            </td>
          </tr>
          <tr>
            <td colspan='2'><hr style='border:none;border-bottom:1px solid #f1f1f1'></td>
          </tr> 
           <?php
    } 
     echo"</table>"            
?>
</body>