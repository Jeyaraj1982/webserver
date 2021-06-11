<?php include_once("../../config.php"); ?>
<?php error_reporting(0);



   if (isset($_POST{"save"})) {
       
        $menu= new JMusics();
        
      
$filename = strtolower("_".time()."_".basename( $_FILES['filepath']['name']));
$target_path = strtolower("../../assets/cms/".$filename); 

if(move_uploaded_file($_FILES['filepath']['tmp_name'], $target_path)) {
    
     if($menu->addMusics($_POST['musictitle'],$_POST['musicdescription'],$filename,$_POST['ispublished'])>0){
                echo "Musics added successfully";       
        } else {
                echo "error adding Musics";
        }
     
        
} else{
    echo "There was an error uploading the file, please try again!";
}


     } 
   
       
    
    
?>
<body style="margin:0px;">
<div style='border:0px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;font-family:arial;font-size:12px;'>Add Contact</div>
    <form action="" method="post" style="height: 20px;" enctype="multipart/form-data">
        <table  style="width:100%" cellpadding="0" cellspacing="0" align="center">
                <tr>
                     <td style="width:150px;">Your Email:</td>
                     <td><input type="text" name="musictitle" maxlength="100" size="40" style="width:250px;"><br></td> 
               </tr>
               <tr>
                     <td style="width:150px;">Message</td>
                     <td><textarea cols="28" rows="9" name="musicdescription"></textarea><br></td> 
               </tr>
               <tr>
                     <td style="width:150px;">Support for: </td>
                     <td>
                         <select style="width:260px;height:25px;">
                           <option value="select">Select</option>
                           <option value="General">Enquiry</option>
                           <option value="Technical">Billing</option>
                           <option value="Rebort abuse">Branch Enquiry</option>
                         </select>
                     </td>
               </tr>
               <tr>
                    <td style="width:180px;height:40px;"> Upload</td>
                    <td >
                        
                         <input type="file" class="input" size="30" name="filepath"/>
                    </td>
              </tr>
              
               <tr>
                    <td></td>
                    <td align="left"><input type="submit" name="save" value="save" bgcolor="grey">  </td>
              </tr> 
        </table>


    </form>
</body>
