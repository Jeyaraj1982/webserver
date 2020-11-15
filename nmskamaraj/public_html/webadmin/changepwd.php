<h2>Change Password</h2>
<?php
    if (isset($_POST['BtnSave'])) {
        
        if ($_SESSION['user']['password']!=$_POST['cpassword'])  {
            
            echo "<script>alert('Invalid Current Password');</script>";
            
        }   else {
            
            
            if ($_POST['password']!=$_POST['rpassword']) {
                
                 echo "<script>alert('Password and Confrim Password should be same');</script>";
            
            }  elseif (!(strlen($_POST['password'])>=6 )) {
                  echo "<script>alert('Password characters must have length 6 and above');</script>";
            } else {
            
            $mysql->execute("update usertable set password='".$_POST['password']."' where userid=".$_SESSION['user']['userid']);
            $_SESSION['user']['password'] = $_POST['password'];
            echo "<div class='success'>Password Updated Successfully</div>";
            }
        }
    }
?>
<form action="" method="post"  enctype="multipart/form-data">
 
 <table style="width:100%;border:1px solid #ccc;border-bottom:none" cellpadding="5" cellspacing="0">
	<tr>
		<td style="width:120px;border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Current Password</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><input type="password" name="cpassword" style="width: 100%;"></td>
    </tr>
    <tr>
		<td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;vertical-align: top;">New Password</td>
        <td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><input type="password" name="password" style="width: 100%;"></td>
    </tr>
    <tr>
		<td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;background:#f1f1f1;font-size:12px;font-weight:bold;">Confirm Password</td>
		<td style="border-bottom:1px solid #ccc;border-right:1px solid #ccc;"><input type="password" name="rpassword" style="width: 100%;"></td>
    </tr>
   
</table>
<div style="text-align:left;padding:10px;padding-left:0px">   <input type="submit" name="BtnSave" value="Change Password" ></div>
</form>
 
