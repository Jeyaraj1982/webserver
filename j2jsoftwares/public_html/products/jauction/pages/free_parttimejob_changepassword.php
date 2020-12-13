    
     <?php include_once("pages/pj/header.php");?>
<table>
    <tr>
        <td width="760" style="font-family:arial;">
        <h3 style="font-family: arial;color:#264AA6">Change Password</h3>  

<?php
    if (isset($_POST['oldpassword']) && (isset($_POST['newpassword'])) && (isset($_POST['cnewpassword']))) {
        
        if ($_POST['newpassword']==$_POST['cnewpassword']) {
            
            $data = $mysql->select("select * from _clients where password='".$_POST['oldpassword']."' and id=".$_SESSION['PJUSER']['id']);
            
            if (sizeof($data)==1) {
                
                $mysql->execute("update _clients set password='".$_POST['newpassword']."' where id='".$_SESSION['PJUSER']['id']."'");
                
                echo '<div style="border:1px solid #ccc;font-family:arial;font-size:12px;color:#222;padding:10px;background:#F4F9FF">Password changed successfully.</div>';    
                echo "<style>#changepasswordwindow{display:none}</style>";
            }   else {
                echo '<div style="border:1px solid #ccc;font-family:arial;font-size:12px;color:#222;padding:10px;background:#F4F9FF">Incorrect old password. Try again.</div><br><br>';
            }
            
            
        } else {
            echo '<div style="border:1px solid #ccc;font-family:arial;font-size:12px;color:#222;padding:10px;background:#F4F9FF">New passworda and Re-Enter new password should be same.</div><br><br>';
        }
        
        
    }
    
?>
<div id="changepasswordwindow">
<span style="font-size:12px;">To change your password, provide the following information, and then click change password.<br><br></span>
<form action="" method="post" target="_self">
<table style="font-family:arial;font-size:12px;" cellpadding="2" cellspacing="0" width="250px">
    <tr>
        <td>Old Password<span class="man">*</span></td>
    </tr>
    <tr>
        <td><input type="password" value="<?php echo $_POST['oldpassword'];?>" name="oldpassword" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td>
    </tr>
        <tr>
        <td>New Password<span class="man">*</span></td>
    </tr>
    <tr>
        <td><input type="password" value="<?php echo $_POST['newpassword'];?>"  name="newpassword" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td>
    </tr>
        <tr>
        <td>Re-Enter New Password<span class="man">*</span></td>
    </tr>
    <tr>
        <td><input type="password" value="<?php echo $_POST['cnewpassword'];?>"  name="cnewpassword" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td>
    </tr>
    <tr>
        <td><input type="submit" value="Change Password"></td>
    </tr>
</table>
</form>
</div>
<br><div style="border-bottom:1px solid #D4E3F6;"></div>

</td>
<td valign="top">
           <?php include("pages/pj/rightside.php");?>
</td>
</tr>
</table>