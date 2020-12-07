 
<?php
                        
                        if (isset($_POST['registerBtn'])) {
                            
                            $array = array("personname"     => trim($_POST['personname']),
                                           "gender"         => trim($_POST['gender']),
                                           "mobileno"       => trim($_POST['mobileno']),
                                           "emailid"        => trim($_POST['emailid']),
                                           "password"       => trim($_POST['password']),
                                           "dateofregister" => date("Y-m-d H:i:s"));
                                           
                            if  ( (strlen(trim($_POST['personname']))>0 && ($_POST['password']==$_POST['cpassword']) ) ) {
                                $c = $mysql->select("select * from  _usertable where emailid='".trim($_POST['emailid'])."' or mobileno='".trim($_POST['mobileno'])."'");
                                if (sizeof($c)==0) {
                                    $userid = $mysql->insert("_usertable",$array);
                                    echo "<div style='border-radius:5px;background:#FFFEF7;border:1px solid #EBBE01;margin:10px;padding:10px;text-align:center;font-weight:bold;color:#222'>Registration Completed.</div>";    
                                    
                                    $d = $mysql->select("select * from _usertable where userid='".$userid."' and password='".$_POST['password']."'");     
                                    
                                      $_SESSION['USER']=$d[0];   
                                     if (sizeof($_SESSION['cartItem'])>0) { 
                                     echo "<script>location.href='http://www.kasupanamthuttu.com/viewCart';</script>";
                                     } else {
                                         echo "<script>location.href='http://www.kasupanamthuttu.com/usr_mypage';</script>";  
                                     }
                                     
                                } else {
                                    echo "<div style='border-radius:5px;background:#FFE8E5;border:1px solid #F75742;margin:10px;padding:10px;text-align:center;font-weight:bold;color:#222'>You have already registered.</div>";
                                }
                            } else {
                                echo "<div style='border-radius:5px;background:#FFE8E5;border:1px solid #F75742;margin:10px;padding:10px;text-align:center;font-weight:bold;color:#222'>All Fields are required. <br>Password and Confrim password should be same</div>";
                            }
                            
                        }   
                    ?> 
                    
                   <?php include_once("game_clients/menu.php");?>

         <div class="line">
            <div class="box margin-bottom">
               
                  <!-- CONTENT -->
                  <article class="s-12 m-7 l-12">
                  <div class="row">
                        <div class="col-sm-8">
                            <h4>Winner's</h4>
        <?php  foreach($mysql->select("select * from _tblwinners order by id desc") as $p) { ?>
        <div class="row">
              <div class="col-sm-3" style="text-align: center;">
              <img   src="assets/winners/<?php echo $p['ProductPhoto'];?>" style="width:80%;margin:0px auto"><br>
              <?php echo $p['productname'];?>
              </div>
              <div class="col-sm-6">
                <span style="color:#555"><?php echo nl2br($p['testimonials']);?></span>
              </div>
              <div class="col-sm-3">
                <img src="assets/winners/<?php echo $p['photopath'];?>" style="height:60px;margin:0px auto"><br>
                User Name: <?php echo $p['test_name'];?>
            </div>
               </div>
               <hr style="border:none;border-bottom:1px solid #ccc">
        <?php } ?>
        </div> 
                        
             
                       <div class="col-sm-4">
                            <table align="center" style="background: #fff;">
                                <tr>
                                    <td valign="top" style="background:url('assets/registerback.jpg');">
                                        <h3 style="color:#EA0E83;font-family:arial;border-bottom:1px solid #EA0E83;padding-bottom:5px;margin-bottom:10px;">Register <span style="color:#fff;font-size:15px;">(Free)</span></h3>
                                        <div style="font-family:arial;font-size:12px;color:#222">
                                            <form action="" method="post" target="_self" id="frmc">
                                                <table style="font-family: arial;font-size:12px;border:none;background:none" align="left" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td style="padding:0px;color:#fff;border:none">Name</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;background:#fff;border:none"><input type="text" placeholder="Your Name" required style="padding:5px 10px;width:100%;border:1px solid #d5d5d5" name="personname" value="<?php echo $_POST['personname'];?>" id="personname"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;color:#fff;border:none;">Gender</td>
                                                    </tr>
                                                    <tr style="background:none;">
                                                        <td style="padding:0px;padding-bottom:0px;background:none;border:none;"><select name="gender" id="gender" style="border:1px solid #d5d5d5"><option value="Male" <?php echo ($_POST['gender']=="Male") ? 'selected="selected"' : ""; ?>>Male</option><option value="Female" <?php echo ($_POST['gender']=="Male") ? 'selected="selected"' : ""; ?>>Female</option></select></td>
                                                    </tr>    
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;color:#fff;border:none;">Mobile Number</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;background:none"><input type="text" placeholder="Mobile Number" required name="mobileno" id="mobileno"  value="<?php echo $_POST['mobileno'];?>" style="padding:5px 10px;width:100%;border:1px solid #d5d5d5"></td>
                                                    </tr>    
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;border:none;color:#fff;">Email ID</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;background:none"><input type="text" placeholder="Email ID" required name="emailid" id="emailid"  value="<?php echo $_POST['emailid'];?>" style="padding:5px 10px;width:100%;border:1px solid #d5d5d5"></td>
                                                    </tr>      
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;border:none;color:#fff">Password</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;background:none"><input type="password" placeholder="Password" required  name="password" id="password"  value="<?php echo $_POST['password'];?>" style="padding:5px 10px;width:100%;border:1px solid #d5d5d5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;border:none;color:#fff">Confrim Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;background:none;"><input type="password" placeholder="Confirm Password" required name="cpassword" id="cpassword"  value="<?php echo $_POST['cpassword'];?>" style="padding:5px 10px;width:100%;border:1px solid #d5d5d5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:5px;padding-bottom:5px;border:none;background:none;color:#fff"> <input type="checkbox" required name="agree" id="agree" value="1" <?php echo ($_POST['agree']==1) ? 'checked="checked"' : ""; ?>> I Agree to these Terms & Conditions </td>
                                                    </tr>  
                                                    <tr style="background:none;">
                                                        <td style="padding:0px;padding-bottom:0px;background:none;border:none">
                                                            <input type="submit" value="Register" name="registerBtn" style="border:none;padding:5px;background:#EA0E83;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>                  
        </td>
        
</tr>
<tr>
    <td>
      <h3 style="color:#EA0E83;font-family:arial;border-bottom:1px solid #EA0E83;padding-bottom:5px;margin-bottom:10px;">Login</h3>
            <?php
     if (isset($_POST['loginBtn'])) {
         $d = $mysql->select("select * from _usertable where emailid='".$_POST['emailid']."' and password='".$_POST['password']."'");
                            
         if (sizeof($d)>0) {
               $_SESSION['USER']=$d[0];
                if (sizeof($_SESSION['cartItem'])>0) {   
                     echo "<script>location.href='http://www.kasupanamthuttu.com/viewCart'</script>";
                } else {
                    echo "<script>location.href='http://www.kasupanamthuttu.com/usr_mypage'</script>";     
                }
                
               
         }   else {
             $msg = "invalid login details";
         }
                            
                        }   
?>
            <div style="font-family:arial;font-size:12px;color:#222">
            
                <form action="" method="post" target="_self">
                    <table style="font-family: arial;font-size:12px;border:none;" align="left" cellpadding="0" cellspacing="0">
    <tr>
        <td style="background:#F0F0F0;padding:0px;border:none;">Email ID</td>
    </tr>
    <tr>
        <td style="background:#F0F0F0;padding:0px;border:none;"><input placeholder="Email ID"  value="<?php echo $_POST['emailid'];?>" name="emailid" required type="text" style="padding:5px 10px;width:100%;border:1px solid #d5d5d5"></td>
    </tr>
    <tr>
        <td style="background:#F0F0F0;padding:0px;border:none;">Password</td>
    </tr>
    <tr>
        <td style="background:#F0F0F0;padding:0px;border:none;"><input placeholder="Password" value="<?php echo $_POST['password'];?>" name="password" required type="password" style="padding:5px 10px;width:100%;border:1px solid #d5d5d5"></td>
    </tr>
    <tr>
     
        <td style="background:#F0F0F0;padding:10px;padding-left:0px;border:none;"><input name="loginBtn" type="submit" value="  Login  " style="border:none;padding:5px;background:#EA0E83;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;">
        
         <?php
        if (isset($msg)) {
            ?>
            <span style="color:red">&nbsp;&nbsp;  <?php echo $msg; ?> </span>
               
            <?php
        }
?>
        </td>
    </tr>
   
</table>
</form>
</div>
    </td>
</tr>
</table>
                       </div>
                       </div>
                  </article>
            
              
            </div>
         </div>
        
 
