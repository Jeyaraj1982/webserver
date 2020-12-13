<script>getMenuItems('mypage');</script>    
    <table>
        <tr>
            <td valign="top">
                <h3 style="color:#EA0E83;font-family:arial;border-bottom:1px solid #EA0E83;padding-bottom:5px;margin-bottom:10px;">Register</h3>
                <div style="font-family:arial;font-size:12px;color:#222">
                    <br> 
                    <?php
                        
                        if (isset($_POST['registerBtn'])) {
                            
                            $array = array("personname"     => trim($_POST['personname']),
                                           "gender"         => trim($_POST['gender']),
                                           "mobileno"       => trim($_POST['mobileno']),
                                           "emailid"        => trim($_POST['emailid']),
                                           "password"       => trim($_POST['password']),
                                           "address1"       => trim($_POST['address1']),
                                           "address2"       => trim($_POST['address2']),
                                           "pincode"        => trim($_POST['pincode']),
                                           "country"        => trim($_POST['country']),
                                           "dateofregister" => date("Y-m-d H:i:s"));
                                           
                            if  ( (strlen(trim($_POST['personname']))>0 && ($_POST['password']==$_POST['cpassword']) ) ) {
                                $c = $mysql->select("select * from  _usertable where emailid='".trim($_POST['emailid'])."' or mobileno='".trim($_POST['mobileno'])."'");
                                if (sizeof($c)==0) {
                                    $userid = $mysql->insert("_usertable",$array);
                                    echo "<div style='border-radius:5px;background:#FFFEF7;border:1px solid #EBBE01;margin:10px;padding:10px;text-align:center;font-weight:bold;color:#222'>Registration Completed.</div>";    
                                    
                                    $d = $mysql->select("select * from _usertable where userid='".$userid."' and password='".$_POST['password']."'");     
                                    
                                      $_SESSION['USER']=$d[0];   
                                     if (sizeof($_SESSION['cartItem'])>0) { 
                                     echo "<script>location.href='http://www.dealmaass.com/p/viewCart';</script>";
                                     } else {
                                         echo "<script>location.href='http://www.dealmaass.com/p/usr_mypage';</script>";  
                                     }
                                     
                                } else {
                                    echo "<div style='border-radius:5px;background:#FFE8E5;border:1px solid #F75742;margin:10px;padding:10px;text-align:center;font-weight:bold;color:#222'>You have already registered.</div>";
                                }
                            } else {
                                echo "<div style='border-radius:5px;background:#FFE8E5;border:1px solid #F75742;margin:10px;padding:10px;text-align:center;font-weight:bold;color:#222'>All Fields are required. <br>Password and Confrim password should be same</div>";
                            }
                            
                        }   
                    ?>
                <form action="" method="post" target="_self" id="frmc">
                <table style="font-family: arial;font-size:12px;" align="left" cellpadding="5" cellspacing="0">
                    <tr>
                        <td>Name</td>
                        <td><input type="text" style="width:250px;border:1px solid #d5d5d5" name="personname" value="<?php echo $_POST['personname'];?>" id="personname"></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td><select name="gender" id="gender" style="border:1px solid #d5d5d5"><option value="Male" <?php echo ($_POST['gender']=="Male") ? 'selected="selected"' : ""; ?>>Male</option><option value="Female" <?php echo ($_POST['gender']=="Male") ? 'selected="selected"' : ""; ?>>Female</option></select></td>
                    </tr>    
                    <tr>
                        <td>Mobile Number</td>
                        <td><input type="text" name="mobileno" id="mobileno"  value="<?php echo $_POST['mobileno'];?>" style="width:250px;border:1px solid #d5d5d5"></td>
                    </tr>    
                    <tr>
                        <td>Email ID</td>
                        <td><input type="text" name="emailid" id="emailid"  value="<?php echo $_POST['emailid'];?>" style="width:250px;border:1px solid #d5d5d5"></td>
                    </tr>      
                    <tr>
                        <td>Password</td>
                        <td><input type="password"  name="password" id="password"  value="<?php echo $_POST['password'];?>" style="width:250px;border:1px solid #d5d5d5"></td>
                    </tr>
                    <tr>
                        <td>Confrim Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td><input type="password" name="cpassword" id="cpassword"  value="<?php echo $_POST['cpassword'];?>" style="width:250px;border:1px solid #d5d5d5"></td>
                    </tr>
                 
 
                    <tr>
                        <td colspan="2" style="font-weight: bold;color:#DE1B76;padding-top:30px;padding-bottom:10px">Shipping & Billing Address</td>
                    </tr>                    
                    <tr>
                        <td>Address Line 1</td>
                        <td><input type="text" name="address1" id="address1"   value="<?php echo $_POST['address1'];?>" style="width:250px;border:1px solid #d5d5d5"></td>
                    </tr>
                    <tr>
                        <td>Address Line 2</td>
                        <td><input type="text" name="address2" id="address2"  value="<?php echo $_POST['address2'];?>" style="width:250px;border:1px solid #d5d5d5"></td>
                    </tr>
                    <tr>
                        <td>Pincode</td>
                        <td><input type="text" name="pincode" id="pincode"  value="<?php echo $_POST['pincode'];?>" style="width:250px;border:1px solid #d5d5d5"></td>
                    </tr>                    
                     <tr>
                        <td>Country</td>
                     
                        <td><select name="country" id="country" style="width:253px;border:1px solid #d5d5d5">
                            <option value="India">India</option>
                        </select>
                        </td>
                    </tr> 
                     <tr>
                      
                       <td colspan="2"> <input type="checkbox" name="agree" id="agree" value="1" <?php echo ($_POST['agree']==1) ? 'checked="checked"' : ""; ?>> I Agree to these Terms & Conditions 
                        </td>
                    </tr>  
                    <tr>
                        <td colspan="2"><input type="submit" value="Register" name="registerBtn" style="border:none;padding:5px;background:#EA0E83;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;"></td>
                    </tr>
                </table>
                </form>
            </div>                  
        </td>
        <td width="20">
        
        </td>
        <td valign="top">
            <h3 style="color:#EA0E83;font-family:arial;border-bottom:1px solid #EA0E83;padding-bottom:5px;margin-bottom:10px;">Login</h3>
            <?php
     if (isset($_POST['loginBtn'])) {
         $d = $mysql->select("select * from _usertable where emailid='".$_POST['emailid']."' and password='".$_POST['password']."'");
                            
         if (sizeof($d)>0) {
               $_SESSION['USER']=$d[0];
                if (sizeof($_SESSION['cartItem'])>0) {   
                     echo "<script>alert('successfully logged');location.href='http://www.dealmaass.com/p/viewCart'</script>";
                } else {
                    echo "<script>alert('successfully logged');location.href='http://www.dealmaass.com/p/usr_mypage'</script>";     
                }
                
               
         }   else {
             $msg = "invalid login details";
         }
                            
                        }   
?>
            <div style="font-family:arial;font-size:12px;color:#222">
               <br> 
                <form action="" method="post" target="_self">
                    <table style="font-family: arial;font-size:12px;" align="left" cellpadding="5" cellspacing="0">
    <tr>
        <td>Email ID</td>
        <td><input name="emailid" type="text" style="width:180px;border:1px solid #d5d5d5"></td>
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

</td>
</tr>
</table>  
