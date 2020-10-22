<?php $news= $mysql->select("select * from _tbl_News where NewsID='".$_GET['ID']."'"); ?>
<div style="padding:10px;border:1px solid #eee;background:#fff">
    <div class="heading1">
        <span>Add Slider</span>
    </div>
    <Br>
    <?php
 
        
        if (isset($_POST['CreateNewsBtn'])) {
            
            if ($_POST['PublishArea']=="Index")  {
                 $target_dir = "../images/main-slider/";
            }
            
            if ($_POST['PublishArea']=="Health")  {
                 $target_dir = "../images/main-slider/";
            } 
            
            if ($_POST['PublishArea']=="Wealth")  {
                 $target_dir = "../images/wealth/";
            }
            
            if ($_POST['PublishArea']=="Entertainment")  {
                 $target_dir = "../images/entertainment/slider/";
            }
            
           $filename = time()."_".$_POST['PublishArea']."_".basename($_FILES["fileToUpload"]["name"]); 
             
$target_file = $target_dir .$filename ;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Slider has been uploaded and published.";
        
        $mysql->insert("_tbl_Web_Sliders",array("SliderFileName"=>$filename,
                                                "IsPublish"=>'1',
                                                "SliderOrder"=>'1',
                                                "CreatedOn"=>date("Y-m-d H:i:s"),
                                                "PublishArea"=>$_POST['PublishArea'] ));
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

        }
?>
<?php $news= $mysql->select("select * from _tbl_News where NewsID='".$_GET['ID']."'"); ?>
    <form action="" method="post" enctype="multipart/form-data">
    <table cellspacing="0" cellpadding="6" style="width:100%">
        <tr>
            <td style="width:150px;padding-bottom:0px;padding-top:0px">Slider Area</td>
            <td style="padding-bottom:0px;padding-top:0px;padding-left:3px">
                <select name="PublishArea">
                    <option value="Index">Index</option>
                    <option value="Health">Health</option>
                    <option value="Wealth">Wealth</option>
                    <option value="Entertainment">Entertainment</option>
                </select>
            </td>
        </tr>
         
         <tr>
            <td style="padding-bottom:0px;padding-top:0px;">Publish Status</td>
            <td style="padding-bottom:0px;padding-top:8px;padding-left:3px">
                <select name="IsPublish">
                    <option value="1" >Published</option>
                    <option value="0" >Un Publish</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>File</td>
            <td> <input type="file" name="fileToUpload" id="fileToUpload"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" class="SubmitBtn" name="CreateNewsBtn" value="Add Slider">
            &nbsp;&nbsp;<a href="dashboard.php?action=ManageSliders">List of Sliders</a>
            </td>
        </tr>
    </table>
    </form>
</div>