<h2>News & Events</h2>
<?php
    if (isset($_POST['BtnSave'])) {
        
        $target_path = "../gallery/";
        $filename = time().strtolower($_FILES['uploadedfile']['name']);
        $target_path = $target_path . basename($filename); 

        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
   
            $mysql->insert("news",array("newstitle"=>$_POST['newstitle'],"newscontent"=>$_POST['newscontent'],"filename"=>$filename,"ispublish"=>$_POST['ispublish'],"postedon"=>date("Y-m-d H:i:s")));
            echo "<div class='success'>Saved Successfully</div>";
        
        } else{
            echo "There was an error uploading the file, please try again!";
        }
    }
    
    
?>
<form action="" method="post"  enctype="multipart/form-data">
 
 <table style="width:100%;border:1px solid #ccc;border-bottom:none" cellpadding="5" cellspacing="0">
	<tr>
		<td style="width:120px;border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">News/Event Title</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><input type="text" name="newstitle" style="width: 100%;"></td>
    </tr>
    <tr>
		<td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;vertical-align: top;">News/Event Content</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><textarea  style="height:200px;width:100%" name="newscontent"></textarea></td>
    </tr>
    <tr>
		<td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Thumb</td>
		<td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><input type="file" name="uploadedfile"> </td>
    </tr>
      <tr>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Publish</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><select name="ispublish"><option value=1>Publish</option><option value="0">Unpublish</option></select></td>
    </tr>
 
</table>
<div style="text-align:left;padding:10px;padding-left:0px">   <input type="submit" name="BtnSave" value="Save" name="BtnSave"></div>
</form>

<br><br>
<a href="dashboard.php?action=newslist">List of News</a>
