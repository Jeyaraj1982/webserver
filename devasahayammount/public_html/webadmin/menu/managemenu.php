<?php include_once("../../config.php"); ?>
<?php 
            if (!(CommonController::isLogin())){
                 echo CommonController::printError("Login Session Expired. Please Login Again");
                 exit;
            }

   if (isset($_POST{"update"})) {
        
   return $mysql->execute("update _jmenu set menuname='".$menuname."',pageid='".$pagenameid."',isheader=".$isHeader." where menuid='".$rowid."'");  
    if(!$mysql)
    {
     echo "error updating Menuitems";       
        } else {
            echo "Menu updated successfully";
        }
   } 
   
       
    
    
?>

<form action="" method="post" style="height: 20px;">
<table border="1" style="width:100%" cellpadding="0" cellspacing="0" align="center" bgcolor="lightyellow">
<tr>
<td style="width:50px;">Name</td>
<td><input type="text" name="menuname" maxlength="100" size="40" style="width:250px;"><br></td> 
</tr>
<tr>
<td style="width:50px;">Page</td>
<td style="width:50px;">
<select style="width:250px;" name="pagenameid" id="pagenameid">
<?php foreach(JPages::getPages() as $page) {?>
<option value="<?php echo $page['pageid'];?>"><?php echo $page['pagetitle'];?></option>
<?php } ?>
</select><br></td>

</tr>
<tr>
<td>Menu In </td> 
<td style="width:1150px;"><select name="isHeader">
<option value="1">Header</option>
<option value="0">Footer</option>
</select></td> 
</tr>

<tr>
<td align="center"><form action="" method="post"><input type='hidden' value='".$r["menuid"]."' name='rowid' id='rowid' ><input type="submit" name="update" value="Update" bgcolor="grey">  </form></td>
</tr>
</table>


</form>
