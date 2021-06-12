

 <div class="line">
            <div class="margin">
             <div class="s-12 m-6 l-3 margin-bottom">
                  <div class="box">
                    <?php
                        include_once("rightmenu.php");
                    ?>
                  </div>
               </div>
               <div class="s-12 m-6 l-9 margin-bottom">
                  <div class="box">


<h5 style="text-align: left;font-family: arial;">Change Password</h5> 
<div style="border-bottom:1px solid #D4E3F6;"></div><br> 
<p>To change your password, provide the following information, and then click change password.<br><br></p>
<?php
    if (isset($_POST['oldpassword']) && (isset($_POST['newpassword'])) && (isset($_POST['cnewpassword']))) {
        
        if ($_POST['newpassword']==$_POST['cnewpassword']) {
            
            $data = $mysql->select("select * from _clients where password='".$_POST['newpassword']."' and id=".$_SESSION['user']['id']);
            
            if (sizeof($data)==1) {
                
                $mysql->execute("update _clients set password='".$_POST['newpassword']."'");
                
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
<form action="" method="post">
<table style="font-family:arial;font-size:12px;border:none;" cellpadding="2" cellspacing="0" width="250px">
    <tr>
        <td style="border:none;padding-left:0px">Old Password<span class="man">*</span></td>
    </tr>
    <tr>
        <td><input type="password" value="<?php echo $_POST['oldpassword'];?>" name="oldpassword" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td>
    </tr>
        <tr>
        <td style="border:none;padding-left:0px">New Password<span class="man">*</span></td>
    </tr>
    <tr>
        <td><input type="password" value="<?php echo $_POST['newpassword'];?>"  name="newpassword" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td>
    </tr>
        <tr>
        <td style="border:none;padding-left:0px">Re-Enter New Password<span class="man">*</span></td>
    </tr>
    <tr>
        <td><input type="password" value="<?php echo $_POST['cnewpassword'];?>"  name="cnewpassword" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td>
    </tr>
    <tr>
        <td style="border:none;padding-left:0px"><input type="submit" value="Change Password" class="btn btn-success"></td>
    </tr>
</table>
</form>
</div>
</div>
               </div>
              

   
    </div>
</div>

 