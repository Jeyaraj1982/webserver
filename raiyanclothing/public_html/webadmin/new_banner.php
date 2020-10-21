<h2>New Banner</h2>

<div style="padding:20px">
<?php
    if (isset($_POST['addBanner'])) {
        
        $target_path = "../banner/";
        $target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
            
            $id = $mysql->insert("_tblbanner",array("bannerpath"=>basename( $_FILES['uploadedfile']['name']),
                                              "ispublish"=>'1',
                                              "addedon"=>date("Y-m-d H:i:s")
                                              ));
               if ($id>0) {
                   echo successMessage("Banner Succesfully added");
               } else {
                   echo errorMessage("Error Adding Banner"); 
               }
        } else{
            echo errorMessage("There was an error uploading the file, please try again!");
        }
    
    }
?>
<form enctype="multipart/form-data" action="" method="POST">
Choose a Banner to upload: <input name="uploadedfile" type="file" /><br />
<input type="submit" value="Upload File"  class="submitBtn" name="addBanner"/>
</form>

</div>