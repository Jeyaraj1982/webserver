<?php include_once("../../config.php"); ?>
<body style="margin:0px;">
 <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Edit Photo Gallery</div>
 <style>
 .mytr:hover{background:#f1f1f1;cursor:pointer}
 </style>
<?php 
    $rGroup = $_REQUEST['groupname'];
    $obj    = new CommonController(); 
            
    if (!($obj->isLogin())){
        echo $obj->printError("Login Session Expired. Please Login Again");
        exit;
    }

    if(isset($_POST{"cdeletebtn"})) {
        JPhotogallery::deletePhoto($_POST['rowid']); 
        echo CommonController::printSuccess("Deleted Successfully");
    }
       
    if (isset($_POST{"deletebtn"})) {
        
        $pageContent =JPhotogallery::getPhotos($_POST['rowid']);
       
?> 
       <form action='' method="post">
       <table style="margin:10px;width:100%;font-size:12px;font-family:arial;color:#333" cellpadding="3" cellspacing="0" align="center">
         <tr>
            <td style="width:150px">Photo Title</td>
            <td><?php echo $pageContent[0]['phototitle'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Photo Description</td>
            <td><?php echo $pageContent[0]['photodescription'];?></td>
        </tr>
        <tr>
            <td>Photo File upload</td>
           <td><img src="../../assets/cms/<?php echo $pageContent[0]["photofilepath"];?>" height="120"></td> 
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
       <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['photoid'];?>"> 
       <input type="submit" value="Delete" name="cdeletebtn">
       <input type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='managephotosgroupwise.php?groupname=<?php echo $rGroup; ?>'"> 
      </form>
        <?php
       exit;
           
         }
       
    if (isset($_POST{"updatebtn"})){
            $param = array("photoid"=>$_POST['rowid'],"phototitle"=>$_POST['phototitle'],"photodescription"=>$_POST['photodescription'],"ispublished"=>$_POST['ispublished']);
             JPhotogallery::updatePhoto($param,$_POST['rowid']);
            echo CommonController::printSuccess("Updated Successfully");
         }
          echo "<table  cellspacing='3' cellspadding='0' width='100%' style='font-size:12px;font-family:arial;'>";
          echo "<tr><td>Photo Title</td><td>File Name</td><td>Is Published </td></tr>";
   
    foreach (JPhotogallery::getGalleryImages($rGroup) as $r){
    ?>
    <form action='' method='post'>
        <tr class="mytr">
            <td>
                <b>Title:</b>&nbsp;<input type="text" value="<?php echo $r["phototitle"];?>" name="phototitle" style="width:260px !important"><br>
                <b>Photo Description</b><br><textarea name="photodescription" style="height:80px;width:300px;"><?php echo $r["photodescription"];?></textarea>
            </td>
            <td style='width:350px;'>
                <img src="../../assets/cms/<?php echo $r["photofilepath"];?>" height="120">
            </td>
            <td style='width:150px;'> 
                <select name="ispublished">
                    <option value='1' <?php echo ($r["ispublished"]) ? 'selected="selected"' : '';?>>Yes</option>
                    <option value='0' <?php echo ($r["ispublished"]!=1) ? 'selected="selected"' : '';?>>No</option>
                </select>
            </td>
            <td>
                <input type='hidden' value='<?php echo $r["photoid"];?>' name='rowid' id='rowid' >
                <input type='submit' name='updatebtn' value='Update'>
                <input type='submit' name='deletebtn' value='Delete'>
            </td>
        </tr>
    </form>
    <?php } ?>
</body>
