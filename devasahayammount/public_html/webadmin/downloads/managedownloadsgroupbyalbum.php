<?php include_once("../../config.php"); ?> <body style="margin:0px;">
  <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Edit Downloads</div>
 <style>
 .mytr:hover{background:#f1f1f1;cursor:pointer}
 </style>
<?php 
    
    
    $rAlbum = $_REQUEST['albumid'];
    $obj    = new CommonController(); 
            
       if (!($obj->isLogin())){
        echo $obj->printError("Login Session Expired. Please Login Again");
        exit;
        }
       if(isset($_POST{"cdeletebtn"})){
       
       JDownloads::deleteDownloads($_POST['rowid']); 
       echo CommonController::printSuccess("Deleted Successfully");
       }
       
    if (isset($_POST{"deletebtn"})){
             $pageContent =JDownloads::getDownloads($_POST['rowid']);
       
       ?>
      
       <form action='' method="post">
       <table  style="margin:10px;width:100%;font-size:12px;font-family:arial;color:#333" cellpadding="3" cellspacing="0" align="center">
        <tr>
            <td style="width:150px">Download Title</td>
            <td><?php echo $pageContent[0]['downloadtitle'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Download Description</td>
            <td><?php echo $pageContent[0]['downloaddescription'];?></td>
        </tr>
         <tr>
            <td>Album File upload</td>
            <td><img src="../../assets/cms/<?php echo $pageContent[0]["downloadfilepath"];?>" height="120"></td> 
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
      </table>
       <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['downloadid'];?>"> 
       <input type="submit" value="Delete" name="cdeletebtn">
       <input type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='managedownloadsgroupbyalbum.php?albumid=<?php echo $rAlbum; ?>'"> 
      </form>
        <?php
       exit;
      }
         
       
    if (isset($_POST{"updatebtn"})) {
        
            $param = array("downloadid"=>$_POST['rowid'],"downloadtitle"=>$_POST['downloadtitle'],"downloaddescription"=>$_POST['downloaddescription'],"ispublished"=>$_POST['ispublished']);
            JDownloads::updateDownloads($param,$_POST['rowid']);
            echo CommonController::printSuccess("Updated Successfully");   
         }
          echo "<table  cellspacing='3' cellspadding='0' width='100%' style='font-size:12px;font-family:arial;'>";
          echo "<tr><td>Download Title</td><td>File Name</td><td>Is Published </td></tr>";
          
   
   foreach (JDownloads::getAlbumImages($rAlbum) as $r){
        ?>           
                <form action='' method='post'  > 
                    <tr class="mytr">
                        <td>
                        <b>Title:</b>&nbsp;<input type="text" value="<?php echo $r["downloadtitle"];?>" name="downloadtitle" style="width:260px !important">
                       <br><b>Download Description</b><br>
                            <textarea name="downloaddescription" style="height:80px;width:300px;"><?php echo $r["downloaddescription"];?></textarea>
                        </td>
                        <td style='width:350px;'>
                           <a target="_blank" href ="../../assets/cms/<?php echo $r["downloadfilepath"];?>"><?php echo $r["downloadfilepath"];?></a>
                            <img src="../../assets/images/Download2.jpg" style="width: 15px;" title="Download">
                        </td>
                   
                      <td style='width:150px;'> 
                            <select name="ispublished">
                                <option value='1' <?php echo ($r["ispublished"]) ? 'selected="selected"' : '';?>>Yes</option>
                                <option value='0' <?php echo ($r["ispublished"]!=1) ? 'selected="selected"' : '';?>>No</option>
                            </select>
                        </td>
                        <td>
                            <input type='hidden' value='<?php echo $r["downloadid"];?>' name='rowid' id='rowid' >
                            <input type='submit' name='updatebtn' value='Update'>
                            <input type='submit' name='deletebtn' value='Delete'>
                        </td>
                   </tr>
                </form>
    <?php } ?>
    
</body>