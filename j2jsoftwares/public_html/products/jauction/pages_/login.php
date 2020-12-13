  <script>getMenuItems('mypage');</script>  
 
            <h3 style="color:#EA0E83;font-family:arial;border-bottom:1px solid #EA0E83;padding-bottom:5px;margin-bottom:10px;">Login</h3>
            <?php
     if (isset($_POST['loginBtn'])) {
         $d = $mysql->select("select * from _usertable where userid='".$_POST['userid']."' and password='".$_POST['password']."'");
                            
         if (sizeof($d)>0) {
               $_SESSION['USER']=$d[0];
               echo "<script>alert('successfully logged');location.href=location.href</script>";
         }   else {
             $msg = "invalid login details";
         }
                            
                        }   
?>
            <div style="font-family:arial;font-size:12px;color:#222">
                For existing customer, please login here <br><br><br><br>
                <form action="" method="post">
                    <table style="font-family: arial;font-size:12px;" align="center" cellpadding="5" cellspacing="0">
    <tr>
        <td>User ID</td>
        <td><input name="userid" type="text" style="width:180px;border:1px solid #d5d5d5"></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input name="password" type="password" style="width:180px;border:1px solid #d5d5d5"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input name="loginBtn" type="submit" value="  Login  " style="border:none;padding:5px;background:#EA0E83;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;">
        <input type="Reset" value="  Reset  " style="border:none;padding:5px;background:#EA0E83;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;">
        </td>
    </tr>
    <?php
        if (isset($msg)) {
            ?>
                 <tr>
                    <td>&nbsp;</td>
                    <td><?php echo $msg; ?></td>
                 </tr>
            <?php
        }
?>
</table>
</form>
</div>
 