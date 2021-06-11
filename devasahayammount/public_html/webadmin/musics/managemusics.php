<?php include_once("../../config.php"); ?>
<?php
    $obj = new CommonController();
     
    if (!($obj->isLogin())){
        echo $obj->printError("Login Session Expired. Please Login Again");
        exit;
    }
     
    if(isset($_POST['rmimage'])){
        
        if(sizeof($mysql->select("select * from _jmusics where albumid=".$_POST['rowid']))>0){
                echo $obj->printError("Remove Album has been failed. Album is Non-Empty.");
        }else{
            $mysql->execute("delete from _jalbum where albumid=".$_POST['rowid']);            
            echo $obj->printSuccess("Albums Removed Successfully");  
        }
    }
?> 
 <body style="margin:0px;">
    <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Manage Musics Album Wise</div> 
        <form action="managemusics.php" method="POST" style="height: 20px;" name="managemusicalbum" id="managemusicalbum">
            <table style="margin:10px;width:100%;font-size:12px;font-family:arial;color:#333" cellpadding="3" cellspacing="0" align="center">
                 <tr>
                    <td>Album Name</td>
                    <td><select style="width:250px;" name="albumid" id="albumid" onchange="javascript:window.open('managemusicsgroupbyalbum.php?albumid='+(this).value,'viewPhotos')">
                        <option value="0">Select Album Name</option>
                        <?php foreach(JMusics::getMusicAlbum() as $album) {?>
                        <option value="<?php echo $album['albumid'];?>"><?php echo $album['albumtit'];?></option>
                        <?php }?></select>
                    </td> 
                    <td>
                        <input type='hidden' value='<?php echo $album["albumid"];?>' name='rowid' id='rowid'>
                        <input type="submit" value="Remove Album" name="rmimage" id="rmimage">
                    </td>
                 </tr>
            </table>
        </form>
         <iframe style="width:100%;height:600px;border:0px;" name="viewPhotos">
        
        </iframe>
</body>

