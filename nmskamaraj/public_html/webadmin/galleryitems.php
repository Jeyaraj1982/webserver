<h2>Gallery Group Items</h2>
<?php
   
    $group = $mysql->select("select * from gallery where galleryid=".$_REQUEST['id']);
    
    echo $group[0]['groupname'];
    
     if (isset($_POST['BtnSave'])) {
        
        $target_path = "../gallery/";
        $filename = time().strtolower($_FILES['uploadedfile']['name']);
        $target_path = $target_path . basename($filename); 

        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
   
            $mysql->insert("galleryitems",array("galleryid"=>$_REQUEST['id'],"imagetitle"=>$_POST['imagetitle'],"imagename"=>$filename,"ispublish"=>"1"));
            echo "<div class='success'>Saved Successfully</div>";
        
        } else{
            echo "There was an error uploading the file, please try again!";
        }
    }
    
    if (isset($_REQUEST['do']) && $_REQUEST['do']=="unpublish") {
         $mysql->execute("update galleryitems set ispublish=0 where galleryitemid=".$_REQUEST['itemid']);
          echo "<div class='success'>Unpublished Successfully</div>";
    }
    
     if (isset($_REQUEST['do']) && $_REQUEST['do']=="publish") {
         $mysql->execute("update galleryitems set ispublish=1 where galleryitemid=".$_REQUEST['itemid']);
         echo "<div class='success'>Published Successfully</div>";
    }
?>
<form action="" method="post"  enctype="multipart/form-data">
<div style="background:#f1f1f1;padding:5px">
<table >
    <tr>
        <td>Title</td>
        <td><input type="text" name="imagetitle"></td>
        <td>Thumb</td>
        <td><input type="file" name="uploadedfile" </td>
        <td><input type="submit" value="Save" name="BtnSave"></td>
        <td></td>
    </tr>
</table>
</div>
</form>
<?php
    $galleries = $mysql->select("select * from galleryitems where galleryid=".$_REQUEST['id']);
    foreach($galleries as $g) {
        ?>
             <div style="padding:5px;float:left;margin:5px;width:120px;background:#<?php echo ($g['ispublish']==1) ? "dcffce" : "ffe5ce";?>;border:1px solid #<?php echo ($g['ispublish']==1) ? "00dd28" : "ff8214";?>">
                <div style="font-weight:bold"><?php echo $g['imagetitle'];?></div>
                <div style="text-align:center;padding:5px;"><img src="../gallery/<?php echo $g['imagename'];?>" style="height:100px;width:100px;border:5px solid #fff;background:#fff"></div>
                <div>
                    <?php if ($g['ispublish']==1) { ?>
                    <a href="dashboard.php?action=galleryitems&id=<?php echo $_REQUEST['id']; ?>&itemid=<?php echo $g['galleryitemid'];?>&do=unpublish">Disable</a>
                    <?php } else { ?>
                    <a href="dashboard.php?action=galleryitems&id=<?php echo $_REQUEST['id']; ?>&itemid=<?php echo $g['galleryitemid'];?>&do=publish">Enable</a>
                    <?php } ?>
                </div>
             </div>
        <?php
    }
?>

