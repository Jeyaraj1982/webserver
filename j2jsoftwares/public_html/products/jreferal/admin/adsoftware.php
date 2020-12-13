<?php

    if (isset($_POST['deleteid'])) {
        $mysql->execute("delete from _softwares where id=".$_POST['deleteid']);
        echo "<div style='border:1px solid #ccc;background:#f1f1f1;maring:10px;padding:10px;color:blue;font-weight:bold'>Software Deleted Successfully</div>";
    }
    if (isset($_POST['mobileno'])) {
        
        $filename = strtolower(rand(1000,2000)."_". $_FILES["file"]["name"]);
        
        if (move_uploaded_file($_FILES["file"]["tmp_name"],"software/".$filename)) {
             
             $array = array("id"=>'Null',"mobileno"=>$_POST['mobileno'],"software"=>$filename,"addedon"=>date("Y-m-d H:i:s"));
             $mysql->insert("_softwares",$array);
             
            echo "<div style='border:1px solid #ccc;background:#f1f1f1;maring:10px;padding:10px;color:blue;font-weight:bold'>Added Software Successfully</div>";
        } else {
            echo "<div style='border:1px solid #ccc;background:#f1f1f1;maring:10px;padding:10px;color:red;font-weight:bold'>Error Adding Software</div>";
        }
    }
?>
<form action="" method="post" enctype="multipart/form-data">
<br><b>New Software</b><br>
<table style="font-size:12px;font-family:arial" cellpadding="5" cellspacing="0">
    <tr>
        <td>Mobile No</td>
        <td><input type='text' name='mobileno'></td>
    </tr>
    <tr>
        <td>Software</td>
        <td><input type='file' name='file'></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type='submit' value="Add Software"></td>
    </tr>
</table>
</form>

<hr>

<?php
    $softwares = $mysql->select("select * from _softwares");
?>
<table cellpadding="5" cellspacing="0" style="font-size:12px;font-family:arial;" width="100%">
<?php foreach($softwares as $s) {?>
    <tr>
        
        <td valign="top"><b><?php echo $s['mobileno'];?></td>
        <td><a href='software/<?php echo $s['software'];?>' target="new"><?php echo $s['software'];?></a></td>
        <td><?php echo $s['addedon'];?></td>
        <td width="100" valign="top"><form action='' method="post">
            <input type="hidden" name="deleteid" value="<?php echo $s['id'];?>">
            <input type="submit" value="Delete">
        </form></td>
    </tr>

<?php } ?>
</table>