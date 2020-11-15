<h2>News Details</h2>
<?php
    if (isset($_POST['BtnUpdate'])) {
    
        $target_path = "../gallery/";
        $filename = time().strtolower($_FILES['uploadedfile']['name']);
        $target_path = $target_path . basename($filename); 

        if (isset($_FILES['uploadedfile']['tmp_name'])) {                                       
        
            if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
                $mysql->execute("update news set filename='".$filename."'  where newsid=".$_REQUEST['id']);
            }
        }
        
        $mysql->execute("update news set newstitle='".$_POST['newstitle']."',newscontent='".$_POST['newscontent']."',ispublish='".$_POST['ispublish']."' where newsid=".$_REQUEST['id']);
        echo "<div class='success'>Updatd Successfully</div>";
    }
?>
<?php $newsinformation = $mysql->select("select * from news where newsid=".$_REQUEST['id']); ?>
<br>
<form action="" method="post"  enctype="multipart/form-data">
 <table style="width:100%;border:1px solid #ccc;border-bottom:none" cellpadding="5" cellspacing="0">
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Subject</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><input type="text" name="newstitle" value="<?php echo $newsinformation[0]['newstitle'];?>" style="width:100%"></td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;vertical-align: top;">Comments</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><textarea  style="height:200px;width:100%" name="newscontent"><?php echo $newsinformation[0]['newscontent'];?></textarea></td>
    </tr>  
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Publish</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">
            <select name="ispublish">
                <option value=1 <?php echo ($newsinformation[0]['ispublish']==1) ? "selected='selected'" : "";?> >Publish</option>
                <option value="0" <?php echo ($newsinformation[0]['ispublish']==0) ? "selected='selected'" : "";?> >Unpublish</option>
            </select>
        </td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;vertical-align: top;">Thumb</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;">
        <img src="../gallery/<?php echo $newsinformation[0]["filename"];?>" style="height: 150px;width:150px;"><br>
        
        <input type="file" name="uploadedfile"> </td>
    </tr>
    <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Created On</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><?php echo $newsinformation[0]['postedon'];?></td>
    </tr>   
</table>
<div style="text-align:left;padding:10px;padding-left:0px">   <input type="submit" name="BtnUpdate" value="Update"></div>
</form>
<br><Br>
<a href="dashboard.php?action=newslist">Back</a>