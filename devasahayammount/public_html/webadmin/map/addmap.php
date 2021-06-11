<?php include_once("../../config.php"); ?>
<html>    
    <body style="margin:0px;">
        <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Add Map</div>
<?php  
 


   if (isset($_POST{"save"})) {
       
        $menu= new JMap();
    
             if($menu->addMap($_POST['mapcoding'])>0){
                    echo  printSuccess("Map Longitude added successfully");       
                }  else {
                    echo printError("Error Adding Maps");
                 }
       
            }

?>
 
 
    <form action="" method="post"  enctype="multipart/form-data">
        <table  style="margin:10px;width:100%;font-size:12px;font-family:arial;color:#333" cellpadding="3" cellspacing="0" align="center">
                
               <tr>
                     <td style="vertical-align: top;">Map Coding</td>
                     <td><textarea cols="28" rows="7" name="mapcoding"></textarea><br></td> 
               </tr>

               <tr>
                    <td></td>
                    <td align="left"><input type="submit" name="save" value="save" bgcolor="grey">  </td>
              </tr> 
        </table>


    </form>
</body>
