 
                    
                   <?php include_once("game_clients/menu.php");?>

         <div class="line">
            <div class="box margin-bottom">
               
                  <!-- CONTENT -->
                  <div class="row">
                        <div class="col-sm-2"></div>
                       <div class="col-sm-4" style="background:#F0F0F0">
                       
                         <h3 style="color:#EA0E83;font-family:arial;border-bottom:1px solid #EA0E83;padding-bottom:5px;margin-bottom:10px;">Login</h3>
            <?php
     if (isset($_POST['loginBtn'])) {
         $d = $mysql->select("select * from _usertable where emailid='".$_POST['emailid']."' and password='".$_POST['password']."'");
                            
         if (sizeof($d)>0) {
               $_SESSION['USER']=$d[0];
                //if (sizeof($_SESSION['cartItem'])>0) {   
                  //   echo "<script>location.href='http://www.jobtomoney.com/viewCart'</script>";
                //} else {
                    echo "<script>location.href='http://www.jobtomoney.com/usr_mypage'</script>";     
                //}
                
               
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
                       </div>
                       <div class="col-sm-4">
                            <table align="center" style="background: #fff;">
                                <tr>
                                    <td valign="top" style="background:url('assets/registerback.jpg');">
                                        <h3 style="color:#EA0E83;font-family:arial;border-bottom:1px solid #EA0E83;padding-bottom:5px;margin-bottom:10px;">Register <span style="color:#fff;font-size:15px;">(Free)</span></h3>
                                        <div style="font-family:arial;font-size:12px;color:#222">
                                            <?php include_once("includes/game_registration.php");?>
                                        </div>                  
        </td>
        
</tr>
<tr>
    <td>
    
            
    </td>
</tr>
</table>
                       </div>
                       <div class="col-sm-2"></div>

                  </div>
                  <!-- ASIDE NAV -->
               <!--   <div class="s-12 m-5 l-4">
                     <h3>Navigation</h3>
                     <div class="aside-nav">
                        <ul>
                           <li><a>Home</a></li>
                           <li>
                              <a>Product</a>
                              <ul>
                                 <li><a>Product 1</a></li>
                                 <li><a>Product 2</a></li>
                                 <li>
                                    <a>Product 3</a>
                                    <ul>
                                       <li><a>Product 3-1</a></li>
                                       <li><a>Product 3-2</a></li>
                                       <li><a>Product 3-3</a></li>
                                    </ul>
                                 </li>
                              </ul>
                           </li>
                           <li>
                              <a>Company</a>
                              <ul>
                                 <li><a>About</a></li>
                                 <li><a>Location</a></li>
                              </ul>
                           </li>
                           <li><a>Contact</a></li>
                        </ul>
                     </div>
                  </div> -->
              
            </div>
         </div>
       