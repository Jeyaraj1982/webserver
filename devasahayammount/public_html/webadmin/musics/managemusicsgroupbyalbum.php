<?php include_once("../../config.php"); ?> <?php

?> 
     <body style="margin:0px;">
 <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Edit Musics</div>
 <style>
 .mytr:hover{background:#f1f1f1;cursor:pointer}
 </style>
<?php 
    
    
      $rAlbum = $_REQUEST['albumid']; 
        $obj = new CommonController();  
            if (!($obj->isLogin())){
                echo $obj->printError("Login Session Expired. Please Login Again");
                exit;
            }

        if(isset($_POST{"cdeletebtn"})){
            JMusics::deleteMusics($_POST['rowid']); 
            echo CommonController::printSuccess("Deleted Successfully"); 
      }
       
    if (isset($_POST{"deletebtn"})){
        
             $pageContent =JMusics::getMusic($_POST['rowid']);
       ?>
      
       <form action='' method="post">
       <table style="margin:10px;width:100%;font-size:12px;font-family:arial;color:#333" cellpadding="3" cellspacing="0" align="center">
       
        <tr>
            <td style="width:150px">Music Title</td>
            <td><?php echo $pageContent[0]['musictitle'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Music Description</td>
            <td><?php echo $pageContent[0]['musicdescription'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Is Published</td>  
            <td> <?php if ($pageContent[0]["ispublished"]==1) {?>
                    <span style='color:#08912A;font-weight:bold;'>Published</span> 
                <?php } else { ?>
                    <span style='color:#FF090D;font-weight:bold;'>Un Published</span> 
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td style="width:150px">Album Name</td>
            <td><?php echo $pageContent[0]['albumid'];?></td>
        </tr>
       </table>
       <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['musicid'];?>"> 
       <input type="submit" value="Delete" name="cdeletebtn">
         <input type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='managemusicsgroupbyalbum.php?albumid=<?php echo $rAlbum; ?>'"> 
         </form>
        <?php
       exit;
      }
    
       
    if (isset($_POST{"updatebtn"})){
        
        $param = array("musicid"=>$_POST['rowid'],"musictitle"=>$_POST['musictitle'],"musicdescription"=>$_POST['musicdescription'],"ispublished"=>$_POST['ispublished']);
        JMusics::updateMusics($param,$_POST['rowid']);
        echo CommonController::printSuccess("Updated Successfully"); 
       }
          echo "<table cellpadding='3' cellspacing='0' width='100%' style='font-size:12px;font-family:arial;color:#444'>";
          echo "<tr><td>Music Name</td><td>File Name</td><td>Is Published </td><td>&nbsp;</td></tr>";

   
    foreach (JMusics::getAlbumImages($rAlbum) as $r)
    {
    ?>
            <form action='' method='post'> 
                    <tr class="mytr">
                        <td>
                        <b>Title:</b>&nbsp;<input type="text" value="<?php echo $r["musictitle"];?>" name="musictitle" style="width:260px !important">
                       <br><b>Musics Description</b><br>
                            <textarea name="musicdescription" style="height:80px;width:300px;"><?php echo $r["musicdescription"];?></textarea>
                        </td>
                        <td style='width:350px;'>
                            <table>
                                <tr>
                                    <td>
                                      <a style="outline: none;" target="_blank" href ="../../assets/cms/<?php echo $r["musicfilepath"];?>" title="Download File">
                                      <img src="../../assets/images/DownloadButtonGreen32.gif" style="width: 22px;" title="Download"></a>
                                    </td>
                                    <td>
                                     <iframe src="../../assets/dewplayer.swf?mp3=../../assets/cms/<?php echo $r["musicfilepath"];?>&autostart=false&autoreplay=false" style="height: 20px;;width:200px;border:none;background:none;" ></iframe>
                                     </td>
                                </tr>
                            </table>
                        </td>
                        <td style='width:150px;'> 
                            <select name="ispublished">
                                <option value='1' <?php echo ($r["ispublished"]) ? 'selected="selected"' : '';?>>Yes</option>
                                <option value='0' <?php echo ($r["ispublished"]!=1) ? 'selected="selected"' : '';?>>No</option>
                            </select>
                        </td>
                         <td>
                            <input type='hidden' value='<?php echo $r["musicid"];?>' name='rowid' id='rowid' >
                            <input type='submit' name='updatebtn' value='Update'>
                            <input type='submit' name='deletebtn' value='Delete'>
                        </td>
                    </tr>
            </form>
    <?php } ?>
</body>
