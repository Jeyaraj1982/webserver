<h2>Sliders</h2>
<?php
    if (isset($_POST['BtnSave'])) {
        
        $target_path = "../gallery/";
        $filename = time().strtolower($_FILES['uploadedfile']['name']);
        $target_path = $target_path . basename($filename); 

        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
   
            $mysql->insert("sliders",array("sliderimage"=>$filename,"ispublish"=>"1"));
            echo "<div class='success'>Saved Successfully</div>";
        
        } else{
            echo "There was an error uploading the file, please try again!";
        }
    }
    
    if (isset($_REQUEST['do']) && $_REQUEST['do']=="delete") {
         $mysql->execute("delete from sliders  where sliderid=".$_REQUEST['id']);
          echo "<div class='success'>Deleted Successfully</div>";
    }
    
    if (isset($_REQUEST['do']) && $_REQUEST['do']=="unpublish") {
         $mysql->execute("update sliders set ispublish=0 where sliderid=".$_REQUEST['id']);
          echo "<div class='success'>Unpublished Successfully</div>";
    }
    
     if (isset($_REQUEST['do']) && $_REQUEST['do']=="publish") {
         $mysql->execute("update sliders set ispublish=1 where sliderid=".$_REQUEST['id']);
          echo "<div class='success'>Published Successfully</div>";
    }
?>
<form action="" method="post"  enctype="multipart/form-data">
<div style="background:#f1f1f1;padding:5px">
<table >
	<tr>
		<td>Slider Image</td>
		<td><input type="file" name="uploadedfile" ></td>
		<td><input type="submit" value="Save" name="BtnSave"></td>
		<td></td>
	</tr>
</table>
</div>
</form>
<table>
<?php
    $galleries = $mysql->select("select * from sliders");
    foreach($galleries as $g) {
?>
    <tr>
        <td>
            <div style="padding:5px;margin:5px;background:#<?php echo ($g['ispublish']==1) ? "dcffce" : "ffe5ce";?>;border:1px solid #<?php echo ($g['ispublish']==1) ? "00dd28" : "ff8214";?>">
                <div style="text-align:left;padding:5px;"><img src="../gallery/<?php echo $g['sliderimage'];?>" style="height:120px;border:5px solid #fff;background:#fff"></div>
            </div>
        </td>
        <td style="width:100px">
            <?php if ($g['ispublish']==1) { ?>
                <a href="dashboard.php?action=slides&id=<?php echo $g['sliderid'];?>&do=unpublish">Disable</a>
            <?php } else { ?>
                    <a href="dashboard.php?action=slides&id=<?php echo $g['sliderid'];?>&do=publish">Enable</a>
            <?php } ?>
                     &nbsp;&nbsp;<a href="dashboard.php?action=slides&id=<?php echo $g['sliderid'];?>&do=delete">Delete</a>
               </td>
        </tr>
        <?php
    }
?>
</table>