<?php include_once("../../config.php"); ?>
<body style="margin:0px;">
 <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Edit Albums</div>
 <style>
 .mytr:hover{background:#f1f1f1;cursor:pointer}
 </style>
<?php error_reporting(0);
    include_once("../../config.php");
           $obj = new CommonController();  
            if (!($obj->isLogin())){
                echo $obj->printError("Login Session Expired. Please Login Again");
                exit;
            }
        if(isset($_POST{"cdeletebtn"})){
            
             JMusics::deleteMusicAlbum($_POST['rowid']); 
              echo CommonController::printSuccess("Deleted Successfully");
      }
       
    if(isset($_POST{"deletebtn"})){
            
             $pageContent =JMusics::getMusicAlbum($_POST['rowid']);
       
       ?>
      
       <form action='' method="post">
       <table style="margin:10px;width:100%;font-size:12px;font-family:arial;color:#333" cellpadding="3" cellspacing="0" align="center">
        <tr>
            <td style="width:150px">Album Title</td>
            <td><?php echo $pageContent[0]['albumtit'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Album Description</td>
            <td><?php echo $pageContent[0]['albumdesc'];?></td>
        </tr>
        <tr>
            <td>Album File upload</td>
            <td><img src="../../assets/cms/<?php echo $pageContent[0]["filepath"];?>" height="120"> </td> 
        </tr>
        <tr>
            <td style="width:150px">Is Published</td>  
            <td> <?php if ($pageContent[0]["ispublish"]==1) {?>
                    <span style='color:#08912A;font-weight:bold;'>Published</span> 
                <?php } else { ?>
                    <span style='color:#FF090D;font-weight:bold;'>Un Published</span> 
                <?php } ?>
            </td>
        </tr>
       </table>
       <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['albumid'];?>"> 
       <input type="submit" value="Delete" name="cdeletebtn">
         <input type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='managealbum.php'"> 
         </form>
        <?php
       exit;
      }
       
    if (isset($_POST{"updatebtn"})){
        
            $param = array("albumid"=>$_POST['rowid'],"albumtitle"=>$_POST['albumtitle'],"albumdescription"=>$_POST['albumdescription'],"ispublished"=>$_POST['ispublished']);
            JMusics::updateMusicAlbum($param,$_POST['rowid']);
               echo CommonController::printSuccess("Updated Successfully");
         }
          echo "<table cellpadding='3' cellspacing='0' width='100%' style='font-size:12px;font-family:arial;color:#444'>";
          echo "<tr><td>Album Name</td><td>File Name</td><td>Is Published </td><td>&nbsp;</td></tr>";
   
    foreach (JMusics::getMusicAlbum() as $r)
    {
    ?>  
                <form action='' method='post'>
                    <tr class="mytr">
                        <td>
                        <b>Title:</b>&nbsp;<input type="text" value="<?php echo $r["albumtit"];?>" name="albumtitle" style="width:260px !important">
                       <br><b>Musics Description</b><br>
                            <textarea name="albumdescription" style="height:80px;width:300px;"><?php echo $r["albumdesc"];?></textarea>
                        </td>
                         <td style='width:350px;'>
                           <img src="../../assets/cms/<?php echo $r["filepath"];?>" height="120">
                        </td>
                        <td style='width:150px;'> 
                            <select name="ispublished">
                                <option value='1' <?php echo ($r["ispublish"]) ? 'selected="selected"' : '';?>>Yes</option>
                                <option value='0' <?php echo ($r["ispublish"]!=1) ? 'selected="selected"' : '';?>>No</option>
                            </select>
                        </td>
                        <td>
                            <input type='hidden' value='<?php echo $r["albumid"];?>' name='rowid' id='rowid' >
                            <input type='submit' name='updatebtn' value='Update'>
                            <input type='submit' name='deletebtn' value='Delete'>
                        </td>
                    </tr>
            </form>
    <?php } ?>
</body>
