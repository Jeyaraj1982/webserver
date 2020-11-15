<h2>Gallery Group</h2>
<?php
    if (isset($_POST['BtnSave'])) {
        
        $target_path = "../gallery/";
        $filename = time().strtolower($_FILES['uploadedfile']['name']);
        $target_path = $target_path . basename($filename); 

        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
   
            $mysql->insert("gallery",array("galleryname"=>$_POST['galleryname'],"galleryimage"=>$filename,"ispublish"=>"1"));
            echo "<div class='success'>Saved Successfully</div>";
        
        } else{
            echo "There was an error uploading the file, please try again!";
        }
    }
    
    if (isset($_REQUEST['do']) && $_REQUEST['do']=="unpublish") {
         $mysql->execute("update gallery set ispublish=0 where galleryid=".$_REQUEST['id']);
          echo "<div class='success'>Unpublished Successfully</div>";
    }
    
     if (isset($_REQUEST['do']) && $_REQUEST['do']=="publish") {
         $mysql->execute("update gallery set ispublish=1 where galleryid=".$_REQUEST['id']);
          echo "<div class='success'>Published Successfully</div>";
    }
?>
<form action="" method="post"  enctype="multipart/form-data">
<div style="background:#f1f1f1;padding:5px">
<table >
	<tr>
		<td>Group Name</td>
		<td><input type="text" name="galleryname"></td>
		<td>Thumb</td>
		<td><input type="file" name="uploadedfile" ></td>
		<td><input type="submit" value="Save" name="BtnSave"></td>
		<td></td>
	</tr>
</table>
</div>
</form>
<?php
    $galleries = $mysql->select("select * from gallery");
    foreach($galleries as $g) {
        ?>
             <div style="padding:5px;float:left;margin:5px;width:120px;background:#<?php echo ($g['ispublish']==1) ? "dcffce" : "ffe5ce";?>;border:1px solid #<?php echo ($g['ispublish']==1) ? "00dd28" : "ff8214";?>">
                <div style="font-weight:bold"><?php echo $g['galleryname'];?></div>
                <div style="text-align:center;padding:5px;"><img src="../gallery/<?php echo $g['galleryimage'];?>" style="height:100px;width:100px;border:5px solid #fff;background:#fff"></div>
                <div>
                    <a href="dashboard.php?action=galleryitems&id=<?php echo $g['galleryid'];?>">Add</a>&nbsp;|&nbsp; 
                    <a href="dashboard.php?action=galleryitems&id=<?php echo $g['galleryid'];?>">View</a>&nbsp;|&nbsp; 
                    <?php if ($g['ispublish']==1) { ?>
                    <a href="dashboard.php?action=gallery&id=<?php echo $g['galleryid'];?>&do=unpublish">Disable</a>
                    <?php } else { ?>
                    <a href="dashboard.php?action=gallery&id=<?php echo $g['galleryid'];?>&do=publish">Enable</a>
                    <?php } ?>
                </div>
             </div>
        <?php
    }
?>