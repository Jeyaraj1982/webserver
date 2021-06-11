<?php
include_once("../../config.php");

     $obj = new CommonController();
    
    if (!($obj->isLogin())){
        echo $obj->printError("Login Session Expired. Please Login Again");
        exit;
    }
    
   if (isset($_POST{"update"})) { 
       
       foreach($_POST['param'] as $key=>$value)  {
           $sql = "update _jsitesettings set paramvalue='".$value."' where settingsid=".$key;
           $mysql->execute($sql);
       }
       
       if($obj->err==0){
            echo $obj->printSuccess("Updated Successfully");
        }
   }      
    $data=$mysql->select("select * from _jsitesettings"); 
  
?>
<body style="margin:0px;">
<div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Search Engine Option(SEO)</div>
        <form action="" method="post" style="height: 20px;" enctype="multipart/form-data">
            <table  style="margin:10px;font-size:12px;font-family:arial;color:#333" cellpadding="3" cellspacing="0" align="center">
                <tr>
                    <td style="width:150px;">Seo-meta-description</td>
                    <td><textarea cols="32" rows="7" name="param[52]"><?php echo $data[51]['paramvalue'];?></textarea></td>
                </tr>
                 <tr>
                    <td>Seo-meta-keyword</td>
                    <td><textarea cols="32" rows="7" name="param[53]"><?php echo $data[52]['paramvalue'];?></textarea></td> 
                </tr>
                <tr>
                    <td>Seo-meta-contents</td>
                    <td><textarea cols="32" rows="7" name="param[54]"><?php echo $data[53]['paramvalue'];?></textarea></td>
                </tr>
                <tr>
                    <td align="left">
                        <input type="submit" name="update" value="Update" bgcolor="grey"> 
                    </td>
               </tr>
            </table>
         </form>        
</body>
